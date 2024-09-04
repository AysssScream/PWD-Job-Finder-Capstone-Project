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
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.8.2/dist/alpine.min.js" defer></script>
        <title>Job Information</title>
    </head>

    <body class="bg-white  mx-auto max-w-8xl px-4">
        <div class="container mx-auto max-w-8xl px-4 pt-5 ">
            <div class="row">
                <div class="col">
                    <nav class="rounded-lg p-3 bg-white dark:bg-gray-700 shadow-md">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item" aria-label="Back to Jobs">
                                <a href="<?php echo e(route('dashboard')); ?>"
                                    class="text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="<?php echo __('messages.jobinformation.back_to_jobs'); ?>">
                                    <i class="fa fa-arrow-left" aria-label="Back to Jobs"></i>
                                    &nbsp;<?php echo __('messages.jobinformation.back_to_jobs'); ?>

                                </a>
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <section>
            <div class="container mx-auto max-w-8xl px-4 pt-5  "> 
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 rounded-lg">
                    <div class="lg:col-span-2">
                        <div class="card shadow-2xl border-0 bg-white p-5 mb-10 bg-gray-100 dark:bg-gray-700">
                            <div class="flex justify-between items-center">
                                <div>
                                    <a aria-label=" <?php echo e($job->title); ?>">
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label=" <?php echo e($job->title); ?>" tabindex="0">
                                            <?php echo e($job->title); ?></h4>
                                    </a>
                                    <div class="flex flex-col sm:flex-row items-start mt-2 justify-start">
                                        <div class="mr-4 mb-2 sm:mb-0">
                                            <a href="#"
                                                class="text-gray-800 dark:text-gray-200 text-left focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="<?php echo e($job->location); ?>" tabindex="0">
                                                <i class="fa fa-map-marker mr-2"
                                                    aria-label="<?php echo e($job->location); ?>"></i><?php echo e($job->location); ?>

                                            </a>
                                        </div>
                                        <div class="mr-4 mb-2 sm:mb-0 text-left flex-grow">
                                            <a href="#"
                                                class="text-gray-800 dark:text-gray-200 text-left focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="<?php echo e($job->job_type); ?>" tabindex="0">
                                                <i class="fa fa-clock mr-2"
                                                    aria-label="<?php echo e($job->job_type); ?>"></i><?php echo e($job->job_type); ?>

                                            </a>
                                        </div>
                                        <div class="text-left">
                                            <a href="#"
                                                class="text-gray-800 dark:text-gray-200 text-left focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="<?php echo e($job->educational_level); ?>" tabindex="0">
                                                <i class="fa fa-graduation-cap mr-2"
                                                    aria-label="<?php echo e($job->educational_level); ?>"></i><?php echo e($job->educational_level); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg font-bold  text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label=" <?php echo __('messages.jobinformation.job_description'); ?>" tabindex="0"> <?php echo __('messages.jobinformation.job_description'); ?>

                                </h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <p class="text-gray-800 dark:text-gray-200 leading-loose focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0" aria-label=" <?php echo e($job->description); ?>"> <?php echo e($job->description); ?>

                                </p>
                            </div>


                            <div class="mt-4 leading-relaxed">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="<?php echo __('messages.jobinformation.responsibilities'); ?>" tabindex="0"><?php echo __('messages.jobinformation.responsibilities'); ?></h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <ul class="list-disc list-inside text-gray-800 dark:text-gray-200  leading-loose">
                                    <?php
                                        $responsibilities = preg_split(
                                            '/[\-\•,]/',
                                            $job->responsibilities,
                                            -1,
                                            PREG_SPLIT_NO_EMPTY,
                                        );
                                    ?>

                                    <?php $__currentLoopData = $responsibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $responsibility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $trimmedResponsibility = trim($responsibility);
                                        ?>
                                        <li aria-label="<?php echo e($trimmedResponsibility); ?>"
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0">
                                            <?php echo e($trimmedResponsibility); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div class="mt-4 leading-relaxed">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label=" <?php echo __('messages.jobinformation.qualifications'); ?>" tabindex="0">
                                    <?php echo __('messages.jobinformation.qualifications'); ?></h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 leading-loose">
                                    <?php
                                        $qualifications = preg_split(
                                            '/[\-\•,]/',
                                            $job->qualifications,
                                            -1,
                                            PREG_SPLIT_NO_EMPTY,
                                        );
                                    ?>

                                    <?php $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li aria-label=" <?php echo e(trim($qualification)); ?>" tabindex="0"
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <?php echo e(trim($qualification)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>



                            <div class="mt-4">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label=" <?php echo __('messages.jobinformation.benefits'); ?>" tabindex="0">
                                    <?php echo __('messages.jobinformation.benefits'); ?></h4>
                                <div class="border border-gray-300 mt-2"></div>

                                <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 leading-loose focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400   "
                                    aria-label="<?php echo e($job->benefits); ?>" tabindex="0">
                                    <?php echo e($job->benefits); ?>

                                </ul>
                            </div>


                            <div x-data="{ showModal: false, description: 'Hi, I\'m interested to apply for the <?php echo e($job->title); ?> position.' }">
                                <?php echo $__env->make('layouts.modalapply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <script>
                                function applyJob() {
                                    var description = document.getElementById('description').value;
                                    console.log(description);
                                    document.getElementById('modal').style.display = 'none';
                                }
                            </script>


                        </div>
                    </div>
                    <div class="lg:col-span-1">
                        <div class="card shadow-lg border-0 bg-gray-100 dark:bg-gray-700 p-5 mb-4">
                            <div class="mb-4">

                                <div class="flex items-center justify-between mt-4">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label=" <?php echo __('messages.jobinformation.job_summary'); ?>" tabindex="0">
                                        <?php echo __('messages.jobinformation.job_summary'); ?></h3>
                                    <form
                                        action="<?php echo e(route('save.job', ['company_name' => $job->company_name, 'id' => $job->id])); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php
                                            $isSaved = Auth::user()
                                                ->savedJobs()
                                                ->where('job_id', $job->id)
                                                ->exists();
                                        ?>
                                        <?php if($isSaved): ?>
                                            <button type="button"
                                                class="ml-4 text-sm bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 focus:outline-none focus:bg-green-700"
                                                aria-label="Saved">
                                                <i
                                                    class="fas fa-check-circle mr-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"></i>Saved
                                            </button>
                                        <?php else: ?>
                                            <button type="submit"
                                                class="ml-4 text-sm bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Save Job">
                                                <i class="fas fa-save mr-2"></i>Save Job
                                            </button>
                                        <?php endif; ?>
                                    </form>
                                </div>

                                <div class="border-b border-gray-300 mt-4"></div>

                                <ul class="text-gray-800 dark:text-gray-200 mt-2 leading-loose">
                                    <li aria-label=" <?php echo __('messages.jobinformation.age_requirement'); ?>  <?php echo e($job->min_age); ?> - <?php echo e($job->max_age); ?> <?php echo __('messages.jobinformation.years_old'); ?>"
                                        tabindex="0"
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 ">
                                        <span class="font-bold text-gray-800 dark:text-gray-200 ">
                                            <?php echo __('messages.jobinformation.age_requirement'); ?> </span>
                                        <?php echo e($job->min_age); ?> - <?php echo e($job->max_age); ?> <?php echo __('messages.jobinformation.years_old'); ?>


                                    </li>
                                    <li aria-label=" <?php echo __('messages.jobinformation.published_on'); ?> <?php echo e(\Carbon\Carbon::parse($job->date_posted)->format('F j, Y')); ?>"
                                        tabindex="0"
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 ">
                                        <span class="font-bold text-gray-800 dark:text-gray-200 ">
                                            <?php echo __('messages.jobinformation.published_on'); ?></span>
                                        <?php echo e(\Carbon\Carbon::parse($job->date_posted)->format('F j, Y')); ?>

                                    </li>
                                    <li aria-label="<?php echo __('messages.jobinformation.vacancy'); ?> <?php echo e($job->vacancy); ?> Positions Left"
                                        tabindex="0"
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 ">
                                        <span
                                            class="font-bold mr-2 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <?php echo __('messages.jobinformation.vacancy'); ?></span><?php echo e($job->vacancy); ?>

                                        Positions Left
                                    </li>
                                    <li aria-label=" <?php echo __('messages.jobinformation.salary'); ?> <?php echo e(number_format($job->salary)); ?>Pesos"
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0">
                                        <span class="font-bold text-gray-800 dark:text-gray-200">
                                            <?php echo __('messages.jobinformation.salary'); ?></span>
                                        ₱<?php echo e(number_format($job->salary)); ?>

                                    </li>
                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="  <?php echo __('messages.jobinformation.location'); ?> <?php echo e($job->location); ?> " tabindex="0">
                                        <span class="font-bold text-gray-800 dark:text-gray-200">
                                            <?php echo __('messages.jobinformation.location'); ?></span>
                                        <?php echo e($job->location); ?>

                                    </li>
                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label=" <?php echo __('messages.jobinformation.job_type'); ?> <?php echo e($job->job_type); ?> " tabindex="0">
                                        <span class="font-bold text-gray-800 dark:text-gray-200">
                                            <?php echo __('messages.jobinformation.job_type'); ?></span>
                                        <?php echo e($job->job_type); ?>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card  border-0 bg-gray-100 dark:bg-gray-700 p-5 mt-4 mb-10 shadow-lg">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="<?php echo __('messages.jobinformation.about_the_company'); ?>" tabindex="0"> <?php echo __('messages.jobinformation.about_the_company'); ?>

                                </h3>
                                <div class="border-b border-gray-300 mt-2"></div>
                                <div class="mt-4">
                                    <?php if(isset($employer->company_description)): ?>
                                        <p class="text-left text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="<?php echo e($employer->company_description); ?>" tabindex="0">
                                            <?php echo e($employer->company_description); ?></p>
                                    <?php else: ?>
                                        <p class="text-left text-gray-800 dark:text-gray-200">No information available.</p>
                                    <?php endif; ?>
                                </div>

                                <div class="mt-4 text-gray-800 dark:text-gray-200">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mt-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="Employment Size" tabindex="0"><?php echo __('messages.jobinformation.employment_size'); ?>

                                    </h3>
                                    <?php if($employer): ?>
                                        <span
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="The size is:<?php echo e($employer->totalworkforce); ?>"><?php echo e($employer->totalworkforce); ?></span>
                                    <?php else: ?>
                                        <span
                                            class="font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="Total Workforce: N/A" tabindex="0">Total
                                            Workforce:</span>
                                        N/A< <?php endif; ?>
                                            <div class="border-b border-gray-300 mt-4 mb-2"></div>
                                            <form
                                                action="<?php echo e(route('company.profile', ['employer_id' => $employer->user_id])); ?>"
                                                method="GET">
                                                <button type="submit"
                                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    aria-label="<?php echo __('messages.jobinformation.view_more_details'); ?>" tabindex="0">
                                                    <?php echo __('messages.jobinformation.view_more_details'); ?>

                                                </button>
                                            </form>

                                </div>
                                <div class="mt-4">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="<?php echo __('messages.jobinformation.share_job'); ?>" tabindex="0"><?php echo __('messages.jobinformation.share_job'); ?>

                                    </h3>
                                    <div class="border-b border-gray-300 mt-2"></div>
                                    <div class="mt-4 flex flex-col sm:flex-row sm:items-center">
                                        <div class="flex-1 mb-2 sm:mb-0 sm:mr-2">
                                            <input type="text" id="jobUrl"
                                                class="w-full border border-gray-300 px-5 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="<?php echo e($fullUrl); ?>" readonly>
                                        </div>
                                        <button id="copyButton" aria-label="<?php echo __('messages.jobinformation.copy_url'); ?>"
                                            class="w-full sm:w-auto px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <?php echo __('messages.jobinformation.copy_url'); ?>

                                        </button>
                                    </div>
                                </div>


                                <script>
                                    document.getElementById('copyButton').addEventListener('click', function() {
                                        var jobUrlInput = document.getElementById('jobUrl');

                                        // Select the text inside the input
                                        jobUrlInput.select();
                                        jobUrlInput.setSelectionRange(0, 99999); // For mobile devices

                                        // Copy the URL to clipboard
                                        document.execCommand('copy');

                                        // Optionally, provide feedback to the user
                                        alert('URL copied to clipboard: ' + jobUrlInput.value);
                                    });
                                </script>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4 mb-4 bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 
                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="  <?php echo e(__('messages.jobinformation.similar_jobs')); ?>" tabindex="0">
                        <i class="fas fa-briefcase text-gray-500 dark:text-gray-400 mr-2"></i>
                        <?php echo e(__('messages.jobinformation.similar_jobs')); ?>

                    </h3>
                    <div class="border-b border-gray-300 dark:border-gray-600 mt-2"></div>

                    <div class="mt-4 overflow-x-auto p-3">
                        <div class="flex space-x-4 lg:space-x-6">
                            <?php if($jobs->isEmpty()): ?>
                                <div class="text-center p-4">
                                    <p class="text-gray-700 dark:text-gray-300 flex items-center justify-center 
                            focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="   <?php echo e(__('messages.jobinformation.no_similar_jobs')); ?>"
                                        tabindex="0">
                                        <i class="fas fa-search text-gray-500 dark:text-gray-400 mr-2"></i>
                                        <?php echo e(__('messages.jobinformation.no_similar_jobs')); ?>

                                    </p>
                                </div>
                            <?php else: ?>
                                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="relative flex-shrink-0 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg shadow-md w-64 sm:w-80 md:w-96 lg:w-80 xl:w-96">
                                        <h4
                                            class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                                            <i class="fas fa-briefcase text-gray-500 dark:text-gray-400 mr-2"></i>
                                            <?php echo e($job->title); ?>

                                        </h4>
                                        <p class="text-gray-500 dark:text-gray-400 mt-2 flex items-center">
                                            <i class="fas fa-building text-gray-500 dark:text-gray-400 mr-2"></i>
                                            <?php echo e($job->company_name); ?>

                                        </p>

                                        <p class="text-gray-700 dark:text-gray-300 mt-2 mb-12"><?php echo e($job->description); ?>

                                        </p>
                                        <div class="absolute bottom-4 right-4">
                                            <a href="<?php echo e(route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id])); ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white dark:text-gray-200 px-4 py-2 rounded-lg shadow-md">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </section>
    </body>


    <?php if(Session::has('jobsave')): ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.success("<?php echo e(Session::get('jobsave')); ?>", 'Job ID: <?php echo e($job->id); ?> Saved', {
                    timeOut: 5000
                });
            });
        </script>
    <?php endif; ?>

    <?php if(Session::has('apply')): ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.success("<?php echo e(Session::get('apply')); ?>", 'Job Successfully Applied', {
                    timeOut: 5000
                });
            });
        </script>
    <?php endif; ?>



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
<style>
    /* Add this in your custom CSS file or within a <style> tag in your Blade template */
    .larger-bullets {
        list-style-type: none;
        /* Remove default bullets */
        padding-left: 20px;
        /* Add some padding to the left */
    }

    .larger-bullets li {
        position: relative;
        padding-left: 20px;
    }

    .larger-bullets li::before {
        content: '•';
        /* Unicode character for a bullet */
        position: absolute;
        left: 0;
        font-size: 24px;
        /* Adjust the size as needed */
        color: black;
        /* Change the color if needed */
    }
</style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\jobinformation.blade.php ENDPATH**/ ?>