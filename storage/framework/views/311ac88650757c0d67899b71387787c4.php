     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
         <link rel="stylesheet" href="/css/steps.css">

     </head>
     <div class="py-12">
         <div class="container mx-auto">
             <div class="flex justify-center">
                 <div class="w-full">
                     <form action="<?php echo e(route('dialect')); ?>" method="POST" enctype="multipart/form-data">
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
                                     Language and Other Skills
                                     <?php
                                         $currentStep = 5; // Set this dynamically based on your current step
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
                                                 <i tabindex="0"
                                                     class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"></i>
                                                 <a href="<?php echo e(route('jobpreferences')); ?>"
                                                     class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Job
                                                     Preferences</a>
                                                 <span class="mx-2 text-gray-500">/</span>
                                             </li>
                                             <li class="flex items-center">
                                                 <span
                                                     class="text-blue-500 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                     tabindex="0">Language Proficiency and
                                                     Other Skills</span>
                                             </li>
                                         </ol>
                                     </nav>
                                 </div>
                                 <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                 <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                     tabindex="0" aria-label="<?php echo __('messages.language.instruction'); ?>">
                                     <span class="text-md font-regular">
                                         <?php echo __('messages.language.instruction'); ?>

                                     </span>
                                 </div>

                                 <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                     <div class="col-span-1 md:col-span-1">
                                         <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     </div>
                                     <div class="col-span-1 md:col-span-2">

                                         <table id="language-table"
                                             class="min-w-full mt-6 divide-y divide-gray-200 dark:divide-gray-700">
                                             <thead>
                                                 <tr>
                                                     <th
                                                         class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200">
                                                         <?php echo e(__('messages.language.table_headers.language_dialect')); ?>

                                                     </th>
                                                     <th
                                                         class="px-4 py-2 text-center border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200">
                                                         <?php echo e(__('messages.language.table_headers.language_proficiency')); ?>

                                                         <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                                     </th>
                                                 </tr>
                                             </thead>
                                             <tbody id="language-table-body">
                                                 <?php
                                                     $languages = ['English', 'Filipino'];
                                                 ?>

                                                 <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <tr>
                                                         <td class="px-4 py-2 border-b">
                                                             <div class="flex items-center">
                                                                 <input type="text" name="language-input[]"
                                                                     class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm language-input"
                                                                     value="<?php echo e($language); ?>" readonly />
                                                             </div>
                                                         </td>
                                                         <td class="px-4 py-2 border-b text-right">
                                                             <div class="flex items-center">
                                                                 <?php $__currentLoopData = ['Read', 'Write', 'Speak', 'Understand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                     <label class="inline-flex items-center mr-4">
                                                                         <input type="checkbox"
                                                                             name="proficiency[<?php echo e($index); ?>][]"
                                                                             value="<?php echo e($skill); ?>"
                                                                             class="form-checkbox text-blue-500 focus:ring-orange-400 dark:focus:ring-orange-400"
                                                                             <?php echo e(isset($formData5['proficiency'][$index]) && in_array($skill, $formData5['proficiency'][$index]) ? 'checked' : ''); ?> />
                                                                         <span
                                                                             class="ml-2 text-gray-700 dark:text-gray-200">Can
                                                                             <?php echo e($skill); ?>?</span>
                                                                     </label>
                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                             </div>
                                                         </td>
                                                     </tr>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                         </table>

                                         
                                         <br>
                                         

                                         <h3 class="text-2xl font-bold mb-2 mt-9 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                             aria-label="                                             <?php echo e(__('messages.language.messages.other_skills_heading')); ?>"
                                             tabindex="0">
                                             <?php echo e(__('messages.language.messages.other_skills_heading')); ?>

                                         </h3>
                                         <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                             tabindex="0"
                                             aria-label=" <?php echo e(__('messages.language.messages.other_skills_description')); ?>">
                                             <?php echo e(__('messages.language.messages.other_skills_description')); ?>

                                             </span>
                                         </div>

                                         <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                                             <div>
                                                 <div class="mt-6">
                                                     <label for="autoMechanic" class="flex items-center">
                                                         <input type="checkbox" id="autoMechanic" name="skills[]"
                                                             value="AUTO MECHANIC" class="mr-2"
                                                             aria-label="Auto Mechanic"
                                                             <?php echo e(in_array('AUTO MECHANIC', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Auto Mechanic
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="gardening" class="flex items-center">
                                                         <input type="checkbox" id="gardening" name="skills[]"
                                                             value="GARDENING" class="mr-2" aria-label="Gardening"
                                                             <?php echo e(in_array('GARDENING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Gardening
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="beautician" class="flex items-center">
                                                         <input type="checkbox" id="beautician" name="skills[]"
                                                             value="BEAUTICIAN" class="mr-2"
                                                             aria-label="Beautician"
                                                             <?php echo e(in_array('BEAUTICIAN', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Beautician
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="carpentry" class="flex items-center">
                                                         <input type="checkbox" id="carpentry" name="skills[]"
                                                             value="CARPENTRY WORK" class="mr-2"
                                                             aria-label="Carpentry Work"
                                                             <?php echo e(in_array('CARPENTRY WORK', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Carpentry Work
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="painter" class="flex items-center">
                                                         <input type="checkbox" id="painter" name="skills[]"
                                                             value="PAINTER/ARTIST" class="mr-2"
                                                             aria-label="Painter or Artist"
                                                             <?php echo e(in_array('PAINTER/ARTIST', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Painter/Artist
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="computerLiteracy" class="flex items-center">
                                                         <input type="checkbox" id="computerLiteracy" name="skills[]"
                                                             value="COMPUTER LITERATE" class="mr-2"
                                                             aria-label="Computer Literate"
                                                             <?php echo e(in_array('COMPUTER LITERATE', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Computer Literate
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="paintingJobs" class="flex items-center">
                                                         <input type="checkbox" id="paintingJobs" name="skills[]"
                                                             value="PAINTING JOBS" class="mr-2"
                                                             aria-label="Painting Jobs"
                                                             <?php echo e(in_array('PAINTING JOBS', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Painting Jobs
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="domesticChores" class="flex items-center">
                                                         <input type="checkbox" id="domesticChores" name="skills[]"
                                                             value="DOMESTIC CHORES" class="mr-2"
                                                             aria-label="Domestic Chores"
                                                             <?php echo e(in_array('DOMESTIC CHORES', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Domestic Chores
                                                     </label>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="mt-6">
                                                     <label for="photography" class="flex items-center">
                                                         <input type="checkbox" id="photography" name="skills[]"
                                                             value="PHOTOGRAPHY" class="mr-2"
                                                             aria-label="Photography"
                                                             <?php echo e(in_array('PHOTOGRAPHY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Photography
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="driving" class="flex items-center">
                                                         <input type="checkbox" id="driving" name="skills[]"
                                                             value="DRIVING" class="mr-2" aria-label="Driving"
                                                             <?php echo e(in_array('DRIVING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Driving
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="sewingDresses" class="flex items-center">
                                                         <input type="checkbox" id="sewingDresses" name="skills[]"
                                                             value="SEWING DRESSES" class="mr-2"
                                                             aria-label="Sewing Dresses"
                                                             <?php echo e(in_array('SEWING DRESSES', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Sewing Dresses
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="electrician" class="flex items-center">
                                                         <input type="checkbox" id="electrician" name="skills[]"
                                                             value="ELECTRICIAN" class="mr-2"
                                                             aria-label="Electrician"
                                                             <?php echo e(in_array('ELECTRICIAN', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Electrician
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="stenography" class="flex items-center">
                                                         <input type="checkbox" id="stenography" name="skills[]"
                                                             value="STENOGRAPHY" class="mr-2"
                                                             aria-label="Stenography"
                                                             <?php echo e(in_array('STENOGRAPHY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Stenography
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="embroidery" class="flex items-center">
                                                         <input type="checkbox" id="embroidery" name="skills[]"
                                                             value="EMBROIDERY" class="mr-2"
                                                             aria-label="Embroidery"
                                                             <?php echo e(in_array('EMBROIDERY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Embroidery
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="tailoring" class="flex items-center">
                                                         <input type="checkbox" id="tailoring" name="skills[]"
                                                             value="TAILORING" class="mr-2" aria-label="Tailoring"
                                                             <?php echo e(in_array('TAILORING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Tailoring
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="masonry" class="flex items-center">
                                                         <input type="checkbox" id="masonry" name="skills[]"
                                                             value="MASONRY" class="mr-2" aria-label="Masonry"
                                                             <?php echo e(in_array('MASONRY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>>
                                                         Masonry
                                                     </label>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="mt-6">
                                                     <label for="otherSkills" class="flex items-center">
                                                         <input type="checkbox" id="otherSkillsCheckbox"
                                                             name="skills[]" value="OTHER_SKILLS" class="mr-2"
                                                             aria-label="Other"
                                                             <?php echo e(in_array('OTHER_SKILLS', old('skills', $formData5['skills'] ?? [])) ? 'checked' : ''); ?>

                                                             onchange="toggleTextBox()">
                                                         Other:
                                                     </label>
                                                     <br>
                                                 </div>
                                                 <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                     <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                 <textarea type="text" id="otherSkills" name="otherSkills" tabindex="0" aria-label="Others textarea"
                                                     class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                     <?php echo e(in_array('OTHER_SKILLS', old('skills', $formData8['skills'] ?? [])) ? '' : 'disabled'); ?>><?php echo e(old('otherSkills', $formData8['otherSkills'] ?? '')); ?></textarea>
                                                 <br>
                                                 <input type="hidden" id="selectedSkills" name="selectedSkills"
                                                     value="">
                                                 <input type="hidden" id="otherSkillsInput" name="otherSkillsInput"
                                                     value="">
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="mt-4 text-right">
                                     <a href="<?php echo e(route('jobpreferences')); ?>"
                                         aria-label=" <?php echo e(__('messages.previous')); ?>"
                                         class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                                         <?php echo e(__('messages.previous')); ?></a>
                                     <button type="submit" aria-label=" <?php echo e(__('messages.save')); ?>"
                                         class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                         <?php echo e(__('messages.save')); ?></button>
                                 </div>
                             </div>

                         </div>
                 </div>
                 <script>
                     document.addEventListener('DOMContentLoaded', function() {
                         const addRowButton = document.querySelector('.add-row');
                         const tableBody = document.getElementById('language-table-body');
                         const rowLimitMessage = document.getElementById('row-limit-message');


                         addRowButton.addEventListener('click', function() {
                             const rowCount = tableBody.getElementsByTagName('tr').length;
                             if (rowCount >= 5) {
                                 rowLimitMessage.classList.remove('hidden');
                                 return;
                             }
                             rowLimitMessage.classList.add('hidden');

                             const newRow = document.createElement('tr');
                             newRow.innerHTML = `
                                            <td class="px-4 py-2 border-b">
                                                <input type="text" name="language-input[]" class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 language-input" pattern="[A-Za-z\s]+" placeholder="Ex. Filipino" title="Please enter alphabetic characters only" readonly    />
                                                <div class="suggestions-container">
                                                    <ul class="suggestions-list"></ul>
                                                </div>
                                            </td>
                            
                                                     <td class="px-4 py-2 border-b text-center">
                                                         <div class="inline-block relative">
                                                             <select
                                                                 class="block appearance-none w-full bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border border-gray rounded-md py-2 px-10 leading-tight focus:outline-none focus:border-blue-500"
                                                                 id="langprof">
                                                                 <option value="Beginner">Beginner</option>
                                                                 <option value="Intermediate">Intermediate</option>
                                                                 <option value="Advanced">Advanced</option>
                                                                 <option value="Fluent">Fluent</option>
                                                                 <option value="Native">Native</option>
                                                             </select>

                                                         </div>
                                                     </td>
                                            <td class="px-4 py-2 border-b text-center">
                                                <button type="button" class="bg-blue-500 text-white px-7 py-1 rounded edit-row">Edit</button>
                                                <button type="button" class="bg-red-500 text-white px-2 py-1 rounded remove-row">Remove</button>
                                            </td>
                                        `;
                             tableBody.appendChild(newRow);

                             // Attach suggestions logic to the new input
                             const newInput = newRow.querySelector('.language-input');
                             const suggestionsContainer = newRow.querySelector('.suggestions-list');
                             const proficiencySelect = newRow.querySelector('#langprof');

                             attachSuggestionsLogic(newInput, suggestionsContainer, proficiencySelect);
                         });



                         tableBody.addEventListener('click', function(event) {
                             if (event.target.classList.contains('remove-row')) {
                                 const row = event.target.closest('tr');
                                 tableBody.removeChild(row);
                                 rowLimitMessage.classList.add('hidden');
                             } else if (event.target.classList.contains('edit-row')) {
                                 const row = event.target.closest('tr');
                                 const inputs = row.querySelectorAll('input');
                                 inputs.forEach(input => {
                                     input.readOnly = !input.readOnly;
                                 });

                                 // Hide the 'Edit' button after clicking
                                 event.target.style.display = 'none';
                             }
                         });


                         const initialInput = document.querySelector('.language-input');
                         const initialSuggestionsContainer = document.querySelector('.suggestions-list');
                         const proficiencySelect = document.querySelector('#langprof');

                         attachSuggestionsLogic(initialInput, initialSuggestionsContainer, proficiencySelect);

                         function attachSuggestionsLogic(inputElement, suggestionsContainer, proficiencySelect) {
                             // Fetch languages from the JSON file
                             const selectedLanguagesContainer = document.getElementById('selected-languages');

                             // Load previously saved languages from local storage on page load


                             fetch('/languages/lang.json')
                                 .then(response => response.json())
                                 .then(data => {
                                     const languages = Object.values(
                                         data); // Extract values (language names) from the object
                                     inputElement.addEventListener('input', function() {
                                         const query = inputElement.value.toLowerCase();
                                         suggestionsContainer.innerHTML = '';
                                         if (query) {
                                             const filteredLanguages = languages.filter(language => language
                                                 .toLowerCase().includes(query)).slice(0, 5);
                                             filteredLanguages.forEach(language => {
                                                 const listItem = document.createElement('li');
                                                 listItem.textContent = language + ' - ' +
                                                     proficiencySelect.value;

                                                 listItem.classList.add('suggestion-item', 'p-2',
                                                     'cursor-pointer', 'flex',
                                                     'justify-between');


                                                 const selectedLanguagesContainer = document
                                                     .getElementById('selected-languages');
                                                 const currentLanguages =
                                                     selectedLanguagesContainer.value.trim();


                                                 //DITO

                                                 // Split current languages into an array based on commas and trim whitespace
                                                 const selectedLanguages = currentLanguages
                                                     .split(',').map(lang => lang.trim());

                                                 // Check if adding another language would exceed the limit of 5
                                                 if (selectedLanguages.length >= 5) {
                                                     alert(
                                                         'You can only select up to 5 languages.'
                                                     );
                                                     // Optionally, remove the row from the table
                                                     const row = listItem.closest('tr');
                                                     row.remove();

                                                     return;
                                                 }
                                                 // Create plus button for each suggestion
                                                 const plusButton = document.createElement('button');
                                                 plusButton.textContent = '+';
                                                 plusButton.classList.add('plus-button', 'ml-2',
                                                     'bg-green-500', 'text-white', 'px-2', 'py-1',
                                                     'rounded');
                                                 plusButton.addEventListener('click', function() {

                                                     inputElement.value = language + ' - ' +
                                                         proficiencySelect.value;
                                                     hiddenlang
                                                     suggestionsContainer.innerHTML =
                                                         ''; // Clear suggestions after selecting
                                                 });

                                                 listItem.appendChild(plusButton);

                                                 proficiencySelect.addEventListener('change', function() {
                                                     if (inputElement && inputElement
                                                         .value
                                                     ) { // Check if inputElement is not null and has a value
                                                         const currentLanguage = inputElement.value
                                                             .split(' - ')[
                                                                 0
                                                             ]; // Get the current selected language
                                                         const selectedProficiency =
                                                             proficiencySelect
                                                             .value; // Get the newly selected proficiency
                                                         inputElement.value = currentLanguage +
                                                             ' - ' +
                                                             selectedProficiency; // Update input value
                                                     }
                                                 });



                                                 // Handle click on the suggestion item itself
                                                 listItem.addEventListener('click', function() {

                                                     if (selectedLanguagesContainer.value
                                                         .includes(
                                                             language.trim())) {
                                                         alert(
                                                             'This language is already selected.'
                                                         );
                                                         const row = listItem.closest('tr');
                                                         row.remove();
                                                         return;

                                                     }
                                                     let currentLanguages =
                                                         selectedLanguagesContainer.value
                                                         .trim(); // Trim any leading/trailing whitespace

                                                     if (currentLanguages !== '') {
                                                         currentLanguages +=
                                                             ', '; // Add comma separator if there are existing languages
                                                     }


                                                     currentLanguages += language.trim() + ' - ' +
                                                         proficiencySelect
                                                         .value; // Append the new language with proficiency

                                                     inputElement.value = language.trim() + ' - ' +
                                                         proficiencySelect
                                                         .value;


                                                     selectedLanguagesContainer.value =
                                                         currentLanguages; // Set the updated value

                                                     inputElement.readOnly = true;
                                                     suggestionsContainer.innerHTML =
                                                         ''; // Clear suggestions after selecting
                                                     proficiencySelect.disabled = true;

                                                 });

                                                 // Append the suggestion item to the suggestions container
                                                 suggestionsContainer.appendChild(listItem);
                                             });
                                         }
                                     });
                                 })
                                 .catch(error => console.error('Error fetching languages:', error));


                             tableBody.addEventListener('click', function(event) {
                                 event.preventDefault()
                                 if (event.target.classList.contains('remove-row')) {
                                     const row = event.target.closest('tr');
                                     const languageInput = row.querySelector('.language-input');
                                     const languageToRemove = languageInput.value.trim();

                                     // Remove the corresponding language from selectedLanguagesContainer
                                     let currentLanguages = selectedLanguagesContainer.value.split(',').map(lang => lang
                                         .trim());
                                     const indexToRemove = currentLanguages.indexOf(languageToRemove);
                                     if (indexToRemove !== -1) {
                                         currentLanguages.splice(indexToRemove, 1); // Remove the language
                                         selectedLanguagesContainer.value = currentLanguages.join(
                                             ', '); // Update selectedLanguagesContainer
                                     }

                                     row.remove();
                                 }



                                 document.addEventListener('DOMContentLoaded', function() {
                                     const form = document.querySelector('form'); // Select the form element

                                     // Function to save form data to local storage
                                     function saveFormData() {
                                         const formData = new FormData(form); // Get all form data
                                         const formDataObject = {};
                                         for (const [key, value] of formData.entries()) {
                                             formDataObject[key] = value; // Convert FormData to plain object
                                         }
                                         localStorage.setItem('formData', JSON.stringify(
                                             formDataObject)); // Save to local storage
                                     }

                                     // Save form data when the form is submitted
                                     form.addEventListener('submit', function(event) {
                                         saveFormData();
                                     });

                                     // Load form data from local storage on page load
                                     function loadFormData() {
                                         const savedFormData = localStorage.getItem('formData');
                                         if (savedFormData) {
                                             const formDataObject = JSON.parse(savedFormData);
                                             for (const key in formDataObject) {
                                                 if (Object.hasOwnProperty.call(formDataObject, key)) {
                                                     const element = form.querySelector(`[name="${key}"]`);
                                                     if (element) {
                                                         element.value = formDataObject[
                                                             key]; // Set input values from local storage
                                                     }
                                                 }
                                             }
                                         }
                                     }

                                     loadFormData(); // Load saved form data when the page loads
                                 });
                             });
                         }
                     });

                     //SKILLS
                     function toggleTextBox() {
                         var checkbox = document.getElementById("otherSkillsCheckbox");
                         var textBox = document.getElementById("otherSkills");

                         if (checkbox.checked) {
                             // Enable the text box
                             textBox.disabled = false;
                         } else {
                             // Clear and disable the text box
                             textBox.value = "";
                             textBox.disabled = true;
                         }
                     }

                     document.addEventListener("DOMContentLoaded", function() {
                         const currentYear = new Date().getFullYear();
                         document.getElementById("yearGraduated").placeholder = currentYear;
                     });

                     function updateHiddenInputs() {
                         // Get all checked checkboxes
                         let selectedSkills = [];
                         let otherSkills = "";
                         document.querySelectorAll('input[name="skills[]"]:checked').forEach(function(checkbox) {
                             if (checkbox.value !== "OTHER_SKILLS") {
                                 selectedSkills.push(checkbox.value);
                             }
                         });

                         // Check if "Other Skills" checkbox is checked
                         if (document.getElementById('otherSkillsCheckbox').checked) {
                             otherSkills = document.getElementById('otherSkills').value;
                         }

                         // Update hidden inputs with selected skills and other skills
                         document.getElementById('selectedSkills').value = JSON.stringify(selectedSkills);
                         document.getElementById('otherSkillsInput').value = otherSkills;
                     }

                     // Call updateHiddenInputs when checkboxes are changed
                     document.querySelectorAll('input[name="skills[]"]').forEach(function(checkbox) {
                         checkbox.addEventListener('change', updateHiddenInputs);
                     });

                     // Call updateHiddenInputs when "Other Skills" textarea changes
                     document.getElementById('otherSkills').addEventListener('input', updateHiddenInputs);

                     // Call updateHiddenInputs on page load to initialize hidden inputs
                     window.addEventListener('load', updateHiddenInputs);
                 </script>
             </div>
             </form>
         </div>
     </div>
     </div>
     </div>

     </html>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/steps/step5.blade.php ENDPATH**/ ?>