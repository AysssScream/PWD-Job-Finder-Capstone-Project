<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
        <title>Add Jobs</title>
    </head>

    <!-- Toastr Notification for Job Added Success -->
    @if (Session::has('addjobs'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                };
                toastr.success("{{ Session::get('addjobs') }}", 'Job Successfully Saved.', {
                    timeOut: 5000
                });
            });
        </script>
    @endif

    <div class="py-12">
        <div class="container mx-auto max-w-full pr-14 pl-14 px-4 pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-0 pb-3 text-lg text-gray-800 dark:text-gray-300">
                        <ol class="breadcrumb mb-0 flex items-center justify-start flex-wrap">
                            <li class="breadcrumb-item w-full md:w-auto">
                                <a href="{{ route('employer.dashboard') }}"
                                    class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>Back to Dashboard</span>
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:gap-4 sm:gap-4 lg:grid-cols-3">
                <!-- First Column: Recently Added Jobs -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg col-span-1">
                    <div class=" text-gray-900 dark:text-gray-100">
                        <div class="bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 p-4 rounded-t-lg mb-4">
                            <h2 class="text-xl font-bold text-white">
                                Recently Added Jobs
                            </h2>
                        </div>
                        <div class="p-5 rounded-lg custom-scrollbar overflow-y-auto h-full">
                            @foreach ($jobs as $job)
                                <div class="container bg-white dark:bg-gray-700 mb-3 rounded-lg custom-shadow">
                                    <!-- Gradient Background for Job Title -->
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-2 rounded-t-lg mb-4">
                                        <h2 class="text-xl font-bold text-white">
                                            <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                            {{ $job->title }}
                                        </h2>
                                    </div>

                                    <div class="p-4">
                                        <p class="text-base font-semibold text-gray-600 dark:text-gray-300 mb-3">
                                            <span
                                                class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-700 px-2 py-1 rounded-full">
                                                {{ $job->job_type }}
                                            </span>
                                            <span class="ml-2 text-gray-500 dark:text-gray-400">|</span>
                                            <span class="inline-block text-gray-800 dark:text-gray-200">
                                                {{ $job->location }}
                                            </span>
                                        </p>

                                        <p class="text-gray-800 dark:text-gray-300 mb-4 leading-relaxed">
                                            {{ \Illuminate\Support\Str::words($job->description, 30, '...') }}
                                        </p>

                                        <p class="text-md text-gray-600 dark:text-gray-200 italic">
                                            Posted on: {{ $job->created_at->format('F j, Y') }}
                                        </p>

                                        <div class="mt-4 flex justify-end items-center">
                                            <a href="{{ route('employer.edit', $job->id) }}"
                                                class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                                                <i class="fa-solid fa-pen mr-2"></i>
                                                Edit Job
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-4">
                                {{ $jobs->links('pagination::tailwind') }}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Second Column: Job Submission Form -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2 ">
                    <div class=" text-gray-900 dark:text-gray-100">
                        <form id="job-form" action="{{ route('jobinfos.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <!-- Gradient Div with Heading on Top and Additional Icon -->
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg mb-4">
                                <h3 class="text-xl font-bold text-white">
                                    <i class="fas fa-plus mr-2 ml-2 font-bold "></i>
                                    <!-- Additional Font Awesome icon -->
                                    Add Job Details
                                </h3>
                            </div>

                            <div class="p-6 pb-0 pt-0">
                                <!-- Form Validation Errors -->
                                @if ($errors->any())
                                    <div class="bg-red-100 dark:bg-red-700 dark:text-gray-200 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">Oops!</strong>
                                        <span class="block sm:inline">There were some errors with your
                                            submission:</span>
                                        <ul class="mt-3 list-disc list-inside text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br>
                                @endif
                            </div>


                            <div class="p-6">

                                <!-- Progress Bar Container -->
                                <div class="mb-6">
                                    <div class="flex justify-between mb-1">
                                        <span class="text-base font-medium text-blue-700 dark:text-white">Form
                                            Completion Progress</span>
                                        <span class="text-sm font-medium text-blue-700 dark:text-white"
                                            id="progress-percentage">0%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-5 dark:bg-gray-800 relative">
                                        <div id="progress-bar"
                                            class="bg-blue-600 h-5 rounded-full transition-all duration-500 ease-out"
                                            style="width: 0%"></div>
                                        <div id="progress-icon"
                                            class="absolute right-0 top-1/2 transform -translate-y-1/2"
                                            style="right: -1.5rem;">
                                            <div class="loading-spinner"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Information Section -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4"> 
                                    <i class="fas fa-briefcase mr-4 text-blue-400 dark:text-blue-200"></i>Job Information
                                </h3>
                                <hr class="w-full h-1  mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">
                                
                                <div class="p-2 grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <label for="job_title" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Job Title <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}" required
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" />
                                        @error('job_title')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <!-- Job Type -->
                                    <div>
                                        <label for="job_type" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Job Type <span class="text-red-500">*</span>
                                        </label>
                                        <select id="job_type" name="job_type" required
                                            class="form-select mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200">
                                            <option value="">Select job type</option>
                                            <option value="Full-Time" {{ old('job_type') == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                            <option value="Part-Time" {{ old('job_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                            <option value="Contractual" {{ old('job_type') == 'Contractual' ? 'selected' : '' }}>Contractual</option>
                                            <option value="Probationary" {{ old('job_type') == 'Probationary' ? 'selected' : '' }}>Probationary</option>
                                            <option value="Casual" {{ old('job_type') == 'Casual' ? 'selected' : '' }}>Casual</option>
                                            <option value="Seasonal" {{ old('job_type') == 'Seasonal' ? 'selected' : '' }}>Seasonal</option>
                                        </select>
                                        @error('job_type')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <!-- Age Inputs -->
                                    <div>
                                        <label for="min_age" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Minimum Age <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" id="min_age" name="min_age" required
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" />
                                        <span id="min_age_warning" class="text-yellow-500 text-sm hidden">
                                            Age must be between 18 and 99. The value will be adjusted.
                                        </span>
                                        @error('min_age')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div>
                                        <label for="max_age" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Maximum Age <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" id="max_age" name="max_age" required
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" />
                                        <span id="max_age_warning" class="text-yellow-500 text-sm hidden">
                                            Maximum age is 60. The value will be adjusted.
                                        </span>
                                        @error('max_age')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <!-- Salary -->
                                    <div>
                                        <label for="salary" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Salary <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" id="salary" name="salary" min="0" value="{{ old('salary') }}" required
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" />
                                        <p class="mt-1 text-sm text-red-500 dark:text-gray-400">
                                            Note: Salary must be entered as a monthly amount.
                                        </p>
                                        @error('salary')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <!-- Educational Level -->
                                    <div>
                                        <label for="educationLevel" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Educational Level Requirement <span class="text-red-500">*</span>
                                        </label>
                                        <select id="educationLevel" name="educationLevel" required
                                            class="w-full p-2 border rounded border-gray-500 dark:border-gray-600 shadow-sm 
                                            focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                            autocomplete="on">
                                            <option value="" selected disabled>Select Education Level...</option>
                                            <option value="Junior High School Level"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Junior High School Level' ? 'selected' : '' }}>
                                                {{ __('messages.education.junior_high_school_level') }}
                                            </option>
                                            <option value="Junior High School Graduate"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Junior High School Graduate' ? 'selected' : '' }}>
                                                {{ __('messages.education.junior_high_school_graduate') }}
                                            </option>
                                            <option value="Senior High School Level"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School Level' ? 'selected' : '' }}>
                                                {{ __('messages.education.senior_high_school_level') }}
                                            </option>
                                            <option value="Senior High School Graduate"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School Graduate' ? 'selected' : '' }}>
                                                {{ __('messages.education.senior_high_school_graduate') }}
                                            </option>
                                            <option value="Vocational Undergraduate"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                                                {{ __('messages.education.vocational_undergraduate') }}
                                            </option>
                                            <option value="Vocational Graduate"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
                                                {{ __('messages.education.vocational_graduate') }}
                                            </option>
                                            <option value="Some College Level"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'Some College Level' ? 'selected' : '' }}>
                                                {{ __('messages.education.some_college_level') }}
                                            </option>
                                            <option value="Associate's Degree"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == "Associate's Degree" ? 'selected' : '' }}>
                                                {{ __('messages.education.associates_degree') }}
                                            </option>
                                            <option value="College Level"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'College Level' ? 'selected' : '' }}>
                                                {{ __('messages.education.college_level') }}
                                            </option>
                                            <option value="College Graduate"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == 'College Graduate' ? 'selected' : '' }}>
                                                {{ __('messages.education.college_graduate') }}
                                            </option>
                                            <option value="Bachelor's Degree"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == "Bachelor's Degree" ? 'selected' : '' }}>
                                                {{ __('messages.education.bachelors_degree') }}
                                            </option>
                                            <option value="Master's Degree"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == "Master's Degree" ? 'selected' : '' }}>
                                                {{ __('messages.education.masters_degree') }}
                                            </option>
                                            <option value="Professional Degree (e.g., MD, JD)"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == "Professional Degree (e.g., MD, JD)" ? 'selected' : '' }}>
                                                {{ __('messages.education.professional_degree') }}
                                            </option>
                                            <option value="Doctoral Degree (Ph.D. or equivalent)"
                                                {{ old('educationLevel', $education->educationLevel ?? '') == "Doctoral Degree (Ph.D. or equivalent)" ? 'selected' : '' }}>
                                                {{ __('messages.education.doctoral_degree') }}
                                            </option>
                                        </select>
                                        @error('educationLevel')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- Program/Degree Information Section -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> 
                                    <i class="fas fa-graduation-cap mr-4 text-blue-400 dark:text-blue-200"></i>Program/Degree Information
                                </h3>
                                <hr class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">
                                
                                <div class="p-2 mb-6">
                                    <!-- Program/Course Input -->
                                    <div class="form-group">
                                        <label for="programInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Program/Course (Press <b>Enter</b> to Add Items)
                                        </label>
                                        <input type="text" 
                                               id="programInput" 
                                               class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                                               placeholder="(e.g., Bachelor of Science in Information Technology)" />
                                    </div>
                                
                                    <!-- Program Table -->
                                    <div class="mt-4">
                                        <table id="programTable" class="w-full border-collapse border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                            <thead>
                                                <tr class="bg-gray-100 dark:bg-gray-700">
                                                    <th class="p-2 border border-gray-500">Program/Course</th>
                                                    <th class="p-2 border border-gray-500 w-24">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="programTableBody" class="divide-y divide-gray-700 dark:divide-gray-600">
                                                <!-- Programs will be added here dynamically -->
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <!-- Hidden Input for Programs -->
                                    <div class="mt-4">
                                        <label for="hiddenProgramInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Selected Programs:
                                        </label>
                                        <textarea id="hiddenProgramInput" 
                                                  name="program" 
                                                  class="mt-1 block w-full px-3 py-2 border border-gray-500 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                                  readonly></textarea>
                                    </div>
                                </div>
                                
                                <!-- Work Experience Information Section -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> 
                                    <i class="fas fa-briefcase mr-4 text-blue-400 dark:text-blue-200"></i>Work Experience Information
                                </h3>
                                <hr class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">
                                
                                <div class="p-2 mb-6">
                                    <!-- No Experience Required Checkbox -->
                                    <div class="mb-4">
                                        <label class="inline-flex items-center text-md font-medium text-gray-700 dark:text-gray-200">
                                            <input type="checkbox" 
                                                   id="noExperienceRequired" 
                                                   class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-500 dark:border-gray-600"
                                            >
                                            <span class="ml-2">No Experience Required</span>
                                        </label>
                                    </div>
                                
                                    <!-- Work Experience Input Fields (will be disabled when No Experience is checked) -->
                                    <div id="experienceInputs" class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                                        <!-- Work Experience Type Input -->
                                        <div>
                                            <label for="workExperienceTypeInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                                Work Experience Type <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="workExperienceTypeInput" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                                                   placeholder="e.g., Software Development, Customer Service" />
                                        </div>
                                
                                    <!-- Work Experience Years Select -->
                                    <div>
                                        <label for="workExperienceYears" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Work Experience (Years) <span class="text-red-500">*</span>
                                        </label>
                                        <select id="workExperienceYears" 
                                                class="form-select mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200">
                                            <option value="" selected disabled>Select Years of Experience</option>
                                            <option value="1-3 months">1-3 months</option>
                                            <option value="4-6 months">4-6 months</option>
                                            <option value="7-11 months">7-11 months</option>
                                            <option value="1 year">1 year</option>
                                            <option value="2 years">2 years</option>
                                            <option value="3 years">3 years</option>
                                            <option value="4 years">4 years</option>
                                            <option value="5 years">5 years</option>
                                            <option value="6 years">6 years</option>
                                            <option value="7 years">7 years</option>
                                            <option value="8 years">8 years</option>
                                            <option value="9 years">9 years</option>
                                            <option value="10+ years">10+ years</option>
                                        </select>
                                    </div>
                                    </div>
                                
                                
                                
                                    <!-- Apply Button -->
                                    <div class="flex justify-end mb-4">
                                        <button type="button" 
                                                id="applyWorkExperience" 
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md flex items-center">
                                            <i class="fas fa-plus mr-2"></i>
                                            Apply Work Experience
                                        </button>
                                    </div>
                                
                                    <!-- Work Experience Table -->
                                    <div class="mt-4">
                                        <table id="workExperienceTable" class="w-full border-collapse border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                            <thead>
                                                <tr class="bg-gray-100 dark:bg-gray-700">
                                                    <th class="p-2 border border-gray-500">Work Experience Type</th>
                                                    <th class="p-2 border border-gray-500">Years Required</th>
                                                    <th class="p-2 border border-gray-500 w-24">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="workExperienceTableBody" class="divide-y divide-gray-700 dark:divide-gray-600">
                                                <!-- Work experience entries will be added here dynamically -->
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <!-- Hidden Input for Work Experience -->
                                    <div class="mt-4">
                                        <label for="hiddenWorkExperienceInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                            Selected Work Experience Requirements:
                                        </label>
                                        <textarea id="hiddenWorkExperienceInput" 
                                                  name="workExperience" 
                                                  class="mt-1 block w-full px-3 py-2 border border-gray-500 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                                  readonly></textarea>
                                    </div>
                                </div>
                                


                                <!-- Job Details and Location -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> <i
                                        class="fa-solid fa-location-dot mr-4 text-blue-400 dark:text-blue-200 "></i>
                                    Job Details & Location</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                                <div class="p-2 grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                                    <!-- Location -->
                                    <div>
                                        <label for="local-location"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">Location
                                            <span class="text-red-500">*</span></label>
                                        <select id="local-location" name="local-location" required
                                            class="form-select mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200">
                                            <option value="" disabled selected>Select a Location</option>
                                        </select>
                                        <button id="clearLocationButton" type="button"
                                            class="mt-2 px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-150 ease-in-out">
                                            Clear Location
                                        </button>
                                        @error('local-location')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Vacancy Input -->
                                    <div>
                                        <label for="vacancy"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">Vacancy
                                            <span class="text-red-500">*</span></label>
                                        <input type="number" id="vacancy" name="vacancy" min="0"
                                            value="{{ old('vacancy') }}" required
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" />
                                        @error('vacancy')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Job Description -->
                                    <div>
                                        <label for="description"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">Job
                                            Description <span class="text-red-500">*</span></label>
                                        <textarea id="description" name="description" rows="4" required
                                            class="form-textarea mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"></textarea>
                                        @error('description')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <!-- Benefits -->
                                    <div>
                                        <label for="benefits"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">Benefits</label>
                                        <textarea id="benefits" name="benefits" rows="4"
                                            class="form-textarea mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"></textarea>
                                        @error('benefits')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Date Pickers -->

                                    <div class="mt-4">
                                        <label for="fromDate"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">From
                                            Date <span class="text-red-500">*</span></label>
                                        <input type="date" id="fromDate" name="fromDate" required
                                            class="mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                                            onkeydown="return disableKeys(event)">
                                        @error('fromDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="mt-4">
                                        <label for="toDate"
                                            class="block text-md font-medium text-gray-700 dark:text-gray-200">To
                                            Date <span class="text-red-500">*</span></label>
                                        <input type="date" id="toDate" name="toDate" required
                                            class="mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                                            onkeydown="return disableKeys(event)">
                                        @error('toDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Responsibilities -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> <i
                                        class="fa-solid fa-user mr-4 text-blue-400 dark:text-blue-200"></i>
                                    Responsibilities</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                                <div class="mb-6">
                                    <label for="responsibilitySearch"
                                        class="block p-2 text-md font-medium  text-gray-700 dark:text-gray-200">Responsibilities
                                        (Press
                                        <b>Enter</b> to
                                        Add Items)</label>
                                    <input type="text" id="responsibilitySearch" name="responsibilitySearch[]"
                                        class="w-full p- ml-2 border rounded p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                        list="responsibilitySuggestions"
                                        placeholder="The applicants should have experience in the following areas.">
                                    <div id="responsibilitySuggestions" class="mt-2 grid  grid-cols-3 gap-2"></div>


                                </div>
                                <div class="mt-6 overflow-x-auto p-2">
                                    <table id="responsibilityTable"
                                        class="w-full border-collapse p-2 border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-700">
                                                <th
                                                    class="p-2 border border-gray-500 min-w-1/4 lg:min-w-1/6 text-gray-700 dark:text-gray-300">
                                                    Responsibilities
                                                </th>
                                                <th
                                                    class="p-2 border border-gray-500 text-gray-700 dark:text-gray-300">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="responsibilityTableBody"
                                            class="divide-y divide-gray-200 dark:divide-gray-600">
                                            <!-- Responsibilities rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>



                                <div class="mb-4 p-2">
                                    <label for="hiddenResponsibilitiesInput"
                                        class="block text-md font-medium  text-gray-700 dark:text-gray-200">Selected
                                        Responsibilities: </label>
                                    <textarea id="hiddenResponsibilitiesInput" name="hiddenResponsibilitiesInput"
                                        class="mt-1 block w-full px-3 py-2 p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 rounded-lg"
                                        readonly>{{ old('hiddenResponsibilitiesInput') }}</textarea>
                                    @error('hiddenResponsibilitiesInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Qualifications Section -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> <i
                                        class="fa-solid fa-pen mr-4 text-blue-400 dark:text-blue-200"></i>
                                    Qualifications</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                                <div class="mb-6 p-2">
                                    <label for="qualifications"
                                        class="block text-md font-medium text-gray-700 dark:text-gray-200">Qualifications
                                        (Press
                                        <b>Enter</b> to
                                        Add Items)</label>
                                    <input type="text" id="qualificationsInput" name="qualifications"
                                        class="form-input mt-1  p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                        focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
                                        dark:text-gray-300"
                                        placeholder="Enter job qualifications">
                                    @error('qualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="mt-6 overflow-x-auto p-2">
                                    <table id="qualificationsTable"
                                        class="w-full border-collapse p-2 border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-700">
                                                <th class="p-2 border border-gray-500 min-w-1/4 lg:min-w-1/6">
                                                    Qualifications
                                                </th>
                                                <th class="p-2 border border-gray-500">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="qualificationsTableBody"
                                            class="divide-y divide-gray-700 dark:divide-gray-600">
                                            <!-- Qualifications rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>


                                <div class="mb-4 p-2">
                                    <label for="hiddenQualificationsInput"
                                        class="block text-md font-medium  text-gray-700 dark:text-gray-200">
                                        Selected Qualifications:
                                    </label>
                                    <textarea id="hiddenQualificationsInput" name="hiddenQualificationsInput"
                                        class="mt-1 block w-full px-3 py-2 p-2 border border-gray-500 dark:border-gray-600 
                                            rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 
                                            dark:bg-gray-900 dark:text-gray-300"
                                        readonly>{{ old('hiddenQualificationsInput') }}</textarea>
                                    @error('hiddenQualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Training Qualifications Section -->
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-14"> <i
                                        class="fa-solid fa-book mr-4 text-blue-400 dark:text-blue-200"></i>
                                    Training Qualifications</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                                <div class="mb-6 p-2">
                                    <label for="trainingqualifications"
                                        class="block text-md font-medium text-gray-700 dark:text-gray-200">Training
                                        Qualifications
                                        (Press
                                        <b>Enter</b> to
                                        Add Items)</label>
                                    <div class="relative w-full">
                                        <input type="text" id="trainingqualificationsInput" name="trainingqualificationsInput"
                                               class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                                      focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
                                                      dark:text-gray-300"
                                               placeholder="Enter training qualifications">
                                        
                                        <div id="suggestionBox" 
                                             class="absolute z-10 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 
                                                    rounded-md shadow-lg mt-1 hidden overflow-y-auto max-h-48">
                                        </div>
                                    </div>

                                    @error('trainingqualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                    const trainingQualificationsInput = document.getElementById("trainingqualificationsInput");
                                    const suggestionBox = document.getElementById("suggestionBox");
                                
                                    // Function to fetch and display suggestions
                                    async function fetchSuggestions(query) {
                                        suggestionBox.innerHTML = '';  // Clear previous suggestions
                                
                                        // Only proceed if input length is at least 2 characters
                                        if (query.length < 2) {
                                            suggestionBox.classList.add('hidden');
                                            return;
                                        }
                                
                                        try {
                                            // Fetch the certifications file or endpoint
                                            const response = await fetch('/certificates/Certificates.txt');
                                            const text = await response.text();
                                            const certifications = text.split('\n').filter(line => line.trim() !== '');
                                
                                            // Filter certifications based on the query and limit to 10 suggestions
                                            const suggestions = certifications.filter(certification =>
                                                certification.toLowerCase().includes(query.toLowerCase())
                                            ).slice(0, 10);
                                
                                            // Display suggestions if available
                                            if (suggestions.length > 0) {
                                                suggestionBox.classList.remove('hidden');
                                                suggestions.forEach(item => {
                                                    const option = document.createElement('div');
                                                    option.className = "p-2 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700";
                                                    option.textContent = item;
                                
                                                    // Add click event to select the suggestion
                                                    option.addEventListener('click', () => {
                                                        trainingQualificationsInput.value = item; // Set input to selected item
                                                        suggestionBox.classList.add('hidden');   // Hide suggestion box
                                                    });
                                
                                                    suggestionBox.appendChild(option);  // Add suggestion to the dropdown
                                                });
                                            } else {
                                                suggestionBox.classList.add('hidden');
                                            }
                                        } catch (error) {
                                            console.error('Error fetching suggestions:', error);
                                        }
                                    }
                                
                                    // Input event to trigger suggestions
                                    trainingQualificationsInput.addEventListener("input", (event) => {
                                        fetchSuggestions(event.target.value);
                                    });
                                
                                    // Hide suggestion box when clicking outside of it or the input field
                                    document.addEventListener("click", (event) => {
                                        if (!suggestionBox.contains(event.target) && event.target !== trainingQualificationsInput) {
                                            suggestionBox.classList.add('hidden');
                                        }
                                    });
                                });

                                </script>



                                <div class="mt-6 overflow-x-auto p-2">
                                    <table id="trainingqualificationsTable"
                                        class="w-full border-collapse p-2 border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-700">
                                                <th class="p-2 border border-gray-500 min-w-1/4 lg:min-w-1/6">
                                                    Training Qualifications
                                                </th>
                                                <th class="p-2 border border-gray-500">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="trainingqualificationsTableBody"
                                            class="divide-y divide-gray-700 dark:divide-gray-600">
                                            <!-- Qualifications rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>


                                <div class="mb-4 p-2">
                                    <label for="hiddenQualificationsInput"
                                        class="block text-md font-medium  text-gray-700 dark:text-gray-200">
                                        Selected Training Qualifications:
                                    </label>
                                    <textarea id="hiddenTrainingQualificationsInput" name="hiddenTrainingQualificationsInput"
                                        class="mt-1 block w-full px-3 py-2 p-2 border border-gray-500 dark:border-gray-600 
                                            rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 
                                            dark:bg-gray-900 dark:text-gray-300"
                                        readonly>{{ old('hiddenTrainingQualificationsInput') }}</textarea>
                                    @error('hiddenTrainingQualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pre-Submission Review Summary Button with Modal -->
                                <div class="flex justify-between space-x-4 mt-6 p-2">
                                    <!-- Review Job Details Button -->
                                    <button type="button"
                                        class="w-1/3 bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md"
                                        onclick="reviewSubmission()">
                                        <i class="fas fa-search mr-2"></i> <!-- Font Awesome icon -->
                                        Review Job Details
                                    </button>

                                    <!-- Clear Fields Button -->
                                    <button type="button"
                                        class="w-1/3 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md"
                                        onclick="clearFormFields()">
                                        <i class="fas fa-times mr-2"></i> <!-- Font Awesome icon -->
                                        Clear Fields
                                    </button>

                                    <!-- Add Job Button -->
                                    <button type="submit"
                                        class="w-1/3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                                        <i class="fas fa-plus mr-2"></i> <!-- Font Awesome icon -->
                                        Add Job
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Review Modal -->
    <div id="reviewModal" class="fixed p-4 inset-0 hidden bg-gray-900 bg-opacity-80 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg shadow-lg max-w-3xl w-full">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg mb-4">
                <h2 class="text-2xl font-bold text-white">
                    <i class="fas fa-briefcase mr-2"></i>
                    Job Details Summary
                </h2>
            </div>
            <div id="jobSummary" class="mb-4 p-6 pt-0 overflow-y-auto max-h-60">
                <!-- Job Summary Content will be dynamically inserted here -->
            </div>
            <div class="flex justify-end p-2">
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg mr-2"
                    onclick="closeReviewModal()">
                    <i class="fas fa-times mr-2"></i> <!-- Close icon -->
                    Close
                </button>
            </div>
        </div>
    </div>


    @if (Session::has('addjobs'))
        <script>
            $(document).ready(function() {
                // Fire confetti immediately
                fireConfetti();
            });
        </script>
    @endif


</x-app-layout>

<script>
    // Responsibilities Section
    document.addEventListener('DOMContentLoaded', function() {
        var responsibilitySearch = document.getElementById('responsibilitySearch');
        var responsibilityTableBody = document.getElementById('responsibilityTableBody');
        var hiddenInput = document.getElementById('hiddenResponsibilitiesInput');

        responsibilitySearch.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var responsibilities = responsibilitySearch.value.split(',').map(function(
                    responsibility) {
                    return responsibility.trim();
                });

                // Clear the input field
                responsibilitySearch.value = '';

                // Add each responsibility as a new row in the table
                responsibilities.forEach(function(responsibility) {
                    if (responsibility && responsibilityTableBody.rows.length < 5 && !
                        isResponsibilityDuplicate(responsibility)) {
                        var row = responsibilityTableBody.insertRow();
                        var cell = row.insertCell();
                        cell.className = 'p-2 border border-gray-500'; // Added border-gray-100
                        cell.style.maxWidth = '500px'; // Adjust max-width as needed
                        cell.style.wordWrap = 'break-word'; // Ensures text wraps within cell
                        cell.textContent = responsibility;

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-100 flex justify-center items-center';
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                            'rounded');
                        removeButton.addEventListener('click', function() {
                            responsibilityTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else if (isResponsibilityDuplicate(responsibility)) {
                        alert('Responsibility "' + responsibility + '" is already added.');
                    }
                });

                // Update hidden input with responsibilities
                updateHiddenInput();
            }
        });

        function isResponsibilityDuplicate(responsibility) {
            var rows = responsibilityTableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === responsibility.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenInput() {
            var responsibilities = Array.from(responsibilityTableBody.rows).map(function(row) {
                return `• ${row.cells[0].textContent.trim()}\n`; // Using '•' for bullet point
            }).join('');
            hiddenInput.value = responsibilities;
        }
    });

    // Qualifications Section
    document.addEventListener('DOMContentLoaded', function() {
        var qualificationsInput = document.getElementById('qualificationsInput');
        var qualificationsTableBody = document.getElementById('qualificationsTableBody');
        var hiddenQualificationsInput = document.getElementById('hiddenQualificationsInput');

        var trainingQualificationsInput = document.getElementById('trainingqualificationsInput');
        var trainingQualificationsTableBody = document.getElementById('trainingqualificationsTableBody');
        var hiddenTrainingQualificationsInput = document.getElementById('hiddenTrainingQualificationsInput');

        // Functionality for qualifications input
        qualificationsInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var qualifications = qualificationsInput.value.trim();

                if (qualifications) {
                    qualificationsInput.value = '';

                    if (!isQualificationsDuplicate(qualifications, qualificationsTableBody)) {
                        var row = qualificationsTableBody.insertRow();
                        var cell = row.insertCell();
                        cell.className = 'p-2 border border-gray-500';
                        cell.style.maxWidth = '500px';
                        cell.style.wordWrap = 'break-word';
                        cell.textContent = qualifications;

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-200 flex justify-center items-center';
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                            'rounded');
                        removeButton.addEventListener('click', function() {
                            qualificationsTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenQualificationsInput(qualificationsTableBody,
                                hiddenQualificationsInput);
                        });
                        actionCell.appendChild(removeButton);
                    } else {
                        alert('Qualifications "' + qualifications + '" is already added.');
                    }

                    updateHiddenQualificationsInput(qualificationsTableBody, hiddenQualificationsInput);
                }
            }
        });

      // Set to keep track of unique qualifications
        const uniqueQualifications = new Set();
        
        // Functionality for training qualifications input
        trainingQualificationsInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission
        
                var trainingQualification = trainingQualificationsInput.value.trim();
        
                if (trainingQualification) {
                    // Clear input
                    trainingQualificationsInput.value = '';
        
                    // Check if qualification already exists in the Set
                    if (!uniqueQualifications.has(trainingQualification)) {
                        uniqueQualifications.add(trainingQualification); // Add to Set if unique
        
                        // Create new table row for the qualification
                        var row = trainingQualificationsTableBody.insertRow();
                        var cell = row.insertCell();
                        cell.className = 'p-2 border border-gray-500';
                        cell.style.maxWidth = '500px';
                        cell.style.wordWrap = 'break-word';
                        cell.textContent = trainingQualification;
        
                        // Add remove button
                        var actionCell = row.insertCell();
                        actionCell.className = 'p-2 border border-gray-200 flex justify-center items-center';
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white', 'rounded');
                        
                        removeButton.addEventListener('click', function() {
                            // Remove qualification from Set and table
                            uniqueQualifications.delete(trainingQualification);
                            trainingQualificationsTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenQualificationsInput(trainingQualificationsTableBody, hiddenTrainingQualificationsInput);
                        });
                        
                        actionCell.appendChild(removeButton);
                    } else {
                        alert('Training Qualification "' + trainingQualification + '" is already added.');
                    }
        
                    // Update hidden input with new qualifications list
                    updateHiddenQualificationsInput(trainingQualificationsTableBody, hiddenTrainingQualificationsInput);
                }
            }
        });


        function isQualificationsDuplicate(qualification, tableBody) {
            var rows = tableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === qualification.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenQualificationsInput(tableBody, hiddenInput) {
            var qualifications = Array.from(tableBody.rows).map(function(row) {
                return `• ${row.cells[0].textContent.trim()}\n`;
            }).join('');
            hiddenInput.value = qualifications;
        }
    });

    // City Location Fetching and Editing Logic
    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('local-location');
        const clearButton = document.getElementById('clearLocationButton');
        const localLocationHidden = document.getElementById('localLocationHidden');
        const errorDiv = document.getElementById('local-location-error');

        let citiesData = []; // Array to store cities data fetched from API

        // Fetch cities data from the API
        fetch('/locations/cities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                citiesData = data.filter(city => city.province === 'MM' && city.city);
                populateLocationDropdown(citiesData);
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
                errorDiv.classList.remove('hidden');
            });

        function populateLocationDropdown(cities) {
            locationSelect.innerHTML = '<option value="" disabled selected>Select a Location</option>';
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = `${city.name}, ${city.province}`;
                option.textContent = `${city.name}, ${city.province}`;
                locationSelect.appendChild(option);
            });
            if (localLocationHidden.value) {
                locationSelect.value = localLocationHidden.value;
            }
            locationSelect.addEventListener('change', function() {
                localLocationHidden.value = this.value;
            });
        }

        clearButton.addEventListener('click', function() {
            locationSelect.value = '';
            localLocationHidden.value = '';
        });

        const editLocationButton = document.getElementById('editLocationButton');
        if (editLocationButton) {
            editLocationButton.addEventListener('click', function() {
                locationSelect.removeAttribute('disabled');
                locationSelect.focus();
            });
        }
    });

    // Clear Fields Functionality
    function clearFormFields() {
        document.getElementById('job_title').value = ''; // Clears input field
        document.getElementById('job_type').value = ''; // Clears select field
        document.getElementById('min_age').value = ''; // Clears input field
        document.getElementById('max_age').value = ''; // Clears input field
        document.getElementById('salary').value = ''; // Clears input field
        document.getElementById('educationLevel').value = ''; // Clears select field for educational level
        document.getElementById('local-location').value = ''; // Clears select field
        document.getElementById('description').value = ''; // Clears textarea field
        document.getElementById('benefits').value = ''; // Clears textarea field
        document.getElementById('vacancy').value = ''; // Clears input field

        // Clear responsibilities
        document.getElementById('responsibilitySearch').value = ''; // Clears input field for responsibilities
        document.getElementById('responsibilityTableBody').innerHTML = ''; // Clears responsibility table
        document.getElementById('hiddenResponsibilitiesInput').value = ''; // Clears hidden responsibilities textarea

        // Clear qualifications
        document.getElementById('qualificationsInput').value = ''; // Clears input field for qualifications
        document.getElementById('qualificationsTableBody').innerHTML = ''; // Clears qualifications table
        document.getElementById('hiddenQualificationsInput').value = ''; // Clears hidden qualifications textarea

        document.getElementById('trainingqualificationsInput').value = ''; // Clears input field for qualifications
        document.getElementById('trainingqualificationsTableBody').innerHTML = ''; // Clears qualifications table
        document.getElementById('hiddenTrainingQualificationsInput').value =
            ''; // Clears hidden qualifications textarea
    }


    // Modal and Review Functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Function to handle the "Review Job Details" modal content
        function reviewSubmission() {
            // Capture all form input values
            const jobTitle = document.getElementById('job_title').value || 'N/A'; // Default to 'N/A' if empty
            const jobType = document.getElementById('job_type').value || 'N/A';
            const salary = document.getElementById('salary').value || 'N/A';
            const educationLevel = document.getElementById('educationLevel').value || 'N/A';
            const location = document.getElementById('local-location').value || 'N/A';
            const description = document.getElementById('description').value || 'N/A';
            const benefits = document.getElementById('benefits').value || 'N/A';
            const vacancy = document.getElementById('vacancy').value || 'N/A';

            // Function to capture table values (responsibilities or qualifications)
            function getTableValues(tableId) {
                const tableBody = document.getElementById(tableId);
                let values = [];
                if (tableBody) {
                    const rows = tableBody.getElementsByTagName('tr');
                    for (let i = 0; i < rows.length; i++) {
                        const firstCell = rows[i].getElementsByTagName('td')[
                            0]; // Assumes first cell holds the value
                        if (firstCell) {
                            values.push(firstCell.textContent.trim());
                        }
                    }
                }
                return values.length > 0 ? values.join(', ') : 'None';
            }

            // Capture responsibilities and qualifications from the table
            const responsibilities = getTableValues('responsibilityTableBody');
            const qualifications = getTableValues('qualificationsTableBody');
            const trainingqualifications = getTableValues('trainingqualificationsTableBody');

            // Dynamically build the job summary
            const jobSummary = `
                <div class="pb-4"> <!-- Add bottom padding -->
                    <p class="mb-2">
                        <strong><i class="fas fa-briefcase text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Job Title:</strong> ${jobTitle}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-clipboard-list text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Job Type:</strong> ${jobType}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-dollar-sign text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Salary:</strong> ${salary}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-graduation-cap text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Educational Requirement:</strong> ${educationLevel}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-map-marker-alt text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Location:</strong> ${location}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-align-left text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Description:</strong> ${description}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-gift text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Benefits:</strong> ${benefits}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-users text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Vacancy:</strong> ${vacancy}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-tasks text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Responsibilities:</strong> ${responsibilities}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-check-circle text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Qualifications:</strong> ${qualifications}
                    </p>
                    <p class="mb-2">
                        <strong><i class="fas fa-check-circle text-blue-500 dark:text-blue-200" style="margin-right: 8px;"></i>Training Qualifications:</strong> ${trainingqualifications}
                    </p>
                </div>
            `;




            // Inject the summary into the modal and make it visible
            document.getElementById('jobSummary').innerHTML = jobSummary;
            document.getElementById('reviewModal').classList.remove('hidden');
        }

        // Function to close the modal
        function closeReviewModal() {
            document.getElementById('reviewModal').classList.add('hidden');
        }

        // Attach event listeners after DOM is fully loaded
        document.querySelector(".bg-green-500").addEventListener('click', reviewSubmission);
        document.querySelector("#reviewModal .bg-red-500").addEventListener('click', closeReviewModal);
    });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('job-form');
            const progressBar = document.getElementById('progress-bar');
            const progressPercentage = document.getElementById('progress-percentage');
            const progressIcon = document.getElementById('progress-icon');
            const noExperienceCheckbox = document.getElementById('noExperienceRequired');
        
            const allFields = [
                'job_title',
                'job_type',
                'min_age',
                'max_age',
                'salary',
                'educationLevel',
                'local-location',
                'vacancy',
                'description',
                'fromDate',
                'toDate'
            ];
            
            function updateProgress() {
                let filledFields = 0;
                let requiredFields = allFields.length;
        
                // Count filled required fields
                allFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field && field.value.trim() !== '') {
                        filledFields++;
                    }
                });
        
                // Check work experience section
                const workExperienceTableBody = document.getElementById('workExperienceTableBody');
                const hasWorkExperience = workExperienceTableBody.rows.length > 0;
                const isNoExperienceChecked = noExperienceCheckbox.checked;
        
                // Add to filled fields if either condition is met
                if (hasWorkExperience || isNoExperienceChecked) {
                    filledFields++;
                }
                requiredFields++; // Add work experience to required fields count
        
                // Add program field to progress calculation if it's filled
                const programField = document.getElementById('program');
                if (programField && programField.value.trim() !== '') {
                    filledFields++;
                }
        
                const progress = Math.round((filledFields / requiredFields) * 100);
        
                // Animate the progress bar
                progressBar.style.width = `${progress}%`;
                progressPercentage.textContent = `${progress}%`;
        
                // Change color based on progress
                progressBar.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500', 'bg-blue-600');
                if (progress < 33) {
                    progressBar.classList.add('bg-red-500');
                } else if (progress < 66) {
                    progressBar.classList.add('bg-yellow-500');
                } else {
                    progressBar.classList.add('bg-green-500');
                }
        
                // Update icon
                if (progress === 100) {
                    progressIcon.innerHTML = '<span class="medal">🏅</span>';
                } else {
                    progressIcon.innerHTML = '<div class="loading-spinner"></div>';
                }
        
                // Position the icon
                progressIcon.style.right = `calc(${100 - progress}% - 1.5rem)`;
            }
        
            // Add event listeners for all fields
            allFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('blur', updateProgress);
                    field.addEventListener('change', updateProgress);
                }
            });
        
            // Add event listener for program field
            const programField = document.getElementById('program');
            if (programField) {
                programField.addEventListener('blur', updateProgress);
                programField.addEventListener('change', updateProgress);
            }
        
            // Add event listener for work experience checkbox
            noExperienceCheckbox.addEventListener('change', updateProgress);
        
            // Add event listener for work experience table changes
            const workExperienceTableBody = document.getElementById('workExperienceTableBody');
            const observer = new MutationObserver(updateProgress);
            observer.observe(workExperienceTableBody, { childList: true, subtree: true });
        
            // Add event listener for education level to trigger progress update
            const educationLevelField = document.getElementById('educationLevel');
            if (educationLevelField) {
                educationLevelField.addEventListener('change', function() {
                    // Update progress when education level changes
                    updateProgress();
                });
            }
        
            // Initial progress update
            updateProgress();
        });


    document.addEventListener('DOMContentLoaded', function() {
        const minAgeInput = document.getElementById('min_age');
        const maxAgeInput = document.getElementById('max_age');
        const minAgeWarning = document.getElementById('min_age_warning');
        const maxAgeWarning = document.getElementById('max_age_warning');

        function validateMinAge(input, min, max, warningElement) {
            input.addEventListener('input', function() {
                // Limit to 2 digits
                if (this.value.length > 2) {
                    this.value = this.value.slice(0, 2);
                }

                // Show warning if value is out of range
                let value = parseInt(this.value);
                if (isNaN(value) || value < min || value > max) {
                    warningElement.classList.remove('hidden');
                } else {
                    warningElement.classList.add('hidden');
                }
            });

            // Ensure correct value on blur
            input.addEventListener('blur', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < min) {
                    this.value = min;
                } else if (value > max) {
                    this.value = max;
                }
                warningElement.classList.add('hidden');
            });
        }

        function validateMaxAge(input, max, warningElement) {
            input.addEventListener('input', function() {
                // Allow up to 3 digits for max age
                if (this.value.length > 3) {
                    this.value = this.value.slice(0, 3);
                }

                // Show warning if value is greater than max
                let value = parseInt(this.value);
                if (!isNaN(value) && value > max) {
                    warningElement.classList.remove('hidden');
                } else {
                    warningElement.classList.add('hidden');
                }
            });

            // Ensure correct value on blur
            input.addEventListener('blur', function() {
                let value = parseInt(this.value);
                if (!isNaN(value) && value > max) {
                    this.value = max;
                }
                warningElement.classList.add('hidden');
            });
        }

        validateMinAge(minAgeInput, 18, 99, minAgeWarning);
        validateMaxAge(maxAgeInput, 99, maxAgeWarning);

        // Ensure max age is always greater than or equal to min age
        minAgeInput.addEventListener('blur', function() {
            if (parseInt(maxAgeInput.value) < parseInt(this.value)) {
                maxAgeInput.value = this.value;
            }
        });

        maxAgeInput.addEventListener('blur', function() {
            if (parseInt(this.value) < parseInt(minAgeInput.value)) {
                this.value = minAgeInput.value;
            }
        });
    });


    function fireConfetti() {
        var duration = 5 * 1000; // 5 seconds
        var animationEnd = Date.now() + duration;
        var defaults = {
            startVelocity: 30,
            spread: 360,
            ticks: 60,
            zIndex: 0
        };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        var interval = setInterval(function() {
            var timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            var particleCount = 50 * (timeLeft / duration);
            // since particles fall down, start a bit higher than random
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.1, 0.3),
                    y: Math.random() - 0.2
                }
            }));
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.7, 0.9),
                    y: Math.random() - 0.2
                }
            }));
        }, 250);
    }
    
        document.addEventListener('DOMContentLoaded', function() {
            const educationLevelSelect = document.getElementById('educationLevel');
            const programInput = document.getElementById('program');
            const programContainer = programInput.parentElement;
        
            // Make program field always visible and optional
            programContainer.style.display = 'block';
            programInput.required = false;
            
            educationLevelSelect.addEventListener('change', suggestProgram);
            // Run on page load
            suggestProgram();
        });
        
        document.addEventListener('DOMContentLoaded', function() {
    const programInput = document.getElementById('programInput');
    const programTableBody = document.getElementById('programTableBody');
    const hiddenProgramInput = document.getElementById('hiddenProgramInput');
    
    // Set to keep track of unique programs
    const uniquePrograms = new Set();

    programInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();

            const program = programInput.value.trim();

            if (program) {
                programInput.value = '';

                if (!uniquePrograms.has(program)) {
                    uniquePrograms.add(program);

                    const row = programTableBody.insertRow();
                    const cell = row.insertCell();
                    cell.className = 'p-2 border border-gray-500';
                    cell.style.maxWidth = '500px';
                    cell.style.wordWrap = 'break-word';
                    cell.textContent = program;

                    const actionCell = row.insertCell();
                    actionCell.className = 'p-2 border border-gray-200 flex justify-center items-center';
                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.type = 'button';
                    removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white', 'rounded');
                    
                    removeButton.addEventListener('click', function() {
                        uniquePrograms.delete(program);
                        programTableBody.deleteRow(row.rowIndex - 1);
                        updateHiddenProgramInput();
                    });
                    
                    actionCell.appendChild(removeButton);
                } else {
                    alert('Program "' + program + '" is already added.');
                }

                updateHiddenProgramInput();
            }
        }
    });

    function updateHiddenProgramInput() {
        const programs = Array.from(programTableBody.rows).map(function(row) {
            return `• ${row.cells[0].textContent.trim()}\n`;
        }).join('');
        hiddenProgramInput.value = programs;
    }
});


