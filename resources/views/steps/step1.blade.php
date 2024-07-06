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
                <div class="w-5/6">
                    <form action="{{ route('setup') }}" method="POST" enctype="multipart/form-data">
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
                        <!-- Step 1: Applicant Profile -->
                        <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg mb-4"
                            id="step1">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full">
                                    Applicant Profile
                                    @php
                                        $currentStep = 1; // Set this dynamically based on your current step
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
                                                <a href="{{ route('pendingapproval') }}"
                                                    class="text-gray-700 dark:text-gray-200">Getting
                                                    Started</a>
                                                <span class="mx-2 text-gray-500">/</span>
                                            </li>
                                            <li class="flex items-center">
                                                <span class="text-blue-500 font-semibold">Applicant Profile</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                <span class="font-regular" style="text-align: justify;"><b>Step 1:</b> To
                                    finalize your applicant profile, input your birthdate, ensure that you are at least
                                    <b> 16 years old </b>, as this is the minimum age requirement. Select a suffix if
                                    needed,
                                    and choose your gender from the dropdown menus provided. Next, if you have a suffix
                                    such as <b> Jr., Sr., or III, </b> choose the appropriate option from the
                                    <b>“Suffix”</b>
                                    dropdown
                                    menu; if none, simply leave it set to <b>‘None.’</b> Finally, confirm your gender by
                                    selecting the correct option from the “Gender” dropdown menu. With these steps,
                                    you’ll have filled out all necessary personal information on your applicant profile.
                                </span>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        @include('layouts.dropdown')
                                    </div>

                                    <div>
                                        <div class="mt-6">
                                            <label for="lastname" class="block mb-1">Last Name</label>
                                            <input type="text" id="lastname" name="lastname"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="Last Name"
                                                value="{{ old('lastname', isset($formData['lastname']) ? $formData['lastname'] : $lastName) }}">
                                            @error('lastname')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mt-6">
                                            <label for="firstname" class="block mb-1">First Name</label>
                                            <input type="text" id="firstname" name="firstname"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                                                placeholder="First Name"
                                                value="{{ old('firstname', isset($formData['firstname']) ? $formData['firstname'] : $firstName) }}">
                                            @error('firstname')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="middlename" class="block mb-1">Middle Name</label>
                                            <input type="text" id="middlename" name="middlename"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
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
                                            <label for="birthdate" class="block mb-1">Birthdate</label>
                                            <input type="date" id="birthdate" name="birthdate"
                                                class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                value="{{ old('birthdate', $formData['birthdate'] ?? '') }}">
                                            @error('birthdate')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mt-6">
                                            <label for="suffix" class="block mb-1">Suffix</label>
                                            <select id="suffix" name="suffix"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                <option value="None"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'None' ? 'selected' : '' }}>
                                                    None</option>
                                                <option value="Sr."
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'Sr' ? 'selected' : '' }}>
                                                    SR.</option>
                                                <option value="Jr."
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'Jr' ? 'selected' : '' }}>
                                                    JR.</option>
                                                <option value="I"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'I' ? 'selected' : '' }}>
                                                    I</option>
                                                <option value="II"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'II' ? 'selected' : '' }}>
                                                    II</option>
                                                <option value="III"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'III' ? 'selected' : '' }}>
                                                    III</option>
                                                <option value="IV"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'IV' ? 'selected' : '' }}>
                                                    IV</option>
                                                <option value="V"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'V' ? 'selected' : '' }}>
                                                    V</option>
                                                <option value="VI"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VI' ? 'selected' : '' }}>
                                                    VI</option>
                                                <option value="VII"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VII' ? 'selected' : '' }}>
                                                    VII</option>
                                                <option value="VIII"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'VIII' ? 'selected' : '' }}>
                                                    VIII</option>
                                                <option value="IX"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'IX' ? 'selected' : '' }}>
                                                    IX</option>
                                                <option value="X"
                                                    {{ old('suffix', $formData['suffix'] ?? '') == 'X' ? 'selected' : '' }}>
                                                    X</option>
                                            </select>
                                            @error('suffix')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <label for="gender" class="block mb-1">Gender</label>
                                            <select id="gender" name="gender"
                                                class="w-full p-2 border rounded  bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                                                <option value="Male"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="Female"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="Other"
                                                    {{ old('gender', $formData['gender'] ?? '') == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="mt-2 text-right">
                                    <button type="submit"
                                        class="py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Save
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
