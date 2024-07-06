<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ApplicantProfile;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobInfo;
use App\Models\JobPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Session; // Import the Session facade
use Illuminate\Support\Facades\Log;

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


        $topJobOpenings = JobInfo::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->orderByDesc('count')
            ->limit(10) // Limit the results to 2
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
        $jobsQuery = JobInfo::query();


        if ($title) {
            $jobsQuery->where('title', $title);
        }


        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(8);
        $preferredOccupation = $jobPreference->preferred_occupation;
        $matchedJobTitles = JobInfo::where('title', $preferredOccupation)
            ->pluck('title');

        $matchedJobs = $jobs->filter(function ($job) use ($matchedJobTitles) {
            return $matchedJobTitles->contains($job->title);
        });


        return view('dashboard', [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'applicant' => $applicant,
            'applications' => $applications,
            'matchedJobs' => $matchedJobs,
        ]);
    }

    public function matchindex(Request $request)
    {

        Session::flash('message', 'These jobs matches your credentials.');

        $topJobOpenings = JobInfo::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->orderByDesc('count')
            ->limit(10) // Limit the results to 2
            ->get();

        // Fetch jobs ordered by date posted

        $user = auth()->user();
        $jobPreference = JobPreference::where('user_id', $user->id)->first();

        if (!$jobPreference) {

        }
        $title = $request->query('title', null);
        $jobsQuery = JobInfo::query();


        if ($title) {
            $jobsQuery->where('title', $title);
        }

        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(8);
        $preferredOccupation = $jobPreference->preferred_occupation;
        $matchedJobTitles = JobInfo::where('title', 'like', '%' . $preferredOccupation . '%')
            ->pluck('title');

        $matchedJobs = $jobs->filter(function ($job) use ($matchedJobTitles) {
            return $matchedJobTitles->contains($job->title);
        });
        return view('matchedjobs', [
            'topJobOpenings' => $topJobOpenings,
            'jobs' => $jobs,
            'matchedJobs' => $matchedJobs,
        ]);
    }






    public function jobinfo($company_name, $id)
    {
        // Fetch job details based on $id
        $job = JobInfo::findOrFail($id); // Assuming 'Job' is your model and 'id' is the primary key
        $employer = Employer::where('user_id', $job->employer_id)->with('jobs')->first();

        $applicationStatus = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $id)
            ->value('status') ?? 'not_applied';

        if (!$employer) {
            throw new \Exception("Employer not found for job with ID: $id");
        }

        $fullUrl = URL::to('/jobs/' . $company_name . '/' . $id);

        return view('jobinformation', [
            'company_name' => $company_name, // Pass company_name to the view
            'employer' => $employer,
            'job' => $job,
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
        $topJobOpenings = JobInfo::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->orderByDesc('count')
            ->limit(10) // Limit the results to 2
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
