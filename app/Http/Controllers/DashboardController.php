<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Subquery to get the latest job id for each company
        $subQuery = JobInfo::query()
            ->selectRaw('MAX(id) as id') // Assuming 'id' is the primary key and the latest job has the highest id
            ->groupBy('company_name'); // Group by company name

        // Main query to get job details based on the latest job id per company
        $jobs = JobInfo::query()
            ->whereIn('id', $subQuery) // Filter by the latest job ids
            ->orderBy('vacancy', 'desc') // Sort by vacancies, highest to lowest
            ->orderBy('date_posted', 'desc') // Then sort by date posted, newest to oldest
            ->paginate(8); // Fetch 8 jobs per page

        $featuredjobs = JobInfo::query()
            ->orderBy('vacancy', 'desc')
            ->orderBy('date_posted', 'desc')
            ->paginate(6);

        // Calculate the total vacancy
        $totalVacanciesPerCompany = JobInfo::query()
            ->select('company_name')
            ->selectRaw('SUM(vacancy) as total_vacancy')
            ->groupBy('company_name')
            ->pluck('total_vacancy', 'company_name');

        return view('welcomepage', [
            'jobs' => $jobs,
            'totalVacanciesPerCompany' => $totalVacanciesPerCompany, // Pass the total vacancies per company to the view
            'featuredjobs' => $featuredjobs
        ]);
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
