<h2 class="text-2xl font-bold mb-2">JOB PREFERENCES</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form method="post" action="{{ route('profile.update.job-preferences') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')
    <div class="mt-6">
        <label for="preferredOccupation"
            class="block mb-1">{{ __('messages.jobpreferences.preferred_occupation') }}</label>
        <input type="text" id="preferredOccupation" name="preferredOccupation"
            class="w-full 
            p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
            pattern="[A-Za-z\s]+" title="{{ __('messages.jobpreferences.alphabetic_characters_only') }}"
            placeholder="Ex. Domestic Helper"
            aria-label="{{ __('messages.jobpreferences.preferred_occupation') }}  {{ old('preferredOccupation', $jobpreference->preferred_occupation ?? '') }}"
            value="{{ old('preferredOccupation', $jobpreference->preferred_occupation ?? '') }}" />

        @error('preferredOccupation')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror

    </div>


    <div class="mt-6 relative">
        <label for="local-location"
            class="block mb-1">{{ __('messages.jobpreferences.preferred_work_location_local') }}</label>
        <div class="flex">
            <select id="local-location" name="local-location"
                class="w-full p-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
                aria-label="{{ __('messages.jobpreferences.preferred_work_location_local') }}"
                value="{{ old('local-location', $jobpreference->local_location ?? '') }}" disabled>
            </select>
            <button id="editLocationButton" type="button"
                class="text-white bg-blue-700  rounded-xl p-2 ml-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                aria-label="{{ __('messages.edit') }} {{ __('messages.jobpreferences.preferred_work_location_local') }}">{{ __('messages.edit') }}</button>
        </div>
        <div id="local-location-error" class="text-red-600 mt-1 hidden">Error fetching location data</div>
        <label for="localLocationHidden" class="sr-only" hidden>Local Location</label>
        <input type="text" id="localLocationHidden" name="localLocation"
            value="{{ old('local-location', $jobpreference->local_location ?? '') }}" hidden />
    </div>


    <div class="mt-6 relative">
        <label for="overseas-location"
            class="block mb-1">{{ __('messages.jobpreferences.preferred_work_location_overseas') }}</label>
        <div class="flex">
            <select id="overseas-location" name="overseas-location"
                class="w-full p-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
                aria-label="{{ __('messages.jobpreferences.preferred_work_location_overseas') }}"
                value="{{ old('overseas-location', $jobpreference->overseas_location ?? '') }}" disabled>
            </select>
            <button id="editOverseasButton"
                class="btn bg-blue-700 text-white ml-2 rounded-xl p-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                type="button"
                aria-label="{{ __('messages.edit') }} {{ __('messages.jobpreferences.preferred_work_location_overseas') }}">{{ __('messages.edit') }}</button>
        </div>
        <label for="overseaslocationHidden" class="sr-only" hidden>Local Location</label>
        <div id="overseas-location-error" class="text-red-600 mt-1 hidden">Error fetching location data</div>
        <input type="text" id="overseaslocationHidden" name="overseasLocation"
            value="{{ old('overseas-location', $jobpreference->overseas_location ?? '') }}" hidden />
    </div>


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
                "{{ $jobpreference->local_location ?? '' }}"; // Use PHP to pass the value to JS

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
                "{{ $jobpreference->overseas_location ?? '' }}"; // Pass the PHP variable to JavaScript

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
