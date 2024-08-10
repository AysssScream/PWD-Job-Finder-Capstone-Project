<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
    <link rel="preload" href="/images/team.png" as="image">
    <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
</head>


<body>
    <div class="py-36 bg-cover bg-center">
        @if (Auth::check() && is_null(Auth::user()->email_verified_at))
            <div class="landscape-container mt-15">
                <div class="container w-3/4 mx-auto landscape-content">
                    <div
                        class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                        <div class="text-red-500 text-7xl mb-4">
                            <i class="fas fa-warning"></i>
                        </div>
                        <h2 class=" font-bold mb-4 text-3xl">Email Verification Required</h2>
                        <p class=" text-black-700 mb-2">
                            Your personal information has been approved by our system. However, you need to verify
                            your email to access your account.
                        </p>
                        <br>
                        <p class=" text-black-700 mb-8">
                            Thank you for registering your account with us. At <b>ACCESSIJOBS</b>, we are committed to
                            creating an inclusive and accessible environment for all users, including Persons With
                            Disabilities (PWDs). As part of our commitment to diversity and equality, we strive to
                            ensure
                            that our platform is accessible to individuals of all abilities. Please verify your email to
                            proceed to your user dashboard.
                        </p>
                        <form action="{{ route('profile.edit') }}" method="GET">
                            @csrf
                            <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">GO TO
                                PROFILE</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            @if (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
                <div class="landscape-container mt-15"> <!-- Add mt-5 class for margin-top -->
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                            <div class="text-green-500 text-7xl mb-4">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h2 class=" font-bold mt-3 mb-4 text-3xl">Waiting for Administrator Approval</h2>
                            <p class=" text-black-700 mb-4 ">Your personal information has been submitted. Please
                                wait
                                for administrator approval.</p> <br>
                            <h2 class=" text-black-700 mb-4">Thank you for registering your account with us. At
                                <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible environment
                                for
                                all users, including Persons With Disabilities (PWDs). As part of our commitment to
                                diversity
                                and equality, we strive to ensure that our platform is accessible to individuals of all
                                abilities. Please note that account verification may take <b> 1-2 business days </b>.
                                </p>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-4 bg-black mt-5 text-white rounded inline-block">LOGOUT</button>
                                </form>
                        </div>
                    </div>
                </div>
            @elseif (Auth::check() && Auth::user()->account_verification_status === 'pending')
                <div class="landscape-container mt-15">
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                            <div class="text-blue-500 text-7xl mb-5">
                                <i class="fa-solid fa-door-open"></i>
                            </div>
                            <h2 class="font-bold mb-4 text-3xl">Welcome to AccessiJobs</h2>
                            <h2 class=" text-black-700 mb-4 ">Get started by inputting your personal information
                                below.
                                Your
                                privacy and data security are our top priorities. We adhere to strict data privacy
                                policies
                                to
                                safeguard your information.</h2>
                            <br>
                            <p class=" text-black-700 mb-8 ">Thank you for choosing ACCESSIJOBS! We're thrilled
                                to
                                welcome you
                                to our community. Our commitment to creating an inclusive and accessible environment for
                                all
                                users,
                                including Persons With Disabilities (PWDs), is at the heart of everything we do. As part
                                of
                                this
                                commitment, we strive to ensure that our platform is accessible to individuals of all
                                abilities.
                            </p>
                            <form action="{{ route('pendingapproval') }}" method="POST">
                                @csrf
                                <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">GET
                                    STARTED</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="landscape-container mt-15">
                    <div class="container w-3/4 mx-auto landscape-content">
                        <div
                            class="bg-white text-black dark:bg-gray-700 dark:text-gray-200 p-6 rounded-lg shadow-md text-center">
                            <div class="text-6xl text-green-500 ">&#10004;</div>
                            <h2 class="text-2xl font-bold mb-4">User Account Approved!</h2>
                            <p class="text-lg text-black-700 mb-8 ">Your personal information has been approved by the
                                administrator.
                                You can now access your account.</p> <br>
                            <p class="text-lg text-black-700 mb-8 ">Thank you for registering your account with us. At
                                <b>ACCESSIJOBS</b>, we are committed to creating an inclusive and accessible environment
                                for
                                all users, including Persons With Disabilities (PWDs). As part of our commitment to
                                diversity
                                and equality, we strive to ensure that our platform is accessible to individuals of all
                                abilities. You may return to your user dashboard accordingly. </b>.
                            </p>
                            <form action="{{ route('dashboard') }}" method="GET">
                                @csrf
                                <button type="submit" class="py-2 px-4 bg-black text-white rounded inline-block">GO TO
                                    DASHBOARD</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</body>

</html>
