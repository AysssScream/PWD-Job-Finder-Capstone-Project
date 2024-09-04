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
                class="w-full h-screen md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-400 dark:border-gray-600 px-4 py-6 flex-shrink-0">
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
                        #<?php echo e($employer->user_id); ?></h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: <?php echo e($employer->created_at->format('F j, Y \a\t h:i A')); ?>

                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="<?php echo e(route('admin.employerapplicantinfo', ['id' => $employer->user_id])); ?>"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  <?php echo e(Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : ''); ?>">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Employer Profile</span>
                            </a>
                        </li>
                    </ul>
                    <?php if($user->account_verification_status === 'waiting for approval'): ?>
                        <button id="hireApplicantBtn"
                            class="w-full mt-6 bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Approve Employer?
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
                                            <a href="<?php echo e(route('admin.reset', ['id' => $employer->user_id])); ?>"
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
            <div id="mainContent" class="flex-1 h-screen p-6 bg-white dark:bg-gray-900 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    <?php echo e($employer->businessname); ?></h2>
                <h4 class="text-lg font-regular text-gray-800 dark:text-gray-200 mt-2">
                    <strong>TIN Number:</strong> <?php echo e($employer->tinno); ?>

                    <span class="block mt-2 md:inline-block md:mt-0 md:ml-20"><strong>Trade Name:</strong>
                        <?php echo e($employer->tradename); ?>

                    </span>
                </h4>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                    <?php echo e('Company Information'); ?></h1>
                <div class="border-b border-gray-300 mt-2"></div>
                <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Location Type:</strong>
                    <?php echo e($employer->locationtype); ?>

                </li>
                <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Employer Type:</strong>
                    <?php echo e($employer->employertype); ?></li>
                <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Total Work Force:</strong>
                    <?php echo e($employer->totalworkforce); ?>

                </li>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                    <?php echo e('Contact Information'); ?></h1>
                <div class="border-b border-gray-300 mt-2"></div>

                <div class="mt-2">
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Address:</strong>
                        <?php echo e($employer->address); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>City:</strong>
                        <?php echo e($employer->city); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Contact Person:</strong>
                        <?php echo e($employer->contact_person); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Position:</strong>
                        <?php echo e($employer->position); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Telephone Number:</strong>
                        <?php echo e($employer->telephone_no); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Mobile Number:</strong>
                        <?php echo e($employer->mobile_no); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Fax Number:</strong>
                        <?php echo e($employer->fax_no); ?>

                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Zip Code:</strong>
                        <?php echo e($employer->zipCode); ?>

                    </li>
                </div>
            </div>

        </div>
    </body>

    <div id="hireModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
        <div class="bg-white dark:bg-gray-900 w-full md:w-2/4 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Approve <?php echo e($employer->businessname); ?> as
                    Employer?
                </h2>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex justify-end mt-4 space-x-2">
                <form id="hire-form" action="<?php echo e(route('admin.approveuser', ['id' => $employer->user_id])); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <button id="confirmHireBtn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg"
                        onclick="confirmHire(event)">
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\admin\useremployerapplication.blade.php ENDPATH**/ ?>