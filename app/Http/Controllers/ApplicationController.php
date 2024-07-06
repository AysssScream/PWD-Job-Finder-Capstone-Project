<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function markAllAsRead()
    {
        $user = Auth::user();
        $applications = $user->applications()
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'hired');
            })
            ->whereNull('read_at')
            ->get();

        foreach ($applications as $application) {
            $application->read_at = now();
            $application->save();
        }

        return redirect()->back()->with('status', 'All applications marked as read');
    }

}
