<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopJobOpeningController extends Controller
{
    public function index()
    {
        $topJobOpenings = JobInfo::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->orderByDesc('count')
            ->paginate(2); // Adjust per your needs

        return view('dashboard', ['topJobOpenings' => $topJobOpenings]);
    }

}

