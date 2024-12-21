<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Resume Matched Jobs</title>
    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <main class="max-w-8xl mx-auto px-3 sm:px-1 lg:px-1 py-20 flex flex-wrap gap-4 lg:ml-12">
            <aside class="w-full lg:w-1/6  bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg ">
                <div class="bg-white dark:bg-gray-800 rounded-lg ">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 rounded-t-lg">
                        <h3 class="text-2xl font-semibold text-center text-white flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            tabindex="0" aria-label="{{ __('messages.userdashboard.menu_items') }}">
                            <i class="fas fa-list mr-2"></i>
                            {{ __('messages.userdashboard.menu_items') }}
                        </h3>
                    </div>
                    <div class="bg-white dark:bg-gray-900 p-4 rounded-b-lg shadow-lg">
                        <a href="{{ route('dashboard') }}" id="matched-jobs-link"
                            class="block w-full p-2 text-center mb-2 bg-gray-700 text-white dark:text-gray-200 hover:bg-gray-800 dark:hover:bg-gray-800 font-semibold py-2 rounded-md transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{{ __('messages.userdashboard.browse_jobs') }}">
                            <i class="fas fa-check mr-2"></i>{{ __('messages.userdashboard.browse_jobs') }}
                        </a>
                        <a href="{{ route('dashboard.match') }}" id="browse-jobs-link"
                            class="block w-full p-4 text-center bg-green-700 hover:bg-green-500 text-white font-semibold py-2 rounded-md transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{{ __('messages.userdashboard.matched_jobs_preferences') }}">
                            <i
                                class="fas fa-search mr-2"></i>{{ __('messages.userdashboard.matched_jobs_preferences') }}
                        </a>
                        <a href="{{ route('dashboard.resumeupload') }}"
                            class="block w-full p-2 mt-2 text-center bg-blue-600 hover:bg-green-500 text-white font-semibold py-2 rounded-md transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{{ __('messages.userdashboard.resume_matched_jobs') }}" tabindex="0">
                            <i class="fas fa-file mr-2"></i>{{ __('messages.userdashboard.resume_matched_jobs') }}
                        </a>
                    </div>
                    <div class="p-4 pt-4">
                        @include('layouts.topjobs')
                    </div>
                </div>
            </aside>
            @include('dashboardpartials.uploadresume')
        </main>
    </body>
</x-app-layout>
<footer class="bg-white dark:bg-gray-800 shadow-3d">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <p class="text-sm text-center text-gray-700 dark:text-gray-200">&copy; 2024 AccessiJobs. All rights reserved.
        </p>
    </div>
</footer>
