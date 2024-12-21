<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <title>Dashboard</title>
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <style>
        </style>
    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <main class="max-w-8xl mx-auto px-3 sm:px-1 lg:px-1 py-20 flex flex-wrap gap-4 lg:ml-12">
            <aside class="w-full lg:w-1/6  bg-white dark:bg-gray-800 shadow-3d sm:rounded-lg">
                <div>
                    <div class="mb-4">
                        <div id="medium-modal" tabindex="-1"
                            class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black bg-opacity-75">
                            <div class="relative w-full max-w-4xl overflow-x-hidden overflow-y-auto max-h-[90vh]">
                                <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between dark:border-gray-600">
                                        <div
                                            class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 border-b-4 border-blue-500 rounded-t-lg mb-4 w-full flex items-center justify-between ">
                                            <div class="flex items-center">
                                                <i class="fas fa-briefcase text-2xl text-white mr-2"></i>
                                                <h3 class="text-2xl font-semibold text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"
                                                    aria-label="{{ __('messages.userdashboard.my_job_applications') }}">
                                                    {{ __('messages.userdashboard.my_job_applications') }}</h3>
                                            </div>
                                            <button type="button" onclick="hideModal()" aria-label="Hide Modal"
                                                class="text-white hover:text-gray-700 dark:hover:text-gray-300 ml-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($applications->isEmpty())
                                        <div class="p-6 pb-0 space-y-6 max-h-96 overflow-y-auto">
                                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                                                <div
                                                    class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 w-full mb-8 md:p-6">
                                                    <p class="text-center text-gray-600 dark:text-gray-400 flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        aria-label="  {{ __('messages.userdashboard.no_job_applications_found') }}">
                                                        <i class="fas fa-sad-tear text-2xl mr-2"></i>
                                                        {{ __('messages.userdashboard.no_job_applications_found') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Modal content -->
                                        <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                                @foreach ($applications as $job)
                                                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-3d flex flex-col job-item"
                                                        data-status="{{ $job->status_plain }}">
                                                        <div
                                                            class="bg-gradient-to-r from-blue-500 to-blue-400 p-2 rounded-t-lg mb-4">
                                                            <h4 class="text-lg font-medium text-white dark:text-gray-300 text-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                                tabindex="0" aria-label="Job ID:{{ $job->job_id }}">
                                                                Job ID: {{ $job->job_id }}
                                                            </h4>
                                                        </div>
                                                        <div class="p-4 pt-0">
                                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                                                                {{ strlen($job->description) > 59 ? substr($job->description, 0, 59) . '...' : $job->description }}
                                                            </p>
                                                            <div class="rounded-lg p-2 text-center
                                                             {{ $job->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($job->status === 'hired' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600') }}"
                                                                aria-label="{{ ucfirst($job->status) }}">
                                                                <span id="job-status" class="font-bold">
                                                                    {{ ucfirst($job->status) }}
                                                                </span>
                                                            </div>

                                                            <div class="mt-auto pt-4 mr-2">
                                                                <button
                                                                    onclick="location.href='{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id]) }}'"
                                                                    class="p-2 bg-blue-700 hover:bg-blue-600 text-white w-full py-2 rounded-lg transition flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                                    tabindex="0"
                                                                    aria-label="{{ __('messages.userdashboard.view_details') }}">
                                                                    <i class="fas fa-info-circle mr-2"></i>
                                                                    {{ __('messages.userdashboard.view_details') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Modal footer -->
                                    <div
                                        class="flex flex-col sm:flex-row justify-end p-4 border-t border-gray-300 dark:border-gray-600">
                                        <button onclick="filterItems('hired')"
                                            class="py-2 px-4 bg-green-100 hover:bg-green-200 text-green-800 rounded-lg transition mb-2 sm:mb-0 sm:mr-3 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0" aria-label="Hired">
                                            <i class="fas fa-check mr-2"></i> Hired
                                        </button>
                                        <button onclick="filterItems('pending')"
                                            class="py-2 px-4 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-lg transition mb-2 sm:mb-0 sm:mr-3 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="Pending">
                                            <i class="fas fa-clock mr-2"></i> Pending
                                        </button>
                                        <button onclick="filterItems('all')"
                                            class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition mb-2 sm:mb-0 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="Show All">
                                            <i class="fas fa-list mr-2"></i> Show All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function filterItems(status) {
                                const items = document.querySelectorAll('.job-item'); // Select only job items

                                items.forEach(item => {
                                    const itemStatus = item.getAttribute('data-status');

                                    if (status === 'all' || itemStatus === status) {
                                        item.style.display = 'flex'; // Show matching items
                                    } else {
                                        item.style.display = 'none'; // Hide non-matching items
                                    }
                                });
                            }

                            function hideModal() {
                                document.getElementById('medium-modal').classList.add('hidden');
                            }
                        </script>


                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 rounded-t-lg">
                                <h3 class="text-2xl font-semibold text-center text-white flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0" aria-label="{{ __('messages.userdashboard.menu_items') }}">
                                    <i class="fas fa-list mr-2"></i>
                                    {{ __('messages.userdashboard.menu_items') }}
                                </h3>

                            </div>
                            <div class="bg-white dark:bg-gray-900 p-4 rounded-b-lg">
                                <a href="javascript:void(0);" id="browse-applications-link"
                                    class="block w-full text-center p-2 text-white dark:text-gray-200 bg-gray-700 hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-700 font-semibold py-2 rounded-md mb-2 transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.userdashboard.applications') }}">
                                    <i
                                        class="fas fa-book-open mr-2"></i>{{ __('messages.userdashboard.applications') }}
                                </a>

                                <a href="{{ route('dashboard') }}" id="browse-jobs-link"
                                    class="block w-full text-center p-2 text-white dark:text-white bg-green-700 hover:bg-green-700 dark:bg-green-800 dark:hover:bg-green-800 font-semibold py-2 rounded-md mb-2 transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.userdashboard.browse_jobs') }}">
                                    <i class="fas fa-search mr-2"
                                        aria-label="Browse Jobs"></i>{{ __('messages.userdashboard.browse_jobs') }}
                                </a>

                                <a href="{{ route('dashboard.match') }}" id="matched-jobs-link"
                                    class="block w-full p-3 text-center bg-gray-700 text-white dark:text-gray-200 hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-700 font-semibold py-2 rounded-md transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.userdashboard.matched_jobs') }}">
                                    <i class="fas fa-check mr-2"
                                        aria-label="Matched Jobs"></i>{{ __('messages.userdashboard.matched_jobs') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        @include('layouts.topjobs')
                    </div>
                </div>
            </aside>
            @include('dashboardpartials.browsejobs')
        </main>
    </body>
</x-app-layout>
<footer class="bg-white dark:bg-gray-800 shadow-3d">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <p class="text-sm text-center text-gray-700 dark:text-gray-200">&copy; 2024 AccessiJobs. All rights reserved.
        </p>
    </div>
</footer>


<script>
    // Function to show the modal
    function showModal() {
        var modal = document.getElementById('medium-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Function to hide the modal
    function hideModal() {
        var modal = document.getElementById('medium-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    // Add event listener to the link or button that triggers the modal
    document.getElementById('browse-applications-link').addEventListener('click', function() {
        showModal();
    });

    // Add event listener to close button within modal
    document.querySelector('[data-modal-hide="medium-modal"]').addEventListener('click', function() {
        hideModal();
    });
</script>
