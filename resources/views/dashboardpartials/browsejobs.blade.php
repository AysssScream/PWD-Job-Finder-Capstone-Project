<section class="w-full lg:w-4/5 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    
        <!-- Dashboard Overview Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg shadow-lg">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <h3 class="text-2xl font-bold flex items-center text-white mb-2 sm:mb-0 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    tabindex="0" aria-label="{{ __('messages.userdashboard.dashboard_overview') }}">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    {{ __('messages.userdashboard.dashboard_overview') }}
                </h3>
            <div class="flex items-center space-x-4">
                <!-- Search and Filter Toggle Button -->
                <button id="searchFilterToggle" 
                    class="p-3 bg-white dark:bg-gray-800 rounded-full hover:bg-blue-50 dark:hover:bg-gray-700 transform hover:scale-110 active:scale-95 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 shadow-lg hover:shadow-xl flex items-center" 
                    aria-label="Toggle Search and Filter"
                    data-tippy-content="Click to show/hide search filters">
                    <i class="fas fa-search text-xl text-blue-600 dark:text-blue-400"></i>
                    <span class="ml-2 text-blue-600 dark:text-blue-400 font-medium">Search & Filter</span>
                </button>
            
                <!-- Statistics Toggle Button -->
                <button id="toggleStatsBtn" 
                    class="p-3 bg-white dark:bg-gray-800 rounded-full hover:bg-blue-50 dark:hover:bg-gray-700 transform hover:scale-110 active:scale-95 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 shadow-lg hover:shadow-xl" 
                    aria-label="Toggle Statistics"
                    data-tippy-content="Click to show/hide statistics">
                    <i class="fas fa-chart-bar text-xl text-blue-600 dark:text-blue-400"></i>
                </button>
            </div>
        </div>
    </div>
    
    <script>    
    document.addEventListener('DOMContentLoaded', function() {
        tippy('#searchFilterToggle', {
            content: 'Click to show/hide search filters',
            placement: 'bottom',
            animation: 'scale',
            theme: 'custom',
            arrow: true,
            trigger: 'mouseenter',
            duration: [300, 250],
            hideOnClick: false,
        });
    
        tippy('#toggleStatsBtn', {
            content: 'Click to show/hide statistics',
            placement: 'bottom',
            animation: 'scale',
            theme: 'custom',
            arrow: true,
            trigger: 'mouseenter',
            duration: [300, 250],
            hideOnClick: false,
        });
    
        const toggleBtn = document.getElementById('toggleStatsBtn');
        const statsContainer = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-2.gap-6.mb-6');
        const icon = toggleBtn.querySelector('i');
        const searchFilterToggle = document.getElementById('searchFilterToggle');
        const searchFilterSection = document.querySelector('form.search-filter-section');
        const searchIcon = searchFilterToggle.querySelector('i');
        const statsVisible = localStorage.getItem('statsVisible') === 'true';
        const searchFilterVisible = localStorage.getItem('searchFilterVisible') === 'true';
    
        if (statsVisible) {
            statsContainer.classList.remove('hidden');
            icon.classList.remove('fa-chart-bar');
            icon.classList.add('fa-chart-line');
            icon.classList.remove('text-blue-600', 'dark:text-blue-400');
            icon.classList.add('text-blue-700', 'dark:text-blue-500');
            statsContainer.classList.add('mt-6');
            statsContainer.classList.add('animate-fade-in');
        } else {
            statsContainer.classList.add('hidden');
            toggleBtn.classList.add('pulse');
        }
    
        if (searchFilterVisible) {
            searchFilterSection.classList.remove('hidden');
            searchFilterSection.classList.add('animate-slide-down');
            searchFilterSection.classList.add('mt-6');
            searchIcon.classList.remove('fa-search');
            searchIcon.classList.add('fa-times');
            searchIcon.classList.add('text-blue-700', 'dark:text-blue-500');
        } else {
            searchFilterSection.classList.add('hidden');
        }
    
        toggleBtn.addEventListener('click', function() {
            statsContainer.classList.toggle('hidden');
            toggleBtn.classList.toggle('pulse');
            
            const isVisible = !statsContainer.classList.contains('hidden');
            localStorage.setItem('statsVisible', isVisible);
            
            if (statsContainer.classList.contains('hidden')) {
                icon.classList.remove('fa-chart-line');
                icon.classList.add('fa-chart-bar');
                icon.classList.remove('text-blue-700', 'dark:text-blue-500');
                icon.classList.add('text-blue-600', 'dark:text-blue-400');
                statsContainer.classList.remove('mt-6');
            } else {
                icon.classList.remove('fa-chart-bar');
                icon.classList.add('fa-chart-line');
                icon.classList.remove('text-blue-600', 'dark:text-blue-400');
                icon.classList.add('text-blue-700', 'dark:text-blue-500');
                statsContainer.classList.add('mt-6');
            }
            
            if (!statsContainer.classList.contains('hidden')) {
                statsContainer.classList.add('animate-fade-in');
            }
        });
    
        searchFilterToggle.addEventListener('click', function() {
            searchFilterSection.classList.toggle('hidden');
            
            const isVisible = !searchFilterSection.classList.contains('hidden');
            localStorage.setItem('searchFilterVisible', isVisible);
            
            if (!searchFilterSection.classList.contains('hidden')) {
                searchFilterSection.classList.add('animate-slide-down');
                searchFilterSection.classList.add('mt-6');
                searchIcon.classList.remove('fa-search');
                searchIcon.classList.add('fa-times');
                searchIcon.classList.add('text-blue-700', 'dark:text-blue-500');
            } else {
                searchFilterSection.classList.remove('animate-slide-down');
                searchFilterSection.classList.remove('mt-6');
                searchIcon.classList.remove('fa-times');
                searchIcon.classList.add('fa-search');
                searchIcon.classList.remove('text-blue-700', 'dark:text-blue-500');
                searchIcon.classList.add('text-blue-600', 'dark:text-blue-400');
            }
    
            if (!statsContainer.classList.contains('hidden')) {
                statsContainer.classList.add('mt-6');
            }
        });
    });
    </script>
    
    <style>
        .tippy-box[data-theme~='custom'] {
            background-color: #1a365d;
            color: white;
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .tippy-box[data-theme~='custom'][data-placement^='top'] > .tippy-arrow::before {
            border-top-color: #1a365d;
        }
        
        .tippy-box[data-theme~='custom'][data-placement^='bottom'] > .tippy-arrow::before {
            border-bottom-color: #1a365d;
        }
        
        @keyframes tooltipScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .tippy-box[data-animation='scale'] {
            animation: tooltipScale 0.3s ease-out;
        }
        
        .animate-slide-down {
            animation: slideDown 0.3s ease-out forwards;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }
        
        #toggleStatsBtn.pulse {
            animation: pulse 2s infinite;
        }
        
        .fas {
            transition: transform 0.3s ease;
        }
        
        #searchFilterToggle:hover .fas,
        #toggleStatsBtn:hover .fas {
            transform: scale(1.1);
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
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        
        #searchFilterToggle, #toggleStatsBtn {
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.8);
        }
        
        #searchFilterToggle::after, #toggleStatsBtn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.4) 10%, transparent 10.01%);
            background-repeat: no-repeat;
            background-position: 50%;
            transform: scale(10, 10);
            opacity: 0;
            transition: transform .5s, opacity 1s;
        }
        
        #searchFilterToggle:active::after, #toggleStatsBtn:active::after {
            transform: scale(0, 0);
            opacity: .3;
            transition: 0s;
        }
        
        .dark #searchFilterToggle, .dark #toggleStatsBtn {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .dark #searchFilterToggle:hover, .dark #toggleStatsBtn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .dark .tippy-box[data-theme~='custom'] {
            background-color: #2d3748;
            color: #e2e8f0;
        }
        
        .dark .tippy-box[data-theme~='custom'][data-placement^='bottom'] > .tippy-arrow::before {
            border-bottom-color: #2d3748;
        }
        
        .dark .tippy-box[data-theme~='custom'][data-placement^='top'] > .tippy-arrow::before {
            border-top-color: #2d3748;
        }
        
        @media (max-width: 640px) {
            #searchFilterToggle span {
                display: none;
            }
            
            #searchFilterToggle, #toggleStatsBtn {
                padding: 0.75rem;
            }
            
            .flex.items-center.space-x-4 {
                space-x: 2;
            }
        }
        
        #searchFilterToggle:focus, #toggleStatsBtn:focus {
            outline: none;
            ring: 4px;
            ring-color: rgba(246, 173, 85, 0.5);
            border-color: rgb(246, 173, 85);
        }
        
        .fa-times {
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }
        
        .fa-times.rotate {
            transform: rotate(180deg);
        }
    
        #searchFilterToggle, #toggleStatsBtn {
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.8);
        }
        
        .dark #searchFilterToggle, .dark #toggleStatsBtn {
            background-color: rgb(31, 41, 55); 
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .dark #searchFilterToggle:hover, .dark #toggleStatsBtn:hover {
            background-color: rgb(55, 65, 81);
        }
        
        .dark #searchFilterToggle i, .dark #toggleStatsBtn i {
            color: rgb(96, 165, 250); 
        }
        
        .dark #searchFilterToggle span {
            color: rgb(96, 165, 250); 
        }
        
        .dark #toggleStatsBtn.pulse {
            animation: darkPulse 2s infinite;
        }
        
        @keyframes darkPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(96, 165, 250, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(96, 165, 250, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(96, 165, 250, 0);
            }
        }

    </style>



    <!-- Cards Section -->
        <div class="px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6 transition-all duration-300">
                    <!-- Available Jobs Card -->
                    <a href="#job-listing"
                        class="block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="{{ $jobs->total() }} {{ __('messages.userdashboard.current_opportunities') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 p-4">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-bold text-white">{{ __('messages.userdashboard.available_jobs') }}
                                    </h3>
                                    <i class="fas fa-briefcase text-3xl text-white opacity-75"></i>
                                </div>
                            </div>
                            <div class="p-4"
                                aria-label="{{ $jobs->total() }} {{ __('messages.userdashboard.current_opportunities') }}">
                                <div class="flex items-center justify-between">
                                    <span class="text-4xl font-bold text-blue-600 dark:text-blue-300">
                                        {{ $jobs->total() }}
                                    </span>
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-300">{{ __('messages.userdashboard.total_jobs') }}</span>
                                </div>
                                <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ __('messages.userdashboard.current_opportunities') }}
                                </p>
                            </div>
                        </div>
                    </a>

            <!-- Active Applications Card -->
            <a href="#" class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                aria-label="{{ $activeApplicationsCount ?? 0 }} {{ __('messages.userdashboard.ongoing_applications') }}">
                <div class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300"
                    id="active-applications"aria-label="{{ $activeApplicationsCount ?? 0 }} {{ __('messages.userdashboard.ongoing_applications') }}">
                    <div
                        class="bg-gradient-to-r from-yellow-500 to-yellow-700 dark:from-green-600 dark:to-green-800 p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white">
                                {{ __('messages.userdashboard.active_applications') }}</h3>
                            <i class="fas fa-paper-plane text-3xl text-white opacity-75"></i>
                        </div>
                    </div>
                    <div class="p-4"
                        aria-label="{{ $activeApplicationsCount ?? 0 }} {{ __('messages.userdashboard.ongoing_applications') }}">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-yellow-600 dark:text-yellow-400">
                                {{ $activeApplicationsCount ?? 0 }}
                            </span>
                            <span
                                class="text-sm text-gray-500 dark:text-gray-300">{{ __('messages.userdashboard.applied_jobs') }}</span>
                        </div>
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ __('messages.userdashboard.ongoing_applications') }}
                        </p>
                    </div>
                </div>
            </a>


            <!-- JavaScript for Modal -->
            <script>
                // Function to show the modal
                function showModal() {
                    var modal = document.getElementById('medium-modal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }

                // Function to hide the modal
                function hideModal() {
                    var modal = document.getElementById('medium-modal');
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }

                // Add event listener to the card that triggers the modal
                document.getElementById('active-applications').addEventListener('click', function() {
                    showModal();
                    filterItems('hired');
                });

                // Add event listener to close button within modal
                document.querySelector('[data-modal-hide="medium-modal"]').addEventListener('click', function() {
                    hideModal();
                });
            </script>

            <!-- Saved Jobs Card -->
            <a href="{{ route('savedjobs') }}"
                class="block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                aria-label="{{ $savedJobCount ?? 0 }} {{ __('messages.userdashboard.saved_jobs') }}">
                <div
                    class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                    <div
                        class="bg-gradient-to-r from-green-500 to-green-700 dark:from-yellow-600 dark:to-yellow-800 p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white">{{ __('messages.userdashboard.saved_jobs') }}</h3>
                            <i class="fas fa-bookmark text-3xl text-white opacity-75"></i>
                        </div>
                    </div>
                    <div class="p-4"
                        aria-label="{{ $savedJobCount ?? 0 }}  {{ __('messages.userdashboard.saved_for_later') }}">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-green-600 dark:text-green-400">
                                {{ $savedJobCount ?? 0 }}
                            </span>
                            <span
                                class="text-sm text-gray-500 dark:text-gray-300">{{ __('messages.userdashboard.bookmarked') }}</span>
                        </div>
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ __('messages.userdashboard.saved_for_later') }}
                        </p>
                    </div>
                </div>
            </a>
            <div class="relative">
                <button id="toggleButton"
                    class="w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="{{ $interviewCount ?? 0 }} {{ __('messages.userdashboard.upcoming_interviews_description') }}">
                    <div
                        class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <div
                            class="bg-gradient-to-r from-purple-500 to-purple-700 dark:from-purple-600 dark:to-purple-800 p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-white">
                                    {{ __('messages.userdashboard.upcoming_interviews') }}</h3>
                                <i class="fas fa-calendar-check text-3xl text-white opacity-75"></i>
                            </div>
                        </div>
                        <div class="p-4"
                            aria-label="{{ $interviewCount ?? 0 }} {{ __('messages.userdashboard.upcoming_interviews_description') }}">
                            <div class="flex items-center justify-between">
                                <span class="text-4xl font-bold text-purple-600 dark:text-gray-200">
                                    {{ $interviewCount ?? 0 }}
                                </span>
                                <span
                                    class="text-sm text-gray-500 dark:text-gray-300">{{ __('messages.userdashboard.scheduled') }}</span>
                            </div>
                            <p class="mt-4 text-sm text-left text-gray-600 dark:text-gray-300">
                                {{ __('messages.userdashboard.upcoming_interviews_description') }}
                            </p>
                        </div>
                    </div>
                </button>

                <div id="notificationInterviewDrawer"
                    class="fixed inset-0 flex justify-start bg-black bg-opacity-50 z-50 hidden transition-opacity"
                    style="opacity: 0;">
                    <div
                        class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-gray-100 text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg overflow-y-auto">
                        <div class="p-4 h-full overflow-y-auto">
                            <div class="p-2 bg-blue-700 w-full text-black dark:bg-gray-700 dark:text-gray-200 text-center cursor-pointer"
                                id="closeInterviewButton">
                                <span
                                    class="text-sm text-white dark:text-gray-200 hover:text-gray-200 focus:outline-none">
                                    Close
                                </span>
                            </div>

                            <form method="POST" action="{{ route('applications.markAllAsRead') }}">
                                @csrf
                                <button type="submit"
                                    class="text-sm mt-3 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                                    <i class="fas fa-check-circle mr-1"></i> Mark All as Read
                                </button>
                            </form>

                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Interview Schedules
                            </h3>
                            @php
                                $pendingInterviews = Auth::user()
                                    ->interviews->where('status', 'pending')
                                    ->sortByDesc('created_at');
                            @endphp
                            <ul class="mt-4 h-full overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                @foreach ($pendingInterviews as $interview)
                                    @php
                                        $companyName = $interview->jobApplication->company_name ?? 'N/A';
                                        $title = $interview->jobApplication->title ?? 'N/A';
                                    @endphp
                                    <li
                                        class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                        <div class="flex items-center space-x-3">
                                            <div class="rounded-full bg-yellow-500 h-4 w-4"></div>
                                            <div class="text-md text-gray-700 dark:text-gray-200 break-all max-w-xs">
                                                Interview Scheduled from the {{ $title }} Application in
                                                {{ $companyName }}.
                                            </div>
                                        </div>
                                        <div>
                                            <form action="{{ route('show.remarks') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="remarks" value="{{ $interview->remarks }}">
                                                <input type="hidden" name="company_name"
                                                    value="{{ $interview->jobApplication->company_name }}">
                                                <button type="submit"
                                                    class=" text-blue-400 font-bold hover:text-blue-500 focus:outline-none">
                                                    View
                                                </button>
                                            </form>
                                            <span class="block text-gray-700 dark:text-gray-400 mt-1"
                                                style="font-size: 1rem;">
                                                {{ $interview->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
         </div>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const toggleButton = document.getElementById('toggleButton');
                    const notificationDrawer = document.getElementById('notificationInterviewDrawer');
                    const closeButton = document.getElementById('closeInterviewButton');

                    toggleButton.addEventListener('click', function() {
                        notificationDrawer.classList.toggle('hidden');
                        if (notificationDrawer.classList.contains('hidden')) {
                            notificationDrawer.style.opacity = '0';
                        } else {
                            notificationDrawer.style.opacity = '1';
                            notificationDrawer.classList.remove('hidden');
                        }
                    });

                    closeButton.addEventListener('click', function() {
                        notificationDrawer.classList.add('hidden');
                        notificationDrawer.style.opacity = '0';
                    });
                });
            </script>
        </div>