// wORK eXPERIENCE

document.addEventListener('DOMContentLoaded', function() {
    const noExperienceCheckbox = document.getElementById('noExperienceRequired');
    const experienceInputs = document.getElementById('experienceInputs');
    const applyButton = document.getElementById('applyWorkExperience');
    const workExperienceTypeInput = document.getElementById('workExperienceTypeInput');
    const workExperienceYears = document.getElementById('workExperienceYears');
    const workExperienceTableBody = document.getElementById('workExperienceTableBody');
    const hiddenWorkExperienceInput = document.getElementById('hiddenWorkExperienceInput');

    // Set to keep track of unique combinations
    const uniqueExperiences = new Set();

    // Handle No Experience Required checkbox
    noExperienceCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        
        // Disable/Enable inputs and apply button
        workExperienceTypeInput.disabled = isChecked;
        workExperienceYears.disabled = isChecked;
        applyButton.disabled = isChecked;

        // Add visual feedback for disabled state
        if (isChecked) {
            experienceInputs.classList.add('opacity-50');
            applyButton.classList.add('opacity-50', 'cursor-not-allowed');
            
            // Clear existing table
            workExperienceTableBody.innerHTML = '';
            
            // Add "No Experience Required" row
            const row = workExperienceTableBody.insertRow();
            
            // Message cell
            const messageCell = row.insertCell();
            messageCell.colSpan = 3; // Span all columns
            messageCell.className = 'p-2 border border-gray-500 text-center font-medium';
            messageCell.textContent = 'No Experience Required';

            // Update hidden input
            hiddenWorkExperienceInput.value = '• No Experience Required\n';
            
            // Clear and disable inputs
            workExperienceTypeInput.value = '';
            workExperienceYears.value = '';
        } else {
            experienceInputs.classList.remove('opacity-50');
            applyButton.classList.remove('opacity-50', 'cursor-not-allowed');
            
            // Clear the "No Experience Required" row
            workExperienceTableBody.innerHTML = '';
            hiddenWorkExperienceInput.value = '';
        }
    });

    // Apply button click handler
    applyButton.addEventListener('click', function() {
        if (noExperienceCheckbox.checked) return; // Don't proceed if no experience is required

        const experienceType = workExperienceTypeInput.value.trim();
        const years = workExperienceYears.value;

        if (experienceType && years) {
            const combinedValue = `${experienceType}-${years}`;

            if (!uniqueExperiences.has(combinedValue)) {
                uniqueExperiences.add(combinedValue);

                // Create new table row
                const row = workExperienceTableBody.insertRow();
                
                // Experience Type cell
                const typeCell = row.insertCell();
                typeCell.className = 'p-2 border border-gray-500';
                typeCell.style.maxWidth = '500px';
                typeCell.style.wordWrap = 'break-word';
                typeCell.textContent = experienceType;

                // Years cell
                const yearsCell = row.insertCell();
                yearsCell.className = 'p-2 border border-gray-500';
                yearsCell.textContent = years;

                // Action cell
                const actionCell = row.insertCell();
                actionCell.className = 'p-2 border border-gray-200 flex justify-center items-center';
                
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.type = 'button';
                removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white', 'rounded', 'hover:bg-red-600', 'transition-colors');
                
                removeButton.addEventListener('click', function() {
                    uniqueExperiences.delete(combinedValue);
                    workExperienceTableBody.deleteRow(row.rowIndex - 1);
                    updateHiddenWorkExperienceInput();

                    // Show empty state if no rows left
                    if (workExperienceTableBody.rows.length === 0) {
                        clearWorkExperienceFields();
                    }
                });
                
                actionCell.appendChild(removeButton);

                // Clear inputs
                clearWorkExperienceFields();

                // Update hidden input
                updateHiddenWorkExperienceInput();

                // Add animation class
                row.classList.add('fade-in');
            } else {
                alert('This work experience requirement has already been added.');
            }
        } else {
            alert('Please enter both work experience type and select years required.');
        }
    });

    // Function to update hidden input
    function updateHiddenWorkExperienceInput() {
        if (noExperienceCheckbox.checked) {
            hiddenWorkExperienceInput.value = '• No Experience Required\n';
            return;
        }

        const experiences = Array.from(workExperienceTableBody.rows).map(function(row) {
            if (row.cells.length === 1) { // No Experience Required row
                return `• ${row.cells[0].textContent.trim()}\n`;
            }
            return `• ${row.cells[0].textContent.trim()} (${row.cells[1].textContent.trim()})\n`;
        }).join('');
        hiddenWorkExperienceInput.value = experiences;
    }

    // Function to clear input fields
    function clearWorkExperienceFields() {
        workExperienceTypeInput.value = '';
        workExperienceYears.value = '';
        workExperienceTypeInput.focus();
    }

    // Add keyboard shortcut (optional)
    document.addEventListener('keydown', function(event) {
        // Check if Ctrl/Cmd + Enter is pressed and inputs are not disabled
        if ((event.ctrlKey || event.metaKey) && event.key === 'Enter' && !noExperienceCheckbox.checked) {
            event.preventDefault();
            applyButton.click();
        }
    });

    // Initialize the state
    updateHiddenWorkExperienceInput();
});



</script>



<!-- Styling Section -->
<style>
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(155, 155, 155, 0.5) rgba(255, 255, 255, 0.2);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(155, 155, 155, 0.5);
        border-radius: 8px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .custom-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0.4, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .custom-shadow:hover {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loading-spinner {
        border: 2px solid #f3f3f3;
        border-top: 2px solid #3498db;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        animation: spin 0.8s linear infinite;
    }

    #progress-bar {
        transition: width 0.5s ease-out;
    }

    #progress-bar.bg-red-500 {
        background-color: #ef4444 !important;
    }

    #progress-bar.bg-yellow-500 {
        background-color: #eab308 !important;
    }

    #progress-bar.bg-green-500 {
        background-color: #22c55e !important;
    }

    #progress-icon {
        transition: right 0.5s ease-out;
        right: -1.5rem;
    }

    .medal {
        font-size: 30px;
    }
</style>
