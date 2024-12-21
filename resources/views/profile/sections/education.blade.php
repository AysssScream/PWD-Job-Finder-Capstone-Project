 <h2 class="text-2xl font-bold mb-2">EDUCATIONAL BACKGROUND</h2>
 <hr class="border-bottom border-2 border-primary mb-4">
 <form action="{{ route('profile.update.education-info') }}" method="POST">
     @csrf
     @method('PATCH')
     <div class="mt-6">
         <label for="educationLevel"
             class="block mb-1">{{ __('messages.education.highest_educational_attainment') }}</label>
         <select id="educationLevel" name="educationLevel" 
             class="w-full p-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md "
             autocomplete="on"
             aria-label="{{ __('messages.education.highest_educational_attainment') }} {{ old('educationLevel', $education->educationLevel ?? '') }}">
             <option value="" selected disabled>Select Education Level...</option>
             <option value="Doctoral Degree (Ph.D. or equivalent)"
                 {{ old('educationLevel', $$education->educationLevel ?? '') == 'Doctoral Degree (Ph.D. or equivalent)' ? 'selected' : '' }}>
                 {{ __('messages.education.doctoral_degree') }}
             </option>
             <option value="Professional Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Professional Degree' ? 'selected' : '' }}>
                 {{ __('messages.education.professional_degree') }}
             <option value="Master's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Master's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.masters_degree') }}
             </option>
             <option value="Bachelor's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Bachelor's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.bachelors_degree') }}
             </option>
             <option value="College Graduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'College Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.college_graduate') }}
             </option>
             <option value="Associate's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Associate's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.associates_degree') }}
             </option>
             <option value="Vocational Graduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.vocational_graduate') }}
             </option>
             <option value="Some College Level"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Some College Level' ? 'selected' : '' }}>
                 {{ __('messages.education.some_college_level') }}
             </option>
             <option value="Vocational Undergraduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                 {{ __('messages.education.vocational_undergraduate') }}
             </option>
             <option value="Senior High School Graduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.senior_high_school_graduate') }}
             </option>
             <option value="Senior High School Level"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School Level' ? 'selected' : '' }}>
                 {{ __('messages.education.senior_high_school_level') }}
             </option>
             <option value="Junior High School Graduate"
                 {{ old('educationLevel', $$education->educationLevel ?? '') == 'Junior High School Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.junior_high_school_graduate') }}
             </option>
             <option value="Junior High School Level"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Junior High School Level' ? 'selected' : '' }}>
                 {{ __('messages.education.junior_high_school_level') }}
             </option>
         </select>
         @error('educationLevel')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="school" class="block mb-1">{{ __('messages.education.school_graduated') }}
         </label>
         <input type="text" id="school" name="school" placeholder="Jose Rizal University"
             class="w-full p-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
             title="Please enter alphabetic characters only" value="{{ old('school', $education->school ?? '') }}"
             aria-label="{{ __('messages.education.school_graduated') }} {{ old('school', $education->school ?? '') }}" />
         @error('school')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="course" class="block mb-1">{{ __('messages.education.course') }}</label>
         <input type="text" id="course" name="course" placeholder="Bachelor of Science in Information Technology"
             class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
             value="{{ old('course', $education->course ?? '') }}"
             aria-label="{{ __('messages.education.course') }} {{ old('course', $education->course ?? '') }}" />
         @error('course')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="yearGraduated" class="block mb-1">{{ __('messages.education.year_graduated') }}</label>
         <input type="number" id="yearGraduated" name="yearGraduated"
             class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
             min="1900" max="2099" placeholder="Year Graduated"
             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
             maxlength="4" value="{{ old('yearGraduated', $education->yearGraduated ?? '') }}"
             aria-label="{{ __('messages.education.year_graduated') }} {{ old('yearGraduated', $education->yearGraduated ?? '') }}" />
         @error('yearGraduated')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="awards" class="block mb-1">{{ __('messages.education.awards') }}</label>
         <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
             class="w-full p-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
             aria-label="{{ __('messages.education.awards') }} {{ old('awards', $education->awards ?? '') }}">{{ old('awards', $education->awards ?? '') }}</textarea>
         @error('awards')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

        <div class="mt-6 relative">
            <label for="certifications" class="block mb-1">{{ __('messages.education.certifications') }}</label>
            <input type="text" id="certifications" name="certifications"
                aria-label="{{ __('messages.education.certifications') }}"
                placeholder="Ex. National Certificate II in Electrical Installation"
                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                oninput="fetchSuggestions(this.value)" autocomplete="off" />
            <div id="certification-suggestions" class="absolute bg-white border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg mt-1 w-full hidden max-h-48 overflow-y-auto z-10"></div>
        </div>

        <script>
            async function fetchSuggestions(query) {
                const suggestionBox = document.getElementById('certification-suggestions');
                suggestionBox.innerHTML = ''; 
                if (query.length < 2) {
                    suggestionBox.classList.add('hidden'); 
                    return;
                }
                try {
                    const response = await fetch('/certificates/Certificates.txt');
                    const text = await response.text();
                    const certifications = text.split('\n').filter(line => line.trim() !== '');
                    const suggestions = certifications.filter(certification =>
                        certification.toLowerCase().includes(query.toLowerCase())
                    ).slice(0, 10); 
                    if (suggestions.length > 0) {
                        suggestionBox.classList.remove('hidden');
                        suggestions.forEach(item => {
                            const option = document.createElement('div');
                            option.className = "p-2 bg-gray-100 dark:bg-gray-800 bg-gray-hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer";
                            option.textContent = item;
                            option.addEventListener('click', () => {
                                document.getElementById('certifications').value = item;
                                suggestionBox.classList.add('hidden'); // Hide the suggestion box
                            });
                            suggestionBox.appendChild(option);
                        });
                    } else {
                        suggestionBox.classList.add('hidden');
                    }
                } catch (error) {
                    console.error('Error fetching suggestions:', error);
                }
            }
            document.addEventListener('click', (event) => {
                const suggestionBox = document.getElementById('certification-suggestions');
                if (!suggestionBox.contains(event.target) && event.target.id !== 'certifications') {
                    suggestionBox.classList.add('hidden');
                }
            });
        </script>


    
     <table id="certificationsTable" class="min-w-full mt-6 border border-gray-300 dark:border-gray-600">
         <thead class="bg-gray-100 dark:bg-gray-800">
             <tr>
                 <th class="border border-gray-400 px-4 py-2 dark:border-gray-600 dark:text-gray-100">
                     <i class="fas fa-certificate mr-2"></i>
                     Certifications
                 </th>
                 <th class="border border-gray-400 px-4 py-2 dark:border-gray-600 dark:text-gray-100">
                     Actions
                 </th>
             </tr>
         </thead>
         <tbody class="bg-white dark:bg-gray-900">
         </tbody>
     </table>


     <div class="mt-6 flex">
         <textarea id="appendedCertifications" name="appendedCertifications"
          aria-label="Appended Certifications {{ old('appendedCertifications', $education->certifications ?? '') }}"
          placeholder="Certifications will appear here..."
          class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
          readonly>{{ old('appendedCertifications', $education->certifications ?? '') }}</textarea>

         <button type="button" id="clearCertifications" aria-label="Clear"
             class="ml-3 px-4 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-400">
             Clear
         </button>
     </div>
     @error('appendedCertifications')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror



     <script>
        const inputField = document.getElementById('certifications');
        const appendedCertificationsField = document.getElementById('appendedCertifications');
        const tableBody = document.querySelector('#certificationsTable tbody');
        const certificationsSet = new Set(); 
        
        inputField.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); 
        
                const certificationValue = inputField.value.trim();
                if (certificationValue) {
                    if (certificationsSet.has(certificationValue)) {
                        alert('This certification has already been added.'); // Alert for duplicates
                        inputField.value = ''; 
                        return; 
                    }
        
                    certificationsSet.add(certificationValue);
        
                    const newRow = document.createElement('tr');
        
                    const certificationCell = document.createElement('td');
                    certificationCell.className =
                        'bg-gray-100 dark:bg-gray-800 text-black dark:text-white border border-gray-400 px-4 py-2';
                    certificationCell.textContent = certificationValue;
                    newRow.appendChild(certificationCell);
    
                    const actionCell = document.createElement('td');
                    actionCell.className =
                        'bg-gray-100 text-black dark:text-white dark:bg-gray-800 border border-gray-400 px-4 py-2 text-center';
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.className =
                        'bg-red-500 text-white px-2 py-1 rounded hover:bg-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-400';
                    deleteButton.addEventListener('click', function() {
                        tableBody.removeChild(newRow);
                        certificationsSet.delete(certificationValue); // Remove from the set
                        let certificationsList = appendedCertificationsField.value.split(', ').filter(
                            item => item !== certificationValue);
                        appendedCertificationsField.value = certificationsList.join(', ');
                    });
                    actionCell.appendChild(deleteButton);
                    newRow.appendChild(actionCell);
        
                    tableBody.appendChild(newRow);
        
                    if (appendedCertificationsField.value) {
                        appendedCertificationsField.value += ', ' + certificationValue;
                    } else {
                        appendedCertificationsField.value = certificationValue;
                    }
        
                    inputField.value = '';
                } else {
                    alert("Please enter a certification."); 
                }
            }
        });
     </script>

     <script>
         const clearButton = document.getElementById('clearCertifications');
         clearButton.addEventListener('click', function() {
             const appendedCertificationsField = document.getElementById('appendedCertifications');
             const tableBody = document.querySelector('#certificationsTable tbody');

             if (appendedCertificationsField) {
                 appendedCertificationsField.value = '';
             } else {
                 console.error("Element with ID 'appendedCertificationsField' not found.");
             }

             while (tableBody.firstChild) {
                 tableBody.removeChild(tableBody.firstChild);
             }

             window.alert("Certifications cleared. Please input new data.");
         });
     </script>


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
