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

        <link rel="stylesheet" href="/css/steps.css">

    </head>

    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-5/6">
                    <form action="{{ route('personal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
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
                        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full">
                                    Personal Information
                                    @php
                                        $currentStep = 2; // Set this dynamically based on your current step
                                        $totalSteps = 7; // Total number of steps (adjusted to 8)
                                        $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                    @endphp
                                    <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                        <div
                                            class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                style="width: {{ $percentage }}%;"></div>
                                        </div>
                                        <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                            Step {{ $currentStep }}/{{ $totalSteps }} : <span
                                                class="text-green-600">{{ $percentage }}%</span>
                                        </div>
                                    </div>
                                </h3>
                                <div>
                                    <nav class="text-sm" aria-label="Breadcrumb">
                                        <ol class="list-none p-0 inline-flex">
                                            <li class="flex items-center">
                                                <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200"></i>
                                                <a href="{{ route('setup') }}"
                                                    class="text-gray-700 dark:text-gray-200">Applicant
                                                    Profile</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center">
                                                <span class="text-blue-500 font-semibold">Personal Information</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <hr class="border-t-2 border-gray-400 rounded-full my-4">

                                <span class="text-md font-regular" style="text-align: justify;">
                                    {!! __('messages.personal.instruction') !!}
                                </span>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                                    <div>
                                        @include('layouts.dropdown')

                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="civilStatus"
                                                class="block mb-1">{{ __('messages.personal.civil_status') }}</label>
                                            <select id="civilStatus" name="civilStatus"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                <option value="Single"
                                                    {{ old('civilStatus', $personal->civilStatus ?? '') == 'Single' ? 'selected' : '' }}>
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
                                            <label for="barangay"
                                                class="block mb-1">{{ __('messages.personal.barangay') }}</label>
                                            <div class="flex items-center">
                                                <input id="barangay" type="text" name="barangay"
                                                    class="w-full p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                    placeholder="{{ __('messages.personal.type_to_search_barangay') }}"
                                                    value="{{ old('barangay', $formData2['barangay'] ?? '') }}"
                                                    readonly>
                                                <button id="editButton"
                                                    class="ml-2 px-3 py-2 bg-blue-500 text-white rounded">Edit</button>
                                            </div>
                                            <div id="barangay-suggestions"
                                                class="absolute z-10 mt-1 w-full max-h-90 overflow-y-auto bg-gray-200 text-black dark:bg-gray-900 dark:text-gray-200 border border-gray-700 rounded shadow-md hidden">
                                            </div>
                                            <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching
                                                barangay data</div>
                                        </div>

                                        <div class="mt-6">
                                            <label for="zipcode"
                                                class="block mb-1">{{ __('messages.personal.zipcode') }}</label>
                                            <div class="flex items-center mt-4">
                                                <input type="text" id="zipcode" name="zipcode"
                                                    class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                    value="{{ old('zipcode', $formData2['zipcode'] ?? '') }}"
                                                    placeholder="Enter Zip Code" readonly />
                                                <!-- Add disabled attribute here -->
                                                @error('zipCode')
                                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mt-6">
                                            <label for="presentAddress"
                                                class="block mb-1">{{ __('messages.personal.present_address') }}</label>
                                            <input type="text" id="presentAddress" name="presentAddress"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                placeholder="Ex. Street Name, Building, House. No"
                                                value="{{ old('presentAddress', $formData2['presentAddress'] ?? '') }}"
                                                placeholder="" />
                                            @error('presentAddress')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <div class="mt-6">
                                                <label for="tin"
                                                    class="block mb-1">{{ __('messages.personal.saved_tin') }}</label>
                                                <div class="flex flex-wrap gap-1">
                                                    <!-- Group 1 -->
                                                    <input type="text" id="tin1" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.0', $formData2['tin.0'] ?? '') }}" />
                                                    <input type="text" id="tin2" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.1', $formData2['tin.1'] ?? '') }}" />
                                                    <input type="text" id="tin3" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.2', $formData2['tin.2'] ?? '') }}" />

                                                    <!-- Hyphen -->
                                                    <span
                                                        class="flex items-center justify-center font-semibold w-5 sm:w-auto md:w-5 lg:w-auto xl:w-5 text-center">-</span>

                                                    <!-- Group 2 -->
                                                    <input type="text" id="tin4" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.3', $formData2['tin.3'] ?? '') }}" />
                                                    <input type="text" id="tin5" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.4', $formData2['tin.4'] ?? '') }}" />
                                                    <input type="text" id="tin6" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.5', $formData2['tin.5'] ?? '') }}" />
                                                    <!-- Hyphen -->
                                                    <span
                                                        class="flex items-center justify-center font-semibold w-5 sm:w-auto md:w-5 lg:w-auto xl:w-5 text-center">-</span>

                                                    <!-- Group 3 -->
                                                    <input type="text" id="tin7" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.6', $formData2['tin.6'] ?? '') }}" />
                                                    <input type="text" id="tin8" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded mb-1 sm:mb-0 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.7', $formData2['tin.7'] ?? '') }}" />
                                                    <input type="text" id="tin9" name="tin[]"
                                                        class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d" title="Enter a single digit" maxlength="1"
                                                        value="{{ old('tin.8', $formData2['tin.8'] ?? '') }}" />
                                                </div>
                                                <div class="mt-6">
                                                    <label for="tin"
                                                        class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Saved
                                                        Tax
                                                        Identification
                                                        Number (TIN)</label>
                                                    <input type="text" id="tin" name="tin"
                                                        value="{{ old('tin', $formData2['tin'] ?? '') }}"
                                                        maxlength="9" readonly
                                                        class="w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 cursor-not-allowed"
                                                        placeholder="(9 Digits)">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="mt-6">
                                            <label for="religion"
                                                class="block mb-1">{{ __('messages.personal.religion') }}</label>
                                            <select id="religion" name="religion"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                <option value="" disabled>Please select...</option>
                                                <option value="Roman Catholic"
                                                    {{ old('religion', $personal->religion ?? '') == 'Roman Catholic' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.roman_catholic') }}
                                                </option>
                                                <option value="Iglesia Ni Cristo"
                                                    {{ old('religion', $personal->religion ?? '') == 'Iglesia Ni Cristo' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.iglesia_ni_cristo') }}
                                                </option>
                                                <option value="Islam"
                                                    {{ old('religion', $personal->religion ?? '') == 'Islam' ? 'selected' : '' }}>
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
                                                <option value="Others"
                                                    {{ old('religion', $personal->religion ?? '') == 'Others' ? 'selected' : '' }}>
                                                    {{ __('messages.personal.others') }}
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
                                            <input type="tel" id="landlineNo" name="landlineNo"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                pattern="[0-9]+"
                                                title="Please enter numerical characters only"value="{{ old('landlineNo', $formData2['landlineNo'] ?? '') }}"
                                                placeholder="89839463" maxlength="8" />
                                            @error('landlineNo')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
                                            <input type="tel" id="cellphoneNo" name="cellphoneNo"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                pattern="[0-9]+" title="Please enter numerical characters only"
                                                placeholder="09673411171" maxlength="11"
                                                value="{{ old('cellphoneNo', $formData2['cellphoneNo'] ?? '') }}" />
                                            @error('cellphoneNo')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label
                                                class="block mb-2 ">{{ __('messages.personal.4ps_beneficiary') }}</label>
                                            <div class="flex items-center">
                                                <input type="radio" id="4ps-yes" name="beneficiary-4ps"
                                                    value="Yes" class="mr-2"
                                                    {{ old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'Yes' ? 'checked' : '' }}>
                                                <label for="4ps-yes" class="mr-4">Yes</label>

                                                <input type="radio" id="4ps-no" name="beneficiary-4ps"
                                                    value="No" class="mr-2"
                                                    {{ old('beneficiary-4ps', $formData2['beneficiary-4ps'] ?? '') == 'No' ? 'checked' : '' }}>
                                                <label for="4ps-no" class="mr-4">No</label>
                                            </div>
                                            @error('beneficiary-4ps')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mt-10">
                                            <label
                                                class="block mb-2 font-semibold">{{ __('messages.personal.former_ofw') }}</label>
                                            <div class="my-4">
                                                <p class="mb-2">{{ __('messages.personal.if_yes_provide') }}</p>
                                                <ul class="list-disc pl-6">
                                                    <li>{{ __('messages.personal.latest_country_of_deployment') }}</li>
                                                    <li>{{ __('messages.personal.return_date') }}</li>
                                                </ul>
                                            </div>

                                        </div>


                                        <div id="ofw-country-details" class="mt-6">
                                            <label for="ofw-country"
                                                class="block mb-1">{{ __('messages.personal.latest_country_of_deployment') }}</label>
                                            <div class="flex items-center relative">
                                                <input type="text" id="ofw-country" name="ofw-country"
                                                    class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                    placeholder="Please specify the country"
                                                    value="{{ old('ofw-country', $formData2['ofw-country'] ?? '') }}"
                                                    list="countrySuggestions" />
                                                <button id="editCountryButton" type="button"
                                                    class="ml-2 px-3 py-2 bg-blue-500 text-white rounded">Edit</button>
                                            </div>
                                            <div id="country-suggestions"
                                                class="absolute z-10 mt-5  max-h-90 overflow-y-auto bg-gray-200 text-black dark:bg-gray-900 dark:text-gray-200 border-darkborder rounded shadow-md hidden">
                                            </div>

                                            @error('ofw-country')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                            <input type="text" id="countryLocation" name="countryLocation"
                                                value="{{ old('countryLocation', $formData2['countryLocation'] ?? '') }}"
                                                hidden />
                                        </div>




                                        <div id="ofw-return-details"
                                            class="mt-6 {{ old('ofw-return') ? '' : 'disabled' }}">
                                            <label for="ofw-return"
                                                class="block mb-1">{{ __('messages.personal.month_year_return') }}</label>
                                            <input type="month" id="ofw-return" name="ofw-return"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 "
                                                value="{{ old('ofw-return', $formData2['ofw-return'] ?? '') }}" />
                                            @error('ofw-return')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4 text-right">
                                    <a href="{{ route('setup') }}"
                                        class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Previous</a>

                                    <button type="submit"
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Save</button>
                                </div>
                            </div>

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