<div>
    <div>
        <div class="text-gray-900 dark:text-gray-100">
            <div class="max-w-full mx-auto">
                <form action="{{ route('jobs.search') }}" method="GET" class="search-filter-section max-w-8xl mx-auto mb-0 mt-6"> <!-- Added mt-6 -->

                            @csrf
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg mx-1 sm:mx-2 md:mx-3 lg:mx-4">
                                <div
                                    class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg shadow-lg mb-4">
                                    <div class="flex flex-col sm:flex-row justify-between items-center">
                                        <h3 class="text-white text-2xl font-semibold flex items-center mb-2 sm:mb-0 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label=" {{ __('messages.userdashboard.search_and_filter') }}">
                                            <i class="fas fa-search mr-2"></i>
                                            <!-- Font Awesome search icon with margin -->
                                            {{ __('messages.userdashboard.search_and_filter') }}
                                        </h3>
                                        <a href="{{ route('dashboard.resumeupload') }}"
                                            class="bg-white text-blue-600 rounded-md px-4 py-2 font-semibold hover:bg-blue-100 transition duration-300 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label=" {{ __('messages.userdashboard.upload_resume') }}">
                                            <i class="fas fa-upload mr-2"></i>
                                            {{ __('messages.userdashboard.upload_resume') }}
                                        </a>
                                    </div>

                                </div>
                                <div class="flex p-6">
                                    <div class="container mx-auto  flex flex-col w-full">
                                        <div class="mb-4">

                                            <p class="flex items-center text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0"
                                                aria-label="{{ __('messages.userdashboard.search_placeholder') }}">
                                                <i class="fas fa-user mr-2"></i>
                                                {{ __('messages.userdashboard.search_placeholder') }}
                                            </p>

                                        </div>
                                        <!-- Filters and Search Inputs -->
                                        <div
                                            class="flex flex-col sm:flex-row items-center justify-between w-full mb-4">
                                            <!-- Dropdown Filter -->
                                            <div class="relative mb-4 sm:mb-0 sm:mr-4 w-full sm:w-auto">
                                                <label for="custom_recency_filter"
                                                    class="sr-only">{{ __('messages.userdashboard.filter_by_date') }}</label>
                                                <div class="relative">
                                                    <select id="custom_recency_filter" name="custom_recency_filter"
                                                        class="w-full sm:w-56 flex items-center justify-center px-4 py-2 sm:px-6 sm:py-3 bg-white dark:bg-gray-800 text-gray-600 dark:text-white 
                                                            border-2 border-gray-500 dark:border-gray-600 rounded-lg 
                                                            hover:bg-blue-100 dark:hover:bg-gray-700 transition-colors duration-300 
                                                            focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400
                                                            focus:ring-opacity-50 shadow-md hover:shadow-lg font-semibold appearance-none"
                                                        aria-label="{{ __('messages.userdashboard.filter_by_date') }}">

                                                        <option value="All"
                                                            class="option-item bg-white dark:bg-gray-800">
                                                            {{ __('messages.userdashboard.All') }}
                                                        </option>
                                                        <option value="last-24-hours"
                                                            aria-label="{{ __('messages.userdashboard.last_24_hours') }}"
                                                            class="option-item bg-white dark:bg-gray-800">
                                                            {{ __('messages.userdashboard.last_24_hours') }}
                                                        </option>
                                                        <option value="last-7-days"
                                                            aria-label="{{ __('messages.userdashboard.last_7_days') }}"
                                                            class="option-item bg-white dark:bg-gray-800">
                                                            {{ __('messages.userdashboard.last_7_days') }}
                                                        </option>
                                                        <option value="last-30-days"
                                                            aria-label="{{ __('messages.userdashboard.last_30_days') }}"
                                                            class=" option-item bg-white dark:bg-gray-800">
                                                            {{ __('messages.userdashboard.last_30_days') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Search Input -->
                                            <div class="w-full sm:flex sm:items-center sm:space-x-2">
                                                <input type="search" id="search-dropdown" name="query"
                                                    class="w-full px-4 py-3 bg-white dark:bg-gray-800 text-black dark:text-white border-2 border-blue-black dark:border-blue-500 rounded-lg hover:bg-blue-100 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400  focus:ring-opacity-50 shadow-md hover:shadow-lg font-semibold"
                                                    placeholder="{{ __('messages.userdashboard.job_search_placeholder') }}"
                                                    aria-label="{{ __('messages.userdashboard.job_search_placeholder') }}" />

                                                <!-- Search Button -->
                                                <button type="submit" aria-label="Search Button"
                                                    class="mt-2 sm:mt-0 flex items-center justify-center w-full sm:w-auto px-4 py-4 bg-blue-700 dark:bg-blue-700 text-white dark:text-white border-2 border-blue-700 dark:border-blue-500 rounded-lg hover:text-blue-700 hover:bg-blue-100 dark:hover:bg-gray-800 dark:hover:text-white transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-50 shadow-md hover:shadow-lg font-semibold">
                                                    <div class="flex justify-center items-center">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                        </svg>
                                                    </div>
                                                    <span class="sr-only">Search</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="flex items-center w-full">
                                            <button id="toggleFilters" aria-label="Toggle Advanced Filters"
                                                class="w-full flex items-center justify-center px-4 py-3 bg-white dark:bg-gray-800 text-blue-600 dark:text-white border-2 border-blue-600 dark:border-blue-500 rounded-lg hover:bg-blue-100 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-50 shadow-md hover:shadow-lg font-semibold">
                                                <i class="fa-solid fa-filter mr-2"></i>
                                                <span class="text-md font-regular">Advanced Filters</span>
                                                <svg id="toggleIcon" class="w-6 h-6 ml-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="p-6">
                        <div id="filterContainer"
                            class="hidden overflow-hidden max-h-screen shadow-lg mt-4 bg-white dark:bg-gray-700 rounded-lg transition-all duration-500 ease-in-out"
                            aria-hidden="true">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5">
                                <div class="mt-2">
                                    <label for="job-type"
                                        class="block font-medium text-gray-900 dark:text-gray-200 mb-2">
                                        <i class="fas fa-briefcase mr-2" aria-hidden="true"></i>
                                        <!-- Briefcase Icon -->
                                        {{ __('messages.userdashboard.job_type') }}
                                    </label>

                                    <div class="relative mt-2">
                                        <select id="job-type" name="job_type"
                                            aria-label="{{ __('messages.userdashboard.job_type') }}"
                                            class="mt-1 block w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-md">
                                            <option value="">All</option>
                                            <option value="full-time">Full-time / Permanent</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="contract">Contractual</option>
                                            <option value="probationary">Probationary</option>
                                            <option value="casual">Casual</option>
                                            <option value="seasonal">Seasonal</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <span class="text-gray-400">&#x25BC;</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label for="location" class="block font-medium text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-map-marker-alt mr-2" aria-hidden="true"></i>
                                        <!-- Location Icon -->
                                        {{ __('messages.userdashboard.location') }}
                                    </label>

                                    <input type="text" id="location"
                                        name="{{ __('messages.userdashboard.location') }}"
                                        class="mt-1 block w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                        placeholder="Enter location"
                                        aria-label="{{ __('messages.userdashboard.location') }}">
                                </div>

                                <div class="mb-2">
                                    <label for="min-salary"
                                        class="block font-medium text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-dollar-sign mr-2" aria-hidden="true"></i>
                                        <!-- Dollar Sign Icon -->
                                        Minimum Salary
                                    </label>
                                    <input type="number" id="min-salary" name="min_salary"
                                        class="mt-1 block w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                        placeholder="Enter minimum salary" aria-label="Minimum Salary">
                                </div>

                                <div class="mb-2">
                                    <label for="max-salary"
                                        class="block font-medium text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-dollar-sign mr-2" aria-hidden="true"></i>
                                        <!-- Dollar Sign Icon -->
                                        Maximum Salary
                                    </label>
                                    <input type="number" id="max-salary" name="max_salary"
                                        class="mt-1 block w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                        placeholder="Enter maximum salary" aria-label="Maximum Salary">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const toggleButton = document.getElementById('toggleFilters');
                            const filterContainer = document.getElementById('filterContainer');
                            const toggleIcon = document.getElementById('toggleIcon');

                            if (toggleButton && filterContainer && toggleIcon) {
                                toggleButton.addEventListener('click', function(event) {
                                    event.preventDefault();

                                    // Toggle visibility of filter container
                                    filterContainer.classList.toggle('hidden');
                                    filterContainer.classList.toggle('max-h-screen');
                                    filterContainer.setAttribute('aria-hidden', filterContainer.classList.contains(
                                        'hidden'));

                                    // Toggle arrow icon direction
                                    toggleIcon.classList.toggle('transform', filterContainer.classList.contains('hidden'));
                                    toggleIcon.classList.toggle('rotate-180', !filterContainer.classList.contains(
                                        'hidden'));
                                });
                            } else {
                                console.error('One or more required elements not found.');
                            }
                        });
                    </script>
                    </form>
                </div>

                <div id="availableJobsSection" class="transition-all duration-300 px-6"> 
                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 dark:from-blue-700 dark:to-blue-600 p-4 rounded-lg shadow-md mb-4">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between" id="job-listing">
                            <!-- Left Side: Title and Results in Column -->
                            <div class="flex flex-col space-y-2">
                                <a href="" class="text-lg sm:text-xl text-white font-bold hover:underline focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                                    aria-label="{{ __('messages.userdashboard.available_pwd_jobs') }}">
                                    <i class="fas fa-briefcase text-base sm:text-lg mr-2" aria-hidden="true"></i>
                                    {{ __('messages.userdashboard.available_pwd_jobs') }}
                                </a>
                
                                <div class="text-white text-sm">
                                    @php
                                        $numberOfResults = $jobs->total();
                                    @endphp
                
                                    @if ($numberOfResults > 0)
                                        <span class="font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}"
                                            tabindex="0">
                                            <i class="fas fa-check-circle mr-1" aria-hidden="true"></i>
                                            {{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}
                                        </span>
                                    @else
                                        <span aria-label="{{ __('messages.userdashboard.no_results_found') }}"
                                            class="font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0">
                                            <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                            {{ __('messages.userdashboard.no_results_found') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                
                            <!-- Right Side: Change Job Preferences Button -->
                            <button id="openModalLink"
                                class="flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-800 text-blue-600 dark:text-white border-2 border-white dark:border-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-gray-700 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-50 shadow-md hover:shadow-lg font-medium group mt-4 sm:mt-0"
                                aria-label="{{ __('messages.userdashboard.change_jobpreferences') }}">
                                <i class="fas fa-cog mr-2 group-hover:rotate-90 transition-transform duration-300" aria-hidden="true"></i>
                                <span class="text-sm">{{ __('messages.userdashboard.change_jobpreferences') }}</span>
                            </button>
                        </div>
                    </div>


                    <!-- Modal code remains the same -->
                    <div id="jobPreferencesModal"
                        class="fixed inset-0 z-50 p-4 overflow-auto bg-black bg-opacity-50 flex justify-center items-center hidden">
                        <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 w-full max-w-lg  rounded-lg shadow-xl"
                            style="max-height: 90vh; overflow-y: auto;">
                            <div
                                class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-purple-700 dark:to-blue-800 p-5 rounded-t-lg  border-b-4 border-blue-700 ">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-2xl font-semibold text-white flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                                        tabindex="0"
                                        aria-label=" {{ __('messages.userdashboard.change_jobpreferences') }}">
                                        {{ __('messages.userdashboard.change_jobpreferences') }}
                                    </h3>
                                    <button id="closeModalBtn"
                                        class="text-gray-200 hover:text-gray-300  dark:hover:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                                        aria-label="0" aria-label="{{ __('messages.userdashboard.close') }}">
                                        <i class="fas fa-times fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 p-6">
                                @include('profile.sections.jobpreferences')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const openModalLink = document.getElementById('openModalLink');
                    const closeModalBtn = document.getElementById('closeModalBtn');
                    const jobPreferencesModal = document.getElementById('jobPreferencesModal');

                    openModalLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        jobPreferencesModal.classList.remove('hidden');
                    });

                    closeModalBtn.addEventListener('click', function() {
                        jobPreferencesModal.classList.add('hidden');
                    });
                });
            </script>


