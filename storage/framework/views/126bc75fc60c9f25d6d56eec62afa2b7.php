<h2 class="text-2xl font-bold mb-2">JOB PREFERENCES</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form method="post" action="<?php echo e(route('profile.update.job-preferences')); ?>" class="mt-6 space-y-6">
    <?php echo csrf_field(); ?>
    <?php echo method_field('patch'); ?>
    <div class="mt-6">
        <label for="preferredOccupation"
            class="block mb-1"><?php echo e(__('messages.jobpreferences.preferred_occupation')); ?></label>
        <input type="text" id="preferredOccupation" name="preferredOccupation"
            class="w-full 
border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
            pattern="[A-Za-z\s]+" title="<?php echo e(__('messages.jobpreferences.alphabetic_characters_only')); ?>"
            placeholder="Ex. Domestic Helper"
            aria-label="<?php echo e(__('messages.jobpreferences.preferred_occupation')); ?>  <?php echo e(old('preferredOccupation', $jobpreference->preferred_occupation ?? '')); ?>"
            value="<?php echo e(old('preferredOccupation', $jobpreference->preferred_occupation ?? '')); ?>" />

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
        <label for="local-location"
            class="block mb-1"><?php echo e(__('messages.jobpreferences.preferred_work_location_local')); ?></label>
        <div class="flex">
            <select id="local-location" name="local-location"
                class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                aria-label="<?php echo e(__('messages.jobpreferences.preferred_work_location_local')); ?>"
                value="<?php echo e(old('local-location', $jobpreference->local_location ?? '')); ?>" disabled>
            </select>
            <button id="editLocationButton" type="button" class="btn btn-primary ml-2" aria-label="Edit">Edit</button>
        </div>
        <div id="local-location-error" class="text-red-600 mt-1 hidden">Error fetching location data</div>
        <input type="text" id="localLocationHidden" name="localLocation"
            value="<?php echo e(old('local-location', $jobpreference->local_location ?? '')); ?>" hidden />
    </div>


    <div class="mt-6 relative">
        <label for="overseas-location"
            class="block mb-1"><?php echo e(__('messages.jobpreferences.preferred_work_location_overseas')); ?></label>
        <div class="flex">
            <select id="overseas-location" name="overseas-location"
                class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                aria-label="<?php echo e(__('messages.jobpreferences.preferred_work_location_overseas')); ?>"
                value="<?php echo e(old('overseas-location', $jobpreference->overseas_location ?? '')); ?>" disabled>
            </select>
            <button id="editOverseasButton" class="btn btn-primary ml-2" type="button" aria-label="Edit">Edit</button>
        </div>
        <div id="overseas-location-error" class="text-red-600 mt-1 hidden">Error fetching location data</div>
        <input type="text" id="overseaslocationHidden" name="overseasLocation"
            value="<?php echo e(old('overseas-location', $jobpreference->overseas_location ?? '')); ?>" hidden />
    </div>


    


    


    <div class="flex items-center gap-4 ">
        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'mt-6','ariaLabel' => 'Save Changes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','aria-label' => 'Save Changes']); ?><?php echo e(__('Save Changes')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

        <?php if(session('status') === 'profile-updated'): ?>
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-md font-semibold text-green-400 dark:text-gray-400">
                <?php echo e(__('Saved.')); ?>

            </p>
        <?php endif; ?>
    </div>
    </div>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const localLocationSelect = document.getElementById('local-location');
        const localLocationHidden = document.getElementById('localLocationHidden');
        const editLocationButton = document.getElementById('editLocationButton');
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
                citiesData = data;
                populateDropdown(citiesData);
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
                errorDiv.classList.remove('hidden');
            });

        // Event listener for dropdown change
        localLocationSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            localLocationHidden.value = selectedOption.value;
        });

        // Event listener for edit button
        editLocationButton.addEventListener('click', function() {
            localLocationSelect.disabled = false; // Enable dropdown
            editLocationButton.style.display = 'none'; // Hide edit button
        });

        // Function to populate dropdown with cities
        function populateDropdown(cities) {
            const jobPreferenceLocation =
                "<?php echo e($jobpreference->local_location ?? ''); ?>"; // Use PHP to pass the value to JS

            localLocationSelect.innerHTML =
                `<option value="" disabled selected>${jobPreferenceLocation}</option>`;

            cities.forEach(city => {
                if (city.name && city.province) { // Check if city has required properties
                    const option = document.createElement('option');
                    option.value = `${city.name}, ${city.province}`;
                    option.textContent = `${city.name}, ${city.province}`;
                    localLocationSelect.appendChild(option);
                } else {
                    console.error('City data is missing required properties:', city);
                }
            });
        }

    });

    document.addEventListener('DOMContentLoaded', function() {
        const overseasLocationSelect = document.getElementById('overseas-location');
        const overseasLocationHidden = document.getElementById('overseaslocationHidden');
        const editOverseasButton = document.getElementById('editOverseasButton');
        const errorDiv = document.getElementById('overseas-location-error');

        let countries = [];

        // Replace 'countries.json' with your actual JSON file path or URL
        const jsonUrl = '/locations/countries.json';

        // Fetch countries data
        fetch(jsonUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                countries = data;
                populateDropdown(countries);
            })
            .catch(error => {
                console.error('Error fetching countries data:', error);
                errorDiv.classList.remove('hidden');
            });

        // Event listener for dropdown change
        overseasLocationSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            overseasLocationHidden.value = selectedOption.value;
        });

        // Event listener for edit button
        editOverseasButton.addEventListener('click', function() {
            if (overseasLocationSelect.disabled) {
                overseasLocationSelect.disabled = false; // Enable dropdown
                editOverseasButton.textContent = 'Save'; // Change button text to 'Save'
            } else {
                overseasLocationSelect.disabled = true; // Disable dropdown
                editOverseasButton.textContent = 'Edit'; // Change button text to 'Edit'
            }
        });

        // Function to populate dropdown with countries
        function populateDropdown(countries) {
            const overseasLocation =
                "<?php echo e($jobpreference->overseas_location ?? ''); ?>"; // Pass the PHP variable to JavaScript

            overseasLocationSelect.innerHTML =
                `<option value="" disabled selected>${overseasLocation}</option>`;

            countries.forEach(country => {
                if (country.country) { // Check if country has the required property
                    const option = document.createElement('option');
                    option.value = country.country;
                    option.textContent = country.country;
                    overseasLocationSelect.appendChild(option);
                } else {
                    console.error('Country data is missing required properties:', country);
                }
            });
        }

    });




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
    //                 ).slice(0, 4); // Limit to 10 results

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

    /* Handle outside click to hide suggestions
    document.addEventListener('click', function(event) {
        if (!document.getElementById('local-location-container').contains(event.target)) {
            suggestionsContainer.style.display = 'none';
        }
    });*/

    // document.addEventListener('DOMContentLoaded', function() {
    //     document.addEventListener('click', function(event) {
    //         const localLocationContainer = document.getElementById(
    //             'local-location-container');
    //         const suggestionsContainer = document.getElementById('suggestionsContainer');

    //         if (localLocationContainer && suggestionsContainer) {
    //             if (!localLocationContainer.contains(event.target)) {
    //                 suggestionsContainer.style.display = 'none';
    //             }
    //         } else {
    //             console.error(
    //                 'Local location container or suggestions container not found.');
    //         }
    //     });
    // });


    // document.addEventListener('DOMContentLoaded', function() {
    //     const overseasLocationInput = document.getElementById('overseas-location');
    //     const overseasLocationHidden = document.getElementById('overseaslocationHidden');

    //     const suggestionsContainer = document.getElementById('overseas-location-suggestions');
    //     const errorDiv = document.getElementById('overseas-location-error');
    //     const editOverseasButton = document.getElementById('editOverseasButton');

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
    //                 overseasLocationInput.focus(); // Set focus on input field
    //                 overseasLocationInput.value = country.country;
    //                 overseasLocationInput.readOnly = true; // Make input readonly
    //                 editOverseasButton.style.display =
    //                     'inline-block'; // Show edit button
    //                 suggestionsContainer.style.display = 'none';

    //             });

    //             suggestionsContainer.appendChild(suggestionElement);
    //         });
    //     }

    //     // Edit button functionality
    //     editOverseasButton.addEventListener('click', function(event) {
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\jobpreferences.blade.php ENDPATH**/ ?>