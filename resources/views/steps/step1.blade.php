<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/steps.css">

</head>
@php
    $user = Auth::user(); // Assuming you're using Laravel's authentication and the user is logged in

    // First, let's initialize variables for first name, middle name, and last name
    $firstName = $user->firstname;
    $middleName = $user->middlename;
    $lastName = $user->lastname;

@endphp

<body>
    <div class="py-12">
        <div class="container max-w-full pr-6 pl-6 mx-auto">
            <div class="flex justify-center">
                <div class="w-full p-6">
                    <form action="{{ route('setup') }}" method="POST" enctype="multipart/form-data">
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
                            id="step1">
                            @php
                                $currentStep = 1; // Set this dynamically based on your current step
                                $totalSteps = 7; // Total number of steps (adjusted to 8)
                                $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                            @endphp

                            <div class="bg-gradient-to-r from-blue-600  to-blue-400 p-6 rounded-t-lg shadow-lg">
                                <h3 class="text-2xl text-white font-bold mb-4 inline-flex items-center justify-between w-full 
                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.steps.step_1') }} {{ $percentage }}%;" tabindex="0">

                                    {{ __('messages.steps.step_1') }}

                                    <div
                                        class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 w-full sm:w-auto">
                                        <div
                                            class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="absolute top-0 left-0 h-2 bg-gradient-to-r from-green-400 to-green-600 rounded-full transition-all ease-in-out duration-500"
                                                style="width: {{ $percentage }}%;"></div>
                                        </div>

                                        <div class="text-md text-white font-semibold mt-2 sm:mt-0">
                                            Step {{ $currentStep }}/{{ $totalSteps }} :
                                            <span class="text-white">{{ $percentage }}%</span>
                                        </div>
                                    </div>
                                </h3>

                                <div>
                                    <nav class="text-sm" aria-label="Breadcrumb">
                                        <ol class="list-none p-0 inline-flex">
                                            <li class="flex items-center">
                                                <!-- Back arrow icon -->
                                                <i class="fas fa-arrow-left mr-2 text-white
                                                focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    aria-label="Go Back to Getting Started" tabindex="0"></i>

                                                <a href="{{ route('pendingapproval') }}" aria-label="Getting Started"
                                                    class="text-white
                                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    Getting Started
                                                </a>
                                                <span class="mx-2 text-white">/</span>
                                            </li>
                                            <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Applicant Profile" tabindex="0">
                                                <span
                                                    class="text-white font-semibold">{{ __('messages.steps.step_1') }}</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <hr class="border-t-2 border-white rounded-full my-4">
                            </div>

                            <div aria-label="{!! __('messages.applicant.instruction') !!}" tabindex="0"
                                class="p-3 shadow-lg rounded-b-lg border-4 border-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                <span class="font-regular" style="text-align: justify;">
                                    {!! __('messages.applicant.instruction') !!}
                                </span>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        @include('layouts.dropdown')
                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="lastname" class="block mb-1">
                                                {{ __('messages.applicant.lastname') }}
                                                <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <input type="text" id="lastname" name="lastname"
                                                   aria-label="{{ __('messages.applicant.lastname') }} {{ old('lastname', isset($formData['lastname']) ? $formData['lastname'] : $lastName) }}"
                                                   class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                   pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                   placeholder="Last Name"
                                                   value="{{ old('lastname', isset($formData['lastname']) ? $formData['lastname'] : $lastName) }}">
                                            @error('lastname')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mt-6">
                                            <label for="firstname" class="block mb-1">
                                                {{ __('messages.applicant.firstname') }}
                                                <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                            </label>
                                            <input type="text" id="firstname" name="firstname"
                                                   aria-label="{{ __('messages.applicant.firstname') }} {{ old('firstname', isset($formData['firstname']) ? $formData['firstname'] : $firstName) }}"
                                                   class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                   pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                   placeholder="First Name"
                                                   value="{{ old('firstname', isset($formData['firstname']) ? $formData['firstname'] : $firstName) }}">
                                            @error('firstname')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="middlename"
                                                class="block mb-1">{{ __('messages.applicant.middlename') }}</label>
                                            <input type="text" id="middlename" name="middlename"
                                                aria-label="{{ __('messages.applicant.middlename') }} {{ old('middlename', isset($formData['middlename']) ? $formData['middlename'] : $middleName) }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Middle Name"
                                                value="{{ old('middlename', isset($formData['middlename']) ? $formData['middlename'] : $middleName) }}">
                                            @error('middlename')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>

                                    <div class="mt-6">
                                        <label for="birthdate" class="block mb-1">
                                            {{ __('messages.applicant.birthdate') }}
                                            <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                        </label>
                                    
                                        <input type="date" id="birthdate" name="birthdate"
                                               aria-label="{{ __('messages.applicant.birthdate') }} {{ old('birthdate', $formData['birthdate'] ?? '') }}"
                                               class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                               value="{{ old('birthdate', $formData['birthdate'] ?? '') }}"
                                               onkeydown="return disableKeys(event)" tabindex="0">
                                    
                                        @error('birthdate')
                                            <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                        <div class="mt-6">
                                            <label for="suffix"
                                                class="block mb-1">{{ __('messages.applicant.suffix') }}
                                            </label>
                                            <select id="suffix" name="suffix"
                                                aria-label="{{ __('messages.applicant.suffix') }}  {{ old('suffix', $formData['suffix'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="None"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'None' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_none') }}</option>
                                                <option value="Sr."
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'Sr.' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_sr') }}</option>
                                                <option value="Jr."
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'Jr.' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_jr') }}</option>
                                                <option value="I"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'I' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_i') }}</option>
                                                <option value="II"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'II' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_ii') }}</option>
                                                <option value="III"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'III' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_iii') }}</option>
                                                <option value="IV"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'IV' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_iv') }}</option>
                                                <option value="V"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'V' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_v') }}</option>
                                                <option value="VI"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VI' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_vi') }}</option>
                                                <option value="VII"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VII' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_vii') }}</option>
                                                <option value="VIII"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VIII' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_viii') }}</option>
                                                <option value="IX"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'IX' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_ix') }}</option>
                                                <option value="X"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'X' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_x') }}</option>
                                            </select>
                                            @error('suffix')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="gender"
                                                class="block mb-1">{{ __('messages.applicant.gender') }}</label>
                                            <select id="gender" name="gender"
                                                aria-label="{{ __('messages.applicant.gender') }} {{ old('gender', $formData['gender'] ?? '') }}"
                                                class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="Male"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Male' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.male') }}
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Female' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.female') }}</option>
                                                <option value="Prefer not to say"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Prefer not to say' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.other') }}
                                                </option>
                                            </select>
                                            @error('gender')
                                                <div class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</div>
                              </div>

                                </div>

                                                       @enderror
                                        </div>

                           <div
                                    class="mt-2 text-right flex flex-col sm:flex-row sm:justify-end sm:space-x-2 space-y-2 sm:space-y-0">
                                    <button type="submit" aria-label="{{ __('messages.save') }}"
                                        class="py-2 px-4 bg-green-700 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 hover:ring-orange-300">
                                        {{ __('messages.save') }}
                                    </button>
                                </div>


                            </div>
                        </div>
                    </form>
                    
                    <style>
                    .border-red-500 {
                        border-color: #dc2626 !important;
                        border-width: 2px !important;
                    }
                    </style>
                    
                    <script>
                        // Function to check if an input field is empty
                        function checkInput(inputField) {
                            if (inputField.value === '') {
                                inputField.classList.add('border-red-500');
                            } else {
                                inputField.classList.remove('border-red-500');
                            }
                        }
                    
                        // Add event listeners to required inputs
                        document.addEventListener('DOMContentLoaded', () => {
                            const lastnameInput = document.getElementById('lastname');
                            const firstnameInput = document.getElementById('firstname');
                            const birthdateInput = document.getElementById('birthdate');
                    
                            // Check initially
                            checkInput(lastnameInput);
                            checkInput(firstnameInput);
                            checkInput(birthdateInput);
                    
                            // Check on input
                            lastnameInput.addEventListener('input', () => checkInput(lastnameInput));
                            firstnameInput.addEventListener('input', () => checkInput(firstnameInput));
                            birthdateInput.addEventListener('input', () => checkInput(birthdateInput));
                    
                            // Check on blur (when focus leaves the input)
                            lastnameInput.addEventListener('blur', () => checkInput(lastnameInput));
                            firstnameInput.addEventListener('blur', () => checkInput(firstnameInput));
                            birthdateInput.addEventListener('blur', () => checkInput(birthdateInput));
                        });
                    </script>


