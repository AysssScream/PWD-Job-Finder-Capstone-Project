<x-app-layout>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <div class="h-full ml-14 md:ml-64">
        <div
            class="py-5 px-6 rounded-b-lg  shadow-md bg-gradient-to-r from-blue-500 to-blue-900 dark:from-gray-800 dark:to-gray-900">
            <div class="flex items-center space-x-2 ">
                <i class="fas fa-tachometer-alt text-white dark:text-gray-300 text-2xl"></i>
                <h1 class="text-2xl font-bold text-white dark:text-gray-300">Admin Dashboard</h1>
            </div>
        </div>
        <div id="notificationModal"
            class="fixed inset-0 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center"
            style="background-color: rgba(0, 0, 0, 0.7);">
            <div
                class="relative p-8 w-11/12 max-w-2xl rounded-lg shadow-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <div class="mt-3 text-center">
                    <div
                        class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 dark:bg-yellow-900">
                        <i class="fas fa-exclamation-triangle text-3xl text-yellow-600 dark:text-yellow-400"></i>
                    </div>
                    <h3 class="text-2xl leading-6 font-bold text-gray-900 dark:text-white mt-6 mb-4">Need For Approval
                    </h3>
                    <div class="mt-4 px-7 py-3">
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            You have <span id="pendingCount"
                                class="font-bold text-yellow-600 dark:text-yellow-400"></span> user applications waiting
                            for your review.
                        </p>
                    </div>
                    <div class="items-center px-4 py-5">
                        <a href="{{ route('admin.manageusers') }}" id="reviewButton"
                            class="px-6 py-3 bg-yellow-500 dark:bg-yellow-600 text-white text-lg font-medium rounded-md w-full inline-block hover:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">
                            Review Applications
                        </a>
                    </div>
                    <button id="closeModal"
                        class="mt-4 text-base text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition duration-300 ease-in-out">
                        I'll review later
                    </button>
                </div>
            </div>
        </div>

        <div id="notificationModal"
            class="fixed inset-0 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center"
            style="background-color: rgba(0, 0, 0, 0.7);">
            <div
                class="relative p-6 w-11/12 max-w-2xl rounded-lg shadow-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <div class="mt-3 text-center">
                    <div
                        class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 dark:bg-yellow-900">
                        <i class="fas fa-exclamation-triangle text-6xl text-yellow-600 dark:text-yellow-400"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl leading-6 font-bold text-gray-900 dark:text-white mt-6 mb-4">Need for
                        Approval</h3>
                    <div class="p-4 flex-1 overflow-y-auto" style="max-height: calc(90vh - 120px);">
                        <div class="mt-4 px-6 py-3"> <!-- Adjusted padding here -->
                            <p class="text-lg text-gray-600 dark:text-gray-300">
                                You have <span id="pendingCount"
                                    class="font-bold text-yellow-600 dark:text-yellow-400"></span> user applications
                                waiting for your review.
                            </p>
                        </div>
                    </div>
                    <div class="items-center px-4 py-5">
                        <a href="{{ route('admin.manageusers') }}" id="reviewButton"
                            class="px-6 py-3 bg-yellow-500 dark:bg-yellow-600 text-white text-lg font-medium rounded-md w-full inline-block hover:bg-yellow-700 dark:hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                            Review Applications
                        </a>

                        <button id="closeModal"
                            class="px-6 py-3 mt-4 bg-green-500 dark:bg-green-600 text-white text-lg font-medium rounded-md w-full inline-block hover:bg-yellow-700 dark:hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                            I'll review later
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pendingCount = {{ $waitingUsersCount }};
                const notificationModal = document.getElementById('notificationModal');
                const closeModal = document.getElementById('closeModal');
                const pendingCountElement = document.getElementById('pendingCount');
                const reviewButton = document.getElementById('reviewButton');

                function showModal() {
                    notificationModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Prevent scrolling
                }

                function hideModal() {
                    notificationModal.classList.add('hidden');
                    document.body.style.overflow = ''; // Re-enable scrolling
                }

                if ({{ $showNotification ? 'true' : 'false' }}) {
                    pendingCountElement.textContent = pendingCount;
                    showModal();

                    // Disable all interactive elements outside the modal
                    document.querySelectorAll('a, button, input, select, textarea').forEach(el => {
                        if (!notificationModal.contains(el)) {
                            el.setAttribute('tabindex', '-1');
                            el.setAttribute('aria-hidden', 'true');
                        }
                    });
                }

                closeModal.addEventListener('click', function() {
                    hideModal();
                    // Re-enable all interactive elements
                    document.querySelectorAll('a, button, input, select, textarea').forEach(el => {
                        el.removeAttribute('tabindex');
                        el.removeAttribute('aria-hidden');
                    });
                });

                reviewButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    hideModal();
                    window.location.href = this.href;
                });

                // Prevent closing modal by clicking outside
                notificationModal.addEventListener('click', function(e) {
                    if (e.target === notificationModal) {
                        e.stopPropagation();
                    }
                });
            });
        </script>


        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 p-6 gap-6">
            <!-- Users Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-blue-200 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $userCount }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">PWD Users</p>
                </div>
            </div>

            <!-- Employers Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-building text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $employerCount }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">Employers</p>
                </div>
            </div>

            <!-- Jobs Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-blue-200 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $jobInfoCount }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">Jobs</p>
                </div>
            </div>

            <!-- Approved Job Applications Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-thumbs-up text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $hiredjobCount }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">Approved Applications</p>
                </div>
            </div>

            <!-- Pending Job Applications Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="stroke-current text-blue-800 dark:text-blue-200 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $pendingjobCount }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">Pending Applications</p>
                </div>
            </div>

            <!-- On-Review Accounts Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-check-circle text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ $accountCreations }}</p>
                    <p class="text-lg text-gray-500 dark:text-gray-400">On-Review Accounts</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-start space-y-4 p-8 rounded-lg">
            <!-- Interval Selection Buttons -->
            <div class="flex flex-col w-full md:flex-row space-x-0 md:space-x-4 space-y-4 md:space-y-0">
                <button onclick="updateChart('daily15')" id="dailyBtn"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Last 15 Days
                </button>
                <button onclick="updateChart('daily30')" id="weeklyBtn"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Daily
                </button>
                <button onclick="updateChart('monthly')" id="monthlyBtn"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Monthly
                </button>
                <button onclick="updateChart('yearly')" id="yearlyBtn"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Yearly
                </button>
            </div>

            <!-- First Chart Canvas -->
            <div class="w-full max-w-full p-4 bg-white dark:bg-gray-800 rounded-lg">
                <canvas id="userCountChart" width="400" height="500"></canvas>
            </div>
            <div class="flex flex-col w-full md:flex-row space-x-0 md:space-x-4 space-y-4 md:space-y-0">
                <button onclick="filterByDate('daily15')" id="daily15"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Last 15 Days
                </button>
                <button onclick="filterByDate('daily30')" id="daily30"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Last 30 Days
                </button>
                <button onclick="filterByDate('monthly')" id="monthly"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Last 12 Months
                </button>
                <button onclick="filterByDate('yearly')" id="yearly"
                    class="w-full px-4 py-2 bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-700 rounded hover:bg-blue-700 hover:text-white active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Last 12 Years
                </button>
            </div>

            <div class="w-full max-w-full p-4 bg-white dark:bg-gray-800 rounded-lg">
                <canvas id="verificationStatusChart" width="400" height="600"></canvas>
            </div>

        </div>

        <script>
            // Get dark mode setting from local storage
            const darkMode = localStorage.getItem('darkMode') === 'true';

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

            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
            const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)';

            // Initialize datasets
            const dataSets = {
                daily15: {
                    labels: {!! json_encode($dailyCounts->keys() ?? []) !!},
                    data: {!! json_encode($dailyCounts->values() ?? []) !!}
                },
                daily30: {
                    labels: {!! json_encode($dailyCounts30->keys() ?? []) !!},
                    data: {!! json_encode($dailyCounts30->values() ?? []) !!}
                },
                monthly: {
                    labels: {!! json_encode($monthlyCounts->keys() ?? []) !!},
                    data: {!! json_encode($monthlyCounts->values() ?? []) !!}
                },
                yearly: {
                    labels: {!! json_encode($yearlyCounts->keys() ?? []) !!},
                    data: {!! json_encode($yearlyCounts->values() ?? []) !!}
                }
            };
            Chart.register(ChartDataLabels);

            const ctx = document.getElementById('userCountChart').getContext('2d');
            let userCountChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dataSets.daily15.labels,
                    datasets: [{
                        label: 'User Count',
                        data: dataSets.daily15.data,
                        backgroundColor: backgroundColor,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1,
                        datalabels: {
                            anchor: 'right',
                            align: 'right',
                            color: labelColor,
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                tooltipFormat: 'MMM dd, yyyy',
                                displayFormats: {
                                    day: 'MMM dd',
                                    week: 'MMM dd',
                                    month: 'MMM yyyy',
                                    year: 'yyyy'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Date',
                                font: {
                                    family: 'Poppins',
                                    size: 16,
                                    weight: '600'
                                },
                                color: labelColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 14
                                },
                                color: labelColor
                            },
                            grid: {
                                color: gridColor
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Accounts',
                                font: {
                                    family: 'Poppins',
                                    size: 16,
                                    weight: '600'
                                },
                                color: labelColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 14
                                },
                                color: labelColor,
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                }
                            },
                            grid: {
                                color: gridColor
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Newly Created Accounts',
                            font: {
                                family: 'Poppins',
                                size: 20,
                                weight: '600'
                            },
                            color: labelColor
                        },
                        legend: {
                            labels: {
                                color: labelColor,
                                font: {
                                    size: 16,
                                    family: 'Poppins',
                                    weight: '600'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            enabled: true,
                            titleFont: {
                                family: 'Poppins',
                                size: 16,
                                weight: '600'
                            },
                            bodyFont: {
                                family: 'Poppins',
                                size: 14,
                                weight: '400'
                            },
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.dataset.label + ': ' + tooltipItem
                                        .raw; // Customize the label format
                                }
                            }
                        }
                    },
                    elements: {
                        point: {
                            radius: 5,
                            hoverRadius: 7
                        }
                    }
                }
            });

            function updateChart(interval) {
                if (dataSets[interval] && dataSets[interval].labels && dataSets[interval].data) {
                    userCountChart.data.labels = dataSets[interval].labels;
                    userCountChart.data.datasets[0].data = dataSets[interval].data;

                    // Dynamically adjust the time unit based on interval
                    let timeUnit;
                    if (interval === 'daily15') timeUnit = 'day';
                    else if (interval === 'daily30') timeUnit = 'day';
                    else if (interval === 'monthly') timeUnit = 'month';
                    else if (interval === 'yearly') timeUnit = 'year';

                    userCountChart.options.scales.x.time.unit = timeUnit;

                    userCountChart.update();
                } else {
                    console.error(`Data for interval '${interval}' is missing or incomplete.`);
                }

            }



            // Sample verification data sets (make sure these are populated from your backend)
            const verificationDataSets = {
                statuses: ['Approved', 'Pending', 'Waiting for Approval', 'Declined'], // Account statuses
                counts: {
                    daily15: [
                        {!! json_encode($statusData['approved_daily15']) !!}, // Approved count
                        {!! json_encode($statusData['pending_daily15']) !!}, // Pending count
                        {!! json_encode($statusData['waiting_for_approval_daily15']) !!}, // Waiting count
                        {!! json_encode($statusData['declined_daily15']) !!} // Declined count
                    ],
                    daily30: [
                        {!! json_encode($statusData['approved_daily30']) !!}, // Approved count
                        {!! json_encode($statusData['pending_daily30']) !!}, // Pending count
                        {!! json_encode($statusData['waiting_for_approval_daily30']) !!}, // Waiting count
                        {!! json_encode($statusData['declined_daily30']) !!} // Declined count
                    ],
                    monthly: [
                        {!! json_encode($statusData['approved_monthly']) !!}, // Approved count
                        {!! json_encode($statusData['pending_monthly']) !!}, // Pending count
                        {!! json_encode($statusData['waiting_for_approval_monthly']) !!}, // Waiting count
                        {!! json_encode($statusData['declined_monthly']) !!} // Declined count
                    ],
                    yearly: [
                        {!! json_encode($statusData['approved_yearly']) !!}, // Approved count
                        {!! json_encode($statusData['pending_yearly']) !!}, // Pending count
                        {!! json_encode($statusData['waiting_for_approval_yearly']) !!}, // Waiting count
                        {!! json_encode($statusData['declined_yearly']) !!} // Declined count
                    ]
                }
            };
            // Define text colors and other styling variables
            const labelTextColor = darkMode ? '#ffffff' : '#0c4a6e' // Text color for labels
            const gridLinesColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : '#e0e0e0'; // Grid lines color
            const tooltipBgColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : '#ffffff'; // Tooltip background color
            const tooltipTitleTextColor = darkMode ? '#ffffff' : '#000000'; // Tooltip title text color
            const tooltipBodyTextColor = darkMode ? '#ffffff' : '#000000'; // Tooltip body text color

            const bgColors = [
                'rgba(76, 175, 80, 0.4)', // Approved - Green
                'rgba(255, 235, 59, 0.4)', // Pending - Yellow
                'rgba(255, 152, 0, 0.4)', // Waiting for Approval - Orange
                'rgba(244, 67, 54, 0.4)' // Declined - Red
            ];

            const borderColors = [
                'rgba(76, 175, 80, 1)', // Approved - Green
                'rgba(255, 235, 59, 1)', // Pending - Yellow
                'rgba(255, 152, 0, 1)', // Waiting for Approval - Orange
                'rgba(244, 67, 54, 1)' // Declined - Red
            ];

            // Chart initialization
            const chartCtx = document.getElementById('verificationStatusChart').getContext('2d');
            let verificationStatusChart = new Chart(chartCtx, {
                type: 'bar', // Vertical bar chart
                data: {
                    labels: verificationDataSets.statuses, // Account statuses on X-axis
                    datasets: [{
                        label: 'User Counts',
                        data: verificationDataSets.counts.daily15, // Initial data for the last 15 days
                        backgroundColor: bgColors,
                        borderColor: borderColors,
                        borderWidth: 1,
                        datalabels: {
                            anchor: 'end', // Adjust position for better visibility
                            align: 'end', // Align text at the end of the bar
                            color: labelColor,
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Account Status', // Title for the X-axis
                                color: labelTextColor,
                                font: {
                                    family: 'Poppins', // Set Poppins font for the title
                                    size: 16,
                                    weight: '600'
                                }
                            },
                            ticks: {
                                color: labelTextColor,
                                font: {
                                    family: 'Poppins' // Set Poppins font for ticks
                                }
                            },
                            grid: {
                                color: gridLinesColor
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'User Counts', // Title for the Y-axis
                                color: labelTextColor,
                                font: {
                                    family: 'Poppins',
                                    size: 16,
                                    weight: '600'
                                }
                            },
                            ticks: {
                                color: labelTextColor,
                                font: {
                                    family: 'Poppins' // Set Poppins font for ticks
                                }
                            },
                            grid: {
                                color: gridLinesColor
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'User Account Status',
                            font: {
                                family: 'Poppins',
                                size: 20,
                                weight: '600'
                            },
                            color: labelColor
                        },
                        legend: {
                            labels: {
                                color: labelColor,
                                font: {
                                    size: 16,
                                    family: 'Poppins',
                                    weight: '600'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            enabled: true,
                            titleFont: {
                                family: 'Poppins',
                                size: 16,
                                weight: '600'
                            },
                            bodyFont: {
                                family: 'Poppins',
                                size: 16,
                                weight: '400'
                            },
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.dataset.label + ': ' + tooltipItem
                                        .raw; // Customize the label format
                                }
                            }
                        }
                    }
                }
            });




            // Function to filter chart data by date range
            function filterByDate(range) {
                const selectedCounts = verificationDataSets.counts[range];

                // Update the chart data
                verificationStatusChart.data.datasets[0].data = selectedCounts; // Update counts for each status
                verificationStatusChart.update(); // Refresh the chart
            }
        </script>







        <div class="mt-4 mx-4">
            <div class="gradient-bg p-4 ml-4 mr-4">
                <h2 class="text-2xl font-semibold text-white dark:text-gray-200">PWD Information of PWDs</h2>
            </div>
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">

                    <div class="rounded-xl mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-wheelchair mr-2"></i>
                                Disability Occurrence
                            </h3>

                        </div>
                        <canvas id="disabilityOccurenceChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">

                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr class="gradient-bg from-blue-500 to-blue-300 text-white">
                                        <th
                                            class="px-4 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability
                                        </th>
                                        <th
                                            class="px-4 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Occurrences
                                        </th>
                                        <th
                                            class="px-4 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                @if ($disabilityOccurrences->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                @else 
                                    bg-gradient-to-r from-red-500 to-red-600 @endif 
                                rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $disabilityOccurrences->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>

                                <tbody>
                                    @foreach ($disabilityOccurrences as $disability => $occurrences)
                                        @php
                                            $totalOccurrences = $disabilityOccurrences->sum();
                                        @endphp
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $disability }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $occurrences }} out of {{ $totalOccurrences }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
                                                        $percentage =
                                                            $totalOccurrences > 0
                                                                ? ($occurrences / $totalOccurrences) * 100
                                                                : 0;
                                                    @endphp
                                                    <span class="mr-2">{{ round($percentage, 2) }}% </span>
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
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <br>
                    <br>
                </div>

                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <!-- Chart for Type of Disability -->
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-wheelchair mr-2"></i>
                                Disability Types
                            </h3>
                        </div>
                        <canvas id="disabilityTypeChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr class="gradient-bg from-blue-500 to-blue-300 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Type of Disability
                                        </th>
                                        <th
                                            class="px-4  text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Occurrences
                                        </th>
                                        <th
                                            class="px-4  text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                    @if ($disabilityType->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else 
                                        bg-gradient-to-r from-red-500 to-red-600 @endif 
                                    rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $disabilityType->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>

                                <tbody>
                                    @foreach ($disabilityType as $disability => $occurrences)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            @php
                                                $totalOccurrences = $disabilityType->sum();
                                            @endphp
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $disability }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $occurrences }} out of {{ $occurrences }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    @php
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
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>




            <div class="gradient-bg p-4 ml-4 mr-4">
                <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Skills Information of PWDs</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

                <!-- Most Employable Skills -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-tools mr-2"></i>
                                Top Skills for PWDs
                            </h3>

                        </div>
                        <canvas id="skillsChart" class="p-5" width="800" height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <thead>
                                        <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Skills
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                Percentages
                                            </th>
                                        </tr>
                                    </thead>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                    @if ($totalSkillsCount > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else 
                                        bg-gradient-to-r from-red-500 to-red-600 @endif 
                                    rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $totalSkillsCount }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>

                                <tbody>
                                    @foreach ($skills as $skill => $count)
                                        @php
                                            $totalSkillsCount = $totalSkillsCount ?? 1; // Ensure $totalSkillsCount is not zero to avoid division by zero
                                            $percentage =
                                                $totalSkillsCount > 0
                                                    ? number_format(($count / $totalSkillsCount) * 100, 1)
                                                    : '0.0';
                                        @endphp
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }} out of {{ $count }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
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

                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            {{ $othersCount }} out of {{ $othersCount }} Approved Users
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                @if ($totalSkillsCount > 0)
                                                    <span
                                                        class="mr-2">{{ number_format(($othersCount / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($othersCount / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="mr-2">0%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: 0%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center mt-4">
                                <a href="{{ route('admin.details', ['type' => 'skills']) }}"
                                    class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                                    <span>See More</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                            <br>
                            <br>

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
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-tools mr-2"></i>
                                Basic Skills for PWDs
                            </h3>
                        </div>
                        <canvas id="leastEmployableSkillsChart" class="p-5" width="800"
                            height="600"></canvas>
                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>

                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            <!-- Empty header for additional data -->
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                    @if ($totalSkillsCount > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else 
                                        bg-gradient-to-r from-red-500 to-red-600 @endif 
                                    rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $totalSkillsCount }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>


                                <tbody>
                                    @foreach ($leastEmployableSkills as $skill => $count)
                                        @php
                                            $totalSkillsCount = $totalSkillsCount > 0 ? $totalSkillsCount : 1;
                                            $percentage = number_format(($count / $totalSkillsCount) * 100, 1);
                                        @endphp
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }} out of {{ $count }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
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

                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            {{ $leastEmployableOthersCount }} out of
                                            {{ $leastEmployableOthersCount }}Approved Users
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                @if ($totalSkillsCount > 0)
                                                    <span
                                                        class="mr-2">{{ number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="mr-2">0%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: 0%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.details', ['type' => 'leastskills']) }}"
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Education Analytics Section -->
            <div class="mt-8 mx-4">
                <div class="gradient-bg p-4 ml-0 mr-0">
                    <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Education Analytics of PWDs</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Most Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div
                                class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                                <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    Top Educational Attainment for PWDs
                                </h3>

                            </div>
                            <div class="container mx-auto p-10" width="700" height="600">
                                <canvas id="educationPieChart"></canvas>
                            </div>
                            <div class="flex flex-wrap items-center px-4 py-2">
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Education Level
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-400-px">
                                                <!-- Empty header for additional data -->
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <h2
                                            class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                            <i class="fas fa-users mr-2 text-white"></i>
                                            {{ $mostEmployableEducationLevels->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                        </h2>

                                        @foreach ($mostEmployableEducationLevels as $level => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $level }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }} out of {{ $count }} Approved Users
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span class="mr-2">
                                                            {{ number_format(($count / ($mostEmployableEducationLevels->sum() ?: 1)) * 100, 1) }}%
                                                        </span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width:  {{ $mostEmployableEducationLevels->sum() > 0 ? number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1) : 0 }}%;"
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
                                class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                                <span>See More</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        <br>
                        <br>
                    </div>




                    <!-- Least Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-white dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="mx-auto p-0">
                                <div
                                    class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                        <i class="fas fa-graduation-cap mr-2"></i>
                                        Basic Educational Attainment for PWDs
                                    </h3>
                                </div>
                                <canvas id="educationPieChartLeastEmployable" width="800" height="600"
                                    class="p-10"></canvas>
                            </div>

                            <div class="flex flex-wrap items-center px-4 py-2">
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle   py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            <!-- Empty header for additional data -->
                                        </th>
                                    </tr>
                                    <tbody>
                                        <h2
                                            class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                            <i class="fas fa-users mr-2 text-white"></i>
                                            {{ $leastEmployableEducationLevels->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                        </h2>

                                        @foreach ($leastEmployableEducationLevels as $level => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $level }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }} out of {{ $count }} Approved Users
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ $leastEmployableEducationLevels->sum() > 0 ? number_format(($count / $leastEmployableEducationLevels->sum()) * 100, 1) : '0.0' }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ $mostEmployableEducationLevels->sum() > 0
                                                                    ? number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1)
                                                                    : '0' }}%;"
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
                                class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                                <span>See More</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>




            <div class="mt-8 mx-4">
                <div class="gradient-bg p-4 s">
                    <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Employment Analytics of PWDs</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Most Employable Education Levels -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="container mx-auto " width="700" height="600">
                                <div
                                    class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                        <i class="fas fa-briefcase mr-2"></i>
                                        Top Employment Types for PWDs
                                    </h3>

                                </div>
                                <canvas id="employmentTypePieChartMostEmployable" class="p-10"></canvas>
                            </div>
                            <div class="flex flex-wrap items-center px-4 py-2">
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employment Type
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                <!-- Empty header for additional data -->
                                            </th>
                                        </tr>
                                    </thead>


                                    <h2
                                        class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                        <i class="fas fa-users mr-2 text-white"></i>
                                        {{ $mostEmployableEmploymentTypes->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                    </h2>

                                    <tbody>
                                        @foreach ($mostEmployableEmploymentTypes as $type => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $type }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }} out of {{ $count }} Approved Users
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ $mostEmployableEmploymentTypes->sum() > 0
                                                                ? number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1)
                                                                : '0.0' }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: {{ $mostEmployableEmploymentTypes->sum() > 0
                                                                    ? number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1)
                                                                    : '0.0' }}%"
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
                                class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                                <span>See More</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        <br>
                        <br>
                    </div>

                    <!-- Least Employable Employment Types -->
                    <div
                        class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                        <div class="rounded-t mb-0 px-0 border-0">
                            <div class="mx-auto">
                                <div
                                    class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                        <i class="fas fa-briefcase mr-2"></i>
                                        Least Employment Types for PWDs
                                    </h3>

                                </div>
                                <canvas id="employmentTypePieChartLeastEmployable" width="800" height="600"
                                    class="p-10"></canvas>
                            </div>

                            <div class="flex flex-wrap items-center px-4 py-2">

                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employment Type
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Employed
                                            </th>
                                            <th
                                                class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                <!-- Empty header for additional data -->
                                            </th>
                                        </tr>
                                    </thead>
                                    <h2
                                        class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                        <i class="fas fa-users mr-2 text-white"></i>
                                        {{ $leastEmployableEmploymentTypes->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                    </h2>
                                    <tbody>
                                        @foreach ($leastEmployableEmploymentTypes as $type => $count)
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $type }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $count }} out of {{ $count }} Approved Users
                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2">{{ $leastEmployableEmploymentTypes->sum() > 0
                                                                ? number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1)
                                                                : '0.0' }}%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width:{{ $leastEmployableEmploymentTypes->sum() > 0
                                                                    ? number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1)
                                                                    : '0.0' }}%"
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
                                class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                                <span>See More</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-8 mx-4 p-4">
            <div class="gradient-bg p-4 ">
                <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Age Bin Information of PWDs</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
                <!-- Most Common Age Bins -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-clock mr-2"></i>
                                Top Age Bins for PWDs
                            </h3>
                        </div>
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="ageBinChartMostCommon"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Age Bin
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            <!-- Empty header for additional data -->
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $mostCommonAges->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>
                                <tbody>
                                    @foreach ($mostCommonAges as $bin => $count)
                                        @php
                                            $totalCount = $mostCommonAges->sum();
                                        @endphp
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $bin }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }} out of {{ $count }} Approved Users
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
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <br>
                    <br>
                </div>

                <!-- Least Common Age Bins -->
                {{-- <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-clock mr-2"></i>
                                Least Age Bins for PWDs
                            </h3>
                        </div>
                        <div class="mx-auto p-10">
                            <canvas id="ageBinChartLeastCommon" width="800" height="600"></canvas>
                        </div>

                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Age Bin
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            <!-- Empty header for additional data -->
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $leastCommonAges->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>
                                <tbody>
                                    @foreach ($leastCommonAges as $bin => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $bin }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }} out of {{ $count }} Approved Users
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
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>




        <div class="mt-8 mx-4 p-4">
            <div class="gradient-bg p-4 ">
                <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Work Experience Analytics of PWDs</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Most Common Age Bins -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-building mr-2"></i>
                                Top Companies for PWDs with Employee Count
                            </h3>
                        </div>
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="mostFrequentEmployersChart"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">

                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse">
                                <thead>
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employer
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            <!-- Empty column for future content -->
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $mostFrequentEmployers->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>
                                <tbody>
                                    <!-- Most Frequent Employers -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">Most Frequent Number of
                                            Employees
                                            in a Company</td>
                                    </tr>
                                    @php
                                        $totalMostFrequent = $mostFrequentEmployers->sum();
                                    @endphp

                                    @foreach ($mostFrequentEmployers as $employer_name => $count)
                                        @php
                                            // Default percentage value to avoid division by zero
                                            $percentage =
                                                $totalMostFrequent > 0 ? ($count / $totalMostFrequent) * 100 : 0;
                                        @endphp
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $employer_name }}
                                            </td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $count }} out of {{ $count }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white">{{ number_format($percentage, 1) }}%</span>
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


                                    <!-- Least Frequent Employers -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">Least Frequent Number of
                                            Employees in a Company</td>
                                    </tr>
                                    @php
                                        $totalLeastFrequent = $leastFrequentEmployers->sum();
                                    @endphp

                                    @foreach ($leastFrequentEmployers as $employer_name => $count)
                                        @php
                                            // Default percentage value to avoid division by zero
                                            $percentage =
                                                $totalLeastFrequent > 0 ? ($count / $totalLeastFrequent) * 100 : 0;
                                        @endphp
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $employer_name }}
                                            </td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $count }} out of {{ $count }} Approved Users
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white">{{ number_format($percentage, 1) }}%</span>
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
                        <a href="{{ route('admin.details', ['type' => 'employeecount']) }}"
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <br>
                    <br>
                </div>

                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                            <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                                <i class="fas fa-building mr-2"></i>

                                Top Companies
                                for
                                PWDs with Employee's Work Experiences
                            </h3>
                        </div>
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="mostFrequentEmployersYearsChart"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse">
                                <thead>
                                    <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employer
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Years/Month
                                        </th>
                                        <th
                                            class="px-4 text-white dark:text-gray-100 align-middle  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            <!-- Empty header for future content -->
                                        </th>
                                    </tr>
                                </thead>
                                <h2
                                    class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d
                                        @if ($mostEmployableEducationLevels->sum() > 0) bg-gradient-to-r from-green-500 to-green-600 
                                        @else 
                                            bg-gradient-to-r from-red-500 to-red-600 @endif 
                                        rounded">
                                    <i class="fas fa-users mr-2 text-white"></i>
                                    {{ $leastFrequentEmployers->sum() }} UNIQUE APPLICANT RECORDS FOUND
                                </h2>
                                <tbody>
                                    <!-- Most Frequent Employers by Years -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">
                                            Most Frequent Years of Experience in a Company
                                        </td>
                                    </tr>
                                    @php
                                        // Calculate total years for most frequent employers
                                        $totalMostFrequentYears = $mostFrequentEmployersByYears->sum();
                                    @endphp
                                    @foreach ($mostFrequentEmployersByYears as $employer_name => $totalYears)
                                        @php
                                            // Calculate percentage
                                            $percentage =
                                                $totalMostFrequentYears > 0
                                                    ? ($totalYears / $totalMostFrequentYears) * 100
                                                    : 0;
                                        @endphp
                                        @php
                                            $totalMonths = ($totalYears - floor($totalYears)) * 12; // Calculate months from decimal years
                                            $totalWholeYears = floor($totalYears); // Get the whole number of years
                                            $totalYearsFormatted = number_format($totalYears, 2); // Format years to 2 decimal places
                                        @endphp
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $employer_name }}</td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $totalYearsFormatted }} years ({{ floor($totalMonths) }} months)
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white">{{ number_format($percentage, 1) }}%</span>
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

                                    <!-- Least Frequent Employers by Years -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">
                                            Least Frequent Years of Experience in a Company
                                        </td>
                                    </tr>
                                    @php
                                        // Calculate total years for least frequent employers
                                        $totalLeastFrequentYears = $leastFrequentEmployersByYears->sum();
                                    @endphp
                                    @foreach ($leastFrequentEmployersByYears as $employer_name => $totalYears)
                                        @php
                                            // Calculate percentage
                                            $percentage =
                                                $totalLeastFrequentYears > 0
                                                    ? ($totalYears / $totalLeastFrequentYears) * 100
                                                    : 0;
                                        @endphp
                                        @php
                                            $totalMonths = ($totalYears - floor($totalYears)) * 12; // Calculate months from decimal years
                                            $totalWholeYears = floor($totalYears); // Get the whole number of years
                                            $totalYearsFormatted = number_format($totalYears, 2); // Format years to 2 decimal places
                                        @endphp
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $employer_name }}</td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                {{ $totalYearsFormatted }} years ({{ floor($totalMonths) }} months)
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white">{{ number_format($percentage, 1) }}%</span>
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
                        <a href="{{ route('admin.details', ['type' => 'yearsofexperience']) }}"
                            class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                            <span>See More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>




        <div class="mt-4 mx-4 p-4">
            <div class="gradient-bg p-7">
                <h2 class="text-2xl font-semibold text-white dark:text-gray-200">
                    <i class="fas fa-user-plus mr-2"></i>
                    Recent Registration of Users
                </h2>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xl">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-lg font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">USERS</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 custom-shadow">
                            @foreach ($users as $user)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-md ">
                                            <div>
                                                <p class="font-semibold ">{{ $user->name }}</p>
                                                <p class=" text-gray-600 dark:text-gray-400">
                                                    {{ $user->usertype }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-md">
                                        <!-- Change the status dynamically based on user data -->
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight uppercase {{ $user->account_verification_status == 'approved' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-gray-700 bg-orange-100 dark:bg-orange-700 dark:text-red-100' }} rounded-full">
                                            {{ $user->account_verification_status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-md">{{ $user->created_at->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid mb-10 px-2 py-3 text-md font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
    </body>

    <script>
        let skillsChart;
        let leastEmployableSkillsChart;

        // Function to initialize or update the most employable skills chart
        function initializeSkillsChart(darkMode) {
            const skillsData = @json($skills); // Prepare data for Chart.js
            const othersCount = @json($othersCount); // Get the count of "Others"

            skillsData["Others"] = othersCount;

            const labels = Object.keys(skillsData);
            const rawData = Object.values(skillsData);

            // Calculate the total count for percentage calculations
            const totalCount = rawData.reduce((sum, value) => sum + value, 0);

            // Convert raw data to percentages
            const data = rawData.map(value => (value / totalCount) * 100);
            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';

            // Define color schemes
            const darkModeColors = {
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Light teal
                borderColor: 'rgba(75, 192, 192, 1)', // Darker teal
                axisColor: '#E5E7EB', // Light color for text
                gridColor: 'rgba(255, 255, 255, 0.1)' // Light grid lines
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

            skillsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Top PWD Skills Percentage',
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
                                color: colors.axisColor,
                                font: {
                                    family: 'Poppins',
                                    size: 14, // Adjust font size as needed
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: darkMode ? '#333' : '#fff',
                            titleColor: colors.axisColor,
                            bodyColor: colors.axisColor,
                        },
                        datalabels: {
                            color: labelColor,
                            anchor: 'center',
                            align: 'center',
                            formatter: (value) => `${value.toFixed(1)}%`, // Show percentage in labels
                            font: {
                                weight: 'bold',
                                size: 32 // Adjust size as needed
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: colors.axisColor,
                                font: {
                                    family: 'Poppins',
                                    size: 12 // Adjust size as needed
                                }
                            },
                            grid: {
                                color: colors.gridColor, // Set grid line color
                            }
                        },
                        y: {
                            ticks: {
                                color: colors.axisColor,
                                callback: (value) => `${value}%`, // Show percentage on Y-axis
                                font: {
                                    family: 'Poppins',
                                    size: 12 // Adjust size as needed
                                }
                            },
                            max: 100, // Set max to 100% (since it's a percentage)
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Percentage',
                                font: {
                                    family: 'Poppins',
                                    size: 14 // Adjust size as needed
                                }
                            },
                            grid: {
                                color: colors.gridColor, // Set grid line color
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
        }

        // Function to initialize or update the least employable skills chart
        function initializeLeastEmployableSkillsChart(darkMode) {
            const leastEmployableSkillsData = @json($leastEmployableSkills);
            const leastEmployableOthersCount = @json($leastEmployableOthersCount);

            leastEmployableSkillsData["Others"] = leastEmployableOthersCount;

            const labels = Object.keys(leastEmployableSkillsData);
            const rawData = Object.values(leastEmployableSkillsData);

            const totalCount = rawData.reduce((sum, value) => sum + value, 0);

            // Convert raw data to percentages
            const data = rawData.map(value => (value / totalCount) * 100);
            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';

            const darkModeColors = {
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Light teal
                borderColor: 'rgba(75, 192, 192, 1)', // Darker teal
                axisColor: '#E5E7EB', // Light color for text
                gridColor: 'rgba(255, 255, 255, 0.1)' // Light grid lines
            };

            const lightModeColors = {
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                axisColor: '#000',
                gridColor: 'rgba(0, 0, 0, 0.1)'
            };

            const colors = darkMode ? darkModeColors : lightModeColors;

            const ctx = document.getElementById('leastEmployableSkillsChart').getContext('2d');

            if (leastEmployableSkillsChart) {
                leastEmployableSkillsChart.destroy();
            }

            leastEmployableSkillsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Basic PWD Skills Percentage',
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
                                color: colors.axisColor,
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: darkMode ? '#333' : '#fff',
                            titleColor: colors.axisColor,
                            bodyColor: colors.axisColor,
                        },
                        datalabels: {
                            color: labelColor,
                            anchor: 'center',
                            align: 'center',
                            formatter: (value) => `${value.toFixed(1)}%`, // Show percentage in labels
                            font: {
                                weight: 'bold',
                                size: 32
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: colors.axisColor,
                                font: {
                                    family: 'Poppins',
                                    size: 12 // Adjust size as needed
                                }
                            },
                            grid: {
                                color: colors.gridColor, // Set grid line color
                            }
                        },
                        y: {
                            ticks: {
                                color: colors.axisColor,
                                callback: (value) => `${value}%`, // Show percentage on Y-axis
                                font: {
                                    family: 'Poppins',
                                    size: 12 // Adjust size as needed
                                }
                            },
                            max: 100, // Set max to 100% (since it's a percentage)
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Percentage',
                                font: {
                                    family: 'Poppins',
                                    size: 14 // Adjust size as needed
                                }
                            },
                            grid: {
                                color: colors.gridColor, // Set grid line color
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
        }


        // Initialize charts
        initializeSkillsChart(darkMode);
        initializeLeastEmployableSkillsChart(darkMode);
    </script>


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
            var labelColor = darkMode ? '#ffffff' : '#0c4a6e';

            // Function to calculate percentages
            function calculatePercentages(data) {
                var total = data.reduce((sum, value) => sum + value, 0);
                return data.map(value => (total > 0 ? (value / total * 100) : 0).toFixed(
                    2)); // Calculate percentage and format
            }

            // Calculate percentages for both datasets
            var percentageData1 = calculatePercentages(data1);
            var percentageData2 = calculatePercentages(data2);

            // Function to create a chart
            function createChart(ctx, labels, data, chartLabel, absoluteData) {
                return new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: chartLabel,
                            data: data, // Use percentage data here
                            backgroundColor: bgColor,
                            borderColor: lineColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: {
                                    color: fontColor,
                                    font: {
                                        family: 'Poppins',
                                        size: 16,
                                        style: 'italic',
                                        weight: 'bold'
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: darkMode ? '#333' : '#fff',
                                titleColor: fontColor,
                                bodyColor: fontColor,
                                titleFont: {
                                    family: 'Poppins',
                                    size: 16,
                                    style: 'normal',
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    family: 'Poppins',
                                    size: 14,
                                    style: 'normal',
                                    weight: 'normal'
                                }
                            },
                            datalabels: {
                                color: labelColor,
                                anchor: 'center',
                                align: 'center',
                                font: {
                                    family: 'Poppins',
                                    size: 32,
                                    weight: 'bold'
                                },
                                formatter: (value, context) => {
                                    const absoluteValue = absoluteData[context
                                        .dataIndex]; // Use absoluteData for the count
                                    return `${absoluteValue} (${value}%)`; // Show the absolute value as "value (percentage%)"
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: fontColor,
                                    font: {
                                        family: 'Poppins',
                                        size: 14,
                                        style: 'normal',
                                        weight: 'normal'
                                    }
                                },
                                grid: {
                                    color: gridColor
                                }
                            },
                            y: {
                                beginAtZero: true,
                                max: 100, // Set the maximum value of y-axis to 100
                                ticks: {
                                    color: fontColor,
                                    font: {
                                        family: 'Poppins',
                                        size: 14,
                                        style: 'normal',
                                        weight: 'normal'
                                    },
                                    precision: 0, // Prevent decimals in y-axis ticks
                                    callback: function(value) {
                                        return value + '%'; // Append '%' to each y-axis tick
                                    },
                                },
                                grid: {
                                    color: gridColor
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
                    },
                    plugins: [ChartDataLabels] // Add the data labels plugin
                });
            }

            // Create both charts using percentage data for the y-axis
            createChart(ctx1, labels1, percentageData1, 'Disability Occurrence',
                data1); // Pass data1 for absolute values
            createChart(ctx2, labels2, percentageData2, 'Type of Disability',
                data2); // Pass data2 for absolute values
        });
    </script>

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
                'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
            ];

            // Define label colors based on dark mode
            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
            const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'; // Grid color

            // Get the canvas elements
            const ctxMostEmployable = document.getElementById('educationPieChart').getContext('2d');
            const ctxLeastEmployable = document.getElementById('educationPieChartLeastEmployable').getContext('2d');

            Chart.register(ChartDataLabels); // Register the plugin

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
                                    family: 'Poppins',
                                    size: 14
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
                                            0)) * 100).toFixed(1) + '%)';
                                }
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            titleFont: {
                                family: 'Poppins'
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins', // Specify the font family
                                size: 28, // Specify the font size (adjust as needed)
                                weight: 'bold' // Optional: Specify the font weight
                            },
                            formatter: function(value, context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return value + ' (' + percentage + '%)';
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins'
                                }
                            }
                        },
                        y: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins'
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
                                    family: 'Poppins',
                                    size: 14
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
                                            0)) * 100).toFixed(1) + '%)';
                                }
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            titleFont: {
                                family: 'Poppins'
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins', // Specify the font family
                                size: 28, // Specify the font size (adjust as needed)
                                weight: 'bold' // Optional: Specify the font weight
                            },
                            formatter: function(value, context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return value + ' (' + percentage + '%)';
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins'
                                }
                            }
                        },
                        y: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins'
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

            // Pass PHP variables to JavaScript as JSON
            const mostFrequentEmployersByYearsData = @json($mostFrequentEmployersByYears);
            const leastFrequentEmployersByYearsData = @json($leastFrequentEmployersByYears);

            // Prepare data for the pie charts
            const mostFrequentEmployersByYearsLabels = Object.keys(mostFrequentEmployersByYearsData);
            const mostFrequentEmployersByYearsCounts = Object.values(mostFrequentEmployersByYearsData);

            const leastFrequentEmployersByYearsLabels = Object.keys(leastFrequentEmployersByYearsData);
            const leastFrequentEmployersByYearsCounts = Object.values(leastFrequentEmployersByYearsData);

            // Determine if dark mode is enabled
            const darkMode = getDarkMode();

            // Define colors based on dark mode
            const backgroundColor = darkMode ? [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(201, 203, 207, 0.6)' // Additional color for 'Others'
            ] : [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(201, 203, 207, 0.6)' // Additional color for 'Others'
            ];

            const borderColor = darkMode ? [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(201, 203, 207, 1)' // Additional border color for 'Others'
            ] : [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(201, 203, 207, 1)' // Additional border color for 'Others'
            ];

            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';

            // Create pie chart for Most Frequent Employers by Years
            const ctxMostFrequent = document.getElementById('mostFrequentEmployersYearsChart').getContext('2d');

            // Register the ChartDataLabels plugin
            Chart.register(ChartDataLabels); // Register the plugin

            new Chart(ctxMostFrequent, {
                type: 'pie',
                data: {
                    labels: mostFrequentEmployersByYearsLabels,
                    datasets: [{
                        label: 'Most Frequent Employers by Years',
                        data: mostFrequentEmployersByYearsCounts,
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
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            callbacks: {
                                label: function(tooltipItem) {
                                    const total = mostFrequentEmployersByYearsCounts.reduce((a, b) =>
                                        a + b, 0);
                                    const percentage = ((tooltipItem.raw / total) * 100).toFixed(1);
                                    return `${tooltipItem.label}: ${tooltipItem.raw} years (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins', // Specify the font family
                                size: 28, // Specify the font size
                                weight: 'bold' // Optional: Specify the font weight
                            },
                            formatter: function(value, context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);

                                // Assuming the value is in years and we want to convert to months
                                const months = Math.round(value * 12); // Convert years to months

                                const percentage = ((value / total) * 100).toFixed(
                                    2); // Round to 2 decimals
                                const formattedValue = months
                                    .toLocaleString(); // Format the number with commas

                                return `${formattedValue} months (${percentage}%)`;
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

            // Pass PHP variables to JavaScript as JSON
            const mostFrequentEmployersData = @json($mostFrequentEmployers);
            const leastFrequentEmployersData = @json($leastFrequentEmployers);

            // Prepare data for the pie charts
            const mostFrequentEmployersLabels = Object.keys(mostFrequentEmployersData);
            const mostFrequentEmployersCounts = Object.values(mostFrequentEmployersData);

            const leastFrequentEmployersLabels = Object.keys(leastFrequentEmployersData);
            const leastFrequentEmployersCounts = Object.values(leastFrequentEmployersData);

            // Determine if dark mode is enabled
            const darkMode = getDarkMode();

            // Define colors based on dark mode
            const backgroundColor = darkMode ? [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(201, 203, 207, 0.6)' // Additional color for 'Others'
            ] : [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(201, 203, 207, 0.6)' // Additional color for 'Others'
            ];

            const borderColor = darkMode ? [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(201, 203, 207, 1)' // Additional border color for 'Others'
            ] : [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(201, 203, 207, 1)' // Additional border color for 'Others'
            ];

            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';

            // Create pie chart for Most Frequent Employers
            const ctxMostFrequent = document.getElementById('mostFrequentEmployersChart').getContext('2d');
            new Chart(ctxMostFrequent, {
                type: 'pie',
                data: {
                    labels: mostFrequentEmployersLabels,
                    datasets: [{
                        label: 'Most Frequent Employers',
                        data: mostFrequentEmployersCounts,
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
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            callbacks: {
                                label: function(tooltipItem) {
                                    const total = mostFrequentEmployersCounts.reduce((a, b) => a + b,
                                        0);
                                    const percentage = ((tooltipItem.raw / total) * 100).toFixed(1);
                                    return `${tooltipItem.label}: ${tooltipItem.raw} (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins',
                                size: 28,
                                weight: 'bold'

                            },
                            formatter: (value, ctx) => {
                                const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b,
                                    0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });

            // Create pie chart for Least Frequent Employers
            const ctxLeastFrequent = document.getElementById('leastFrequentEmployersChart').getContext('2d');
            new Chart(ctxLeastFrequent, {
                type: 'pie',
                data: {
                    labels: leastFrequentEmployersLabels,
                    datasets: [{
                        label: 'Least Frequent Employers',
                        data: leastFrequentEmployersCounts,
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
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            callbacks: {
                                label: function(tooltipItem) {
                                    const total = leastFrequentEmployersCounts.reduce((a, b) => a + b,
                                        0);
                                    const percentage = ((tooltipItem.raw / total) * 100).toFixed(1);
                                    return `${tooltipItem.label}: ${tooltipItem.raw} (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins',
                                size: 28,
                                weight: 'bold'

                            },
                            formatter: (value, ctx) => {
                                const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b,
                                    0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${value} (${percentage}%)`; // Display count and percentage
                            }

                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get dark mode preference from local storage
            function getDarkMode() {
                return localStorage.getItem('darkMode') === 'true';
            }

            const mostCommonAgesData = @json($mostCommonAges);

            // Prepare data for the bar chart
            const mostCommonAgesLabels = Object.keys(mostCommonAgesData);
            const mostCommonAgesCounts = Object.values(mostCommonAgesData);

            const darkMode = getDarkMode();

            // Define colors based on dark mode
            const backgroundColor = darkMode ? 'rgba(54, 162, 235, 0.6)' : 'rgba(54, 162, 235, 0.6)';
            const borderColor = darkMode ? 'rgba(54, 162, 235, 1)' : 'rgba(54, 162, 235, 1)';
            const labelColor = darkMode ? '#ffffff' : '#0c4a6e';
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
            const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)';

            // Get the canvas element
            const ctxMostCommonAges = document.getElementById('ageBinChartMostCommon').getContext('2d');

            // Register the Data Labels plugin
            Chart.register(ChartDataLabels);

            // Create the bar chart for most common age bins
            new Chart(ctxMostCommonAges, {
                type: 'bar',
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
                            display: false // Remove legend for a simpler bar chart layout
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
                                family: 'Poppins'
                            },
                            titleFont: {
                                family: 'Poppins'
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            font: {
                                family: 'Poppins',
                                size: 28,
                                weight: 'bold'
                            },
                            anchor: 'center',
                            align: 'center',
                            formatter: (value, context) => {
                                const total = context.chart.data.datasets[context.datasetIndex].data
                                    .reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1) + '%';
                                return `${value} (${percentage})`;
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    family: 'Poppins'
                                }
                            }
                        },
                        y: {
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    family: 'Poppins'
                                },
                                stepSize: 1, // Ensure y-axis only shows whole numbers
                                callback: function(value) {
                                    return Number.isInteger(value) ? value :
                                        null; // Filter out non-integer values
                                }
                            },
                            beginAtZero: true // Start the y-axis at zero
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
            const labelColor = darkMode ? '#ffffff' : '#0c4a6e'; // Light gray for light mode
            const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
            const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
            const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';
            const gridColor = darkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'; // Grid color

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
                                    family: 'Poppins',
                                    size: 14
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
                                            0)) * 100).toFixed(1) + '%)';
                                }
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            titleFont: {
                                family: 'Poppins'
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            formatter: (value, context) => {
                                const dataset = context.chart.data.datasets[context.datasetIndex];
                                const total = dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1) + '%';
                                return `${value} (${percentage})`; // Return count and percentage
                            },
                            font: {
                                family: 'Poppins',
                                weight: 'bold',
                                size: 28
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
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBackgroundColor,
                            titleColor: tooltipTitleColor,
                            bodyColor: tooltipBodyColor,
                            callbacks: {
                                label: function(tooltipItem) {
                                    // Calculate the total from the dataset
                                    const total = mostEmployableData.reduce((a, b) => a + b, 0);
                                    const count = tooltipItem
                                        .raw; // The count for the current tooltip item
                                    const percentage = ((count / total) * 100).toFixed(
                                        1); // Calculate the percentage

                                    // Return the formatted string with count and percentage
                                    return `${tooltipItem.label}: ${count} (${percentage}%)`;
                                }
                            },
                            bodyFont: {
                                family: 'Poppins'
                            },
                            titleFont: {
                                family: 'Poppins'
                            }
                        },
                        datalabels: {
                            color: labelColor,
                            formatter: (value, context) => {
                                const dataset = context.chart.data.datasets[context.datasetIndex];
                                const total = dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1) + '%';
                                return `${value} (${percentage})`; // Return count and percentage
                            },
                            font: {
                                family: 'Poppins',
                                weight: 'bold',
                                size: 28
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
