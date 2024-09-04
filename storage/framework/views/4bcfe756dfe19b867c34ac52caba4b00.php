<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Welcome</title>
    <link rel="icon" href="<?php echo e(asset('/images/first17.png')); ?>" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link rel="stylesheet" href="/css/Homepage.css">
    <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="preload" href="images/lightnavbarlogo.png" as="image">
    <link rel="preload" href="images/darknavbarlogo.png" as="image">
    <link rel="preload" href="images/team.png" as="image">


    <script defer="" src="https://unpkg.com/vanilla-counter" onload="initializeCounterRANDOMID()"></script>
</head>


<body>
    <header class="hero-section">
        <div class="head-section">
            <nav class="navbar navbar-expand-lg py-2 navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="">
                        <img id="logoImage" src="images/lightnavbarlogo.png" data-light="images/lightnavbarlogo.png"
                            data-dark="images/darknavbarlogo.png" width="200" height="200"
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
                                    <a href="<?php echo e(route('welcome')); ?>" class="nav-link underline-on-hover">
                                        <i class="fas fa-home"></i> HOME
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="<?php echo e(route('findjobs')); ?>" class="nav-link underline-on-hover">
                                        <i class="fas fa-briefcase"></i> FIND JOBS
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="<?php echo e(route('aboutus')); ?>" class="nav-link underline-on-hover">
                                        <i class="fas fa-info-circle"></i> ABOUT US
                                    </a>
                                </li>
                                <li id="menu-item-aboutus"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                                    <a href="<?php echo e(route('faq')); ?>" class="nav-link underline-on-hover">
                                        <i class="fas fas fa-question-circle"></i> FAQ
                                    </a>
                                </li>
                                <li id="menu-item-contact"
                                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                                    <a href="<?php echo e(route('contact')); ?>" class="nav-link underline-on-hover">
                                        <i class="fas fa-envelope"></i> CONTACT
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="lc-block ms-auto d-grid gap-2 d-lg-block">
                            <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->usertype == 'admin'): ?>
                                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-custom-login" role="button"
                                            aria-label="Admin Dashboard">
                                            <i class="fas fa-tachometer-alt" id="customicon"></i> Admin Dashboard
                                        </a>
                                    <?php elseif(Auth::user()->usertype == 'employer'): ?>
                                        <a href="<?php echo e(route('employer.dashboard')); ?>" class="btn btn-custom-login"
                                            role="button" aria-label="Employer Dashboard">
                                            <i class="fas fa-building" id="customicon"></i> Employer Dashboard
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-custom-login" role="button"
                                            aria-label="Dashboard">
                                            <i class="fas fa-user"></i> Dashboard
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="d-flex flex-column flex-md-row justify-content-center">
                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-custom-login m-1" role="button"
                                            aria-label="Login">
                                            <i class="fas fa-sign-in-alt"></i> LOG IN
                                        </a>

                                        <?php if(Route::has('register')): ?>
                                            <a href="<?php echo e(route('register')); ?>" class="btn btn-custom-signup m-1"
                                                role="button" aria-label="Register Now">
                                                <i class="fas fa-user-plus"></i> SIGNUP
                                            </a>
                                        <?php endif; ?>
                                    </div>


                                <?php endif; ?>
                            <?php endif; ?>

                            <label class="ui-switch position-fixed bg-light p-3 rounded-circle shadow"
                                style="bottom: 20px; right: 20px;">
                                <input type="checkbox" id="themeSwitch">
                                <div class="slider">
                                    <i class="fas fa-adjust"></i>
                                </div>
                            </label>

                            <script>
                                // Function to toggle dark mode
                                function toggleDarkMode() {
                                    const themeSwitch = document.getElementById('themeSwitch');
                                    const darkMode = themeSwitch.checked;
                                    localStorage.setItem('darkMode', darkMode);
                                    applyTheme(darkMode);
                                }

                                // Function to apply the theme
                                function applyTheme(darkMode) {
                                    if (darkMode) {
                                        document.body.classList.add('dark-mode');
                                        // Add your dark mode styles here
                                    } else {
                                        document.body.classList.remove('dark-mode');
                                        // Remove your dark mode styles here
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
                        <img class="full-screen-img" src="images/governance.jpg" alt="Governance Image">
                        <div class="overlay"></div>
                    </div>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="underlined-heading">Empowering Job Seekers with Disabilities</h1>

                            <p style="line-height: 1.9; ">Discover our innovative job search platform designed
                                specifically for persons with <br>
                                disabilities in Mandaluyong City, featuring advanced resume parsing and descriptive <br>
                                analytics to enhance job accessibility and inclusivity.</p>
                            <p><a class="btn btn-lg btn-primary" href="#how-it-works">How it
                                    Works?</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="full-screen-img" src="images/governance2.jpg" alt="Governance Image">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="underlined-heading">Accessible and Inclusive Job Search</h1>
                            <p style="line-height: 1.9;">Our platform offers secure login, accessibility options, a
                                resume parser subsystem, <br>
                                a PWD-friendly dashboard, employer functionalities, and real-time notifications, <br>
                                all tailored to meet the unique needs of job seekers with disabilities.</p>
                            <p><a class="btn btn-lg btn-primary " href=<?php echo e(route('aboutus')); ?>>Learn
                                    more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="full-screen-img" src="images/governance3.png" alt="Governance Image">
                    <div class="overlay"></div>
                    </video>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1 class="underlined-heading">Transforming Employment Opportunities</h1>
                            <p style="line-height: 1.9;">By addressing the employment barriers faced by persons with
                                disabilities and <br>
                                implementing comprehensive accessibility features, our platform aims to significantly
                                <br>improve job matching success rates and overall user satisfaction.
                            </p>
                            <p><a class="btn btn-lg btn-primary" href=<?php echo e(route('login')); ?>>Get
                                    Started</a></p>
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

        <section class="section-1 py-5 " id="popularbg">
            <div class="container">
                <h2 class=" fw-bold" id="designedheader">Find Jobs</h2>
                <br>
                <div class="card border-0 shadow p-5">
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
                                    <a href="<?php echo e(route('findjobs')); ?>" class="btn btn-primary btn-block">
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
                    <div class="container ">
                        <div class="row">
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-xl-3 col-md-6 d-flex align-items-stretch">
                                    <div class="single_catagory shadow rounded flex-grow-1 d-flex flex-column ">
                                        <a href="<?php echo e(route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id])); ?>"
                                            class="text-decoration-none">
                                            <h4 class="pb-2"><?php echo e($job->company_name); ?></h4>
                                        </a>
                                        <p class="mb-0"><span><?php echo e($job->location); ?></span></p>
                                        <p class="mb-0">
                                            <span><?php echo e($totalVacanciesPerCompany[$job->company_name] ?? 'N/A'); ?>

                                                job positions given</span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                <img src="/images/First2.png" class="img-fluid" />
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
                                        <?php $__currentLoopData = $featuredjobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <div class="card border-0 p-3 shadow mb-4 ">
                                                    <div class="card-body">
                                                        <h3 class="border-0 fs-5 pb-2 mb-0"><?php echo e($job->title); ?></h3>
                                                        <p>We are in need of a <?php echo e($job->title); ?> for our company.</p>
                                                        <div class="bg-light p-3 border rounded">
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-map-marker"></i></span>
                                                                <span class="ps-1"><?php echo e($job->location); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-clock"></i></span>
                                                                <span class="ps-1"><?php echo e($job->job_type); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i
                                                                        class="fa fa-usd"></i></span>
                                                                <span
                                                                    class="ps-1"><?php echo e($job->educational_level); ?></span>
                                                            </p>
                                                        </div>

                                                        <div class="d-grid mt-3">
                                                            <a href="<?php echo e(route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id])); ?>"
                                                                class="btn btn-primary btn-lg">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                                            <img class="img-fluid" src="images/First4.png">
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
                                            <img class="img-fluid" src="images/First8.png">
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
    </div>




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

                                <img class="position-relative img-fluid" src="images/first10.png" width="1080"
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

                                <img class="position-relative img-fluid" src="images/first11.png" width="1080"
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

                                <img class="position-relative img-fluid" src="images/first12.png" width="1080"
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
                                        src="images/first13.png" alt="">
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
                                        src="images/first14.png" alt="">
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
                                        src="images/first15.png" alt="">
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
                                        src="images/first16.png" alt="">
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
                        <div class="card border-0">
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
                        <div class="card border-0 ">
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
                        <div class="card border-0">
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
                            <img class="img-fluid" alt="logo" src="/images/darknavbarlogo.png"
                                style="max-height:10vh">
                        </div>
                        <div class="lc-block small">
                            <div editable="rich">
                                <p>AccessiJobs is dedicated to creating inclusive employment opportunities for
                                    persons
                                    with disabilities. Our platform connects talented individuals with employers who
                                    value diversity and inclusion. Stay updated with our latest news and join our
                                    community on social media to be a part of the change. Follow us on Facebook,
                                    Twitter, Instagram, and LinkedIn.</p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block py-2">
                            <a class="text-decoration-none" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="1em"
                                    height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                    <path
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-decoration-none" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"
                                    height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                    <path
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-decoration-none" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em"
                                    height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-decoration-none" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="1em"
                                    height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                    <path
                                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-decoration-none" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em"
                                    height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                    <path
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg>
                            </a>
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
                                <p><i class="fas fa-home" style="margin-right: 8px;"></i> Home</p>
                                <p><i class="fas fa-briefcase" style="margin-right: 8px;"></i> Find Jobs</p>
                                <p><i class="fas fa-info-circle" style="margin-right: 8px;"></i> About Us</p>
                                <p><i class="fas fa-question-circle" style="margin-right: 8px;"></i> FAQ</p>

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
                                <p><i class="fas fa-life-ring" style="margin-right: 8px;"></i> Ask For Support</p>
                                <p><a href="https://www.facebook.com/PDADMandaluyong" target="_blank"
                                        class="text-white" style="text-decoration: none;">
                                        <i class="fab fa-facebook" style="margin-right: 8px;"></i> Facebook
                                    </a></p>

                                
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
                                <p><i class="fas fa-map-marker-alt"></i> Mandaluyong City Hall, Maysilo Circle,
                                    Mandaluyong, Metro Manila, Philippines</p>
                                <p><i class="fas fa-phone-alt"></i> (02) 8532 5001</p>
                                <p><i class="fas fa-clock"></i> Open Hours of Government: Mon-Fri: 7:00 am - 5:00pm
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
    </script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/welcomepage.blade.php ENDPATH**/ ?>