<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
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
                                <a href="{{ route('admin.manageusers') }}"
                                    class="flex items-center bg-blue-500  text-white p-2 rounded-lg shadow-lg dark:text-gray-200 hover:text-gray-200 dark:hover:text-gray-300">
                                    <i class="fas fa-arrow-left mr-1"></i> Go Back
                                </a>
                            </li>
                        </ol>
                    </nav>


                    <div class="flex flex-col items-center mb-5">
                        <div
                            class="w-48 h-48 rounded-full border-4 border-yellow-400 shadow-3d flex items-center justify-center">
                            <!-- Outer yellow border -->
                            @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                                <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                    alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500">
                                <!-- Inner blue border -->
                            @else
                                <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500">
                                <!-- Inner blue border -->
                            @endif
                        </div>
                    </div>

                    <!-- Sidebar content here -->
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:
                        #{{ $pwdinfo->user_id }}</h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: {{ $pwdinfo->created_at->format('F j, Y \a\t h:i A') }}
                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.applicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pwdapplicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                {{ Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400"
                                onclick="openDeleteModal()">
                                <i class="fas fa-trash-alt mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">Delete Account</span>
                            </a>
                        </li>

                        <script>
                            function openDeleteModal() {
                                document.getElementById('deleteModal').classList.remove('hidden');
                            }

                            function closeDeleteModal() {
                                document.getElementById('deleteModal').classList.add('hidden');
                            }
                        </script>
                    </ul>
                    <div id="deleteModal"
                        class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50 p-4">
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                            <h2 class="text-xl font-bold mb-4 text-black dark:text-white">Confirm Account Deletion</h2>
                            <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                            <!-- Warning Icon -->
                            <div class="flex justify-center mb-4">
                                <i class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                            </div>

                            <!-- Modal Body -->
                            <p class="text-black dark:text-white mb-6">Are you sure you want to delete this account?
                                This action cannot be undone.</p>

                            <!-- Buttons for confirmation and cancellation -->
                            <div class="flex flex-col justify-end space-y-2">
                                <!-- Delete Button -->
                                <form action="{{ route('admin.removeuser', ['id' => $applicant->user_id]) }}"
                                    method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full">Delete</button>
                                </form>

                                <button onclick="closeDeleteModal()"
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded">Cancel</button>
                            </div>
                        </div>
                    </div>



                    @if ($user->account_verification_status === 'waiting for approval')
                        <!-- Approve User Button -->
                        <button id="hireApplicantBtn"
                            class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Approve User?
                        </button>

                        <!-- Decline User Button -->
                        <button id="declineApplicantBtn"
                            class="w-full mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-minus mr-2"></i> Decline User?
                        </button>

                        <div x-data="{ showModal: false }">
                            <!-- Reset Button -->
                            <a href="javascript:void(0);" @click="showModal = true"
                                class="w-full text-center shadow-lg mt-5 inline-block px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                <i class="fas fa-redo mr-2"></i> <!-- Font Awesome reset icon -->
                                Reset Application
                            </a>

                            <!-- Modal -->
                            <template x-if="showModal" class="modal-wrapper">
                                <div x-show="showModal"
                                    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4">
                                    <div
                                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                                        <h2 class="text-xl font-bold mb-4 text-black dark:text-white">Confirm
                                            Application Reset?</h2>
                                        <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                                        <!-- Warning Icon -->
                                        <div class="flex justify-center mb-4">
                                            <i class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                                        </div>

                                        <!-- Modal Body -->
                                        <p class="text-black dark:text-white mb-6">
                                            Do you really want to reset the application? This action cannot be undone.
                                        </p>

                                        <!-- Form to send a message -->
                                        <form action="{{ route('admin.reset', ['id' => $applicant->user_id]) }}"
                                            method="GET">
                                            @csrf
                                            <!-- Message Text Area -->
                                            <div class="mb-4">
                                                <label for="message"
                                                    class="block text-sm font-medium text-gray-800 dark:text-gray-300">
                                                    Add a message for the applicant:
                                                </label>
                                                <textarea name="message" id="message" rows="4" class="w-full px-3 py-2 border rounded-md shadow-sm text-black"
                                                    placeholder="Enter your message..."></textarea>
                                            </div>

                                            <!-- Buttons for confirmation and cancellation -->
                                            <div class="flex flex-col justify-end space-y-2">
                                                <!-- Proceed Button -->
                                                <button type="submit"
                                                    class="bg-red-600 text-center hover:bg-red-700 text-white px-4 py-2 rounded w-full">
                                                    Reset Application
                                                </button>

                                                <!-- Cancel Button -->
                                                <button type="button" @click="showModal = false"
                                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded w-full">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </template>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <div
                    class="text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white p-4 rounded-t-md shadow-lg mb-6">
                    <h1 class="text-3xl font-bold uppercase">User Profile</h1>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 rounded-t-md shadow-lg flex items-center space-x-2">
                    <i class="fas fa-user text-3xl"></i> <!-- Icon for Company -->
                    <h2 class="text-2xl font-bold">
                        {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}
                    </h2>
                </div>



                <div class="bg-white dark:bg-gray-800 p-6 rounded-b-md shadow-lg border-b-4 border-blue-500">
                    <h4
                        class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2 flex flex-col md:flex-row items-start md:items-center">
                        <!-- TIN Number Section with Icon -->
                        <span class="mb-2 md:mb-0 md:mr-8 flex items-center space-x-2">
                            <i class="fas fa-id-card text-blue-600 dark:text-blue-400"></i> <!-- Icon for TIN -->
                            <strong>Employment Status:&nbsp;&nbsp;</strong> {{ $employment->employment_type }}
                        </span>

                        <!-- Subtle Divider Line for Separation (only on mobile) -->
                        <hr class="border-gray-300 dark:border-gray-600 my-2 md:hidden">

                        <!-- Trade Name Section with Icon -->
                        <span class="flex items-center space-x-2">
                            <i class="fas fa-tag text-blue-600 dark:text-blue-400"></i> <!-- Icon for Trade Name -->
                            <strong>Looking for a Job in:&nbsp;&nbsp;</strong>
                            {{ $employment->job_search_duration . ' ' . $employment->duration_category }}
                        </span>
                    </h4>
                </div>
                <br>


                <div class="col-span-2 space-y-6">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                        <h2
                            class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                            <i class="fas fa-user mr-2 text-3xl text-blue-600 dark:text-blue-400"></i> Personal
                            Information
                        </h2>
                        <hr class="border-t-2 border-blue-500 mb-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-user mr-1 text-blue-500"></i> Civil Status:
                                </strong><span>{{ $personal->civilStatus }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-venus-mars mr-1 text-blue-500"></i> Gender:
                                </strong><span>{{ $applicant->gender }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-birthday-cake mr-1 text-blue-500"></i> Birthdate:
                                </strong><span>{{ date('M d, Y', strtotime($applicant->birthdate)) }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-map-marker-alt mr-1 text-blue-500"></i> Address:
                                </strong><span>{{ $personal->presentAddress }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-mobile-alt mr-1 text-blue-500"></i> Cellphone:
                                </strong><span>{{ $personal->cellphoneNo }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-praying-hands mr-1 text-blue-500"></i> Religion:
                                </strong><span>{{ $personal->religion }}</span>
                            </div>
                            <div class="card-item dark:text-gray-200">
                                <strong><i class="fas fa-plane-departure mr-1 text-blue-500"></i> OFW:
                                </strong><span>{{ $applicant->beneficiary_4ps || $applicant->ofw_country ? 'Yes' : 'No' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                        <h2
                            class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                            <i class="fas fa-graduation-cap mr-2 text-3xl text-blue-600 dark:text-blue-400"></i>
                            Educational Attainment
                        </h2>
                        <hr class="border-t-2 border-blue-500 mb-4">

                        <ul class="space-y-2 dark:text-gray-200">
                            <li>
                                <strong><i class="fas fa-graduation-cap mr-1 text-blue-500"></i> Highest
                                    Level:</strong> {{ $education->educationLevel }}
                            </li>
                            <li>
                                <strong><i class="fas fa-school mr-1 text-blue-500"></i> School:</strong>
                                {{ $education->school }}
                            </li>
                            <li>
                                <strong><i class="fas fa-calendar-check mr-1 text-blue-500"></i> Year
                                    Graduated:</strong> {{ $education->yearGraduated ?? 'No Data' }}
                            </li>
                            <li>
                                <strong><i class="fas fa-trophy mr-1 text-blue-500"></i> Awards:</strong>
                                {{ $education->awards ?? 'No Awards Found' }}
                            </li>
                        </ul>
                    </div>


                    <!-- Work Experience and Skills Card Container -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                        <h2
                            class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                            <i class="fas fa-briefcase mr-2 text-3xl text-blue-600 dark:text-blue-400"></i> Work
                            Experience and Skills
                        </h2>
                        <hr class="border-t-2 border-blue-500 mb-4">
                        <div class="space-y-6">
                            @if ($workExperiences->isEmpty())
                                <p class="text-gray-700 dark:text-gray-300">No work experience available.</p>
                            @else
                                @foreach ($workExperiences as $workExperience)
                                    <!-- Work Experience Entry -->
                                    <div class="p-4">
                                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $workExperience->employer_name }}</h3>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            {{ date('d M Y', strtotime($workExperience->from_date)) }} -
                                            {{ $workExperience->to_date ? date('d M Y', strtotime($workExperience->to_date)) : 'Present' }}
                                        </p>
                                        <br>
                                        <div class="text-left dark:text-gray-200">
                                            <p><strong>Position Held:</strong> {{ $workExperience->position_held }}</p>
                                            <p><strong>Employer Address:</strong>
                                                {{ $workExperience->employer_address }}</p>
                                            <p><strong>Skills Acquired:</strong> {{ $workExperience->skills }}</p>
                                            <p><strong>Employment Status:</strong>
                                                {{ $workExperience->employment_status }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Certifications Card -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                        <h2
                            class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                            <i class="fas fa-certificate mr-2 text-3xl text-blue-600 dark:text-blue-400"></i>
                            Certifications
                        </h2>
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
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                        <h2
                            class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                            <i class="fas fa-language mr-2 text-3xl text-blue-600 dark:text-blue-400"></i> Other Skills
                            and Languages
                        </h2>

                        <!-- Skills With Non-Formal Training -->
                        <div class="mt-2 dark:text-gray-200">
                            <strong><i class="fas fa-tools mr-1 text-blue-500"></i> Skills With Non-Formal
                                Training:</strong>
                            <ul class="space-y-1">
                                @php
                                    $skillsArray = is_string($skill->skills)
                                        ? json_decode($skill->skills, true)
                                        : $skill->skills;
                                @endphp
                                @if (!empty($skillsArray) && is_array($skillsArray))
                                    @foreach ($skillsArray as $skillItem)
                                        <li>• {{ $skillItem }}</li>
                                    @endforeach
                                @else
                                    <li>No skills available.</li>
                                @endif
                            </ul>
                        </div>

                        <!-- Other Skills -->
                        <div class="mt-6 dark:text-gray-200">
                            <strong><i class="fas fa-lightbulb mr-1 text-blue-500"></i> Other Skills:</strong>
                            <ul>
                                @if (!empty($skill->otherSkills))
                                    <li>{{ $skill->otherSkills }}</li>
                                @else
                                    <li>"Others" Not Available.</li>
                                @endif
                            </ul>
                        </div>

                        <!-- Language Proficiency -->
                        <div class="mt-6 dark:text-gray-200">
                            <strong><i class="fas fa-language mr-1 text-blue-500"></i> Language Proficiency:</strong>
                            <ul class="space-y-2">
                                @if ($language->isNotEmpty())
                                    @foreach ($language as $languageItem)
                                        @php
                                            $proficienciesSpeak = json_decode($languageItem->proficiencies_speak, true);
                                            $proficienciesRead = json_decode($languageItem->proficiencies_read, true);

                                            $speakList = [];
                                            if ($proficienciesSpeak && count($proficienciesSpeak) > 0) {
                                                foreach ($proficienciesSpeak as $speakProficiency) {
                                                    $speakList[] = 'Can speak ' . trim($speakProficiency);
                                                }
                                            }

                                            $readList = [];
                                            if ($proficienciesRead && count($proficienciesRead) > 0) {
                                                foreach ($proficienciesRead as $readProficiency) {
                                                    $readList[] = 'Can read ' . trim($readProficiency);
                                                }
                                            }

                                            $speakString = implode(', ', $speakList);
                                            $readString = implode(', ', $readList);
                                        @endphp

                                        <li>
                                            <strong>{{ trim($languageItem->language_input) }}</strong>
                                            <ul class="pl-5">
                                                <li>{{ $speakString ?: 'No speaking proficiencies listed' }}</li>
                                                <li>{{ $readString ?: 'No reading proficiencies listed' }}</li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>No languages available.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
    </body>

    <div id="declineModal" style="margin-top: 0px;"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4 hidden">
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Decline {{ $applicant->firstname }}'s Application?
                </h2>
                <button id="closeDeclineModalBtn"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

            <!-- Centered Red Icon -->
            <div class="flex justify-center mb-4">
                <i class="fas fa-times-circle text-red-500 text-6xl"></i>
            </div>

            <!-- Modal Body -->
            <p class="text-black dark:text-white mb-6">
                Are you sure you want to decline this user's application? This action cannot be undone.
            </p>

            <!-- Reason Textarea Inside the Form -->
            <form id="decline-form" action="{{ route('admin.declineuser', ['id' => $applicant->user_id]) }}"
                method="POST">
                @csrf
                <div class="mb-4">
                    <label for="declineReason" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                        Reason for Declining:
                    </label>
                    <textarea id="declineReason" name="declineReason" rows="4"
                        class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                        placeholder="Enter the reason for declining the application" required></textarea>
                </div>

                <!-- Buttons for confirmation and cancellation -->
                <div class="flex flex-col justify-end space-y-2">
                    <!-- Confirm Decline Button -->
                    <button id="confirmDeclineBtn"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full shadow-lg">
                        Confirm Decline
                    </button>

                    <!-- Cancel Button -->
                    <button id="cancelDeclineBtn"
                        class="bg-gray-500 text-gray-100 dark:bg-gray-700 dark:text-gray-100 px-4 py-2 rounded w-full"
                        onclick="cancelDecline()">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div id="hireModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4 hidden"
        style="margin-top: 0px;">
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Approve {{ $applicant->firstname }} as Applicant?
                </h2>
                <button id="closeModalBtn"
                    class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">
            <!-- Centered Green Icon -->
            <div class="flex justify-center mb-4">
                <i class="fas fa-check-circle text-green-500 text-6xl"></i>
            </div>
            <!-- Modal Body -->
            <p class="text-black dark:text-white mb-6">
                Are you sure you want to approve this user? This action cannot be undone.
            </p>
            <!-- Buttons for confirmation and cancellation -->
            <div class="flex flex-col justify-end space-y-2">
                <!-- Confirm Button -->
                <form id="hire-form" action="{{ route('admin.approveuser', ['id' => $applicant->user_id]) }}"
                    method="POST">
                    @csrf
                    <button id="confirmHireBtn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full shadow-lg">
                        Confirm
                    </button>
                </form>

                <!-- Cancel Button -->
                <button id="cancelHireBtn"
                    class="bg-red-500 text-gray-100 dark:bg-red-700 dark:text-gray-100 px-4 py-2 rounded w-full"
                    onclick="cancelHire()">
                    Cancel
                </button>
            </div>
        </div>

    </div>

</x-app-layout>
<script>
    // Get elements for hire modal
    const hireApplicantBtn = document.getElementById('hireApplicantBtn');
    const hireModal = document.getElementById('hireModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelHireBtn = document.getElementById('cancelHireBtn');

    // Get elements for decline modal
    const declineApplicantBtn = document.getElementById('declineApplicantBtn');
    const declineModal = document.getElementById('declineModal');
    const closeDeclineModalBtn = document.getElementById('closeDeclineModalBtn');
    const cancelDeclineBtn = document.getElementById('cancelDeclineBtn');

    // Function to open the hire modal and close the decline modal
    function openHireModal() {
        declineModal.classList.add('hidden'); // Ensure decline modal is hidden
        hireModal.classList.remove('hidden');
    }

    // Function to open the decline modal and close the hire modal
    function openDeclineModal() {
        hireModal.classList.add('hidden'); // Ensure hire modal is hidden
        declineModal.classList.remove('hidden');
    }

    // Close hire modal function
    function closeHireModal() {
        hireModal.classList.add('hidden');
    }

    // Close decline modal function
    function closeDeclineModal() {
        declineModal.classList.add('hidden');
    }

    // Event listeners for hire modal
    hireApplicantBtn.addEventListener('click', openHireModal);
    closeModalBtn.addEventListener('click', closeHireModal);
    cancelHireBtn.addEventListener('click', closeHireModal);

    // Event listeners for decline modal
    declineApplicantBtn.addEventListener('click', openDeclineModal);
    closeDeclineModalBtn.addEventListener('click', closeDeclineModal);
    cancelDeclineBtn.addEventListener('click', closeDeclineModal);
</script>



<style>
    .custom-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4), 0 2px 4px rgba(0, 0, 0, 0.06);
    }
</style>
