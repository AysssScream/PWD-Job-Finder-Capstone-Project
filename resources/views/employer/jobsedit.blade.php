<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Edit Jobs</title>

    </head>


    <div class="py-12">
        <div class="container mx-auto max-w-full pr-14 pl-14 px-4 pt-5">
            <div class="container mx-auto max-w-7xl px-4 pt-5 ">
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 lg:grid-cols-3">
                <!-- First Column (Occupies 1/3 of the space) -->
                <div
                    class="col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg relative">
                    <div
                        class="absolute inset-y-0 right-0 w-2 bg-gradient-to-b from-blue-500 to-blue-300 rounded-tr-lg rounded-br-lg">
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <!-- Header Section -->
                            <div
                                class="bg-white dark:bg-gray-700  border-2 border-blue-500 text-blue-500 font-bold text-2xl p-4 rounded-t-lg">
                                <i class="fas fa-edit mr-2"></i> <!-- Edit icon -->
                                Job Edit Information
                            </div>

                            <!-- Gradient Section -->
                            <div
                                class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4 bg-gradient-to-r p-4 from-blue-500 to-blue-600 rounded-b-lg">
                                <a href="{{ route('employer.manage') }}"
                                    class="flex items-center space-x-2 text-white text-lg px-4 py-2 rounded-full hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>Back to Job Lists</span>
                                </a>
                            </diV>
                        </div>
                        <div class=" border-2 border-blue-500 rounded-lg p-4">
                            <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 space-y-4">
                                <li class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span class="font-semibold mr-2">From Date:</span> {{ $job->from_date }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-calendar-check mr-2"></i>
                                    <span class="font-semibold mr-2">To Date:</span> {{ $job->to_date }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    <span class="font-semibold mr-2">Job Title:</span> {{ $job->title }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <span class="font-semibold mr-2">Minimum Age:</span> {{ $job->min_age }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    <span class="font-semibold mr-2">Maximum Age:</span> {{ $job->max_age }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-tags mr-2"></i>
                                    <span class="font-semibold mr-2">Job Type:</span> {{ $job->job_type }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-money-bill-alt mr-2"></i>
                                    <span class="font-semibold mr-2">Salary:</span> {{ $job->salary }} / Monthly
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-calendar-day mr-2"></i>
                                    <span class="font-semibold mr-2">Date Posted:</span> {{ $job->date_posted }}
                                </li>
                                
                                                                
                                <!-- Work Experience Section -->
                                <li class="flex flex-col">
                                    <span class="font-semibold">Work Experience:</span>
                                    <ul class="list-disc ml-6">
                                        @if($job->work_experience === 'No Experience Required')
                                            <li>No Experience Required</li>
                                        @else
                                            @foreach(explode("\n", $job->work_experience) as $experience)
                                                @if(!empty(trim($experience)))
                                                    @php
                                                        $experience = trim($experience);
                                                        // Remove bullet points and other special characters
                                                        $experience = preg_replace('/[^\w\s()-]/', '', $experience);
                                                    @endphp
                                                    <li>{{ $experience }}</li>
                                                @endif
                                            @endforeach
                                            @if(empty(trim($job->work_experience)))
                                                <li>No Work Experience Requirements Found</li>
                                            @endif
                                        @endif
                                    </ul>
                                </li>

                                <!-- Program/Course Section -->
                                <li class="flex flex-col">
                                    <span class="font-semibold">Program/Course:</span>
                                    <ul class="list-disc ml-6">
                                        @foreach(explode("\n", $job->program) as $program)
                                            @if(!empty(trim($program)))
                                                <li>{{ preg_replace('/[^\w\s]/', '', trim($program)) }}</li>
                                            @endif
                                        @endforeach
                                        @if(empty(trim($job->program)))
                                            <li>No Program/Course Found</li>
                                        @endif
                                    </ul>
                                </li>
                                
                                <!-- Responsibilities Section -->
                                <li class="flex flex-col">
                                    <span class="font-semibold">Responsibilities:</span>
                                    <ul class="list-disc ml-6">
                                        @foreach(explode("\n", $job->responsibilities) as $responsibility)
                                            @if(!empty(trim($responsibility)))
                                                <li>{{ preg_replace('/[^\w\s]/', '', trim($responsibility)) }}</li>
                                            @endif
                                        @endforeach
                                        @if(empty(trim($job->responsibilities)))
                                            <li>No Responsibilities Found</li>
                                        @endif
                                    </ul>
                                </li>
                                
                                <!-- Qualifications Section -->
                                <li class="flex flex-col">
                                    <span class="font-semibold">Qualifications:</span>
                                    <ul class="list-disc ml-6">
                                        @foreach(explode("\n", $job->qualifications) as $qualification)
                                            @if(!empty(trim($qualification)))
                                                <li>{{ preg_replace('/[^\w\s]/', '', trim($qualification)) }}</li>
                                            @endif
                                        @endforeach
                                        @if(empty(trim($job->qualifications)))
                                            <li>No Qualifications Found</li>
                                        @endif
                                    </ul>
                                </li>
                                
                                <!-- Training Qualifications Section -->
                                <li class="flex flex-col">
                                    <span class="font-semibold">Training Qualifications:</span>
                                    <ul class="list-disc ml-6">
                                        @foreach(explode("\n", $job->training_qualifications) as $training)
                                            @if(!empty(trim($training)))
                                                <li>{{ preg_replace('/[^\w\s]/', '', trim($training)) }}</li>
                                            @endif
                                        @endforeach
                                        @if(empty(trim($job->training_qualifications)))
                                            <li>No Training Qualifications Found</li>
                                        @endif
                                    </ul>
                                </li>


                                <li class="flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <span class="font-semibold mr-2">Vacancies:</span> {{ $job->vacancy }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-building mr-2"></i>
                                    <span class="font-semibold mr-2">Company Name:</span> {{ $job->company_name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Second Column (Occupies More Space) -->
                <div
                    class="col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg relative">
                    <div
                        class="absolute inset-y-0 right-0 w-2 bg-gradient-to-b from-blue-500 to-blue-300 rounded-tr-lg rounded-br-lg">
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('jobinfos.update', $job->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="bg-red-100 dark:bg-red-700 dark:text-gray-200 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">There were some errors with your submission:</span>
                                    <ul class="mt-3 list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif
                               
                            

                            <!-- Top Buttons -->
                            <div class="mb-4">
                                <!-- Header Section -->
                                <div class="bg-white dark:bg-gray-700 border-2 border-blue-500 text-blue-500 font-bold text-2xl p-4 rounded-t-lg flex justify-between items-center">
                                    <div class="flex items-center">
                                        <i class="fas fa-edit mr-2"></i> <!-- Edit icon -->
                                        Edit Job # {{ $job->id }}
                                    </div>
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                                        Save Job Details
                                    </button>
                                </div>


                                <!-- Gradient Section -->
                                <div
                                    class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4 bg-gradient-to-r p-4 from-blue-500 to-blue-600 rounded-b-lg">
                                    <ul class="list-disc list-inside mt-2 text-white">
                                        <li>Verify the job title and description for clarity and correctness.</li>
                                        <li>Ensure the location is specified correctly, as it affects applicant
                                            searches.</li>
                                        <li>Review the qualifications and requirements to attract the right candidates.
                                        </li>
                                        <li>Update any salary information if applicable to reflect current standards
                                            through monthly only.</li>
                                        <li>Follow the format (using , - • ) for training qualifications, benefits and
                                            responsibilities.</li>
                                        <li>Kindly specify only the name of the training qualifications or
                                            certifications (PRC, TESDA) needed.</li>
                                        <li>After editing, double-check all changes before saving.</li>
                                    </ul>
                                </div>
                            </div>

                            <div
                                class="bg-white dark:bg-gray-800 shadow-3d p-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3"> <i
                                        class="fas fa-briefcase mr-4 text-blue-600 dark:text-blue-300"></i>Job
                                    Information</h3>
                                <hr
                                    class="w-full h-1  mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">


                                <div class="mb-4 p-2">
                                    <label for="job_title" class="block text-md text-gray-800 dark:text-gray-300">Job
                                        Title</label>
                                    <input type="text" id="job_title" name="job_title" autocomplete="off"
                                        placeholder="Enter job title" value="{{ $job->title }}"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">

                                    @error('job_title')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group flex space-x-4 p-2">
                                    <!-- Minimum Age -->
                                    <div class="w-1/2">
                                        <label for="min_age">Minimum Age</label>
                                        <input type="number" name="min_age"
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            id="min_age" value="{{ $job->min_age }}" required>
                                        @error('min_age')
                                            <small class="text-red-600 mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Maximum Age -->
                                    <div class="w-1/2">
                                        <label for="max_age">Maximum Age</label>
                                        <input type="number" name="max_age"
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            id="max_age" value="{{ $job->max_age }}" required>
                                        @error('max_age')
                                            <small class="text-red-600 mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Job Type -->
                                <div class="mb-4 p-2">
                                    <label for="job_type" class="block text-md text-gray-800 dark:text-gray-300">Job
                                        Type</label>
                                    <select id="job_type" name="job_type"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                        <option value="">Select job type</option>
                                        <option value="Full-Time"
                                            {{ $job->job_type == 'Full-Time' ? 'selected' : '' }}>
                                            Full Time</option>
                                        <option value="Part-Time"
                                            {{ $job->job_type == 'Part-Time' ? 'selected' : '' }}>
                                            Part Time</option>
                                        <option value="Probationary"
                                            {{ $job->job_type == 'Probationary' ? 'selected' : '' }}>
                                            Probationary</option>
                                        <option value="Contractual"
                                            {{ $job->job_type == 'Contractual' ? 'selected' : '' }}>
                                            Contractual</option>
                                        <option value="Casual">
                                            {{ $job->job_type == 'Casual' ? 'selected' : '' }}
                                            Casual
                                        </option>
                                        <option value="Seasonal">
                                            {{ $job->job_type == 'Seasonal' ? 'selected' : '' }}
                                            Seasonal
                                        </option>
                                    </select>
                                    @error('job_type')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Salary -->
                                <div class="mb-4 p-2">
                                    <label for="salary"
                                        class="block text-md  text-gray-800 dark:text-gray-300">Salary</label>
                                    <input type="text" id="salary" name="salary" autocomplete="off"
                                        placeholder="Enter salary" value="{{ $job->salary }}"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                    @error('salary')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Educational Level -->
                                <div class="mb-4 p-2">
                                    <label for="educationLevel"
                                        class="block mb-1">{{ __('messages.education.highest_educational_attainment') }}</label>
                                    <select id="educationLevel" name="educationLevel"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        autocomplete="on"
                                        aria-label="{{ __('messages.education.highest_educational_attainment') }}">
                                        <option value="" selected disabled>{{ $job->educational_level }}
                                        </option>
                                        @php
                                            $educationLevels = [
                                                'Doctoral Degree (Ph.D. or equivalent)' => __(
                                                    'messages.education.doctoral_degree',
                                                ),
                                                'Professional Degree (e.g., MD, JD)' => __(
                                                    'messages.education.professional_degree',
                                                ),
                                                "Master's Degree" => __('messages.education.masters_degree'),
                                                "Bachelor's Degree" => __('messages.education.bachelors_degree'),
                                                'College Graduate' => __('messages.education.college_graduate'),
                                                "Associate's Degree" => __('messages.education.associates_degree'),
                                                'Vocational Graduate' => __('messages.education.vocational_graduate'),
                                                'Some College Level' => __('messages.education.some_college_level'),
                                                'Vocational Undergraduate' => __(
                                                    'messages.education.vocational_undergraduate',
                                                ),
                                                'Senior High School Graduate' => __(
                                                    'messages.education.senior_high_school_graduate',
                                                ),
                                                'Senior High School Level' => __(
                                                    'messages.education.senior_high_school_level',
                                                ),
                                                'Junior High School Graduate' => __(
                                                    'messages.education.junior_high_school_graduate',
                                                ),
                                                'Junior High School Level' => __(
                                                    'messages.education.junior_high_school_level',
                                                ),
                                            ];

                                        @endphp

                                        @foreach ($educationLevels as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('educationLevel', $job->educational_level ?? '') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('educationLevel')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                                     <!-- Program/Course Section -->
                                    <div class="bg-white dark:bg-gray-800 shadow-3d p-6 mt-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3">
                                            <i class="fas fa-graduation-cap mr-4 text-blue-400 dark:text-blue-200"></i>
                                            Program/Course Requirements
                                        </h3>
                                        <hr class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">
                                    
                                        <!-- Program/Course Input -->
                                        <div class="mb-4 p-2">
                                            <label for="programInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                                Program/Course (Press <b>Enter</b> to Add Items)
                                            </label>
                                            <div class="flex flex-col sm:flex-row items-center mb-4">
                                                <input type="text" 
                                                       id="programInput" 
                                                       class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                                              focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                                       placeholder="(e.g., Bachelor of Science in Information Technology)">
                                                <button id="clearProgramButton" type="button" 
                                                        class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                    Clear All
                                                </button>
                                            </div>
                                        </div>
                                    
                                        <!-- Program Table -->
                                        <div class="mt-4 p-2">
                                            <table id="programTable" class="w-full border-collapse border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                                <thead>
                                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                                        <th class="p-2 border border-gray-500">Program/Course</th>
                                                        <th class="p-2 border border-gray-500 w-24">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="programTableBody" class="divide-y divide-gray-700 dark:divide-gray-600">
                                                    @foreach(explode("\n", $job->program) as $program)
                                                        @if(!empty(trim($program)))
                                                            @php
                                                                $program = trim(str_replace('• ', '', $program));
                                                            @endphp
                                                            <tr>
                                                                <td class="p-2 border border-gray-500">{{ $program }}</td>
                                                                <td class="p-2 border border-gray-500">
                                                                    <button type="button" 
                                                                            class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                                                            onclick="removeProgram(this)">
                                                                        Remove
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                        <!-- Hidden Input for Programs -->
                                        <input type="hidden" 
                                               id="hiddenProgramInput" 
                                               name="program" 
                                               value="{{ $job->program }}">
                                    </div>
                                    
                                    <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const programInput = document.getElementById('programInput');
                                        const programTableBody = document.getElementById('programTableBody');
                                        const hiddenProgramInput = document.getElementById('hiddenProgramInput');
                                        const clearProgramButton = document.getElementById('clearProgramButton');
                                        
                                        // Set to keep track of unique programs
                                        const uniquePrograms = new Set(
                                            Array.from(programTableBody.querySelectorAll('tr')).map(row => 
                                                row.cells[0].textContent.trim()
                                            )
                                        );
                                    
                                        programInput.addEventListener('keydown', function(event) {
                                            if (event.key === 'Enter') {
                                                event.preventDefault();
                                                const program = programInput.value.trim();
                                    
                                                if (program) {
                                                    if (!uniquePrograms.has(program)) {
                                                        addProgramToTable(program);
                                                        programInput.value = '';
                                                    } else {
                                                        alert(`Program "${program}" is already added.`);
                                                    }
                                                }
                                            }
                                        });
                                    
                                        function addProgramToTable(program) {
                                            uniquePrograms.add(program);
                                    
                                            const row = programTableBody.insertRow();
                                            
                                            // Program cell
                                            const programCell = row.insertCell();
                                            programCell.className = 'p-2 border border-gray-500';
                                            programCell.textContent = program;
                                    
                                            // Action cell
                                            const actionCell = row.insertCell();
                                            actionCell.className = 'p-2 border border-gray-500';
                                            
                                            const removeButton = document.createElement('button');
                                            removeButton.textContent = 'Remove';
                                            removeButton.type = 'button';
                                            removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors';
                                            removeButton.onclick = function() {
                                                uniquePrograms.delete(program);
                                                row.remove();
                                                updateHiddenProgramInput();
                                            };
                                            
                                            actionCell.appendChild(removeButton);
                                    
                                            // Add animation
                                            row.classList.add('fade-in');
                                    
                                            // Update hidden input
                                            updateHiddenProgramInput();
                                        }
                                    
                                        function updateHiddenProgramInput() {
                                            const programs = Array.from(programTableBody.rows).map(row => 
                                                `• ${row.cells[0].textContent.trim()}`
                                            ).join('\n');
                                    
                                            hiddenProgramInput.value = programs;
                                        }
                                    
                                        // Clear all programs
                                        clearProgramButton.addEventListener('click', function() {
                                            if (confirm('Are you sure you want to clear all programs?')) {
                                                programTableBody.innerHTML = '';
                                                uniquePrograms.clear();
                                                updateHiddenProgramInput();
                                            }
                                        });
                                    
                                        // Function to remove program (called from inline onclick)
                                        window.removeProgram = function(button) {
                                            const row = button.closest('tr');
                                            const program = row.cells[0].textContent.trim();
                                            uniquePrograms.delete(program);
                                            row.remove();
                                            updateHiddenProgramInput();
                                        };
                                    });
                                    </script>
                                    
                                    <style>
                                    .fade-in {
                                        animation: fadeIn 0.3s ease-out forwards;
                                    }
                                    
                                    @keyframes fadeIn {
                                        from {
                                            opacity: 0;
                                            transform: translateY(-10px);
                                        }
                                        to {
                                            opacity: 1;
                                            transform: translateY(0);
                                        }
                                    }
                                    
                                    #programTableBody button {
                                        transition: all 0.2s ease;
                                    }
                                    
                                    #programTableBody button:hover {
                                        transform: scale(1.05);
                                    }
                                    </style>

                                <!-- Work Experience Information Section -->
                                <div class="bg-white dark:bg-gray-800 shadow-3d p-6 mt-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3">
                                        <i class="fas fa-briefcase mr-4 text-blue-400 dark:text-blue-200"></i>
                                        Work Experience Information
                                    </h3>
                                    <hr class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">
                                
                                    <!-- No Experience Required Checkbox -->
                                    <div class="mb-4 p-2">
                                        <label class="inline-flex items-center text-md font-medium text-gray-700 dark:text-gray-200">
                                            <input type="checkbox" 
                                                   id="noExperienceRequired" 
                                                   class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-500 dark:border-gray-600"
                                                   {{ $job->work_experience === 'No Experience Required' ? 'checked' : '' }}>
                                            <span class="ml-2">No Experience Required</span>
                                        </label>
                                    </div>
                                
                                    <!-- Work Experience Input Fields -->
                                    <div id="experienceInputs" class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 p-2">
                                        <!-- Work Experience Type Input -->
                                        <div>
                                            <label for="workExperienceTypeInput" class="block text-md font-medium text-gray-700 dark:text-gray-200">
                                                Work Experience Type <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="workExperienceTypeInput" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                                                   placeholder="e.g., Software Development, Customer Service">
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
                                    <div class="flex justify-end mb-4 p-2">
                                        <button type="button" 
                                                id="applyWorkExperience" 
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md flex items-center">
                                            <i class="fas fa-plus mr-2"></i>
                                            Apply Work Experience
                                        </button>
                                    </div>
                                
                                    <!-- Work Experience Table -->
                                    <div class="mt-4 p-2">
                                        <table id="workExperienceTable" class="w-full border-collapse border border-gray-500 dark:bg-gray-800 dark:border-gray-600">
                                            <thead>
                                                <tr class="bg-gray-100 dark:bg-gray-700">
                                                    <th class="p-2 border border-gray-500">Work Experience Type</th>
                                                    <th class="p-2 border border-gray-500">Years Required</th>
                                                    <th class="p-2 border border-gray-500 w-24">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="workExperienceTableBody" class="divide-y divide-gray-700 dark:divide-gray-600">
                                                @if($job->work_experience === 'No Experience Required')
                                                    <tr>
                                                        <td colspan="3" class="p-2 border border-gray-500 text-center font-medium">
                                                            No Experience Required
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach(explode("\n", $job->work_experience) as $experience)
                                                        @if(!empty(trim($experience)))
                                                            @php
                                                                $experience = trim($experience);
                                                                preg_match('/^•\s*(.*?)\s*\((.*?)\)$/', $experience, $matches);
                                                                if (count($matches) === 3) {
                                                                    $type = $matches[1];
                                                                    $years = $matches[2];
                                                                }
                                                            @endphp
                                                            @if(isset($type) && isset($years))
                                                                <tr>
                                                                    <td class="p-2 border border-gray-500">{{ $type }}</td>
                                                                    <td class="p-2 border border-gray-500">{{ $years }}</td>
                                                                    <td class="p-2 border border-gray-500">
                                                                        <button type="button" 
                                                                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                                                                onclick="removeWorkExperience(this)">
                                                                            Remove
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <!-- Hidden Input for Work Experience -->
                                    <input type="hidden" 
                                           id="hiddenWorkExperienceInput" 
                                           name="workExperience" 
                                           value="{{ $job->work_experience }}">
                                </div>
                                
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const noExperienceCheckbox = document.getElementById('noExperienceRequired');
                                    const experienceInputs = document.getElementById('experienceInputs');
                                    const applyButton = document.getElementById('applyWorkExperience');
                                    const workExperienceTypeInput = document.getElementById('workExperienceTypeInput');
                                    const workExperienceYears = document.getElementById('workExperienceYears');
                                    const workExperienceTableBody = document.getElementById('workExperienceTableBody');
                                    const hiddenWorkExperienceInput = document.getElementById('hiddenWorkExperienceInput');
                                
                                    // Initialize the state based on existing data
                                    if (noExperienceCheckbox.checked) {
                                        disableExperienceInputs(true);
                                    }
                                
                                    // Set to keep track of unique combinations
                                    const uniqueExperiences = new Set();
                                    
                                    // Initialize uniqueExperiences with existing data
                                    // Initialize uniqueExperiences with existing data
                                    document.querySelectorAll('#workExperienceTableBody tr').forEach(row => {
                                        if (row.cells.length > 1) {
                                            const type = row.cells[0].textContent.trim();
                                            const years = row.cells[1].textContent.trim();
                                            uniqueExperiences.add(`${type}-${years}`);
                                        }
                                    });
                                
                                    noExperienceCheckbox.addEventListener('change', function() {
                                        const isChecked = this.checked;
                                        disableExperienceInputs(isChecked);
                                        
                                        if (isChecked) {
                                            workExperienceTableBody.innerHTML = `
                                                <tr>
                                                    <td colspan="3" class="p-2 border border-gray-500 text-center font-medium">
                                                        No Experience Required
                                                    </td>
                                                </tr>`;
                                            hiddenWorkExperienceInput.value = 'No Experience Required';
                                            uniqueExperiences.clear();
                                        } else {
                                            workExperienceTableBody.innerHTML = '';
                                            hiddenWorkExperienceInput.value = '';
                                        }
                                    });
                                
                                    function disableExperienceInputs(disable) {
                                        workExperienceTypeInput.disabled = disable;
                                        workExperienceYears.disabled = disable;
                                        applyButton.disabled = disable;
                                        
                                        if (disable) {
                                            experienceInputs.classList.add('opacity-50');
                                            applyButton.classList.add('opacity-50', 'cursor-not-allowed');
                                        } else {
                                            experienceInputs.classList.remove('opacity-50');
                                            applyButton.classList.remove('opacity-50', 'cursor-not-allowed');
                                        }
                                    }
                                
                                    applyButton.addEventListener('click', function() {
                                        if (noExperienceCheckbox.checked) return;
                                
                                        const experienceType = workExperienceTypeInput.value.trim();
                                        const years = workExperienceYears.value;
                                
                                        if (experienceType && years) {
                                            addExperienceToTable(experienceType, years);
                                        } else {
                                            alert('Please enter both work experience type and select years required.');
                                        }
                                    });
                                
                                    function addExperienceToTable(experienceType, years) {
                                        const combinedValue = `${experienceType}-${years}`;
                                
                                        if (!uniqueExperiences.has(combinedValue)) {
                                            uniqueExperiences.add(combinedValue);
                                
                                            const row = workExperienceTableBody.insertRow();
                                            
                                            // Experience Type cell
                                            const typeCell = row.insertCell();
                                            typeCell.className = 'p-2 border border-gray-500';
                                            typeCell.textContent = experienceType;
                                
                                            // Years cell
                                            const yearsCell = row.insertCell();
                                            yearsCell.className = 'p-2 border border-gray-500';
                                            yearsCell.textContent = years;
                                
                                            // Action cell
                                            const actionCell = row.insertCell();
                                            actionCell.className = 'p-2 border border-gray-500';
                                            
                                            const removeButton = document.createElement('button');
                                            removeButton.textContent = 'Remove';
                                            removeButton.type = 'button';
                                            removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors';
                                            removeButton.onclick = function() {
                                                uniqueExperiences.delete(combinedValue);
                                                row.remove();
                                                updateHiddenInput();
                                            };
                                            
                                            actionCell.appendChild(removeButton);
                                
                                            // Clear inputs
                                            workExperienceTypeInput.value = '';
                                            workExperienceYears.value = '';
                                
                                            // Update hidden input
                                            updateHiddenInput();
                                
                                            // Add animation
                                            row.classList.add('fade-in');
                                        } else {
                                            alert('This work experience requirement has already been added.');
                                        }
                                    }
                                
                                    function updateHiddenInput() {
                                        if (noExperienceCheckbox.checked) {
                                            hiddenWorkExperienceInput.value = 'No Experience Required';
                                            return;
                                        }
                                
                                        const experiences = Array.from(workExperienceTableBody.rows).map(row => {
                                            if (row.cells.length === 1) return row.cells[0].textContent.trim();
                                            return `• ${row.cells[0].textContent.trim()} (${row.cells[1].textContent.trim()})`;
                                        }).join('\n');
                                
                                        hiddenWorkExperienceInput.value = experiences;
                                    }
                                
                                    // Function to remove work experience (called from inline onclick)
                                    window.removeWorkExperience = function(button) {
                                        const row = button.closest('tr');
                                        const type = row.cells[0].textContent.trim();
                                        const years = row.cells[1].textContent.trim();
                                        uniqueExperiences.delete(`${type}-${years}`);
                                        row.remove();
                                        updateHiddenInput();
                                    };
                                });
                                </script>
                                
                                <style>
                                .fade-in {
                                    animation: fadeIn 0.3s ease-out forwards;
                                }
                                
                                @keyframes fadeIn {
                                    from {
                                        opacity: 0;
                                        transform: translateY(-10px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }
                                
                                #workExperienceTableBody button {
                                    transition: all 0.2s ease;
                                }
                                
                                #workExperienceTableBody button:hover {
                                    transform: scale(1.05);
                                }
                                </style>


                            <div
                                class="bg-white dark:bg-gray-800 shadow-3d p-6 mt-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3"> <i
                                        class="fa-solid fa-location-dot mr-4 text-blue-400 dark:text-blue-200 "></i>
                                    Job Details & Location</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                                <div class="mt-6 relative p-2">
                                    <label for="local-location" class="block mb-1">
                                        Work Location
                                    </label>
                                    <div class="flex items-center space-x-2">
                                        <!-- Dropdown (Select) for Local Location -->
                                        <select id="local-location" name="local-location" aria-label="Work Location"
                                            class="form-input p-2 mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">

                                        </select>

                                        <!-- Clear Button -->
                                        <button id="clearLocationButton" type="button" aria-label="Clear"
                                            class="ml-2   px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                            Clear
                                        </button>
                                    </div>

                                    <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                        fetching location data</div>
                                    <input type="text" id="localLocationHidden" name="localLocation"
                                        value="{{ old('local-location', $job->location ?? '') }}" hidden />
                                    @error('localLocation')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4 p-2">
                                    <label for="description"
                                        class="block text-md  text-gray-800 dark:text-gray-300">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="form-textarea p-2 mt-1 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        placeholder="Enter job description">{{ $job->description }}</textarea>
                                    @error('description')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Benefits -->
                                <div class="mb-4 p-2">
                                    <label for="benefits"
                                        class="block  text-md text-gray-800 dark:text-gray-300">Benefits</label>
                                    <textarea id="benefits" name="benefits" rows="4"
                                        class="form-textarea mt-1 p-2  block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        placeholder="Enter job benefits">{{ $job->benefits }}</textarea>
                                    @error('benefits')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                              <div class="mt-4 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 p-2">
                                    <div class="flex-1">
                                        <label for="fromDate" class="block text-md font-medium text-gray-700 dark:text-gray-200">From Date</label>
                                        <input type="date" id="fromDate" name="fromDate"
                                            value="{{ old('fromDate', $job->from_date ?? '') }}"
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            onkeydown="return disableKeys(event)">
                                        @error('fromDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="flex-1">
                                        <label for="toDate" class="block text-md font-medium text-gray-700 dark:text-gray-200">To Date</label>
                                        <input type="date" id="toDate" name="toDate"
                                            value="{{ old('toDate', $job->to_date ?? '') }}"
                                            class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            onkeydown="return disableKeys(event)">
                                        @error('toDate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <!-- Vacancy -->
                                <div class="mb-4 p-2">
                                    <label for="vacancy"
                                        class="block text-md  text-gray-800 dark:text-gray-300">Vacancy</label>
                                    <input type="number" id="vacancy" name="vacancy" autocomplete="off"
                                        placeholder="Enter number of vacancies" value="{{ $job->vacancy }}"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                    @error('vacancy')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="bg-white dark:bg-gray-800 shadow-3d p-6 mt-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3"> <i
                                        class="fa-solid fa-user mr-4 text-blue-400 dark:text-blue-200"></i>
                                    Responsibilities</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">

                             
                                <div class="mb-4 p-2">
                                    <label for="responsibilitySearch" class="block text-md text-black-700">Enter
                                        Responsibilities  (Press Enter to add):</label>
                                    <div class="flex flex-col sm:flex-row items-center mb-4">
                                        <input type="text" id="responsibilitySearch"
                                               class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                                      focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                               placeholder="Type a responsibility">
                                        <button id="clearResponsibilityButton" type="button" class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            Clear
                                        </button>
                                    </div>


                                    <label for="hiddenResponsibilitiesInput"
                                        class="block text-md text-black-700 mt-4">Selected Responsibilities:</label>
                                    <textarea id="hiddenResponsibilitiesInput" name="hiddenResponsibilitiesInput" rows="12"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 
                                                  dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        readonly>{{ $job->responsibilities }}</textarea>
                                </div>

                            </div>


                            <div
                                class="bg-white dark:bg-gray-800 shadow-3d p-6 mt-6 rounded-lg transition-shadow duration-300 hover:shadow-lg">

                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4 mt-3"> <i
                                        class="fa-solid fa-pen mr-4 text-blue-400 dark:text-blue-200"></i>
                                    General and Training Qualifications</h3>
                                <hr
                                    class="w-full h-1 mx-auto my-4 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 border-0 rounded md:my-4 md:mb-8 dark:bg-gray-700">


                                <div class="mb-4 p-2">
                                    <label for="qualificationsInput"
                                        class="block text-md text-gray-800 dark:text-gray-300">Enter Qualifications  (Press Enter to add):  
                                    </label>
                                    <div class="flex flex-col sm:flex-row items-center mb-4">
                                        <input type="text" id="qualificationsInput"
                                               class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm
                                                      focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                               placeholder="Type a qualification">
                                        <button id="clearQualificationsButton" type="button" 
                                                class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            Clear
                                        </button>
                                    </div>


                                    <label for="hiddenQualificationsInput"
                                        class="block text-md text-gray-800 dark:text-gray-300 mt-4">Selected
                                        Qualifications:</label>
                                    <textarea id="hiddenQualificationsInput" name="hiddenQualificationsInput" rows="12"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        readonly>{{ $job->qualifications }}</textarea>

                                    @error('hiddenQualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>




                                <!-- Input box for certifications with suggestion dropdown -->
                                <div class="relative w-full  p-2">
                                    <label for="certificationInput"
                                        class="block text-md text-gray-800 dark:text-gray-300">
                                        Type Certification (Press Enter to add):
                                    </label>
                                   <div class="flex flex-col sm:flex-row items-center mb-2 relative">
                                        <input type="text" id="certificationInput"
                                               class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                                      focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300"
                                               placeholder="Enter certification">
                                        <button id="clearCertificationButton" type="button" 
                                                class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            Clear
                                        </button>
                                    <div id="suggestionBox"
                                         class="absolute top-full z-10 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 
                                                rounded-md shadow-lg mt-2 hidden overflow-y-auto max-h-48">
                                    </div>

                                    </div>

                                </div>

                                <div class="mb-2 p-2">
                                    <label for="hiddenTrainingsQualificationsInput"
                                        class="block text-md text-gray-800 dark:text-gray-300">
                                        Selected Training Qualifications:
                                    </label>
                                    <textarea id="hiddenTrainingsQualificationsInput" name="hiddenTrainingsQualificationsInput" rows="12"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        readonly>{{ $job->training_qualifications }}</textarea>
                                    @error('hiddenTrainingsQualificationsInput')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('clearResponsibilityButton').addEventListener('click', function() {
                if (confirm("Are you sure you want to clear all responsibilities?")) {
                    document.getElementById('responsibilitySearch').value = ''; // Clear the input field
                    document.getElementById('hiddenResponsibilitiesInput').value = ''; // Clear the hidden input
                }
            });
        
            document.getElementById('clearQualificationsButton').addEventListener('click', function() {
                if (confirm("Are you sure you want to clear all qualifications?")) {
                    document.getElementById('qualificationsInput').value = ''; // Clear the input field
                    document.getElementById('hiddenQualificationsInput').value = ''; // Clear the hidden input
                }
            });
        
            document.getElementById('clearCertificationButton').addEventListener('click', function() {
                if (confirm("Are you sure you want to clear all certifications?")) {
                    document.getElementById('certificationInput').value = ''; // Clear the input field
                    document.getElementById('hiddenTrainingsQualificationsInput').value = ''; // Clear the hidden input
                }
            });
        });
    </script>
</x-app-layout>

<script>
    const certificationInput = document.getElementById('certificationInput');
    const suggestionBox = document.getElementById('suggestionBox');
    const hiddenTextArea = document.getElementById('hiddenTrainingsQualificationsInput');
    const uniqueQualifications = new Set(hiddenTextArea.value.split('\n').map(item => item.trim()).filter(item => item));

    async function fetchCertifications(query) {
        suggestionBox.innerHTML = ''; // Clear previous suggestions
        if (query.length < 2) {
            suggestionBox.classList.add('hidden');
            return;
        }

        try {
            const response = await fetch('/certificates/Certificates.txt');
            const text = await response.text();
            const certifications = text.split('\n').filter(line => line.trim() !== '');
            const suggestions = certifications.filter(certification =>
                certification.toLowerCase().includes(query.toLowerCase())
            ).slice(0, 10);

            if (suggestions.length > 0) {
                suggestionBox.classList.remove('hidden');
                suggestions.forEach(item => {
                    const option = document.createElement('div');
                    option.className =
                        "p-2 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer";
                    option.textContent = item;

                    // Add click event to populate the input field and add to the text area
                    option.addEventListener('click', () => {
                        certificationInput.value = item; // Populate input with selected suggestion
                        addCertificationToTextArea(item); // Add the selected suggestion to the hidden text area
                        suggestionBox.classList.add('hidden'); // Hide suggestion box
                    });

                    suggestionBox.appendChild(option);
                });
            } else {
                suggestionBox.classList.add('hidden');
            }
        } catch (error) {
            console.error('Error fetching certifications:', error);
        }
    }

    function addCertificationToTextArea(certification) {
        const bulletCertification = `• ${certification}`;

        // Check if the certification is already in the set
        if (!uniqueQualifications.has(certification)) {
            uniqueQualifications.add(certification);
            // Add the bullet certification to the text area without adding extra newlines
            hiddenTextArea.value += (hiddenTextArea.value ? '\n' : '') + bulletCertification;
        } else {
            alert(`"${certification}" is already added.`);
        }
    }

    certificationInput.addEventListener('input', (event) => {
        fetchCertifications(event.target.value);
    });

    certificationInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            const certification = certificationInput.value.trim();
            if (certification) {
                addCertificationToTextArea(certification);
                certificationInput.value = '';
                suggestionBox.classList.add('hidden');
            }
        }
    });

    // Close suggestions if clicking outside
    document.addEventListener('click', (event) => {
        if (!suggestionBox.contains(event.target) && event.target !== certificationInput) {
            suggestionBox.classList.add('hidden');
        }
    });
</script>





<script>
     document.addEventListener('DOMContentLoaded', function() {
        var responsibilitySearch = document.getElementById('responsibilitySearch');
        var hiddenInput = document.getElementById('hiddenResponsibilitiesInput');
        
            responsibilitySearch.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission
        
                    // Split the input value into individual responsibilities
                    var responsibilities = responsibilitySearch.value.split(',').map(function(responsibility) {
                        return responsibility.trim();
                    });
        
                    // Clear the input field
                    responsibilitySearch.value = '';
        
                    // Get existing responsibilities from the hidden input
                    var existingResponsibilities = hiddenInput.value.split('\n').filter(Boolean);
        
                    responsibilities.forEach(function(responsibility) {
                        if (responsibility && !isResponsibilityDuplicate(responsibility, existingResponsibilities)) {
                            // Add responsibility to the hidden input
                            existingResponsibilities.push(`• ${responsibility}`); // Using '•' for bullet point
                        } else if (isResponsibilityDuplicate(responsibility, existingResponsibilities)) {
                            alert('Responsibility "' + responsibility + '" is already added.');
                        }
                    });
        
                    // Update the hidden input with the new responsibilities
                    hiddenInput.value = existingResponsibilities.join('\n');
                }
            });
        
            function isResponsibilityDuplicate(responsibility, existingResponsibilities) {
                return existingResponsibilities.some(function(existing) {
                    return existing.toLowerCase() === `• ${responsibility.toLowerCase()}`;
                });
            }
        
            // Clear responsibilities
            document.getElementById('clearResponsibilityButton').addEventListener('click', function() {
                hiddenInput.value = ''; // Clear hidden input value
                responsibilitySearch.value = ''; // Clear input field
            });
        });
    
    
    
        document.addEventListener('DOMContentLoaded', function() {
            var qualificationsInput = document.getElementById('qualificationsInput');
            var hiddenQualificationsInput = document.getElementById('hiddenQualificationsInput');
    
            qualificationsInput.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission
    
                    var qualifications = qualificationsInput.value.trim();
    
                    if (qualifications) {
                        qualificationsInput.value = ''; // Clear the input field
    
                        // Check if the qualification already exists in the hidden textarea
                        if (!isQualificationsDuplicate(qualifications)) {
                            // Append the new qualification with a bullet point
                            if (hiddenQualificationsInput.value) {
                                hiddenQualificationsInput.value +=
                                    '\n'; // Add a newline if there are existing qualifications
                            }
                            hiddenQualificationsInput.value +=
                                `• ${qualifications}`; // Add new qualification
                        } else {
                            alert('Qualification "' + qualifications + '" is already added.');
                        }
                    }
                }
            });
    
            function isQualificationsDuplicate(qualifications) {
                // Get current qualifications from the hidden textarea
                var existingQualifications = hiddenQualificationsInput.value.split('\n').map(function(item) {
                    return item.replace('• ', '').trim(); // Remove bullet points and trim
                });
    
                // Check for duplicates
                return existingQualifications.includes(qualifications);
            }
        });
    
    
    
        //CITIES
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
    
                    // Populate the dropdown with filtered cities data
                    populateLocationDropdown(citiesData);
                })
                .catch(error => {
                    console.error('Error fetching city data:', error);
                    errorDiv.classList.remove('hidden');
                });
    
    
            // Populate the dropdown with location options
            function populateLocationDropdown(cities) {
                locationSelect.innerHTML =
                    '<option value="" disabled selected>Select a Location</option>'; // Default option
    
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = `${city.name}, ${city.province}`;
                    option.textContent = `${city.name}, ${city.province}`;
                    locationSelect.appendChild(option);
                });
    
                // Set selected value to the saved location if available
                if (localLocationHidden.value) {
                    locationSelect.value = localLocationHidden.value;
                }
    
                // Update hidden input value on selection change
                locationSelect.addEventListener('change', function() {
                    localLocationHidden.value = this.value;
                });
            }
    
            // Clear button functionality
            clearButton.addEventListener('click', function() {
                locationSelect.value = ''; // Clear the dropdown selection
                localLocationHidden.value = ''; // Clear the hidden input field
            });
    
            // Edit button functionality (optional if you want to include it)
            const editLocationButton = document.getElementById('editLocationButton');
            if (editLocationButton) {
                editLocationButton.addEventListener('click', function() {
                    locationSelect.removeAttribute('disabled'); // Enable dropdown for editing
                    locationSelect.focus(); // Focus on the select field
                });
            }
        });


    //COUNTRIES
    document.addEventListener('DOMContentLoaded', function() {
        const overseasLocationSelect = document.getElementById('overseas-location');
        const overseasLocationHidden = document.getElementById('overseaslocationHidden');
        const clearOverseasLocationButton = document.getElementById('clearOverseasLocationButton');
        const errorDiv = document.getElementById('overseas-location-error');

        // Fetch countries data from the JSON file
        fetch('/locations/countries.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Populate the dropdown with country options
                overseasLocationSelect.innerHTML =
                    '<option value="" disabled selected>Select an Overseas Location</option>';
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.country;
                    option.textContent = country.country;
                    overseasLocationSelect.appendChild(option);
                });

                // Set the selected value to the hidden input if available
                if (overseasLocationHidden.value) {
                    overseasLocationSelect.value = overseasLocationHidden.value;
                }

                // Update hidden input value on dropdown change
                overseasLocationSelect.addEventListener('change', function() {
                    overseasLocationHidden.value = this.value;
                });
            })
            .catch(error => {
                console.error('Error fetching country data:', error);
                errorDiv.classList.remove('hidden');
            });

        // Clear button functionality
        clearOverseasLocationButton.addEventListener('click', function() {
            overseasLocationSelect.value = ''; // Clear the dropdown selection
            overseasLocationHidden.value = ''; // Clear the hidden input field
        });
    });

    function clearFormFields() {
        // Clear job type select
        document.getElementById('job_title').value = '';
        document.getElementById('job_type').value = '';
        document.getElementById('salary').value = '';
        document.getElementById('educationLevel').value = '';
        document.getElementById('local-location').value = '';
        document.getElementById('description').value = '';
        document.getElementById('benefits').value = '';
        document.getElementById('responsibilitySearch').value = '';
        document.getElementById('responsibilityTableBody').innerHTML = '';
        document.getElementById('hiddenResponsibilitiesInput').value = '';
        document.getElementById('qualificationsInput').value = '';
        document.getElementById('qualificationsTableBody').innerHTML = '';
        document.getElementById('hiddenQualificationsInput').value = '';
        document.getElementById('vacancy').value = '';
    }
</script>


</script>
<style>
    .suggestion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        cursor: pointer;
        border-radius: 4px;
        margin-bottom: 4px;
    }

    .suggestion-text {
        flex: 1;
    }

    .plus-container {
        background-color: #5cb85c;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        margin-left: 8px;
    }

    .plus-container:hover {
        background-color: #4cae4c;
    }
</style>
