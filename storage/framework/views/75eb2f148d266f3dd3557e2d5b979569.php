<nav x-data="{ open: false }" class=" bg-white p-4 py-4 dark:bg-gray-800 dark: shadow-lg" id="custom-navbar">

    <div class="container mx-auto flex justify-center items-center h-full">
        <!-- Logo -->

        <div style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer;"
            onclick="redirectToHomepage()">
            <img src="/images/lightnavbarlogo.png" width="200" height="200" id="navbarLogo"
                style="max-width: 100%; height: auto; margin-right: 8rem;" alt="My Website">
        </div>


        <!-- Desktop Navigation Links -->
        <div class="hidden space-x-8 sm:flex justify-center items-center">
            <a href="<?php echo e(url('/')); ?>" class="nav-link">
            </a>
            <a href="<?php echo e(url('/')); ?>" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <?php echo e(__('messages.navigation.HOME')); ?>

            </a>
            <a href="<?php echo e(route('aboutus')); ?>" class="nav-link">
                <i class="fas fa-info-circle"></i> <!-- Example of an about icon -->
                <?php echo e(__('messages.navigation.ABOUT US')); ?>

            </a>
            <a href="<?php echo e(url('/')); ?>" class="nav-link">
                <i class="fas fa-envelope"></i> <!-- Example of a contact icon -->
                <?php echo e(__('messages.navigation.ASK FOR SUPPORT')); ?>

            </a>
            
            <?php
                $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            ?>

            <?php if($currentRoute !== 'password.reset' && $currentRoute !== 'verification.emailnotice'): ?>
                <a href="<?php echo e($currentRoute === 'login' ? url('register') : url('login')); ?>" class="nav-link">
                    <i class="<?php echo e($currentRoute === 'login' ? 'fas fa-right-to-bracket' : 'fas fa-user'); ?>"></i>
                    <!-- Example of an FAQ icon -->
                    <?php echo e($currentRoute === 'login' ? __('messages.registration.NOT YET REGISTERED?') : __('messages.registration.ALREADY REGISTERED?')); ?>

                </a>
            <?php endif; ?>


        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="flex items-start sm:hidden">
            <button @click="open = !open" id="navbar-toggle"
                class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => url('/'),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(url('/')),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']); ?>
                    <?php echo e(__('Home Page')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('login'),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('login')),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']); ?>
                    <?php echo e(__('Login')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('register'),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('register')),'class' => 'block px-4 py-2 text-white hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white']); ?>
                    <?php echo e(__('Register')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
            </div>
        </div>
</nav>

<script>
    function redirectToHomepage() {
        window.location.href = '<?php echo e(url('/')); ?>';
    }
</script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\components\loginavbar.blade.php ENDPATH**/ ?>