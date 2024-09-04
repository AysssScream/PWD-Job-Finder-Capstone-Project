<div>
    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200" aria-label="Top Job Openings">
        <a href=""
            class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            aria-label=" <?php echo e(__('messages.userdashboard.top_job_openings')); ?>">
            <i class="fas fa-briefcase mr-2 text-gray-900 dark:text-gray-200" aria-label="Top Job Openings"></i>
            <?php echo e(__('messages.userdashboard.top_job_openings')); ?>

        </a>
    </h3>

    <div class="container mx-auto" id="jobOpeningsContainer">
        <?php $__currentLoopData = $topJobOpenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobOpening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="bg-gray-200 text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-700 dark:bg-gray-900 dark:text-gray-200 text-gray-900 rounded-md mb-4 shadow-sm">
                <a href="<?php echo e(route('dashboard', ['title' => $jobOpening->title])); ?>"
                    class="block py-2 px-4 w-full text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="<?php echo e($jobOpening->title); ?> with <?php echo e($jobOpening->count); ?> vacancies">
                    <?php echo e($jobOpening->title); ?> <br> (<?php echo e($jobOpening->count); ?> Vacancies)
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/layouts/topjobs.blade.php ENDPATH**/ ?>