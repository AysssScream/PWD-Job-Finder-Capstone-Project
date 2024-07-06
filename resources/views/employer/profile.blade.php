<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>

    @if (Session::has('message'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.info("{{ Session::get('message') }}", 'Customize', {
                    timeOut: 4000
                });
            });
        </script>
    @endif


    <div class="py-12">
        <div class="container mx-auto max-w-7xl px-4 pt-5 ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-3 text-gray-800 dark:text-gray-300">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto max-w-7xl px-4 pt-5 ">
            </div>
            <div class="grid grid-cols-1  g:grid-cols-3">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1 shadow-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-2xl font-bold mb-2">Employer Profile</h3>
                        <div class="flex flex-col items-center space-y-4">


                            <!-- Image Preview -->
                            <div
                                class="w-48 h-48 bg-gray-200 rounded-full overflow-hidden border border-gray-500 shadow-lg">
                                <img id="imagePreview"
                                    src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                    alt="Profile Picture" class="w-full h-full object-contain">
                            </div>


                            <!-- File Path Display -->
                            <div id="filePath" class="text-sm text-gray-600"></div>
                            <!-- Edit Profile Button -->
                            <div class="flex flex-col justify-center">
                                <form action="{{ route('employer.updateprofpic') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="fileInput" name="profile_picture" class="hidden"
                                        accept="image/*">
                                    <label for="fileInput"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded cursor-pointer mr-3">
                                        Edit Profile Picture
                                    </label>
                                    <button type="submit"
                                        class="mt-2 bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                        <script>
                            document.getElementById('fileInput').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    // Update the file path display
                                    document.getElementById('filePath').textContent = file.name;

                                    // Create a FileReader to read the file and update the image preview
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('imagePreview').src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>
                    </div>
                </div>



                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2 shadow-lg mt-5 p-4">
                    <form action="{{ route('employer.updateprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 p-6">
                            <label for="businessname" class="block mb-1 text-black dark:text-gray-200">
                                Company Description
                                <span class="text-black">
                                    <textarea id="exampleTextarea" name="companydescription" rows="4" maxlength="300"
                                        class="w-full p-2 mt-2 border-gray-500 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50
                 bg-gray-1  00 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                        placeholder="Enter your text here...">{{ $profile->company_description }}</textarea>

                                    <div id="charCount" class="text-right text-black dark:text-gray-200"></div>
                                    <script>
                                        const textarea = document.getElementById('exampleTextarea');
                                        const charCount = document.getElementById('charCount');

                                        textarea.addEventListener('input', function() {
                                            const textLength = textarea.value.length;
                                            charCount.textContent = `${textLength} / 300 characters`;
                                        });

                                        // Initial character count on page load
                                        const initialTextLength = textarea.value.length;
                                        charCount.textContent = `${initialTextLength} / 300 characters`;
                                    </script>

                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            <div class="p-6">
                                <br>
                                <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="businessname" class="block mb-1">
                                            Business Name
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="businessname" name="businessname"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            pattern="[A-Za-z\s.,-]+ " title="Please enter alphabetic characters only"
                                            value="{{ $profile->businessname }}" maxlength="50"
                                            placeholder="Ex. Concentrix">
                                        @error('businessname')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-0">
                                        <label for="tin" class="block mb-1">
                                            TIN Number
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <input type="text" id="tinno" name="tinno"
                                            value="{{ $profile->tinno }}" maxlength="12"
                                            class="w-full px-4 py-2 rounded-md  bg-gray-100  text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            placeholder="(12 Digits Max)" readonly>
                                    </div>


                                    <div>
                                        <label for="tradename" class="block mb-1">Trade Name</label>
                                        <input type="text" id="tradename" name="tradename"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->tradename }}" pattern="[A-Za-z\s.,-]+ "
                                            maxlength="50" placeholder="Ex. Concentrix Webhelp">
                                        @error('tradename')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="location-type" class="block mb-1">
                                            Location Type
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex items-center mb-2">
                                            <input type="radio" id="locationtype1" name="locationtype"
                                                value="Main" class="mr-2"
                                                {{ $profile->locationtype == 'Main' ? 'checked' : '' }}>
                                            <label for="locationtype1">Main</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="locationtype2" name="locationtype"
                                                value="Branch" class="mr-2"
                                                {{ $profile->locationtype == 'Branch' ? 'checked' : '' }}>
                                            <label for="locationtype2">Branch</label>
                                        </div>
                                        @error('locationtype')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="employer-type" class="block mb-1">
                                            Employer Type
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <select id="employertype" name="employertype"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                            <option value="" disabled selected>Select employer type
                                            </option>
                                            <option value="Public"
                                                {{ $profile->employertype == 'Public' ? 'selected' : '' }}>
                                                Public</option>
                                            <option value="Private"
                                                {{ $profile->employertype == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                        @error('employertype')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="totalworkforce" class="block mb-1">
                                            Total Work Force
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <select id="totalworkforce" name="totalworkforce"
                                            class="w-full p-2 border rounded  bg-gray-100  text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400">
                                            <option value="" disabled selected>Select total work
                                                force
                                            </option>
                                            <option value="1-10"
                                                {{ $profile->totalworkforce == '1-10' ? 'selected' : '' }}>
                                                1-10</option>
                                            <option value="11-50"
                                                {{ $profile->totalworkforce == '11-50' ? 'selected' : '' }}>
                                                11-50</option>
                                            <option value="51-100"
                                                {{ $profile->totalworkforce == '51-100' ? 'selected' : '' }}>
                                                51-100</option>
                                            <option value="101-500"
                                                {{ $profile->totalworkforce == '101-500' ? 'selected' : '' }}>
                                                101-500</option>
                                            <option value="501-1000"
                                                {{ $profile->totalworkforce == '501-1000' ? 'selected' : '' }}>
                                                501-1000</option>
                                            <option value="1001+"
                                                {{ $profile->totalworkforce == '1001+' ? 'selected' : '' }}>
                                                1001+</option>
                                        </select>
                                        @error('totalworkforce')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="address" class="block mb-1">
                                            Business Address
                                            <span class="text-red-500">*</span>
                                        </label> <input type="text" id="address" name="address"
                                            class="w-full p-2 border rounded  bg-gray-100  text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->address }}" pattern="[A-Za-z\s.,-]+ "
                                            maxlength="100" placeholder="Ex. House No., Street, Village">
                                        @error('address')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div id="barangay-container" class=" relative">
                                        <label for="city" class="block mb-1">
                                            City
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex items-center">
                                            <input id="city" type="text" name="city"
                                                class="w-full p-2 border rounded shadow-sm  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                                placeholder="Type to search Barangay..." value="{{ $profile->city }}"
                                                readonly>
                                            <button id="editButton"
                                                class="ml-2 px-3 py-2 bg-blue-500 text-white rounded">Edit</button>
                                        </div>
                                        <div id="barangay-suggestions"
                                            class="absolute z-10 mt-1 w-full max-h-90 overflow-y-auto bg-white border rounded shadow-md hidden">
                                        </div>
                                        <div id="barangay-error" class="text-red-600 mt-1 hidden">
                                            Error
                                            fetching
                                            barangay data</div>
                                    </div>

                                    <div class="mt">
                                        <label for="city" class="block mb-1">
                                            Zip Code
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex items-center mt-4">
                                            <input type="text" id="zipcode" name="zipcode"
                                                class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                                value="{{ $profile->zipCode }}" placeholder="Enter Zip Code"
                                                readonly />
                                            <!-- Add disabled attribute here -->
                                            @error('zipCode')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="contactperson" class="block mb-1">
                                            Contact Person
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="contact_person" name="contact_person"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->contact_person }}" pattern="[A-Za-z\s.,-]+ "
                                            maxlength="50" placeholder="Ex. Juan Dela Cruz">
                                        @error('contact_person')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="position" class="block mb-1">
                                            Position
                                            <span class="text-red-500">*</span>
                                        </label> <input type="text" id="position" name="position"
                                            class="w-full p-2 border rounded  bg-gray-100  text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->position }}" pattern="[A-Za-z\s.,-]+ "
                                            maxlength="50" placeholder="Ex. Manager">
                                        @error('position')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="telephone_no" class="block mb-1">Telephone
                                            No.</label>
                                        <input type="text" id="telephone_no" name="telephone_no"
                                            class="w-full p-2 border rounded bg-gray-100  text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->telephone_no }}" pattern="[0-9]+"
                                            title="Please enter numbers only" maxlength="8"
                                            placeholder="Ex. 89839463">
                                        @error('telephone_no')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="mobile_no" class="block mb-1">
                                            Mobile No.
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="mobile_no" name="mobile_no"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->mobile_no }}" pattern="[0-9]+" maxlength="11"
                                            placeholder="Ex. 09673411152">
                                        @error('mobile_no')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="flex flex-wrap gap-1">
                                        <label for="fax_no" class="block mb-1">Fax No.</label>

                                        <input type="text" id="hiddenFaxNumber" name="hiddenFaxNumber"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            pattern="\d*" title="Enter numeric digits" maxlength="9"
                                            placeholder="4631" value="{{ $profile->fax_no }}" readonly>
                                    </div>


                                    <div>
                                        <label for="busines_email" class="block mb-1">
                                            Business Email
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email_address" name="email_address"
                                            class="w-full p-2 border rounded  bg-gray-100 text-gray-800 placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400"
                                            value="{{ $profile->email_address }}"
                                            placeholder="Ex. juandelacruz@gmail.com">
                                        @error('email_address')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <!-- Container div with text alignment set to right -->
                                        <button type="submit" class="py-2 px-4 bg-green-600 text-white rounded">Save
                                            Changes
                                        </button>
                                    </div>
                                    <br>



                                </div>



                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangayInput = document.getElementById('city');
        const suggestionsContainer = document.getElementById('barangay-suggestions');
        const errorDiv = document.getElementById('barangay-error');
        const zipCodeInput = document.getElementById('zipcode');

        let mandaluyongBarangays = [];

        // Fetch barangay data
        fetch('/locations/municipalities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Flatten all barangays into a single array with city information
                allBarangays = Object.keys(data).flatMap(city => {
                    return data[city].map(barangay => ({
                        city: city,
                        location: barangay.location,
                        zip: barangay.zip
                    }));
                });

                // Add input event listener after data is fetched and processed
                barangayInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();

                    // Filter barangays based on the input query
                    const filteredBarangays = allBarangays.filter(barangay =>
                        barangay.location.toLowerCase().includes(query)
                    ).slice(0, 5); // Limit to first 10 results

                    // Render filtered suggestions
                    renderSuggestions(filteredBarangays);
                    editButton.style.display = 'none'; // Show edit button

                });


            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });


        function renderSuggestions(locations) {
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions

            if (locations.length > 0) {
                suggestionsContainer.style.display = 'block'; // Show suggestions container
                locations.forEach(location => {
                    const suggestionElement = document.createElement('div');
                    suggestionElement.classList.add('suggestion');

                    const suggestionText = document.createElement('div');
                    suggestionText.classList.add('suggestion-text');
                    suggestionText.textContent = `${location.city} - ${location.location}`;

                    const plusContainer = document.createElement('div');
                    plusContainer.classList.add('plus-container');
                    plusContainer.textContent = '+'; // Adjust content based on your needs

                    suggestionElement.appendChild(suggestionText);
                    suggestionElement.appendChild(plusContainer);

                    suggestionElement.addEventListener('click', function() {
                        barangayInput.value = `${location.city} - ${location.location}`;;
                        zipCodeInput.value = location.zip;
                        suggestionsContainer.style.display = 'none';
                        editButton.style.display = 'inline-block'; // Show edit button
                        barangayInput.readOnly = true;
                    });

                    suggestionsContainer.appendChild(suggestionElement);
                });

                document.addEventListener('click', function(event) {
                    if (!suggestionsContainer.contains(event.target)) {
                        suggestionsContainer.style.display = 'none';
                    }
                });
            } else {
                suggestionsContainer.style.display = 'none'; // Hide suggestions if no matches
            }
        }



        // Edit button functionality
        editButton.addEventListener('click', function() {
            event.preventDefault();
            editButton.style.display = 'none'; // Show edit button
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
        console.log('Document loaded');
        const input = document.getElementById('city');
        const list = document.getElementById('city-list');
        const maxSuggestions = 10;
        let displayedSuggestions = new Set();

        fetch('https://psgc.gitlab.io/api/cities/')
            .then(response => response.json())
            .then(data => {
                console.log('Data fetched:', data);
                input.addEventListener('input', function() {
                    const keyword = this.value.trim().toLowerCase();
                    list.innerHTML = ''; // Clear previous suggestions
                    displayedSuggestions.clear(); // Clear displayed suggestions set
                    let count = 0;
                    data.forEach(city => {
                        if (city.name.toLowerCase().includes(keyword) && count <
                            maxSuggestions) {
                            if (!displayedSuggestions.has(city.name)) {
                                const option = document.createElement('option');
                                option.value = city.name;
                                list.appendChild(option);
                                displayedSuggestions.add(city.name);
                                count++;
                            }
                        }
                    });

                    list.addEventListener('click', function(event) {
                        const selectedCity = event.target.value;
                        input.value = selectedCity; // Set input value to the selected city
                        list.innerHTML = ''; // Clear the suggestion list
                        console.log('Selected city:', selectedCity);
                    });
                });
                console.log('Datalist populated');
            })
            .catch(error => console.error('Error fetching city data:', error));
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
            document.getElementById('tin9'),
            document.getElementById('tin10'), // New input
            document.getElementById('tin11'), // New input
            document.getElementById('tin12') // New input
        ];
        const fullTINInput = document.getElementById('tinno');

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


    function updateHiddenFaxNumber() {
        const areaCode = document.getElementById('faxAreaCode').value;
        const prefix = document.getElementById('faxPrefix').value;
        const faxNumber = document.getElementById('faxNumber').value;

        const concatenatedFaxNumber = `${areaCode}${prefix}${faxNumber}`;

        document.getElementById('hiddenFaxNumber').value = concatenatedFaxNumber;
    }

    function handleInputNavigation(currentInput, nextInput, prevInput) {
        currentInput.addEventListener('input', function() {
            if (this.value.length >= this.maxLength) {
                nextInput.focus();
            }
            updateHiddenFaxNumber();
        });

        currentInput.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value.length === 0 && prevInput) {
                prevInput.focus();
            }
        });
    }

    const faxAreaCode = document.getElementById('faxAreaCode');
    const faxPrefix = document.getElementById('faxPrefix');
    const faxNumber = document.getElementById('faxNumber');
    handleInputNavigation(faxAreaCode, faxPrefix, null);
    handleInputNavigation(faxPrefix, faxNumber, faxAreaCode);
    handleInputNavigation(faxNumber, null, faxPrefix);
    faxNumber.addEventListener('input', updateHiddenFaxNumber);
    window.onload = updateHiddenFaxNumber;
</script>

<style>
    .flex-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input-field {
        height: 3rem;
        /* Adjust as necessary */
        width: 5rem;
        /* Adjust as necessary */
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }

    .dash {
        height: 3rem;
        /* Match the height of input fields */
        line-height: 3rem;
        /* Same as height to center the dash */
        font-size: 1.5rem;
        /* Adjust font size as necessary */
    }

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
