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
        <link rel="preload" href="<?php echo e(asset('css/layouts.css')); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <title>Dashboard</title>
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
        <style>

        </style>
    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <main class="max-w-8xl mx-auto px-3 sm:px-1 lg:px-1 py-20 flex flex-wrap gap-4 lg:ml-12">
            <aside class="w-full lg:w-1/6  bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-4">
                <div>
                    <h3 class="text-lg font-semibold mb-2 mb-2"></h3>
                    <div class="mb-4">
                        <a href="javascript:void(0);" id="browse-applications-link"
                            class="block w-full text-center p-2 text-white dark:text-gray-200 bg-gray-700 hover:bg-gray-600  font-semibold py-2 rounded-md mb-2 transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="<?php echo e(__('messages.userdashboard.applications')); ?>">
                            <i class="fas fa-book-open mr-2"></i><?php echo e(__('messages.userdashboard.applications')); ?>

                        </a>
                        <div id="medium-modal" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-75">
                            <div class="relative w-full max-w-4xl">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                            My Job Applications
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="medium-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="p-4 md:p-5 space-y-4 overflow-y-auto max-h-96">
                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="job-item border bg-gray-200 border-gray-200 dark:border-gray-600 dark:bg-gray-700 shadow-lg rounded-lg p-4 flex flex-col mb-4"
                                                    data-status="<?php echo e($job->status); ?>">
                                                    <div>
                                                        <h2
                                                            class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                                            Job ID:</h2>
                                                        <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                                            <li class="py-2 text-sm text-gray-900 dark:text-gray-200">
                                                                <?php echo e($job->job_id); ?></li>
                                                        </ul>
                                                    </div>

                                                    <div class="mt-4">
                                                        <h2
                                                            class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                                            Application Status:</h2>
                                                        <div
                                                            class="py-2 max-w-xs overflow-hidden overflow-ellipsis font-bold
                                                             <?php echo e($job->status === 'pending' ? 'text-orange-500' : ($job->status === 'hired' ? 'text-green-500' : '')); ?>">
                                                            <?php echo e($job->status); ?>

                                                        </div>
                                                    </div>

                                                    <div class="mt-4 mb-4">
                                                        <h2
                                                            class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                                            Description:</h2>
                                                        <div
                                                            class="max-w-xs overflow-hidden overflow-ellipsis text-gray-900 dark:text-gray-200">
                                                            <?php echo e(strlen($job->description) > 59 ? substr($job->description, 0, 59) . '...' : $job->description); ?>

                                                        </div>
                                                    </div>

                                                    <div class="mt-auto">
                                                        <button
                                                            onclick="location.href='<?php echo e(route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id])); ?>'"
                                                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300">
                                                            Job Details
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>


                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button onclick="filterItems('hired')"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Hired
                                        </button>
                                        <button onclick="filterItems('pending')"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Pending
                                        </button>
                                        <button onclick="filterItems('all')"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Show All
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <script>
                            function filterItems(status) {
                                const items = document.querySelectorAll('.job-item'); // Select only job items

                                items.forEach(item => {
                                    const itemStatus = item.getAttribute('data-status');

                                    if (status === 'all' || itemStatus === status) {
                                        item.style.display = 'block'; // Show matching items
                                    } else {
                                        item.style.display = 'none'; // Hide non-matching items
                                    }
                                });
                            }
                        </script>


                        <a href="<?php echo e(route('dashboard')); ?>" id="browse-jobs-link"
                            class="block p-2 w-full text-center text-white dark:text-gray-200 bg-green-600 hover:bg-green-500 font-semibold py-2 rounded-md mb-2 transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="<?php echo e(__('messages.userdashboard.browse_jobs')); ?>">
                            <i class="fas fa-search mr-2"
                                aria-label="Browse Jobs"></i><?php echo e(__('messages.userdashboard.browse_jobs')); ?>

                        </a>
                        <a href="<?php echo e(route('dashboard.match')); ?>" id="matched-jobs-link"
                            class="block w-full p-3 text-center bg-gray-900 text-white dark:text-gray-200 bg-gray-200 hover:bg-black dark:hover:bg-gray-700 font-semibold py-2 rounded-md transition focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="<?php echo e(__('messages.userdashboard.matched_jobs')); ?>">
                            <i class="fas fa-check mr-2"
                                aria-label="Matched Jobs"></i><?php echo e(__('messages.userdashboard.matched_jobs')); ?>

                        </a>
                    </div>
                    <hr class="my-4 border-gray-400 dark:border-gray-600">
                    <?php echo $__env->make('layouts.topjobs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <hr class="my-4 border-gray-400 dark:border-gray-600">

                    <a href=""
                        class="block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400  rounded-lg"
                        aria-label=" <?php echo e(__('messages.userdashboard.trainings')); ?>">
                        <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            <?php echo e(__('messages.userdashboard.trainings')); ?>

                        </h3>
                    </a>

                    <hr class="my-4 border-gray-400 dark:border-gray-600">

                    <a href=""
                        class="block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400  rounded-lg"
                        aria-label="<?php echo e(__('messages.userdashboard.career_advice')); ?>">
                        <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            <?php echo e(__('messages.userdashboard.career_advice')); ?>

                        </h3>
                    </a>

                </div>
            </aside>
            <?php echo $__env->make('dashboardpartials.browsejobs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </main>
    </body>
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
<footer class="bg-white dark:bg-gray-800 shadow-sm">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <p class="text-sm text-gray-600 dark:text-gray-400">&copy; 2024 Job Finder. All rights reserved.</p>
    </div>
</footer>

<style>
    /* Custom scrollbar styles
    .overflow-y-auto::-webkit-scrollbar {
        width: 12px;
    }

    .overflow-y-auto::-webkit-scrollbar-track {
        background-color: rgba(0, 106, 255, 0.6);
        border-radius: 10px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        border: 3px solid rgba(0, 0, 0, 0);
    }

    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .overflow-y-auto {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.3) rgba(0, 0, 0, 0.1);
    } */
</style>

<script>
    // Function to show the modal
    function showModal() {
        var modal = document.getElementById('medium-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Function to hide the modal
    function hideModal() {
        var modal = document.getElementById('medium-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    // Add event listener to the link or button that triggers the modal
    document.getElementById('browse-applications-link').addEventListener('click', function() {
        showModal();
    });

    // Add event listener to close button within modal
    document.querySelector('[data-modal-hide="medium-modal"]').addEventListener('click', function() {
        hideModal();
    });
</script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/dashboard.blade.php ENDPATH**/ ?>