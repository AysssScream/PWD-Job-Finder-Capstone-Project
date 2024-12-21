<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Trainings</title>
        <style>
            .training-card {
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.5s ease forwards;
            }
            .training-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                border: 1px solid #3B82F6;
            }
            .action-button {
                transition: all 0.2s ease;
            }
            .action-button:hover {
                transform: scale(1.05);
            }
            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .loading-indicator {
                display: none;
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
            }
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: scale(0.95); }
                to { opacity: 1; transform: scale(1); }
            }
        
            @keyframes fadeOut {
                from { opacity: 1; transform: scale(1); }
                to { opacity: 0; transform: scale(0.95); }
            }
        
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
            }
        
            .animate-fadeOut {
                animation: fadeOut 0.3s ease-in forwards;
            }

            #modalOverlay {
                transition: background-color 0.3s ease;
            }

            .dark #modalOverlay {
                background-color: rgba(17, 24, 39, 0.90); /* Darker overlay for dark mode */
            }
        </style>
    </head>

    <div class="py-8" style="padding-top: 30px; padding-bottom: 5px;">
        <div class="container mx-auto max-w-8xl px-4">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-4 md:p-6 space-y-4 md:space-y-6">
                    <!-- Breadcrumb and Title -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                        <nav aria-label="breadcrumb" class="w-full md:w-auto mb-4 md:mb-0">
                            <ol class="list-reset flex items-center space-x-2 text-sm">
                                <li>
                                    <button onclick="window.location.href='{{ route('dashboard') }}'" 
                                            class="flex items-center px-3 py-2 text-sm md:px-4 md:py-2 md:text-base bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-600 dark:hover:bg-blue-700">
                                        <i class="fas fa-chevron-left mr-2"></i>
                                        <span>Back to Dashboard</span>
                                    </button>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white flex items-center">
                            <i class="fas fa-chalkboard-teacher mr-3 text-blue-500"></i>
                            Trainings
                        </h1>
                    </div>
    
                    <!-- Search and Filter -->
                    <div class="flex flex-col md:flex-row justify-between items-stretch space-y-4 md:space-y-0 md:space-x-4">
                        <!-- Search Bar -->
                        <div class="relative w-full md:w-1/2">
                            <div class="relative">
                                <input type="text" id="trainingSearch" 
                                       placeholder="Search trainings (e.g., 'Web Development')" 
                                       class="w-full pl-12 pr-10 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out shadow-sm hover:shadow-md dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                       aria-label="Search trainings">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400 text-lg"></i>
                                </div>
                                <div class="loading-indicator">
                                    <i class="fas fa-spinner fa-spin text-blue-500"></i>
                                </div>
                            </div>
                        </div>
    
                        <!-- Location Filter Dropdown -->
                        <div class="flex flex-col sm:flex-row items-stretch space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                            <select id="locationFilter" name="locationFilter"
                                class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 px-8 py-2 flex-grow">
                                <option value="all">All Locations</option>
                                <!-- Add location options dynamically based on available training locations -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-8xl px-4 pt-2">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
            <div class="bg-gray-100 dark:bg-gray-700 p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center">
                    <i class="fas fa-chalkboard-teacher text-blue-500 mr-3" aria-hidden="true"></i>
                    Available Trainings
                </h1>
            </div>
            
            <div class="p-6 pt-8">
            @if($trainings->isEmpty())
                <div class="text-center py-10">
                    <i class="fas fa-folder-open text-gray-400 text-5xl mb-4" aria-hidden="true"></i>
                    <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No Trainings Available</h2>
                    <p class="text-gray-500 dark:text-gray-400">There are currently no trainings available.</p>
                </div>
            @else
                <   div id="trainingGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($trainings as $training)
                    <div class="training-card bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl" data-location="{{ $training->location }}" data-name="{{ $training->name }}">
                        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 relative">
                            <div class="absolute top-4 right-4 w-12 h-12 bg-white dark:bg-gray-800 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xl shadow">
                                {{ $loop->iteration }}
                            </div>
                            <h3 class="text-2xl font-bold text-white flex items-center pr-16 mb-2">
                                <i class="fas fa-chalkboard-teacher mr-3 text-3xl" aria-hidden="true"></i>
                                <span class="truncate">{{ $training->name }}</span>
                            </h3>
                            <p class="text-blue-100 dark:text-blue-200 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2" aria-hidden="true"></i>
                                {{ $training->location }}
                            </p>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center" aria-label="Training Name">
                                    <i class="fas fa-tag mr-3 text-blue-500 dark:text-blue-400 w-5" aria-hidden="true"></i>
                                    <span class="font-semibold mr-2">Name:</span> {{ $training->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center" aria-label="Training Address">
                                    <i class="fas fa-map-pin mr-3 text-blue-500 dark:text-blue-400 w-5" aria-hidden="true"></i>
                                    <span class="font-semibold mr-2">Address:</span> {{ $training->address }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center" aria-label="Contact Number">
                                    <i class="fas fa-phone-alt mr-3 text-blue-500 dark:text-blue-400 w-5" aria-hidden="true"></i>
                                    <span class="font-semibold mr-2">Contact:</span> {{ $training->contactno }}
                                </p>
                            </div>
                            <div class="mt-6 flex justify-center items-center">
                                <button onclick="showDescription('{{ $training->description }}', 'Persons With Disabilities Affairs Division (Mandaluyong)')"
                                    class="action-button bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 flex items-center transform hover:scale-105"
                                    aria-label="View Training Description for {{ $training->name }}">
                                    <i class="fas fa-info-circle mr-2" aria-hidden="true"></i>{!! __('messages.trainings.description') !!}
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="noResults" class="hidden text-center py-8">
                    <i class="fas fa-search text-gray-400 text-5xl mb-4"></i>
                    <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">No trainings found</h2>
                    <p class="text-gray-500 dark:text-gray-400">There are no trainings matching your search criteria.</p>
                </div>
                <div id="pagination" class="mt-8 flex justify-center items-center space-x-2">
                    <button id="prevPage" class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50">Previous</button>
                    <span id="pageInfo" class="text-gray-700 dark:text-gray-300"></span>
                    <button id="nextPage" class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:opacity-50">Next</button>
                </div>
            @endif
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

   

<!-- Description Modal -->
<div id="descriptionModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Semi-transparent overlay -->
        <div id="modalOverlay" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-90" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full dark:bg-gray-800" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="px-4 pt-5 pb-4 bg-white dark:bg-gray-800 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10 dark:bg-blue-900">
                        <i class="text-2xl text-blue-600 fas fa-info-circle dark:text-blue-300" aria-hidden="true"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-2xl font-semibold leading-6 text-gray-900 dark:text-white" id="modal-headline">
                            Training Description
                        </h3>
                        <div class="mt-4">
                            <p id="modalCompanyName" class="text-lg font-semibold text-gray-700 dark:text-gray-300"></p>
                            <div class="mt-2 overflow-y-auto max-h-60">
                                <p id="modalDescription" class="text-base text-gray-600 dark:text-gray-400"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeModal()" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm dark:bg-blue-700 dark:hover:bg-blue-800 transition-colors duration-200" id="closeModalButton">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

 
<script>
    let currentPage = 1;
    const itemsPerPage = 6; // Adjust this value as needed

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function filterTrainings() {
        const searchTerm = document.getElementById('trainingSearch').value.toLowerCase();
        const locationFilterValue = document.getElementById('locationFilter').value;
        const trainingCards = document.querySelectorAll('.training-card');
        let visibleTrainings = [];

        trainingCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const location = card.dataset.location;
            let locationMatch = locationFilterValue === 'all' || location === locationFilterValue;

            if (name.includes(searchTerm) && locationMatch) {
                visibleTrainings.push(card);
            }
            card.style.display = 'none';
        });

        updatePagination(visibleTrainings);
    }

    function updatePagination(visibleTrainings) {
        const totalPages = Math.ceil(visibleTrainings.length / itemsPerPage);
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        visibleTrainings.forEach((training, index) => {
            if (index >= startIndex && index < endIndex) {
                training.style.display = '';
            } else {
                training.style.display = 'none';
            }
        });

        const prevButton = document.getElementById('prevPage');
        const nextButton = document.getElementById('nextPage');
        const pageInfo = document.getElementById('pageInfo');

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

        const noResults = document.getElementById('noResults');
        const trainingGrid = document.getElementById('trainingGrid');
        const pagination = document.getElementById('pagination');

        if (visibleTrainings.length === 0) {
            trainingGrid.classList.add('hidden');
            pagination.classList.add('hidden');
            noResults.classList.remove('hidden');
            noResults.querySelector('p').textContent = `There are no trainings matching "${document.getElementById('trainingSearch').value}"`;
        } else {
            trainingGrid.classList.remove('hidden');
            pagination.classList.remove('hidden');
            noResults.classList.add('hidden');
        }
    }

    function changePage(direction) {
        currentPage += direction;
        filterTrainings();
    }

    function showDescription(description, companyName) {
        const modal = document.getElementById('descriptionModal');
        const modalDescription = document.getElementById('modalDescription');
        const modalCompanyName = document.getElementById('modalCompanyName');
        const closeButton = document.getElementById('closeModalButton');

        modalDescription.innerText = description;
        modalCompanyName.innerText = "Company: " + companyName;
        modal.classList.remove('hidden');
        updateModalDarkMode();

        // Focus on the close button
        closeButton.focus();

        // Trap focus within the modal
        modal.addEventListener('keydown', trapFocus);
    }

    function closeModal() {
        const modal = document.getElementById('descriptionModal');
        modal.classList.add('hidden');
        modal.removeEventListener('keydown', trapFocus);
    }

    function trapFocus(e) {
        const modal = document.getElementById('descriptionModal');
        const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (e.key === 'Tab') {
            if (e.shiftKey) {
                if (document.activeElement === firstElement) {
                    lastElement.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastElement) {
                    firstElement.focus();
                    e.preventDefault();
                }
            }
        }

        if (e.key === 'Escape') {
            closeModal();
        }
    }

    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        updateModalDarkMode();
    }

    function updateModalDarkMode() {
        const modal = document.getElementById('descriptionModal');
        const modalOverlay = document.getElementById('modalOverlay');
        if (document.documentElement.classList.contains('dark')) {
            modal.classList.add('dark');
            modalOverlay.classList.add('dark');
        } else {
            modal.classList.remove('dark');
            modalOverlay.classList.remove('dark');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const trainingSearch = document.getElementById('trainingSearch');
        const locationFilter = document.getElementById('locationFilter');
        const loadingIndicator = document.querySelector('.loading-indicator');
        const prevButton = document.getElementById('prevPage');
        const nextButton = document.getElementById('nextPage');

        const debouncedFilterTrainings = debounce(() => {
            loadingIndicator.style.display = 'none';
            currentPage = 1; // Reset to first page on new search
            filterTrainings();
        }, 300);

        trainingSearch.addEventListener('input', () => {
            loadingIndicator.style.display = 'block';
            debouncedFilterTrainings();
        });
        
        locationFilter.addEventListener('change', () => {
            currentPage = 1; // Reset to first page on location filter change
            filterTrainings();
        });

        prevButton.addEventListener('click', () => changePage(-1));
        nextButton.addEventListener('click', () => changePage(1));

        // Populate location filter options
        const locations = new Set();
        document.querySelectorAll('.training-card').forEach(card => {
            locations.add(card.dataset.location);
        });
        locations.forEach(location => {
            const option = document.createElement('option');
            option.value = location;
            option.textContent = location;
            locationFilter.appendChild(option);
        });

        // Initial filter to set up the view
        filterTrainings();

            // Set up modal close on outside click
            window.onclick = function(event) {
                const modal = document.getElementById('descriptionModal');
                if (event.target == modal) {
                    closeModal();
                }
            };

            // Call updateModalDarkMode when the page loads
            updateModalDarkMode();
        });
    </script>
</x-app-layout>


