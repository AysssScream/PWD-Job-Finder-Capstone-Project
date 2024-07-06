<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Personal Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <section>
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops!</strong> There were some errors with your submission:
                    <ul class="mt-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
            @endif
            <div class="mt-6">
                <label for="civilStatus" class="block mb-1">Civil Status</label>
                <select id="civilStatus" name="civilStatus" class="w-full p-2 border rounded">
                    <option value="Single"
                        {{ old('civilStatus', $personal->civilStatus ?? '') == 'Single' ? 'selected' : '' }}>
                        Single</option>
                    <option value="Married"
                        {{ old('civilStatus', $personal->civilStatus ?? '') == 'Married' ? 'selected' : '' }}>
                        Married</option>
                    <option value="Widowed"
                        {{ old('civilStatus', $personal->civilStatus ?? '') == 'Widowed' ? 'selected' : '' }}>
                        Widowed</option>
                </select>
                @error('civilStatus')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div id="barangay-container" class="mt-6 relative">
                <label for="barangay" class="block mb-1">Barangay</label>
                <div class="flex items-center">
                    <input id="barangay" type="text" name="barangay" class="w-full p-2 border rounded shadow-sm"
                        placeholder="Type to search Barangay..."
                        value="{{ old('barangay', $personal->barangay ?? '') }}" readonly>
                    <button id="editButton" class="btn btn-primary ml-2">Edit</button>
                </div>
                <div id="barangay-suggestions"
                    class="absolute z-10 mt-1 w-full max-h-90 overflow-y-auto bg-white border rounded shadow-md hidden">
                </div>
                <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching
                    barangay data</div>
            </div>
            <div class="mt-6">
                <label for="zipcode" class="block mb-1">Zip Code:</label>
                <div class="flex items-center mt-4">
                    <input type="text" id="zipcode" name="zipcode" class="w-full p-2 border rounded"
                        value="{{ old('zipcode', $personal->zipCode ?? '') }}" placeholder="Enter Zip Code" readonly />
                    @error('zipcode')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="mt-6">
                <label for="presentAddress" class="block mb-1">Present Address</label>
                <input type="text" id="presentAddress" name="presentAddress" class="w-full p-2 border rounded"
                    placeholder="Ex. Street Name, Building, House. No"
                    value="{{ old('presentAddress', $personal->presentAddress ?? '') }}" placeholder="" />
                @error('presentAddress')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6">
                <div class="mt-6">
                    <label for="tin" class="block mb-1 font-medium text-gray-700">Saved Tax
                        Identification
                        Number (TIN)</label>
                    <input type="text" id="tin" name="tin" value="{{ old('tin', $personal->tin ?? '') }}"
                        maxlength="9"
                        class="w-full  py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-100 cursor-not-allowed"
                        placeholder="(9 Digits)" readonly>
                </div>
            </div>
            <div class="mt-6">
                <label for="religion" class="block mb-1">Religion</label>
                <select id="religion" name="religion" class="w-full p-2 border rounded">
                    <option value="" disabled>Please select...</option>
                    <option value="Roman Catholic"
                        {{ old('religion', $personal->religion ?? '') == 'Roman Catholic' ? 'selected' : '' }}>
                        Roman Catholic
                    </option>
                    <option value="Iglesia Ni Cristo"
                        {{ old('religion', $personal->religion ?? '') == 'Iglesia Ni Cristo' ? 'selected' : '' }}>
                        Iglesia ni Cristo
                    </option>
                    <option value="Islam"
                        {{ old('religion', $personal->religion ?? '') == 'Islam' ? 'selected' : '' }}>
                        Islam
                    </option>
                    <option value="Philippine Independent Church"
                        {{ old('religion', $personal->religion ?? '') == 'Philippine Independent Church' ? 'selected' : '' }}>
                        Philippine Independent Church
                    </option>
                    <option value="Seventh Day Adventist Church"
                        {{ old('religion', $personal->religion ?? '') == 'Seventh Day Adventist Church' ? 'selected' : '' }}>
                        Seventh-day Adventist Church
                    </option>
                    <option value="Others"
                        {{ old('religion', $personal->religion ?? '') == 'Others' ? 'selected' : '' }}>
                        Others
                    </option>
                </select>
                @error('religion')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>


            </div>
            <div>
                <div class="mt-6">
                    <label for="landlineNo" class="block mb-1">Landline No.</label>
                    <input type="tel" id="landlineNo" name="landlineNo" class="w-full p-2 border rounded"
                        pattern="[0-9]+"
                        title="Please enter numerical characters only"value="{{ old('landlineNo', $personal->landlineNo ?? '') }}"
                        placeholder="89839463" maxlength="8" />
                    @error('landlineNo')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
                    <input type="tel" id="cellphoneNo" name="cellphoneNo" class="w-full p-2 border rounded"
                        pattern="[0-9]+" title="Please enter numerical characters only" placeholder="09673411171"
                        maxlength="11" value="{{ old('cellphoneNo', $personal->cellphoneNo ?? '') }}" />
                    @error('cellphoneNo')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block mb-2 ">4Ps Beneficiary</label>
                    <div class="flex items-center">
                        <input type="radio" id="4ps-yes" name="beneficiary-4ps" value="Yes" class="mr-2"
                            {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'Yes' ? 'checked' : '' }}>
                        <label for="4ps-yes" class="mr-4">Yes</label>

                        <input type="radio" id="4ps-no" name="beneficiary-4ps" value="No" class="mr-2"
                            {{ old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'No' ? 'checked' : '' }}>
                        <label for="4ps-no" class="mr-4">No</label>
                    </div>
                    @error('beneficiary-4ps')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>

                </div>


                <div class="mt-6">
                    <div class="my-4">
                        <label class="block mb-2 font-semibold">Are you a former OFW?</label>
                        <p class="mb-2">If "Yes", please provide:</p>
                        <ul class="list-disc pl-6">
                            <li>Latest Country of Deployment</li>
                            <li>Return Date (YYYY-MM format)</li>
                        </ul>
                    </div>

                </div>


                <div id="ofw-country-details" class="mt-6">
                    <label for="ofw-country" class="block mb-1">Latest Country of
                        Deployment</label>
                    <div class="flex items-center relative">
                        <input type="text" id="ofw-country" name="ofw-country"
                            class="flex-1 p-2 border rounded shadow-sm" placeholder="Please specify the country"
                            value="{{ old('ofw-country', $personal->ofw_country ?? '') }}"
                            list="countrySuggestions" />
                        <button id="editCountryButton" type="button"
                            class="ml-2 px-3 py-2 bg-blue-500 text-white rounded">Edit</button>
                    </div>
                    <div id="country-suggestions"
                        class="absolute z-10 mt-5  max-h-90 overflow-y-auto bg-white border rounded shadow-md hidden">
                    </div>

                    @error('ofw-country')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                    <input type="text" id="countryLocation" name="countryLocation"
                        value="{{ old('countryLocation', $personal->ofw_country ?? '') }}" hidden />
                </div>

                <div id="ofw-return-details" class="mt-6 {{ old('ofw-return') ? '' : 'disabled' }}">
                    <label for="ofw-return" class="block mb-1">Month and Year of
                        Return to Philippines</label>
                    <input type="month" id="ofw-return" name="ofw-return" class="w-full p-2 border rounded"
                        value="{{ old('ofw-return', $personal->ofw_return ?? '') }}" />
                    @error('ofw-return')
                        <div class="text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-md font-semibold text-green-400 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>

        </form>
    </section>

