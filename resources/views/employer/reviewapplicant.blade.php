<x-app-layout>
    <title>Review Applicants</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>

    @if (Session::has('hireapplicant'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("{{ Session::get('hireapplicant') }}", 'Job Application Status Updated.', {
                    timeOut: 5000
                });

            });
        </script>
    @endif

    <div class="py-12">
        <div class="container mx-auto max-w-8xl px-4 pt-2 mb-2">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg text-gray-800 dark:text-gray-300">
                        <ol class="breadcrumb mb-0 flex items-center justify-between flex-wrap">
                            <li class="breadcrumb-item w-full md:w-auto">
                                <a href="{{ route('employer.dashboard') }}"
                                    class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>Back to Dashboard</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item w-full md:w-auto ml-auto flex space-x-4 mt-4 md:mt-0">
                                <form action="{{ route('employer.review') }}" method="GET" class="w-full">
                                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 w-full">
                                        <select id="dateFilter" name="dateFilter"
                                            class="bg-gray-100 border border-gray-600 text-gray-900 px-3 py-2 rounded focus:outline-none focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 flex-1">
                                            <option value="All">All</option>
                                            <option value="last-24-hours">Last 24 Hours</option>
                                            <option value="last-7-days">Last 7 Days</option>
                                            <option value="last-30-days">Last 30 Days</option>
                                        </select>
                                        <select id="anotherFilter" name="anotherFilter"
                                            class="bg-gray-100 border border-gray-600 text-gray-900 px-8 py-2 rounded focus:outline-none focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 flex-1">
                                            <option value="All" selected disabled>Status</option>
                                            <option value="Hired">Hired</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Deleted">Deleted</option>
                                        </select>
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:bg-blue-600">
                                            Apply
                                        </button>
                                    </div>
                                </form>
                            </li>

                        </ol>
                    </nav>

                </div>
            </div>
        </div>

        <div class="container mx-auto max-w-8xl px-4 pt-2 mb-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 rounded-lg">
                    <div class="overflow-x-auto">
                        <div class="min-w-full overflow-hidden overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr class="text-left">
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium  text-center text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                            Description</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium  text-center text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium  text-center text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                            Remarks</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                            Date Applied</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($applications as $field)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-normal">
                                                <div class="max-w-xs overflow-hidden overflow-ellipsis">
                                                    {{ $field->description }}
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-center font-bold {{ $field->status === 'pending' ? 'text-orange-500' : ($field->status === 'hired' ? 'text-green-500' : '') }}">
                                                {{ $field->status }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-normal text-center">
                                                <div class="max-w-xs overflow-hidden overflow-ellipsis">
                                                    {{ $field->remarks }}
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-center font-bold {{ $field->status === 'pending' ? 'text-orange-500' : ($field->status === 'hired' ? 'text-green-500' : '') }}">
                                                {{ $field->created_at->format('F j, Y') }}
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @if ($field->status !== 'hired')
                                                    <a href="{{ route('employer.applicantinfo', ['id' => $field->user_id]) }}"
                                                        class="review-application-link">
                                                        <i class="fas fa-check-circle mr-2"></i> Review Application
                                                    </a>
                                                @else
                                                    <span class="text-success">Hired</span>
                                                @endif
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
    </div>
</x-app-layout>
<style>
    .review-application-link {
        display: inline-block;
        background-color: #1db17a;
        /* Green-500 */
        color: #ffffff;
        /* White */
        padding: 8px 16px;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
        text-decoration: none;
    }

    .review-application-link:hover {
        background-color: #000000;
        /* Black */
        color: #ffffff;
        /* White */
    }
</style>
