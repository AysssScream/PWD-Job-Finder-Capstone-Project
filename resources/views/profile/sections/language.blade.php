<h2 class="text-2xl font-bold mb-2">LANGUAGE PROFICIENCY</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<table class="min-w-full border border-gray-200" id="languages-table">
    <thead>
        <tr>
            <div class="mt-4">
                <p><strong>To update your language proficiency:</strong></p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-arrow-right-short"></i>• Click "Add Language" to input new
                        languages.</li>
                    <li><i class="bi bi-arrow-right-short"></i>• Set the language proficiency first
                        using the dropdown.</li>
                    <li><i class="bi bi-arrow-right-short"></i>• Choose your language and determine
                        your language proficiency.</li>
                    <li><i class="bi bi-arrow-right-short"></i>• Use the checkboxes to select
                        skills
                        without formal training (Other Skills).</li>
                    <li><i class="bi bi-arrow-right-short"></i>• Edit or remove entries as needed
                        to
                        accurately reflect your abilities.</li>
                </ul>
            </div>

            <br>
            <td colspan="4" class="text-left p-4">
                <button type="button" class="btn btn-primary add-row">Add
                    Language</button>
                <button type="button" class="btn btn-danger" onclick="clearSelectedLanguages()">Clear Selected
                    Languages</button>

                <script>
                    function clearSelectedLanguages() {
                        document.getElementById('selected-languages').value = '';
                        localStorage.removeItem('selectedLanguages');

                        var table = document.getElementById('language-table-body');

                        // Remove all rows from the table
                        while (table.rows.length > 0) {
                            table.deleteRow(0);
                        }
                    }
                </script>
            </td>
        </tr>
    </thead>


    <thead>
        <tr>
            <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200">Language/Dialect
            </th>
            <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200">Language
                proficiency</th>
            <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200">Action</th>

        </tr>
    </thead>
    <tbody id="language-table-body">
        <tr>
            <td class="px-4 py-2 border-b">
                <div class="flex items-center">
                    <input type="text" name="language-input[]"
                        class="w-full p-2 border border-dark rounded shadow-sm bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 language-input "
                        pattern="[A-Za-z\s]+" placeholder="Ex. Filipino"
                        value="{{ old('language-input.0', $formData5['language-input.0'] ?? '') }}" readonly />
                </div>
                <div class="suggestions-container bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200">

                    <ul class="suggestions-list"></ul>
                </div>

            </td>

            <td class="px-4 py-2 border-b text-center">
                <div class="inline-block relative">
                    <select
                        class="block appearance-none w-full p-2 border border-dark rounded shadow-sm bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 border border-gray rounded-md py-2 px-10 leading-tight focus:outline-none focus:border-blue-500"
                        id="langprof">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Fluent">Fluent</option>
                        <option value="Native">Native</option>
                    </select>

                </div>
            </td>



            <td class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-1 sm:mt-0 sm:mr-2">
                <button type="button" class="btn btn-primary edit-row mb-1 sm:mb-0">Edit</button>
                <button type="button" class="btn btn-danger mb-1 remove-row">Remove</button>
            </td>

        </tr>
    </tbody>
</table>
<br>
<label for="selected-languages" class="block text-sm font-medium text-black-700">Selected
    Languages:</label>
<textarea id="selected-languages" name="selected-languages"
    class="w-full bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 mb-5 border border-gray-300  rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
    placeholder="Enter selected languages..." readonly>{{ old('selected-languages', $language->language_input ?? '') }}</textarea>


<div id="row-limit-message" class="text-red-600 mt-2 hidden">You can only add
    up to 5 languages.</div>

<h3 class="text-2xl font-bold mb-2  mt-9">Other Skills (Without Formal Training)
</h3>
<span class="text-md font-regular">
    In this section, choosing your skills without formal training are important
    as they demonstrate a person’s
    ability to learn independently and adapt to new challenges.
</span>

<div class="mt-6">
    <!-- Label and Input field for userSkills -->
    <label for="userSkills" class="block text-sm font-medium  text-black dark:text-gray-200">Saved
        Skills:</label>
    <textarea id="userSkills" name="userSkills"
        class="mt-1 appearance-none block w-full bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        readonly>{{ old('userSkills', isset($skill->skills) ? implode(', ', json_decode($skill->skills, true)) : '') }}</textarea>




    <label for="selectedSkills" class="block text-sm font-medium text-black dark:text-gray-200 mt-4">Selected
        Skills:</label>
    <textarea id="selectedSkills" name="selectedSkills" hidden
        class="mt-1 appearance-none block w-full border rounded-lg py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        readonly>{{ old('selectedSkills', isset($formData5['skills']) ? $formData5['skills'] : '') }}</textarea>
