<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=kFALIVnb"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            background-image: url('/images/dashboard-light.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: auto;
            background-attachment: fixed;
        }

        .dark .bg {
            background-image: url('/images/dashboard-dark.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: auto;
            background-attachment: fixed;
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
            class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow h-full bg-white text-black dark:bg-gray-800 dark:text-gray-200 custom-scrollbar">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5 hidden md:flex md:flex-col md:justify-center md:items-center text-center">
                    <img class="rounded-full object-contain h-32 w-32 border-2 border-gray-300 mb-4"
                        alt="placeholder-avatar" aria-label="Empty Profile Picture"
                        src="{{ asset('/images/avatar.png') }}">
                    @if (Auth::check())
                        <div class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">
                            {{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}
                        </div>
                        <div class="text-sm text-gray-700 dark:text-gray-200 mb-3">
                            {{ Auth::user()->email }}
                        </div>
                    @else
                        <div class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">
                            Guest
                        </div>
                        <div class="text-sm text-gray-700 dark:text-gray-200 mb-3">
                            guest@example.com
                        </div>
                    @endif
                </li>

                <li class="px-5 hidden md:block">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span
                            class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200 ">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manageusers') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6">
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
                        class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6">
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
                    {{--    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">PWD
                            Approvals</span>
                         <span
                            class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">100</span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.messages') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6">
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
                        class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-video w-5 h-5"></i>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Manage
                            Videos</span>
                        {{--  <span
        class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
                    </a>

                </li>
                <li class="px-5 hidden md:block">
                    <div class="flex flex-row items-center mt-5 h-8">
                        <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none border-l-4 border-transparent hover:border-gray-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <span
                            class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span
                            class="ml-2 text-sm tracking-wide truncate text-gray-700 dark:text-gray-200">Settings</span>
                    </a>
                </li>
                <!-- Logout Link -->
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="relative flex flex-row items-center h-11 focus:outline-none  border-l-4 border-transparent hover:border-gray-500 pr-6 w-full">
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
    <div id="myModal"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-gray-600 dark:text-gray-200 overflow-y-auto hidden z-20"
        role="dialog" aria-labelledby="modalTitle" aria-modal="true">
        <div class="p-5 border w-3/4 max-w-4xl shadow-lg rounded-md bg-white dark:bg-gray-800" role="document">
            <div class="text-center">
                <h2 id="modalTitle" aria-label="Welcome {{ Auth::user()->firstname }} !" tabindex="0"
                    class="text-2xl leading-6 font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    <i class="fas fa-cogs mr-2"></i>
                    Welcome
                    {{ Auth::user()->firstname }} !
                </h2>
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

                /* Call the function with the translated message
                speak("Welcome {{ Auth::user()->firstname }} !");
                speak("{{ __('messages.account_approved') }}");*/
            }

            document.getElementById('closeModal').addEventListener('click', () => {
                document.getElementById('myModal').classList.add('hidden');
                localStorage.setItem('modalDisplayed', 'true');
            });



        });
    </script>




    <body class="font-sans antialiased dark-transition">
        @if (Auth::user()->usertype == 'user')
            <div id="accessibilityPanel" class="fixed bottom-20 right-4 z-10">
                <button id="toggleAccessibility" onclick="toggleAccessibility()"
                    aria-label="Toggle Accessibility Options"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center language-toggle focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    <span id="accessibilityIcon" class="fas fa-2xl fa-universal-access "></span>
                </button>


                <!-- Language Toggle -->
                <a href="{{ route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en']) }}"
                    id="toggleLanguage" aria-label="Toggle Language"
                    class=" hidden bg-green-500  hover:bg-green-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center language-toggle z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    @if (App::isLocale('en'))
                        <img src="{{ asset('images/us.png') }}" alt="USA Flag" class="flag-img"
                            aria-label="English Language Enabled">
                    @else
                        <img src="{{ asset('images/ph.png') }}" alt="Philippines Flag" class="flag-img"
                            aria-label="Filipino Language Enabled">
                    @endif
                </a>

                <!-- Text Size Toggle -->
                <a href="#" id="toggletextsize" onclick="toggleTextSize()"
                    class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="Toggle Text Size">
                    <span id="textSizeIndicator"></span>
                    <!-- Span to display text size indicator -->
                </a>

                <a href="#" id="toggleScreenReader" onclick="toggleScreenReader()"
                    class="hidden bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="Toggle On Screen Reader">
                    <i id="screenReaderIcon" class="fas"></i>
                </a>

                @php
                    // Use the method from the Video model to fetch the video data
                    $dashboard = \App\Models\Video::getVideoByLocation('Dashboard');
                    $savedjobs = \App\Models\Video::getVideoByLocation('Saved Jobs');
                    $settings = \App\Models\Video::getVideoByLocation('Settings');

                @endphp

                @if (Route::currentRouteName() === 'dashboard')
                    @if ($dashboard && $dashboard->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $dashboard->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language "></i>
                        </a>
                    @endif
                @elseif (Route::currentRouteName() === 'savedjobs')
                    @if ($savedjobs && $savedjobs->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $savedjobs->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language "></i>
                        </a>
                    @endif
                @elseif (Route::currentRouteName() === 'profile.edit')
                    @if ($settings && $settings->video_id)
                        <a id="toggleVideo" onclick="openModal('{{ $settings->video_id }}')" tabindex="0"
                            class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="Toggle Pre-recorded Video (Sign Language)">
                            <i id="videoIcon" class="fas fa-sign-language "></i>
                        </a>
                    @endif
                @endif



                <!-- Modal Structure -->
                <div id="videoModal"
                    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-75 flex items-center justify-center p-4">
                    <div class="bg-gray-800 p-4 rounded-lg relative w-full max-w-3xl mx-auto">
                        <div class="relative overflow-hidden" style="padding-top: 56.25%;">
                            <iframe id="videoIframe" class="absolute top-0 left-0 w-full h-full" src=""
                                frameborder="0" allowfullscreen></iframe>
                            <button onclick="closeModal()"
                                class="absolute top-0 right-0 mt-2 mr-2 text-white hover:text-gray-300 focus:outline-none z-10">
                                <i class="fas fa-times text-2xl"></i>
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
            // const enableSound = new Audio('enable.mp3'); // Path to enable sound
            // const disableSound = new Audio('disable.mp3'); // Path to disable sound

            function toggleAccessibility() {
                var accessibilityIcon = document.getElementById('accessibilityIcon');
                var isOpen = accessibilityIcon.classList.toggle('fa-universal-access');
                accessibilityIcon.classList.toggle('fa-times');
                var toggleLanguage = document.getElementById('toggleLanguage');
                var toggleTextSize = document.getElementById('toggletextsize');
                var toggleScreenReader = document.getElementById('toggleScreenReader');
                var togglePreRecord = document.getElementById('toggleVideo')
                toggleLanguage.classList.toggle('hidden');
                toggleTextSize.classList.toggle('hidden');
                toggleScreenReader.classList.toggle('hidden');
                togglePreRecord.classList.toggle('hidden');
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
            }

            function startScreenReader() {
                console.log("Starting screen reader");
                const elements = document.querySelectorAll('[aria-label]');
                speechSynthesisUtterance = new SpeechSynthesisUtterance();

                function handleInteraction(event) {
                    if (screenReaderEnabled) {
                        speak(event.target.getAttribute('aria-label'));
                    }
                }
                const locale = "{{ app()->getLocale() }}";

                function speak(text) {
                    const voice = locale === 'fil' ? 'Filipino Female' : 'US English Male';
                    responsiveVoice.speak(text, voice);
                }

                elements.forEach(element => {
                    element.addEventListener('focus', handleInteraction);
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

            // Initialize screen reader state based on localStorage
            window.addEventListener('load', function() {
                const screenReaderIcon = document.getElementById('screenReaderIcon');
                const screenMenuReaderIcon = document.getElementById('screenMenuReaderIcon');
                const screenModalReaderIcon = document.getElementById('screenModalReaderIcon');

                if (screenReaderEnabled) {
                    startScreenReader();

                    screenReaderIcon.classList.add('fa-volume-up');
                    screenReaderIcon.classList.remove('fa-volume-mute');

                    screenMenuReaderIcon.classList.add('fa-volume-up');
                    screenMenuReaderIcon.classList.remove('fa-volume-mute');

                    screenModalReaderIcon.classList.add('fa-volume-up');
                    screenModalReaderIcon.classList.remove('fa-volume-mute');
                } else {
                    screenReaderIcon.classList.add('fa-volume-mute');
                    screenReaderIcon.classList.remove('fa-volume-up');

                    screenMenuReaderIcon.classList.add('fa-volume-mute');
                    screenMenuReaderIcon.classList.remove('fa-volume-up');

                    screenModalReaderIcon.classList.add('fa-volume-mute');
                    screenModalReaderIcon.classList.remove('fa-volume-up');
                }
            });

            // Handle page unload to stop ongoing speech
            window.addEventListener('beforeunload', function() {
                if (responsiveVoice.isPlaying()) {
                    responsiveVoice.cancel(); // Stop speech if the page is being unloaded
                }
            });
        </script>


@endif

@if (Auth::user()->usertype == 'user' || Auth::user()->usertype == 'employer')
    <button id="toggleDarkMode"
        class="fixed bottom-4 right-4 bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label="toggle theme">
        <i id="iconToggle" class="fas fa-sun icon-transition"></i>
    </button>
@endif

@if (Auth::user()->usertype == 'admin')
    <button id="toggleDarkMode"
        class="fixed bottom-4 right-4 bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition z-10 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label="reload page" onclick="reloadPage()">
        <i id="iconToggle" class="fas fa-sun icon-transition"></i>
    </button>

    <script>
        // Function to reload the page
        function reloadPage() {
            location.reload();
        }
    </script>
@endif


<script>
    var textSize = parseInt(localStorage.getItem('textSize')) || 1;

    function saveTextSizePreference() {
        localStorage.setItem('textSize', textSize);
    }

    function applyTextSize() {
        var elements = document.querySelectorAll(
            'body, h1, h2, p, select, input, th, li, nav, input[type="text"], input[type="number"],button');
        elements.forEach(function(el) {
            if (el.tagName === 'INPUT' && (el.type === 'text' || el.type === 'number')) {
                switch (textSize) {
                    case 1:
                        el.style.fontSize = ' 0.875rem';; // x1
                        break;
                    case 2:
                        el.style.fontSize = '1rem'; // x2
                        break;
                    case 3:
                        el.style.fontSize = '1.125rem'; // x3
                        break;
                    case 4:
                        el.style.fontSize = '1.25rem'; // lg
                        break;
                    default:
                        el.style.fontSize = '1rem'; // Default to x2
                        break;
                }
            } else {
                el.classList.remove('text-sm', 'text-md', 'text-lg', 'text-xl');
                switch (textSize) {
                    case 1:
                        //  el.classList.add('text-xs'); // x1
                        el.classList.add('text-sm');
                        break;
                    case 2:
                        // el.classList.add('text-sm'); // x2
                        el.classList.add('text-md');
                        break;
                    case 3:
                        // el.classList.add('text-md'); // x3
                        el.classList.add('text-lg');
                        break;
                    case 4:
                        // el.classList.add('text-lg'); // lg
                        el.classList.add('text-xl');
                        break;
                    default:
                        el.classList.add('text-lg'); // Default to x3
                        break;
                }
            }
        });

        // Update text size indicator in the button
        var textSizeIndicator = document.getElementById('textSizeIndicator');
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
                textSizeIndicator.textContent = 'x2'; // Default to x3
                break;
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
                navbarLogo.src = '/images/darknavbarlogo.png';
            }
            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/darknavbarlogo.png';
            }

            if (main_nav) {
                main_nav.classList.add('dark');
            }
        } else {
            if (navbarLogo) {
                navbarLogo.src = '/images/lightnavbarlogo.png';
            }
            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/lightnavbarlogo.png';
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

    // Event listener for toggle button
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
</script>


@if (Route::currentRouteName() === 'profile.edit' ||
        Route::currentRouteName() === 'admin.dashboard' ||
        Route::currentRouteName() === 'admin.manageusers' ||
        Route::currentRouteName() === 'admin.audit' ||
        Route::currentRouteName() === 'admin.managevideos')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 ">
        @if (!request()->routeIs('profile.edit'))
            @include('layouts.navigation')
        @endif
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 dark:bg-gray-800  shadow-xl">
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
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 bg">
        @if (!request()->routeIs('profile.edit'))
            @include('layouts.navigation')
        @endif
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 dark:bg-gray-800  shadow-xl">
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
