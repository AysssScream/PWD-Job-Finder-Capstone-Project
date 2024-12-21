<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Saved Jobs</title>
        <style>
            .job-card {
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.5s ease forwards;
            }

            .job-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                border: 1px solid #3B82F6;
            }

            .action-button {
                transition: all 0.2s ease;
            }

            .action-button:hover {
                transform: scale(1.05);
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .loading-indicator {
                display: none;
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
            }

            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    </head>

    <div class="py-8" style="padding-top: 30px; padding-bottom: 5px;">
        <div class="container mx-auto max-w-8xl px-4">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-4 md:p-6 space-y-4 md:space-y-6">
                    <!-- Breadcrumb and Title -->
                    <div
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                        <nav aria-label="breadcrumb" class="w-full md:w-auto mb-4 md:mb-0">
                            <ol class="list-reset flex items-center space-x-2 text-sm">
                                <li>
                                    <button onclick="window.location.href='{{ route('dashboard') }}'"
                                        class="flex items-center px-3 py-2 text-sm md:px-4 md:py-2 md:text-base bg-blue-700 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:bg-blue-600 dark:hover:bg-blue-700"
                                        aria-label="{{ __('messages.savedjobs.back_to_dashboard') }}">
                                        <i class="fas fa-chevron-left mr-2"></i>
                                        <span>{{ __('messages.savedjobs.back_to_dashboard') }}</span>
                                    </button>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            tabindex="0" aria-label="{{ __('messages.savedjobs.saved_jobs') }}">
                            <i class="fas fa-bookmark mr-3 text-blue-500"></i>
                            {{ __('messages.savedjobs.saved_jobs') }}
                        </h1>
                    </div>

                    <!-- Search and Filter -->
                    <div
                        class="flex flex-col md:flex-row justify-between items-stretch space-y-4 md:space-y-0 md:space-x-4">
                        <!-- Search Bar -->
                        <div class="relative w-full md:w-1/2">
                            <div class="relative">
                                <input type="text" id="jobSearch"
                                    placeholder="Search saved jobs (e.g., 'Web Developer')"
                                    class="w-full pl-12 pr-10 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 transition duration-150 ease-in-out shadow-sm hover:shadow-md dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    aria-label="Search saved jobs">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400 text-lg"></i>
                                </div>
                                <div class="loading-indicator">
                                    <i class="fas fa-spinner fa-spin text-blue-500"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Date Range Filter Dropdown -->
                        <div
                            class="flex flex-col sm:flex-row items-stretch space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                            <select id="dateFilter" name="dateFilter" aria-label="Date Filters"
                                class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 px-8 py-2 flex-grow">
                                <option value="all">All Time</option>
                                <option value="last-24-hours">Last 24 Hours</option>
                                <option value="last-7-days">Last 7 Days</option>
                                <option value="last-30-days">Last 30 Days</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-8xl px-4 pt-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
            <div class="bg-gray-100 dark:bg-gray-700 p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center">
                    <i class="fas fa-bookmark text-blue-500 mr-3" aria-hidden="true"></i>
                    Saved Jobs
                </h1>
            </div>

            <div class="p-6 pt-8">
                @if ($savedJobs->isEmpty())
                    <div class="text-center py-10">
                        <i class="fas fa-folder-open text-gray-400 text-5xl mb-4" aria-hidden="true"></i>
                        <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No Saved Jobs Yet</h2>
                        <p class="text-gray-500 dark:text-gray-400">Start saving jobs you're interested in to see them
                            here.</p>
                        <a href="{{ route('jobs.search') }}"
                            class="mt-4 inline-block bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition-colors duration-200">
                            Search for Jobs
                        </a>
                    </div>
                @else
                    <div id="jobGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($savedJobs as $job)
                            <div class="job-card bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                data-date="{{ $job->created_at->format('Y-m-d') }}" data-title="{{ $job->title }}"
                                aria-label="Job {{ $loop->iteration }} {{ $job->title }} by {{ $job->company_name }} "
                                tabindex="0">
                                <div
                                    class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 relative">
                                    <div
                                        class="absolute top-4 right-4 w-12 h-12 bg-white dark:bg-gray-800 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xl shadow">
                                        {{ $loop->iteration }}
                                    </div>
                                    <h3 class="text-2xl font-bold text-white flex items-center pr-16 mb-2">
                                        <i class="fas fa-briefcase mr-3 text-3xl" aria-hidden="true"></i>
                                        <span class="truncate">{{ $job->title }}</span>
                                    </h3>
                                    <p class="text-blue-100 dark:text-blue-200 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2" aria-hidden="true"></i>
                                        {{ $job->location }}
                                    </p>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Company Name">
                                            <i class="fas fa-building mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Company:</span> {{ $job->company_name }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Job Title">
                                            <i class="fas fa-tag mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Title:</span> {{ $job->title }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Saved Date">
                                            <i class="fas fa-calendar-alt mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Saved:</span>
                                            {{ $job->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div class="mt-6 flex justify-between items-center">
                                        <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id]) }}"
                                            class="action-button bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 flex items-center transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="View Job Details for {{ $job->title }}">
                                            <i class="fas fa-eye mr-2" aria-hidden="true"></i>{!! __('messages.savedjobs.view_job') !!}
                                        </a>
                                        <form action="{{ route('save.destroy', ['id' => $job->id]) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                onclick="openDeleteModal('{{ $job->id }}', '{{ $job->title }}')"
                                                class="action-button bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 flex items-center transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Delete Saved Job {{ $job->title }}">
                                                <i class="fas fa-trash-alt mr-2"
                                                    aria-hidden="true"></i>{!! __('messages.savedjobs.delete_job') !!}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="noResults" class="hidden text-center py-8">
                        <i class="fas fa-search text-gray-400 text-5xl mb-4"></i>
                        <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No jobs found</h2>
                        <p class="text-gray-500 dark:text-gray-400">There are no saved jobs matching your search
                            criteria.</p>
                    </div>
                    <div id="pagination" class="mt-8 flex justify-center items-center space-x-2">
                        <button id="prevPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{!! __('messages.previous') !!}" tabindex="0">Previous</button>
                        <span id="pageInfo" class="text-gray-700 dark:text-gray-300"></span>
                        <button id="nextPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{!! __('messages.next') !!}" tabindex="0">Next</button>
                    </div>
                @endif
            </div>

        </div>
        <br>
        <br>
        <br>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Transparent Overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-30 dark:bg-opacity-90 transition-opacity"
                aria-hidden="true"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Delete Saved Job
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                    Are you sure you want to delete this saved job? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:bg-red-700 dark:hover:bg-red-800 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-700 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>



    @if (Session::has('jobdelete'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("{{ Session::get('jobdelete') }}", 'Job has been Deleted', {
                    timeOut: 5000
                });
            });
        </script>
    @endif

    <script>
        let currentPage = 1;
        const itemsPerPage = 6; // Adjust this value as needed

        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        function filterJobs() {
            const searchTerm = document.getElementById('jobSearch').value.toLowerCase();
            const dateFilterValue = document.getElementById('dateFilter').value;
            const jobCards = document.querySelectorAll('.job-card');
            const now = new Date();
            let visibleJobs = [];

            jobCards.forEach(card => {
                const title = card.querySelector('h3 span').textContent.toLowerCase();
                const jobDate = new Date(card.dataset.date);
                let dateMatch = true;

                // Date filtering
                if (dateFilterValue === 'last-24-hours') {
                    dateMatch = (now - jobDate) <= 24 * 60 * 60 * 1000;
                } else if (dateFilterValue === 'last-7-days') {
                    dateMatch = (now - jobDate) <= 7 * 24 * 60 * 60 * 1000;
                } else if (dateFilterValue === 'last-30-days') {
                    dateMatch = (now - jobDate) <= 30 * 24 * 60 * 60 * 1000;
                }

                // Combine search and date filtering
                if (title.includes(searchTerm) && dateMatch) {
                    visibleJobs.push(card);
                }
                card.style.display = 'none';
            });

            updatePagination(visibleJobs);
        }

        function updatePagination(visibleJobs) {
            const totalPages = Math.ceil(visibleJobs.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            visibleJobs.forEach((job, index) => {
                if (index >= startIndex && index < endIndex) {
                    job.style.display = '';
                } else {
                    job.style.display = 'none';
                }
            });

            const prevButton = document.getElementById('prevPage');
            const nextButton = document.getElementById('nextPage');
            const pageInfo = document.getElementById('pageInfo');

            prevButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;
            pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

            const noResults = document.getElementById('noResults');
            const jobGrid = document.getElementById('jobGrid');
            const pagination = document.getElementById('pagination');

            if (visibleJobs.length === 0) {
                jobGrid.classList.add('hidden');
                pagination.classList.add('hidden');
                noResults.classList.remove('hidden');
                noResults.querySelector('p').textContent =
                    `There are no saved jobs matching "${document.getElementById('jobSearch').value}"`;
            } else {
                jobGrid.classList.remove('hidden');
                pagination.classList.remove('hidden');
                noResults.classList.add('hidden');
            }
        }

        function changePage(direction) {
            currentPage += direction;
            filterJobs();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const jobSearch = document.getElementById('jobSearch');
            const dateFilter = document.getElementById('dateFilter');
            const loadingIndicator = document.querySelector('.loading-indicator');
            const prevButton = document.getElementById('prevPage');
            const nextButton = document.getElementById('nextPage');

            const debouncedFilterJobs = debounce(() => {
                loadingIndicator.style.display = 'none';
                currentPage = 1; // Reset to first page on new search
                filterJobs();
            }, 300);

            jobSearch.addEventListener('input', () => {
                loadingIndicator.style.display = 'block';
                debouncedFilterJobs();
            });
            dateFilter.addEventListener('change', () => {
                currentPage = 1; // Reset to first page on date filter change
                filterJobs();
            });

            prevButton.addEventListener('click', () => changePage(-1));
            nextButton.addEventListener('click', () => changePage(1));

            // Initial filter to set up the view
            filterJobs();
        });

        function openDeleteModal(jobId, jobTitle) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            const modalTitle = document.getElementById('modal-title');

            form.action = "{{ route('save.destroy', '') }}/" + jobId;
            modalTitle.textContent = `Delete Saved Job: ${jobTitle}`;
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }

        // Close modal if clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }

        // Update the delete button in the job card to use the modal
        document.querySelectorAll('.job-card').forEach(card => {
            const deleteButton = card.querySelector('button[type="submit"]');
            const jobId = card.dataset.jobId;
            const jobTitle = card.querySelector('h3 span').textContent;

            deleteButton.onclick = function(e) {
                e.preventDefault();
                openDeleteModal(jobId, jobTitle);
            };
        });
    </script>
</x-app-layout>
