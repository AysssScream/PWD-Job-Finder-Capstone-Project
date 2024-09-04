<h2 class="text-2xl font-bold mb-2" aria-label="Language Profieciency">LANGUAGE PROFICIENCY</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="<?php echo e(route('profile.update.language-info')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div>
        <p class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0"
            aria-label="<?php echo e(__('messages.language.updatelang')); ?>">
            <strong><?php echo e(__('messages.language.updatelang')); ?></strong>
        </p>
        <ul class="list-unstyled">

            <li aria-label="<?php echo e(__('messages.language.list-unstyled.2')); ?>"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                tabindex="0">
                <i class="bi bi-arrow-right-short"></i>• <?php echo e(__('messages.language.list-unstyled.1')); ?>

            </li>
            <li aria-label="<?php echo e(__('messages.language.list-unstyled.3')); ?>" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• <?php echo e(__('messages.language.list-unstyled.2')); ?>

            </li>
            <li aria-label="<?php echo e(__('messages.language.list-unstyled.4')); ?>" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• <?php echo e(__('messages.language.list-unstyled.3')); ?>

            </li>
            <li aria-label="<?php echo e(__('messages.language.list-unstyled.5')); ?>" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• <?php echo e(__('messages.language.list-unstyled.4')); ?>

            </li>
        </ul>
    </div>
    <div class="overflow-x-auto p-2">
        <table class="min-w-full border border-gray-200" id="languages-table">
            <thead>
                <tr>
                    <br>
                    
                </tr>
            </thead>


            <table id="language-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200"
                            aria-label="<?php echo e(__('messages.language.table_headers.language_dialect')); ?>">
                            <?php echo e(__('messages.language.table_headers.language_dialect')); ?>

                        </th>
                        <th class="px-4 py-2 text-center border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200"
                            aria-label="<?php echo e(__('messages.language.table_headers.language_proficiency')); ?>">
                            <?php echo e(__('messages.language.table_headers.language_proficiency')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody id="language-table-body">
                    <!-- Filipino Row -->
                    <?php $__currentLoopData = ['Filipino', 'English']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $languageData = $user->languageInputs->where('language_input', $language)->first();
                            $selectedProficiencies = json_decode($languageData->proficiencies ?? '[]', true);
                        ?>
                        <tr>
                            <td class="px-4 py-2 border-b">
                                <div class="flex items-center">
                                    <input type="text" name="language-input[]"
                                        class="w-1/2 p-2 border-1 border-black text-center dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm language-input"
                                        pattern="[A-Za-z\s]+" placeholder="Ex. <?php echo e($language); ?>"
                                        aria-label="Language or Dialect" value="<?php echo e($language); ?>" readonly />
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b text-right">
                                <div class="flex items-center">
                                    <?php $__currentLoopData = ['Read', 'Write', 'Speak', 'Understand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proficiency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="inline-flex items-center mr-4">
                                            <input type="checkbox" name="proficiency-<?php echo e($language); ?>[]"
                                                value="<?php echo e($proficiency); ?>"
                                                class="form-checkbox text-blue-500 focus:ring-orange-400 dark:focus:ring-orange-400"
                                                <?php if(in_array($proficiency, $selectedProficiencies)): ?> checked <?php endif; ?> />
                                            <span class="ml-2 text-gray-700 dark:text-gray-200 text-left">Can
                                                <?php echo e($proficiency); ?>?</span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>


            
        </table>
    </div>
    <br>
    

    <div class="mb-4">
        <!-- Label and Input field for userSkills -->
        <label for="userSkills" class="block text-md font-medium  text-black dark:text-gray-200">Saved
            Skills:</label>
        <textarea id="userSkills" name="userSkills"
            aria-label="The saved skills are <?php echo e(old('userSkills', isset($skill->skills) ? implode(', ', json_decode($skill->skills, true)) : '')); ?>"
            class="mt-1 mb-3 rounded-lg appearance-none block w-full bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            readonly><?php echo e(old('userSkills', isset($skill->skills) ? implode(', ', json_decode($skill->skills, true)) : '')); ?></textarea>


    </div>
    <label for="selectedSkills" class="block text-md font-medium text-black dark:text-gray-200 mt-6">Selected
        Skills:</label>
    <textarea id="selectedSkills" name="selectedSkills" hidden
        class="mt-6 appearance-none block w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        readonly><?php echo e(old('selectedSkills', isset($formData5['skills']) ? $formData5['skills'] : '')); ?></textarea>
    <div class="mt-2 grid grid-cols-2 md:grid-cols-2 gap-4">
        <?php
            $selectedSkills = json_decode($skill->skills ?? '[]', true);
        ?>
        <div>
            <div class="mt-6">
                <label for="autoMechanic" class="flex items-center">
                    <input type="checkbox" id="autoMechanic" name="skills[]" value="AUTO MECHANIC" class="mr-2"
                        <?php echo e(in_array('AUTO MECHANIC', $selectedSkills) ? 'checked' : ''); ?>>
                    <span class="ml-2">Auto Mechanic</span>
                </label>
            </div>
            <div class="mt-6">
                <label for="gardening" class="flex items-center">
                    <input type="checkbox" id="gardening" name="skills[]" value="GARDENING" class="mr-2"
                        <?php echo e(in_array('GARDENING', $selectedSkills) ? 'checked' : ''); ?>>
                    Gardening
                </label>
            </div>
            <div class="mt-6">
                <label for="beautician" class="flex items-center">
                    <input type="checkbox" id="beautician" name="skills[]" value="BEAUTICIAN" class="mr-2"
                        <?php echo e(in_array('BEAUTICIAN', $selectedSkills) ? 'checked' : ''); ?>>
                    Beautician
                </label>
            </div>

            <div class="mt-6">
                <label for="carpentry" class="flex items-center">
                    <input type="checkbox" id="carpentry" name="skills[]" value="CARPENTRY WORK" class="mr-2"
                        <?php echo e(in_array('CARPENTRY WORK', $selectedSkills) ? 'checked' : ''); ?>>
                    Carpentry Work
                </label>
            </div>

            <div class="mt-6">
                <label for="painter" class="flex items-center">
                    <input type="checkbox" id="painter" name="skills[]" value="PAINTER/ARTIST" class="mr-2"
                        <?php echo e(in_array('PAINTER/ARTIST', $selectedSkills) ? 'checked' : ''); ?>>
                    Painter/Artist
                </label>
            </div>

            <div class="mt-6">
                <label for="computerLiteracy" class="flex items-center">
                    <input type="checkbox" id="computerLiteracy" name="skills[]" value="COMPUTER LITERATE"
                        class="mr-2" <?php echo e(in_array('COMPUTER LITERATE', $selectedSkills) ? 'checked' : ''); ?>>
                    Computer Literate
                </label>
            </div>

            <div class="mt-6">
                <label for="paintingJobs" class="flex items-center">
                    <input type="checkbox" id="paintingJobs" name="skills[]" value="PAINTING JOBS" class="mr-2"
                        <?php echo e(in_array('PAINTING JOBS', $selectedSkills) ? 'checked' : ''); ?>>
                    Painting Jobs
                </label>
            </div>

            <div class="mt-6">
                <label for="domesticChores" class="flex items-center">
                    <input type="checkbox" id="domesticChores" name="skills[]" value="DOMESTIC CHORES"
                        class="mr-2" <?php echo e(in_array('DOMESTIC CHORES', $selectedSkills) ? 'checked' : ''); ?>>
                    Domestic Chores
                </label>
            </div>
        </div>
        <div>
            <div class="mt-6">
                <label for="photography" class="flex items-center">
                    <input type="checkbox" id="photography" name="skills[]" value="PHOTOGRAPHY" class="mr-2"
                        <?php echo e(in_array('PHOTOGRAPHY', $selectedSkills) ? 'checked' : ''); ?>>
                    Photography
                </label>
            </div>

            <div class="mt-6">
                <label for="driving" class="flex items-center">
                    <input type="checkbox" id="driving" name="skills[]" value="DRIVING" class="mr-2"
                        <?php echo e(in_array('DRIVING', $selectedSkills) ? 'checked' : ''); ?>>
                    Driving
                </label>
            </div>
            <div class="mt-6">
                <label for="sewingDresses" class="flex items-center">
                    <input type="checkbox" id="sewingDresses" name="skills[]" value="SEWING DRESSES" class="mr-2"
                        <?php echo e(in_array('SEWING DRESSES', $selectedSkills) ? 'checked' : ''); ?>>
                    Sewing Dresses
                </label>
            </div>

            <div class="mt-6">
                <label for="electrician" class="flex items-center">
                    <input type="checkbox" id="electrician" name="skills[]" value="ELECTRICIAN" class="mr-2"
                        <?php echo e(in_array('ELECTRICIAN', $selectedSkills) ? 'checked' : ''); ?>>
                    Electrician
                </label>
            </div>

            <div class="mt-6">
                <label for="stenography" class="flex items-center">
                    <input type="checkbox" id="stenography" name="skills[]" value="STENOGRAPHY" class="mr-2"
                        <?php echo e(in_array('STENOGRAPHY', $selectedSkills) ? 'checked' : ''); ?>>
                    Stenography
                </label>
            </div>

            <div class="mt-6">
                <label for="embroidery" class="flex items-center">
                    <input type="checkbox" id="embroidery" name="skills[]" value="EMBROIDERY" class="mr-2"
                        <?php echo e(in_array('EMBROIDERY', $selectedSkills) ? 'checked' : ''); ?>>
                    Embroidery
                </label>
            </div>
            <div class="mt-6">
                <label for="tailoring" class="flex items-center">
                    <input type="checkbox" id="tailoring" name="skills[]" value="TAILORING" class="mr-2"
                        <?php echo e(in_array('TAILORING', $selectedSkills) ? 'checked' : ''); ?>>
                    Tailoring
                </label>
            </div>

            <div class="mt-6">
                <label for="masonry" class="flex items-center">
                    <input type="checkbox" id="masonry" name="skills[]" value="MASONRY" class="mr-2"
                        <?php echo e(in_array('MASONRY', $selectedSkills) ? 'checked' : ''); ?>>
                    Masonry
                </label>
            </div>
            <div class="mt-6">
                <label for="otherSkills" class="flex items-center">
                    <input type="checkbox" id="otherSkillsCheckbox" name="skills[]" value="OTHER" class="mr-2"
                        <?php echo e(in_array('OTHER', $selectedSkills) ? 'checked' : ''); ?> onchange="toggleTextBox()">
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
            <textarea id="otherSkills" name="otherSkills"
                class="w-full p-2 border rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200"
                <?php echo e(old('otherSkills', $skill->otherSkills ?? '') == 'OTHER_SKILLS' ? '' : 'disabled'); ?>><?php echo e(old('otherSkills', $skill->otherSkills ?? '')); ?></textarea>
            <br>
            <input type="text" id="otherSkillsInput" name="otherSkillsInput"
                value="<?php echo e(old('otherSkillsInput', $skill->otherSkills ?? '')); ?>" hidden>
        </div>
    </div>

    <div class="flex items-center gap-4 ">
        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['ariaLabel' => 'Save Changes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-label' => 'Save Changes']); ?><?php echo e(__('Save Changes')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

        <?php if(session('status') === 'profile-updated'): ?>
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-md font-semibold text-green-400 dark:text-gray-400">
                <?php echo e(__('Saved.')); ?>

            </p>
        <?php endif; ?>
    </div>
</form>





<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const addRowButton = document.querySelector('.add-row');
    //     const tableBody = document.getElementById('language-table-body');
    //     const rowLimitMessage = document.getElementById('row-limit-message');


    //     addRowButton.addEventListener('click', function() {
    //         const rowCount = tableBody.getElementsByTagName('tr').length;
    //         if (rowCount >= 5) {
    //             rowLimitMessage.classList.remove('hidden');
    //             return;
    //         }
    //         rowLimitMessage.classList.add('hidden');

    //         const newRow = document.createElement('tr');


    //         newRow.innerHTML = `
    //                                         <td class="px-4 py-2 border-b">
    //                                               <div class="flex items-center">
    //                                                 <input type="text" name="language-input[]"
    //                                                     class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm  language-input"
    //                                                     pattern="[A-Za-z\s]+" placeholder="Ex. Filipino" aria-label="Language or Dialect"
    //                                                     value="<?php echo e(old('language-input', $formData5['language-input'] ?? '')); ?>" readonly />
    //                                             </div>
    //                                             <div class="suggestions-container">
    //                                                 <ul class="suggestions-list text-gray-700 dark:text-gray-200"></ul>
    //                                             </div>
    //                                         </td>

    //                                                <td class="px-4 py-2 border-b text-center">
    //                                                 <div class="inline-block relative">
    //                                                     <select
    //                                                         class="block appearance-none w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
    //                                                         id="langprof" aria-label="Language Proficiency">
    //                                                         <option value="Beginner">Beginner</option>
    //                                                         <option value="Intermediate">Intermediate</option>
    //                                                         <option value="Advanced">Advanced</option>
    //                                                         <option value="Fluent">Fluent</option>
    //                                                         <option value="Native">Native</option>
    //                                                     </select>

    //                                                 </div>
    //                                             </td>
    //                                            <td class="px-4 py-2 border-b">
    //                                                 <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-2 sm:mt-0 sm:mr-2">
    //                                                     <button type="button" class="btn btn-primary edit-row mb-1 sm:mb-0 "
    //                                                         aria-label="<?php echo e(__('messages.language.actions.edit')); ?>"><?php echo e(__('messages.language.actions.edit')); ?></button>
    //                                                     <button type="button" class="btn btn-danger mb-1 remove-row"
    //                                                         aria-label="<?php echo e(__('messages.language.actions.remove')); ?>"><?php echo e(__('messages.language.actions.remove')); ?></button>
    //                                                 </div>
    //                                             </td>
    //                                     `;
    //         tableBody.appendChild(newRow);

    //         // Attach suggestions logic to the new input
    //         const newInput = newRow.querySelector('.language-input');
    //         const suggestionsContainer = newRow.querySelector('.suggestions-list');
    //         const proficiencySelect = newRow.querySelector('#langprof');

    //         attachSuggestionsLogic(newInput, suggestionsContainer, proficiencySelect);
    //     });



    //     tableBody.addEventListener('click', function(event) {
    //         if (event.target.classList.contains('remove-row')) {
    //             const row = event.target.closest('tr');
    //             tableBody.removeChild(row);
    //             rowLimitMessage.classList.add('hidden');
    //         } else if (event.target.classList.contains('edit-row')) {
    //             const row = event.target.closest('tr');
    //             const inputs = row.querySelectorAll('input');
    //             inputs.forEach(input => {
    //                 input.readOnly = !input.readOnly;
    //             });

    //             // Hide the 'Edit' button after clicking
    //             event.target.style.display = 'none';
    //         }
    //     });


    //     const initialInput = document.querySelector('.language-input');
    //     const initialSuggestionsContainer = document.querySelector('.suggestions-list');
    //     const proficiencySelect = document.querySelector('#langprof');

    //     attachSuggestionsLogic(initialInput, initialSuggestionsContainer, proficiencySelect);

    //     function attachSuggestionsLogic(inputElement, suggestionsContainer, proficiencySelect) {
    //         // Fetch languages from the JSON file
    //         const selectedLanguagesContainer = document.getElementById('selected-languages');

    //         // Load previously saved languages from local storage on page load


    //         fetch('/languages/lang.json')
    //             .then(response => response.json())
    //             .then(data => {
    //                 const languages = Object.values(
    //                     data); // Extract values (language names) from the object
    //                 inputElement.addEventListener('input', function() {
    //                     const query = inputElement.value.toLowerCase();
    //                     suggestionsContainer.innerHTML = '';
    //                     if (query) {
    //                         const filteredLanguages = languages.filter(language => language
    //                             .toLowerCase().includes(query)).slice(0, 5);
    //                         filteredLanguages.forEach(language => {
    //                             const listItem = document.createElement('li');
    //                             listItem.textContent = language + ' - ' +
    //                                 proficiencySelect.value;

    //                             listItem.classList.add('suggestion-item', 'p-2',
    //                                 'cursor-pointer', 'flex',
    //                                 'justify-between');

    //                             const selectedLanguagesContainer = document
    //                                 .getElementById('selected-languages');
    //                             const currentLanguages =
    //                                 selectedLanguagesContainer.value.trim();


    //                             //DITO

    //                             // Split current languages into an array based on commas and trim whitespace
    //                             const selectedLanguages = currentLanguages
    //                                 .split(',').map(lang => lang.trim());

    //                             // Check if adding another language would exceed the limit of 5
    //                             if (selectedLanguages.length >= 5) {
    //                                 alert(
    //                                     'You can only select up to 5 languages.'
    //                                 );
    //                                 // Optionally, remove the row from the table
    //                                 const row = listItem.closest('tr');
    //                                 row.remove();

    //                                 return;
    //                             }
    //                             // Create plus button for each suggestion
    //                             const plusButton = document.createElement('button');
    //                             plusButton.textContent = '+';
    //                             plusButton.classList.add('plus-button', 'ms-2',
    //                                 'btn', 'btn-success', 'text-white', 'px-2', 'py-1',
    //                                 'rounded');

    //                             plusButton.addEventListener('click', function() {

    //                                 inputElement.value = language + ' - ' +
    //                                     proficiencySelect.value;
    //                                 hiddenlang
    //                                 suggestionsContainer.innerHTML =
    //                                     ''; // Clear suggestions after selecting
    //                             });

    //                             listItem.appendChild(plusButton);

    //                             proficiencySelect.addEventListener('change', function() {
    //                                 if (inputElement && inputElement
    //                                     .value
    //                                 ) { // Check if inputElement is not null and has a value
    //                                     const currentLanguage = inputElement.value
    //                                         .split(' - ')[
    //                                             0
    //                                         ]; // Get the current selected language
    //                                     const selectedProficiency =
    //                                         proficiencySelect
    //                                         .value; // Get the newly selected proficiency
    //                                     inputElement.value = currentLanguage +
    //                                         ' - ' +
    //                                         selectedProficiency; // Update input value
    //                                 }
    //                             });



    //                             // Handle click on the suggestion item itself
    //                             listItem.addEventListener('click', function() {

    //                                 if (selectedLanguagesContainer.value
    //                                     .includes(
    //                                         language.trim())) {
    //                                     alert(
    //                                         'This language is already selected.'
    //                                     );
    //                                     const row = listItem.closest('tr');
    //                                     row.remove();
    //                                     return;

    //                                 }
    //                                 let currentLanguages =
    //                                     selectedLanguagesContainer.value
    //                                     .trim(); // Trim any leading/trailing whitespace

    //                                 if (currentLanguages !== '') {
    //                                     currentLanguages +=
    //                                         ', '; // Add comma separator if there are existing languages
    //                                 }


    //                                 currentLanguages += language.trim() + ' - ' +
    //                                     proficiencySelect
    //                                     .value; // Append the new language with proficiency

    //                                 inputElement.value = language.trim() + ' - ' +
    //                                     proficiencySelect
    //                                     .value;


    //                                 selectedLanguagesContainer.value =
    //                                     currentLanguages; // Set the updated value

    //                                 inputElement.readOnly = true;
    //                                 suggestionsContainer.innerHTML =
    //                                     ''; // Clear suggestions after selecting
    //                                 proficiencySelect.disabled = true;

    //                             });

    //                             // Append the suggestion item to the suggestions container
    //                             suggestionsContainer.appendChild(listItem);
    //                         });
    //                     }
    //                 });
    //             })
    //             .catch(error => console.error('Error fetching languages:', error));


    //         tableBody.addEventListener('click', function(event) {
    //             event.preventDefault()
    //             if (event.target.classList.contains('remove-row')) {
    //                 const row = event.target.closest('tr');
    //                 const languageInput = row.querySelector('.language-input');
    //                 const languageToRemove = languageInput.value.trim();

    //                 // Remove the corresponding language from selectedLanguagesContainer
    //                 let currentLanguages = selectedLanguagesContainer.value.split(',').map(lang => lang
    //                     .trim());
    //                 const indexToRemove = currentLanguages.indexOf(languageToRemove);
    //                 if (indexToRemove !== -1) {
    //                     currentLanguages.splice(indexToRemove, 1); // Remove the language
    //                     selectedLanguagesContainer.value = currentLanguages.join(
    //                         ', '); // Update selectedLanguagesContainer
    //                 }

    //                 row.remove();
    //             }



    //             document.addEventListener('DOMContentLoaded', function() {
    //                 const form = document.querySelector('form'); // Select the form element

    //                 // Function to save form data to local storage
    //                 function saveFormData() {
    //                     const formData = new FormData(form); // Get all form data
    //                     const formDataObject = {};
    //                     for (const [key, value] of formData.entries()) {
    //                         formDataObject[key] = value; // Convert FormData to plain object
    //                     }
    //                     localStorage.setItem('formData', JSON.stringify(
    //                         formDataObject)); // Save to local storage
    //                 }

    //                 // Save form data when the form is submitted
    //                 form.addEventListener('submit', function(event) {
    //                     saveFormData();
    //                 });

    //                 // Load form data from local storage on page load
    //                 function loadFormData() {
    //                     const savedFormData = localStorage.getItem('formData');
    //                     if (savedFormData) {
    //                         const formDataObject = JSON.parse(savedFormData);
    //                         for (const key in formDataObject) {
    //                             if (Object.hasOwnProperty.call(formDataObject, key)) {
    //                                 const element = form.querySelector(`[name="${key}"]`);
    //                                 if (element) {
    //                                     element.value = formDataObject[
    //                                         key]; // Set input values from local storage
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }

    //                 loadFormData(); // Load saved form data when the page loads
    //             });
    //         });
    //     }
    // });

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
            selectedSkills.push(checkbox.value);

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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\language.blade.php ENDPATH**/ ?>