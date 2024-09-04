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
        <link rel="preload" href="<?php echo e(asset('css/layouts.css')); ?>" as="style">
        <link rel="preload" href="<?php echo e(asset('css/layouts.css')); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <title>Saved Jobs</title>
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">

        <div class="py-20">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between  ">
                            <h2 class="font-semibold  text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                <a href="<?php echo e(route('dashboard')); ?>" aria-label=" <?php echo __('messages.savedjobs.back_to_dashboard'); ?>"
                                    class="text-lg  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    <?php echo __('messages.savedjobs.back_to_dashboard'); ?>

                                </a>
                            </h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="overflow-x-auto rounded-lg ">

                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 ">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <?php echo __('messages.savedjobs.name'); ?> </th>
                                        <th scope="col"
                                            class=" text-center  px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <?php echo __('messages.savedjobs.title'); ?> </th>
                                        </th>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <?php echo __('messages.savedjobs.location'); ?> </th>
                                        </th>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <?php echo __('messages.savedjobs.action'); ?> </th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-gray-200 dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                    <?php $__currentLoopData = $savedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap font-medium text-center text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label="<?php echo e($job->company_name); ?>">
                                                <?php echo e($job->company_name); ?>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label="<?php echo e($job->title); ?>">
                                                <?php echo e($job->title); ?>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label="<?php echo e($job->location); ?>">
                                                <?php echo e($job->location); ?>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium">
                                                <a href="<?php echo e(route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id])); ?>"
                                                    aria-label="<?php echo __('messages.savedjobs.view_job'); ?>"
                                                    class="inline-flex items-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    <i class="fas fa-briefcase mr-1"></i> <?php echo __('messages.savedjobs.view_job'); ?>

                                                </a>
                                                <form action="<?php echo e(route('save.destroy', ['id' => $job->id])); ?>"
                                                    method="POST" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" aria-label="<?php echo __('messages.savedjobs.delete_job'); ?>"
                                                        class="ml-2 inline-flex items-center bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none focus:bg-red-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                        <i class="fas fa-trash-alt mr-1"></i>
                                                        <?php echo __('messages.savedjobs.delete_job'); ?>

                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                                <?php if(Session::has('jobdelete')): ?>
                                    <script>
                                        $(document).ready(function() {
                                            toastr.options = {
                                                "progressBar": true,
                                                "closeButton": true,
                                            }
                                            toastr.error("<?php echo e(Session::get('jobdelete')); ?>", 'Job has been Deleted', {
                                                timeOut: 5000
                                            });
                                        });
                                    </script>
                                <?php endif; ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\savedjobs.blade.php ENDPATH**/ ?>