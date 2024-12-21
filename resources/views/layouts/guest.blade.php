<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">

    <link rel="preload" href="/images/team.webp" as="image">
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


        #toggleDarkMode {
            width: 56px;
            height: 56px;
            font-size: 24px;
            line-height: 1;
            padding: 12px;
        }

        .language-toggle {
            transition: transform 0.3s ease;
        }

        .language-toggle:hover {
            transform: scale(1.1);
        }

        .flag-img {
            width: 30px;
            height: auto;
        }

        .shadow-3d {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<!-- Parent div with opacity effect -->
<div
    class="fixed top-72 right-4 z-20 mt-8 bg-gray-300 dark:bg-gray-700 p-1 rounded-full opacity-50 hover:opacity-100 transition-opacity duration-300 ease-in-out">

    <!-- Dark Mode Toggle Button -->
    <button id="toggleDarkMode"
        class="mb-4 bg-blue-700 text-white rounded-full shadow-lg hover:bg-blue-800 dark:bg-gray-700 dark:hover:bg-gray-600 transition">
        <i id="iconToggle" class="fas fa-sun icon-transition"></i>
    </button>

    <!-- Language Toggle Button -->
    <a href="{{ route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en']) }}" id="toggleLanguage"
        class="bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center w-14 h-14">
        @if (App::isLocale('en'))
            <img src="{{ asset('images/us.webp') }}" alt="USA Flag" class="flag-img w-8 h-6">
        @else
            <img src="{{ asset('images/ph.webp') }}" alt="Philippines Flag" class="flag-img w-8 h-6">
        @endif
    </a>

</div>


<x-loginavbar>
</x-loginavbar>



<body class="bg-image bg-gray-200 dark:bg-gray-900 flex flex-col min-h-screen" style="padding-top: 0px;">
    <div class="flex-grow w-full">
        @if (Route::is('register'))
            <div class="flex justify-center items-center min-h-screen">
                <!-- Full height of the viewport for vertical centering -->
                <div class="container flex justify-center mx-auto ">
                    <div class="relative max-w-1/2 bg-white dark:bg-gray-800 text-black shadow-md sm:rounded-lg overflow-hidden"
                        style="margin-top: 30px; margin-bottom: 50px; margin-left: 10px; margin-right: 10px;">
                        <!-- Gradient Borders -->
                        <div class="absolute inset-0 left-0 right-0 rounded-lg pointer-events-none border-l-4 border-r-4 border-transparent"
                            style="border-image: linear-gradient(to right, #1d4ed8, #3b82f6) 1;">
                        </div>
                        <div class="relative z-10 p-4 rounded-lg">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Route::is('login'))
            <div class="flex justify-center items-center min-h-screen">
                <!-- Full height of the viewport for vertical centering -->
                <div class="container flex justify-center mx-auto ">
                    <div class="max-w-1/2 shadow-3d bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                        style="margin-top:30px; margin-bottom: 50px; margin-left:10px; margin-right:10px;">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @elseif (Route::is('password.requestpass'))
            <div class="flex justify-center items-center min-h-screen">
                <!-- Full height of the viewport for vertical centering -->
                <div class="container flex justify-center mx-auto ">
                    <div class="max-w-1/2 p-6 shadow-3d bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                        style="margin-top:60px; margin-bottom: 50px; margin-left:10px; margin-right:10px;">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @elseif (Route::is('verification.emailnotice'))
            <div class="flex justify-center items-center min-h-screen">
                <!-- Full height of the viewport for vertical centering -->
                <div class="container flex justify-center mx-auto ">
                    <div class="max-w-1/2 p-6 shadow-3d bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                        style="margin-top:0px; margin-bottom: 50px; margin-left:10px; margin-right:10px;">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-center items-center min-h-screen">
                <!-- Full height of the viewport for vertical centering -->
                <div class="container flex justify-center mx-auto ">
                    <div class="max-w-1/2  p-6 shadow-3d bg-white dark:bg-gray-800 shadow-md sm:rounded-lg text-black"
                        style="margin-top:0px; margin-bottom: 15%; margin-left:10px; margin-right:10px;">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @endif
    </div>

