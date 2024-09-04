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

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="<?php echo e(asset('/css/layouts.css')); ?>" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
        <title>Add Jobs</title>

    </head>
    <?php if(Session::has('addjobs')): ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("<?php echo e(Session::get('addjobs')); ?>", 'Job Successfully Saved.', {
                    timeOut: 5000
                });

            });
        </script>
    <?php endif; ?>

    <div class="py-12">
        <div class="container mx-auto max-w-8xl px-4 pt-5"
            style="
    margin-left: 0px;
    margin-right: 0px;
            ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-3 text-gray-800 dark:text-gray-300">
                        <ol class="breadcrumb mb-0 flex items-center justify-start flex-wrap">
                            <li class="breadcrumb-item">
                            <li class="breadcrumb-item w-full md:w-auto">
                                <a href="<?php echo e(route('employer.dashboard')); ?>"
                                    class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span>Back to Dashboard</span>
                                </a>
                            </li>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:gap-4 sm:gap-4 lg:grid-cols-3">
                <!-- First Column -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1">
                    <div class="w-full h-full p-6 text-gray-900 dark:text-gray-100">


                        <h2 class="text-xl font-bold mb-4">Recently Added Jobs</h2>
                        <div class="lg:h-full p-5 rounded-lg custom-scrollbar">
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="container p-5 bg-gray-100 dark:bg-gray-700 mb-3 rounded-lg custom-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                                        <?php echo e($job->title); ?>

                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-200 mb-4"><?php echo e($job->job_type); ?> |
                                        <?php echo e($job->location); ?></p>
                                    <p class="text-gray-700 dark:text-gray-200 mb-4"><?php echo e($job->description); ?></p>
                                    <p class="text-xs text-gray-400 dark:text-gray-200">
                                        <?php echo e($job->created_at->format('F j, Y')); ?></p>
                                    <div class="mt-4 flex justify-end">
                                        <a href="<?php echo e(route('employer.edit', $job->id)); ?>"
                                            class="bg-blue-500 hover:bg-blue-600 text-white dark:text-white dark:text-gray-900 px-3 py-1 rounded shadow">Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="mt-4">
                                <?php echo e($jobs->links('pagination::tailwind')); ?>

                            </div>
                        </div>



                    </div>


                </div>


                <!-- Pagination Links -->



                <!-- Second Column (Occupies More Space) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2 p-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="<?php echo e(route('jobinfos.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if($errors->any()): ?>
                                <div class="bg-red-100 dark:bg-red-700 dark:text-gray-200 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">There were some errors with your
                                        submission:</span>
                                    <ul class="mt-3 list-disc list-inside text-sm">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <br>
                            <?php endif; ?>
                            <!-- Top Buttons -->
                            <div class="flex justify-end mb-4 space-x-4">



                                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                                    <!-- Clear Button -->
                                    <button type="button"
                                        class="bg-red-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm w-full sm:w-auto"
                                        onclick="clearFormFields()">
                                        Clear Fields
                                    </button>

                                    <!-- Save Button -->
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm w-full sm:w-auto">
                                        Add Job
                                    </button>
                                </div>

                            </div>
                            <div class="mb-4 p-2">
                                <label for="job_title"
                                    class="block text-md font-medium text-gray-700 dark:text-gray-200">Job
                                    Title</label>
                                <input type="text" id="job_title" name="job_title" autocomplete="off"
                                    placeholder="Enter job title" value="<?php echo e(old('job_title')); ?>"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                    focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
                                    dark:text-gray-300">
                                <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group flex space-x-4 p-2">
                                <!-- Minimum Age -->
                                <div class="w-1/2">
                                    <label for="min_age">Minimum Age</label>
                                    <input type="number" name="min_age"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                        focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
                                        dark:text-gray-300"
                                        id="min_age" value="<?php echo e(old('min_age')); ?>" required>
                                    <?php $__errorArgs = ['min_age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-red-600 mt-1"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Maximum Age -->
                                <div class="w-1/2">
                                    <label for="max_age">Maximum Age</label>
                                    <input type="number" name="max_age"
                                        class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
                                        focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
                                        dark:text-gray-300"
                                        id="max_age" value="<?php echo e(old('max_age')); ?>" required>
                                    <?php $__errorArgs = ['max_age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-red-600 mt-1"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>



                            <!-- Job Type -->
                            <div class="mb-4 p-2">
                                <label for="job_type"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Job
                                    Type</label>
                                <select id="job_type" name="job_type"
                                    class="form-select mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                                    <option value="">Select job type</option>
                                    <option value="Full-Time" <?php echo e(old('job_type') == 'Full-Time' ? 'selected' : ''); ?>>
                                        Full Time</option>
                                    <option value="Part-Time" <?php echo e(old('job_type') == 'Part-Time' ? 'selected' : ''); ?>>
                                        Part Time</option>
                                    <option value="Probationary"
                                        <?php echo e(old('job_type') == 'Probationary' ? 'selected' : ''); ?>>
                                        Probationary</option>
                                    <option value="Contractual"
                                        <?php echo e(old('job_type') == 'Contractual' ? 'selected' : ''); ?>>
                                        Contractual</option>
                                </select>
                                <?php $__errorArgs = ['job_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Salary -->
                            <div class="mb-4 p-2">
                                <label for="salary"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Salary</label>
                                <input type="number" id="salary" name="salary" autocomplete="off"
                                    placeholder="Enter salary" value="<?php echo e(old('salary')); ?>"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 p-2">
                                <?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Educational Level -->
                            <div class="mb-4 p-2">
                                <label for="educationLevel"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Educational
                                    Level Requirement</label>
                                <select id="educationLevel" name="educationLevel"
                                    class="w-full p-2 border rounded border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    autocomplete="on">
                                    <option value="" selected disabled>Select Education Level...</option>
                                    <option value="Doctoral Degree"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Doctoral Degree' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.doctoral_degree')); ?>

                                    </option>
                                    <option value="Master's Degree"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == "Master's Degree" ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.masters_degree')); ?>

                                    </option>
                                    <option value="College Graduate"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'College Graduate' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.college_graduate')); ?>

                                    </option>
                                    <option value="Bachelor's Degree"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == "Bachelor's Degree" ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.bachelors_degree')); ?>

                                    </option>
                                    <option value="Vocational Graduate"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Vocational Graduate' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.vocational_graduate')); ?>

                                    </option>
                                    <option value="Associate's Degree"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == "Associate's Degree" ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.associates_degree')); ?>

                                    </option>
                                    <option value="Some College Level"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Some College Level' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.some_college_level')); ?>

                                    </option>
                                    <option value="Vocational Undergraduate"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Vocational Undergraduate' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.vocational_undergraduate')); ?>

                                    </option>
                                    <option value="Technical-Vocational Education and Training"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Technical-Vocational Education and Training' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.technical_vocational_training')); ?>

                                    </option>
                                    <option value="Senior High School"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Senior High School' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.senior_high_school')); ?>

                                    </option>
                                    <option value="Junior High School"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Junior High School' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.junior_high_school')); ?>

                                    </option>
                                    <option value="Elementary School"
                                        <?php echo e(old('educationLevel', $education->educationLevel ?? '') == 'Elementary School' ? 'selected' : ''); ?>>
                                        <?php echo e(__('messages.education.elementary_school')); ?>

                                    </option>
                                </select>
                                <?php $__errorArgs = ['educationLevel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="mt-6 relative p-2">
                                <label for="local-location" class="block mb-1">
                                    Work Location
                                </label>
                                <div class="flex items-center space-x-2">
                                    <!-- Dropdown (Select) for Local Location -->
                                    <select id="local-location" name="local-location" aria-label="Work Location"
                                        class="flex-1 p-2 border rounded shadow-sm bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">

                                    </select>

                                    <!-- Clear Button -->
                                    <button id="clearLocationButton" type="button" aria-label="Clear"
                                        class="ml-2   px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-400">
                                        Clear
                                    </button>
                                </div>

                                <div id="local-location-error" class="text-red-600 mt-1 hidden">Error
                                    fetching location data</div>
                                <input type="text" id="localLocationHidden" name="localLocation"
                                    value="<?php echo e(old('local-location')); ?>" hidden />
                                <?php $__errorArgs = ['localLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            

                            <!-- Description -->
                            <div class="mb-4 p-2">
                                <label for="description"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="form-textarea p-2 mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Enter job description"><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Benefits -->
                            <div class="mb-4 p-2">
                                <label for="benefits"
                                    class="block p-2 text-md font-medium  text-gray-700 dark:text-gray-200">Benefits</label>
                                <textarea id="benefits" name="benefits" rows="4"
                                    class="form-textarea mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    placeholder="Enter job benefits"><?php echo e(old('benefits')); ?></textarea>
                                <?php $__errorArgs = ['benefits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Responsibilities -->
                            <div class="mb-4 p-2">
                                <label for="responsibilitySearch"
                                    class="block p-2 text-md font-medium  text-gray-700 dark:text-gray-200">Responsibilities
                                    (Press
                                    <b>Enter</b> to
                                    Add Items)</label>
                                <input type="text" id="responsibilitySearch" name="responsibilitySearch[]"
                                    class="w-full p-2 border rounded p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    list="responsibilitySuggestions"
                                    placeholder="The applicants should have experience in the following areas.">
                                <div id="responsibilitySuggestions" class="mt-2 grid  grid-cols-3 gap-2"></div>


                            </div>
                            <div class="mt-6 overflow-x-auto p-2">
                                <table id="responsibilityTable"
                                    class="w-full border-collapse p-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                                    <thead>
                                        <tr class="bg-gray-100 dark:bg-gray-700">
                                            <th
                                                class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6 text-gray-700 dark:text-gray-300">
                                                Responsibilities
                                            </th>
                                            <th class="p-2 border border-gray-200 text-gray-700 dark:text-gray-300">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="responsibilityTableBody"
                                        class="divide-y divide-gray-200 dark:divide-gray-600">
                                        <!-- Responsibilities rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>



                            <div class="mb-4 p-2">
                                <label for="hiddenResponsibilitiesInput"
                                    class="block text-sm font-medium  text-gray-700 dark:text-gray-200">Selected
                                    Responsibilities: </label>
                                <textarea id="hiddenResponsibilitiesInput" name="hiddenResponsibilitiesInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300 rounded-lg"
                                    readonly><?php echo e(old('hiddenResponsibilitiesInput')); ?></textarea>
                                <?php $__errorArgs = ['hiddenResponsibilitiesInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <!-- Qualifications -->

                            <div class="mb-4 p-2 mt-4">
                                <label for="qualifications"
                                    class="block text-md font-medium text-gray-700 dark:text-gray-200">Qualifications
                                    (Press
                                    <b>Enter</b> to
                                    Add Items)</label>
                                <input type="text" id="qualificationsInput" name="qualifications"
                                    class="form-input mt-1 p-2 block w-full rounded-md border-gray-500 dark:border-gray-600 shadow-sm 
               focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 
               dark:text-gray-300"
                                    placeholder="Enter job qualifications">
                                <?php $__errorArgs = ['qualificationsInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <div class="mt-6 overflow-x-auto p-2">
                                <table id="qualificationsTable"
                                    class="w-full border-collapse p-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                                    <thead>
                                        <tr class="bg-gray-100 dark:bg-gray-700">
                                            <th class="p-2 border border-gray-200 min-w-1/4 lg:min-w-1/6">
                                                Qualifications
                                            </th>
                                            <th class="p-2 border border-gray-200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qualificationsTableBody"
                                        class="divide-y divide-gray-700 dark:divide-gray-600">
                                        <!-- Qualifications rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>


                            <div class="mb-4 p-2">
                                <label for="hiddenQualificationsInput"
                                    class="block text-sm font-medium  text-gray-700 dark:text-gray-200">
                                    Selected Qualifications:
                                </label>
                                <textarea id="hiddenQualificationsInput" name="hiddenQualificationsInput"
                                    class="mt-1 block w-full px-3 py-2 p-2 border border-gray-300 dark:border-gray-600 
                     rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 
                     dark:bg-gray-900 dark:text-gray-300"
                                    readonly><?php echo e(old('hiddenQualificationsInput')); ?></textarea>
                                <?php $__errorArgs = ['hiddenQualificationsInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="mb-4 p-2">
                                <label for="vacancy"
                                    class="block text-md font-medium  text-gray-700 dark:text-gray-200">Vacancy</label>
                                <input type="number" id="vacancy" name="vacancy" autocomplete="off"
                                    placeholder="Enter number of vacancies" value="<?php echo e(old('vacancy')); ?>"
                                    class="form-input mt-1 block w-full rounded-md border-gray-500 dark:border-gray-600 
                  shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-300">
                                <?php $__errorArgs = ['vacancy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </form>
                    </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        var responsibilitySearch = document.getElementById('responsibilitySearch');
        var responsibilityTableBody = document.getElementById('responsibilityTableBody');
        var hiddenInput = document.getElementById('hiddenResponsibilitiesInput');

        responsibilitySearch.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var responsibilities = responsibilitySearch.value.split(',').map(function(
                    responsibility) {
                    return responsibility.trim();
                });

                // Clear the input field
                responsibilitySearch.value = '';

                // Add each responsibility as a new row in the table
                responsibilities.forEach(function(responsibility) {
                    if (responsibility && responsibilityTableBody.rows.length < 5 && !
                        isResponsibilityDuplicate(responsibility)) {
                        var row = responsibilityTableBody.insertRow();
                        var cell = row.insertCell();

                        cell.className = 'p-2 border ';
                        cell.style.maxWidth = '500px'; // Example: Adjust max-width as needed
                        cell.style.wordWrap = 'break-word'; // Ensures text wraps within cell
                        cell.innerHTML = responsibility.replace(/\n/g,
                            '<br>'); // Replace newlines with <br> for multi-line effect
                        cell.textContent = responsibility;

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-100 flex justify-center items-center ';
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                            'rounded');
                        removeButton.addEventListener('click', function() {
                            responsibilityTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else if (isResponsibilityDuplicate(responsibility)) {
                        alert('Responsibility "' + responsibility + '" is already added.');
                    }
                });

                // Update hidden input with responsibilities
                updateHiddenInput();
            }
        });

        function isResponsibilityDuplicate(responsibility) {
            var rows = responsibilityTableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === responsibility.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenInput() {
            // Convert the rows of the table to an array of responsibilities
            var responsibilities = Array.from(responsibilityTableBody.rows).map(function(row) {
                // Extract the text content of the first cell of each row and trim whitespace
                return `• ${row.cells[0].textContent.trim()}\n`; // Using '•' for bullet point
            }).join('');

            // Set the value of the hiddenInput textarea with responsibilities in bullet form
            hiddenInput.value = responsibilities;
        }

    });



    document.addEventListener('DOMContentLoaded', function() {
        var qualificationsInput = document.getElementById('qualificationsInput');
        var qualificationsTableBody = document.getElementById('qualificationsTableBody');
        var hiddenQualificationsInput = document.getElementById('hiddenQualificationsInput');

        qualificationsInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission

                var qualifications = qualificationsInput.value.trim();

                if (qualifications) {
                    qualificationsInput.value = '';

                    if (!isQualificationsDuplicate(qualifications)) {
                        var row = qualificationsTableBody.insertRow();

                        var cell = row.insertCell();
                        cell.className = 'p-2 border ';
                        cell.style.maxWidth = '500px'; // Example: Adjust max-width as needed
                        cell.style.wordWrap = 'break-word'; // Ensures text wraps within cell
                        cell.innerHTML = qualifications.replace(/\n/g,
                            '<br>');

                        var actionCell = row.insertCell();
                        actionCell.className =
                            'p-2 border border-gray-200 flex justify-center items-center'; // Flexbox utility classes for centering
                        var removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.type = 'button';
                        removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded';
                        removeButton.addEventListener('click', function() {
                            qualificationsTableBody.deleteRow(row.rowIndex - 1);
                            updateHiddenQualificationsInput();
                        });
                        actionCell.appendChild(removeButton);
                    } else {
                        alert('Qualifications "' + qualifications + '" is already added.');
                    }

                    updateHiddenQualificationsInput();
                }
            }
        });

        function isQualificationsDuplicate(qualifications) {
            var rows = qualificationsTableBody.rows;
            for (var i = 0; i < rows.length; i++) {
                var cellValue = rows[i].cells[0].textContent.trim();
                if (cellValue.toLowerCase() === qualifications.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }

        function updateHiddenQualificationsInput() {
            // Convert the rows of the qualifications table to an array of qualifications
            var qualifications = Array.from(qualificationsTableBody.rows).map(function(row) {
                return `• ${row.cells[0].textContent.trim()}\n`; // Using '•' for bullet point
            }).join('');

            hiddenQualificationsInput.value = qualifications;
        }

    });


    //CITIES

    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('local-location');
        const clearButton = document.getElementById('clearLocationButton');
        const localLocationHidden = document.getElementById('localLocationHidden');
        const errorDiv = document.getElementById('local-location-error');

        let citiesData = []; // Array to store cities data fetched from API

        // Fetch cities data from the API
        fetch('/locations/cities.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                citiesData = data.filter(city => city.province === 'MM' && city.city);

                // Populate the dropdown with filtered cities data
                populateLocationDropdown(citiesData);
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
                errorDiv.classList.remove('hidden');
            });


        // Populate the dropdown with location options
        function populateLocationDropdown(cities) {
            locationSelect.innerHTML =
                '<option value="" disabled selected>Select a Location</option>'; // Default option

            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = `${city.name}, ${city.province}`;
                option.textContent = `${city.name}, ${city.province}`;
                locationSelect.appendChild(option);
            });

            // Set selected value to the saved location if available
            if (localLocationHidden.value) {
                locationSelect.value = localLocationHidden.value;
            }

            // Update hidden input value on selection change
            locationSelect.addEventListener('change', function() {
                localLocationHidden.value = this.value;
            });
        }

        // Clear button functionality
        clearButton.addEventListener('click', function() {
            locationSelect.value = ''; // Clear the dropdown selection
            localLocationHidden.value = ''; // Clear the hidden input field
        });

        // Edit button functionality (optional if you want to include it)
        const editLocationButton = document.getElementById('editLocationButton');
        if (editLocationButton) {
            editLocationButton.addEventListener('click', function() {
                locationSelect.removeAttribute('disabled'); // Enable dropdown for editing
                locationSelect.focus(); // Focus on the select field
            });
        }
    });
    // document.addEventListener('DOMContentLoaded', function() {
    //     const localLocationInput = document.getElementById('local-location');
    //     const localLocationHidden = document.getElementById('localLocationHidden');
    //     const suggestionsContainer = document.getElementById('local-location-suggestions');
    //     const editLocationButton = document.getElementById('editLocationButton');
    //     const errorDiv = document.getElementById('local-location-error');

    //     let citiesData = []; // Array to store cities data fetched from API

    //     fetch('/locations/cities.json')
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             citiesData = data;

    //             // Event listener for input changes
    //             localLocationInput.addEventListener('input', function() {
    //                 const query = this.value.trim().toLowerCase();
    //                 const filteredCities = citiesData.filter(city =>
    //                     city.name.toLowerCase().includes(query)
    //                 ).slice(0, 6); // Limit to 10 results

    //                 renderSuggestions(filteredCities, query);
    //             });
    //         })
    //         .catch(error => {
    //             console.error('Error fetching city data:', error);
    //             errorDiv.classList.remove('hidden');
    //         });

    //     editLocationButton.addEventListener('click', function() {
    //         localLocationInput.value = ''; // Clear input value
    //         localLocationInput.focus(); // Set focus on input field
    //         localLocationInput.removeAttribute('readonly');
    //         suggestionsContainer.style.display = 'none'; // Hide suggestions
    //         editLocationButton.style.display = 'none'; // Show edit button
    //         localLocationHidden.value = ``

    //     });



    //     function renderSuggestions(cities, query) {
    //         suggestionsContainer.innerHTML = ''; // Clear previous suggestions
    //         suggestionsContainer.style.display = cities.length && query ? 'block' : 'none';

    //         cities.forEach(city => {
    //             const suggestionElement = document.createElement('div');
    //             suggestionElement.classList.add('suggestion', 'dark:bg-gray-800',
    //                 'dark:text-white'); // Example dark mode classes

    //             const suggestionText = document.createElement('div');
    //             suggestionText.classList.add('suggestion-text');
    //             suggestionText.textContent =
    //                 `${city.name}, ${city.province}`; // Display city name and province

    //             const plusContainer = document.createElement('div');
    //             plusContainer.classList.add('plus-container', 'dark:bg-gray-600',
    //                 'dark:text-gray-200'); // Example dark mode classes
    //             plusContainer.innerHTML = '+';

    //             suggestionElement.appendChild(suggestionText);
    //             suggestionElement.appendChild(plusContainer);

    //             suggestionElement.addEventListener('click', function() {
    //                 localLocationInput.value =
    //                     `${city.name}, ${city.province}`; // Set input value to city name
    //                 suggestionsContainer.style.display =
    //                     'none'; // Hide suggestions after selection
    //                 editLocationButton.style.display = 'inline-block'; // Show edit button
    //                 localLocationHidden.value = `${city.name}, ${city.province}`
    //                 localLocationInput.readOnly = true;
    //             });
    //             suggestionsContainer.appendChild(suggestionElement);
    //         });
    //     }

    //     /* Handle outside click to hide suggestions
    //     document.addEventListener('click', function(event) {
    //         if (!document.getElementById('local-location-container').contains(event.target)) {
    //             suggestionsContainer.style.display = 'none';
    //         }
    //     });*/
    // });



    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(event) {
            const localLocationContainer = document.getElementById('local-location-container');
            const suggestionsContainer = document.getElementById('suggestionsContainer');

            if (localLocationContainer && suggestionsContainer) {
                if (!localLocationContainer.contains(event.target)) {
                    suggestionsContainer.style.display = 'none';
                }
            } else {
                console.error('Local location container or suggestions container not found.');
            }
        });



        function clearFormFields() {
            // Clear job type select
            document.getElementById('job_title').value = '';
            document.getElementById('job_type').value = '';
            document.getElementById('salary').value = '';
            document.getElementById('educationLevel').value = '';
            document.getElementById('local-location').value = '';
            document.getElementById('description').value = '';
            document.getElementById('benefits').value = '';
            document.getElementById('responsibilitySearch').value = '';
            document.getElementById('responsibilityTableBody').innerHTML = '';
            document.getElementById('hiddenResponsibilityInput').value = '';
            document.getElementById('qualificationsInput').value = '';
            document.getElementById('qualificationsTableBody').innerHTML = '';
            document.getElementById('hiddenQualificationsInput').value = '';
            document.getElementById('vacancy').value = '';
        }
    });
</script>


</script>
<style>
    .suggestion {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        background-color: white;
        cursor: pointer;
        border-radius: 4px;
        margin-bottom: 4px;
    }

    .suggestion-text {
        flex: 1;
    }

    .plus-container {
        background-color: #5cb85c;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        margin-left: 8px;
    }

    .plus-container:hover {
        background-color: #4cae4c;
    }

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(155, 155, 155, 0.5) rgba(255, 255, 255, 0.2);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(155, 155, 155, 0.5);
        border-radius: 8px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .custom-shadow {
        /* Box Shadow */
        box-shadow: 0 4px 6px rgba(0, 0, 0.4, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        /* Transition for smooth hover effect (optional) */
        transition: box-shadow 0.3s ease;
    }

    .custom-shadow:hover {
        /* Adjust shadow on hover if desired */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.08);
    }
</style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\employer\jobsinfo.blade.php ENDPATH**/ ?>