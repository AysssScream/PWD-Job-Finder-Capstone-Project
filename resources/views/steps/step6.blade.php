      <!DOCTYPE html>
      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
          <link rel="stylesheet" href="/css/steps.css">

      </head>
      <div class="py-12">
        <div class="container max-w-full pr-6 pl-6 mx-auto">
              <div class="flex justify-center">
                  <div class="w-full p-6">
                      <form action="{{ route('educationalbg') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @if ($errors->any())
                              <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                                  role="alert">
                                  <strong class="font-bold dark:text-white">Oops!</strong>
                                  <span class="block sm:inline dark:text-white">There were some errors with your
                                      submission:</span>
                                  <ul class="mt-3 list-disc list-inside text-sm">
                                      @foreach ($errors->all() as $error)
                                          <li class="dark:text-white">{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                              <br>
                          @endif

                          <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-3d rounded-lg mb-4"
                              id="step6">
                              @php
                                  $currentStep = 6; // Set this dynamically based on your current step
                                  $totalSteps = 7; // Total number of steps (adjusted to 8)
                                  $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                              @endphp

                              <!-- Gradient background for the header section -->
                              <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-t-lg shadow-lg">
                                  <h3 class="text-2xl text-white font-bold mb-4 inline-flex items-center justify-between w-full 
                                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                      aria-label="{{ __('messages.steps.step_6') }} {{ $percentage }}%;"
                                      tabindex="0">

                                      {{ __('messages.steps.step_6') }}

                                      <!-- Progress bar -->
                                      <div
                                          class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 w-full sm:w-auto">
                                          <div
                                              class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                              <div class="absolute top-0 left-0 h-2 bg-gradient-to-r from-green-400 to-green-600 rounded-full transition-all ease-in-out duration-500"
                                                  style="width: {{ $percentage }}%;"></div>
                                          </div>

                                          <!-- Step progress information -->
                                          <div class="text-md text-white font-semibold mt-2 sm:mt-0">
                                              Step {{ $currentStep }}/{{ $totalSteps }} :
                                              <span class="text-white">{{ $percentage }}%</span>
                                          </div>
                                      </div>
                                  </h3>

                                  <!-- Breadcrumb navigation -->
                                  <div>
                                      <nav class="text-sm" aria-label="Breadcrumb">
                                          <ol class="list-none p-0 inline-flex">
                                              <li class="flex items-center">
                                                  <!-- Back arrow icon -->
                                                  <i class="fas fa-arrow-left mr-2 text-white 
                                                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                      aria-label="Go Back to {{ __('messages.steps.step_5') }}"
                                                      tabindex="0"></i>

                                                  <!-- "Language Proficiency and Other Skills" link -->
                                                  <a href="{{ route('dialect') }}"
                                                      aria-label="{{ __('messages.steps.step_5') }}"
                                                      class="text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                      {{ __('messages.steps.step_5') }}
                                                  </a>
                                                  <span class="mx-2 text-white">/</span>
                                              </li>
                                              <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  aria-label="{{ __('messages.steps.step_6') }}" tabindex="0">
                                                  <span
                                                      class="text-white font-semibold">{{ __('messages.steps.step_6') }}</span>
                                              </li>
                                          </ol>
                                      </nav>
                                  </div>

                                  <!-- Horizontal rule for separation -->
                                  <hr class="border-t-2 border-white rounded-full my-4">
                              </div>

                              <div class="p-3 shadow-lg rounded-b-lg border-4 border-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                  tabindex="0" aria-label=" {!! __('messages.education.instruction') !!}">
                                  <span class="text-md font-regular" style="text-align: justify;">
                                      {!! __('messages.education.instruction') !!}
                                  </span>
                              </div>

                              <div class="p-6 pt-0">
                                  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                      <div>
                                          @include('layouts.dropdown')

                                      </div>
                                      <div>
                                          <div class="mt-6">
                                              <label for="educationLevel"
                                                  class="block mb-1">{{ __('messages.education.highest_educational_attainment') }}
                                                  <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                              <select id="educationLevel" name="educationLevel"
                                                  class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  autocomplete="on" 
                                                  aria-label="{{ __('messages.education.highest_educational_attainment') }} {{ old('educationLevel', $formData6['educationLevel'] ?? '') }}">
                                                  <option value="" selected disabled>Select Education Level...
                                                  </option>
                                                  <option value="Doctoral Degree (Ph.D. or equivalent)"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Doctoral Degree (Ph.D. or equivalent)' ? 'selected' : '' }}>
                                                      {{ __('messages.education.doctoral_degree') }}
                                                  </option>
                                                  <option value="Professional Degree"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Professional Degree' ? 'selected' : '' }}>
                                                      {{ __('messages.education.professional_degree') }}
                                                  <option value="Master's Degree"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == "Master's Degree" ? 'selected' : '' }}>
                                                      {{ __('messages.education.masters_degree') }}
                                                  </option>
                                                  <option value="Bachelor's Degree"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == "Bachelor's Degree" ? 'selected' : '' }}>
                                                      {{ __('messages.education.bachelors_degree') }}
                                                  </option>
                                                  <option value="College Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'College Graduate' ? 'selected' : '' }}>
                                                      {{ __('messages.education.college_graduate') }}
                                                  </option>
                                                  <option value="Associate's Degree"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == "Associate's Degree" ? 'selected' : '' }}>
                                                      {{ __('messages.education.associates_degree') }}
                                                  </option>
                                                  <option value="Vocational Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
                                                      {{ __('messages.education.vocational_graduate') }}
                                                  </option>
                                                  <option value="Some College Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Some College Level' ? 'selected' : '' }}>
                                                      {{ __('messages.education.some_college_level') }}
                                                  </option>
                                                  <option value="Vocational Undergraduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                                                      {{ __('messages.education.vocational_undergraduate') }}
                                                  </option>
                                                  <option value="Senior High School Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Senior High School Graduate' ? 'selected' : '' }}>
                                                      {{ __('messages.education.senior_high_school_graduate') }}
                                                  </option>
                                                  <option value="Senior High School Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Senior High School Level' ? 'selected' : '' }}>
                                                      {{ __('messages.education.senior_high_school_level') }}
                                                  </option>
                                                  <option value="Junior High School Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Junior High School Graduate' ? 'selected' : '' }}>
                                                      {{ __('messages.education.junior_high_school_graduate') }}
                                                  </option>
                                                  <option value="Junior High School Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Junior High School Level' ? 'selected' : '' }}>
                                                      {{ __('messages.education.junior_high_school_level') }}
                                                  </option>
                                              </select>
                                              @error('educationLevel')
                                                  <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                  </div>
                                              @enderror
                                          </div>



                                          <div class="mt-6">
                                              <label for="school"
                                                  class="block mb-1">{{ __('messages.education.school_graduated') }}</label>
                                              <input type="text" id="school" name="school"
                                                  aria-label="{{ __('messages.education.school_graduated') }} {{ old('school', $formData6['school'] ?? '') }}"
                                                  placeholder="Jose Rizal University"
                                                  class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  title="Please enter alphabetic characters only"
                                                  value="{{ old('school', $formData6['school'] ?? '') }}" />
                                              @error('school')
                                                  <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                  </div>
                                              @enderror
                                          </div>

                                          <div class="mt-6">
                                              <label for="course"
                                                  class="block mb-1">{{ __('messages.education.course') }}</label>
                                              <input type="text" id="course" name="course"
                                                  aria-label="{{ __('messages.education.course') }} {{ old('course', $formData6['course'] ?? '') }}"
                                                  placeholder="Bachelor of Science in Information Technology"
                                                  class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  value="{{ old('course', $formData6['course'] ?? '') }}" />
                                              @error('course')
                                                  <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                  </div>
                                              @enderror
                                          </div>

                                          <div class="mt-6">
                                              <label for="yearGraduated"
                                                  class="block mb-1">{{ __('messages.education.year_graduated') }}</label>
                                              <input type="number" id="yearGraduated" name="yearGraduated"
                                                  aria-label="{{ __('messages.education.year_graduated') }} {{ old('yearGraduated', $formData6['yearGraduated'] ?? '') }}"
                                                  class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg 0 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  min="1900" max="2099" placeholder="Year Graduated"
                                                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                  maxlength="4"
                                                  value="{{ old('yearGraduated', $formData6['yearGraduated'] ?? '') }}" />
                                              @error('yearGraduated')
                                                  <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                  </div>
                                              @enderror
                                          </div>
                                      </div>
                                      <div>

                                          <div class="mt-6">
                                              <label for="awards"
                                                  class="block mb-1">{{ __('messages.education.awards') }}</label>
                                              <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
                                                  aria-label="{{ __('messages.education.awards') }} {{ old('awards', $formData6['awards'] ?? '') }}"
                                                  class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">{{ old('awards', $formData6['awards'] ?? '') }}</textarea>
                                              @error('awards')
                                                  <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                  </div>
                                              @enderror
                                          </div>


                                          <!-- Table to display the entered certifications -->
                                          <div class="mt-6 relative">
                                                <label for="certifications" class="block mb-1">{{ __('messages.education.certifications') }}</label>
                                                <input type="text" id="certifications" name="certifications"
                                                    aria-label="{{ __('messages.education.certifications') }}"
                                                    placeholder="Ex. National Certificate II in Electrical Installation"
                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    oninput="fetchSuggestions(this.value)" autocomplete="off" />
                                                    <!-- Instructional Text -->
                                                    <p class="text-xs text-gray-400 dark:text-gray-500 italic mt-1">
                                                        Press Enter, and the certification will appear in the textbox below.
                                                    </p>
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

                                          <!-- Table to display the entered certifications -->
                                          <table id="certificationsTable"
                                              class="min-w-full mt-6 border border-gray-300 dark:border-gray-600">
                                              <thead class="bg-gray-100 dark:bg-gray-800">
                                                  <tr>
                                                      <th
                                                          class="border border-gray-400 px-4 py-2 dark:border-gray-600 dark:text-gray-100">
                                                          <i class="fas fa-certificate mr-2"></i>
                                                          Certifications
                                                      </th>
                                                      <th
                                                          class="border border-gray-400 px-4 py-2 dark:border-gray-600 dark:text-gray-100">
                                                          Actions
                                                      </th>
                                                  </tr>
                                              </thead>
                                              <tbody class="bg-white dark:bg-gray-900">
                                              </tbody>
                                          </table>


                                          <div class="mt-6 flex">
                                            <textarea id="appendedCertifications"
                                              name="appendedCertifications"
                                              aria-label="Appended Certifications {{ old('appendedCertifications', $formData6['appendedCertifications'] ?? '') }}"
                                              placeholder="Certifications will appear here..."
                                              class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                              readonly>{{ old('appendedCertifications', $formData6['appendedCertifications'] ?? '') }}</textarea>


                                              <!-- Clear Button -->
                                              <button type="button" id="clearCertifications" aria-label="Clear"
                                                  class="ml-3 px-4 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-400">
                                                  Clear
                                              </button>

                                          </div>
                                          @error('appendedCertifications')
                                              <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                          @enderror

                                         <script>
                                            const inputField = document.getElementById('certifications');
                                            const appendedCertificationsField = document.getElementById('appendedCertifications');
                                            const tableBody = document.querySelector('#certificationsTable tbody');
                                        
                                            inputField.addEventListener('keypress', function(event) {
                                                if (event.key === 'Enter') {
                                                    event.preventDefault(); // Prevent the default form submission
                                        
                                                    const certificationValue = inputField.value.trim();
                                                    if (certificationValue) {
                                                        // Check if the certification is already in the appendedCertificationsField
                                                        const certificationsList = appendedCertificationsField.value.split(', ');
                                                        if (certificationsList.includes(certificationValue)) {
                                                            alert("Certification already added."); // Show alert if value already exists
                                                            return;
                                                        }
                                        
                                                        // Create a new row for the table
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
                                        
                                                            // Remove the certification from appendedCertificationsField
                                                            const updatedList = appendedCertificationsField.value.split(', ').filter(
                                                                item => item !== certificationValue
                                                            );
                                                            appendedCertificationsField.value = updatedList.join(', ');
                                                        });
                                                        actionCell.appendChild(deleteButton);
                                                        newRow.appendChild(actionCell);
                                        
                                                        // Append the new row to the table
                                                        tableBody.appendChild(newRow);
                                        
                                                        // Append the certification to appendedCertificationsField
                                                        if (appendedCertificationsField.value) {
                                                            appendedCertificationsField.value += ', ' + certificationValue;
                                                        } else {
                                                            appendedCertificationsField.value = certificationValue;
                                                        }
                                        
                                                        inputField.value = '';
                                                    } else {
                                                        alert("Please enter a certification."); // Optional alert for empty input
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



                                        
                                      </div>
                                  </div>
                                  <div class="mt-4 text-right">
                                      <a href="{{ route('dialect') }}" aria-label="{{ __('messages.previous') }}"
                                          class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                                          {{ __('messages.previous') }}</a>

                                      <button type="submit" aria-label=" {{ __('messages.save') }}"
                                          class="inline-block py-2 px-4 bg-green-700 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                          {{ __('messages.save') }}</button>
                                  </div>
                              </div>
                          </div>
                          
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const educationLevelSelect = document.getElementById('educationLevel');
        const schoolInput = document.getElementById('school');
        const courseInput = document.getElementById('course');
        const yearGraduatedInput = document.getElementById('yearGraduated');
        const certificationsInput = document.getElementById('certifications');
        const form = document.querySelector('form');
        
        // Degrees that require "Year Graduated" validation
        const degreesRequiringYear = [
            "Doctoral Degree (Ph.D. or equivalent)",
            "Professional Degree",
            "Master's Degree",
            "Bachelor's Degree",
            "College Graduate",
            "Associate's Degree",
            "Vocational Graduate"  // Added "Vocational Graduate" here
        ];

        function checkRequiredFields() {
            if (educationLevelSelect.value === "") {
                educationLevelSelect.classList.add('border-red-500');
            } else {
                educationLevelSelect.classList.remove('border-red-500');
            }

            if (schoolInput.value.trim() === "") {
                schoolInput.classList.add('border-red-500');
            } else {
                schoolInput.classList.remove('border-red-500');
            }

            if (courseInput.value.trim() === "") {
                courseInput.classList.add('border-red-500');
            } else {
                courseInput.classList.remove('border-red-500');
            }

            // Check if selected degree requires Year Graduated and if it's empty
            if (degreesRequiringYear.includes(educationLevelSelect.value) && yearGraduatedInput.value.trim() === "") {
                yearGraduatedInput.classList.add('border-red-500');
            } else {
                yearGraduatedInput.classList.remove('border-red-500');
            }

            // Check if "Vocational Graduate" is selected and certifications are empty
            if (educationLevelSelect.value === "Vocational Graduate" && certificationsInput.value.trim() === "") {
                certificationsInput.classList.add('border-red-500');
            } else {
                certificationsInput.classList.remove('border-red-500');
            }
        }

        checkRequiredFields();

        form.addEventListener('submit', function(event) {
            checkRequiredFields();
            if (
                educationLevelSelect.value === "" || 
                schoolInput.value.trim() === "" || 
                courseInput.value.trim() === "" || 
                (degreesRequiringYear.includes(educationLevelSelect.value) && yearGraduatedInput.value.trim() === "") ||
                (educationLevelSelect.value === "Vocational Graduate" && certificationsInput.value.trim() === "")
            ) {
                event.preventDefault(); // Prevent form submission if any required field is empty
                alert("Please fill out all required fields, including National Certificates for Vocational Graduates and Year Graduated if applicable.");
            }
        });

        educationLevelSelect.addEventListener('change', checkRequiredFields);
        schoolInput.addEventListener('input', checkRequiredFields);
        courseInput.addEventListener('input', checkRequiredFields);
        yearGraduatedInput.addEventListener('input', checkRequiredFields);
        certificationsInput.addEventListener('input', checkRequiredFields);
    });
</script>

<style>
    .border-red-500 {
        border-color: #dc2626 !important;
        border-width: 2px !important;
    }
</style>




