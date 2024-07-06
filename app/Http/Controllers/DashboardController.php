<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('welcomepage');
    }

    public function faq()
    {

        return view('faq');
    }
    public function searchjobs(Request $request)
    {
        $query = $request->input('query'); // Search query string
        $recencyFilter = $request->input('custom_recency_filter'); // Updated name attribute, defaulting to 'All'
        $location = $request->input('location'); // Location input
        $minSalary = $request->input('min_salary'); // Minimum salary input
        $maxSalary = $request->input('max_salary'); // Maximum salary input
        $jobType = $request->input('job_type'); // Job type filter
        $jobsQuery = JobInfo::query();

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

        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(8);

        return view('findjobs', ['jobs' => $jobs]);
    }


    public function findjobs()
    {
        $jobsQuery = JobInfo::query();
        $jobs = $jobsQuery->orderBy('date_posted', 'desc')->paginate(9);
        return view('findjobs', [
            'jobs' => $jobs,
        ]);
    }



    public function aboutus()
    {
        return view('aboutus');
    }

    public function contact()
    {
        return view('contactpage');
    }
}
