<link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Profile</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<?php if(Session::has('saveprofile')): ?>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("<?php echo e(Session::get('saveprofile')); ?>", 'Profile Information Updated', {
                timeOut: 5000
            });

        });
    </script>
<?php endif; ?>


<?php if(Session::has('saveprofilepic')): ?>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("<?php echo e(Session::get('saveprofilepic')); ?>", 'Profile Picture Updated', {
                timeOut: 5000
            });

        });
    </script>
<?php endif; ?>

<?php if(Session::has('updatepass')): ?>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }

            toastr.success("<?php echo e(Session::get('updatepass')); ?>", 'User password updated', {
                timeOut: 5000
            });

        });
    </script>
<?php endif; ?>



<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between  ">
            <?php if(Auth::user()->usertype === 'user'): ?>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="text-xl  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="<?php echo e(__('messages.profile.go_back_to_dashboard')); ?>">
                        <i class="fas fa-home ml-1"></i>
                        <?php echo e(__('messages.profile.go_back_to_dashboard')); ?>

                    </a>
                </h2>
            <?php else: ?>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <a href="<?php echo e(route('employer.setup')); ?>"
                        class="text-xl  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <i class="fas fa-home ml-1"></i>
                        Go Back to Employer Setup
                    </a>
                </h2>
            <?php endif; ?>
        </div>
     <?php $__env->endSlot(); ?>

    <?php if(Auth::user()->usertype === 'user'): ?>
        <?php echo $__env->make('layouts.accessibility', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="py-0 mt-2 grid grid-cols-2 gap-6 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <!-- First Column -->
        <div class="space-y-6  "id="custom-width1">
            <?php if(Auth::user()->usertype === 'user'): ?>
                <div class="p-4 sm:p-8  bg-gray-50 dark:bg-gray-800  shadow sm:rounded-lg ">
                    <div class="max-w-8xl">
                        <section>
                            <?php if(Auth::user()->account_verification_status === 'approved'): ?>
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="<?php echo e(__('messages.profile.update_profile_picture')); ?>" tabindex="0">
                                        <?php echo e(__('messages.profile.update_profile_picture')); ?>

                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label=" <?php echo e(__('messages.profile.upload_appropriate_pictures')); ?>"
                                        tabindex="0">
                                        <?php echo e(__('messages.profile.upload_appropriate_pictures')); ?>

                                    </p>
                                </header>



                                <div class="flex items-center justify-center mt-4">
                                    <div id="container"
                                        style="width: 200px; height: 200px; overflow: hidden; position: relative;">
                                        <?php if(Auth::check() && Auth::user()->pwdInformation && Auth::user()->pwdInformation->profilePicture): ?>
                                            <!-- Display user's profile picture, with onerror fallback to default avatar -->
                                            <img class="rounded-circle img-fluid"
                                                src="<?php echo e(asset('storage/' . Auth::user()->pwdInformation->profilePicture)); ?>"
                                                style="width: 100%; height: 100%; object-fit: contain;"
                                                aria-label="Profile Picture" alt="Profile Picture"
                                                onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                                            
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <form method="post" action="<?php echo e(route('profile.updatepic')); ?>"
                                    enctype="multipart/form-data" id="formprofpic">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('patch'); ?>
                                    <div class="d-flex align-items-center justify-between gap-4 mt-3">
                                        <label
                                            class="btn btn-primary d-inline-flex align-items-center mb-4 mt-4 custom-height custom-padding focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="<?php echo e(__('messages.profile.profile_picture')); ?>" tabindex="0">
                                            <?php echo e(__('messages.profile.profile_picture')); ?>

                                            <input type="file" name="profile_picture" class="d-none" accept="image/*"
                                                onchange="previewImage(event)"
                                                value="<?php echo e(old('profile_picture') ?: (Auth::user()->pwdInformation ? asset('storage/' . Auth::user()->pwdInformation->profilePicture) : '')); ?>">
                                        </label>


                                        <button type="submit"
                                            class="btn btn-success custom-height custom-padding focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            aria-label="<?php echo e(__('messages.profile.save_changes')); ?>" tabindex="0">
                                            <?php echo e(__('messages.profile.save_changes')); ?>

                                        </button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                    </p>
                                </form>
                            <?php endif; ?>

                            <form method="post" action="<?php echo e(route('password.passupdate')); ?>" class="mt-6 space-y-6">
                                <div class="flex items-center justify-center mt-3">
                                    <div
                                        class="w-full text-md font-medium text-gray-900 bg-gray-50 dark:bg-gray-800 border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                        <button type="button" id="toggleApplicantButton"
                                            aria-label="<?php echo e(__('messages.profile.applicant_profile')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-user-circle mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.applicant_profile')); ?>"><?php echo e(__('messages.profile.applicant_profile')); ?></span>
                                        </button>
                                        <button type="button" id="togglePersonalButton"
                                            aria-label="<?php echo e(__('messages.profile.personal_information')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-address-card mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.personal_information')); ?>"><?php echo e(__('messages.profile.personal_information')); ?></span>
                                        </button>
                                        <button type="button" id="toggleEmployerButton"
                                            aria-label="<?php echo e(__('messages.profile.employment_history')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.employment_history')); ?>"><?php echo e(__('messages.profile.employment_history')); ?></span>
                                        </button>
                                        <button type="button" id="toggleJobPrefButton"
                                            aria-label="<?php echo e(__('messages.profile.job_preferences')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-suitcase mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.job_preferences')); ?>"><?php echo e(__('messages.profile.job_preferences')); ?></span>
                                        </button>
                                        <button type="button" id="toggleLanguageButton"
                                            aria-label="<?php echo e(__('messages.profile.language_proficiency')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-language mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.language_proficiency')); ?>"><?php echo e(__('messages.profile.language_proficiency')); ?></span>
                                        </button>
                                        <button type="button" id="toggleEducationalButton"
                                            aria-label="<?php echo e(__('messages.profile.educational_background')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-graduation-cap mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.educational_background')); ?>"><?php echo e(__('messages.profile.educational_background')); ?></span>
                                        </button>
                                        <button type="button" id="togglePWDButton"
                                            aria-label="<?php echo e(__('messages.profile.pwd_information')); ?>"
                                            class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white  dark:focus:text-white">
                                            <i class="fas fa-wheelchair mr-2"></i> <!-- Font Awesome icon -->
                                            <span class="flex-1"
                                                aria-label="<?php echo e(__('messages.profile.pwd_information')); ?>"><?php echo e(__('messages.profile.pwd_information')); ?></span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            <?php endif; ?>



            <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    <?php echo $__env->make('profile.partials.update-password-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    <?php echo $__env->make('profile.partials.delete-user-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <br>
            <br>

        </div>
        <!-- Second Column -->
        <div class="space-y-6" id="custom-width2">
            <div class="p-4 mb-10 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    <form id="send-verification" method="post" action="<?php echo e(route('verification.emailsend')); ?>">
                        <?php echo csrf_field(); ?>
                    </form>

                    <?php if(Auth::user()->usertype === 'employer'): ?>
                        <div id="applicantFields" style="display: block;">
                            <?php echo $__env->make('profile.sections.applicant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <div id="applicantFields" style="display: none;">
                        <?php echo $__env->make('profile.sections.applicant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if(Auth::user()->account_verification_status === 'approved'): ?>
                        <div id="personalFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.personal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="employmentFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.employment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="jobprefFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.jobpreferences', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="languageFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="educationFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="pwdFields" class="text-gray-800 dark:text-gray-100" style="display: none;">
                            <?php echo $__env->make('profile.sections.pwdinfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\edit.blade.php ENDPATH**/ ?>