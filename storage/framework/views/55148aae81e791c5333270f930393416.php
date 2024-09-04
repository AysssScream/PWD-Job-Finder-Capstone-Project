<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/steps.css">
    <style>
        /* Custom CSS for resizable functionality */
        .resizable {
            resize: both;
            /* Allows resizing in both directions */
            overflow: hidden;
            /* Ensures content stays within the container */
            min-width: 150px;
            /* Minimum width of the container */
            min-height: 150px;
            /* Minimum height of the container */
            max-width: 100%;
            /* Prevents the container from exceeding viewport width */
            max-height: 100vh;
            /* Prevents the container from exceeding viewport height */
        }

        #imagePreview2 {
            border: 1px solid #ddd;
            padding: 5px;
            overflow: auto;
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #imagePreview2 img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        #imagePreview {
            border: 1px solid #ddd;
            padding: 5px;
            overflow: auto;
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #imagePreview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<div class="py-12">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full">
                <form action="<?php echo e(route('pwdinfo')); ?>" id="lastform" method="POST" enctype="multipart/form-data">
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
                            <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400s"
                                tabindex="0">
                                Verify PWD Information
                                <?php
                                    $currentStep = 7; // Set this dynamically based on your current step
                                    $totalSteps = 7; // Total number of steps (adjusted to 8)
                                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                ?>
                                <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <div class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
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
                                            <a href="<?php echo e(route('workexp')); ?>"
                                                class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0">Educational
                                                Background</a>
                                            <span class="mx-2 text-gray-500">/</span>
                                        </li>
                                        <li class="flex items-center">
                                            <span
                                                class="text-blue-500 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0">Verify your PWD Information</span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <hr class="border-t-2 border-gray-400 rounded-full my-4">
                            <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                tabindex="0" aria-label="<?php echo __('messages.pwdinfo.instruction'); ?>">
                                <span class="text-md font-regular" style="text-align: justify;">
                                    <?php echo __('messages.pwdinfo.instruction'); ?>


                                </span>
                            </div>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div>

                                    <div class="mt-6">
                                        <div class="flex flex-col mr-4 w-full ">
                                            <label for="disabilityOccurrence"
                                                class="block mb-1"><?php echo e(__('messages.pwdinfo.disability_occurrence.label')); ?></label>
                                            <select id="disabilityOccurrence" name="disabilityOccurrence"
                                                class="p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                onchange="toggleOtherDisabilityField()"
                                                aria-label="<?php echo e(__('messages.pwdinfo.disability_occurrence.label')); ?>">
                                                <option value="" selected disabled>
                                                    <?php echo e(__('messages.pwdinfo.disability_occurrence.placeholder')); ?>

                                                </option>
                                                <option value="Birth"
                                                    <?php echo e(old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Birth' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.pwdinfo.disability_occurrence.options.birth')); ?>

                                                </option>
                                                <option value="Before Employment"
                                                    <?php echo e(old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Before Employment' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.pwdinfo.disability_occurrence.options.before_employment')); ?>

                                                </option>
                                                <option value="After Employment"
                                                    <?php echo e(old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'After Employment' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.pwdinfo.disability_occurrence.options.after_employment')); ?>

                                                </option>
                                                <option value="Other"
                                                    <?php echo e(old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Other' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('messages.pwdinfo.disability_occurrence.options.other')); ?>

                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['disabilityOccurrence'];
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

                                        <label for="otherDisabilityDetails" class="block  mt-8">
                                            <?php echo e(__('messages.pwdinfo.others_specify')); ?></label>
                                        <div class="flex items-center mt-2" id="otherDisabilityField">

                                            <input type="text" id="otherDisabilityDetails"
                                                name="otherDisabilityDetails"
                                                aria-label="  <?php echo e(__('messages.pwdinfo.others_specify')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="<?php echo e(old('otherDisabilityDetails', $formData7['otherDisabilityDetails'] ?? '')); ?>"
                                                placeholder="Specify Other Disability Occurrence..." />
                                        </div>
                                        <?php $__errorArgs = ['otherDisabilityDetails'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                                        <div id="imagePreview"
                                            class="resizable mt-32 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <!-- The selected image or alternate image will be displayed here -->
                                            <img id="previewImage" src="<?php echo e(asset('/images/preview.jpg')); ?>"
                                                alt="Preview Image"
                                                style="max-width: 100%; max-height: 100%; display: block;">
                                            <img id="alternateImage" src="<?php echo e(asset('/images/preview.jpg')); ?>"
                                                alt="Alternate Image"
                                                style="max-width: 100%; max-height: 100%; display: none;">
                                        </div>

                                        <small class="block mt-2 text-gray-700 dark:text-gray-200">File size limit:
                                            2MB</small>

                                        <label for="fileUpload" class="block mb-1 mt-6">
                                            <?php echo e(__('messages.pwdinfo.upload_pwd_id')); ?></label>
                                        <div class="relative border rounded overflow-hidden mt-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0" aria-label="<?php echo e(__('messages.pwdinfo.upload_pwd_id')); ?>">

                                            <input type="file" id="fileUpload" name="fileUpload"
                                                class="absolute inset-0 opacity-0 cursor-pointer " accept="image/*"
                                                onchange="pwdIDFileChange(event)" aria-label="Upload Button">
                                            <button type="button" class="py-2 px-4 bg-black text-white "
                                                onclick="document.getElementById('fileUpload').click()">Choose
                                                File</button>
                                        </div>

                                        <div id="fileName" class="mt-2">
                                            <?php echo e(old('fileUploadName', $formData7['fileUploadName'] ?? 'No file chosen')); ?>

                                        </div>


                                        <?php $__errorArgs = ['fileUpload'];
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
                                    <label class="block mb-2 "><?php echo e(__('messages.pwdinfo.disability_status')); ?></label>
                                    <div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="<?php echo e(__('messages.pwdinfo.disability_visual')); ?>">
                                            <input type="radio" id="disability_visual" name="disability"
                                                value="Visual" class="mr-2 " onchange="showTextBox()"
                                                <?php echo e(old('disability', $formData7['disability'] ?? '') == 'Visual' ? 'checked' : ''); ?>>
                                            <label for="disability_visual" class="mr-4"><i
                                                    class="fas fa-eye mr-1"></i>
                                                <?php echo e(__('messages.pwdinfo.disability_visual')); ?></label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label=" <?php echo e(__('messages.pwdinfo.disability_psychosocial')); ?>">
                                            <input type="radio" id="disability_psychosocial" name="disability"
                                                value="Psychosocial" class="mr-2" onchange="showTextBox()"
                                                <?php echo e(old('disability', $formData7['disability'] ?? '') == 'Psychosocial' ? 'checked' : ''); ?>>
                                            <label for="disability_psychosocial" class="mr-4"><i
                                                    class="fas fa-brain mr-1"></i>
                                                <?php echo e(__('messages.pwdinfo.disability_psychosocial')); ?></label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="<?php echo e(__('messages.pwdinfo.disability_physical')); ?>">
                                            <input type="radio" id="disability_physical" name="disability"
                                                value="Physical" class="mr-2" onchange="showTextBox()"
                                                <?php echo e(old('disability', $formData7['disability'] ?? '') == 'Physical' ? 'checked' : ''); ?>>
                                            <label for="disability_physical" class="mr-4"><i
                                                    class="fas fa-wheelchair mr-1"></i><?php echo e(__('messages.pwdinfo.disability_physical')); ?></label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="<?php echo e(__('messages.pwdinfo.disability_hearing')); ?>">
                                            <input type="radio" id="disability_hearing" name="disability"
                                                value="Hearing" class="mr-2" onchange="showTextBox()"
                                                <?php echo e(old('disability', $formData7['disability'] ?? '') == 'Hearing' ? 'checked' : ''); ?>>
                                            <label for="disability_hearing" class="mr-4"><i
                                                    class="fas fa-deaf mr-1"></i>
                                                <?php echo e(__('messages.pwdinfo.disability_hearing')); ?></label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label=" <?php echo e(__('messages.pwdinfo.disability_others')); ?>">
                                            <input type="radio" id="disability_others" name="disability"
                                                value="Others" class="mr-2" onchange="showTextBox()"
                                                <?php echo e(old('disability', $formData7['disability'] ?? '') == 'Others' ? 'checked' : ''); ?>>
                                            <label for="disability_others" class="mr-4"><i
                                                    class="fas fa-handshake mr-1"></i>
                                                <?php echo e(__('messages.pwdinfo.disability_others')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['disability'];
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


                                    <div id="disabilityTextBox"
                                        class="mt-6 <?php echo e(old('disability', $formData7['disability'] ?? '') == 'others' ? '' : ''); ?> w-full">
                                        <label class="block mb-2">
                                            <?php echo e(__('messages.pwdinfo.specify_disability')); ?></label>
                                        <input type="text" id="disabilityDetails" name="disabilityDetails"
                                            aria-label=" <?php echo e(__('messages.pwdinfo.specify_disability')); ?>"
                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            value="<?php echo e(old('disabilityDetails', $formData7['disabilityDetails'] ?? '')); ?>"
                                            placeholder="Ex. Cataract" />
                                        <div>
                                            <?php $__errorArgs = ['disabilityDetails'];
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

                                    

                                    <div id="imagePreview2"
                                        class="resizable mt-14 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        <img id="previewImage" src="<?php echo e(asset('/images/preview.jpg')); ?>"
                                            alt="Preview Image"
                                            style="max-width: 100%; max-height: 100%; display: block;">
                                        <img id="alternateImage" src="<?php echo e(asset('/images/preview.jpg')); ?>"
                                            alt="Alternate Image"
                                            style="max-width: 100%; max-height: 100%; display: none;">
                                    </div>
                                    <small class="block mt-2 text-gray-700 dark:text-gray-200">File size limit:
                                        2MB</small>

                                    <label for="profilePicture" class="block mb-1 mt-6 ">
                                        <?php echo e(__('messages.pwdinfo.upload_profile_picture')); ?></label>
                                    <div class="relative border rounded overflow-hidden mt-3 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0"
                                        aria-label="<?php echo e(__('messages.pwdinfo.upload_profile_picture')); ?>">
                                        <input type="file" id="profilePicture" name="profilePicture"
                                            class="absolute inset-0 opacity-0 cursor-pointer  " accept="image/*"
                                            onchange=" profilePictureFileChange(event)" aria-label="Upload Button">
                                        <button type="button" class="py-2 px-4 bg-black text-white"
                                            onclick="document.getElementById('profilePicture').click()">Choose
                                            File</button>
                                    </div>

                                    <div id="profilePicName" class="mt-2">
                                        <?php echo e(old('profilePictureName', $formData7['profilePictureName'] ?? 'No file chosen')); ?>

                                    </div>



                                    <?php $__errorArgs = ['profilePicture'];
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

                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mt-4 p-6">
                        <h3 class="text-xl sm:text-lg md:text-xl lg:text-3xl font-bold mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 break-words"
                            tabindex="0" aria-label="<?php echo e(__('messages.pwdinfo.certification_authorization')); ?>">
                            <?php echo e(__('messages.pwdinfo.certification_authorization')); ?>

                        </h3>
                        <div class="mt-4 grid grid-cols-1 gap-4">
                            <label for="acceptTerms" class="flex items-center text-justify break-words">
                                <input type="checkbox" id="acceptTerms" name="acceptTerms" class="mr-4"
                                    aria-label="Agreement Checkbox"
                                    <?php echo e(old('acceptTerms', isset($formData9['acceptTerms']) ? $formData9['acceptTerms'] : false) ? 'checked' : ''); ?>>
                                <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 break-words"
                                    tabindex="0" aria-label="<?php echo e(__('messages.pwdinfo.terms')); ?>">
                                    <?php echo e(__('messages.pwdinfo.terms')); ?>

                                </div>
                            </label>
                        </div>
                    </div>


                    <div class="mt-4 text-right">
                        <a href="<?php echo e(route('educationalbg')); ?>" aria-label=" <?php echo e(__('messages.previous')); ?>"
                            class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                            <?php echo e(__('messages.previous')); ?></a>

                        <button type="submit" onsubmit="clearLocalStorage()"
                            aria-label=" <?php echo e(__('messages.save')); ?>"
                            class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            <?php echo e(__('messages.save')); ?></button>
                    </div>
            </div>
        </div>
        <script>
            function toggleOtherDisabilityField() {
                var selectElement = document.getElementById('disabilityOccurrence');
                var otherDisabilityInput = document.getElementById('otherDisabilityDetails');

                if (selectElement.value === 'Other') {
                    otherDisabilityInput.disabled = false;
                } else {
                    otherDisabilityInput.disabled = true;

                }
            }
            window.onload = function() {
                toggleOtherDisabilityField();
            };
            document.getElementById('disabilityOccurrence').addEventListener('change', toggleOtherDisabilityField);


            function clearLocalStorage() {
                localStorage.removeItem('formData');
            }

            function pwdIDFileChange(event) {
                const fileInput = event.target;
                const fileName = fileInput.files[0].name;
                const fileReader = new FileReader();

                document.getElementById('fileName').textContent = fileName;

                fileReader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'mt-2'; // Add margin-top for spacing

                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.innerHTML = ''; // Clear any previous image
                    imagePreview.appendChild(img);
                };

                fileReader.readAsDataURL(fileInput.files[0]);
            }

            function profilePictureFileChange(event) {
                const fileInput = event.target;
                const fileName = fileInput.files[0].name;
                const fileReader = new FileReader();

                document.getElementById('profilePicName').textContent = fileName;

                fileReader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'mt-2';

                    const imagePreview = document.getElementById('imagePreview2');
                    imagePreview.innerHTML = ''; // Clear any previous image
                    imagePreview.appendChild(img);
                };

                fileReader.readAsDataURL(fileInput.files[0]);
            }
        </script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\steps\step7.blade.php ENDPATH**/ ?>