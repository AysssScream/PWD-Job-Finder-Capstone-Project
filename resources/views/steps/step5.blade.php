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
                     <form action="{{ route('dialect') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @if ($errors->any())
                             <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                 role="alert">
                                 <strong class="font-bold">Oops!</strong>
                                 <span class="block sm:inline">There were some errors with your submission:</span>
                                 <ul class="mt-3 list-disc list-inside text-sm">
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                             <br>
                         @endif
                         <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                             <div class="p-6">
                                 <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                     tabindex="0">
                                     Language and Other Skills
                                     @php
                                         $currentStep = 5; // Set this dynamically based on your current step
                                         $totalSteps = 7; // Total number of steps (adjusted to 8)
                                         $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                     @endphp
                                     <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                         <div
                                             class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                             <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                 style="width: {{ $percentage }}%;"></div>
                                         </div>
                                         <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                             Step {{ $currentStep }}/{{ $totalSteps }} : <span
                                                 class="text-green-600">{{ $percentage }}%</span>
                                         </div>
                                     </div>
                                 </h3>
                                 <div>
                                     <nav class="text-sm" aria-label="Breadcrumb">
                                         <ol class="list-none p-0 inline-flex">
                                             <li class="flex items-center">
                                                 <i tabindex="0"
                                                     class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"></i>
                                                 <a href="{{ route('jobpreferences') }}"
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
                                     tabindex="0" aria-label="{!! __('messages.language.instruction') !!}">
                                     <span class="text-md font-regular">
                                         {!! __('messages.language.instruction') !!}
                                     </span>
                                 </div>

                                 <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                     <div class="col-span-1 md:col-span-1">
                                         @include('layouts.dropdown')
                                     </div>
                                     <div class="col-span-1 md:col-span-2">

                                         <table class="min-w-full border border-gray-200" id="languages-table">
                                             <thead>
                                                 <tr>
                                                     <div class="mt-6">
                                                         <p class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                             tabindex="0"
                                                             aria-label="{{ __('messages.language.updatelang') }}">
                                                             <strong>{{ __('messages.language.updatelang') }}</strong>
                                                         </p>
                                                         <ul class="list-unstyled">
                                                             <li aria-label="{{ __('messages.language.list-unstyled.1') }}"
                                                                 tabindex="0"
                                                                 class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                                 <i></i>•
                                                                 {{ __('messages.language.list-unstyled.1') }}
                                                             </li>
                                                             <li aria-label="{{ __('messages.language.list-unstyled.2') }}"
                                                                 class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                                 tabindex="0">
                                                                 <i class="bi bi-arrow-right-short"></i>•
                                                                 {{ __('messages.language.list-unstyled.2') }}
                                                             </li>
                                                             <li aria-label="{{ __('messages.language.list-unstyled.3') }}"
                                                                 tabindex="0"
                                                                 class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                                 <i class="bi bi-arrow-right-short"></i>•
                                                                 {{ __('messages.language.list-unstyled.3') }}
                                                             </li>
                                                             <li aria-label="{{ __('messages.language.list-unstyled.4') }}"
                                                                 tabindex="0"
                                                                 class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                                 <i class="bi bi-arrow-right-short"></i>•
                                                                 {{ __('messages.language.list-unstyled.4') }}
                                                             </li>
                                                             <li aria-label="{{ __('messages.language.list-unstyled.5') }}"
                                                                 tabindex="0"
                                                                 class="bi bi-arrow-right-short focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                                 <i class="bi bi-arrow-right-short"></i>•
                                                                 {{ __('messages.language.list-unstyled.5') }}
                                                             </li>
                                                         </ul>
                                                     </div>
                                                     <br>
                                                     <td colspan="4" class="text-left p-4">
                                                         <button type="button"
                                                             class="bg-blue-600 text-white px-10 py-2 rounded add-row  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                             tabindex="0"
                                                             aria-label="{{ __('messages.language.buttons.add_language') }}">{{ __('messages.language.buttons.add_language') }}</button>
                                                         <button type="button"
                                                             class="bg-red-500 text-white px-4 py-2 rounded  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                             tabindex="0"
                                                             aria-label="{{ __('messages.language.buttons.clear_selected_languages') }}"
                                                             onclick="clearSelectedLanguages()">{{ __('messages.language.buttons.clear_selected_languages') }}</button>

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
                                                     <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200"
                                                         aria-label="{{ __('messages.language.table_headers.language_dialect') }}">
                                                         {{ __('messages.language.table_headers.language_dialect') }}
                                                     </th>
                                                     <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200"
                                                         aria-label="{{ __('messages.language.table_headers.language_proficiency') }}">
                                                         {{ __('messages.language.table_headers.language_proficiency') }}
                                                     </th>
                                                     <th class="px-4 py-2 border-b bg-gray-300 text-black dark:bg-gray-900 dark:text-gray-200"
                                                         aria-label="{{ __('messages.language.table_headers.action') }}">
                                                         {{ __('messages.language.table_headers.action') }}
                                                     </th>

                                                 </tr>
                                             </thead>
                                             <tbody id="language-table-body">
                                                 <tr>
                                                     <td class="px-4 py-2 border-b">
                                                         <div class="flex items-center">
                                                             <input type="text" name="language-input[]"
                                                                 class="flex-1 p-2 border rounded language-input bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                                 pattern="[A-Za-z\s]+" placeholder="Ex. Filipino"
                                                                 value="{{ old('language-input.0', $formData5['language-input.0'] ?? '') }}"
                                                                 readonly
                                                                 aria-label="{{ __('messages.language.table_headers.language_dialect') }}" />
                                                         </div>
                                                         <div class="suggestions-container ">
                                                             <ul class="suggestions-list"></ul>
                                                         </div>

                                                     </td>

                                                     <td class="px-4 py-2 border-b text-center ">
                                                         <div class="inline-block relative">
                                                             <select
                                                                 aria-label="{{ __('messages.language.table_headers.language_proficiency') }}"
                                                                 class="block appearance-none w-full bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border border-gray rounded-md py-2 px-10 leading-tightfocus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
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
                                                         <button type="button"
                                                             aria-label="{{ __('messages.language.actions.edit') }}"
                                                             class="bg-blue-600 text-white px-7 py-1 rounded edit-row focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                             {{ __('messages.language.actions.edit') }}</button>
                                                         <button type="button"
                                                             aria-label="{{ __('messages.language.actions.remove') }}"
                                                             class="bg-red-500 text-white px-2 py-1 rounded remove-row focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">{{ __('messages.language.actions.remove') }}</button>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                         <br>
                                         <label for="selected-languages"
                                             class="block text-sm font-medium text-black-700">{{ __('messages.language.labels.selected_languages') }}</label>
                                         <textarea id="selected-languages" name="selected-languages"
                                             aria-label="{{ __('messages.language.labels.selected_languages') }}"
                                             class="w-full bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 text-gray-800 border border-gray-300 rounded py-2 px-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                             placeholder="Enter selected languages..." readonly>{{ old('selected-languages', $formData5['selected-languages'] ?? '') }}</textarea>


                                         <div id="row-limit-message" class="text-red-600 mt-2 hidden">
                                             {{ __('messages.language.messages.row_limit_message') }}</div>

                                         <h3 class="text-2xl font-bold mb-2 mt-9 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                             aria-label="                                             {{ __('messages.language.messages.other_skills_heading') }}"
                                             tabindex="0">
                                             {{ __('messages.language.messages.other_skills_heading') }}
                                         </h3>
                                         <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                             tabindex="0"
                                             aria-label=" {{ __('messages.language.messages.other_skills_description') }}">
                                             {{ __('messages.language.messages.other_skills_description') }}
                                             </span>
                                         </div>

                                         <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                                             <div>
                                                 <div class="mt-6">
                                                     <label for="autoMechanic" class="flex items-center">
                                                         <input type="checkbox" id="autoMechanic" name="skills[]"
                                                             value="AUTO MECHANIC" class="mr-2"
                                                             aria-label="Auto Mechanic"
                                                             {{ in_array('AUTO MECHANIC', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Auto Mechanic
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="gardening" class="flex items-center">
                                                         <input type="checkbox" id="gardening" name="skills[]"
                                                             value="GARDENING" class="mr-2" aria-label="Gardening"
                                                             {{ in_array('GARDENING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Gardening
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="beautician" class="flex items-center">
                                                         <input type="checkbox" id="beautician" name="skills[]"
                                                             value="BEAUTICIAN" class="mr-2"
                                                             aria-label="Beautician"
                                                             {{ in_array('BEAUTICIAN', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Beautician
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="carpentry" class="flex items-center">
                                                         <input type="checkbox" id="carpentry" name="skills[]"
                                                             value="CARPENTRY WORK" class="mr-2"
                                                             aria-label="Carpentry Work"
                                                             {{ in_array('CARPENTRY WORK', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Carpentry Work
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="painter" class="flex items-center">
                                                         <input type="checkbox" id="painter" name="skills[]"
                                                             value="PAINTER/ARTIST" class="mr-2"
                                                             aria-label="Painter or Artist"
                                                             {{ in_array('PAINTER/ARTIST', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Painter/Artist
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="computerLiteracy" class="flex items-center">
                                                         <input type="checkbox" id="computerLiteracy" name="skills[]"
                                                             value="COMPUTER LITERATE" class="mr-2"
                                                             aria-label="Computer Literate"
                                                             {{ in_array('COMPUTER LITERATE', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Computer Literate
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="paintingJobs" class="flex items-center">
                                                         <input type="checkbox" id="paintingJobs" name="skills[]"
                                                             value="PAINTING JOBS" class="mr-2"
                                                             aria-label="Painting Jobs"
                                                             {{ in_array('PAINTING JOBS', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Painting Jobs
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="domesticChores" class="flex items-center">
                                                         <input type="checkbox" id="domesticChores" name="skills[]"
                                                             value="DOMESTIC CHORES" class="mr-2"
                                                             aria-label="Domestic Chores"
                                                             {{ in_array('DOMESTIC CHORES', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
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
                                                             {{ in_array('PHOTOGRAPHY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Photography
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="driving" class="flex items-center">
                                                         <input type="checkbox" id="driving" name="skills[]"
                                                             value="DRIVING" class="mr-2" aria-label="Driving"
                                                             {{ in_array('DRIVING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Driving
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="sewingDresses" class="flex items-center">
                                                         <input type="checkbox" id="sewingDresses" name="skills[]"
                                                             value="SEWING DRESSES" class="mr-2"
                                                             aria-label="Sewing Dresses"
                                                             {{ in_array('SEWING DRESSES', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Sewing Dresses
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="electrician" class="flex items-center">
                                                         <input type="checkbox" id="electrician" name="skills[]"
                                                             value="ELECTRICIAN" class="mr-2"
                                                             aria-label="Electrician"
                                                             {{ in_array('ELECTRICIAN', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Electrician
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="stenography" class="flex items-center">
                                                         <input type="checkbox" id="stenography" name="skills[]"
                                                             value="STENOGRAPHY" class="mr-2"
                                                             aria-label="Stenography"
                                                             {{ in_array('STENOGRAPHY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Stenography
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="embroidery" class="flex items-center">
                                                         <input type="checkbox" id="embroidery" name="skills[]"
                                                             value="EMBROIDERY" class="mr-2"
                                                             aria-label="Embroidery"
                                                             {{ in_array('EMBROIDERY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Embroidery
                                                     </label>
                                                 </div>
                                                 <div class="mt-6">
                                                     <label for="tailoring" class="flex items-center">
                                                         <input type="checkbox" id="tailoring" name="skills[]"
                                                             value="TAILORING" class="mr-2" aria-label="Tailoring"
                                                             {{ in_array('TAILORING', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
                                                         Tailoring
                                                     </label>
                                                 </div>

                                                 <div class="mt-6">
                                                     <label for="masonry" class="flex items-center">
                                                         <input type="checkbox" id="masonry" name="skills[]"
                                                             value="MASONRY" class="mr-2" aria-label="Masonry"
                                                             {{ in_array('MASONRY', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}>
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
                                                             {{ in_array('OTHER_SKILLS', old('skills', $formData5['skills'] ?? [])) ? 'checked' : '' }}
                                                             onchange="toggleTextBox()">
                                                         Other:
                                                     </label>
                                                     <br>
                                                 </div>
                                                 @error('skills')
                                                     <div class="text-red-600 mt-1">{{ $message }}</div>
                                                 @enderror
                                                 <textarea type="text" id="otherSkills" name="otherSkills" tabindex="0" aria-label="Others textarea"
                                                     class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                     {{ in_array('OTHER_SKILLS', old('skills', $formData8['skills'] ?? [])) ? '' : 'disabled' }}>{{ old('otherSkills', $formData8['otherSkills'] ?? '') }}</textarea>
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
                                     <a href="{{ route('jobpreferences') }}"
                                         aria-label=" {{ __('messages.previous') }}"
                                         class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                                         {{ __('messages.previous') }}</a>
                                     <button type="submit" aria-label=" {{ __('messages.save') }}"
                                         class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                         {{ __('messages.save') }}</button>
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
