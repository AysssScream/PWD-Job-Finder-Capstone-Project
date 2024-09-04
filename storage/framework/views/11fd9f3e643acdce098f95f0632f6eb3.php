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
        <title>Review Applicant PWD Info </title>

    </head>

    <body class="bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col md:flex-row h-screen">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-200 dark:border-gray-600 px-4 py-6">
                <div class="p-4">
                    <div class="flex flex-col items-center mb-5 ">
                        <img src="<?php echo e(asset('storage/' . $pwdinfo->profilePicture)); ?> " alt="Applicant Image"
                            class="w-44 h-44 object-contain rounded-full mb-4 border-4 custom-shadow border-gray-600"
                            onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">

                    </div>
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:</h2>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="<?php echo e(route('employer.applicantinfo', ['id' => $applicant->user_id])); ?>"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  <?php echo e(Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : ''); ?>">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('employer.pwdinfo', ['id' => $applicant->user_id])); ?>"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  <?php echo e(Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : ''); ?>">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    <?php echo e($applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname); ?></h1>
                    <div class="border-b border-gray-300 mt-2"></div>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Disability:</strong>
                        <?php echo e($pwdinfo->disability); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Disability Occurence:</strong>
                        <?php echo e($pwdinfo->disabilityOccurrence); ?>

                    </li>
                    <?php if($pwdinfo->disabilityOccurrence == 'Others'): ?>
                        <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Specific Disability:</strong>
                            <?php echo e($pwdinfo->otherDisabilityDetails); ?>

                        </li>
                    <?php else: ?>
                        <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Specific Disability:</strong>
                            <?php echo e($pwdinfo->disabilityDetails); ?>

                        </li>
                    <?php endif; ?>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        <?php echo e('PWD ID Picture '); ?>

                        <div class="border-b border-gray-300 mt-2"></div>

                    </h1>
                    <div class="flex items-start mt-3 mb-5">
                        <div class="flex flex-col items-center">
                            <img src="<?php echo e(asset('storage/' . $pwdinfo->pwdIdPicture)); ?>" alt="Applicant Image"
                                class="w-80 h-80 object-contain mb-4 border custom-shadow border-gray-600"
                                onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                        </div>
                        <!-- Optional: Add additional content or styling for the right side -->
                    </div>


            </div>
        </div>
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\employer\reviewapplicantpwdinfo.blade.php ENDPATH**/ ?>