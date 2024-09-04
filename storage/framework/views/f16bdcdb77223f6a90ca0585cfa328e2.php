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
                    <form action="<?php echo e(route('jobpreferences')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">There were some errors with your submission:</span>
                                <ul class="mt-3 list-disc list-inside text-sm">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <br>
                        <?php endif; ?>

                        <div class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0">
                                    Job Preferences
                                    <?php
                                        $currentStep = 4; // Set this dynamically based on your current step
                                        $totalSteps = 7; // Total number of steps (adjusted to 8)
                                        $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                    ?>
                                    <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                        <div
                                            class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                style="width: <?php echo e($percentage); ?>%;"></div>
                                        </div>
                                        <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                            Step <?php echo e($currentStep); ?>/<?php echo e($totalSteps); ?> : <span
                                                class="text-green-600"><?php echo e($percentage); ?>%</span>
                                        </div>
                                    </div>
                                </h3>
                                <div>
                                    <nav class="text-sm" aria-label="Breadcrumb">
                                        <ol class="list-none p-0 inline-flex">
                                            <li class="flex items-center">
                                                <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0"></i>
                                                <a href="<?php echo e(route('workexp')); ?>"
                                                    class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Employment
                                                    History
                                                    and Work Experience</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center">
                                                <span
                                                    class="text-blue-500 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    tabindex="0">Job
                                                    Preferences</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    tabindex="0" aria-label=" <?php echo __('messages.jobpreferences.instruction'); ?>">
                                    <?php echo __('messages.jobpreferences.instruction'); ?>

                                </div>


                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </div>
                                    <div>
                                        <div class="mt-6">
                                            <label for="preferredOccupation"
                                                class="block mb-1"><?php echo e(__('messages.jobpreferences.preferred_occupation')); ?></label>
                                            <input type="text" id="preferredOccupation" name="preferredOccupation"
                                                aria-label="<?php echo e(__('messages.jobpreferences.preferred_occupation')); ?>"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Ex. Domestic Helper"
                                                value="<?php echo e(old('preferredOccupation', $formData4['preferredOccupation'] ?? '')); ?>" />


                                            <?php $__errorArgs = ['preferredOccupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>


                                        

                                        <div class="mt-6 relative">
                                            <label for="local-location" class="block mb-1">
                                                <?php echo e(__('messages.jobpreferences.preferred_work_location_local')); ?>

                                            </label>
                                            <div class="flex items-center space-x-2">
                                                <!-- Dropdown (Select) for Local Location -->
                                                <select id="local-location" name="local-location"
                                                    aria-label="<?php echo e(__('messages.jobpreferences.preferred_work_location_local')); ?>"
                                                    class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">

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
                                                value="<?php echo e(old('local-location', $formData4['local-location'] ?? '')); ?>"
                                                hidden />
                                            <?php $__errorArgs = ['localLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>



                                        <div class="mt-6 relative">
                                            <label for="overseas-location"
                                                class="block mb-1"><?php echo e(__('messages.jobpreferences.preferred_work_location_overseas')); ?></label>
                                            <div class="flex items-center space-x-2">
                                                <!-- Dropdown (Select) for Overseas Location -->
                                                <select id="overseas-location" name="overseas-location"
                                                    aria-label="<?php echo e(__('messages.jobpreferences.preferred_work_location_overseas')); ?>"
                                                    class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                </select>

                                                <!-- Clear Button -->
                                                <button id="clearOverseasLocationButton" type="button"
                                                    aria-label="Clear"
                                                    class="ml-2 px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                                    Clear
                                                </button>
                                            </div>

                                            <!-- Error Message -->
                                            <div id="overseas-location-error" class="text-red-600 mt-1 hidden">Error
                                                fetching location data</div>

                                            <input type="text" id="overseaslocationHidden" name="overseasLocation"
                                                value="<?php echo e(old('overseas-location', $formData4['overseas-location'] ?? '')); ?>"
                                                hidden />
                                        </div>



                                    </div>



                                </div>
                                <div class="mt-4 text-right">
                                    <a href="<?php echo e(route('workexp')); ?>" aria-label=" <?php echo e(__('messages.previous')); ?>"
                                        class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2"><?php echo e(__('messages.previous')); ?></a>

                                    <button type="submit" aria-label=" <?php echo e(__('messages.save')); ?>"
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"><?php echo e(__('messages.save')); ?></button>
                                </div>
                            </div>
                        </div>


                        <script>
                            // document.addEventListener('DOMContentLoaded', function() {
                            //     const localLocationInput = document.getElementById('local-location');
                            //     const localLocationHidden = document.getElementById('localLocationHidden');
                            //     const suggestionsContainer = document.getElementById('local-location-suggestions');
                            //     const editLocationButton = document.getElementById('editLocationButton');
                            //     const errorDiv = document.getElementById('local-location-error');

                            //     let citiesData = []; // Array to store cities data fetched from API

                            //     // Fetch cities data from the API
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

                            //     // Event listener for edit button
                            //     editLocationButton.addEventListener('click', function() {
                            //         localLocationInput.value = ''; // Clear input value
                            //         localLocationInput.focus(); // Set focus on input field
                            //         localLocationInput.removeAttribute('readonly');
                            //         suggestionsContainer.style.display = 'none'; // Hide suggestions
                            //         editLocationButton.style.display = 'none'; // Show edit button
                            //         localLocationHidden.value = ``

                            //     });



                            //     // Function to render suggestions in the suggestions container
                            //     function renderSuggestions(cities, query) {
                            //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                            //         suggestionsContainer.style.display = cities.length && query ? 'block' : 'none';

                            //         cities.forEach(city => {
                            //             const suggestionElement = document.createElement('div');
                            //             suggestionElement.classList.add(
                            //                 'flex', // Flexbox layout
                            //                 'justify-between', // Space between items
                            //                 'items-center', // Center items vertically
                            //                 'p-2', // Padding
                            //                 'cursor-pointer', // Pointer cursor on hover
                            //                 'rounded', // Rounded corners
                            //                 'mb-1', // Margin bottom
                            //                 'bg-gray-200',
                            //                 'text-black',
                            //                 'dark:bg-gray-900',
                            //                 'dark:text-gray-200',
                            //             );


                            //             const suggestionText = document.createElement('div');
                            //             suggestionText.classList.add('suggestion-text');
                            //             suggestionText.textContent =
                            //                 `${city.name}, ${city.province}`; // Display city name and province

                            //             const plusContainer = document.createElement('div');
                            //             plusContainer.classList.add('plus-container');
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
                            // });

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
                            //     const overseasLocationInput = document.getElementById('overseas-location');
                            //     const overseasLocationHidden = document.getElementById('overseaslocationHidden');

                            //     const suggestionsContainer = document.getElementById('overseas-location-suggestions');
                            //     const errorDiv = document.getElementById('overseas-location-error');
                            //     const editOverseasButton = document.getElementById('editButton');

                            //     let countries = [];

                            //     // Replace 'countries.json' with your actual JSON file path or URL
                            //     const jsonUrl = '/locations/countries.json';

                            //     // Fetch countries data
                            //     fetch(jsonUrl)
                            //         .then(response => {
                            //             if (!response.ok) {
                            //                 throw new Error('Network response was not ok');
                            //             }
                            //             return response.json();
                            //         })
                            //         .then(data => {
                            //             countries = data;

                            //             overseasLocationInput.addEventListener('input', function() {
                            //                 const query = this.value.trim().toLowerCase();
                            //                 const filteredCountries = countries.filter(country =>
                            //                     country.country.toLowerCase().includes(query)
                            //                 ).slice(0, 4); // Limit suggestions to 10 results

                            //                 renderSuggestions(filteredCountries, query);
                            //             });
                            //         })
                            //         .catch(error => {
                            //             console.error('Error fetching countries data:', error);
                            //             errorDiv.classList.remove('hidden');
                            //         });

                            //     function renderSuggestions(countries, query) {
                            //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                            //         suggestionsContainer.style.display = countries.length && query ? 'block' : 'none';

                            //         countries.forEach(country => {
                            //             const suggestionElement = document.createElement('div');
                            //             suggestionElement.classList.add(
                            //                 'flex', // Flexbox layout
                            //                 'justify-between', // Space between items
                            //                 'items-center', // Center items vertically
                            //                 'p-2', // Padding
                            //                 'cursor-pointer', // Pointer cursor on hover
                            //                 'rounded', // Rounded corners
                            //                 'mb-1', // Margin bottom
                            //                 'bg-gray-200',
                            //                 'text-black',
                            //                 'dark:bg-gray-900',
                            //                 'dark:text-gray-200',
                            //             );

                            //             const suggestionText = document.createElement('div');
                            //             suggestionText.classList.add('suggestion-text');
                            //             suggestionText.textContent = country.country;


                            //             const plusContainer = document.createElement('div');
                            //             plusContainer.classList.add('plus-container');
                            //             plusContainer.innerHTML = '+';

                            //             suggestionElement.appendChild(suggestionText);
                            //             suggestionElement.appendChild(plusContainer);

                            //             suggestionElement.addEventListener('click', function() {
                            //                 overseasLocationInput.value = country.country;
                            //                 overseasLocationInput.readOnly = true; // Make input readonly
                            //                 editOverseasButton.style.display =
                            //                     'inline-block'; // Show edit button
                            //                 suggestionsContainer.style.display = 'none';
                            //                 overseasLocationHidden.value = country.country;
                            //             });

                            //             suggestionsContainer.appendChild(suggestionElement);
                            //         });
                            //     }

                            //     // Edit button functionality
                            //     editOverseasButton.addEventListener('click', function(event) {
                            //         event.preventDefault();
                            //         overseasLocationInput.readOnly = !overseasLocationInput.readOnly;
                            //         overseasLocationInput.value = ''; // Hide edit button after clicking
                            //         overseasLocationHidden.value = '';

                            //         if (overseasLocationInput.readOnly) {
                            //             editOverseasButton.textContent = 'Edit';
                            //         } else {
                            //             editOverseasButton.style.display = 'none';
                            //         }
                            //     });

                            //     document.addEventListener('click', function(event) {
                            //         if (!suggestionsContainer.contains(event.target) && event.target !==
                            //             overseasLocationInput) {
                            //             suggestionsContainer.style.display = 'none';
                            //         }
                            //     });
                            // });
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
                        </style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\steps\step4.blade.php ENDPATH**/ ?>