<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Manage Users</title>
    <div class="h-full ml-14 md:ml-64">
        <div class="w-full bg-gray-100 dark:bg-gray-800 p-6 shadow-md">
            <div class="flex items-center space-x-3 max-w-screen-xl ">
                <i class="fas fa-users-cog text-blue-700 dark:text-white text-2xl"></i>
                <h1 class="text-2xl font-bold text-blue-700 dark:text-gray-200">Manage Users</h1>
            </div>
        </div>
    </div>

    <div class="h-full ml-14 md:ml-64 font-poppins p-10">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
            <!-- Approved Accounts Card -->

            <!-- Approved Accounts Card -->
            <a href="{{ route('admin.manageusers', ['status' => 'approved']) }}" class="block">
                <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg flex flex-col">
                    <div class="header-gradient-bg p-4 ">
                        <h2 class="text-lg sm:text-lg font-semibold text-white mb-2">Approved Accounts</h2>
                    </div>
                    <div class="flex flex-row justify-between items-center p-4 sm:p-6">
                        <h1 class="font-bold text-green-600 text-3xl sm:text-4xl">{{ $approvedCount }} Users</h1>
                        <i class="fas fa-user-check text-green-500 text-3xl sm:text-4xl"></i>
                    </div>
                </div>
            </a>

            <!-- Pending Accounts Card -->
            <a href="{{ route('admin.manageusers', ['status' => 'pending']) }}" class="block">
                <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg flex flex-col">
                    <div class="header-gradient-bg p-4">
                        <h2 class="text-lg sm:text-lg font-semibold text-white mb-2">Pending Accounts</h2>
                    </div>
                    <div class="flex flex-row justify-between items-center p-4 sm:p-6">
                        <h1 class="font-bold text-yellow-600 text-3xl sm:text-4xl">{{ $pendingCount }} Users</h1>
                        <i class="fas fa-user-clock text-yellow-500 text-3xl sm:text-4xl"></i>
                    </div>
                </div>
            </a>

            <!-- Waiting for Approval Accounts Card -->
            <a href="{{ route('admin.manageusers', ['status' => 'waiting for approval']) }}" class="block">
                <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg flex flex-col">
                    <div class="header-gradient-bg p-4 ">
                        <h2 class="text-lg sm:text-lg font-semibold text-white mb-2">Waiting for Approval</h2>
                    </div>
                    <div class="flex flex-row justify-between items-center p-4 sm:p-6">
                        <h1 class="font-bold text-orange-600 text-3xl sm:text-4xl">{{ $waitingforapprovalCount }} Users
                        </h1>
                        <i class="fas fa-user-edit text-orange-500 text-3xl sm:text-4xl"></i>
                    </div>
                </div>
            </a>

            <!-- Declined Accounts Card -->
            <a href="{{ route('admin.manageusers', ['status' => 'declined']) }}" class="block">
                <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg flex flex-col">
                    <div class="header-gradient-bg p-4">
                        <h2 class="text-lg sm:text-lg font-semibold text-white mb-2">Declined Accounts</h2>
                    </div>
                    <div class="flex flex-row justify-between items-center p-4 sm:p-6">
                        <h1 class="font-bold text-red-600 text-3xl sm:text-4xl">{{ $declinedCount }} Users</h1>
                        <i class="fas fa-user-times text-red-500 text-3xl sm:text-4xl"></i>
                    </div>
                </div>
            </a>
        </div>


        @if (Session::has('delete'))
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.error("{{ Session::get('delete') }}",
                        'Register Application was Deleted!', {
                            timeOut: 5000
                        });
                });
            </script>
        @endif
        @if (Session::has('approve'))
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.success("{{ Session::get('approve') }}",
                        'Register Application was Approved!', {
                            timeOut: 5000
                        });
                });
            </script>
        @endif
        @if (Session::has('decline'))
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.error("{{ Session::get('decline') }}",
                        'Register Application was Declined!', {
                            timeOut: 5000
                        });
                });
            </script>
        @endif
        @if (Session::has('reset'))
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.warning("{{ Session::get('reset') }}",
                        'Register Application was Reset to Pending!', {
                            timeOut: 5000
                        });
                });
            </script>
        @endif


        <form method="GET" action="{{ route('admin.manageusers') }}">
            @csrf

            <!-- Search Bar -->
            <div class="lg:w-full lg:max-w-xs mb-4">
                <label for="search-bar"
                    class="block text-lg font-medium text-gray-700 dark:text-gray-200">Search</label>
                <input type="text" id="search-bar" name="search" placeholder="Search by name or email"
                    class="mt-1 w-full bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div
                class="mb-4 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0 lg:flex-row lg:space-x-4 w-full">
                <!-- Filters Container -->
                <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                    <!-- Status Filter -->
                    <div class="lg:w-full lg:w-40">
                        <label for="status-filter"
                            class="block text-lg font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <select id="status-filter" name="status"
                            class="mt-1 w-full bg-white p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="waiting for approval">Waiting for Approval</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="declined">Declined</option>
                        </select>
                    </div>
                    <!-- Role Filter -->
                    <div class="lg:w-full lg:w-40">
                        <label for="role-filter"
                            class="block text-lg font-medium text-gray-700 dark:text-gray-200">Role</label>
                        <select id="role-filter" name="role"
                            class="mt-1 p-3 w-full border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All</option>
                            <option value="employer">Employer</option>
                            <option value="user">Applicant</option>
                        </select>
                    </div>
                    <!-- Date Filters -->
                    <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                        <div class="lg:w-full lg:w-40">
                            <label for="date-from"
                                class="block text-lg font-medium text-gray-700 dark:text-gray-200">Date
                                From</label>
                            <input type="date" id="date-from" name="date_from"
                                class="mt-1 block bg-white w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="w-full lg:w-40">
                            <label for="date-to"
                                class="block text-lg font-medium text-gray-700 dark:text-gray-200">Date
                                To</label>
                            <input type="date" id="date-to" name="date_to"
                                class="mt-1 block bg-white w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="w-full lg:w-40">
                            <button type="submit" id="apply-filters" name="apply_filters"
                                class="mt-8 block bg-blue-500 text-white p-2 pb-4 py-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-center">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if ($users->hasPages())
            <div class="pagination-wrapper mb-4">
                {{-- Showing Results Text --}}
                <div class="pagination-results-text text-gray-700 dark:text-gray-300">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Showing</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">{{ $users->firstItem() }}</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">to</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">{{ $users->lastItem() }}</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">of</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">{{ $users->total() }}</span>
                    <span class="font-medium text-gray-700 dark:text-gray-300">results</span>
                </div>

                {{-- Pagination Navigation --}}
                <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-nav">
                    <div class="pagination-buttons">
                        @php
                            $currentPage = $users->currentPage();
                            $lastPage = $users->lastPage();
                            $groupSize = 4;
                            $currentGroup = ceil($currentPage / $groupSize);
                            $start = ($currentGroup - 1) * $groupSize + 1;
                            $end = min($start + $groupSize - 1, $lastPage);
                        @endphp

                        {{-- Previous Group Link --}}
                        @if ($start > 1)
                            <a href="{{ $users->url($start - $groupSize) }}" class="pagination-button rounded-l-md">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @else
                            <span class="pagination-button pagination-button-disabled rounded-l-md">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @endif

                        {{-- First Page --}}
                        @if ($start > 1)
                            <a href="{{ $users->url(1) }}" class="pagination-button">
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
                                <a href="{{ $users->url($i) }}" class="pagination-button">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($end < $lastPage)
                            @if ($end < $lastPage - 1)
                                <span class="pagination-button pagination-button-disabled">...</span>
                            @endif
                            <a href="{{ $users->url($lastPage) }}" class="pagination-button">
                                {{ $lastPage }}
                            </a>
                        @endif

                        {{-- Next Group Link --}}
                        @if ($end < $lastPage)
                            <a href="{{ $users->url($end + 1) }}" class="pagination-button rounded-r-md">
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



        <div class="overflow-x-auto rounded-lg  shadow-md bg-white text-black dark:bg-gray-800 dark:text-gray-200 ">
            <table
                class="w-full border-collapse bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-left text-sm text-gray-500">
                <thead class="bg-white text-black border-b border-gray-300 dark:bg-gray-800 dark:text-gray-200">
                    <tr>
                        <!--<th scope="col"-->
                        <!--    class="text-center px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">-->
                        <!--    User ID-->
                        <!--</th>-->
                        <th scope="col" class="px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-user"></i> Name
                        </th>
                        <th scope="col"
                            class="text-left px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-check-circle"></i> Status
                        </th>
                        <th scope="col"
                            class="text-left px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-user-tag"></i> Role
                        </th>
                        <th scope="col"
                            class="text-left px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-calendar-alt"></i> Date Requested
                        </th>
                        <th scope="col"
                            class="text-left px-4 py-4 text-lg text-gray-700 dark:text-gray-200 sm:px-6">
                            <i class="fas fa-cogs"></i> Actions
                        </th>

                    </tr>
                </thead>
                <script>
                    document.getElementById('search-bar').addEventListener('keyup', function() {
                        const searchTerm = this.value.toLowerCase();
                        const rows = document.querySelectorAll('#user-table-body tr');

                        rows.forEach(row => {
                            const name = row.getAttribute('data-name').toLowerCase();
                            const email = row.getAttribute('data-email').toLowerCase();

                            // Check if the name or email contains the search term
                            if (name.includes(searchTerm) || email.includes(searchTerm)) {
                                row.style.display = ''; // Show row
                            } else {
                                row.style.display = 'none'; // Hide row
                            }
                        });
                    });
                </script>
                <tbody id="user-table-body" class="min-w-full divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr data-status="{{ $user->account_verification_status }}" data-role="{{ $user->usertype }}"
                            data-date="{{ $user->created_at->format('Y-m-d') }}" data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}">
                            <!--<td class="text-center px-4 py-4 sm:px-6 font-medium text-gray-700 dark:text-gray-200">-->
                            <!--    {{ $user->id }}-->
                            <!--</td>-->
                            <td class="px-4 py-4 sm:px-6 text-md">
                                <div class="flex items-center gap-3">
                                    @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                                        <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                            alt="Profile Picture"
                                            class="w-14 h-14 rounded-full object-contain border-2 border-blue-600">
                                    @else
                                        <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                            class="w-14 h-14 rounded-full border-2 border-gray-500">
                                    @endif

                                    <div class="text-md">
                                        <div class="font-medium text-gray-700 dark:text-gray-200">
                                            {{ $user->firstname }}</div>
                                        <div class="text-gray-700 dark:text-gray-200">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 sm:px-6 ">
                                @php $status = $user->account_verification_status; @endphp
                                <span
                                    class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold uppercase @if ($status === 'approved') text-green-600 @elseif ($status === 'pending') text-yellow-600 @elseif ($status === 'waiting for approval') text-yellow-600 @else text-red-500 @endif">
                                    @if ($status === 'approved')
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600 "></span>
                                        {{ $status }}
                                    @elseif ($status === 'pending')
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                        {{ $status }}
                                    @elseif ($status === 'waiting for approval')
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                        {{ $status }}
                                    @else
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> {{ $status }}
                                    @endif
                                </span>
                            </td>
                            <td class="px-4 py-4 sm:px-6 uppercase text-md text-gray-800 dark:text-white">
                                {{ $user->usertype === 'user' ? 'Applicant' : $user->usertype }}
                            </td>
                            <td class="px-4 py-4 sm:px-6 text-md text-gray-800 dark:text-white">
                                {{ $user->created_at->timezone('Asia/Singapore')->format('F j, Y, g:i a') }}
                            </td>

                            <td class="px-4 py-4 sm:px-6">
                                <div class="flex flex-col gap-2 sm:flex-row">
                                    @if ($user->usertype === 'user')
                                        @if ($user->account_verification_status == 'waiting for approval')
                                            <a href="{{ route('admin.applicantinfo', ['id' => $user->id]) }}"
                                                class="inline-block">
                                                <button
                                                    class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    View Applicant
                                                </button>
                                            </a>
                                            <div x-data="{ showModal: false }">
                                                <!-- Reset Button -->
                                                <a href="javascript:void(0);" @click="showModal = true"
                                                    class="inline-block w-full text-center px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                    Reset Application
                                                </a>
                                                <!-- Modal -->

                                                <!-- Modal -->
                                                <template x-if="showModal" class="modal-wrapper">
                                                    <div x-show="showModal"
                                                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4">
                                                        <div
                                                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                                                            <h2
                                                                class="text-xl font-bold mb-4 text-black dark:text-white">
                                                                Confirm
                                                                Application Reset?</h2>
                                                            <hr
                                                                class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                                                            <!-- Warning Icon -->
                                                            <div class="flex justify-center mb-4">
                                                                <i
                                                                    class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                                                            </div>

                                                            <!-- Modal Body -->
                                                            <p class="text-black dark:text-white mb-6">
                                                                Do you really want to reset the application? This action
                                                                cannot be undone.
                                                            </p>

                                                            <!-- Form to send a message -->
                                                            <form
                                                                action="{{ route('admin.reset', ['id' => $user->id]) }}"
                                                                method="GET">
                                                                @csrf
                                                                <!-- Message Text Area -->
                                                                <div class="mb-4">
                                                                    <label for="message"
                                                                        class="block text-sm font-medium text-gray-800 dark:text-gray-300">
                                                                        Add a message for the applicant:
                                                                    </label>
                                                                    <textarea name="message" id="message" rows="4"
                                                                        class="w-full px-3 py-2 border rounded-md shadow-sm text-black" placeholder="Enter your message..."></textarea>
                                                                </div>

                                                                <!-- Buttons for confirmation and cancellation -->
                                                                <div class="flex flex-col justify-end space-y-2">
                                                                    <!-- Proceed Button -->
                                                                    <button type="submit"
                                                                        class="bg-red-600 text-center hover:bg-red-700 text-white px-4 py-2 rounded w-full">
                                                                        Reset Application
                                                                    </button>

                                                                    <!-- Cancel Button -->
                                                                    <button type="button" @click="showModal = false"
                                                                        class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded w-full">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </template>

                                            </div>
                                        @elseif ($user->account_verification_status == 'approved')
                                            <a href="{{ route('admin.applicantinfo', ['id' => $user->id]) }}"
                                                class="inline-block">
                                                <button
                                                    class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    View Applicant
                                                </button>
                                            </a>
                                        @elseif ($user->account_verification_status != 'pending' && $user->account_verification_status != 'declined')
                                            <button
                                                class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                View Applicant
                                            </button>
                                        @endif
                                    @elseif ($user->usertype == 'employer')
                                        @if ($user->account_verification_status == 'waiting for approval')
                                            <a href="{{ route('admin.employerapplicantinfo', ['id' => $user->id]) }}"
                                                class="inline-block">
                                                <button
                                                    class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    View Employer
                                                </button>
                                            </a>
                                            <div x-data="{ showModal: false }">
                                                <!-- Reset Button -->
                                                <a href="javascript:void(0);" @click="showModal = true"
                                                    class="inline-block w-full text-center px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                    Reset Application
                                                </a>
                                                <!-- Modal -->
                                                <template x-if="showModal" class="modal-wrapper">
                                                    <div x-show="showModal"
                                                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4">
                                                        <div
                                                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                                                            <h2
                                                                class="text-xl font-bold mb-4 text-black dark:text-white">
                                                                Are you sure?</h2>
                                                            <hr
                                                                class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                                                            <!-- Warning Icon -->
                                                            <div class="flex justify-center mb-4">
                                                                <i
                                                                    class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                                                            </div>

                                                            <!-- Modal Body -->
                                                            <p class="text-black dark:text-white mb-6">
                                                                Do you really want to reset this employer application?
                                                                This action cannot be undone.
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
                                        @elseif ($user->account_verification_status == 'approved' && $user->account_verification_status != 'declined')
                                            <a href="{{ route('admin.employerapplicantinfo', ['id' => $user->id]) }}"
                                                class="inline-block">
                                                <button
                                                    class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    View Employer
                                                </button>
                                            </a>
                                        @elseif ($user->account_verification_status != 'pending')
                                            <button
                                                class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                View Employer
                                            </button>
                                        @endif
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <div
                            class="container mx-auto p-8 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md text-xl text-center text-gray-600 mt-4">
                            @if (request('status') == 'approved')
                                @if ($approvedCount == 0)
                                    <div class="mb-4">
                                        <i class="fas fa-user-check text-3xl text-green-500 mb-2"></i>
                                        <p>No approved users at this time.</p>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-user-check text-3xl text-green-500 mb-2"></i>
                                        <p>{{ $approvedCount }} Approved Users</p>
                                    </div>
                                @endif
                            @elseif(request('status') == 'pending')
                                @if ($pendingCount == 0)
                                    <div class="mb-4">
                                        <i class="fas fa-user-clock text-3xl text-yellow-500 mb-2"></i>
                                        <p>No pending users at this time.</p>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-user-clock text-3xl text-yellow-500 mb-2"></i>
                                        <p>{{ $pendingCount }} Pending Users</p>
                                    </div>
                                @endif
                            @elseif(request('status') == 'waiting for approval')
                                @if ($waitingforapprovalCount == 0)
                                    <div class="mb-4">
                                        <i class="fas fa-user-edit text-3xl text-orange-500 mb-2"></i>
                                        <p>No users are waiting for approval at this time.</p>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-user-edit text-3xl text-orange-500 mb-2"></i>
                                        <p>{{ $waitingforapprovalCount }} Users Waiting for Approval</p>
                                    </div>
                                @endif
                            @elseif(request('status') == 'declined')
                                @if ($declinedCount == 0)
                                    <div class="mb-4">
                                        <i class="fas fa-user-times text-3xl text-red-500 mb-2"></i>
                                        <p>No declined users at this time.</p>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-user-times text-3xl text-red-500 mb-2"></i>
                                        <p>{{ $declinedCount }} Declined Users</p>
                                    </div>
                                @endif
                            @else
                                <div class="mb-4">
                                    <p>Please select a status to view user counts.</p>
                                </div>
                            @endif
                        </div>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
