    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">

        <link rel="stylesheet" href="/css/steps.css">

    </head>

    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-full">
                    <form action="<?php echo e(route('personal')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">There were some errors with your submission:</span>
                                <ul class="mt-3 list-disc list-inside text-sm">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <br>
                        <?php endif; ?>

                        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0">
                                    Personal Information
                                    <?php
                                        $currentStep = 2; // Set this dynamically based on your current step
                                        $totalSteps = 7; // Total number of steps (adjusted to 8)
                                        $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                    ?>
                                    <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                        <div
                                            class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                style="width: <?php echo e($percentage); ?>%;"></div>
                                        </div>
                                        <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                            Step <?php echo e($currentStep); ?>/<?php echo e($totalSteps); ?> : <span
                                                class="text-green-600"><?php echo e($percentage); ?>%</span>
                                        </div>
                                    </div>
                                </h3>
                                <div>
                                    <nav class="text-sm" aria-label="Breadcrumb">
                                        <ol class="list-none p-0 inline-flex">
                                            <li class="flex items-center">
                                                <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"></i>
                                                <a href="<?php echo e(route('setup')); ?>"
                                                    class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Applicant
                                                    Profile</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center">
                                                <span
                                                    class="text-blue-500 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0">Personal Information</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0" aria-label="<?php echo __('messages.personal.instruction'); ?>">
                                    <span class="text-md font-regular " style="text-align: justify;">
                                        <?php echo __('messages.personal.instruction'); ?>

                                    </span>
                                </div>

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                                    <div>
                                        <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="civilStatus"
                                                class="block mb-1"><?php echo e(__('messages.personal.civil_status')); ?></label>
                                            <select id="civilStatus" name="civilStatus"
                                                aria-label="<?php echo e(__('messages.personal.civil_status')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="Single"
                                                    <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Single' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.single')); ?></option>
                                                <option value="Married"
                                                    <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Married' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.married')); ?></option>
                                                <option value="Widowed"
                                                    <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Widowed' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.widowed')); ?></option>
                                            </select>
                                            <?php $__errorArgs = ['civilStatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        

                                        <div id="barangay-container" class="mt-6">
                                            <label for="barangay" class="block mb-1">
                                                <?php echo e(__('messages.personal.barangay')); ?>

                                            </label>
                                            <div class="flex items-center space-x-2">
                                                <!-- Dropdown (Select) for Barangay -->
                                                <select id="barangay" name="barangay"
                                                    aria-label="<?php echo e(__('messages.personal.barangay')); ?>"
                                                    class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    <option value="" disabled>Select a Barangay</option>
                                                </select>

                                                <!-- Clear Button -->
                                                <button id="clearBarangayButton" type="button"
                                                    class="ml-4 p-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>
                                            <input type="text" id="barangayLocation" name="barangayLocation"
                                                value="<?php echo e(old('barangayLocation', $formData2['barangayLocation'] ?? '')); ?>"
                                                hidden />
                                            <!-- Error Message -->
                                            <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching
                                                barangay data</div>
                                            <?php $__errorArgs = ['barangayLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>



                                        <div class="mt-6">
                                            <label for="zipcode"
                                                class="block mb-1"><?php echo e(__('messages.personal.zipcode')); ?></label>
                                            <div class="flex items-center mt-4">
                                                <input type="text" id="zipcode" name="zipcode"
                                                    aria-label="<?php echo e(__('messages.personal.zipcode')); ?>"
                                                    class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    value="<?php echo e(old('zipcode', $formData2['zipcode'] ?? '')); ?>"
                                                    placeholder="Enter Zip Code" readonly />
                                                <!-- Add disabled attribute here -->
                                                <?php $__errorArgs = ['zipCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>



                                        <div class="mt-6">
                                            <label for="presentAddress"
                                                class="block mb-1"><?php echo e(__('messages.personal.present_address')); ?></label>
                                            <input type="text" id="presentAddress" name="presentAddress"
                                                aria-label="<?php echo e(__('messages.personal.present_address')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                placeholder="Ex. Street Name, Building, House. No"
                                                value="<?php echo e(old('presentAddress', $formData2['presentAddress'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['presentAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mt-6">
                                            <div class="mt-6">

                                                
                                                <div class="mt-6">
                                                    <label for="tin"
                                                        class="block mb-1"><?php echo e(__('messages.personal.saved_tin')); ?></label>
                                                    <input type="text" id="tin" name="tin"
                                                        aria-label="Tax Identification Number (TIN)"
                                                        value="<?php echo e(old('tin', $formData2['tin'] ?? '')); ?>"
                                                        maxlength="9"
                                                        class="w-full px-4 py-2 rounded-md border-gray-500 shadow-sm  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 cursor-not-allowed"
                                                        placeholder="(9 Digits)">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="mt-6">
                                            <label for="religion"
                                                class="block mb-1"><?php echo e(__('messages.personal.religion')); ?></label>
                                            <select id="religion" name="religion"
                                                aria-label="<?php echo e(__('messages.personal.religion')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="" disabled>Please select...</option>
                                                <option value="Roman Catholic"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Roman Catholic' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.roman_catholic')); ?>

                                                </option>
                                                <option value="Iglesia Ni Cristo"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Iglesia Ni Cristo' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.iglesia_ni_cristo')); ?>

                                                </option>
                                                <option value="Islam"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Islam' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.islam')); ?>

                                                </option>
                                                <option value="Philippine Independent Church"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Philippine Independent Church' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.philippine_independent_church')); ?>

                                                </option>
                                                <option value="Seventh Day Adventist Church"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Seventh Day Adventist Church' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.seventh_day_adventist_church')); ?>

                                                </option>
                                                <option value="Others"
                                                    <?php echo e(old('religion', $personal->religion ?? '') == 'Others' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.personal.others')); ?>

                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['religion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-6">
                                            <label for="landlineNo" class="block mb-1">Landline No.</label>
                                            <input type="tel" id="landlineNo" name="landlineNo"
                                                aria-label="Landline Number"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[0-9]+"
                                                title="Please enter numerical characters only"value="<?php echo e(old('landlineNo', $formData2['landlineNo'] ?? '')); ?>"
                                                placeholder="89839463" maxlength="8" />
                                            <?php $__errorArgs = ['landlineNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mt-6">
                                            <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
                                            <input type="tel" id="cellphoneNo" name="cellphoneNo"
                                                aria-label="Cellphone NUMBER"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                pattern="[0-9]+" title="Please enter numerical characters only"
                                                placeholder="09673411171" maxlength="11"
                                                value="<?php echo e(old('cellphoneNo', $formData2['cellphoneNo'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['cellphoneNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mt-6">
                                            <label
                                                class="block mb-2 "><?php echo e(__('messages.personal.4ps_beneficiary')); ?></label>
                                            <div class="flex items-center ">
                                                <input type="radio" id="4ps-yes" name="beneficiary-4ps"
                                                    value="Yes"
                                                    aria-label="<?php echo e(__('messages.personal.4ps_beneficiary')); ?> Yes"
                                                    class="mr-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    <?php echo e(old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'Yes' ? 'checked' : ''); ?>>
                                                <label for="4ps-yes" class="mr-4">Yes</label>

                                                <input type="radio" id="4ps-no" name="beneficiary-4ps"
                                                    value="No"
                                                    aria-label="<?php echo e(__('messages.personal.4ps_beneficiary')); ?>

                                                    No"
                                                    class="mr-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    <?php echo e(old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'No' ? 'checked' : ''); ?>>
                                                <label for="4ps-no" class="mr-4">No</label>
                                            </div>
                                            <?php $__errorArgs = ['beneficiary-4ps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                        <div class="mt-10">
                                            <label
                                                class="block mb-2 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0"
                                                aria-label="<?php echo e(__('messages.personal.former_ofw')); ?>"><?php echo e(__('messages.personal.former_ofw')); ?></label>
                                            <div class="my-4">
                                                <p class="mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"
                                                    aria-label="<?php echo e(__('messages.personal.if_yes_provide')); ?>">
                                                    <?php echo e(__('messages.personal.if_yes_provide')); ?></p>
                                                <ul class="list-disc pl-6">
                                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label=" <?php echo e(__('messages.personal.latest_country_of_deployment')); ?>">
                                                        <?php echo e(__('messages.personal.latest_country_of_deployment')); ?></li>
                                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label=" <?php echo e(__('messages.personal.return_date')); ?>">
                                                        <?php echo e(__('messages.personal.return_date')); ?></li>
                                                </ul>
                                            </div>

                                        </div>


                                        

                                        <div id="ofw-country-details" class="mt-6">
                                            <label for="ofw-country" class="block mb-1">
                                                <?php echo e(__('messages.personal.latest_country_of_deployment')); ?>

                                            </label>
                                            <div class="flex items-center relative">
                                                <!-- Dropdown (Select) for Country -->
                                                <select id="ofw-country" name="ofw-country"
                                                    class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    <option value="" disabled selected>Select a Country</option>
                                                </select>

                                                <!-- Clear Button -->
                                                <button id="clearCountryButton" type="button"
                                                    class="ml-4 p-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>
                                            <input type="text" id="countryLocation" name="countryLocation"
                                                value="<?php echo e(old('countryLocation', $formData2['countryLocation'] ?? '')); ?>"
                                                hidden />
                                            <?php $__errorArgs = ['countryLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                        <div id="ofw-return-details"
                                            class="mt-6 <?php echo e(old('ofw-return') ? '' : 'disabled'); ?>">
                                            <label for="ofw-return"
                                                class="block mb-1"><?php echo e(__('messages.personal.month_year_return')); ?></label>
                                            <input type="month" id="ofw-return" name="ofw-return"
                                                aria-label="<?php echo e(__('messages.personal.month_year_return')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                value="<?php echo e(old('ofw-return', $formData2['ofw-return'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['ofw-return'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4 text-right">
                                    <a href="<?php echo e(route('setup')); ?>" aria-label=" <?php echo e(__('messages.previous')); ?>"
                                        class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2"
                                        aria-label="Previous"> <?php echo e(__('messages.previous')); ?>

                                    </a>

                                    <button type="submit" aria-label=" <?php echo e(__('messages.save')); ?>"
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="Save"> <?php echo e(__('messages.save')); ?>

                                    </button>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const barangaySelect = document.getElementById('barangay');
                                    const editBarangayButton = document.getElementById('editBarangayButton');
                                    const barangayLocation = document.getElementById('barangayLocation');
                                    const clearButton = document.getElementById('clearBarangayButton');
                                    const zipCodeInput = document.getElementById('zipcode');

                                    // Clear button functionality
                                    clearButton.addEventListener('click', function() {
                                        barangaySelect.value = ''; // Clear the dropdown selection
                                        barangayLocation.value = ''; // Clear the hidden input field
                                        zipCodeInput.value = ''; // Clear the zip code input field
                                    });

                                    // Fetch barangay data from the JSON file
                                    fetch('/locations/barangays.json')
                                        .then(response => response.json())
                                        .then(data => {
                                            const barangays = data.Mandaluyong;

                                            // Populate the dropdown with barangay options
                                            barangaySelect.innerHTML = '<option value="" disabled selected>Select a Barangay</option>';
                                            barangays.forEach(barangayObj => {
                                                const option = document.createElement('option');
                                                option.value = barangayObj.location;
                                                option.textContent = barangayObj.location;
                                                barangaySelect.appendChild(option);
                                            });

                                            // Set selected value to the saved barangay if available
                                            if (barangayLocation.value) {
                                                barangaySelect.value = barangayLocation.value;
                                                updateZipCode(barangaySelect.value); // Update zip code if barangay is already selected
                                            }

                                            // Update hidden input value and zip code on selection change
                                            barangaySelect.addEventListener('change', function() {
                                                barangayLocation.value = this.value;
                                                updateZipCode(this.value);
                                            });
                                        })
                                        .catch(error => console.error('Error fetching barangay data:', error));

                                    // Edit button functionality
                                    editBarangayButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        barangaySelect.removeAttribute('disabled'); // Enable dropdown for editing
                                        barangaySelect.focus(); // Focus on the select field
                                    });

                                    // Disable the select field by default if a barangay is already selected
                                    if (barangaySelect.value) {
                                        barangaySelect.setAttribute('disabled', true);
                                    }

                                    // Function to update the zip code based on the selected barangay
                                    function updateZipCode(selectedBarangay) {
                                        fetch('/locations/barangays.json')
                                            .then(response => response.json())
                                            .then(data => {
                                                const selectedBarangayData = data.Mandaluyong.find(barangayObj => barangayObj
                                                    .location === selectedBarangay);
                                                if (selectedBarangayData) {
                                                    zipCodeInput.value = selectedBarangayData.zip; // Update the zip code input field
                                                }
                                            })
                                            .catch(error => console.error('Error updating zip code:', error));
                                    }
                                });



                                // document.addEventListener('DOMContentLoaded', function() {
                                //     const barangayInput = document.getElementById('barangay');
                                //     const suggestionsContainer = document.getElementById('barangay-suggestions');
                                //     const errorDiv = document.getElementById('barangay-error');
                                //     const zipCodeInput = document.getElementById('zipcode');

                                //     let mandaluyongBarangays = [];

                                //     // Fetch barangay data
                                //     fetch('/locations/barangays.json')
                                //         .then(response => {
                                //             if (!response.ok) {
                                //                 throw new Error('Network response was not ok');
                                //             }
                                //             return response.json();
                                //         })
                                //         .then(data => {
                                //             mandaluyongBarangays = data.Mandaluyong;

                                //             barangayInput.addEventListener('input', function() {
                                //                 const query = this.value.trim().toLowerCase();
                                //                 const filteredBarangays = mandaluyongBarangays.filter(barangay =>
                                //                     barangay.location.toLowerCase().includes(query)
                                //                 ).slice(0, 10);

                                //                 renderSuggestions(filteredBarangays,
                                //                     query);
                                //             });
                                //         })
                                //         .catch(error => {
                                //             console.error('Error fetching barangay data:', error);
                                //             errorDiv.classList.remove('hidden');
                                //         });

                                //     function renderSuggestions(barangays, query) {
                                //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                                //         suggestionsContainer.style.display = barangays.length && query ? 'block' :
                                //             'none';


                                //         barangays.forEach(barangay => {
                                //             const suggestionElement = document.createElement('div');
                                //             suggestionElement.classList.add(
                                //                 'flex', // Flexbox layout
                                //                 'justify-between', // Space between items
                                //                 'items-center', // Center items vertically
                                //                 'p-2', // Padding
                                //                 'cursor-pointer', // Pointer cursor on hover
                                //                 'rounded', // Rounded corners
                                //                 'mb-1', // Margin bottom
                                //                 'bg-gray-200',
                                //                 'text-black',
                                //                 'dark:bg-gray-900',
                                //                 'dark:text-gray-200',
                                //             );

                                //             const suggestionText = document.createElement('div');
                                //             suggestionText.classList.add('suggestion-text');
                                //             suggestionText.textContent = barangay.location;

                                //             const plusContainer = document.createElement('div');
                                //             plusContainer.classList.add('plus-container');
                                //             plusContainer.innerHTML = '+';

                                //             suggestionElement.appendChild(suggestionText);
                                //             suggestionElement.appendChild(plusContainer);

                                //             suggestionElement.addEventListener('click', function() {
                                //                 barangayInput.value = barangay.location;
                                //                 zipCodeInput.value = barangay.zip;
                                //                 editButton.style.display = 'inline-block'; // Show edit button
                                //                 barangayInput.readOnly = true;

                                //                 suggestionsContainer.style.display = 'none';

                                //             });

                                //             suggestionsContainer.appendChild(suggestionElement);


                                //         });
                                //     }

                                //     // Edit button functionality
                                //     editButton.addEventListener('click', function() {
                                //         event.preventDefault()

                                //         barangayInput.removeAttribute('readonly'); // Allow editing
                                //         barangayInput.focus(); // Focus on the input field
                                //         barangayInput.value = ''
                                //         zipCodeInput.value = ''
                                //     });

                                //     // Handle input changes in barangayInput
                                //     barangayInput.addEventListener('input', function() {
                                //         const selectedBarangay = this.value.trim();
                                //         if (selectedBarangay === '') {
                                //             zipCodeInput.value = ''; // Clear zip code input if barangay input is empty
                                //             editButton.style.display = 'inline-block'; // Hide edit button if input is empty

                                //         }
                                //         if (selectedBarangay === '' || selectedBarangay.split(' ').length < 2) {
                                //             zipCodeInput.value = ''; // Clear zip code input
                                //             editButton.style.display = 'inline-block'; // Hide edit button

                                //         }
                                //     });
                                //     if (barangayInput.value.trim() === '') {
                                //         editButton.style.display = 'inline-block';
                                //     }

                                // });




                                document.addEventListener('DOMContentLoaded', function() {
                                    const zipCodeInput = document.getElementById('zipcode');

                                    zipCodeInput.addEventListener('input', function(event) {
                                        event.preventDefault();
                                        return false;
                                    });

                                    zipCodeInput.value =
                                        '<?php echo e(old('zipcode', $formData2['zipcode'] ?? '')); ?>'; // Assuming this is PHP or Blade template syntax

                                    zipCodeInput.addEventListener('change', function(event) {
                                        zipCodeInput.value =
                                            '<?php echo e(old('zipcode', $formData2['zipcode'] ?? '')); ?>'; // Reset value on change
                                    });
                                });



                                document.addEventListener('DOMContentLoaded', function() {
                                    const tinInputs = [
                                        document.getElementById('tin1'),
                                        document.getElementById('tin2'),
                                        document.getElementById('tin3'),
                                        document.getElementById('tin4'),
                                        document.getElementById('tin5'),
                                        document.getElementById('tin6'),
                                        document.getElementById('tin7'),
                                        document.getElementById('tin8'),
                                        document.getElementById('tin9')
                                    ];
                                    const fullTINInput = document.getElementById('tin');

                                    tinInputs.forEach(function(input, index) {
                                        input.addEventListener('input', function() {
                                            // Move to the next input if current input is filled
                                            if (input.value.length === input.maxLength && index < tinInputs.length - 1) {
                                                tinInputs[index + 1].focus();
                                            }

                                            // Manually concatenate values
                                            let fullTIN = '';
                                            tinInputs.forEach(function(inp) {
                                                fullTIN += inp.value.trim();
                                            });
                                            fullTINInput.value = fullTIN;
                                        });

                                        // Move to the previous input on backspace/delete if current input is empty
                                        input.addEventListener('keydown', function(e) {
                                            if ((e.key === 'Backspace' || e.key === 'Delete') && input.value === '' &&
                                                index > 0) {
                                                tinInputs[index - 1].focus();
                                            }
                                        });

                                        // Handle paste event to allow pasting a full TIN directly
                                        input.addEventListener('paste', function(e) {
                                            e.preventDefault();
                                            const pasteData = e.clipboardData.getData('text').replace(/\D/g,
                                                ''); // Get only numeric data
                                            let currentIndex = index;

                                            pasteData.split('').forEach((char) => {
                                                if (currentIndex < tinInputs.length) {
                                                    tinInputs[currentIndex].value = char;
                                                    currentIndex++;
                                                }
                                            });

                                            // Manually concatenate values after paste
                                            let fullTIN = '';
                                            tinInputs.forEach(function(inp) {
                                                fullTIN += inp.value.trim();
                                            });
                                            fullTINInput.value = fullTIN;
                                        });
                                    });
                                });


                                //COUNTRIES
                                document.addEventListener('DOMContentLoaded', function() {
                                    const countrySelect = document.getElementById('ofw-country');
                                    const editButton = document.getElementById('editCountryButton');
                                    const ofwLocation = document.getElementById('countryLocation');
                                    const clearButton = document.getElementById('clearCountryButton');

                                    clearButton.addEventListener('click', function() {
                                        countrySelect.value = ''; // Clear the dropdown selection
                                        ofwLocation.value = ''; // Clear the hidden input field
                                    });

                                    // Fetch country data from the JSON file
                                    fetch('/locations/countries.json')
                                        .then(response => response.json())
                                        .then(data => {
                                            const countries = data.map(countryObj => countryObj.country);

                                            // Populate the dropdown with country options
                                            countrySelect.innerHTML = '<option value="" disabled selected>Select a Country</option>';
                                            countries.forEach(country => {
                                                const option = document.createElement('option');
                                                option.value = country;
                                                option.textContent = country;
                                                countrySelect.appendChild(option);
                                            });

                                            // Set selected value to the saved country if available
                                            if (ofwLocation.value) {
                                                countrySelect.value = ofwLocation.value;
                                            }

                                            // Update hidden input value on selection change
                                            countrySelect.addEventListener('change', function() {
                                                ofwLocation.value = this.value;
                                            });
                                        })
                                        .catch(error => console.error('Error fetching country data:', error));

                                    // Edit button functionality
                                    editButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        countrySelect.removeAttribute('disabled'); // Enable dropdown for editing
                                        countrySelect.focus(); // Focus on the select field
                                    });

                                    // Disable the select field by default if a country is already selected
                                    if (countrySelect.value) {
                                        countrySelect.setAttribute('disabled', true);
                                    }
                                });
                                // document.addEventListener('DOMContentLoaded', function() {
                                //     const countryInput = document.getElementById('ofw-country');
                                //     const editButton = document.getElementById('editCountryButton');
                                //     const suggestionsContainer = document.getElementById('country-suggestions');
                                //     const ofwLocation = document.getElementById('countryLocation');


                                //     // Fetch country data from the JSON file
                                //     fetch('/locations/countries.json')
                                //         .then(response => response.json())
                                //         .then(data => {
                                //             const countries = data.map(countryObj => countryObj.country);

                                //             countryInput.addEventListener('input', function() {
                                //                 const query = this.value.trim().toLowerCase();
                                //                 const filteredCountries = countries.filter(country =>
                                //                     country.toLowerCase().includes(query)
                                //                 ).slice(0, 6);

                                //                 renderSuggestions(filteredCountries, query);
                                //             });
                                //         })
                                //         .catch(error => console.error('Error fetching country data:', error));

                                //     function renderSuggestions(countries, query) {
                                //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                                //         suggestionsContainer.classList.toggle('hidden', !countries.length || !query);

                                //         countries.forEach(country => {
                                //             const suggestionElement = document.createElement('div');
                                //             suggestionElement.classList.add('flex', 'justify-between', 'items-center', 'p-2',
                                //                 'cursor-pointer', 'hover:bg-black', 'hover:text-white', 'border-b',
                                //                 'last:border-none');

                                //             const suggestionText = document.createElement('div');
                                //             suggestionText.textContent = country;
                                //             suggestionText.classList.add('flex-1'); // Make the text take up remaining space

                                //             const plusContainer = document.createElement('div');
                                //             plusContainer.classList.add('text-green-500', 'ml-10'); // Add left margin for spacing
                                //             plusContainer.textContent = '+';

                                //             suggestionElement.appendChild(suggestionText);
                                //             suggestionElement.appendChild(plusContainer);

                                //             suggestionElement.addEventListener('click', function() {
                                //                 countryInput.value = country;
                                //                 suggestionsContainer.classList.add('hidden');
                                //                 ofwLocation.value = country;
                                //                 countryInput.readOnly = true;
                                //             });

                                //             suggestionsContainer.appendChild(suggestionElement);
                                //         });
                                //     }

                                //     // Edit button functionality
                                //     editButton.addEventListener('click', function(event) {
                                //         event.preventDefault();
                                //         countryInput.removeAttribute('readonly');
                                //         countryInput.focus();
                                //         countryInput.value = '';
                                //         ofwLocation.value = '';
                                //     });

                                //     // Handle input changes in countryInput
                                //     countryInput.addEventListener('input', function() {
                                //         const selectedCountry = this.value.trim();
                                //         if (selectedCountry === '') {
                                //             editButton.style.display = 'inline-block';
                                //         }
                                //     });

                                //     if (countryInput.value.trim() === '') {
                                //         editButton.style.display = 'inline-block';
                                //     }


                                // });
                            </script>
                            <style>
                                .suggestion {
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    padding: 8px;
                                    background-color: white;
                                    cursor: pointer;
                                    border-radius: 4px;
                                    margin-bottom: 4px;
                                }

                                .suggestion-text {
                                    flex: 1;
                                }

                                .plus-container {
                                    background-color: #5cb85c;
                                    color: #fff;
                                    padding: 4px 8px;
                                    border-radius: 4px;
                                    margin-left: 8px;
                                }

                                .plus-container:hover {
                                    background-color: #4cae4c;
                                }
                            </style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\steps\step2.blade.php ENDPATH**/ ?>