   <h2 class="text-2xl font-bold mb-2">PWD INFORMATION</h2>
   <hr class="border-bottom border-2 border-primary mb-4">
   <form action="<?php echo e(route('profile.update.pwd-info')); ?>" method="POST">
       <?php echo csrf_field(); ?>
       <?php echo method_field('PATCH'); ?>
       <div>
           <div class="mt-6">
               <div class="flex flex-col mr-4 w-full ">
                   <label for="disabilityOccurrence"
                       class="block mb-1"><?php echo e(__('messages.pwdinfo.disability_occurrence.label')); ?></label>
                   <select id="disabilityOccurrence" name="disabilityOccurrence"
                       class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                       onchange="toggleOtherDisabilityField()"
                       aria-label="<?php echo e(__('messages.pwdinfo.disability_occurrence.label')); ?>">
                       <option value="" selected disabled>
                           <?php echo e(__('messages.pwdinfo.disability_occurrence.placeholder')); ?>

                       </option>
                       <option value="Birth"
                           <?php echo e(old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Birth' ? 'selected' : ''); ?>>
                           <?php echo e(__('messages.pwdinfo.disability_occurrence.options.birth')); ?>

                       </option>
                       <option value="Before Employment"
                           <?php echo e(old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Before Employment' ? 'selected' : ''); ?>>
                           <?php echo e(__('messages.pwdinfo.disability_occurrence.options.before_employment')); ?>

                       </option>
                       <option value="After Employment"
                           <?php echo e(old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'After Employment' ? 'selected' : ''); ?>>
                           <?php echo e(__('messages.pwdinfo.disability_occurrence.options.after_employment')); ?>

                       </option>
                       <option value="Other"
                           <?php echo e(old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Other' ? 'selected' : ''); ?>>
                           <?php echo e(__('messages.pwdinfo.disability_occurrence.options.other')); ?>

                       </option>
                   </select>
                   <?php $__errorArgs = ['disabilityOccurrence'];
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

               <label for="otherDisabilityDetails" class="block  mt-8">
                   <?php echo e(__('messages.pwdinfo.others_specify')); ?></label>
               <div class="flex items-center mt-2" id="otherDisabilityField">
                   <input type="text" id="otherDisabilityDetails" name="otherDisabilityDetails"
                       class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                       value="<?php echo e(old('otherDisabilityDetails', $pwdinfo->otherDisabilityDetails ?? '')); ?>"
                       placeholder="Specify Other Disability Occurrence..."
                       aria-label="<?php echo e(__('messages.pwdinfo.others_specify')); ?> <?php echo e(old('otherDisabilityDetails', $pwdinfo->otherDisabilityDetails ?? '')); ?>" />
               </div>
               <?php $__errorArgs = ['otherDisabilityDetails'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


               <label for="fileUpload" class="block mb-1 mt-6">Verified PWD ID:</label>

               <div id="imagePreview"
                   class="mt-2 max-w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                   tabindex="0" aria-label="Image Preview of PWD ID">
                   <!-- The selected image or alternate image will be displayed here -->
                   <img id="previewImage" src="<?php echo e(asset('storage/' . $pwdinfo->pwdIdPicture)); ?>"
                       onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';"
                       class="w-full h-auto block border border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-400 object-contain">
                   <img id="alternateImage" src="<?php echo e(asset('/images/preview.jpg')); ?>" alt="Alternate Image"
                       class="w-full h-auto hidden object-contain"
                       onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
               </div>



               <small class="block mt-2 text-black dark:text-gray-200">File size limit:
                   2MB</small>

               <?php $__errorArgs = ['fileUpload'];
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
       <div class="mt-6">
           <label class="block mb-2 ">Disability Status:</label>
           <div class="flex flex-wrap justify-start items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
               tabindex="0" aria-label="Disability Status">
               <div class="radio-group">
                   <input type="radio" id="disability_visual" name="disability" value="Visual" class="mr-2"
                       onchange="showTextBox()" aria-label="<?php echo e(__('messages.pwdinfo.disability_visual')); ?>"
                       <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'Visual' ? 'checked' : ''); ?>>
                   <label for="disability_visual" class="mr-4"><i class="fas fa-eye mr-1"></i>
                       <?php echo e(__('messages.pwdinfo.disability_visual')); ?></label>
               </div>
               <div class="radio-group">
                   <input type="radio" id="disability_psychosocial" name="disability" value="Psychosocial"
                       class="mr-2" onchange="showTextBox()"
                       aria-label="<?php echo e(__('messages.pwdinfo.disability_psychosocial')); ?>"
                       <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'Psychosocial' ? 'checked' : ''); ?>>
                   <label for="disability_psychosocial" class="mr-4"><i class="fas fa-brain mr-1"></i>
                       <?php echo e(__('messages.pwdinfo.disability_psychosocial')); ?></label>
               </div>
               <div class="radio-group">
                   <input type="radio" id="disability_physical" name="disability" value="Physical" class="mr-2"
                       onchange="showTextBox()" aria-label="<?php echo e(__('messages.pwdinfo.disability_physical')); ?>"
                       <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'Physical' ? 'checked' : ''); ?>>
                   <label for="disability_physical" class="mr-4"><i
                           class="fas fa-wheelchair mr-1"></i><?php echo e(__('messages.pwdinfo.disability_physical')); ?></label>
               </div>
               <div class="radio-group">
                   <input type="radio" id="disability_hearing" name="disability" value="Hearing" class="mr-2"
                       onchange="showTextBox()" aria-label=" <?php echo e(__('messages.pwdinfo.disability_hearing')); ?>"
                       <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'Hearing' ? 'checked' : ''); ?>>
                   <label for="disability_hearing" class="mr-4"><i class="fas fa-deaf mr-1"></i>
                       <?php echo e(__('messages.pwdinfo.disability_hearing')); ?></label>
               </div>
               <div class="radio-group">
                   <input type="radio" id="disability_others" name="disability" value="Others" class="mr-2"
                       onchange="showTextBox()" aria-label="<?php echo e(__('messages.pwdinfo.disability_others')); ?>"
                       <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'Others' ? 'checked' : ''); ?>>
                   <label for="disability_others" class="mr-4"><i class="fas fa-handshake mr-1"></i>
                       <?php echo e(__('messages.pwdinfo.disability_others')); ?></label>
               </div>
               <?php $__errorArgs = ['disability'];
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
           <div id="disabilityTextBox"
               class="mt-6 <?php echo e(old('disability', $pwdinfo->disability ?? '') == 'others' ? '' : ''); ?> w-full">
               <label class="block mb-2"> <?php echo e(__('messages.pwdinfo.specify_disability')); ?></label>
               <input type="text" id="disabilityDetails" name="disabilityDetails"
                   aria-label=" <?php echo e(__('messages.pwdinfo.specify_disability')); ?><?php echo e(old('disabilityDetails', $pwdinfo->disabilityDetails ?? '')); ?>"
                   tabindex=0
                   class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                   value="<?php echo e(old('disabilityDetails', $pwdinfo->disabilityDetails ?? '')); ?>"
                   placeholder="Ex. Cataract" />
               <div>
                   <?php $__errorArgs = ['disabilityDetails'];
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
       </div>
   </form>

   

   </div>
   </div>
   <script>
       function toggleOtherDisabilityField() {
           var selectElement = document.getElementById('disabilityOccurrence');
           var otherDisabilityInput = document.getElementById('otherDisabilityDetails');

           if (selectElement.value === 'Other') {
               otherDisabilityInput.disabled = false;
           } else {
               otherDisabilityInput.disabled = true;

           }
       }
       window.onload = function() {
           toggleOtherDisabilityField();
       };
       document.getElementById('disabilityOccurrence').addEventListener('change', toggleOtherDisabilityField);


       function clearLocalStorage() {
           localStorage.removeItem('formData');
       }

       function pwdIDFileChange(event) {
           const fileInput = event.target;
           const fileName = fileInput.files[0].name;
           const fileReader = new FileReader();

           document.getElementById('fileName').textContent = fileName;

           fileReader.onload = function(e) {
               const img = document.createElement('img');
               img.src = e.target.result;
               img.className = 'mt-2'; // Add margin-top for spacing

               const imagePreview = document.getElementById('imagePreview');
               imagePreview.innerHTML = ''; // Clear any previous image
               imagePreview.appendChild(img);
           };

           fileReader.readAsDataURL(fileInput.files[0]);
       }

       function profilePictureFileChange(event) {
           const fileInput = event.target;
           const fileName = fileInput.files[0].name;
           const fileReader = new FileReader();

           document.getElementById('profilePicName').textContent = fileName;

           fileReader.onload = function(e) {
               const img = document.createElement('img');
               img.src = e.target.result;
               img.className = 'mt-2';

               const imagePreview = document.getElementById('imagePreview2');
               imagePreview.innerHTML = ''; // Clear any previous image
               imagePreview.appendChild(img);
           };

           fileReader.readAsDataURL(fileInput.files[0]);
       }
   </script>
   <style>
       #imagePreview2 {
           border: 1px solid #ddd;
           padding: 5px;
           overflow: auto;
           width: 300px;
           height: 300px;
           display: flex;
           justify-content: center;
           align-items: center;
       }

       #imagePreview2 img {
           max-width: 100%;
           max-height: 100%;
           object-fit: contain;
       }

       #imagePreview {
           border: 1px solid #ddd;
           padding: 5px;
           overflow: auto;
           width: 300px;
           height: 300px;
           display: flex;
           justify-content: center;
           align-items: center;
       }

       #imagePreview img {
           max-width: 100%;
           max-height: 100%;
           object-fit: cover;
       }
   </style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/profile/sections/pwdinfo.blade.php ENDPATH**/ ?>