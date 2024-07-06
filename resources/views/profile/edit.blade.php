<link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between  ">
            <h2 class="font-semibold  text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('dashboard') }}"
                    class="text-1xl  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200">
                    <i class="fas fa-home ml-1"></i>
                    Go Back to Dashboard
                </a>
            </h2>
        </div>
    </x-slot>


    <div class="py-12  grid grid-cols-2 gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <!-- First Column -->
        <div class="space-y-6  "id="custom-width1">
            <div class="p-4 sm:p-8  bg-gray-100 dark:bg-gray-800  shadow sm:rounded-lg ">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Profile Picture') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                {{ __('Ensure you upload appropriate profile pictures and smaller sizes.') }}
                            </p>
                        </header>



                        <div class="flex items-center justify-center mt-4">
                            <div id="container"
                                style="width: 200px; height: 200px; overflow: hidden; position: relative;">
                                <img class="rounded-circle img-fluid" alt="avatar1"
                                    src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                                    style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>

                        <form method="post" action="{{ route('profile.updatepic') }}" enctype="multipart/form-data"
                            id="formprofpic">
                            @csrf
                            @method('patch')
                            <div class="d-flex align-items-center justify-between gap-4 mt-3">
                                <label
                                    class="btn btn-primary d-inline-flex align-items-center mb-4 mt-4 custom-height custom-padding">
                                    Update Profile Picture
                                    <input type="file" name="profile_picture" class="d-none" accept="image/*"
                                        onchange="previewImage(event)"
                                        value="{{ old('profile_picture') ? old('profile_picture') : asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}">
                                </label>

                                <button type="submit"
                                    class="btn btn-success custom-height custom-padding">{{ __('Save Changes') }}</button>
                            </div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                {{ __('Ensure you upload appropriate profile pictures and smaller sizes (2MB).') }}
                            </p>
                        </form>




                        <form method="post" action="{{ route('password.passupdate') }}" class="mt-6 space-y-6">
                            <div class="flex items-center justify-center mt-3">
                                <div
                                    class="w-full text-md font-medium text-gray-900 bg-gray-100 dark:bg-gray-800 border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <button type="button" id="toggleApplicantButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-user-circle mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Applicant Profile</span>
                                    </button>
                                    <button type="button" id="togglePersonalButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-address-card mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Personal Information</span>
                                    </button>
                                    <button type="button" id="toggleEmployerButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Employment History and Work Experience</span>
                                    </button>
                                    <button type="button" id="toggleJobPrefButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-suitcase mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Job Preferences</span>
                                    </button>
                                    <button type="button" id="toggleLanguageButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-language mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Language Proficiency and Other Skills</span>
                                    </button>
                                    <button type="button" id="toggleEducationalButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-graduation-cap mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">Educational Background</span>
                                    </button>
                                    <button type="button" id="togglePWDButton"
                                        class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fas fa-wheelchair mr-2"></i> <!-- Font Awesome icon -->
                                        <span class="flex-1">PWD Information</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
        <!-- Second Column -->
        <div class="space-y-6" id="custom-width2">
            <div class="p-4 mb-10 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form id="send-verification" method="post" action="{{ route('verification.emailsend') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops!</strong> There were some errors with your submission:
                                <ul class="mt-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <br>
                        @endif
                        <div id="applicantFields" style="display: none;">
                            @include('profile.sections.applicant')
                        </div>
                        <div id="personalFields" style="display: none;" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.personal')
                        </div>
                        <div id="employmentFields" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.employment')
                        </div>
                        <div id="jobprefFields" style="display: none;" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.jobpreferences')
                        </div>

                        <div id="languageFields" style="display: none;" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.language')
                        </div>

                        <div id="educationFields" style="display: none;" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.education')
                        </div>
                        <div id="pwdFields" style="display: none;" class="text-gray-800 dark:text-gray-100">
                            @include('profile.sections.pwdinfo')
                        </div>
                </div>
            </div>
        </div>

    </div>

    </form>
    </div>

    </div>
    </div>

</x-app-layout>
@if (Session::has('message'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.info("{{ Session::get('message') }}", 'Customize', {
                timeOut: 5000
            });
        });
    </script>
@endif
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
    window.onload = function() {
        // Show or hide sections as needed on page load
        document.getElementById('applicantFields').style.display = 'block';
        document.getElementById('employmentFields').style.display = 'none';
        document.getElementById('personalFields').style.display = 'none';
        document.getElementById('jobprefFields').style.display = 'none';
        document.getElementById('languageFields').style.display = 'none';
        document.getElementById('educationFields').style.display = 'none';
        document.getElementById('pwdFields').style.display = 'none';
    };


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
