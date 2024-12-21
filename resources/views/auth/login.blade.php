<x-guest-layout>
    <title>AccessiJobs | Login Page</title>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 container mx-auto px-6 py-4 login-container bg-white dark:bg-gray-800">
                <div class="flex justify-center">
                    <div class="w-full">
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                            <div class="custom-gradient rounded-lg p-4">
                                <nav class="text-white" aria-label="Breadcrumb">
                                    <ol class="list-none p-0 inline-flex items-center">
                                        <li class="flex items-center">
                                            <a href="{{ route('welcome') }}"
                                                class="hover:text-gray-200 dark:hover:text-gray-200 text-base flex items-center text-xl transition duration-150 ease-in-out">
                                                <i class="fas fa-home text-lg mr-2"></i> {{ __('messages.auth.home') }}
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
                                                {{ __('messages.auth.login') }}
                                            </span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="w-full px-4 py-6">
                                <div
                                    class="w-full bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                                    <div
                                        class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 p-4">
                                        <h3 class="text-xl font-semibold text-white">Login Instructions</h3>
                                    </div>
                                    <div class="p-6">
                                        <div class="flex flex-col items-center justify-center text-center space-y-4">
                                            <div class="bg-blue-100 dark:bg-blue-900 rounded-full p-3 inline-block">
                                                <i
                                                    class="fas fa-info-circle text-3xl text-blue-600 dark:text-blue-400"></i>
                                            </div>
                                            <div class="prose prose-sm dark:prose-invert max-w-none">
                                                <div class="text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                                                    {!! __('messages.auth.login_instructions') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                <div class="p-6">
                                    <div class="relative mb-6">
                                        <x-input-label for="email"
                                            class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-300 flex items-center">
                                            <i class="fas fa-envelope mr-2 text-blue-500"></i>
                                            {{ __('Email') }}
                                        </x-input-label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400 dark:text-gray-500"></i>
                                            </div>
                                            <x-text-input id="email"
                                                class="block w-full pl-10 pr-4 py-3 text-base bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" placeholder="Enter Your Email" />
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
                                    </div>
                                    <div class="mb-6">
                                        <x-input-label for="password"
                                            class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-300 flex items-center">
                                            <i class="fas fa-lock mr-2 text-blue-500"></i>
                                            {{ __('Password') }}
                                        </x-input-label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-gray-400 dark:text-gray-500"></i>
                                            </div>
                                            <x-password-text id="password"
                                                class="block w-full pl-10 pr-4 py-3 text-base bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                                type="password" name="password" required autocomplete="current-password"
                                                placeholder="Enter Your Password" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
                                    </div>
                                    <div class="flex justify-between items-center mb-8">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="custom-checkbox rounded-lg"
                                                name="remember">
                                            <span
                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('messages.auth.remember_me') }}</span>
                                        </label>

                                        @if (Route::has('password.requestpass'))
                                            <a class="text-sm text-right text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition duration-150 ease-in-out"
                                                href="{{ route('password.requestpass') }}">
                                                {{ __('messages.auth.forgot_password') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-6">
                                        <!-- Login Button -->
                                        <x-primary-button
                                            class="w-full justify-center py-4 text-lg font-semibold transition duration-150 ease-in-out login-button">
                                            <i class="fas fa-sign-in-alt mr-2"></i>
                                            {{ __('messages.auth.login') }}
                                        </x-primary-button>

                                        <!-- OR Separator -->
                                        <div class="flex items-center justify-center my-4">
                                            <div class="border-t border-gray-300 dark:border-gray-600 flex-grow mr-3">
                                            </div>
                                            <span class="text-gray-500 dark:text-gray-400 font-medium text-sm">OR</span>
                                            <div class="border-t border-gray-300 dark:border-gray-600 flex-grow ml-3">
                                            </div>
                                        </div>

                                        <!-- Register Now/Already Registered Button -->
                                        @php
                                            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
                                        @endphp
                                        <a class="w-full p-4 shadow-md rounded-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 text-center text-base font-medium register-button dark:register-button"
                                            href="{{ $currentRoute === 'login' ? url('register') : url('login') }}">
                                            <i
                                                class="{{ $currentRoute === 'login' ? 'fa-solid fa-user-plus mr-2' : 'fas fa-user mr-2' }}"></i>
                                            {{ $currentRoute === 'login' ? __('messages.registration.NOT YET REGISTERED?') : __('messages.registration.ALREADY REGISTERED?') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-3/5 mx-0 mt-10 lg:mx-auto md:mx-5 bg-gray-200 dark:bg-gray-700 flex items-center justify-center shadow-3d image-container"
                style="margin-right: 0; margin-top: 0px;">
                <img src="{{ asset('images/loginbanner.webp') }}" alt="Banner" class="w-95 h-full py-6 rounded-lg" />
            </div>

        </div>
    </form>
</x-guest-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
    }

    .login-container {
        position: relative;
        border-radius: 0;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(to bottom, #1e40af, #3b82f6, #93c5fd);
    }

    .image-container {
        position: relative;
        overflow: hidden;
    }

    .image-container::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(to bottom, #1e40af, #3b82f6, #93c5fd);
    }

    .image-container img {
        width: 92%;
        height: auto;
        object-fit: cover;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        border-radius: 5%;
    }

    .shadow-3d {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-gradient {
        background: linear-gradient(to right, #1e40af, #3b82f6, #93c5fd);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        letter-spacing: -0.025em;
    }

    p,
    input,
    button,
    a {
        line-height: 1.5;
    }

    .text-shadow {
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    input,
    select,
    textarea {
        font-size: 16px;
    }

    button,
    .button {
        font-weight: 600;
        letter-spacing: 0.025em;
    }

    a {
        text-decoration: none;
        transition: color 0.2s ease;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 640px) {
        body {
            font-size: 14px;
        }

        h1 {
            font-size: 1.75rem;
        }

        h2 {
            font-size: 1.5rem;
        }
    }

    .custom-checkbox {
        @apply rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-blue-600 focus:ring-1 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-600 dark:border-transparent dark:focus:border-transparent dark:focus:bg-gray-600 dark:text-blue-400;
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
