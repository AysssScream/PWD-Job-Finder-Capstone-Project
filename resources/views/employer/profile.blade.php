<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Company Profile</title>
    </head>

    @if (Session::has('message'))
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
        <div class="container mx-auto max-w-8xl px-4 pt-5 "
            style="
    margin-left: 0px;
    margin-right: 0px;
            ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-3 text-gray-800 dark:text-gray-300">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('employer.dashboard') }}"
                                    class="inline-flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>&nbsp;Back to Dashboard</span>
                                </a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto max-w-8xl px-4 pt-5 ">
            </div>
            <div class="grid grid-cols-1  g:grid-cols-3">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1 shadow-lg">
                    <div class="p-0 pb-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 rounded-t-lg mb-4 flex items-center">
                            <i class="fas fa-briefcase text-white text-2xl mr-2"></i>
                            <h3 class="text-2xl font-bold  text-white">Employer Profile</h3>
                        </div>


                        <div class="flex flex-col items-center space-y-4">

                            <!-- Image Preview -->
                            @if (Auth::user()->employer->company_logo)
                                <div
                                    class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-white rounded-full overflow-hidden mx-auto mb-4 border border-gray-700 shadow-lg">
                                    <img id="imagePreview"
                                        src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                        alt="Profile Picture" class="w-full h-full object-contain"
                                        onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                </div>
                            @else
                                <div
                                    class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-gray-200 rounded-full overflow-hidden mx-auto mb-4 border border-gray-700 shadow-lg flex items-center justify-center">
                                    <img id="imagePreview" src="/images/avatar.png" alt="Profile Picture"
                                        class="w-full h-full object-contain">
                                </div>
                            @endif

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
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Profile Picture
                                    </label>
                                    <button type="submit"
                                        class="mt-2 bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                        <i class="fas fa-save mr-2"></i>
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
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2 shadow-lg mt-5  rounded-t-lg border-r-4 border-blue-500">
                    <form action="{{ route('employer.updateprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-6 pb-0">
                            @if ($errors->any())
                                <div class="bg-red-100 p-10 dark:bg-red-700 dark:text-gray-200  border border-red-400 text-red-700 px-8 py-3 rounded relative"
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
                        </div>

                        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mt-4 p-2 mb-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-2 rounded-t-lg ">
                                <label for="account" class="block text-xl  text-white dark:text-gray-200">
                                    <i class="fas fa-cog mr-2"></i> <!-- Font Awesome icon for settings -->
                                    Account Settings
                                </label>
                            </div>
                            <div class="bg-white dark:bg-gray-800 shadow-3d  rounded-b-lg p-6">
                                <label for="firstname" class="block mb-1  text-black dark:text-gray-200">
                                    Full Name
                                    <input type="text" id="account" name="account" placeholder="Full Name"
                                        value="{{ Auth::user()->name }}" disabled
                                        class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg mb-4 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50
                                     ">
                                </label>

                                <div x-data="{ open: false }">
                                    <!-- Change Password Button -->
                                    <button type="button"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                        @click="open = true">
                                        <i class="fas fa-lock mr-2"></i> <!-- Font Awesome icon for lock -->
                                        Change Password
                                    </button>

                                    <template x-if="open">
                                        <!-- Modal -->
                                        <div x-show="open"
                                            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-6"
                                            x-cloak>
                                            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg relative"
                                                style="max-height: 90vh; overflow-y: auto;">
                                                <div class="flex items-center">
                                                    <!-- New div on the left -->
                                                    <div class="flex-1"></div>

                                                    <!-- Close button -->
                                                    <button @click="open = false"
                                                        class="w-10 h-10 p-2 mb-5 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div
                                                    class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                                                    <div class="max-w-8xl">
                                                        @include('profile.partials.update-password-form')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>


                            <div class="bg-white dark:bg-gray-800 shadow-3d  rounded-b-lg  mt-5 rounded-lg">

                                <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-2 rounded-t-lg mb-4 ">
                                    <label for="account" class="block text-xl mb-1 text-white dark:text-gray-200">
                                        <i class="fas fa-building mr-2"></i>
                                        <!-- Font Awesome icon for company/building -->
                                        Company Details
                                    </label>
                                </div>

                                <div class="p-6">
                                    <label for="businessname" class="block mb-1 text-black dark:text-gray-200">
                                        Company Description
                                        <span class="text-black">
                                            <textarea id="exampleTextarea" name="companydescription" rows="4" maxlength="1200"
                                                class="w-full mt-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                                placeholder="Enter your text here...">{{ $profile->company_description }}</textarea>

                                            <div id="charCount" class="text-right text-black dark:text-gray-200">
                                            </div>
                                            <script>
                                                const textarea = document.getElementById('exampleTextarea');
                                                const charCount = document.getElementById('charCount');

                                                textarea.addEventListener('input', function() {
                                                    const textLength = textarea.value.length;
                                                    charCount.textContent = `${textLength} / 1200 characters`;
                                                });

                                                const initialTextLength = textarea.value.length;
                                                charCount.textContent = `${initialTextLength} / 1200 characters`;
                                            </script>


                                            <div class="text-gray-900 dark:text-gray-100">
                                                <div class="p-6 pt-0">
                                                    <br>
                                                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="businessname" class="block mb-1">
                                                                Business Name
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <input type="text" id="businessname"
                                                                name="businessname"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->businessname }}" maxlength="50"
                                                                placeholder="Ex. Concentrix">
                                                            @error('businessname')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-0">
                                                            <label for="tin" class="block mb-1">
                                                                TIN Number
                                                                <span class="text-red-500">*</span>
                                                            </label>

                                                            <input type="text" id="tinno" name="tinno"
                                                                value="{{ $profile->tinno }}" maxlength="12"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 shadow-md rounded-lg cursor-not-allowed"
                                                                placeholder="(12 Digits Max)" readonly>
                                                        </div>


                                                        <div>
                                                            <label for="tradename" class="block mb-1">Trade
                                                                Name</label>
                                                            <input type="text" id="tradename" name="tradename"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->tradename }}"
                                                                pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                                placeholder="Ex. Concentrix Webhelp">
                                                            @error('tradename')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="location-type" class="block mb-1">
                                                                Location Type
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <div class="flex items-center mb-2">
                                                                <input type="radio" id="locationtype1"
                                                                    name="locationtype" value="Main" class="mr-2"
                                                                    {{ $profile->locationtype == 'Main' ? 'checked' : '' }}>
                                                                <label for="locationtype1">Main</label>
                                                            </div>
                                                            <div class="flex items-center">
                                                                <input type="radio" id="locationtype2"
                                                                    name="locationtype" value="Branch" class="mr-2"
                                                                    {{ $profile->locationtype == 'Branch' ? 'checked' : '' }}>
                                                                <label for="locationtype2">Branch</label>
                                                            </div>
                                                            @error('locationtype')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="employer-type" class="block mb-1">
                                                                Employer Type
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <select id="employertype" name="employertype"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                readonly>
                                                                <option value="" selected>Select employer type
                                                                </option>
                                                                <option value="Government"
                                                                    {{ $profile->employertype == 'Government' ? 'selected' : '' }}>
                                                                    Government</option>
                                                                <option value="Private"
                                                                    {{ $profile->employertype == 'Private' ? 'selected' : '' }}>
                                                                    Private</option>
                                                            </select>
                                                            @error('employertype')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="totalworkforce" class="block mb-1">
                                                                Total Work Force
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <select id="totalworkforce" name="totalworkforce"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg ">
                                                                <option value="" disabled selected>Select total
                                                                    work
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
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="address" class="block mb-1">
                                                                Business Address
                                                                <span class="text-red-500">*</span>
                                                                <input type="text" id="address" name="address"
                                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                    value="{{ $profile->address }}"
                                                                    pattern="[A-Za-z\s.,-]+ " maxlength="100"
                                                                    placeholder="Ex. House No., Street, Village">

                                                                @error('address')
                                                                    <div class="text-red-600 mt-1">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>



                                                        <div id="municipality-container" class="relative">
                                                            <label for="municipality" class="block mb-1">
                                                                City
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <div class="relative">
                                                                <select id="municipality-dropdown" name="municipality"
                                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg"
                                                                    aria-placeholder="Select a Municipality or City"
                                                                    >
                                                                    <option
                                                                        value="{{ old('municipality', $profile->municipality ?? '') }}"
                                                                        selected>
                                                                        {{ old('municipality', $profile->municipality ?? '') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <!-- Hidden input to store the selected barangay data -->
                                                            <input type="text" id="selected-municipality"
                                                                name="selected-municipality"
                                                                value="{{ old('municipality', $profile->municipality ?? '') }}"
                                                                hidden>
                                                        </div>

                                                        <div class="mt">
                                                            <label for="zipcode" class="block mb-1">
                                                                Zip Code
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <div class="flex items-center mt-2">
                                                                <input type="text" id="zipcode" name="zipcode"
                                                                    class="w-full p-3 border border-gray-400 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 shadow-md rounded-lg cursor-not-allowed"
                                                                    value="{{ old('zipcode', $profile->zipCode ?? '') }}"
                                                                    placeholder="Enter Zip Code" readonly>
                                                                <!-- Add disabled attribute here -->
                                                                @error('zipcode')
                                                                    <div class="text-red-600 mt-1">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label for="contactperson" class="block mb-1">
                                                                Contact Person
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <input type="text" id="contact_person"
                                                                name="contact_person"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->contact_person }}"
                                                                pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                                placeholder="Ex. Juan Dela Cruz">
                                                            @error('contact_person')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="position" class="block mb-1">
                                                                Position
                                                                <span class="text-red-500">*</span>
                                                            </label> <input type="text" id="position"
                                                                name="position"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg 0"
                                                                value="{{ $profile->position }}"
                                                                pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                                placeholder="Ex. Manager">
                                                            @error('position')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="telephone_no" class="block mb-1">Telephone
                                                                No.</label>
                                                            <input type="text" id="telephone_no"
                                                                name="telephone_no"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->telephone_no }}" pattern="[0-9]+"
                                                                title="Please enter numbers only" maxlength="8"
                                                                placeholder="Ex. 89839463">
                                                            @error('telephone_no')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="mobile_no" class="block mb-1">
                                                                Mobile No.
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <input type="text" id="mobile_no" name="mobile_no"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->mobile_no }}" pattern="[0-9]+"
                                                                maxlength="11" placeholder="Ex. 09673411152">
                                                            @error('mobile_no')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="flex flex-wrap gap-1">
                                                            <label for="fax_no" class="block mb-1">Fax No.</label>

                                                            <input type="text" id="hiddenFaxNumber"
                                                                name="hiddenFaxNumber"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                pattern="\d*" title="Enter numeric digits"
                                                                maxlength="10" placeholder="4631"
                                                                value="{{ $profile->fax_no }}">
                                                        </div>

                                                        <div class="flex flex-wrap gap-1">
                                                            <label for="website_link" class="block mb-1">Website
                                                                Link</label>

                                                            <input type="text" id="website_link"
                                                                name="website_link"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                title="Enter URL (HTTPS)"
                                                                placeholder="https://www.concentrix.com/"
                                                                value="{{ $profile->website_link }}">
                                                        </div>


                                                        <div>
                                                            <label for="busines_email" class="block mb-1">
                                                                Business Email
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <input type="email" id="email_address"
                                                                name="email_address"
                                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg "
                                                                value="{{ $profile->email_address }}"
                                                                placeholder="Ex. juandelacruz@gmail.com">
                                                            @error('email_address')
                                                                <div class="text-red-600 dark:text-red-400 mt-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <br>
                                                    </div>
                                                    <div class="text-right">
                                                        <!-- Container div with text alignment set to right -->
                                                        <button type="submit"
                                                            class="py-2 px-4 bg-green-600 text-white rounded">
                                                            <i class="fas fa-check mr-2"></i>
                                                            <!-- Replace 'fa-check' with your desired icon -->
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('profilesave'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.info("{{ Session::get('profilesave') }}", 'Account Updated', {
                    timeOut: 4000
                });
            });
        </script>
    @endif


