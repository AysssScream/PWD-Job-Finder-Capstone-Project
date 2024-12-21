<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="h-full ml-14 md:ml-64">
        <div class="py-5 px-6 rounded-b-lg shadow-md bg-gradient-to-r from-blue-500 to-blue-900 dark:from-gray-800 dark:to-gray-900">
            <div class="flex items-center space-x-2">
                <i class="fas fa-chart-line text-white dark:text-gray-300 text-2xl"></i>
                <h1 class="text-2xl font-bold text-white dark:text-gray-300">Employment Analytics</h1>
            </div>
        </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-6 gap-6">
        <!-- Total Hired PWDs Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-users text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($totalHired) }}</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Total Hired PWDs</p>
            </div>
        </div>
    
        <!-- Total Companies Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-building text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($totalCompanies) }}</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Total Companies</p>
            </div>
        </div>
    
        <!-- Active Job Posts Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-briefcase text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($activeJobPosts) }}</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Active Job Posts</p>
            </div>
        </div>
    
        <!-- Total Vacancies Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-clipboard-list text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($totalVacancies) }}</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Total Vacancies</p>
            </div>
        </div>
    
        <!-- Total Applications Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-file-alt text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($totalApplications) }}</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Total Applications</p>
            </div>
        </div>
    
        <!-- Hiring Rate Card -->
        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-100 shadow-lg rounded-xl flex items-center justify-between p-6 border-b-4 border-blue-600 transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl group">
            <div class="flex justify-center items-center w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <i class="fas fa-percentage text-blue-800 dark:text-blue-200 text-2xl transform transition-transform duration-500 ease-in-out"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-semibold text-gray-700 dark:text-gray-200">{{ number_format($hiringRate, 1) }}%</p>
                <p class="text-lg text-gray-500 dark:text-gray-400">Hiring Rate</p>
            </div>
        </div>
    </div>
    
<div class="mt-4 mx-4 mb-2"> 
    <div class="flex justify-center">
        <div class="relative w-1/2"> 
            <select id="chartSelector" class="w-full appearance-none bg-white dark:bg-gray-800 border-2 border-blue-500 dark:border-blue-600 text-gray-700 dark:text-white rounded-lg px-6 py-3 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg font-semibold cursor-pointer transition-all duration-300 hover:bg-blue-50 dark:hover:bg-gray-700">
                <option value="all" class="font-semibold">📊 Show All Charts</option>
                <option value="hiringTrend" class="font-semibold">📈 Hiring Trend Analysis</option>
                <option value="applicationTrend" class="font-semibold">📉 Application Trend Statistics</option>
                <option value="hiringCompanies" class="font-semibold">🏢 Top Hiring Companies</option>
                <option value="companiesVacancies" class="font-semibold">📋 Companies with Most Vacancies</option>
                <option value="jobPosting" class="font-semibold">📝 Top Companies by Job Postings</option>
                <option value="appliedJobs" class="font-semibold">📄 Most Applied Job Positions</option>
                <option value="hiredPositions" class="font-semibold">👥 Most Hired Job Titles</option>
                <option value="vacantJobs" class="font-semibold">🚪 Jobs with Most Vacancies</option>
                <option value="jobTypeHiring" class="font-semibold">💼 Job Type Hiring Distribution</option>
                <option value="disabilityType" class="font-semibold">♿ Disability Type Distribution</option>
                <option value="pastExperience" class="font-semibold">💼 Past Work Experience Analysis</option>

            </select>

            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-6 h-6 text-blue-500 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles for the select dropdown */
select#chartSelector {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: none;
    transition: all 0.3s ease;
}

/* Hover effect */
select#chartSelector:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Focus effect */
select#chartSelector:focus {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* Dark mode specific styles */
.dark select#chartSelector option {
    background-color: #1F2937;
}

/* Custom scrollbar for the dropdown */
select#chartSelector::-webkit-scrollbar {
    width: 8px;
}

select#chartSelector::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

select#chartSelector::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

select#chartSelector::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chartSelector = document.getElementById('chartSelector');
    const chartSections = {
        hiringTrend: document.querySelector('[data-chart="hiringTrend"]'),
        applicationTrend: document.querySelector('[data-chart="applicationTrend"]'),
        hiringCompanies: document.querySelector('[data-chart="hiringCompanies"]'),
        companiesVacancies: document.querySelector('[data-chart="companiesVacancies"]'),
        jobPosting: document.querySelector('[data-chart="jobPosting"]'),
        appliedJobs: document.querySelector('[data-chart="appliedJobs"]'),
        hiredPositions: document.querySelector('[data-chart="hiredPositions"]'),
        vacantJobs: document.querySelector('[data-chart="vacantJobs"]'),
        hiringTimeline: document.querySelector('[data-chart="hiringTimeline"]'),
        jobTypeHiring: document.querySelector('[data-chart="jobTypeHiring"]'),
        disabilityType: document.querySelector('[data-chart="disabilityType"]'),    
        pastExperience: document.querySelector('[data-chart="pastExperience"]')


    };

    function toggleCharts(selectedValue) {
        // For debugging
        console.log('Selected value:', selectedValue);
        console.log('Available sections:', Object.keys(chartSections));

        Object.entries(chartSections).forEach(([key, section]) => {
            if (!section) {
                console.log(`Section not found: ${key}`);
                return;
            }

            if (selectedValue === 'all' || selectedValue === key) {
                section.style.display = 'block';
                console.log(`Showing section: ${key}`);
            } else {
                section.style.display = 'none';
                console.log(`Hiding section: ${key}`);
            }
        });
    }

    chartSelector.addEventListener('change', function(e) {
        toggleCharts(e.target.value);
    });

    // Initialize with all charts visible
    toggleCharts('all');
});

