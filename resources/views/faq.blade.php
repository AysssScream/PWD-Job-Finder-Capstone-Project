<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | FAQ</title>
    <link rel="icon" href="{{ asset('/images/first17.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/homepage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('/css/Homepage.css') }}" as="style">
    <link rel="preload" href="/css/findjobs.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
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
                                        <i class="fas fa-info-circle"></i> FIND JOBS
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
                                    <a href="{{ route('login') }}" class="btn btn-custom-login" role="button"
                                        aria-label="Login">
                                        <i class="fas fa-sign-in-alt"></i> LOG IN
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-custom-signup" role="button"
                                            aria-label="Register Now">
                                            <i class="fas fa-user-plus"></i> SIGNUP
                                        </a>
                                    @endif

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

        <div class="faq-section" id="faqpage">

            <section class="pb-6">
                <div class="container pt-5 my-4 rounded">

                    <div class="row justify-content-center text-center mb-4">

                        <div class="lc-block col-xl-8">
                            <h1 editable="inline" class="fw-bold display-5">Frequently Asked Questions</h1>
                        </div><!-- /lc-block -->

                    </div>
                    <div class="row justify-content-center text-center mb-4">

                        <div class="lc-block col-xl-8">
                            <div editable="rich">
                                <p class="text-black rfs-8" style="text-align: justify">Welcome to our FAQ section,
                                    where we provide answers to
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
                        <div class="col-md-12 col-xl-8">
                            <div class="lc-block">
                                <div class="accordion accordion-flush" id="accordionFlushMyFAQ2">

                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a
                                            editable="inline" class="fw-bold text-decoration-none text-dark h4"
                                            href="" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            How does AccessiJobs tailor job searches for PWDs?
                                        </a>

                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushMyFAQ2">
                                            <div class="accordion-body" editable="rich">AccessiJobs utilizes advanced
                                                descriptive analytics and resume parsing technology to match persons
                                                with disabilities (PWDs) with suitable job opportunities. Our platform
                                                analyzes your skills, experience, and specific disability requirements
                                                to find jobs that not only match your qualifications but also
                                                accommodate your individual needs, ensuring an optimal work environment
                                                for your success.</div>
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
                                    <div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow">
                                        <a editable="inline" class="fw-bold text-decoration-none text-dark h4"
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
                                        <a editable="inline" class="fw-bold text-decoration-none text-dark h4"
                                            href="" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFive" aria-expanded="false"
                                            aria-controls="flush-collapseFive">
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

                    </div>
                </div>
        </div>
        </section>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script defer="" src="https://unpkg.com/vanilla-counter" onload="initializeCounterRANDOMID()"></script>

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
                                    <a href="{{ route('welcome') }}" class="text-white"
                                        style="text-decoration: none;">
                                        <p><i class="fas fa-home" style="margin-right: 8px;"></i>
                                            Home</p>
                                    </a>
                                    <a href="{{ route('findjobs') }}" class="text-white"
                                        style="text-decoration: none;">
                                        <p><i class="fas fa-briefcase" style="margin-right: 8px; "></i> Find Jobs</p>
                                    </a>
                                    <a href="{{ route('aboutus') }}" class="text-white"
                                        style="text-decoration: none;">
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
                                    <a href="{{ route('contact') }}" class="text-white"
                                        style="text-decoration: none;">
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
                                    <p><i class="fas fa-map-marker-alt"></i> Second Floor of Senior Citizen Center
                                        (Acacia
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

</body>

</html>
