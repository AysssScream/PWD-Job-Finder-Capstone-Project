<h2 class="text-2xl font-bold mb-2" aria-label="Language Profieciency">LANGUAGE PROFICIENCY</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="{{ route('profile.update.language-info') }}" method="POST">
    @csrf
    @method('PATCH')
    <div>
        <p class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0"
            aria-label="{{ __('messages.language.updatelang') }}">
            <strong>{{ __('messages.language.updatelang') }}</strong>
        </p>
        <ul class="list-unstyled">

            <li aria-label="{{ __('messages.language.list-unstyled.1') }}"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                tabindex="0">
                <i class="bi bi-arrow-right-short"></i>• {{ __('messages.language.list-unstyled.1') }}
            </li>
            <li aria-label="{{ __('messages.language.list-unstyled.2') }}" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• {{ __('messages.language.list-unstyled.2') }}
            </li>
            <li aria-label="{{ __('messages.language.list-unstyled.3') }}" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• {{ __('messages.language.list-unstyled.3') }}
            </li>
            <li aria-label="{{ __('messages.language.list-unstyled.4') }}" tabindex="0"
                class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                <i class="bi bi-arrow-right-short"></i>• {{ __('messages.language.list-unstyled.4') }}
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
                        <th class="px-4 py-2 border-b bg-gray-700 text-gray-200 dark:bg-gray-900 dark:text-gray-200"
                            aria-label="{{ __('messages.language.table_headers.language_dialect') }}">
                            {{ __('messages.language.table_headers.language_dialect') }}
                        </th>
                        <th class="px-4 py-2 text-center border-b bg-gray-700 text-gray-200 dark:bg-gray-900 dark:text-gray-200"
                            aria-label="{{ __('messages.language.table_headers.language_proficiency') }}">
                            {{ __('messages.language.table_headers.language_proficiency') }}
                        </th>
                    </tr>
                </thead>
                <tbody id="language-table-body">
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-400 bg-gray-200 dark:bg-gray-700  text-black dark:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            colspan="2" tabindex="0" aria-label="{{ __('messages.language.can_speak') }}">
                            {{ __('messages.language.can_speak') }}?</th>
                    </tr>
                    @php
                        // Fetch data for Filipino and English proficiencies
                        $languages = ['Filipino', 'English'];
                        $languageData = $user->languageInputs
                            ->whereIn('language_input', $languages)
                            ->keyBy('language_input');
                    @endphp
                    @foreach ($languages as $language)
                        @php
                            // Fetching data for speaking proficiency
                            $selectedProficienciesSpeak = json_decode(
                                $languageData[$language]->proficiencies_speak ?? '[]',
                                true,
                            );
                        @endphp
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-400">
                                <div class="flex items-center">
                                    <input type="text" name="language-input[]"
                                        class="w-1/2 p-2 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 language-input"
                                        pattern="[A-Za-z\s]+" placeholder="Ex. {{ $language }}"
                                        aria-label="Language or Dialect {{ $language }}"
                                        value="{{ $language }}" readonly />
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400 text-right">
                                <div class="flex items-center">
                                    @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $proficiency)
                                        <label class="inline-flex items-center mr-4">
                                            <input type="checkbox" name="proficiency-{{ $language }}[]"
                                                value="{{ $proficiency }}"
                                                class="rounded-lg form-checkbox text-blue-500 focus:ring-orange-400 dark:focus:ring-orange-400"
                                                @if (in_array($proficiency, $selectedProficienciesSpeak)) checked @endif
                                                aria-label="Proficiency level: {{ $proficiency }}"
                                                onclick="toggleCheckbox(this, '{{ $language }}', 'speak')" />
                                            <span
                                                class="ml-2 text-gray-700 dark:text-gray-200 text-left">{{ $proficiency }}?</span>
                                        </label>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <th class="px-4 py-2 border-b border-gray-400 bg-gray-200 dark:bg-gray-700 text-black dark:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            colspan="2" tabindex="0" aria-label="{{ __('messages.language.can_read') }}">
                            {{ __('messages.language.can_read') }}?</th>
                    </tr>
                    @foreach ($languages as $language)
                        @php
                            // Fetching data for reading proficiency
                            $selectedProficienciesRead = json_decode(
                                $languageData[$language]->proficiencies_read ?? '[]',
                                true,
                            );
                        @endphp
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-400">
                                <div class="flex items-center">
                                    <input type="text" name="language-input[]"
                                        class="w-1/2 p-2 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 language-input"
                                        pattern="[A-Za-z\s]+" placeholder="Ex. {{ $language }}"
                                        aria-label="Language or Dialect {{ $language }}"
                                        value="{{ $language }}" readonly />
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400 text-right">
                                <div class="flex items-center">
                                    @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $proficiency)
                                        <label class="inline-flex items-center mr-4">
                                            <input type="checkbox" name="proficiencyRead-{{ $language }}[]"
                                                value="{{ $proficiency }}"
                                                class="rounded-lg form-checkbox text-blue-500 focus:ring-orange-400 dark:focus:ring-orange-400"
                                                @if (in_array($proficiency, $selectedProficienciesRead)) checked @endif
                                                aria-label="Proficiency level: {{ $proficiency }}"
                                                onclick="toggleCheckbox(this, '{{ $language }}', 'read')" />
                                            <span
                                                class="ml-2 text-gray-700 dark:text-gray-200 text-left">{{ $proficiency }}?</span>
                                        </label>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                function toggleCheckbox(selectedCheckbox, language, type) {
                    const checkboxes = document.querySelectorAll(
                        `input[name="${type === 'speak' ? 'proficiency-' : 'proficiencyRead-'}${language}[]"]`);
                    checkboxes.forEach(checkbox => {
                        if (checkbox !== selectedCheckbox) {
                            checkbox.checked = false;
                        }
                    });
                }
            </script>

        </table>
    </div>
    <br>

    <div class="mb-4">
        <!-- Label and Input field for userSkills -->
         <label for="userSkills" class="block text-md font-medium  text-black dark:text-gray-200">Saved
            Skills:</label>
        <textarea id="userSkills" name="userSkills"
            aria-label="The saved skills are {{ old('userSkills', isset($skill->skills) ? implode(', ', json_decode($skill->skills, true)) : '') }}"
            class="mt-1 mb-3 p-3 w-full border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            readonly>{{ old('userSkills', isset($skill->skills) ? implode(', ', json_decode($skill->skills, true)) : '') }}</textarea>

    </div>
    <label for="selectedSkills" class="block text-md font-medium text-black dark:text-gray-200 mt-6">Selected
        Skills:</label>
    <textarea id="selectedSkills" name="selectedSkills" hidden
        class="mt-6 appearance-none block w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        readonly>{{ old('selectedSkills', isset($formData5['skills']) ? $formData5['skills'] : '') }}</textarea>
    <div class="mt-2 grid grid-cols-2 md:grid-cols-2 gap-4">
        @php
            $selectedSkills = json_decode($skill->skills ?? '[]', true);
        @endphp
        <div>
            <div class="mt-6">
                <label for="autoMechanic" class="flex items-center">
                    <input type="checkbox" id="autoMechanic" name="skills[]" value="AUTO MECHANIC" class="mr-2"
                        aria-label="Check Auto Mechanic?"
                        {{ in_array('AUTO MECHANIC', $selectedSkills) ? 'checked' : '' }}>
                    <span class="ml-2">Auto Mechanic</span>
                </label>
            </div>
            <div class="mt-6">
                <label for="gardening" class="flex items-center">
                    <input type="checkbox" id="gardening" name="skills[]" value="GARDENING" class="mr-2"
                        aria-label="Check Gardening?" {{ in_array('GARDENING', $selectedSkills) ? 'checked' : '' }}>
                    Gardening
                </label>
            </div>
            <div class="mt-6">
                <label for="beautician" class="flex items-center">
                    <input type="checkbox" id="beautician" name="skills[]" value="BEAUTICIAN" class="mr-2"
                        aria-label="Check beautician?" {{ in_array('BEAUTICIAN', $selectedSkills) ? 'checked' : '' }}>
                    Beautician
                </label>
            </div>

            <div class="mt-6">
                <label for="carpentry" class="flex items-center">
                    <input type="checkbox" id="carpentry" name="skills[]" value="CARPENTRY WORK" class="mr-2"
                        aria-label="Check Carpenty?"
                        {{ in_array('CARPENTRY WORK', $selectedSkills) ? 'checked' : '' }}>
                    Carpentry Work
                </label>
            </div>

            <div class="mt-6">
                <label for="painter" class="flex items-center">
                    <input type="checkbox" id="painter" name="skills[]" value="PAINTER/ARTIST" class="mr-2"
                        aria-label="Check Painter or Artist?"
                        {{ in_array('PAINTER/ARTIST', $selectedSkills) ? 'checked' : '' }}>
                    Painter/Artist
                </label>
            </div>

            <div class="mt-6">
                <label for="computerLiteracy" class="flex items-center">
                    <input type="checkbox" id="computerLiteracy" name="skills[]" value="COMPUTER LITERATE"
                        aria-label="Check Computer Literate?" class="mr-2"
                        {{ in_array('COMPUTER LITERATE', $selectedSkills) ? 'checked' : '' }}>
                    Computer Literate
                </label>
            </div>

            <div class="mt-6">
                <label for="paintingJobs" class="flex items-center">
                    <input type="checkbox" id="paintingJobs" name="skills[]" value="PAINTING JOBS" class="mr-2"
                        aria-label="Check Paintimg Jobs?"
                        {{ in_array('PAINTING JOBS', $selectedSkills) ? 'checked' : '' }}>
                    Painting Jobs
                </label>
            </div>

            <div class="mt-6">
                <label for="domesticChores" class="flex items-center">
                    <input type="checkbox" id="domesticChores" name="skills[]" value="DOMESTIC CHORES"
                        aria-label="Check Domestic Chores" class="mr-2"
                        {{ in_array('DOMESTIC CHORES', $selectedSkills) ? 'checked' : '' }}>
                    Domestic Chores
                </label>
            </div>
        </div>
        <div>
            <div class="mt-6">
                <label for="photography" class="flex items-center">
                    <input type="checkbox" id="photography" name="skills[]" value="PHOTOGRAPHY" class="mr-2"
                        aria-label="Check Photography?"
                        {{ in_array('PHOTOGRAPHY', $selectedSkills) ? 'checked' : '' }}>
                    Photography
                </label>
            </div>

            <div class="mt-6">
                <label for="driving" class="flex items-center">
                    <input type="checkbox" id="driving" name="skills[]" value="DRIVING" class="mr-2"
                        aria-label="Check Driving?" {{ in_array('DRIVING', $selectedSkills) ? 'checked' : '' }}>
                    Driving
                </label>
            </div>
            <div class="mt-6">
                <label for="sewingDresses" class="flex items-center">
                    <input type="checkbox" id="sewingDresses" name="skills[]" value="SEWING DRESSES" class="mr-2"
                        aria-label="Check Sewing Dresses?"
                        {{ in_array('SEWING DRESSES', $selectedSkills) ? 'checked' : '' }}>
                    Sewing Dresses
                </label>
            </div>

            <div class="mt-6">
                <label for="electrician" class="flex items-center">
                    <input type="checkbox" id="electrician" name="skills[]" value="ELECTRICIAN" class="mr-2"
                        aria-label="Check Electrician?"
                        {{ in_array('ELECTRICIAN', $selectedSkills) ? 'checked' : '' }}>
                    Electrician
                </label>
            </div>

            <div class="mt-6">
                <label for="stenography" class="flex items-center">
                    <input type="checkbox" id="stenography" name="skills[]" value="STENOGRAPHY" class="mr-2"
                        aria-label="Check Stenography?"
                        {{ in_array('STENOGRAPHY', $selectedSkills) ? 'checked' : '' }}>
                    Stenography
                </label>
            </div>

            <div class="mt-6">
                <label for="embroidery" class="flex items-center">
                    <input type="checkbox" id="embroidery" name="skills[]" value="EMBROIDERY" class="mr-2"
                        aria-label="Check Embroidery?" {{ in_array('EMBROIDERY', $selectedSkills) ? 'checked' : '' }}>
                    Embroidery
                </label>
            </div>
            <div class="mt-6">
                <label for="tailoring" class="flex items-center">
                    <input type="checkbox" id="tailoring" name="skills[]" value="TAILORING" class="mr-2"
                        aria-label="Check Tailoring?" {{ in_array('TAILORING', $selectedSkills) ? 'checked' : '' }}>
                    Tailoring
                </label>
            </div>

            <div class="mt-6">
                <label for="masonry" class="flex items-center">
                    <input type="checkbox" id="masonry" name="skills[]" value="MASONRY" class="mr-2"
                        aria-label="Check Masonry?" {{ in_array('MASONRY', $selectedSkills) ? 'checked' : '' }}>
                    Masonry
                </label>
            </div>
            <div class="mt-6">
                <label for="otherSkills" class="flex items-center">
                    <input type="checkbox" id="otherSkillsCheckbox" name="skills[]" value="OTHER" class="mr-2"
                        aria-label="Check Other?" {{ in_array('OTHER', $selectedSkills) ? 'checked' : '' }}
                        onchange="toggleTextBox()">
                    Other:
                </label>
                <br>
            </div>
            @error('skills')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
            <textarea id="otherSkills" name="otherSkills"
                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                {{ old('otherSkills', $skill->otherSkills ?? '') == 'OTHER_SKILLS' ? '' : 'disabled' }}>{{ old('otherSkills', $skill->otherSkills ?? '') }}</textarea>
            <br>
            <input type="text" id="otherSkillsInput" name="otherSkillsInput" aria-label="Other Skills"
                value="{{ old('otherSkillsInput', $skill->otherSkills ?? '') }}" hidden>
        </div>
    </div>

    <div class="flex items-center gap-4 ">
        <x-primary-button class="mt-6 focus:outline-none "
            aria-label="{{ __('messages.userdashboard.save_changes') }}">{{ __('messages.userdashboard.save_changes') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-md font-semibold text-green-400 dark:text-gray-400">
                {{ __('Saved.') }}
            </p>
        @endif
    </div>
</form>


<script>
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
