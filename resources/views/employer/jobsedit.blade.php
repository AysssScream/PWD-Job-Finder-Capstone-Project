<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Edit Jobs</title>

    </head>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto max-w-7xl px-4 pt-5 ">

            </div>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-1">

                <!-- Second Column (Occupies More Space) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg p-6  ">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('jobinfos.update', $job->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="bg-red-100 dark:bg-red-700 dark:text-gray-200 border border-red-400 text-red-700 px-4 py-3 rounded relative"
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
                            <!-- Top Buttons -->
                            <div
                                class="flex flex-col md:flex-row justify-between mb-4 space-y-4 md:space-y-0 md:space-x-4">
                                <a href="{{ route('employer.manage') }}"
                                    class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>Back to Job Lists</span>
                                </a>
                                <!-- Save Button -->
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                                    Save Job Details
                                </button>
                            </div>

                            <div class="mb-4 p-2">
                                <label for="job_title"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Job Title</label>
                                <input type="text" id="job_title" name="job_title" autocomplete="off"
                                    placeholder="Enter job title" value="{{ $job->title }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">

                                @error('job_title')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group flex space-x-4 p-2">
                                <!-- Minimum Age -->
                                <div class="w-1/2">
                                    <label for="min_age">Minimum Age</label>
                                    <input type="number" name="min_age"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        id="min_age" value="{{ $job->min_age }}" required>
                                    @error('min_age')
                                        <small class="text-red-600 mt-1">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Maximum Age -->
                                <div class="w-1/2">
                                    <label for="max_age">Maximum Age</label>
                                    <input type="number" name="max_age"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        id="max_age" value="{{ $job->max_age }}" required>
                                    @error('max_age')
                                        <small class="text-red-600 mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <!-- Job Type -->
                            <div class="mb-4 p-2">
                                <label for="job_type"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Job Type</label>
                                <select id="job_type" name="job_type"
                                    class="form-select mt-1 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                    <option value="">Select job type</option>
                                    <option value="Full-Time" {{ $job->job_type == 'Full-Time' ? 'selected' : '' }}>
                                        Full Time</option>
                                    <option value="Part-Time" {{ $job->job_type == 'Part-Time' ? 'selected' : '' }}>
                                        Part Time</option>
                                    <option value="Probationary"
                                        {{ $job->job_type == 'Probationary' ? 'selected' : '' }}>
                                        Probationary</option>
                                    <option value="Contractual"
                                        {{ $job->job_type == 'Contractual' ? 'selected' : '' }}>
                                        Contractual</option>
                                </select>
                                @error('job_type')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Salary -->
                            <div class="mb-4 p-2">
                                <label for="salary"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Salary</label>
                                <input type="text" id="salary" name="salary" autocomplete="off"
                                    placeholder="Enter salary" value="{{ $job->salary }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                @error('salary')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Educational Level -->
                            <div class="mb-4 p-2">
                                <label for="educationLevel"
                                    class="block mb-1">{{ __('messages.education.highest_educational_attainment') }}</label>
                                <select id="educationLevel" name="educationLevel"
                                    class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    autocomplete="on"
                                    aria-label="{{ __('messages.education.highest_educational_attainment') }}">
                                    <option value="" selected disabled>{{ $job->educational_level }}</option>
                                    @php
                                        $educationLevels = [
                                            'Doctoral Degree' => __('messages.education.doctoral_degree'),
                                            "Master's Degree" => __('messages.education.masters_degree'),
                                            'College Graduate' => __('messages.education.college_graduate'),
                                            "Bachelor's Degree" => __('messages.education.bachelors_degree'),
                                            'Vocational Graduate' => __('messages.education.vocational_graduate'),
                                            "Associate's Degree" => __('messages.education.associates_degree'),
                                            'Some College Level' => __('messages.education.some_college_level'),
                                            'Vocational Undergraduate' => __(
                                                'messages.education.vocational_undergraduate',
                                            ),
                                            'Technical-Vocational Education and Training' => __(
                                                'messages.education.technical_vocational_training',
                                            ),
                                            'Senior High School' => __('messages.education.senior_high_school'),
                                            'Junior High School' => __('messages.education.junior_high_school'),
                                            'Elementary School' => __('messages.education.elementary_school'),
                                        ];
                                    @endphp

                                    @foreach ($educationLevels as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ old('educationLevel', $job->educational_level ?? '') == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('educationLevel')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- <!-- Location -->
                            <div class="mt-4 p-2 ">
                                <label for="local-location"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Work
                                    Location</label>
                                <div class="flex">
                                    <input type="text" id="local-location" name="local-location"
                                        class="flex-1 p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        pattern="[A-Za-z\sñ]+" title="Please enter alphabetic characters only"
                                        placeholder="Ex. Makati, MM" value="{{ $job->location }}"readonly />
                                    <button id="editLocationButton" type="button"
                                        class="ml-2 px-3 py-1 bg-blue-500 text-white rounded">Edit</button>
                                </div>
                                <div id="local-location-suggestions"
                                    class="absolute z-10 w-1/6 mt-1 max-h-40 overflow-y-auto bg-white text-black dark:bg-gray-800 dark:text-gray-200 border rounded shadow-md hidden">
                                </div>
                                <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                    fetching location data</div>

                                <input type="text" id="localLocationHidden" name="localLocation"
                                    value="{{ old('local-location') }}" hidden />
                                @error('local-location')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div> --}}


                            <div class="mt-6 relative p-2">
                                <label for="local-location" class="block mb-1">
                                    Work Location
                                </label>
                                <div class="flex items-center space-x-2">
                                    <!-- Dropdown (Select) for Local Location -->
                                    <select id="local-location" name="local-location" aria-label="Work Location"
                                        class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">

                                    </select>

                                    <!-- Clear Button -->
                                    <button id="clearLocationButton" type="button" aria-label="Clear"
                                        class="ml-2   px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                        Clear
                                    </button>
                                </div>

                                <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                    fetching location data</div>
                                <input type="text" id="localLocationHidden" name="localLocation"
                                    value="{{ old('local-location', $job->location ?? '') }}" hidden />
                                @error('localLocation')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4 p-2">
                                <label for="description"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="form-textarea p-2 mt-1 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                    placeholder="Enter job description">{{ $job->description }}</textarea>
                                @error('description')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Benefits -->
                            <div class="mb-4 p-2">
                                <label for="benefits"
                                    class="block p-2 text-md font-medium text-gray-800 dark:text-gray-300">Benefits</label>
                                <textarea id="benefits" name="benefits" rows="4"
                                    class="form-textarea mt-1 p-2 block w-full rounded-md border-gray-500  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                    placeholder="Enter job benefits">{{ $job->benefits }}</textarea>
                                @error('benefits')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Responsibilities
                            <div class="mb-4 p-2">
                                <label for="responsibilitySearch"
                                    class="block p-2 text-md font-medium text-gray-800 dark:text-gray-300">
                                    Responsibilities (Press <b>Enter</b> to Add Items)
                                </label>
                                <input type="text" id="responsibilitySearch" name="responsibilitySearch[]"
                                    class="w-full p-2 border rounded bg-gray-100 text-gray-800 placeholder-gray-500 
                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                    list="responsibilitySuggestions"
                                    placeholder="The applicants should have experience in the following areas.">
                                <div id="responsibilitySuggestions" class="mt-2 grid grid-cols-3 gap-2"></div>
                            </div> -->


                            <div class="mt-6 overflow-x-auto" hidden>
                                <table id="responsibilityTable"
                                    class="w-full border-collapse p-2 border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6">
                                                Responsibilities
                                            </th>
                                            <th class="p-2 border border-gray-200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="responsibilityTableBody">
                                        <!-- Responsibilities rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>


                            <div class="mb-4 p-2">
                                <label for="hiddenResponsibilitiesInput"
                                    class="block text-sm font-medium text-black-700">Selected
                                    Responsibilities (Seperate it using , - • ):</label>
                                <textarea id="hiddenResponsibilitiesInput" name="hiddenResponsibilitiesInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border border-gray-300 rounded-md  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">{{ $job->responsibilities }}</textarea>
                                @error('hiddenResponsibilitiesInput')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>




                            <!-- Qualifications

                            <div class="mb-4 p-2 mt-4">
                                <label for="qualifications"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">
                                    Qualifications (Press <b>Enter</b> to Add Items)
                                </label>
                                <input type="text" id="qualificationsInput" name="qualifications"
                                    class="form-input mt-1 p-2 block w-full rounded-md bg-gray-100 text-gray-800 placeholder-gray-500 
                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                    placeholder="Enter job qualifications">
                                @error('qualificationsInput')
    <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
