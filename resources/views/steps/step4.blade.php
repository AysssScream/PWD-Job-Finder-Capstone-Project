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
                    <form action="{{ route('jobpreferences') }}" method="POST" enctype="multipart/form-data">
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

                        <div class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-200 shadow-3d rounded-lg mb-4"
                            id="step4">
                            @php
                                $currentStep = 4; // Set this dynamically based on your current step
                                $totalSteps = 7; // Total number of steps (adjusted to 8)
                                $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                            @endphp

                            <!-- Gradient background for the header section -->
                            <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-t-lg shadow-lg">
                                <h3 class="text-2xl text-white font-bold mb-4 inline-flex items-center justify-between w-full 
                                            focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.steps.step_4') }} {{ $percentage }}%;" tabindex="0">

                                    {{ __('messages.steps.step_4') }}

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
                                                    aria-label="Go Back to  {{ __('messages.steps.step_3') }}"
                                                    tabindex="0"></i>

                                                <!-- "Employment History and Work Experience" link -->
                                                <a href="{{ route('workexp') }}"
                                                    aria-label=" {{ __('messages.steps.step_3') }}"
                                                    class="text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    {{ __('messages.steps.step_3') }}
                                                </a>
                                                <span class="mx-2 text-white">/</span>
                                            </li>
                                            <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="{{ __('messages.steps.step_4') }}" tabindex="0">
                                                <span
                                                    class="text-white font-semibold">{{ __('messages.steps.step_4') }}</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <!-- Horizontal rule for separation -->
                                <hr class="border-t-2 border-white rounded-full my-4">
                            </div>



                            <div class="p-3 shadow-lg rounded-b-lg border-4 border-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                tabindex="0" aria-label=" {!! __('messages.jobpreferences.instruction') !!}">
                                {!! __('messages.jobpreferences.instruction') !!}
                            </div>

                            <div class="p-6 pt-0">
                                <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
                                    <div>
                                        @include('layouts.dropdown')

                                    </div>
                                    <div>
                                        <div class="mt-6">
                                            <label for="preferredOccupation"
                                                class="block mb-1">{{ __('messages.jobpreferences.preferred_occupation') }}
                                                <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                            <input type="text" id="preferredOccupation" name="preferredOccupation"
                                                aria-label="{{ __('messages.jobpreferences.preferred_occupation') }} {{ old('preferredOccupation', $formData4['preferredOccupation'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Ex. Domestic Helper"
                                                value="{{ old('preferredOccupation', $formData4['preferredOccupation'] ?? '') }}" />
                                            @error('preferredOccupation')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror

                                        </div>



                                        <div class="mt-6 relative">
                                            <label for="local-location" class="block mb-1">
                                                {{ __('messages.jobpreferences.preferred_work_location_local') }} <i
                                                    class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <div
                                                class="flex flex-col sm:flex-row items-center sm:space-x-2 space-y-2 sm:space-y-0 w-full">
                                                <!-- Dropdown (Select) for Local Location -->
                                                <select id="local-location" name="local-location"
                                                    aria-label="{{ __('messages.jobpreferences.preferred_work_location_local') }} {{ old('local-location', $formData4['local-location'] ?? '') }}"
                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">

                                                </select>

                                                <!-- Clear Button -->
                                                <button id="clearLocationButton" type="button" aria-label="Clear"
                                                    class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-3 py-2 bg-red-600 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>

                                            <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                                fetching location data</div>
                                            <input type="text" id="localLocationHidden" name="localLocation"
                                                aria-label="Local Location"
                                                value="{{ old('local-location', $formData4['local-location'] ?? '') }}"
                                                hidden />
                                            @error('localLocation')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="mt-6 relative">
                                            <label for="overseas-location"
                                                class="block mb-1">{{ __('messages.jobpreferences.preferred_work_location_overseas') }}</label>
                                            <div
                                                class="flex flex-col sm:flex-row items-center sm:space-x-2 space-y-2 sm:space-y-0 w-full">
                                                <select id="overseas-location" name="overseas-location"
                                                    aria-label="{{ __('messages.jobpreferences.preferred_work_location_overseas') }} {{ old('overseas-location', $formData4['overseas-location'] ?? '') }}"
                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                </select>

                                                <!-- Clear Button -->
                                                <button id="clearOverseasLocationButton" type="button"
                                                    aria-label="Clear"
                                                    class="mt-2 sm:mt-0 sm:ml-2 w-full sm:w-auto px-3 py-2 bg-red-600 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>



                                            <!-- Error Message -->
                                            <div id="overseas-location-error" class="text-red-600 mt-1 hidden">Error
                                                fetching location data</div>

                                            <input type="text" id="overseaslocationHidden" name="overseasLocation"
                                                aria-label="Overseas Location"
                                                value="{{ old('overseas-location', $formData4['overseas-location'] ?? '') }}"
                                                hidden />
                                        </div>
                                    </div>



                                </div>
                                <div
                                    class="mt-4 text-right flex flex-col sm:flex-row sm:justify-end sm:space-x-2 space-y-2 sm:space-y-0">
                                    <a href="{{ route('workexp') }}" aria-label="{{ __('messages.previous') }}"
                                        class="inline-block py-2 px-4 bg-black text-center text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2 sm:mr-0">
                                        {{ __('messages.previous') }}
                                    </a>

                                    <button type="submit" aria-label="{{ __('messages.save') }}"
                                        class="inline-block py-2 px-4 bg-green-700 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {{ __('messages.save') }}
                                    </button>
                                </div>

                            </div>
                        </div>


                        <script>
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
                            
                            document.addEventListener('DOMContentLoaded', function() {
                                const preferredOccupationInput = document.getElementById('preferredOccupation');
                                const localLocationSelect = document.getElementById('local-location');
                                const localLocationHidden = document.getElementById('localLocationHidden');
                        
                                // Check if input is empty and apply red border if needed
                                function checkInput(inputField) {
                                    if (!inputField.value.trim()) {
                                        inputField.classList.add('border-red-500');
                                    } else {
                                        inputField.classList.remove('border-red-500');
                                    }
                                }
                        
                                // Initial check only after all values have been restored
                                function initialCheck() {
                                    checkInput(preferredOccupationInput);
                                    if (!localLocationHidden.value) {
                                        checkInput(localLocationSelect);
                                    }
                                }
                        
                                // Event listeners to validate fields in real-time
                                preferredOccupationInput.addEventListener('input', () => checkInput(preferredOccupationInput));
                                localLocationSelect.addEventListener('change', () => {
                                    checkInput(localLocationSelect);
                                    localLocationHidden.value = localLocationSelect.value;
                                });
                        
                                // Clear button functionality for dropdowns
                                document.getElementById('clearLocationButton').addEventListener('click', () => {
                                    localLocationSelect.value = '';
                                    localLocationHidden.value = '';
                                    checkInput(localLocationSelect);
                                });
                        
                                // Perform the initial check after a slight delay to ensure values are fully restored
                                setTimeout(initialCheck, 10);
                            });
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
                            .border-red-500 {
                                border-color: #dc2626 !important;
                                border-width: 2px !important;
                            }

                        </style>