</script>

<div class="mt-8 mx-4 p-4" data-chart="hiringTrend">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Hiring Trend Analysis</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                            <i class="fas fa-chart-line mr-2"></i>
                            Hiring Trend Statistics
                        </h3>
                        <select id="trendPeriodSelector" class="bg-white dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg px-4 py-2 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="last_15_days">Last 15 Days</option>
                            <option value="last_month">Last Month</option>
                            <option value="last_year">Last Year</option>
                        </select>
                    </div>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="hiringTrendChart"></canvas>
                </div>

                <!-- Updated Statistics Display -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 bg-gradient-to-r from-blue-500 to-blue-600">
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">TOTAL HIRES</p>
                                <p class="text-2xl font-bold mt-1" id="totalHiresValue"></p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900 rounded-full p-3">
                                <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">AVERAGE HIRES</p>
                                <p class="text-2xl font-bold mt-1" id="avgHiresValue"></p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900 rounded-full p-3">
                                <i class="fas fa-chart-line text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">PEAK HIRES</p>
                                <p class="text-2xl font-bold mt-1" id="peakHiresValue"></p>
                            </div>
                            <div class="bg-purple-100 dark:bg-purple-900 rounded-full p-3">
                                <i class="fas fa-trophy text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentChart = null;
    const trendData = {
        last_15_days: {
            labels: {!! json_encode(collect($hiringTrends['last_15_days'])->pluck('date')) !!},
            data: {!! json_encode(collect($hiringTrends['last_15_days'])->pluck('hired_count')) !!}
        },
        last_month: {
            labels: {!! json_encode(collect($hiringTrends['last_month'])->pluck('date')) !!},
            data: {!! json_encode(collect($hiringTrends['last_month'])->pluck('hired_count')) !!}
        },
        last_year: {
            labels: {!! json_encode(collect($hiringTrends['last_year'])->pluck('date')) !!},
            data: {!! json_encode(collect($hiringTrends['last_year'])->pluck('hired_count')) !!}
        }
    };

    function createChart(period, isDarkMode) {
        const ctx = document.getElementById('hiringTrendChart').getContext('2d');
        const textColor = isDarkMode ? '#ffffff' : '#1f2937';
        const gridColor = isDarkMode ? '#374151' : '#e5e7eb';

        if (currentChart) {
            currentChart.destroy();
        }

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        maxRotation: period === 'last_year' ? 0 : 45,
                        minRotation: period === 'last_year' ? 0 : 45,
                        callback: function(value, index, values) {
                            const label = this.getLabelForValue(value);
                            if (period === 'last_year') {
                                return label;
                            } else {
                                return label;
                            }
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: isDarkMode ? 'rgba(0, 0, 0, 0.8)' : 'rgba(255, 255, 255, 0.8)',
                    titleColor: isDarkMode ? '#fff' : '#000',
                    bodyColor: isDarkMode ? '#fff' : '#000',
                    borderColor: 'rgba(59, 130, 246, 0.5)',
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        title: function(tooltipItems) {
                            const item = tooltipItems[0];
                            if (period === 'last_year') {
                                return `Month: ${item.label}`;
                            } else {
                                return `Date: ${item.label}`;
                            }
                        },
                        label: function(context) {
                            return `Hires: ${context.raw}`;
                        }
                    }
                },
                title: {
                    display: true,
                    text: `Hiring Trend Analysis - ${getPeriodTitle(period)}`,
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'easeInOutQuart'
                }
            }
        };

        currentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: trendData[period].labels,
                datasets: [{
                    label: 'Number of Hires',
                    data: trendData[period].data,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: chartOptions
        });

        updateTotalHires(period);
    }

    function getPeriodTitle(period) {
        switch(period) {
            case 'last_15_days':
                return 'Last 15 Days';
            case 'last_month':
                return 'Last 30 Days';
            case 'last_year':
                return 'This Year';
            default:
                return '';
        }
    }

    function updateTotalHires(period) {
        const totalHires = trendData[period].data.reduce((a, b) => a + b, 0);
        const averageHires = (totalHires / trendData[period].data.length).toFixed(1);
        const maxHires = Math.max(...trendData[period].data);
        const averageLabel = period === 'last_year' ? 'PER MONTH' : 'PER DAY';
        
        // Update statistics values
        document.getElementById('totalHiresValue').textContent = `${totalHires}`;
        document.getElementById('avgHiresValue').textContent = `${averageHires} ${averageLabel}`;
        document.getElementById('peakHiresValue').textContent = `${maxHires}`;
    }

    // Initial chart creation
    const isDarkMode = document.documentElement.classList.contains('dark');
    createChart('last_15_days', isDarkMode);

    // Handle period changes
    document.getElementById('trendPeriodSelector').addEventListener('change', function(e) {
        const isDarkMode = document.documentElement.classList.contains('dark');
        createChart(e.target.value, isDarkMode);
        
        // Add animation class to chart container
        const chartContainer = document.getElementById('hiringTrendChart').parentElement;
        chartContainer.classList.add('chart-transition');
        setTimeout(() => chartContainer.classList.remove('chart-transition'), 300);
    });

    // Handle dark mode changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                createChart(document.getElementById('trendPeriodSelector').value, isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });

    // Add window resize handler for responsiveness
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            const isDarkMode = document.documentElement.classList.contains('dark');
            createChart(document.getElementById('trendPeriodSelector').value, isDarkMode);
        }, 250);
    });
});

