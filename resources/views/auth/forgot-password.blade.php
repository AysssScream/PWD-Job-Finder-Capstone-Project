<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.passemail') }}">
        @csrf
        <div class="mt-1 max-w-xl sm:max-w-md">
            <div class="mb-4 text-lg text-black-600 dark:text-gray-400">
                <i class="fas fa-lock mr-2"></i>
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />

            <!-- Email Address -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button id="reset-password-btn">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
<footer class="bg-gray-800 text-white w-full py-4 mt-12">
    <div class="container mx-auto text-center">
        <span>&copy; 2024 AccessiJobs. All rights reserved.</span>
    </div>
</footer>
