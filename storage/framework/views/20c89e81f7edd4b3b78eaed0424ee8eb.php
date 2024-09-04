<div class="py-7 grid grid-cols-1 gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-xl px-4 mt-4 md:px-4 font-semibold text-gray-900 dark:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label=" <?php echo e(__('messages.profile.Accessibility Settings')); ?>" tabindex="0">
        <?php echo e(__('messages.profile.Accessibility Settings')); ?></h2>
    <p class="text-sm px-4 text-gray-600 dark:text-gray-300 md:px-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label=" <?php echo e(__('messages.profile.description')); ?>" tabindex="0">
        <?php echo e(__('messages.profile.description')); ?>

    </p>

    </p>
    <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="grid grid-cols-2 gap-4">
            <div class="relative inline-block text-left w-full">
                <button onclick="toggleDropdown()" aria-label="<?php echo e(__('messages.profile.Adjust Text Size')); ?>"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                    <i class="fas fa-font mr-2"></i> <!-- Font Awesome icon for text size adjustment -->
                    <?php echo e(__('messages.profile.Adjust Text Size')); ?>

                    <i id="dropdownIndicator" class="fas fa-caret-down ml-2"></i> <!-- Dropdown indicator -->
                </button>
                <div id="textSizeDropdown"
                    class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-gray-100 text-gray-700 dark:bg-gray-700 ring-1 ring-black ring-opacity-5 hidden z-10">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="#" onclick="setTextSize(1); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x1</a>
                        <a href="#" onclick="setTextSize(2); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x2</a>
                        <a href="#" onclick="setTextSize(3); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x3</a>
                        <a href="#" onclick="setTextSize(4); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">lg</a>
                    </div>
                </div>
            </div>
            <div class="relative inline-block text-left">
                <button id="toggleCustomDarkMode" aria-label="<?php echo e(__('messages.profile.Toggle Theme')); ?>"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                    <i id="iconMenuToggle" class="fas fa-moon mr-2"></i>
                    <?php echo e(__('messages.profile.Toggle Theme')); ?>

                </button>
            </div>


            <div class="relative inline-block text-left w-full">
                <button onclick="toggleScreenReader()" aria-label="<?php echo e(__('messages.profile.Toggle Screen Reader')); ?>"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                    <i id="screenModalReaderIcon" class="fas fa-volume-up mr-2"></i>
                    <?php echo e(__('messages.profile.Toggle Screen Reader')); ?>

                </button>
            </div>

            <div class="relative inline-block text-left w-full">
                <!-- Language Toggle Buttons with icon -->
                <form action="<?php echo e(route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en'])); ?>"
                    method="GET" class="w-full">
                    <button type="submit" id="languageToggle"
                        aria-label="<?php echo e(__('messages.profile.Change Language')); ?>"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                        <i class="fas fa-language mr-2"></i>
                        <span id="languageText"> <?php echo e(__('messages.profile.Change Language')); ?>

                        </span>
                    </button>
                </form>


                <script>
                    // Retrieve the current language from localStorage or default to 'en'
                    var currentLanguage = localStorage.getItem('currentLanguage') || 'en';

                    function updateLanguageButtonText() {
                        var languageText = document.getElementById('languageText');
                        if (currentLanguage === 'en') {
                            languageText.textContent = 'Change Language: English';
                        } else if (currentLanguage === 'fil') {
                            languageText.textContent = 'Change Language: Filipino';
                        }
                    }

                    updateLanguageButtonText();

                    document.getElementById('languageToggle').addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the form from submitting normally
                        currentLanguage = currentLanguage === 'en' ? 'fil' : 'en';
                        localStorage.setItem('currentLanguage', currentLanguage);
                        updateLanguageButtonText();
                        var form = document.querySelector('form');
                        form.action = "<?php echo e(route('toggle.language', ['lang' => ':locale'])); ?>".replace(':locale',
                            currentLanguage);
                        form.submit();
                    });
                </script>

            </div>

            <script>
                function toggleDropdownMenu() {
                    var dropdown = document.getElementById("themeDropdown");
                    dropdown.classList.toggle("hidden");
                }

                function closeDropdownMenu() {
                    var dropdown = document.getElementById("themeDropdown");
                    dropdown.classList.add("hidden");
                }

                function applyTheme(darkMode) {
                    document.documentElement.setAttribute('data-theme', darkMode ? 'dark' : 'light');
                    localStorage.setItem('darkMode', darkMode.toString());

                    if (shouldReloadPage(darkMode)) {
                        window.location.reload(); // Reload the page after applying the theme
                    }
                }

                function loadThemePreference() {
                    var darkMode = localStorage.getItem('darkMode');
                    if (darkMode === 'true' || darkMode === 'false') {
                        var isDarkMode = darkMode === 'true';
                        applyTheme(isDarkMode);
                    }
                }

                function shouldReloadPage(darkMode) {
                    return (getCurrentTheme() === 'dark' && !darkMode) || (getCurrentTheme() === 'light' && darkMode);
                }

                function getCurrentTheme() {
                    return document.documentElement.getAttribute('data-theme');
                }

                document.addEventListener('DOMContentLoaded', function() {
                    loadThemePreference();
                });
            </script>





        </div>
    </div>
