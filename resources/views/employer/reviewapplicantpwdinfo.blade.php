<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Review Applicant PWD Info </title>

    </head>

    <body class="bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col md:flex-row h-screen">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-200 dark:border-gray-600 px-4 py-6">
                <div class="p-4">
                    <div class="flex flex-col items-center mb-5 ">
                        <img src="{{ asset('storage/' . $pwdinfo->profilePicture) }} " alt="Applicant Image"
                            class="w-44 h-44 object-contain rounded-full mb-4 border-4 custom-shadow border-gray-600">
                    </div>
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:</h2>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('employer.applicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.pwdinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">
                    {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}</h1>
                    <div class="border-b border-gray-300 mt-2"></div>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Disability:</strong>
                        {{ $pwdinfo->disability }}
                    </li>
                    <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Disability Occurence:</strong>
                        {{ $pwdinfo->disabilityOccurrence }}
                    </li>
                    @if ($pwdinfo->disabilityOccurrence == 'Others')
                        <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Specific Disability:</strong>
                            {{ $pwdinfo->otherDisabilityDetails }}
                        </li>
                    @else
                        <li class="mt-3 text-gray-900 dark:text-gray-200"><strong>Specific Disability:</strong>
                            {{ $pwdinfo->disabilityDetails }}
                        </li>
                    @endif

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-5">
                        {{ 'PWD ID Picture ' }}
                        <div class="border-b border-gray-300 mt-2"></div>

                    </h1>
                    <div class="flex items-start mt-3 mb-5">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/' . $pwdinfo->pwdIdPicture) }}" alt="Applicant Image"
                                class="w-80 h-80 object-contain mb-4 border custom-shadow border-gray-600">
                        </div>
                        <!-- Optional: Add additional content or styling for the right side -->
                    </div>


            </div>
        </div>
    </body>
</x-app-layout>
