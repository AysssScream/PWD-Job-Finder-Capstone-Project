<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/steps.css">
    <style>
        /* Custom CSS for resizable functionality */
        .resizable {
            resize: both;
            /* Allows resizing in both directions */
            overflow: hidden;
            /* Ensures content stays within the container */
            min-width: 150px;
            /* Minimum width of the container */
            min-height: 150px;
            /* Minimum height of the container */
            max-width: 100%;
            /* Prevents the container from exceeding viewport width */
            max-height: 100vh;
            /* Prevents the container from exceeding viewport height */
        }

        #imagePreview2 {
            border: 1px solid #ddd;
            padding: 5px;
            overflow: auto;
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #imagePreview2 img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        #imagePreview {
            border: 1px solid #ddd;
            padding: 5px;
            overflow: auto;
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #imagePreview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<div class="py-12">
    <div class="container max-w-full pr-6 pl-6 mx-auto">
        <div class="flex justify-center">
            <div class="w-full p-6">
                <form action="{{ route('pwdinfo') }}" id="lastform" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold dark:text-white">Oops!</strong>
                            <span class="block sm:inline dark:text-white">There were some errors with your
                                submission:</span>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li class="dark:text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                    @endif

                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-3d rounded-lg mb-4"
                        id="step7">
                        @php
                            $currentStep = 7; // Set this dynamically based on your current step
                            $totalSteps = 7; // Total number of steps
                            $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                        @endphp

                        <!-- Gradient background for the header section -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-t-lg shadow-lg">
                            <h3 class="text-2xl text-white font-bold mb-4 inline-flex items-center justify-between w-full 
                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label="{{ __('messages.steps.step_7') }} {{ $percentage }}%;" tabindex="0">

                                {{ __('messages.steps.step_7') }}

                                <!-- Progress bar -->
                                <div
                                    class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 w-full sm:w-auto">
                                    <div class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="absolute top-0 left-0 h-2 bg-gradient-to-r from-green-400 to-green-600 rounded-full transition-all ease-in-out duration-500"
                                            style="width: {{ $percentage }}%;"></div>
                                    </div>

                                    <!-- Step progress information -->
                                    <div class="text-md text-white font-semibold mt-2 sm:mt-0">
                                        Step {{ $currentStep }}/{{ $totalSteps }} :
                                        <span class="text-white">{{ $percentage }}%</span>
                                    </div>
                                </div>
                            </h3>

                            <!-- Breadcrumb navigation -->
                            <div>
                                <nav class="text-sm" aria-label="Breadcrumb">
                                    <ol class="list-none p-0 inline-flex">
                                        <li class="flex items-center">
                                            <!-- Back arrow icon -->
                                            <i class="fas fa-arrow-left mr-2 text-white 
                                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Go Back to  {{ __('messages.steps.step_6') }}"
                                                tabindex="0"></i>

                                            <!-- "Educational Background" link -->
                                            <a href="{{ route('educationalbg') }}"
                                                aria-label="{{ __('messages.steps.step_6') }}"
                                                class="text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                {{ __('messages.steps.step_6') }}
                                            </a>
                                            <span class="mx-2 text-white">/</span>
                                        </li>
                                        <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ __('messages.steps.step_7') }}" tabindex="0">
                                            <span
                                                class="text-white font-semibold">{{ __('messages.steps.step_7') }}</span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                            <!-- Horizontal rule for separation -->
                            <hr class="border-t-2 border-white rounded-full my-4">
                        </div>


                        <div class="p-3 shadow-lg rounded-b-lg border-4 border-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            tabindex="0" aria-label="{!! __('messages.pwdinfo.instruction') !!}">
                            <span class="text-md font-regular" style="text-align: justify;">
                                {!! __('messages.pwdinfo.instruction') !!}

                            </span>
                        </div>

                        <div class="p-6 pt-0">
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-4">
                                <div>
                                    @include('layouts.dropdown')
                                </div>

                                <div>

                                    <div class="mt-6">
                                        <div class="flex flex-col mr-4 w-full ">
                                            <label for="disabilityOccurrence"
                                                class="block mb-1">{{ __('messages.pwdinfo.disability_occurrence.label') }}
                                                <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                            <select id="disabilityOccurrence" name="disabilityOccurrence"
                                                class="p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                onchange="toggleOtherDisabilityField()"
                                                aria-label="{{ __('messages.pwdinfo.disability_occurrence.label') }}  {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') }}">

                                                <option value="" selected disabled>
                                                    {{ __('messages.pwdinfo.disability_occurrence.placeholder') }}
                                                </option>

                                                <optgroup label="Congenital">
                                                    <option value="Congenital/Born"
                                                        {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Congenital/Born' ? 'selected' : '' }}>
                                                        {{ __('messages.pwdinfo.disability_occurrence.options.congenital_born') }}
                                                    </option>
                                                </optgroup>

                                                <optgroup label="Acquired">
                                                    <option value="Chronic Illness"
                                                        {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Chronic Illness' ? 'selected' : '' }}>
                                                        {{ __('messages.pwdinfo.disability_occurrence.options.chronic_illness') }}
                                                    </option>
                                                    <option value="Accident"
                                                        {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Accident' ? 'selected' : '' }}>
                                                        {{ __('messages.pwdinfo.disability_occurrence.options.accident') }}
                                                    </option>
                                                    <option value="Injury"
                                                        {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Injury' ? 'selected' : '' }}>
                                                        {{ __('messages.pwdinfo.disability_occurrence.options.injury') }}
                                                    </option>
                                                    <option value="Other"
                                                        {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Other' ? 'selected' : '' }}>
                                                        {{ __('messages.pwdinfo.disability_occurrence.options.other') }}
                                                    </option>
                                                </optgroup>
                                            </select>

                                            @error('disabilityOccurrence')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <label for="otherDisabilityDetails" class="block  mt-8">
                                            {{ __('messages.pwdinfo.others_specify') }}</label>
                                        <div class="flex items-center mt-2" id="otherDisabilityField">

                                            <input type="text" id="otherDisabilityDetails"
                                                name="otherDisabilityDetails"
                                                aria-label="  {{ __('messages.pwdinfo.others_specify') }} {{ old('otherDisabilityDetails', $formData7['otherDisabilityDetails'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="{{ old('otherDisabilityDetails', $formData7['otherDisabilityDetails'] ?? '') }}"
                                                placeholder="Specify Other Disability Occurrence..." />
                                        </div>
                                        @error('otherDisabilityDetails')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror

                                        <label for="pwdIdNumber" class="block mt-8">
                                            {{ __('messages.pwdinfo.pwd_id_number') }}:
                                            <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                        </label>
                                        <span class="mr-2 font-bold">13-7401-000-</span>
                                        <input type="text" id="pwdIdNumber" name="pwdIdNumber" maxlength="8"
                                            placeholder="XXXXXXXX (Provide the last 7-8 Digits)"
                                            aria-label="Enter the last 7-8 digits of the PWD ID {{ old('pwdIdNumber', $formData7['pwdIdNumber'] ?? '') }}"
                                            class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            value="{{ old('pwdIdNumber', $formData7['pwdIdNumber'] ?? '') }}">

                                        <p class="mt-2 text-black dark:text-white">
                                            Please enter the last 7-8 digits of your PWD ID number. For example, if your
                                            PWD ID number is
                                            <strong>13-7401-000-(12345678)</strong>, enter <strong>1234567 or 12345678
                                                depending on your PWD ID.</strong>.
                                        </p>

                                        @error('pwdIdNumber')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror

                                        <!-- Main Content with Checkbox and Link to Open Modal -->
                                        <div
                                            class="mt-6 p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg">
                                            <label class="flex items-start text-gray-700 dark:text-gray-200">
                                                <!-- Checkbox -->
                                                <input type="checkbox" id="confirmConsent" name="confirmConsent"
                                                    required
                                                    class="mr-3 mt-1 rounded border-gray-300 focus:ring-blue-500">

                                                <!-- Consent Text with Link to Modal -->
                                                <span class="text-base leading-relaxed">
                                                    I confirm that the PWD ID number I am entering is my own. I
                                                    understand that entering false information or using someone else’s
                                                    PWD ID number may lead to penalties, including account suspension or
                                                    legal action.
                                                    <a href="javascript:void(0);" onclick="openConsentModal()"
                                                        class="text-blue-600 dark:text-blue-400 font-semibold hover:underline ml-1">Read
                                                        more about applicable laws</a>.
                                                </span>
                                            </label>
                                        </div>


                                        <!-- Consent Modal -->
                                        <div id="consentModal"
                                            class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                            <div class="bg-black bg-opacity-40 absolute inset-0"></div>
                                            <!-- Dark overlay background -->

                                            <div
                                                class="bg-white dark:bg-gray-900 rounded-lg shadow-lg transform transition-all max-w-lg w-full mx-4 md:mx-0 z-50 relative">
                                                <!-- Modal Header with Shield Icon -->
                                                <div
                                                    class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 p-5">
                                                    <h2
                                                        class="flex items-center text-2xl font-bold text-gray-800 dark:text-gray-100">
                                                        <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                                                        <!-- Shield Icon -->
                                                        Data Privacy and Consent
                                                    </h2>
                                                    <button onclick="closeConsentModal()"
                                                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none">
                                                        <i class="fas fa-times text-lg"></i> <!-- Close icon -->
                                                    </button>
                                                </div>

                                                <!-- Modal Body with Warning Icon in the Center -->
                                                <div class="p-6 space-y-4 text-center">
                                                    <i
                                                        class="fas fa-exclamation-circle text-yellow-500 text-4xl mb-2"></i>
                                                    <!-- Warning Icon -->
                                                    <p class="text-gray-700 dark:text-gray-300">
                                                        Unauthorized use or sharing of another person’s PWD ID number is
                                                        strictly prohibited. Violation of this rule may result in legal
                                                        consequences as per data privacy laws.
                                                    </p>
                                                    <p class="text-gray-700 dark:text-gray-300">
                                                        For further details, please refer to the Data Privacy Act of
                                                        2012:
                                                        <a href="https://www.privacy.gov.ph/data-privacy-act/"
                                                            target="_blank"
                                                            class="text-blue-600 dark:text-blue-400 underline">Read the
                                                            law</a>.
                                                    </p>
                                                </div>

                                                <!-- Modal Footer -->
                                                <div
                                                    class="flex justify-end border-t border-gray-200 dark:border-gray-700 p-5">
                                                    <button onclick="closeConsentModal()"
                                                        class="py-2 px-4 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- JavaScript for Opening and Closing Modal -->
                                        <script>
                                            function openConsentModal() {
                                                document.getElementById('consentModal').classList.remove('hidden');
                                            }

                                            function closeConsentModal() {
                                                document.getElementById('consentModal').classList.add('hidden');
                                            }
                                        </script>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label
                                        class="block mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0"
                                        aria-label="{{ __('messages.pwdinfo.disability_status') }}">{{ __('messages.pwdinfo.disability_status') }}
                                        <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                    <div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.pwdinfo.disability_visual') }} ">
                                            <input type="radio" id="disability_visual" name="disability"
                                                value="Visual" class="mr-2 " onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Visual' ? 'checked' : '' }}>
                                            <label for="disability_visual" class="mr-4"><i
                                                    class="fas fa-eye mr-1"></i>
                                                {{ __('messages.pwdinfo.disability_visual') }}</label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label=" {{ __('messages.pwdinfo.disability_psychosocial') }}">
                                            <input type="radio" id="disability_psychosocial" name="disability"
                                                value="Psychosocial" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Psychosocial' ? 'checked' : '' }}>
                                            <label for="disability_psychosocial" class="mr-4"><i
                                                    class="fas fa-brain mr-1"></i>
                                                {{ __('messages.pwdinfo.disability_psychosocial') }}</label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.pwdinfo.disability_physical') }}">
                                            <input type="radio" id="disability_physical" name="disability"
                                                value="Physical" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Physical' ? 'checked' : '' }}>
                                            <label for="disability_physical" class="mr-4"><i
                                                    class="fas fa-wheelchair mr-1"></i>{{ __('messages.pwdinfo.disability_physical') }}</label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label="{{ __('messages.pwdinfo.disability_hearing') }}">
                                            <input type="radio" id="disability_hearing" name="disability"
                                                value="Hearing" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Hearing' ? 'checked' : '' }}>
                                            <label for="disability_hearing" class="mr-4"><i
                                                    class="fas fa-deaf mr-1"></i>
                                                {{ __('messages.pwdinfo.disability_hearing') }}</label>
                                        </div>
                                        <div class="radio-group focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            tabindex="0"
                                            aria-label=" {{ __('messages.pwdinfo.disability_others') }}">
                                            <input type="radio" id="disability_others" name="disability"
                                                value="Others" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Others' ? 'checked' : '' }}>
                                            <label for="disability_others" class="mr-4"><i
                                                    class="fas fa-handshake mr-1"></i>
                                                {{ __('messages.pwdinfo.disability_others') }}</label>
                                        </div>
                                        @error('disability')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div id="disabilityTextBox"
                                        class="mt-6 {{ old('disability', $formData7['disability'] ?? '') == 'others' ? '' : '' }} w-full">
                                        <label class="block mb-2">
                                            {{ __('messages.pwdinfo.specify_disability') }} <i
                                                class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                        <input type="text" id="disabilityDetails" name="disabilityDetails"
                                            aria-label=" {{ __('messages.pwdinfo.specify_disability') }}"
                                            class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            value="{{ old('disabilityDetails', $formData7['disabilityDetails'] ?? '') }}"
                                            placeholder="Ex. Cataract" />
                                        <div>
                                            @error('disabilityDetails')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="imagePreview2"
                                        class="resizable mt-14 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        <img id="previewImage" src="{{ asset('/images/preview.webp') }}"
                                            alt="Preview Image"
                                            style="max-width: 100%; max-height: 100%; display: block;">
                                        <img id="alternateImage" src="{{ asset('/images/preview.webp') }}"
                                            alt="Alternate Image"
                                            style="max-width: 100%; max-height: 100%; display: none;">
                                    </div>
                                    <small class="block mt-2 text-gray-700 dark:text-gray-200">File size limit:
                                        2MB</small>

                                    <label for="profilePicture" class="block mb-1 mt-6 ">
                                        {{ __('messages.pwdinfo.upload_profile_picture') }} <i
                                            class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                    <div class="relative border rounded overflow-hidden mt-3 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0"
                                        aria-label="{{ __('messages.pwdinfo.upload_profile_picture') }}">
                                        <input type="file" id="profilePicture" name="profilePicture"
                                            class="absolute inset-0 opacity-0 cursor-pointer  " accept="image/*"
                                            onchange=" profilePictureFileChange(event)" aria-label="Upload Button">
                                        <button type="button" class="py-2 px-4 bg-black text-white"
                                            onclick="document.getElementById('profilePicture').click()">Choose
                                            File</button>
                                    </div>
                                    @error('profilePicture')
                                        <div class="text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                    <div id="profilePicName" class="mt-2">
                                        {{ old('profilePictureName', $formData7['profilePictureName'] ?? 'No file chosen') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white  dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mt-4">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-t-lg mb-4">
                            <h3 class="text-xl text-white sm:text-lg md:text-xl lg:text-3xl font-bold mb-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 break-words"
                                tabindex="0" aria-label="{{ __('messages.pwdinfo.certification_authorization') }}">
                                {{ __('messages.pwdinfo.certification_authorization') }}
                                <i class="fas fa-asterisk text-red-400 text-lg mb-2"></i>
                            </h3>
                        </div>
                        <div class="mt-4 grid grid-cols-1 gap-4 p-6">
                            <label for="acceptTerms" class="flex items-center text-justify break-words">
                                <input type="checkbox" id="acceptTerms" name="acceptTerms" class="mr-4 rounded-md"
                                    aria-label="Agreement Checkbox"
                                    {{ old('acceptTerms', isset($formData9['acceptTerms']) ? $formData9['acceptTerms'] : false) ? 'checked' : '' }}>
                                <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 break-words"
                                    tabindex="0" aria-label="{{ __('messages.pwdinfo.terms') }}">
                                    {{ __('messages.pwdinfo.terms') }}
                                </div>
                            </label>
                        </div>

                        <div class="mt-4 text-right p-6">
                            <a href="{{ route('educationalbg') }}" aria-label=" {{ __('messages.previous') }}"
                                class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                                {{ __('messages.previous') }}</a>

                            <button type="submit" onsubmit="clearLocalStorage()"
                                aria-label="{{ __('messages.submit') }}"
                                class="inline-block py-2 px-4 bg-green-700 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                {{ __('messages.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleOtherDisabilityField() {
            var selectElement = document.getElementById('disabilityOccurrence');
            var otherDisabilityInput = document.getElementById('otherDisabilityDetails');

            if (selectElement.value === 'Other') {
                otherDisabilityInput.disabled = false;
            } else {
                otherDisabilityInput.disabled = true;

            }
        }
        window.onload = function() {
            toggleOtherDisabilityField();
        };
        document.getElementById('disabilityOccurrence').addEventListener('change', toggleOtherDisabilityField);


        function clearLocalStorage() {
            localStorage.removeItem('formData');
        }

        function pwdIDFileChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0].name;
            const fileReader = new FileReader();

            document.getElementById('fileName').textContent = fileName;

            fileReader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'mt-2'; // Add margin-top for spacing

                const imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = ''; // Clear any previous image
                imagePreview.appendChild(img);
            };

            fileReader.readAsDataURL(fileInput.files[0]);
        }

        function profilePictureFileChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0].name;
            const fileReader = new FileReader();

            document.getElementById('profilePicName').textContent = fileName;

            fileReader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'mt-2';

                const imagePreview = document.getElementById('imagePreview2');
                imagePreview.innerHTML = ''; // Clear any previous image
                imagePreview.appendChild(img);
            };

            fileReader.readAsDataURL(fileInput.files[0]);
        }

        function checkInput(inputField) {
            if (inputField.value.trim() === '') {
                inputField.classList.add('border-red-500');
            } else {
                inputField.classList.remove('border-red-500');
            }
        }

        function toggleOtherDisabilityField() {
            const selectElement = document.getElementById('disabilityOccurrence');
            const otherDisabilityInput = document.getElementById('otherDisabilityDetails');

            if (selectElement.value === 'Other') {
                otherDisabilityInput.disabled = false;
                otherDisabilityInput.classList.remove('disabled-input');
                checkInput(otherDisabilityInput); // Check for empty input immediately
                otherDisabilityInput.addEventListener('input', () => checkInput(otherDisabilityInput));
                otherDisabilityInput.addEventListener('blur', () => checkInput(otherDisabilityInput));
            } else {
                otherDisabilityInput.disabled = true;
                otherDisabilityInput.classList.add('disabled-input');
                otherDisabilityInput.classList.remove('border-red-500'); // Remove red border if disabled
                otherDisabilityInput.value = ''; // Clear input when not "Other"
                otherDisabilityInput.removeEventListener('input', () => checkInput(otherDisabilityInput));
                otherDisabilityInput.removeEventListener('blur', () => checkInput(otherDisabilityInput));
            }
        }

        function checkRadioGroup(radioButtons) {
            let isSelected = false;

            radioButtons.forEach((radio) => {
                if (radio.checked) {
                    isSelected = true;
                }
            });

            radioButtons.forEach((radio) => {
                if (!isSelected) {
                    radio.classList.add('border-red-500');
                } else {
                    radio.classList.remove('border-red-500');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Get required inputs
            const disabilityOccurrenceInput = document.getElementById('disabilityOccurrence');
            const pwdIdNumberInput = document.getElementById('pwdIdNumber');
            const disabilityDetailsInput = document.getElementById('disabilityDetails');
            const disabilityRadioButtons = document.querySelectorAll(
                'input[name="disability"]'); // Disability radio button group

            checkInput(disabilityOccurrenceInput);
            checkInput(pwdIdNumberInput);
            checkInput(disabilityDetailsInput);
            checkRadioGroup(disabilityRadioButtons);

            disabilityOccurrenceInput.addEventListener('change', () => {
                checkInput(disabilityOccurrenceInput);
                toggleOtherDisabilityField();
            });

            pwdIdNumberInput.addEventListener('input', () => checkInput(pwdIdNumberInput));
            disabilityDetailsInput.addEventListener('input', () => checkInput(disabilityDetailsInput));

            pwdIdNumberInput.addEventListener('blur', () => checkInput(pwdIdNumberInput));
            disabilityDetailsInput.addEventListener('blur', () => checkInput(disabilityDetailsInput));

            // Add event listeners to each radio button in the disability group to check if selected
            disabilityRadioButtons.forEach((radio) => {
                radio.addEventListener('change', () => checkRadioGroup(disabilityRadioButtons));
            });

            toggleOtherDisabilityField();
        });

        function profilePictureFileChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0]?.name || ''; // Get the file name or empty string if no file
            const fileReader = new FileReader();
            const profilePicNameDisplay = document.getElementById('profilePicName');
            const chooseFileButton = fileInput.nextElementSibling; // Select the button next to the input

            profilePicNameDisplay.textContent = fileName || 'No file chosen';

            if (!fileName) {
                chooseFileButton.classList.add('border-red-500');
            } else {
                chooseFileButton.classList.remove('border-red-500');
            }

            fileReader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'mt-2'; // Add margin-top for spacing

                const imagePreview = document.getElementById('imagePreview2');
                imagePreview.innerHTML = ''; // Clear any previous image
                imagePreview.appendChild(img);
            };

            if (fileInput.files[0]) {
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('profilePicture');
            const chooseFileButton = fileInput.nextElementSibling;

            if (!fileInput.files.length) {
                chooseFileButton.classList.add('border-red-500');
            }
        });
    </script>

    <style>
        .disabled-input {
            background-color: #f3f4f6;
            color: #9ca3af;
            cursor: not-allowed;
        }

        .dark .disabled-input {
            background-color: #374151;
            color: #d1d5db;
        }

        .border-red-500 {
            border-color: #dc2626 !important;
            border-width: 2px !important;
        }
    </style>
