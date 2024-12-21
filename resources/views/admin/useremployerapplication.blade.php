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
    <div class="flex flex-col md:flex-row">
            <!-- Sidebar -->
            <div id="sidebar"
                <div id="sidebar" class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-400 dark:border-gray-600 px-4 py-6 flex-shrink-0">
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
                        <div class="w-48 h-48 rounded-full border-4 border-yellow-400 shadow-3d flex items-center justify-center"> <!-- Outer yellow border -->
                            @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                                <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                    alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500"> <!-- Inner blue border -->
                            @else
                                <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500"> <!-- Inner blue border -->
                            @endif
                        </div>
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
                                <form action="{{ route('admin.removeuser', ['id' => $employer->user_id]) }}"
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
                        <button id="hireApplicantBtn"
                            class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Approve Employer?
                        </button>

                        <!-- Decline User Button -->
                        <button id="declineApplicantBtn"
                            class="w-full mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-minus mr-2"></i> Decline Employer?
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
                                        <h2 class="text-xl font-bold mb-4 text-black dark:text-white">Are you sure?</h2>
                                        <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                                        <!-- Warning Icon -->
                                        <div class="flex justify-center mb-4">
                                            <i class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                                        </div>

                                        <!-- Modal Body -->
                                        <p class="text-black dark:text-white mb-6">
                                            Do you really want to reset this employer application? This action cannot be
                                            undone.
                                        </p>

                                        <!-- Buttons for confirmation and cancellation -->
                                        <div class="flex flex-col justify-end space-y-2">
                                            <!-- Proceed Button -->
                                            <a href="{{ route('admin.reset', ['id' => $user->id]) }}"
                                                class="bg-red-600 text-center hover:bg-red-700 text-white px-4 py-2 rounded w-full">
                                                Reset Application
                                            </a>

                                            <!-- Cancel Button -->
                                            <button @click="showModal = false"
                                                class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded w-full">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900 mb-6 min-h-screen">
                <!-- Main Header Title -->
            <div class="text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white p-4 rounded-t-md shadow-lg mb-6">
                <h1 class="text-3xl font-bold uppercase">Employer Profile</h1>
            </div>
            <!-- Header Container with Gradient and Icon -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-6 rounded-t-md shadow-lg flex items-center space-x-2">
                <i class="fas fa-building text-3xl"></i> <!-- Icon for Company -->
                <h2 class="text-2xl font-bold">
                    {{ $employer->businessname }}
                </h2>
            </div>
            
            <!-- Content Container with Border, Icons, and Shadow -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-b-md shadow-lg border-b-4 border-blue-500">
                <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2 flex flex-col md:flex-row items-start md:items-center">
                    <!-- TIN Number Section with Icon -->
                    <span class="mb-2 md:mb-0 md:mr-8 flex items-center space-x-2">
                        <i class="fas fa-id-card text-blue-600 dark:text-blue-400"></i> <!-- Icon for TIN -->
                            <strong>TIN Number:&nbsp;&nbsp;</strong> {{ $employer->tinno }}
                    </span>
                    
                    <!-- Subtle Divider Line for Separation (only on mobile) -->
                    <hr class="border-gray-300 dark:border-gray-600 my-2 md:hidden">
                    
                    <!-- Trade Name Section with Icon -->
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-tag text-blue-600 dark:text-blue-400"></i> <!-- Icon for Trade Name -->
                        <strong>Trade Name:&nbsp;&nbsp; </strong>
                        {{  $employer->tradename ? $employer->tradename : 'None' }}
                    </span>
                </h4>
            </div>


            <!-- Company Information Section with Enhanced Borders and Icons -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4">
                    <i class="fas fa-building text-3xl text-blue-600 dark:text-blue-400"></i> <!-- Icon for Company Info -->
                    <span>Company Information</span>
                </h2>
            
                <!-- Blue Underline -->
                <hr class="border-t-2 border-blue-500 mb-4">
            
                <!-- Company Details -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-lg">
                    <!-- Location Type with Icon -->
                    <div class="card-item dark:text-gray-200 flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-xl text-blue-600 dark:text-blue-400"></i>
                        <strong>Location Type:</strong> <span>{{ $employer->locationtype }}</span>
                    </div>
            
                    <!-- Company Type with Icon -->
                    <div class="card-item dark:text-gray-200 flex items-center space-x-2">
                        <i class="fas fa-industry text-xl text-blue-600 dark:text-blue-400"></i>
                        <strong>Company Type:</strong> <span>{{ $employer->employertype }}</span>
                    </div>
            
                    <!-- Total Workforce with Icon -->
                    <div class="card-item dark:text-gray-200 flex items-center space-x-2">
                        <i class="fas fa-users text-xl text-blue-600 dark:text-blue-400"></i>
                        <strong>Total Work Force:</strong> <span>{{ $employer->totalworkforce }}</span>
                    </div>
                </div>
            </div>


            <!-- Contact Information Section with Underline and Full Border -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2 flex items-center space-x-3">
                    <i class="fas fa-phone-alt text-3xl text-blue-600 dark:text-blue-400"></i> <!-- Larger Icon for Contact Info -->
                    <span>Contact Information</span>
                </h1>
            
                <!-- Underline Divider -->
                <hr class="border-t-2 border-blue-500 mb-4">
            
                <!-- Contact Details -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-lg dark:text-gray-200">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-xl text-blue-600 dark:text-blue-400"></i> <!-- Address Icon -->
                        <strong>Address:</strong> <span>{{ $employer->address ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-city text-xl text-blue-600 dark:text-blue-400"></i> <!-- City Icon -->
                        <strong>City:</strong> <span>{{ $employer->municipality ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user text-xl text-blue-600 dark:text-blue-400"></i> <!-- Contact Person Icon -->
                        <strong>Contact Person:</strong> <span>{{ $employer->contact_person ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-briefcase text-xl text-blue-600 dark:text-blue-400"></i> <!-- Position Icon -->
                        <strong>Position:</strong> <span>{{ $employer->position ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-phone-alt text-xl text-blue-600 dark:text-blue-400"></i> <!-- Telephone Icon -->
                        <strong>Telephone Number:</strong> <span>{{ $employer->telephone_no ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-mobile-alt text-xl text-blue-600 dark:text-blue-400"></i> <!-- Mobile Icon -->
                        <strong>Mobile Number:</strong> <span>{{ $employer->mobile_no ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-fax text-xl text-blue-600 dark:text-blue-400"></i> <!-- Fax Icon -->
                        <strong>Fax Number:</strong> <span>{{ $employer->fax_no ?: 'None' }}</span>
                    </div>
            
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-pin text-xl text-blue-600 dark:text-blue-400"></i> <!-- Zip Code Icon -->
                        <strong>Zip Code:</strong> <span>{{ $employer->zipCode ?: 'None' }}</span>
                    </div>
                </div>
            </div>

                <!-- More Company Information Section with Enhanced Borders and Icons -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4">
                        <i class="fas fa-building text-3xl text-blue-600 dark:text-blue-400"></i> <!-- Icon for More Company Info -->
                        <span>More Company Information</span>
                    </h2>
                
                    <!-- Blue Underline -->
                    <hr class="border-t-2 border-blue-500 mb-4">
                
                    <!-- Website Link with Icon -->
                    <ul class="mt-3">
                        <li class="text-blue-700 font-bold break-words">
                            <a href="{{ $employer->website_link ?: '#' }}" target="_blank" rel="noopener noreferrer" class="underline italic flex items-center space-x-2">
                                <i class="fas fa-external-link-alt text-xl text-blue-600 dark:text-blue-400"></i> <!-- Larger Icon for Link -->
                                <span>{{ $employer->website_link ?: 'None' }}</span>
                            </a>
                        </li>
                    </ul>

            </div>

            </div>
        </div>
    </body>

    <div id="hireModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4 hidden">
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Approve {{ $employer->firstname }} as Employer?
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
                Are you sure you want to approve this employer? This action cannot be undone.
            </p>

            <!-- Buttons for confirmation and cancellation -->
            <div class="flex flex-col justify-end space-y-2">
                <!-- Confirm Button -->
                <form id="hire-form" action="{{ route('admin.approveuser', ['id' => $employer->user_id]) }}"
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



    <div id="declineModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4 hidden">
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Decline {{ $employer->businessname }}'s {{ $employer->locationtype }} Branch Application?
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
                Are you sure you want to decline this employer's's application? This action cannot be undone.
            </p>

            <!-- Reason Textarea Inside the Form -->
            <form id="decline-form" action="{{ route('admin.declineuser', ['id' => $employer->user_id]) }}"
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
</x-app-layout>
<script>
    // Get elements
    const hireApplicantBtn = document.getElementById('hireApplicantBtn');
    const hireModal = document.getElementById('hireModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const confirmHireBtn = document.getElementById('confirmHireBtn');
    const cancelHireBtn = document.getElementById('cancelHireBtn');

    // Get elements for decline modal
    const declineApplicantBtn = document.getElementById('declineApplicantBtn');
    const declineModal = document.getElementById('declineModal');
    const closeDeclineModalBtn = document.getElementById('closeDeclineModalBtn');
    const cancelDeclineBtn = document.getElementById('cancelDeclineBtn');


    // Open modal function
    function openModal() {
        hireModal.classList.remove('hidden');
    }

    // Close modal function
    function closeModal() {
        hireModal.classList.add('hidden');
    }


    function openDeclineModal() {
        hireModal.classList.add('hidden'); // Ensure hire modal is hidden
        declineModal.classList.remove('hidden');
    }

    // Close decline modal function
    function closeDeclineModal() {
        declineModal.classList.add('hidden');
    }



    // Event listeners
    hireApplicantBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelHireBtn.addEventListener('click', closeModal);

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