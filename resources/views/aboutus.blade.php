<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AccessiJobs | About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css"
        media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/Aboutpage.css" />
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
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
                        </div>

                    </div>
                    <label class="ui-switch position-fixed bg-light p-3 rounded-circle shadow"
                        style="bottom: 20px; right: 20px;">
                        <input type="checkbox" id="themeSwitch">
                        <div class="slider">
                            <i class="fas fa-adjust"></i>
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

                                <p class="lead fw-bold text-primary">About us</p>

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
                style="height:60vh;background:url(images/123.png)  center / cover no-repeat;background-attachment: fixed;">
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
                                    <img class="img-fluid" alt="logo" src="images/logo.png"
                                        style="max-height:10vh">
                                </div>
                                <div class="lc-block small">
                                    <div editable="rich">
                                        <p>AccessiJobs is dedicated to creating inclusive employment opportunities for
                                            persons with disabilities. Our platform connects talented individuals with
                                            employers who value diversity and inclusion. Stay updated with our latest
                                            news and join our community on social media to be a part of the change.
                                            Follow us on Facebook, Twitter, Instagram, and LinkedIn.</p>
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
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>


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
</body>


</html>
