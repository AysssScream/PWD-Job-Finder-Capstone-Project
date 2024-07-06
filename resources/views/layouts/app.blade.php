<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dark-transition {
            transition: background-color 0.3s ease, color 0.3s ease, opacity 0.3s ease;
        }

        /* Adjust the button and icon size */
        #toggleDarkMode {
            width: 56px;
            height: 56px;
            font-size: 24px;
            line-height: 1;
            padding: 12px;
        }

        .floating-button {
            width: 56px;
            height: 56px;
            font-size: 24px;
            line-height: 1;
            padding: 12px;
        }

        .text-xs {
            font-size: 0.75rem;
            /* Adjust to desired font size for x1 */
        }

        .text-sm {
            font-size: 0.875rem;
            /* Adjust to desired font size for x2 */
        }

        .text-md {
            font-size: 1rem;
            /* Adjust to desired font size for x3 */
        }

        .text-lg {
            font-size: 1.25rem;
            /* Adjust to desired font size for lg */
        }
    </style>
</head>

<body class="font-sans antialiased dark-transition">
    <!-- Button to toggle language -->
    <a href="#" id="toggleLanguage" onclick="toggleLanguage()"
        class="bg-green-500 fixed bottom-36 right-4 hover:bg-green-700 text-white font-bold py-2  mt-4 floating-button rounded-full flex items-center justify-center">
        <i class="fas fa-globe"></i>
        @if (Auth::user()->usertype == 'user')
            <a href="#" id="toggletextsize" onclick="toggleTextSize()"
                class="bg-blue-500 fixed bottom-20 right-4 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 floating-button rounded-full flex items-center justify-center">
                <span id="textSizeIndicator"></span> <!-- Span to display text size indicator -->
            </a>
        @endif


        <script>
            // Read textSize from localStorage or set to 1 if not present
            var textSize = parseInt(localStorage.getItem('textSize')) || 1;

            // Function to save textSize in localStorage
            function saveTextSizePreference() {
                localStorage.setItem('textSize', textSize);
            }

            function applyTextSize() {
                var elements = document.querySelectorAll(
                    'body, h1, h2, p, select, input, th, li, nav, input[type="text"], input[type="number"],button');
                elements.forEach(function(el) {
                    if (el.tagName === 'INPUT' && (el.type === 'text' || el.type === 'number')) {
                        switch (textSize) {
                            case 1:
                                el.style.fontSize = '0.75rem'; // x1
                                break;
                            case 2:
                                el.style.fontSize = '0.875rem'; // x2
                                break;
                            case 3:
                                el.style.fontSize = '1rem'; // x3
                                break;
                            case 4:
                                el.style.fontSize = '1.25rem'; // lg
                                break;
                            default:
                                el.style.fontSize = '1rem'; // Default to x3
                                break;
                        }
                    } else {
                        el.classList.remove('text-xs', 'text-sm', 'text-md', 'text-lg');
                        switch (textSize) {
                            case 1:
                                el.classList.add('text-xs'); // x1
                                break;
                            case 2:
                                el.classList.add('text-sm'); // x2
                                break;
                            case 3:
                                el.classList.add('text-md'); // x3
                                break;
                            case 4:
                                el.classList.add('text-lg'); // lg
                                break;
                            default:
                                el.classList.add('text-md'); // Default to x3
                                break;
                        }
                    }
                });

                // Update text size indicator in the button
                var textSizeIndicator = document.getElementById('textSizeIndicator');
                switch (textSize) {
                    case 1:
                        textSizeIndicator.textContent = 'x1';
                        break;
                    case 2:
                        textSizeIndicator.textContent = 'x2';
                        break;
                    case 3:
                        textSizeIndicator.textContent = 'x3';
                        break;
                    case 4:
                        textSizeIndicator.textContent = 'lg';
                        break;
                    default:
                        textSizeIndicator.textContent = 'x3'; // Default to x3
                        break;
                }
            }

            function toggleTextSize() {
                // Increment text size index or reset to 1
                textSize = (textSize % 4) + 1;
                saveTextSizePreference(); // Save textSize preference in localStorage
                applyTextSize(); // Apply the new text size
            }

            // Apply the saved text size preference on page load
            document.addEventListener("DOMContentLoaded", function() {
                applyTextSize();
            });
        </script>
        <button id="toggleDarkMode"
            class="fixed bottom-4 right-4 bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 transition">
            <i id="iconToggle" class="fas fa-sun icon-transition"></i>
        </button>

        <script>
            // Retrieve dark mode preference from local storage or default to false (light mode)
            let isDarkMode = localStorage.getItem('darkMode') === 'true';

            const toggleButton = document.getElementById('toggleDarkMode');
            const icon = document.getElementById('iconToggle');

            // Update logos function
            function updateLogos() {
                const navbarLogo = document.getElementById('navbarLogo');
                const mainnavbarLogo = document.getElementById('mainnavbarLogo');
                const main_nav = document.getElementById('main-nav');

                if (isDarkMode) {
                    if (navbarLogo) {
                        navbarLogo.src = '/images/darknavbarlogo.png';
                    }
                    if (mainnavbarLogo) {
                        mainnavbarLogo.src = '/images/darknavbarlogo.png';
                    }

                    if (main_nav) {
                        main_nav.classList.add('dark');
                    }
                } else {
                    if (navbarLogo) {
                        navbarLogo.src = '/images/lightnavbarlogo.png';
                    }
                    if (mainnavbarLogo) {
                        mainnavbarLogo.src = '/images/lightnavbarlogo.png';
                    }

                    if (main_nav) {
                        main_nav.classList.remove('dark');
                    }
                }
            }

            // Function to update UI based on dark mode state
            function updateDarkModeUI() {
                if (isDarkMode) {
                    document.documentElement.classList.add('dark');
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                } else {
                    document.documentElement.classList.remove('dark');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                }
                updateLogos();
            }

            // Initial call to update UI based on stored dark mode preference
            updateDarkModeUI();

            // Event listener for toggle button
            toggleButton.addEventListener('click', function() {
                isDarkMode = !isDarkMode;
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

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 ">
            @if (!request()->routeIs('profile.edit'))
                @include('layouts.navigation')
            @endif
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-100 dark:bg-gray-700  shadow-xl">
                    <div class="bg-gray-100 dark:bg-gray-700 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @if (Session::has('message'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                $(document).ready(function() {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                    }
                    toastr.info('Click the floating buttons.',
                        'Toggle Accessibility', {
                            timeOut: 5000
                        });
                });
            </script>
        @endif
</body>



</html>
<style>
    .dark-transition {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
</style>
