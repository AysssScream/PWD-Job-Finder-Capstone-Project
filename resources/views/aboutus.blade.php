<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/Aboutpage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet" loading="lazy">
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
                        </div>

                    </div>
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
            </nav>
        </div>

        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="lc-block">
                            <div editable="rich">

                                <p class="lead fw-bold text-primary" style="font-size: 2.5rem;">ABOUT US</p>

                                <h2 class="fw-bold display-2" style="font-size: 1.5rem;">PERSON WITH DISABILITIES
                                    AFFAIRS DIVISION</h2>

                            </div>
                        </div>
                    </div><!-- /col -->
                    <div class="col-lg-6">
                        <div class="lc-block">
                            <div editable="rich">
                                <p class="rfs-7" style="line-height: 1.7;">The Person with Disabilities Affairs
                                    Division (PDAD) in Mandaluyong, Philippines, is a local government unit dedicated to
                                    addressing the needs and promoting the welfare of persons with disabilities (PWDs)
                                    within the city. This division typically works on implementing programs and
                                    activities that are designed to empower PWDs, ensure their access to various
                                    services, and facilitate their inclusion in all aspects of community life.<br></p>
                            </div>
                        </div>
                    </div><!-- /col -->
                </div>
            </div>
        </section>
        <section>
            <div class="d-flex container-fluid" lc-helper="background"
                style="height:60vh;background:url(images/123.webp)  center / cover no-repeat;background-attachment: fixed;"
                loading="lazy">
            </div>
            <div class="container bg-light shadow py-4" style="margin-top:-100px">
                <div class="row text-center justify-content-center">
                    <div class="col-12">
                        <div class="lc-block">
                            <div editable="rich">
                                <p class="fw-bold display-5">PERSON WITH DISABILITIES AFFAIRS DIVISION</p>
                            </div>
                        </div>
                    </div>
                    <div class="lc-block col-5">
                        <hr>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-lg-10 col-xxl-8">
                        <div class="lc-block mb-5">
                            <div editable="rich">
                                <p class="rfs-9" style="line-height: 1.8;"> The Persons With Disabilities Affairs
                                    Division (PDAD) was established in 1998 under City Ordinance 193 S. 1998. PDAD is
                                    the FIRST Local Government Office in the entire Philippines created that caters to
                                    the need of Persons With Disabilities (PWDs) and in accordance with the basic
                                    principle of the Magna Carta for Persons with Disabilities (Republic Act 9442), that
                                    the PWDs’ right must not be perceived as welfare services of the government. Our
                                    mission is to work with and for Persons With Disabilities addressing their rights to
                                    EDUCATION, HABILITATION and REHABILITATION, PLAY and LEISURE, FAMILY SUPPORT, HEALTH
                                    EQUAL OPPORTUNITY, and ACCESSIBILITY.

                                </p>
                            </div>
                        </div>
                        <div class="lc-block text-center">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Keep in touch</a>
                        </div>
                    </div><!-- /col -->
                </div>
            </div>
        </section>
        </section>
        <section>
            <div class="container-fluid px-xl-4 py-5">
                <div class="row align-items-center g-xl-4 py-5">
                    <div class="col-sm-8 col-lg-6">
                        <img src="images/first17.png" class="d-block mx-lg-auto img-fluid"
                            alt="Photo by Simone Hutsch" loading="lazy" img src="images/first17.png">
                    </div>
                    <div class="col-lg-6">
                        <div class="lc-block mb-3">
                            <div editable="rich">
                                <h2 class="fw-bold display-2">About PDAD</h2>
                            </div>
                        </div>

                        <div class="lc-block mb-5">
                            <div editable="rich">
                                <p class="rfs-8"> Established in 1998, the Persons with Disabilities Affairs Division
                                    (PDAD) is a cornerstone organization dedicated to the empowerment and advocacy of
                                    individuals with disabilities. Our commitment is to ensure their full and effective
                                    participation in all aspects of societal life. PDAD actively engages in developing
                                    and implementing policies that promote inclusivity, accessibility, and equal
                                    opportunities in education, employment, and public life. Our mission is to foster an
                                    environment where individuals with disabilities can thrive, contribute, and enjoy
                                    rights on an equal basis with others. We champion this cause by collaborating with
                                    government agencies, disability advocacy groups, and the private sector to create
                                    sustainable and impactful programs. <BR>
                                    </BR> Our strategic initiatives include targeted advocacy efforts that influence
                                    legislation and public policy, aimed at eliminating discrimination and enhancing
                                    accessibility in the workplace, schools, and public spaces. PDAD also focuses on
                                    educational outreach, providing resources and support to both individuals with
                                    disabilities and the wider community to raise awareness and understanding of
                                    disability rights and needs. We organize workshops, seminars, and training sessions
                                    that equip individuals with disabilities with the necessary skills to succeed and
                                    lead independent lives. Furthermore, PDAD is at the forefront of technology
                                    adoption, facilitating access to innovative assistive technologies that enhance
                                    communication, mobility, and daily functionality for persons with disabilities.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
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
                                            with disabilities. Our platform connects talented individuals with employers
                                            who
                                            value diversity and inclusion. Stay updated with our latest news and join
                                            our
                                            community on social media to be a part of the change. Follow us on Facebook
                                            and
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
                                        <a href="{{ route('welcome') }}" class="text-white"
                                            style="text-decoration: none;">
                                            <p><i class="fas fa-home" style="margin-right: 8px;"></i>
                                                Home</p>
                                        </a>
                                        <a href="{{ route('findjobs') }}" class="text-white"
                                            style="text-decoration: none;">
                                            <p><i class="fas fa-briefcase" style="margin-right: 8px; "></i> Find Jobs
                                            </p>
                                        </a>
                                        <a href="{{ route('aboutus') }}" class="text-white"
                                            style="text-decoration: none;">
                                            <p><i class="fas fa-info-circle" style="margin-right: 8px;"></i> About Us
                                            </p>
                                        </a>
                                        <a href="{{ route('faq') }}" class="text-white"
                                            style="text-decoration: none;">
                                            <p><i class="fas fa-question-circle" style="margin-right: 8px; "></i> FAQ
                                            </p>
                                        </a>
                                    </div>
                                </div>
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
                                        <a href="{{ route('contact') }}" class="text-white"
                                            style="text-decoration: none;">
                                            <p><i class="fas fa-phone" style="margin-right: 8px;"></i> Ask For Support
                                            </p>
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
                                        <p><i class="fas fa-map-marker-alt"></i> Second Floor of Senior Citizen Center
                                            (Acacia
                                            Lane Extension, NAG Bldg., Brgy. Addition Hills)</p>
                                        <p><i class="fas fa-phone-alt"></i> (+63)9667714365</p>
                                        <p><i class="fas fa-clock"></i> Open Hours of Government: Mon-Fri: 7:00 am -
                                            4:00pm
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
                        'p, li, h2,h3, section,img, h1, button, a,.logoimage,label,input, select, span, i').forEach(
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
