<?php

namespace App\Http\Controllers\Employer;

use App\Rules\EmailDomain;

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
            ->orderBy('created_at', 'desc') // Order by created_at descending
            ->get();

        $profile = Employer::where('user_id', $employerId)->first();
        $applicant = JobApplication::where('employer_id', $employerId)->get();

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }

        return view('employer.dashboard', compact('profile', 'jobs', 'applicant'));
    }

    public function editprofile()
    {

        $employerId = Auth::id();
        $profile = Employer::where('user_id', $employerId)->first();

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }
        return view('employer.profile', compact('profile'));

    }

    public function addjobs()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(6);
        return view('employer.jobsinfo', compact('jobs'));
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
        $job = JobInfo::findOrFail($id);
        return view('employer.jobsedit', compact('job'));
    }

    public function manage()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('employer.manage', compact('jobs'));

    }

    public function review(Request $request)
    {
        $employerId = Auth::id();
        $query = JobApplication::where('employer_id', $employerId);

        // Apply date filter
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

        // Apply status filter
        if ($request->has('anotherFilter') && $request->anotherFilter != 'All') {
            $query->where('status', $request->anotherFilter);
        }

        // Get filtered applications
        $applications = $query->orderBy('created_at', 'desc')->get();

        return view('employer.reviewapplicant', compact('applications'));
    }


    public function applicantinformation($id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();
        $jobapplication = JobApplication::where('user_id', $id)->first();

        // Pass data to the view
        return view('employer.reviewapplicantinfo', [
            'applicant' => $applicant,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
            'pwdinfo' => $pwdinfo,
            'jobapplication' => $jobapplication,
        ]);
    }

    public function pwdinformation($id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();

        return view('employer.reviewapplicantpwdinfo', [
            'applicant' => $applicant,
            'pwdinfo' => $pwdinfo,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
        ]);
    }


    public function hire(Request $request, $id)
    {
        $applicant = JobApplication::where('user_id', $id)->firstOrFail();
        $job = $applicant->job; // Assuming there is a relationship defined in JobApplication model

        \Log::info('Textarea value:', ['value' => $request->input('remarkstextarea')]);

        $remarks = $request->input('remarkstextarea');

        if (is_null($remarks)) {
            $remarks = 'None';
        }
        $status = 'hired';


        // If job is found, decrement its vacancy
        if ($job) {
            $job->vacancy = $job->vacancy - 1;
            $job->save();
        }
        $applicant->read_at = null;
        $applicant->remarks = $remarks;
        $applicant->status = $status;
        $applicant->save();

        Session::flash('hireapplicant', 'Applicant hired successfully!');


        return redirect()->route('employer.review')->with('success', 'Applicant hired successfully!');
    }


    public function messages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('to', $email)->get();
        $replies = Reply::all();
        $users = User::all();

        return view('employer.messages', [
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
    }

    public function sentmessages()
    {

        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('from', $email)->get();
        $replies = Reply::all();
        $users = User::all();

        return view('employer.messages', [
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
    }

    public function storeReply(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'replyMessage' => 'required|string|max:300',
            'message_id' => 'required|exists:messages,id', // Validate that the message_id exists in the messages table
        ]);

        // Find the message
        $message = Message::find($request->input('message_id'));
        if (!$message) {
            return redirect()->back()->withErrors('Message not found.');
        }

        // Create a new reply
        Reply::create([
            'message_id' => $message->id,
            'message' => $request->input('replyMessage'),
            'reply_to' => $message->to,
            'reply_from' => auth()->user()->email, // Get the email of the current user
        ]);

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
        // Validate the incoming request data
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        // Create a new message record
        Message::create([
            'from' => auth()->user()->email, // Use the authenticated user's email
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
