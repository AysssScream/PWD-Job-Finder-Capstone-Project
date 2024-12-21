<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=kFALIVnb"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>
</head>

<header>
    <h1 aria-label="Main dashboard heading" class="text-4xl font-bold text-blue-600 dark:text-blue-100 text-center"
        hidden>
        Welcome to Your Dashboard
    </h1>
</header>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    .dark-transition {
        transition: background-color 0.3s ease, color 0.3s ease, opacity 0.3s ease;
    }

    /* Adjust the button and icon size */
    #toggleDarkMode {
        width: 56px;
        height: 56px;
        font-size: 24px;
        line-height: 1;
        padding: 12px;
    }

    .floating-button {
        width: 56px;
        height: 56px;
        font-size: 24px;
        line-height: 1;
        padding: 12px;
    }

    /* custom.css */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .bg {
        background-image: url('/images/dashboard-light.webp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: auto;
        background-attachment: fixed;
    }

    .dark .bg {
        background-image: url('/images/dashboard-dark.webp');
        background-color: rgba(17, 24, 39, 0.9);
        /* Add a dark color to blend with */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: auto;
        background-attachment: fixed;
        position: relative;
        background-blend-mode: screen;
        /* Change blend mode */
    }


    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(0);
    }

    .dark input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    input[type="date"] {
        background-color: transparent;
    }

    .dark input[type="date"] {
        color: #e5e7eb;
    }

    input[type="month"]::-webkit-calendar-picker-indicator {
        filter: invert(0);
    }

    .dark input[type="month"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    .fade {
        transition: opacity 0.3s ease;
        /* Adjust duration and timing as needed */
        opacity: 0;
        /* Start with an invisible state */
    }

    .gradient-bg {
        background: linear-gradient(to right, #3B82F6, #2563EB);
        /* #3B82F6 is bg-blue-500 and #2563EB is bg-blue-600 */
        padding: 16px;
        /* Adjust padding as needed */
        border-radius: 0.5rem;
        /* Rounded corners */
        margin-bottom: 1rem;
        /* Margin bottom */
    }

    .header-gradient-bg {
        background: linear-gradient(to right, #3B82F6, #2563EB);
        /* Gradient from bg-blue-500 to bg-blue-600 */
        padding: 16px;
        /* Adjust padding as needed */
        margin-bottom: 1rem;
        /* Margin bottom */
        border-top-left-radius: 0.5rem;
        /* Rounded top left corner */
        border-top-right-radius: 0.5rem;
        /* Rounded top right corner */
        border-bottom-left-radius: 0;
        /* No rounding on the bottom left corner */
        border-bottom-right-radius: 0;
        /* No rounding on the bottom right corner */
    }

    .gradient-bg-without-border {
        background: linear-gradient(to right, #3B82F6, #2563EB);
        /* #3B82F6 is bg-blue-500 and #2563EB is bg-blue-600 */
        padding: 16px;
        /* Adjust padding as needed */
        margin-bottom: 1rem;
        /* Margin bottom */
    }

    .shadow-3d {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>
</head>

@if (Auth::user()->usertype == 'admin' &&
        Route::currentRouteName() != 'admin.applicantinfo' &&
        Route::currentRouteName() != 'admin.pwdapplicantinfo' &&
        Route::currentRouteName() != 'admin.employerapplicantinfo')
    <div
        class="fixed top-0 left-0 h-full w-14 hover:w-64 md:w-64 bg-white dark:bg-gray-900 text-black dark:text-white transition-all duration-300 border-none z-10 mb-10 sidebar">
        <div
            class="overflow-y-auto p-2  overflow-x-hidden flex flex-col justify-between flex-grow h-full bg-gray-200 text-black dark:bg-gray-800 dark:text-gray-200 custom-scrollbar">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="hidden md:flex md:flex-col md:justify-center md:items-center text-center">
                    @php
                        $userId = Auth::user()->id; // Get the ID of the current user
                        $adminProfile = \App\Models\AdminProfile::where('admin_id', $userId)->first(); // Retrieve profile by user ID
                        $waitingForApprovalCount = \App\Models\User::where(
                            'account_verification_status_plain',
                            'waiting for approval',
                        )->count();
                        $messagesCount = \App\Models\Message::where('to', Auth::user()->email)
                            ->whereNull('read_at')
                            ->count();
                    @endphp

                    <div
                        class="relative w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-white rounded-full overflow-hidden mx-auto mb-4 border-4 border-yellow-300 shadow-3d p-1">
                        <div class="w-full h-full border-4 border-blue-500 rounded-full shadow-lg overflow-hidden">
                            <img id="avatarPreview"
                                src="{{ $adminProfile && $adminProfile->profile_picture ? asset('storage/' . $adminProfile->profile_picture) : asset('/images/avatar.png') }}"
                                alt="Profile Picture" class="w-full h-full object-contain"
                                onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                        </div>
                    </div>

                    <!-- Notification Bell Icon -->
                    <div class="top-0 right-0 mt-2 p-6 flex space-x-4"> <!-- Added flex and spacing -->
                        <a href="{{ route('admin.manageusers') }}" class="relative">
                            <i class="fas fa-bell text-blue-500 text-4xl relative">
                                <span
                                    class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $waitingForApprovalCount }}
                                </span>
                            </i>
                        </a>
                        <a href="{{ route('admin.messages') }}" class="relative ">
                            <!-- Replace with your actual email route -->
                            <i class="fas fa-envelope text-blue-500 text-4xl relative">
                                <span
                                    class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $messagesCount }}
                                </span>
                            </i> <!-- Email icon -->
                        </a>
                    </div>



                    @if (Auth::check())
                        <div class="mb-4 bg-white dark:bg-gray-700 rounded-lg">
                            <!-- User Information Block -->
                            <div
                                class="text-lg dark:bg-gray-700 text-white text-center font-semibold header-gradient-bg">
                                <!-- Changed to mb-1 -->
                                {{ Auth::user()->firstname }} {{ Auth::user()->middlename }}
                                {{ Auth::user()->lastname }}
                            </div>
                            <div
                                class="bg-white text-center dark:bg-gray-700 text-md text-gray-700 dark:text-gray-200 p-2 rounded shadow flex justify-center items-center">
                                <i class="fas fa-envelope mr-2 text-gray-500"></i> <!-- Add the envelope icon -->
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    @else
                        <div class="mb-4 bg-white dark:bg-gray-700 rounded-lg">
                            <div
                                class="text-lg dark:bg-gray-700 text-white text-center font-semibold header-gradient-bg">
                                <!-- Changed to mb-1 -->
                                Guest
                            </div>
                            <div
                                class="bg-white text-center dark:bg-gray-700 text-md text-gray-700 dark:text-gray-200 p-2 rounded shadow flex justify-center items-center">
                                <i class="fas fa-envelope mr-2 text-gray-500"></i> <!-- Add the envelope icon -->
                                guest@example.com
                            </div>
                    @endif
                </li>


                <div id="responsiveDiv" class="bg-white rounded-lg shadow-lg dark:bg-gray-700">
                    <li class="hidden md:block">
                        <div class="flex flex-row items-center h-8 header-gradient-bg">
                            <div class="text-sm font-light tracking-wide text-white uppercase">Main</div>
                        </div>
                    </li>
                <!-- PWD Analytics Menu Item -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6"
                        style="right: 10px;">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-chart-pie w-5 h-5"></i>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">PWD Analytics</span>
                    </a>
                </li>
                
                <!-- Employment Analytics Menu Item -->
                <li>
                    <a href="{{ route('admin.employment') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6"
                        style="right: 10px;">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-briefcase w-5 h-5"></i>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Employment Analytics</span>
                    </a>
                </li>


                    <li>
                        <a href="{{ route('admin.manageusers') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Manage
                                Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.audit') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Audit
                                Trail</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.messages') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                            </span>
                            <span
                                class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Messages</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.managevideos') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Zm7 11-6-2V9l6-2v10Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Manage
                                Videos</span>
                        </a>
                    </li>

                    <li class="mb-5">
                        <a href="{{ route('admin.traininglist') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Manage
                                Trainings</span>
                        </a>
                    </li>

                    <li class=" hidden md:block">
                        <div class="flex flex-row items-center h-8 gradient-bg-without-border">
                            <div class="text-sm font-light tracking-wide text-white uppercase">Settings</div>
                        </div>
                    </li>


                    <div x-data="{ showModal: false }">
                        <!-- Button to Open Modal -->
                        <a href="#" @click="showModal = true"
                            class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6 bg-transparent text-gray-700 dark:text-gray-200"
                            style="right: 10px;">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Edit
                                Profile</span>
                        </a>


                        <!-- Modal -->
                        <template x-if="showModal">
                            <div x-show="showModal" @keydown.window.escape="showModal = false"
                                class="fixed inset-0 flex items-center justify-center z-50 p-4 ">
                                <!-- Background overlay -->
                                <div @click="showModal = false" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40">
                                </div>
                                <!-- Modal Content -->
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg  sm:w-1/2 md:w-1/2 lg:w-1/2 z-50 overflow-auto"style="max-height: 90vh;">
                                    <div class="flex bg-blue-500 p-4 justify-between items-center mb-4">
                                        <h2 class="text-2xl text-white font-semibold"> <i
                                                class="fas fa-user-edit mr-2"></i> Edit
                                            Your
                                            Profile Picture</h2>
                                        <div x-data="{ open: false }">
                                            <button @click="open = true"
                                                class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-600">
                                                <i class="fas fa-lock mr-2"></i>Change Password
                                            </button>

                                            <div x-show="open"
                                                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-6"
                                                x-cloak>
                                                <div
                                                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md relative max-h-screen overflow-auto py-6">
                                                    <div class="flex items-center">
                                                        <!-- Close button -->
                                                        <div class="flex-1">
                                                        </div>
                                                        <button @click="open = false"
                                                            class="w-10 h-10 p-2 mb-5 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                                                        <div class="max-w-8xl">
                                                            @include('profile.partials.update-password-form')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <form id="profileForm" action="{{ route('admin.profileupdate') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                                                    role="alert">
                                                    <strong class="font-bold dark:text-white">Oops!</strong>
                                                    <span class="block sm:inline dark:text-white">There were some
                                                        errors with your
                                                        submission:</span>
                                                    <ul class="mt-3 list-disc list-inside text-sm">
                                                        @foreach ($errors->all() as $error)
                                                            <li class="dark:text-white">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <br>
                                            @endif
                                            <!-- Avatar and Edit Button -->
                                            <div class="flex flex-col items-center mb-4">
                                                <!-- Image Preview -->


                                                @php
                                                    $userId = Auth::user()->id; // Get the ID of the current user
                                                    $adminProfile = \App\Models\AdminProfile::where(
                                                        'admin_id',
                                                        $userId,
                                                    )->first(); // Retrieve profile by user ID
                                                @endphp

                                                <div
                                                    class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-white rounded-full overflow-hidden mx-auto mb-4 border-2 border-blue-400 shadow-lg">
                                                    <img id="avatarPreview2"
                                                        src="{{ $adminProfile && $adminProfile->profile_picture ? asset('storage/' . $adminProfile->profile_picture) : asset('/images/avatar.png') }}"
                                                        alt="Profile Picture" class="w-full h-full object-contain"
                                                        onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                                </div>


                                                <!-- File Name Display -->
                                                <div id="fileNameDisplay" class="text-sm text-gray-600 mb-2"></div>

                                                <!-- Hidden File Input -->
                                                <input type="file" id="avatarInput" name="profile_picture"
                                                    accept="image/*" class="hidden">

                                                <!-- Edit and Save Buttons -->
                                                <div class="flex justify-end space-x-4">
                                                    <!-- Edit Button -->
                                                    <button type="button" id="editButton"
                                                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                                                        <i class="fas fa-image mr-2"></i>
                                                        Edit Profile Picture
                                                    </button>


                                                </div>
                                            </div>


                                            <script>
                                                // Event listener for the Edit button to trigger the file picker
                                                document.getElementById('editButton').addEventListener('click', function() {
                                                    document.getElementById('avatarInput').click();
                                                });

                                                // Event listener to handle file selection and preview the image
                                                document.getElementById('avatarInput').addEventListener('change', function(event) {
                                                    const file = event.target.files[0]; // Get the selected file

                                                    if (file) {
                                                        const reader = new FileReader(); // Create a FileReader instance

                                                        reader.onload = function(e) {
                                                            // Update the image preview
                                                            document.getElementById('avatarPreview2').src = e.target.result;
                                                        };

                                                        reader.onerror = function(error) {
                                                            console.error("Error reading file: ", error);
                                                        };

                                                        reader.readAsDataURL(file); // Read the file as a data URL

                                                        // Display the file name
                                                        document.getElementById('fileNameDisplay').textContent = `Selected file: ${file.name}`;
                                                    } else {
                                                        console.log("No file selected.");
                                                        document.getElementById('fileNameDisplay').textContent =
                                                            ""; // Clear file name if no file is selected
                                                    }
                                                });
                                            </script>

                                            <div class="mb-2 bg-blue-500 p-4 rounded-t-lg mt-12">
                                                <!-- Add margin-bottom to the div if needed -->
                                                <h2 class="text-lg text-white  font-semibold">
                                                    <i class="fas fa-pencil-alt mr-2 text-blue dark:text-blue-500"></i>
                                                    Edit Your Personal Details
                                                </h2>
                                            </div>

                                            <hr class="border-1 border-blue-400 dark:border-blue-600 w-full mb-4">

                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <label for="username" class="text-gray-800 dark:text-gray-300">
                                                        Full Name:
                                                    </label>
                                                </div>
                                                <input type="text" id="username" name="username"
                                                    class="w-full px-3 py-2 shadow-md border bg-gray-100 border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your username"
                                                    value="{{ Auth::user()->name }}" disabled>

                                            </div>
                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <label for="email" class="text-gray-800 dark:text-gray-300">
                                                        Email:
                                                    </label>
                                                </div>
                                                <input type="email" id="email" name="email"
                                                    class="w-full px-3 py-2 shadow-md border bg-gray-100 border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your email" value="{{ Auth::user()->email }}"
                                                    disabled>
                                            </div>

                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <label for="firstname" class="text-gray-800 dark:text-gray-300">
                                                        First Name:
                                                    </label>
                                                </div>
                                                <input type="text" id="firstname" name="firstname"
                                                    class="w-full px-3 py-2 shadow-md border border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your username"
                                                    value="{{ Auth::user()->firstname }}">

                                            </div>

                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <label for="middlename" class="text-gray-800 dark:text-gray-300">
                                                        Middle Name:
                                                    </label>
                                                </div>
                                                <input type="text" id="middlename" name="middlename"
                                                    class="w-full px-3 py-2 shadow-md border border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your username"
                                                    value="{{ Auth::user()->middlename }}">

                                            </div>

                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <label for="lastname" class="text-gray-800 dark:text-gray-300">
                                                        Last Name:
                                                    </label>
                                                </div>
                                                <input type="text" id="lastname" name="lastname"
                                                    class="w-full px-3 py-2 shadow-md border border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your username"
                                                    value="{{ Auth::user()->lastname }}">
                                            </div>


                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fa-solid fa-venus-mars"></i>
                                                    </span>
                                                    <label for="gender" class="text-gray-800 dark:text-gray-300">
                                                        Gender:
                                                    </label>
                                                </div>
                                                <select id="gender" name="gender"
                                                    class="w-full px-3 py-2 shadow-md border border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200">
                                                    <option value="" disabled selected>Select your gender
                                                    </option> <!-- Placeholder option -->
                                                    <option value="Male"
                                                        {{ $adminProfile->gender === 'Male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ $adminProfile->gender === 'Female' ? 'selected' : '' }}>
                                                        Female</option>
                                                    <option value="Prefer not to say"
                                                        {{ $adminProfile->gender === 'Prefer not to say' ? 'selected' : '' }}>
                                                        Prefer not to say
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <div class="flex items-center mb-1">
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white mr-2">
                                                        <i class="fa-solid fa-location-dot"></i> </span>
                                                    <label for="address" class="text-gray-800 dark:text-gray-300">
                                                        Address:
                                                    </label>
                                                </div>
                                                <input type="address" id="address" name="address"
                                                    class="w-full px-3 py-2 shadow-md border border-gray-500 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-200"
                                                    placeholder="Enter your Address"
                                                    value="{{ $adminProfile->address }}">
                                            </div>
                                            <div class="flex justify-end space-x-4 mt-10">
                                                <!-- Cancel Button -->
                                                <button type="button" @click="showModal = false"
                                                    class="px-4 py-2 bg-red-600 text-white bg-red-700 rounded hover:bg-red-500">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </template>
                        @if (Session::has('profilesuccess'))
                            <script>
                                $(document).ready(function() {
                                    toastr.options = {
                                        "progressBar": true,
                                        "closeButton": true,
                                    }
                                    toastr.success("{{ Session::get('profilesuccess') }}",
                                        'Admin Profile Updated!', {
                                            timeOut: 5000
                                        });
                                });
                            </script>
                        @endif
                    </div>
                    <!-- Logout Link -->
                    <li class="mb-5">
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6 w-full"
                                style="right: 10px;">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg> </span>
                                <span
                                    class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Logout</span>
                            </a>
                        </form>
                    </li>
                </div>
            </ul>
            <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">AccessiJobs @2024</p>
        </div>
    </div>
@endif


@if (Auth::user()->usertype == 'user')
    <style>
        .text-xs {
            font-size: 0.75rem;
            /* Adjust to desired font size for x1 */
        }

        .text-sm {
            font-size: 0.875rem;
            /* Adjust to desired font size for x2 */
        }

        .text-md {
            font-size: 1rem;
            /* Adjust to desired font size for x3 */
        }

        .text-lg {
            font-size: 1.25rem;
            /* Adjust to desired font size for lg */
        }
    </style>
    @if (Auth::user()->usertype == 'user' && Auth::user()->account_verification_status == 'approved')
        <div id="myModal"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-gray-600 dark:text-gray-200 overflow-y-auto hidden z-20 p-3 md:p-10 sm:p-3"
            role="dialog" aria-labelledby="modalTitle" aria-modal="true">
            <div class="relative w-full max-w-4xl p-5 border shadow-lg rounded-md bg-white dark:bg-gray-800 overflow-hidden"
                role="document" style="max-height: 90vh;">
                <div class="h-full overflow-y-auto" style="max-height: calc(90vh - 100px); ">
                    <div class="pr-2"> <!-- Added padding-right to create space between content and scrollbar -->
                        <div class="text-center">
                            <h2 id="modalTitle" aria-label="Welcome {{ Auth::user()->firstname }} !" tabindex="0"
                                class="text-4xl leading-6 font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <i class="fas fa-cogs mr-2"></i>
                                Welcome
                                {{ Auth::user()->firstname }} !
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{{ __('messages.account_approved') }}" tabindex="0">
                                        {{ __('messages.account_approved') }}
                                    </p>
                                    @include('layouts.modalaccessibility')
                                </div>
                                <div class="mt-4">
                                    <button id="closeModal" aria-label="Close"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Close
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const modalDisplayed = localStorage.getItem('modalDisplayed');
            const locale = "{{ App::getLocale() }}";


            function openModal() {
                const modal = document.getElementById('myModal');
                const closeModalButton = document.getElementById('closeModal');
                const focusableElements = modal.querySelectorAll('button, a, input, select, textarea, h2,p');

                modal.classList.remove('hidden');

                if (focusableElements.length > 0) {
                    focusableElements[0].focus();
                }

                // Trap focus inside modal
                function trapFocus(e) {
                    if (e.key === 'Tab') {
                        const focusedElement = document.activeElement;
                        const firstFocusableElement = focusableElements[0];
                        const lastFocusableElement = focusableElements[focusableElements.length - 1];

                        if (e.shiftKey) {
                            if (focusedElement === firstFocusableElement) {
                                lastFocusableElement.focus();
                                e.preventDefault();
                            }
                        } else {
                            if (focusedElement === lastFocusableElement) {
                                firstFocusableElement.focus();
                                e.preventDefault();
                            }
                        }
                    }
                }

                document.addEventListener('keydown', trapFocus);
            }
            // If the item has no value, show the modal
            if (!modalDisplayed) {
                document.getElementById('myModal').classList.remove('hidden');
                console.log('Locale:', locale); // Debug: Check locale value

                function speak(text) {
                    const voice = locale === 'fil' ? 'Filipino Female' : 'US English Male';
                    responsiveVoice.speak(text, voice);
                }
            }

            document.getElementById('closeModal').addEventListener('click', () => {
                document.getElementById('myModal').classList.add('hidden');
                localStorage.setItem('modalDisplayed', 'true');
            });
        });
    </script>

    <body class="font-sans antialiased dark-transition">

        @if (Auth::user()->usertype == 'user')
            <div id="accessibilityPanel" class="fixed bottom-4 right-4 z-10 max-h-screen overflow-y-auto">
                <div
                    class="bg-gray-200 dark:bg-gray-800 p-2 rounded-full  flex flex-col items-center space-y-4 opacity-40 hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    <!-- Accessibility Toggle Button -->
                    <i id="toggleAccessibility" onclick="toggleAccessibility()"
                        aria-label="Toggle Accessibility Options"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center language-toggle focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <i id="accessibilityIcon" class="fas fa-xl fa-universal-access "></i>
                    </i>

                    <!-- Language Toggle -->
                    <a href="{{ route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en']) }}"
                        id="toggleLanguage" aria-label="Toggle Language"
                        class="hidden bg-green-500 hover:bg-green-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center language-toggle z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        @if (App::isLocale('en'))
                            <img src="{{ asset('images/us.webp') }}" alt="USA Flag" class="flag-img"
                                aria-label="English Language Enabled">
                        @else
                            <img src="{{ asset('images/ph.webp') }}" alt="Philippines Flag" class="flag-img"
                                aria-label="Filipino Language Enabled">
                        @endif
                    </a>

                    <!-- Text Size Toggle -->
                    <a href="#" id="toggletextsize" onclick="toggleTextSize()"
                        class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="Toggle Text Size">
                        <i id="textSizeIndicator"></i>
                    </a>

                    <!-- Screen Reader Toggle -->
                    <a href="#" id="toggleScreenReader" onclick="toggleScreenReader()"
                        class="hidden bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="Toggle On Screen Reader">
                        <i id="screenReaderIcon" class="fas"></i>
                    </a>

                    @php
                        $dashboard = \App\Models\Video::getVideoByLocation('Dashboard');
                        $savedjobs = \App\Models\Video::getVideoByLocation('Saved Jobs');
                        $settings = \App\Models\Video::getVideoByLocation('Settings');
                    @endphp

                    <!-- Video Toggle -->
                    @if (Route::currentRouteName() === 'dashboard' && $dashboard && $dashboard->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $dashboard->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language"></i>
                        </a>
                    @elseif (Route::currentRouteName() === 'savedjobs' && $savedjobs && $savedjobs->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $savedjobs->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language"></i>
                        </a>
                    @elseif (Route::currentRouteName() === 'profile.edit' && $settings && $settings->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $settings->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language"></i>
                        </a>
                    @endif

                    <!-- Dark Mode Toggle Button -->
                    @if (Auth::user()->usertype == 'user' || Auth::user()->usertype == 'employer')
                        <button id="toggleDarkMode"
                            class="bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="toggle theme">
                            <i id="iconToggle" class="fas fa-sun icon-transition"></i>
                        </button>
                    @endif
                </div>

                <!-- Modal Structure -->
                <div id="videoModal"
                    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-75 flex items-center justify-center p-4">
                    <div class="bg-gray-800 p-4 rounded-lg relative w-full max-w-3xl mx-auto">
                        <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                            <iframe id="videoIframe" class="absolute top-0 left-0 w-full h-full" src=""
                                frameborder="0" allowfullscreen></iframe>
                            <button onclick="closeModal()"
                                class="absolute top-0 right-0 mt-2 mr-4 text-white hover:text-gray-300 focus:outline-none z-10">
                                X</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <script>
            // Function to open the modal
            function openModal(videoId) {
                const modal = document.getElementById('videoModal');
                const iframe = document.getElementById('videoIframe');
                iframe.src = `https://www.youtube.com/embed/${videoId}`; // Use backticks for template literals
                modal.classList.remove('hidden');
            }

            // Function to close the modal
            function closeModal() {
                const modal = document.getElementById('videoModal');
                const iframe = document.getElementById('videoIframe');
                iframe.src = ''; // Stop the video
                modal.classList.add('hidden');
            }

            let screenReaderEnabled = localStorage.getItem('screenReaderEnabled') === 'true';
            let speechSynthesisUtterance;

            function toggleAccessibility() {
                var accessibilityIcon = document.getElementById('accessibilityIcon');
                if (accessibilityIcon) {
                    accessibilityIcon.classList.toggle('fa-universal-access');
                    accessibilityIcon.classList.toggle('fa-times');
                }

                var toggleLanguage = document.getElementById('toggleLanguage');
                if (toggleLanguage) {
                    toggleLanguage.classList.toggle('hidden');
                }

                var toggleTextSize = document.getElementById('toggletextsize');
                if (toggleTextSize) {
                    toggleTextSize.classList.toggle('hidden');
                }

                var toggleScreenReader = document.getElementById('toggleScreenReader');
                if (toggleScreenReader) {
                    toggleScreenReader.classList.toggle('hidden');
                }

                var togglePreRecord = document.getElementById('toggleVideo');
                if (togglePreRecord) {
                    togglePreRecord.classList.toggle('hidden');
                }
            }



            function toggleTextSize() {
                var textSizeIndicator = document.getElementById('textSizeIndicator');
                var currentTextSize = textSizeIndicator.innerHTML;
            }


            function toggleScreenReader() {
                console.log("Screen reader toggle clicked");
                screenReaderEnabled = !screenReaderEnabled;
                localStorage.setItem('screenReaderEnabled', screenReaderEnabled);
                const screenReaderIcon = document.getElementById('screenReaderIcon');
                const screenMenuReaderIcon = document.getElementById('screenMenuReaderIcon');
                const screenModalReaderIcon = document.getElementById('screenModalReaderIcon');

                if (screenReaderEnabled) {
                    startScreenReader();
                    if (screenReaderIcon) {
                        screenReaderIcon.classList.add('fa-volume-up');
                        screenReaderIcon.classList.remove('fa-volume-mute');
                    }

                    if (screenMenuReaderIcon) {
                        screenMenuReaderIcon.classList.add('fa-volume-up');
                        screenMenuReaderIcon.classList.remove('fa-volume-mute');
                    }

                    if (screenModalReaderIcon) {
                        screenModalReaderIcon.classList.add('fa-volume-up');
                        screenModalReaderIcon.classList.remove('fa-volume-mute');
                    }
                } else {
                    stopScreenReader();
                    if (screenReaderIcon) {
                        screenReaderIcon.classList.add('fa-volume-mute');
                        screenReaderIcon.classList.remove('fa-volume-up');
                    }

                    if (screenMenuReaderIcon) {
                        screenMenuReaderIcon.classList.add('fa-volume-mute');
                        screenMenuReaderIcon.classList.remove('fa-volume-up');
                    }

                    if (screenModalReaderIcon) {
                        screenModalReaderIcon.classList.add('fa-volume-mute');
                        screenModalReaderIcon.classList.remove('fa-volume-up');
                    }
                }
                location.reload();

            }

            function startScreenReader() {
                console.log("Starting screen reader");
                const elements = document.querySelectorAll('[aria-label], select');
                let screenReaderEnabled = true;
                const locale = "{{ app()->getLocale() }}";

                function handleInteraction(event) {
                    if (screenReaderEnabled) {
                        const ariaLabel = event.target.getAttribute('aria-label');
                        if (ariaLabel) {
                            speak(ariaLabel);
                        }
                    }
                }

                function handleTyping(event) {
                    if (screenReaderEnabled) {
                        const currentValue = event.target.value;
                        if (currentValue) {
                            speak(`${currentValue}`);
                        }
                    }
                }

                function handleSelection(event) {
                    if (screenReaderEnabled) {
                        const selectedOption = event.target.options[event.target.selectedIndex].text;
                        if (selectedOption) {
                            speak(`${selectedOption}`);
                        }
                    }
                }

                function speak(text) {
                    const voice = locale === 'fil' ? 'Filipino Female' : 'US English Male';
                    responsiveVoice.speak(text, voice);
                }

                elements.forEach(element => {
                    element.addEventListener('focus', handleInteraction);
                    element.addEventListener('mouseover', handleInteraction);
                    element.addEventListener('input', handleTyping);

                    // Handle <select> dropdowns
                    if (element.tagName.toLowerCase() === 'select') {
                        element.addEventListener('change', handleSelection);

                        // Add mouseover event to each option in the dropdown
                        const options = element.options;
                        for (let i = 0; i < options.length; i++) {
                            options[i].addEventListener('mouseover', function() {
                                speak(options[i].text);
                            });
                        }
                    }
                });

                document.addEventListener('click', function(event) {
                    if (!event.target.closest('[aria-label], select')) {
                        screenReaderEnabled = false;
                        console.log("Screen reader disabled");
                    } else {
                        screenReaderEnabled = true;
                        console.log("Screen reader enabled");
                    }
                });
            }


            function stopScreenReader() {
                console.log("Stopping screen reader");
                const elements = document.querySelectorAll('[aria-label]');

                function handleInteraction(event) {
                    // This is a dummy function to match the previous structure
                }

                elements.forEach(element => {
                    element.removeEventListener('focus', handleInteraction);
                });

                window.speechSynthesis.cancel();
            }


            window.addEventListener('load', function() {
                const screenReaderIcon = document.getElementById('screenReaderIcon');
                const screenMenuReaderIcon = document.getElementById('screenMenuReaderIcon');
                const screenModalReaderIcon = document.getElementById('screenModalReaderIcon');

                if (screenReaderEnabled) {
                    startScreenReader();
                }

                if (screenReaderIcon) {
                    screenReaderIcon.classList.toggle('fa-volume-up', screenReaderEnabled);
                    screenReaderIcon.classList.toggle('fa-volume-mute', !screenReaderEnabled);
                }

                if (screenMenuReaderIcon) {
                    screenMenuReaderIcon.classList.toggle('fa-volume-up', screenReaderEnabled);
                    screenMenuReaderIcon.classList.toggle('fa-volume-mute', !screenReaderEnabled);
                }

                if (screenModalReaderIcon) {
                    screenModalReaderIcon.classList.toggle('fa-volume-up', screenReaderEnabled);
                    screenModalReaderIcon.classList.toggle('fa-volume-mute', !screenReaderEnabled);
                }
            });


            // Handle page unload to stop ongoing speech
            window.addEventListener('beforeunload', function() {
                if (responsiveVoice.isPlaying()) {
                    responsiveVoice.cancel(); // Stop speech if the page is being unloaded
                }
            });
        </script>

        <script>
            var textSize = parseInt(localStorage.getItem('textSize')) || 1;

            function saveTextSizePreference() {
                localStorage.setItem('textSize', textSize);
            }

            function applyTextSize() {
                var elements = document.querySelectorAll(
                    'body, h1, h2, p, span, select, input, th, li, nav, input[type="text"], input[type="number"],button'
                );
                elements.forEach(function(el) {
                    if (el.tagName === 'INPUT' && (el.type === 'text' || el.type === 'number')) {
                        switch (textSize) {
                            case 1:
                                el.style.fontSize = '1rem'; // x1 - medium
                                break;
                            case 2:
                                el.style.fontSize = '1.125rem'; // x2
                                break;
                            case 3:
                                el.style.fontSize = '1.25rem'; // x3
                                break;
                            case 4:
                                el.style.fontSize = '1.5rem'; // lg - larger
                                break;
                            default:
                                el.style.fontSize = '1.125'; // Default to x1 (medium)
                                break;
                        }
                    } else {
                        el.classList.remove('text-sm', 'text-md', 'text-lg', 'text-xl', 'text-2xl');
                        switch (textSize) {
                            case 1:
                                el.classList.add('text-md'); // Medium
                                break;
                            case 2:
                                el.classList.add('text-lg'); // Larger
                                break;
                            case 3:
                                el.classList.add('text-xl'); // Even larger
                                break;
                            case 4:
                                el.classList.add('text-2xl'); // Extra large
                                break;
                            default:
                                el.classList.add('text-lg'); // Default to larger
                                break;
                        }
                    }
                });

                var textSizeIndicator = document.getElementById('textSizeIndicator');

                if (textSizeIndicator) {
                    switch (textSize) {
                        case 1:
                            textSizeIndicator.textContent = 'x1';
                            break;
                        case 2:
                            textSizeIndicator.textContent = 'x2';
                            break;
                        case 3:
                            textSizeIndicator.textContent = 'x3';
                            break;
                        case 4:
                            textSizeIndicator.textContent = 'lg';
                            break;
                        default:
                            textSizeIndicator.textContent = 'x2'; // Default to x2
                            break;
                    }
                }

            }

            function toggleTextSize() {
                // Increment text size index or reset to 1
                textSize = (textSize % 4) + 1;
                saveTextSizePreference(); // Save textSize preference in localStorage
                applyTextSize(); // Apply the new text size
            }

            // Apply the saved text size preference on page load
            document.addEventListener("DOMContentLoaded", function() {
                applyTextSize();
            });
        </script>
@endif

@if (Auth::user()->usertype == 'employer')
    <div id="accessibilityPanel" class="fixed bottom-4 right-4 z-10 max-h-screen overflow-y-auto">
        <div
            class="bg-gray-200 dark:bg-gray-800 p-2 rounded-full  flex flex-col items-center space-y-4 opacity-40 hover:opacity-100 transition-opacity duration-300 ease-in-out">
            <button id="toggleDarkMode"
                class="bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                aria-label="toggle theme">
                <i id="iconToggle" class="fas fa-sun icon-transition"></i>
            </button>
@endif
</div>
</div>


@if (Auth::user()->usertype == 'admin')
    <div id="accessibilityPanel" class="fixed bottom-4 right-4 z-10 max-h-screen overflow-y-auto">
        <div
            class="bg-gray-200 dark:bg-gray-800 p-2 rounded-full  flex flex-col items-center space-y-4 opacity-40 hover:opacity-100 transition-opacity duration-300 ease-in-out">
            <button id="toggleDarkMode"
                class="bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                aria-label="toggle theme" onclick="reloadPage()">
                <i id="iconToggle" class="fas fa-sun icon-transition"></i>
            </button>
        </div>
    </div>
    <script>
        function reloadPage() {
            location.reload();
        }
    </script>
@endif

<script>
    function disableKeys(event) {
        const allowedKeys = [8, 9, 16, 17, 18, 27, 32, 37, 38, 39,
            40
        ]; // Backspace, Tab, Shift, Control, Alt, Escape, Space, Arrow keys

        // Allow specific keys based on their ASCII codes
        if (allowedKeys.includes(event.keyCode)) {
            return true;
        }

        // Disable all letters (A-Z, a-z) and numbers (0-9) based on ASCII codes
        if (
            (event.keyCode >= 48 && event.keyCode <= 57) || // Numbers 0-9
            (event.keyCode >= 65 && event.keyCode <= 90) || // Uppercase letters A-Z
            (event.keyCode >= 97 && event.keyCode <= 122) // Lowercase letters a-z
        ) {
            event.preventDefault();
            return false;
        }
    }

    // Attach the event only to date-time picker inputs
    document.querySelectorAll('input[type="datetime-local"]').forEach(input => {
        input.addEventListener('keydown', disableKeys);
    });
</script>



<script>
    // Retrieve dark mode preference from local storage or default to false (light mode)
    let isDarkMode = localStorage.getItem('darkMode') === 'true';

    const toggleButton = document.getElementById('toggleDarkMode');
    const icon = document.getElementById('iconToggle');

    // Update logos function
    function updateLogos() {
        const navbarLogo = document.getElementById('navbarLogo');
        const mainnavbarLogo = document.getElementById('mainnavbarLogo');
        const main_nav = document.getElementById('main-nav');

        if (isDarkMode) {
            if (navbarLogo) {
                navbarLogo.src = '/images/darknavbarlogo.webp';
            }
            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/darknavbarlogo.webp';
            }

            if (main_nav) {
                main_nav.classList.add('dark');
            }
        } else {
            if (navbarLogo) {
                navbarLogo.src = '/images/lightnavbarlogo.webp';
            }
            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/lightnavbarlogo.webp';
            }

            if (main_nav) {
                main_nav.classList.remove('dark');
            }
        }
    }

    // Function to update UI based on dark mode state
    function updateDarkModeUI() {
        if (isDarkMode) {
            document.documentElement.classList.add('dark');
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        } else {
            document.documentElement.classList.remove('dark');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
        updateLogos();
    }

    // Initial call to update UI based on stored dark mode preference
    updateDarkModeUI();

    toggleButton.addEventListener('click', function() {
        isDarkMode = !isDarkMode;
        const theme = isDarkMode ? 'dark' : 'light';
        localStorage.setItem('theme', theme); // Store theme preference in local storage
        localStorage.setItem('darkMode', isDarkMode); // Store dark mode preference in local storage
        updateDarkModeUI();

        // Optionally, you can add logic to store dark mode preference on the server
        fetch('/toggle-dark-mode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            },
            body: JSON.stringify({
                dark_mode: isDarkMode
            })
        }).then(response => {
            if (!response.ok) {
                throw new Error('Failed to toggle dark mode');
            }
            return response.json();
        }).then(data => {
            console.log(data); // Log success message or handle accordingly
        }).catch(error => {
            console.error('Error toggling dark mode:', error);
            // Handle error scenario, e.g., show error message to the user
        });
    });

    function checkScreenSize() {
        const div = document.getElementById('responsiveDiv');
        if (window.matchMedia("(max-width: 768px)").matches) { // 768px is the breakpoint for medium screens
            div.classList.remove('bg-white'); // Remove the background color
            div.classList.remove('rounded-lg');
            div.classList.remove('shadow-lg');
            div.style.backgroundColor = 'transparent'; // Make it transparent
        } else {
            div.classList.add('bg-white'); // Add the background color back
            div.style.backgroundColor = ''; // Reset to default
        }
    }

    // Run the function on initial load
    checkScreenSize();

    // Add an event listener to check on window resize
    window.addEventListener('resize', checkScreenSize);
</script>


@if (Route::currentRouteName() === 'profile.edit' ||
        Route::currentRouteName() === 'admin.dashboard' ||
        Route::currentRouteName() === 'admin.manageusers' ||
        Route::currentRouteName() === 'admin.audit' ||
        Route::currentRouteName() === 'admin.managevideos' ||
        Route::currentRouteName() === 'admin.traininglist')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 ">
        @if (!request()->routeIs('profile.edit'))
            @include('layouts.navigation')
        @endif
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 dark:bg-gray-800  shadow-xl relative">
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-1 absolute inset-x-0 bottom-0"></div>
                <div class="bg-gray-100 dark:bg-gray-800 max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:ml-12 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
@else
    <div class="min-h-screen bg-gray-200 dark:bg-gray-700 bg">
        @if (!request()->routeIs('profile.edit'))
            @include('layouts.navigation')
        @endif
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 dark:bg-gray-800 shadow-xl relative mt-0">
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-1 absolute inset-x-0 bottom-0"></div>
                <div class="bg-gray-100 dark:bg-gray-800 max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:ml-12 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
@endif
</body>

</html>
<style>
    .dark-transition {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
</style>
