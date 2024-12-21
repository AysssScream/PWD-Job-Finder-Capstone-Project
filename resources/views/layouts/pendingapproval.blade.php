<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
    <link rel="preload" href="/images/team.webp" as="image">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</head>


<body>
    <div class="py-36 bg-cover bg-center">
        @if (Auth::check() && is_null(Auth::user()->email_verified_at))
            <div class="landscape-container mt-15">
                <div class="container w-3/4 mx-auto landscape-content">
                    <div
                        class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                        <div
                            class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                            <div class="text-red-500 text-7xl mb-4">
                                <i class="fas fa-warning"></i>
                            </div>
                            <h2 class="font-bold text-3xl mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Email Verification Required">Email Verification Required</h2>
                            <p class="text-white mb-2"  tabindex="0" aria-label="Your personal information has been approved by our system. However, you need to verify
                                your email to access your account.">
                                Your personal information has been approved by our system. However, you need to verify
                                your email to access your account.
                            </p>
                        </div>
                        <div class="p-6">
                            <p class=" text-black-700 mb-8 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Thank you for registering your account with us. At ACCESSIJOBS<, we are committed to  creating an inclusive and accessible environment for all users, including Persons With
                                Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to
                                ensure that our platform is accessible to individuals of all abilities. Please verify your
                                email to proceed to your user dashboard.">
                                Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed
                                to
                                creating an inclusive and accessible environment for all users, including Persons With
                                Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to
                                ensure
                                that our platform is accessible to individuals of all abilities. Please verify your
                                email to
                                proceed to your user dashboard.
                            </p>
                            <form action="{{ route('profile.edit') }}" method="GET">
                                @csrf
                                <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="GO TO PROFILE">
                                    <i class="fas fa-user mr-2"></i> GO TO PROFILE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
                <div class="landscape-container mt-15"> <!-- Add mt-5 class for margin-top -->
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200  rounded-lg shadow-md text-center">
                            <div
                                class="bg-gradient-to-r from-blue-400 to-blue-700 p-9 rounded-t-lg text-white border-b-4 border-blue-400">
                                <div class="flex justify-center mb-4">
                                    <div
                                        class="text-6xl bg-gradient-to-r from-yellow-400 to-yellow-500 bg-clip-text text-transparent">
                                        <i class="fas fa-hourglass-half"></i> <!-- Using hourglass icon -->
                                    </div>
                                </div>
                                <h2
                                    class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-yellow-300 to-yellow-400 bg-clip-text text-transparent focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Waiting for Approval">
                                    Waiting for Approval
                                </h2>
                                <p class="text-white mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Your personal information has been submitted. Please wait for
                                    administrator approval.">Your personal information has been submitted. Please wait for
                                    administrator approval.</p>
                            </div>
                            <div class="p-6">
                                <h2 class=" text-black-700 mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Thank you for registering your account with us. At
                                    ACCESSIJOBS, we are committed to creating an inclusive and accessible
                                    environment for all users, including Persons With Disabilities (PWDs). As part of our commitment to
                                    diversity and equality, we strive to ensure that our platform is accessible to individuals of
                                    all abilities. Please note that account verification may take <b> 1-2 business days">Thank you for registering your account with us. At
                                    <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible
                                    environment
                                    for
                                    all users, including Persons With Disabilities (PWDs). As part of our commitment to
                                    diversity
                                    and equality, we strive to ensure that our platform is accessible to individuals of
                                    all
                                    abilities. Please note that account verification may take <b> 1-2 business days
                                    </b>.
                                    </p>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="py-2 px-4 bg-black text-white rounded inline-block mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="LOGOUT">
                                            <i class="fas fa-sign-out-alt mr-2"></i> LOGOUT
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (Auth::check() && Auth::user()->account_verification_status === 'declined')
                <div class="landscape-container mt-15"> <!-- Add mt-5 class for margin-top -->
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                            <div
                                class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                                <div class="text-red-300 text-7xl mb-4 mt-8">
                                    <div class="flex justify-center mb-4">
                                        <div
                                            class="text-6xl bg-gradient-to-r from-red-300 to-red-400 bg-clip-text text-transparent">
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <h2
                                    class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-red-200 to-red-300 bg-clip-text text-transparent focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Registration Declined">
                                    Registration Declined
                                </h2>
                                <p class="text-white mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Unfortunately, your registration has been declined. Please contact support for more
                                    information on your application status.">
                                    Unfortunately, your registration has been declined. Please contact support for more
                                    information on your application status.
                                </p>
                            </div>

                            <div class="p-6">
                                <h2 class="text-black-700 mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Thank you for your interest in joining ACCESSIJOBS. We are committed to
                                    creating an inclusive and accessible environment for all users, including Persons
                                    With Disabilities (PWDs). While we strive to ensure that our platform is accessible
                                    to individuals of all abilities, we regret to inform you that your account could not
                                    be approved at this time.">
                                    Thank you for your interest in joining <b>ACCESSIJOBS</b>. We are committed to
                                    creating an inclusive and accessible environment for all users, including Persons
                                    With Disabilities (PWDs). While we strive to ensure that our platform is accessible
                                    to individuals of all abilities, we regret to inform you that your account could not
                                    be approved at this time.
                                </h2>
                                <p class="text-black-700 mb-4" tabindex="0" aria-label="Please check your inbox for further details regarding your application
                                        status.For any questions or further assistance, please reach out to our support team. We appreciate your understanding.">
                                    <a href="{{ route('user.messages') }}"
                                        class="py-1 px-2 bg-blue-500 hover:bg-blue-700 text-white rounded inline-block mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        <i class="fas fa-inbox mr-2"></i> INBOX
                                    </a>
                                    <b>Please check your inbox for further details regarding your application
                                        status.</b> For any questions or further assistance, please reach out to our
                                    support team. We appreciate your understanding.
                                </p>

                                <form action="{{ route('logout') }}" method="POST" class="flex justify-center">
                                    @csrf
                                    <div class="flex flex-col sm:flex-row space-x-0 sm:space-x-4">
                                        <button type="submit" tabindex="0" aria-label="log-out" 
                                            class="py-2 px-4 bg-black text-white rounded inline-block mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-sign-out-alt mr-2"></i> LOGOUT
                                        </button>
                                        <a href="{{ route('user.messages') }}" tabindex="0" aria-label="INBOX"
                                            class="py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white rounded inline-block mt-5 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                            <i class="fas fa-inbox mr-2"></i> INBOX
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (Auth::check() && Auth::user()->account_verification_status === 'pending')
                <div class="landscape-container mt-15">
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                            <div
                                class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                                <div class="text-yellow-300 text-7xl mb-4 mt-8">
                                    <div class="flex justify-center mb-4">
                                        <div
                                            class="text-6xl bg-gradient-to-r from-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <h2
                                    class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-yellow-200 to-yellow-300 bg-clip-text text-transparent focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Welcome to AccessiJobs">
                                    Welcome to AccessiJobs
                                </h2>
                                <p class="text-white mb-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Get started by inputting your personal information below. Your privacy and data security are our top priorities. We adhere to strict data privacy policies to safeguard your information.">
                                    Get started by inputting your personal information below. Your privacy and data
                                    security are our top priorities. We adhere to strict data privacy policies to
                                    safeguard your information.
                                </p>
                            </div>
                            <div class="p-6">
                                <p class=" text-black-700 mb-8 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Thank you for choosing ACCESSIJOBS! We're thrilled to welcome you to our community. Our commitment to creating an inclusive and accessible environment
                                    for all users, including Persons With Disabilities (PWDs), is at the heart of everything we do. As
                                    part of this commitment, we strive to ensure that our platform is accessible to individuals of all abilities.">Thank you for choosing ACCESSIJOBS! We're thrilled
                                    to
                                    welcome you
                                    to our community. Our commitment to creating an inclusive and accessible environment
                                    for
                                    all
                                    users,
                                    including Persons With Disabilities (PWDs), is at the heart of everything we do. As
                                    part
                                    of
                                    this
                                    commitment, we strive to ensure that our platform is accessible to individuals of
                                    all
                                    abilities.
                                </p>
                                <form action="{{ route('pendingapproval') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0">
                                        <i class="fas fa-play mr-2"></i> GET STARTED
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="landscape-container mt-15">
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-md text-center">
                            <div class="bg-gradient-to-r from-blue-400 to-blue-700 p-3 rounded-t-lg text-white border-b-4 border-blue-400">
                                <div class="text-green-300 text-7xl mb-4 mt-8">
                                    <div class="flex justify-center mb-4">
                                        <div class="text-6xl bg-gradient-to-r from-green-300 to-green-400 bg-clip-text text-transparent">
                                            <div>&#10004;</div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="font-bold mt-3 mb-4 text-3xl bg-gradient-to-r from-green-200 to-green-300 bg-clip-text text-transparent focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="User Account Approved">
                                    User Account Approved
                                </h2>
                                <p class="text-white text-lg mb-8 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Your personal information has been approved by the administrator. You can now access your account.">
                                    Your personal information has been approved by the administrator. You can now access your account.
                                </p>
                            </div>
                            <div class="p-6">
                                <p class="text-lg text-black-700 mb-8 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="Thank you for registering your account with us. At ACCESSIJOBS, we are committed to creating an inclusive and accessible environment for all users, including Persons With Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to ensure that our platform is accessible to individuals of all abilities. You may return to your user dashboard accordingly.">
                                    Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible environment for all users, including Persons With Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to ensure that our platform is accessible to individuals of all abilities. You may return to your user dashboard accordingly.
                                </p>
                                <form action="{{ route('dashboard') }}" method="GET">
                                    @csrf
                                    <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="GO TO DASHBOARD">
                                        <i class="fas fa-tachometer-alt mr-2"></i> GO TO DASHBOARD
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountVerificationStatus = "{{ Auth::user()->account_verification_status }}"; 
    
        if (accountVerificationStatus === 'waiting for approval') {
            localStorage.removeItem('formData'); 
            fireConfetti();
            console.log('Form data cleared from local storage due to waiting for approval status.');
        }
    });


    function fireConfetti() {
        const duration = 5 * 1000; // 5 seconds
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        const interval = setInterval(() => {
            const timeLeft = animationEnd - Date.now();
            if (timeLeft <= 0) return clearInterval(interval);

            const particleCount = 50 * (timeLeft / duration);
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
        }, 250);
    }
</script>
</html>