<!-- Job Listings Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 pt-2">
    @foreach ($jobs as $job)
        @if ($job->vacancy > 0)
            <div tabindex="0" class="bg-white dark:bg-gray-700 job-card rounded-lg shadow-3d transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 overflow-hidden border-2 border-blue-500 dark:border-blue-400 hover:border-blue-600 dark:hover:border-blue-500 transform hover:-translate-y-1 hover:shadow-xl">
                <!-- Header Section with Gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 p-4 sm:p-6 relative" aria-label="Job Number {{ $job->id }}">
                    <!-- Company Logo Centered -->
                    <div class="flex flex-col items-center">
                        @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                            <img src="{{ asset('storage/' . $job->company_logo) }}" 
                                 alt="Company Logo"
                                 aria-label="Company Logo"
                                 onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}'"
                                 onclick="openLogoModal(this.src)"
                                 class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full shadow-lg object-contain bg-white dark:bg-gray-700 p-1 transition-transform duration-300 hover:scale-105 cursor-pointer mb-4"
                                 tabindex="0"
                                 onkeypress="if(event.key === 'Enter') openLogoModal(this.src)">
                        @else
                            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white dark:bg-gray-700 flex items-center justify-center shadow-lg transition-transform duration-300 hover:scale-105 mb-4">
                                <i class="fas fa-building text-2xl sm:text-3xl md:text-4xl text-blue-500 dark:text-blue-400"
                                   aria-label="Empty Company Logo"></i>
                            </div>
                        @endif

                        <!-- Job Title and Company Name Container -->
                        <div class="text-center flex flex-col space-y-2 w-full px-4">
                            <!-- Job Title -->
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-white inline-flex items-center justify-center group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 break-words"
                                aria-label="{{ $job->title }}" 
                                tabindex="0">
                                <span class="hover:text-blue-100 transition-colors duration-300 line-clamp-2">{{ $job->title }}</span>
                            </h3>
                            
                            <!-- Company Name -->
                            <p class="text-sm sm:text-base md:text-lg text-blue-100 inline-flex items-center justify-center group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 break-words"
                                tabindex="0" 
                                aria-label="Company: {{ $job->company_name }}">
                                <span class="hover:text-white transition-colors duration-300 line-clamp-2">{{ $job->company_name }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 dark:bg-blue-500"></div>
                </div>

            
            <style>
                /* Custom shadow and card styles */
                .shadow-3d {
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2),
                               0px 6px 20px rgba(0, 0, 0, 0.1);
                    transition: all 0.3s ease;
                }
            
                /* Text truncation */
                .line-clamp-2 {
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            
                /* Responsive text adjustments */
                @media (max-width: 350px) {
                    .text-base {
                        font-size: 0.875rem;
                    }
                    .text-sm {
                        font-size: 0.75rem;
                    }
                }
            
                /* Animation for cards */
                @keyframes fadeInUp {
                    0% {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            
                .job-card {
                    animation: fadeInUp 0.5s ease forwards;
                    opacity: 0;
                    transform: translateY(20px);
                    backface-visibility: hidden;
                }
            
                /* Hover effects */
                .job-card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                }
            
                /* Ensure icons stay aligned */
                .min-w-[1.5rem] {
                    min-width: 1.5rem;
                }
            
                /* Text wrapping */
                .break-words {
                    word-wrap: break-word;
                    word-break: break-word;
                }
            </style>
            
                            <!-- Job Details Section -->
                            <div class="p-3">
                                <div class="space-y-3">
                                    <!-- Date Posted -->
                                    <div class="p-3 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300 rounded-lg">
                                        <p class="flex flex-wrap items-center text-md text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.userdashboard.date_posted') }} {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}">
                                            <i class="far fa-calendar-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                            <span class="font-semibold">{{ __('messages.userdashboard.date_posted') }}</span>
                                            <span class="ml-1">{{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}</span>
                                        </p>
                                    </div>
                            
                                    <!-- Educational Level -->
                                    <div class="p-3 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300 rounded-lg">
                                        <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}">
                                            <i class="fas fa-graduation-cap text-blue-400 dark:text-blue-300 mr-2"></i>
                                            <span class="font-semibold">{{ __('messages.userdashboard.educational_level') }}</span>
                                            <span class="ml-1">{{ $job->educational_level }}</span>
                                        </p>
                                    </div>
                            
                                    <!-- Location -->
                                    <div class="p-3 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300 rounded-lg">
                                        <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.userdashboard.location') }} {{ $job->location }}">
                                            <i class="fas fa-map-marker-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                            <span class="font-semibold">{{ __('messages.userdashboard.location') }}</span>
                                            <span class="ml-1">{{ $job->location }}</span>
                                        </p>
                                    </div>
                            
                                    <!-- Job Type -->
                                    <div class="p-3 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300 rounded-lg">
                                        <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.userdashboard.job_type') }} {{ $job->job_type }}">
                                            <i class="fas fa-briefcase text-blue-400 dark:text-blue-300 mr-2"></i>
                                            <span class="font-semibold">{{ __('messages.userdashboard.job_type') }}</span>
                                            <span class="ml-1">{{ $job->job_type }}</span>
                                        </p>
                                    </div>
            
                                <!-- Salary -->
                                <div class="p-3 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-300 rounded-lg">
                                    <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0"
                                        aria-label="{{ __('messages.userdashboard.salary') }} {{ number_format($job->salary, 2) }} Pesos">
                                        <i class="fas fa-money-bill-wave text-blue-400 dark:text-blue-300 mr-2"></i>
                                        <span class="font-semibold">{{ __('messages.userdashboard.salary') }}</span>
                                        <span class="ml-1">₱{{ number_format($job->salary, 2) }} / Month</span>
                                    </p>
                                </div>
                    
            
                               <!--   <div class="p-3">
                                    <div class="text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{{ __('messages.userdashboard.job_description') }} {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}"
                                        tabindex="0">
                                        <p class="font-semibold mb-1 flex items-center">
                                            <i class="fas fa-file-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                            {{ __('messages.userdashboard.job_description') }}
                                        </p>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                        </p>
                                        <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                            class="text-blue-600 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 inline-flex items-center mt-2 transition-colors duration-300"
                                            aria-label="{{ __('messages.userdashboard.read_more') }}"
                                            tabindex="0">
                                            {{ __('messages.userdashboard.read_more') }}
                                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                        </a>
                                    </div>
                                </div> -->
                                
                                </div>
            
                                <!-- View Details Button -->
                                <div class="mt-6 text-center">
                                    <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white rounded-full hover:bg-blue-700 dark:hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90 shadow-lg hover:shadow-xl"
                                        aria-label="{{ __('messages.job.view_details') }} for Job Number {{ $job->id }}">
                                        <span class="mr-2">{{ __('messages.job.view_details') }}</span>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Modal for company logo -->
            <div id="logoModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                <div class="relative bg-white dark:bg-gray-800 p-2 rounded-lg max-w-2xl w-full mx-4 transform transition-all duration-300">
                    <button onclick="closeLogoModal()" 
                            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                    <div class="flex items-center justify-center p-4">
                        <img id="modalLogo" src="" alt="Company Logo" class="max-w-full max-h-[80vh] object-contain">
                    </div>
                </div>
            </div>
            
            <!-- JavaScript for Modal -->
            <script>
            function openLogoModal(imageUrl) {
                const modal = document.getElementById('logoModal');
                const modalImg = document.getElementById('modalLogo');
                
                modalImg.src = imageUrl;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            function closeLogoModal() {
                const modal = document.getElementById('logoModal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            
            // Close modal when clicking outside
            document.getElementById('logoModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeLogoModal();
                }
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeLogoModal();
                }
            });
            </script>
            <style>
                .shadow-3d {
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2),
                               0px 6px 20px rgba(0, 0, 0, 0.1);
                    transition: all 0.3s ease;
                }
            
                @keyframes fadeInUp {
                    0% {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            
                .job-card {
                    animation: fadeInUp 0.5s ease forwards;
                    opacity: 0;
                    transform: translateY(20px);
                    backface-visibility: hidden;
                }
            
                @media (max-width: 768px) {
                    .job-card {
                        margin-bottom: 1rem;
                    }
                }
            
                .job-card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                }
            
                .dark .job-card {
                    background: rgba(55, 65, 81, 1);
                    border-color: rgba(59, 130, 246, 0.5);
                }
            
                .dark .job-card:hover {
                    border-color: rgba(59, 130, 246, 0.8);
                }
            
                .job-card {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
            
                @media (max-width: 640px) {
                    .grid {
                        grid-template-columns: repeat(1, 1fr);
                    }
                }
            
                @media (min-width: 641px) and (max-width: 1024px) {
                    .grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
            
                @media (min-width: 1025px) {
                    .grid {
                        grid-template-columns: repeat(3, 1fr);
                    }
                }
            
                .job-card:focus {
                    outline: none;
                    ring: 4px;
                    ring-color: rgba(246, 173, 85, 0.5);
                    border-color: rgb(246, 173, 85);
                }
            
                .shadow-enhanced {
                    box-shadow: 
                        0 4px 6px -1px rgba(0, 0, 0, 0.1),
                        0 2px 4px -1px rgba(0, 0, 0, 0.06),
                        0 0 0 2px rgba(59, 130, 246, 0.1);
                }
            
                .border-gradient {
                    position: relative;
                }
            
                .border-gradient::before {
                    content: '';
                    position: absolute;
                    top: -2px;
                    right: -2px;
                    bottom: -2px;
                    left: -2px;
                    background: linear-gradient(45deg, #3b82f6, #60a5fa);
                    border-radius: 0.5rem;
                    z-index: -1;
                }
            
                /* Pulse animation for new jobs */
                @keyframes pulse {
                    0% {
                        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
                    }
                    70% {
                        box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
                    }
                    100% {
                        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
                    }
                }
            
                .new-job {
                    animation: pulse 2s infinite;
                }
            
                /* Modal animations */
                @keyframes modalFadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0.95);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }
            
                #logoModal .relative {
                    animation: modalFadeIn 0.3s ease-out;
                }
            </style>
            
            <!-- Empty state message if no jobs found -->
            @if ($jobs->isEmpty())
                <div class="col-span-full">
                    <div class="w-full text-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg border-2 border-blue-500 dark:border-blue-400">
                        <div class="flex flex-col items-center justify-center space-y-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="No Jobs Found" tabindex="0">
                            <i class="fas fa-search text-blue-400 dark:text-blue-300 text-5xl mb-2"></i>
                            <h2 class="text-gray-800 dark:text-gray-200 text-2xl font-bold">
                                No Jobs Found
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400 text-lg max-w-md mx-auto">
                                We couldn't find any jobs matching your criteria. Try adjusting your search filters!
                            </p>
                            <button onclick="clearSearchAndReload()"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-full font-semibold text-sm text-white uppercase tracking-wider hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-300 disabled:opacity-25 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-redo-alt mr-2"></i>
                                View All Jobs
                            </button>
                        </div>
                    </div>
                </div>
            @endif

        <script>
            // Function to clear search and reload
            function clearSearchAndReload() {
                window.location.href = '{{ route("dashboard") }}';
            }
        
            // Add animation classes to job cards on load
            document.addEventListener('DOMContentLoaded', function() {
                const jobCards = document.querySelectorAll('.job-card');
                jobCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            });
        </script>



            <script>
                function clearSearchAndReload() {
                    // Get the current URL
                    var currentUrl = window.location.href;

                    // Remove everything after the '?' in the URL
                    var baseUrl = currentUrl.split('?')[0];

                    // Redirect to the base URL, effectively clearing all search parameters
                    window.location.href = baseUrl;
                }
            </script>




            <div class="mt-6 p-6">
                <nav class="flex flex-col sm:flex-row justify-between items-center">
                    @if ($jobs->onFirstPage())
                        <span aria-label="{{ __('messages.job.Previous') }}"
                            class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ __('messages.job.Previous') }}
                        </span>
                    @else
                        <a href="{{ $jobs->previousPageUrl() }}" tabindex="0"
                            aria-label="{{ __('messages.job.Previous') }}"
                            class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ __('messages.job.Previous') }}
                        </a>
                    @endif

                    <div class="flex space-x-2">
                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                aria-label="{{ __('messages.job.Page Number') }} {{ $page }}"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-700 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                {{ $page }}
                            </a>
                        @endforeach
                    </div>

                    @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}" aria-label="{{ __('messages.job.Next') }}"
                            class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ __('messages.job.Next') }}
                        </a>
                    @else
                        <span aria-label="{{ __('messages.job.Next') }}" tabindex="0"
                            aria-label=" {{ __('messages.job.Next') }}"
                            class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ __('messages.job.Next') }}
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>

