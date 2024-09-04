 <h2 class="text-2xl font-bold mb-2" aria-label="Employment History">EMPLOYMENT HISTORY</h2>
 <hr class="border-bottom border-2 border-primary mb-4">

 <form action="<?php echo e(route('profile.update.employment-info')); ?>" method="POST">
     <?php echo csrf_field(); ?>
     <?php echo method_field('PATCH'); ?>
     <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
         <div class="overflow-x-auto">
             <div style="text-align: left;">
                 <a href="<?php echo e(route('editemployment')); ?>"
                     class="btn btn-primary 
                    border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                     onclick="clearLocalStorage()" aria-label="<?php echo e(__('messages.employment.modify_work_experience')); ?>"
                     tabindex="0">
                     <i class="fas fa-edit mr-2"></i> <?php echo e(__('messages.employment.modify_work_experience')); ?>

                 </a>
             </div>

             <script>
                 function clearLocalStorage() {
                     localStorage.removeItem('formData'); // Replace 'your-storage-key' with your actual storage key
                 }
             </script>
         </div>
     </div>

     <div id="employment-type-options" class="mt-6">
         <label for="employment-type"
             class="block mb-1"><?php echo e(__('messages.employment.specify_current_employment')); ?></label>
         <select id="employment-type" name="employment-type"
             aria-label="The employment type is <?php echo e(old('employment-type', $employment->employment_type ?? '')); ?>"
             class="w-full 
                border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
             <option value="" selected disabled><?php echo e(__('messages.employment.please_select_employment_status')); ?>

             </option>
             <optgroup label="Employed">
                 <option value="Wage Employment"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Wage Employment' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.wage_employment')); ?>

                 </option>
                 <option value="Self Employed"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Self Employed' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.self_employed')); ?></option>
                 <option value="Others"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Others' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.others')); ?>

                 </option>
             </optgroup>
             <!-- Unemployed Options -->
             <optgroup label="Unemployed">
                 <option value="Entrant/Fresh Graduate"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Entrant/Fresh Graduate' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.entrant_fresh_graduate')); ?>

                 </option>
                 <option value="Finished Contract"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Finished Contract' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.finished_contract')); ?></option>
                 <option value="Resigned"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Resigned' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.resigned')); ?></option>
                 <option value="Retired"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Retired' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.retired')); ?>

                 </option>
                 <option value="Terminated Due to Calamity"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Terminated Due to Calamity' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.terminated_due_to_calamity')); ?>

                 </option>
                 <option value="Teminated Local"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Teminated Local' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.terminated_local')); ?>

                 </option>
                 <option value="Terminated Abroad"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Terminated Abroad' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.terminated_abroad')); ?>

                 </option>
                 <option value="Other"
                     <?php echo e(old('employment-type', $employment->employment_type ?? '') == 'Other' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.unemployed_others')); ?> </option>
             </optgroup>
         </select>
         <?php $__errorArgs = ['employment-type'];
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

     <div id="job-search-duration" class="mt-6">
         <label for="job-search-duration"
             class="block mb-1"><?php echo e(__('messages.employment.how_long_job_search')); ?></label>
         <div class="flex flex-wrap items-center">
             <input type="number" id="job-search-duration"
                 placeholder="<?php echo e(__('messages.employment.specify_duration')); ?>" name="job-search-duration"
                 aria-label=" The user is looking for a job in <?php echo e(old('job-search-duration', $employment->job_search_duration ?? '')); ?>   <?php echo e(old('duration-category', $employment->duration_category ?? '')); ?> "
                 class="w-full mb-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                 value="<?php echo e(old('job-search-duration', $employment->job_search_duration ?? '')); ?>">
             <select id="duration-category" name="duration-category"
                 aria-label="The duration was set to <?php echo e(old('duration-category', $employment->duration_category ?? '')); ?>"
                 class="w-full 
                border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                 <option value="Days"
                     <?php echo e(old('duration-category', $employment->duration_category ?? '') === 'Days' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.days')); ?></option>
                 <option value="Weeks"
                     <?php echo e(old('duration-category', $employment->duration_category ?? '') === 'Weeks' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.weeks')); ?></option>
                 <option value="Months"
                     <?php echo e(old('duration-category', $employment->duration_category ?? '') === 'Months' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.months')); ?></option>
                 <option value="Years"
                     <?php echo e(old('duration-category', $employment->duration_category ?? '') === 'Years' ? 'selected' : ''); ?>>
                     <?php echo e(__('messages.employment.years')); ?></option>
             </select>
         </div>
         <?php $__errorArgs = ['job-search-duration'];
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'mt-6 ','ariaLabel' => 'Save Changes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6 ','aria-label' => 'Save Changes']); ?><?php echo e(__('Save Changes')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\employment.blade.php ENDPATH**/ ?>