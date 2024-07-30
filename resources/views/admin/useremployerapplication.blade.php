<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    </head>


    <body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 overflow-hidden">
        <div class="flex flex-col md:flex-row h-full ">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-400 dark:border-gray-600 px-4 py-6 flex-shrink-0">
                <div class="p-4">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="flex items-center space-x-2">
                            <li>
                                <a href="{{ route('admin.manageusers') }}"
                                    class="flex items-center text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-300">
                                    <i class="fas fa-arrow-left mr-1"></i> Go Back
                                </a>
                            </li>
                        </ol>
                    </nav>

                    <div class="flex flex-col items-center mb-5 ">
                        @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                            <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                alt="Profile Picture" class="w-44 h-44 rounded-full">
                        @else
                            <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                class="w-44 h-44 rounded-full">
                        @endif
                    </div>

                    <!-- Sidebar content here -->
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">User:
                        #{{ $employer->user_id }}</h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: {{ $employer->created_at->format('F j, Y \a\t h:i A') }}
                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.employerapplicantinfo', ['id' => $employer->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Employer Profile</span>
                            </a>
                        </li>
                    </ul>
                    @if ($user->account_verification_status === 'waiting for approval')
                        <button id="hireApplicantBtn"
                            class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Approve Employer?
                        </button>
                    @endif

                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    {{ $employer->businessname }}</h1>
                    <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2">
                        <strong>TIN Number:</strong> {{ $employer->tinno }}
                        <span class="block mt-2 md:inline-block md:mt-0 md:ml-20"><strong>Trade Name:
                            </strong>{{ $employer->tradename }}
                        </span>
                    </h4>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Company Information' }}</h1>
                    <div class="border-b border-gray-300 mt-2"></div>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Location Type:</strong>
                        {{ $employer->locationtype }}
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Employer Type:</strong>
                        {{ $employer->employertype }}</li>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Total Work Force:</strong>
                        {{ $employer->totalworkforce }}
                    </li>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'Contact Information' }}</h1>
                    <div class="border-b border-gray-300 mt-2"></div>

                    <div class="mt-2">
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Address:</strong>
                            {{ $employer->address }}
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>City:</strong>
                            {{ $employer->city }}
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Contact Person:</strong>
                            {{ $employer->contact_person }}
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Position:</strong>
                            {{ $employer->position }}
                        </li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Telephone Number:</strong>
                            {{ $employer->telephone_no }}
                        </li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Mobile Number:</strong>
                            {{ $employer->mobile_no }}
                        </li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Fax Number:</strong>
                            {{ $employer->fax_no }}
                        </li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Zip Code:</strong>
                            {{ $employer->zipCode }}
                        </li>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
            </div>
        </div>
    </body>

    <div id="hireModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Approve {{ $employer->businessname }} as
                    Employer?
                </h2>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div>
                <form id="hire-form" action="{{ route('admin.approveuser', ['id' => $employer->user_id]) }}"
                    method="POST">
                    @csrf
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
