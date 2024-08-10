<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Review Applicant Info </title>

    </head>


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
                                    class="flex items-center text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-300">
                                    <i class="fas fa-arrow-left mr-1"></i> Go Back
                                </a>
                            </li>
                        </ol>
                    </nav>



                    <div class="flex flex-col items-center mb-5 ">
                        <img src="{{ asset('storage/' . $pwdinfo->profilePicture) }} " alt="Applicant Image"
                            class="w-44 h-44 object-contain rounded-full mb-4 border-4 custom-shadow border-gray-600">
                    </div>

                    <!-- Sidebar content here -->
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:
                        #{{ $pwdinfo->user_id }}</h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: {{ $pwdinfo->created_at->format('F j, Y \a\t h:i A') }}
                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('employer.applicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.pwdinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>

                    </ul>

                    <button id="hireApplicantBtn"
                        class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i> Hire Applicant
                    </button>

                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <!-- Main content here -->
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}</h1>
                    <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2">
                        <strong>Employment Status:</strong> {{ $employment->employment_type }}
                        <span class="block mt-2 md:inline-block md:mt-0 md:ml-20"><strong>Looking for a
                                Job in:
                            </strong>{{ $employment->job_search_duration . ' ' . $employment->duration_category }}
                        </span>
                    </h4>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                            {{ 'Message' }}
                        </h1>
                        <div class="border-b border-gray-300 mt-2"></div>

                        <textarea
                            class="w-full mt-3 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                            rows="5" disabled>{{ $jobapplication->description }}</textarea>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Personal Information' }}</h1>
                    <div class="border-b border-gray-300 mt-2"></div>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Civil Status:</strong>
                        {{ $personal->civilStatus }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Gender:</strong>
                        {{ $applicant->gender }}</li>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Birthdate:</strong>
                        {{ date('M d, Y', strtotime($applicant->birthdate)) }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Lived at:</strong>
                        {{ $personal->presentAddress }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Cellphone Number:</strong>
                        {{ $personal->cellphoneNo }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Religion:</strong>
                        {{ $personal->religion }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>OFW:</strong>
                        @if ($applicant->beneficiary_4ps || $applicant->ofw_country)
                            Yes
                        @else
                            No
                        @endif
                    </li>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Educational Attainment' }}</h1>
                    <div class="border-b border-gray-300 mt-2"></div>

                    <div class="mt-2">
                        <li class="mt-3  text-gray-900 dark:text-gray-200 "><strong>Highest Educational Level:</strong>
                            {{ $education->educationLevel }}</li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>School Graduated:</strong>
                            {{ $education->school }}</li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Year Graduated:</strong>
                            {{ $education->yearGraduated }}</li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Awards:</strong>
                            {{ $education->awards }}</li>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Work Experience and Skills' }}
                        <div class="border-b border-gray-300 mt-2"></div>

                    </h1>
                    <div class="overflow-x-auto">
                        <div class="sm:max-w-5xl float-left">
                            <div class="grid grid-cols-1 gap-4">
                                @foreach ($workExperiences as $workExperience)
                                    <div
                                        class="bg-gray-200 mt-4 mb-4 dark:bg-gray-800 custom-shadow rounded-lg p-6 w-full">
                                        <div class="mb-4">
                                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
                                                {{ $workExperience->employer_name }}</h2>
                                            <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">

                                                {{ date('d M Y', strtotime($workExperience->from_date)) }} -
                                                {{ $workExperience->to_date ? date('d M Y', strtotime($workExperience->to_date)) : 'Present' }}
                                            </p>
                                            <br>
                                            <p class="text-sm text-gray-900 dark:text-gray-300 mt-1"><strong>Employer
                                                    Address:</strong> {{ $workExperience->employer_address }}</p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Position
                                                    Held:</strong>
                                                {{ $workExperience->position_held }}</p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Skills
                                                    Acquired:</strong>
                                                {{ $workExperience->skills }}</p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Employment
                                                    Status:</strong> {{ $workExperience->employment_status }}</p>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>






                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Other Skills and Languages' }}
                        <div class="border-b border-gray-300 mt-2"></div>
                    </h1>
                    <div class="mt-2">
                        <h4 class="text-lg font-reqular text-gray-800 dark:text-gray-200 mt-2">
                            <strong>Skills</strong>
                            @foreach (json_decode($skill->skills) as $skill)
                                <li class="mt-2">{{ $skill }}</li>
                            @endforeach
                    </div>
                    <h4 class="text-lg font-reqular text-gray-800 dark:text-gray-200 mt-2">
                        <strong>Languages</strong>
                        @foreach (explode(',', $language->language_input) as $language)
                            <li class="mt-2">{{ trim($language) }}</li>
                        @endforeach

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

            </div>
        </div>
    </body>

    <div id="hireModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Hire {{ $applicant->firstname }} as
                    Employee?
                </h2>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div>

                <form id="hire-form" action="{{ route('hire.applicant', ['id' => $applicant->user_id]) }}"
                    method="POST">
                    @csrf
                    <textarea name="remarkstextarea" id="remarkstextarea"
                        class="w-full px-3 py-2 @if (session('theme') === 'dark') bg-gray-800 text-gray-300 @else bg-white text-gray-700 @endif
                        border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-800 dark:text-gray-300"
                        rows="5" placeholder="Enter your message..."></textarea>

                    <!-- Additional form controls/buttons if needed -->

                    <div class="flex justify-end mt-4">
                        <button id="confirmHireBtn"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg mr-2"
                            onclick="confirmHire(event)">
                            Confirm
                        </button>
                        <button id="cancelHireBtn"
                            class="bg-red-500 text-gray-200 hover:bg-red-700 text-gray-300 font-bold py-2 px-4 rounded shadow-lg"
                            onclick="cancelHire()">
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
