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

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="<?php echo e(asset('/css/layouts.css')); ?>" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
        <title>Manage Job Listings</title>

    </head>

    <?php if(Session::has('editjobs')): ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("<?php echo e(Session::get('editjobs')); ?>", 'Job Successfully Edited.', {
                    timeOut: 5000
                });

            });
        </script>
    <?php endif; ?>
    <div class="py-12" style="padding-top: 30px; padding-bottom: 5px;">
        <div class="container mx-auto max-w-8xl px-4 pt-2 mb-2">
            <div
                class="flex flex-col md:flex-row md:justify-between items-start md:items-center space-y-4 md:space-y-0 md:space-x-4 bg-white dark:bg-gray-800 p-4 rounded-lg">
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="rounded-lg text-gray-800  dark:text-gray-300 ">
                    <ol class="breadcrumb mb-0 flex items-center flex-wrap">
                        <li class="breadcrumb-item w-full md:w-auto">
                            <a href="<?php echo e(route('employer.dashboard')); ?>"
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
                    <a href="<?php echo e(route('employer.add')); ?>"
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
                                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-date="<?php echo e($job->created_at->format('Y-m-d')); ?>">
                                        <td class="px-6 py-4 whitespace-nowrap text-center"><?php echo e($job->title); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center"><?php echo e($job->job_type); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center"><?php echo e($job->location); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center"><?php echo e($job->vacancy); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <?php echo e($job->created_at->format('F j, Y')); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <a href="<?php echo e(route('employer.edit', $job->id)); ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                                            <form action="<?php echo e(route('employer.delete', ['id' => $job->id])); ?>"
                                                method="POST" class="inline-block">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>


    <?php if(Session::has('jobinfodelete')): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("<?php echo e(Session::get('jobinfodelete')); ?>", 'Job has been Deleted', {
                    timeOut: 5000
                });
            });
        </script>
    <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\employer\manage.blade.php ENDPATH**/ ?>