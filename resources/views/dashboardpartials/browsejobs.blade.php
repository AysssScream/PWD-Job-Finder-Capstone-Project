<section class=" w-full lg:w-4/5 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-6 ">
    <div class="text-gray-900 dark:text-gray-100">
        <div class="max-w-full mx-auto">
            <form action="{{ route('jobs.search') }}" method="GET" class="max-w-8xl mx-auto">
                @csrf
                <div class="flex">
                    <!-- Dropdown Filter -->
                    <div class="relative">
                        <label for="custom_recency_filter" class="sr-only">Filter by Date</label>
                        <div class="relative">
                            <select id="custom_recency_filter" name="custom_recency_filter"
                                class="block w-full py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200  dark:bg-gray-700 dark:hover:bg-gray-600  dark:text-white dark:border-gray-600 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                aria-label="Filter by Date">
                                <option value="All">
                                    {{ __('messages.userdashboard.All') }}</option>
                                <option value="last-24-hours" aria-label="Filter by Last 24 Hours">
                                    {{ __('messages.userdashboard.last_24_hours') }}</option>
                                <option value="last-7-days" aria-label="Filter by Last 7 Days">
                                    {{ __('messages.userdashboard.last_7_days') }}</option>
                                <option value="last-30-days" aria-label="Filter by Last 30 Days">
                                    {{ __('messages.userdashboard.last_30_days') }}</option>
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
                            class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:bg-gray-900 dark:border-gray-700 dark:text-white dark:focus:border-blue-500"
                            placeholder="{{ __('messages.userdashboard.job_search_placeholder') }}"
                            aria-label="{{ __('messages.userdashboard.job_search_placeholder') }}" />

                        <button type="submit" aria-label="Search Button"
                            class="absolute top-0 right-0 h-full px-3 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:bg-blue-600 dark:hover:bg-blue-700 ">
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
                    <label
                        class="text-left text-gray-600 text-black dark:text-gray-300 
                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        tabindex="0" aria-label=" {{ __('messages.userdashboard.search_placeholder') }}">
                        <i class="fas fa-user mr-2"></i> <!-- Font Awesome search icon with margin -->
                        {{ __('messages.userdashboard.search_placeholder') }}
                    </label>
                </div>


                <hr class="my-4 border-gray-400 dark:border-gray-600">

                <div class="flex flex-col sm:flex-row justify-between items-center mt-4">

                    {{-- <div class="flex items-center w-full sm:w-auto mb-2 sm:mb-0">
                        <input id="resume_upload" type="file" class="hidden">
                        <label for="resume_upload" aria-label="Upload Resume"
                            class="cursor-pointer inline-block w-full sm:w-auto px-4 py-2  font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">
                            <i class="fas fa-cloud-upload-alt mr-1" aria-label="Upload Resume"></i>
                            {{ __('messages.userdashboard.upload_resume') }}
                            <p class="mt-1  text-white dark:text-gray-300" id="file_input_help"
                                aria-label="Upload Resume">
                                PDF, DOCX (MAX. 2MB)</p>

                        </label>
                    </div> --}}
                    <div class="flex items-center w-full sm:w-auto">
                        <button id="toggleButton" aria-label="Toggle Advanced Filters"
                            class="w-full sm:w-auto ml-0 sm:px-4 py-2 bg-white text-gray-600 border dark:bg-gray-900 border-gray-500 dark:text-gray-200 rounded-lg shadow-sm flex items-center justify-center hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-orange-400">
                            <span class="text-md font-regular">Advanced Filters</span>
                            <svg id="toggleIcon" class="w-6 h-6 ml-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <div id="filterContainer"
                        class="hidden overflow-hidden max-h-screen shadow-lg mt-4 bg-gray-100 dark:bg-gray-800 rounded-lg transition-all duration-500 ease-in-out"
                        aria-hidden="true" aria-labelledby="filterHeading">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5">
                            <div class="mt-2">
                                <label for="job-type"
                                    class="block font-medium text-gray-900 dark:text-gray-200 mb-2">{{ __('messages.userdashboard.job_type') }}</label>
                                <div class="relative mt-2">
                                    <select id="job-type" name="job_type"
                                        aria-label="{{ __('messages.userdashboard.job_type') }}"
                                        class="w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400  p-2 appearance-none">
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
                                    class="block  font-medium text-gray-900 dark:text-gray-200">{{ __('messages.userdashboard.location') }}</label>
                                <input type="text" id="location" name="{{ __('messages.userdashboard.location') }}"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                    placeholder="Enter location"
                                    aria-label="{{ __('messages.userdashboard.location') }}">
                            </div>

                            <div class="mb-2">
                                <label for="min-salary"
                                    class="block  font-medium text-gray-900 dark:text-gray-200">Minimum
                                    Salary</label>
                                <input type="number" id="min-salary" name="min_salary"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                    placeholder="Enter minimum salary" aria-label="Minimum Salary">
                            </div>

                            <div class="mb-2">
                                <label for="max-salary"
                                    class="block  font-medium text-gray-900 dark:text-gray-200">Maximum
                                    Salary</label>
                                <input type="number" id="max-salary" name="max_salary"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                    placeholder="Enter maximum salary" aria-label="Maximum Salary">
                            </div>

                            <div class="mb-2">
                                <label for="max-salary"
                                    class="block  font-medium text-gray-900 dark:text-gray-200">Age
                                    Requirement:</label>
                                <input type="number" id="age" name="age"
                                    class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                    placeholder="Enter Age" aria-label="Age">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const toggleButton = document.getElementById('toggleButton');
                        const filterContainer = document.getElementById('filterContainer');
                        const toggleIcon = document.getElementById('toggleIcon');

                        if (toggleButton && filterContainer && toggleIcon) {
                            toggleButton.addEventListener('click', function(event) {
                                event.preventDefault();

                                // Toggle visibility of filter container
                                filterContainer.classList.toggle('hidden');
                                filterContainer.classList.toggle('max-h-screen');
                                filterContainer.setAttribute('aria-hidden', filterContainer.classList.contains(
                                    'hidden'));

                                // Toggle arrow icon direction
                                toggleIcon.classList.toggle('transform', filterContainer.classList.contains('hidden'));
                                toggleIcon.classList.toggle('rotate-180', !filterContainer.classList.contains(
                                    'hidden'));
                            });
                        } else {
                            console.error('One or more required elements not found.');
                        }
                    });
                </script>
            </form>
        </div>


        <div class="flex items-center justify-between mb-6 mt-10">
            <a href=""
                class="text-2xl font-bold block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                aria-label="{{ __('messages.userdashboard.available_pwd_jobs') }}">
                <i class="fas fa-briefcase mr-2"
                    aria-hidden="true"></i>{{ __('messages.userdashboard.available_pwd_jobs') }}
            </a>
            @php
                $numberOfResults = $jobs->total();
            @endphp

            <div class="text-center sm:text-right">
                @if ($numberOfResults > 0)
                    <a href=""
                        aria-label=" {{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}"
                        class="result-link focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}
                    </a>
                @else
                    <a href="" aria-label="{{ __('messages.userdashboard.no_results_found') }}"
                        class="no-results-link focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.userdashboard.no_results_found') }}
                    </a>
                @endif

                <br> <!-- New line break -->

                <a href="#" id="openModalLink"
                    class="text-blue-500 hover:underline inline-block mt-2 sm:mt-0 sm:ml-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label=" {{ __('messages.userdashboard.change_jobpreferences') }}">
                    {{ __('messages.userdashboard.change_jobpreferences') }}
                </a>
            </div>


        </div>
        <div id="jobPreferencesModal"
            class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center hidden">
            <!-- Modal Content -->
            <div class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-200  w-1/2 p-8 rounded-lg">
                <!-- Modal Header -->
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">{{ __('messages.userdashboard.change_jobpreferences') }}</h3>
                    <i id="closeModalBtn"
                        class="fas fa-times fa-xl text-gray-700 dark:text-gray-200 hover:text-gray-300 focus:outline-none"></i>

                </div>
                <!-- Modal Body -->
                <div class="mt-4">
                    @include('profile.sections.jobpreferences')
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openModalLink = document.getElementById('openModalLink');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const jobPreferencesModal = document.getElementById('jobPreferencesModal');

                openModalLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    jobPreferencesModal.classList.remove('hidden');
                });

                closeModalBtn.addEventListener('click', function() {
                    jobPreferencesModal.classList.add('hidden');
                });
            });
        </script>



        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($jobs as $job)
                @if ($job->vacancy > 0)
                    <div tabindex="0"
                        class="bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700 p-4 rounded-lg shadow-3d focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="Job Number {{ $job->id }}{{ $job->title }}">

                        <div class="mb-4 flex justify-between" aria-label="Job Number {{ $job->id }}">
                            @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                                    aria-label="Company Logo" class="w-24 h-24 rounded-lg shadow-md">
                            @else
                                <img src="{{ asset('/images/avatar.png') }}" alt="Default Image" class="w-24 h-24"
                                    aria-label="Empty Company Logo">
                            @endif

                            <div>
                                <div class="text-right text-black dark:text-white">
                                    <h3
                                        class="text-xl sm:text-lg md:text-xl lg:text-2xl font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {{ $job->title }}</h3>
                                    <p class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600  dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0"
                                        aria-label="Job Number {{ $job->id }}{{ $job->company_name }}">
                                        {{ $job->company_name }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <p class="text-sm text-gray-800 mt-2 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            tabindex="0"
                            aria-label="{{ __('messages.userdashboard.date_posted') }} {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}">
                            <strong>{{ __('messages.userdashboard.date_posted') }}</strong>
                            {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                        </p>

                        <div class="mt-2">
                            <p class="text-sm text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label="{{ __('messages.userdashboard.job_description') }}  {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}"
                                tabindex="0 ">
                                <strong>{{ __('messages.userdashboard.job_description') }}</strong>
                                <span id="jobDescription">
                                    {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                    <span id="dots">...</span>
                                    <span id="more" style="display: none;">
                                        {{ substr($job->description, 100) }}
                                    </span>
                                </span>
                            </p>
                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                id="readMoreBtn"
                                class="text-sm text-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label=" {{ __('messages.userdashboard.read_more') }}" tabindex="0">
                                {{ __('messages.userdashboard.read_more') }}
                            </a>
                        </div>

                        <div class="flex justify-between mt-2 text-black dark:text-white">
                            <div class="mr-4">
                                <p aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <a href=""
                                        aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}"
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        <strong>{{ __('messages.userdashboard.educational_level') }}</strong>
                                        {{ $job->educational_level }}
                                    </a>
                                </p>

                                <a href=""
                                    aria-label="{{ __('messages.userdashboard.location') }}  {{ $job->location }}"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block mb-2">
                                    <strong>{{ __('messages.userdashboard.location') }}</strong>
                                    {{ $job->location }}
                                </a>
                                <a href=""
                                    aria-label="{{ __('messages.userdashboard.job_type') }} {{ $job->job_type }}"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block mb-2">
                                    <strong>{{ __('messages.userdashboard.job_type') }}</strong>
                                    {{ $job->job_type }}
                                </a>
                                <a href=""
                                    aria-label="{{ __('messages.userdashboard.salary') }} {{ number_format($job->salary, 2) }} Pesos"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block">
                                    <strong>{{ __('messages.userdashboard.salary') }}</strong>
                                    ₱{{ number_format($job->salary, 2) }}
                                </a>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="Select Job Number {{ $job->id }}">
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

            @if ($jobs->isEmpty())
                <p class="text-gray-500 dark:text-gray-400 mt-4">No jobs found.</p>
            @endif
        </div>

        <div class="mt-6">
            <nav class="flex flex-col sm:flex-row justify-between items-center">
                @if ($jobs->onFirstPage())
                    <span aria-label="Previous"
                        class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.job.Previous') }}
                    </span>
                @else
                    <a href="{{ $jobs->previousPageUrl() }}" tabindex="0"
                        class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.job.Previous') }}
                    </a>
                @endif

                <div class="flex space-x-2">
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            aria-label="{{ __('messages.job.Page Number') }} {{ $page }}"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-500 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                @if ($jobs->hasMorePages())
                    <a href="{{ $jobs->nextPageUrl() }}" aria-label="Next"
                        class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.job.Next') }}
                    </a>
                @else
                    <span aria-label="Next" tabindex="0"
                        class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.job.Next') }}
                    </span>
                @endif
            </nav>
        </div>
    </div>
</section>

@if (Session::has('preferences'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('preferences') }}", 'Job Preferences Modified Successfully!', {
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