</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangayInput = document.getElementById('barangay');
        const suggestionsContainer = document.getElementById('barangay-suggestions');
        const errorDiv = document.getElementById('barangay-error');
        const zipCodeInput = document.getElementById('zipcode');

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

                    renderSuggestions(filteredBarangays,
                        query);
                });
            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });

        function renderSuggestions(barangays, query) {
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            suggestionsContainer.style.display = barangays.length && query ? 'block' :
                'none';


            barangays.forEach(barangay => {
                const suggestionElement = document.createElement('div');
                suggestionElement.classList.add('suggestion');

                const suggestionText = document.createElement('div');
                suggestionText.classList.add('suggestion-text');
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
        editButton.addEventListener('click', function() {
            event.preventDefault()

            barangayInput.removeAttribute('readonly'); // Allow editing
            barangayInput.focus(); // Focus on the input field
            barangayInput.value = ''
            zipCodeInput.value = ''
        });

        // Handle input changes in barangayInput
        barangayInput.addEventListener('input', function() {
            const selectedBarangay = this.value.trim();
            if (selectedBarangay === '') {
                zipCodeInput.value = ''; // Clear zip code input if barangay input is empty
                editButton.style.display = 'inline-block'; // Hide edit button if input is empty

            }
            if (selectedBarangay === '' || selectedBarangay.split(' ').length < 2) {
                zipCodeInput.value = ''; // Clear zip code input
                editButton.style.display = 'inline-block'; // Hide edit button

            }
        });
        if (barangayInput.value.trim() === '') {
            editButton.style.display = 'inline-block';
        }

    });

    /*document.addEventListener('DOMContentLoaded', function() {
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
    });*/



    document.addEventListener('DOMContentLoaded', function() {
        const tinInputs = [
            document.getElementById('tin1'),
            document.getElementById('tin2'),
            document.getElementById('tin3'),
            document.getElementById('tin4'),
            document.getElementById('tin5'),
            document.getElementById('tin6'),
            document.getElementById('tin7'),
            document.getElementById('tin8'),
            document.getElementById('tin9')
        ];
        const fullTINInput = document.getElementById('tin');

        tinInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                // Move to the next input if current input is filled
                if (input.value.length === input.maxLength && index < tinInputs.length - 1) {
                    tinInputs[index + 1].focus();
                }

                // Manually concatenate values
                let fullTIN = '';
                tinInputs.forEach(function(inp) {
                    fullTIN += inp.value.trim();
                });
                fullTINInput.value = fullTIN;
            });

            // Move to the previous input on backspace/delete if current input is empty
            input.addEventListener('keydown', function(e) {
                if ((e.key === 'Backspace' || e.key === 'Delete') && input.value === '' &&
                    index > 0) {
                    tinInputs[index - 1].focus();
                }
            });

            // Handle paste event to allow pasting a full TIN directly
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text').replace(/\D/g,
                    ''); // Get only numeric data
                let currentIndex = index;

                pasteData.split('').forEach((char) => {
                    if (currentIndex < tinInputs.length) {
                        tinInputs[currentIndex].value = char;
                        currentIndex++;
                    }
                });

                // Manually concatenate values after paste
                let fullTIN = '';
                tinInputs.forEach(function(inp) {
                    fullTIN += inp.value.trim();
                });
                fullTINInput.value = fullTIN;
            });
        });
    });


    //COUNTRIES

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
                    'cursor-pointer', 'hover:bg-black', 'hover:text-white', 'border-b',
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