</x-app-layout>
<script>
    const cityDropdown = document.getElementById('municipality-dropdown');
    const errorDiv = document.getElementById('municipality-error');
    const editButton = document.getElementById('editButton');
    const selectedBarangayInput = document.getElementById('selected-municipality');
    const zipCodeInput = document.getElementById('zipcode');

    let allBarangays = [];

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

            // Populate dropdown with barangay data
            populateDropdown(allBarangays);
        })
        .catch(error => {
            console.error('Error fetching barangay data:', error);
            errorDiv.classList.remove('hidden');
        });

    function populateDropdown(barangays) {
        barangays.forEach(barangay => {
            const option = document.createElement('option');
            // Use a unique value, like city and location combined, to differentiate options
            option.value = `${barangay.city}-${barangay.location}`;
            option.textContent = `${barangay.city} - ${barangay.location}`;
            cityDropdown.appendChild(option);
        });
    }



    cityDropdown.addEventListener('change', function() {
        const selectedValue = this.value; // This is in the format 'City-Location'
        const [selectedCityName, selectedLocation] = selectedValue.split('-');
        const selectedBarangay = allBarangays.find(b => b.city === selectedCityName && b
            .location === selectedLocation);

        if (selectedBarangay) {
            selectedBarangayInput.value = `${selectedBarangay.city} - ${selectedBarangay.location}`;
            zipCodeInput.value = selectedBarangay.zip; // Set the zip code separately
            editButton.style.display = 'inline-block'; // Show edit button
        }
    });



    // Edit button functionality
    editButton.addEventListener('click', function(event) {
        event.preventDefault();
        editButton.style.display = 'none'; // Hide edit button
        cityDropdown.value = ''; // Reset dropdown
        selectedBarangayInput.value = ''; // Clear selected barangay input
        zipCodeInput.value = ''; // Clear zip code input
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

    .read-only-field {
        background-color: #f3f4f6;
        color: #6b7280;
        cursor: not-allowed;
    }

    .dark .read-only-field {
        background-color: #374151;
        color: #9ca3af;
    }
</style>