@enderror
                            </div>-->


                            <div class="mt-6 overflow-x-auto" hidden>
                                <table id="qualificationsTable"
                                    class="w-full border-collapse p-2 border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6">
                                                Qualifications
                                            </th>
                                            <th class="p-2 border border-gray-200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qualificationsTableBody">
                                        <!-- Qualifications rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>


                            <div class="mb-4 p-2">
                                <label for="hiddenQualificationsInputt"
                                    class="block text-sm font-medium text-gray-800 dark:text-gray-300">Selected
                                    Qualifications (Seperate it using , - • ):</label>
                                <textarea id="hiddenQualificationsInput" name="hiddenQualificationsInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border border-gray-300 rounded-md  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">{{ $job->qualifications }}</textarea>
                                @error('hiddenQualificationsInput')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Vacancy -->
                            <div class="mb-4 p-2">
                                <label for="vacancy"
                                    class="block text-md font-medium text-gray-800 dark:text-gray-300">Vacancy</label>
                                <input type="number" id="vacancy" name="vacancy" autocomplete="off"
                                    placeholder="Enter number of vacancies" value="{{ $job->vacancy }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 shadow-sm  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                @error('vacancy')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var responsibilitySearch = document.getElementById('responsibilitySearch');
        var responsibilityTableBody = document.getElementById('responsibilityTableBody');
        var hiddenInput = document.getElementById('hiddenResponsibilitiesInput');

        responsibilitySearch.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var responsibilities = responsibilitySearch.value.split(',').map(function(
                    responsibility) {
                    return responsibility.trim();
                });

                // Clear the input field
                responsibilitySearch.value = '';

                // Add each responsibility as a new row in the table
                responsibilities.forEach(function(responsibility) {
                    if (responsibility && responsibilityTableBody.rows.length < 5 && !
                        isResponsibilityDuplicate(responsibility)) {
                        var row = responsibilityTableBody.insertRow();
                        var cell = row.insertCell();

                        cell.className = 'p-2 border border-gray-200';
                        cell.style.maxWidth = '500px'; // Example: Adjust max-width as needed
                        cell.style.wordWrap = 'break-word'; // Ensures text wraps within cell
                        cell.innerHTML = responsibility.replace(/\n/g,
                            '<br>'); // Replace newlines with <br> for multi-line effect
                        cell.textContent = responsibility;

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-100 flex justify-center items-center ';
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                            'rounded');
                        removeButton.addEventListener('click', function() {
                            responsibilityTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else if (isResponsibilityDuplicate(responsibility)) {
                        alert('Responsibility "' + responsibility + '" is already added.');
                    }
                });

                // Update hidden input with responsibilities
                updateHiddenInput();
            }
        });

        function isResponsibilityDuplicate(responsibility) {
            var rows = responsibilityTableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === responsibility.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenInput() {
            // Convert the rows of the table to an array of responsibilities
            var responsibilities = Array.from(responsibilityTableBody.rows).map(function(row) {
                // Extract the text content of the first cell of each row and trim whitespace
                return `• ${row.cells[0].textContent.trim()}\n`; // Using '•' for bullet point
            }).join('');

            // Set the value of the hiddenInput textarea with responsibilities in bullet form
            hiddenInput.value = responsibilities;
        }

    });



    document.addEventListener('DOMContentLoaded', function() {
        var qualificationsInput = document.getElementById('qualificationsInput');
        var qualificationsTableBody = document.getElementById('qualificationsTableBody');
        var hiddenQualificationsInput = document.getElementById('hiddenQualificationsInput');

        qualificationsInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var qualifications = qualificationsInput.value.trim();

                if (qualifications) {
                    qualificationsInput.value = '';

                    if (!isQualificationsDuplicate(qualifications)) {
                        var row = qualificationsTableBody.insertRow();

                        var cell = row.insertCell();
                        cell.className = 'p-2 border border-gray-200';
                        cell.style.maxWidth = '500px'; // Example: Adjust max-width as needed
                        cell.style.wordWrap = 'break-word'; // Ensures text wraps within cell
                        cell.innerHTML = qualifications.replace(/\n/g,
                            '<br>');

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-200 flex justify-center items-center'; // Flexbox utility classes for centering
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded';
                        removeButton.addEventListener('click', function() {
                            qualificationsTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenQualificationsInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else {
                        alert('Qualifications "' + qualifications + '" is already added.');
                    }

                    updateHiddenQualificationsInput();
                }
            }
        });

        function isQualificationsDuplicate(qualifications) {
            var rows = qualificationsTableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === qualifications.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenQualificationsInput() {
            // Convert the rows of the qualifications table to an array of qualifications
            var qualifications = Array.from(qualificationsTableBody.rows).map(function(row) {
                return `• ${row.cells[0].textContent.trim()}\n`; // Using '•' for bullet point
            }).join('');

            hiddenQualificationsInput.value = qualifications;
        }

    });


    //CITIES
    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('local-location');
        const clearButton = document.getElementById('clearLocationButton');
        const localLocationHidden = document.getElementById('localLocationHidden');
        const errorDiv = document.getElementById('local-location-error');

        let citiesData = []; // Array to store cities data fetched from API

        // Fetch cities data from the API
        fetch('/locations/cities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                citiesData = data.filter(city => city.province === 'MM' && city.city);

                // Populate the dropdown with filtered cities data
                populateLocationDropdown(citiesData);
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
                errorDiv.classList.remove('hidden');
            });


        // Populate the dropdown with location options
        function populateLocationDropdown(cities) {
            locationSelect.innerHTML =
                '<option value="" disabled selected>Select a Location</option>'; // Default option

            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = `${city.name}, ${city.province}`;
                option.textContent = `${city.name}, ${city.province}`;
                locationSelect.appendChild(option);
            });

            // Set selected value to the saved location if available
            if (localLocationHidden.value) {
                locationSelect.value = localLocationHidden.value;
            }

            // Update hidden input value on selection change
            locationSelect.addEventListener('change', function() {
                localLocationHidden.value = this.value;
            });
        }

        // Clear button functionality
        clearButton.addEventListener('click', function() {
            locationSelect.value = ''; // Clear the dropdown selection
            localLocationHidden.value = ''; // Clear the hidden input field
        });

        // Edit button functionality (optional if you want to include it)
        const editLocationButton = document.getElementById('editLocationButton');
        if (editLocationButton) {
            editLocationButton.addEventListener('click', function() {
                locationSelect.removeAttribute('disabled'); // Enable dropdown for editing
                locationSelect.focus(); // Focus on the select field
            });
        }
    });


    //COUNTRIES
    document.addEventListener('DOMContentLoaded', function() {
        const overseasLocationSelect = document.getElementById('overseas-location');
        const overseasLocationHidden = document.getElementById('overseaslocationHidden');
        const clearOverseasLocationButton = document.getElementById('clearOverseasLocationButton');
        const errorDiv = document.getElementById('overseas-location-error');

        // Fetch countries data from the JSON file
        fetch('/locations/countries.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Populate the dropdown with country options
                overseasLocationSelect.innerHTML =
                    '<option value="" disabled selected>Select an Overseas Location</option>';
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.country;
                    option.textContent = country.country;
                    overseasLocationSelect.appendChild(option);
                });

                // Set the selected value to the hidden input if available
                if (overseasLocationHidden.value) {
                    overseasLocationSelect.value = overseasLocationHidden.value;
                }

                // Update hidden input value on dropdown change
                overseasLocationSelect.addEventListener('change', function() {
                    overseasLocationHidden.value = this.value;
                });
            })
            .catch(error => {
                console.error('Error fetching country data:', error);
                errorDiv.classList.remove('hidden');
            });

        // Clear button functionality
        clearOverseasLocationButton.addEventListener('click', function() {
            overseasLocationSelect.value = ''; // Clear the dropdown selection
            overseasLocationHidden.value = ''; // Clear the hidden input field
        });
    });


    // document.addEventListener('DOMContentLoaded', function() {
    //     const localLocationInput = document.getElementById('local-location');
    //     const localLocationHidden = document.getElementById('localLocationHidden');
    //     const suggestionsContainer = document.getElementById('local-location-suggestions');
    //     const editLocationButton = document.getElementById('editLocationButton');
    //     const errorDiv = document.getElementById('local-location-error');

    //     let citiesData = []; // Array to store cities data fetched from API

    //     fetch('/locations/cities.json')
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             citiesData = data;

    //             // Event listener for input changes
    //             localLocationInput.addEventListener('input', function() {
    //                 const query = this.value.trim().toLowerCase();
    //                 const filteredCities = citiesData.filter(city =>
    //                     city.name.toLowerCase().includes(query)
    //                 ).slice(0, 6); // Limit to 10 results

    //                 renderSuggestions(filteredCities, query);
    //             });
    //         })
    //         .catch(error => {
    //             console.error('Error fetching city data:', error);
    //             errorDiv.classList.remove('hidden');
    //         });

    //     editLocationButton.addEventListener('click', function() {
    //         localLocationInput.value = ''; // Clear input value
    //         localLocationInput.focus(); // Set focus on input field
    //         localLocationInput.removeAttribute('readonly');
    //         suggestionsContainer.style.display = 'none'; // Hide suggestions
    //         editLocationButton.style.display = 'none'; // Show edit button
    //         localLocationHidden.value = ``

    //     });



    //     function renderSuggestions(cities, query) {
    //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
    //         suggestionsContainer.style.display = cities.length && query ? 'block' : 'none';

    //         cities.forEach(city => {
    //             const suggestionElement = document.createElement('div');
    //             suggestionElement.classList.add('suggestion', 'dark:bg-gray-800',
    //                 'dark:text-white'); // Example dark mode classes

    //             const suggestionText = document.createElement('div');
    //             suggestionText.classList.add('suggestion-text');
    //             suggestionText.textContent =
    //                 `${city.name}, ${city.province}`; // Display city name and province

    //             const plusContainer = document.createElement('div');
    //             plusContainer.classList.add('plus-container', 'dark:bg-gray-600',
    //                 'dark:text-gray-200'); // Example dark mode classes
    //             plusContainer.innerHTML = '+';

    //             suggestionElement.appendChild(suggestionText);
    //             suggestionElement.appendChild(plusContainer);

    //             suggestionElement.addEventListener('click', function() {
    //                 localLocationInput.value =
    //                     `${city.name}, ${city.province}`; // Set input value to city name
    //                 suggestionsContainer.style.display =
    //                     'none'; // Hide suggestions after selection
    //                 editLocationButton.style.display = 'inline-block'; // Show edit button
    //                 localLocationHidden.value = `${city.name}, ${city.province}`
    //                 localLocationInput.readOnly = true;
    //             });
    //             suggestionsContainer.appendChild(suggestionElement);
    //         });
    //     }

    //     /* Handle outside click to hide suggestions
    //     document.addEventListener('click', function(event) {
    //         if (!document.getElementById('local-location-container').contains(event.target)) {
    //             suggestionsContainer.style.display = 'none';
    //         }
    //     });*/

    //     document.addEventListener('DOMContentLoaded', function() {
    //         document.addEventListener('click', function(event) {
    //             const localLocationContainer = document.getElementById(
    //                 'local-location-container');
    //             const suggestionsContainer = document.getElementById('suggestionsContainer');

    //             if (localLocationContainer && suggestionsContainer) {
    //                 if (!localLocationContainer.contains(event.target)) {
    //                     suggestionsContainer.style.display = 'none';
    //                 }
    //             } else {
    //                 console.error(
    //                     'Local location container or suggestions container not found.');
    //             }
    //         });
    //     });


    //     document.addEventListener('DOMContentLoaded', function() {
    //         document.addEventListener('click', function(event) {
    //             const localLocationContainer = document.getElementById(
    //                 'local-location-container');
    //             const suggestionsContainer = document.getElementById('suggestionsContainer');

    //             if (localLocationContainer && suggestionsContainer) {
    //                 if (!localLocationContainer.contains(event.target)) {
    //                     suggestionsContainer.style.display = 'none';
    //                 }
    //             } else {
    //                 console.error(
    //                     'Local location container or suggestions container not found.');
    //             }
    //         });
    //     });

    // });


    function clearFormFields() {
        // Clear job type select
        document.getElementById('job_title').value = '';
        document.getElementById('job_type').value = '';
        document.getElementById('salary').value = '';
        document.getElementById('educationLevel').value = '';
        document.getElementById('local-location').value = '';
        document.getElementById('description').value = '';
        document.getElementById('benefits').value = '';
        document.getElementById('responsibilitySearch').value = '';
        document.getElementById('responsibilityTableBody').innerHTML = '';
        document.getElementById('hiddenResponsibilitiesInput').value = '';
        document.getElementById('qualificationsInput').value = '';
        document.getElementById('qualificationsTableBody').innerHTML = '';
        document.getElementById('hiddenQualificationsInput').value = '';
        document.getElementById('vacancy').value = '';
    }
</script>


</script>
<style>
    .suggestion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        cursor: pointer;
        border-radius: 4px;
        margin-bottom: 4px;
    }

    .suggestion-text {
        flex: 1;
    }

    .plus-container {
        background-color: #5cb85c;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        margin-left: 8px;
    }

    .plus-container:hover {
        background-color: #4cae4c;
    }
</style>
