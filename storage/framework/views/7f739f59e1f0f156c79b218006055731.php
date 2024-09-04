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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/steps.css">
        <link href="<?php echo e(asset('/css/layouts.css')); ?>" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    </head>
    <div class="py-12">
        <div class="container mx-auto  ">
            <div class="flex justify-center">
                <div class="w-5/6">
                    <div
                        class=" container-wrapper  bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full">
                                <?php echo e(__('messages.workexperience.update_employment_history')); ?>

                            </h3>
                            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between  ">
                                    <h2 class="font-semibold  text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                        <a href="<?php echo e(route('profile.edit')); ?>"
                                            class="text-lg  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200">
                                            <i class="fas fa-arrow-left mr-1"></i>
                                            <?php echo e(__('messages.workexperience.go_back_to_profile')); ?>

                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <?php if($workExperiences->isEmpty()): ?>
                                    <p>No work experiences found.</p>
                                <?php else: ?>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('messages.workexperience.actions')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.employer_name')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.employer_address')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.position_held')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.skills_gained')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.employment_status')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.from')); ?></th>
                                                <th><?php echo e(__('messages.workexperience.to')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="mt-6">
                                                <?php echo $__env->renderEach('components.work-experience-row', $workExperiences, 'workExperience'); ?>
                                            </div>

                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>

                            <form id="workExperienceForm" onsubmit="myfunc(event)" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mt-6">
                                            <label for="employerName"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.employer_name')); ?></label>
                                            <input type="text" id="employerName" name="employerName"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                placeholder="Ex. XYZ Tech Solutions"
                                                value="<?php echo e(old('employerName', $formData3['employerName'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['employerName'];
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
                                            <label for="employerAddress"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.employer_address')); ?></label>
                                            <input type="text" id="employerAddress" name="employerAddress"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                placeholder="Ex. Street Name, Building, House. No"
                                                value="<?php echo e(old('employerAddress', $formData3['employerAddress'] ?? '')); ?>"
                                                placeholder="Ex. 17 San Miguel Ave, San Antonio, Pasig, 1605 Metro Manila" />
                                            <?php $__errorArgs = ['employerAddress'];
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
                                            <label for="positionHeld"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.position_held')); ?></label>
                                            <input type="text" id="positionHeld" name="positionHeld"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder=" Ex. Web Developer"
                                                value="<?php echo e(old('positionHeld', $formData3['positionHeld'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['positionHeld'];
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
                                            <label for="skillSearch"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.skills_gained')); ?>

                                                (Press
                                                <b>Enter</b> to Add Items)</label>
                                            <input type="text" id="skillSearch" name="skillSearch[]"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                list="skillSuggestions"
                                                placeholder="Ex. Soft Skills, Bilingual Communication">
                                            <div id="skillSuggestions" class="mt-2 grid grid-cols-3 gap-2">
                                            </div>

                                            </datalist>
                                            <?php $__errorArgs = ['skillSearch'];
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
                                            <label for="fromDate"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.from')); ?></label>
                                            <input type="date" id="fromDate" name="fromDate"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                value="<?php echo e(old('fromDate', $formData3['fromDate'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['fromDate'];
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
                                            <label for="toDate"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.to')); ?></label>
                                            <input type="date" id="toDate" name="toDate"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                value="<?php echo e(old('toDate', $formData3['toDate'] ?? '')); ?>" />
                                            <?php $__errorArgs = ['toDate'];
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
                                            <label for="employmentStatus"
                                                class="block mb-1"><?php echo e(__('messages.workexperience.employment_status')); ?></label>
                                            <select id="employmentStatus" name="employmentStatus"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                <option value="" selected disabled>Select status...
                                                </option>
                                                <option value="Permanent"
                                                    <?php echo e(old('employmentStatus', $formData3['employmentStatus'] ?? '') == 'Permanent' ? 'selected' : ''); ?>>
                                                    Permanent</option>
                                                <option value="Contractual"
                                                    <?php echo e(old('employmentStatus', $formData3['employmentStatus'] ?? '') == 'Contractual' ? 'selected' : ''); ?>>
                                                    Contractual</option>
                                                <option value="Probationary"
                                                    <?php echo e(old('employmentStatus', $formData3['employmentStatus'] ?? '') == 'Probationary' ? 'selected' : ''); ?>>
                                                    Probationary</option>
                                                <option value="Part-Time"
                                                    <?php echo e(old('employmentStatus', $formData3['employmentStatus'] ?? '') == 'Parti-Time' ? 'selected' : ''); ?>>
                                                    Part-Time</option>
                                            </select>
                                            <?php $__errorArgs = ['employmentStatus'];
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
                                            <table id="skillTable"
                                                class="w-full border-collapse border border-gray-200">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="p-2 border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                            Skills</th>
                                                        <th
                                                            class="p-2 border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                            Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="skillTableBody">
                                                    <!-- Skills rows will be dynamically added here -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-4">
                                            <label for="hiddenInput"
                                                class="block text-sm font-medium text-black-700"><?php echo e(__('messages.workexperience.selected_skills')); ?></label>
                                            <textarea id="hiddenInput" name="hiddenInput"
                                                class="mt-1 block w-full px-3 py-2 border bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                readonly><?php echo e(old('hiddenInput', $formData3['hiddenInput'] ?? '')); ?></textarea>

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4 text-right">
                                    <a id="clearFormDataButton"
                                        class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">
                                        <?php echo e(__('messages.workexperience.clear_records')); ?>

                                    </a>
                                    <button type="submit "
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                        id="submitButton">
                                        <?php echo e(__('messages.workexperience.add_work_experience')); ?>

                                    </button>
                                </div>
                        </div>
                    </div>
                    </form>

                    <div class="mt-12">
                        <div class="container mx-auto">
                            <div class="flex justify-center">
                                <div class="w-full">
                                    <form action="<?php echo e(route('editemployment')); ?>" method="POST"
                                        enctype="multipart/form-data" onclick="clearLocalStorage()">
                                        <?php echo csrf_field(); ?>
                                        <script>
                                            function clearLocalStorage() {
                                                localStorage.removeItem('formData');
                                            }
                                        </script>
                                        <div
                                            class="container-wrapper bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                                            <div class="p-6">
                                                <h3 class="text-2xl font-bold mb-2">
                                                    <?php echo e(__('messages.workexperience.new_submitted_work_experience')); ?>

                                                </h3>
                                                <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                                    <div class="overflow-x-auto">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead
                                                                class="bg-gray-200 text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.actions')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.employer_name')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.employer_address')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.position_held')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.skills_gained')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.from')); ?>

                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.to')); ?> </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        <?php echo e(__('messages.workexperience.employment_status')); ?>

                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200"
                                                                id="submittedDataBody">
                                                                <!-- Data rows will be inserted here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>

                                                <input type="text" id="hiddenemployerName"
                                                    name="hiddenemployerName" value="" hidden>
                                                <input type="text" id="hiddenemployerAddress"
                                                    name="hiddenemployerAddress" value="" hidden>
                                                <input type="text" id="hiddenpositionHeld"
                                                    name="hiddenpositionHeld" value="" hidden>
                                                <input type="text" id="hiddenlistskills" name="hiddenlistskills"
                                                    value="" hidden>
                                                <input type="text" id="hiddenfromDate" name="hiddenfromDate"
                                                    value="" hidden>
                                                <input type="text" id="hiddentoDate" name="hiddentoDate"
                                                    value="" hidden>
                                                <input type="text" id="hiddenemploymentStatus"
                                                    name="hiddenemploymentStatus" value="" hidden>
                                                <div>
                                                    <div class="mt-4 text-right">
                                                        <a href="<?php echo e(route('profile.edit')); ?>"
                                                            class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Previous</a>
                                                        <button type="submit"
                                                            class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Overlay for modal -->
                    <div id="modalOverlay" class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-50 hidden">
                    </div>

                    <!-- Modal -->
                    <div id="validationModal"
                        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-200 dark:bg-gray-800 text-black dark:text-white shadow-lg rounded-lg p-8 z-50 hidden">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 id="formMessage" class="text-xl text-blue-500 font-bold mb-4">Form Submission Info
                                </h2>
                                <button id="modalCloseButton"
                                    class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 hover:text-gray-700 focus:outline-none"
                                    aria-label="Close">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="modalMessage"></p>
                            </div>
                            <div class="modal-footer mt-4 text-right">
                                <button id="modalClose"
                                    class="px-4 py-2 bg-gray-200 text-gray-800 dark:bg-red-700 dark:text-gray-200 rounded-md focus:outline-none">Close</button>
                            </div>
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
    function isValidInput(input, regex) {
        return regex.test(input);
    }
    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.getElementById('submitButton');
        const modalOverlay = document.getElementById('modalOverlay');
        const validationModal = document.getElementById('validationModal');
        const modalMessage = document.getElementById('modalMessage');
        const modalCloseButton = document.getElementById('modalCloseButton');
        const modalClose = document.getElementById('modalClose');

        submitButton.addEventListener('click', function(event) {

            event.preventDefault();

            // Retrieve existing data from localStorage or initialize an empty array
            let formDataArray = JSON.parse(localStorage.getItem('formData')) || [];

            // Get form data
            const employerName = document.getElementById('employerName').value;
            const employerAddress = document.getElementById('employerAddress').value;
            const positionHeld = document.getElementById('positionHeld').value;
            const skills = document.getElementById('hiddenInput').value;
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;
            const employmentStatus = document.getElementById('employmentStatus').value;
            const hiddenInput = document.getElementById('hiddenInput').value;

            const nameRegex = /^[a-zA-Z\s]+$/;
            const addressRegex = /^[a-zA-Z0-9\s,.-]+$/;
            const positionRegex = /^[a-zA-Z\s]+$/;

            // Simple validation: Check if required fields are filled out
            if (!employerName || !employerAddress || !positionHeld || !skills || !fromDate || !toDate ||
                !employmentStatus) {
                displayModal('Please fill out all required fields.');
                return;
            }

            if (!isValidInput(employerName, nameRegex)) {
                displayModal('Employer name can only contain letters and spaces.');
                return;
            }

            if (!isValidInput(employerAddress, addressRegex)) {
                displayModal('Employer address contains invalid characters.');
                return;
            }

            if (!isValidInput(positionHeld, positionRegex)) {
                displayModal('Position held can only contain letters and spaces.');
                return;
            }

            if (new Date(toDate) < new Date(fromDate)) {
                displayModal('To Date must be after or equal to From Date.');
                return;
            }
            // Create an object to hold the data
            const formData = {
                employerName: employerName,
                employerAddress: employerAddress,
                positionHeld: positionHeld,
                skillSearch: skills,
                fromDate: fromDate,
                toDate: toDate,
                employmentStatus: employmentStatus,
                hiddenInput: hiddenInput
            };

            formDataArray.push(formData);

            localStorage.setItem('formData', JSON.stringify(formDataArray));

            console.log('Form data saved to local storage:', formDataArray);



            document.getElementById('workExperienceForm').reset();
            displayModal('Form data saved successfully!');
            loadData();



        });

        function displayModal(message) {
            // Set modal message content
            modalMessage.textContent = message;

            // Show the modal and overlay
            modalOverlay.classList.remove('hidden');
            validationModal.classList.remove('hidden');

            // Close modal functionality
            modalCloseButton.addEventListener('click', closeModal);
            modalClose.addEventListener('click', closeModal);

            // Prevent focus from moving to modal button on Enter key press
            modalCloseButton.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        }

        function closeModal() {
            // Hide the modal and overlay
            modalOverlay.classList.add('hidden');
            validationModal.classList.add('hidden');

            // Remove event listeners to prevent memory leaks
            modalCloseButton.removeEventListener('click', closeModal);
            modalClose.removeEventListener('click', closeModal);
        }
    });

    const clearFormDataButton = document.getElementById('clearFormDataButton');

    clearFormDataButton.addEventListener('click', function() {
        localStorage.removeItem('formData');
        alert('Item "formData" has been cleared from local storage.');
        loadData();
        location.reload();
    });


    function loadData() {
        const formDataJSON = localStorage.getItem('formData');

        // Check if there's any data to display
        if (formDataJSON) {
            const formDataArray = JSON.parse(formDataJSON);

            const tableBody = document.getElementById('submittedDataBody');

            tableBody.innerHTML = '';

            let concatenatedEmployerName = [];
            let concatenatedEmployerAddress = [];
            let concatenatedPositionHeld = [];
            let concatenatedSkills = [];
            let concatenatedFromDate = [];
            let concatenatedToDate = [];
            let concatenatedEmploymentStatus = [];

            formDataArray.forEach(formData => {
                const row = document.createElement('tr');

                row.innerHTML = `
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200
">
                                        <button onclick="deleteRow(event, this)"
                                                class="bg-red-500 hover:bg-red-600 text-white font-regular py-2 px-4 rounded">
                                          <?php echo e(__('messages.workexperience.delete')); ?>

                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm font-medium text-gray-700 dark:text-gray-200">${formData.employerName}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.employerAddress}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.positionHeld}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.skillSearch}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.fromDate}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.toDate}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                        <div class="text-sm text-gray-700 dark:text-gray-200">${formData.employmentStatus}</div>
                                    </td>
                                `;



                // Append the row to the table body
                tableBody.appendChild(row);
                concatenatedEmployerName.push([formData.employerName]);
                concatenatedEmployerAddress.push([formData.employerAddress]);
                concatenatedPositionHeld.push([formData.positionHeld]);
                concatenatedSkills.push([formData.skillSearch]);
                concatenatedFromDate.push([formData.fromDate]);
                concatenatedToDate.push([formData.toDate]);
                concatenatedEmploymentStatus.push([formData.employmentStatus]);
            });

            document.getElementById('hiddenemployerName').value = JSON.stringify(concatenatedEmployerName);
            document.getElementById('hiddenemployerAddress').value = JSON.stringify(concatenatedEmployerAddress);
            document.getElementById('hiddenpositionHeld').value = JSON.stringify(concatenatedPositionHeld);
            document.getElementById('hiddenlistskills').value = JSON.stringify(concatenatedSkills);
            document.getElementById('hiddenfromDate').value = JSON.stringify(concatenatedFromDate);
            document.getElementById('hiddentoDate').value = JSON.stringify(concatenatedToDate);
            document.getElementById('hiddenemploymentStatus').value = JSON.stringify(concatenatedEmploymentStatus);
        } else {
            // Handle case where no data is found (optional)
            console.log('No form data found in local storage.');
        }

    }

    window.onload = loadData;

    function deleteRow(event, button) {
        event.preventDefault();

        const row = button.closest('tr');
        const rowIndex = row.rowIndex - 1; // Adjust for header row

        // Remove row from the table
        row.remove();

        // Remove corresponding data from local storage
        let data = JSON.parse(localStorage.getItem('formData')) || [];
        data.splice(rowIndex, 1); // Remove 1 element at rowIndex
        localStorage.setItem('formData', JSON.stringify(data));
        location.reload()

    }
