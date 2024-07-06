<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="shortcut icon" href="img/pdad.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container">
            <a class="navbar-brand fs-4 me-5" href="">ACCESSIJOBS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="{{ url('/') }}" class="nav-link fs-5 me-3" aria-label="Home" tabindex="0">Home</a>
                    <a href="{{ url('/jobs') }}" class="nav-link fs-5 me-3" aria-label="Jobs" tabindex="0">Jobs</a>
                    <a href="{{ url('/jobfairs') }}" class="nav-link fs-5 me-3" aria-label="Job Fairs"
                        tabindex="0">Job Fairs</a>
                    <a href="{{ url('/trainings') }}" class="nav-link fs-5 me-3" aria-label="Trainings"
                        tabindex="0">Trainings</a>
                </div>
                <div class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->usertype == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="nav-link fs-6" aria-label="Admin Dashboard"
                                    tabindex="0">Admin Dashboard</a>
                            @elseif (Auth::user()->usertype == 'employer')
                                <a href="{{ route('employer.dashboard') }}" class="nav-link fs-6"
                                    aria-label="Employer Dashboard">Employer Dashboard</a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="nav-link fs-6" aria-label="Dashboard"
                                    tabindex="0">Dashboard</a>
                            @endif
                        @else
                            <a class="btn btn-outline-dark fs-6 btn-register me-3" href="{{ route('login') }}"
                                aria-label="Login" tabindex="0">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-dark fs-6 btn-register me-3"
                                    aria-label="Register Now" tabindex="0">Register Now</a>
                            @endif
                        @endauth
                    @endif

                </div>
            </div>
        </div>
    </nav>



    <style>
        .btn-register {
            transition: color 0.3s, background-color 0.3s, border-color 0.3s;
        }

        .btn-register:hover {
            color: #000;
            background-color: transparent;
            border-color: #000;
        }
    </style>

    <h1>Hello, world!</h1>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elementsToRead = document.querySelectorAll(".nav-link, .btn-register");

            elementsToRead.forEach(element => {
                // Add event listener for keyboard focus
                element.addEventListener("focus", function() {
                    speak(element.getAttribute("aria-label"));
                });

            });

            function speak(text) {
                const msg = new SpeechSynthesisUtterance();
                msg.text = text;
                msg.volume = 1; // 0 to 1
                msg.rate = 1; // 0.1 to 10
                msg.pitch = 1; // 0 to 2
                window.speechSynthesis.speak(msg);
            }
        });
    </script>
</body>

</html>
