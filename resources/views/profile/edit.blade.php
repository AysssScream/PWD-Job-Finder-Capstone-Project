<link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Profile</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('saveprofile'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('saveprofile') }}", 'Profile Information Updated', {
                timeOut: 5000
            });

        });
    </script>
@endif


@if (Session::has('saveprofilepic'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('saveprofilepic') }}", 'Profile Picture Updated', {
                timeOut: 5000
            });

        });
    </script>
@endif

@if (Session::has('updatepass'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("{{ Session::get('updatepass') }}", 'User password updated', {
                timeOut: 5000
            });

        });
    </script>
@endif



<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between  ">
            @if (Auth::user()->usertype === 'user')
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <a href="{{ route('dashboard') }}"
                        class="text-xl  font-lg text-blue-600 hover:text-gray-700 dark:text-blue-300 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="{{ __('messages.profile.go_back_to_dashboard') }}">
                        <i class="fas fa-home ml-1"></i>
                        {{ __('messages.profile.go_back_to_dashboard') }}
                    </a>
                </h2>
            @else
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <a href="{{ route('employer.setup') }}"
                        class="text-xl  font-lg text-blue-600 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <i class="fas fa-home ml-1"></i>
                        Go Back to Employer Setup
                    </a>
                </h2>
            @endif
        </div>
    </x-slot>

    @if (Auth::user()->usertype === 'user')
        @include('layouts.accessibility')
    @endif

    <div class="py-0 mt-2 grid grid-cols-2 gap-6 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <!-- First Column -->
        <div class="space-y-6  "id="custom-width1">
            @if (Auth::user()->usertype === 'user')
                <div class="p-4 sm:p-8  bg-gray-50 dark:bg-gray-800  shadow sm:rounded-lg ">
                    <div class="max-w-8xl">
                        <section>
                            @if (Auth::user()->account_verification_status === 'approved')
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{{ __('messages.profile.update_profile_picture') }}" tabindex="0">
                                        {{ __('messages.profile.update_profile_picture') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label=" {{ __('messages.profile.upload_appropriate_pictures') }}"
                                        tabindex="0">
                                        {{ __('messages.profile.upload_appropriate_pictures') }}
                                    </p>
                                </header>



                                <div class="flex items-center justify-center mt-4">
                                  <div id="outer-container" style="width: 210px; height: 210px; border: 5px solid blue; display: inline-block; border-radius: 50%;">
                                    <div id="inner-container" style="width: 200px; height: 200px; border: 5px solid yellow; overflow: hidden; border-radius: 50%; position: relative;">
                                        @if (Auth::check() && Auth::user()->pwdInformation && Auth::user()->pwdInformation->profilePicture)
                                            <!-- Display user's profile picture, with onerror fallback to default avatar -->
                                            <img class="rounded-circle img-fluid"
                                                 src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                                 style="width: 100%; height: 100%; object-fit: contain;"
                                                 aria-label="Profile Picture" alt="Profile Picture"
                                                 onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                        @else
                                            <!-- Display default avatar -->
                                            <img class="rounded-circle img-fluid"
                                                 src="{{ asset('/images/avatar.png') }}"
                                                 style="width: 100%; height: 100%; object-fit: contain;"
                                                 aria-label="Empty Profile Picture" alt="Default Avatar">
                                        @endif
                                    </div>
                                </div>

                                </div>


                                <form method="post" action="{{ route('profile.updatepic') }}"
                                    enctype="multipart/form-data" id="formprofpic">
                                    @csrf
                                    @method('patch')
                                    <div class="d-flex align-items-center justify-between gap-4 mt-3">
                                        <label
                                            class="btn p-2 bg-blue-700 text-white hover:bg-blue-800 d-inline-flex align-items-center mb-4 mt-4 custom-height custom-padding focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="{{ __('messages.profile.profile_picture') }}" tabindex="0">
                                            {{ __('messages.profile.profile_picture') }}
                                            <input type="file" name="profile_picture" class="d-none" accept="image/*"
                                                onchange="previewImage(event)"
                                                value="{{ old('profile_picture') ?: (Auth::user()->pwdInformation ? asset('storage/' . Auth::user()->pwdInformation->profilePicture) : '') }}">
                                        </label>
                                        
                            

                                        <button type="submit"
                                            class="btn p-2 text-white custom-height custom-padding focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            style="background-color: rgb(21 128 61);;"
                                            aria-label="{{ __('messages.profile.save_changes') }}" tabindex="0">
                                            {{ __('messages.profile.save_changes') }}
                                        </button>

                                    </div>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                    </p>
                                </form>
                                 @if ($errors->has('profile_picture'))
                                  <p class="text-red-600 dark:text-red-400 mt-1">
                                        {{ $errors->first('profile_picture') }}
                                  </p>          
                                @endif
                            @endif

                            <form method="post" action="{{ route('password.passupdate') }}" class="mt-6 space-y-6">
                                <div class="flex items-center justify-center mt-3">
                                    <div
                                        class="w-full text-md font-medium text-gray-900  bg-gray-50 dark:bg-gray-800 border-gray-400 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                        <button type="button" id="toggleApplicantButton"
                                            aria-label="{{ __('messages.profile.applicant_profile') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-user-circle mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.applicant_profile') }}">{{ __('messages.profile.applicant_profile') }}</span>
                                        </button>
                                        <button type="button" id="togglePersonalButton"
                                            aria-label="{{ __('messages.profile.personal_information') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-address-card mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.personal_information') }}">{{ __('messages.profile.personal_information') }}</span>
                                        </button>
                                        <button type="button" id="toggleEmployerButton"
                                            aria-label="{{ __('messages.profile.employment_history') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.employment_history') }}">{{ __('messages.profile.employment_history') }}</span>
                                        </button>
                                        <button type="button" id="toggleJobPrefButton"
                                            aria-label="{{ __('messages.profile.job_preferences') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-suitcase mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.job_preferences') }}">{{ __('messages.profile.job_preferences') }}</span>
                                        </button>
                                        <button type="button" id="toggleLanguageButton"
                                            aria-label="{{ __('messages.profile.language_proficiency') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-language mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.language_proficiency') }}">{{ __('messages.profile.language_proficiency') }}</span>
                                        </button>
                                        <button type="button" id="toggleEducationalButton"
                                            aria-label="{{ __('messages.profile.educational_background') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-graduation-cap mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.educational_background') }}">{{ __('messages.profile.educational_background') }}</span>
                                        </button>
                                        <button type="button" id="togglePWDButton"
                                            aria-label="{{ __('messages.profile.pwd_information') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-400 cursor-pointer hover:bg-gray-200 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-wheelchair mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="{{ __('messages.profile.pwd_information') }}">{{ __('messages.profile.pwd_information') }}</span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            @endif



            <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!--<div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">-->
            <!--    <div class="max-w-8xl">-->
            <!--        @include('profile.partials.delete-user-form')-->
            <!--    </div>-->
            <!--</div>-->
            <br>
            <br>

        </div>
        <!-- Second Column -->
        <div class="space-y-6" id="custom-width2">
            <div class="p-4 mb-10 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    <form id="send-verification" method="post" action="{{ route('verification.emailsend') }}">
                        @csrf
                    </form>

                    @if (Auth::user()->usertype === 'employer')
                        <div id="applicantFields" style="display: block;">
                            @include('profile.sections.applicant')
                        </div>
                    @endif
                    <div id="applicantFields" style="display: none;">
                        @include('profile.sections.applicant')
                    </div>

                    @if (Auth::user()->account_verification_status === 'approved')
                        <div id="personalFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.personal')
                        </div>
                        <div id="employmentFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.employment')
                        </div>
                        <div id="jobprefFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.jobpreferences')
                        </div>
                        <div id="languageFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.language')
                        </div>
                        <div id="educationFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.education')
                        </div>
                        <div id="pwdFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            @include('profile.sections.pwdinfo')
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>


</x-app-layout>

<script>
    function toggleSections(showId, hideIds) {
        var showSection = document.getElementById(showId);
        var hideSections = hideIds.map(function(id) {
            return document.getElementById(id);
        });

        showSection.style.display = 'block';

        hideSections.forEach(function(section) {
            section.style.display = 'none';
        });
    }

    document.getElementById('toggleApplicantButton').addEventListener('click', function() {
        toggleSections('applicantFields', ['personalFields', 'employmentFields', 'jobprefFields',
            'languageFields', 'educationFields', 'pwdFields'
        ]);
    });

    document.getElementById('togglePersonalButton').addEventListener('click', function() {
        toggleSections('personalFields', ['applicantFields', 'employmentFields', 'jobprefFields',
            'languageFields', 'educationFields', 'pwdFields'
        ]);
    });

    document.getElementById('toggleEmployerButton').addEventListener('click', function() {
        toggleSections('employmentFields', ['applicantFields', 'personalFields', 'jobprefFields',
            'languageFields', 'educationFields', 'pwdFields'
        ]);
    });

    document.getElementById('toggleJobPrefButton').addEventListener('click', function() {
        toggleSections('jobprefFields', ['applicantFields', 'personalFields', 'employmentFields',
            'languageFields', 'educationFields', 'pwdFields'
        ]);
    });

    document.getElementById('toggleLanguageButton').addEventListener('click', function() {
        toggleSections('languageFields', ['applicantFields', 'personalFields', 'employmentFields',
            'jobprefFields', 'educationFields', 'pwdFields'
        ]);
    });

    document.getElementById('toggleEducationalButton').addEventListener('click', function() {
        toggleSections('educationFields', ['applicantFields', 'personalFields', 'employmentFields',
            'jobprefFields', 'languageFields', 'pwdFields'
        ]);
    });

    document.getElementById('togglePWDButton').addEventListener('click', function() {
        toggleSections('pwdFields', ['applicantFields', 'personalFields', 'employmentFields',
            'jobprefFields', 'languageFields', 'educationFields'
        ]);
    });



    // Add more event listeners for other buttons as needed
    document.addEventListener('DOMContentLoaded', function() {
        // Your existing onload code
        document.getElementById('applicantFields').style.display = 'block';
        document.getElementById('employmentFields').style.display = 'none';
        document.getElementById('personalFields').style.display = 'none';
        document.getElementById('jobprefFields').style.display = 'none';
        document.getElementById('languageFields').style.display = 'none';
        document.getElementById('educationFields').style.display = 'none';
        document.getElementById('pwdFields').style.display = 'none';
    });



    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.querySelector('#container img');
                imgElement.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
    #container {
        overflow: hidden;
        border: 2px solid #ccc;
        /* Optional: Add a border around the container */
        border-radius: 50%;
        /* Make the container circular */
        display: flex;
        background-size: contain;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 640px) {
        .grid-cols-2 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
</style>
