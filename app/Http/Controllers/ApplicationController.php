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
                $query->where('status_plain', 'pending')
                    ->orWhere('status_plain', 'hired');
            })
            ->whereNull('read_at')
            ->get();
         
             \Log::info('Applications to be marked as read: ', ['applications' => $applications]);
            foreach ($applications as $application) {
               $application->read_at = now();
               $application->save();
              \Log::info('Marked application as read', ['application_id' => $application->id, 'read_at' => $application->read_at]);
            }
                    

        $interviews = $user->interviews()
            ->whereNull('read_at')
            ->get();
            
        \Log::info('Interviews to be marked as read: ', ['interviews' => $interviews]);

        foreach ($interviews as $interview) {
            $interview->read_at = now();
            $interview->save();
        }

        return redirect()->back()->with('status', 'All applications and interviews marked as read');
    }
}
