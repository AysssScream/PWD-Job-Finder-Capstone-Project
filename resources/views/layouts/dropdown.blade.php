<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setup</title>
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div
        class="bg-white border-4 border-blue-500 text-gray-800 dark:bg-gray-700 dark:text-gray-200  mt-6 rounded-lg shadow-md">
        <div class="container mx-auto ">
            <div class=" bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-sm p-4">
                <h3 class="text-2xl font-bold text-center text-white flex items-center justify-center">
                    <i class="fas fa-user-cog mr-2"></i> Profile Setup
                </h3>
            </div>


            <div class="mb-4 px-4 py-3 bg-white text-gray-800 dark:bg-gray-700 dark:text-gray-200 rounded-b-lg shadow-3d focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                tabindex="0" aria-label="{{ __('messages.profile_setup.message') }}">
                <p class="text-sm font-medium text-center">
                    {{ __('messages.profile_setup.message') }}
                    <span
                        class="bg-green-700 text-white py-1 px-2 rounded-lg inline-block cursor-pointer hover:bg-black transition duration-300">Save</span>
                    {{ __('messages.profile_setup.instruction') }}
                </p>
            </div>
            <div class="px-6 mb-4">
                <!-- Toggle Button -->
                <div class="flex justify-start mb-4">
                    <button id="toggleButton" aria-label="{{ __('messages.steps.toggle_button') }}"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-black focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <i class="fas fa-bars"></i> {{ __('messages.steps.toggle_button') }}
                    </button>
                </div>

                <!-- Toggleable Navigation -->
                <div id="toggleNav" class="block">
                    <nav class="flex flex-col">
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('setup') }}" aria-label=" {{ __('messages.steps.step_1') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('setup') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i class="fas fa-user mr-2"></i> {{ __('messages.steps.step_1') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('personal') }}" aria-label=" {{ __('messages.steps.step_2') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('personal') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 ">
                                    <span><i class="fas fa-id-card mr-2"></i> {{ __('messages.steps.step_2') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('workexp') }}" aria-label=" {{ __('messages.steps.step_3') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('workexp') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i class="fas fa-paper-plane mr-2"></i>{{ __('messages.steps.step_3') }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jobpreferences') }}"
                                    aria-label=" {{ __('messages.steps.step_4') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('jobpreferences') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i class="fas fa-gears mr-2"></i>{{ __('messages.steps.step_4') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dialect') }}" aria-label=" {{ __('messages.steps.step_5') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('dialect') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i class="fas fa-language mr-2"></i>{{ __('messages.steps.step_5') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('educationalbg') }}" aria-label=" {{ __('messages.steps.step_6') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('educationalbg') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i class="fas fa-graduation-cap mr-2"></i>
                                        {{ __('messages.steps.step_6') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pwdinfo') }}" aria-label=" {{ __('messages.steps.step_7') }}"
                                    class="block text-white font-semibold py-3 px-4 rounded-lg  transition duration-300 ease-in-out {{ request()->routeIs('pwdinfo') ? 'bg-blue-600 hover:bg-blue-600' : 'bg-gray-600 hover:bg-gray-900' }} focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <span><i
                                            class="fas fa-wheelchair mr-2"></i>{{ __('messages.steps.step_7') }}</span>
                                </a>
                            </li>
                            <!-- Add more steps as needed -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            event.preventDefault();
            var nav = document.getElementById('toggleNav');
            nav.classList.toggle('hidden');
        });
    </script>

    <style>

    </style>
</body>

</html>
