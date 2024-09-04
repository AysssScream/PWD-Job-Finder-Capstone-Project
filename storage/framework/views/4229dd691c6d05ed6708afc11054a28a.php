<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="h-full ml-14 md:ml-64">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 p-4 gap-4">
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
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($userCount); ?></p>
                    <p>PWD Users</p>
                </div>
            </div>
            <!-- Employers Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-building text-blue-800 text-2xl transform transition-transform duration-500 ease-in-out"></i>

                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($employerCount); ?></p>
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
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($jobInfoCount); ?></p>
                    <p>Jobs</p>
                </div>
            </div>
            <!-- Unemployed PWD Card -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-thumbs-up text-blue-800 text-2xl transform transition-transform duration-500 ease-in-out"></i>

                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($hiredjobCount); ?>

                    <p>Approved Job Applications</p>
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
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($pendingjobCount); ?></p>
                    <p>Pending Job Applications</p>
                </div>
            </div>

            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-blue-500 font-medium group">
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-100 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i
                        class="fas fa-check-circle text-blue-800 text-2xl transform transition-transform duration-500 ease-in-out"></i>

                </div>
                <div class="text-right">
                    <p class="text-2xl text-gray-700 dark:text-gray-200"><?php echo e($accountCreations); ?></p>
                    <p>On-Review User Accounts</p>
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
                                    <?php $__currentLoopData = $disabilityOccurrences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disability => $occurrences): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($disability); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($occurrences); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <?php
                                                        $totalOccurrences = $disabilityOccurrences->sum();
                                                        $percentage =
                                                            $totalOccurrences > 0
                                                                ? ($occurrences / $totalOccurrences) * 100
                                                                : 0;
                                                    ?>
                                                    <span class="mr-2"><?php echo e(round($percentage, 2)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'disabilityoccurence'])); ?>"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                    <br>
                    <br>
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
                                    <?php $__currentLoopData = $disabilityType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disability => $occurrences): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($disability); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($occurrences); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <?php
                                                        $totalOccurrences = $disabilityType->sum();
                                                        $percentage =
                                                            $totalOccurrences > 0
                                                                ? ($occurrences / $totalOccurrences) * 100
                                                                : 0;
                                                    ?>
                                                    <span class="mr-2"><?php echo e(round($percentage, 2)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'disabilitytype'])); ?>"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>
            </div>



            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx1 = document.getElementById('disabilityOccurenceChart').getContext('2d');
                    var disabilityOccurrences = <?php echo json_encode($disabilityOccurrences, 15, 512) ?>;

                    var labels1 = Object.keys(disabilityOccurrences);
                    var data1 = Object.values(disabilityOccurrences);

                    var ctx2 = document.getElementById('disabilityTypeChart').getContext('2d');
                    var disabilityType = <?php echo json_encode($disabilityType, 15, 512) ?>;

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
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4 mt-6">Skills Information of
                PWDs
            </h2>
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
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $totalSkillsCount = $totalSkillsCount ?? 1; // Ensure $totalSkillsCount is not zero to avoid division by zero
                                            $percentage =
                                                $totalSkillsCount > 0
                                                    ? number_format(($count / $totalSkillsCount) * 100, 1)
                                                    : '0.0';
                                        ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($skill); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2"><?php echo e($percentage); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <?php echo e($othersCount); ?>

                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <?php if($totalSkillsCount > 0): ?>
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($othersCount / $totalSkillsCount) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($othersCount / $totalSkillsCount) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="mr-2">0%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: 0%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="text-center mt-4">
                                <a href="<?php echo e(route('admin.details', ['type' => 'skills'])); ?>"
                                    class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                                    More</a>
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
                                    <?php $__currentLoopData = $leastEmployableSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            // Ensure $totalSkillsCount is not zero to avoid division by zero
                                            $totalSkillsCount = $totalSkillsCount > 0 ? $totalSkillsCount : 1;
                                            $percentage = number_format(($count / $totalSkillsCount) * 100, 1);
                                        ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($skill); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2"><?php echo e($percentage); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            Others
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <?php echo e($leastEmployableOthersCount); ?>

                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <?php if($totalSkillsCount > 0): ?>
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($leastEmployableOthersCount / $totalSkillsCount) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="mr-2">0%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: 0%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'leastskills'])); ?>"
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
                        const skillsData = <?php echo json_encode($skills, 15, 512) ?>; // Prepare data for Chart.js
                        const othersCount = <?php echo json_encode($othersCount, 15, 512) ?>; // Get the count of "Others"

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
                        const leastEmployableSkillsData = <?php echo json_encode($leastEmployableSkills, 15, 512) ?>; // Prepare data for Chart.js
                        const leastEmployableOthersCount = <?php echo json_encode($leastEmployableOthersCount, 15, 512) ?>; // Get the count of "Others"

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
                                        <?php $__currentLoopData = $mostEmployableEducationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($level); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($count); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span class="mr-2">
                                                            <?php echo e(number_format(($count / ($mostEmployableEducationLevels->sum() ?: 1)) * 100, 1)); ?>%
                                                        </span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width:  <?php echo e($mostEmployableEducationLevels->sum() > 0 ? number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1) : 0); ?>%;"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?php echo e(route('admin.details', ['type' => 'education'])); ?>"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See
                                More</a>
                        </div>
                        <br>
                        <br>
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
                                        <?php $__currentLoopData = $leastEmployableEducationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($level); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($count); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2"><?php echo e($leastEmployableEducationLevels->sum() > 0 ? number_format(($count / $leastEmployableEducationLevels->sum()) * 100, 1) : '0.0'); ?>%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: <?php echo e($mostEmployableEducationLevels->sum() > 0
                                                                    ? number_format(($count / $mostEmployableEducationLevels->sum()) * 100, 1)
                                                                    : '0'); ?>%;"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?php echo e(route('admin.details', ['type' => 'leasteducation'])); ?>"
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
                    const mostEmployableEducationData = <?php echo json_encode($mostEmployableEducationLevels, 15, 512) ?>;
                    const leastEmployableEducationData = <?php echo json_encode($leastEmployableEducationLevels, 15, 512) ?>;

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
                                        <?php $__currentLoopData = $mostEmployableEmploymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($type); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($count); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2"><?php echo e($mostEmployableEmploymentTypes->sum() > 0
                                                                ? number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1)
                                                                : '0.0'); ?>%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width: <?php echo e($mostEmployableEmploymentTypes->sum() > 0
                                                                    ? number_format(($count / $mostEmployableEmploymentTypes->sum()) * 100, 1)
                                                                    : '0.0'); ?>%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?php echo e(route('admin.details', ['type' => 'mostemployment'])); ?>"
                                class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                        </div>
                        <br>
                        <br>
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
                                        <?php $__currentLoopData = $leastEmployableEmploymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-gray-700 dark:text-gray-100">
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($type); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <?php echo e($count); ?>

                                                </td>
                                                <td
                                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2"><?php echo e($leastEmployableEmploymentTypes->sum() > 0
                                                                ? number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1)
                                                                : '0.0'); ?>%</span>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                <div style="width:<?php echo e($leastEmployableEmploymentTypes->sum() > 0
                                                                    ? number_format(($count / $leastEmployableEmploymentTypes->sum()) * 100, 1)
                                                                    : '0.0'); ?>%"
                                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?php echo e(route('admin.details', ['type' => 'leastemployment'])); ?>"
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
                                    <?php $__currentLoopData = $mostCommonAges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bin => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($bin); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <?php
                                                        $totalCount = $mostCommonAges->sum();
                                                        $percentage =
                                                            $totalCount > 0
                                                                ? number_format(($count / $totalCount) * 100, 1)
                                                                : 0;
                                                    ?>
                                                    <span class="mr-2"><?php echo e($percentage); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'mostagesbins'])); ?>"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                    <br>
                    <br>
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
                                    <?php $__currentLoopData = $leastCommonAges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bin => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($bin); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <?php
                                                        $totalCount = $leastCommonAges->sum();
                                                        $percentage =
                                                            $totalCount > 0
                                                                ? number_format(($count / $totalCount) * 100, 1)
                                                                : 0;
                                                    ?>
                                                    <span class="mr-2"><?php echo e($percentage); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'leastagesbins'])); ?>"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                </div>
            </div>
        </div>




        <div class="mt-8 mx-4 p-4">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Work Experience Analytics for PWDs
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Most Common Age Bins -->
                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="mostFrequentEmployersChart"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top Companies for
                                    PWDs with Employee Count</h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employer</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count</th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Most Frequent Employers -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">Most Frequent Number of Employees
                                            in a Company</td>
                                    </tr>
                                    <?php
                                        $totalMostFrequent = $mostFrequentEmployers->sum();
                                    ?>

                                    <?php $__currentLoopData = $mostFrequentEmployers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            // Default percentage value to avoid division by zero
                                            $percentage =
                                                $totalMostFrequent > 0 ? ($count / $totalMostFrequent) * 100 : 0;
                                        ?>
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($employer_name); ?>

                                            </td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white"><?php echo e(number_format($percentage, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <!-- Least Frequent Employers -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">Least Frequent Number of
                                            Employees in a Company</td>
                                    </tr>
                                    <?php
                                        $totalLeastFrequent = $leastFrequentEmployers->sum();
                                    ?>

                                    <?php $__currentLoopData = $leastFrequentEmployers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            // Default percentage value to avoid division by zero
                                            $percentage =
                                                $totalLeastFrequent > 0 ? ($count / $totalLeastFrequent) * 100 : 0;
                                        ?>
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($employer_name); ?>

                                            </td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white"><?php echo e(number_format($percentage, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'employeecount'])); ?>"
                            class="text-sm font-semibold text-blue-500 hover:text-blue-700">See More</a>
                    </div>
                    <br>
                    <br>
                </div>

                <div
                    class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="container mx-auto p-10" width="700" height="600">
                            <canvas id="mostFrequentEmployersYearsChart"></canvas>
                        </div>
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top Companies for
                                    PWDs with Employee's Work Experiences</h3>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employer
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Most Frequent Employers by Years -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">
                                            Most Frequent Years of Experience in a Company
                                        </td>
                                    </tr>
                                    <?php
                                        // Calculate total years for most frequent employers
                                        $totalMostFrequentYears = $mostFrequentEmployersByYears->sum();
                                    ?>
                                    <?php $__currentLoopData = $mostFrequentEmployersByYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $totalYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            // Calculate percentage
                                            $percentage =
                                                $totalMostFrequentYears > 0
                                                    ? ($totalYears / $totalMostFrequentYears) * 100
                                                    : 0;
                                        ?>
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($employer_name); ?></td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e(round($totalYears)); ?> years</td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white"><?php echo e(number_format($percentage, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <!-- Least Frequent Employers by Years -->
                                    <tr class="bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                                        <td class="px-4 py-2 text-sm" colspan="3">
                                            Least Frequent Years of Experience in a Company
                                        </td>
                                    </tr>
                                    <?php
                                        // Calculate total years for least frequent employers
                                        $totalLeastFrequentYears = $leastFrequentEmployersByYears->sum();
                                    ?>
                                    <?php $__currentLoopData = $leastFrequentEmployersByYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $totalYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            // Calculate percentage
                                            $percentage =
                                                $totalLeastFrequentYears > 0
                                                    ? ($totalYears / $totalLeastFrequentYears) * 100
                                                    : 0;
                                        ?>
                                        <tr class="bg-gray-100 dark:bg-gray-800">
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e($employer_name); ?></td>
                                            <td class="px-4 py-2 text-sm text-black dark:text-white">
                                                <?php echo e(round($totalYears)); ?> years</td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2 text-black dark:text-white"><?php echo e(number_format($percentage, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e($percentage); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('admin.details', ['type' => 'yearsofexperience'])); ?>"
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

                // Pass PHP variables to JavaScript as JSON
                const mostFrequentEmployersByYearsData = <?php echo json_encode($mostFrequentEmployersByYears, 15, 512) ?>;
                const leastFrequentEmployersByYearsData = <?php echo json_encode($leastFrequentEmployersByYears, 15, 512) ?>;

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

                const labelColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBackgroundColor = darkMode ? 'rgba(0, 0, 0, 0.7)' : 'rgba(255, 255, 255, 0.7)';
                const tooltipTitleColor = darkMode ? '#ffffff' : '#000000';
                const tooltipBodyColor = darkMode ? '#ffffff' : '#000000';

                // Create pie chart for Most Frequent Employers by Years
                const ctxMostFrequent = document.getElementById('mostFrequentEmployersYearsChart').getContext('2d');
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
                            }
                        }
                    }
                });

                // Create pie chart for Least Frequent Employers by Years
                const ctxLeastFrequent = document.getElementById('leastFrequentEmployersYearsChart').getContext('2d');
                new Chart(ctxLeastFrequent, {
                    type: 'pie',
                    data: {
                        labels: leastFrequentEmployersByYearsLabels,
                        datasets: [{
                            label: 'Least Frequent Employers by Years',
                            data: leastFrequentEmployersByYearsCounts,
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
                                        const total = leastFrequentEmployersByYearsCounts.reduce((a, b) =>
                                            a + b, 0);
                                        const percentage = ((tooltipItem.raw / total) * 100).toFixed(1);
                                        return `${tooltipItem.label}: ${tooltipItem.raw} years (${percentage}%)`;
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
                const mostFrequentEmployersData = <?php echo json_encode($mostFrequentEmployers, 15, 512) ?>;
                const leastFrequentEmployersData = <?php echo json_encode($leastFrequentEmployers, 15, 512) ?>;

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

                const labelColor = darkMode ? '#ffffff' : '#000000';
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

                // Assuming both $mostCommonAges and $leastCommonAges are passed to JavaScript as JSON
                const mostCommonAgesData = <?php echo json_encode($mostCommonAges, 15, 512) ?>;
                const leastCommonAgesData = <?php echo json_encode($leastCommonAges, 15, 512) ?>;

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
                const mostEmployableEmploymentData = <?php echo json_encode($mostEmployableEmploymentTypes, 15, 512) ?>;
                const leastEmployableEmploymentData = <?php echo json_encode($leastEmployableEmploymentTypes, 15, 512) ?>;

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
                                class="text-lg font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">USERS</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-md ">
                                            <div>
                                                <p class="font-semibold "><?php echo e($user->name); ?></p>
                                                <p class=" text-gray-600 dark:text-gray-400">
                                                    <?php echo e($user->usertype); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-md">
                                        <!-- Change the status dynamically based on user data -->
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight uppercase <?php echo e($user->account_verification_status == 'approved' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-gray-700 bg-orange-100 dark:bg-orange-700 dark:text-red-100'); ?> rounded-full">
                                            <?php echo e($user->account_verification_status); ?>

                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-md"><?php echo e($user->created_at->format('d-m-Y')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid mb-10 px-2 py-3 text-md font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-start">
                        <nav aria-label="Table navigation" class="p-2">
                            <ul class="inline-flex items-left">
                                <li>
                                    <a href="<?php echo e(route('admin.manageusers')); ?>"
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>