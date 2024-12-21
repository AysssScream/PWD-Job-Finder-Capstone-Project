<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Find Jobs</title>
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/findjobs.css" />
    <style>
        .search-line {
            border: 0;
            height: 1px;
            background: black;
            margin: 20px 0;
        }

        .shadow-3d {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #scrollUpBtn {
            transition: opacity 0.5s ease, visibility 0.5s ease;
            opacity: 0;
            /* Start as invisible */
            visibility: hidden;
            /* Hidden by default */
            pointer-events: none;
            /* Prevent interaction when hidden */
        }

        #scrollUpBtn.visible {
            opacity: 1;
            /* Fully visible */
            visibility: visible;
            /* Make it visible */
            pointer-events: auto;
            /* Allow interaction when visible */
        }

        .gradient-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            /* Blue 500 to Blue 700 */
            color: white;
            /* Change text color for better contrast */
            padding: 10px;
            /* Add some padding */
            border-top-left-radius: 1rem;
            /* Adjust for desired roundness */
            border-top-right-radius: 1rem;
            /* Adjust for desired roundness */
            border-bottom: 4px solid #60a5fa;
            /* Retain the border style */
        }

        @media (max-width: 992px) {
            #available-header {
                margin-top: 2rem;
                /* Adjust the value as needed */
            }
        }
    </style>
</head>

