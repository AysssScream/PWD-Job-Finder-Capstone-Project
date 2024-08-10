<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">

    <link rel="preload" href="/images/team.png" as="image">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .icon-transition {
            transition: opacity 0.3s ease-in-out;
        }

        .dark-transition {
            transition: background-color 0.3s ease, color 0.3s ease, opacity 0.3s ease;
        }

        .floating-button {
            width: 56px;
            height: 56px;
            font-size: 24px;
            line-height: 1;
            padding: 12px;
        }


        /* Adjust the button and icon size */
        #toggleDarkMode {
            width: 56px;
            height: 56px;
            font-size: 24px;
            line-height: 1;
            padding: 12px;
        }

        /* Add this CSS to your stylesheet or style block */
        .language-toggle {
            transition: transform 0.3s ease;
        }

        .language-toggle:hover {
            transform: scale(1.1);
            /* Increase scale on hover for a simple zoom effect */
        }

        .flag-img {
            width: 30px;
            /* Adjust width and height as per your flag image dimensions */
            height: auto;
            /* Maintain aspect ratio */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<x-loginavbar />
<a href="{{ route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en']) }}" id="toggleLanguage"
    class="bg-green-500 fixed bottom-20 right-4 hover:bg-green-700 text-white font-bold py-2 mt-4 floating-button rounded-full flex items-center justify-center language-toggle">
    @if (App::isLocale('en'))
        <img src="{{ asset('images/us.png') }}" alt="USA Flag" class="flag-img">
        <!-- USA flag image for English -->
    @else
        <img src="{{ asset('images/ph.png') }}" alt="Philippines Flag" class="flag-img">
        <!-- Philippines flag image for Filipino -->
    @endif
</a>





<body>
    <button id="toggleDarkMode"
        class="fixed bottom-4 right-4 bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition">
        <i id="iconToggle" class="fas fa-sun icon-transition"></i>
    </button>

    <script>
        // Retrieve dark mode preference from local storage or default to false (light mode)
        let isDarkMode = localStorage.getItem('darkMode') === 'true';

        const toggleButton = document.getElementById('toggleDarkMode');
        const icon = document.getElementById('iconToggle');
        const navbarLogo = document.getElementById('navbarLogo');
        const navbar = document.getElementById('custom-navbar');
        const mainnavbarLogo = document.getElementById('mainnavbarLogo');

        // Function to update UI based on dark mode state
        function updateDarkModeUI() {
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');

                if (navbarLogo) {
                    navbarLogo.src = '/images/darknavbarlogo.png';
                }

                if (mainnavbarLogo) {
                    mainnavbarLogo.src = '/images/darknavbarlogo.png';
                }

                if (navbar) {
                    navbar.classList.add('dark');
                }

            } else {
                document.documentElement.classList.remove('dark');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');

                if (navbarLogo) {
                    navbarLogo.src = '/images/lightnavbarlogo.png';
                }

                if (mainnavbarLogo) {
                    mainnavbarLogo.src = '/images/lightnavbarlogo.png';
                }

                if (navbar) {
                    navbar.classList.remove('dark');
                }

            }
        }

        // Initial call to update UI based on stored dark mode preference
        updateDarkModeUI();

        // Event listener for toggle button
        toggleButton.addEventListener('click', function() {
            isDarkMode = !isDarkMode;
            const theme = isDarkMode ? 'dark' : 'light';
            localStorage.setItem('theme', theme); // Store theme preference in local storage
            localStorage.setItem('darkMode', isDarkMode); // Store dark mode preference in local storage
            updateDarkModeUI();

            // Optionally, you can add logic to store dark mode preference on the server
            fetch('/toggle-dark-mode', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    dark_mode: isDarkMode
                })
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Failed to toggle dark mode');
                }
                return response.json();
            }).then(data => {
                console.log(data); // Log success message or handle accordingly
            }).catch(error => {
                console.error('Error toggling dark mode:', error);
                // Handle error scenario, e.g., show error message to the user
            });
        });
    </script>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 bg-image">
        @if (Route::is('register'))
            <div class="container flex justify-center mx-auto">
                <div class="max-w-full px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                    style="margin-top:100px; margin-bottom: 100px;">
                    {{ $slot }}
                </div>
            </div>
        @else
            <div class="container flex justify-center mx-auto">
                <div class="max-w-full px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                    style="margin-top:0px; margin-bottom: 100px;">
                    {{ $slot }}
                </div>
            </div>
        @endif

    </div>


</body>



@include('layouts.darkmode')
