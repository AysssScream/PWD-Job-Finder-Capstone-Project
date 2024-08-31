<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\ApplicantProfile;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobInfo;
use App\Models\JobPreference;
use App\Models\Resume;
use App\Models\Message;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Session; // Import the Session facade
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function applications(Request $request)
    {
        $user = auth()->user();

        $applications = JobApplication::where('user_id', $user->id)->paginate(10);

    }
    public function index(Request $request)
    {


        Session::flash('message', 'Welcome to your Dashboard');

        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();


        $user = auth()->user();
        $jobPreference = JobPreference::where('user_id', $user->id)->first();
        $applicant = ApplicantProfile::where('user_id', $user->id)->firstOrFail();
        // Calculate the date 30 days ago from today
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        // Fetch job applications within the last 30 days for the user
        $applications = JobApplication::where('user_id', $user->id)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->get();

        if (!$jobPreference) {

        }
        $title = $request->query('title', null);
        $jobsQuery = JobInfo::where('vacancy', '>', 0); // Apply condition where vacancy is greater than 0


        if ($title) {
            $jobsQuery->where('title', $title);
        }


        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(10);
        $preferredOccupation = $jobPreference->preferred_occupation;
        $matchedJobTitles = JobInfo::where('title', $preferredOccupation)
            ->pluck('title');

        $matchedJobs = $jobs->filter(function ($job) use ($matchedJobTitles) {
            return $matchedJobTitles->contains($job->title);
        });



        $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();

        return view('dashboard', [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'applicant' => $applicant,
            'applications' => $applications,
            'matchedJobs' => $matchedJobs,
            'jobpreference' => $jobpreference,
        ]);
    }

    public function updatepreferences(Request $request)
    {
        $user = $request->user();
        //JOB PREFERENCES
        $request->validate([
            'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
            'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
            'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
        ], [
            'preferredOccupation.required' => 'The preferred occupation field is required.',
            'preferredOccupation.regex' => 'The preferred occupation must contain only letters and spaces.',
            'preferredOccupation.max' => 'The preferred occupation may not be greater than 50 characters.',
            'localLocation.required' => 'The local location field is required.',
            'localLocation.regex' => 'The local location must contain only letters and spaces.',
            'localLocation.max' => 'The local location may not be greater than 50 characters.',
            'overseasLocation.regex' => 'The overseas location must contain only letters and spaces.',
            'overseasLocation.max' => 'The overseas location may not be greater than 50 characters.',
        ]);

        $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();
        $jobpreference->preferred_occupation = $request->input('preferredOccupation');
        $jobpreference->local_location = $request->input('localLocation');
        $jobpreference->overseas_location = $request->input('overseasLocation');
        $jobpreference->save();

        Session::flash('preferences', 'Job Preferences Saved');

        return back()->with('status', 'Job preferences updated successfully!');


    }



    public function remarks($remarks)
    {
        return view('layouts.remarks', [
            'remarks' => $remarks,
        ]);

    }


    public function resumeupload(Request $request)
    {
        $userId = Auth::id();

        // Retrieve the top job openings
        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Retrieve the latest resume data for the authenticated user
        $resume = Resume::where('user_id', $userId)->orderBy('upload_date', 'desc')->first();

        if ($resume) {
            // Extract and normalize skills
            $skills = array_map('trim', explode(',', $resume->skills));
            $normalizedSkills = array_map('strtolower', $skills);
            $age = $resume->age;

            // Normalize education
            $educations = array_map('trim', explode(',', strtolower($resume->education)));

            // Get all jobs and map match reasons
            $matchedResumeJobs = DB::table('jobinfos')
                ->select('*')
                ->get()
                ->map(function ($job) use ($educations, $normalizedSkills, $age) {
                    $matchReasons = [
                        'education' => [],
                        'skills' => [],
                        'age' => []
                    ];

                    // Check for education match
                    foreach ($educations as $education) {
                        if (stripos($job->educational_level, $education) !== false) {
                            $matchReasons['education'][] = ucwords($education);
                        }
                    }

                    // Check for skill match
                    foreach ($normalizedSkills as $skill) {
                        // Match the whole skill phrase
                        if (
                            stripos($job->title, $skill) !== false ||
                            stripos($job->description, $skill) !== false ||
                            stripos($job->qualifications, $skill) !== false ||
                            stripos($job->responsibilities, $skill) !== false

                        ) {
                            $matchReasons['skills'][] = ucwords($skill);
                        }
                    }

                    // Check for age match
                    if ($job->min_age <= $age && $job->max_age >= $age) {
                        $matchReasons['age'][] = $age;
                    }

                    // Remove duplicate match reasons
                    $matchReasons['education'] = array_unique($matchReasons['education']);
                    $matchReasons['skills'] = array_unique($matchReasons['skills']);
                    $matchReasons['age'] = array_unique($matchReasons['age']);

                    // Calculate match percentages
                    $totalEducation = count($educations);
                    $totalSkills = count($normalizedSkills);
                    $matchedEducationCount = count($matchReasons['education']);
                    $matchedSkillsCount = count($matchReasons['skills']);
                    $matchedAgeCount = count($matchReasons['age']);

                    $educationPercentage = $totalEducation > 0 ? ($matchedEducationCount) * 100 : 0;
                    $skillsCount = $matchedSkillsCount; // Use count for skills instead of percentage
                    $agePercentage = !empty($matchReasons['age']) ? 100 : 0; // If age matches, it's 100%
    
                    // Include jobs only if there are matches for both education and age
                    if (!empty($matchReasons['education']) && !empty($matchReasons['age'])) {
                        $job->match_reasons = $matchReasons;
                        $job->match_percentages = [
                            'education' => number_format($educationPercentage, 2) . '%',
                            'skills' => $skillsCount . ' ' . ($skillsCount === 1 ? 'Skill' : 'Skills') . ' Keyword Matched',
                            'age' => number_format($agePercentage, 2) . '%',
                        ];
                        return $job;
                    }

                })
                ->filter(); // Remove jobs with no match reasons for both education and age
        } else {
            $matchedResumeJobs = collect(); // Return an empty collection
        }




        // Pass matched jobs to the view
        return view('uploadresume', [
            'resume' => $resume,
            'topJobOpenings' => $topJobOpenings,
            'matchedResumeJobs' => $matchedResumeJobs,
        ]);
    }



    public function fetchResumeMatchedJobs(Request $request)
    {
        $userId = Auth::id();

        // Retrieve the latest resume data for the authenticated user
        $resume = Resume::where('user_id', $userId)->orderBy('upload_date', 'desc')->first();
        if ($resume) {
            // Extract and normalize skills
            $skills = explode(',', $resume->skills);
            $normalizedSkills = array_map('trim', array_map('strtolower', $skills));

            // Normalize education
            $education = strtolower(trim($resume->education));

            // Match jobs based on the resume data
            $matchedResumeJobs = DB::table('jobinfos')
                ->select('*')
                ->where(function ($query) use ($education) {
                    // Match education as a substring in educational_level
                    $query->whereRaw('LOWER(`educational_level`) LIKE ?', ["%{$education}%"]);
                })
                ->where(function ($query) use ($normalizedSkills) {
                    foreach ($normalizedSkills as $skill) {
                        $skill = strtolower(trim($skill)); // Normalize skill
                        $words = explode(' ', $skill);
                        foreach ($words as $word) {
                            $word = strtolower(trim($word)); // Normalize word
                            // Match each word in title, description, and qualifications fields
                            $query->orWhere(function ($subQuery) use ($word) {
                                $subQuery->whereRaw('LOWER(`title`) LIKE ?', ["%{$word}%"])
                                    ->orWhereRaw('LOWER(`description`) LIKE ?', ["%{$word}%"])
                                    ->orWhereRaw('LOWER(`qualifications`) LIKE ?', ["%{$word}%"])
                                    ->orWhereRaw('LOWER(`responsibilities`) LIKE ?', ["%{$word}%"]);
                            });
                        }
                    }
                })
                ->get();
        } else {
            // Handle case where no resume is found
            $matchedResumeJobs = collect(); // Return an empty collection
        }


        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        try {
            $request->validate([
                'resume' => 'required|mimes:pdf,docx|max:2048', // Max 2MB
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // Get the uploaded file
        try {
            $file = $request->file('resume');
            $filePath = $file->getPathname();
            $fileName = $file->getClientOriginalName();
            $fileType = $file->getClientMimeType();

            // Send the file to the Flask server
            $response = Http::attach('file', file_get_contents($filePath), $fileName)
                ->post('http://127.0.0.1:5000/upload');

            if ($response->successful()) {
                $data = $response->json();
                $userId = Auth::id();

                // Update or create the resume record in the database
                Resume::updateOrCreate(
                    ['user_id' => $userId], // Unique identifier for existing records
                    [
                        'file_name' => $fileName,
                        'file_type' => $fileType,
                        'text_content' => json_encode($data), // Assuming `text_content` will store JSON data
                        'age' => $data['age'] ?? null, // Use null coalescing operator to handle undefined keys
                        'skills' => $data['skills'] ?? null,
                        'education' => $data['education'] ?? null,
                    ]
                );

                return redirect()->route('dashboard.resumeupload')->with('success', 'Resume uploaded and processed successfully!');
            } else {
                // Handle API request failure
                $errorMessage = $response->json('error', 'Unknown error occurred');
                return redirect()->back()->withErrors(['api' => 'Failed to upload to Flask server: ' . $errorMessage]);
            }
        } catch (\Exception $e) {
            // Handle general exceptions (e.g., file handling or HTTP request issues)
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the file: ' . $e->getMessage()]);
        }
    }


    public function matchindex(Request $request)
    {
        Session::flash('match', 'You may change your job preferences.');


        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();


        // Fetch jobs ordered by date posted

        $user = auth()->user();
        $jobPreference = JobPreference::where('user_id', $user->id)->first();

        if (!$jobPreference) {

        }
        $title = $request->query('title', null);
        $jobsQuery = JobInfo::where('vacancy', '>', 0); // Apply condition where vacancy is greater than 0


        if ($title) {
            $jobsQuery->where('title', 'like', "%$title%"); // Use LIKE for partial matches
        }

        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(10);
        $preferredOccupation = $jobPreference->preferred_occupation;
        $matchedJobTitles = JobInfo::where('title', 'like', '%' . $preferredOccupation . '%')
            ->pluck('title');

        $matchedJobs = $jobs->filter(function ($job) use ($matchedJobTitles) {
            return $matchedJobTitles->contains($job->title);
        });

        $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();

        return view('matchedjobs', [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'matchedJobs' => $matchedJobs,
            'jobpreference' => $jobpreference,

        ]);
    }






    public function jobinfo($company_name, $id)
    {
        // Fetch job details based on $id
        $job = JobInfo::findOrFail($id); // Assuming 'Job' is your model and 'id' is the primary key
        $employer = Employer::where('user_id', $job->employer_id)->with('jobs')->first();
        $jobTitle = $job->title;
        $normalizedJobTitle = strtolower(trim($jobTitle));

        $keywords = array_filter(explode(' ', $normalizedJobTitle), function ($word) {
            return strlen($word) > 2; // Skip very short words
        });

        $query = JobInfo::where('id', '!=', $id) // Exclude the current job
            ->where('vacancy', '!=', 0); // Ensure jobs have vacancies

        $query->where(function ($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                // Trim whitespace from each keyword
                $keyword = trim($keyword);
                if (!empty($keyword)) {
                    // Apply LIKE condition for each keyword
                    $q->orWhere('title', 'LIKE', "%{$keyword}%");
                }
            }
        });

        // Execute the query and get results
        $similarJobs = $query->get();


        $similarJobs = $query->get();
        $applicationStatus = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $id)
            ->value('status') ?? 'Not Applied';

        if (!$employer) {
            throw new \Exception("Employer not found for job with ID: $id");
        }

        $fullUrl = URL::to('/jobs/' . $company_name . '/' . $id);

        return view('jobinformation', [
            'company_name' => $company_name, // Pass company_name to the view
            'employer' => $employer,
            'job' => $job,
            'jobs' => $similarJobs, // Pass similar jobs to the view
            'fullUrl' => $fullUrl, // Pass the full URL to the view
            'applicationStatus' => $applicationStatus, // Pass the application status to the view

        ]);
    }

    public function search(Request $request)
    {

        Session::flash('jobsno', 'Search companies, positions, and skills');

        $title = $request->input('title');
        $query = $request->input('query'); // Search query string
        $recencyFilter = $request->input('custom_recency_filter'); // Updated name attribute, defaulting to 'All'
        $location = $request->input('location'); // Location input
        $minSalary = $request->input('min_salary'); // Minimum salary input
        $maxSalary = $request->input('max_salary'); // Maximum salary input
        $jobType = $request->input('job_type'); // Job type filter
        $jobsQuery = JobInfo::query();
        // Fetch top job openings based on count
        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();




        if ($query) {
            $jobsQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('company_name', 'like', '%' . $query . '%')
                    ->orWhere('location', 'like', '%' . $query . '%')
                    ->orWhere('educational_level', 'like', '%' . $query . '%');
            });
        }

        if ($location) {
            $jobsQuery->where('location', 'like', '%' . $location . '%');
        }


        if ($minSalary && $maxSalary) {
            $jobsQuery->whereRaw('CAST(salary AS UNSIGNED) BETWEEN ? AND ?', [$minSalary, $maxSalary]);
        } elseif ($minSalary) {
            $jobsQuery->whereRaw('CAST(salary AS UNSIGNED) >= ?', [$minSalary]);
        } elseif ($maxSalary) {
            $jobsQuery->whereRaw('CAST(salary AS UNSIGNED) <= ?', [$maxSalary]);
        }

        if ($jobType) {
            $jobsQuery->where('job_type', $jobType);
        }

        \Log::info("Recency Filter: {$recencyFilter}");

        if ($recencyFilter !== 'All') {
            switch ($recencyFilter) {
                case 'last-24-hours':
                    $jobsQuery->where('date_posted', '>=', now()->subDay());
                    break;
                case 'last-7-days':
                    $jobsQuery->where('date_posted', '>=', now()->subDays(7));
                    break;
                case 'last-30-days':
                    $jobsQuery->where('date_posted', '>=', now()->subDays(30));
                    break;
            }
        }




        $user = auth()->user();
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $applications = JobApplication::where('user_id', $user->id)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->get();

        $applicant = ApplicantProfile::where('user_id', $user->id)->firstOrFail();
        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(8);

        return view('dashboard', ['topJobOpenings' => $topJobOpenings, 'jobs' => $jobs, 'applicant' => $applicant, 'applications' => $applications]);
    }


    public function applyForJob(Request $request, $company_name, $id)
    {
        Session::flash('apply', 'You have applied for this job.');

        Log::info('Company Name:', ['company_name' => $company_name]);

        $request->validate([
            'description' => 'required|string',
        ]);

        $job = JobInfo::findOrFail($id);

        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'employer_id' => $job->employer_id,
            'description' => $request->description,
            'company_name' => $company_name,
            'status' => 'pending',
            'title' => $job->title,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted.');
    }



    public function showCompany($employer_id)
    {
        // Find the employer or fail if not found
        $employer = Employer::where('user_id', $employer_id)->firstOrFail();

        // Retrieve all jobs associated with the given employer_id
        $jobs = JobInfo::where('employer_id', $employer_id)->paginate(6);

        // Return the view with the employer and jobs data
        return view('companyprofile', [
            'employer' => $employer,
            'jobs' => $jobs, // Fixed syntax error
        ]);
    }


    //INBOX

    public function messages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('to', $email)->get();
        $replies = Reply::all();
        $users = User::all();

        return view('messages', [
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

        return view('messages', [
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
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
    public function getReplies($id)
    {
        $replies = Reply::where('message_id', $id)->get();
        Log::info('Replies Data:', $replies->toArray());

        return response()->json(['replies' => $replies]);
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




    public function jobs()
    {
        return view('savedjobs');
    }

    public function setup()
    {
        return view('setup');
    }

    public function waiting()
    {
        return view('pendingapproval');
    }
}
