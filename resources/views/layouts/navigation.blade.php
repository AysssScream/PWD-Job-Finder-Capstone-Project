<link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">


@if (
    !(Auth::user()->usertype == 'admin' ||
        Route::currentRouteName() === 'employer.messages' ||
        Route::currentRouteName() === 'employer.sentmessages' ||
        Route::currentRouteName() === 'user.messages' ||
        Route::currentRouteName() === 'user.sentmessages'
    ))
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg py-2 dark:shadow-lg" id="main-nav">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 lg:ml-12">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                            aria-label="Website Logo" id="logo-link"
                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            <img src="{{ asset('/images/lightnavbarlogo.webp') }}" id="mainnavbarLogo" width="150"
                                height="150" class="align-middle me-1 img-fluid" alt="My Website"
                                aria-label="Website Logo" />
                        </a>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var imgElement = document.getElementById('mainnavbarLogo');
                                var darkMode = localStorage.getItem('darkMode');

                                if (darkMode && darkMode === 'true') {
                                    imgElement.src = "{{ asset('/images/darknavbarlogo.webp') }}?v=" + new Date().getTime();
                                } else {
                                    imgElement.src = "{{ asset('/images/lightnavbarlogo.webp') }}?v=" + new Date().getTime();
                                }
                            });
                        </script>

                    </div>

                    <!-- User Navigation Links -->
                    <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                        @if (Auth::user()->usertype == 'user')
                            @if (Auth::user()->account_verification_status === 'approved')
                                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="Dashboard">
                                    <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon -->
                                    {{ __('Dashboard') }}
                                </x-nav-link>

                                <x-nav-link href="{{ route('savedjobs') }}" :active="request()->routeIs('savedjobs')"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="  {{ __('messages.navigation.Saved Jobs') }}">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    <!-- Font Awesome icon -->
                                    {{ __('messages.navigation.Saved Jobs') }}
                                </x-nav-link>
                            @elseif (Auth::user()->account_verification_status === 'pending')
                                <x-nav-link :href="route('pendingapproval')" :active="request()->routeIs('pendingapproval')"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="Getting Started">
                                    <i class="fas fa-check-circle mr-2" aria-label="Getting Started"></i>
                                    {{ __('Getting Started') }}
                                </x-nav-link>
                            @endif
                        @endif
                    </div>


                    <!-- Employer Navigation Links -->
                    <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                        @if (Auth::user()->usertype == 'employer' && Auth::user()->account_verification_status === 'approved')
                            <x-nav-link :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                                <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon -->
                                {{ __('Dashboard') }}
                            </x-nav-link>

                            <x-nav-link :href="route('employer.manage')" :active="request()->routeIs('employer.manage')">
                                <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                {{ __('Job Listings') }}
                            </x-nav-link>
                        @endif
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.js" defer></script>
                <div class="flex items-center space-x-4">
                    @if (Auth::user()->usertype == 'user')
                        <div class="relative">
                            <!-- Button to toggle the drawer -->
                            <button id="notificationButton"
                                aria-label="{{ Auth::user()->applications()->whereNull('read_at')->count() + Auth::user()->interviews()->whereNull('read_at')->count() }} Notifications Found "
                                class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label="There are {{ Auth::user()->applications()->whereNull('read_at')->count() + Auth::user()->interviews()->whereNull('read_at')->count() }} Notifications">
                                <i class="fas fa-bell text-4xl"></i>
                                <!-- Notification count -->
                                <div id="notificationCount"
                                    class="absolute top-0 right-0 bg-red-700 rounded-full text-xs px-2 py-1 text-white">
                                    {{ Auth::user()->applications()->whereNull('read_at')->count() + Auth::user()->interviews()->whereNull('read_at')->count() }}
                                </div>
                            </button>

                            @if (Session::has('message'))
                                <script>
                                    $(document).ready(function() {
                                        toastr.options = {
                                            "progressBar": true,
                                            "closeButton": true,
                                        }
                                        toastr.info("{{ Session::get('message') }}",
                                            '{{ Auth::user()->applications()->whereNull('read_at')->count() + Auth::user()->interviews()->whereNull('read_at')->count() }} Notifications Found', {
                                                timeOut: 5000

                                            });
                                    });
                                </script>
                            @endif

                            <!-- Notification Drawer -->
                            <div id="notificationDrawer"
                                class="hidden fixed inset-0 flex justify-start bg-black bg-opacity-50 z-50 transition-opacity">
                                <div
                                    class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-gray-100 text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg overflow-y-auto">
                                    <div class="p-4 h-full overflow-y-auto">
                                        <div class="p-2 bg-blue-700 w-full rounded-lg text-black dark:bg-gray-700 dark:text-gray-200 text-center cursor-pointer focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            id="closeButton" role="button" tabindex="0"
                                            aria-label="{{ __('messages.navigation.close') }}">
                                            <span
                                                class="text-sm text-white dark:text-gray-200 hover:text-gray-200 focus:outline-none">
                                                {{ __('messages.navigation.close') }}
                                            </span>
                                        </div>
                                        <form method="POST" action="{{ route('applications.markAllAsRead') }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-sm mt-3 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label=" {{ __('messages.navigation.mark_all_as_read') }}"
                                                tabindex="0" role="button">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                {{ __('messages.navigation.mark_all_as_read') }}
                                            </button>
                                        </form>

                                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ __('messages.navigation.applied_jobs') }}" role="button"
                                            tabindex="0">
                                            <i class="fas fa-briefcase mr-2"></i>
                                            {{ __('messages.navigation.applied_jobs') }}
                                        </h3>

                                        @php
                                            $pendingApplications = Auth::user()
                                                ->applications->where('status', 'pending')
                                                ->sortByDesc('created_at');
                                        @endphp

                                        <ul
                                            class="mt-4 h-52 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                            @foreach ($pendingApplications as $application)
                                                <li
                                                    class="flex items-center justify-between py-2 gap-2 border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex items-center space-x-3">
                                                        <div class="rounded-full bg-blue-500 h-4 w-4"></div>
                                                        <div aria-label="Applied In {{ $application->company_name }} as a
                                                            {{ $application->title }}"
                                                            tabindex="0"
                                                            class="text-md text-gray-700 dark:text-gray-200 break-all max-w-xs focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                            Applied In {{ $application->company_name }} as a
                                                            {{ $application->title }}.
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-right text-gray-700 dark:text-gray-400 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label="{{ $application->created_at->diffForHumans() }}"
                                                        style="font-size: 1rem;">
                                                        {{ $application->created_at->diffForHumans() }}
                                                    </span>

                                                </li>
                                            @endforeach
                                        </ul>

                                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ __('messages.navigation.interview_schedules') }}"
                                            tabindex="0">
                                            <i class="fas fa-calendar-alt mr-2"></i>
                                            {{ __('messages.navigation.interview_schedules') }}
                                        </h3>

                                        @php
                                            $pendingInterviews = Auth::user()
                                                ->interviews->where('status', 'pending')
                                                ->sortByDesc('created_at');
                                        @endphp

                                        <ul
                                            class="mt-4 h-52 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                            @foreach ($pendingInterviews as $interview)
                                                @php
                                                    $companyName = $interview->jobApplication->company_name ?? 'N/A'; // Safely retrieve company_name
                                                    $title = $interview->jobApplication->title ?? 'N/A';
                                                @endphp
                                                <li
                                                    class="flex items-center justify-between gap-2 py-2 border-b border-gray-200 dark:border-gray-600 ">
                                                    <div class="flex items-center space-x-3 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label=" Interview Scheduled from the {{ $title }}
                                                            Application in {{ $companyName }}.">
                                                        <div class="rounded-full bg-yellow-500 h-4 w-4"></div>
                                                        <div
                                                            class="text-md text-gray-700 dark:text-gray-200 break-all max-w-xs ">
                                                            Interview Scheduled from the {{ $title }}
                                                            Application in {{ $companyName }}.
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('show.remarks') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="remarks"
                                                                value="{{ $interview->remarks }}">
                                                            <input type="hidden" name="company_name"
                                                                value="{{ $interview->jobApplication->company_name }}">
                                                            <button type="submit"
                                                                class="text-sm text-blue-400 font-bold hover:text-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                                tabindex="0"
                                                                aria-label="{{ __('messages.navigation.view') }}">{{ __('messages.navigation.view') }}</button>
                                                        </form>
                                                        <span
                                                            class="block text-gray-700 dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                            aria-label="{{ $interview->created_at->diffForHumans() }}"
                                                            tabindex="0" style="font-size: 1rem;">
                                                            {{ $interview->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ __('messages.navigation.approved_applications') }}"
                                            tabindex="0">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            {{ __('messages.navigation.approved_applications') }}
                                        </h3>
                                        <ul
                                            class="mt-4 h-96 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                            @foreach (Auth::user()->applications->where('status', 'hired') as $application)
                                                <li
                                                    class="flex items-start justify-between py-2 gap-2 border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex-1 flex items-start space-x-3">
                                                        <div class="rounded-full bg-green-500 h-4 w-4 mt-1"></div>
                                                    <div class="flex-1 text-md text-gray-700 dark:text-gray-200 break-all focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                         tabindex="0" 
                                                         aria-label="Hired in {{ $application->company_name }} as a {{ $application->title }}">
                                                        <span class="font-semibold sm:text-base">Hired in {{ $application->company_name }}</span> <br>
                                                        <span class="sm:text-sm">as a {{ $application->title }}</span>
                                                    </div>

                                                    </div>
                                                    <div>
                                                        <form action="{{ route('show.remarks') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="remarks"
                                                                value="{{ $application->remarks }}">
                                                            <input type="hidden" name="company_name"
                                                                value="{{ $application->company_name }}">
                                                            <button type="submit" tabindex="0"
                                                                class="text-md text-blue-400 font-bold hover:text-blue-500 focus:outline-none  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                                tabindex="0"
                                                                aria-label="{{ __('messages.navigation.view') }}">{{ __('messages.navigation.view') }}</button>
                                                        </form>
                                                        <span
                                                            class="block text-gray-700 dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                            tabindex="0" style="font-size: 1rem;"
                                                            aria-label="{{ $application->created_at->diffForHumans() }}">
                                                            {{ $application->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const notificationButton = document.getElementById('notificationButton');
                                const notificationDrawer = document.getElementById('notificationDrawer');
                                const closeButton = document.getElementById('closeButton');

                                // Toggle the notification drawer
                                notificationButton.addEventListener('click', function() {
                                    notificationDrawer.classList.toggle('hidden');
                                });

                                // Close the notification drawer
                                closeButton.addEventListener('click', function() {
                                    notificationDrawer.classList.add('hidden');
                                });

                                // Close the notification drawer when clicking outside
                                window.addEventListener('click', function(event) {
                                    if (!notificationButton.contains(event.target) && !notificationDrawer.contains(event
                                            .target)) {
                                        notificationDrawer.classList.add('hidden');
                                    }
                                });
                            });
                        </script>
                    @endif




                    <!-- Settings Dropdown -->
                    <div class="hidden lg:flex sm:items-center sm:ms-6 " aria-label="Profile">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button aria-label="Profile"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                                    <div
                                        class="flex-shrink-0 h-9 w-9 sm:h-11 sm:w-11 rounded-full overflow-hidden border-2 border-blue-400 bg-white">
                                        @if (Auth::user()->usertype === 'user')
                                            @if (Auth::user()->pwdInformation)
                                                <img class="h-full w-full object-contain border-2 border-yellow-400 rounded-full"
                                                    aria-label="Profile"
                                                    src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                            @else
                                                <img class="h-full w-full object-contain border-2 border-yellow-400 rounded-full"
                                                    src="{{ asset('/images/avatar.png') }}" alt="Avatar">
                                            @endif
                                        @elseif (Auth::user()->usertype === 'employer')
                                            @if (Auth::user()->employer && Auth::user()->employer->company_logo)
                                                <img class="h-full w-full object-contain border-2 border-yellow-400 rounded-full"
                                                    aria-label="Profile"
                                                    src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                            @else
                                                <img class="h-full w-full object-contain border-2 border-yellow-400 rounded-full"
                                                    src="{{ asset('/images/avatar.png') }}" alt="Avatar">
                                            @endif
                                        @endif

                                    </div>
                                    <!-- User Name -->
                                    <div class="ml-2" aria-label="Profile">
                                        {{ Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname }}
                                    </div>

                                    <!-- Dropdown Arrow -->
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            aria-label="Dropdown Profile">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>


                            <x-slot name="content">
                                <!-- Avatar -->
                                <div class="flex items-center justify-center px-7 py-5">
                                    <!-- Avatar Container -->
                                    <div
                                        class="flex-shrink-0 h-20 w-20 rounded-full overflow-hidden border-2 border-blue-400 bg-white flex items-center justify-center shadow-md">
                                        @if (Auth::user()->usertype === 'user')
                                            @if (Auth::user()->pwdInformation)
                                                <img class="h-full w-full object-contain" aria-label="Profile Picture"
                                                    src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                            @else
                                                <img class="h-full w-full object-contain" aria-label="Profile Picture"
                                                    src="{{ asset('/images/avatar.png') }}" alt="Avatar">
                                            @endif
                                        @elseif (Auth::user()->usertype === 'employer')
                                            @if (Auth::user()->employer && Auth::user()->employer->company_logo)
                                                <img class="h-full w-full object-contain" aria-label="Company Logo"
                                                    src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                                    alt="Company Logo"
                                                    onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                            @else
                                                <img class="h-full w-full object-contain" aria-label="Company Logo"
                                                    src="{{ asset('/images/avatar.png') }}" alt="Company Logo">
                                            @endif
                                        @endif

                                    </div>


                                    <!-- User Info (Avatar, Email) -->
                                </div>

                                <div
                                    class="px-2 py-2 text-center  bg-white text-gray-800 dark:bg-gray-700 dark:text-white ">
                                    <div class="text-md font-medium mb-1 sm:mb-2 whitespace-nowrap overflow-hidden overflow-ellipsis"
                                        aria-label=" {{ Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname }}">
                                        {{ Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname }}
                                    </div>
                                    <div class="text-sm whitespace-nowrap overflow-hidden overflow-ellipsis"
                                        aria-label=" {{ Auth::user()->email }}">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                @if (
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined' ||
                                        Auth::user()->account_verification_status == 'pending') &&
                                        Auth::user()->usertype == 'user')
                                    <div class="px-0 py-2">
                                        <x-dropdown-link :href="route('user.messages')" aria-label="Inbox"
                                            class="block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-envelope mr-2"></i>
                                            {{ __('messages.navigation.Inbox') }}
                                        </x-dropdown-link>
                                    </div>
                                @elseif (
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined' ||
                                        Auth::user()->account_verification_status == 'pending') &&
                                        Auth::user()->usertype == 'employer')
                                    <div class="px-0 py-2">
                                        <x-dropdown-link :href="route('employer.messages')" aria-label="Inbox"
                                            class="block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-envelope mr-2"></i>
                                            {{ __('messages.navigation.Inbox') }}
                                        </x-dropdown-link>
                                    </div>
                                @elseif (
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined') &&
                                        Auth::user()->usertype == 'admin')
                                    <div class="px-0 py-2">
                                        <x-dropdown-link :href="route('admin.messages')" aria-label="Inbox"
                                            class="block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-envelope mr-2"></i>
                                            {{ __('messages.navigation.Inbox') }}
                                        </x-dropdown-link>
                                    </div>
                                @endif

                                @if (Auth::user()->account_verification_status == 'approved' && Auth::user()->usertype == 'user')
                                    <div class="px-0 ">
                                        <x-dropdown-link :href="route('profile.edit')" aria-label="Profile Settings"
                                            class="block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-user mr-2"></i>
                                            {{ __('messages.navigation.Profile') }}
                                        </x-dropdown-link>
                                    </div>
                                @endif


                                <!-- Divider -->
                                <div class="px-0">
                                    <hr class="my-1 border-gray-200">
                                </div>

                                <!-- Log Out Form -->
                                <div class="px-0 py-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" aria-label="Log Out"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-sign-out-alt mr-2"></i>
                                            {{ __('messages.navigation.Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>


                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center lg:hidden">
                        <button @click="open = !open" aria-label="Toggle menu"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
    </nav>
@endif
