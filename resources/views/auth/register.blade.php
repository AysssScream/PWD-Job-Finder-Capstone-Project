<x-guest-layout>

    <head>
        <style>
            .option-button {
                display: flex;
                align-items: center;
                padding: 1rem;
                border: 1px solid #d1d5db;
                border-radius: 0.375rem;
                color: #374151;
                font-size: 1.125rem;
                transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            }

            .dark .option-button {
                border-color: #4b5563;
                color: #d1d5db;
            }

            .dark .option-button:hover {
                background-color: #4B5563;
                border-color: #4B5563;
            }

            .option-button input[type="radio"] {
                margin-right: 0.5rem;
            }

            .option-button:hover {
                background-color: #93C5FD;
                border-color: #93C5FD;
            }

            .option-button.selected {
                background-color: #1D4ED8;
                border-color: #1D4ED8;
                color: white;
            }

            .dark .option-button.selected {
                background-color: #2563EB;
                border-color: #2563EB;
                color: white;
            }

            .option-button.selected .fas {
                color: white;
            }
        </style>

        <script>
            function handleRadioChange(radio) {
                var optionButtons = document.querySelectorAll('.option-button');
                optionButtons.forEach(function(button) {
                    button.classList.remove('selected');
                });

                if (radio.checked) {
                    radio.parentElement.classList.add('selected');
                }
            }
        </script>
    </head>
    <title>AccessiJobs | Registration Page</title>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="scrolling-text-container rounded-t-lg">
        <marquee behavior="scroll" direction="left">
            <i class="fas fa-search search-icon"></i>
            <i class="fas fa-briefcase job-icon"></i>
            <span>&nbsp;&nbsp;We Choose Not to Place <span style="color:yellow;">Dis</span> in their <span
                    style="color:yellow;">ABILITY</span>&nbsp;&nbsp;</span>
            <i class="fas fa-heart heart-icon"></i>
            <i class="fas fa-user-graduate skill-icon"></i>
        </marquee>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col md:flex-row ">
            <div class="w-full md:w-1/2  container mx-auto px-6 py-4">
                <div class="flex justify-center">
                    <div class="w-full ">
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4 ">
                            <div class="custom-gradient rounded-lg p-3 py-4">
                                <nav class="text-white text-xl" aria-label="Breadcrumb">
                                    <ol class="list-none p-0 inline-flex items-center">
                                        <li class="flex items-center">
                                            <a href="{{ route('login') }}"
                                                class="hover:text-gray-200 dark:hover:text-gray-200 text-base flex items-center text-xl transition duration-150 ease-in-out">
                                                <i class="fas fa-home text-lg mr-2"></i> {{ __('messages.auth.login') }}
                                            </a>
                                            <svg class="h-5 w-auto text-white mx-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center">
                                            <span class="text-white font-semibold text-xl">
                                                {{ __('Register') }}
                                            </span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div
                                class="message-box flex flex-col items-center text-center mb-4 text-left border-t border-gray-300 pt-6 pb-4 mt-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                <i
                                    class="fas fa-info-circle text-4xl text-blue-600 dark:text-blue-300 icon-animation"></i>
                                <p class="message-text text-gray-800 dark:text-gray-200 leading-relaxed mt-3 px-4">
                                    {!! __('messages.registration.login_message') !!}
                                </p>
                            </div>
                            <div>
                                <b>
                                    <p class="text-black dark:text-gray-200 text-xl">
                                        {{ __('messages.registration.looking_forward') }}</p>
                                </b>
                                <br>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                    <label class="option-button cursor-pointer flex-1">
                                        <input type="radio" name="usertype" value="user" class="mr-2"
                                            onchange="handleRadioChange(this)">
                                        <i class="fas fa-user mr-2"></i>
                                        {{ __('messages.registration.job_applicant') }}
                                    </label>
                                    <label class="option-button cursor-pointer flex-1">
                                        <input type="radio" name="usertype" value="employer" class="mr-2"
                                            onchange="handleRadioChange(this)">
                                        <i class="fas fa-briefcase mr-2"></i>
                                        {{ __('messages.registration.employer') }}
                                    </label>
                                </div>
                            </div>

                            <div class="inline-fields mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 ">
                                <div class="field-group">
                                    <x-input-label class="text-xl" for="first_name" :value="__('messages.registration.First Name')" />
                                    <x-text-input id="firstname" class="block mt-1 w-full" type="text"
                                        placeholder="First Name" name="firstname" :value="old('firstname')" required autofocus
                                        autocomplete="given-name" />
                                </div>
                                <div class="field-group">
                                    <x-input-label class="text-xl" for="middle_name" :value="__('messages.registration.Middle Name')" />
                                    <x-text-input id="middlename" class="block mt-1 w-full" type="text"
                                        placeholder="Middle Name" name="middlename" :value="old('middlename')"
                                        autocomplete="additional-name" />
                                </div>
                                <div class="field-group">
                                    <x-input-label class="text-xl" for="last_name" :value="__('messages.registration.Last Name')" />
                                    <x-text-input id="lastname" class="block mt-1 w-full" type="text"
                                        placeholder="Last Name" name="lastname" :value="old('lastname')" required
                                        autocomplete="family-name" />
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('firstname')" />
                            <x-input-error :messages="$errors->get('middlename')" />
                            <x-input-error :messages="$errors->get('lastname')" />

                            <!-- Email Address -->
                            <div class="relative mt-4">
                                <x-input-label class="text-xl" for="email" :value="__('Email')" />
                                <div class="flex items-center">
                                    <i class="fas fa-envelope absolute left-3 text-gray-400 dark:text-gray-500"></i>
                                    <x-text-input id="email" class="block mt-1 w-full pl-10" type="email"
                                        name="email" :value="old('email')" required autofocus autocomplete="username"
                                        placeholder="Enter Your Email" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4 relative">
                                <x-input-label class="text-xl" for="password" :value="__('Password')" />
                                <x-password-text id="password" type="password" name="password" placeholder="Password"
                                    required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <div id="password-requirements" class="text-md mt-1 text-gray-700 dark:text-gray-200">
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label class="text-xl" for="password_confirmation" :value="__('Confirm Password')" />
                                <x-password-text id="password_confirmation" type="password"
                                    name="password_confirmation" placeholder="Confirm Password" required
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex flex-col space-y-4">
                                <x-primary-button
                                    class="w-full justify-center py-3 text-lg font-semibold transition duration-150 ease-in-out login-button">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    {{ __('messages.registration.register') }}
                                </x-primary-button>


                                <!-- OR Separator -->
                                <div class="flex items-center justify-center my-4">
                                    <div class="border-t border-gray-300 dark:border-gray-600 flex-grow mr-3"></div>
                                    <span class="text-gray-500 dark:text-gray-400 font-medium text-sm">OR</span>
                                    <div class="border-t border-gray-300 dark:border-gray-600 flex-grow ml-3"></div>
                                </div>

                                <!-- Register Now/Already Registered Button -->
                                @php
                                    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
                                @endphp
                                <a class="w-full p-3 shadow-md rounded-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 text-center text-base font-medium register-button dark:register-button"
                                    href="{{ $currentRoute === 'login' ? url('register') : url('login') }}">
                                    <i
                                        class="{{ $currentRoute === 'login' ? 'fa-regular fa-registered mr-2' : 'fas fa-user mr-2' }}"></i>
                                    {{ $currentRoute === 'login' ? __('messages.registration.NOT YET REGISTERED?') : __('messages.registration.ALREADY REGISTERED?') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full shadow-3d lg:w-1/2 mx-0 mt-10 lg:mx-20 md:mx-5 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center overflow-hidden"
                style="margin-right: 0;margin-top: 0px;;">
                <img src="{{ asset('images/revisedregisterbanner.webp') }}" alt="Banner"
                    style="object-fit: cover; width: 92%; padding-top: 1.25rem; padding-bottom: 1.25rem; height: auto; border-radius: 5%;" />
            </div>
        </div>
    </form>
</x-guest-layout>



<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-container img {
        width: 50%;
        height: auto;
    }

    #password {
        padding-right: 2.5rem;
    }


    .requirements-list i {
        margin-right: 8px;
    }

    .text-green-500 {
        color: #10B981;
    }

    .text-red-500 {
        color: #EF4444;
    }

    .inline-fields {
        display: flex;
        gap: 1rem;
    }

    .field-group {
        flex: 1;
    }

    .w-full {
        width: 100%;
    }

    @media (max-width: 768px) {
        .inline-fields {
            flex-direction: column;
        }

        .field-group {
            margin-bottom: 1rem;
        }
    }

    .shadow-3d {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-gradient {
        background: linear-gradient(to right, rgb(29 78 216), rgb(59 130 246), transparent);
        /* Dark blue to light blue to transparent */
    }

    .login-button,
    .register-button {
        transition: background-position 0.3s ease !important;
        background-size: 200% auto !important;
        border: none !important;
        background-image: none !important;
    }

    .login-button {
        background-image: linear-gradient(to right, #1e40af 0%, #3b82f6 50%, #1e40af 100%) !important;
        color: white !important;
    }

    .register-button {
        background-image: linear-gradient(to right, #e5e7eb 0%, #f3f4f6 50%, #e5e7eb 100%) !important;
        color: #4b5563 !important;
    }

    .login-button:hover,
    .register-button:hover {
        background-position: right center !important;
    }

    .login-button:hover {
        color: white !important;
    }

    .register-button:hover {
        color: #1f2937 !important;
    }

    .login-button:focus,
    .register-button:focus {
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5) !important;
    }

    .dark .register-button {
        background-image: linear-gradient(to right, #4b5563 0%, #6b7280 50%, #4b5563 100%) !important;
        color: #e5e7eb !important;
    }

    .dark .register-button:hover {
        color: #f3f4f6 !important;
    }

    @media (prefers-color-scheme: dark) {

        .login-container::before,
        .image-container::after {
            background: linear-gradient(to bottom, #1e3a8a, #2563eb, #3b82f6);
        }

        .login-button {
            background-image: linear-gradient(to right, #1e3a8a 0%, #2563eb 50%, #1e3a8a 100%) !important;
        }
    }

    @media (max-width: 768px) {
        .login-container::before {
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, #1e40af, #3b82f6, #93c5fd);
        }

        .image-container::after {
            width: 100%;
            height: 4px;
            top: auto;
            bottom: 0;
            background: linear-gradient(to right, #1e40af, #3b82f6, #93c5fd);
        }
    }

    .message-box {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.1));
        padding: 2rem;
        border-radius: 10px;
        border-top: 4px solid #3b82f6;
        transition: background 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .message-box:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(29, 78, 216, 0.15));
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
    }

    .message-box p {
        color: #374151;
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.5;
    }

    .icon-animation {
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .icon-animation:hover {
        color: #2563eb;
        transform: scale(1.1) rotate(-5deg);
    }

    .dark .message-box {
        background: linear-gradient(135deg, rgba(75, 85, 99, 0.2), rgba(17, 24, 39, 0.2));
        border-top-color: #4b5563;
    }

    .dark .message-box:hover {
        box-shadow: 0 4px 12px rgba(75, 85, 99, 0.4);
    }

    .dark .message-box p {
        color: #e5e7eb;
    }

    .scrolling-text-container {
        width: 100%;
        overflow: hidden;
        background-color: #1e40af;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        position: relative;
    }

    marquee {
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
        white-space: nowrap;
    }

    marquee span:nth-child(4) {
        color: yellow;
    }

    marquee span:nth-child(6) {
        color: yellow;
    }

    @media (max-width: 768px) {
        .scrolling-text-container {
            padding: 0.25rem 0.5rem;
        }

        marquee {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .scrolling-text-container {
            padding: 0.15rem 0.3rem;
        }

        marquee {
            font-size: 0.9rem;
        }
    }

    .search-icon,
    .job-icon,
    .heart-icon,
    .skill-icon {
        font-size: 1.2rem;
        color: white;
        margin: 0 5px;
        vertical-align: middle;
    }

    .search-icon,
    .heart-icon,
    .skill-icon {
        animation: bounce 1.5s infinite;
    }

    .heart-icon {
        color: #ff6666;
    }

    .skill-icon {
        animation-delay: 0.75s;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .job-icon {
        animation: bounce 1.5s infinite;
    }

    .disability-icon {
        animation: pulse 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    @media (max-width: 768px) {
        .scrolling-text-container {
            padding: 0.25rem 0.5rem;
        }

        .search-icon,
        .job-icon,
        .heart-icon,
        .skill-icon {
            font-size: 1rem;
            margin: 0 3px;
        }
    }

    @media (max-width: 480px) {
        .scrolling-text-container {
            padding: 0.15rem 0.3rem;
        }

        .search-icon,
        .job-icon,
        .heart-icon,
        .skill-icon {
            font-size: 0.9rem;
            margin: 0 2px;
        }
    }
</style>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        togglePassword.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const requirementsMessage = document.getElementById('password-requirements');

        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let requirements = [];

            // Check password length
            if (password.length >= 8) {
                requirements.push(
                    '<i class="fas fa-check-circle text-green-500"></i> At least 8 characters');
            } else {
                requirements.push(
                    '<i class="fas fa-times-circle text-red-500"></i> At least 8 characters');
            }

            // Check for special character
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                requirements.push(
                    '<i class="fas fa-check-circle text-green-500"></i> At least 1 special character'
                );
            } else {
                requirements.push(
                    '<i class="fas fa-times-circle text-red-500"></i> At least 1 special character');
            }

            // Check for number
            if (/\d/.test(password)) {
                requirements.push(
                    '<i class="fas fa-check-circle text-green-500"></i> At least 1 number');
            } else {
                requirements.push('<i class="fas fa-times-circle text-red-500"></i> At least 1 number');
            }

            // Check for uppercase letter
            if (/[A-Z]/.test(password)) {
                requirements.push(
                    '<i class="fas fa-check-circle text-green-500"></i> At least 1 uppercase letter'
                );
            } else {
                requirements.push(
                    '<i class="fas fa-times-circle text-red-500"></i> At least 1 uppercase letter');
            }

            // Update requirements message
            requirementsMessage.innerHTML = requirements.join('<br>');
        });
    });
</script>
