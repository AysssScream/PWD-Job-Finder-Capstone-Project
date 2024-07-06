<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

        <main class="max-w-7xl mx-auto sm:px-1 lg:px-1 py-12 flex flex-wrap gap-4">
            <aside class="w-full md:w-1/6  bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4">
                <div>
                    <h3 class="text-lg font-semibold mb-2 mt-2"></h3>
                    <div class="mb-4">
                        <a href="{{ route('dashboard') }}" id="matched-jobs-link"
                            class="block w-full text-center mb-2 bg-gray-900 text-white dark:text-gray-200 bg-gray-200 hover:bg-black dark:hover:bg-gray-700 font-semibold py-2 rounded-md transition">
                            <i class="fas fa-check mr-2"></i>Browse Jobs
                        </a>
                        <a href="{{ route('dashboard.match') }}" id="browse-jobs-link"
                            class="block w-full text-center text-white  bg-green-600 hover:bg-green-600 text-white font-semibold py-2 rounded-md ">
                            <i class="fas fa-search mr-2"></i>Matched Jobs
                        </a>
                    </div>
                    <hr class="my-4 border-gray-200 dark:border-gray-900">
                    <!-- Sidebar content (links, filters, etc.) -->

                    @include('layouts.topjobs')
                    <hr class="my-4 border-gray-200 dark:border-gray-900">

                    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200">
                        <i class="fas fa-chalkboard-teacher mr-2"></i> Trainings
                    </h3>
                    <hr class="my-4 border-gray-200 dark:border-gray-900">
                    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200">
                        <i class="fas fa-lightbulb mr-2"></i> Career Advice
                    </h3>
                </div>
            </aside>
            @include('dashboardpartials.matchedjobs')
        </main>
    </body>
</x-app-layout>
<footer class="bg-white dark:bg-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
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