</div>


<div class="mt-4 grid grid-cols-2 md:grid-cols-2 gap-4">
    @php
        $selectedSkills = json_decode($skill->skills ?? '[]', true);
    @endphp
    <div>
        <div class="mt-6">
            <label for="autoMechanic" class="flex items-center">
                <input type="checkbox" id="autoMechanic" name="skills[]" value="AUTO MECHANIC" class="mr-2"
                    {{ in_array('AUTO MECHANIC', $selectedSkills) ? 'checked' : '' }}>
                <span class="ml-2">Auto Mechanic</span>
            </label>

            <!-- Add more checkboxes for other skills as needed -->
        </div>
        <div class="mt-6">
            <label for="gardening" class="flex items-center">
                <input type="checkbox" id="gardening" name="skills[]" value="GARDENING" class="mr-2"
                    {{ in_array('GARDENING', $selectedSkills) ? 'checked' : '' }}>
                Gardening
            </label>
        </div>
        <div class="mt-6">
            <label for="beautician" class="flex items-center">
                <input type="checkbox" id="beautician" name="skills[]" value="BEAUTICIAN" class="mr-2"
                    {{ in_array('BEAUTICIAN', $selectedSkills) ? 'checked' : '' }}>
                Beautician
            </label>
        </div>

        <div class="mt-6">
            <label for="carpentry" class="flex items-center">
                <input type="checkbox" id="carpentry" name="skills[]" value="CARPENTRY WORK" class="mr-2"
                    {{ in_array('CARPENTRY WORK', $selectedSkills) ? 'checked' : '' }}>
                Carpentry Work
            </label>
        </div>

        <div class="mt-6">
            <label for="painter" class="flex items-center">
                <input type="checkbox" id="painter" name="skills[]" value="PAINTER/ARTIST" class="mr-2"
                    {{ in_array('PAINTER/ARTIST', $selectedSkills) ? 'checked' : '' }}>
                Painter/Artist
            </label>
        </div>

        <div class="mt-6">
            <label for="computerLiteracy" class="flex items-center">
                <input type="checkbox" id="computerLiteracy" name="skills[]" value="COMPUTER LITERATE"
                    class="mr-2" {{ in_array('COMPUTER LITERATE', $selectedSkills) ? 'checked' : '' }}>
                Computer Literate
            </label>
        </div>

        <div class="mt-6">
            <label for="paintingJobs" class="flex items-center">
                <input type="checkbox" id="paintingJobs" name="skills[]" value="PAINTING JOBS" class="mr-2"
                    {{ in_array('PAINTING JOBS', $selectedSkills) ? 'checked' : '' }}>
                Painting Jobs
            </label>
        </div>

        <div class="mt-6">
            <label for="domesticChores" class="flex items-center">
                <input type="checkbox" id="domesticChores" name="skills[]" value="DOMESTIC CHORES" class="mr-2"
                    {{ in_array('DOMESTIC CHORES', $selectedSkills) ? 'checked' : '' }}>
                Domestic Chores
            </label>
        </div>
    </div>
    <div>
        <div class="mt-6">
            <label for="photography" class="flex items-center">
                <input type="checkbox" id="photography" name="skills[]" value="PHOTOGRAPHY" class="mr-2"
                    {{ in_array('PHOTOGRAPHY', $selectedSkills) ? 'checked' : '' }}>
                Photography
            </label>
        </div>

        <div class="mt-6">
            <label for="driving" class="flex items-center">
                <input type="checkbox" id="driving" name="skills[]" value="DRIVING" class="mr-2"
                    {{ in_array('DRIVING', $selectedSkills) ? 'checked' : '' }}>
                Driving
            </label>
        </div>
        <div class="mt-6">
            <label for="sewingDresses" class="flex items-center">
                <input type="checkbox" id="sewingDresses" name="skills[]" value="SEWING DRESSES" class="mr-2"
                    {{ in_array('SEWING DRESSES', $selectedSkills) ? 'checked' : '' }}>
                Sewing Dresses
            </label>
        </div>

        <div class="mt-6">
            <label for="electrician" class="flex items-center">
                <input type="checkbox" id="electrician" name="skills[]" value="ELECTRICIAN" class="mr-2"
                    {{ in_array('ELECTRICIAN', $selectedSkills) ? 'checked' : '' }}>
                Electrician
            </label>
        </div>

        <div class="mt-6">
            <label for="stenography" class="flex items-center">
                <input type="checkbox" id="stenography" name="skills[]" value="STENOGRAPHY" class="mr-2"
                    {{ in_array('STENOGRAPHY', $selectedSkills) ? 'checked' : '' }}>
                Stenography
            </label>
        </div>

        <div class="mt-6">
            <label for="embroidery" class="flex items-center">
                <input type="checkbox" id="embroidery" name="skills[]" value="EMBROIDERY" class="mr-2"
                    {{ in_array('EMBROIDERY', $selectedSkills) ? 'checked' : '' }}>
                Embroidery
            </label>
        </div>
        <div class="mt-6">
            <label for="tailoring" class="flex items-center">
                <input type="checkbox" id="tailoring" name="skills[]" value="TAILORING" class="mr-2"
                    {{ in_array('TAILORING', $selectedSkills) ? 'checked' : '' }}>
                Tailoring
            </label>
        </div>

        <div class="mt-6">
            <label for="masonry" class="flex items-center">
                <input type="checkbox" id="masonry" name="skills[]" value="MASONRY" class="mr-2"
                    {{ in_array('MASONRY', $selectedSkills) ? 'checked' : '' }}>
                Masonry
            </label>
        </div>
        <div class="mt-6">
            <label for="otherSkills" class="flex items-center">
                <input type="checkbox" id="otherSkillsCheckbox" name="skills[]" value="OTHER" class="mr-2"
                    {{ in_array('OTHER', $selectedSkills) ? 'checked' : '' }} onchange="toggleTextBox()">
                Other:
            </label>
            <br>
        </div>
        @error('skills')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror


        <textarea id="otherSkills" name="otherSkills"
            class="w-full p-2 border rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200"
            {{ old('otherSkills', $skill->otherSkills ?? '') == 'OTHER_SKILLS' ? '' : 'disabled' }}>{{ old('otherSkills', $skill->otherSkills ?? '') }}</textarea>
        <br>


        <input type="text" id="otherSkillsInput" name="otherSkillsInput"
            value="{{ old('otherSkillsInput', $skill->otherSkills ?? '') }}" hidden>
    </div>


