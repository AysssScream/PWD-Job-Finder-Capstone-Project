<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

    <script>
        // Function to prevent back navigation
        function preventBackNavigation() {
            window.history.pushState(null, '', window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, '', window.location.href);
            };
        }

        window.onload = function() {
            preventBackNavigation();
            // Optional: Redirect to home after a few seconds
            setTimeout(function() {
                window.location.href = '/'; // Redirect to home or login page
            }, 2000); // Redirect after 2 seconds
        };

        function onLogout() {
            console.log("User logged out");
            preventBackNavigation();
        }
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <i class="fas fa-wheelchair fa-6x text-primary mb-5"></i> <!-- Disability icon at the top -->
    <div class="d-flex align-items-center">
        <div class="spinner-border text-primary mr-2" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <span class="h3 text-gray-500">Logging Out...</span>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
