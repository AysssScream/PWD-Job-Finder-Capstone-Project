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
    <?php if(Auth::check() && Auth::user()->account_verification_status === 'pending'): ?>
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                    <?php echo e(__('Encode Employer Profile')); ?>

                </h2>
            </div>

         <?php $__env->endSlot(); ?>
    <?php elseif(Auth::check() && Auth::user()->account_verification_status === 'waiting for approval'): ?>
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                <?php echo e(__('Waiting for Approval ')); ?>

            </h2>
         <?php $__env->endSlot(); ?>
    <?php else: ?>
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                <?php echo e(__('Account Activated')); ?>

            </h2>
         <?php $__env->endSlot(); ?>
    <?php endif; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">

    </head>

    <?php if(Auth::check() && is_null(Auth::user()->email_verified_at)): ?>
        <div class="landscape-container mt-20">
            <div class="container w-3/4 mx-auto landscape-content">
                <div
                    class="bg-white text-black dark:bg-gray-700 dark:text-gray-200  p-6 rounded-lg shadow-md text-center">
                    <div class="text-6xl text-red-500">&#9888;</div> <!-- Updated icon to warning sign -->
                    <h2 class="text-2xl font-bold mb-4">Email Verification Required</h2>
                    <p class="text-lg text-black-700 mb-8">
                        Your personal information has been approved by our system. However, you need to verify
                        your email to access your account.
                    </p>
                    <br>
                    <p class="text-lg text-black-700 mb-8">
                        Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed to
                        creating an inclusive and accessible environment for all users, including Persons With
                        Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to ensure
                        that our platform is accessible to individuals of all abilities. Please verify your email to
                        proceed to your user dashboard.
                    </p>
                    <form action="<?php echo e(route('profile.edit')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">GO TO
                            PROFILE</button>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if(Auth::check() && Auth::user()->account_verification_status === 'pending'): ?>

            <body>
                <div class="py-12">
                    <div class="container mx-auto">
                        <div class="flex justify-center">
                            <div class="w-screen">
                                <form action="<?php echo e(route('employer.setup')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php if($errors->any()): ?>
                                        <div class="bg-red-100 border dark:bg-red-700 dark:text-gray-100 border-red-400 text-red-700 px-4 py-3 rounded relative"
                                            role="alert">
                                            <strong class="font-bold">Oops!</strong>
                                            <span class="block sm:inline">There were some errors with your
                                                submission:</span>
                                            <ul class="mt-3 list-disc list-inside text-sm">
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <br>
                                    <?php endif; ?>

                                    <!-- Step 1: Applicant Profile -->
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                                        id="step1">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-2xl font-bold mb-2">Employer Profile</h3>
                                                <span class="text-md font-medium text-black-500"> STEP 1 OUT OF 2</span>
                                            </div>
                                            <span class="text-md font-regular" style="text-align: justify;">
                                                <b>Step 1:</b> For your employer
                                                Profile,
                                                fill
                                                up the business name, TIN, and trade name if applicable. Select
                                                "Main"
                                                or "Branch" for location type, provide contact details, choose
                                                your
                                                employer type from the dropdown, and enter the total workforce
                                                number.
                                                Add your business address and zip code, then review for accuracy
                                                before
                                                proceeding. <b> Only select the city locations in the dropdown
                                                    box. </b>

                                            </span>
                                            <br>
                                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="businessname" class="block mb-1">
                                                        Business Name
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="businessname" name="businessname"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="[A-Za-z\s.,-]+ "
                                                        title="Please enter alphabetic characters only"
                                                        value="<?php echo e(old('businessname', $employerData['businessname'] ?? '')); ?>"
                                                        maxlength="50" placeholder="Ex. Concentrix">
                                                    <?php $__errorArgs = ['businessname'];
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

                                                <div class="mt-0">
                                                    <label for="tin" class="block mb-1">
                                                        Taxpayer Identification Number
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="tinno" name="tinno"
                                                        value="<?php echo e(old('tinno', $employerData['tinno'] ?? '')); ?>"
                                                        maxlength="12"
                                                        class="w-full px-4 py-2 rounded-md border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        placeholder="(12 Digits Max)">
                                                    
                                                    


                                                </div>


                                                <div>
                                                    <label for="tradename" class="block mb-1">Trade Name</label>
                                                    <input type="text" id="tradename" name="tradename"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 "
                                                        value="<?php echo e(old('tradename', $employerData['tradename'] ?? '')); ?>"
                                                        pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                        placeholder="Ex. Concentrix Webhelp">
                                                    <?php $__errorArgs = ['tradename'];
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

                                                <div>
                                                    <label for="location-type" class="block mb-1">
                                                        Location Type
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="flex items-center mb-2">
                                                        <input type="radio" id="locationtype1" name="locationtype"
                                                            value="Main" class="mr-2"
                                                            <?php echo e(old('locationtype', $employerData['locationtype'] ?? '') == 'Main' ? 'checked' : ''); ?>>
                                                        <label for="locationtype1">Main</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="radio" id="locationtype2" name="locationtype"
                                                            value="Branch" class="mr-2"
                                                            <?php echo e(old('locationtype', $employerData['locationtype'] ?? '') == 'Branch' ? 'checked' : ''); ?>>
                                                        <label for="locationtype2">Branch</label>
                                                    </div>
                                                    <?php $__errorArgs = ['locationtype'];
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

                                                <div>
                                                    <label for="employer-type" class="block mb-1">
                                                        Employer Type
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <select id="employertype" name="employertype"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                        <option value="" disabled selected>Select employer type
                                                        </option>
                                                        <option value="Public"
                                                            <?php echo e(old('employertype', $employerData['employertype'] ?? '') == 'Public' ? 'selected' : ''); ?>>
                                                            Public</option>
                                                        <option value="Private"
                                                            <?php echo e(old('employertype', $employerData['employertype'] ?? '') == 'Private' ? 'selected' : ''); ?>>
                                                            Private</option>
                                                    </select>
                                                    <?php $__errorArgs = ['employertype'];
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

                                                <div>
                                                    <label for="totalworkforce" class="block mb-1">
                                                        Total Work Force
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <select id="totalworkforce" name="totalworkforce"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                        <option value="" disabled selected>Select total work
                                                            force
                                                        </option>
                                                        <option value="1-10"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '1-10' ? 'selected' : ''); ?>>
                                                            1-10</option>
                                                        <option value="11-50"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '11-50' ? 'selected' : ''); ?>>
                                                            11-50</option>
                                                        <option value="51-100"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '51-100' ? 'selected' : ''); ?>>
                                                            51-100</option>
                                                        <option value="101-500"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '101-500' ? 'selected' : ''); ?>>
                                                            101-500</option>
                                                        <option value="501-1000"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '501-1000' ? 'selected' : ''); ?>>
                                                            501-1000</option>
                                                        <option value="1001+"
                                                            <?php echo e(old('totalworkforce', $employerData['totalworkforce'] ?? '') == '1001+' ? 'selected' : ''); ?>>
                                                            1001+</option>
                                                    </select>
                                                    <?php $__errorArgs = ['totalworkforce'];
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

                                                <div>
                                                    <label for="address" class="block mb-1">
                                                        Business Address
                                                        <span class="text-red-500">*</span>
                                                    </label> <input type="text" id="address" name="address"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="<?php echo e(old('address', $employerData['address'] ?? '')); ?>"
                                                        pattern="[A-Za-z\s.,-]+ " maxlength="100"
                                                        placeholder="Ex. House No., Street, Village">
                                                    <?php $__errorArgs = ['address'];
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



                                                <div id="municipality-container" class="relative">
                                                    <label for="city" class="block mb-1">
                                                        City
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <select id="municipality-dropdown" name="municipality"
                                                            class="w-full p-2 border rounded shadow-sm bg-transparent text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            aria-placeholder="Select a Municipality or City">
                                                            <option value="" disabled selected>Select a
                                                                Municipality or City
                                                            </option>
                                                            <!-- Options will be dynamically populated here -->
                                                        </select>
                                                    </div>
                                                    <!-- Hidden input to store the selected barangay data -->
                                                    <input type="text" id="selected-municipality"
                                                        name="selected-municipality"
                                                        value="<?php echo e(old('municipality', $employerData['municipality'] ?? '')); ?>"
                                                        hidden>
                                                </div>


                                                <div class="mt">
                                                    <label for="zipcode" class="block mb-1">
                                                        Zip Code
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="flex items-center mt-2">
                                                        <input type="text" id="zipcode" name="zipcode"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('zipcode', $employerData['zipcode'] ?? '')); ?>"
                                                            placeholder="Enter Zip Code" readonly />
                                                        <!-- Add disabled attribute here -->
                                                        <?php $__errorArgs = ['zipcode'];
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
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- Step 1: Applicant Profile -->
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                                        id="step1">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-2xl font-bold mb-2">Contact Details</h3>
                                                <span class="text-md font-medium text-black-500"> STEP 2 OUT OF
                                                    2</span>
                                            </div>
                                            <span class="text-md font-regular" style="text-align: justify;"><b>
                                                    Step 2: </b>For</b>
                                                the “Contact Details” form, input your name, position, telephone and
                                                mobile numbers, fax number if applicable, and email address. Once
                                                all fields are filled accurately, click the "Submit Form" button to
                                                proceed.
                                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="contactperson" class="block mb-1">
                                                            Contact Person
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="contact_person"
                                                            name="contact_person"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('contact_person', $employerData['contact_person'] ?? '')); ?>"
                                                            pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                            placeholder="Ex. Juan Dela Cruz">
                                                        <?php $__errorArgs = ['contact_person'];
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

                                                    <div>
                                                        <label for="position" class="block mb-1">
                                                            Position
                                                            <span class="text-red-500">*</span>
                                                        </label> <input type="text" id="position" name="position"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('position', $employerData['position'] ?? '')); ?>"
                                                            pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                            placeholder="Ex. Manager">
                                                        <?php $__errorArgs = ['position'];
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

                                                    <div>
                                                        <label for="telephone_no" class="block mb-1">Telephone
                                                            No.</label>
                                                        <input type="text" id="telephone_no" name="telephone_no"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('telephone_no', $employerData['telephone_no'] ?? '')); ?>"
                                                            pattern="[0-9]+" title="Please enter numbers only"
                                                            maxlength="8" placeholder="Ex. 89839463">
                                                        <?php $__errorArgs = ['telephone_no'];
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

                                                    <div>
                                                        <label for="mobile_no" class="block mb-1">
                                                            Mobile No.
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="mobile_no" name="mobile_no"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('mobile_no', $employerData['mobile_no'] ?? '')); ?>"
                                                            pattern="[0-9]+" maxlength="11"
                                                            placeholder="Ex. 09673411152">
                                                        <?php $__errorArgs = ['mobile_no'];
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

                                                    <div class="flex flex-wrap gap-1">
                                                        <label for="fax_no" class="block mb-1">Fax No.</label>

                                                        <input type="text" id="faxAreaCode" name="fax[]"
                                                            class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="2" placeholder="(02)"
                                                            value="<?php echo e(old('fax.0', $employerData['fax.0'] ?? '')); ?>" />

                                                        <!-- Separator (e.g., hyphen) -->
                                                        <span class="flex-center dash">-</span>

                                                        <!-- Prefix -->
                                                        <input type="text" id="faxPrefix" name="fax[]"
                                                            class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="3" placeholder="631"
                                                            value="<?php echo e(old('fax.1', $employerData['fax.1'] ?? '')); ?>" />

                                                        <!-- Separator (e.g., hyphen) -->
                                                        <span class="flex-center dash">-</span>


                                                        <!-- Fax Number -->
                                                        <input type="text" id="faxNumber" name="fax[]"
                                                            class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="4" placeholder="4631"
                                                            value="<?php echo e(old('fax.2', $employerData['fax.2'] ?? '')); ?>" />

                                                        <input type="text" id="hiddenFaxNumber"
                                                            name="hiddenFaxNumber"
                                                            class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="9" placeholder="4631"
                                                            value="<?php echo e(old('hiddenFaxNumber', $employerData['hiddenFaxNumber'] ?? '')); ?>"
                                                            hidden>
                                                        <?php $__errorArgs = ['hiddenFaxNumber'];
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




                                                    <div>
                                                        <label for="busines_email" class="block mb-1">
                                                            Business Email
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="email" id="email_address" name="email_address"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="<?php echo e(old('email_address', $employerData['email_address'] ?? '')); ?>"
                                                            placeholder="Ex. juandelacruz@gmail.com">
                                                        <?php $__errorArgs = ['email_address'];
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
                                                <br>
                                                <div class="text-right">
                                                    <!-- Container div with text alignment set to right -->
                                                    <button type="submit"
                                                        class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Submit
                                                        Form</button>
                                                </div>

                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    
                <?php elseif(Auth::check() && Auth::user()->account_verification_status === 'waiting for approval'): ?>
                    <div class="landscape-container mt-20"> <!-- Add mt-5 class for margin-top -->
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                                <div class="text-6xl text-green-500 ">&#10004;</div>
                                <h2 class="text-2xl font-bold mb-4">Waiting for Administrator Approval</h2>
                                <p class="text-lg text-black-700 mb-8 ">Your employer information has been
                                    submitted.
                                    Please
                                    wait
                                    for administrator approval.</p> <br>
                                <p class="text-lg text-black-700 mb-8 ">Thank you for registering your account with
                                    us.
                                    At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible
                                    environment
                                    for
                                    all users, including Persons With Disabilities (PWDs). As part of our commitment
                                    to
                                    diversity
                                    and equality, we strive to ensure that our platform is accessible to individuals
                                    of
                                    all
                                    abilities. Please note that account verification may take <b> 1-2 business days
                                    </b>.
                                </p>
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="py-2 px-4 bg-black text-white rounded inline-block">LOGOUT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="landscape-container mt-20"> <!-- Add mt-5 class for margin-top -->
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="  text-black dark:bg-gray-700 dark:text-gray-200  p-6 rounded-lg shadow-md text-center">
                                <div class="text-6xl text-green-500 ">&#10004;</div>
                                <h2 class="text-2xl font-bold mb-4">Account Approved!</h2>
                                <p class="text-lg text-black-700 mb-8 ">Your employer information has been approved
                                    by
                                    the
                                    administrator.
                                    You can now access your account.</p> <br>
                                <p class="text-lg text-black-700 mb-8 ">Thank you for registering your account with
                                    us.
                                    At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible
                                    environment
                                    for
                                    all users, including Persons With Disabilities (PWDs). As part of our commitment
                                    to
                                    diversity
                                    and equality, we strive to ensure that our platform is accessible to individuals
                                    of
                                    all
                                    abilities. You may return to your employer dashboard accordingly.
                                </p>
                                <form action="<?php echo e(route('employer.dashboard')); ?>" method="GET">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="py-2 px-4 bg-black text-white rounded inline-block">RETURN
                                        TO DASHBOARD</button>
                                </form>
                            </div>
                        </div>
                    </div>
        <?php endif; ?>
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cityDropdown = document.getElementById('municipality-dropdown');
        const errorDiv = document.getElementById('municipality-error');
        const editButton = document.getElementById('editButton');
        const selectedBarangayInput = document.getElementById('selected-municipality');
        const zipCodeInput = document.getElementById('zipcode');

        let allBarangays = [];

        // Fetch barangay data
        fetch('/locations/municipalities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Flatten all barangays into a single array with city information
                allBarangays = Object.keys(data).flatMap(city => {
                    return data[city].map(barangay => ({
                        city: city,
                        location: barangay.location,
                        zip: barangay.zip
                    }));
                });

                // Populate dropdown with barangay data
                populateDropdown(allBarangays);
            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });

        function populateDropdown(barangays) {
            barangays.forEach(barangay => {
                const option = document.createElement('option');
                // Use a unique value, like city and location combined, to differentiate options
                option.value = `${barangay.city}-${barangay.location}`;
                option.textContent = `${barangay.city} - ${barangay.location}`;
                cityDropdown.appendChild(option);
            });
        }



        cityDropdown.addEventListener('change', function() {
            const selectedValue = this.value; // This is in the format 'City-Location'
            const [selectedCityName, selectedLocation] = selectedValue.split('-');
            const selectedBarangay = allBarangays.find(b => b.city === selectedCityName && b
                .location === selectedLocation);

            if (selectedBarangay) {
                selectedBarangayInput.value = `${selectedBarangay.city} - ${selectedBarangay.location}`;
                zipCodeInput.value = selectedBarangay.zip; // Set the zip code separately
                editButton.style.display = 'inline-block'; // Show edit button
            }
        });



        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault();
            editButton.style.display = 'none'; // Hide edit button
            cityDropdown.value = ''; // Reset dropdown
            selectedBarangayInput.value = ''; // Clear selected barangay input
            zipCodeInput.value = ''; // Clear zip code input
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        console.log('Document loaded');
        const input = document.getElementById('city');
        const list = document.getElementById('city-list');
        const maxSuggestions = 10;
        let displayedSuggestions = new Set();

        fetch('https://psgc.gitlab.io/api/cities/')
            .then(response => response.json())
            .then(data => {
                console.log('Data fetched:', data);
                input.addEventListener('input', function() {
                    const keyword = this.value.trim().toLowerCase();
                    list.innerHTML = ''; // Clear previous suggestions
                    displayedSuggestions.clear(); // Clear displayed suggestions set
                    let count = 0;
                    data.forEach(city => {
                        if (city.name.toLowerCase().includes(keyword) && count <
                            maxSuggestions) {
                            if (!displayedSuggestions.has(city.name)) {
                                const option = document.createElement('option');
                                option.value = city.name;
                                list.appendChild(option);
                                displayedSuggestions.add(city.name);
                                count++;
                            }
                        }
                    });

                    list.addEventListener('click', function(event) {
                        const selectedCity = event.target.value;
                        input.value = selectedCity; // Set input value to the selected city
                        list.innerHTML = ''; // Clear the suggestion list
                        console.log('Selected city:', selectedCity);
                    });
                });
                console.log('Datalist populated');
            })
            .catch(error => console.error('Error fetching city data:', error));
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
            document.getElementById('tin9'),
            document.getElementById('tin10'), // New input
            document.getElementById('tin11'), // New input
            document.getElementById('tin12') // New input
        ];
        const fullTINInput = document.getElementById('tinno');

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


    function updateHiddenFaxNumber() {
        const areaCode = document.getElementById('faxAreaCode').value;
        const prefix = document.getElementById('faxPrefix').value;
        const faxNumber = document.getElementById('faxNumber').value;

        const concatenatedFaxNumber = `${areaCode}${prefix}${faxNumber}`;

        document.getElementById('hiddenFaxNumber').value = concatenatedFaxNumber;
    }

    function handleInputNavigation(currentInput, nextInput, prevInput) {
        currentInput.addEventListener('input', function() {
            if (this.value.length >= this.maxLength) {
                nextInput.focus();
            }
            updateHiddenFaxNumber();
        });

        currentInput.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value.length === 0 && prevInput) {
                prevInput.focus();
            }
        });
    }

    const faxAreaCode = document.getElementById('faxAreaCode');
    const faxPrefix = document.getElementById('faxPrefix');
    const faxNumber = document.getElementById('faxNumber');
    handleInputNavigation(faxAreaCode, faxPrefix, null);
    handleInputNavigation(faxPrefix, faxNumber, faxAreaCode);
    handleInputNavigation(faxNumber, null, faxPrefix);
    faxNumber.addEventListener('input', updateHiddenFaxNumber);
    window.onload = updateHiddenFaxNumber;
</script>

<style>
    .flex-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input-field {
        height: 3rem;
        /* Adjust as necessary */
        width: 5rem;
        /* Adjust as necessary */
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }

    .dash {
        height: 3rem;
        /* Match the height of input fields */
        line-height: 3rem;
        /* Same as height to center the dash */
        font-size: 1.5rem;
        /* Adjust font size as necessary */
    }

    .suggestion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\employer\setup.blade.php ENDPATH**/ ?>