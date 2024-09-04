<x-app-layout>
    @if (Auth::check() && Auth::user()->account_verification_status === 'pending')
        <x-slot name="header">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                    {{ __('Encode Employer Profile') }}
                </h2>
            </div>

        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                {{ __('Waiting for Approval ') }}
            </h2>
        </x-slot>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
                {{ __('Account Activated') }}
            </h2>
        </x-slot>
    @endif
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    </head>

    @if (Auth::check() && is_null(Auth::user()->email_verified_at))
        <div class="landscape-container mt-20">
            <div class="container w-3/4 mx-auto landscape-content">
                <div
                    class="bg-white text-black dark:bg-gray-700 dark:text-gray-200  p-6 rounded-lg shadow-md text-center">
                    <div class="text-6xl text-red-500">&#9888;</div> <!-- Updated icon to warning sign -->
                    <h2 class="text-2xl font-bold mb-4">Email Verification Required</h2>
                    <p class="text-lg text-black-700 mb-8">
                        Your personal information has been approved by our system. However, you need to verify
                        your email to access your account.
                    </p>
                    <br>
                    <p class="text-lg text-black-700 mb-8">
                        Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed to
                        creating an inclusive and accessible environment for all users, including Persons With
                        Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to ensure
                        that our platform is accessible to individuals of all abilities. Please verify your email to
                        proceed to your user dashboard.
                    </p>
                    <form action="{{ route('profile.edit') }}" method="GET">
                        @csrf
                        <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">GO TO
                            PROFILE</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        @if (Auth::check() && Auth::user()->account_verification_status === 'pending')

            <body>
                <div class="py-12">
                    <div class="container mx-auto">
                        <div class="flex justify-center">
                            <div class="w-screen">
                                <form action="{{ route('employer.setup') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="bg-red-100 border dark:bg-red-700 dark:text-gray-100 border-red-400 text-red-700 px-4 py-3 rounded relative"
                                            role="alert">
                                            <strong class="font-bold">Oops!</strong>
                                            <span class="block sm:inline">There were some errors with your
                                                submission:</span>
                                            <ul class="mt-3 list-disc list-inside text-sm">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br>
                                    @endif

                                    <!-- Step 1: Applicant Profile -->
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                                        id="step1">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-2xl font-bold mb-2">Employer Profile</h3>
                                                <span class="text-md font-medium text-black-500"> STEP 1 OUT OF 2</span>
                                            </div>
                                            <span class="text-md font-regular" style="text-align: justify;">
                                                <b>Step 1:</b> For your employer
                                                Profile,
                                                fill
                                                up the business name, TIN, and trade name if applicable. Select
                                                "Main"
                                                or "Branch" for location type, provide contact details, choose
                                                your
                                                employer type from the dropdown, and enter the total workforce
                                                number.
                                                Add your business address and zip code, then review for accuracy
                                                before
                                                proceeding. <b> Only select the city locations in the dropdown
                                                    box. </b>

                                            </span>
                                            <br>
                                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="businessname" class="block mb-1">
                                                        Business Name
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="businessname" name="businessname"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="[A-Za-z\s.,-]+ "
                                                        title="Please enter alphabetic characters only"
                                                        value="{{ old('businessname', $employerData['businessname'] ?? '') }}"
                                                        maxlength="50" placeholder="Ex. Concentrix">
                                                    @error('businessname')
                                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mt-0">
                                                    <label for="tin" class="block mb-1">
                                                        Taxpayer Identification Number
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="tinno" name="tinno"
                                                        value="{{ old('tinno', $employerData['tinno'] ?? '') }}"
                                                        maxlength="12"
                                                        class="w-full px-4 py-2 rounded-md border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        placeholder="(12 Digits Max)">
                                                    {{-- <div class="flex flex-wrap gap-1">
                                                        <!-- Group 1 -->
                                                        <input type="text" id="tin1" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit" maxlength="1"
                                                            value="{{ old('tin.0', $employerData['tin.0'] ?? '') }}" />
                                                        <input type="text" id="tin2" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit" maxlength="1"
                                                            value="{{ old('tin.1', $employerData['tin.1'] ?? '') }}" />
                                                        <input type="text" id="tin3" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit" maxlength="1"
                                                            value="{{ old('tin.2', $employerData['tin.2'] ?? '') }}" />

                                                        <!-- Hyphen -->
                                                        <span
                                                            class="flex items-center justify-center font-semibold w-5 sm:w-auto md:w-5 lg:w-auto xl:w-5 text-center">-</span>

                                                        <!-- Group 2 -->
                                                        <input type="text" id="tin4" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit" maxlength="1"
                                                            value="{{ old('tin.3', $employerData['tin.3'] ?? '') }}" />
                                                        <input type="text" id="tin5" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.4', $employerData['tin.4'] ?? '') }}" />
                                                        <input type="text" id="tin6" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.5', $employerData['tin.5'] ?? '') }}" />

                                                        <!-- Hyphen -->
                                                        <span
                                                            class="flex items-center justify-center font-semibold w-5 sm:w-auto md:w-5 lg:w-auto xl:w-5 text-center">-</span>

                                                        <!-- Group 3 -->
                                                        <input type="text" id="tin7" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.6', $employerData['tin.6'] ?? '') }}" />
                                                        <input type="text" id="tin8" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.7', $employerData['tin.7'] ?? '') }}" />
                                                        <input type="text" id="tin9" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.8', $employerData['tin.8'] ?? '') }}" />

                                                        <!-- Hyphen -->
                                                        <span
                                                            class="flex items-center justify-center font-semibold w-5 sm:w-auto md:w-5 lg:w-auto xl:w-5 text-center">-</span>

                                                        <!-- Group 4 (new inputs) -->
                                                        <input type="text" id="tin10" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.9', $employerData['tin.9'] ?? '') }}" />
                                                        <input type="text" id="tin11" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.10', $employerData['tin.10'] ?? '') }}" />
                                                        <input type="text" id="tin12" name="tin[]"
                                                            class="w-12 sm:w-10 md:w-12 lg:w-10 xl:w-12 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            pattern="\d" title="Enter a single digit"
                                                            maxlength="1"
                                                            value="{{ old('tin.11', $employerData['tin.11'] ?? '') }}" />
                                                    </div> --}}
                                                    {{-- <div class="mt-6">

                                                    </div> --}}


                                                </div>


                                                <div>
                                                    <label for="tradename" class="block mb-1">Trade Name</label>
                                                    <input type="text" id="tradename" name="tradename"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 "
                                                        value="{{ old('tradename', $employerData['tradename'] ?? '') }}"
                                                        pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                        placeholder="Ex. Concentrix Webhelp">
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
                                                            {{ old('locationtype', $employerData['locationtype'] ?? '') == 'Main' ? 'checked' : '' }}>
                                                        <label for="locationtype1">Main</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="radio" id="locationtype2" name="locationtype"
                                                            value="Branch" class="mr-2"
                                                            {{ old('locationtype', $employerData['locationtype'] ?? '') == 'Branch' ? 'checked' : '' }}>
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
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                        <option value="" disabled selected>Select employer type
                                                        </option>
                                                        <option value="Public"
                                                            {{ old('employertype', $employerData['employertype'] ?? '') == 'Public' ? 'selected' : '' }}>
                                                            Public</option>
                                                        <option value="Private"
                                                            {{ old('employertype', $employerData['employertype'] ?? '') == 'Private' ? 'selected' : '' }}>
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
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                        <option value="" disabled selected>Select total work
                                                            force
                                                        </option>
                                                        <option value="1-10"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '1-10' ? 'selected' : '' }}>
                                                            1-10</option>
                                                        <option value="11-50"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '11-50' ? 'selected' : '' }}>
                                                            11-50</option>
                                                        <option value="51-100"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '51-100' ? 'selected' : '' }}>
                                                            51-100</option>
                                                        <option value="101-500"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '101-500' ? 'selected' : '' }}>
                                                            101-500</option>
                                                        <option value="501-1000"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '501-1000' ? 'selected' : '' }}>
                                                            501-1000</option>
                                                        <option value="1001+"
                                                            {{ old('totalworkforce', $employerData['totalworkforce'] ?? '') == '1001+' ? 'selected' : '' }}>
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
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="{{ old('address', $employerData['address'] ?? '') }}"
                                                        pattern="[A-Za-z\s.,-]+ " maxlength="100"
                                                        placeholder="Ex. House No., Street, Village">
                                                    @error('address')
                                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>



                                                <div id="municipality-container" class="relative">
                                                    <label for="city" class="block mb-1">
                                                        City
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <select id="municipality-dropdown" name="municipality"
                                                            class="w-full p-2 border rounded shadow-sm bg-transparent text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            aria-placeholder="Select a Municipality or City">
                                                            <option value="" disabled selected>Select a
                                                                Municipality or City
                                                            </option>
                                                            <!-- Options will be dynamically populated here -->
                                                        </select>
                                                    </div>
                                                    <!-- Hidden input to store the selected barangay data -->
                                                    <input type="text" id="selected-municipality"
                                                        name="selected-municipality"
                                                        value="{{ old('municipality', $employerData['municipality'] ?? '') }}"
                                                        hidden>
                                                </div>


                                                <div class="mt">
                                                    <label for="zipcode" class="block mb-1">
                                                        Zip Code
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="flex items-center mt-2">
                                                        <input type="text" id="zipcode" name="zipcode"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('zipcode', $employerData['zipcode'] ?? '') }}"
                                                            placeholder="Enter Zip Code" readonly />
                                                        <!-- Add disabled attribute here -->
                                                        @error('zipcode')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- Step 1: Applicant Profile -->
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                                        id="step1">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-2xl font-bold mb-2">Contact Details</h3>
                                                <span class="text-md font-medium text-black-500"> STEP 2 OUT OF
                                                    2</span>
                                            </div>
                                            <span class="text-md font-regular" style="text-align: justify;"><b>
                                                    Step 2: </b>For</b>
                                                the “Contact Details” form, input your name, position, telephone and
                                                mobile numbers, fax number if applicable, and email address. Once
                                                all fields are filled accurately, click the "Submit Form" button to
                                                proceed.
                                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="contactperson" class="block mb-1">
                                                            Contact Person
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="contact_person"
                                                            name="contact_person"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('contact_person', $employerData['contact_person'] ?? '') }}"
                                                            pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                            placeholder="Ex. Juan Dela Cruz">
                                                        @error('contact_person')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <label for="position" class="block mb-1">
                                                            Position
                                                            <span class="text-red-500">*</span>
                                                        </label> <input type="text" id="position" name="position"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('position', $employerData['position'] ?? '') }}"
                                                            pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                            placeholder="Ex. Manager">
                                                        @error('position')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <label for="telephone_no" class="block mb-1">Telephone
                                                            No.</label>
                                                        <input type="text" id="telephone_no" name="telephone_no"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('telephone_no', $employerData['telephone_no'] ?? '') }}"
                                                            pattern="[0-9]+" title="Please enter numbers only"
                                                            maxlength="8" placeholder="Ex. 89839463">
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
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('mobile_no', $employerData['mobile_no'] ?? '') }}"
                                                            pattern="[0-9]+" maxlength="11"
                                                            placeholder="Ex. 09673411152">
                                                        @error('mobile_no')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="flex flex-wrap gap-1">
                                                        <label for="fax_no" class="block mb-1">Fax No.</label>

                                                        <input type="text" id="faxAreaCode" name="fax[]"
                                                            class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="2" placeholder="(02)"
                                                            value="{{ old('fax.0', $employerData['fax.0'] ?? '') }}" />

                                                        <!-- Separator (e.g., hyphen) -->
                                                        <span class="flex-center dash">-</span>

                                                        <!-- Prefix -->
                                                        <input type="text" id="faxPrefix" name="fax[]"
                                                            class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="3" placeholder="631"
                                                            value="{{ old('fax.1', $employerData['fax.1'] ?? '') }}" />

                                                        <!-- Separator (e.g., hyphen) -->
                                                        <span class="flex-center dash">-</span>


                                                        <!-- Fax Number -->
                                                        <input type="text" id="faxNumber" name="fax[]"
                                                            class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="4" placeholder="4631"
                                                            value="{{ old('fax.2', $employerData['fax.2'] ?? '') }}" />

                                                        <input type="text" id="hiddenFaxNumber"
                                                            name="hiddenFaxNumber"
                                                            class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            pattern="\d*" title="Enter numeric digits"
                                                            maxlength="9" placeholder="4631"
                                                            value="{{ old('hiddenFaxNumber', $employerData['hiddenFaxNumber'] ?? '') }}"
                                                            hidden>
                                                        @error('hiddenFaxNumber')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>




                                                    <div>
                                                        <label for="busines_email" class="block mb-1">
                                                            Business Email
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="email" id="email_address" name="email_address"
                                                            class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            value="{{ old('email_address', $employerData['email_address'] ?? '') }}"
                                                            placeholder="Ex. juandelacruz@gmail.com">
                                                        @error('email_address')
                                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="text-right">
                                                    <!-- Container div with text alignment set to right -->
                                                    <button type="submit"
                                                        class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Submit
                                                        Form</button>
                                                </div>

                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    {{-- @elseif(Auth::check() && Auth::user()->account_verification_status === 'declined')
                    <div class="landscape-container mt-20">
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                                <div class="text-red-500 text-7xl mb-5">
                                    <i class="fa-solid fa-exclamation-triangle"></i>
                                    <!-- Changed icon to indicate an issue -->
                                </div>
                                <h2 class="font-bold mb-4 text-3xl">Account Declined</h2> <!-- Updated title -->
                                <h2 class="text-black-700 mb-4">We're sorry, but your account has been declined.</h2>
                                <!-- Updated message -->
                                <br>
                                <p class="text-black-700 mb-8">
                                    Unfortunately, your account did not meet the criteria required to join our platform.
                                    If you believe this is a mistake or have any questions, please contact our support
                                    team for further assistance.
                                </p>
                                <form action="{{ route('employer.messages') }}" method="GET">
                                    <!-- Updated form action to a support route -->
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-4 bg-red-500 text-white rounded inline-block">CONTACT
                                        SUPPORT</button> <!-- Updated button text and color -->
                                </form>
                            </div>
                        </div>
                    </div> --}}
                @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
                    <div class="landscape-container mt-20"> <!-- Add mt-5 class for margin-top -->
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                                <div class="text-6xl text-green-500 ">&#10004;</div>
                                <h2 class="text-2xl font-bold mb-4">Waiting for Administrator Approval</h2>
                                <p class="text-lg text-black-700 mb-8 ">Your employer information has been
                                    submitted.
                                    Please
                                    wait
                                    for administrator approval.</p> <br>
                                <p class="text-lg text-black-700 mb-8 ">Thank you for registering your account with
                                    us.
                                    At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible
                                    environment
                                    for
                                    all users, including Persons With Disabilities (PWDs). As part of our commitment
                                    to
                                    diversity
                                    and equality, we strive to ensure that our platform is accessible to individuals
                                    of
                                    all
                                    abilities. Please note that account verification may take <b> 1-2 business days
                                    </b>.
                                </p>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-4 bg-black text-white rounded inline-block">LOGOUT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="landscape-container mt-20"> <!-- Add mt-5 class for margin-top -->
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="  text-black dark:bg-gray-700 dark:text-gray-200  p-6 rounded-lg shadow-md text-center">
                                <div class="text-6xl text-green-500 ">&#10004;</div>
                                <h2 class="text-2xl font-bold mb-4">Account Approved!</h2>
                                <p class="text-lg text-black-700 mb-8 ">Your employer information has been approved
                                    by
                                    the
                                    administrator.
                                    You can now access your account.</p> <br>
                                <p class="text-lg text-black-700 mb-8 ">Thank you for registering your account with
                                    us.
                                    At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible
                                    environment
                                    for
                                    all users, including Persons With Disabilities (PWDs). As part of our commitment
                                    to
                                    diversity
                                    and equality, we strive to ensure that our platform is accessible to individuals
                                    of
                                    all
                                    abilities. You may return to your employer dashboard accordingly.
                                </p>
                                <form action="{{ route('employer.dashboard') }}" method="GET">
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-4 bg-black text-white rounded inline-block">RETURN
                                        TO DASHBOARD</button>
                                </form>
                            </div>
                        </div>
                    </div>
        @endif
    @endif
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
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
</style>