// Add these styles
const styles = `
    .chart-transition {
        animation: chartFade 0.3s ease-in-out;
    }

    @keyframes chartFade {
        0% {
            opacity: 0.5;
            transform: scale(0.98);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .trend-card {
        transition: all 0.3s ease;
    }

    .trend-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                    0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    #trendPeriodSelector {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%234B5563'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }

    .dark #trendPeriodSelector {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%239CA3AF'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
    }

    .statistics-card {
        background: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                    0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .statistics-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 12px -1px rgba(0, 0, 0, 0.1), 
                    0 4px 6px -1px rgba(0, 0, 0, 0.06);
    }

    .statistics-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .statistics-card:hover .statistics-icon {
        transform: scale(1.1);
    }

    .dark .statistics-card {
        background: #1F2937;
    }

    .statistics-value {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1F2937;
        line-height: 1.2;
        margin-top: 0.5rem;
    }

    .dark .statistics-value {
        color: #F3F4F6;
    }

    .statistics-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6B7280;
        text-transform: uppercase;
    }

    .dark .statistics-label {
        color: #9CA3AF;
    }

    @media (max-width: 768px) {
        .statistics-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .statistics-card {
            padding: 1rem;
        }

        .statistics-value {
            font-size: 1.5rem;
        }

        .statistics-icon {
            width: 40px;
            height: 40px;
        }

        #totalHiresDisplay .flex {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }
    }

    @media (max-width: 640px) {
        #trendPeriodSelector {
            width: 100%;
            margin-top: 0.5rem;
        }
    }
`;

// Add styles to document
const styleSheet = document.createElement("style");
styleSheet.innerText = styles;
document.head.appendChild(styleSheet);


</script>

<div class="mt-8 mx-4 p-4" data-chart="applicationTrend">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Application Trend Analysis</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                            <i class="fas fa-file-alt mr-2"></i>
                            Application Trend Statistics
                        </h3>
                        <select id="applicationPeriodSelector" class="bg-white dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg px-4 py-2 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="last_15_days">Last 15 Days</option>
                            <option value="last_month">Last Month</option>
                            <option value="last_year">This Year</option>
                        </select>
                    </div>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="applicationTrendChart"></canvas>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 bg-gradient-to-r from-blue-500 to-blue-600">
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">TOTAL APPLICATIONS</p>
                                <p class="text-2xl font-bold mt-1" id="totalApplicationsValue"></p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900 rounded-full p-3">
                                <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">AVERAGE APPLICATIONS</p>
                                <p class="text-2xl font-bold mt-1" id="avgApplicationsValue"></p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900 rounded-full p-3">
                                <i class="fas fa-chart-line text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-800 dark:text-white">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">PEAK APPLICATIONS</p>
                                <p class="text-2xl font-bold mt-1" id="peakApplicationsValue"></p>
                            </div>
                            <div class="bg-purple-100 dark:bg-purple-900 rounded-full p-3">
                                <i class="fas fa-trophy text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let applicationChart = null;
    const applicationData = {
        last_15_days: {
            labels: {!! json_encode(collect($applicationTrends['last_15_days'])->pluck('date')) !!},
            data: {!! json_encode(collect($applicationTrends['last_15_days'])->pluck('application_count')) !!}
        },
        last_month: {
            labels: {!! json_encode(collect($applicationTrends['last_month'])->pluck('date')) !!},
            data: {!! json_encode(collect($applicationTrends['last_month'])->pluck('application_count')) !!}
        },
        last_year: {
            labels: {!! json_encode(collect($applicationTrends['last_year'])->pluck('date')) !!},
            data: {!! json_encode(collect($applicationTrends['last_year'])->pluck('application_count')) !!}
        }
    };

    function createApplicationChart(period, isDarkMode) {
        const ctx = document.getElementById('applicationTrendChart').getContext('2d');
        const textColor = isDarkMode ? '#ffffff' : '#1f2937';
        const gridColor = isDarkMode ? '#374151' : '#e5e7eb';

        if (applicationChart) {
            applicationChart.destroy();
        }

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        maxRotation: period === 'last_year' ? 0 : 45,
                        minRotation: period === 'last_year' ? 0 : 45
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: isDarkMode ? 'rgba(0, 0, 0, 0.8)' : 'rgba(255, 255, 255, 0.8)',
                    titleColor: isDarkMode ? '#fff' : '#000',
                    bodyColor: isDarkMode ? '#fff' : '#000',
                    borderColor: 'rgba(59, 130, 246, 0.5)',
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        title: function(tooltipItems) {
                            const item = tooltipItems[0];
                            if (period === 'last_year') {
                                return `Month: ${item.label}`;
                            } else {
                                return `Date: ${item.label}`;
                            }
                        },
                        label: function(context) {
                            return `Applications: ${context.raw}`;
                        }
                    }
                },
                title: {
                    display: true,
                    text: `Application Trend Analysis - ${getApplicationPeriodTitle(period)}`,
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'easeInOutQuart'
                }
            }
        };

        applicationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: applicationData[period].labels,
                datasets: [{
                    label: 'Number of Applications',
                    data: applicationData[period].data,
                    borderColor: 'rgb(16, 185, 129)',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(16, 185, 129)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: chartOptions
        });

        updateApplicationStats(period);
    }

    function getApplicationPeriodTitle(period) {
        switch(period) {
            case 'last_15_days':
                return 'Last 15 Days';
            case 'last_month':
                return 'Last 30 Days';
            case 'last_year':
                return 'This Year';
            default:
                return '';
        }
    }

    function updateApplicationStats(period) {
        const totalApplications = applicationData[period].data.reduce((a, b) => a + b, 0);
        const averageApplications = (totalApplications / applicationData[period].data.length).toFixed(1);
        const peakApplications = Math.max(...applicationData[period].data);
        const averageLabel = period === 'last_year' ? 'PER MONTH' : 'PER DAY';
        
        document.getElementById('totalApplicationsValue').textContent = `${totalApplications}`;
        document.getElementById('avgApplicationsValue').textContent = `${averageApplications} ${averageLabel}`;
        document.getElementById('peakApplicationsValue').textContent = `${peakApplications}`;
    }

    // Initial chart creation
    const isDarkMode = document.documentElement.classList.contains('dark');
    createApplicationChart('last_15_days', isDarkMode);

    // Handle period changes
    document.getElementById('applicationPeriodSelector').addEventListener('change', function(e) {
        const isDarkMode = document.documentElement.classList.contains('dark');
        createApplicationChart(e.target.value, isDarkMode);
        
        const chartContainer = document.getElementById('applicationTrendChart').parentElement;
        chartContainer.classList.add('chart-transition');
        setTimeout(() => chartContainer.classList.remove('chart-transition'), 300);
    });

    // Handle dark mode changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                createApplicationChart(document.getElementById('applicationPeriodSelector').value, isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });

    // Add window resize handler for responsiveness
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            const isDarkMode = document.documentElement.classList.contains('dark');
            createApplicationChart(document.getElementById('applicationPeriodSelector').value, isDarkMode);
        }, 250);
    });
});

