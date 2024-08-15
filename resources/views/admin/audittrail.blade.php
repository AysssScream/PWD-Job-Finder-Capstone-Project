<x-app-layout>
    <title>Audit Trail</title>


    <div class="h-full ml-14 md:ml-64 font-poppins p-10 ">

        <h1 class="text-2xl font-semibold text-gray-900 mb-6 mt-8 text-gray-700 dark:text-gray-200">Audit Trail</h1>

        <form method="GET" action="{{ route('admin.audit') }}">
            <div class="mb-4 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0">
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4 w-full">
                    <div class="lg:w-full lg:w-40">
                        <label for="action-filter"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Actions</label>
                        <select id="action-filter" name="action"
                            class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All Actions</option>
                            <option value="Logged In">Logged In</option>
                            <option value="Logged Out">Logged Out</option>
                            <option value="Approve User">Approve User</option>
                            <option value="Decline User">Decline User</option>
                            <option value="Responded">Responded</option>
                        </select>
                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="section-filter"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Sections</label>
                        <select id="section-filter" name="section"
                            class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All</option>
                            <option value="Dashboard">Dashboard</option>
                            <option value="Audit Trail">Audit Trail</option>
                            <option value="Manage Users">Manage Users</option>
                            <option value="Messages">Messages</option>
                        </select>
                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="date-from" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
                            From</label>
                        <input type="date" id="date-from" name="date_from"
                            class="mt-1 block bg-white text-black dark:bg-gray-800 dark:text-gray-200 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="lg:w-full lg:w-40">
                        <label for="date-to" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
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
        </form>

        <div class="mb-4">
            {{ $auditTrails->links() }}
        </div>
        <div class="overflow-x-auto rounded-lg shadow-md  custom-scrollbar">
            <table
                class="w-full bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-left text-sm text-gray-500">
                <thead class="bg-white text-black dark:bg-gray-800 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">ID
                        </th>
                        <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                            User
                        </th>
                        <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                            Action
                        </th>
                        <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                            Section</th>
                        <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                            Timestamp</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 divide-y divide-gray-200">
                    @foreach ($auditTrails as $audit)
                        <tr>
                            <td class="px-4 py-4 sm:px-6 font-medium text-gray-700 dark:text-gray-200">
                                #{{ $audit->id }}</td>
                            <td class="px-4 py-4 sm:px-6">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-full w-full rounded-full object-cover object-center"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" />
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
                            <td class="px-4 py-4 sm:px-6">{{ $audit->created_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination Links -->

    </div>
</x-app-layout>
