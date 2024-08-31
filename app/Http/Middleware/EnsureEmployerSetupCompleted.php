<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmployerSetupCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed    
     *  */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an employer and if setup is completed
        if (Auth::check() && Auth::user()->account_verification_status === 'pending' || Auth::user()->account_verification_status === 'waiting for approval' || Auth::check() && Auth::user()->account_verification_status === 'declined') {
            return redirect()->route('employer.setup');
        }
        return $next($request);
    }
}
