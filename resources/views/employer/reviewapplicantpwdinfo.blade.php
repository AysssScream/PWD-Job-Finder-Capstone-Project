<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <title>Review Applicant PWD Info </title>

    </head>
    
    <style>
    .card-container {
        background: linear-gradient(135deg, #f0f4f8, #e2e8f0);
        border: 1px solid #cbd5e0;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card-container:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        background: linear-gradient(135deg, #e2e8f0, #f0f4f8);
    }
    
    .dark .card-container {
        background: linear-gradient(135deg, #2d3748, #4a5568);
        border-color: #4a5568;
    }
    
    .dark .card-container:hover {
        background: linear-gradient(135deg, #4a5568, #2d3748);
    }

    .card-container h2 {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #2d3748;
    }

    .dark .card-container h2 {
        color: #ffffff;
    }
</style>


    <body class="bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col md:flex-row h-screen">
            <!-- Sidebar -->
            <div id="sidebar"
                class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-200 dark:border-gray-600 px-4 py-6">
                <div class="p-4">
                     <div class="flex flex-col items-center mb-5">
                    <div class="border-4 border-blue-500 p-1 rounded-full">
                        <div class="border-4 border-yellow-300 rounded-full">
                            <img src="{{ asset('storage/' . $pwdinfo->profilePicture) }} " alt="Applicant Image"
                                class="w-44 h-44 object-contain rounded-full  custom-shadow"
                                onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                        </div>
                    </div>
                </div>
                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:</h2>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('employer.applicantinfo', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                  {{ Route::currentRouteName() == 'employer.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.pwdinfo', ['id' => $applicant->user_id, 'job_id' => $job_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                 {{ Route::currentRouteName() == 'employer.pwdinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employer.resume', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                                 {{ Route::currentRouteName() == 'employer.resume' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-file-alt mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">Resume Information</span>
                            </a>
                        </li>
                    </ul>
                    @if (Session::has('resumeerror'))
                        <script>
                            $(document).ready(function() {
                                toastr.options = {
                                    "progressBar": true,
                                    "closeButton": true,
                                }
                                toastr.error("{{ Session::get('resumeerror') }}", 'No Resume Found for: {{ $applicant->user_id }}', {
                                    timeOut: 5000
                                });
                            });
                        </script>
                    @endif
                </div>
            </div>
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                    <!-- Applicant Name Card -->
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}
                    </h2>
                    <br>
                    
                    <!-- Disability Information Card -->
                <div class="card-container mb-6">
                    <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-300 mb-4">Disability Information</h3>
                    <hr class="border-blue-600 mb-4 dark:border-blue-300">
                    <ul class="space-y-2">
                        <li class="text-gray-900 dark:text-gray-200">
                            <strong><i class="fas fa-wheelchair mr-1  text-blue-500 dark:text-blue-300"></i> Disability:</strong> {{ $pwdinfo->disability }}
                        </li>
                        <li class="text-gray-900 dark:text-gray-200">
                            <strong><i class="fas fa-notes-medical mr-1  text-blue-500 dark:text-blue-300"></i> Disability Occurrence:</strong> {{ $pwdinfo->disabilityOccurrence }}
                        </li>
                        @if ($pwdinfo->disabilityOccurrence == 'Others')
                            <li class="text-gray-900 dark:text-gray-200">
                                <strong><i class="fas fa-question-circle mr-1  text-blue-500 dark:text-blue-300"></i> Specific Disability:</strong> {{ $pwdinfo->otherDisabilityDetails }}
                            </li>
                        @else
                            <li class="text-gray-900 dark:text-gray-200">
                                <strong><i class="fas fa-user-injured mr-1  text-blue-500 dark:text-blue-300"></i> Specific Disability:</strong> {{ $pwdinfo->disabilityDetails }}
                            </li>
                        @endif

                    </ul>
                </div>

                    <!-- PWD ID Number Card -->
<div class="card-container">
    <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-300 mb-4">PWD ID Number</h3>
    <hr class="border-blue-600 mb-4 dark:border-blue-300">
    <div class="flex items-start mt-3">
        <span class="text-gray-900 dark:text-gray-200">
            13-7401-000-
           <span class="inline-block p-2 rounded-lg bg-blue-500 dark:bg-blue-200 font-bold text-white">
                <i class="fas fa-id-card mr-1"></i>  <!-- Icon for PWD ID -->
                @if ($pwdinfo->pwdIdNo)
                    {{ $pwdinfo->pwdIdNo }}
                @else
                    <span class="text-red-500">PWD ID not found</span>
                @endif
            </span>

        </span>
    </div>
</div>




            </div>
        </div>
    </body>
</x-app-layout>
