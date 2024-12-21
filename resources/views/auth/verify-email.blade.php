<x-guest-layout>
    <title>AccessiJobs | Verify Email</title>

    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 p-4 mb-6 rounded-lg text-center">
        <h1 class="text-2xl font-bold text-white flex items-center justify-center">
            <i class="fas fa-check-circle mr-2"></i> <!-- Icon added -->
            Welcome to ACCESSIJOBS
        </h1>
    </div>

    <!-- GIF Image, hidden on smaller screens and centered on medium+ screens -->
    <div class="hidden md:flex justify-center mb-6"> <!-- Hide on small screens, center on medium+ screens -->
        <img src="{{ asset('images/verify6.gif') }}" alt="Verification GIF" class="w-100 h-80 object-contain">
    </div>

    <!-- Inner Container for Paragraph and Buttons Only -->
    <div class="max-w-8xl mx-auto p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 leading-relaxed">

        <!-- Heading with Icon -->
        <div class="flex items-center justify-center text-center font-semibold text-gray-700 dark:text-gray-200 mb-4">
            <i class="fas fa-envelope mr-2 text-base sm:text-lg md:text-xl lg:text-2xl"></i>
            <span class="text-base sm:text-lg md:text-xl lg:text-2xl">Email Verification Instructions</span>
        </div>

        <!-- Verification Message -->
        <div class="mb-4 text-lg text-gray-700 dark:text-gray-200 leading-relaxed text-center font-medium">
            <p>{{ __('messages.verify_email') }}</p>
        </div>

        <!-- Status Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 leading-relaxed text-center">
                <p>{{ __('messages.new_verification_link') }}</p>
            </div>
        @endif

        <!-- Centered Action Buttons -->
        <div class="mt-2 flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4">
            <form method="POST" action="{{ route('verification.emailsend') }}" class="w-full md:w-auto">
                @csrf

                <div>
                    <x-primary-button class="w-full md:w-auto px-6 py-3 mt-2 mb-2 text-base md:text-sm lg:text-base flex justify-center text-center">
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                @csrf

                <button type="submit"
                    class="w-full md:w-auto px-6 py-3 mt-2 mb-2 text-base md:text-sm lg:text-base bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 flex justify-center text-center">
                    {{ __('LOG OUT') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
