<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/steps.css">

</head>
<?php
    $user = Auth::user(); // Assuming you're using Laravel's authentication and the user is logged in

    // First, let's initialize variables for first name, middle name, and last name
    $firstName = $user->firstname;
    $middleName = $user->middlename;
    $lastName = $user->lastname;

?>

<body>

    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-full">
                    <form action="<?php echo e(route('setup')); ?>" method="POST" enctype="multipart/form-data">
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

                        <!-- Step 1: Applicant Profile -->
                        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                            id="step1">
                            <div class="p-6">
                                <?php
                                    $currentStep = 1; // Set this dynamically based on your current step
                                    $totalSteps = 7; // Total number of steps (adjusted to 8)
                                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                ?>
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full 
                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="Applicant Profile Step 1 <?php echo e($percentage); ?>%;" tabindex="0">
                                    Applicant Profile
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
                                                <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 
                                                focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    aria-label="Go Back" tabindex="0"></i>
                                                <a href="<?php echo e(route('pendingapproval')); ?>" aria-label="Getting Started"
                                                    class="text-gray-700 dark:text-gray-200 
                                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Getting
                                                    Started</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Applicant Profile" tabindex="0">
                                                <span class="text-blue-500 font-semibold">Applicant
                                                    Profile</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                <div aria-label="<?php echo __('messages.applicant.instruction'); ?>" tabindex="0"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span class="font-regular " style="text-align: justify;">
                                        <?php echo __('messages.applicant.instruction'); ?>

                                    </span>
                                </div>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="lastname"
                                                class="block mb-1"><?php echo e(__('messages.applicant.lastname')); ?> <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <input type="text" id="lastname" name="lastname"
                                                aria-label="<?php echo e(__('messages.applicant.lastname')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Last Name"
                                                value="<?php echo e(old('lastname', isset($formData['lastname']) ? $formData['lastname'] : $lastName)); ?>">
                                            <?php $__errorArgs = ['lastname'];
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
                                            <label for="firstname"
                                                class="block mb-1"><?php echo e(__('messages.applicant.firstname')); ?> <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <input type="text" id="firstname" name="firstname"
                                                aria-label="<?php echo e(__('messages.applicant.firstname')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="First Name"
                                                value="<?php echo e(old('firstname', isset($formData['firstname']) ? $formData['firstname'] : $firstName)); ?>">
                                            <?php $__errorArgs = ['firstname'];
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
                                            <label for="middlename"
                                                class="block mb-1"><?php echo e(__('messages.applicant.middlename')); ?></label>
                                            <input type="text" id="middlename" name="middlename"
                                                aria-label="<?php echo e(__('messages.applicant.middlename')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Middle Name"
                                                value="<?php echo e(old('middlename', isset($formData['middlename']) ? $formData['middlename'] : $middleName)); ?>">
                                            <?php $__errorArgs = ['middlename'];
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
                                            <label for="birthdate" class="block mb-1">
                                                <?php echo e(__('messages.applicant.birthdate')); ?>

                                                <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>

                                            <input type="date" id="birthdate" name="birthdate"
                                                aria-label="<?php echo e(__('messages.applicant.birthdate')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="<?php echo e(old('birthdate', $formData['birthdate'] ?? '')); ?>">
                                            <?php $__errorArgs = ['birthdate'];
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
                                            <label for="suffix"
                                                class="block mb-1"><?php echo e(__('messages.applicant.suffix')); ?></label>
                                            <select id="suffix" name="suffix"
                                                aria-label="<?php echo e(__('messages.applicant.suffix')); ?>"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="None"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'None' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_none')); ?></option>
                                                <option value="Sr."
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'Sr.' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_sr')); ?></option>
                                                <option value="Jr."
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'Jr.' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_jr')); ?></option>
                                                <option value="I"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'I' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_i')); ?></option>
                                                <option value="II"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'II' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_ii')); ?></option>
                                                <option value="III"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'III' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_iii')); ?></option>
                                                <option value="IV"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'IV' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_iv')); ?></option>
                                                <option value="V"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'V' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_v')); ?></option>
                                                <option value="VI"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VI' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_vi')); ?></option>
                                                <option value="VII"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VII' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_vii')); ?></option>
                                                <option value="VIII"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VIII' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_viii')); ?></option>
                                                <option value="IX"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'IX' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_ix')); ?></option>
                                                <option value="X"
                                                    <?php echo e(old('suffix', $applicant->suffix ?? '') == 'X' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.suffix_x')); ?></option>
                                            </select>
                                            <?php $__errorArgs = ['suffix'];
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
                                            <label for="gender"
                                                class="block mb-1"><?php echo e(__('messages.applicant.gender')); ?></label>
                                            <select id="gender" name="gender"
                                                aria-label="<?php echo e(__('messages.applicant.gender')); ?>"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="Male"
                                                    <?php echo e(old('gender', $applicant->gender ?? '') == 'Male' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.male')); ?>

                                                </option>
                                                <option value="Female"
                                                    <?php echo e(old('gender', $applicant->gender ?? '') == 'Female' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.female')); ?></option>
                                                <option value="Other"
                                                    <?php echo e(old('gender', $applicant->gender ?? '') == 'Other' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.applicant.other')); ?>

                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['gender'];
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

                                <div class="mt-2 text-right">
                                    <button type="submit" aria-label=" <?php echo e(__('messages.save')); ?>"
                                        class="py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        <?php echo e(__('messages.save')); ?>

                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/steps/step1.blade.php ENDPATH**/ ?>