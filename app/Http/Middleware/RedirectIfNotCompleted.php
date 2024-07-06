<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model if not already imported

class RedirectIfNotCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentStep = $request->route()->getName();

        switch ($currentStep) {
            case "setup":
                if (!Session::has('start_completed')) {
                    return redirect()->route('pendingapproval');
                }
                break;
            case 'personal':
                if (!Session::has('step1_completed')) {
                    return redirect()->route('setup');
                }
                break;
            case 'workexp':
                if (!Session::has('step2_completed')) {
                    return redirect()->route('personal');
                }
                break;
            case 'jobpreferences':
                if (!Session::has('step3_completed')) {
                    return redirect()->route('workexp');
                }
                break;
            case 'dialect':
                if (!Session::has('step4_completed')) {
                    return redirect()->route('jobpreferences');
                }
                break;
            case 'educationalbg':
                if (!Session::has('step5_completed')) {
                    return redirect()->route('dialect');
                }
                break;
            case 'pwdinfo':
                if (!Session::has('step6_completed')) {
                    return redirect()->route('educationalbg');
                }
                break;
            case 'pendingapproval':
                if (Session::has('step7_completed')) {
                    return redirect()->route('pendingapproval');
                }
                break;
            default:
                break;
        }

        if ($currentStep !== 'pendingapproval' && Session::has('step7_completed')) {
            return redirect()->route('pendingapproval');
        }
        return $next($request);
    }
}
