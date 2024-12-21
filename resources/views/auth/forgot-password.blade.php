<x-guest-layout>
    <title>AccessiJobs | Forgot Password</title>

    <div class="mt-2 mb-4">
        <a href="{{ route('login') }}" 
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 border border-blue-300 rounded-lg shadow-sm 
                  hover:bg-blue-200 hover:text-blue-700 dark:text-blue-300 dark:border-blue-400 dark:bg-gray-800 
                  dark:hover:bg-blue-400 dark:hover:text-white transition duration-150 ease-in-out">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Login
        </a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 dark:mb-6" :status="session('status')" />

    <!-- Gradient Header Title -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 p-4 mb-4 rounded-lg">
        <h3 class="text-xl font-semibold text-white text-center">Forgot Password Instructions</h3>
    </div>

    <form method="POST" action="{{ route('password.passemail') }}">
        @csrf
        <div class="mt-1 max-w-2xl md:max-w-3xl dark:bg-gray-800 dark:text-gray-100">
            <!-- Image Section -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/forgotpassword.png') }}" alt="Forgot Password" class="w-100 h-80 object-contain">
            </div>
            <h2 class="text-lg font-semibold mb-4 dark:text-white dark:mb-6 flex items-center">
                <i class="fas fa-lock mr-2 dark:text-gray-300"></i>
                Forgot Your Password?
            </h2>
            <!-- Text Section -->
            <div class="mb-4 dark:text-gray-300 text-center">
                {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="relative mb-4 dark:border-gray-700">
                <x-input-label for="email" :value="__('Email')" class="dark:text-gray-300" />

                <div class="flex items-center dark:text-gray-300">
                    <i class="fas fa-envelope absolute left-3 dark:text-gray-400"></i>
                    <x-text-input id="email" class="block mt-1 w-full pl-10 dark:bg-gray-700 dark:text-gray-100" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" placeholder="Enter Your Email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 dark:text-red-300" />
            </div>
            <div class="flex items-center justify-center mt-4 dark:border-t dark:border-gray-700">
                <x-primary-button id="reset-password-btn" class="dark:bg-blue-500 dark:text-white mt-4 mb-4">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