</div>

<div class="flex items-center gap-4 ">
    <x-primary-button class="mt-6">{{ __('Save Changes') }}</x-primary-button>

    @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-md font-semibold text-green-400 dark:text-gray-400">
            {{ __('Saved.') }}
        </p>
    @endif
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
                                                <input type="text" name="language-input[]" class="w-full p-2 border border-dark rounded shadow-sm language-input" pattern="[A-Za-z\s]+" placeholder="Ex. Filipino" title="Please enter alphabetic characters only" readonly    />
                                                <div class="suggestions-container">
                                                    <ul class="suggestions-list"></ul>
                                                </div>
                                            </td>
                            
                                                     <td class="px-4 py-2 border-b text-center">
                                                         <div class="inline-block relative">
                                                             <select
                                                                 class="block appearance-none w-full p-2 border border-dark rounded shadow-sm bg-white border border-gray rounded-md py-2 px-10 leading-tight focus:outline-none focus:border-blue-500"
                                                                 id="langprof">
                                                                 <option value="Beginner">Beginner</option>
                                                                 <option value="Intermediate">Intermediate</option>
                                                                 <option value="Advanced">Advanced</option>
                                                                 <option value="Fluent">Fluent</option>
                                                                 <option value="Native">Native</option>
                                                             </select>

                                                         </div>
                                                     </td>
                                          <td class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-1 sm:mt-0 sm:mr-2">
                                                <button type="button" class="btn btn-primary edit-row mb-1 sm:mb-0">Edit</button>
                                                <button type="button" class="btn btn-danger mb-1 remove-row">Remove</button>
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
                                plusButton.classList.add('plus-button', 'ms-2',
                                    'btn', 'btn-success', 'text-white', 'px-2', 'py-1',
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
