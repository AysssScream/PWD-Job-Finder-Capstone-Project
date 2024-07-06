<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link rel="stylesheet" href="/css/Homepage.css">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('/css/Homepage.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="preload" href="images/lightnavbarlogo.png" as="image">
    <link rel="preload" href="images/darknavbarlogo.png" as="image">
    <link rel="preload" href="images/team.png" as="image">
    <link rel="preload" href="images/1bg.mp4" as="video" type="video/mp4">
    <link rel="preload" href="images/2bg.mp4" as="video" type="video/mp4">
    <link rel="preload" href="images/3bg.mp4" as="video" type="video/mp4">

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
        {{-- <div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="lc-block text-center col-md-8">
                    <div editable="rich">
                        <h1 class="rfs-25 fw-bold">WELCOME TO ACCESSIJOBS</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="lc-block text-center col-xxl-6 col-md-8">
                    <div editable="rich">
                        <p class="lead" style="line-height: 1.9;">ACCESSIJOBS makes job searching easy for people with
                            disabilities. Our platform helps you find jobs that are just right for you. We have tools
                            that understand your needs and connect you with employers who are excited to meet you. Join
                            us and start finding great job opportunities today!</p>
                    </div>
                </div><!-- /lc-block -->
                <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->usertype == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-black btn-lg px-4 gap-3"
                                    role="button" aria-label="Admin Dashboard">Get Started</a>
                            @elseif (Auth::user()->usertype == 'employer')
                                <a href="{{ route('employer.dashboard') }}" class="btn btn-black btn-lg px-4 gap-3"
                                    role="button" aria-label="Employer Dashboard">Get Started</a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="btn btn-black btn-lg px-4 gap-3" role="button"
                                    aria-label="Dashboard">Get Started</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-black btn-lg px-4 gap-3" role="button"
                                aria-label="Login">Get Started</a>
                        @endauth
                    @endif <a class="btn btn-white btn-lg px-4" href="#how-it-works"
                        role="button">How it Works?</a>
                </div>

            </div>
        </div> --}}

        {{--  <div class="position-relative overflow-hidden">
            <div class="d-flex min-vh-100">
                <video class="position-absolute w-100 h-100" style="object-fit: cover; object-position: 50% 50%;"
                    autoplay muted loop playsinline>
                    <source src="/images/12345.mp4" type="video/mp4">
                </video>
                <div class="container position-absolute top-50 start-50 translate-middle text-center text-light">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h1 class="display-1 fw-bolder">WELCOME TO ACCESSIJOBS</h1>
                            <p class="lead" style="line-height: 1.9;">ACCESSIJOBS makes job searching easy for people
                                with disabilities. Our platform helps you find jobs that are just right for you. We have
                                tools that understand your needs and connect you with employers who are excited to meet
                                you. Join us and start finding great job opportunities today!</p>
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                                <a class="btn btn-custom btn-lg px-4 gap-3" href="#" role="button">Get
                                    Started</a>
                                <a class="btn btn-custom btn-lg px-4" href="#" role="button">How it Works?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


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
                    <video class="bd-placeholder-img" autoplay loop muted playsinline>
                        <source src="images/1bg.mp4" type="video/mp4">
                    </video>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 style="font-weight: bold; line-height: 1.9;">Empowering Job Seekers with Disabilities
                            </h1>
                            <p style="line-height: 1.9; ">Discover our innovative job search platform designed
                                specifically for persons with <br>
                                disabilities in Mandaluyong City, featuring advanced resume parsing and descriptive <br>
                                analytics to enhance job accessibility and inclusivity.</p>
                            <p><a class="btn btn-lg btn-primary btn-black-white" href="#how-it-works">How it
                                    Works?</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <video class="bd-placeholder-img" autoplay loop muted playsinline>
                        <source src="/images/2bg.mp4" type="video/mp4">
                    </video>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="font-weight: bold; line-height: 1.9;">Accessible and Inclusive Job Search</h1>
                            <p style="line-height: 1.9;">Our platform offers secure login, accessibility options, a
                                resume parser subsystem, <br>
                                a PWD-friendly dashboard, employer functionalities, and real-time notifications, <br>
                                all tailored to meet the unique needs of job seekers with disabilities.</p>
                            <p><a class="btn btn-lg btn-primary btn-black-white" href={{ route('aboutus') }}>Learn
                                    more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <video class="bd-placeholder-img" autoplay loop muted playsinline>
                        <source src="/images/3bg.mp4" type="video/mp4">
                    </video>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1 style="line-height: 1.9; font-weight: bold;">Transforming Employment Opportunities</h1>
                            <p style="line-height: 1.9;">By addressing the employment barriers faced by persons with
                                disabilities and <br>
                                implementing comprehensive accessibility features, our platform aims to significantly
                                <br>improve job matching success rates and overall user satisfaction.
                            </p>
                            <p><a class="btn btn-lg btn-primary btn-black-white" href={{ route('login') }}>Get
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

        <section class="section-1 py-5 ">
            <div class="container">
                <h2 class=" fw-bold" id="designedheader">Find Jobs</h2>
                <br>
                <div class="card border-0 shadow p-5">
                    <div class="row pt-2">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Keywords">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Location">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>
                                <option value="">Engineering</option>
                                <option value="">Accountant</option>
                                <option value="">Information Technology</option>
                                <option value="">Fashion designing</option>
                            </select>
                        </div>

                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <a href="jobs.html" class="btn btn-primary btn-block">Search Job</a>
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
                    <div class="col-lg-4 col-xl-3 col-md-6 ">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Design &amp; Creative</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Finance</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Banking</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Data Science</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Marketing</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Digital Marketing</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow  rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Digital Marketing</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory shadow rounded">
                            <a href="jobs.html">
                                <h4 class="pb-2">Digital Marketing</h4>
                            </a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main class="mt-5">
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
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4 ">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                                    <p>We are in need of a Web Developer for our company.</p>
                                                    <div class="bg-light p-3 border rounded">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">Noida</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i
                                                                    class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">Remote</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">2-3 Lacs PA</span>
                                                        </p>
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="job-detail.html"
                                                            class="btn btn-primary btn-lg">Details</a>
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
                <div class="second-section mt-4">
                    <section class="bg-light">
                        <div class="container py-6">
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
                </section>
    </header>

    <br>
    <br>

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
                                    {{-- <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <img class="img-fluid"
                                                src="https://cdn.livecanvas.com/media/svg/undraw-sample/undraw_steps_ngvm.svg"
                                                style="height:100px;">
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Employer Interface</strong></h5>
                                                <p>Provides tools for employers to post job vacancies, manage
                                                    applications, and connect with PWD candidates, including access to
                                                    job post analytics.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <img class="img-fluid"
                                                src="https://cdn.livecanvas.com/media/svg/undraw-sample/undraw_video_influencer_9oyy.svg"
                                                style="height:100px;">
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Government Interface</strong></h5>
                                                <p>Allows government agencies to access job market trends and assess the
                                                    effectiveness of employment policies for PWDs, managing resources to
                                                    improve job prospects.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-3 me-lg-4 rounded my-4 p-3 card-enhanced">
                                        <div class="lc-block text-center">
                                            <img class="img-fluid"
                                                src="https://cdn.livecanvas.com/media/svg/undraw-sample/undraw_Mobile_application_mr4r.svg"
                                                style="height:100px;">
                                        </div>
                                        <div style="padding:30px" class="lc-block rounded text-center">
                                            <div editable="rich">
                                                <h5><strong>Feedback Mechanism</strong></h5>
                                                <p>The feedback mechanism in AccessiJobs is designed for employers to
                                                    provide updates on the hiring status of applicants, such as
                                                    indicating if an employee is hired or under review. This helps keep
                                                    the communication transparent and efficient between employers and
                                                    job seekers.&nbsp;</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <section class="bg-light">
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
        {{-- <div class="faq-section">

            <section class="pb-6">
                <div class="container pt-5 my-4 rounded">

                    <div class="row justify-content-center text-center mb-4">

                        <div class="lc-block col-xl-8">
                            <h1 editable="inline" class="fw-bold display-5">FAQ</h1>
                        </div><!-- /lc-block -->

                    </div>
                    <div class="row justify-content-center text-center mb-4">

                        <div class="lc-block col-xl-8">
                            <div editable="rich">
                                <p class="text-muted rfs-8">Welcome to our FAQ section, where we provide answers to
                                    your most common questions about AccessiJobs. Here, you’ll find information on
                                    everything from how to use our platform to the specialized services we offer for
                                    persons with disabilities and employers alike. Our goal is to ensure that all your
                                    inquiries are addressed, making your experience as smooth and productive as
                                    possible. If you have any questions that are not covered here, please don’t hesitate
                                    to contact us directly.</p>
                            </div>
                        </div><!-- /lc-block -->

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-xxl-8">
                            <div class="lc-block">
                                <div class="accordion accordion-flush" id="accordionFlushMyFAQ2">
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow">

                                        <a editable="inline"
                                            class="fw-bold text-decoration-none text-dark h4 collapsed" href=""
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            How does AccessiJobs tailor job searches for PWDs?
                                        </a>

                                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">AccessiJobs utilizes advanced
                                                descriptive analytics and resume parsing technology to match persons
                                                with disabilities (PWDs) with suitable job opportunities. Our platform
                                                analyzes your skills, experience, and specific disability requirements
                                                to find jobs that not only match your qualifications but also
                                                accommodate your individual needs, ensuring an optimal work environment
                                                for your success.<p><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a
                                            editable="inline" class="fw-bold text-decoration-none text-dark h4"
                                            href="" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            What types of disabilities does AccessiJobs support?
                                        </a>

                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">AccessiJobs is designed to
                                                support a wide range of disabilities, including but not limited to
                                                visual, psychosocial, and physical disabilities. We also cater to
                                                individuals who are deaf or hard of hearing. Each disability category
                                                benefits from tailored features on our platform, such as text-to-speech
                                                for those with visual impairments, captioning for the deaf, and
                                                customizable interface options to enhance usability for all users.</div>
                                        </div>
                                    </div>
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a
                                            editable="inline"
                                            class="fw-bold text-decoration-none text-dark h4 collapsed" href=""
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            How can employers use AccessiJobs to post jobs and find candidates?
                                        </a>

                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree"
                                            data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">Employers can easily post job
                                                openings on AccessiJobs by registering on our platform and filling out
                                                job details that highlight the skills and qualifications required. Our
                                                platform allows employers to specify the type of accommodations needed
                                                for the job, making it easier to match with suitable candidates.
                                                Additionally, employers can utilize our analytics tools to monitor the
                                                effectiveness of their postings and interact directly with potential
                                                candidates, ensuring a smooth hiring process.</div>
                                        </div>
                                    </div>
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a
                                            editable="inline" class="fw-bold text-decoration-none text-dark h4"
                                            href="" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                                            aria-controls="flush-collapseFour">&nbsp;How does AccessiJobs ensure the
                                            accessibility of its platform?</a>

                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFour"
                                            data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">Our platform is built with
                                                accessibility at its core. AccessiJobs includes features such as
                                                text-to-speech functionality, screen readers, and customizable user
                                                interfaces that accommodate different disability needs. We regularly
                                                update our platform based on user feedback and the latest accessibility
                                                standards to ensure that it remains accessible to everyone.</div>
                                        </div>
                                    </div>
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow">

                                        <a editable="inline"
                                            class="fw-bold text-decoration-none text-dark h4 collapsed" href=""
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            What are the steps to create an account and start using AccessiJobs?</a>

                                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFive"
                                            data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">To start using AccessiJobs,
                                                follow these simple steps:<br>
                                                1. Visit our website and click on the 'Sign Up' button.<br>
                                                2. Fill in the registration form with your personal and professional
                                                details.<br>
                                                3. Set up your profile by adding your resume and specifying your job
                                                preferences and any necessary accommodations.<br>
                                                4. Begin searching for jobs using our search tools and apply directly
                                                through the platform.<br>
                                                5. Utilize our job matching and alerts to receive notifications about
                                                new job opportunities that fit your profile.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /col -->
                        <!-- /lc-block -->
                    </div><!-- /col -->
                </div> --}}
        </div>
    </section>
    <footer class="footer-section">
        <section class="bg-dark text-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="lc-block mb-4">
                            <img class="img-fluid" alt="logo" src="images/logo.png" style="max-height:10vh">
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
                                <p>Tutorial</p>
                                <p>Resources
                                    <br>
                                </p>
                                <p>Docs</p>
                                <p>Example</p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h4>About us</h4>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block small">
                            <div editable="rich">
                                <p>Story</p>
                                <p>Work with us</p>
                                <p>Blog</p>
                                <p>News</p>
                            </div>
                        </div>
                        <!-- /lc-block -->
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h4>Downloads</h4>
                            </div>
                        </div>
                        <!-- /lc-block -->
                        <div class="lc-block small">
                            <div editable="rich">
                                <p>Vertex 1.2</p>
                                <p>Templates</p>
                                <p>Sounds</p>
                                <p>Gradients</p>
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
                                <p>Copyright © ACCESSIJOBS 2024>
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


</body>

</html>
