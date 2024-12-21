<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | Contact Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/contactpage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </script>
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
    <div class="head-section">
        <nav class="navbar navbar-expand-lg py-2 navbar-light">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img id="logoImage" src="images/lightnavbarlogo.webp" data-light="images/lightnavbarlogo.webp"
                        data-dark="images/darknavbarlogo.webp" width="200" height="200"
                        class="align-middle me-1 img-fluid" alt="My Website" loading="lazy">
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
                                        <a href="{{ route('register') }}" class="btn btn-custom-signup m-1" role="button"
                                            aria-label="Register Now">
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
                                    style="text-decoration: none;">pdad@mandaluyong.gov.ph</a></p>
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

</html>
