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
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Models\Training;
use App\Models\Interview;
use App\Models\SavedJob;
use App\Models\MatchedJob;

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
            ->where('from_date', '<=', now()->endOfDay())
            ->where('to_date', '>=', now()->startOfDay())
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();


        $activeApplicationsCount = JobApplication::where('status_plain', 'pending')
            ->where('user_id', auth()->id())
            ->count();

        $interviewCount = Interview::where('user_id', auth()->id())
            ->count();

        $savedJobCount = SavedJob::where('user_id', auth()->id())
            ->count();

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
        $jobsQuery = JobInfo::where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay()) // Ensure from_date is before or equal to the end of today
            ->where('to_date', '>=', now()->startOfDay()); // Include jobs valid from the start of today

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

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the dashboard view
        $data = [
            'topJobOpenings' => $topJobOpenings,
            'activeApplicationsCount' => $activeApplicationsCount,
            'interviewCount' => $interviewCount,
            'savedJobCount' => $savedJobCount,
            'jobs' => $jobs,
            'applicant' => $applicant,
            'applications' => $applications,
            'matchedJobs' => $matchedJobs,
            'jobpreference' => $jobpreference,
        ];

        // Return the dashboard view with cache control headers
        return response()
            ->view('dashboard', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
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

        // Get the current route name

        Session::flash('preferences', 'Job Preferences Saved');

        return back()->with('status', 'Job preferences updated successfully!');
    }


    public function showRemarks(Request $request)
    {
        $remarks = $request->input('remarks');
        $company_name = $request->input('company_name');

        // Set default values if remarks or company_name are null
        $remarks = $remarks ?? 'No remarks available'; // Default message if remarks are null
        $company_name = $company_name ?? 'Unknown Company'; // Default name if company_name is null

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }
        $data = [
            'remarks' => $remarks,
            'company_name' => $company_name,
        ];
        return response()
            ->view('layouts.remarks', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }


  public function resumeupload(Request $request)
    {
        Session::flash('resume', 'Adding your resume helps employers');
        $userId = Auth::id();

        // Check if the user is authenticated
        if (!$userId) {
            return redirect()->back()->withErrors(['auth' => 'User  not authenticated.']);
        }

        // Retrieve the top job openings
        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay())
            ->where('to_date', '>=', now()->startOfDay())
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Retrieve the latest resume data for the authenticated user
        $resume = Resume::where('user_id', $userId)->orderBy('upload_date', 'desc')->first();

        if ($resume) {
            $skills = array_map('trim', explode(',', $resume->skills));
            $normalizedSkills = array_map('strtolower', $skills);
            $age = $resume->age;

            // Normalize education
            $educations = array_map('trim', explode(',', strtolower($resume->education)));

            // Normalize certifications
            $certifications = array_map('trim', explode(',', strtolower($resume->certifications)));

            // Normalize Programs
            $program = array_map('trim', explode(',', strtolower($resume->program)));
            
            $workExperience = array_map('trim', explode(',', strtolower($resume->work_experience)));

            // Get all jobs and map match reasons
            $matchedResumeJobs = DB::table('jobinfos')
                ->select('*')
                ->get()
                ->map(function ($job) use ($educations, $normalizedSkills, $age, $certifications,$program, $workExperience ) {
                    $matchReasons = [
                        'education' => [],
                        'skills' => [],
                        'age' => [],
                        'certifications' => [],
                        'program'=>[],
                        'work_experience' => []
                    ];

                    // Check for education match
                    foreach ($educations as $education) {
                        if (stripos($job->educational_level, $education) !== false) {
                            $matchReasons['education'][] = ucwords($education);
                        }
                    }

                    // Check for skills match
                    foreach ($normalizedSkills as $skill) {
                        $skillKeywords = explode(' ', $skill); // Split the skill into individual words
                        foreach ($skillKeywords as $keyword) {
                            if (
                                stripos($job->title, $keyword) !== false ||
                                stripos($job->description, $keyword) !== false ||
                                stripos($job->qualifications, $keyword) !== false ||
                                stripos($job->responsibilities, $keyword) !== false
                            ) {
                                $matchReasons['skills'][] = ucwords($skill);
                                break; // If one keyword matches, we consider the skill matched
                            }
                        }
                    }

                    // Check for age match
                    if ($job->min_age <= $age && $job->max_age >= $age) {
                        $matchReasons['age'][] = $age;
                    }

                    $matchedCertifications = [];
                    foreach ($certifications as $certification) {
                        $normalizedCertification = strtolower(trim($certification));
                        $jobCertifications = array_map('trim', array_map('strtolower', explode(',', $job->training_qualifications)));

                        foreach ($jobCertifications as $jobCertification) {
                            if (stripos($jobCertification, $normalizedCertification) !== false) {
                                $matchReasons['certifications'][] = strtolower($certification);
                                $matchedCertifications[] = $normalizedCertification;
                                break; // Exit loop once a match is found
                            }
                        }
                    }
                    
                     // Check for programs match
                    foreach ($program as $program) {
                        $normalizedProgram = strtolower(trim($program));
                        $jobPrograms = array_map('trim', array_map('strtolower', explode(',', $job->program)));
        
                        foreach ($jobPrograms as $jobProgram) {
                            if (stripos($jobProgram, $normalizedProgram) !== false) {
                                $matchReasons['program'][] = ucwords($program);
                                break;
                            }
                        }
                    }
                    
                    
                    // Check for vacancy match
                    if ($job->vacancy > 0) {
                        $matchReasons['vacancy'][] = "Vacancy available.";
                    }
                    
                    
                  // Check for work experience match
                    foreach ($workExperience as $experience) {
                        // Use regex to extract years and role title from each experience entry
                        if (preg_match('/([\d.]+)\s*Years?\s*(.+)/i', $experience, $matches)) {
                            $yearsOfExperience = (float)$matches[1]; // Extracted years of experience
                            $roleTitle = strtolower(trim($matches[2])); // Extracted role title
                    
                            // Split job's work experience requirement into individual words
                            $jobRoleWords = preg_split('/\s+/', strtolower($job->work_experience));
                    
                            foreach ($jobRoleWords as $word) {
                                // Check if any word from the job requirement appears in the role title
                                if (stripos($roleTitle, $word) !== false) {
                                    // Extract required years for the job role
                                    if (preg_match('/([\d.]+)\s*Years?\s*/i', strtolower($job->work_experience), $jobMatches)) {
                                        $requiredYears = (float)$jobMatches[1]; // Required years for the job role
                    
                                        // Check if the resume years meet or exceed the required years
                                        if ($yearsOfExperience >= $requiredYears) {
                                            $matchReasons['work_experience'][] = 'Your Work Experience Matches this Job.';
                                            break; // Exit both loops once a match is found
                                        }
                                    }
                                }
                            }
                        }
                    }



                    // Check for date match
                    $currentDate = now(); // Get current date and time
                    if ($currentDate->isBetween($job->from_date, $job->to_date, true)) {
                        $matchReasons['date'][] = "Job is available from " . \Carbon\Carbon::parse($job->from_date)->format('M j, Y') . " to " . \Carbon\Carbon::parse($job->to_date)->format('M j, Y');
                    }


                    // Remove duplicate match reasons
                    $matchReasons['education'] = array_unique($matchReasons['education']);
                    $matchReasons['skills'] = array_unique($matchReasons['skills']);
                    $matchReasons['age'] = array_unique($matchReasons['age']);
                    $matchReasons['program'] = array_unique($matchReasons['program']);
                    $matchReasons['certifications'] = array_unique($matchReasons['certifications']);
                    $matchReasons['work_experience'] = array_unique($matchReasons['work_experience']);

                    // Calculate match percentages
                    $totalEducation = count($educations);
                    $totalSkills = count($normalizedSkills);
                    $totalCertifications = count($certifications);
                    $matchedEducationCount = count($matchReasons['education']);
                    $matchedSkillsCount = count($matchReasons['skills']);
                    $matchedProgramCount = count($matchReasons['program']);
                    $matchedCertificationsCount = count($matchReasons['certifications']);
                    $matchedAgeCount = count($matchReasons['age']);
                    $matchedWorkExperience= count($matchReasons['work_experience']) . ' Relevant Experience(s)';
                    $matchedWorkExperienceCount = count($matchReasons['work_experience']);

                    $educationPercentage = $totalEducation > 0 ? ($matchedEducationCount) * 100 : 0;
                    $skillsCount = $matchedSkillsCount; // Use count for skills instead of percentage
                    $certificationsCount = $matchedCertificationsCount; // Count of matched certifications
                    $agePercentage = !empty($matchReasons['age']) ? 100 : 0; // If age matches, it's 100%
                    $programsCount = $matchedProgramCount;
                    $workExperienceCount = $matchedWorkExperienceCount;
                    // Include jobs only if there are matches for both education and age
                    if (
                        !empty($matchReasons['education']) &&
                        !empty($matchReasons['age']) &&
                        !empty($matchReasons['program'])&&
                        !empty($matchReasons['work_experience'])&&
                        $job->vacancy > 0 &&
                        $currentDate->isBetween($job->from_date, $job->to_date, true)
                    ) {
                        $requiredCertifications = !empty($job->required_certifications) ? (is_array($job->required_certifications) ? $job->required_certifications : explode(',', $job->required_certifications)) : [];

                        if (!empty($requiredCertifications)) {
                            // Check if any of the required certifications match the provided match reasons
                            $matchedCertifications = array_intersect($matchReasons['certifications'], $requiredCertifications);

                            // Only proceed if there are matching certifications
                            if (empty($matchedCertifications)) {
                                return; // Skip this job if no certifications match
                            }
                        }

                        $job->match_reasons = $matchReasons;
                        $job->match_percentages = [
                            'education' => number_format($educationPercentage, 2) . '%',
                            'skills' => $skillsCount . ' ' . ($skillsCount === 1 ? 'Skill' : 'Skills') . ' Keyword Matched',
                            'certifications' => $certificationsCount . ' ' . ($certificationsCount === 1 ? 'Certification' : 'Certifications'),
                            'program' => $programsCount . ' Program(s) Found',
                            'age' => number_format($agePercentage, 2) . '%',
                            // 'work_experience' =>  $workExperienceCount . ' Relevant Experience(s) Found',
                        ];

                        return $job;
                    }
                })
                ->filter();
            MatchedJob::where('user_id', Auth::id())->delete();
            foreach ($matchedResumeJobs as $matchedJob) {
                MatchedJob::create([
                    'user_id' => Auth::id(),
                    'job_id' => $matchedJob->id,
                    'training_qualifications' => $matchedJob->training_qualifications,
                ]);
            }
        } else {
            $matchedResumeJobs = collect(); // Return an empty collection
        }

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        // Prepare the data for the uploadresume view
        $data = [
            'resume' => $resume,
            'topJobOpenings' => $topJobOpenings,
            'matchedResumeJobs' => $matchedResumeJobs,
        ];

        return response()
            ->view('uploadresume', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

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

            $education = strtolower(trim($resume->education));

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
            ->where('from_date', '<=', now()->endOfDay())
            ->where('to_date', '>=', now()->startOfDay())
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        try {
            $request->validate([
                'resume' => 'required|mimes:pdf,docx|max:5120', // Max 2MB
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        try {
            $file = $request->file('resume');
            $filePath = $file->getPathname();
            $fileName = $file->getClientOriginalName();
            $fileType = $file->getClientMimeType();

            $userId = Auth::id();

            // Find the existing resume record for the user
            $resume = Resume::where('user_id', $userId)->first();

            if ($resume) {
                // Delete the old file if it exists
                if ($resume->file_path && Storage::exists($resume->file_path)) {
                    Storage::delete($resume->file_path);
                }
            }

            // Store the new file in the 'resume' folder within 'storage/app'
            $storedFilePath = $file->storeAs('resume', $fileName, 'public'); // 'public' disk

            // Send the file to the Flask server
            $response = Http::attach('file', file_get_contents($filePath), $fileName)
                ->post('http://erie7.pythonanywhere.com//upload');

            if ($response->successful()) {
                $data = $response->json();
                // Dump and die to check if this key exists and has data

                // Update or create the resume record in the database
                Resume::updateOrCreate(
                    ['user_id' => $userId], // Unique identifier for existing records
                    [
                        'file_name' => $fileName,
                        'file_type' => $fileType,
                        'file_path' => $storedFilePath, // Store the path of the uploaded file
                        'text_content' => json_encode($data), // Assuming `text_content` will store JSON data
                        'age' => $data['age'] ?? null, // Use null coalescing operator to handle undefined keys
                        'skills' => $data['skills'] ?? null,
                        'education' => $data['education'] ?? null,
                        'certifications' => $data['certification'] ?? null,
                        'program'=>$data['program']??null,
                        'work_experience'=> $data['work_experience']??null,
                    ]
                );
                Session::flash('resumeupload', 'Resume successfully uploaded');

                return redirect()->route('dashboard.resumeupload')->with('success', 'Resume uploaded and processed successfully!');
            } else {
                // Handle API request failure
                $errorMessage = $response->json('error', 'Unknown error occurred');
                return redirect()->back()->withErrors(['api' => 'Failed to upload to Flask server: ' . $errorMessage]);
            }
        } catch (Exception $e) {
            // Handle general exceptions (e.g., file handling or HTTP request issues)
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the file: ' . $e->getMessage()]);
        }
    }




    public function matchindex(Request $request)
    {
        Session::flash('match', 'You may change your job preferences.');

        // Fetch the top job openings
        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay())
            ->where('to_date', '>=', now()->startOfDay())
            ->groupBy('title')
            ->having(DB::raw('SUM(vacancy)'), '>', 0)
            ->orderByDesc('count')
            ->limit(10)
            ->get();



        // Get the current user and their job preferences
        $user = auth()->user();
        $jobpreference = JobPreference::where('user_id', $user->id)->first();

        if (!$jobpreference) {

            $jobpreference = (object) [
                'preferred_occupation' => '',
                'local_location' => ''
            ];
        }

        $title = $request->query('title', null);
        $location = $request->query('location', null);
        // $jobsQuery = JobInfo::where('vacancy', '>', 0);
        $jobsQuery = JobInfo::where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay()) // Ensure from_date is before or equal to the end of today
            ->where('to_date', '>=', now()->startOfDay()); // Include jobs valid from the start of today

        if ($title) {
            $jobsQuery->where('title', 'like', "%$title%");
        }
        if ($location) {
            $jobsQuery->where('location', 'like', "%$location%");
        }

        $preferredOccupation = $jobpreference->preferred_occupation;

        if ($preferredOccupation) {
            $jobsQuery->where('title', 'like', '%' . $preferredOccupation . '%');
        }

        $localLocation = $jobpreference->local_location;
        $overseasLocation = $jobpreference->overseas_location;
        
       if ($localLocation || $overseasLocation) {
            $jobsQuery->where(function ($query) use ($localLocation, $overseasLocation) {
                if ($localLocation) {
                    $query->orWhere('location', 'like', '%' . $localLocation . '%');
                }
        
                 if ($overseasLocation) {
                    $query->orWhere('location', 'like', '%' . $overseasLocation . '%');
                    $query->orWhere('description', 'like', '%' . $overseasLocation . '%'); // Match description as well
                }
            });
        }


        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(10);

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'jobpreference' => $jobpreference,
        ];

        return response()
            ->view('matchedjobs', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }



    public function jobinfo($company_name, $id)
    {
        $job = JobInfo::findOrFail($id);
        $userId = auth()->id();

        $employer = Employer::where('user_id', $job->employer_id)->with('jobs')->first();
        $jobTitle = $job->title;
        $normalizedJobTitle = strtolower(trim($jobTitle));

        $isHiredFullTime = JobApplication::where('user_id', $userId)
            ->where('status_plain', 'hired')
            ->where('job_type', 'Full-Time')
            ->where('job_id', $id)
            ->exists();

        $partTimeApplicationsCount = JobApplication::where('user_id', $userId)
            ->where('status_plain', 'hired')
            ->where('job_type', 'Part-Time')
            ->where('job_id', $id)
            ->count();


        $hiredCountAtSameCompany = JobApplication::where('user_id', $userId)
            ->where('status_plain', 'hired')
            ->whereHas('job', function ($query) use ($job) {
                $query->where('employer_id', $job->employer_id);
            })
            ->count();


        $keywords = array_filter(explode(' ', $normalizedJobTitle), function ($word) {
            return strlen($word) > 2;
        });

        $query = JobInfo::where('id', '!=', $id)
            ->where('vacancy', '!=', 0);

        $query->where(function ($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keyword = trim($keyword);
                if (!empty($keyword)) {
                    // Apply LIKE condition for each keyword
                    $q->orWhere('title', 'LIKE', "%{$keyword}%");
                }
            }
        });


        $similarJobs = $query->get();
        $applicationStatus = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $id)
            ->value('status') ?? 'Not Applied';

        if (!$employer) {
            throw new \Exception("Employer not found for job with ID: $id");
        }

        $similarJobs = JobInfo::where('vacancy', '>', 0) // Your logic to fetch similar jobs
            ->orderBy('date_posted', 'desc')
            ->paginate(10);

        $fullUrl = URL::to('/jobs/' . $company_name . '/' . $id);

        return view('jobinformation', [
            'company_name' => $company_name,
            'employer' => $employer,
            'job' => $job,
            'isHiredFullTime' => $isHiredFullTime,
            'partTimeApplicationsCount' => $partTimeApplicationsCount,
            'hiredCountAtSameCompany' => $hiredCountAtSameCompany,
            'jobs' => $similarJobs,
            'fullUrl' => $fullUrl,
            'applicationStatus' => $applicationStatus,
        ]);
    }

    public function search(Request $request)
    {

        $user = auth()->user();
        $jobpreference = JobPreference::where('user_id', $user->id)->first();



        Session::flash('jobsno', 'Search companies, positions, and skills');

        $title = $request->input('title');
        $query = $request->input('query'); // Search query string
        $recencyFilter = $request->input('custom_recency_filter');
        $location = $request->input('location', null);
        $minSalary = $request->input('min_salary', null);
        $maxSalary = $request->input('max_salary', null);
        $jobType = $request->input('job_type', null);
        // $jobsQuery = JobInfo::query();
        // Fetch top job openings based on count

        $jobsQuery = JobInfo::where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay()) // Ensure from_date is before or equal to the end of today
            ->where('to_date', '>=', now()->startOfDay()); // Include jobs valid from the start of today

        $topJobOpenings = JobInfo::select('title', DB::raw('SUM(vacancy) as count'))
            ->where('vacancy', '>', 0)
            ->where('from_date', '<=', now()->endOfDay())
            ->where('to_date', '>=', now()->startOfDay())
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

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/');
        }
        // Prepare the data for the dashboard view
        $data = [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'applicant' => $applicant,
            'applications' => $applications,
            'jobpreference' => $jobpreference,
        ];

        // Return the dashboard view with cache control headers
        return response()
            ->view('dashboard', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

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
            'job_type' => $job->job_type,
            'status' => 'pending',
            'title' => $job->title,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted.');
    }


    public function cancelApplication($userId, $jobId)
    {
        // Find the job application based on both the user ID and job ID
        $jobApplication = JobApplication::where('user_id', $userId)
            ->where('job_id', $jobId)
            ->first();

        Session::flash('deleteapplication', 'You have successfully canceled your application.');
        if ($jobApplication) {
            $jobApplication->delete();

            return redirect()->back()->with('success', 'Application successfully canceled.');
        } else {
            // If no matching application is found, return an error message
            return redirect()->back()->with('error', 'Application not found.');
        }
    }



    public function showCompany($employer_id)
    {
        // Find the employer or fail if not found
        $employer = Employer::where('user_id', $employer_id)->firstOrFail();

        // Retrieve all jobs associated with the given employer_id
        $jobs = JobInfo::where('employer_id', $employer_id)->paginate(6);

        if (!Auth::check()) {
            return redirect('/'); // Redirect to login page if not authenticated
        }

        $data = [
            'employer' => $employer,
            'jobs' => $jobs,
        ];

        return response()
            ->view('companyprofile', $data)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');

    }


    //INBOX

    public function messages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('to', $email)->get();
        $replies = Reply::all();
        $users = User::all();
        $pwdUsers = User::where('usertype', 'admin')->pluck('email');

        return view('messages', [
            'pwdUsers' => $pwdUsers,
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
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



    public function sentmessages()
    {
        $userId = Auth::id();
        $email = User::find($userId)->email;
        $messages = Message::where('from', $email)->get();
        $replies = Reply::all();
        $users = User::all();
        $pwdUsers = User::where('usertype', 'admin')->pluck('email');

        return view('messages', [
            'pwdUsers' => $pwdUsers,
            'messages' => $messages,
            'users' => $users,
            'replies' => $replies
        ]);
    }


    public function destroyMessage($id)
    {
        // Find the message by ID
        $message = Message::find($id);

        // Check if the message exists
        if (!$message) {
            return response()->json(['message' => 'Message not found.'], 404);
        }

        // Delete the message
        $message->delete();

        // Flash a session message for success (if you are using it in the same request context)
        Session::flash('destroymessage', "Message deleted successfully!");

        // Return a JSON response indicating success
        return response()->json(['message' => 'Message deleted successfully.'], 200);
    }


    public function storeMessage(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        Message::create([
            'from' => auth()->user()->email,
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Session::flash('storemessage', "Message stored successfully!");
        return redirect()->back()->with('success', 'Message sent successfully!');
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

    public function getReplies($id)
    {
        $replies = Reply::where('message_id', $id)->get();
        Log::info('Replies Data:', $replies->toArray());

        return response()->json(['replies' => $replies]);
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

