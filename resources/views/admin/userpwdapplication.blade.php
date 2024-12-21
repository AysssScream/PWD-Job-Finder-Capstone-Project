<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
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
                class="h-screen w-full md:w-64 bg-gray-100 dark:bg-gray-800 border-b md:border-r border-gray-200 dark:border-gray-600 px-4 py-6">
                <div class="p-4">
                   <div class="flex flex-col items-center mb-5">
                        <div class="w-48 h-48 rounded-full border-4 border-yellow-400 shadow-3d flex items-center justify-center"> <!-- Outer yellow border -->
                            @if ($user->pwdInformation && $user->pwdInformation->profilePicture)
                                <img src="{{ asset('storage/' . $user->pwdInformation->profilePicture) }}"
                                    alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500"> <!-- Inner blue border -->
                            @else
                                <img src="{{ asset('/images/avatar.png') }}" alt="Profile Picture"
                                    class="w-44 h-44 rounded-full object-contain border-4 border-blue-500"> <!-- Inner blue border -->
                            @endif
                        </div>
                    </div>

                    <h2 class="text-2xl mb-5 font-bold text-gray-800 dark:text-gray-200">Applicant:
                        #{{ $pwdinfo->user_id }}</h2>
                    <div class="text-sm mt-2 mb-8 text-gray-800 dark:text-gray-200">
                        Applied on: {{ $pwdinfo->created_at->format('F j, Y \a\t h:i A') }}
                    </div>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.applicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'admin.applicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span class="font-bold">Applicant Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pwdapplicantinfo', ['id' => $applicant->user_id]) }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-white
                  {{ Route::currentRouteName() == 'admin.pwdapplicantinfo' ? 'text-blue-700 dark:text-white' : '' }}">
                                <i class="fas fa-info-circle mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">PWD Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400"
                                onclick="openDeleteModal()">
                                <i class="fas fa-trash-alt mr-2 mt-3"></i>
                                <span class="mt-3 font-bold">Delete Account</span>
                            </a>
                        </li>
                        <script>
                            function openDeleteModal() {
                                document.getElementById('deleteModal').classList.remove('hidden');
                            }

                            function closeDeleteModal() {
                                document.getElementById('deleteModal').classList.add('hidden');
                            }
                        </script>
                    </ul>
                    <div id="deleteModal"
                        class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50 p-4">
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-full overflow-y-auto sm:max-h-[90vh]">
                            <h2 class="text-xl font-bold mb-4 text-black dark:text-white">Confirm Account Deletion</h2>
                            <hr class="border-t-1 border-gray-400 dark:border-gray-600 mb-6">

                            <!-- Warning Icon -->
                            <div class="flex justify-center mb-4">
                                <i class="fas fa-exclamation-triangle text-red-600 text-6xl"></i>
                            </div>

                            <!-- Modal Body -->
                            <p class="text-black dark:text-white mb-6">Are you sure you want to delete this account?
                                This action cannot be undone.</p>

                            <!-- Buttons for confirmation and cancellation -->
                            <div class="flex flex-col justify-end space-y-2">
                                <!-- Delete Button -->
                                <form action="{{ route('admin.removeuser', ['id' => $applicant->user_id]) }}"
                                    method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full">Delete</button>
                                </form>

                                <button onclick="closeDeleteModal()"
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
            <div id="mainContent" class="flex-1 p-6 bg-white dark:bg-gray-900">
                <!-- Applicant Name Card -->
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                        {{ $applicant->lastname . ', ' . $applicant->middlename . ' ' . $applicant->firstname }}
                    </h2>
                    <br>
                    
                    <!-- Disability Information Card -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
                     <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3 mb-4 ">
                    Disability Information</h2>
                   <ul class="space-y-2">
                        <li class="text-gray-900 dark:text-gray-200">
                            <strong><i class="fas fa-wheelchair mr-1 text-blue-500"></i> Disability:</strong> {{ $pwdinfo->disability }}
                        </li>
                        <li class="text-gray-900 dark:text-gray-200">
                            <strong><i class="fas fa-calendar-alt mr-1 text-blue-500"></i> Disability Occurrence:</strong> {{ $pwdinfo->disabilityOccurrence }}
                        </li>
                        @if ($pwdinfo->disabilityOccurrence == 'Others')
                            <li class="text-gray-900 dark:text-gray-200">
                                <strong><i class="fas fa-info-circle mr-1 text-blue-500"></i> Specific Disability:</strong> {{ $pwdinfo->otherDisabilityDetails }}
                            </li>
                        @else
                            <li class="text-gray-900 dark:text-gray-200">
                                <strong><i class="fas fa-info-circle mr-1 text-blue-500"></i> Specific Disability:</strong> {{ $pwdinfo->disabilityDetails }}
                            </li>
                        @endif
                    </ul>
                </div>

                    <!-- PWD ID Number Card -->
<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border-4 border-blue-500 mt-8">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">PWD ID Number</h2>
    <div class="flex items-start mt-3">
        <span class="text-gray-900 dark:text-gray-200">
            13-7401-000-
            <span class="inline-block p-2 rounded-lg bg-blue-500 dark:bg-blue-200 font-bold text-white">
                <i class="fas fa-id-card mr-1 text-white"></i> 
                @if ($pwdinfo->pwdIdNo)
                    {{ $pwdinfo->pwdIdNo }}
                @else
                    <span class="text-red-500"><i class="fas fa-exclamation-circle mr-1"></i> PWD ID not found</span>
                @endif
            </span>

        </span>
    </div>
</div>
            </div>
        </div>
    </body>
</x-app-layout>
