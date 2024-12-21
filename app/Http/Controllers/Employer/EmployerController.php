<?php

namespace App\Http\Controllers\Employer;


use App\Models\EducationalAttainment;
use App\Models\Employer;
use App\Models\EmploymentInfo;
use App\Models\JobApplication;
use App\Models\LanguageInput;
use App\Models\PersonalInfo;
use App\Models\PwdInformation;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobInfo;
use App\Models\ApplicantProfile;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Resume;
use App\Models\Training;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\InterviewInvitation;
use Illuminate\Support\Facades\Mail;


use Dompdf\Dompdf;
use Dompdf\Options;
use Session; // Import the Session facade

class EmployerController extends Controller
{
    public function setup()
    {
        return view('employer.setup');
    }

    public function dashboard()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();

        $profile = Employer::where('user_id', $employerId)->first();
        $applicant = JobApplication::where('employer_id', $employerId)->get();
        Session::flash('dashboard', "There are {$jobs->count()} Jobs Listed");

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }

        $pendingApplicationsCount = JobApplication::where('employer_id', $employerId)
            ->where('status_plain', 'pending')
            ->count();

        $showNotification = false;
        if (!session('notification_shown') && $pendingApplicationsCount > 0) {
            $showNotification = true;
            session(['notification_shown' => true]);
        }

        // Fetch hired applicants data
        $hiredApplicants = JobApplication::where('employer_id', $employerId)
            ->where('status_plain', 'hired')
            ->with('user.pwdInformation')
            ->get();

        // Process the data to count disabilities
        $disabilityCounts = [];
        foreach ($hiredApplicants as $application) {
            if ($application->user && $application->user->pwdInformation) {
                $disability = $application->user->pwdInformation->disability;
                if (!isset($disabilityCounts[$disability])) {
                    $disabilityCounts[$disability] = 0;
                }
                $disabilityCounts[$disability]++;
            }
        }

        // Prepare data for the bar chart
        $hiredApplicantsData = collect($disabilityCounts)->map(function ($count, $disability) {
            return [
                'disability' => $disability,
                'count' => $count
            ];
        })->values();

        // Fetch application data for different time ranges
        $timeRanges = [
            '15days' => Carbon::now()->subDays(14)->startOfDay(),
            'daily' => Carbon::now()->subDays(30)->startOfDay(),
            'weekly' => Carbon::now()->subWeeks(12)->startOfWeek(),
            'monthly' => Carbon::now()->subMonths(11)->startOfMonth(), // Changed to 11 months to include current month
        ];

        $applicationData = [];
        foreach ($timeRanges as $range => $startDate) {
            $query = JobApplication::where('employer_id', $employerId)
                ->where('created_at', '>=', $startDate);

            if ($range === 'daily' || $range === '15days') {
                $data = $query->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
                $format = 'M d';
            } elseif ($range === 'weekly') {
                $data = $query->selectRaw('YEARWEEK(created_at) as yearweek, COUNT(*) as count')
                    ->groupBy('yearweek')
                    ->orderBy('yearweek')
                    ->get();
                $format = 'W';
            } else { // monthly
                $data = $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
                $format = 'M Y';
            }

            $dates = [];
            $counts = [];
            $currentDate = $startDate->copy();
            $endDate = Carbon::now();

            while ($currentDate <= $endDate) {
                if ($range === 'daily' || $range === '15days') {
                    $key = $currentDate->format('Y-m-d');
                    $dates[] = $currentDate->format($format);
                    $counts[] = $data->firstWhere('date', $key)->count ?? 0;
                    $currentDate->addDay();
                } elseif ($range === 'weekly') {
                    $key = $currentDate->format('oW');
                    $dates[] = $currentDate->format($format);
                    $counts[] = $data->firstWhere('yearweek', $key)->count ?? 0;
                    $currentDate->addWeek();
                } else { // monthly
                    $key = $currentDate->format('Y-m');
                    $dates[] = $currentDate->format($format);
                    $counts[] = $data->firstWhere('month', $key)->count ?? 0;
                    $currentDate->addMonth();
                }
            }

            $applicationData[$range] = [
                'dates' => $dates,
                'counts' => $counts,
            ];
        }

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the employer.dashboard view
        $data = [
            'profile' => $profile,
            'jobs' => $jobs,
            'applicant' => $applicant,
            'hiredApplicantsData' => $hiredApplicantsData,
            'applicationData' => $applicationData,
            'pendingApplicationsCount' => $pendingApplicationsCount,
            'showNotification' => $showNotification,
        ];

        return response()
            ->view('employer.dashboard', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }


    public function editprofile()
    {

        $employerId = Auth::id();
        $profile = Employer::where('user_id', $employerId)->first();

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Return the employer.profile view with cache control headers
        return response()
            ->view('employer.profile', ['profile' => $profile])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }

    public function addjobs()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(6);
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Return the employer.jobsinfo view with the jobs data
        return response()
            ->view('employer.jobsinfo', ['jobs' => $jobs])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    public function deletejobs($id)
    {
        try {
            $job = JobInfo::findOrFail($id);
            $job->delete();
            session()->flash('jobinfodelete', 'Job ID: ' . $id . ' has been deleted');
            return redirect()->route('employer.manage')->with('success', 'Employment record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('employer.manage')->with('error', 'Failed to delete employment record.');
        }
    }


    public function editjobs($id)
    {
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $job = JobInfo::findOrFail($id);

        return response()
            ->view('employer.jobsedit', ['job' => $job])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }


    public function manage()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Return the employer.manage view with the jobs data and cache control headers
        return response()
            ->view('employer.manage', ['jobs' => $jobs])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }

    public function review(Request $request)
    {
        $employerId = Auth::id();
        $query = JobApplication::where('employer_id', $employerId)
            ->where('status_plain', 'pending'); // Only get pending applications

        // Date Filter
        if ($request->has('dateFilter') && $request->dateFilter != 'All') {
            $now = now();
            switch ($request->dateFilter) {
                case 'last-24-hours':
                    $query->where('created_at', '>=', $now->subDay());
                    break;
                case 'last-7-days':
                    $query->where('created_at', '>=', $now->subDays(7));
                    break;
                case 'last-30-days':
                    $query->where('created_at', '>=', $now->subDays(30));
                    break;
            }
        }

        // Another Filter
        if ($request->has('anotherFilter') && $request->anotherFilter != 'All') {
            $query->where('status_plain', $request->anotherFilter);
        }

        // Get filtered applications
        $applications = $query->orderBy('created_at', 'desc')->get();

        if (!Auth::check()) {
            return redirect('/');
        }

        return response()
            ->view('employer.reviewapplicant', ['applications' => $applications])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }


    public function reviewhired(Request $request)
    {
        $employerId = Auth::id();
        $query = JobApplication::where('employer_id', $employerId)
            ->where('status_plain', 'hired'); // Only get pending applications

        // Date Filter
        if ($request->has('dateFilter') && $request->dateFilter != 'All') {
            $now = now();
            switch ($request->dateFilter) {
                case 'last-24-hours':
                    $query->where('created_at', '>=', $now->subDay());
                    break;
                case 'last-7-days':
                    $query->where('created_at', '>=', $now->subDays(7));
                    break;
                case 'last-30-days':
                    $query->where('created_at', '>=', $now->subDays(30));
                    break;
            }
        }

        // Another Filter
        if ($request->has('anotherFilter') && $request->anotherFilter != 'All') {
            $query->where('status_plain', $request->anotherFilter);
        }

        // Get filtered applications
        $applications = $query->orderBy('created_at', 'desc')->get();

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        return response()
            ->view('employer.reviewhiredapplicant', ['applications' => $applications])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }



    public function applicantinformation($id, $job_id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();
        $employer = Employer::where('user_id', Auth::id())->first(); // Get employer based on logged-in user
        $jobapplication = JobApplication::where('user_id', $id)->where('job_id', $job_id)->firstOrFail();
        $interview = Interview::where('user_id', $id)->where('job_id', $job_id)->first();
        $job = JobInfo::find($job_id); // Fetch the job details


        // Get the employer information
        $employer = Employer::where('user_id', Auth::id())->first();

        $totalHiredByCompanyCount = JobApplication::where('user_id', $id)
            ->where('status_plain', 'hired')
            ->where('employer_id', Auth::id())
            ->count();

        $data = [
            'applicant' => $applicant,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
            'pwdinfo' => $pwdinfo,
            'jobapplication' => $jobapplication,
            'job' => $job,
            'job_id' => $job_id,
            'totalHiredByCompanyCount' => $totalHiredByCompanyCount,
            'interview' => $interview,
            'employer' => $employer  // Add this line
        ];

        return response()
            ->view('employer.reviewapplicantinfo', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    public function pwdinformation($id, $job_id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();
        $resumeExists = Resume::where('user_id', $id)->exists(); // Check if resume exists

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the employer.reviewapplicantpwdinfo view
        $data = [
            'applicant' => $applicant,
            'pwdinfo' => $pwdinfo,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
            'job_id' => $job_id,
        ];

        // Return the employer.reviewapplicantpwdinfo view with cache control headers
        return response()
            ->view('employer.reviewapplicantpwdinfo', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }


    public function setInterview(Request $request, $id, $job_id)
    {
        // Validate input
        $request->validate([
            'interviewNotes' => 'required|string',
        ]);

        try {
            // Get the applicant, job, and employer details
            $applicant = User::find($id);
            $job = JobInfo::find($job_id);
            $employer = Employer::where('user_id', Auth::id())->first();
            $jobApplication = JobApplication::where('user_id', $id)
                ->where('job_id', $job_id)
                ->firstOrFail();

            // Create interview record
            $interview = new Interview();
            $interview->user_id = $id;
            $interview->job_id = $job_id;
            $interview->job_application_id = $jobApplication->id;
            $interview->remarks = $request->interviewNotes;
            $interview->status = 'pending';
            $interview->save();

            // Send email notification
            if ($applicant && $applicant->email) {
                try {
                    Mail::send(
                        'emails.interview-invitation',
                        [
                            'interviewData' => [
                                'applicant_name' => $applicant->firstname . ' ' . $applicant->lastname,
                                'job_title' => $job->title,
                                'message' => $request->interviewNotes,
                                'company_name' => $employer->businessname,
                                'contact_person' => $employer->contact_person,
                                'employer_email' => $employer->email_address,
                                'employer_phone' => $employer->mobile_no
                            ]
                        ],
                        function ($message) use ($applicant, $employer, $job) {
                            $message->from('johneriel7@gmail.com', 'ACCESSIJOBS')
                                ->replyTo($employer->email_address, $employer->businessname)
                                ->to($applicant->email, $applicant->firstname . ' ' . $applicant->lastname)
                                ->subject('Interview Invitation from ' . $employer->businessname);
                        }
                    );

                    Session::flash('success', 'Interview invitation sent successfully!');
                } catch (\Exception $e) {
                    \Log::error('Failed to send interview email: ' . $e->getMessage());
                    Session::flash('warning', 'Interview scheduled but email notification failed to send.');
                }
            }

            return redirect()->back()->with('success', 'Interview scheduled successfully!');

        } catch (\Exception $e) {
            \Log::error('Error setting interview: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to schedule interview: ' . $e->getMessage());
        }
    }




    public function hire(Request $request, $id, $job_id)
    {
        // Find the applicant by user ID and job ID
        $applicant = JobApplication::where('user_id', $id)
            ->where('job_id', $job_id)
            ->firstOrFail(); // This will throw a ModelNotFoundException if not found

        // Get the associated job
        $job = $applicant->job; // Assuming there's a relationship defined in JobApplication model

        // Log the remarks input
        \Log::info('Textarea value:', ['value' => $request->input('remarkstextarea')]);

        // Get remarks from the request, defaulting to 'None' if not provided
        $remarks = $request->input('remarkstextarea', 'None');

        // Set status to 'hired'
        $status = 'hired';

        if ($job) {
            // Check if there's a vacancy before decrementing
            if ($job->vacancy > 0) {
                $job->vacancy -= 1; // Decrement vacancy count
                $job->save(); // Save the job changes
            } else {
                // Handle the case where there are no vacancies left
                return redirect()->route('employer.review')->with('error', 'No vacancies available for this job.');
            }
        }

        // Update applicant status and remarks
        $applicant->remarks = $remarks;
        $applicant->status = $status;
        $applicant->status_plain = $status;

        // Save applicant changes
        $applicant->save();

        // Flash success message to the session
        Session::flash('hireapplicant', 'Applicant hired successfully!');

        // Redirect back to the review route with a success message
        return redirect()->route('employer.review')->with('success', 'Applicant hired successfully!');
    }



    public function deleteapplication($applicant_id, $job_id)
    {
        $application = JobApplication::where('user_id', $applicant_id)
            ->where('job_id', $job_id)
            ->first();

        if ($application) {
            $application->delete();
            Session::flash('deleteapplication', 'Check for more Invalid Job Applications!');
            return redirect()->route('employer.review')->with('success', 'Check for more Invalid Job Applications!');
        } else {
            return redirect()->route('employer.review')->with('success', 'Check for more Invalid Job Applications!');
        }
    }

    public function editMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1200', // Adjust validation rules as necessary
        ]);

        $message = Message::findOrFail($id);

        $message->message = $request->input('message');
        $message->save(); // Save the changes to the database

        Session::flash('editmessage', "Message edited successfully!");
        return redirect()->back()->with('success', 'Message updated successfully!');
    }


    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        if ($message->to === auth()->user()->email) {
            $message->read_at = now();
            $message->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'You are not authorized to mark this message as read.'], 403);
    }


    public function messages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('to', $email)->get();
        $replies = Reply::all();
        $users = User::all()->pluck('email');
        $userEmails = User::whereIn('usertype_plain', ['admin', 'user'])->pluck('email');

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'messages' => $messages,
            'userEmails' => $userEmails,
            'users' => $users,
            'replies' => $replies,
        ];

        return response()
            ->view('employer.messages', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }

    public function sentmessages()
    {

        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('from', $email)->get();
        $replies = Reply::all();
        $users = User::where('usertype', 'admin')->get();
        $userEmails = User::whereIn('usertype_plain', ['admin', 'user'])->pluck('email');

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'messages' => $messages,
            'userEmails' => $userEmails,
            'users' => $users,
            'replies' => $replies,
        ];

        return response()
            ->view('employer.messages', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }

    public function destroyMessage($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Message not found.'], 404);
        }


        $message->delete();
        Session::flash('destroymessage', "Message deleted successfully!");

        return response()->json(['message' => 'Message deleted successfully.'], 200);
    }

    public function storeReply(Request $request)
    {

        $request->validate([
            'replyMessage' => 'required|string|max:300',
            'message_id' => 'required|exists:messages,id', // Validate that the message_id exists in the messages table
        ]);

        $message = Message::find($request->input('message_id'));
        if (!$message) {
            return redirect()->back()->withErrors('Message not found.');
        }

        Reply::create([
            'message_id' => $message->id,
            'message' => $request->input('replyMessage'),
            'reply_to' => $message->to,
            'reply_from' => auth()->user()->email, // Get the email of the current user
        ]);

        Session::flash('storereply', "Reply stored successfully!");

        // Redirect or return a response
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }

    public function getReplies($id)
    {
        $replies = Reply::where('message_id', $id)->get();
        Log::info('Replies Data:', $replies->toArray());

        return response()->json(['replies' => $replies]);
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        Message::create([
            'from' => auth()->user()->email, // Use the authenticated user's email
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::flash('storemessage', "Message stored successfully!");
        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function stream($id)
    {
        $resume = Resume::where('user_id', $id)->first();

        if (!$resume) {
            // Set a flash message for Toastr
            Session::flash('resumeerror', 'Resume not found.');

            return redirect()->back();
        }

        $fileNameWithExtension = $resume->file_name;

        $filePath = storage_path("app/public/resume/{$fileNameWithExtension}");
        \Log::info("File Path: {$filePath}");

        if (!file_exists($filePath)) {
            Session::flash('resumeerror', 'Resume not uploaded.');

            return redirect()->back();
        }

        $newFileName = 'resume_' . $id . '.pdf';

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $newFileName . '"'
        ]);
    }

}


