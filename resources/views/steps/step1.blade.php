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
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-full">
                    <form action="{{ route('setup') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
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

                        <!-- Step 1: Applicant Profile -->
                        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                            id="step1">
                            <div class="p-6">
                                @php
                                    $currentStep = 1; // Set this dynamically based on your current step
                                    $totalSteps = 7; // Total number of steps (adjusted to 8)
                                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                @endphp
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full 
                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="Applicant Profile Step 1 {{ $percentage }}%;" tabindex="0">
                                    Applicant Profile
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
                                                <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 
                                                focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                    aria-label="Go Back" tabindex="0"></i>
                                                <a href="{{ route('pendingapproval') }}" aria-label="Getting Started"
                                                    class="text-gray-700 dark:text-gray-200 
                                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Getting
                                                    Started</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Applicant Profile" tabindex="0">
                                                <span class="text-blue-500 font-semibold">Applicant
                                                    Profile</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                <div aria-label="{!! __('messages.applicant.instruction') !!}" tabindex="0"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span class="font-regular " style="text-align: justify;">
                                        {!! __('messages.applicant.instruction') !!}
                                    </span>
                                </div>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        @include('layouts.dropdown')
                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="lastname"
                                                class="block mb-1">{{ __('messages.applicant.lastname') }}</label>
                                            <input type="text" id="lastname" name="lastname"
                                                aria-label="{{ __('messages.applicant.lastname') }}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Last Name"
                                                value="{{ old('lastname', isset($formData['lastname']) ? $formData['lastname'] : $lastName) }}">
                                            @error('lastname')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mt-6">
                                            <label for="firstname"
                                                class="block mb-1">{{ __('messages.applicant.firstname') }}</label>
                                            <input type="text" id="firstname" name="firstname"
                                                aria-label="{{ __('messages.applicant.firstname') }}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="First Name"
                                                value="{{ old('firstname', isset($formData['firstname']) ? $formData['firstname'] : $firstName) }}">
                                            @error('firstname')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="middlename"
                                                class="block mb-1">{{ __('messages.applicant.middlename') }}</label>
                                            <input type="text" id="middlename" name="middlename"
                                                aria-label="{{ __('messages.applicant.middlename') }}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Middle Name"
                                                value="{{ old('middlename', isset($formData['middlename']) ? $formData['middlename'] : $middleName) }}">
                                            @error('middlename')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div>

                                        <div class="mt-6">
                                            <label for="birthdate"
                                                class="block mb-1">{{ __('messages.applicant.birthdate') }}</label>
                                            <input type="date" id="birthdate" name="birthdate"
                                                aria-label="{{ __('messages.applicant.birthdate') }}"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                value="{{ old('birthdate', $formData['birthdate'] ?? '') }}">
                                            @error('birthdate')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mt-6">
                                            <label for="suffix"
                                                class="block mb-1">{{ __('messages.applicant.suffix') }}</label>
                                            <select id="suffix" name="suffix"
                                                aria-label="{{ __('messages.applicant.suffix') }}"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="None"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'None' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_none') }}</option>
                                                <option value="Sr."
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'Sr.' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_sr') }}</option>
                                                <option value="Jr."
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'Jr.' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_jr') }}</option>
                                                <option value="I"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'I' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_i') }}</option>
                                                <option value="II"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'II' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_ii') }}</option>
                                                <option value="III"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'III' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_iii') }}</option>
                                                <option value="IV"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'IV' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_iv') }}</option>
                                                <option value="V"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'V' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_v') }}</option>
                                                <option value="VI"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'VI' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_vi') }}</option>
                                                <option value="VII"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'VII' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_vii') }}</option>
                                                <option value="VIII"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'VIII' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_viii') }}</option>
                                                <option value="IX"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'IX' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_ix') }}</option>
                                                <option value="X"
                                                    {{ old('suffix', $applicant->suffix ?? '') == 'X' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.suffix_x') }}</option>
                                            </select>
                                            @error('suffix')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="gender"
                                                class="block mb-1">{{ __('messages.applicant.gender') }}</label>
                                            <select id="gender" name="gender"
                                                aria-label="{{ __('messages.applicant.gender') }}"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                <option value="Male"
                                                    {{ old('gender', $applicant->gender ?? '') == 'Male' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.male') }}
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender', $applicant->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.female') }}</option>
                                                <option value="Other"
                                                    {{ old('gender', $applicant->gender ?? '') == 'Other' ? 'selected' : '' }}>
                                                    {{ __('messages.applicant.other') }}
                                                </option>
                                            </select>
                                            @error('gender')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="mt-2 text-right">
                                    <button type="submit" aria-label=" {{ __('messages.save') }}"
                                        class="py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {{ __('messages.save') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