</div>

<script>
    // Retrieve dark mode preference from local storage or default to false (light mode)
    let darkModeEnabled = localStorage.getItem('darkMode') === 'true';

    // Select toggle button and icon elements
    const toggleDarkModeButton = document.getElementById('toggleCustomDarkMode');
    const modeIcon = document.getElementById('iconMenuToggle');

    // Function to update UI based on dark mode state
    function updateDarkModeUI() {
        if (darkModeEnabled) {
            document.documentElement.classList.add('dark-mode');
            modeIcon.classList.remove('fa-sun');
            modeIcon.classList.add('fa-moon');
        } else {
            document.documentElement.classList.remove('dark-mode');
            modeIcon.classList.remove('fa-moon');
            modeIcon.classList.add('fa-sun');
        }
        updateLogoStyles();
    }

    // Update logos function (assuming these elements exist in your DOM)
    function updateLogoStyles() {
        const navbarLogoElement = document.getElementById('navbarLogo');
        const mainNavbarLogoElement = document.getElementById('mainnavbarLogo');
        const mainNavElement = document.getElementById('main-nav');

        if (darkModeEnabled) {
            if (navbarLogoElement) {
                navbarLogoElement.src = '/images/dark-navbar-logo.png';
            }
            if (mainNavbarLogoElement) {
                mainNavbarLogoElement.src = '/images/dark-navbar-logo.png';
            }

            if (mainNavElement) {
                mainNavElement.classList.add('dark-mode');
            }
        } else {
            if (navbarLogoElement) {
                navbarLogoElement.src = '/images/light-navbar-logo.png';
            }
            if (mainNavbarLogoElement) {
                mainNavbarLogoElement.src = '/images/light-navbar-logo.png';
            }

            if (mainNavElement) {
                mainNavElement.classList.remove('dark-mode');
            }
        }
    }

    // Initial call to update UI based on stored dark mode preference
    updateDarkModeUI();

    // Event listener for custom dark mode toggle button
    if (toggleDarkModeButton) {
        toggleDarkModeButton.addEventListener('click', function() {
            darkModeEnabled = !darkModeEnabled;
            localStorage.setItem('darkMode', darkModeEnabled
                .toString()); // Store dark mode preference in local storage
            updateDarkModeUI();
            location.reload(); // Refresh the page

        });
    }

    // Event listener for floating toggle button
    const floatingToggleButton = document.getElementById('floatingToggleCustomDarkMode');
    if (floatingToggleButton) {
        floatingToggleButton.addEventListener('click', function() {
            darkModeEnabled = !darkModeEnabled;
            localStorage.setItem('darkMode', darkModeEnabled
                .toString()); // Store dark mode preference in local storage
            updateDarkModeUI();
        });
    }
</script>
<script>
    var textSize = 2; // Default text size

    function toggleDropdown() {
        var dropdown = document.getElementById('textSizeDropdown');
        dropdown.classList.toggle('hidden');
    }

    function setTextSize(size) {
        textSize = size;
        applyTextSize();
        saveTextSizePreference();
    }

    function applyTextSize() {
        var elements = document.querySelectorAll(
            'body, h1, h2, p, select, input, th, li, nav, input[type="text"], input[type="number"], button');
        elements.forEach(function(el) {
            if (el.tagName === 'INPUT' && (el.type === 'text' || el.type === 'number')) {
                switch (textSize) {
                    case 1:
                        el.style.fontSize = '0.875rem'; // x1
                        break;
                    case 2:
                        el.style.fontSize = '1rem'; // x2
                        break;
                    case 3:
                        el.style.fontSize = '1.125rem'; // x3
                        break;
                    case 4:
                        el.style.fontSize = '1.25rem'; // lg
                        break;
                    default:
                        el.style.fontSize = '1rem'; // Default to x2
                        break;
                }
            } else {
                el.classList.remove('text-sm', 'text-base', 'text-lg', 'text-xl');
                switch (textSize) {
                    case 1:
                        el.classList.add('text-sm'); // x1
                        break;
                    case 2:
                        el.classList.add('text-base'); // x2
                        break;
                    case 3:
                        el.classList.add('text-lg'); // x3
                        break;
                    case 4:
                        el.classList.add('text-xl'); // lg
                        break;
                    default:
                        el.classList.add('text-base'); // Default to x2
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
                textSizeIndicator.textContent = 'x2'; // Default to x2
                break;
        }
    }

    function saveTextSizePreference() {
        console.log('Saving textSize to database:', textSize);
        localStorage.setItem('textSize', textSize);
    }

    document.addEventListener("DOMContentLoaded", function() {
        textSize = parseInt(localStorage.getItem('textSize')) || 2;
        applyTextSize();
    });
</script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\layouts\modalaccessibility.blade.php ENDPATH**/ ?>