@if (Session::has('preferences'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('preferences') }}", 'Job Preferences Modified Successfully!', {
                timeOut: 5000
            });

        });
    </script>
@endif



<style>
    /* Custom shadow class for 3D effect */
    .shadow-3d {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .job-card {
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s ease forwards;
    }
    
    .shadow-custom {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.shadow-custom-hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.job-card {
    animation: fadeInUp 0.5s ease forwards;
    opacity: 0;
    transform: translateY(20px);
    backface-visibility: hidden;
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Add hover effects */
.job-card:hover {
    transform: translateY(-4px);
}

/* Smooth transitions */
.job-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

</style>


<div id="medium-modal" tabindex="-1"
    class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black bg-opacity-75">
    <div class="relative w-full max-w-4xl overflow-x-hidden overflow-y-auto max-h-[90vh]">
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between  dark:border-gray-600">
                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 border-b-4 border-blue-500 rounded-t-lg mb-4 w-full flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-briefcase text-2xl text-white mr-2"></i>
                        <h3 class="text-2xl font-semibold text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            tabindex="0" aria-label=" {{ __('messages.userdashboard.my_job_applications') }}">
                            {{ __('messages.userdashboard.my_job_applications') }}
                        </h3>
                    </div>
                    <button type="button" onclick="hideModal()" aria-label="hide modal"
                        class="text-white hover:text-gray-700 dark:hover:text-gray-300 ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            @if ($applications->isEmpty())
                <div class="p-6 pb-0 space-y-6 max-h-96 overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 w-full md:p-6">
                            <p class="text-center text-gray-600 dark:text-gray-400 flex items-center justify-center">
                                <i class="fas fa-sad-tear text-2xl mr-2"></i>
                                <!-- Font Awesome sad face icon -->
                                No job applications found.
                            </p>
                        </div>
                    </div>

                </div>
            @else
                <!-- Modal content -->
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        @foreach ($applications as $job)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-3d  flex flex-col job-item"
                                data-status="{{ $job->status_plain }}">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-2 rounded-t-lg mb-4">
                                    <h4 class="text-lg font-medium text-white dark:text-gray-300 text-center">
                                        Job ID: {{ $job->job_id }}
                                    </h4>
                                </div>
                                <div class="p-4 pt-0">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ strlen($job->description) > 59 ? substr($job->description, 0, 59) . '...' : $job->description }}
                                    </p>
                                    <p
                                        class="mt-4 font-bold text-lg 
                                       {{ $job->status === 'pending' ? 'text-yellow-600' : ($job->status === 'hired' ? 'text-green-600' : '') }}">
                                        {{ ucfirst($job->status) }}
                                    </p>
                                    <div class="mt-auto pt-4">
                                        <button
                                            onclick="location.href='{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id]) }}'"
                                            class="bg-blue-500 hover:bg-blue-600 text-white w-full py-2 rounded-lg transition flex items-center justify-center">
                                            <i class="fas fa-info-circle mr-4"></i>
                                            <!-- Font Awesome icon -->
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
            @endif
        </div>
    </div>

    <!-- Modal footer -->
    <div class="flex flex-col sm:flex-row justify-end p-4 border-t border-gray-300 dark:border-gray-600">
        <button onclick="filterItems('hired')"
            class="py-2 px-4 bg-green-100 hover:bg-green-200 text-green-800 rounded-lg transition mb-2 sm:mb-0 sm:mr-3 flex items-center">
            <i class="fas fa-check mr-2"></i> <!-- Hired icon -->
            Hired
        </button>
        <button onclick="filterItems('pending')"
            class="py-2 px-4 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-lg transition mb-2 sm:mb-0 sm:mr-3 flex items-center">
            <i class="fas fa-clock mr-2"></i> <!-- Pending icon -->
            Pending
        </button>
        <button onclick="filterItems('all')"
            class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition mb-2 sm:mb-0 flex items-center">
            <i class="fas fa-list mr-2"></i> <!-- Show All icon -->
            Show All
        </button>
    </div>
</div>