// Add these additional styles for the application trend section
const applicationStyles = `
    .application-chart-transition {
        animation: chartFade 0.3s ease-in-out;
    }

    #applicationPeriodSelector {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%234B5563'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        transition: all 0.3s ease;
    }

    #applicationPeriodSelector:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .dark #applicationPeriodSelector {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%239CA3AF'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
    }

    .application-stat-card {
        transition: all 0.3s ease;
    }

    .application-stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 12px -1px rgba(0, 0, 0, 0.1), 
                    0 4px 6px -1px rgba(0, 0, 0, 0.06);
    }

    .application-stat-icon {
        transition: all 0.3s ease;
    }

    .application-stat-card:hover .application-stat-icon {
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        #applicationPeriodSelector {
            width: 100%;
            margin-top: 0.5rem;
        }

        .application-stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .application-stat-card {
            padding: 1rem;
        }
    }
`;

// Add application styles to document
const applicationStyleSheet = document.createElement("style");
applicationStyleSheet.innerText = applicationStyles;
document.head.appendChild(applicationStyleSheet);
</script>





<div class="mt-8 mx-4 p-4" data-chart="hiringCompanies">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Top Hiring Companies</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-building mr-2"></i>
                        Companies Hiring Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="hiringCompaniesChart"></canvas>
                </div>

                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d bg-gradient-to-r from-green-500 to-green-600 rounded">
                    <i class="fas fa-building mr-2 text-white"></i>
                    {{ $totalCompanyHires }} TOTAL HIRES FROM ALL COMPANIES
                </h2>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Company Name
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Hired Count
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topHiringCompanies as $company)
                            @php
                                $percentage = $totalCompanyHires > 0 ? number_format(($company->hired_count / $totalCompanyHires) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->company_name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->hired_count }} Hires
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'tophiringcompanies']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentChart = createChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentChart) {
                    currentChart.destroy();
                }
                currentChart = createChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createChart(isDarkMode) {
    const ctx = document.getElementById('hiringCompaniesChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topHiringCompaniesGraph->pluck('company_name')) !!},
            datasets: [{
                label: 'Number of Hires',
                data: {!! json_encode($topHiringCompaniesGraph->pluck('hired_count')) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.8)', 
                borderColor: 'rgb(59, 130, 246)', 
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Top Hiring Companies',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });
}
</script>


<div class="mt-8 mx-4 p-4" data-chart="companiesVacancies">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Companies with Most Vacancies</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-users mr-2"></i>
                        Companies Total Vacancies Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="companiesVacanciesChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Company Name
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Total Vacancies
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalAllVacancies > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-users mr-2 text-white"></i>
                            {{ $totalAllVacancies }} TOTAL AVAILABLE VACANCIES FROM ALL COMPANIES
                        </h2>
                        <tbody>
                            @foreach($topCompaniesWithVacancies as $company)
                            @php
                                $totalAllVacancies = $topCompaniesWithVacancies->sum('total_vacancies');
                                $percentage = $totalAllVacancies > 0 ? number_format(($company->total_vacancies / $totalAllVacancies) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->company_name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->total_vacancies }} Positions
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'topcompaniesvacancies']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentCompaniesVacanciesChart = createCompaniesVacanciesChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentCompaniesVacanciesChart) {
                    currentCompaniesVacanciesChart.destroy();
                }
                currentCompaniesVacanciesChart = createCompaniesVacanciesChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createCompaniesVacanciesChart(isDarkMode) {
    const ctx = document.getElementById('companiesVacanciesChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topCompaniesWithVacancies->pluck('company_name')) !!},
            datasets: [{
                label: 'Total Vacancies',
                data: {!! json_encode($topCompaniesWithVacancies->pluck('total_vacancies')) !!},
                backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.8)' : 'rgba(59, 130, 246, 0.8)',
                borderColor: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        callback: function(value) {
                            const label = this.getLabelForValue(value);
                            if (label.length > 20) {
                                return label.substr(0, 20) + '...';
                            }
                            return label;
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Companies with Most Total Vacancies',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Total Vacancies: ${context.raw}`;
                        },
                        title: function(context) {
                            return context[0].label;
                        }
                    }
                }
            }
        }
    });
}
</script>


