<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>
    @if (Session::has('addjobs'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("{{ Session::get('addjobs') }}", 'Job Successfully Saved.', {
                    timeOut: 5000
                });

            });
        </script>
    @endif

    <div class="py-12">
        <div class="container mx-auto max-w-7xl px-4 pt-5 ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('employer.manage') }}"
                                    class="text-gray-800 dark:text-gray-300 flex items-center">
                                    <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>
                                    <span>Back to Job Lists</span>
                                </a>
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:gap-4 lg:grid-cols-3">
                <!-- First Column -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1">
                    <div class="w-full h-full p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-bold mb-4">Recently Added Jobs</h2>
                        <div class="h-4/6 sm:h-full overflow-y-auto p-5 rounded-lg custom-scrollbar">
                            @foreach ($jobs as $job)
                                <div class="container p-5 bg-gray-100 dark:bg-gray-700 mb-3 rounded-lg custom-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                                        {{ $job->title }}
                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-200 mb-4">{{ $job->job_type }} |
                                        {{ $job->location }}</p>
                                    <p class="text-gray-700 dark:text-gray-200 mb-4">{{ $job->description }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-200">
                                        {{ $job->created_at->format('F j, Y') }}</p>
                                    <div class="mt-4 flex justify-end">
                                        <a href="{{ route('employer.edit', $job->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white dark:text-gray-900 px-3 py-1 rounded shadow">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- Second Column (Occupies More Space) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('jobinfos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="bg-red-100 dark:bg-red-700 dark:text-gray-200 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">There were some errors with your
                                        submission:</span>
                                    <ul class="mt-3 list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif
                            <!-- Top Buttons -->
                            <div class="flex justify-end mb-4 space-x-4">



                                <!-- Clear Button -->
                                <button type="button"
                                    class="bg-red-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm"
                                    onclick="clearFormFields()">
                                    Clear Fields
                                </button>

                                <!-- Save Button -->
                                <button type="submit"
                                    class="bg-green-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                                    Add Job
                                </button>

                            </div>
                            <div class="mb-4 p-2">
                                <label for="job_title"
                                    class="block text-md font-medium text-gray-700 dark:text-gray-200">Job
                                    Title</label>
                                <input type="text" id="job_title" name="job_title" autocomplete="off"
                                    placeholder="Enter job title" value="{{ old('job_title') }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300">
                                @error('job_title')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Job Type -->
                            <div class="mb-4 p-2">
                                <label for="job_type"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Job
                                    Type</label>
                                <select id="job_type" name="job_type"
                                    class="form-select mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                                    <option value="">Select job type</option>
                                    <option value="Full-Time" {{ old('job_type') == 'Full-Time' ? 'selected' : '' }}>
                                        Full Time</option>
                                    <option value="Part-Time" {{ old('job_type') == 'Part-Time' ? 'selected' : '' }}>
                                        Part Time</option>
                                    <option value="Probationary"
                                        {{ old('job_type') == 'Probationary' ? 'selected' : '' }}>
                                        Probationary</option>
                                    <option value="Contractual"
                                        {{ old('job_type') == 'Contractual' ? 'selected' : '' }}>
                                        Contractual</option>
                                </select>
                                @error('job_type')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Salary -->
                            <div class="mb-4 p-2">
                                <label for="salary"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Salary</label>
                                <input type="number" id="salary" name="salary" autocomplete="off"
                                    placeholder="Enter salary" value="{{ old('salary') }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 p-2">
                                @error('salary')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Educational Level -->
                            <div class="mb-4 p-2">
                                <label for="educationLevel"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Educational
                                    Level Requirement</label>
                                <select id="educationLevel" name="educationLevel"
                                    class="w-full p-2 border rounded border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    autocomplete="on">
                                    <option value="" disabled>Select Education Level...</option>
                                    <option value="Primary School"
                                        {{ old('educationLevel') == 'Primary School' ? 'selected' : '' }}>Primary
                                        School</option>
                                    <option value="Elementary"
                                        {{ old('educationLevel') == 'Elementary' ? 'selected' : '' }}>Elementary
                                    </option>
                                    <option value="Junior High School"
                                        {{ old('educationLevel') == 'Junior High School' ? 'selected' : '' }}>
                                        Junior
                                        High School</option>
                                    <option value="Senior High School"
                                        {{ old('educationLevel') == 'Senior High School' ? 'selected' : '' }}>
                                        Senior
                                        High School</option>
                                    <option value="Associate's Degree Level"
                                        {{ old('educationLevel') == "Associate's Degree Level" ? 'selected' : '' }}>
                                        Associate's Degree Level</option>
                                    <option value="Some College Level"
                                        {{ old('educationLevel') == 'Some College Level' ? 'selected' : '' }}>Some
                                        College Level</option>
                                    <option value="College Graduate"
                                        {{ old('educationLevel') == 'College Graduate' ? 'selected' : '' }}>College
                                        Graduate</option>
                                    <option value="Vocational Graduate"
                                        {{ old('educationLevel') == 'Vocational Graduate' ? 'selected' : '' }}>
                                        Vocational Graduate</option>
                                    <option value="Vocational Undergraduate"
                                        {{ old('educationLevel') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                                        Vocational Undergraduate</option>
                                    <option value="Bachelor's Degree Level"
                                        {{ old('educationLevel') == "Bachelor's Degree Level" ? 'selected' : '' }}>
                                        Bachelor's Degree Level</option>
                                    <option value="Masteral Degree Level"
                                        {{ old('educationLevel') == 'Masteral Degree Level' ? 'selected' : '' }}>
                                        Masteral Degree Level</option>
                                    <option value="Doctoral Degree Level"
                                        {{ old('educationLevel') == 'Doctoral Degree Level' ? 'selected' : '' }}>
                                        Doctoral Degree Level</option>
                                </select>
                                @error('educationLevel')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="mt-4 p-2 ">
                                <label for="local-location"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Work
                                    Location</label>
                                <div class="flex">
                                    <input type="text" id="local-location" name="local-location"
                                        class="flex-1 p-2 border rounded shadow-sm border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                        pattern="[A-Za-z\sñ]+" title="Please enter alphabetic characters only"
                                        placeholder="Ex. Makati, MM" value="{{ old('local-location') }}"readonly />
                                    <button id="editLocationButton" type="button"
                                        class="ml-2 px-3 py-1 bg-blue-500 text-white rounded">Edit</button>
                                </div>
                                <div id="local-location-suggestions"
                                    class="absolute z-10 w-1/6 mt-1 max-h-40 overflow-y-auto bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border rounded shadow-md hidden">
                                </div>
                                <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                    fetching location data</div>

                                <input type="text" id="localLocationHidden" name="localLocation"
                                    value="{{ old('local-location') }}" hidden />
                                @error('local-location')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4 p-2">
                                <label for="description"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="form-textarea p-2 mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Enter job description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Benefits -->
                            <div class="mb-4 p-2">
                                <label for="benefits"
                                    class="block p-2 text-md font-medium  text-gray-700 dark:text-gray-200">Benefits</label>
                                <textarea id="benefits" name="benefits" rows="4"
                                    class="form-textarea mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    placeholder="Enter job benefits">{{ old('benefits') }}</textarea>
                                @error('benefits')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Responsibilities -->
                            <div class="mb-4 p-2">
                                <label for="responsibilitySearch"
                                    class="block p-2 text-md font-medium  text-gray-700 dark:text-gray-200">Responsibilities
                                    (Press
                                    <b>Enter</b> to
                                    Add Items)</label>
                                <input type="text" id="responsibilitySearch" name="responsibilitySearch[]"
                                    class="w-full p-2 border rounded p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    list="responsibilitySuggestions"
                                    placeholder="The applicants should have experience in the following areas.">
                                <div id="responsibilitySuggestions" class="mt-2 grid  grid-cols-3 gap-2"></div>


                            </div>
                            <div class="mt-6 overflow-x-auto p-2">
                                <table id="responsibilityTable"
                                    class="w-full border-collapse p-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                                    <thead>
                                        <tr class="bg-gray-100 dark:bg-gray-700">
                                            <th
                                                class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6 text-gray-700 dark:text-gray-300">
                                                Responsibilities
                                            </th>
                                            <th class="p-2 border border-gray-200 text-gray-700 dark:text-gray-300">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="responsibilityTableBody"
                                        class="divide-y divide-gray-200 dark:divide-gray-600">
                                        <!-- Responsibilities rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>



                            <div class="mb-4 p-2">
                                <label for="hiddenInput"
                                    class="block text-sm font-medium  text-gray-700 dark:text-gray-200">Selected
                                    Responsibilities: </label>
                                <textarea id="hiddenInput" name="hiddenInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 rounded-lg"
                                    readonly>{{ old('hiddenInput') }}</textarea>
                                @error('hiddenInput')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Qualifications -->

                            <div class="mb-4 p-2 mt-4">
                                <label for="qualifications"
                                    class="block text-md font-medium text-gray-700 dark:text-gray-200">Qualifications
                                    (Press
                                    <b>Enter</b> to
                                    Add Items)</label>
                                <input type="text" id="qualificationsInput" name="qualifications"
                                    class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    placeholder="Enter job qualifications">
                                @error('qualificationsInput')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mt-6 overflow-x-auto p-2">
                                <table id="qualificationsTable"
                                    class="w-full border-collapse p-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                                    <thead>
                                        <tr class="bg-gray-100 dark:bg-gray-700">
                                            <th class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6">
                                                Qualifications
                                            </th>
                                            <th class="p-2 border border-gray-200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qualificationsTableBody"
                                        class="divide-y divide-gray-700 dark:divide-gray-600">
                                        <!-- Qualifications rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>


                            <div class="mb-4 p-2">
                                <label for="hiddenQualificationsInput"
                                    class="block text-sm font-medium  text-gray-700 dark:text-gray-200">
                                    Selected Qualifications:
                                </label>
                                <textarea id="hiddenQualificationsInput" name="hiddenQualificationsInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border border-gray-300 dark:border-gray-600 
                     rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 
                     dark:bg-gray-900 dark:text-gray-300"
                                    readonly>{{ old('hiddenQualificationsInput') }}</textarea>
                                @error('hiddenQualificationsInput')
                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-4 p-2">
                                <label for="vacancy"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Vacancy</label>
                                <input type="number" id="vacancy" name="vacancy" autocomplete="off"
                                    placeholder="Enter number of vacancies" value="{{ old('vacancy') }}"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 
                  shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300">
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
        var hiddenInput = document.getElementById('hiddenInput');

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
        const localLocationInput = document.getElementById('local-location');
        const localLocationHidden = document.getElementById('localLocationHidden');
        const suggestionsContainer = document.getElementById('local-location-suggestions');
        const editLocationButton = document.getElementById('editLocationButton');
        const errorDiv = document.getElementById('local-location-error');

        let citiesData = []; // Array to store cities data fetched from API

        fetch('/locations/cities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                citiesData = data;

                // Event listener for input changes
                localLocationInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();
                    const filteredCities = citiesData.filter(city =>
                        city.name.toLowerCase().includes(query)
                    ).slice(0, 6); // Limit to 10 results

                    renderSuggestions(filteredCities, query);
                });
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
                errorDiv.classList.remove('hidden');
            });

        editLocationButton.addEventListener('click', function() {
            localLocationInput.value = ''; // Clear input value
            localLocationInput.focus(); // Set focus on input field
            localLocationInput.removeAttribute('readonly');
            suggestionsContainer.style.display = 'none'; // Hide suggestions
            editLocationButton.style.display = 'none'; // Show edit button
            localLocationHidden.value = ``

        });



        function renderSuggestions(cities, query) {
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            suggestionsContainer.style.display = cities.length && query ? 'block' : 'none';

            cities.forEach(city => {
                const suggestionElement = document.createElement('div');
                suggestionElement.classList.add('suggestion', 'dark:bg-gray-800',
                    'dark:text-white'); // Example dark mode classes

                const suggestionText = document.createElement('div');
                suggestionText.classList.add('suggestion-text');
                suggestionText.textContent =
                    `${city.name}, ${city.province}`; // Display city name and province

                const plusContainer = document.createElement('div');
                plusContainer.classList.add('plus-container', 'dark:bg-gray-600',
                    'dark:text-gray-200'); // Example dark mode classes
                plusContainer.innerHTML = '+';

                suggestionElement.appendChild(suggestionText);
                suggestionElement.appendChild(plusContainer);

                suggestionElement.addEventListener('click', function() {
                    localLocationInput.value =
                        `${city.name}, ${city.province}`; // Set input value to city name
                    suggestionsContainer.style.display =
                        'none'; // Hide suggestions after selection
                    editLocationButton.style.display = 'inline-block'; // Show edit button
                    localLocationHidden.value = `${city.name}, ${city.province}`
                    localLocationInput.readOnly = true;
                });
                suggestionsContainer.appendChild(suggestionElement);
            });
        }

        /* Handle outside click to hide suggestions
        document.addEventListener('click', function(event) {
            if (!document.getElementById('local-location-container').contains(event.target)) {
                suggestionsContainer.style.display = 'none';
            }
        });*/
    });



    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(event) {
            const localLocationContainer = document.getElementById('local-location-container');
            const suggestionsContainer = document.getElementById('suggestionsContainer');

            if (localLocationContainer && suggestionsContainer) {
                if (!localLocationContainer.contains(event.target)) {
                    suggestionsContainer.style.display = 'none';
                }
            } else {
                console.error('Local location container or suggestions container not found.');
            }
        });



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
            document.getElementById('hiddenInput').value = '';
            document.getElementById('qualificationsInput').value = '';
            document.getElementById('qualificationsTableBody').innerHTML = '';
            document.getElementById('hiddenQualificationsInput').value = '';
            document.getElementById('vacancy').value = '';
        }
    });
</script>


</script>
<style>
    .suggestion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        background-color: white;
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

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(155, 155, 155, 0.5) rgba(255, 255, 255, 0.2);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(155, 155, 155, 0.5);
        border-radius: 8px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .custom-shadow {
        /* Box Shadow */
        box-shadow: 0 4px 6px rgba(0, 0, 0.4, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        /* Transition for smooth hover effect (optional) */
        transition: box-shadow 0.3s ease;
    }

    .custom-shadow:hover {
        /* Adjust shadow on hover if desired */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.08);
    }
</style>
