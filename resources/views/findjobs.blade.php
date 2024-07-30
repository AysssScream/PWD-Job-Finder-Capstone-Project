<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACCESSIJOBS: FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css"
        media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/findjobs.css" />
    <link rel="preload" href="images/team.png" as="image">
    <link rel="preload" href="/css/findjobs.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="images/lightnavbarlogo.png" as="image">
    <link rel="preload" href="images/darknavbarlogo.png" as="image">
</head>

<body>
    <header class="hero-section">
        <div class="head-section">
            <nav class="navbar navbar-expand-lg py-2 navbar-light">
                <div class="container">
                    <a class="navbar-brand">
                        <img id="logoImage" src="/images/lightnavbarlogo.png" data-light="/images/lightnavbarlogo.png"
                            data-dark="/images/darknavbarlogo.png" width="200" height="200"
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
                                        <i class="fas fa-info-circle"></i> FAQ
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
                            <label class="ui-switch position-fixed bg-light p-3 rounded-circle shadow"
                                style="bottom: 20px; right: 20px;">
                                <input type="checkbox" id="themeSwitch">
                                <div class="slider">
                                    <i class="fas fa-adjust"></i>
                                </div>
                            </label>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="container my-4 p-4 mt-10 mb-10 bg-white text-dark shadow-lg rounded" id="containerbg">

        <div class="text-dark">
            <div class="mx-auto">
                <form action="{{ route('welcome.search') }}" method="GET">
                    <h2 class=" fw-bold mb-2" id="designedheader">Find Jobs</h2>
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
                    <div class="d-flex justify-content-end">
                        <div>
                            <div class="form-group position-relative">
                                <label for="date-filter" class="sr-only">Filter by Date</label>
                                <select id="custom_recency_filter" name="custom_recency_filter"
                                    class="form-control border-primary rounded" id="dropdowndate">
                                    <option value="">Date Filters</option>
                                    <option value="All">All</option>
                                    <option value="last-24-hours">Last 24 Hours</option>
                                    <option value="last-7-days">Last 7 Days</option>
                                    <option value="last-30-days">Last 30 Days</option>
                                </select>
                                <i class="fas fa-calendar-alt position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%);" id="icondropdown"></i>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <!-- Filters Column -->
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <!-- Filter Container -->
                                <div id="filterContainer"
                                    class="overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-4 shadow rounded">
                                    <div class="row g-3 p-3 bg-light rounded">
                                        <!-- Filter Fields -->
                                        <div class="col-12">
                                            <label for="job-type" class="form-label">Job Type</label>
                                            <select id="job-type" name="job_type"
                                                class="form-control border-secondary">
                                                <option value="">All</option>
                                                <option value="Full Time">Full-time</option>
                                                <option value="Part Time">Part-time</option>
                                                <option value="Contract">Contractual</option>
                                                <option value="Probationary">Probationary</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" id="location" name="location"
                                                class="form-control border-secondary" placeholder="Enter location">
                                        </div>
                                        <div class="col-12">
                                            <label for="min-salary" class="form-label">Minimum Salary</label>
                                            <input type="number" id="min-salary" name="min_salary"
                                                class="form-control border-secondary"
                                                placeholder="Enter minimum salary">
                                        </div>
                                        <div class="col-12">
                                            <label for="max-salary" class="form-label">Maximum Salary</label>
                                            <input type="number" id="max-salary" name="max_salary"
                                                class="form-control border-secondary"
                                                placeholder="Enter maximum salary">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jobs Column -->
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between align-items-center my-4">
                                    <h2 class="h4"><i class="bi bi-briefcase mr-2"></i>Available PWD Jobs</h2>
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

                                <div class="row g-3">
                                    @forelse ($jobs as $job)
                                        <div class="col-12 col-md-6 col-lg-6 d-flex align-items-stretch">
                                            <div class="card bg-white shadow p-4 border-secondary w-100">
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex justify-content-between w-100">
                                                        @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                                            <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                                alt="Company Logo" class="rounded-lg shadow-md"
                                                                style="width: 90px; height: 90px;">
                                                        @else
                                                            <img src="{{ asset('/images/avatar.png') }}"
                                                                alt="Default Image"
                                                                style="width: 90px; height: 90px;">
                                                        @endif
                                                        <div class="text-left text-sm-center text-md-right ml-3">
                                                            <h3 class="h5 h6-sm h5-md h4-lg font-semibold">
                                                                {{ $job->title }}
                                                            </h3>
                                                            <p
                                                                class="text-md text-sm text-sm-md text-lg-lg text-gray-600 dark:text-gray-400 mt-1">
                                                                {{ $job->company_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p><strong>Date Posted:</strong>
                                                    {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                                                </p>
                                                <p><strong>Location:</strong> {{ $job->location }}</p>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div>
                                                        <p><strong>Educational Level:</strong>
                                                            {{ $job->educational_level }}</p>
                                                        <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                                                        <p><strong>Salary:</strong>
                                                            ₱{{ number_format($job->salary, 2) }}</p>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                                            class="btn btn-primary">
                                                            <i class="bi bi-arrow-right"></i>
                                                            <i class="fas fa-arrow-right"></i>
                                                            <!-- Font Awesome icon -->
                                                        </a>
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


    <script>
        const themeSwitch = document.getElementById('themeSwitch');
        const logoImage = document.getElementById('logoImage');

        // Retrieve current theme from localStorage or default to 'light'
        const currentTheme = localStorage.getItem('theme') || 'light';

        // Apply the current theme on page load
        document.body.classList.add(currentTheme);
        if (currentTheme === 'dark') {
            themeSwitch.checked = true;
            logoImage.src = logoImage.getAttribute('data-dark');
        } else {
            logoImage.src = logoImage.getAttribute('data-light');
        }

        // Event listener for theme switch toggle
        themeSwitch.addEventListener('change', () => {
            if (themeSwitch.checked) {
                document.body.classList.remove('light');
                document.body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                logoImage.src = logoImage.getAttribute('data-dark');
            } else {
                document.body.classList.remove('dark');
                document.body.classList.add('light');
                localStorage.setItem('theme', 'light');
                logoImage.src = logoImage.getAttribute('data-light');
            }
        });
    </script>
    <style>
        /* Custom shadow class for 3D effect */
        .shadow-3d {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    </style>

</body>



</html>