<div class="mt-8 mx-4 p-4" data-chart="jobPosting">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Top Companies by Job Postings</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-building mr-2"></i>
                        Companies Job Posting Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="jobPostingCompaniesChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Company Name
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Number of Job Posts
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalAllJobPosts > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-file-alt mr-2 text-white"></i>
                            {{ $totalAllJobPosts }} TOTAL JOB POSTINGS FROM ALL COMPANIES
                        </h2>
                        <tbody>
                            @foreach($topJobPostingCompanies as $company)
                            @php
                                $totalPosts = $topJobPostingCompanies->sum('job_count');
                                $percentage = $totalPosts > 0 ? number_format(($company->job_count / $totalPosts) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->company_name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $company->job_count }} Posts
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'topjobpostingcompanies']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentJobPostingChart = createJobPostingChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentJobPostingChart) {
                    currentJobPostingChart.destroy();
                }
                currentJobPostingChart = createJobPostingChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createJobPostingChart(isDarkMode) {
    const ctx = document.getElementById('jobPostingCompaniesChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topJobPostingCompanies->pluck('company_name')) !!},
            datasets: [{
                label: 'Number of Job Postings',
                data: {!! json_encode($topJobPostingCompanies->pluck('job_count')) !!},
                backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.8)' : 'rgba(59, 130, 246, 0.8)',
                borderColor: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        callback: function(value) {
                            const label = this.getLabelForValue(value);
                            if (label.length > 20) {
                                return label.substr(0, 20) + '...';
                            }
                            return label;
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Companies with Most Job Postings',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Job Posts: ${context.raw}`;
                        },
                        title: function(context) {
                            return context[0].label;
                        }
                    }
                }
            }
        }
    });
}
</script>


<div class="mt-8 mx-4 p-4" data-chart="appliedJobs">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Most Applied Job Positions</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-file-signature mr-2"></i>
                        Job Applications Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="appliedJobsChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Job Title
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Applications Count
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalAllApplications > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-file-signature mr-2 text-white"></i>
                            {{ $totalAllApplications }} TOTAL APPLICATIONS ACROSS ALL JOB POSITIONS
                        </h2>
                        <tbody>
                            @foreach($topAppliedJobs as $job)
                            @php
                                $percentage = $totalAllApplications > 0 ? number_format(($job->application_count / $totalAllApplications) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $job->title }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $job->application_count }} Applications
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'topappliedjobs']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentAppliedJobsChart = createAppliedJobsChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentAppliedJobsChart) {
                    currentAppliedJobsChart.destroy();
                }
                currentAppliedJobsChart = createAppliedJobsChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createAppliedJobsChart(isDarkMode) {
    const ctx = document.getElementById('appliedJobsChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topAppliedJobsGraph->pluck('title')) !!},
            datasets: [{
                label: 'Number of Applications',
                data: {!! json_encode($topAppliedJobsGraph->pluck('application_count')) !!},
                backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.8)' : 'rgba(59, 130, 246, 0.8)',
                borderColor: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        callback: function(value) {
                            const label = this.getLabelForValue(value);
                            if (label.length > 20) {
                                return label.substr(0, 20) + '...';
                            }
                            return label;
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Top 10 Most Applied Job Positions',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Applications: ${context.raw}`;
                        },
                        title: function(context) {
                            return context[0].label;
                        }
                    }
                }
            }
        }
    });
}
</script>


