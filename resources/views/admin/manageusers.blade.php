    <x-app-layout>
        @if (Session::has('declined'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.error("{{ Session::get('declined') }}", 'User Account Creation Declined', {
                        timeOut: 5000
                    });
                });
            </script>
        @endif
        <title>Manage Users</title>

        <div class="h-full ml-14 md:ml-64 font-poppins p-10">

            <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6 mt-8">Manage Users</h1>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-8">
                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold mb-2 text-gray-700 dark:text-gray-200">Approved Accounts</h2>
                        <h1 class="font-bold text-green-600 text-2xl">{{ $approvedCount }}</h1>
                    </div>
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200  mb-2 ">Pending Accounts</h2>
                        <p class="text-3xl font-bold text-yellow-600">{{ $pendingCount }}</p>
                    </div>
                    <svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Declined Accounts</h2>
                        <p class="text-3xl font-bold text-red-600">{{ $declinedCount }}</p>
                    </div>
                    <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Waiting for Approval
                            Accounts</h2>
                        <p class="text-3xl font-bold text-orange-600">{{ $waitingforapprovalCount }}</p>
                    </div>
                    <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <form method="GET" action="{{ route('admin.manageusers') }}">
                <div
                    class="mb-4 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0 lg:flex-row lg:space-x-4 w-full">
                    <!-- Filters Container -->
                    <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                        <!-- Status Filter -->
                        <div class="lg:w-full lg:w-40">
                            <label for="status-filter"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                            <select id="status-filter" name="status"
                                class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="declined">Declined</option>
                                <option value="waiting for approval">Waiting for Approval</option>
                            </select>
                        </div>
                        <!-- Role Filter -->
                        <div class="lg:w-full lg:w-40">
                            <label for="role-filter"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role</label>
                            <select id="role-filter" name="role"
                                class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All</option>
                                <option value="employer">Employer</option>
                                <option value="employee">User</option>
                            </select>
                        </div>
                        <!-- Date Filters -->
                        <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                            <div class="lg:w-full lg:w-40">
                                <label for="date-from"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
                                    From</label>
                                <input type="date" id="date-from" name="date_from"
                                    class="mt-1 block bg-white text-black dark:bg-gray-800 dark:text-gray-200 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="w-full lg:w-40">
                                <label for="date-to"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
                                    To</label>
                                <input type="date" id="date-to" name="date_to"
                                    class="mt-1 block bg-white text-black dark:bg-gray-800 dark:text-gray-200 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="w-full lg:w-40">
                                <button type="submit" id="apply-filters" name="apply_filters"
                                    class="mt-6 block bg-blue-500 text-white p-2 py-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-center">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="mb-4">
                {{ $users->links() }}
            </div>


            <div class="overflow-x-auto rounded-lg  shadow-md bg-white text-black dark:bg-gray-800 dark:text-gray-200 ">
                <table
                    class="w-full border-collapse bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-left text-sm text-gray-500">
                    <thead class="bg-white text-black dark:bg-gray-800 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                User
                                ID</th>
                            <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Name
                            </th>
                            <th scope="col"
                                class="text-right px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Status
                            </th>
                            <th scope="col"
                                class=" text-right px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">Role
                            </th>
                            <th scope="col"
                                class=" text-center px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Date
                                Requested</th>
                            <th scope="col"
                                class=" text-center px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Actions</th>
                        </tr>
                    </thead>

                    <table class="min-w-full divide-y divide-gray-100">
                        <tbody id="user-table-body" class="divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr data-status="{{ $user->account_verification_status }}"
                                    data-role="{{ $user->usertype }}"
                                    data-date="{{ $user->created_at->format('Y-m-d') }}">
                                    <td class="px-4 py-4 sm:px-6 font-medium text-gray-700 dark:text-gray-200">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center gap-3">
                                            @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                                                <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                                    alt="Profile Picture" class="w-14 h-14 rounded-full">
                                            @else
                                                <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                                    class="w-14 h-14 rounded-full">
                                            @endif
                                            <div class="text-sm">
                                                <div class="font-medium text-gray-700 dark:text-gray-200">
                                                    {{ $user->firstname }} </div>
                                                <div class="text-gray-700 dark:text-gray-200">{{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        @php
                                            $status = $user->account_verification_status;
                                        @endphp

                                        <span
                                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold uppercase
                                            @if ($status === 'approved') text-green-600
                                            @elseif ($status === 'pending')
                                                text-yellow-600
                                            @elseif ($status === 'waiting for approval')
                                                text-yellow-500
                                            @else
                                                text-red-500 @endif">
                                            @if ($status === 'approved')
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                                {{ $status }}
                                            @elseif ($status === 'pending')
                                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                                {{ $status }}
                                            @elseif ($status === 'waiting for approval')
                                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                                {{ $status }}
                                            @else
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                {{ $status }}
                                            @endif
                                        </span>


                                    </td>
                                    <td class="px-4 py-4 sm:px-6 uppercase"> {{ $user->usertype }} </td>
                                    <td class="px-4 py-4 sm:px-6"> {{ $user->created_at->format('F j, Y, g:i a') }}
                                    </td>

                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        <div class="flex flex-col gap-2 sm:flex-row">
                                            @if ($user->usertype === 'user' || $user->usertype === 'employer')
                                                @if ($user->account_verification_status == 'waiting for approval')
                                                    <a href="{{ route('admin.applicantinfo', ['id' => $user->id]) }}"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin.decline', ['id' => $user->id]) }}"
                                                        class="inline-block px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Decline
                                                    </a>
                                                @elseif ($user->account_verification_status == 'approved')
                                                    <a href="{{ route('admin.applicantinfo', ['id' => $user->id]) }}"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View
                                                        </button>
                                                    </a>
                                                @elseif ($user->account_verification_status != 'pending')
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        View
                                                    </button>
                                                @endif
                                            @elseif ($user->usertype == 'employer')
                                                @if ($user->account_verification_status == 'waiting for approval')
                                                    <a href="{{ route('admin.employerapplicantinfo', ['id' => $user->id]) }}"
                                                        class="inline-block">

                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View
                                                        </button>
                                                    </a>
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Decline
                                                    </button>
                                                @elseif ($user->account_verification_status == 'approved')
                                                    <a href="{{ route('admin.employerapplicantinfo', ['id' => $user->id]) }}"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View
                                                        </button>
                                                    </a>
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Decline
                                                    </button>
                                                @elseif ($user->account_verification_status != 'pending')
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        View
                                                    </button>
                                                @endif
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

        {{-- <script>
        document.getElementById('status-filter').addEventListener('change', filterTable);
        document.getElementById('role-filter').addEventListener('change', filterTable);
        document.getElementById('date-from').addEventListener('change', filterTable);
        document.getElementById('date-to').addEventListener('change', filterTable);

        function filterTable() {
            const selectedStatus = document.getElementById('status-filter').value.toLowerCase();
            const selectedRole = document.getElementById('role-filter').value.toLowerCase();
            const dateFrom = document.getElementById('date-from').value;
            const dateTo = document.getElementById('date-to').value;
            const rows = document.querySelectorAll('#user-table-body tr');

            rows.forEach(row => {
                const status = row.getAttribute('data-status').toLowerCase();
                const role = row.getAttribute('data-role').toLowerCase();
                const dateStr = row.getAttribute('data-date');
                const date = new Date(dateStr);

                const statusMatches = !selectedStatus || status === selectedStatus;
                const roleMatches = !selectedRole || role === selectedRole;

                let dateMatches = true;
                if (dateFrom) {
                    dateMatches = dateMatches && (date >= new Date(dateFrom));
                }
                if (dateTo) {
                    dateMatches = dateMatches && (date <= new Date(dateTo));
                }

                if (statusMatches && roleMatches && dateMatches) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script> --}}

    </x-app-layout>
