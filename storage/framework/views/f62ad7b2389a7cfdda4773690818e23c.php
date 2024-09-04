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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="<?php echo e(asset('/css/layouts.css')); ?>" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
    </head>


    <body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 overflow-auto">
        <div class="flex flex-col md:flex-row h-full ">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-400 dark:border-gray-600 px-4 py-6 ">
                <div class="p-4">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="flex items-center space-x-2">
                            <li>
                                <a href="<?php echo e(route('admin.manageusers')); ?>"
                                    class="flex items-center text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-300">
                                    <i class="fas fa-arrow-left mr-1"></i> Go Back
                                </a>
                            </li>
                        </ol>
                    </nav>


                    <div class="flex flex-col items-center mb-5 ">
                        <?php if($user->pwdInformation && $user->pwdInformation->profilePicture): ?>
                            <img src="<?php echo e(asset('storage/' . $user->pwdInformation->profilePicture)); ?>"
                                alt="Profile Picture" class="w-44 h-44 rounded-full">
                        <?php else: ?>
                            <img src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Profile Picture"
                                class="w-44 h-44 rounded-full">
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar content here -->
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">User:
                        #<?php echo e($pwdinfo->user_id); ?></h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: <?php echo e($pwdinfo->created_at->format('F j, Y \a\t h:i A')); ?>

                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="<?php echo e(route('admin.applicantinfo', ['id' => $applicant->user_id])); ?>"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  <?php echo e(Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : ''); ?>">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.pwdapplicantinfo', ['id' => $applicant->user_id])); ?>"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  <?php echo e(Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : ''); ?>">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>

                    </ul>
                    <?php if($user->account_verification_status === 'waiting for approval'): ?>
                        <button id="hireApplicantBtn"
                            class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Approve User?
                        </button>


                        <div x-data="{ showModal: false }">
                            <!-- Reset Button -->
                            <a href="javascript:void(0);" @click="showModal = true"
                                class=" w-full text-center mt-5 inline-block px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Reset Application
                            </a>
                            <!-- Modal -->
                            <template x-if="showModal" class="modal-wrapper">
                                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center ">
                                    <div class="bg-gray-100 dark:bg-gray-800  p-6 rounded-lg shadow-lg w-96 z-50 mb-10">
                                        <h2 class="text-lg text-gray-800 dark:text-gray-100 font-semibold  mb-4">
                                            Are you sure?
                                        </h2>
                                        <p class="text-gray-600 dark:text-gray-100 mb-6">
                                            Do you really want to reset the application?
                                            This
                                            action cannot be undone.
                                        </p>
                                        <div class="flex justify-end space-x-4">
                                            <!-- Cancel Button -->
                                            <button @click="showModal = false"
                                                class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                                Cancel
                                            </button>
                                            <!-- Proceed Button -->
                                            <a href="<?php echo e(route('admin.reset', ['id' => $applicant->user_id])); ?>"
                                                class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                                                Proceed
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Background overlay -->
                                    <div @click="showModal = false"
                                        class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40">
                                    </div>
                                </div>
                            </template>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <!-- Main content here -->
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    <?php echo e($applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname); ?></h1>
                    <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2">
                        <strong>Employment Status:</strong> <?php echo e($employment->employment_type); ?>

                        <span class="block mt-2 md:inline-block md:mt-0 md:ml-20"><strong>Looking for a
                                Job in:
                            </strong><?php echo e($employment->job_search_duration . ' ' . $employment->duration_category); ?>

                        </span>
                    </h4>


                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        <?php echo e('Personal Information'); ?></h1>
                    <div class="border-b border-gray-300 mt-2"></div>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Civil Status:</strong>
                        <?php echo e($personal->civilStatus); ?>

                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Gender:</strong>
                        <?php echo e($applicant->gender); ?></li>
                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Birthdate:</strong>
                        <?php echo e(date('M d, Y', strtotime($applicant->birthdate))); ?>

                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Lived at:</strong>
                        <?php echo e($personal->presentAddress); ?>

                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Cellphone Number:</strong>
                        <?php echo e($personal->cellphoneNo); ?>

                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Religion:</strong>
                        <?php echo e($personal->religion); ?>

                    <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>OFW:</strong>
                        <?php if($applicant->beneficiary_4ps || $applicant->ofw_country): ?>
                            Yes
                        <?php else: ?>
                            No
                        <?php endif; ?>
                    </li>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        <?php echo e('Educational Attainment'); ?></h1>
                    <div class="border-b border-gray-300 mt-2"></div>

                    <div class="mt-2">
                        <li class="mt-3  text-gray-900 dark:text-gray-200 "><strong>Highest Educational Level:</strong>
                            <?php echo e($education->educationLevel); ?></li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>School Graduated:</strong>
                            <?php echo e($education->school); ?></li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Year Graduated:</strong>
                            <?php echo e($education->yearGraduated); ?></li>
                        <li class="mt-3  text-gray-900 dark:text-gray-200"><strong>Awards:</strong>
                            <?php echo e($education->awards); ?></li>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        <?php echo e('Work Experience and Skills'); ?>

                        <div class="border-b border-gray-300 mt-2"></div>

                    </h1>
                    <div class="overflow-x-auto">
                        <div class="sm:max-w-5xl float-left">
                            <div class="grid grid-cols-1 gap-4">
                                <?php $__currentLoopData = $workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workExperience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="bg-gray-200 mt-4 mb-4 dark:bg-gray-800 custom-shadow rounded-lg p-6 w-full">
                                        <div class="mb-4">
                                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
                                                <?php echo e($workExperience->employer_name); ?></h2>
                                            <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">

                                                <?php echo e(date('d M Y', strtotime($workExperience->from_date))); ?> -
                                                <?php echo e($workExperience->to_date ? date('d M Y', strtotime($workExperience->to_date)) : 'Present'); ?>

                                            </p>
                                            <br>
                                            <p class="text-sm text-gray-900 dark:text-gray-300 mt-1"><strong>Employer
                                                    Address:</strong> <?php echo e($workExperience->employer_address); ?></p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Position
                                                    Held:</strong>
                                                <?php echo e($workExperience->position_held); ?></p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Skills
                                                    Acquired:</strong>
                                                <?php echo e($workExperience->skills); ?></p>
                                            <p class="text-sm text-gray-800 dark:text-gray-300 mt-1"><strong>Employment
                                                    Status:</strong> <?php echo e($workExperience->employment_status); ?></p>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        <?php echo e('Other Skills and Languages'); ?>

                        <div class="border-b border-gray-300 mt-2"></div>
                    </h1>
                    <div class="mt-2">
                        <h4 class="text-lg font-reqular text-gray-800 dark:text-gray-200 mt-2">
                            <strong>Skills</strong>
                            <?php $__currentLoopData = json_decode($skill->skills); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mt-2"><?php echo e($skill); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <h4 class="text-lg font-reqular text-gray-800 dark:text-gray-200 mt-2">
                        <strong>Languages</strong>
                        <?php $__currentLoopData = explode(',', $language->language_input); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="mt-2"><?php echo e(trim($language)); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

            </div>
        </div>
    </body>

    <div id="hireModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Approve <?php echo e($applicant->firstname); ?> as
                    User?
                </h2>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex justify-end mt-4 space-x-2">
                <form id="hire-form" action="<?php echo e(route('admin.approveuser', ['id' => $applicant->user_id])); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- Additional form controls/buttons if needed -->
                    <button id="confirmHireBtn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        Confirm
                    </button>
                </form>
                <button id="cancelHireBtn"
                    class="bg-red-500 text-gray-200 hover:bg-red-700 text-gray-300 font-bold py-2 px-4 rounded shadow-lg"
                    onclick="cancelHire()">
                    Cancel
                </button>
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
<script>
    // Get elements
    const hireApplicantBtn = document.getElementById('hireApplicantBtn');
    const hireModal = document.getElementById('hireModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const confirmHireBtn = document.getElementById('confirmHireBtn');
    const cancelHireBtn = document.getElementById('cancelHireBtn');

    // Open modal function
    function openModal() {
        hireModal.classList.remove('hidden');
    }

    // Close modal function
    function closeModal() {
        hireModal.classList.add('hidden');
    }

    // Event listeners
    hireApplicantBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelHireBtn.addEventListener('click', closeModal);
</script>

<style>
    .custom-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4), 0 2px 4px rgba(0, 0, 0, 0.06);
    }
</style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\admin\userapplication.blade.php ENDPATH**/ ?>