<body>
    <header class="hero-section">
        <div class="head-section">
            <nav class="navbar navbar-expand-lg py-2 navbar-light">
                <div class="container">
                    <a class="navbar-brand">
                        <img id="logoImage" src="/images/lightnavbarlogo.webp" data-light="/images/lightnavbarlogo.webp"
                            data-dark="/images/darknavbarlogo.webp" width="200" height="200"
                            class="align-middle me-1 img-fluid" alt="My Website">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar3"
                        aria-controls="myNavbar3" aria-expanded="false" aria-label="Toggle navigation"
                        id="navbartoggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="lc-block collapse navbar-collapse" id="myNavbar3">
                        <div lc-helper="shortcode" class="live-shortcode ms-auto">
                            <ul id="menu-menu-1" class="navbar-nav">
                                <li id="menu-item-home"
                                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739">
                                    <a href="{{ route('welcome') }}" class="nav-link underline-on-hover">
                                        <i class="fas fa-home"></i> HOME
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="{{ route('findjobs') }}" class="nav-link underline-on-hover">
                                        <i class="fas fa-briefcase"></i> FIND JOBS
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="{{ route('aboutus') }}" class="nav-link underline-on-hover">
                                        <i class="fas fa-info-circle"></i> ABOUT US
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="{{ route('faq') }}" class="nav-link underline-on-hover">
                                        <i class="fas fa-question-circle"></i> FAQ
                                    </a>
                                </li>
                                <li id="menu-item-contact"
                                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link underline-on-hover">
                                        <i class="fas fa-envelope"></i> CONTACT
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="lc-block ms-auto d-grid gap-2 d-lg-block">
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->usertype == 'admin')
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-custom-login" role="button"
                                            aria-label="Admin Dashboard">
                                            <i class="fas fa-tachometer-alt"></i> Admin Dashboard
                                        </a>
                                    @elseif (Auth::user()->usertype == 'employer')
                                        <a href="{{ route('employer.dashboard') }}" class="btn btn-custom-login"
                                            role="button" aria-label="Employer Dashboard">
                                            <i class="fas fa-building"></i> Employer Dashboard
                                        </a>
                                    @else
                                        <a href="{{ url('/dashboard') }}" class="btn btn-custom-login" role="button"
                                            aria-label="Dashboard">
                                            <i class="fas fa-user"></i> Dashboard
                                        </a>
                                    @endif
                                @else
                                    <div class="d-flex flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('login') }}" class="btn btn-custom-login m-1" role="button"
                                            aria-label="Login">
                                            <i class="fas fa-sign-in-alt"></i> LOG IN
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-custom-signup m-1"
                                                role="button" aria-label="Register Now">
                                                <i class="fas fa-user-plus"></i> SIGNUP
                                            </a>
                                        @endif
                                    </div>
                                @endauth
                            @endif
                            <!-- Theme Switch -->
                            <label class="ui-switch position-fixed bg-light p-3 rounded-circle shadow"
                                style="bottom: 100px; right: 20px;">
                                <input type="checkbox" id="themeSwitch">
                                <div class="slider">
                                    <i class="fas fa-adjust"></i>
                                </div>
                            </label>

                            <!-- Scroll Up Label -->
                            <label id="scrollUpBtn" class="ui-switch position-fixed p-3 rounded-circle shadow"
                                style="background-color: #007bff; bottom: 20px; right: 20px;">
                                <div class="slider text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </label>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="container  my-4 mt-10 mb-10 bg-white text-dark shadow-lg b-g " id="containerbg">
        <div class="text-dark">
            <div class="mx-auto">
                <form action="{{ route('welcome.search') }}" method="GET">
                    <div class="gradient-header rounded-lg p-3 mb-2">
                        <h2 class="fw-bold text-white">
                            <i class="fas fa-briefcase mr-4"></i> <!-- Add the Font Awesome icon here -->
                            Find Jobs
                        </h2>
                    </div>

                    <div class="p-4 bg-light">
                        <div class="mb-4">
                            <label class="text-left" id="label1">
                                <i class="bi bi-person mr-2"></i>
                                Search Jobs, Company, Description, Location, and Educational Attainment.
                            </label>
                        </div>
                        <!-- Search Input -->
                        <div class="form-group d-flex position-relative gap-2">
                            <input type="search" id="search-dropdown" name="query"
                                class="form-control flex-grow-1 border-secondary" placeholder="Find Jobs" />
                            <button type="submit" class="btn btn-primary position-relative ml-2">
                                <i class="fas fa-search"></i>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                            <div class="mb-2 mb-sm-0 w-100 w-sm-auto">
                                <input id="resume_upload" type="file" class="d-none">
                            </div>
                        </div>


                        <div class="d-flex flex-wrap justify-content-end gap-2">
                            <div class="w-full sm:w-auto">
                                <div class="form-group position-relative">
                                    <label for="date-filter" class="sr-only">Filter by Date</label>
                                    <select id="custom_recency_filter" name="custom_recency_filter"
                                        class="form-control border-primary rounded px-4 py-2" id="dropdowndate">
                                        <option value="">Date Filters</option>
                                        <option value="All">All</option>
                                        <option value="last-24-hours">Last 24 Hours</option>
                                        <option value="last-7-days">Last 7 Days</option>
                                        <option value="last-30-days">Last 30 Days</option>
                                    </select>
                                    <i class="fas fa-calendar-alt position-absolute"
                                        style="right: 10px; top: 50%; transform: translateY(-50%);"
                                        id="icondropdown"></i>
                                </div>
                            </div>
                            <!-- New Button -->
                            <div class="w-full sm:w-auto">
                                <a href="/register"
                                    class="btn btn-primary bg-blue-500 text-white rounded px-4 py-2 flex items-center gap-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    <i class="fas fa-user-plus"></i>
                                    Not Yet Registered?
                                </a>

                            </div>
                        </div>

                        <hr class="search-line">
                        <div class="row">
                            <!-- Filters Column -->
                            <div class="col-sm-12 col-md-12 col-lg-4 ms-auto p-0 shadow-3d"
                                style="border-radius: 2rem;">
                                <div class="gradient-header rounded-lg p-3 mb-4">
                                    <h2 class="fw-bold text-white">
                                        <i class="fas fa-filter mr-2"></i>
                                        <!-- Add the Font Awesome filter icon here -->
                                        Job Filters
                                    </h2>

                                </div>
                                <div class="p-3">
                                    <p class="mb-4">
                                        To find the most suitable job opportunities, please use the filters below:
                                        select the
                                        job type, enter the desired location, specify the minimum salary you are willing
                                        to
                                        accept, and set the maximum salary you are aiming for.
                                    </p>

                                    <!-- Filter Container -->
                                    <div id="filterContainer"
                                        class="overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-4 shadow rounded">
                                        <div class="row g-3 p-3 rounded">
                                            <!-- Filter Fields -->
                                            <div class="col-12">
                                                <label for="job-type" class="form-label">
                                                    <i class="fas fa-briefcase icon-padding"></i> Job Type
                                                </label>
                                                <select id="job-type" name="job_type"
                                                    class="form-control border-secondary">
                                                    <option value="">All</option>
                                                    <option value="Full-time">Full-time</option>
                                                    <option value="Part-Time">Part-time</option>
                                                    <option value="Contractual">Contractual</option>
                                                    <option value="Probationary">Probationary</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="location" class="form-label">
                                                    <i class="fas fa-map-marker-alt icon-padding"></i> Location
                                                </label>
                                                <input type="text" id="location" name="location"
                                                    class="form-control border-secondary"
                                                    placeholder="Enter location">
                                            </div>
                                            <div class="col-12">
                                                <label for="min-salary" class="form-label">
                                                    <i class="fas fa-dollar-sign icon-padding"></i> Minimum Salary
                                                </label>
                                                <input type="number" id="min-salary" name="min_salary"
                                                    class="form-control border-secondary"
                                                    placeholder="Enter minimum salary">
                                            </div>
                                            <div class="col-12">
                                                <label for="max-salary" class="form-label">
                                                    <i class="fas fa-dollar-sign icon-padding"></i> Maximum Salary
                                                </label>
                                                <input type="number" id="max-salary" name="max_salary"
                                                    class="form-control border-secondary"
                                                    placeholder="Enter maximum salary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Jobs Column -->
                            <div class="col-lg-8">
                                <div class="gradient-header to-blue-700 p-4 rounded-lg text-white mb-4 "
                                    style="border-bottom: 4px solid #60a5fa;" id="available-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="h4">
                                            <i class="fas fa-briefcase mr-2"></i>
                                            AVAILABLE PWD JOBS
                                        </h2>


                                        @php
                                            $numberOfResults = $jobs->total();
                                        @endphp

                                        <div class="text-center text-sm-end">
                                            @if ($numberOfResults > 0)
                                                <p>{{ $numberOfResults }} Results found</p>
                                            @else
                                                <p>No results found</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row g-3">
                                    @forelse ($jobs as $job)
                                        <div class="col-12 col-md-6 col-lg-6 d-flex align-items-stretch">
                                            <div class="card bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow  border-primary w-100"
                                                style="border-radius: 1.1rem;">
                                                <div class="d-flex flex-column">
                                                    <div
                                                        class="d-flex justify-content-between w-100 mb-2 gradient-header">
                                                        @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                                            <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                                alt="Company Logo"
                                                                class="rounded-circle shadow-md border border-secondary"
                                                                style="width: 90px; height: 90px;">
                                                        @else
                                                            <div class="d-flex justify-content-center align-items-center"
                                                                style="width: 90px; height: 90px; background-color: white; border-radius: 50%; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); padding: 5px;">
                                                                <img src="{{ asset('/images/avatar.png') }}"
                                                                    alt="Default Image" class="img-fluid"
                                                                    style="width: 100%; height: auto; border-radius: 50%;">
                                                            </div>
                                                        @endif
                                                        <div class="text-left text-sm-center text-md-right ml-3">
                                                            <h3 class="h5 h6-sm h5-md h4-lg font-semibold">
                                                                {{ $job->title }}
                                                            </h3>
                                                            <p
                                                                class="text-md text text-sm text-sm-md text-lg-lg text-gray-600 dark:text-gray-400 mt-1">
                                                                {{ $job->company_name }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="p-3">

                                                    <p><strong>Date Posted:</strong>
                                                        {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                                                    </p>
                                                    <p><strong>Location:</strong> {{ $job->location }}</p>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <div>
                                                            <p><strong>Educational Level:</strong>
                                                                {{ $job->educational_level ? $job->educational_level : 'TBD' }}
                                                            </p>

                                                            <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                                                            <p><strong>Salary:</strong>
                                                                ₱{{ number_format($job->salary, 2) }}</p>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                                                class="btn btn-primary btn-lg p-3 rounded-pill">
                                                                <i class="bi bi-arrow-right"></i>
                                                                <i class="fas fa-arrow-right"></i>
                                                                <!-- Font Awesome icon -->
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p>No jobs found.</p>
                                        </div>
                                    @endforelse
                                </div>

                            </div>
                        </div>



                        <div class="mt-4">
                            <nav class="d-flex justify-content-between">
                                @if ($jobs->onFirstPage())
                                    <span class="btn btn-secondary disabled">Previous</span>
                                @else
                                    <a href="{{ $jobs->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
                                @endif

                                <div class="d-flex">
                                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                        <a href="{{ $url }}"
                                            class="btn {{ $jobs->currentPage() == $page ? 'btn-primary' : 'btn-secondary' }} mx-1">
                                            {{ $page }}
                                        </a>
                                    @endforeach
                                </div>

                                @if ($jobs->hasMorePages())
                                    <a href="{{ $jobs->nextPageUrl() }}" class="btn btn-secondary">Next</a>
                                @else
                                    <span class="btn btn-secondary disabled">Next</span>
                                @endif
                            </nav>
                        </div>
                    </div>
    </section>

    <footer class="footer-section">
        <section class="bg-dark text-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="lc-block mb-4">
                            <img class="img-fluid" alt="logo" src="/images/darknavbarlogo.webp"
                                style="max-height:10vh" loading="lazy">
                        </div>
                        <div class="lc-block small">
                            <div editable="rich">
                                <p>AccessiJobs is dedicated to creating inclusive employment opportunities for
                                    persons
                                    with disabilities. Our platform connects talented individuals with employers who
                                    value diversity and inclusion. Stay updated with our latest news and join our
                                    community on social media to be a part of the change. Follow us on Facebook and
                                    Twitter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h4>Get Started</h4>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block small">
                            <div editable="rich">
                                <a href="{{ route('welcome') }}" class="text-white" style="text-decoration: none;">
                                    <p><i class="fas fa-home" style="margin-right: 8px;"></i>
                                        Home</p>
                                </a>
                                <a href="{{ route('findjobs') }}" class="text-white" style="text-decoration: none;">
                                    <p><i class="fas fa-briefcase" style="margin-right: 8px; "></i> Find Jobs</p>
                                </a>
                                <a href="{{ route('aboutus') }}" class="text-white" style="text-decoration: none;">
                                    <p><i class="fas fa-info-circle" style="margin-right: 8px;"></i> About Us</p>
                                </a>
                                <a href="{{ route('faq') }}" class="text-white" style="text-decoration: none;">
                                    <p><i class="fas fa-question-circle" style="margin-right: 8px; "></i> FAQ</p>
                                </a>


                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h4>Contact Us</h4>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block small">
                            <div editable="rich">
                                <p></p>
                                <a href="{{ route('contact') }}" class="text-white" style="text-decoration: none;">
                                    <p><i class="fas fa-phone" style="margin-right: 8px;"></i> Ask For Support</p>
                                </a>
                                <p><a href="https://www.facebook.com/PDADMandaluyong" target="_blank"
                                        class="text-white" style="text-decoration: none;">
                                        <i class="fab fa-facebook" style="margin-right: 8px;"></i> Facebook
                                    </a></p>

                                {{-- <p><i class="fab fa-instagram" style="margin-right: 8px;"></i> Instagram</p> --}}
                                <p><a href="https://x.com/MandaluyongPIO" target="_blank" class="text-white"
                                        style="text-decoration: none;">
                                        <i class="fab fa-twitter" style="margin-right: 8px;"></i> Twitter
                                    </a></p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h4>Location</h4>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block small">
                            <div editable="rich">
                                <p><i class="fas fa-map-marker-alt"></i> Second Floor of Senior Citizen Center (Acacia
                                    Lane Extension, NAG Bldg., Brgy. Addition Hills)</p>
                                <p><i class="fas fa-phone-alt"></i> (+63)9667714365</p>
                                <p><i class="fas fa-clock"></i> Open Hours of Government: Mon-Fri: 7:00 am - 4:00pm
                                </p>
                                <p><i class="fas fa-envelope"></i> info@mandaluyong.gov.ph</p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                </div>
            </div>
            <div class="py-5 container">
                <div class="row">
                    <div class="col-6 small">
                        <div class="lc-block">
                            <div editable="rich">
                                <p>Copyright © ACCESSIJOBS 2024
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                    <div class="col-6 text-end small">
                        <div class="lc-block">
                            <div editable="rich">
                                <p>
                                    <a class="text-decoration-none" href="">License Details</a> -
                                    <a class="text-decoration-none" href="">Terms &amp; Conditions</a>
                                </p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                </div>
            </div>
        </section>
    </footer>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeSwitch = document.getElementById('themeSwitch');
            const logoImage = document.getElementById('logoImage');

            if (!themeSwitch || !logoImage) {
                console.error('Theme switch or logo image elements not found!');
                return;
            }

            // Retrieve the current theme from localStorage or default to 'light'
            const currentTheme = localStorage.getItem('theme') || 'light';

            // Apply the current theme on page load
            document.body.classList.add(currentTheme);
            console.log('Current theme on load:', currentTheme);

            // Set the state of the theme switch and logo image based on the current theme
            if (currentTheme === 'dark') {
                themeSwitch.checked = true;
                logoImage.src = logoImage.getAttribute('data-dark');
                console.log('Switching to dark theme on load');
            } else {
                themeSwitch.checked = false;
                logoImage.src = logoImage.getAttribute('data-light');
                console.log('Switching to light theme on load');
            }

            // Event listener for theme switch toggle
            themeSwitch.addEventListener('change', () => {
                if (themeSwitch.checked) {
                    document.body.classList.remove('light');
                    document.body.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    logoImage.src = logoImage.getAttribute('data-dark');
                    console.log('Theme changed to dark');
                } else {
                    document.body.classList.remove('dark');
                    document.body.classList.add('light');
                    localStorage.setItem('theme', 'light');
                    logoImage.src = logoImage.getAttribute('data-light');
                    console.log('Theme changed to light');
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const fadeInOnScroll = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            };

            // Create an intersection observer instance with the callback function
            const observer = new IntersectionObserver(fadeInOnScroll, {
                threshold: 0.1
            });

            // Target elements for observation
            document.querySelectorAll(
                'p, li, h2,h3, section, h1, button, a,.logoimage,label,input, select, span, i').forEach(
                element => {
                    observer.observe(element);
                });
        });

        // Scroll to top functionality
        // Scroll to top functionality
        const scrollUpBtn = document.getElementById('scrollUpBtn');
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollUpBtn.classList.add('visible'); // Add class to show
            } else {
                scrollUpBtn.classList.remove('visible'); // Remove class to hide
            }
        };

        scrollUpBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>

</html>
