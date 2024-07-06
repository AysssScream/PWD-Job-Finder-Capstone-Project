<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/steps.css">

</head>
<div class="py-12">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-5/6">
                <form action="{{ route('pwdinfo') }}" id="lastform" method="POST" enctype="multipart/form-data">
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
                                Verify PWD Information
                                @php
                                    $currentStep = 7; // Set this dynamically based on your current step
                                    $totalSteps = 7; // Total number of steps (adjusted to 8)
                                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                @endphp
                                <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <div class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
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
                                            <a href="{{ route('workexp') }}"
                                                class="text-gray-700 dark:text-gray-200">Educational
                                                Background</a>
                                            <span class="mx-2 text-gray-500">/</span>
                                        </li>
                                        <li class="flex items-center">
                                            <span class="text-blue-500 font-semibold">Verify your PWD Information</span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <hr class="border-t-2 border-gray-400 rounded-full my-4">
                            <span class="text-md font-regular" style="text-align: justify;"><b> Step 7: </b> To
                                effectively complete the web form
                                concerning disability occurrence and status, first, select from the dropdown menu under
                                "Specify Disability Occurrence" and indicate whether your disability is Visual,
                                Physical,
                                Hearing, Psychosocial, or Others, providing specific details if choosing the latter.
                                Then, in the "Disability Status" section, check the appropriate boxes for Visual,
                                Physical, Hearing, or Others, and add specifics if selecting "Others." Finally, upload
                                your Person With Disability (PWD) ID by clicking "Choose File" under "Upload PWD ID,"
                                ensuring no previous files are selected, and optionally upload a profile picture using
                                the same method if needed.
                            </span>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    @include('layouts.dropdown')
                                </div>

                                <div>

                                    <div class="mt-6">
                                        <div class="flex flex-col mr-4 w-full ">
                                            <label for="disabilityOccurrence" class="block mb-1">Disability
                                                Occurrence:</label>
                                            <select id="disabilityOccurrence" name="disabilityOccurrence"
                                                class="p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                onchange="toggleOtherDisabilityField()">
                                                <option value="" selected disabled>Specify Disability
                                                    Occurrence...</option>
                                                <option value="Birth"
                                                    {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Birth' ? 'selected' : '' }}>
                                                    Since Birth
                                                </option>
                                                <option value="Before Employment"
                                                    {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Before Employment' ? 'selected' : '' }}>
                                                    Before Employment
                                                </option>
                                                <option value="After Employment"
                                                    {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'After Employment' ? 'selected' : '' }}>
                                                    After Employment
                                                </option>
                                                <option value="Other"
                                                    {{ old('disabilityOccurrence', $formData7['disabilityOccurrence'] ?? '') == 'Other' ? 'selected' : '' }}>
                                                    Other
                                                </option>
                                            </select>
                                            @error('disabilityOccurrence')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <label for="otherDisabilityDetails" class="block  mt-8">If you chose others,
                                            fill up the input field below:</label>
                                        <div class="flex items-center mt-2" id="otherDisabilityField">

                                            <input type="text" id="otherDisabilityDetails"
                                                name="otherDisabilityDetails"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                value="{{ old('otherDisabilityDetails', $formData7['otherDisabilityDetails'] ?? '') }}"
                                                placeholder="Specify Other Disability Occurrence..." />
                                        </div>
                                        @error('otherDisabilityDetails')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror


                                        <label for="fileUpload" class="block mb-1 mt-6">Upload PWD ID</label>
                                        <div class="relative border rounded overflow-hidden mt-4">

                                            <input type="file" id="fileUpload" name="fileUpload"
                                                class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*"
                                                onchange="pwdIDFileChange(event)">
                                            <button type="button" class="py-2 px-4 bg-black text-white"
                                                onclick="document.getElementById('fileUpload').click()">Choose
                                                File</button>
                                        </div>

                                        <div id="fileName" class="mt-2">
                                            {{ old('fileUploadName', $formData7['fileUploadName'] ?? 'No file chosen') }}
                                        </div>

                                        <div id="imagePreview" class="mt-2">
                                            <!-- The selected image or alternate image will be displayed here -->
                                            <img id="previewImage" src="{{ asset('/images/preview.jpg') }}"
                                                alt="Preview Image"
                                                style="max-width: 50%; max-height: 100%; display: block;">
                                            <img id="alternateImage" src="{{ asset('/images/preview.jpg') }}"
                                                alt="Alternate Image"
                                                style="max-width: 50%; max-height: 100%; display: none;">
                                        </div>
                                        <small class="block mt-2 text-gray-700 dark:text-gray-200">File size limit:
                                            2MB</small>

                                        @error('fileUpload')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="mt-6">
                                    <label class="block mb-2 ">Disability Status:</label>
                                    <div class="flex flex-wrap justify-start items-center">
                                        <div class="radio-group">
                                            <input type="radio" id="disability_visual" name="disability"
                                                value="Visual" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Visual' ? 'checked' : '' }}>
                                            <label for="disability_visual" class="mr-4"><i
                                                    class="fas fa-eye mr-1"></i>
                                                Visual </label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="disability_psychosocial" name="disability"
                                                value="Psychosocial" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Psychosocial' ? 'checked' : '' }}>
                                            <label for="disability_psychosocial" class="mr-4"><i
                                                    class="fas fa-brain mr-1"></i> Psychosocial</label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="disability_physical" name="disability"
                                                value="Physical" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Physical' ? 'checked' : '' }}>
                                            <label for="disability_physical" class="mr-4"><i
                                                    class="fas fa-wheelchair mr-1"></i> Physical</label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="disability_hearing" name="disability"
                                                value="Hearing" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Hearing' ? 'checked' : '' }}>
                                            <label for="disability_hearing" class="mr-4"><i
                                                    class="fas fa-deaf mr-1"></i> Hearing</label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="disability_others" name="disability"
                                                value="Others" class="mr-2" onchange="showTextBox()"
                                                {{ old('disability', $formData7['disability'] ?? '') == 'Others' ? 'checked' : '' }}>
                                            <label for="disability_others" class="mr-4"><i
                                                    class="fas fa-handshake mr-1"></i> Others</label>
                                        </div>
                                        @error('disability')
                                            <div class="text-red-600 mt-1">{{ $message }}</div>
                                        @enderror

                                        <div id="disabilityTextBox"
                                            class="mt-6 {{ old('disability', $formData7['disability'] ?? '') == 'others' ? '' : '' }} w-full">
                                            <label class="block mb-2">Specify Disability:</label>
                                            <input type="text" id="disabilityDetails" name="disabilityDetails"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                value="{{ old('disabilityDetails', $formData7['disabilityDetails'] ?? '') }}"
                                                placeholder="Ex. Cataract" />
                                            <div>
                                                @error('disabilityDetails')
                                                    <div class="text-red-600 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <label for="profilePicture" class="block mb-1 ">Upload Profile
                                                Picture</label>
                                            <div class="relative border rounded overflow-hidden mt-3">
                                                <input type="file" id="profilePicture" name="profilePicture"
                                                    class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*"
                                                    onchange=" profilePictureFileChange(event)">
                                                <button type="button" class="py-2 px-4 bg-black text-white"
                                                    onclick="document.getElementById('profilePicture').click()">Choose
                                                    File</button>
                                            </div class="mt-4">

                                            <div id="profilePicName" class="mt-2">
                                                {{ old('profilePictureName', $formData7['profilePictureName'] ?? 'No file chosen') }}
                                            </div>

                                            <div id="imagePreview2" class="mt-2">
                                                <img id="previewImage" src="{{ asset('/images/preview.jpg') }}"
                                                    alt="Preview Image"
                                                    style="max-width: 50%; max-height: 100%; display: block;">
                                                <img id="alternateImage" src="{{ asset('/images/preview.jpg') }}"
                                                    alt="Alternate Image"
                                                    style="max-width: 50%; max-height: 100%; display: none;">
                                            </div>
                                            <small class="block mt-2 text-gray-700 dark:text-gray-200">File size limit:
                                                2MB</small>

                                            @error('profilePicture')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mt-4">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">Certification/Authorization</h3>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                <label for="acceptTerms" class="flex items-center text-justify">
                                    <input type="checkbox" id="acceptTerms" name="acceptTerms" class="mr-4"
                                        {{ old('acceptTerms', isset($formData9['acceptTerms']) ? $formData9['acceptTerms'] : false) ? 'checked' : '' }}>
                                    This is to certify that all data/information that I have
                                    provided in this form are true to the best of my knowledge. This
                                    is also to authorize PDAD Mandaluyong to include my profile in
                                    the Employment Information System and use my personal
                                    information for employment facilitation.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <a href="{{ route('educationalbg') }}"
                            class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Previous</a>

                        <button type="submit" onsubmit="clearLocalStorage()"
                            class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Submit</button>
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
        </script>
        <style>
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