<div class="mt-8 mx-4 p-4" data-chart="hiredPositions">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Most Hired Job Titles</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-briefcase mr-2"></i>
                        Job Titles Hiring Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="hiredPositionsChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Job Title
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Hired Count
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalPositionHires > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-briefcase mr-2 text-white"></i>
                            {{ $totalPositionHires }} TOTAL HIRES ACROSS ALL JOB TITLES
                        </h2>
                        <tbody>
                        @foreach($topHiredPositions as $position)
                        @php
                            $percentage = $totalPositionHires > 0 ? number_format(($position->hired_count / $totalPositionHires) * 100, 1) : 0;
                        @endphp
                        <tr class="text-gray-700 dark:text-gray-100">
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $position->title }}
                            </td>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $position->hired_count }} Hires
                            </td>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                <div class="flex items-center">
                                    <span class="mr-2">{{ $percentage }}%</span>
                                    <div class="relative w-full">
                                        <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                            <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'tophiredpositions']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentPositionsChart = createPositionsChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentPositionsChart) {
                    currentPositionsChart.destroy();
                }
                currentPositionsChart = createPositionsChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

    function createPositionsChart(isDarkMode) {
    const ctx = document.getElementById('hiredPositionsChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topHiredPositionsGraph->pluck('title')) !!},
            datasets: [{
                label: 'Number of Hires',
                data: {!! json_encode($topHiredPositionsGraph->pluck('hired_count')) !!},
                backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.8)' : 'rgba(59, 130, 246, 0.8)',
                borderColor: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        callback: function(value) {
                            const label = this.getLabelForValue(value);
                            if (label.length > 20) {
                                return label.substr(0, 20) + '...';
                            }
                            return label;
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Most Hired Job Titles',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Hires: ${context.raw}`;
                        },
                        title: function(context) {
                            return context[0].label;
                        }
                    }
                }
            }
        }
    });
}
</script>



