<x-app-layout>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="h-full ml-14 md:ml-64">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 p-4 gap-4">
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200">{{ $userCount }}</p>
                    <p>PWD Users</p>
                </div>
            </div>
            <!-- Employers Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200">{{ $employerCount }}</p>
                    <p>Employers</p>
                </div>
            </div>
            <!-- Jobs Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200">{{ $jobInfoCount }}</p>
                    <p>Jobs</p>
                </div>
            </div>
            <!-- Unemployed PWD Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200">{{ $hiredjobCount }}
                    <p>Hired PWDs</p>
                </div>
            </div>
            <!-- Employed PWD Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200">{{ $pendingjobCount }}</p>
                    <p>Pending Applications</p>
                </div>
            </div>
        </div>
        <!-- ./Statistics Cards -->


        <div class="mt-4 mx-4">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">PWD Information of PWDs
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <canvas id="disabilityOccurenceChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-md text-gray-900 dark:text-gray-50">Disability Occurrence
                                </h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Occurrences
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityOccurrences as $disability => $occurrences)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $disability }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $occurrences }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
                                                        $totalOccurrences = $disabilityOccurrences->sum();
                                                        $percentage =
                                                            $totalOccurrences > 0
                                                                ? ($occurrences / $totalOccurrences) * 100
                                                                : 0;
                                                    @endphp
                                                    <span class="mr-2">{{ round($percentage, 2) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $percentage }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'disabilityoccurence']) }}"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>

                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <!-- Chart for Type of Disability -->
                        <canvas id="disabilityTypeChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-md text-gray-900 dark:text-gray-50">Type of Disability
                                </h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Type of Disability
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Occurrences
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityType as $disability => $occurrences)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $disability }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $occurrences }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
                                                        $totalOccurrences = $disabilityType->sum();
                                                        $percentage =
                                                            $totalOccurrences > 0
                                                                ? ($occurrences / $totalOccurrences) * 100
                                                                : 0;
                                                    @endphp
                                                    <span class="mr-2">{{ round($percentage, 2) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $percentage }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'disabilitytype']) }}"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>
            </div>



            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx1 = document.getElementById('disabilityOccurenceChart').getContext('2d');
                    var disabilityOccurrences = @json($disabilityOccurrences);

                    var labels1 = Object.keys(disabilityOccurrences);
                    var data1 = Object.values(disabilityOccurrences);

                    var ctx2 = document.getElementById('disabilityTypeChart').getContext('2d');
                    var disabilityType = @json($disabilityType);

                    var labels2 = Object.keys(disabilityType);
                    var data2 = Object.values(disabilityType);

                    var darkMode = localStorage.getItem('darkMode') === 'true';

                    var lineColor = darkMode ? 'rgba(255, 99, 132, 1)' : 'rgba(54, 162, 235, 1)';
                    var bgColor = darkMode ? 'rgba(255, 99, 132, 0.2)' : 'rgba(54, 162, 235, 0.2)';
                    var gridColor = darkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                    var fontColor = darkMode ? 'white' : 'black';

                    var disabilityOccurenceChart = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: labels1,
                            datasets: [{
                                label: 'Disability Occurrence',
                                data: data1,
                                borderColor: lineColor,
                                backgroundColor: bgColor,
                                borderWidth: 1,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: gridColor
                                    },
                                    ticks: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 14 // Adjust font size for y-axis ticks
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        color: gridColor
                                    },
                                    ticks: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 14 // Adjust font size for x-axis ticks
                                        }
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 16 // Adjust font size for legend labels
                                        }
                                    }
                                },
                                tooltip: {
                                    bodyFont: {
                                        family: 'Poppins',
                                        size: 14 // Adjust font size for tooltip body
                                    },
                                    titleFont: {
                                        family: 'Poppins',
                                        size: 16 // Adjust font size for tooltip title
                                    }
                                }
                            }
                        }
                    });

                    var disabilityTypeChart = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: labels2,
                            datasets: [{
                                label: 'Type of Disability',
                                data: data2,
                                borderColor: lineColor,
                                backgroundColor: bgColor,
                                borderWidth: 1,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: gridColor
                                    },
                                    ticks: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 14 // Adjust font size for y-axis ticks
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        color: gridColor
                                    },
                                    ticks: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 14 // Adjust font size for x-axis ticks
                                        }
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        color: fontColor,
                                        font: {
                                            family: 'Poppins',
                                            size: 16 // Adjust font size for legend labels
                                        }
                                    }
                                },
                                tooltip: {
                                    bodyFont: {
                                        family: 'Poppins',
                                        size: 14 // Adjust font size for tooltip body
                                    },
                                    titleFont: {
                                        family: 'Poppins',
                                        size: 16 // Adjust font size for tooltip title
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
            <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
                <!-- Most Employable Skills -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">

                        <canvas id="skillsChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-md text-gray-900 dark:text-gray-50">Top PWD
                                    Skills for PWDs</h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            {{ $othersCount }}
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <span
                                                    class="mr-2">{{ number_format(($othersCount / $totalSkillsCount) * 100, 1) }}%</span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                        <div style="width: {{ number_format(($othersCount / $totalSkillsCount) * 100, 1) }}%"
                                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center mt-4">
                                <a href="{{ route('admin.details', ['type' => 'skills']) }}"
                                    class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                                    More</a>
                            </div>

                            <!-- Modal -->
                            <div id="chartModal"
                                class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-3/4 max-w-4xl">
                                    <div
                                        class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Detailed
                                            Charts</h3>
                                        <button id="closeModal"
                                            class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-400">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <!-- Modal content: charts -->
                                        <canvas id="modalDisabilityOccurenceChart" class="p-5" width="800"
                                            height="600"></canvas>
                                        <canvas id="modalDisabilityTypeChart" class="p-5" width="800"
                                            height="600"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Least Employable Skills -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">

                        <canvas id="leastEmployableSkillsChart" class="p-5" width="800"
                            height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Least PWD
                                    Skills for PWDs</h3>
                            </div>
                        </div>

                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastEmployableSkills as $skill => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            {{ $leastEmployableOthersCount }}
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <span
                                                    class="mr-2">{{ number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1) }}%</span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                        <div style="width: {{ number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1) }}%"
                                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'leastskills']) }}"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                            More</a>
                    </div>
                </div>


                <script>
                    // Global variables to store the Chart.js instances
                    let skillsChart;
                    let leastEmployableSkillsChart;

                    // Function to initialize or update the most employable skills chart
                    function initializeSkillsChart(darkMode) {
                        const skillsData = @json($skills); // Prepare data for Chart.js
                        const othersCount = @json($othersCount); // Get the count of "Others"

                        // Include "Others" in the skills data
                        skillsData["Others"] = othersCount;

                        const labels = Object.keys(skillsData); // Ensure this is correctly defined
                        const data = Object.values(skillsData);

                        // Define color schemes
                        const darkModeColors = {
                            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Light teal
                            borderColor: 'rgba(75, 192, 192, 1)', // Darker teal
                            axisColor: '#E5E7EB', // Light color for text
                            gridColor: 'rgba(255, 255, 255, 0.4)' // Light grid lines
                        };

                        const lightModeColors = {
                            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Light pink
                            borderColor: 'rgba(255, 99, 132, 1)', // Darker pink
                            axisColor: '#000', // Dark color for text
                            gridColor: 'rgba(0, 0, 0, 0.1)' // Light grid lines
                        };

                        // Choose colors based on darkMode setting
                        const colors = darkMode ? darkModeColors : lightModeColors;

                        const ctx = document.getElementById('skillsChart').getContext('2d');

                        // Destroy previous chart instance if it exists
                        if (skillsChart) {
                            skillsChart.destroy();
                        }

                        // Initialize the chart with the chosen colors and custom font settings
                        skillsChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Top PWD Skills Count',
                                    data: data,
                                    backgroundColor: colors.backgroundColor,
                                    borderColor: colors.borderColor,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        labels: {
                                            color: colors.axisColor, // Legend text color
                                            font: {
                                                family: 'Arial', // Custom font family
                                                size: 14, // Custom font size
                                                style: 'italic', // Custom font style
                                                weight: 'bold' // Custom font weight
                                            }
                                        }
                                    },
                                    tooltip: {
                                        backgroundColor: darkMode ? '#333' : '#fff', // Dark or light tooltip background
                                        titleColor: colors.axisColor, // Tooltip title color
                                        bodyColor: colors.axisColor, // Tooltip body color
                                        titleFont: {
                                            family: 'Poppins', // Custom font family for tooltip title
                                            size: 16, // Custom font size for tooltip title
                                            style: 'normal', // Custom font style for tooltip title
                                            weight: 'bold' // Custom font weight for tooltip title
                                        },
                                        bodyFont: {
                                            family: 'Poppins', // Custom font family for tooltip body
                                            size: 14, // Custom font size for tooltip body
                                            style: 'normal', // Custom font style for tooltip body
                                            weight: 'normal' // Custom font weight for tooltip body
                                        }
                                    }
                                },
                                scales: {
                                    x: {
                                        ticks: {
                                            color: colors.axisColor, // X-axis text color
                                            font: {
                                                family: 'Poppins', // Custom font family
                                                size: 12, // Custom font size
                                                style: 'normal', // Custom font style
                                                weight: 'normal' // Custom font weight
                                            }
                                        },
                                        grid: {
                                            color: colors.gridColor // X-axis grid line color
                                        }
                                    },
                                    y: {
                                        ticks: {
                                            color: colors.axisColor, // Y-axis text color
                                            font: {
                                                family: 'Poppins', // Custom font family
                                                size: 12, // Custom font size
                                                style: 'normal', // Custom font style
                                                weight: 'normal' // Custom font weight
                                            }
                                        },
                                        grid: {
                                            color: colors.gridColor // Y-axis grid line color
                                        }
                                    }
                                },
                                layout: {
                                    padding: {
                                        left: 10,
                                        right: 10,
                                        top: 10,
                                        bottom: 10
                                    }
                                }
                            }
                        });
                    }

                    // Function to initialize or update the least employable skills chart
                    function initializeLeastEmployableSkillsChart(darkMode) {
                        const leastEmployableSkillsData = @json($leastEmployableSkills); // Prepare data for Chart.js
                        const leastEmployableOthersCount = @json($leastEmployableOthersCount); // Get the count of "Others"

                        // Include "Others" in the skills data
                        leastEmployableSkillsData["Others"] = leastEmployableOthersCount;
                        const labels = Object.keys(leastEmployableSkillsData); // Ensure this is correctly defined
                        const data = Object.values(leastEmployableSkillsData);

                        // Define color schemes
                        const darkModeColors = {
                            backgroundColor: 'rgba(255, 159, 64, 0.6)', // Light orange
                            borderColor: 'rgba(255, 159, 64, 1)', // Darker orange
                            axisColor: '#E5E7EB', // Light color for text
                            gridColor: 'rgba(255, 255, 255, 0.4)' // Light grid lines
                        };

                        const lightModeColors = {
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Light blue
                            borderColor: 'rgba(54, 162, 235, 1)', // Darker blue
                            axisColor: '#000', // Dark color for text
                            gridColor: 'rgba(0, 0, 0, 0.1)' // Light grid lines
                        };

                        // Choose colors based on darkMode setting
                        const colors = darkMode ? darkModeColors : lightModeColors;

                        const ctx = document.getElementById('leastEmployableSkillsChart').getContext('2d');

                        // Destroy previous chart instance if it exists
                        if (leastEmployableSkillsChart) {
                            leastEmployableSkillsChart.destroy();
                        }

                        // Initialize the chart with the chosen colors and custom font settings
                        leastEmployableSkillsChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Least PWD Skills Count',
                                    data: data,
                                    backgroundColor: colors.backgroundColor,
                                    borderColor: colors.borderColor,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        labels: {
                                            color: colors.axisColor, // Legend text color
                                            font: {
                                                family: 'Poppins', // Custom font family
                                                size: 14, // Custom font size
                                                style: 'italic', // Custom font style
                                                weight: 'bold' // Custom font weight
                                            }
                                        }
                                    },
                                    tooltip: {
                                        backgroundColor: darkMode ? '#333' : '#fff', // Dark or light tooltip background
                                        titleColor: colors.axisColor, // Tooltip title color
                                        bodyColor: colors.axisColor, // Tooltip body color
                                        titleFont: {
                                            family: 'Poppins', // Custom font family for tooltip title
                                            size: 16, // Custom font size for tooltip title
                                            style: 'normal', // Custom font style for tooltip title
                                            weight: 'bold' // Custom font weight for tooltip title
                                        },
                                        bodyFont: {
                                            family: 'Poppins', // Custom font family for tooltip body
                                            size: 14, // Custom font size for tooltip body
                                            style: 'normal', // Custom font style for tooltip body
                                            weight: 'normal' // Custom font weight for tooltip body
                                        }
                                    }
                                },
                                scales: {
                                    x: {
                                        ticks: {
                                            color: colors.axisColor, // X-axis text color
                                            font: {
                                                family: 'Poppins', // Custom font family
                                                size: 12, // Custom font size
                                                style: 'normal', // Custom font style
                                                weight: 'normal' // Custom font weight
                                            }
                                        },
                                        grid: {
                                            color: colors.gridColor // X-axis grid line color
                                        }
                                    },
                                    y: {
                                        ticks: {
                                            color: colors.axisColor, // Y-axis text color
                                            font: {
                                                family: 'Poppins', // Custom font family
                                                size: 12, // Custom font size
                                                style: 'normal', // Custom font style
                                                weight: 'normal' // Custom font weight
                                            }
                                        },
                                        grid: {
                                            color: colors.gridColor // Y-axis grid line color
                                        }
                                    }
                                },
                                layout: {
                                    padding: {
                                        left: 10,
                                        right: 10,
                                        top: 10,
                                        bottom: 10
                                    }
                                }
                            }
                        });
                    }

                    // Retrieve darkMode setting from local storage
                    const darkMode = localStorage.getItem('darkMode') === 'true'; // or 'false', based on how you store it

                    // Initialize charts
                    initializeSkillsChart(darkMode);
                    initializeLeastEmployableSkillsChart(darkMode);
                </script>
            </div>

            <!-- Education Analytics Section -->
            <div class="mt-8 mx-4">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Education Analytics for
                    PWDs
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Most Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">

                            <div class="container mx-auto p-10" width="700" height="600">
                                <canvas id="educationPieChart"></canvas>
                            </div>
                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top
                                        Education Levels for PWDs</h3>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Education Level</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mostEmployableEducationLevels as $level => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $level }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1) }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1) }}%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.details', ['type' => 'education']) }}"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                                More</a>
                        </div>
                    </div>




                    <!-- Least Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="mx-auto p-10">
                                <canvas id="educationPieChartLeastEmployable" width="800" height="600"
                                    class=""></canvas>
                            </div>

                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Least
                                        Education Levels for PWDs</h3>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Education Level</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leastEmployableEducationLevels as $level => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $level }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ number_format(($count / $leastEmployableEducationLevels->sum()) * 100, 1) }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1) }}%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.details', ['type' => 'leasteducation']) }}"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                                More</a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Employment Type Analytics Section -->


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get dark mode preference from local storage
                    function getDarkMode() {
                        return localStorage.getItem('darkMode') === 'true';
                    }

                    // Assuming both $mostEmployableEducationLevels and $leastEmployableEducationLevels are passed to JavaScript as JSON
                    const mostEmployableEducationData = @json($mostEmployableEducationLevels);
                    const leastEmployableEducationData = @json($leastEmployableEducationLevels);

                    // Prepare data for both pie charts
                    const mostEmployableLabels = Object.keys(mostEmployableEducationData);
                    const mostEmployableData = Object.values(mostEmployableEducationData);

                    const leastEmployableLabels = Object.keys(leastEmployableEducationData);
                    const leastEmployableData = Object.values(leastEmployableEducationData);

                    // Determine if dark mode is enabled
                    const darkMode = getDarkMode();

                    // Define colors based on dark mode
                    const backgroundColor = darkMode ? [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ] : [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ];

                    const borderColor = darkMode ? [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ] : [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ];

                    // Define label colors based on dark mode
                    const labelColor = darkMode ? '#ffffff' : '#000000';
                    const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
                    const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
                    const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
                    const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'; // Grid color

                    // Get the canvas elements
                    const ctxMostEmployable = document.getElementById('educationPieChart').getContext('2d');
                    const ctxLeastEmployable = document.getElementById('educationPieChartLeastEmployable').getContext('2d');

                    // Create the pie chart for most employable education levels
                    new Chart(ctxMostEmployable, {
                        type: 'pie',
                        data: {
                            labels: mostEmployableLabels,
                            datasets: [{
                                label: 'Most Employable Education Levels',
                                data: mostEmployableData,
                                backgroundColor: backgroundColor,
                                borderColor: borderColor,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        color: labelColor,
                                        font: {
                                            family: 'Poppins', // Apply Poppins font
                                            size: 14 // Adjust font size if needed
                                        }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: tooltipBackgroundColor,
                                    titleColor: tooltipTitleColor,
                                    bodyColor: tooltipBodyColor,
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                                ((tooltipItem.raw / mostEmployableData.reduce((a, b) => a + b,
                                                    0)) * 100)
                                                .toFixed(1) + '%)';
                                        }
                                    },
                                    bodyFont: {
                                        family: 'Poppins' // Apply Poppins font
                                    },
                                    titleFont: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            },
                            // Apply Poppins font to the chart title, scales, etc.
                            scales: {
                                x: {
                                    grid: {
                                        color: gridColor // Apply grid color
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Poppins' // Apply Poppins font
                                        }
                                    }
                                },
                                y: {
                                    grid: {
                                        color: gridColor // Apply grid color
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Poppins' // Apply Poppins font
                                        }
                                    }
                                }
                            }
                        }
                    });

                    // Create the pie chart for least employable education levels
                    new Chart(ctxLeastEmployable, {
                        type: 'pie',
                        data: {
                            labels: leastEmployableLabels,
                            datasets: [{
                                label: 'Least Employable Education Levels',
                                data: leastEmployableData,
                                backgroundColor: backgroundColor,
                                borderColor: borderColor,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        color: labelColor,
                                        font: {
                                            family: 'Poppins', // Apply Poppins font
                                            size: 14 // Adjust font size if needed
                                        }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: tooltipBackgroundColor,
                                    titleColor: tooltipTitleColor,
                                    bodyColor: tooltipBodyColor,
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                                ((tooltipItem.raw / leastEmployableData.reduce((a, b) => a + b,
                                                    0)) * 100)
                                                .toFixed(1) + '%)';
                                        }
                                    },
                                    bodyFont: {
                                        family: 'Poppins' // Apply Poppins font
                                    },
                                    titleFont: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            },
                            // Apply Poppins font to the chart title, scales, etc.
                            scales: {
                                x: {
                                    grid: {
                                        color: gridColor // Apply grid color
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Poppins' // Apply Poppins font
                                        }
                                    }
                                },
                                y: {
                                    grid: {
                                        color: gridColor // Apply grid color
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Poppins' // Apply Poppins font
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            </script>



            <div class="mt-8 mx-4">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Employment Type Analytics for
                    PWDs</h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Most Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="container mx-auto p-10" width="700" height="600">
                                <canvas id="employmentTypePieChartMostEmployable"></canvas>
                            </div>
                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top Employment
                                        Types for PWDs</h3>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employment Type</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mostEmployableEmploymentTypes as $type => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $type }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1) }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1) }}%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.details', ['type' => 'mostemployment']) }}"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                        </div>
                    </div>

                    <!-- Least Employable Employment Types -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="mx-auto p-10">
                                <canvas id="employmentTypePieChartLeastEmployable" width="800" height="600"
                                    class=""></canvas>
                            </div>

                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Least
                                        Employment Types for PWDs</h3>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employment Type</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed</th>
                                            <th
                                                class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leastEmployableEmploymentTypes as $type => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $type }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1) }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1) }}%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.details', ['type' => 'leastemployment']) }}"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-8 mx-4 p-4">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Age Bin Analytics for PWDs</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Most Common Age Bins -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="ageBinChartMostCommon"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top Age Bins for
                                    PWDs</h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Age Bin</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mostCommonAges as $bin => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $bin }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
                                                        $totalCount = $mostCommonAges->sum();
                                                        $percentage =
                                                            $totalCount > 0
                                                                ? number_format(($count / $totalCount) * 100, 1)
                                                                : 0;
                                                    @endphp
                                                    <span class="mr-2">{{ $percentage }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $percentage }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'mostagesbins']) }}"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>

                <!-- Least Common Age Bins -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="mx-auto p-10">
                            <canvas id="ageBinChartLeastCommon" width="800" height="600"></canvas>
                        </div>

                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Least Age Bins for
                                    PWDs</h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Age Bin</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastCommonAges as $bin => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $bin }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
                                                        $totalCount = $leastCommonAges->sum();
                                                        $percentage =
                                                            $totalCount > 0
                                                                ? number_format(($count / $totalCount) * 100, 1)
                                                                : 0;
                                                    @endphp
                                                    <span class="mr-2">{{ $percentage }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $percentage }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'leastagesbins']) }}"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get dark mode preference from local storage
                function getDarkMode() {
                    return localStorage.getItem('darkMode') === 'true';
                }

                // Assuming both $mostCommonAges and $leastCommonAges are passed to JavaScript as JSON
                const mostCommonAgesData = @json($mostCommonAges);
                const leastCommonAgesData = @json($leastCommonAges);

                // Prepare data for both pie charts
                const mostCommonAgesLabels = Object.keys(mostCommonAgesData);
                const mostCommonAgesCounts = Object.values(mostCommonAgesData);

                const leastCommonAgesLabels = Object.keys(leastCommonAgesData);
                const leastCommonAgesCounts = Object.values(leastCommonAgesData);

                // Determine if dark mode is enabled
                const darkMode = getDarkMode();

                // Define colors based on dark mode
                const backgroundColor = darkMode ? [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ] : [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ];

                const borderColor = darkMode ? [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ] : [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ];

                // Define label colors based on dark mode
                const labelColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
                const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
                const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'; // Grid color

                // Get the canvas elements
                const ctxMostCommonAges = document.getElementById('ageBinChartMostCommon').getContext('2d');
                const ctxLeastCommonAges = document.getElementById('ageBinChartLeastCommon').getContext('2d');

                // Create the pie chart for most common age bins
                new Chart(ctxMostCommonAges, {
                    type: 'pie',
                    data: {
                        labels: mostCommonAgesLabels,
                        datasets: [{
                            label: 'Most Common Age Bins',
                            data: mostCommonAgesCounts,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: labelColor,
                                    font: {
                                        family: 'Poppins', // Apply Poppins font
                                        size: 14 // Adjust font size if needed
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: tooltipBackgroundColor,
                                titleColor: tooltipTitleColor,
                                bodyColor: tooltipBodyColor,
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                            ((tooltipItem.raw / mostCommonAgesCounts.reduce((a, b) => a + b,
                                                0)) * 100)
                                            .toFixed(1) + '%)';
                                    }
                                },
                                bodyFont: {
                                    family: 'Poppins' // Apply Poppins font
                                },
                                titleFont: {
                                    family: 'Poppins' // Apply Poppins font
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    color: gridColor // Apply grid color
                                },
                                ticks: {
                                    font: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            },
                            y: {
                                grid: {
                                    color: gridColor // Apply grid color
                                },
                                ticks: {
                                    font: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            }
                        }
                    }
                });

                // Create the pie chart for least common age bins
                new Chart(ctxLeastCommonAges, {
                    type: 'pie',
                    data: {
                        labels: leastCommonAgesLabels,
                        datasets: [{
                            label: 'Least Common Age Bins',
                            data: leastCommonAgesCounts,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: labelColor,
                                    font: {
                                        family: 'Poppins', // Apply Poppins font
                                        size: 14 // Adjust font size if needed
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: tooltipBackgroundColor,
                                titleColor: tooltipTitleColor,
                                bodyColor: tooltipBodyColor,
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                            ((tooltipItem.raw / leastCommonAgesCounts.reduce((a, b) => a +
                                                b, 0)) * 100)
                                            .toFixed(1) + '%)';
                                    }
                                },
                                bodyFont: {
                                    family: 'Poppins' // Apply Poppins font
                                },
                                titleFont: {
                                    family: 'Poppins' // Apply Poppins font
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    color: gridColor // Apply grid color
                                },
                                ticks: {
                                    font: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            },
                            y: {
                                grid: {
                                    color: gridColor // Apply grid color
                                },
                                ticks: {
                                    font: {
                                        family: 'Poppins' // Apply Poppins font
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get dark mode preference from local storage
                function getDarkMode() {
                    return localStorage.getItem('darkMode') === 'true';
                }

                // Assuming $mostEmployableEmploymentTypes and $leastEmployableEmploymentTypes are passed to JavaScript as JSON
                const mostEmployableEmploymentData = @json($mostEmployableEmploymentTypes);
                const leastEmployableEmploymentData = @json($leastEmployableEmploymentTypes);

                // Prepare data for both pie charts
                const mostEmployableLabels = Object.keys(mostEmployableEmploymentData);
                const mostEmployableData = Object.values(mostEmployableEmploymentData);

                const leastEmployableLabels = Object.keys(leastEmployableEmploymentData);
                const leastEmployableData = Object.values(leastEmployableEmploymentData);

                // Determine if dark mode is enabled
                const darkMode = getDarkMode();

                // Define colors based on dark mode
                const backgroundColor = darkMode ? [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ] : [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ];

                const borderColor = darkMode ? [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ] : [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ];

                // Define label colors based on dark mode
                const labelColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
                const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';

                // Get the canvas elements
                const ctxMostEmployable = document.getElementById('employmentTypePieChartMostEmployable').getContext(
                    '2d');
                const ctxLeastEmployable = document.getElementById('employmentTypePieChartLeastEmployable').getContext(
                    '2d');

                // Create the pie chart for most employable employment types
                new Chart(ctxMostEmployable, {
                    type: 'pie',
                    data: {
                        labels: mostEmployableLabels,
                        datasets: [{
                            label: 'Most Employable Employment Types',
                            data: mostEmployableData,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: labelColor,
                                    font: {
                                        family: 'Poppins', // Apply Poppins font
                                        size: 14 // Adjust font size if needed
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: tooltipBackgroundColor,
                                titleColor: tooltipTitleColor,
                                bodyColor: tooltipBodyColor,
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                            ((tooltipItem.raw / mostEmployableData.reduce((a, b) => a + b,
                                                0)) * 100)
                                            .toFixed(1) + '%)';
                                    }
                                },
                                bodyFont: {
                                    family: 'Poppins' // Apply Poppins font
                                },
                                titleFont: {
                                    family: 'Poppins' // Apply Poppins font
                                }
                            }
                        }
                    }
                });

                // Create the pie chart for least employable employment types
                new Chart(ctxLeastEmployable, {
                    type: 'pie',
                    data: {
                        labels: leastEmployableLabels,
                        datasets: [{
                            label: 'Least Employable Employment Types',
                            data: leastEmployableData,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: labelColor,
                                    font: {
                                        family: 'Poppins', // Apply Poppins font
                                        size: 14 // Adjust font size if needed
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: tooltipBackgroundColor,
                                titleColor: tooltipTitleColor,
                                bodyColor: tooltipBodyColor,
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' (' +
                                            ((tooltipItem.raw / leastEmployableData.reduce((a, b) => a + b,
                                                0)) * 100)
                                            .toFixed(1) + '%)';
                                    }
                                },
                                bodyFont: {
                                    family: 'Poppins' // Apply Poppins font
                                },
                                titleFont: {
                                    family: 'Poppins' // Apply Poppins font
                                }
                            }
                        }
                    }
                });
            });
        </script>





        <!-- Client Table -->
        <div class="mt-4 mx-4 p-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">USERS</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($users as $user)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    {{ $user->usertype }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <!-- Change the status dynamically based on user data -->
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight {{ $user->account_verification_status == 'approved' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-gray-700 bg-orange-100 dark:bg-orange-700 dark:text-red-100' }} rounded-full">
                                            {{ $user->account_verification_status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $user->created_at->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid mb-10 px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-start">
                        <nav aria-label="Table navigation" class="p-2">
                            <ul class="inline-flex items-left">
                                <li>
                                    <a href="{{ route('admin.manageusers') }}"
                                        class=" px-2 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        View More
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

</x-app-layout>
