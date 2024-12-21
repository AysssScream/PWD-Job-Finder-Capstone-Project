<title>Employer Setup</title>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

<x-app-layout>
    @if (Auth::check() && Auth::user()->account_verification_status === 'pending')
        <x-slot name="header">
            <div class="flex items-center">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight">
                    <i class="fas fa-clock mr-2"></i> {{ __('Encode Employer Profile') }}
                </h3>
            </div>
        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
        <x-slot name="header">
            <div class="flex items-center">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight">
                    <i class="fas fa-hourglass mr-2"></i> {{ __('Waiting for Approval') }}
                </h3>
            </div>
        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'declined')
        <x-slot name="header">
            <div class="flex items-center">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight">
                    <i class="fas fa-times-circle mr-2"></i> {{ __('Declined') }}
                </h3>
            </div>
        </x-slot>
    @else
        <x-slot name="header">
            <div class="flex items-center">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight">
                    <i class="fas fa-check-circle mr-2"></i> {{ __('Account Activated') }}
                </h3>
            </div>
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
        <div class="landscape-container mt-18">
            <div class="container w-3/4 mx-auto landscape-content">
                <div class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                    <div
                        class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                        <div
                            class="text-transparent bg-clip-text bg-gradient-to-r from-red-200 to-yellow-300 text-7xl mb-4">
                            <i class="fas fa-warning"></i>
                        </div>
                        <h2
                            class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-200 to-yellow-300 text-3xl mb-4">
                            Email Verification Required
                        </h2>

                        <p class="text-white mb-2">
                            Your personal information has been approved by our system. However, you need to verify
                            your email to access your account.
                        </p>
                    </div>
                    <div class="p-6">
                        <p class=" text-black-700 mb-8">
                            Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed
                            to
                            creating an inclusive and accessible environment for all users, including Persons With
                            Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to
                            ensure
                            that our platform is accessible to individuals of all abilities. Please verify your
                            email to
                            proceed to your user dashboard.
                        </p>
                        <form action="{{ route('profile.edit') }}" method="GET">
                            @csrf
                            <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">
                                <i class="fas fa-user mr-2"></i> GO TO PROFILE
                            </button>
                        </form>
                    </div>
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
                                            role="alert" style="margin-right: 20px;margin-left: 20px;">
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
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-lg mb-4"
                                        id="step1" style="margin-left: 20px; margin-right: 20px;">
                                        <div
                                            class="flex items-center text-blue-500 justify-between  bg-white dark:bg-gray-800 p-4 rounded-t-lg border-4 border-blue-500">
                                            <h3 class="text-2xl font-bold mb-2">
                                                <i class="fas fa-building mr-2"></i> Employer Profile
                                            </h3>

                                            <span class="text-md font-medium ">STEP 1 OUT OF 2</span>
                                        </div>
                                        <div class="bg-gradient-to-r from-blue-700 to-blue-500 p-6 rounded-b-lg ">
                                            <span class="text-md font-regular text-white" style="text-align: justify;">
                                                <b>Step 1:</b> For your employer profile, fill up the business name,
                                                TIN, and trade name if applicable.
                                                Select "Main" or "Branch" for location type, provide contact details,
                                                choose your employer type from the dropdown,
                                                and enter the total workforce number. Add your business address and zip
                                                code, then review for accuracy before proceeding.
                                                <b> Only select the city locations in the dropdown box. </b>
                                            </span>
                                        </div>
                                        <div class="p-6">
                                            <br>
                                            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                                        <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mt-0">
                                                    <label for="tin" class="block mb-1">
                                                        Employer Identification Number (EIN)
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="tinno" name="tinno"
                                                        value="{{ old('tinno', $employerData['tinno'] ?? '') }}"
                                                        maxlength="12"
                                                        class="w-full px-4 py-2 rounded-md border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        placeholder="(12 Digits is Required)">
                                                </div>


                                                <div>
                                                    <label for="tradename" class="block mb-1">Trade Name</label>
                                                    <input type="text" id="tradename" name="tradename"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 "
                                                        value="{{ old('tradename', $employerData['tradename'] ?? '') }}"
                                                        pattern="[A-Za-z\s.,-]+ " maxlength="50"
                                                        placeholder="Ex. Concentrix Webhelp">
                                                    @error('tradename')
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div id="locationTypeContainer">
                                                    <label for="location-type" class="block mb-1">
                                                        Location Type <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="flex items-center mb-2">
                                                        <input type="radio" id="locationtype1" name="locationtype" value="Main" class="radio-border-red mr-2"
                                                            {{ old('locationtype', $employerData['locationtype'] ?? '') == 'Main' ? 'checked' : '' }}>
                                                        <label for="locationtype1">Main</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input type="radio" id="locationtype2" name="locationtype" value="Branch" class="radio-border-red mr-2"
                                                            {{ old('locationtype', $employerData['locationtype'] ?? '') == 'Branch' ? 'checked' : '' }}>
                                                        <label for="locationtype2">Branch</label>
                                                    </div>
                                                    @error('locationtype')
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}
                                                        </div>
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
                                                        <option value="Government"
                                                            {{ old('employertype', $employerData['employertype'] ?? '') == 'Government' ? 'selected' : '' }}>
                                                            Government</option>
                                                        <option value="Private"
                                                            {{ old('employertype', $employerData['employertype'] ?? '') == 'Private' ? 'selected' : '' }}>
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
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
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
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full">
                                                    <label for="website_link" class="block mb-1">Official Website Link
                                                        <span class="text-red-500">*</span></label>
                                                    <input type="url" id="website_link" name="website_link"
                                                        value="{{ old('website_link', $employerData['website_link'] ?? '') }}"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        placeholder="https://www.concentrix.com/" required>
                                                    @error('website_link')
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>



                                                <div id="municipality-container" class="relative mt-[-10px]">
                                                    <label for="city"
                                                        class="block mb-1 text-gray-700 dark:text-gray-300">
                                                        City
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <select id="municipality-dropdown" name="municipality"
                                                            class="w-full p-2 mb-5 border rounded shadow-sm bg-transparent text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                            aria-placeholder="Select a Municipality or City">
                                                            <option
                                                                value="{{ old('municipality', $employerData['municipality-dropdown'] ?? '') }}"
                                                                disabled selected>Select a Municipality or City</option>
                                                        </select>
                                                    </div>

                                                    <div class="flex flex-col md:flex-row items-center mb-5">
                                                        <div class="w-full md:w-1/2 pr-2">
                                                            <label for="selected-municipality"
                                                                class="block mb-1 text-gray-700 dark:text-gray-300">
                                                                Selected City:
                                                            </label>
                                                            <input type="text" id="selected-municipality"
                                                                name="selected-municipality"
                                                                value="{{ old('municipality', $employerData['selected-municipality'] ?? '') }}"
                                                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-150 ease-in-out"
                                                                placeholder="Selected Municipality" readonly>
                                                        </div>

                                                        <div class="w-full md:w-1/2 pl-2">
                                                            <label for="zipcode"
                                                                class="block mb-1 text-gray-700 dark:text-gray-300">
                                                                Zip Code
                                                                <span class="text-red-500">*</span>
                                                            </label>
                                                            <input type="text" id="zipcode" name="zipcode"
                                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                                value="{{ old('zipcode', $employerData['zipcode'] ?? '') }}"
                                                                placeholder="Enter Zip Code" readonly />
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-col mt-2">
                                                        @error('municipality')
                                                            <div class="text-red-600">
                                                                • {{ $message }}
                                                            </div>
                                                        @enderror

                                                        @error('zipcode')
                                                            <div class="text-red-600">
                                                                • {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- Step 2: Contact Profile -->
                                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                                        id="step2" style="margin-left: 20px; margin-right: 20px;">

                                        <div
                                            class="flex items-center text-blue-500 justify-between  border-4 border-blue-500 rounded-t-lg p-4">
                                            <h3 class="text-2xl font-bold mb-2">
                                                <i class="fas fa-address-book mr-2"></i> Contact Details
                                            </h3>
                                            <span class="text-md font-medium">STEP 2 OUT OF 2</span>
                                        </div>

                                        <div class="bg-gradient-to-r from-blue-700 to-blue-500 p-6 rounded-b-lg ">
                                            <span class="text-md font-regular text-white"
                                                style="text-align: justify;">
                                                <b>Step 2:</b> For the “Contact Details” form, input your name,
                                                position, telephone and mobile numbers,
                                                fax number if applicable, and email address. Once all fields are filled
                                                accurately, click the "Submit Form" button to proceed.
                                            </span>
                                        </div>

                                        <div class="p-6">
                                            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="contactperson" class="block mb-1">
                                                        Contact Person
                                                        <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="contact_person" name="contact_person"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="{{ old('contact_person', $employerData['contact_person'] ?? '') }}"
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
                                                    </label> <input type="text" id="position" name="position"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="{{ old('position', $employerData['position'] ?? '') }}"
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
                                                    <input type="text" id="telephone_no" name="telephone_no"
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="{{ old('telephone_no', $employerData['telephone_no'] ?? '') }}"
                                                        pattern="[0-9]+" title="Please enter numbers only"
                                                        maxlength="8" placeholder="Ex. 89839463">
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
                                                        class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        value="{{ old('mobile_no', $employerData['mobile_no'] ?? '') }}"
                                                        pattern="[0-9]+" maxlength="11"
                                                        placeholder="Ex. 09673411152">
                                                    @error('mobile_no')
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="flex flex-wrap gap-1">
                                                    <label for="fax_no" class="block mb-1">Fax No.</label>

                                                    <input type="text" id="faxAreaCode" name="fax[]"
                                                        class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                        pattern="\d*" title="Enter numeric digits" maxlength="2"
                                                        placeholder="(02)"
                                                        value="{{ old('fax.0', $employerData['fax.0'] ?? '') }}" />

                                                    <!-- Separator (e.g., hyphen) -->
                                                    <span class="flex-center dash">-</span>

                                                    <!-- Prefix -->
                                                    <input type="text" id="faxPrefix" name="fax[]"
                                                        class="w-20 sm:w-20 md:w-24 lg:w-28 xl:w-32 h-12 sm:h-10 text-center border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mb-1 sm:mb-0"
                                                        pattern="\d*" title="Enter numeric digits" maxlength="4"
                                                        placeholder="8532"
                                                        value="{{ old('fax.1', $employerData['fax.1'] ?? '') }}" />

                                                    <!-- Separator (e.g., hyphen) -->
                                                    <span class="flex-center dash">-</span>


                                                    <!-- Fax Number -->
                                                    <input type="text" id="faxNumber" name="fax[]"
                                                        class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d*" title="Enter numeric digits" maxlength="4"
                                                        placeholder="5001"
                                                        value="{{ old('fax.2', $employerData['fax.2'] ?? '') }}" />

                                                    <input type="text" id="hiddenFaxNumber" name="hiddenFaxNumber"
                                                        class="w-24 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-12 sm:h-10 text-center border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                        pattern="\d*" title="Enter numeric digits" maxlength="10"
                                                        placeholder="5001"
                                                        value="{{ old('hiddenFaxNumber', $employerData['hiddenFaxNumber'] ?? '') }}"
                                                        hidden>
                                                    @error('hiddenFaxNumber')
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
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
                                                        <div class="text-red-600 dark:text-red-400 mt-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <br>
                                            <div class="text-right">
                                                <button type="submit"
                                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                    <i class="fas fa-paper-plane mr-2"></i> Submit Form
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
                <!-- Waiting for Approval Section -->
                <div class="landscape-container mt-28"> <!-- Add mt-5 class for margin-top -->
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div class="bg-white text-black dark:bg-gray-700 dark:text-gray-200  rounded-lg shadow-md text-center">
                            <div class="bg-gradient-to-r from-blue-400 to-blue-700 p-9 rounded-t-lg text-white border-b-4 border-blue-400">
                                <div class="flex justify-center mb-4">
                                    <div class="text-6xl bg-gradient-to-r from-yellow-400 to-yellow-500 bg-clip-text text-transparent">
                                        <i class="fas fa-hourglass-half"></i> <!-- Using hourglass icon -->
                                    </div>
                                </div>
                                <h2 class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                                    Waiting for Approval
                                </h2>
                                <p class="text-white mb-4">Your personal information has been submitted. Please wait for administrator approval.</p>
                            </div>
                            <div class="p-6">
                                <h2 class="text-black-700 mb-4">Thank you for registering your account with us. At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible environment for legitimate employers or companies. Please note that account verification may take <b>1-2 business days</b>.
                                </h2>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block mt-5">
                                        <i class="fas fa-sign-out-alt mr-2"></i> LOGOUT
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (Auth::check() && Auth::user()->account_verification_status === 'declined')
                    <div class="landscape-container mt-28"> <!-- Add mt-5 class for margin-top -->
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                                <div
                                    class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                                    <div class="text-red-300 text-7xl mb-4 mt-8">
                                        <div class="flex justify-center mb-4">
                                            <div
                                                class="text-6xl bg-gradient-to-r from-red-300 to-red-400 bg-clip-text text-transparent">
                                                <i class="fas fa-times-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h2
                                        class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-red-200 to-red-300 bg-clip-text text-transparent">
                                        Registration Declined
                                    </h2>
                                    <p class="text-white mb-4">
                                        Unfortunately, your registration has been declined. Please contact support for
                                        more
                                        information on your application status.
                                    </p>
                                </div>

                                <div class="p-6">
                                    <h2 class="text-black-700 mb-4">
                                        Thank you for your interest in joining <b>ACCESSIJOBS</b>. We are committed to
                                        creating an inclusive and accessible environment for all users, including
                                        employers or organizations. While we strive to ensure that our platform is
                                        accessible
                                        to individuals of all abilities, we regret to inform you that your account could
                                        not
                                        be approved at this time.
                                    </h2>
                                    <p class="text-black-700 mb-4">
                                        <a href="{{ route('employer.messages') }}"
                                            class="py-1 px-2 bg-blue-500 hover:bg-blue-700 text-white rounded inline-block mt-5">
                                            <i class="fas fa-inbox mr-2"></i> INBOX
                                        </a>
                                        <b>Please check your inbox for further details regarding your application
                                            status.</b> For any questions or further assistance, please reach out to our
                                        support team. We appreciate your understanding.
                                    </p>

                                    <form action="{{ route('logout') }}" method="POST" class="flex justify-center">
                                        @csrf
                                        <div class="flex flex-col sm:flex-row space-x-0 sm:space-x-4">
                                            <button type="submit"
                                                class="py-2 px-4 bg-black text-white rounded inline-block mt-5">
                                                <i class="fas fa-sign-out-alt mr-2"></i> LOGOUT
                                            </button>
                                            <a href="{{ route('employer.messages') }}"
                                                class="py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white rounded inline-block mt-5">
                                                <i class="fas fa-inbox mr-2"></i> INBOX
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (Auth::check() && Auth::user()->account_verification_status === 'approved')
                    <div class="landscape-container mt-28">
                        <div class="container w-3/4 mx-auto landscape-content">
                            <div
                                class="bg-white text-black dark:bg-gray-700 dark:text-gray-200  rounded-lg shadow-md text-center">
                                <div
                                    class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                                    <div class="text-green-300 text-7xl mb-4 mt-8">
                                        <div class="flex justify-center mb-4">
                                            <div
                                                class="text-6xl bg-gradient-to-r from-green-300 to-green-400 bg-clip-text text-transparent">
                                                <div>&#10004;</div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2
                                        class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-green-200 to-green-300 bg-clip-text text-transparent">
                                        User Account Approved
                                    </h2>
                                    <p class="text-white text-lg mb-8">
                                        Your personal information has been approved by the administrator. You can now
                                        access
                                        your account.
                                    </p>
                                </div>
                                <div class="p-6">
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
                                        abilities. You may return to your user dashboard accordingly. </b>.
                                    </p>
                                    <form action="{{ route('employer.dashboard') }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="py-2 px-4 bg-black text-white rounded inline-block">
                                            <i class="fas fa-tachometer-alt mr-2"></i> GO TO DASHBOARD
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
</x-app-layout>

<script>
     document.addEventListener('DOMContentLoaded', function () {
        const accountVerificationStatus = "{{ Auth::user()->account_verification_status }}"; 
    
        if (accountVerificationStatus === 'waiting for approval') {
            fireConfetti();
        }
    });


    function fireConfetti() {
        const duration = 5 * 1000; // 5 seconds
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        const interval = setInterval(() => {
            const timeLeft = animationEnd - Date.now();
            if (timeLeft <= 0) return clearInterval(interval);

            const particleCount = 50 * (timeLeft / duration);
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
        }, 250);
    }
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

    .border-red-500 {
        border-color: #dc2626 !important;
        border-width: 2px !important;
    }
    .radio-border-red {
    border: 2px solid #dc2626; 
    border-radius: 50%; 
    appearance: none; 
    width: 20px;
    height: 20px;
    outline: none;
    position: relative;
    }
    
    .radio-border-red:checked {
        border: 2px solid transparent; 
        appearance: radio; 
    }

</style>

<script>
    // Function to check if an input field or select is empty and apply red border
    function checkInput(inputField) {
        if (inputField.value === '' || inputField.value === null) {
            inputField.classList.add('border-red-500');
        } else {
            inputField.classList.remove('border-red-500');
        }
    }

    // Add event listeners to required inputs for Business Name, EIN, Business Address, Official Website Link, Employer Type, Total Work Force, City, Zip Code, Contact Person, Position, Mobile No., and Business Email
    document.addEventListener('DOMContentLoaded', () => {
        const businessNameInput = document.getElementById('businessname');
        const einInput = document.getElementById('tinno');
        const businessAddressInput = document.getElementById('address');
        const websiteLinkInput = document.getElementById('website_link');
        const employerTypeSelect = document.getElementById('employertype');
        const totalWorkforceSelect = document.getElementById('totalworkforce');
        const citySelect = document.getElementById('municipality-dropdown');
        const zipCodeInput = document.getElementById('zipcode');
        const contactPersonInput = document.getElementById('contact_person');
        const positionInput = document.getElementById('position');
        const mobileNoInput = document.getElementById('mobile_no');
        const businessEmailInput = document.getElementById('email_address');

        // Initial check for all required fields
        [
            businessNameInput,
            einInput,
            businessAddressInput,
            websiteLinkInput,
            employerTypeSelect,
            totalWorkforceSelect,
            citySelect,
            zipCodeInput,
            contactPersonInput,
            positionInput,
            mobileNoInput,
            businessEmailInput
        ].forEach(checkInput);

        // Event listeners to check and update the red border on input or change
        businessNameInput.addEventListener('input', () => checkInput(businessNameInput));
        einInput.addEventListener('input', () => checkInput(einInput));
        businessAddressInput.addEventListener('input', () => checkInput(businessAddressInput));
        websiteLinkInput.addEventListener('input', () => checkInput(websiteLinkInput));
        employerTypeSelect.addEventListener('change', () => checkInput(employerTypeSelect));
        totalWorkforceSelect.addEventListener('change', () => checkInput(totalWorkforceSelect));
        citySelect.addEventListener('change', handleCitySelection); // Custom handler for city selection
        zipCodeInput.addEventListener('input', () => checkInput(zipCodeInput));
        contactPersonInput.addEventListener('input', () => checkInput(contactPersonInput));
        positionInput.addEventListener('input', () => checkInput(positionInput));
        mobileNoInput.addEventListener('input', () => checkInput(mobileNoInput));
        businessEmailInput.addEventListener('input', () => checkInput(businessEmailInput));

        // Check on blur or change to ensure border updates when focus leaves the field
        businessNameInput.addEventListener('blur', () => checkInput(businessNameInput));
        einInput.addEventListener('blur', () => checkInput(einInput));
        businessAddressInput.addEventListener('blur', () => checkInput(businessAddressInput));
        websiteLinkInput.addEventListener('blur', () => checkInput(websiteLinkInput));
        employerTypeSelect.addEventListener('blur', () => checkInput(employerTypeSelect));
        totalWorkforceSelect.addEventListener('blur', () => checkInput(totalWorkforceSelect));
        citySelect.addEventListener('blur', handleCitySelection);
        zipCodeInput.addEventListener('blur', () => checkInput(zipCodeInput));
        contactPersonInput.addEventListener('blur', () => checkInput(contactPersonInput));
        positionInput.addEventListener('blur', () => checkInput(positionInput));
        mobileNoInput.addEventListener('blur', () => checkInput(mobileNoInput));
        businessEmailInput.addEventListener('blur', () => checkInput(businessEmailInput));

        // Function to handle city selection and auto-populate zip code
        function handleCitySelection() {
            checkInput(citySelect);
            if (citySelect.value) {
                // Delay to allow zip code population, then check zip code
                setTimeout(() => {
                    checkInput(zipCodeInput);
                }, 100);
            }
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="locationtype"]');
    
        function validateRadioButtons() {
            const isSelected = Array.from(radioButtons).some(radio => radio.checked);
            radioButtons.forEach(radio => {
                if (isSelected) {
                    radio.classList.remove('radio-border-red'); // Remove red border if selected
                } else {
                    radio.classList.add('radio-border-red'); // Add red border if none selected
                }
            });
        }
    
        radioButtons.forEach(radio => {
            radio.addEventListener('change', validateRadioButtons);
        });
    
        // Initial validation
        validateRadioButtons();
    });
</script>




    



