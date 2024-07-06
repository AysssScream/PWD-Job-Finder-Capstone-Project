<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>


    <div class="py-12">
        <!-- Padding top and bottom of 12 (48px) -->

        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid lg:gap-8  gap-4 lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1">
            <!-- Responsive grid container with padding, three columns on large screens, one column on medium and small screens, no gap on medium and small screens -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
                <!-- First column: White background with shadow and rounded corners, full height on small screens -->

                <div
                    class="w-full h-full p-6 text-gray-900 dark:text-gray-100 rounded-lg flex flex-col justify-between">
                    <!-- Padding, text color, rounded corners, and full height flex container -->
                    <!-- Padding, text color, rounded corners, and full height flex container -->

                    <!-- Content area at the top -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <!-- Left side: Breadcrumb -->
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="flex items-center space-x-2 text-gray-500 dark:text-gray-300">
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        /
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page">Dashboard</a>
                                    </li>
                                </ol>

                            </nav>



                            <!-- Button to add a new job -->
                        </div>


                        <!-- Image Preview -->
                        <div
                            class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-white rounded-full overflow-hidden mx-auto mb-4 border border-gray-700 shadow-lg">
                            <img id="imagePreview" src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                alt="Profile Picture" class="w-full h-full object-contain">
                        </div>


                        <!-- Edit Profile Button -->
                        <div class="text-center">
                            <div
                                class="bg-gray-100 dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6 custom-shadow">
                                <!-- Container with padding and shadow -->
                                <p class="text-gray-800 dark:text-white mb-2 font-semibold text-xl">
                                    {{ $profile->businessname }}</p>

                                <!-- Contact person with smaller font size -->
                                <p class="text-gray-800 dark:text-gray-300 mb-2 text-md">{{ $profile->contact_person }}
                                </p>

                                <!-- Location type, Employer type -->
                                <div class="inline-block">
                                    <i class="fas fa-map-marker-alt text-gray-600 dark:text-gray-400 mr-1"></i>
                                    <p class="text-gray-800 dark:text-gray-300 mb-2 text-md inline">
                                        {{ $profile->locationtype }}</p>
                                    <span class="text-gray-800 dark:text-gray-300 mb-2 text-md mx-1 inline">|</span>
                                    <p class="text-gray-800 dark:text-gray-300 mb-2 text-md inline">
                                        {{ $profile->employertype }}</p>
                                </div>


                                <div class="flex justify-center items-center mt-4">
                                    <!-- Flex container to align items to the center -->

                                    <a href="{{ route('employer.profile') }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Company Profile
                                    </a>

                                    <!-- Edit Profile button with background color, hover effect, padding, rounded corners, and smaller text size -->
                                </div>
                            </div>

                            <div class="flex items-center justify-center mt-3">
                                <div
                                    class="w-full text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white custom-shadow">

                                    <!-- Button 1 -->
                                    <button type="button" onclick="window.location='{{ route('employer.profile') }}'"
                                        id="toggleProfileButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-user-circle mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Company Profile</span>
                                    </button>

                                    <button type="button" onclick="window.location='{{ route('employer.review') }}'"
                                        id="toggleApplicantButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-address-card mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Review Applicants</span>
                                    </button>

                                    <button type="button" onclick="window.location='{{ route('employer.manage') }}'"
                                        id="toggleJobOrderButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-file-alt mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Created Job Orders</span>
                                    </button>

                                    <button type="button" onclick="window.location='#'" id="togglePersonalButton4"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-comments mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Provide Feedback</span>
                                    </button>

                                    <button type="button" onclick="window.location='#'" id="togglePersonalButton5"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-question-circle mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Frequently Asked Questions</span>
                                    </button>



                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- End of content area -->

                    <!-- Additional content at the bottom (optional) -->
                    <div class="mb-6">
                        <!-- Additional content here -->
                    </div>

                </div>
                <!-- End of first column content -->
            </div>
            <!-- End of first column -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:col-span-2 shadow-lg">
                <!-- Second column: White background with shadow and rounded corners -->

                <div class="p-6 text-gray-900 dark:text-gray-100 rounded-lg">
                    <!-- Padding, text color, and rounded corners -->

                    <div class="mb-6">
                        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Grid container for responsive cards -->

                            <!-- Card 1 -->
                            <div class="bg-gray-100 dark:bg-gray-700 overflow-hidden  sm:rounded-lg custom-shadow">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-4xl font-bold">
                                            {{ $jobs->where('employer_id', Auth::id())->count() }}</h3>
                                        <i class="fas fa-briefcase text-4xl text-blue-600 dark:text-blue-300"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Jobs Created</p>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div
                                class="bg-gray-100 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg custom-shadow">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-4xl font-bold">
                                            {{ $applicant->where('employer_id', Auth::id())->where('status', 'pending')->count() }}
                                        </h3>
                                        <i class="fas fa-clock text-4xl clock-icon"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Pending Applications</p>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div
                                class="bg-gray-100 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg custom-shadow">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-4xl font-bold">
                                            {{ $applicant->where('employer_id', Auth::id())->where('status', 'hired')->count() }}
                                        </h3>
                                        <i class="fas fa-check-circle text-4xl text-green-500 dark:text-green-300"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Approved Applications</p>
                                </div>
                            </div>

                        </div>
                        {{-- ADD HERE --}}
                        <div
                            class="border-b border-gray-200 dark:border-gray-700 py-4 h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-bold flex items-center">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    Recently Added Jobs
                                </h2>
                                <!-- Right side: Add Job button -->
                                <a href="{{ route('employer.add') }}"
                                    class="bg-green-500 text-white px-3 py-1 rounded flex items-center">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Add Job
                                </a>
                            </div>
                            @foreach ($jobs as $job)
                                <div
                                    class="border-b border-gray-200 dark:border-gray-700 py-4 flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $job->title }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $job->job_type }} | {{ $job->location }}
                                        </p>
                                        <!-- Additional job details can be added here -->
                                    </div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-right">
                                        Created {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                    </p>
                                    <!-- Displaying the relative date -->
                                </div>
                            @endforeach



                            @if ($jobs->isEmpty())
                                <p>No jobs found.</p>
                            @endif
                        </div>



                        <!-- End of job listing -->

                        <!-- Repeat for other jobs as needed -->
                    </div>
                    <!-- End of recently added jobs section -->

                    <!-- Additional content can be added here -->

                </div>
                <!-- End of second column content -->
            </div>
            <!-- End of second column -->

        </div>
        <!-- End of grid container -->

    </div>
    <!-- End of py-12 padding -->

    @if (Session::has('message'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.info("{{ Session::get('message') }}", 'Hello, {{ $profile->contact_person }}!', {
                    timeOut: 4000
                });
            });
        </script>
    @endif
</x-app-layout>


<style>
    /* Custom scrollbar styles */
    .scrollbar-thin::-webkit-scrollbar {
        width: 8px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Light gray track */
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background-color: #888;
        /* Gray thumb */
        border-radius: 10px;
        border: 2px solid #f1f1f1;
        /* Match track color */
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        /* Darker gray on hover */
    }

    .centered-shadow {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        /* Center the container horizontally */
    }

    .clock-icon {
        color: orange;
    }


    .custom-shadow {
        /* Box Shadow */
        box-shadow: 0 4px 6px rgba(0, 0, 0.4, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        /* Transition for smooth hover effect (optional) */
        transition: box-shadow 0.3s ease;
    }

    .custom-shadow:hover {
        /* Adjust shadow on hover if desired */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.08);
    }
</style>
