<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Welcome</title>
    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png" loading="lazy">


    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link rel="stylesheet" href="/css/Homepage.css">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="preload" href="images/team.webp" as="image" loading="lazy">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script defer="" src="https://unpkg.com/vanilla-counter" onload="initializeCounterRANDOMID()"></script>
    <style>
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
    </style>

</head>

<body>
    <header class="hero-section">
        <div class="head-section">
            <nav class="navbar navbar-expand-lg py-2 navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="">
                        <img id="logoImage" src="images/lightnavbarlogo.webp" data-light="images/lightnavbarlogo.webp"
                            data-dark="images/darknavbarlogo.webp" width="200" height="200"
                            class="align-middle me-1 img-fluid" alt="My Website" loading="lazy">
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
                                        <i class="fas fas fa-question-circle"></i> FAQ
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
                                            <i class="fas fa-tachometer-alt" id="customicon"></i> Admin Dashboard
                                        </a>
                                    @elseif (Auth::user()->usertype == 'employer')
                                        <a href="{{ route('employer.dashboard') }}" class="btn btn-custom-login"
                                            role="button" aria-label="Employer Dashboard">
                                            <i class="fas fa-building" id="customicon"></i> Employer Dashboard
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


                            <label id="scrollUpBtn" class="ui-switch position-fixed p-3 rounded-circle shadow"
                                style="background-color: #007bff; bottom: 20px; right: 20px;">
                                <div class="slider text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </label>


                            <script>
                                function toggleDarkMode() {
                                    const themeSwitch = document.getElementById('themeSwitch');
                                    const darkMode = themeSwitch.checked;
                                    localStorage.setItem('darkMode', darkMode);
                                    applyTheme(darkMode);
                                }

                                function applyTheme(darkMode) {
                                    if (darkMode) {
                                        document.body.classList.add('dark-mode');
                                    } else {
                                        document.body.classList.remove('dark-mode');
                                    }
                                }

                                // Initialize theme based on local storage
                                document.addEventListener('DOMContentLoaded', () => {
                                    const darkMode = JSON.parse(localStorage.getItem('darkMode'));
                                    const themeSwitch = document.getElementById('themeSwitch');
                                    if (darkMode !== null) {
                                        themeSwitch.checked = darkMode;
                                        applyTheme(darkMode);
                                    }
                                    themeSwitch.addEventListener('change', toggleDarkMode);
                                });
                            </script>
                        </div>

                    </div>
                </div>
            </nav>
        </div>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="full-screen-container">
                        <img class="full-screen-img" src="images/governance.webp" alt="Governance Image"
                            loading="lazy">
                        <div class="overlay"></div>
                    </div>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="underlined-heading"><span class="typed-text"></span></h1>
                            <p style="line-height: 1.9;" class="sliderparagraph1">Discover our innovative job search
                                platform designed
                                specifically for persons with <br>
                                disabilities in Mandaluyong City, featuring advanced resume parsing and descriptive <br>
                                analytics to enhance job accessibility and inclusivity.</p>
                            <p><a class="btn btn-lg btn-primary" href="#how-it-works">How it Works?</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="full-screen-img" src="images/governance2.webp" alt="Governance Image"
                        loading="lazy">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="underlined-heading"><span class="typed-text"></span></h1>
                            <p style="line-height: 1.9;" class="sliderparagraph2">Our platform offers secure login,
                                accessibility options, a
                                resume parser subsystem, <br>
                                a PWD-friendly dashboard, employer functionalities, and real-time notifications, <br>
                                all tailored to meet the unique needs of job seekers with disabilities.</p>
                            <p><a class="btn btn-lg btn-primary " href="{{ route('aboutus') }}">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="full-screen-img" src="images/governance3.webp" alt="Governance Image"
                        loading="lazy">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1 class="underlined-heading"><span class="typed-text"></span></h1>
                            <p style="line-height: 1.9;" class="sliderparagraph3">By addressing the employment
                                barriers faced by persons with
                                disabilities and <br>
                                implementing comprehensive accessibility features, our platform aims to significantly
                                <br>improve job matching success rates and overall user satisfaction.
                            </p>
                            <p><a class="btn btn-lg btn-primary" href="{{ route('login') }}">Get Started</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="section-1 py-1 " id="popularbg">
            <div class="container">
                <h2 class=" fw-bold" id="designedheader">Find Jobs</h2>
                <br>
                <div class="searchcard border-0 shadow p-5">
                    <div class="row pt-2">

                        <div class="row">
                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <label for="search-location"
                                    class="form-label text-gray-900 dark:text-gray-200">Location</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-map-marker-alt icon"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200"
                                        name="search" id="search-location" placeholder="Location">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <label for="jobtype" class="form-label text-gray-900 dark:text-gray-200">Job
                                    Type</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-tag icon"></i>
                                    </span>
                                    <select name="jobtype" id="jobtype"
                                        class="form-control bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 dark:border-gray-600">
                                        <option value="">Select a Job Type</option>
                                        <option value="fullttime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="contractual">Contractual</option>
                                        <option value="probationary">Probationary</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <label for="job-title" class="form-label text-gray-900 dark:text-gray-200">Job
                                    Title</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                        <i class="fas fa-briefcase icon"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200"
                                        name="job-title" id="job-title" placeholder="Job Title">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <label for="search-submit" class="form-label d-block">&nbsp;</label>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('findjobs') }}" class="btn btn-primary btn-block">
                                        <i class="fas fa-search icon"></i> Search Job
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>

        <section class="section-2 bg-2 py-5" id="popularbg">
            <div class="container">
                <h2 class=" fw-bold" id="designedheader">Featured Companies</h2>
                <div class="row pt-4">
                    <br>
                    <div class="container">
                        <div class="row">
                                 @foreach ($jobs as $job)
                                    <div class="col-lg-4 col-xl-3 col-md-6 d-flex align-items-stretch">
                                        <div class="single_catagory shadow rounded flex-grow-1 d-flex flex-column">
                                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}" class="text-decoration-none">
                                                <!-- Company Logo inside a rounded avatar with blue border and fallback to avatar.png -->
                                                <div class="d-flex justify-content-center mb-2">
                                                    <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company_name }} Logo"
                                                        class="rounded-circle" style="width: 170px; height: 170px; object-fit: fit; border: 2px solid #007BFF;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); 
                                                        onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                                </div>
                                                <h4 class="pb-2">{{ $job->company_name }}</h4>
                                            </a>
                                            <p class="mb-0"><span>{{ $job->location }}</span></p>
                                            <p class="mb-0">
                                                <span>{{ $totalVacanciesPerCompany[$job->company_name] ?? 'N/A' }} job positions available</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main class="mt-5 " id="main">
            <div class="container">
                <!--Section: Content-->

                <section>
                    <div class="row">
                        <div class="col-md-6 gx-5 mb-4">
                            <div class="bg-image hover-overlay shadow-2-strong" data-mdb-ripple-init
                                data-mdb-ripple-color="light">
                                <img src="/images/First2.webp" class="img-fluid" loading="lazy" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        </div>


                        <div class="col-md-6 gx-5 mb-4">
                            <h1 style="font-size: 25px text-gray-700;"><strong>Welcome to AccessiJobs: Empowering
                                    PWDs</strong></h4>
                                <p class="text-gray-700" style="line-height: 1.9;">
                                    At AccessiJobs, we are dedicated to transforming the job search experience for
                                    persons with disabilities (PWDs) in Mandaluyong City. Our innovative platform is
                                    designed with accessibility and inclusivity at its core, ensuring that everyone has
                                    the opportunity to find meaningful employment.
                                </p>
                                <p style="font-size:25px;"><strong>What Can You Expect?</strong></p>
                                <p class="text-gray-700" style="line-height: 1.0;">
                                    Discover a platform where you can:
                                <ul style="line-height: 1.9;">
                                    <li>Effortlessly navigate through accessible job listings and filter opportunities
                                        that match your skills and interests.</li>
                                    <li>Enjoy features such as text-to-speech, speech-to-text, and adjustable screen
                                        contrast, tailored to meet your specific needs.</li>
                                    <li>Connect with inclusive employers committed to creating a supportive work
                                        environment for PWDs.</li>
                                    <li>Receive real-time notifications about job openings that suit your preferences.
                                    </li>
                                    <li>Benefit from our resume parsing algorithm and descriptive analytics to enhance
                                        your job search efficiency.</li>
                                </ul>
                                <p style="line-height: 1.9;"> Join us at AccessiJobs and take the first step towards a
                                    more inclusive and accessible job market. Together, we can break down barriers and
                                    create equal employment opportunities for everyone.
                                </p>
                                </p>
                                </p>
                        </div>
                    </div>
                </section>

                <section class="section-3  py-5">
                    <div class="container">
                        <h2 class=" fw-bold" id="designedheader">Featured Jobs</h2>
                        <div class="row pt-5">
                            <div class="job_listing_area">
                                <div class="job_lists">
                                    <div class="row">
                                        @foreach ($featuredjobs as $job)
                                            <div class="col-md-4">
                                                <div class="featuredcard border-0 p-3 shadow mb-4 ">
                                                    <div class="card-body">
                                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                                        <p>We are in need of a {{ $job->title }} for our company.</p>
                                                        <div class="bg-light p-3 border rounded">
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-map-marker"></i></span>
                                                                <span class="ps-1">{{ $job->location ?? 'No details found' }}</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-clock"></i></span>
                                                                <span class="ps-1">{{ $job->job_type ?? 'No details found' }}</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-graduation-cap"></i></span>
                                                                <span
                                                                    class="ps-1">{{ $job->educational_level ?? 'No details found' }}</span>
                                                            </p>
                                                        </div>

                                                        <div class="d-grid mt-3">
                                                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                                                class="btn btn-primary btn-lg">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="py-5 bg-light">
                    <div class="container">
                        <!-- Header -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 text-center">
                                <h2 class="fw-bold text-primary">Understanding Our Resume Parser</h2>
                                <p class="lead text-muted">See how our system analyzes and extracts key information from your resume</p>
                            </div>
                        </div>
                
                        <!-- Resume Analysis Visualization -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Original Resume Format</h5>
                                    </div>
                                    <div class="card-body">
                                        <pre class="bg-light p-3 rounded">
                👤 Full Name
                🎂 Birthdate: MM/DD/YYYY
                🔢 Age: XX
                💼 Work Experience
                📚 Education
                🎯 Skills
                📜 Certifications
                                        </pre>
                                    </div>
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0"><i class="fas fa-robot me-2"></i>Extracted Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="extracted-data">
                                            <div class="mb-3">
                                                <h6 class="text-primary"><i class="fas fa-user-graduate me-2"></i>Education Level</h6>
                                                <p class="ms-4 text-muted">• College Graduate<br>• Bachelor's Degree<br>• Vocational Graduate</p>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <h6 class="text-primary"><i class="fas fa-code me-2"></i>Program/Course</h6>
                                                <p class="ms-4 text-muted">Bachelor of Science in Computer Science</p>
                                            </div>
                
                                            <div class="mb-3">
                                                <h6 class="text-primary"><i class="fas fa-briefcase me-2"></i>Work Experience</h6>
                                                <div class="ms-4 text-muted">
                                                    <p>• Software Developer (3.1 years)<br>• Senior Full-Stack Developer (3.3 years)</p>
                                                    <small class="text-success">Total: 6.4 years of experience</small>
                                                </div>
                                            </div>
                
                                            <div class="mb-3">
                                                <h6 class="text-primary"><i class="fas fa-certificate me-2"></i>Certifications</h6>
                                                <p class="ms-4 text-muted">• PRC License - Registered Software Engineer<br>• TESDA Certificate in Web Development</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Process Steps -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 class="text-center mb-4">How Our Parser Works</h3>
                                <div class="row g-4">
                                    <!-- Step 1 -->
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                                                    <i class="fas fa-file-upload fa-2x text-primary"></i>
                                                </div>
                                                <h5>Document Upload</h5>
                                                <p class="text-muted">System accepts PDF or DOCX format resumes</p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <!-- Step 2 -->
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="rounded-circle bg-success bg-opacity-10 p-3 d-inline-block mb-3">
                                                    <i class="fas fa-search fa-2x text-success"></i>
                                                </div>
                                                <h5>Text Extraction</h5>
                                                <p class="text-muted">Converts document content into analyzable text</p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <!-- Step 3 -->
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="rounded-circle bg-info bg-opacity-10 p-3 d-inline-block mb-3">
                                                    <i class="fas fa-brain fa-2x text-info"></i>
                                                </div>
                                                <h5>Data Analysis</h5>
                                                <p class="text-muted">Identifies and categorizes key information</p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <!-- Step 4 -->
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="rounded-circle bg-warning bg-opacity-10 p-3 d-inline-block mb-3">
                                                    <i class="fas fa-check-circle fa-2x text-warning"></i>
                                                </div>
                                                <h5>Job Matching</h5>
                                                <p class="text-muted">Matches extracted data with job requirements</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Sample Extraction Result -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0"><i class="fas fa-code me-2"></i>Sample Extraction Result</h5>
                                    </div>
                                    <div class="card-body">
                                        <pre class="bg-light p-4 rounded" style="overflow-x: auto;">
                {
                    "age": 21,
                    "certification": {
                        "PRC": "PRC License - Registered Software Engineer",
                        "TESDA": "TESDA Certificate in Web Development"
                    },
                    "education": "College Graduate, Bachelor's Degree",
                    "program": "Bachelor of Science in Computer Science",
                    "skills": [
                        "Programming",
                        "Web Development",
                        "Database",
                        "Mobile Apps",
                        "UI/UX Design",
                        "Cloud Services"
                    ],
                    "work_experience": [
                        {
                            "company": "Tech Innovators Inc.",
                            "duration_years": 3.1,
                            "title": "Software Developer"
                        },
                        {
                            "company": "NextGen Solutions",
                            "duration_years": 3.3,
                            "title": "Senior Full-Stack Developer"
                        }
                    ],
                    "total_experience_years": 6.4
                }</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                
                <style>
                .card {
                    transition: transform 0.3s ease-in-out;
                }
                
                .card:hover {
                    transform: translateY(-5px);
                }
                
                pre {
                    white-space: pre-wrap;
                    word-wrap: break-word;
                }
                
                .matching-criteria, .matching-process {
                    background-color: rgba(248, 249, 250, 0.9);
                }
                
                .extracted-data h6 {
                    font-weight: 600;
                }
                
                .bg-opacity-10 {
                    --bs-bg-opacity: 0.1;
                }
                
                @media (max-width: 768px) {
                    pre {
                        font-size: 0.8rem;
                    }
                    
                    .card-body {
                        padding: 1rem;
                    }
                }
                </style>
                
                <section class="py-5 bg-light">
                    <div class="container">
                        <!-- Header -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 text-center">
                                <h2 class="fw-bold text-primary">Recommended Resume Format</h2>
                                <p class="lead text-muted">Our AI-optimized resume structure for better job matching</p>
                            </div>
                        </div>
                
                        <!-- Template Preview Card -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-primary text-white py-3">
                                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Resume Structure Example</h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <!-- Personal Information Section -->
                                        <div class="mb-4">
                                            <h3 class="h4 mb-3">👤 FULL NAME</h3>
                                            <div class="ms-4">
                                                <p class="mb-2">🎂 Birthdate: MM/DD/YYYY</p>
                                                <p class="mb-2">🔢 Age: XX</p>
                                                <p class="mb-2">💑 Civil Status: Single/Married</p>
                                                <p class="mb-2">📏 Height: XXX cm</p>
                                                <p class="mb-2">🗣 Language: English, Filipino</p>
                                                <p class="mb-2">✉ Email: example@email.com</p>
                                                <p class="mb-2">☎ Phone: 09XXXXXXXXX</p>
                                                <p class="mb-2">🏠 Address: City, Province</p>
                                            </div>
                                        </div>
                
                                        <!-- Education Section -->
                                        <div class="mb-4">
                                            <h4 class="border-bottom pb-2">EDUCATIONAL ATTAINMENT</h4>
                                            <div class="ms-4">
                                                <div class="mb-3">
                                                    <p class="fw-bold mb-1">COLLEGE</p>
                                                    <p class="mb-1">University/School: [School Name]</p>
                                                    <p class="mb-1">Program: [Course Name]</p>
                                                    <p>Year: YYYY - YYYY</p>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="fw-bold mb-1">SENIOR HIGH SCHOOL</p>
                                                    <p class="mb-1">School: [School Name]</p>
                                                    <p>Year: YYYY - YYYY</p>
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Skills Section -->
                                        <div class="mb-4">
                                            <h4 class="border-bottom pb-2">SKILLS</h4>
                                            <div class="row ms-3">
                                                <div class="col-md-6">
                                                    <p class="fw-bold mb-2">Hard Skills</p>
                                                    <ul class="list-unstyled">
                                                        <li>• Programming</li>
                                                        <li>• Web Development</li>
                                                        <li>• Database Management</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fw-bold mb-2">Soft Skills</p>
                                                    <ul class="list-unstyled">
                                                        <li>• Communication</li>
                                                        <li>• Leadership</li>
                                                        <li>• Problem Solving</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Work Experience Section -->
                                        <div class="mb-4">
                                            <h4 class="border-bottom pb-2">WORK EXPERIENCE</h4>
                                            <div class="ms-4">
                                                <p class="fw-bold mb-1">Job Title, Company Name</p>
                                                <p class="text-muted">MM/YYYY - MM/YYYY</p>
                                                <ul class="list-unstyled">
                                                    <li>• Key responsibility or achievement 1</li>
                                                    <li>• Key responsibility or achievement 2</li>
                                                </ul>
                                            </div>
                                        </div>
                
                                        <!-- Certifications Section -->
                                        <div class="mb-4">
                                            <h4 class="border-bottom pb-2">CERTIFICATIONS</h4>
                                            <div class="ms-4">
                                                <ul class="list-unstyled">
                                                    <li>• Certification Name, Issuing Organization (YYYY)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                                <!-- Call to Action -->
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <div class="p-5 bg-primary bg-opacity-10 rounded-3">
                                    <h3 class="text-primary mb-4">Ready to Try Our Resume Parser?</h3>
                                    <p class="lead mb-4">Upload your resume and let our intelligent system match you with the perfect job opportunities.</p>
                                    <a href="{{ route('dashboard.resumeupload') }}" class="btn btn-primary btn-lg px-5 py-3">
                                        <i class="fas fa-upload me-2"></i>Upload Your Resume Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <style>
                .card {
                    transition: transform 0.3s ease;
                }
                
                .card:hover {
                    transform: translateY(-5px);
                }
                
                .bg-opacity-10 {
                    --bs-bg-opacity: 0.1;
                }
                
                @media (max-width: 768px) {
                    .ms-4 {
                        margin-left: 1rem !important;
                    }
                }
                </style>

                
                <div class="second-section mt-4">
                    <section class="bg-light ">
                        <div class="container py-6 ">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="lc-block text-center">
                                        <div editable="rich">
                                            <h2 class="display-5 fw-bold">ABOUT ACCESSIJOBS</h2>
                                        </div>
                                    </div><!-- /lc-block -->
                                </div>
                            </div>
                            <div class="container">
                                <div class="row align-items-center mb-5">
                                    <div class="col-md-6 p-xxl-5">
                                        <div class="lc-block">
                                            <div editable="rich">
                                                <h1 class="fw-bold">PURPOSE</h1>
                                            </div>
                                        </div><!-- /lc-block -->
                                        <div class="lc-block">
                                            <div editable="rich" style="line-height: 2.0; font-size: 20px;">
                                                <p>At AccessiJobs, we're committed to transforming the job market for
                                                    persons
                                                    with disabilities (PWDs) in Mandaluyong City. Our mission is
                                                    centered on
                                                    enhancing job accessibility and creating opportunities that empower
                                                    individuals. We strive to break down barriers and facilitate
                                                    meaningful
                                                    connections between job seekers and employers through innovative
                                                    technology
                                                    and dedicated support. </p>
                                            </div>
                                        </div><!-- /lc-block -->
                                    </div><!-- /col -->
                                    <div class="col-md-6">
                                        <div class="lc-block">
                                            <img class="img-fluid" src="images/First4.webp" loading="lazy">
                                        </div><!-- /lc-block -->
                                    </div><!-- /col -->
                                </div>
                                <div class="row align-items-center mb-5">
                                    <div class="col-md-6 p-xxl-5 order-md-2">
                                        <div class="lc-block">
                                            <div editable="rich">
                                                <h1 class="fw-bold">VISION</h1>
                                            </div>
                                        </div><!-- /lc-block -->
                                        <div class="lc-block">
                                            <div editable="rich" style="line-height: 2.0; font-size: 20px;">
                                                <p>We envision a future where the job market in Mandaluyong City is
                                                    fully
                                                    inclusive, allowing PWDs to easily find and secure employment that
                                                    not only
                                                    matches their skills and aspirations but also supports their growth
                                                    and
                                                    development. Our goal is to champion diversity and inclusion,
                                                    ensuring that
                                                    everyone has the opportunity to contribute to and thrive in our
                                                    community.
                                                </p>
                                            </div>
                                        </div><!-- /lc-block -->
                                    </div><!-- /col -->
                                    <div class="col-md-6">
                                        <div class="lc-block">
                                            <img class="img-fluid" src="images/First8.webp" loading="lazy">
                                        </div><!-- /lc-block -->
                                    </div><!-- /col -->
                                </div>
                            </div>
                        </div>


                </div>
                <br>
                <br>
                <br>
                <br>
                </section>

    </header>


    <div class="offer-section">
        <section class="d-flex align-items-center min-vh-50">
            <div class="container text-center mb-md-5">
                <div class="lc-block">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h1 class="fw-bold display-5">WHAT ACCESSIJOBS OFFERS?</h1>
                        </div>
                    </div>
                    <div class="lc-block mb-4 col-xxl-6 mx-auto">
                        <hr>
                    </div>
                    <div class="lc-block">
                        <div editable="rich">
                            <p class="lead" style="line-height: 1.9; font-size: 19px;">AccessiJobs provides a
                                comprehensive job search platform tailored specifically for persons with disabilities in
                                Mandaluyong City. It offers advanced tools such as a resume parsing algorithm and
                                descriptive analytics to match job seekers with suitable positions effectively. The
                                platform ensures accessibility through features like text-to-speech and screen readers,
                                catering to various disabilities. It also enables employers and government agencies to
                                manage job postings and track application statuses, thereby fostering an inclusive and
                                efficient job market.</p>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <i class="fas fa-user-md" style="font-size: 100px;"></i>
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Job Matching</strong></h5>
                                                <p>Utilizes a resume parsing algorithm to match PWDs with suitable job
                                                    openings based on their skills, experience, and type of disability,
                                                    aligning job seekers with appropriate opportunities.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <i class="fas fa-chart-bar" style="font-size: 100px;"></i>
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Descriptive Analytics</strong></h5>
                                                <p>Integrates descriptive analytics to monitor and analyze employment
                                                    trends, helping employers and government agencies gauge demand and
                                                    inclusivity in recruitment strategies.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <div class="lc-block text-center">
                                                <i class="fas fa-globe" style="font-size: 100px;"></i>
                                            </div>
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Accessibility Features</strong></h5>
                                                <p>Offers accessibility features such as text-to-speech, screen readers,
                                                    and customizable UI options like font size and contrast adjustments,
                                                    enhancing usability for various impairments.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="bg-light" style="background-color:#f7fbfe">
        <div class="container py-6">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="lc-block text-center">
                        <div editable="rich">
                            <h2 class="display-5 fw-bold">BENEFITS FOR DIFFERENT USERS</h2>
                        </div>
                    </div><!-- /lc-block -->
                </div>
            </div>

            <div class="container py-4 py-lg-2">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="lc-block px-4">
                            <div class="position-relative">
                                <div class="lc-block position-absolute top-0 end-0 w-100 h-100 bg-dark mt-4 me-4">
                                </div>

                                <img class="position-relative img-fluid" src="images/first10.webp" width="1080"
                                    height="1080" alt="Photo by Spacejoy" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="lc-block mb-4">
                            <div editable="rich">

                                <h4 class="fw-bold display-5">FOR JOBSEEKERS</h4>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4 overflow-hidden position-relative">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Easy Job Search: AccessiJobs makes it easy to find jobs. You can quickly find
                                        jobs that are a good match for your skills and needs..</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Better Job Choices: We work with employers who value diversity and offer
                                        supportive workplaces, so you have better job options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Help and Tools: We provide help and tools for you during your job search,
                                        including help with writing resumes and preparing for interviews.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container py-4 py-lg-6">
                <div class="row align-items-center flex-lg-row-reverse">
                    <div class="col-lg-6 mb-5 mb-lg-0 ">
                        <div class="lc-block px-4">
                            <div class="position-relative">
                                <div class="lc-block position-absolute top-0 start-0 w-100 h-100 bg-dark mt-4 ms-4">
                                </div>

                                <img class="position-relative img-fluid" src="images/first11.webp" width="1080"
                                    height="1080" alt="Photo by Spacejoy" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="lc-block mb-4">
                            <div editable="rich">

                                <h4 class="fw-bold display-5">FOR EMPLOYERS</h4>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4 overflow-hidden position-relative">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Diverse Candidates: You get to find and hire from a diverse group of talented
                                        people who can bring new ideas and skills to your company.</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Insights on Job Posts: Use our tools to see how your job posts are doing and
                                        learn more about the people applying for jobs. This information can help you
                                        make better hiring decisions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Help with Job Ads: We help you write job ads that attract the right candidates
                                        and meet accessibility standards.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-4 py-lg-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="lc-block px-4">
                            <div class="position-relative">
                                <div class="lc-block position-absolute top-0 end-0 w-100 h-100 bg-dark mt-4 me-4">
                                </div>

                                <img class="position-relative img-fluid" src="images/first12.webp" width="1080"
                                    height="1080" alt="Photo by Spacejoy" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="lc-block mb-4">
                            <div editable="rich">

                                <h4 class="fw-bold display-5">FOR ADMINISTRATORS</h4>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4 overflow-hidden position-relative">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Track Employment Trends: Our platform helps you see how well job opportunities
                                        and regulations for people with disabilities are working.</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Make Sure Rules are Followed: Work with us to make sure employers are following
                                        laws that help make jobs accessible to everyone.</p>
                                </div>
                            </div>
                        </div>
                        <div class="lc-block d-sm-flex align-items-center mb-4">
                            <div class="d-inline-flex">
                                <div>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="ms-3 align-self-center" editable="rich">
                                    <p>Use Resources Wisely: Use information from our platform to better understand and
                                        support the job market for people with disabilities.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section>

            <div class="step-section">
                <div class="container py-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="lc-block text-center">
                                <div editable="rich">
                                    <h2 id="how-it-works" class="display-5 fw-bold">How AccessiJobs Works: A Simple
                                        Four-Step Guide</h2>
                                </div>
                            </div><!-- /lc-block -->
                        </div>
                    </div>
                    <div class="container overflow-hidden py-1">
                        <div class="row align-items-center justify-content-center my-1">
                            <div class="col-8 col-lg-3 order-lg-2 offset-lg-1 mb-4 mb-lg-0">
                                <div class="lc-block">
                                    <img style="transform:scale(1.2)" class="img-fluid py-4 wp-image-1949"
                                        src="images/first13.webp" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 order-lg-1 position-relative py-lg-5 my-4">
                                <div class="lc-block col-3 col-lg-12 mx-auto bg-light rounded-circle d-flex justify-content-center align-items-center shadow"
                                    style="aspect-ratio:1/1;">
                                    <h2 editable="inline" class="h1"><strong>1</strong></h2>
                                </div>
                                <div
                                    class="d-none d-lg-block lc-block d-flex justify-content-center align-items-center position-absolute start-50 h-100 border-end">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-lg-3 offset-lg-1 text-center text-lg-start">
                                <div class="lc-block mb-4">
                                    <div editable="rich">
                                        <h2>Step 1: Sign Up</h2>
                                    </div>
                                </div>
                                <div class="lc-block">
                                    <div editable="rich">
                                        <p class="text-muted lead">Job Seekers and Employers create their profiles. Job
                                            seekers fill in their skills, experiences, and what kind of job they're
                                            looking for. Employers post details about job openings and the
                                            qualifications they need.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center my-5">
                            <div class="col-8 col-lg-3 order-lg-2 offset-lg-1 mb-4 mb-lg-0">
                                <div class="lc-block">
                                    <img style="transform:scale(1.2)" class="img-fluid py-4 wp-image-1948"
                                        src="images/first14.webp" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 order-lg-1 position-relative py-lg-5 my-4">
                                <div class="lc-block col-3 col-lg-12 mx-auto bg-light rounded-circle d-flex justify-content-center align-items-center shadow"
                                    style="aspect-ratio:1/1;">
                                    <h2 editable="inline" class="h1"><b>2</b></h2>
                                </div>
                                <div
                                    class="d-none d-lg-block lc-block d-flex justify-content-center align-items-center position-absolute start-50 h-100 border-end">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-lg-3 offset-lg-1 text-center text-lg-start">
                                <div class="lc-block mb-4">
                                    <div editable="rich">
                                        <h2>Step 2: Matchmaking</h2>
                                    </div>
                                </div>
                                <div class="lc-block">
                                    <div editable="rich">
                                        <p class="text-muted lead">The AccessiJobs system uses advanced algorithms to
                                            match job seekers with suitable job openings based on their profiles and job
                                            preferences. This ensures that employers receive applications from
                                            candidates who truly fit their requirements.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center my-5">
                            <div class="col-8 col-lg-3 order-lg-2 offset-lg-1 mb-4 mb-lg-0">
                                <div class="lc-block">
                                    <img style="transform:scale(1.2)" class="img-fluid py-4 wp-image-1958"
                                        src="images/first15.webp" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 order-lg-1 position-relative py-lg-5 my-4">
                                <div class="lc-block col-3 col-lg-12 mx-auto bg-light rounded-circle d-flex justify-content-center align-items-center shadow"
                                    style="aspect-ratio:1/1;">
                                    <h2 editable="inline" class="h1"><b>3</b></h2>
                                </div>
                                <div
                                    class="d-none d-lg-block lc-block d-flex justify-content-center align-items-center position-absolute start-50 h-100 border-end">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-lg-3 offset-lg-1 text-center text-lg-start">
                                <div class="lc-block mb-4">
                                    <div editable="rich">
                                        <h2>Step 3: Connect

                                        </h2>
                                    </div>
                                </div>
                                <div class="lc-block">
                                    <div editable="rich">
                                        <p class="text-muted lead">Once a match is made, job seekers can apply to the
                                            job, and employers can view their profiles. If interested, employers can
                                            initiate contact with job seekers to discuss the job opportunity further.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center my-5">
                            <div class="col-8 col-lg-3 order-lg-2 offset-lg-1 mb-4 mb-lg-0">
                                <div class="lc-block">
                                    <img style="transform:scale(1.2)" class="img-fluid py-4 wp-image-1961"
                                        src="images/first16.webp" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 order-lg-1 position-relative py-lg-5 my-4">
                                <div class="lc-block col-3 col-lg-12 mx-auto bg-light rounded-circle d-flex justify-content-center align-items-center shadow"
                                    style="aspect-ratio:1/1;">
                                    <h2 editable="inline" class="h1"><b>4</b></h2>
                                </div>
                                <div
                                    class="d-none lc-block d-flex justify-content-center align-items-center position-absolute start-50 h-100 border-end">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-lg-3 offset-lg-1 text-center text-lg-start">
                                <div class="lc-block mb-4">
                                    <div editable="rich">
                                        <h2>Step 4: Employment

                                        </h2>
                                    </div>
                                </div>
                                <div class="lc-block">
                                    <div editable="rich">
                                        <p class="text-muted lead">After successful interviews and evaluations,
                                            employers offer the job to the chosen candidate. Both parties can then
                                            proceed with the hiring and onboarding process.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- lc-needs-hard-refresh -->
        <div class="container py-6">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h2 class="fw-bold display-3">Employment Statistics for Disabilities as of April 2024</h2>
                        </div>
                    </div>
                    <div class="lc-block">
                        <div editable="rich">
                            <p>As of April 2024, here are the top four employable types of disabilities that AccessiJobs
                                will cater to and focus on improving accessibility in our system. This data serves as
                                proof of the employment potential within these disability categories:</p>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <div class="col-xl-6 row row-cols-1 row-cols-md-2 g-3 counter-RANDOMID">
                    <div class="col">
                        <div class="card card-body shadow border-0">
                            <div class="d-inline-flex align-items-center" style="min-height:196px">
                                <div class="me-2">
                                    <div class="bg-light p-4 rounded-circle" id="bgcontainer">
                                        <i class="fas fa-eye fa-3x"></i> <!-- fa-3x makes the icon 3 times larger -->
                                    </div>
                                </div>

                                <div>
                                    <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0"
                                        data-end-at="119" data-time="1000" data-delay="60" data-format="{}"> </span>
                                    <p class="lead" editable="inline"><b>Visual Disabilities</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-body shadow border-0">
                            <div class="d-inline-flex align-items-center" style="min-height:196px">
                                <div class="me-2">
                                    <div class="bg-light p-4 rounded-circle" id="bgcontainer">
                                        <i class="fas fa-brain fa-3x"></i> <!-- Adjust the size as needed -->
                                    </div>
                                </div>

                                <div>
                                    <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0"
                                        data-end-at="484" data-time="1000" data-delay="60" data-format="{}"> </span>
                                    <p class="lead" editable="inline"><b>Psychosocial Disabilities</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-body shadow border-0">
                            <div class="d-inline-flex align-items-center" style="min-height:196px">
                                <div class="me-2">
                                    <div class="bg-light p-4 rounded-circle" id="bgcontainer">
                                        <i class="fas fa-wheelchair fa-3x"></i> <!-- Adjust the size as needed -->
                                    </div>
                                </div>

                                <div>
                                    <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0"
                                        data-end-at="535" data-time="1000" data-delay="60" data-format="{}"> </span>
                                    <p class="lead" editable="inline"><b>Physical Disabilities</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-body shadow border-0">
                            <div class="d-inline-flex align-items-center" style="min-height:196px">
                                <div class="me-2">
                                    <div class="bg-light p-4 rounded-circle" id="bgcontainer">
                                        <i class="fas fa-deaf fa-3x"></i> <!-- Adjust the size as needed -->
                                    </div>

                                </div>
                                <div>
                                    <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="1000"
                                        data-end-at="138" data-time="1000" data-delay="0" data-format="{}"> </span>
                                    <p class="lead" editable="inline"><b>Deaf/Hard of Hearing</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-light">
            <div class="container py-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="lc-block text-center">
                            <div editable="rich">
                                <h2 class="display-5 fw-bold">April 2024 Unemployment Stats for PWDs</h2>
                                <p editable="inline" style="font-size: 19px; line-height: 1.9;">This infographic
                                    presents the unemployment statistics for April 2024, focusing on the top four types
                                    of disabilities that are employable yet face significant employment challenges. It
                                    emphasizes the urgent need for targeted support to reduce unemployment rates among
                                    these groups, thereby enhancing their inclusion in the workforce.<br></p>
                            </div><!-- /lc-block -->
                        </div>
                    </div>
                </div>
                <div class="container py-2">
                    <div class="row rounded text-center py-4 g-4 bg-light counter-RANDOMID">
                        <div class="col-6 col-lg-3">
                            <div class="d-flex justify-content-center mb-2">
                                <!-- Icon for Visual Disabilities -->
                                <i class="fas fa-eye fa-3x"></i>
                            </div>

                            <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0"
                                data-end-at="211" data-time="1000" data-delay="60" data-format="{}"> </span>
                            <p class="lead" editable="inline"><b>Visual Disabilities Unemployed</b></p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="d-flex justify-content-center mb-2">
                                <!-- Icon for Psychosocial Disabilities -->
                                <i class="fas fa-brain fa-3x"></i>
                            </div>

                            <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="100"
                                data-end-at="709" data-time="200" data-delay="60" data-format="{}"> </span>
                            <p class="lead" editable="inline"><b>Psychosocial Disabilities Unemployed</b></p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="d-flex justify-content-center mb-2">
                                <!-- Icon for Physical Disabilities -->
                                <i class="fas fa-wheelchair fa-3x"></i>
                            </div>

                            <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="200"
                                data-end-at="1375" data-time="2000" data-delay="60" data-format="{}"> </span>
                            <p class="lead" editable="inline"><b>Physical Disabilities Unemployed</b></p>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="d-flex justify-content-center mb-2">
                                <!-- Icon for Deaf/Hard of Hearing -->
                                <i class="fas fa-deaf fa-3x"></i>
                            </div>

                            <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="1800"
                                data-end-at="254" data-time="1000" data-delay="0" data-format="{}"> </span>
                            <p class="lead" editable="inline"><b>Deaf/Hard of Hearing Unemployed</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="bg-light">
            <div class="container py-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="lc-block text-center">
                            <div editable="rich">
                                <h2 class="display-5 fw-bold">Why Use AccessiJobs?</h2>
                            </div>
                        </div><!-- /lc-block -->
                    </div>
                </div>
                <div class="row mb-3 text-center row-cols-1 row-cols-sm-3">
                    <div class="col mb-3">
                        <div class="card border-0  shadow-lg">
                            <div class="card-body">
                                <div class="lc-block mb-5">
                                    <div class="bg-light rounded p-3 text-success"
                                        style="justify-content: center; align-items: center;">
                                        <i class="fas fa-briefcase fa-3x"></i>
                                    </div>
                                </div>
                                <div class="lc-block mb-3">
                                    <div editable="rich">
                                        <h2 class="h4">Tailored Job Matching</h2>
                                    </div>
                                </div>
                                <div class="lc-block mb-5">
                                    <div editable="rich">
                                        <p> Our advanced matching technology considers your skills, experience, and
                                            accessibility needs to connect you with the best job opportunities. We
                                            ensure that every job match supports both your career goals and personal
                                            requirements.</p>
                                    </div>
                                </div><!-- /lc-block -->
                            </div>
                        </div>
                    </div><!-- /col -->
                    <div class="col mb-3">
                        <div class="card border-0  shadow-lg ">
                            <div class="card-body">
                                <div class="lc-block mb-5">

                                    <div class="bg-light rounded p-3 text-success"
                                        style="justify-content: center; align-items: center;">
                                        <i class="fas fa-wheelchair fa-3x"></i>
                                    </div>

                                </div>
                                <div class="lc-block mb-3">
                                    <div editable="rich">

                                        <h2 class="h4">Accessibility at Its Core</h2>


                                    </div>
                                </div>
                                <div class="lc-block mb-5">
                                    <div editable="rich">

                                        <p>The platform is designed with accessibility as a priority. Whether you need
                                            text-to-speech services, screen reader compatibility, or other
                                            accommodations, AccessiJobs makes your job search easier and more effective.
                                        </p>
                                    </div>
                                </div><!-- /lc-block -->
                            </div>
                        </div>
                    </div><!-- /col -->
                    <div class="col mb-3">
                        <div class="card border-0  shadow-lg">
                            <div class="card-body">
                                <div class="lc-block mb-5">
                                    <div class="bg-light rounded p-3 text-success"
                                        style="justify-content: center; align-items: center;">
                                        <i class="fas fa-users fa-3x"></i>
                                    </div>

                                </div>
                                <div class="lc-block mb-3">
                                    <div editable="rich">
                                        <h2 class="h4">Community and Networking</h2>

                                    </div>
                                </div>
                                <div class="lc-block mb-5">
                                    <div editable="rich">

                                        <p>Join a community of like-minded professionals and gain access to networking
                                            events, workshops, and seminars that can open doors to new opportunities and
                                            enhance your career path.</p>
                                    </div>
                                </div><!-- /lc-block -->
                            </div>
                        </div>
                    </div><!-- /col -->
                </div>
        </section>
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
                        <!-- /lc-block -->
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
                        <div class="lc-block small mt-6">
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
        function initializeCounterRANDOMID() {

            const observer = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    //console.log(entry);
                    VanillaCounter();
                });
            }, {});

            observer.observe(document.querySelector('.counter-RANDOMID'));
        }

        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.head-section .navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) { // Adjust this value based on when you want the effect to trigger
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });



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

            if (currentTheme === 'dark') {
                themeSwitch.checked = true;
                logoImage.src = logoImage.getAttribute('data-dark');
                console.log('Switching to dark theme on load');
            } else {
                themeSwitch.checked = false;
                logoImage.src = logoImage.getAttribute('data-light');
                console.log('Switching to light theme on load');
            }

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
            const carousel = document.getElementById('myCarousel');
            const typedTexts = [
                'Empowering Job Seekers with Disabilities',
                'Accessible and Inclusive Job Search',
                'Transforming Employment Opportunities'
            ];
            let currentTyped;

            function initTyped(index) {
                const options = {
                    strings: [typedTexts[index]],
                    typeSpeed: 50,
                    backSpeed: 25,
                    loop: false,
                    showCursor: true,
                    cursorChar: '|',
                    onComplete: (self) => {
                        self.cursor.remove();
                    }
                };

                const typedElement = carousel.querySelectorAll('.typed-text')[index];
                currentTyped = new Typed(typedElement, options);
            }

            // Initialize the first slide
            initTyped(0);

            // Handle slide change
            carousel.addEventListener('slide.bs.carousel', function(e) {
                if (currentTyped) {
                    currentTyped.destroy();
                }
                initTyped(e.to);
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            // Define the callback function for when the element intersects
            const fadeInOnScroll = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            };

            const observer = new IntersectionObserver(fadeInOnScroll, {
                threshold: 0.1
            });

            // Target elements for observation
            document.querySelectorAll('p, li, h2, h1, button, a,.logoimage,label,input, select, span, i').forEach(
                element => {
                    observer.observe(element);
                });
        });

        const scrollUpBtn = document.getElementById('scrollUpBtn');
        window.onscroll = function() {
            // Show button when scrolled down more than 100px
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollUpBtn.classList.add('visible'); // Add class to show
            } else {
                scrollUpBtn.classList.remove('visible'); // Remove class to hide
            }
        };

        // Smooth scroll to top when button is clicked
        scrollUpBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>

</html>
