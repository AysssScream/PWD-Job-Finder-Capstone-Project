<div class="py-7 grid grid-cols-1 gap-6 max-w-8xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-xl px-4 mt-4 md:px-4 font-semibold text-gray-900 dark:text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label="<?php echo e(__('messages.profile.Accessibility Settings')); ?>" tabindex="0">
        <?php echo e(__('messages.profile.Accessibility Settings')); ?></h2>
    <p class="text-sm px-4 text-gray-600 dark:text-gray-300 md:px-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
        aria-label="<?php echo e(__('messages.profile.description')); ?> " tabindex="0">
        <?php echo e(__('messages.profile.description')); ?>

    </p>

    </p>
    <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">

        <div class="grid grid-cols-2 gap-4">
            <div class="relative inline-block text-left w-full">
                <button onclick="toggleMenuDropdown()"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400S flex items-center"
                    aria-label="<?php echo e(__('messages.profile.Adjust Text Size')); ?>">
                    <i class="fas fa-font mr-2"></i> <!-- Font Awesome icon for text size adjustment -->
                    <span id="textSizeIndicator" class="ml-2"></span> <!-- Span to display text size indicator -->
                    <?php echo e(__('messages.profile.Adjust Text Size')); ?>

                    <i id="dropdownIndicator" class="fas fa-caret-down ml-2"></i> <!-- Dropdown indicator -->
                </button>
                <div id="textSizeMenuDropdown"
                    class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-gray-100 text-gray-700 dark:bg-gray-700 ring-1 ring-black ring-opacity-5 hidden z-10">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="#" onclick="setMenuTextSize(1); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x1</a>
                        <a href="#" onclick="setMenuTextSize(2); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x2</a>
                        <a href="#" onclick="setMenuTextSize(3); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">x3</a>
                        <a href="#" onclick="setMenuTextSize(4); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">lg</a>
                    </div>
                </div>
            </div>
            <div class="relative inline-block text-left">
                <button id="toggleCustomDarkMode" aria-label="<?php echo e(__('messages.profile.Toggle Theme')); ?>"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                    onclick="toggleDropdownMenu()">
                    <i id="iconToggle" class="fas fa-moon mr-2" aria-label="Toggle Theme"></i>
                    <?php echo e(__('messages.profile.Toggle Theme')); ?>

                    <i id="dropdownIndicator" class="fas fa-caret-down ml-2"></i>
                </button>
                <div id="themeDropdown"
                    class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-gray-100 text-gray-700 dark:bg-gray-700 ring-1 ring-black ring-opacity-5 hidden z-10">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="#" id="setLightTheme"
                            onclick="applyTheme('false'); closeDropdownMenu(); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">Light</a>
                        <a href="#" id="setDarkTheme"
                            onclick="applyTheme('true'); closeDropdownMenu(); event.preventDefault();"
                            class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200">Dark</a>
                    </div>
                </div>
            </div>


            <div class="relative inline-block text-left w-full">
                <button onclick="toggleScreenReader()" aria-label="<?php echo e(__('messages.profile.Toggle Screen Reader')); ?>"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                    <i id="screenMenuReaderIcon" class="fas fa-volume-up mr-2"></i>
                    <?php echo e(__('messages.profile.Toggle Screen Reader')); ?>

                </button>
            </div>

            <div class="relative inline-block text-left w-full">
                <!-- Language Toggle Buttons with icon -->
                <form action="<?php echo e(route('toggle.language', ['lang' => App::isLocale('en') ? 'fil' : 'en'])); ?>"
                    method="GET" class="w-full">
                    <button type="submit" id="languageMenuToggle"
                        aria-label="   <?php echo e(__('messages.profile.Change Language')); ?>"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                        <i class="fas fa-language mr-2"></i>
                        <span id="languageMenuText">
                            <?php echo e(__('messages.profile.Change Language')); ?>

                        </span>
                    </button>
                </form>

                <script>
                    // Retrieve the current language from localStorage or default to 'en'
                    var currentMenuLanguage = localStorage.getItem('currentLanguage') || 'en';

                    function updateLanguageButtonText() {
                        var languageMenuText = document.getElementById('languageMenuText');
                        if (currentMenuLanguage === 'en') {
                            languageMenuText.textContent = 'Change Language: English';
                        } else if (currentMenuLanguage === 'fil') {
                            languageMenuText.textContent = 'Change Language: Filipino';
                        }
                    }

                    updateLanguageButtonText();

                    document.getElementById('languageMenuToggle').addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the form from submitting normally
                        currentMenuLanguage = currentMenuLanguage === 'en' ? 'fil' : 'en';
                        localStorage.setItem('currentLanguage', currentMenuLanguage);
                        updateLanguageButtonText();
                        var form = document.querySelector('form');
                        form.action = "<?php echo e(route('toggle.language', ['lang' => ':locale'])); ?>".replace(':locale',
                            currentMenuLanguage);
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

                document.getElementById('setLightTheme').addEventListener('click', function(event) {
                    window.location.reload();

                    event.preventDefault();
                    applyTheme(false);
                    closeDropdownMenu();
                });

                document.getElementById('setDarkTheme').addEventListener('click', function(event) {
                    window.location.reload();

                    event.preventDefault();
                    applyTheme(true);
                    closeDropdownMenu();
                });
            </script>





        </div>
    </div>
</div>

<script>
    // Retrieve dark mode preference from local storage or default to false (light mode)
    let isDarkMode = localStorage.getItem('darkMode') === 'true';

    const toggleButton = document.getElementById('toggleCustomDarkMode');
    const icon = document.getElementById('iconToggle');

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

    // Update logos function (assuming these elements exist in your DOM)
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

    // Initial call to update UI based on stored dark mode preference
    updateDarkModeUI();

    // Event listener for floating toggle button
    const floatingToggleButton = document.getElementById('toggleDarkMode');
    if (floatingToggleButton) {
        floatingToggleButton.addEventListener('click', function() {
            isDarkMode = !isDarkMode;
            localStorage.setItem('darkMode', isDarkMode
                .toString()); // Store dark mode preference in local storage
            updateDarkModeUI();
        });
    }

    // Event listener for custom dark mode toggle button
    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            isDarkMode = !isDarkMode;
            localStorage.setItem('darkMode', isDarkMode
                .toString()); // Store dark mode preference in local storage
            updateDarkModeUI();
        });
    }
</script>
<script>
    var textSize = 2; // Default text size

    function toggleMenuDropdown() {
        var dropdown = document.getElementById('textSizeMenuDropdown');
        dropdown.classList.toggle('hidden');
    }

    function setMenuTextSize(size) {
        textSize = size;
        applyMenuTextSize();
        saveTextSizePreference();
    }

    function applyMenuTextSize() {
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
        applyMenuTextSize();
    });
</script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/layouts/accessibility.blade.php ENDPATH**/ ?>