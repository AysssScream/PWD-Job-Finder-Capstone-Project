<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/steps.css">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
        <title>Edit Employment</title>
    </head>
    <div class="py-12">
        <div class="container mx-auto  ">
            <div class="flex justify-center">
                <div class="max-w-full p-6">
                    <div
                        class=" container-wrapper  bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-4 rounded-t-lg">
                            <h3 class="text-2xl font-bold inline-flex items-center justify-start w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 text-white bg-gradient-to-r from-orange-500 to-red-500 p-2 rounded-md"
                                tabindex="0"
                                aria-label="{{ __('messages.workexperience.update_employment_history') }}">
                                <i class="fas fa-pencil-alt mr-2"></i> <!-- Font Awesome Icon on the left -->
                                {{ __('messages.workexperience.update_employment_history') }}
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-400 dark:border-gray-700">
                                <div class="flex items-center justify-between  ">
                                    <h2 class="font-semibold  text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                        <a href="{{ route('profile.edit') }}"
                                            class="text-lg  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-arrow-left mr-1"></i>
                                            {{ __('messages.workexperience.go_back_to_profile') }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                @if ($workExperiences->isEmpty())
                                    <p class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0" aria-label="No work experiences found">No work experiences found.
                                    </p>
                                @else
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>{{ __('messages.workexperience.actions') }}</th>
                                                <th>{{ __('messages.workexperience.company_name') }}</th>
                                                <th>{{ __('messages.workexperience.company_address') }}</th>
                                                <th>{{ __('messages.workexperience.position_held') }}</th>
                                                <th>{{ __('messages.workexperience.skills_gained') }}</th>
                                                <th>{{ __('messages.workexperience.employment_status') }}</th>
                                                <th>{{ __('messages.workexperience.from') }}</th>
                                                <th>{{ __('messages.workexperience.to') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="mt-6">
                                                @each('components.work-experience-row', $workExperiences, 'workExperience')
                                            </div>

                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            <form id="workExperienceForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mt-6">
                                            <label for="employerName"
                                                class="block mb-1">{{ __('messages.workexperience.company_name') }}</label>
                                            <input type="text" id="employerName" name="employerName"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                placeholder="Ex. XYZ Tech Solutions"
                                                value="{{ old('employerName', $formData3['employerName'] ?? '') }}" />
                                            @error('employerName')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="employerAddress"
                                                class="block mb-1">{{ __('messages.workexperience.company_address') }}</label>
                                            <input type="text" id="employerAddress" name="employerAddress"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                placeholder="Ex. Street Name, Building, House. No"
                                                value="{{ old('employerAddress', $formData3['employerAddress'] ?? '') }}"
                                                placeholder="Ex. 17 San Miguel Ave, San Antonio, Pasig, 1605 Metro Manila" />
                                            @error('employerAddress')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="positionHeld"
                                                class="block mb-1">{{ __('messages.workexperience.position_held') }}</label>
                                            <input type="text" id="positionHeld" name="positionHeld"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder=" Ex. Web Developer"
                                                value="{{ old('positionHeld', $formData3['positionHeld'] ?? '') }}" />
                                            @error('positionHeld')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="skillSearch"
                                                class="block mb-1">{{ __('messages.workexperience.skills_gained') }}
                                                (Press
                                                <b>Enter</b> to Add Items)</label>
                                            <input type="text" id="skillSearch" name="skillSearch[]"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                list="skillSuggestions"
                                                placeholder="Ex. Soft Skills, Bilingual Communication">
                                            <div id="skillSuggestions" class="mt-2 grid grid-cols-3 gap-2">
                                            </div>

                                            </datalist>
                                            @error('skillSearch')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-6">
                                            <label for="fromDate" class="block mb-1">{!! __('messages.workexperience.from') !!}</label>
                                            <input type="date" id="fromDate" name="fromDate"
                                                aria-label="{!! __('messages.workexperience.from') !!}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="{{ old('fromDate', $formData3['fromDate'] ?? '') }}"
                                                onkeydown="return disableKeys(event)" />
                                            @error('fromDate')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="toDate" class="block mb-1">{!! __('messages.workexperience.to') !!}</label>
                                            <input type="date" id="toDate" name="toDate"
                                                aria-label="{!! __('messages.workexperience.to') !!}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="{{ old('toDate', $formData3['toDate'] ?? '') }}"
                                                onkeydown="return disableKeys(event)" />
                                            @error('toDate')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="employmentStatus"
                                                class="block mb-1">{{ __('messages.workexperience.employment_status') }}</label>
                                            <select id="employmentStatus" name="employmentStatus"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="" selected disabled>Select status...
                                                </option>
                                                <option value="Employed"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Employed' ? 'selected' : '' }}>
                                                    Employed
                                                </option>
                                                <option value="Unemployed"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Unemployed' ? 'selected' : '' }}>
                                                    Unemployed
                                                </option>
                                                <option value="Self Employed"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Self Employed' ? 'selected' : '' }}>
                                                    Self Employed
                                                </option>
                                                <option value="Retired"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Retired' ? 'selected' : '' }}>
                                                    Retired
                                                </option>
                                                <option value="Resign"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Resign' ? 'selected' : '' }}>
                                                    Resign
                                                </option>
                                                <option value="Returning OFW"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Returning OFW' ? 'selected' : '' }}>
                                                    Returning OFW
                                                </option>
                                                <option value="Displaced Worker"
                                                    {{ old('employment-type', $formData3['employmentStatus'] ?? '') == 'Displaced Worker' ? 'selected' : '' }}>
                                                    Displaced Worker
                                                </option>
                                            </select>
                                            @error('employmentStatus')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <table id="skillTable"
                                                class="w-full border-collapse border border-gray-400">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="p-2 border border-gray-400 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                            Skills</th>
                                                        <th
                                                            class="p-2 border border-gray-400 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                            Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="skillTableBody">
                                                    <!-- Skills rows will be dynamically added here -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-4 mt-6">
                                            <label for="hiddenInput"
                                                class="block text-lg font-medium text-black-700">{{ __('messages.workexperience.selected_skills') }}</label>
                                            <textarea id="hiddenInput" name="hiddenInput"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-400 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 sm:text-sm"
                                                readonly>{{ old('hiddenInput', $formData3['hiddenInput'] ?? '') }}</textarea>

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4 flex flex-col sm:flex-row justify-end">
                                    <a id="clearFormDataButton"
                                        class="inline-block py-2 px-4 bg-black text-white text-center rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-0 sm:mr-4 mb-2 sm:mb-0"
                                        tabindex="0"
                                        aria-label="{{ __('messages.workexperience.clear_records') }}">
                                        {{ __('messages.workexperience.clear_records') }}
                                    </a>

                                    <button type="submit" id="submitButton"
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{{ __('messages.workexperience.add_work_experience') }}">
                                        {{ __('messages.workexperience.add_work_experience') }}
                                    </button>
                                </div>


                        </div>
                    </div>
                    </form>

                    <div class="mt-12">
                        <div class="container mx-auto">
                            <div class="flex justify-center">
                                <div class="w-full">
                                    <form action="{{ route('editemployment') }}" method="POST"
                                        enctype="multipart/form-data" onclick="clearLocalStorage()">
                                        @csrf
                                        <script>
                                            function clearLocalStorage() {
                                                localStorage.removeItem('formData');
                                            }
                                        </script>
                                        <div
                                            class="container-wrapper bg-white text-black dark:bg-gray-800 dark:text-gray-200 text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg">
                                                <h3 class="text-2xl text-white font-bold mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"
                                                    aria-label="{{ __('messages.workexperience.new_submitted_work_experience') }}">
                                                    <i class="fas fa-briefcase mr-2"></i>
                                                    <!-- Example icon: briefcase -->
                                                    {{ __('messages.workexperience.new_submitted_work_experience') }}
                                                </h3>
                                            </div>

                                            <div class="p-6">
                                                <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                                    <div class="overflow-x-auto">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead
                                                                class="bg-gray-200 text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.actions') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.company_name') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.company_address') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.position_held') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.skills_gained') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.from') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.to') }}
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                                                        {{ __('messages.workexperience.employment_status') }}
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
                                                    <div>
                                                        <div class="mt-4 flex flex-col sm:flex-row justify-end">
                                                            <a href="{{ route('profile.edit') }}"
                                                                aria-label="Go Back to Settings"
                                                                class="inline-block py-2 px-4 bg-black text-white text-center rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-0 sm:mr-4 mb-2 sm:mb-0">
                                                                Go Back to Settings
                                                            </a>
                                                            <button type="submit" aria-label="Save Applications"
                                                                class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                                Save Application
                                                            </button>
                                                        </div>
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

                    <!-- Validation Modal -->
                    <div id="validationModal"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 p-4 hidden">
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                            <div class="flex justify-between items-center mb-4">
                                <h2 id="formMessage" class="text-2xl font-bold text-gray-800 dark:text-white">
                                    <i class="fas fa-briefcase mr-2"></i> Add Work Experience
                                </h2>
                                <button id="modalCloseButton"
                                    class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                            <!-- Modal Body -->
                            <div class="modal-body mt-4">
                                <p id="modalMessage" class="text-black dark:text-white mb-6">
                                    <!-- Dynamic content will be inserted here -->
                                </p>
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex justify-end mt-6">
                                <button id="modalClose"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full shadow-lg">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>

</x-app-layout>

<script>
    function isValidInput(input, regex) {
        return regex.test(input);
    }

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

            let missingFields = [];

            if (!employerName) missingFields.push('Company Name');
            if (!employerAddress) missingFields.push('Company Address');
            if (!positionHeld) missingFields.push('Position Held');
            if (!fromDate) missingFields.push('Start Date');
            if (!toDate) missingFields.push('End Date');
            if (!employmentStatus) missingFields.push('Employment Status');

            if (missingFields.length > 0) {
                let message = 'Please fill out the following required fields: ' + missingFields.join(
                    ', ') + '.';
                displayModal(message);
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

            displayModal('Form Data Saved Successfully!');

            loadData();
        });


        function displayModal(message) {
            if (message === 'Form Data Saved Successfully!') {
                modalMessage.innerHTML = '<i class="fas fa-check-circle text-green-500 mr-2"></i>' + message;
            } else {
                modalMessage.innerHTML = '<i class="fas fa-info-circle text-yellow-500 mr-2"></i>' +
                    message; // Info sign for other messages
            }

            // Show modal and overlay
            modalOverlay.classList.remove('hidden');
            validationModal.classList.remove('hidden');

            // Add event listeners for closing the modal
            modalCloseButton.addEventListener('click', closeModal);
            modalClose.addEventListener('click', closeModal);

            // Prevent the default action when pressing "Enter" on the close button
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
                                   <td class="px-6 py-4 whitespace-nowrap border border-gray-400 ">
                                        <button onclick="deleteRow(event, this)"
                                                class="bg-red-500  hover:bg-red-600 text-white font-regular py-2 px-4 rounded focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" 
                                                aria-label="{{ __('messages.workexperience.delete') }}">
                                        {{ __('messages.workexperience.delete') }}                                       
                                        </button>
                                    </td>
                                  <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600" >
                                        <div class="font-medium text-gray-900 dark:text-gray-200 focus:ring-4 focus:outline-none focus:ring-orange-400 focus:border-orange-400" tabindex="0" >${formData.employerName}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.employerAddress}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.positionHeld}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.skillSearch}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.fromDate}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.toDate}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-400 dark:border-gray-600">
                                        <div class="text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">${formData.employmentStatus}</div>
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

        fetch("/userskills/registlistofskills.txt")
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
