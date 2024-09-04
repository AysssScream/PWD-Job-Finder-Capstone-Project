<?php if(Auth::user()->usertype === 'employer'): ?>
    <h2 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-100" aria-label="Applicant Profile">EMPLOYER PROFILE
    <?php elseif(Auth::user()->usertype === 'user'): ?>
        <h2 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-100" aria-label="Applicant Profile">APPLICANT
            PROFILE
<?php endif; ?>
</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="<?php echo e(route('profile.update.applicant-profile')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="mt-6 ">
        <label for="gender" class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('Email')); ?></label>
        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'email','name' => 'email','type' => 'email','class' => 'mt-1 block w-full','value' => old('email', $user->email),'required' => true,'autocomplete' => 'username','ariaLabel' => ''.e(__('Email')).' '.e(old('email', $user->email)).' ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','name' => 'email','type' => 'email','class' => 'mt-1 block w-full','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email', $user->email)),'required' => true,'autocomplete' => 'username','aria-label' => ''.e(__('Email')).' '.e(old('email', $user->email)).' ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('email')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email'))]); ?>
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

        <?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()): ?>
            <div>
                <p class=" mt-2 text-gray-800 dark:text-gray-200">
                    <?php echo e(__('messages.applicant.email_unverified')); ?>


                    <button form="send-verification"
                        class="underline  text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        <?php echo e(__('messages.applicant.verification_email')); ?>

                    </button>
                </p>

                <?php if(session('status') === 'verification-link-sent'): ?>
                    <p class="mt-2 font-medium  text-green-600 dark:text-green-400">
                        <?php echo e(__('messages.applicant.verification_link_sent')); ?>

                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if(Auth::user()->usertype === 'user'): ?>

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('messages.applicant.firstname')); ?></label>
            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'firstname','name' => 'firstname','type' => 'text','class' => 'mt-1 block w-full','value' => old('firstname', $applicant->firstname ?? ''),'required' => true,'autofocus' => true,'autocomplete' => 'firstname','ariaLabel' => ''.e(__('messages.applicant.firstname')).' '.e(old('firstname', $applicant->firstname ?? '')).' ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'firstname','name' => 'firstname','type' => 'text','class' => 'mt-1 block w-full','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('firstname', $applicant->firstname ?? '')),'required' => true,'autofocus' => true,'autocomplete' => 'firstname','aria-label' => ''.e(__('messages.applicant.firstname')).' '.e(old('firstname', $applicant->firstname ?? '')).' ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('firstname')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('firstname'))]); ?>
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

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('messages.applicant.middlename')); ?></label>
            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'middlename','name' => 'middlename','type' => 'text','class' => 'mt-1 block w-full','value' => old('middlename', $applicant->middlename ?? ''),'autocomplete' => 'middlename','ariaLabel' => ''.e(__('messages.applicant.middlename')).' '.e(old('middlename', $applicant->middlename ?? '')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'middlename','name' => 'middlename','type' => 'text','class' => 'mt-1 block w-full','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('middlename', $applicant->middlename ?? '')),'autocomplete' => 'middlename','aria-label' => ''.e(__('messages.applicant.middlename')).' '.e(old('middlename', $applicant->middlename ?? '')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('middlename')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('middlename'))]); ?>
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

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('messages.applicant.lastname')); ?></label>
            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'lastname','name' => 'lastname','type' => 'text','class' => 'mt-1 block w-full','value' => old('lastname', $applicant->lastname ?? ''),'required' => true,'autocomplete' => 'lastname','ariaLabel' => ''.e(__('messages.applicant.lastname')).' '.e(old('lastname', $applicant->lastname ?? '')).' ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'lastname','name' => 'lastname','type' => 'text','class' => 'mt-1 block w-full','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('lastname', $applicant->lastname ?? '')),'required' => true,'autocomplete' => 'lastname','aria-label' => ''.e(__('messages.applicant.lastname')).' '.e(old('lastname', $applicant->lastname ?? '')).' ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('lastname')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('lastname'))]); ?>
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
        <?php if(Auth::user()->account_verification_status === 'approved'): ?>

            <div class="mt-6">
                <label for="birthdate"
                    class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('messages.applicant.birthdate')); ?></label>
                <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'birthdate','name' => 'birthdate','type' => 'date','class' => 'mt-1 block w-full text-gray-800 dark:text-gray-100','value' => old('birthdate', $applicant->birthdate ?? ''),'required' => true,'autocomplete' => 'birthdate','readonly' => true,'ariaLabel' => ''.e(__('messages.applicant.birthdate')).' '.e(old('birthdate', $applicant->birthdate ?? '')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'birthdate','name' => 'birthdate','type' => 'date','class' => 'mt-1 block w-full text-gray-800 dark:text-gray-100','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('birthdate', $applicant->birthdate ?? '')),'required' => true,'autocomplete' => 'birthdate','readonly' => true,'aria-label' => ''.e(__('messages.applicant.birthdate')).' '.e(old('birthdate', $applicant->birthdate ?? '')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                <?php $__errorArgs = ['birthdate'];
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
                <label for="suffix"
                    class="block mb-1 text-gray-800 dark:text-gray-100"><?php echo e(__('messages.applicant.suffix')); ?></label>
                <select id="suffix" name="suffix"
                    aria-label="<?php echo e(__('messages.applicant.suffix')); ?> <?php echo e(old('suffix', $applicant->suffix ?? '')); ?>"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="None" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'None' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_none')); ?></option>
                    <option value="Sr." <?php echo e(old('suffix', $applicant->suffix ?? '') == 'Sr.' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_sr')); ?></option>
                    <option value="Jr." <?php echo e(old('suffix', $applicant->suffix ?? '') == 'Jr.' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_jr')); ?></option>
                    <option value="I" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'I' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_i')); ?></option>
                    <option value="II" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'II' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_ii')); ?></option>
                    <option value="III" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'III' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_iii')); ?></option>
                    <option value="IV" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'IV' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_iv')); ?></option>
                    <option value="V" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'V' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_v')); ?></option>
                    <option value="VI" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VI' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_vi')); ?></option>
                    <option value="VII" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VII' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_vii')); ?></option>
                    <option value="VIII" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'VIII' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_viii')); ?></option>
                    <option value="IX" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'IX' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_ix')); ?></option>
                    <option value="X" <?php echo e(old('suffix', $applicant->suffix ?? '') == 'X' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.suffix_x')); ?></option>
                </select>
                <?php $__errorArgs = ['suffix'];
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
                <label for="gender" class="block mb-1 text-gray-800 dark:text-gray-100">
                    <?php echo e(__('messages.applicant.gender')); ?>

                </label>
                <select id="gender" name="gender"
                    aria-label="<?php echo e(__('messages.applicant.gender', ['value' => old('gender', $applicant->gender ?? '')])); ?>"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="Male" <?php echo e(old('gender', $applicant->gender ?? '') == 'Male' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.male')); ?>

                    </option>
                    <option value="Female" <?php echo e(old('gender', $applicant->gender ?? '') == 'Female' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.female')); ?>

                    </option>
                    <option value="Other" <?php echo e(old('gender', $applicant->gender ?? '') == 'Other' ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.applicant.other')); ?>

                    </option>
                </select>
                <?php $__errorArgs = ['gender'];
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
        <?php endif; ?>
    <?php endif; ?>

</form>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\applicant.blade.php ENDPATH**/ ?>