<div class="mt-8 mx-4 p-4" data-chart="vacantJobs">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Jobs with Most Vacancies</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-door-open mr-2"></i>
                        Available Job Vacancies Statistics
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="vacantJobsChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Job Title
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Company
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Vacancies
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalAllVacancies > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-door-open mr-2 text-white"></i>
                            {{ $totalAllVacancies }} TOTAL AVAILABLE VACANCIES
                        </h2>

                        <tbody>
                            @foreach($topVacantJobs as $job)
                            @php
                                $totalVacancies = $topVacantJobs->sum('vacancy');
                                $percentage = $totalVacancies > 0 ? number_format(($job->vacancy / $totalVacancies) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $job->title }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $job->company_name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $job->vacancy }} Positions
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
                <a href="{{ route('admin.details', ['type' => 'topvacantjobs']) }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors inline-flex items-center">
                    <span>See More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentVacantJobsChart = createVacantJobsChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentVacantJobsChart) {
                    currentVacantJobsChart.destroy();
                }
                currentVacantJobsChart = createVacantJobsChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createVacantJobsChart(isDarkMode) {
    const ctx = document.getElementById('vacantJobsChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topVacantJobsGraph->pluck('title')) !!},
            datasets: [{
                label: 'Number of Vacancies',
                data: {!! json_encode($topVacantJobsGraph->pluck('vacancy')) !!},
                backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.8)' : 'rgba(59, 130, 246, 0.8)',
                borderColor: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold',
                            size: 12
                        },
                        color: textColor,
                        callback: function(value) {
                            const label = this.getLabelForValue(value);
                            if (label.length > 20) {
                                return label.substr(0, 20) + '...';
                            }
                            return label;
                        }
                    },
                    grid: {
                        color: gridColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor
                    }
                },
                title: {
                    display: true,
                    text: 'Top 10 Jobs with Most Vacancies',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Vacancies: ${context.raw}`;
                        },
                        title: function(context) {
                            const jobIndex = context[0].dataIndex;
                            const jobs = {!! json_encode($topVacantJobsGraph) !!};
                            return `${jobs[jobIndex].title}\n${jobs[jobIndex].company_name}`;
                        }
                    }
                }
            }
        }
    });
}

</script>

<style>
.dark .chart-container {
    transition: background-color 0.3s ease;
}

.dark canvas {
    filter: brightness(0.8);
}
</style>


<style>
[data-chart] {
    transition: all 0.3s ease-in-out;
}

.chart-selector {
    transition: all 0.2s ease-in-out;
}

.chart-selector:hover {
    transform: scale(1.02);
}

select#chartSelector {
    min-width: 200px;
    cursor: pointer;
}

select#chartSelector:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
}

.dark select#chartSelector {
    color: white;
}
</style>


<div class="mt-8 mx-4 p-4" data-chart="jobTypeHiring">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">Job Type Hiring Distribution</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-briefcase mr-2"></i>
                        Hiring Distribution by Employment Type
                    </h3>
                </div>
                <div class="container mx-auto p-10 bg-white dark:bg-gray-800" style="height: 700px;">
                    <canvas id="jobTypeHiringChart"></canvas>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="gradient-bg bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employment Type
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Number of Hires
                                </th>
                                <th class="px-4 text-white dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                            @if($totalJobTypeHires > 0) bg-gradient-to-r from-green-500 to-green-600 
                            @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                            <i class="fas fa-briefcase mr-2 text-white"></i>
                            {{ $totalJobTypeHires }} TOTAL HIRES ACROSS ALL JOB TYPES
                        </h2>
                        <tbody>
                            @foreach($jobTypeHiring as $type)
                            @php
                                $percentage = $totalJobTypeHires > 0 ? number_format(($type->hired_count / $totalJobTypeHires) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $type->job_type }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $type->hired_count }} Hires
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                <div style="width: {{ $percentage }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
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
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentJobTypeChart = createJobTypeHiringChart(isDarkMode);

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentJobTypeChart) {
                    currentJobTypeChart.destroy();
                }
                currentJobTypeChart = createJobTypeHiringChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});
function createJobTypeHiringChart(isDarkMode) {
    const ctx = document.getElementById('jobTypeHiringChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    
    // Define colors for different job types with better visibility
    const backgroundColors = [
        'rgba(59, 130, 246, 0.8)',   // Blue
        'rgba(16, 185, 129, 0.8)',   // Green
        'rgba(245, 158, 11, 0.8)',   // Yellow
        'rgba(239, 68, 68, 0.8)',    // Red
        'rgba(139, 92, 246, 0.8)',   // Purple
        'rgba(236, 72, 153, 0.8)',   // Pink
        'rgba(6, 182, 212, 0.8)',    // Cyan
        'rgba(251, 146, 60, 0.8)'    // Orange
    ];

    const borderColors = backgroundColors.map(color => color.replace('0.8', '1'));

    return new Chart(ctx, {
        type: 'doughnut', // You can use 'pie' instead of 'doughnut' if you prefer
        data: {
            labels: {!! json_encode($jobTypeHiring->pluck('job_type')) !!},
            datasets: [{
                data: {!! json_encode($jobTypeHiring->pluck('hired_count')) !!},
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 2,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%', // Adjust this value to change the size of the center hole (for doughnut chart)
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        color: textColor,
                        padding: 20,
                        generateLabels: function(chart) {
                            const data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                const dataset = data.datasets[0];
                                const total = dataset.data.reduce((acc, value) => acc + value, 0);
                                return data.labels.map((label, i) => {
                                    const value = dataset.data[i];
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return {
                                        text: `${label}: ${value} (${percentage}%)`,
                                        fillStyle: dataset.backgroundColor[i],
                                        strokeStyle: dataset.borderColor[i],
                                        lineWidth: 1,
                                        hidden: isNaN(dataset.data[i]) || dataset.data[i] === 0,
                                        index: i
                                    };
                                });
                            }
                            return [];
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Distribution of Hires by Employment Type',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    color: textColor,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const value = context.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return ` ${context.label}: ${value} hires (${percentage}%)`;
                        }
                    }
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
}

</script>

<div class="mt-8 mx-4 p-4" data-chart="disabilityType">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">
            <i class="fas fa-universal-access mr-2"></i>
            Disability Distribution Among Hired PWDs
        </h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <!-- Header -->
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Distribution by Disability Type
                    </h3>
                </div>

                <!-- Total Counter -->
                <div class="p-4">
                    <div class="text-center text-white font-bold mb-4 p-4 shadow-3d 
                        @if($totalDisabilityHires > 0) bg-gradient-to-r from-blue-500 to-blue-600 
                        @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                        <i class="fas fa-users mr-2"></i>
                        {{ $totalDisabilityHires }} TOTAL HIRED PWDs
                    </div>
                </div>

                <!-- Chart Container -->
                <div class="container mx-auto p-6 bg-white dark:bg-gray-800" style="height: 500px;">
                    <canvas id="disabilityTypeChart"></canvas>
                </div>

                <!-- Table -->
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-blue-500">
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Disability Type
                                </th>
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Number of Hires
                                </th>
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($disabilityTypeHiring as $type)
                            @php
                                $percentage = $totalDisabilityHires > 0 ? 
                                    number_format(($type['count'] / $totalDisabilityHires) * 100, 1) : 0;
                            @endphp
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $type['disability'] }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $type['count'] }} Hires
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $percentage }}%</span>
                                        <div class="relative w-full">
                                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
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
        </div>
    </div>
</div>

<!-- Chart JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    let currentDisabilityChart = createDisabilityTypeChart(isDarkMode);

    // Observer for dark mode changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const isDarkMode = document.documentElement.classList.contains('dark');
                if (currentDisabilityChart) {
                    currentDisabilityChart.destroy();
                }
                currentDisabilityChart = createDisabilityTypeChart(isDarkMode);
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true
    });
});

function createDisabilityTypeChart(isDarkMode) {
    const ctx = document.getElementById('disabilityTypeChart').getContext('2d');
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
    
    // Convert PHP collection to JavaScript arrays
    const disabilities = {!! json_encode($disabilityTypeHiring->pluck('disability')) !!};
    const counts = {!! json_encode($disabilityTypeHiring->pluck('count')) !!};

    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: disabilities,
            datasets: [{
                label: 'Number of Hired PWDs',
                data: counts,
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 5,
                barThickness: 40,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y', // This makes it a horizontal bar chart
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                        borderColor: gridColor
                    },
                    ticks: {
                        color: textColor,
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor,
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: textColor,
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        padding: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Distribution of Hired PWDs by Disability Type',
                    color: textColor,
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const value = context.raw;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${value} PWDs (${percentage}%)`;
                        }
                    }
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            },
            hover: {
                mode: 'nearest',
                intersect: false
            }
        }
    });
}
</script>

<!-- Add this to your existing chart selector dropdown if not already present -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chartSelector = document.getElementById('chartSelector');
    const chartSections = {
        // ... your existing chart sections ...
        disabilityType: document.querySelector('[data-chart="disabilityType"]')
    };

    function toggleCharts(selectedValue) {
        Object.entries(chartSections).forEach(([key, section]) => {
            if (!section) {
                console.log(`Section not found: ${key}`);
                return;
            }

            if (selectedValue === 'all' || selectedValue === key) {
                section.style.display = 'block';
                console.log(`Showing section: ${key}`);
            } else {
                section.style.display = 'none';
                console.log(`Hiding section: ${key}`);
            }
        });
    }

    chartSelector.addEventListener('change', function(e) {
        toggleCharts(e.target.value);
    });

    // Initialize with all charts visible
    toggleCharts('all');
});
</script>

