<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Contact Page</title>
    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css"
        media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/contactpage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="preload" href="images/lightnavbarlogo.png" as="image">
    <link rel="preload" href="images/darknavbarlogo.png" as="image">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="head-section">
        <nav class="navbar navbar-expand-lg py-2 navbar-light">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img id="logoImage" src="images/lightnavbarlogo.png" data-light="images/lightnavbarlogo.png"
                        data-dark="images/darknavbarlogo.png" width="200" height="200"
                        class="align-middle me-1 img-fluid" alt="My Website">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar3"
                    aria-controls="myNavbar3" aria-expanded="false" aria-label="Toggle navigation" id="navbartoggler">
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
                                        <i class="fas fa-tachometer-alt"></i> Admin Dashboard
                                    </a>
                                @elseif (Auth::user()->usertype == 'employer')
                                    <a href="{{ route('employer.dashboard') }}" class="btn btn-custom-login" role="button"
                                        aria-label="Employer Dashboard">
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

    <section class="bg-light py-4 py-lg-6 contact-section">
        <div class="container mb-4 text-center">
            <div class="p-5 mb-4 lc-block">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h1 class="fw-bolder display-3"><strong>CONTACT US</strong></h1>
                    </div>
                </div>
                <div class="lc-block">
                    <div editable="rich">
                        <h1 class="lead" style="font-size: 30px; color: aliceblue;">We’re Here To Help&nbsp;</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-lg-6 py-4"
        style="display: flex; justify-content: center; align-items: center; width: 90%; margin-left: auto; margin-right: auto;">
        <div class="container-fluid px-0">
            <div class="row g-0 text-center mb-5">
                <div class="col-12">
                    <h2 class="fw-bold">If You Have Any Query, Feel Free To Contact Us</h2>
                    <p class="lead mb-5 mt-3" style="font-size: 20px; line-height: 1.9;">We are here to assist you
                        with
                        any inquiries you may have. Whether you need help with our services, have a question about our
                        offerings, or just want to learn more about what we do, feel free to reach out to us. Our
                        dedicated team is ready to provide you with the information and support you need. Don't hesitate
                        to contact us through any of the methods below. We're looking forward to hearing from you!</p>
                </div>
            </div>
            <div class="container py-4">
                <div class="row text-center">
                    <div id="phone-section" class="col-md-4 mb-4">
                        <div
                            class="d-flex flex-column justify-content-between h-100 p-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 shadow rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-300">
                            <div class="text-center mb-3 mt-4">
                                <i class="fas fa-phone icon fa-2xl mx-auto"></i>
                            </div>
                            <h4 class="mt-2">Call to ask any question</h4>
                            <p><a href="tel:+0123456789" class="text-primary"
                                    style="text-decoration: none;">8532-5001 local 596</a></p>
                        </div>
                    </div>
                    <div id="email-section" class="col-md-4 mb-4">
                        <div
                            class="d-flex flex-column justify-content-between h-100 p-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 shadow rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-300">
                            <div class="text-center mb-3 mt-4">
                                <i class="fas fa-envelope icon fa-2xl mx-auto"></i>
                            </div>
                            <h4 class="mt-2">Email to get free quote</h4>
                            <p><a href="mailto:info@example.com" class="text-primary"
                                    style="text-decoration: none;">dpad@mandaluyong.gov.ph</a></p>
                        </div>
                    </div>
                    <div id="location-section" class="col-md-4 mb-4">
                        <div
                            class="d-flex flex-column justify-content-between h-100 p-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 shadow rounded hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-300">
                            <div class="text-center mb-3 mt-4">
                                <i class="fas fa-building icon fa-2xl mx-auto"></i>
                            </div>
                            <h4 class="mt-2">Visit our office</h4>
                            <p class="text-center"><b>Back of Executive Bldg.</b><br>
                            <p class="text-primary">City Government Complex, Maysilo Circle, Plainview</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-0">
                <div class="col-lg-4 offset-lg-1 px-2 px-lg-0">
                    <div class="lc-block text-center text-lg-start mb-5 mb-lg-4">
                        <div class="d-inline-flex align-items-center">
                            <div editable="rich">
                                <h2 class="fw-bold rfs-20">
                                    <i class="fas fa-envelope"></i> Send us a mail!
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="lc-block mb-lg-0 mb-4">
                        @if (Session::has('contactus'))
                            <script>
                                $(document).ready(function() {
                                    toastr.options = {
                                        "progressBar": true,
                                        "closeButton": true,
                                    }
                                    toastr.success("{{ Session::get('contactus') }}", 'Message Saved', {
                                        timeOut: 5000
                                    });
                                });
                            </script>
                        @endif
                        <form action="{{ route('contact.messages.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Your Name (optional)</label>
                                        <input name="mouseglue" type="text" class="form-control"
                                            placeholder="John Doe" value="" autocomplete="off" hidden="">
                                        <input name="name" type="text" class="form-control"
                                            placeholder="John Doe" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Your Email Address</label>
                                        <input name="email" type="email" class="form-control"
                                            placeholder="name@example.com" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label>Subject</label>
                                <input name="subject" type="text" class="form-control"
                                    placeholder="Contact Subject">
                            </div>
                            <div class="form-group mb-4" style="line-height: 1.9;">
                                <label>Your Message</label>
                                <textarea name="message" class="form-control" rows="3" maxlength="300"></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg">Send Message</button>
                            </div>


                        </form>

                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1">
                    <div class="lc-block">
                        <div class="ratio ratio-16x9 min-vh-50" lc-helper="gmap-embed">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1930.6904346158087!2d121.0333294166801!3d14.577360323401958!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c84b4d7d8847%3A0x3cc947be6455c07a!2sMandaluyong%20City%20Hall!5e0!3m2!1sen!2sph!4v1718263081573!5m2!1sen!2sph"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
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


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>



</body>

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
</script>

</html>
