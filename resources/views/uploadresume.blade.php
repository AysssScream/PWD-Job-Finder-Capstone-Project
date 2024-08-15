<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Resume Matched Jobs</title>
    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <main class="max-w-8xl mx-auto px-3 sm:px-1 lg:px-1 py-20 flex flex-wrap gap-4 lg:ml-12">
            <aside class="w-full lg:w-1/6  bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4">
                <div>
                    <h3 class="text-lg font-semibold mb-2 mt-2"></h3>
                    <div class="mb-4">
                        <a href="{{ route('dashboard') }}" id="matched-jobs-link"
                            aria-label="{{ __('messages.userdashboard.browse_jobs') }}"
                            class="block w-full p-2 text-center mb-2 bg-gray-900 text-white dark:text-gray-200  bg-gray-200 hover:bg-black dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 font-semibold py-2 rounded-md transition">
                            <i class="fas fa-check mr-2"></i>{{ __('messages.userdashboard.browse_jobs') }}
                        </a>
                        <a href="{{ route('dashboard.match') }}" id="browse-jobs-link"
                            aria-label="{{ __('messages.userdashboard.matched_jobs') }}"
                            class="block w-full p-4 text-center text-white  bg-green-600 hover:bg-green-500  text-white font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 py-2 rounded-md ">
                            <i
                                class="fas fa-search mr-2"></i>{{ __('messages.userdashboard.matched_jobs_preferences') }}
                        </a>

                        <a href="{{ route('dashboard.resumeupload') }}"
                            aria-label="{{ __('messages.userdashboard.resume_matched_jobs') }}"
                            class="block w-full p-2 mt-2 text-center text-white bg-blue-600 hover:bg-green-500  text-white font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 py-2 rounded-md "
                            aria-label="{{ __('messages.userdashboard.upload_resume') }}" tabindex="0">
                            <i class="fas fa-file mr-2"></i>{{ __('messages.userdashboard.resume_matched_jobs') }}
                        </a>
                    </div>
                    <hr class="my-4 border-gray-400 dark:border-gray-900">
                    <!-- Sidebar content (links, filters, etc.) -->

                    @include('layouts.topjobs')
                    <hr class="my-4 border-gray-400 dark:border-gray-900">

                    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="{{ __('messages.userdashboard.trainings') }}" tabindex="0">
                        <i class="fas fa-chalkboard-teacher mr-2"></i> {{ __('messages.userdashboard.trainings') }}
                    </h3>
                    <hr class="my-4 border-gray-400 dark:border-gray-900">
                    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="{{ __('messages.userdashboard.career_advice') }}" tabindex="0">
                        <i class="fas fa-lightbulb mr-2"></i> {{ __('messages.userdashboard.career_advice') }}
                    </h3>
                </div>
            </aside>
            @include('dashboardpartials.uploadresume')
        </main>
    </body>
</x-app-layout>
<footer class="bg-white dark:bg-gray-800 shadow-sm">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <p class="text-sm text-gray-600 dark:text-gray-400">&copy; 2024 Job Finder. All rights reserved.</p>
    </div>
</footer>


<script>
    // JavaScript to handle dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown');

        dropdownButton.addEventListener('click', function() {
            const isOpen = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', !isOpen);
            dropdownButton.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
        });

        // Close dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>
