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

        <title>Manage Users</title>

        <div class="h-full ml-14 md:ml-64 font-poppins p-10">

            <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6 mt-8">Manage Users</h1>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-8">
                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold mb-2 text-gray-700 dark:text-gray-200">Approved Accounts</h2>
                        <h1 class="font-bold text-green-600 text-2xl"><?php echo e($approvedCount); ?></h1>
                    </div>
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200  mb-2 ">Pending Accounts</h2>
                        <p class="text-3xl font-bold text-yellow-600"><?php echo e($pendingCount); ?></p>
                    </div>
                    <svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <div
                    class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Waiting for Approval
                            Accounts</h2>
                        <p class="text-3xl font-bold text-orange-600"><?php echo e($waitingforapprovalCount); ?></p>
                    </div>
                    <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <form method="GET" action="<?php echo e(route('admin.manageusers')); ?>">
                <?php echo csrf_field(); ?>
                <div
                    class="mb-4 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0 lg:flex-row lg:space-x-4 w-full">
                    <!-- Filters Container -->
                    <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                        <!-- Status Filter -->
                        <div class="lg:w-full lg:w-40">
                            <label for="status-filter"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                            <select id="status-filter" name="status"
                                class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="waiting for approval">Waiting for Approval</option>
                            </select>
                        </div>
                        <!-- Role Filter -->
                        <div class="lg:w-full lg:w-40">
                            <label for="role-filter"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role</label>
                            <select id="role-filter" name="role"
                                class="mt-1 bg-white text-black dark:bg-gray-800 dark:text-gray-200 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All</option>
                                <option value="employer">Employer</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <!-- Date Filters -->
                        <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 w-full">
                            <div class="lg:w-full lg:w-40">
                                <label for="date-from"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
                                    From</label>
                                <input type="date" id="date-from" name="date_from"
                                    class="mt-1 block bg-white text-black dark:bg-gray-800 dark:text-gray-200 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="w-full lg:w-40">
                                <label for="date-to"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date
                                    To</label>
                                <input type="date" id="date-to" name="date_to"
                                    class="mt-1 block bg-white text-black dark:bg-gray-800 dark:text-gray-200 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="w-full lg:w-40">
                                <button type="submit" id="apply-filters" name="apply_filters"
                                    class="mt-6 block bg-blue-500 text-white p-2 py-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-center">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="mb-4">
                <?php echo e($users->links()); ?>

            </div>


            <div class="overflow-x-auto rounded-lg  shadow-md bg-white text-black dark:bg-gray-800 dark:text-gray-200 ">
                <table
                    class="w-full border-collapse bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-left text-sm text-gray-500">
                    <thead class="bg-white text-black dark:bg-gray-800 dark:text-gray-200">
                        <tr>
                            <th scope="col"
                                class="text-center ml-4 px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                User
                                ID</th>
                            <th scope="col" class="px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Name
                            </th>
                            <th scope="col"
                                class="text-left px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Status
                            </th>
                            <th scope="col"
                                class=" text-left px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">Role
                            </th>
                            <th scope="col"
                                class=" text-left px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Date
                                Requested</th>
                            <th scope="col"
                                class=" text-left px-4 py-4 font-medium text-gray-700 dark:text-gray-200 sm:px-6">
                                Actions</th>
                        </tr>
                    </thead>

                    <table class="min-w-full divide-y divide-gray-100">
                        <tbody id="user-table-body" class="divide-y divide-gray-100">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-status="<?php echo e($user->account_verification_status); ?>"
                                    data-role="<?php echo e($user->usertype); ?>"
                                    data-date="<?php echo e($user->created_at->format('Y-m-d')); ?>">
                                    <td class="px-4 py-4 sm:px-6 font-medium text-gray-700 dark:text-gray-200">
                                        <?php echo e($user->id); ?>

                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center gap-3">
                                            <?php if($user->pwdInformation && $user->pwdInformation->profilePicture): ?>
                                                <img src="<?php echo e(asset('storage/' . $user->pwdInformation->profilePicture)); ?>"
                                                    alt="Profile Picture" class="w-14 h-14 rounded-full">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Profile Picture"
                                                    class="w-14 h-14 rounded-full">
                                            <?php endif; ?>
                                            <div class="text-sm">
                                                <div class="font-medium text-gray-700 dark:text-gray-200">
                                                    <?php echo e($user->firstname); ?> </div>
                                                <div class="text-gray-700 dark:text-gray-200"><?php echo e($user->email); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        <?php
                                            $status = $user->account_verification_status;
                                        ?>

                                        <span
                                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold uppercase
                                            <?php if($status === 'approved'): ?> text-green-600
                                            <?php elseif($status === 'pending'): ?>
                                                text-yellow-600
                                            <?php elseif($status === 'waiting for approval'): ?>
                                                text-yellow-500
                                            <?php else: ?>
                                                text-red-500 <?php endif; ?>">
                                            <?php if($status === 'approved'): ?>
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                                <?php echo e($status); ?>

                                            <?php elseif($status === 'pending'): ?>
                                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                                <?php echo e($status); ?>

                                            <?php elseif($status === 'waiting for approval'): ?>
                                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                                <?php echo e($status); ?>

                                            <?php else: ?>
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                <?php echo e($status); ?>

                                            <?php endif; ?>
                                        </span>


                                    </td>
                                    <td class="px-4 py-4 sm:px-6 uppercase"> <?php echo e($user->usertype); ?> </td>
                                    <td class="px-4 py-4 sm:px-6"> <?php echo e($user->created_at->format('F j, Y, g:i a')); ?>

                                    </td>

                                    </td>
                                    <td class="px-4 py-4 sm:px-6">
                                        <div class="flex flex-col gap-2 sm:flex-row">
                                            <?php if($user->usertype === 'user'): ?>
                                                <?php if($user->account_verification_status == 'waiting for approval'): ?>
                                                    <a href="<?php echo e(route('admin.applicantinfo', ['id' => $user->id])); ?>"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View Applicant
                                                        </button>
                                                    </a>
                                                    <div x-data="{ showModal: false }">
                                                        <!-- Reset Button -->
                                                        <a href="javascript:void(0);" @click="showModal = true"
                                                            class="inline-block px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                            Reset Application
                                                        </a>
                                                        <!-- Modal -->
                                                        <template x-if="showModal" class="modal-wrapper">
                                                            <div x-show="showModal"
                                                                class="fixed inset-0 flex items-center justify-center z-50">
                                                                <div
                                                                    class="bg-gray-100 dark:bg-gray-800  p-6 rounded-lg shadow-lg w-96 z-10">
                                                                    <h2 class="text-lg font-semibold  mb-4">
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
                                                                        <a href="<?php echo e(route('admin.reset', ['id' => $user->id])); ?>"
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
                                                <?php elseif($user->account_verification_status == 'approved'): ?>
                                                    <a href="<?php echo e(route('admin.applicantinfo', ['id' => $user->id])); ?>"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View Applicant
                                                        </button>
                                                    </a>
                                                <?php elseif($user->account_verification_status != 'pending'): ?>
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        View Applicant
                                                    </button>
                                                <?php endif; ?>
                                            <?php elseif($user->usertype == 'employer'): ?>
                                                <?php if($user->account_verification_status == 'waiting for approval'): ?>
                                                    <a href="<?php echo e(route('admin.employerapplicantinfo', ['id' => $user->id])); ?>"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View Employer
                                                        </button>
                                                    </a>
                                                    <div x-data="{ showModal: false }">
                                                        <!-- Reset Button -->
                                                        <a href="javascript:void(0);" @click="showModal = true"
                                                            class="inline-block px-3 py-2 text-md font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                                            Reset Application
                                                        </a>
                                                        <!-- Modal -->
                                                        <template x-if="showModal" class="modal-wrapper">
                                                            <div x-show="showModal"
                                                                class="fixed inset-0 flex items-center justify-center z-50">
                                                                <div
                                                                    class="bg-gray-100 dark:bg-gray-800  p-6 rounded-lg shadow-lg w-96 z-10">
                                                                    <h2 class="text-lg font-semibold  mb-4">
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
                                                                        <a href="<?php echo e(route('admin.reset', ['id' => $user->id])); ?>"
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
                                                <?php elseif($user->account_verification_status == 'approved'): ?>
                                                    <a href="<?php echo e(route('admin.employerapplicantinfo', ['id' => $user->id])); ?>"
                                                        class="inline-block">
                                                        <button
                                                            class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            View Employer
                                                        </button>
                                                    </a>
                                                <?php elseif($user->account_verification_status != 'pending'): ?>
                                                    <button
                                                        class="px-3 py-2 text-md font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        View Employer
                                                    </button>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Session::has('Reset')): ?>
                                <script>
                                    $(document).ready(function() {
                                        toastr.options = {
                                            "progressBar": true,
                                            "closeButton": true,
                                        }
                                        toastr.warning("<?php echo e(Session::get('Reset')); ?>",
                                            'User ID: <?php echo e($user->id); ?> Application were Reset', {
                                                timeOut: 5000
                                            });
                                    });
                                </script>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\admin\manageusers.blade.php ENDPATH**/ ?>