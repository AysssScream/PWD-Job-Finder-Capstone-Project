<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Review Applicants</title>
        <style>
            .applicant-card {
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.5s ease forwards;
            }

            .applicant-card:hover {
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
                                    <button onclick="window.location.href='{{ route('employer.dashboard') }}'"
                                        class="flex items-center px-3 py-2 text-sm md:px-4 md:py-2 md:text-base bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-600 dark:hover:bg-blue-700">
                                        <i class="fas fa-chevron-left mr-2"></i>
                                        <span>Back to Dashboard</span>
                                    </button>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-users mr-3 text-blue-500"></i>
                            Review Hired Applicants
                        </h1>
                    </div>

                    <!-- Search and Filter -->
                    <div
                        class="flex flex-col md:flex-row justify-between items-stretch space-y-4 md:space-y-0 md:space-x-4">
                        <!-- Search Bar -->
                        <div class="relative w-full md:w-1/2">
                            <div class="relative">
                                <input type="text" id="applicantSearch"
                                    placeholder="Search applicants (e.g., 'Web Developer')"
                                    class="w-full pl-12 pr-10 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out shadow-sm hover:shadow-md dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    aria-label="Search applicants">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400 text-lg"></i>
                                </div>
                                <div class="loading-indicator">
                                    <i class="fas fa-spinner fa-spin text-blue-500"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Date Range and Status Filter Dropdowns -->
                        <form id="filterForm" method="GET" action="{{ route('employer.reviewhired') }}">
                            <div
                                class="flex flex-col sm:flex-row items-stretch space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                                <select id="dateFilter" name="dateFilter"
                                    class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 px-6 py-2 flex-grow">
                                    <option value="All">All Dates</option>
                                    <option value="last-24-hours">Last 24 Hours</option>
                                    <option value="last-7-days">Last 7 Days</option>
                                    <option value="last-30-days">Last 30 Days</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto max-w-8xl px-4 pt-2 pb-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
            <div class="bg-gray-100 dark:bg-gray-700 p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center">
                    <i class="fas fa-users text-blue-500 mr-3" aria-hidden="true"></i>
                    Review Hired Applicants
                </h1>
            </div>

            <div class="p-6 pt-8">
                @if ($applications->isEmpty())
                    <div class="text-center py-10">
                        <i class="fas fa-user-times text-gray-400 text-5xl mb-4" aria-hidden="true"></i>
                        <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No Applicants Yet</h2>
                        <p class="text-gray-500 dark:text-gray-400 mb-4">There are no applicants for your job postings
                            at the moment.</p>
                    </div>
                @else
                    <div id="applicantGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($applications as $application)
                            <div class="applicant-card bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl"
                                data-date="{{ $application->created_at->format('Y-m-d') }}"
                                data-description="{{ $application->description }}"
                                data-status-plain="{{ $application->status_plain }}">
                                <div
                                    class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 relative">
                                    <div
                                        class="absolute top-4 right-4 w-12 h-12 bg-white dark:bg-gray-800 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xl shadow">
                                        {{ $loop->iteration }}
                                    </div>
                                    <h3 class="text-2xl font-bold text-white flex items-center pr-16 mb-2">
                                        <i class="fas fa-user-tie mr-3 text-3xl" aria-hidden="true"></i>
                                        <span class="truncate">Applicant {{ $loop->iteration }}</span>
                                    </h3>
                                    <p class="text-blue-100 dark:text-blue-200 flex items-center">
                                        <i class="fas fa-briefcase mr-2" aria-hidden="true"></i>
                                        {{ Str::limit($application->description, 30) }}
                                    </p>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <p
                                            class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 flex items-center">
                                            <i class="fas fa-user-circle mr-2 text-blue-500 dark:text-blue-400"
                                                aria-hidden="true"></i>
                                            {{ $application->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Status">
                                            <i class="fas fa-info-circle mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Status:</span>
                                            <span
                                                class="{{ $application->status_plain === 'pending' ? 'text-orange-500' : 'text-green-500' }} font-bold">
                                                {{ strtoupper($application->status_plain) }}
                                            </span>
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Remarks">
                                            <i class="fas fa-comment mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Remarks:</span>
                                            {{ Str::limit($application->remarks, 30) }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center"
                                            aria-label="Date Applied">
                                            <i class="fas fa-calendar-alt mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold mr-2">Date Applied:</span>
                                            {{ $application->created_at->format('F j, Y') }}
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center mb-2"
                                            aria-label="Job Description">
                                            <i class="fas fa-file-alt mr-3 text-blue-500 dark:text-blue-400 w-5"
                                                aria-hidden="true"></i>
                                            <span class="font-semibold">Description:</span>
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2 pl-8">
                                            {{ Str::limit($application->description, 100) }}
                                        </p>
                                    </div>
                                    <div class="mt-6 flex justify-center">
                                        @if ($application->status_plain !== 'hired')
                                            <a href="{{ route('employer.applicantinfo', ['id' => $application->user_id, 'job_id' => $application->job_id]) }}"
                                                class="action-button bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 flex items-center transform hover:scale-105"
                                                aria-label="Review Application">
                                                <i class="fas fa-check-circle mr-2" aria-hidden="true"></i>Review
                                                Application
                                            </a>
                                        @else
                                            <span class="text-success text-green-500 font-bold flex items-center">
                                                <i class="fas fa-user-check mr-2" aria-hidden="true"></i> Hired

                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="noResults" class="hidden text-center py-8">
                        <i class="fas fa-search text-gray-400 text-5xl mb-4"></i>
                        <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No applicants found
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400">There are no applicants matching your search
                            criteria.</p>
                    </div>
                    <div id="pagination" class="mt-8 flex justify-center items-center space-x-2">
                        <button id="prevPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50">Previous</button>
                        <span id="pageInfo" class="text-gray-700 dark:text-gray-300"></span>
                        <button id="nextPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50">Next</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
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

        function filterApplicants() {
            const searchTerm = document.getElementById('applicantSearch').value.toLowerCase();
            const dateFilterValue = document.getElementById('dateFilter').value;
            const applicantCards = document.querySelectorAll('.applicant-card');
            const now = new Date();
            let visibleApplicants = [];

            applicantCards.forEach(card => {
                const description = card.dataset.description.toLowerCase();
                const status = card.dataset.statusPlain.toLowerCase(); // Assuming you've added this data attribute
                const applicationDate = new Date(card.dataset.date);
                let dateMatch = true;
                let statusMatch = true;

                // Date filtering
                if (dateFilterValue === 'last-24-hours') {
                    dateMatch = (now - applicationDate) <= 24 * 60 * 60 * 1000;
                } else if (dateFilterValue === 'last-7-days') {
                    dateMatch = (now - applicationDate) <= 7 * 24 * 60 * 60 * 1000;
                } else if (dateFilterValue === 'last-30-days') {
                    dateMatch = (now - applicationDate) <= 30 * 24 * 60 * 60 * 1000;
                }


                // Combine search, date, and status filtering
                if (description.includes(searchTerm) && dateMatch && statusMatch) {
                    visibleApplicants.push(card);
                }
                card.style.display = 'none';
            });

            updatePagination(visibleApplicants);
        }

        function updatePagination(visibleApplicants) {
            const totalPages = Math.ceil(visibleApplicants.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            visibleApplicants.forEach((applicant, index) => {
                if (index >= startIndex && index < endIndex) {
                    applicant.style.display = '';
                } else {
                    applicant.style.display = 'none';
                }
            });

            const prevButton = document.getElementById('prevPage');
            const nextButton = document.getElementById('nextPage');
            const pageInfo = document.getElementById('pageInfo');

            prevButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;
            pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

            const noResults = document.getElementById('noResults');
            const applicantGrid = document.getElementById('applicantGrid');
            const pagination = document.getElementById('pagination');

            if (visibleApplicants.length === 0) {
                applicantGrid.classList.add('hidden');
                pagination.classList.add('hidden');
                noResults.classList.remove('hidden');
                noResults.querySelector('p').textContent =
                    `There are no applicants matching "${document.getElementById('applicantSearch').value}"`;
            } else {
                applicantGrid.classList.remove('hidden');
                pagination.classList.remove('hidden');
                noResults.classList.add('hidden');
            }
        }

        function changePage(direction) {
            currentPage += direction;
            filterApplicants();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const applicantSearch = document.getElementById('applicantSearch');
            const dateFilter = document.getElementById('dateFilter');
            const loadingIndicator = document.querySelector('.loading-indicator');
            const prevButton = document.getElementById('prevPage');
            const nextButton = document.getElementById('nextPage');

            const debouncedFilterApplicants = debounce(() => {
                loadingIndicator.style.display = 'none';
                currentPage = 1; // Reset to first page on new search
                filterApplicants();
            }, 300);

            applicantSearch.addEventListener('input', () => {
                loadingIndicator.style.display = 'block';
                debouncedFilterApplicants();
            });
            dateFilter.addEventListener('change', () => {
                currentPage = 1; // Reset to first page on date filter change
                filterApplicants();
            });


            prevButton.addEventListener('click', () => changePage(-1));
            nextButton.addEventListener('click', () => changePage(1));

            filterApplicants();
        });
    </script>
</x-app-layout>
