<section class=" w-full lg:w-4/5 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-6 ">
    <div class="text-gray-900 dark:text-gray-100">
        <div class="max-w-full mx-auto">
            <form action="{{ route('jobs.search') }}" method="GET" class="max-w-7xl mx-auto">
                @csrf
                <div class="flex">
                    <!-- Dropdown Filter -->
                    <div class="relative">
                        <label for="date-filter" class="sr-only">Filter by Date</label>
                        <div class="relative">
                            <select id="custom_recency_filter" name="custom_recency_filter"
                                class="block w-full py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                <option value="">Date Filters</option>
                                <option value="All">All</option>
                                <option value="last-24-hours">Last 24 Hours</option>
                                <option value="last-7-days">Last 7 Days</option>
                                <option value="last-30-days">Last 30 Days</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-700 dark:text-gray-200">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 13.707a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L10 11.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Search Input -->
                    <div class="relative flex-1 ml-2">
                        <input type="search" id="search-dropdown" name="query"
                            class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-white dark:focus:border-blue-500"
                            placeholder="Find Jobs" />

                        <button type="submit"
                            class="absolute top-0 right-0 h-full px-3 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="text-left text-gray-600 text-black dark:text-gray-300">
                        <i class="fas fa-user mr-2"></i> <!-- Font Awesome search icon with margin -->
                        Search Jobs, Company, Description, Location, and Educational Attainment.
                    </label>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-center mt-4">

                    <div class="flex items-center w-full sm:w-auto mb-2 sm:mb-0">
                        <input id="resume_upload" type="file" class="hidden">
                        <label for="resume_upload"
                            class="cursor-pointer inline-block w-full sm:w-auto px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">
                            <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Resume
                            <p class="mt-1 text-xs text-white dark:text-gray-300" id="file_input_help">
                                PDF, DOCX (MAX. 2MB)</p>

                        </label>
                    </div>
                    <div class="flex items-center w-full sm:w-auto">
                        <button id="toggleButton"
                            class="w-full sm:w-auto ml-0 sm:ml-4 px-4 py-2 bg-white text-gray-600 border dark:bg-gray-900 border-gray-500 rounded-lg shadow-sm flex items-center justify-center hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <span class="text-md font-regular">Advanced Filters</span>
                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <div id="filterContainer"
                        class="overflow-hidden max-h-0 shadow-lg mt-4 bg-gray-100 dark:bg-gray-800 rounded-lg transition-all duration-500 ease-in-out">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5">
                            <div class="mt-2">
                                <label for="job-type"
                                    class="block text-sm font-medium text-gray-900 dark:text-gray-200 mb-2">Job
                                    Type</label>
                                <div class="relative mt-2">
                                    <select id="job-type" name="job_type"
                                        class="w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-2 appearance-none">
                                        <option value="">All</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="contract">Contractual</option>
                                        <option value="probationary">Probationary</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <span class="text-gray-400">&#x25BC;</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label for="location"
                                    class="block text-sm font-medium text-gray-900 dark:text-gray-200">Location</label>
                                <input type="text" id="location" name="location"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter location">
                            </div>

                            <div class="mb-2">
                                <label for="min-salary"
                                    class="block text-sm font-medium text-gray-900 dark:text-gray-200">Minimum
                                    Salary</label>
                                <input type="number" id="min-salary" name="min_salary"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter minimum salary">
                            </div>

                            <div class="mb-2">
                                <label for="max-salary"
                                    class="block text-sm font-medium text-gray-900 dark:text-gray-200">Maximum
                                    Salary</label>
                                <input type="number" id="max-salary" name="max_salary"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter maximum salary">
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('toggleButton').addEventListener('click', function() {
                        event.preventDefault()
                        const filterContainer = document.getElementById('filterContainer');
                        if (filterContainer.classList.contains('max-h-0')) {
                            filterContainer.classList.remove('max-h-0');
                            filterContainer.classList.add('max-h-screen');
                        } else {
                            filterContainer.classList.remove('max-h-screen');
                            filterContainer.classList.add('max-h-0');
                        }
                    });
                </script>


            </form>
        </div>


        <div class="flex items-center justify-between mb-6 mt-6">
            <h2 class="text-2xl font-bold">
                <i class="fas fa-briefcase mr-2"></i>Available PWD Jobs
            </h2>
            @php
                $numberOfResults = $jobs->total();
            @endphp

            <div class="text-center sm:text-right">
                @if ($numberOfResults > 0)
                    <p>{{ $numberOfResults }} Results found</p>
                @else
                    <p>No results found</p>
                @endif
                <a href="#" class="text-blue-500 hover:underline inline-block mt-2 sm:mt-0 sm:ml-2">Change Job
                    Preferences</a>
            </div>

        </div>




        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($jobs as $job)
                @if ($jobs->isEmpty())
                    <p>No jobs found.</p>
                @else
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-3d">
                        <div class="mb-4 flex justify-between ">
                            @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                                    class="w-24 h-24 rounded-lg shadow-md">
                            @else
                                <img src="{{ asset('/images/avatar.png') }}" alt="Default Image" class="w-16 h-16">
                            @endif
                            <div>
                                <div class="text-right">
                                    <h3 class="text-xl sm:text-lg md:text-xl lg:text-2xl font-semibold">
                                        {{ $job->title }}</h3>
                                    <p
                                        class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600 dark:text-gray-400 mt-1">
                                        {{ $job->company_name }}</p>
                                </div>

                            </div>
                        </div>

                        <p class="text-sm text-gray-800 mt-2 dark:text-gray-200"><strong>Date Posted:</strong>
                            {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                        </p>

                        <p class="text-sm text-left dark:text-gray-200"><strong>Location:</strong> {{ $job->location }}
                        </p>

                        <div class="mt-2">
                            <p class="text-sm text-gray-800 dark:text-gray-200"><strong>Job Description:</strong>
                                <span id="jobDescription">
                                    {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                    <span id="dots">...</span>
                                    <span id="more" style="display: none;">
                                        {{ substr($job->description, 100) }}
                                    </span>
                                </span>
                            </p>
                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                id="readMoreBtn" class="text-sm text-blue-500 focus:outline-none">Read
                                More..</a>

                        </div>

                        <div class="flex justify-between">
                            <div class="mt-2 mr-4">
                                <p class="text-sm"><strong>Educational Level:</strong>
                                    {{ $job->educational_level }}</p>
                                <p class="text-sm"><strong>Location:</strong> {{ $job->location }}</p>
                                <p class="text-sm"><strong>Job Type:</strong> {{ $job->job_type }}</p>
                                <p class="text-sm"><strong>Salary:</strong>
                                    ₱{{ number_format($job->salary, 2) }}</p>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                    <span class="sr-only">Icon description</span>
                                </a>
                            </div>

                        </div>

                    </div>
                @endif
            @endforeach
        </div>

        <div class="mt-6">
            <nav class="flex flex-col sm:flex-row justify-between items-center">
                @if ($jobs->onFirstPage())
                    <span
                        class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed">
                        Previous
                    </span>
                @else
                    <a href="{{ $jobs->previousPageUrl() }}"
                        class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900">
                        Previous
                    </a>
                @endif

                <div class="flex space-x-2">
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-500 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                @if ($jobs->hasMorePages())
                    <a href="{{ $jobs->nextPageUrl() }}"
                        class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900">
                        Next
                    </a>
                @else
                    <span
                        class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed">
                        Next
                    </span>
                @endif
            </nav>
        </div>
    </div>
</section>

@if (Session::has('jobsno'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('jobsno') }}", 'There are {{ $numberOfResults }} found', {
                timeOut: 5000
            });

        });
    </script>
@endif

<style>
    /* Custom shadow class for 3D effect */
    .shadow-3d {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>
