<x-app-layout>
    <title>Audit Trail</title>
    @if (Session::has('clearlogs'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("{{ Session::get('clearlogs') }}", 'Audit Log Cleared', {
                    timeOut: 5000
                });
            });
        </script>
    @endif
    <div class="h-full ml-14 md:ml-64">
        <div class="w-full bg-gray-100 dark:bg-gray-800 p-6 shadow-md">
            <div class="flex items-center space-x-3 max-w-screen-xl ">
                <!-- Icon (smaller size) -->
                <i class="fas fa-users-cog text-blue-700 dark:text-white text-2xl"></i>
                <!-- Title -->
                <h1 class="text-2xl font-bold text-blue-700 dark:text-gray-200">Manage Audit</h1>
            </div>
        </div>
    </div>

    <div class="h-full ml-14 md:ml-64 font-poppins p-10 ">
        <!-- Trigger Button and Card Container -->
        <div class="flex flex-col sm:flex-row items-start sm:items-stretch justify-between mb-6  space-y-4 sm:space-y-0">

            <div
                class="flex flex-col sm:flex-row items-start sm:items-stretch justify-between mb-6 space-y-4 sm:space-y-0 sm:gap-4">
                <!-- Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg  max-w-full  flex flex-col justify-between h-full">
                    <div class="header-gradient-bg ">
                        <h3 class="text-lg font-medium text-white dark:text-gray-200 flex items-center">
                            <i class="fas fa-file-alt mr-2"></i> <!-- Icon here -->
                            Audit Records Count: {{ $auditTrailsCount }} Activities Found
                        </h3>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 p-4">An audit trail in an admin system functions as a
                        comprehensive record that tracks all user activities and changes within the application,
                        providing transparency and accountability for actions performed by all users.</p>
                </div>
            </div>
        </div>

        <div id="confirmationModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg w-11/12 max-w-md mx-4 flex flex-col"
                style="max-height: 90vh; overflow-y: auto;">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 p-4">Confirm Action?</h2>

                <!-- Horizontal line -->
                <hr class="my-2 border-gray-300 dark:border-gray-600">

                <!-- Icon in the center -->
                <div class="flex justify-center mb-4">
                    <i class="fas fa-exclamation-triangle text-red-500 text-6xl"></i>
                </div>

                <p class="mt-2 text-gray-700 dark:text-gray-300 text-center p-4">Are you sure you want to clear the
                    audit logs?</p>

                <hr class="my-2 border-gray-300 dark:border-gray-600">

                <div class=" flex justify-end p-4">
                    <button id="cancelButton"
                        class="bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold py-2 px-4 rounded mr-2">Cancel</button>
                    <form action="{{ route('audit.clearlogs') }}" method="POST" id="confirmForm">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 dark:bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.audit') }}">
            @csrf

            <div class="lg:w-full lg:max-w-xs mb-4">
                <label for="search-bar" class="block text-lg font-medium text-gray-700 dark:text-gray-200">Search Audit
                    Trails</label>
                <input type="text" id="search-bar" placeholder="Search by Name"
                    class="mt-1 w-full bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div class="mb-4 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0">
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4 w-full">
                    <div class="lg:w-full lg:w-40">
                        <label for="action-filter"
                            class="block font-medium text-gray-700 dark:text-gray-200">Actions</label>
                        <select id="action-filter" name="action"
                            class="mt-1 bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All Actions</option>
                            <optgroup label="User Actions">
                                <option value="Logged In">Logged In</option>
                                <option value="Logged Out">Logged Out</option>
                            </optgroup>
                            <optgroup label="Message Actions">
                                <option value="Composed">Composed</option>
                                <option value="Replied">Replied</option>
                            </optgroup>
                            <optgroup label="Admin Actions">
                                <option value="Reset">Reset</option>
                                <option value="Deleted">Deleted</option>
                                <option value="Declined">Declined</option>
                                <option value="Approve User">Approved User</option>
                            </optgroup>
                        </select>

                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="section-filter" class="block font-medium text-gray-700 dark:text-gray-200">Admin
                            Sections</label>
                        <select id="section-filter" name="section"
                            class="mt-1 bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All</option>
                            <option value="Authentication">Authentication</option>
                            <option value="Manage Users">Manage Users</option>
                            <option value="Messages">Messages</option>
                            <option value="Manage Videos">Manage Videos</option>
                        </select>
                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="date-from" class="block font-medium text-gray-700 dark:text-gray-200">Date
                            From</label>
                        <input type="date" id="date-from" name="date_from"
                            class="mt-1 block bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="date-to" class="block font-medium text-gray-700 dark:text-gray-200">Date
                            To</label>
                        <input type="date" id="date-to" name="date_to"
                            class="mt-1 block bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="w-full lg:w-40">
                        <button type="submit" id="apply-filters" name="apply_filters"
                            class="mt-6 block bg-blue-500 text-white p-3 py-2.5 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-center">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="pagination-container">
            @if ($auditTrails->hasPages())
                <div class="pagination-wrapper">
                    {{-- Showing Results Text --}}
                    <div class="pagination-results-text text-gray-700 dark:text-gray-300">
                        <span class="font-medium text-gray-700 dark:text-gray-300">Showing</span>
                        <span
                            class="font-medium text-gray-700 dark:text-gray-300">{{ $auditTrails->firstItem() }}</span>
                        <span class="font-medium text-gray-700 dark:text-gray-300">to</span>
                        <span class="font-medium text-gray-700 dark:text-gray-300">{{ $auditTrails->lastItem() }}</span>
                        <span class="font-medium text-gray-700 dark:text-gray-300">of</span>
                        <span class="font-medium text-gray-700 dark:text-gray-300">{{ $auditTrails->total() }}</span>
                        <span class="font-medium text-gray-700 dark:text-gray-300">results</span>
                    </div>


                    {{-- Pagination Navigation --}}
                    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-nav">
                        <div class="pagination-buttons">
                            @php
                                $currentPage = $auditTrails->currentPage();
                                $lastPage = $auditTrails->lastPage();
                                $groupSize = 4;
                                $currentGroup = ceil($currentPage / $groupSize);
                                $start = ($currentGroup - 1) * $groupSize + 1;
                                $end = min($start + $groupSize - 1, $lastPage);
                            @endphp

                            {{-- Previous Group Link --}}
                            @if ($start > 1)
                                <a href="{{ $auditTrails->url($start - $groupSize) }}"
                                    class="pagination-button rounded-l-md">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @else
                                <span class="pagination-button pagination-button-disabled rounded-l-md">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @endif

                            {{-- First Page --}}
                            @if ($start > 1)
                                <a href="{{ $auditTrails->url(1) }}" class="pagination-button">
                                    1
                                </a>
                                @if ($start > 2)
                                    <span class="pagination-button pagination-button-disabled">...</span>
                                @endif
                            @endif

                            {{-- Current Group Numbers --}}
                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $currentPage)
                                    <span aria-current="page" class="pagination-button pagination-button-active">
                                        {{ $i }}
                                    </span>
                                @else
                                    <a href="{{ $auditTrails->url($i) }}" class="pagination-button">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor

                            {{-- Last Page --}}
                            @if ($end < $lastPage)
                                @if ($end < $lastPage - 1)
                                    <span class="pagination-button pagination-button-disabled">...</span>
                                @endif
                                <a href="{{ $auditTrails->url($lastPage) }}" class="pagination-button">
                                    {{ $lastPage }}
                                </a>
                            @endif

                            {{-- Next Group Link --}}
                            @if ($end < $lastPage)
                                <a href="{{ $auditTrails->url($end + 1) }}" class="pagination-button rounded-r-md">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="pagination-button pagination-button-disabled rounded-r-md">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    </nav>
                </div>
            @endif
        </div>

        <style>
            .pagination-container {
                margin-bottom: 1rem;
            }

            .pagination-results-text {
                font-size: 0.875rem;
                line-height: 1.25rem;
                text-align: center;
            }

            .pagination-nav {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .pagination-wrapper {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .pagination-buttons {
                display: flex;
                border-radius: 0.375rem;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            }

            .pagination-button {
                position: relative;
                display: inline-flex;
                align-items: center;
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background-color: #ffffff;
                color: #374151;
                transition: all 150ms ease-in-out;
                margin-left: -1px;
            }

            .dark .pagination-button {
                background-color: rgb(31, 41, 55);
                border-color: rgb(75, 85, 99);
                color: rgb(209, 213, 219);
            }

            .pagination-button-active {
                background-color: rgb(37, 99, 235);
                color: #ffffff;
                border-color: rgb(37, 99, 235);
                z-index: 1;
            }

            .dark .pagination-button-active {
                background-color: rgb(29, 78, 216);
            }

            .pagination-button:hover:not(.pagination-button-active):not(.pagination-button-disabled) {
                background-color: rgb(243, 244, 246);
            }

            .dark .pagination-button:hover:not(.pagination-button-active):not(.pagination-button-disabled) {
                background-color: rgb(55, 65, 81);
            }

            .pagination-button-disabled {
                color: rgb(156, 163, 175);
                cursor: default;
                pointer-events: none;
            }

            .rounded-l-md {
                border-top-left-radius: 0.375rem;
                border-bottom-left-radius: 0.375rem;
            }

            .rounded-r-md {
                border-top-right-radius: 0.375rem;
                border-bottom-right-radius: 0.375rem;
            }

            @media (min-width: 1018px) {
                .pagination-wrapper {
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                }

                .pagination-results-text {
                    text-align: left;
                }
            }

            @media (max-width: 640px) {
                .pagination-button {
                    padding: 0.25rem 0.5rem;
                }
            }
        </style>

        <div class="overflow-x-auto rounded-lg shadow-md  custom-scrollbar">
            <table
                class="w-full bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-left text-sm text-gray-500">
                <thead class="bg-white text-black border-b border-gray-300 dark:bg-gray-800 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-id-badge"></i> ID
                        </th>
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-user"></i> User
                        </th>
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-tasks"></i> Action
                        </th>
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-layer-group"></i> Section
                        </th>
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-clock"></i> Timestamp
                        </th>
                    </tr>
                </thead>
                <tbody id="audit-tbody"
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 divide-y divide-gray-200">
                    @foreach ($auditTrails as $audit)
                        <tr data-user-id="{{ $audit->user_id }}" data-name="{{ $audit->user }}"
                            data-action="{{ $audit->action }}" data-section="{{ $audit->section }}"
                            data-timestamp="{{ $audit->created_at }}">
                            <td class="px-4 py-4 sm:px-6 font-medium text-gray-700 dark:text-gray-200">
                                #{{ $audit->id }}</td>
                            <td class="px-4 py-4 sm:px-6">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-full w-full rounded-full object-fit object-center"
                                            src="{{ $adminProfile && $adminProfile->profile_picture ? asset('storage/' . $adminProfile->profile_picture) : 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                                            alt="Profile Picture" />
                                    </div>
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700 dark:text-gray-200">
                                            {{ $audit->user_id }}
                                        </div>
                                        <div class="text-gray-700 dark:text-gray-200">
                                            {{ $audit->user }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 sm:px-6">{{ $audit->action }}</td>
                            <td class="px-4 py-4 sm:px-6">{{ $audit->section }}</td>
                            <td class="px-4 py-4 sm:px-6">
                                {{ \Carbon\Carbon::parse($audit->created_at)->timezone('Asia/Singapore')->format('F j, Y, g:i a') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <script>
            document.getElementById('search-bar').addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#audit-tbody tr');

                rows.forEach(row => {
                    // Retrieve the name data attribute for filtering
                    const name = row.getAttribute('data-name').toLowerCase();

                    // Check if the name field contains the search term
                    if (name.includes(searchTerm)) {
                        row.style.display = ''; // Show row
                    } else {
                        row.style.display = 'none'; // Hide row
                    }
                });
            });
        </script>

    </div>
</x-app-layout>
