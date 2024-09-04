<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"
    integrity="sha512-8MHhFGF8xlJgCr5QmnV8Wmk1VB0AxFYggqtXXMtDlz0Z1WzpCF4zmnuK9HVYN3lS/DYDZ6B9P2B6GSU8+RIMUQ=="
    crossorigin="anonymous"></script>

<style>
    /* Default margin for large screens */
    .responsive-margin {
        margin-left: 16rem;
        /* equivalent to ml-64 */
    }

    /* Adjust margin for medium screens */
    @media (max-width: 1024px) {

        /* Adjust this breakpoint as needed */
        .responsive-margin {
            margin-left: 16rem;
            /* equivalent to ml-32 */
        }
    }

    /* Adjust margin for small screens */
    @media (max-width: 768px) {

        /* Adjust this breakpoint as needed */
        .responsive-margin {
            margin-left: 3rem;
            /* equivalent to ml-16 */
        }
    }
</style>
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
    <div class="py-12 responsive-margin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-blue-500 hover:text-blue-700 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <?php echo e(__('Go Back to Dashboard')); ?>

                    </a>
                </div>
                <?php if($type === 'disabilityoccurence'): ?>
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Disability Occurence
                            </h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Disability Occurence
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="<?php echo e(route('exportDisabilityOccurence.csv')); ?>"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="<?php echo e(route('exportDisabilityOccurence.pdf')); ?>"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $disabilityOccurrences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disabilityOccurrence => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($disabilityOccurrence); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($count / $totaldisabilityOccurences) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($count / $totaldisabilityOccurences) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-20 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col ml-4 mb-4">
                                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4 mb-4">Other
                                    Disability
                                    Occurence
                                </h2>
                                <p class="ml-4 text-gray-600 dark:text-gray-400">
                                    If the PWD choose "Others." Here are the following different kinds of disability
                                    occurrences:
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $otherdisabilityDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherdisabilityDetails => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($otherdisabilityDetails); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($count / $totalotherdisabilityOccurences) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($count / $totalotherdisabilityOccurences) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php elseif($type === 'disabilitytype'): ?>
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Disability
                                Type
                            </h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Disability Type
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="<?php echo e(route('exportDisabilityType.csv')); ?>"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="<?php echo e(route('exportDisabilityType.pdf')); ?>"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability Type
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            PWD Count
                                        </th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"
                                            style=" padding-left: 38px;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $disabilityType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($type); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($count / $totaldisabilityType) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($count / $totaldisabilityType) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col  mb-4">
                                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4 mb-4">Specific
                                    Disability
                                    Type
                                </h2>
                                <p class="ml-4 text-gray-600 dark:text-gray-400">
                                    If the PWD choose a "Disability Type" Here are the following different kinds of
                                    specific disabilities
                                    they've provided:
                                </p>
                            </div>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">

                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-2 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 text-left dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Specified Disability
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            PWD Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $disabilityDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($details); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <?php echo e($count); ?>

                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2"><?php echo e(number_format(($count / $totaldisabilityDetails) * 100, 1)); ?>%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: <?php echo e(number_format(($count / $totaldisabilityDetails) * 100, 1)); ?>%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>




            </div>
        <?php elseif($type === 'skills'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                        Skills</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Skills
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportskills.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportskills.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Skill
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employed
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($skill); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2"><?php echo e(number_format(($count / $totalSkillsCount) * 100, 1)); ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e(number_format(($count / $totalSkillsCount) * 100, 1)); ?>%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php elseif($type === 'leastskills'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Skills</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Disability Type
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportskills.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportskills.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Skill
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employed
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leastEmployableSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($skill); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2"><?php echo e(number_format(($count / $totalSkillsCount) * 100, 1)); ?>%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e(number_format(($count / $totalSkillsCount) * 100, 1)); ?>%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php elseif($type === 'education'): ?>
            <!-- Most Employable Education Levels -->
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                        Education Levels</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Education
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exporteducation.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exporteducation.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Education Level
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($education); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php elseif($type === 'leasteducation'): ?>
            <div class="mt-4 mx-4">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Education Levels</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Education
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exporteducation.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exporteducation.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Education Level
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leastEmployableEducationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($education); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif($type === 'mostemployment'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                        Employment Type</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Employment Type
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportEmploymentType.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportEmploymentType.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employment Type
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mostEmployableEmploymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostemployment => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($mostemployment); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif($type === 'leastemployment'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Employment Type</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Employment Type
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportEmploymentType.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportEmploymentType.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employment Type
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leastEmployableEmploymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leastemployment => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($leastemployment); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif($type === 'mostagesbins'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Most
                        Number
                        of
                        Age Bins</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Age Bins
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportageBins.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportageBins.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Age Bins
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mostCommonAges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostage => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($mostage); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif($type === 'leastagesbins'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Least
                        Number
                        of
                        Age Bins</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Age Bins
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportageBins.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportageBins.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Age Bins
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leastCommonAges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leastage => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($leastage); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e($totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%'); ?>

                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%'); ?>"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif($type === 'employeecount'): ?>
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">
                        Top Companies for PWDs with Employee Count</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Companies
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="<?php echo e(route('exportCompanies.csv')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="<?php echo e(route('exportCompanies.pdf')); ?>"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">

                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employer
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Calculate total occurrences for percentage calculations
                                $totalEmployerCounts = $employerCounts->sum();
                            ?>
                            <?php $__currentLoopData = $employerCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // Calculate percentage
                                    $percentage = $totalEmployerCounts > 0 ? ($count / $totalEmployerCounts) * 100 : 0;
                                ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($employer_name); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <?php echo e($count); ?>

                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                <?php echo e(number_format($percentage, 1)); ?>%
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: <?php echo e($percentage); ?>%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php elseif($type === 'yearsofexperience'): ?>
                <div class="mt-4 mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">
                            Top Companies for PWDs with Years of Experience</h2>
                        <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true"
                                    @click="open = !open">
                                    Export Companies
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false" x-cloak
                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="<?php echo e(route('yearsofExperience.csv')); ?>"
                                        class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                    <a href="<?php echo e(route('yearsofExperience.pdf')); ?>"
                                        class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                        role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Employer
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Total Years
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        Percentage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Calculate total years for percentage calculations
                                    $totalEmployerYears = $employerYearsCounts->sum();
                                ?>
                                <?php $__currentLoopData = $employerYearsCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer_name => $totalYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        // Calculate percentage
                                        $percentage =
                                            $totalEmployerYears > 0 ? ($totalYears / $totalEmployerYears) * 100 : 0;

                                        // Round total years to nearest whole number
                                        $roundedYears = round($totalYears);
                                    ?>
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <?php echo e($employer_name); ?>

                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <?php echo e($roundedYears); ?> years
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <span class="mr-2">
                                                    <?php echo e(number_format($percentage, 1)); ?>%
                                                </span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                        <div style="width: <?php echo e($percentage); ?>%"
                                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\admin\details.blade.php ENDPATH**/ ?>