  <link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">
  <section>
      <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
              aria-label="<?php echo e(__('messages.profile.update_password')); ?>" tabindex="0">
              <?php echo e(__('messages.profile.update_password')); ?>

          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
              aria-label="<?php echo e(__('messages.profile.password_security')); ?>" tabindex="0">
              <?php echo e(__('messages.profile.password_security')); ?>

          </p>
      </header>

      <form method="post" action="<?php echo e(route('password.passupdate')); ?>" class="mt-6 space-y-6">
          <?php echo csrf_field(); ?>
          <?php echo method_field('put'); ?>



          <div>
              <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'update_password_current_password','value' => __('Current Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_current_password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Current Password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal598bbf3c7a07693bcabe5562f409a70e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password-text','data' => ['id' => 'update_password_current_password','type' => 'password','name' => 'current_password','placeholder' => ''.e(__('messages.profile.current_password')).'','required' => true,'autocomplete' => 'current-password','ariaLabel' => ''.e(__('messages.profile.current_password')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_current_password','type' => 'password','name' => 'current_password','placeholder' => ''.e(__('messages.profile.current_password')).'','required' => true,'autocomplete' => 'current-password','aria-label' => ''.e(__('messages.profile.current_password')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $attributes = $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $component = $__componentOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->updatePassword->get('current_password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('current_password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

          </div>

          <div>
              <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'update_password_password','value' => __('New Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('New Password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginal598bbf3c7a07693bcabe5562f409a70e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password-text','data' => ['id' => 'update_password_password','type' => 'password','name' => 'password','placeholder' => ''.e(__('messages.profile.new_password')).'','autocomplete' => 'new-password','ariaLabel' => ''.e(__('messages.profile.new_password')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_password','type' => 'password','name' => 'password','placeholder' => ''.e(__('messages.profile.new_password')).'','autocomplete' => 'new-password','aria-label' => ''.e(__('messages.profile.new_password')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $attributes = $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $component = $__componentOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->updatePassword->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
              <div id="password-requirements" class="text-md mt-1 text-gray-700 dark:text-gray-200">
              </div>
          </div>

          <div>
              <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'update_password_password_confirmation','value' => __('Confirm Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_password_confirmation','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirm Password'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginal598bbf3c7a07693bcabe5562f409a70e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password-text','data' => ['id' => 'update_password_password_confirmation','type' => 'password','name' => 'password_confirmation','placeholder' => ''.e(__('messages.profile.confirm_password')).'','autocomplete' => 'new-password','ariaLabel' => ''.e(__('messages.profile.confirm_password')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_password_confirmation','type' => 'password','name' => 'password_confirmation','placeholder' => ''.e(__('messages.profile.confirm_password')).'','autocomplete' => 'new-password','aria-label' => ''.e(__('messages.profile.confirm_password')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $attributes = $__attributesOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__attributesOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e)): ?>
<?php $component = $__componentOriginal598bbf3c7a07693bcabe5562f409a70e; ?>
<?php unset($__componentOriginal598bbf3c7a07693bcabe5562f409a70e); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->updatePassword->get('password_confirmation'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('password_confirmation')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
          </div>

          <div class="flex items-center gap-4 mb-5">
              <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['ariaLabel' => 'Save','tabindex' => '0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-label' => 'Save','tabindex' => '0']); ?><?php echo e(__('Save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

              
              <p><?php echo e(session('status')); ?></p>

              <?php if(session('status') === 'password-updated'): ?>
                  <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                      class="text-sm text-green-600 dark:text-green-400"> 
                      <?php echo e(__('Saved.')); ?>

                  </p>
              <?php endif; ?>
          </div>


      </form>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
              const passwordInput = document.getElementById('update_password_password');
              const requirementsMessage = document.getElementById('password-requirements');

              passwordInput.addEventListener('input', function() {
                  const password = passwordInput.value;
                  let requirements = [];

                  // Check password length
                  if (password.length >= 8) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 8 characters');
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 8 characters');
                  }

                  // Check for special character
                  if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 special character'
                      );
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 1 special character');
                  }

                  // Check for number
                  if (/\d/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 number');
                  } else {
                      requirements.push('<i class="fas fa-times-circle text-red-500"></i> At least 1 number');
                  }

                  // Check for uppercase letter
                  if (/[A-Z]/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 uppercase letter'
                      );
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 1 uppercase letter');
                  }

                  // Update requirements message
                  requirementsMessage.innerHTML = requirements.join('<br>');
              });
          });
      </script>
  </section>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\partials\update-password-form.blade.php ENDPATH**/ ?>