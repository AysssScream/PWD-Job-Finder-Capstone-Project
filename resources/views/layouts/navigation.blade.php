<link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg py-2 dark:shadow-lg" id="main-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                        <img src="{{ session('dark_mode') ? asset('/images/darknavbarlogo.png') . '?v=' . time() : asset('/images/lightnavbarlogo.png') . '?v=' . time() }}"
                            id="mainnavbarLogo" width="150" height="150" class="align-middle me-1 img-fluid"
                            alt="My Website" />
                    </a>

                </div>


                <!-- Admin Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Auth::user()->usertype == 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.user')" :active="request()->routeIs('admin.user')">
                            {{ __('Manage Users') }}
                        </x-nav-link>
                    @endif
                </div>
                @php
                    $currentRoute = request()->route()->getName();
                @endphp


                <!-- User Navigation Links -->
                <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                    @if (Auth::user()->usertype == 'user')
                        @if (Auth::user()->account_verification_status === 'approved')
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon -->
                                {{ __('Dashboard') }}
                            </x-nav-link>

                            <x-nav-link :href="route('savedjobs')" :active="request()->routeIs('savedjobs')">
                                <i class="fas fa-save mr-2"></i> <!-- Font Awesome icon -->
                                {{ __('Saved Jobs') }}
                            </x-nav-link>
                        @elseif (Auth::user()->account_verification_status === 'pending')
                            <x-nav-link :href="route('pendingapproval')" :active="request()->routeIs('pendingapproval')">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ __('Getting Started') }}
                            </x-nav-link>
                        @endif
                    @endif


                </div>





                <!-- Employer Navigation Links -->
                <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                    @if (Auth::user()->usertype == 'employer' && Auth::user()->account_verification_status === 'approved')
                        <x-nav-link :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('employer.manage')" :active="request()->routeIs('employer.manage')">
                            {{ __('Job Listings') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.js" defer></script>

            <div class="flex items-center space-x-4">
                @if (Auth::user()->usertype == 'user')
                    <div x-data="{ showNotif: false }" class="relative">
                        <!-- Button to toggle the drawer -->
                        <button @click="showNotif = !showNotif"
                            class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                            <i class="fas fa-bell text-4xl"></i> <!-- Font Awesome bell icon -->
                            <!-- Replace with a dynamic notification count or dot -->
                            <span x-show="!showNotif"
                                class="absolute top-0 right-0 bg-red-500 rounded-full text-xs px-2 py-1 text-white">{{ Auth::user()->applications()->whereNull('read_at')->count() }}
                            </span>
                        </button>


                        <!-- Use a template for conditional rendering -->
                        <template x-if="showNotif">
                            <div x-show="showNotif"
                                class="fixed inset-0 flex justify-start bg-black bg-opacity-50 z-50 transition-opacity"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-x-full"
                                x-transition:enter-end="opacity-100 transform translate-x-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-x-0"
                                x-transition:leave-end="opacity-0 transform -translate-x-full"
                                @click.away="open = false">
                                <!-- Drawer content -->
                                <div
                                    class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-gray-100 text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg overflow-y-auto">
                                    <div class="p-4 h-full overflow-y-auto">
                                        <div
                                            class="p-2 bg-gray-200 w-full text-black dark:bg-gray-700 dark:text-gray-200 text-center">
                                            <button @click="showNotif = false"
                                                class="text-sm text-gray-700 dark:text-gray-200 hover:text-gray-500 focus:outline-none">
                                                Close
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('applications.markAllAsRead') }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-sm mt-3 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                                                <i class="fas fa-check-circle mr-1"></i> Mark All as Read
                                            </button>
                                        </form>

                                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5">
                                            Applied Jobs</h3>

                                        <!-- Replace with actual notification items -->
                                        <ul
                                            class="mt-4 h-52 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                            @foreach (Auth::user()->applications->where('status', 'pending') as $application)
                                                <li
                                                    class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex items-center space-x-3">
                                                        <div class="rounded-full bg-blue-500 h-4 w-4"></div>
                                                        <div
                                                            class="text-sm text-gray-700 dark:text-gray-200 break-all max-w-xs">
                                                            Applied In {{ $application->company_name }} as a
                                                            {{ $application->title }}.
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-gray-700 dark:text-gray-400">
                                                        {{ $application->created_at->diffForHumans() }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5">
                                            Approved Applications
                                        </h3>
                                        <ul
                                            class="mt-4 h-52 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                            @foreach (Auth::user()->applications->where('status', 'hired') as $application)
                                                <li
                                                    class="flex items-start justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex-1 flex items-start space-x-3">
                                                        <div class="rounded-full bg-green-500 h-4 w-4 mt-1"></div>
                                                        <div
                                                            class="flex-1 text-sm text-gray-700 dark:text-gray-200 break-all">
                                                            <span class="font-semibold">Hired in
                                                                {{ $application->company_name }}</span> <br>
                                                            <span>as a {{ $application->title }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <form action="{{ url('') }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="text-sm text-blue-300 font-bold hover:text-blue-200 focus:outline-none">
                                                                View
                                                            </button>
                                                        </form>
                                                        <span
                                                            class="block text-xs text-gray-700 dark:text-gray-400 mt-1">
                                                            {{ $application->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>



                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                @endif



                <!-- Settings Dropdown -->
                <div class="hidden lg:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:border-blue-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                                <div
                                    class="flex-shrink-0 h-9 w-9 sm:h-11 sm:w-11 rounded-full overflow-hidden border-2 border-blue-400 bg-white">
                                    @if (Auth::user()->pwdInformation)
                                        <img class="h-full w-full object-contain"
                                            src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                            alt="Avatar"
                                            onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                    @else
                                        <img class="h-full w-full object-contain"
                                            src="{{ asset('/images/avatar.png') }}" alt="Avatar">
                                    @endif
                                </div>
                                <!-- User Name -->
                                <div class="ml-2">{{ Auth::user()->name }}</div>

                                <!-- Dropdown Arrow -->
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
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
                                    @if (Auth::user()->pwdInformation)
                                        <img class="h-full w-full object-contain"
                                            src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                            alt="Avatar"
                                            onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                    @else
                                        <img class="h-full w-full object-contain"
                                            src="{{ asset('/images/avatar.png') }}" alt="Avatar">
                                    @endif
                                </div>


                                <!-- User Info (Avatar, Email) -->
                            </div>

                            <div
                                class="px-2 py-2 text-center  bg-white text-gray-800 dark:bg-gray-700 dark:text-white ">
                                <div
                                    class="text-md font-medium mb-1 sm:mb-2 whitespace-nowrap overflow-hidden overflow-ellipsis">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-sm whitespace-nowrap overflow-hidden overflow-ellipsis">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>


                            @if (Auth::user()->account_verification_status == 'approved' && Auth::user()->usertype == 'user')
                                <div class="px-0 py-2">
                                    <x-dropdown-link :href="route('profile.edit')"
                                        class="block text-md font-medium text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i>
                                        {{ __('Profile') }}
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
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block text-md font-medium text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>


                <!-- Hamburger -->
                <div class="-me-2 flex items-center lg:hidden">
                    <button @click="open = !open"
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