<footer class="bg-gray-800 w-full p-12 footer-section">
    <section class="bg-gray-800 text-white">
        <div class="container py-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Column 1: Logo and Intro -->
                <div class="lc-block">
                    <div class="mb-4">
                        <img class="img-fluid" alt="logo" src="/images/darknavbarlogo.webp"
                            style="max-height:10vh" loading="lazy">
                    </div>
                    <div class="small">
                        <p>AccessiJobs is dedicated to creating inclusive employment opportunities for persons with
                            disabilities. Our platform connects talented individuals with employers who value
                            diversity and inclusion. Stay updated with our latest news and join our community on
                            social media to be a part of the change. Follow us on Facebook and Twitter.</p>
                    </div>
                    <div class="py-2 flex items-center space-x-4">
                        <a class="text-light hover:text-blue-400 transition-colors"
                            href="https://www.facebook.com/PDADMandaluyong" target="_blank">
                            <!-- Facebook SVG -->
                        </a>
                        <a class="text-light hover:text-blue-400 transition-colors"
                            href="https://x.com/MandaluyongPIO" target="_blank">
                            <!-- Twitter SVG -->
                        </a>
                    </div>
                </div>

                <!-- Column 2: Get Started and Contact Us Links -->
                <div class="lc-block text-left mx-auto">
                    <h4 class="mb-6">Get Started</h4>
                    <div class="small">
                        <a href="{{ route('welcome') }}" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fas fa-home" style="margin-right: 8px;"></i> Home</p>
                        </a>
                        <a href="{{ route('findjobs') }}" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fas fa-briefcase" style="margin-right: 8px;"></i> Find Jobs</p>
                        </a>
                        <a href="{{ route('aboutus') }}" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fas fa-info-circle" style="margin-right: 8px;"></i> About Us</p>
                        </a>
                        <a href="{{ route('faq') }}" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fas fa-question-circle" style="margin-right: 8px;"></i> FAQ</p>
                        </a>
                    </div>
                    <h4 class="mt-6 mb-6">Contact Us</h4>
                    <div class="small">
                        <a href="{{ route('contact') }}" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fas fa-phone" style="margin-right: 8px;"></i> Ask For Support</p>
                        </a>
                        <a href="https://www.facebook.com/PDADMandaluyong" target="_blank" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fab fa-facebook" style="margin-right: 8px;"></i> Facebook</p>
                        </a>
                        <a href="https://x.com/MandaluyongPIO" target="_blank" class="text-white hover:text-blue-400 transition-colors">
                            <p><i class="fab fa-twitter" style="margin-right: 8px;"></i> Twitter</p>
                        </a>
                    </div>
                </div>

                <!-- Column 3: Location -->
                <div class="lc-block mb-4 ">
                    <h4 class="mb-4">Location</h4>
                    <div class="small">
                        <p class="mb-2"><i class="fas fa-map-marker-alt"></i> Second Floor of Senior Citizen Center (Acacia
                            Lane Extension, NAG Bldg., Brgy. Addition Hills)</p>
                        <p class="mb-2"><i class="fas fa-phone-alt"></i> (+63)9667714365</p>
                        <p class="mb-2"><i class="fas fa-clock"></i> Open Hours of Government: Mon-Fri: 7:00 am - 4:00 pm</p>
                        <p class="mb-2"><i class="fas fa-envelope"></i> info@mandaluyong.gov.ph</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 container">
            <div class="row">
                <div class="col-6 small">
                    <p>Copyright © ACCESSIJOBS 2024</p>
                </div>
            </div>
        </div>
    </section>
</footer>




</body>



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
                navbarLogo.src = '/images/darknavbarlogo.webp';
            }

            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/darknavbarlogo.webp';
            }

            if (navbar) {
                navbar.classList.add('dark');
            }

        } else {
            document.documentElement.classList.remove('dark');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');

            if (navbarLogo) {
                navbarLogo.src = '/images/lightnavbarlogo.webp';
            }

            if (mainnavbarLogo) {
                mainnavbarLogo.src = '/images/lightnavbarlogo.webp';
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



@include('layouts.darkmode')
