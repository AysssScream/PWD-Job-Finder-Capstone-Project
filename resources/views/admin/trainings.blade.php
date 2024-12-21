<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title>Manage Trainings</title>
        <style>
            .training-card {
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.5s ease forwards;
            }

            .training-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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

            input:invalid,
            select:invalid,
            textarea:invalid {
                border-color: #ef4444;
            }
        </style>
    </head>

    <div class="h-full ml-14 md:ml-64 font-poppins p-10">
        <div class="py-8" style="padding-top: 30px; padding-bottom: 5px;">
            <div class="container mx-auto max-w-8xl">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4 md:p-6 space-y-4 md:space-y-6">
                        <!-- Breadcrumb and Title -->
                        <div
                            class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <nav aria-label="breadcrumb" class="w-full md:w-auto mb-4 md:mb-0">
                                <ol class="list-reset flex items-center space-x-2 text-sm">
                                    <li>
                                        <button onclick="window.location.href='{{ route('admin.dashboard') }}'"
                                            class="flex items-center px-3 py-2 text-sm md:px-4 md:py-2 md:text-base bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-600 dark:hover:bg-blue-700">
                                            <i class="fas fa-chevron-left mr-2"></i>
                                            <span>Back to Dashboard</span>
                                        </button>
                                    </li>
                                </ol>
                            </nav>
                            <h1
                                class="text-lg text-right md:text-xl font-bold text-gray-800 dark:text-white flex items-center">
                                <i class="fas fa-book mr-3 text-right text-blue-500"></i>
                                Manage Trainings
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto max-w-8xl pt-2 pb-10">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg overflow-x-auto">
             <div class="bg-gray-100 dark:bg-gray-700 p-6 flex justify-between items-center flex-wrap">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center mb-2 md:mb-0">
                        <i class="fas fa-book text-blue-500 mr-3" aria-hidden="true"></i>
                        Analyze Certifications
                    </h1>
                    
                    <!-- Dropdown Button -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            <span>Export Report</span>
                            <i class="fas fa-chevron-down ml-2" aria-hidden="true"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" class="absolute mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-10">
                            <form action="{{ route('exportcertifications.pdf') }}" method="GET">
                                @csrf
                                <input type="hidden" name="educationalCertificationNames" value="{{ json_encode($educationalCertificationNames) }}">
                                <input type="hidden" name="educationalCertificationCounts" value="{{ json_encode($educationalCertificationCounts) }}">
                                <input type="hidden" name="jobCertificationNames" value="{{ json_encode($jobCertificationNames) }}">
                                <input type="hidden" name="jobCertificationCount" value="{{ json_encode($jobCertificationCount) }}">
                                <input type="hidden" name="resumeCertificationNames" value="{{ json_encode($resumeCertificationNames) }}">
                                <input type="hidden" name="resumeCertificationCount" value="{{ json_encode($resumeCertificationCount) }}">
                            
                                <button type="submit" class="block px-4 py-2 text-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 w-full">Export PDF</button>
                            </form>
                            
                            <form action="{{ route('exportcertifications.csv') }}" method="GET">
                                @csrf
                                <input type="hidden" name="educationalCertificationNames" value="{{ json_encode($educationalCertificationNames) }}">
                                <input type="hidden" name="educationalCertificationCounts" value="{{ json_encode($educationalCertificationCounts) }}">
                                <input type="hidden" name="jobCertificationNames" value="{{ json_encode($jobCertificationNames) }}">
                                <input type="hidden" name="jobCertificationCount" value="{{ json_encode($jobCertificationCount) }}">
                                <input type="hidden" name="resumeCertificationNames" value="{{ json_encode($resumeCertificationNames) }}">
                                <input type="hidden" name="resumeCertificationCount" value="{{ json_encode($resumeCertificationCount) }}">
                            
                                <button type="submit" class="block px-4 py-2 text-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 w-full">Export CSV</button>
                            </form>
                        </div>
                    </div>
                </div>

                <p class="p-6 text-justify text-black dark:text-white">
                    <i class="fas fa-arrow-right text-blue-500 mr-2"></i> By analyzing the frequency of certifications
                    provided by
                    both employers and users, administrators can gain valuable insights into the training needs of their
                    workforce. This data-driven approach allows them to identify trends and gaps in certification
                    attainment, enabling them to tailor training programs that align with industry demands and enhance
                    the skill sets of employees. Consequently, administrators can make informed decisions about which
                    trainings to prioritize, ensuring that the organization remains competitive and effectively meets
                    the evolving requirements of the job market.
                </p>

                <div class="p-6 pt-8">
                    <div class="text-center py-10 flex flex-col items-center">
                        <!-- Chart Container -->
                        <div class="flex-1 w-full"> <!-- Change to w-full for full width -->
                            <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2">
                                <i class="fas fa-user mr-2 mb-6"></i> Vocational Graduates Certification Frequencies
                            </h2>
                            <canvas id="certificationChart" class="w-full" height="800"></canvas>
                            <!-- Full width for canvas -->
                        </div>
                        <div class="flex-1 overflow-x-auto w-full mt-10"> <!-- Change to w-full for full width -->
                            <!-- Educational Certifications -->
                            <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-4">
                                <i class="fas fa-user-graduate mr-2"></i>Vocational Graduates Acquired Certifications
                            </h2>
                            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        <th class="py-2 px-4 text-center">Certification Name</th>
                                        <th class="py-2 px-4 text-center">Count</th>
                                        <th class="py-2 px-4 text-center">Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($educationalCertificationNames as $index => $name)
                                        <tr class="border-b dark:border-gray-600 bg-gray-100 dark:bg-gray-600">
                                            <td class="py-2 px-4 text-black dark:text-white">{{ $name }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                {{ $educationalCertificationCounts[$index] }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                @if ($totalEducationalCount > 0)
                                                    {{ number_format(($educationalCertificationCounts[$index] / $totalEducationalCount) * 100, 0) }}%
                                                @else
                                                    0%
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="flex-1 w-full"> <!-- Job Certification Frequencies Section -->
                                <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2 mt-28">
                                    <i class="fas fa-briefcase mr-2 mb-6"></i> Job Certification Frequencies
                                </h2>
                                <canvas id="jobCertificationChart" class="w-full" height="800"></canvas>
                            </div>

                            <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mt-10 mb-4">
                                <i class="fas fa-briefcase mr-2"></i> Employer Job Certifications
                            </h2>
                            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        <th class="py-2 px-4 text-center">Training Qualification</th>
                                        <th class="py-2 px-4 text-center">Count</th>
                                        <th class="py-2 px-4 text-center">Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobCertificationNames as $index => $name)
                                        <tr class="border-b dark:border-gray-600 bg-gray-100 dark:bg-gray-600">
                                            <td class="py-2 px-4 text-black dark:text-white">{{ $name }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                {{ $jobCertificationCount[$index] }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                @if ($totalJobCertificationCount > 0)
                                                    {{ number_format(($jobCertificationCount[$index] / $totalJobCertificationCount) * 100, 0) }}%
                                                @else
                                                    0%
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Resume Certification Frequencies Section -->
                            <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-2 mt-28">
                                <i class="fas fa-file-alt mr-2 mb-6"></i> Unmatched Resume Certification Frequencies
                            </h2>
                            <canvas id="resumeCertificationChart" class="w-full" height="800"></canvas>

                            <table
                                class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mt-4">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        <th class="py-2 px-4 text-center">Training Qualification</th>
                                        <th class="py-2 px-4 text-center">Count</th>
                                        <th class="py-2 px-4 text-center">Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resumeCertificationNames as $index => $name)
                                        <tr class="border-b dark:border-gray-600 bg-gray-100 dark:bg-gray-600">
                                            <td class="py-2 px-4 text-black dark:text-white">{{ $name }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                {{ $resumeCertificationCount[$index] }}</td>
                                            <td class="py-2 px-4 text-black dark:text-white">
                                                @if ($totalResumeCertificationCount > 0)
                                                    {{ number_format(($resumeCertificationCount[$index] / $totalResumeCertificationCount) * 100, 0) }}%
                                                @else
                                                    0%
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

        <script>
            var maxLabelLength = 10; // Define the maximum label length

            // Prepare the data passed from the server for educational certifications
            var educationalCertificationNames = @json($educationalCertificationNames);
            var educationalCertificationCounts = @json($educationalCertificationCounts);

            var jobCertificationNames = @json($jobCertificationNames);
            var jobCertificationCounts = @json($jobCertificationCount);

            var resumeCertificationNames = @json($resumeCertificationNames);
            var resumeCertificationCounts = @json($resumeCertificationCount);

            // Set the chart colors based on dark mode preference
            var chartBackgroundColor = isDarkMode ? 'rgba(75, 192, 192, 0.2)' : 'rgba(54, 162, 235, 0.2)';
            var chartBorderColor = isDarkMode ? 'rgba(75, 192, 192, 1)' : 'rgba(54, 162, 235, 1)';
            var chartTextColor = isDarkMode ? '#FFFFFF' : '#000000'; // Change text color based on dark mode
            var gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.4)' : 'rgba(0, 0, 0, 0.4)'; // Grid color based on dark mode
            var ctxEducational = document.getElementById('certificationChart').getContext('2d');
            
            
            var certificationChart = new Chart(ctxEducational, {
                type: 'bar',
                data: {
                    labels: educationalCertificationNames.map(function(label) {
                        if (label.length > maxLabelLength) {
                            return label.substring(0, maxLabelLength) + '...'; // Truncate long labels and add ellipsis
                        }
                        return label; // Keep labels under the limit as is
                    }), // X-axis labels (educational certifications)
                    datasets: [{
                        label: 'Frequency of Certifications via Registration Forms', // Updated label for educational certifications
                        data: educationalCertificationCounts, // Y-axis data (counts)
                        backgroundColor: chartBackgroundColor, // Bar color
                        borderColor: chartBorderColor, // Bar border color
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true, // Ensures Y-axis starts from 0
                            grid: {
                                color: gridColor // Set the grid color for the Y-axis
                            },
                            ticks: {
                                color: chartTextColor, // Change Y-axis text color based on dark mode
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                },
                                stepSize: 1,
                                callback: function(value) {
                                    return value;
                                }
                            },
                            suggestedMax: Math.max(...educationalCertificationCounts) + 1 // Suggested max for Y-axis
                        },
                        x: {
                            grid: {
                                color: gridColor // Set the grid color for the X-axis
                            },
                            ticks: {
                                color: chartTextColor, // Change X-axis text color based on dark mode
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                },
                                maxRotation: 45, // Limit rotation for better readability
                                minRotation: 0,
                                autoSkip: true, // Automatically skip labels when crowded
                                maxTicksLimit: 10 // Limit the number of ticks on X-axis to avoid clutter
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: chartTextColor, // Change legend text color based on dark mode
                                font: {
                                    family: 'Poppins', // Set font family for legend
                                    size: 14, // Adjust size as needed
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    // Return the full label, not the truncated one
                                    return educationalCertificationNames[tooltipItem.dataIndex] + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    responsive: true, // Responsive behavior
                    maintainAspectRatio: true, // Maintain aspect ratio
                    aspectRatio: 2 // Ratio of width to height
                }
            });


        var ctxJob = document.getElementById('jobCertificationChart').getContext('2d');
        var jobCertificationChart = new Chart(ctxJob, {
                type: 'bar',
                data: {
                    labels: jobCertificationNames.map(function(label) {
                        if (label.length > maxLabelLength) {
                            return label.substring(0, maxLabelLength) + '...'; // Truncate long labels and add ellipsis
                        }
                        return label; // Keep labels under the limit as is
                    }), 
                    datasets: [{
                        label: 'Frequency of Job Certifications', 
                        data: jobCertificationCounts,
                        backgroundColor: chartBackgroundColor, // Bar color
                        borderColor: chartBorderColor, // Bar border color
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor // Set the grid color for the Y-axis
                            },
                            ticks: {
                                color: chartTextColor, // Change Y-axis text color based on dark mode
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                },
                                stepSize: 1,
                                callback: function(value) {
                                    return value;
                                }
                            },
                            suggestedMax: Math.max(...jobCertificationCounts) + 1 // Suggested max for Y-axis
                        },
                        x: {
                            grid: {
                                color: gridColor // Set the grid color for the X-axis
                            },
                            ticks: {
                                color: chartTextColor, // Change X-axis text color based on dark mode
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                },
                                maxRotation: 45, // Limit rotation for better readability
                                minRotation: 0,
                                autoSkip: true, // Automatically skip labels when crowded
                                maxTicksLimit: 10 // Limit the number of ticks on X-axis to avoid clutter
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: chartTextColor, // Change legend text color based on dark mode
                                font: {
                                    family: 'Poppins', // Set font family for legend
                                    size: 14, // Adjust size as needed
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    // Return the full label, not the truncated one
                                    return jobCertificationNames[tooltipItem.dataIndex] + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    responsive: true, // Responsive behavior
                    maintainAspectRatio: true, // Maintain aspect ratio
                    aspectRatio: 2 // Ratio of width to height
                }
            });





                         // Create the chart for resume certifications
                var ctxResume = document.getElementById('resumeCertificationChart').getContext('2d');
                
                // Define the maximum label length for truncation
                var maxLabelLength = 10;
                
                var resumeChart = new Chart(ctxResume, {
                    type: 'bar',
                    data: {
                        labels: resumeCertificationNames.map(function(label) {
                            if (label.length > maxLabelLength) {
                                return label.substring(0, maxLabelLength) + '...'; // Truncate long labels and add ellipsis
                            }
                            return label; // Keep labels under the limit as is
                        }), // X-axis labels (resume certifications)
                        datasets: [{
                            label: 'Frequency of Resume Certifications', // Updated label for the resume certifications
                            data: resumeCertificationCounts, // Y-axis data (counts)
                            backgroundColor: chartBackgroundColor, // Bar color
                            borderColor: chartBorderColor, // Bar border color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true, // Ensures Y-axis starts from 0
                                grid: {
                                    color: gridColor // Set the grid color for the Y-axis
                                },
                                ticks: {
                                    color: chartTextColor, // Change Y-axis text color based on dark mode
                                    font: {
                                        family: 'Poppins',
                                        size: 14,
                                    },
                                    stepSize: 1,
                                    callback: function(value) {
                                        return value;
                                    }
                                },
                                suggestedMax: Math.max(...resumeCertificationCounts) + 1 // Suggested max for Y-axis
                            },
                            x: {
                                grid: {
                                    color: gridColor // Set the grid color for the X-axis
                                },
                                ticks: {
                                    color: chartTextColor, // Change X-axis text color based on dark mode
                                    font: {
                                        family: 'Poppins',
                                        size: 14,
                                    },
                                    maxRotation: 45, // Limit rotation for better readability
                                    minRotation: 0,
                                    autoSkip: true, // Automatically skip labels when crowded
                                    maxTicksLimit: 10 // Limit the number of ticks on X-axis to avoid clutter
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: chartTextColor, // Change legend text color based on dark mode
                                    font: {
                                        family: 'Poppins', // Set font family for legend
                                        size: 14, // Adjust size as needed
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        // Return the full label, not the truncated one
                                        return resumeCertificationNames[tooltipItem.dataIndex] + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        },
                        responsive: true, // Responsive behavior
                        maintainAspectRatio: true, // Maintain aspect ratio
                        aspectRatio: 2 // Ratio of width to height
                    }
                });

        </script>
</x-app-layout>
