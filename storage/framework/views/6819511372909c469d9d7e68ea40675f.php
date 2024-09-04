<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setup</title>
    <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200 py-6 mt-6 rounded-lg shadow-md">
        <div class="container mx-auto px-6">
            <!-- Note at the top -->
            <div class="mb-4 px-4 py-3 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                tabindex="0" aria-label="<?php echo e(__('messages.profile_setup.message')); ?>">
                <p class="text-sm font-medium text-center">
                    <?php echo e(__('messages.profile_setup.message')); ?>

                    <span
                        class="bg-green-600 text-white py-1 px-2 rounded-lg inline-block cursor-pointer hover:bg-black transition duration-300">Save</span>
                    <?php echo e(__('messages.profile_setup.instruction')); ?>

                </p>
            </div>

            <!-- Toggle Button -->
            <div class="flex justify-start mb-4">
                <button id="toggleButton" aria-label="<?php echo e(__('messages.steps.toggle_button')); ?>"
                    class="bg-gray-800 text-white px-4 py-2 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-black focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    <i class="fas fa-bars"></i> <?php echo e(__('messages.steps.toggle_button')); ?>

                </button>
            </div>

            <!-- Toggleable Navigation -->
            <div id="toggleNav" class="block">
                <nav class="flex flex-col">
                    <ul class="space-y-2">
                        <li>
                            <a href="<?php echo e(route('setup')); ?>" aria-label=" <?php echo e(__('messages.steps.step_1')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('setup') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-user mr-2"></i> <?php echo e(__('messages.steps.step_1')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('personal')); ?>" aria-label=" <?php echo e(__('messages.steps.step_2')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('personal') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 ">
                                <span><i class="fas fa-id-card mr-2"></i> <?php echo e(__('messages.steps.step_2')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('workexp')); ?>" aria-label=" <?php echo e(__('messages.steps.step_3')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('workexp') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-paper-plane mr-2"></i><?php echo e(__('messages.steps.step_3')); ?>

                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('jobpreferences')); ?>" aria-label=" <?php echo e(__('messages.steps.step_4')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('jobpreferences') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-gears mr-2"></i><?php echo e(__('messages.steps.step_4')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('dialect')); ?>" aria-label=" <?php echo e(__('messages.steps.step_5')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('dialect') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-language mr-2"></i><?php echo e(__('messages.steps.step_5')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('educationalbg')); ?>" aria-label=" <?php echo e(__('messages.steps.step_6')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('educationalbg') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-graduation-cap mr-2"></i>
                                    <?php echo e(__('messages.steps.step_6')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('pwdinfo')); ?>" aria-label=" <?php echo e(__('messages.steps.step_7')); ?>"
                                class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out <?php echo e(request()->routeIs('pwdinfo') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-800 hover:bg-gray-900'); ?> focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span><i class="fas fa-wheelchair mr-2"></i><?php echo e(__('messages.steps.step_7')); ?></span>
                            </a>
                        </li>
                        <!-- Add more steps as needed -->
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            event.preventDefault();
            var nav = document.getElementById('toggleNav');
            nav.classList.toggle('hidden');
        });
    </script>

    <style>

    </style>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\layouts\dropdown.blade.php ENDPATH**/ ?>