</script>

</div>
</div>
</div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        let allSkills = []; // Store all skills

        fetch("/userskills/listofskills.txt")
            .then((response) => response.text())
            .then((data) => {
                console.log("Fetched data:", data);
                allSkills = data
                    .split("\n")
                    .map((skill) => skill.trim().replace(/,/g, ''))
                    .filter((skill) => skill !== "");
                console.log("All skills:", allSkills);
            })
            .catch((error) => console.error("Error fetching skills:", error));

        const skillSuggestions = document.getElementById("skillSuggestions");
        const skillSearchInput = document.getElementById("skillSearch");

        skillSearchInput.addEventListener("input", function() {
            const keyword = this.value.trim().toLowerCase();
            const matchingSkills = allSkills.filter(skill =>
                skill.toLowerCase().includes(keyword) && skill.toLowerCase() !==
                keyword // Exclude the currently typed skill
            );

            // Clear previous suggestions
            skillSuggestions.innerHTML = '';

            // Add matching suggestions to the div
            matchingSkills.slice(0, 9).forEach((skill) => {
                const suggestionItem = document.createElement("div");
                suggestionItem.textContent = skill;
                suggestionItem.classList.add("p-2", "bg-gray-200", "text-gray-900",
                    "dark:bg-gray-900", "dark:text-gray-200", "rounded", "cursor-pointer",
                    "hover:bg-blue-300");
                suggestionItem.addEventListener("click", function() {
                    skillSearchInput.value =
                        skill; // Set the input value to the clicked skill
                });
                skillSuggestions.appendChild(suggestionItem);
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var skillSearch = document.getElementById('skillSearch');
        var skillTableBody = document.getElementById('skillTableBody');
        var hiddenInput = document.getElementById('hiddenInput');

        skillSearch.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var skills = skillSearch.value.split(',').map(function(skill) {
                    return skill.trim();
                });

                // Clear the input field
                skillSearch.value = '';

                // Add each skill as a new row in the table
                skills.forEach(function(skill) {
                    if (skill && !isSkillDuplicate(skill)) {
                        var row = skillTableBody.insertRow();
                        var cell = row.insertCell();
                        cell.textContent = skill;
                        var actionCell = row.insertCell();
                        var
                            removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                            'rounded');
                        removeButton.addEventListener('click', function() {
                            skillTableBody.deleteRow(row.rowIndex -
                                1);
                            updateHiddenInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else if (isSkillDuplicate(skill)) { //
                        alert('Skill "' + skill + '" is already added.');
                    }
                }); // Update hidden
                updateHiddenInput();
            }
        }); // Function to check if a skill already

        function isSkillDuplicate(skill) {
            var rows = skillTableBody.rows;
            for (var i = 0; i <
                rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === skill.toLowerCase()) {
                    return true;
                }
            }
            return false;
        } // Function to update

        function updateHiddenInput() {
            var
                skills = Array.from(skillTableBody.rows).map(function(row) {
                    return row.cells[0].textContent.trim();
                }).join(', ');
            hiddenInput.value = skills;
        }
    });
</script>

<style>
    .remove-button {
        background-color: #f44336;
        /* Red */
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
        margin-left: 10px;
        /* Adjust as needed */
    }


    .remove-button:hover {
        background-color: #d32f2f;
    }



    #skillSuggestions {
        margin-bottom: px;
        /* Add bottom margin to create space */
    }
</style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/profile/editemployment.blade.php ENDPATH**/ ?>