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
    <link rel="stylesheet" href="/css/homepage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('/css/Homepage.css') }}" as="style" rel='stylesheet'>
    <link rel="preload" href="/css/findjobs.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="images/lightnavbarlogo.png" as="image">
    <link rel="preload" href="images/darknavbarlogo.png" as="image">
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
                                    <a href="{{ route('aboutus') }}" class="nav-link underline-on-hover">
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
                                <img class="img-fluid" alt="logo" src="images/logo.png" style="max-height:10vh">
                            </div>
                            <div class="lc-block small">
                                <div editable="rich">
                                    <p>AccessiJobs is dedicated to creating inclusive employment opportunities for
                                        persons with disabilities. Our platform connects talented individuals with
                                        employers who value diversity and inclusion. Stay updated with our latest news
                                        and join our community on social media to be a part of the change. Follow us on
                                        Facebook, Twitter, Instagram, and LinkedIn.</p>
                                </div>
                            </div>
                            <!-- /lc-block -->
                            <div class="lc-block py-2">
                                <a class="text-decoration-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="1em"
                                        height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                        <path
                                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-decoration-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em"
                                        height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                        <path
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-decoration-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em"
                                        height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-decoration-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="1em"
                                        height="1em" lc-helper="svg-icon" fill="var(--bs-light)">
                                        <path
                                            d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-decoration-none" href="#">
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
                                        <a class="text-decoration-none" href="#">License Details</a> -
                                        <a class="text-decoration-none" href="#">Terms &amp; Conditions</a>
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
        </script>

</body>

</html>
