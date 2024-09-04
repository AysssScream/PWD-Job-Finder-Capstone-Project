      <!DOCTYPE html>
      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
          <link rel="stylesheet" href="/css/steps.css">

      </head>
      <div class="py-12">
          <div class="container mx-auto">
              <div class="flex justify-center">
                  <div class="w-full">
                      <form action="<?php echo e(route('educationalbg')); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <?php if($errors->any()): ?>
                              <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-700 dark:text-gray-100 dark:border-red-600 dark:text-red-200 px-4 py-3 rounded relative"
                                  role="alert">
                                  <strong class="font-bold">Oops!</strong>
                                  <span class="block sm:inline">There were some errors with your submission:</span>
                                  <ul class="mt-3 list-disc list-inside text-sm">
                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li><?php echo e($error); ?></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                              </div>
                              <br>
                          <?php endif; ?>

                          <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                              <div class="p-6">
                                  <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                      tabindex="0">
                                      Educational Background
                                      <?php
                                          $currentStep = 6; // Set this dynamically based on your current step
                                          $totalSteps = 7; // Total number of steps (adjusted to 8)
                                          $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                      ?>
                                      <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                          <div
                                              class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                              <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                  style="width: <?php echo e($percentage); ?>%;"></div>
                                          </div>
                                          <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                              Step <?php echo e($currentStep); ?>/<?php echo e($totalSteps); ?> : <span
                                                  class="text-green-600"><?php echo e($percentage); ?>%</span>
                                          </div>
                                      </div>
                                  </h3>
                                  <div>
                                      <nav class="text-sm" aria-label="Breadcrumb">
                                          <ol class="list-none p-0 inline-flex">
                                              <li class="flex items-center">
                                                  <i class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                      tabindex="0"></i>
                                                  <a href="<?php echo e(route('workexp')); ?>"
                                                      class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">Language
                                                      Proficiency and Other Skills</a>
                                                  <span class="mx-2 text-gray-500">/</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <span
                                                      class="text-blue-500 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                      tabindex="0">Educational
                                                      Background</span>
                                              </li>
                                          </ol>
                                      </nav>
                                  </div>
                                  <hr class="border-t-2 border-gray-400 rounded-full my-4">
                                  <div class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                      tabindex="0" aria-label=" <?php echo __('messages.education.instruction'); ?>">
                                      <span class="text-md font-regular" style="text-align: justify;">
                                          <?php echo __('messages.education.instruction'); ?>

                                      </span>
                                  </div>
                                  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                      <div>
                                          <?php echo $__env->make('layouts.dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                      </div>
                                      <div>
                                          <div class="mt-6">
                                              <label for="educationLevel"
                                                  class="block mb-1"><?php echo e(__('messages.education.highest_educational_attainment')); ?>

                                                  <i class="fas fa-asterisk text-red-500 text-xs"></i></label>
                                              <select id="educationLevel" name="educationLevel"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  autocomplete="on"
                                                  aria-label="<?php echo e(__('messages.education.highest_educational_attainment')); ?>">
                                                  <option value="" selected disabled>Select Education Level...
                                                  </option>
                                                  <option value="Doctoral Degree"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Doctoral Degree' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.doctoral_degree')); ?>

                                                  </option>
                                                  <option value="Master's Degree"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == "Master's Degree" ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.masters_degree')); ?>

                                                  </option>
                                                  <option value="College Graduate"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'College Graduate' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.college_graduate')); ?>

                                                  </option>
                                                  <option value="Bachelor's Degree"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == "Bachelor's Degree" ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.bachelors_degree')); ?>

                                                  </option>
                                                  <option value="Vocational Graduate"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Graduate' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.vocational_graduate')); ?>

                                                  </option>
                                                  <option value="Associate's Degree"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == "Associate's Degree" ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.associates_degree')); ?>

                                                  </option>
                                                  <option value="Some College Level"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Some College Level' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.some_college_level')); ?>

                                                  </option>
                                                  <option value="Vocational Undergraduate"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Undergraduate' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.vocational_undergraduate')); ?>

                                                  </option>
                                                  <option value="Technical-Vocational Education and Training"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Technical-Vocational Education and Training' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.technical_vocational_training')); ?>

                                                  </option>
                                                  <option value="Senior High School"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Senior High School' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.senior_high_school')); ?>

                                                  </option>
                                                  <option value="Junior High School"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Junior High School' ? 'selected' : ''); ?>>
                                                      <?php echo e(__('messages.education.junior_high_school')); ?>

                                                  </option>
                                                  <option value="Elementary School"
                                                      <?php echo e(old('educationLevel', $formData6['educationLevel'] ?? '') == 'Elementary School' ? 'selected' : ''); ?>>
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

                                          <div class="mt-6">
                                              <label for="school"
                                                  class="block mb-1"><?php echo e(__('messages.education.school_graduated')); ?></label>
                                              <input type="text" id="school" name="school"
                                                  aria-label="<?php echo e(__('messages.education.school_graduated')); ?>"
                                                  placeholder="Jose Rizal University"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  title="Please enter alphabetic characters only"
                                                  value="<?php echo e(old('school', $formData6['school'] ?? '')); ?>" />
                                              <?php $__errorArgs = ['school'];
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

                                          <div class="mt-6">
                                              <label for="course"
                                                  class="block mb-1"><?php echo e(__('messages.education.course')); ?></label>
                                              <input type="text" id="course" name="course"
                                                  aria-label="<?php echo e(__('messages.education.course')); ?>"
                                                  placeholder="Bachelor of Science in Information Technology"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  value="<?php echo e(old('course', $formData6['course'] ?? '')); ?>" />
                                              <?php $__errorArgs = ['course'];
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

                                          <div class="mt-6">
                                              <label for="yearGraduated"
                                                  class="block mb-1"><?php echo e(__('messages.education.year_graduated')); ?></label>
                                              <input type="number" id="yearGraduated" name="yearGraduated"
                                                  aria-label="<?php echo e(__('messages.education.year_graduated')); ?>"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                  min="1900" max="2099" placeholder="Year Graduated"
                                                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                  maxlength="4"
                                                  value="<?php echo e(old('yearGraduated', $formData6['yearGraduated'] ?? '')); ?>" />
                                              <?php $__errorArgs = ['yearGraduated'];
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
                                      </div>
                                      <div>

                                          <div class="mt-6">
                                              <label for="awards"
                                                  class="block mb-1"><?php echo e(__('messages.education.awards')); ?></label>
                                              <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
                                                  aria-label="<?php echo e(__('messages.education.awards')); ?>"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"><?php echo e(old('awards', $formData6['awards'] ?? '')); ?></textarea>
                                              <?php $__errorArgs = ['awards'];
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
                                      </div>
                                  </div>
                                  <div class="mt-4 text-right">
                                      <a href="<?php echo e(route('dialect')); ?>" aria-label="<?php echo e(__('messages.previous')); ?>"
                                          class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 mr-2">
                                          <?php echo e(__('messages.previous')); ?></a>

                                      <button type="submit" aria-label=" <?php echo e(__('messages.save')); ?>"
                                          class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                          <?php echo e(__('messages.save')); ?></button>
                                  </div>
                              </div>

                          </div>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/steps/step6.blade.php ENDPATH**/ ?>