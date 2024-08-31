<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuditTrail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->usertype == 'admin') {

            $user = Auth::user();
            AuditTrail::create([
                'user_id' => $user->id,
                'user' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
                'action' => 'Logged In',
                'section' => 'Authentication',
            ]);
            return redirect(route('admin.dashboard'));
        }


        if (Auth::user()->account_verification_status == 'waiting for approval' || Auth::user()->account_verification_status == 'pending' || Auth::user()->account_verification_status == 'declined') {
            // Check if the user is an employer
            if (Auth::user()->usertype === 'employer') {
                return redirect()->route('employer.setup');
            } else {
                return redirect()->route('pendingapproval');
            }
        }

        if (Auth::user()->account_verification_status == 'approved') {
            if (Auth::user()->usertype === 'employer') {
                return redirect()->route('employer.dashboard');
            } else {
                return redirect()->intended(route('dashboard', absolute: false));
            }
        }
        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the authenticated user is an admin
            if ($user->usertype === 'admin') { // Adjust this check based on how you identify admins
                // Record the audit trail entry
                AuditTrail::create([
                    'user_id' => $user->id,
                    'user' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
                    'action' => 'Logged Out',
                    'section' => 'Authentication',
                ]);

                // Perform logout
                Auth::guard('web')->logout();

                // Invalidate the session
                $request->session()->invalidate();

                // Regenerate the CSRF token
                $request->session()->regenerateToken();
            }
        }

        // Redirect to home page
        return redirect('/');


    }
}
