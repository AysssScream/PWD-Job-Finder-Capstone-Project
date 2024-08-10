<x-guest-layout>
    <title>AccessiJobs | Verify Email</title>

    <div class="max-w-2xl mx-auto">

        <div class="mb-4 text-lg text-gray-700 dark:text-gray-200">
            <p>{{ __('messages.verify_email') }}</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                <p>{{ __('messages.new_verification_link') }}</p>
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.emailsend') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
<footer class="bg-gray-800 text-white w-full py-4 ">
    <div class="container mx-auto text-center">
        <span>&copy; 2024 AccessiJobs. All rights reserved.</span>
    </div>
</footer>
