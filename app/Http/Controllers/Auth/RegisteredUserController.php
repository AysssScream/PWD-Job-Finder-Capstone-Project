<?php

namespace App\Http\Controllers\Auth;

use App\Rules\EmailDomain;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required|string|regex:/^[a-zA-Z\s.]+$/|max:50',
            'middlename' => 'nullable|string|max:50|regex:/^[a-zA-Z\s.]+$/',
            'lastname' => 'required|string|regex:/^[a-zA-Z\s.]+$/|max:50',
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:100',
                'unique:' . User::class,
                Rule::when($request->usertype === 'user', function ($input) {
                    return [new EmailDomain];
                }),
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*()+\-={}[\]:;,<.>])(?=.*\d).*$/'],
            'account_verification_status' => ['nullable', 'string'],
            'usertype' => ['required', 'string'],
        ], [
            'firstname.regex' => 'The first name should only contain alphabetic characters and spaces.',
            'middlename.regex' => 'The middle name should only contain alphabetic characters and spaces.',
            'lastname.regex' => 'The last name should only contain alphabetic characters and spaces.',
            'password.regex' => 'The password must contain at least one uppercase letter, one special character, and one number.',
            'firstname.required' => 'The first name is required.',
            'firstname.string' => 'The first name must be a string.',
            'firstname.max' => 'The first name may not be greater than 50 characters.',
            'middlename.string' => 'The middle name must be a string.',
            'middlename.max' => 'The middle name may not be greater than 50 characters.',
            'lastname.required' => 'The last name is required.',
            'lastname.string' => 'The last name must be a string.',
            'lastname.max' => 'The last name may not be greater than 50 characters.'
        ]);

        $fullName = "{$request->firstname} " . ($request->middlename ? "{$request->middlename} " : "") . "{$request->lastname}";

        $user = User::create([
            'email' => $request->email,
            'name' => $fullName,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'usertype' => $request->usertype,
            'usertype_plain' => $request->usertype,
            'account_verification_status_plain' => 'pending',
            'account_verification_status' => 'pending', // Set default value to 'pending'
            'password' => Hash::make($request->password),
        ]);

        //$user->notify(new WelcomeNotification());

        event(new Registered($user));

        Auth::login($user);

        Log::info('User registered and logged in successfully. Redirecting to email verification notice.');

        return Redirect::route('verification.emailnotice');
    }
}