<!-- Add these styles -->
<style>
.gradient-bg {
    background: linear-gradient(to right, #2563eb, #1d4ed8);
}

.header-gradient-bg {
    background: linear-gradient(to right, #2563eb, #1d4ed8);
}

.shadow-3d {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.dark .shadow-3d {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 
                0 2px 4px -1px rgba(0, 0, 0, 0.12);
}

[data-chart] {
    display: block;
    transition: all 0.3s ease-in-out;
}

[data-chart].hidden {
    display: none;
}

/* Add smooth transitions for hover effects */
.hover\:shadow-lg:hover {
    transition: all 0.3s ease;
}

/* Add some hover effects to the table rows */
tbody tr:hover {
    background-color: rgba(59, 130, 246, 0.05);
    transition: background-color 0.3s ease;
}

/* Improve progress bar aesthetics */
.bg-blue-200 {
    transition: width 0.3s ease;
}

.bg-blue-600 {
    transition: width 0.3s ease;
}
</style>

<div class="mt-8 mx-4 p-4" data-chart="pastExperience">
    <div class="gradient-bg p-4">
        <h2 class="text-2xl font-semibold text-white dark:text-gray-200">
            <i class="fas fa-briefcase mr-2"></i>
            Past Work Experience Analysis
        </h2>
    </div>

    <!-- Total Counter -->
    <div class="p-4">
        <div class="text-center text-white font-bold mb-4 p-4 shadow-3d bg-gradient-to-r from-blue-500 to-blue-600 rounded">
            <i class="fas fa-briefcase mr-2"></i>
            {{ $totalPastExperiences }} TOTAL WORK EXPERIENCES RECORDED
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Previous Positions Chart -->
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-user-tie mr-2"></i>
                        Most Common Previous Positions
                    </h3>
                </div>

                <div class="container mx-auto p-6 bg-white dark:bg-gray-800" style="height: 400px;">
                    <canvas id="pastPositionsChart"></canvas>
                </div>

                <!-- Table for Positions -->
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-blue-500">
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Position</th>
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Count</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($pastPositions as $position)
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $position->position_held }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $position->position_count }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Previous Employers Chart -->
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-building mr-2"></i>
                        Top Previous Employers
                    </h3>
                </div>

                <div class="container mx-auto p-6 bg-white dark:bg-gray-800" style="height: 400px;">
                    <canvas id="pastEmployersChart"></canvas>
                </div>

                <!-- Table for Employers -->
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-blue-500">
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Employer</th>
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Count</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($pastEmployers as $employer)
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $employer->employer_name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $employer->employer_count }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Analysis Section -->
    <div class="mt-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="relative w-full max-w-full flex-grow flex-1 header-gradient-bg p-4 rounded-t-lg">
                    <h3 class="font-semibold text-lg text-white dark:text-gray-50">
                        <i class="fas fa-tools mr-2"></i>
                        Most Common Skills from Past Experiences
                    </h3>
                </div>

                <div class="container mx-auto p-6 bg-white dark:bg-gray-800" style="height: 300px;">
                    <canvas id="skillsChart"></canvas>
                </div>

                <!-- Skills Table -->
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-blue-500">
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Skill</th>
                                <th class="px-4 text-white align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Frequency</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($skillsAnalysis as $skill => $count)
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $skill }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                    {{ $count }}
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

<!-- Chart JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    createPastExperienceCharts(isDarkMode);
});

function createPastExperienceCharts(isDarkMode) {
    const textColor = isDarkMode ? '#ffffff' : '#1f2937';
    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';

    // Past Positions Chart
    const positionsCtx = document.getElementById('pastPositionsChart').getContext('2d');
    new Chart(positionsCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($pastPositions->pluck('position_held')) !!},
            datasets: [{
                label: 'Number of PWDs',
                data: {!! json_encode($pastPositions->pluck('position_count')) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor
                    },
                    ticks: {
                        color: textColor
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.raw} PWDs held this position`;
                        }
                    }
                }
            }
        }
    });

    // Past Employers Chart
    const employersCtx = document.getElementById('pastEmployersChart').getContext('2d');
    new Chart(employersCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($pastEmployers->pluck('employer_name')) !!},
            datasets: [{
                data: {!! json_encode($pastEmployers->pluck('employer_count')) !!},
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(6, 182, 212, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: textColor
                    }
                }
            }
        }
    });

    // Skills Chart
    const skillsCtx = document.getElementById('skillsChart').getContext('2d');
    new Chart(skillsCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($skillsAnalysis->keys()) !!},
            datasets: [{
                label: 'Frequency',
                data: {!! json_encode($skillsAnalysis->values()) !!},
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor,
                        maxRotation: 45,
                        minRotation: 45
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor
                    },
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}

// Observer for dark mode changes
const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'class') {
            const isDarkMode = document.documentElement.classList.contains('dark');
            createPastExperienceCharts(isDarkMode);
        }
    });
});

observer.observe(document.documentElement, {
    attributes: true
});
</script>



</x-app-layout>


