<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Review Applicant Info </title>

    </head>
    
    <style>
    .card-container {
        background: linear-gradient(135deg, #f0f4f8, #e2e8f0);
        border: 1px solid #cbd5e0;
        border-radius: 10px;
        padding: 16px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card-container:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background: linear-gradient(135deg, #e2e8f0, #f0f4f8);
    }
    
    .dark .card-container:hover {
        background: linear-gradient(135deg, #4a5568, #2d3748);
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #2d3748;
    }

    .card-item {
        display: flex;
        align-items: center;
        font-size: 1rem;
    }
    
    .card-item strong {
        margin-right: 0.5rem;
    }
    
    .dark .card-container {
        background: linear-gradient(135deg, #2d3748, #4a5568);
        border-color: #4a5568;
    }
</style>




    <body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 overflow-auto">
        <div class="flex flex-col md:flex-row h-full ">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-400 dark:border-gray-600 px-4 py-6 ">
                <div class="p-4">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="flex items-center space-x-2">
                            <li>
                                <a href="{{ route('employer.review') }}"
                                    class="flex items-center bg-blue-500  text-white p-2 rounded-lg shadow-lg dark:text-gray-200 hover:text-gray-200 dark:hover:text-gray-300">
                                    <i class="fas fa-arrow-left mr-1"></i> Go Back
                                </a>
                            </li>
                        </ol>
                    </nav>



                <div class="flex flex-col items-center mb-5">
                    <div class="border-4 border-blue-500 p-1 rounded-full">
                        <div class="border-4 border-yellow-300 rounded-full">
                            <img src="{{ asset('storage/' . $pwdinfo->profilePicture) }} " alt="Applicant Image"
                                class="w-44 h-44 object-contain rounded-full  custom-shadow"
                                onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                        </div>
                    </div>
                </div>

                    <!-- Sidebar content here -->
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:
                        #{{ $pwdinfo->user_id }}</h2>
                        
                    <div class="text-lg mt-2 font-semibold bg-gradient-to-r from-blue-500 to-blue-600 text-white p-1 rounded-lg text-center dark:text-gray-200">
                        Applied as: {{ $job->title }}
                        <br>
                        <a href="{{ route('employer.edit', ['id' => $job->id]) }}" 
                           class="mt-2 inline-block bg-white text-blue-600 font-bold py-2 w-full p-2 rounded-lg hover:bg-blue-100 transition duration-300">
                           <i class="fas fa-info-circle mr-2"></i> Job Info
                        </a>
                    </div>




                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: {{ $pwdinfo->created_at->format('F j, Y \a\t h:i A') }}
                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('employer.applicantinfo', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                 {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.pwdinfo', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                    {{ Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.resume', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                 {{ Route::currentRouteName() == 'employer.resume' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-file-alt mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">Resume Information</span>
                            </a>
                        </li>
                    </ul>
                    
                    <div id="deleteJobAppModal"
                        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-75 p-4">
                        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 lg:w-1/3 p-6 rounded-lg shadow-lg overflow-y-auto"
                            style="max-height: 90vh;">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                                    <i class="fas fa-trash-alt mr-2"></i> <!-- Font Awesome Trash Icon -->
                                    Delete Job Application
                                </h2>
                                <button id="closeDeleteModalBtn" class="text-gray-600 hover:text-gray-800" aria-label="Close modal" onclick="cancelDelete()">
                                    <i class="fas fa-times"></i> <!-- Close icon -->
                                </button>
                            </div>
                    
                           <form id="delete-job-app-form" method="POST" action="{{ route('employer.deleteapplication', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                @csrf
                                @method('DELETE') 
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Are you sure you want to delete this job application? This action cannot be undone.
                                </p>
                                <div class="flex flex-col sm:flex-row justify-end mt-4 space-y-2 sm:space-y-0 sm:space-x-2">
                                    <button id="confirmDeleteBtn"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg w-full sm:w-auto">
                                        <i class="fas fa-check-circle mr-2"></i> <!-- Check icon -->
                                        Confirm Delete
                                    </button>
                                    <button id="cancelDeleteBtn" type="button"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded shadow-lg w-full sm:w-auto"
                                        onclick="cancelDelete()">
                                        <i class="fas fa-times-circle mr-2"></i> <!-- Cancel icon -->
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <script>
                        function openDeleteJobAppModal() {
                            document.getElementById('deleteJobAppModal').classList.remove('hidden');
                        }
                        
                        function cancelDelete() {
                            document.getElementById('deleteJobAppModal').classList.add('hidden');
                        }
                    </script>

                    
<div class="flex flex-col space-y-4 w-full mt-6">
    @if ($totalHiredByCompanyCount > 0)
        <div class="mb-2 bg-blue-50 dark:bg-gray-800 rounded-lg border-l-2 border-blue-500">
            <div class="p-2 flex items-center space-x-2">
                <i class="fas fa-info-circle text-blue-500"></i>
                <p class="text-md text-blue-700 dark:text-blue-300">
                    This applicant is currently employed in your company for another position.
                </p>
            </div>
        </div>
    @endif

    @if (!$interview)
        <!-- Check if there's no interview record -->
        <button id="setInterviewBtn"
            class="w-full bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg"
            onclick="openInterviewModal()">
            <i class="fas fa-calendar-alt mr-2"></i> Set Interview
        </button>
    @else
       <div class="mb-2 p-2 bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-sm flex items-center">
            <i class="fas fa-check-circle mr-2 text-white"></i>
            <p class="text-md text-white">Interview already notice sent as of {{ \Carbon\Carbon::parse($interview->created_at)->setTimezone('Asia/Singapore')->format('F j, Y g:i A') }}</p>
        </div>
        
        <!-- Additional note for resending the invitation -->
        <div class="mb-4 p-2 bg-yellow-600 rounded-lg shadow-sm flex items-center">
            <i class="fas fa-info-circle mr-2 text-white"></i>
            <p class="text-md text-white">You can send another interview invitation if needed.</p>
        </div>
        
        <button id="setInterviewBtn"
            class="w-full bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg"
            onclick="openInterviewModal()">
            <i class="fas fa-calendar-alt mr-2"></i> Set Interview
        </button>

        <a href="{{ route('employer.messages') }}"
            class="w-full flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out mt-2">
            <i class="fas fa-paper-plane mr-2"></i> Send Message
        </a>
        <button id="hireApplicantBtn"
            class="w-full bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
            <i class="fas fa-user-plus mr-2"></i> Hire Applicant
        </button>
    @endif
</div>





                    <div id="interviewModal"
                        class="fixed inset-0 hidden z-50 bg-black bg-opacity-50 flex items-center justify-center p-4">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto overflow-y-auto"
                            style="max-height: 90vh;">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                    <i class="fas fa-calendar-alt mr-2"></i> Set Interview
                                </h2>
                                <button
                                    class="text-gray-500 text-3xl hover:text-gray-700 dark:text-gray-300 dark:hover:text-white"
                                    onclick="closeInterviewModal()">×</button>
                            </div>

                            <form
                                action="{{ route('employer.setInterview', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                                method="POST">
                                @csrf
                                <!-- Date Picker -->
                                <div class="mt-4">
                                    <label for="interviewDate"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select
                                        Date</label>
                                    <input type="date" id="interviewDate" onchange="updateInterviewText()" onkeydown="return disableKeys(event)"
                                        class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                </div>

                                <div class="mt-4">
                                    <label for="interviewLocation"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Interview
                                        Location</label>
                                    <input type="text" id="interviewLocation" placeholder="Enter interview location"
                                        oninput="updateInterviewText()" name="interviewLocation"
                                        class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                </div>

                                <!-- Time Picker -->
                                <div class="mt-4 flex items-center">
                                    <label for="interviewTime"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">Select
                                        Time</label>
                                    <select id="interviewHour" onchange="updateInterviewText()"
                                        class="rounded-md p-3 px-7 border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                        <script>
                                            for (let hour = 1; hour <= 12; hour++) {
                                                document.write(`<option value="${hour}">${hour}</option>`);
                                            }
                                        </script>
                                    </select>
                                    <span class="mx-2 text-black dark:text-white">:</span>
                                    <select id="interviewMinute" onchange="updateInterviewText()"
                                        class="rounded-md p-3 px-7 border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                        <script>
                                            for (let minute = 0; minute < 60; minute += 5) {
                                                const formattedMinute = minute < 10 ? '0' + minute : minute;
                                                document.write(`<option value="${formattedMinute}">${formattedMinute}</option>`);
                                            }
                                        </script>
                                    </select>
                                    <select id="interviewPeriod" onchange="updateInterviewText()"
                                        class="rounded-md p-3 ml-2 px-8 border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                        <option value="AM">AM</option>
                                        <option value="PM">PM</option>
                                    </select>
                                </div>

                                <!-- Text Box -->
                                <div class="mt-4">
                                    <label for="interviewNotes"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Additional
                                        Notes</label>
                                    <textarea id="interviewNotes" rows="12" name="interviewNotes"
                                        class="mt-1 block w-full p-2 rounded-md border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300 text-left">
Dear {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}

We are pleased to inform you that we are interested in learning more about you. We would like to invite you for an interview for the {{ $job->title }} position.
Interview Details:
                    
Date: [Date]
Time: [Time]
Location: [Type the Location]
                    
We look forward to meeting you!
                    
Sincerely,
{{ $employer->contact_person }}
{{ $employer->position }}
{{ $employer->businessname }}
{{ $employer->mobile_no }}
</textarea>
                                </div>

                                <!-- Submit and Cancel Buttons -->
                                <div class="mt-6 flex flex-col sm:flex-row sm:justify-end sm:space-x-4">
                                    <button type="button"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 mb-2 sm:mb-0"
                                        onclick="closeInterviewModal()">Cancel</button>
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600"
                                        onclick="return validateForm()">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                        function validateForm() {
                            const date = document.getElementById("interviewDate").value;
                            const location = document.getElementById("interviewLocation").value;
                            const hour = document.getElementById("interviewHour").value;
                            const minute = document.getElementById("interviewMinute").value;
                            const period = document.getElementById("interviewPeriod").value;

                            let missingFields = [];

                            if (!date) {
                                missingFields.push("Date");
                            }
                            if (!location) {
                                missingFields.push("Location");
                            } else if (location.length < 12) {
                                missingFields.push("Location (must be at least 12 characters)");
                            }
                            if (!hour) {
                                missingFields.push("Hour");
                            }
                            if (!minute) {
                                missingFields.push("Minute");
                            }
                            if (!period) {
                                missingFields.push("Period");
                            }

                            if (missingFields.length > 0) {
                                alert("Please fill out the following fields before submitting:\n- " + missingFields.join("\n- "));
                                return false;
                            }

                            return confirm('Are you sure you want to submit?');
                        }


                        function updateInterviewText() {
                            const rawDate = document.getElementById("interviewDate").value;
                            const dateObj = new Date(rawDate);
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            const formattedDate = dateObj.toLocaleDateString('en-US', options);

                            const hour = document.getElementById("interviewHour").value;
                            const minute = document.getElementById("interviewMinute").value;
                            const period = document.getElementById("interviewPeriod").value;

                            const time = `${hour}:${minute} ${period}`;
                            const location = document.getElementById("interviewLocation").value;

                            const applicantName =
                                "{{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}";
                            const jobTitle = "{{ $job->title }}";
                            const employerName = "{{ $employer->contact_person }}"; // Company Name
                            const employerPosition = "{{ $employer->position }}"; // Employer’s Position
                            const companyName = "{{ $employer->businessname }}"; // Company Name
                            const employerContactInfo = "{{ $employer->mobile_no }}"; // Employer’s Contact Information

                            const interviewDetails = `
Dear ${applicantName},

We are pleased to inform you that we are interested in learning more about you. We would like to invite you for an interview for the ${jobTitle} position.
Interview Details:

Date: ${formattedDate}
Time: ${time}
Location: ${location}

We look forward to meeting you!

Sincerely,
${employerName}
${employerPosition}
${companyName}
${employerContactInfo}`;
                            document.getElementById("interviewNotes").value = interviewDetails.trim();
                        }

                        function openInterviewModal() {
                            document.getElementById('interviewModal').classList.remove('hidden');
                        }

                        function closeInterviewModal() {
                            document.getElementById('interviewModal').classList.add('hidden');
                        }
                    </script>

                    @if (Session::has('resumeerror'))
                        <script>
                            $(document).ready(function() {
                                toastr.options = {
                                    "progressBar": true,
                                    "closeButton": true,
                                }
                                toastr.error("{{ Session::get('resumeerror') }}", 'No Resume Found for: {{ $applicant->user_id }}', {
                                    timeOut: 5000
                                });
                            });
                        </script>
                    @endif
                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                 <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 rounded-t-md shadow-lg flex items-center space-x-2">
                <i class="fas fa-user text-3xl"></i> <!-- Icon for Company -->
                <h2 class="text-2xl font-bold">
                {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}
                </h2>
            </div>



            <div class="bg-white dark:bg-gray-800 p-6 rounded-b-md shadow-lg border-b-4 border-blue-500">
                <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2 flex flex-col md:flex-row items-start md:items-center">
                    <!-- TIN Number Section with Icon -->
                    <span class="mb-2 md:mb-0 md:mr-8 flex items-center space-x-2">
                        <i class="fas fa-id-card text-blue-600 dark:text-blue-400"></i> <!-- Icon for TIN -->
                            <strong>Employment Status: </strong> {{ $employment->employment_type }}
                    </span>
                    
                    <!-- Subtle Divider Line for Separation (only on mobile) -->
                    <hr class="border-gray-300 dark:border-gray-600 my-2 md:hidden">
                    
                    <!-- Trade Name Section with Icon -->
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-tag text-blue-600 dark:text-blue-400"></i> <!-- Icon for Trade Name -->
                        <strong>Looking for a Job in: </strong> {{ $employment->job_search_duration . ' ' . $employment->duration_category }}
                    </span>
                </h4>
            </div>
    <br>

                    

                    <!-- Main Content Card: Personal Information -->
        <div class="col-span-2 space-y-6">
            <!-- Personal Information Card -->
            <div class="card-container">
                <h3 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
                    <i class="fas fa-user mr-2"></i> Personal Information
                </h3>
                <hr class="border-blue-600 mb-4 dark:border-blue-300">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                 <div class="card-item dark:text-gray-200">
                    <strong><i class="fas fa-user-circle mr-1 text-blue-500 dark:text-blue-300"></i>Civil Status:</strong> 
                        <span>{{ $personal->civilStatus }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-venus-mars mr-1 text-blue-500 dark:text-blue-300"></i>Gender:</strong> 
                        <span>{{ $applicant->gender }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-calendar-alt mr-1 text-blue-500 dark:text-blue-300"></i>Birthdate:</strong> 
                        <span>{{ date('M d, Y', strtotime($applicant->birthdate)) }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-home mr-1 text-blue-500 dark:text-blue-300"></i>Address:</strong> 
                        <span>{{ $personal->presentAddress }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-phone-alt mr-1 text-blue-500 dark:text-blue-300"></i>Cellphone:</strong> 
                        <span>{{ $personal->cellphoneNo }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-praying-hands mr-1 text-blue-500 dark:text-blue-300"></i>Religion:</strong> 
                        <span>{{ $personal->religion }}</span>
                    </div>
                    <div class="card-item dark:text-gray-200">
                        <strong><i class="fas fa-people-arrows mr-1 text-blue-500 dark:text-blue-300"></i>OFW:</strong> 
                        <span>{{ $applicant->beneficiary_4ps || $applicant->ofw_country ? 'Yes' : 'No' }}</span>
                    </div>

                </div>
            </div>

        
                    <!-- Educational Attainment Card -->
            <div class="card-container">
                <h3 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
                    <i class="fas fa-graduation-cap mr-2"></i> Educational Attainment
                </h3>
                <hr class="border-blue-600 mb-4 dark:border-blue-300">

                  <ul class="space-y-2 dark:text-gray-200">
                    <li>
                        <strong><i class="fas fa-graduation-cap mr-1 text-blue-500 dark:text-blue-300"></i> Highest Level:</strong> 
                        {{ $education->educationLevel }}
                    </li>
                    <li>
                        <strong><i class="fas fa-school mr-1 text-blue-500 dark:text-blue-300"></i> School:</strong> 
                        {{ $education->school }}
                    </li>
                    <li>
                        <strong><i class="fas fa-calendar-check mr-1 text-blue-500 dark:text-blue-300"></i> Year Graduated:</strong> 
                        {{ $education->yearGraduated ?? 'No Data' }}
                    </li>
                    <li>
                        <strong><i class="fas fa-trophy mr-1 text-blue-500 dark:text-blue-300"></i> Awards:</strong> 
                        {{ $education->awards ?? 'No Awards Found' }}
                    </li>
                </ul>
            </div>

                    <!-- Work Experience and Skills Card Container -->
<div class="card-container">
     <h3 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
        <i class="fas fa-briefcase mr-2"></i> Work Experience and Skills
    </h3>
    <hr class="border-blue-600 mb-4 dark:border-blue-300">

    <div class="space-y-6">
        @if($workExperiences->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">No work experience available.</p>
        @else
            @foreach($workExperiences as $workExperience)
                <!-- Work Experience Entry -->
                <div class="p-4">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">{{ $workExperience->employer_name }}</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ date('d M Y', strtotime($workExperience->from_date)) }} - 
                        {{ $workExperience->to_date ? date('d M Y', strtotime($workExperience->to_date)) : 'Present' }}
                    </p>
                    <br>
                    <div class="text-left dark:text-gray-200">
                        <p><strong>Position Held:</strong> {{ $workExperience->position_held }}</p>
                        <p><strong>Employer Address:</strong> {{ $workExperience->employer_address }}</p>
                        <p><strong>Skills Acquired:</strong> {{ $workExperience->skills }}</p>
                        <p><strong>Employment Status:</strong> {{ $workExperience->employment_status }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Certifications Card -->
<div class="card-container">
    <h2 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
        <i class="fas fa-certificate mr-2"></i> Certifications
    </h2>
    <hr class="border-blue-600 mb-4 dark:border-blue-300">

    <ul class="space-y-2 dark:text-gray-200">
        @if (!empty($education->certifications))
            @foreach (explode(',', $education->certifications) as $certifItem)
                <li>• {{ trim($certifItem) }}</li>
            @endforeach
        @else
            <li>No Certifications Available.</li>
        @endif
    </ul>
</div>

                    
                    
                    <!-- Other Skills and Languages Card -->
<div class="card-container">
    <h2 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
        <i class="fas fa-language mr-2 "></i> Other Skills and Languages
    </h2>
    <hr class="border-blue-600 mb-4 dark:border-blue-300">

    <ul class="space-y-2 dark:text-gray-200">
        <li>
            <strong>
                <i class="fas fa-tools mr-1 text-blue-500 dark:text-blue-300"></i> Skills:
            </strong>
            @php
                $skillsArray = is_array($skill->skills) ? $skill->skills : json_decode($skill->skills, true);
            @endphp
            @foreach($skillsArray as $skillItem)
                <span>{{ $skillItem }}</span>@if(!$loop->last),@endif
            @endforeach
        </li>
        <li>
        <strong>
            <i class="fas fa-language mr-1 text-blue-500 dark:text-blue-300"></i> Languages:
        </strong>
         {{ implode(', ', array_map('trim', explode(',', $language->language_input))) }}
        </li>
    </ul>
</div>

<!-- Message Card (Moved to the end of the page) -->
            <div class="card-container">
                <h2 class="text-blue-600 text-2xl font-bold mb-4 dark:text-blue-300">
                    <i class="fas fa-envelope mr-2 "></i> Message
                </h2>
                <hr class="border-blue-600 mb-4 dark:border-blue-300">

                <div class="mt-2"></div>
                <textarea
                    class="w-full mt-3 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                    rows="5" disabled>{{ $jobapplication->description }}</textarea>
            </div>


    <div id="hireModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-75 p-4" style="margin-top: 0px;">
        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 lg:w-1/3 p-6 rounded-lg shadow-lg overflow-y-auto"
            style="max-height: 90vh;">
            <div class="flex justify-between items-center mb-4">
                 <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    <i class="fas fa-question-circle mr-2"></i> <!-- Font Awesome Question Icon -->
                    Hire {{ $applicant->firstname }} as Employee?
                </h2>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800" aria-label="Close modal">
                    <i class="fas fa-times"></i> <!-- Close icon -->
                </button>
            </div>

            <form id="hire-form"
                action="{{ route('hire.applicant', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                method="POST">
                @csrf
                 <textarea name="remarkstextarea" id="remarkstextarea"
                    class="w-full px-3 py-2 @if (session('theme') === 'dark') bg-gray-800 text-gray-300 @else bg-white text-gray-700 @endif
                        border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-800 dark:text-gray-300"
                    rows="8" placeholder="Type your comments or feedback here...">Congratulations! You have been hired as a {{$job->title}} at {{$job->company_name}}  We are excited to have you join our team! If you have any questions, feel free to reach out to our contact person or the HR department ({{ $employer->mobile_no }}) or ({{ $employer->telephone_no }}). Welcome aboard!</textarea>

                <div class="flex flex-col sm:flex-row justify-end mt-4 space-y-2 sm:space-y-0 sm:space-x-2">
                    <button id="confirmHireBtn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg w-full sm:w-auto">
                        <i class="fas fa-check-circle mr-2"></i> <!-- Check icon -->
                        Confirm
                    </button>
                    <button id="cancelHireBtn" type="button"
                        class="bg-red-500  hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg w-full sm:w-auto"
                        onclick="cancelHire()">
                        <i class="fas fa-times-circle mr-2"></i> <!-- Cancel icon -->
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
<script>
    // Get elements
    const hireApplicantBtn = document.getElementById('hireApplicantBtn');
    const hireModal = document.getElementById('hireModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const confirmHireBtn = document.getElementById('confirmHireBtn');
    const cancelHireBtn = document.getElementById('cancelHireBtn');

    // Open modal function
    function openModal() {
        hireModal.classList.remove('hidden');
    }

    // Close modal function
    function closeModal() {
        hireModal.classList.add('hidden');
    }

    // Event listeners
    hireApplicantBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelHireBtn.addEventListener('click', closeModal);
</script>

<style>
    .custom-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4), 0 2px 4px rgba(0, 0, 0, 0.06);
    }
</style>
