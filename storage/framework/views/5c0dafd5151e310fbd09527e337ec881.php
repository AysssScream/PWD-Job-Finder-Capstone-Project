 <h2 class="text-2xl font-bold mb-2">EDUCATIONAL BACKGROUND</h2>
 <hr class="border-bottom border-2 border-primary mb-4">
 <form action="<?php echo e(route('profile.update.education-info')); ?>" method="POST">
     <?php echo csrf_field(); ?>
     <?php echo method_field('PATCH'); ?>
     <div class="mt-6">
         <label for="educationLevel"
             class="block mb-1"><?php echo e(__('messages.education.highest_educational_attainment')); ?></label>
         <select id="educationLevel" name="educationLevel"
             class="w-full p-2  border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             autocomplete="on" aria-label="<?php echo e(__('messages.education.highest_educational_attainment')); ?>">
             <option value="" selected disabled>Select Education Level...
             </option>
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

     <div class="mt-6">
         <label for="school" class="block mb-1"><?php echo e(__('messages.education.school_graduated')); ?>

         </label>
         <input type="text" id="school" name="school" placeholder="Jose Rizal University"
             class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
             title="Please enter alphabetic characters only" value="<?php echo e(old('school', $education->school ?? '')); ?>"
             aria-label="<?php echo e(__('messages.education.school_graduated')); ?> <?php echo e(old('school', $education->school ?? '')); ?>" />
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
         <label for="course" class="block mb-1"><?php echo e(__('messages.education.course')); ?></label>
         <input type="text" id="course" name="course" placeholder="Bachelor of Science in Information Technology"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             value="<?php echo e(old('course', $education->course ?? '')); ?>"
             aria-label="<?php echo e(__('messages.education.course')); ?> <?php echo e(old('course', $education->course ?? '')); ?>" />
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
         <label for="yearGraduated" class="block mb-1"><?php echo e(__('messages.education.year_graduated')); ?></label>
         <input type="number" id="yearGraduated" name="yearGraduated"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             min="1900" max="2099" placeholder="Year Graduated"
             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
             maxlength="4" value="<?php echo e(old('yearGraduated', $education->yearGraduated ?? '')); ?>"
             aria-label="<?php echo e(__('messages.education.year_graduated')); ?> <?php echo e(old('yearGraduated', $education->yearGraduated ?? '')); ?>" />
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

     <div class="mt-6">
         <label for="awards" class="block mb-1"><?php echo e(__('messages.education.awards')); ?></label>
         <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             aria-label="<?php echo e(__('messages.education.awards')); ?> <?php echo e(old('awards', $education->awards ?? '')); ?>"><?php echo e(old('awards', $education->awards ?? '')); ?></textarea>
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

     <div class="flex items-center gap-4 ">
         <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'mt-6','ariaLabel' => 'Save Changes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','aria-label' => 'Save Changes']); ?><?php echo e(__('Save Changes')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

         <?php if(session('status') === 'profile-updated'): ?>
             <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                 class="text-md font-semibold text-green-400 dark:text-gray-400">
                 <?php echo e(__('Saved.')); ?>

             </p>
         <?php endif; ?>
     </div>
 </form>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\education.blade.php ENDPATH**/ ?>