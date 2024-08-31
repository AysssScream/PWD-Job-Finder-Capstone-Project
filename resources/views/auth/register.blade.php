<x-guest-layout>
    <title>AccessiJobs | Registration Page</title>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <div class="w-full">
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                            <nav class="text-blue-500 text-lg" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="{{ route('login') }}"
                                            class="hover:text-black dark:hover:text-whites text-lg">
                                            <i class="fas fa-home"></i> {{ __('messages.registration.login') }}

                                        </a>
                                        <svg class="h-5 w-auto text-gray-500 mx-1 dark:text-white" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.293 5.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L12.586 12H4a1 1 0 010-2h8.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </li>
                                    <li class="flex items-center">
                                        <a href=""
                                            class="text-black text-lg dark:text-white">{{ __('messages.registration.register') }}</a>
                                    </li>
                                </ol>
                            </nav>
                            <div class="mb-4 text-md text-black-600 dark:text-gray-200 text-justify">
                                <i class="fas fa-sign-in-alt mr-2 text-blue-500 dark:text-white"></i>
                                {!! __('messages.registration.login_message') !!}

                            </div>
                            <img src="/images/bannerregister.png" alt="Image description"
                                class="w-full h-auto max-w-2xl rounded-lg">
                            <div>
                                <b>
                                    <p class="text-black dark:text-gray-200">
                                        {{ __('messages.registration.looking_forward') }}</p>
                                </b>
                                <br>
                                <label class="radio-inline text-gray-700 dark:text-gray-200">
                                    <input type="radio" name="usertype" value="user" checked>
                                    {{ __('messages.registration.job_applicant') }}
                                </label>
                                &nbsp;
                                <label class="radio-inline text-gray-700 dark:text-gray-200">
                                    <input type="radio" name="usertype" value="employer">
                                    {{ __('messages.registration.employer') }}
                                </label>

                            </div>

                            <br>


                            <div class="inline-fields">
                                <div class="field-group">
                                    <x-input-label for="first_name" :value="__('messages.registration.First Name')" />
                                    <x-text-input id="firstname" class="block mt-1 w-full" type="text"
                                        name="firstname" :value="old('firstname')" required autofocus
                                        autocomplete="given-name" />
                                </div>


                                <div class="field-group">
                                    <x-input-label for="middle_name" :value="__('messages.registration.Middle Name')" />
                                    <x-text-input id="middlename" class="block mt-1 w-full" type="text"
                                        name="middlename" :value="old('middlename')" autocomplete="additional-name" />
                                </div>

                                <div class="field-group">
                                    <x-input-label for="last_name" :value="__('messages.registration.Last Name')" />
                                    <x-text-input id="lastname" class="block mt-1 w-full" type="text"
                                        name="lastname" :value="old('lastname')" required autocomplete="family-name" />
                                </div>

                            </div>
                            <x-input-error :messages="$errors->get('firstname')" />
                            <x-input-error :messages="$errors->get('middlename')" />
                            <x-input-error :messages="$errors->get('lastname')" />


                            <!-- Email Address -->
                            <div class="relative mt-4">
                                <x-input-label for="email" :value="__('Email')" />

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
                                <x-input-label for="password" :value="__('Password')" />
                                <x-password-text id="password" type="password" name="password" placeholder="Password"
                                    required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <div id="password-requirements" class="text-md mt-1 text-gray-700 dark:text-gray-200">
                                </div>
                            </div>



                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-password-text id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Confirm Password" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end">
                                <a class="underline text-sm text-black-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('login') }}">
                                    {{ __('messages.registration.Already registered?') }}
                                </a>

                                <x-primary-button class="ms-4">
                                    {{ __('messages.registration.register') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
<footer class="bg-gray-300 dark:bg-gray-800 text-black dark:text-white w-full py-4">
    <div class="container mx-auto text-center">
        <span>&copy; 2024 AccessiJobs. All rights reserved.</span>
    </div>
</footer>


<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Set the width of the image to half of its container */
    .image-container img {
        width: 50%;
        height: auto;
    }

    #password {
        padding-right: 2.5rem;
        /* Adjust as needed */
    }


    /* Custom styles for Font Awesome icons */
    .requirements-list i {
        margin-right: 8px;
        /* Adjust margin between icon and text */
    }

    .text-green-500 {
        color: #10B981;
        /* Customize green color */
    }

    .text-red-500 {
        color: #EF4444;
        /* Customize red color */
    }

    .inline-fields {
        display: flex;
        gap: 1rem;
        /* Adds space between each input field */
    }

    .field-group {
        flex: 1;
        /* Allows fields to grow and fill the available space */
    }

    .w-full {
        width: 100%;
    }

    @media (max-width: 768px) {
        .inline-fields {
            flex-direction: column;
            /* Stacks elements vertically on smaller screens */
        }

        .field-group {
            margin-bottom: 1rem;
            /* Adds space between stacked elements */
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
