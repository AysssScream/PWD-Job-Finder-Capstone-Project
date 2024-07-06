<?php

// app/Http/Controllers/TopJobOpeningController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo; // Replace with your actual JobInfo model namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopJobOpeningController extends Controller
{
    public function index()
    {
        // Fetch top job openings based on count
        $topJobOpenings = JobInfo::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->orderByDesc('count')
            ->paginate(2); // Adjust per your needs

        return view('dashboard', ['topJobOpenings' => $topJobOpenings]);
    }

}

