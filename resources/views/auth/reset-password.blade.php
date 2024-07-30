<x-guest-layout>


    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4 text-lg text-black-600 dark:text-gray-400">
                {{ __('Before resetting your password, please make sure it meets the following criteria: It must contain at least one uppercase letter and one special character.') }}
            </div>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                {{-- <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" /> --}}

                <x-password-text id="password" type="password" name="password" placeholder="Enter your New Password."
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />


                <x-password-text id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Enter your New Confirmed Password." required autocomplete="new-password" />


                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button id="reset-password-btn">
                    {{ __('Reset Password') }}
                </x-primary-button>

            </div>
        </form>
    </div>
    </div>
</x-guest-layout>
<footer class="bg-gray-800 text-white w-full py-4 ">
    <div class="container mx-auto text-center">
        <span>&copy; 2024 AccessiJobs. All rights reserved.</span>
    </div>
</footer>
