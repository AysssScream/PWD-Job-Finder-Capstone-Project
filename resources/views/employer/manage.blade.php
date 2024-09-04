<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Manage Job Listings</title>

    </head>

    @if (Session::has('editjobs'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("{{ Session::get('editjobs') }}", 'Job Successfully Edited.', {
                    timeOut: 5000
                });

            });
        </script>
    @endif
    <div class="py-12" style="padding-top: 30px; padding-bottom: 5px;">
        <div class="container mx-auto max-w-8xl px-4 pt-2 mb-2">
            <div
                class="flex flex-col md:flex-row md:justify-between items-start md:items-center space-y-4 md:space-y-0 md:space-x-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="rounded-lg text-gray-800  dark:text-gray-300 ">
                    <ol class="breadcrumb mb-0 flex items-center flex-wrap">
                        <li class="breadcrumb-item w-full md:w-auto">
                            <a href="{{ route('employer.dashboard') }}"
                                class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                <span>Back to Dashboard</span>
                            </a>
                        </li>
                    </ol>

                </nav>

                <!-- Date Range Filter Dropdown and Add Job Button -->
                <div
                    class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                    <!-- Date Range Filter Dropdown -->
                    <select id="dateFilter" name="dateFilter"
                        class="bg-gray-100 border border-gray-600 text-gray-900 px-3 py-1 rounded focus:outline-none focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 w-full md:w-auto">
                        <option value="All">All</option>
                        <option value="last-24-hours">Last 24 Hours</option>
                        <option value="last-7-days">Last 7 Days</option>
                        <option value="last-30-days">Last 30 Days</option>
                    </select>

                    <!-- Add Job Button -->
                    <a href="{{ route('employer.add') }}"
                        class="flex items-center bg-green-500 text-white px-3 py-1 rounded w-full md:w-auto justify-center">
                        <i class="fas fa-plus mr-2"></i> <!-- Font Awesome icon -->
                        Add Job
                    </a>
                </div>


            </div>
        </div>
    </div>


    <div class="container mx-auto max-w-8xl px-4 pt-2">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg max-h-screen overflow-y-auto ">
            <div class="p-6 text-gray-900 dark:text-gray-100 rounded-lg overflow-x-auto">
                <div class="overflow-x-auto">
                    <div class="min-w-full overflow-hidden overflow-x-auto">
                        <table id="jobTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="text-left">
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Job Type
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Location
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Vacancy
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Date Posted
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($jobs as $job)
                                    <tr data-date="{{ $job->created_at->format('Y-m-d') }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $job->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $job->job_type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $job->location }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $job->vacancy }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $job->created_at->format('F j, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <a href="{{ route('employer.edit', $job->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                                            <form action="{{ route('employer.delete', ['id' => $job->id]) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>


    @if (Session::has('jobinfodelete'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("{{ Session::get('jobinfodelete') }}", 'Job has been Deleted', {
                    timeOut: 5000
                });
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateFilter = document.getElementById('dateFilter');
            const jobTable = document.getElementById('jobTable');
            const header = jobTable.querySelector('thead'); // Select the table header

            dateFilter.addEventListener('change', function() {
                const selectedFilter = dateFilter.value;
                const today = new Date();

                const rows = jobTable.getElementsByTagName('tr');
                for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
                    const row = rows[i];
                    const jobDate = new Date(row.getAttribute('data-date'));

                    switch (selectedFilter) {
                        case 'last-24-hours':
                            if (today - jobDate <= 24 * 60 * 60 * 1000) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                        case 'last-7-days':
                            if (today - jobDate <= 7 * 24 * 60 * 60 * 1000) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                        case 'last-30-days':
                            if (today - jobDate <= 30 * 24 * 60 * 60 * 1000) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                            break;
                        default:
                            row.style.display = '';
                            break;
                    }
                }
            });
        });
    </script>
</x-app-layout>
