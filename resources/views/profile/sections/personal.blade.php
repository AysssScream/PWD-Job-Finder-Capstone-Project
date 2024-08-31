<h2 class="text-2xl font-bold mb-2" aria-label="Personal Profile">PERSONAL PROFILE</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="{{ route('profile.update.personal-info') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mt-6">
        <label for="civilStatus" class="block mb-1">{{ __('messages.personal.civil_status') }}</label>
        <select id="civilStatus" name="civilStatus" aria-label="{{ __('messages.personal.civil_status') }}"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
            <option value="Single" {{ old('civilStatus', $personal->civilStatus ?? '') == 'Single' ? 'selected' : '' }}>
                {{ __('messages.personal.single') }}</option>
            <option value="Married"
                {{ old('civilStatus', $personal->civilStatus ?? '') == 'Married' ? 'selected' : '' }}>
                {{ __('messages.personal.married') }}</option>
            <option value="Widowed"
                {{ old('civilStatus', $personal->civilStatus ?? '') == 'Widowed' ? 'selected' : '' }}>
                {{ __('messages.personal.widowed') }}</option>
        </select>
        @error('civilStatus')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div id="barangay-container" class="mt-6 relative">
        <label for="barangay" class="block mb-1">{{ __('messages.personal.barangay') }}</label>
        <div class="flex items-center">
            <!-- Dropdown (Select) for Barangay -->
            <select id="barangay" name="barangay" aria-label="{{ __('messages.personal.barangay') }}"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                value="{{ old('barangay', $personal->barangay ?? '') }}">
            </select>
        </div>
        <!-- Error Message -->
        <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching barangay data</div>
    </div>

    <!-- Assuming you also have a ZIP code input somewhere -->
    <div id="zipcode-container" class="mt-4">
        <label for="zipcode" class="block mb-1">{{ __('messages.personal.zipcode') }}</label>
        <input id="zipcode" type="text" name="zipcode" value="{{ old('zipcode', $personal->zipCode ?? '') }}"
            placeholder="Enter Zip Code" readonly
            aria-label="{{ __('messages.personal.zipcode') }}{{ old('zipcode', $personal->zipCode ?? '') }}"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
            readonly>
        @error('zipcode')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- <div id="barangay-container" class="mt-6 relative">
        <label for="barangay" class="block mb-1">{{ __('messages.personal.barangay') }}</label>
        <div class="flex items-center">
            <input id="barangay" type="text" name="barangay"
                aria-label="{{ __('messages.personal.barangay') }} {{ old('barangay', $personal->barangay ?? '') }}"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                placeholder="{{ __('messages.personal.type_to_search_barangay') }}"
                value="{{ old('barangay', $personal->barangay ?? '') }}" readonly>
            <button id="editButton" class="btn btn-primary ml-2" aria-label="Edit">Edit</button>
        </div>
        <div id="barangay-suggestions"
            class="absolute z-10 mt-1 w-full max-h-90 overflow-y-auto bg-gray-200 text-black dark:bg-gray-900 dark:text-gray-200 border border-gray-700 rounded shadow-md hidden">
        </div>

        <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching
            barangay data</div>
    </div> --}}

    {{--     
    <div class="mt-6 relative">
        <label for="zipcode" class="block ">{{ __('messages.personal.zipcode') }}</label>
        <div class="flex items-center ">
            <input type="text" id="zipcode" name="zipcode"
                aria-label="{{ __('messages.personal.zipcode') }}{{ old('zipcode', $personal->zipCode ?? '') }}"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                value="{{ old('zipcode', $personal->zipCode ?? '') }}" placeholder="Enter Zip Code" readonly />
            @error('zipcode')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div> --}}

    <div class="mt-6">
        <label for="presentAddress" class="block mb-1">{{ __('messages.personal.present_address') }}</label>
        <input type="text" id="presentAddress" name="presentAddress"
            aria-label="{{ __('messages.personal.present_address') }} {{ old('presentAddress', $personal->presentAddress ?? '') }}"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
            placeholder="Ex. Street Name, Building, House. No"
            value="{{ old('presentAddress', $personal->presentAddress ?? '') }}" placeholder="" />
        @error('presentAddress')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror
    </div>



    <div class="mt-6">
        <div class="mt-6">
            <label for="tin"
                class="block mb-1 font-medium text-black dark:text-gray-200">{{ __('messages.personal.saved_tin') }}</label>
            <input type="text" id="tin" name="tin" value="{{ old('tin', $personal->tin ?? '') }}"
                maxlength="9" aria-label="{{ __('messages.personal.saved_tin') }}"
                class="w-full  py-2 rounded-md border-dark shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black dark:bg-gray-900 dark:text-gray-200 cursor-not-allowed"
                placeholder="(9 Digits)" readonly>
        </div>
    </div>



    <div class="mt-6">
        <label for="religion" class="block mb-1">{{ __('messages.personal.religion') }}</label>
        <select id="religion" name="religion"
            aria-label="{{ __('messages.personal.religion') }}  {{ old('religion', $personal->religion ?? '') }}"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
            <option value="" disabled>{{ __('messages.personal.please_select') }}</option>
            <option value="Roman Catholic"
                {{ old('religion', $personal->religion ?? '') == 'Roman Catholic' ? 'selected' : '' }}>
                {{ __('messages.personal.roman_catholic') }}
            </option>
            <option value="Iglesia Ni Cristo"
                {{ old('religion', $personal->religion ?? '') == 'Iglesia Ni Cristo' ? 'selected' : '' }}>
                {{ __('messages.personal.iglesia_ni_cristo') }}
            </option>
            <option value="Islam" {{ old('religion', $personal->religion ?? '') == 'Islam' ? 'selected' : '' }}>
                {{ __('messages.personal.islam') }}
            </option>
            <option value="Philippine Independent Church"
                {{ old('religion', $personal->religion ?? '') == 'Philippine Independent Church' ? 'selected' : '' }}>
                {{ __('messages.personal.philippine_independent_church') }}
            </option>
            <option value="Seventh Day Adventist Church"
                {{ old('religion', $personal->religion ?? '') == 'Seventh Day Adventist Church' ? 'selected' : '' }}>
                {{ __('messages.personal.seventh_day_adventist_church') }}
            </option>
            <option value="Others" {{ old('religion', $personal->religion ?? '') == 'Others' ? 'selected' : '' }}>
                {{ __('messages.personal.others') }}
            </option>
        </select>
        @error('religion')
            <div class="text-red-600 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <div class="mt-6">
            <label for="landlineNo" class="block mb-1">Landline No.</label>
            <input type="tel" id="landlineNo" name="landlineNo" aria-label="Landline Number "
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                pattern="[0-9]+"
                title="Please enter numerical characters only"value="{{ old('landlineNo', $personal->landlineNo ?? '') }}"
                placeholder="89839463" maxlength="8" readonly />
            @error('landlineNo')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6">
            <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
            <input type="tel" id="cellphoneNo" name="cellphoneNo" aria-label="Cellphone Number"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                pattern="[0-9]+" title="Please enter numerical characters only" placeholder="09673411171"
                maxlength="11" value="{{ old('cellphoneNo', $personal->cellphoneNo ?? '') }}" readonly />
            @error('cellphoneNo')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6">
            <label class="block mb-2 ">{{ __('messages.personal.4ps_beneficiary') }}</label>
            <div class="flex items-center">
                <input type="radio" id="4ps-yes" name="beneficiary-4ps" value="Yes"
                    aria-label="{{ __('messages.personal.4ps_beneficiary') }} {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') }}"
                    class="mr-2 border  border-dark"
                    {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'Yes' ? 'checked' : '' }}>
                <label for="4ps-yes" class="mr-4">{{ __('messages.personal.yes') }}</label>

                <input type="radio" id="4ps-no" name="beneficiary-4ps" value="No"
                    class="mr-2 border border-dark"
                    aria-label="{{ __('messages.personal.4ps_beneficiary') }} {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') }}"
                    {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'No' ? 'checked' : '' }}>
                <label for="4ps-no" class="mr-4">{{ __('messages.personal.no') }}</label>
            </div>
            @error('beneficiary-4ps')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-10">
            <div class="my-4">
                <label
                    class="block mb-2 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="{{ __('messages.personal.former_ofw') }}"
                    tabindex="0">{{ __('messages.personal.former_ofw') }}</label>

                <p class="block mb-2  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="{{ __('messages.personal.if_yes_provide') }}" tabindex="0">
                    {{ __('messages.personal.if_yes_provide') }}</p>

                <ul class="list-disc pl-6">
                    <li aria-label="{{ __('messages.personal.latest_country_of_deployment') }}" tabindex="0"
                        class="
                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.personal.latest_country_of_deployment') }}</li>
                    <li aria-label="{{ __('messages.personal.return_date') }}" tabindex="0"
                        class="
                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {{ __('messages.personal.return_date') }}
                    </li>
                </ul>
            </div>
        </div>

        <div id="ofw-country-details" class="mt-6">
            <label for="ofw-country"
                class="block mb-1">{{ __('messages.personal.latest_country_of_deployment') }}</label>
            <div class="flex items-center relative">
                <!-- Dropdown (Select) for Country -->
                <select id="ofw-country" name="ofw-country"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="{{ old('ofw-country', $personal->ofw_country ?? '') }}">
                        {{ old('ofw-country', $personal->ofw_country ?? 'Select a Country') }}
                    </option>
                </select>
                <button id="editCountryButton" type="button" class="btn btn-primary ml-2"
                    aria-label="Edit">Edit</button>
            </div>
            <input type="text" id="countryLocation" name="countryLocation"
                value="{{ old('countryLocation', $personal->ofw_country ?? '') }}" hidden />
            @error('ofw-country')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>


        @php
            $formattedDate = $personal->ofw_return ? \Carbon\Carbon::parse($personal->ofw_return)->format('F Y') : '';
        @endphp

        <div id="ofw-return-details" class="mt-6 {{ old('ofw-return') ? '' : 'disabled' }}">
            <label for="ofw-return" class="block mb-1">{{ __('messages.personal.month_year_return') }}</label>

            <!-- Month-Year Picker Input -->
            <input type="month" id="ofw-return" name="ofw-return"
                aria-label="{{ __('messages.personal.month_year_return') }} is {{ old('ofw-return', $formattedDate ?? '') }}"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                value="{{ old('ofw-return', $personal->ofw_return ?? '') }}" />

            @error('ofw-return')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <br>
    </div>

    <div class="flex items-center gap-4 ">
        <x-primary-button class="mt-6" aria-label="Save Changes">{{ __('Save Changes') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-md font-semibold text-green-400 dark:text-gray-400">
                {{ __('Saved.') }}
            </p>
        @endif
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangaySelect = document.getElementById('barangay');
        const errorDiv = document.getElementById('barangay-error');
        const zipCodeInput = document.getElementById('zipcode');
        const editButton = document.getElementById('editButton');


        const savedBarangay = "{{ old('barangay', $personal->barangay ?? '') }}";

        let mandaluyongBarangays = [];

        // Fetch barangay data
        fetch('/locations/barangays.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mandaluyongBarangays = data.Mandaluyong;

                // Populate the dropdown
                populateBarangayDropdown(mandaluyongBarangays, savedBarangay);
            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });


        function populateBarangayDropdown(barangays, savedBarangay) {
            barangaySelect.innerHTML = '<option value="" disabled>Select A Barangay</option>'; // Default option


            barangays.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.location;
                option.textContent = barangay.location;
                option.setAttribute('data-zip', barangay.zip); // Store zip code in a data attribute
                barangaySelect.appendChild(option);
            });

            barangaySelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const zip = selectedOption.getAttribute('data-zip');
                zipCodeInput.value = zip ? zip : ''; // Set the zip code
                editButton.style.display = 'inline-block'; // Show edit button
                barangaySelect.disabled = true; // Disable dropdown after selection
            });
        }

        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default button behavior
            barangaySelect.disabled = false; // Enable the dropdown for editing
            barangaySelect.focus(); // Focus on the select field
            barangaySelect.value = ''; // Clear the selected value
            zipCodeInput.value = ''; // Clear the zip code input value
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('ofw-country');
        const editButton = document.getElementById('editCountryButton');
        const ofwLocation = document.getElementById('countryLocation');

        // Fetch country data from the JSON file
        fetch('/locations/countries.json')
            .then(response => response.json())
            .then(data => {
                const countries = data.map(countryObj => countryObj.country);

                // Populate the dropdown with country options
                countrySelect.innerHTML = '<option value="" disabled>Select a Country</option>';
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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangayInput = document.getElementById('barangay');
        const suggestionsContainer = document.getElementById('barangay-suggestions');
        const errorDiv = document.getElementById('barangay-error');
        const zipCodeInput = document.getElementById('zipcode');
        const editButton = document.getElementById('editButton'); // Define editButton variable

        let mandaluyongBarangays = [];

        // Fetch barangay data
        fetch('/locations/barangays.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mandaluyongBarangays = data.Mandaluyong;

                barangayInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();
                    const filteredBarangays = mandaluyongBarangays.filter(barangay =>
                        barangay.location.toLowerCase().includes(query)
                    ).slice(0, 10);

                    renderSuggestions(filteredBarangays, query);
                });
            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });

        function renderSuggestions(barangays, query) {
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            suggestionsContainer.style.display = barangays.length && query ? 'block' : 'none';

            barangays.forEach(barangay => {
                const suggestionElement = document.createElement('div');
                suggestionElement.classList.add(
                    'flex', // Flexbox layout
                    'justify-between', // Space between items
                    'items-center', // Center items vertically
                    'p-2', // Padding
                    'cursor-pointer', // Pointer cursor on hover
                    'rounded', // Rounded corners
                    'mb-1', // Margin bottom
                    'bg-gray-200',
                    'text-black',
                    'dark:bg-gray-900',
                    'dark:text-gray-200',
                );



                const suggestionText = document.createElement('div');
                suggestionText.textContent = barangay.location;

                const plusContainer = document.createElement('div');
                plusContainer.classList.add('plus-container');
                plusContainer.innerHTML = '+';

                suggestionElement.appendChild(suggestionText);
                suggestionElement.appendChild(plusContainer);

                suggestionElement.addEventListener('click', function() {
                    barangayInput.value = barangay.location;
                    zipCodeInput.value = barangay.zip;
                    editButton.style.display = 'inline-block'; // Show edit button
                    barangayInput.readOnly = true;
                    suggestionsContainer.style.display = 'none';
                });

                suggestionsContainer.appendChild(suggestionElement);
            });
        }

        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default button behavior
            barangayInput.removeAttribute('readonly'); // Allow editing
            barangayInput.focus(); // Focus on the input field
            barangayInput.value = ''; // Clear the input field value
            zipCodeInput.value = ''; // Clear the zip code input value
        });
    }); --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const countryInput = document.getElementById('ofw-country');
        const editButton = document.getElementById('editCountryButton');
        const suggestionsContainer = document.getElementById('country-suggestions');
        const ofwLocation = document.getElementById('countryLocation');


        // Fetch country data from the JSON file
        fetch('/locations/countries.json')
            .then(response => response.json())
            .then(data => {
                const countries = data.map(countryObj => countryObj.country);

                countryInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();
                    const filteredCountries = countries.filter(country =>
                        country.toLowerCase().includes(query)
                    ).slice(0, 6);

                    renderSuggestions(filteredCountries, query);
                });
            })
            .catch(error => console.error('Error fetching country data:', error));

        function renderSuggestions(countries, query) {
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            suggestionsContainer.classList.toggle('hidden', !countries.length || !query);

            countries.forEach(country => {
                const suggestionElement = document.createElement('div');
                suggestionElement.classList.add('flex', 'justify-between', 'items-center', 'p-2',
                    'cursor-pointer', 'border-b',
                    'last:border-none');

                const suggestionText = document.createElement('div');
                suggestionText.textContent = country;
                suggestionText.classList.add('flex-1'); // Make the text take up remaining space

                const plusContainer = document.createElement('div');
                plusContainer.classList.add('text-green-500', 'ml-10'); // Add left margin for spacing
                plusContainer.textContent = '+';

                suggestionElement.appendChild(suggestionText);
                suggestionElement.appendChild(plusContainer);

                suggestionElement.addEventListener('click', function() {
                    countryInput.value = country;
                    suggestionsContainer.classList.add('hidden');
                    ofwLocation.value = country;
                    countryInput.readOnly = true;
                });

                suggestionsContainer.appendChild(suggestionElement);
            });
        }

        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault();
            countryInput.removeAttribute('readonly');
            countryInput.focus();
            countryInput.value = '';
            ofwLocation.value = '';
        });

        // Handle input changes in countryInput
        countryInput.addEventListener('input', function() {
            const selectedCountry = this.value.trim();
            if (selectedCountry === '') {
                editButton.style.display = 'inline-block';
            }
        });

        if (countryInput.value.trim() === '') {
            editButton.style.display = 'inline-block';
        }


    });
</script> --}}





<style>
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
