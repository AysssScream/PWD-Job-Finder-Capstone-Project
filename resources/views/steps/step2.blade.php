    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
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
        </style>
        <link rel="stylesheet" href="/css/steps.css">
    </head>

    <div class="py-12">
        <div class="container max-w-full pr-6 pl-6 mx-auto">
            <div class="flex justify-center">
                <div class="w-full p-6">
                    <form action="{{ route('personal') }}" method="POST" enctype="multipart/form-data">
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
                            id="step2">
                            @php
                                $currentStep = 2; // Set this dynamically based on your current step
                                $totalSteps = 7; // Total number of steps (adjusted to 8)
                                $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                            @endphp

                            <!-- Gradient background for the header section -->
                            <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-t-lg shadow-lg">
                                <h3 class="text-2xl text-white font-bold mb-4 inline-flex items-center justify-between w-full 
                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.steps.step_2') }} {{ $percentage }}%;" tabindex="0">

                                    {{ __('messages.steps.step_2') }}

                                    <!-- Progress bar -->
                                    <div
                                        class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 w-full sm:w-auto">
                                        <div
                                            class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="absolute top-0 left-0 h-2  bg-gradient-to-r from-green-400 to-green-600 rounded-full transition-all ease-in-out duration-500"
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
                                                    aria-label="Go Back to {{ __('messages.steps.step_1') }}"
                                                    tabindex="0"></i>

                                                <!-- "Applicant Profile" link -->
                                                <a href="{{ route('setup') }}"
                                                    aria-label="{{ __('messages.steps.step_1') }}"
                                                    class="text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    {{ __('messages.steps.step_1') }}
                                                </a>
                                                <span class="mx-2 text-white">/</span>
                                            </li>
                                            <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="{{ __('messages.steps.step_2') }}" tabindex="0">
                                                <span
                                                    class="text-white font-semibold">{{ __('messages.steps.step_2') }}</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <!-- Horizontal rule for separation -->
                                <hr class="border-t-2 border-white rounded-full my-4">
                            </div>

                            <div class="p-3 shadow-lg rounded-b-lg border-4 border-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                tabindex="0" aria-label="{!! __('messages.personal.instruction') !!}">
                                <span class="text-md font-regular " style="text-align: justify;">
                                    {!! __('messages.personal.instruction') !!}
                                </span>
                            </div>

                            <div class="p-6 pt-0">

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                                    <div>
                                        @include('layouts.dropdown')

                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="civilStatus"
                                                class="block mb-1">{{ __('messages.personal.civil_status') }} <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <select id="civilStatus" name="civilStatus"
                                                aria-label="{{ __('messages.personal.civil_status') }}  {{ old('civilStatus', $formData2['civilStatus'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="Single"
                                                    {{ old('civilStatus', $formData2['civilStatus'] ?? '') == 'Single' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.single') }}</option>
                                                <option value="Married"
                                                    {{ old('civilStatus', $formData2['civilStatus'] ?? '') == 'Married' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.married') }}</option>
                                                <option value="Widowed"
                                                    {{ old('civilStatus', $formData2['civilStatus'] ?? '') == 'Widowed' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.widowed') }}</option>
                                            </select>
                                            @error('civilStatus')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div id="barangay-container" class="mt-6">
                                            <label for="barangay" class="block mb-1">
                                                {{ __('messages.personal.barangay') }} <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>

                                            </label>
                                            <div class="flex flex-col sm:flex-row items-center relative">
                                                <select id="barangay" name="barangay"
                                                    aria-label="{{ __('messages.personal.barangay') }} {{ old('barangayLocation', $formData2['barangayLocation'] ?? '') }}"
                                                    class="w-full sm:flex-1 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    <option value="" disabled>Select a Barangay</option>
                                                </select>

                                                <button id="clearBarangayButton" type="button" aria-label="Clear"
                                                    class="w-full sm:w-auto mt-4 sm:mt-0 sm:ml-4 p-3 bg-red-700 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>

                                            <input type="text" id="barangayLocation" name="barangayLocation"
                                                aria-label="Barangay Location"
                                                value="{{ old('barangayLocation', $formData2['barangayLocation'] ?? '') }}"
                                                hidden />
                                            <!-- Error Message -->
                                            <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching
                                                barangay data</div>
                                            @error('barangayLocation')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="mt-6">
                                            <label for="zipcode"
                                                class="block mb-1">{{ __('messages.personal.zipcode') }} <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                            <div class="flex items-center mt-4">
                                                <input type="text" id="zipcode" name="zipcode"
                                                    aria-label="{{ __('messages.personal.zipcode') }} {{ old('zipcode', $formData2['zipcode'] ?? '') }}"
                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    value="{{ old('zipcode', $formData2['zipcode'] ?? '') }}"
                                                    placeholder="Enter Zip Code" readonly />
                                                <!-- Add disabled attribute here -->
                                                @error('zipCode')
                                                    <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mt-6">
                                            <label for="presentAddress"
                                                class="block mb-1">{{ __('messages.personal.present_address') }} <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <input type="text" id="presentAddress" name="presentAddress"
                                                aria-label="{{ __('messages.personal.present_address') }} {{ old('presentAddress', $formData2['presentAddress'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                placeholder="Ex. Street Name, Building, House. No"
                                                value="{{ old('presentAddress', $formData2['presentAddress'] ?? '') }}" />
                                            @error('presentAddress')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <div class="mt-6">

                                                <div class="mt-6">
                                                    <label for="tin"
                                                        class="block mb-1">{{ __('messages.personal.saved_tin') }}</label>
                                                    <input type="text" id="tin" name="tin"
                                                        aria-label="Tax Identification Number (TIN) {{ old('tin', $formData2['tin'] ?? '') }}"
                                                        value="{{ old('tin', $formData2['tin'] ?? '') }}"
                                                        maxlength="9"
                                                        class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg   focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                        placeholder="(9 Digits)">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="mt-6">
                                            <label for="religion"
                                                class="block mb-1">{{ __('messages.personal.religion') }}</label>
                                            <select id="religion" name="religion"
                                                aria-label="{{ __('messages.personal.religion') }} {{ old('religion', $formData2['religion'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="" disabled>Please select...</option>
                                                <option value="Roman Catholic"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Roman Catholic' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.roman_catholic') }}
                                                </option>
                                                <option value="Iglesia Ni Cristo"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Iglesia Ni Cristo' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.iglesia_ni_cristo') }}
                                                </option>
                                                <option value="Islam"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Islam' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.islam') }}
                                                </option>
                                                <option value="Philippine Independent Church"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Philippine Independent Church' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.philippine_independent_church') }}
                                                </option>
                                                <option value="Seventh Day Adventist Church"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Seventh Day Adventist Church' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.seventh_day_adventist_church') }}
                                                </option>
                                                <option value="Others"
                                                    {{ old('religion', $formData2['religion'] ?? '') == 'Others' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.others') }}
                                                </option>
                                            </select>
                                            @error('religion')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-6">
                                            <label for="landlineNo" class="block mb-1">Landline No.</label>
                                            <input type="text" id="landlineNo" name="landlineNo" maxlength="8"
                                                aria-label="Landline Number {{ old('landlineNo', $formData2['landlineNo'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[0-9]+"
                                                title="Please enter numerical characters only"value="{{ old('landlineNo', $formData2['landlineNo'] ?? '') }}"
                                                placeholder="89839463" maxlength="8" />
                                            @error('landlineNo')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="cellphoneNo" class="block mb-1">Cellphone No. <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                            <input type="text" id="cellphoneNo" name="cellphoneNo" maxlength="11"
                                                aria-label="Cellphone Number {{ old('cellphoneNo', $formData2['cellphoneNo'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                pattern="[0-9]+" title="Please enter numerical characters only"
                                                placeholder="09673411171" maxlength="11"
                                                value="{{ old('cellphoneNo', $formData2['cellphoneNo'] ?? '') }}" />
                                            @error('cellphoneNo')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label class="block mb-2">{{ __('messages.personal.4ps_beneficiary') }} <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                            <div class="flex items-center beneficiary-radio-group">
                                                <input type="radio" id="4ps-yes" name="beneficiary-4ps"
                                                    value="Yes"
                                                    aria-label="{{ __('messages.personal.4ps_beneficiary') }} Yes"
                                                    class="mr-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    {{ old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'Yes' ? 'checked' : '' }}>
                                                <label for="4ps-yes" class="mr-4">Yes</label>
                                        
                                                <input type="radio" id="4ps-no" name="beneficiary-4ps"
                                                    value="No"
                                                    aria-label="{{ __('messages.personal.4ps_beneficiary') }} No"
                                                    class="mr-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    {{ old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'No' ? 'checked' : '' }}>
                                                <label for="4ps-no">No</label>
                                            </div>
                                            @error('beneficiary-4ps')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>




                                        <div class="mt-10">
                                            <label
                                                class="block mb-2 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0"
                                                aria-label="{{ __('messages.personal.former_ofw') }}">{{ __('messages.personal.former_ofw') }}</label>
                                            <div class="my-4">
                                                <p class="mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"
                                                    aria-label="{{ __('messages.personal.if_yes_provide') }}">
                                                    {{ __('messages.personal.if_yes_provide') }}</p>
                                                <ul class="list-disc pl-6">
                                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label=" {{ __('messages.personal.latest_country_of_deployment') }}">
                                                        {{ __('messages.personal.latest_country_of_deployment') }}</li>
                                                    <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                        tabindex="0"
                                                        aria-label=" {{ __('messages.personal.return_date') }}">
                                                        {{ __('messages.personal.return_date') }}</li>
                                                </ul>
                                            </div>

                                        </div>


                                        <div id="ofw-country-details" class="mt-6">
                                            <label for="ofw-country" class="block mb-1">
                                                {{ __('messages.personal.latest_country_of_deployment') }}
                                            </label>
                                            <div class="flex flex-col sm:flex-row items-center relative">
                                                <!-- Dropdown (Select) for Country -->
                                                <select id="ofw-country" name="ofw-country"
                                                    aria-label="{{ __('messages.personal.latest_country_of_deployment') }} {{ old('countryLocation', $formData2['countryLocation'] ?? '') }}"
                                                    class="w-full sm:flex-1 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 hover:ring-orange-300">
                                                    <option value="" disabled selected>Select a Country</option>
                                                    <!-- Add country options here -->
                                                </select>
                                                <!-- Clear Button -->
                                                <button id="clearCountryButton" type="button"
                                                    aria-label="{{ __('Clear') }}"
                                                    class="w-full sm:w-auto mt-4 sm:mt-0 sm:ml-4 p-2 bg-red-600 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400 hover:ring-orange-300">
                                                    Clear
                                                </button>

                                            </div>

                                            <input type="text" id="countryLocation" name="countryLocation"
                                                aria-label="Country Location"
                                                value="{{ old('countryLocation', $formData2['countryLocation'] ?? '') }}"
                                                hidden />
                                            @error('countryLocation')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div id="ofw-return-details"
                                            class="mt-6 {{ old('ofw-return') ? '' : 'disabled' }}">
                                            <label for="ofw-return"
                                                class="block mb-1">{{ __('messages.personal.month_year_return') }}</label>
                                            <input type="month" id="ofw-return" name="ofw-return"
                                                aria-label="{{ __('messages.personal.month_year_return') }} {{ old('ofw-return', $formData2['ofw-return'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="{{ old('ofw-return', $formData2['ofw-return'] ?? '') }}"
                                                onkeydown="return disableKeys(event)" />

                                            @error('ofw-return')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="mt-4 text-right flex flex-col sm:flex-row sm:justify-end sm:space-x-2 space-y-2 sm:space-y-0">
                                    <a href="{{ route('setup') }}" aria-label="{{ __('messages.previous') }}"
                                        class="inline-block py-2 px-4 bg-black text-center text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {{ __('messages.previous') }}
                                    </a>

                                    <button type="submit" aria-label="{{ __('messages.save') }}"
                                        class="inline-block py-2 px-4 bg-green-700 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {{ __('messages.save') }}
                                    </button>
                                </div>

                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const barangaySelect = document.getElementById('barangay');
                                    const editBarangayButton = document.getElementById('editBarangayButton');
                                    const barangayLocation = document.getElementById('barangayLocation');
                                    const clearButton = document.getElementById('clearBarangayButton');
                                    const zipCodeInput = document.getElementById('zipcode');

                                    clearButton.addEventListener('click', function() {
                                        barangaySelect.value = ''; // Clear the dropdown selection
                                        barangayLocation.value = ''; // Clear the hidden input field
                                        zipCodeInput.value = ''; // Clear the zip code input field
                                    });

                                    // Fetch barangay data from the JSON file
                                    fetch('/locations/barangays.json')
                                        .then(response => response.json())
                                        .then(data => {
                                            const barangays = data.Mandaluyong;

                                            // Populate the dropdown with barangay options
                                            barangaySelect.innerHTML = '<option value="" disabled selected>Select a Barangay</option>';
                                            barangays.forEach(barangayObj => {
                                                const option = document.createElement('option');
                                                option.value = barangayObj.location;
                                                option.textContent = barangayObj.location;
                                                barangaySelect.appendChild(option);
                                            });

                                            // Set selected value to the saved barangay if available
                                            if (barangayLocation.value) {
                                                barangaySelect.value = barangayLocation.value;
                                                updateZipCode(barangaySelect.value); // Update zip code if barangay is already selected
                                            }

                                            // Update hidden input value and zip code on selection change
                                            barangaySelect.addEventListener('change', function() {
                                                barangayLocation.value = this.value;
                                                updateZipCode(this.value);
                                            });
                                        })
                                        .catch(error => console.error('Error fetching barangay data:', error));

                                    // Edit button functionality
                                    editBarangayButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        barangaySelect.removeAttribute('disabled'); // Enable dropdown for editing
                                        barangaySelect.focus(); // Focus on the select field
                                    });

                                    // Disable the select field by default if a barangay is already selected
                                    if (barangaySelect.value) {
                                        barangaySelect.setAttribute('disabled', true);
                                    }

                                    // Function to update the zip code based on the selected barangay
                                    function updateZipCode(selectedBarangay) {
                                        fetch('/locations/barangays.json')
                                            .then(response => response.json())
                                            .then(data => {
                                                const selectedBarangayData = data.Mandaluyong.find(barangayObj => barangayObj
                                                    .location === selectedBarangay);
                                                if (selectedBarangayData) {
                                                    zipCodeInput.value = selectedBarangayData.zip; // Update the zip code input field
                                                }
                                            })
                                            .catch(error => console.error('Error updating zip code:', error));
                                    }
                                });





                                document.addEventListener('DOMContentLoaded', function() {
                                    const zipCodeInput = document.getElementById('zipcode');

                                    zipCodeInput.addEventListener('input', function(event) {
                                        event.preventDefault();
                                        return false;
                                    });

                                    zipCodeInput.value =
                                        '{{ old('zipcode', $formData2['zipcode'] ?? '') }}'; // Assuming this is PHP or Blade template syntax

                                    zipCodeInput.addEventListener('change', function(event) {
                                        zipCodeInput.value =
                                            '{{ old('zipcode', $formData2['zipcode'] ?? '') }}'; // Reset value on change
                                    });
                                });





                                //COUNTRIES
                                document.addEventListener('DOMContentLoaded', function() {
                                    const countrySelect = document.getElementById('ofw-country');
                                    const editButton = document.getElementById('editCountryButton');
                                    const ofwLocation = document.getElementById('countryLocation');
                                    const clearButton = document.getElementById('clearCountryButton');

                                    clearButton.addEventListener('click', function() {
                                        countrySelect.value = ''; // Clear the dropdown selection
                                        ofwLocation.value = ''; // Clear the hidden input field
                                    });

                                    // Fetch country data from the JSON file
                                    fetch('/locations/countries.json')
                                        .then(response => response.json())
                                        .then(data => {
                                            const countries = data.map(countryObj => countryObj.country);

                                            // Populate the dropdown with country options
                                            countrySelect.innerHTML = '<option value="" disabled selected>Select a Country</option>';
                                            countries.forEach(country => {
                                                const option = document.createElement('option');
                                                option.value = country;
                                                option.textContent = country;
                                                countrySelect.appendChild(option);
                                            });

                                            // Set selected value to the saved country if available
                                            if (ofwLocation.value) {
                                                countrySelect.value = ofwLocation.value;
                                            }

                                            // Update hidden input value on selection change
                                            countrySelect.addEventListener('change', function() {
                                                ofwLocation.value = this.value;
                                            });
                                        })
                                        .catch(error => console.error('Error fetching country data:', error));

                                    // Edit button functionality
                                    editButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        countrySelect.removeAttribute('disabled'); // Enable dropdown for editing
                                        countrySelect.focus(); // Focus on the select field
                                    });

                                    // Disable the select field by default if a country is already selected
                                    if (countrySelect.value) {
                                        countrySelect.setAttribute('disabled', true);
                                    }
                                });
                            </script>
                            
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const barangaySelect = document.getElementById('barangay');
                                    const barangayLocation = document.getElementById('barangayLocation');
                                    const zipCodeInput = document.getElementById('zipcode');
                                    const presentAddressInput = document.getElementById('presentAddress');
                                    const cellphoneNoInput = document.getElementById('cellphoneNo');
                                    const beneficiaryRadioButtons = document.querySelectorAll('input[name="beneficiary-4ps"]');
                                    const clearButton = document.getElementById('clearBarangayButton');
                            
                                    // Function to update the zip code based on the selected barangay
                                    function updateZipCode(selectedBarangay) {
                                        fetch('/locations/barangays.json')
                                            .then(response => response.json())
                                            .then(data => {
                                                const selectedBarangayData = data.Mandaluyong.find(barangayObj => barangayObj.location === selectedBarangay);
                                                if (selectedBarangayData) {
                                                    zipCodeInput.value = selectedBarangayData.zip;
                                                    zipCodeInput.classList.remove('border-red-500'); // Remove red border if valid
                                                } else {
                                                    zipCodeInput.value = '';
                                                    zipCodeInput.classList.add('border-red-500'); // Add red border if invalid
                                                }
                                            })
                                            .catch(error => console.error('Error updating zip code:', error));
                                    }
                            
                                    // Fetch barangay data and populate dropdown
                                    fetch('/locations/barangays.json')
                                        .then(response => response.json())
                                        .then(data => {
                                            const barangays = data.Mandaluyong;
                                            barangaySelect.innerHTML = '<option value="" disabled selected>Select a Barangay</option>';
                                            barangays.forEach(barangayObj => {
                                                const option = document.createElement('option');
                                                option.value = barangayObj.location;
                                                option.textContent = barangayObj.location;
                                                barangaySelect.appendChild(option);
                                            });
                            
                                            // Set selected Barangay if value exists
                                            if (barangayLocation.value) {
                                                barangaySelect.value = barangayLocation.value;
                                                updateZipCode(barangaySelect.value);
                                            }
                                        })
                                        .catch(error => console.error('Error fetching barangay data:', error));
                            
                                    // Event listener for barangay selection change
                                    barangaySelect.addEventListener('change', function() {
                                        barangayLocation.value = this.value;
                                        updateZipCode(this.value);
                                        validateInput(barangaySelect);
                                        validateInput(zipCodeInput);
                                    });
                            
                                    presentAddressInput.addEventListener('input', () => validateInput(presentAddressInput));
                                    cellphoneNoInput.addEventListener('input', () => validateInput(cellphoneNoInput));
                                    zipCodeInput.addEventListener('input', () => validateInput(zipCodeInput));
                            
                                    beneficiaryRadioButtons.forEach((radio) => {
                                        radio.addEventListener('change', () => validateRadioGroup(beneficiaryRadioButtons));
                                    });
                            
                                    // Clear button functionality
                                    clearButton.addEventListener('click', function() {
                                        barangaySelect.value = '';
                                        barangayLocation.value = '';
                                        zipCodeInput.value = '';
                                        validateInput(barangaySelect);
                                        validateInput(zipCodeInput);
                                    });
                            
                                    // Function to validate if an input field is empty and apply a red border if needed
                                    function validateInput(inputField) {
                                        if (inputField.value.trim() === '') {
                                            inputField.classList.add('border-red-500');
                                        } else {
                                            inputField.classList.remove('border-red-500');
                                        }
                                    }
                            
                                    // Function to check if one of the radio buttons in a group is selected
                                    function validateRadioGroup(radioButtons) {
                                        const isSelected = Array.from(radioButtons).some(radio => radio.checked);
                                        radioButtons.forEach((radio) => {
                                            if (!isSelected) {
                                                radio.classList.add('border-red-500');
                                            } else {
                                                radio.classList.remove('border-red-500');
                                            }
                                        });
                                    }
                            
                                    // Delayed initial validation to avoid flashing red borders
                                    setTimeout(() => {
                                        if (barangaySelect.value === '') validateInput(barangaySelect);
                                        if (zipCodeInput.value === '') validateInput(zipCodeInput);
                                        validateInput(presentAddressInput);
                                        validateInput(cellphoneNoInput);
                                        validateRadioGroup(beneficiaryRadioButtons);
                                    }, 500); // Delay to ensure elements are populated
                                });
                            </script>


                            <style>
                                .border-red-500 {
                                    border-color: #dc2626 !important;
                                    border-width: 2px !important;
                            }
                            
                            </style>

