<link href="<?php echo e(asset('fontawesome-free-6.5.2-web/css/all.min.css')); ?>" rel="stylesheet">

<?php if(
    !(Auth::user()->usertype == 'admin' ||
        Route::currentRouteName() === 'employer.messages' ||
        Route::currentRouteName() === 'employer.sentmessages' ||
        Route::currentRouteName() === 'user.messages' ||
        Route::currentRouteName() === 'user.sentmessages'
    )): ?>
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg py-2 dark:shadow-lg" id="main-nav">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 lg:ml-12">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="<?php echo e(Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')); ?>"
                            aria-label="Website Logo" id="logo-link"
                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            <img src="<?php echo e(asset('/images/lightnavbarlogo.png')); ?>" id="mainnavbarLogo" width="150"
                                height="150" class="align-middle me-1 img-fluid" alt="My Website"
                                aria-label="Website Logo" />
                        </a>


                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var imgElement = document.getElementById('mainnavbarLogo');
                                var darkMode = localStorage.getItem('darkMode');

                                if (darkMode && darkMode === 'true') {
                                    imgElement.src = "<?php echo e(asset('/images/darknavbarlogo.png')); ?>?v=" + new Date().getTime();
                                } else {
                                    imgElement.src = "<?php echo e(asset('/images/lightnavbarlogo.png')); ?>?v=" + new Date().getTime();
                                }
                            });
                        </script>

                    </div>



                    


                    <!-- User Navigation Links -->
                    <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                        <?php if(Auth::user()->usertype == 'user'): ?>
                            <?php if(Auth::user()->account_verification_status === 'approved'): ?>
                                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => ''.e(route('dashboard')).'','active' => request()->routeIs('dashboard'),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','ariaLabel' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard')),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','aria-label' => 'Dashboard']); ?>
                                    <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon -->
                                    <?php echo e(__('Dashboard')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => ''.e(route('savedjobs')).'','active' => request()->routeIs('savedjobs'),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','ariaLabel' => '  '.e(__('messages.navigation.Saved Jobs')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('savedjobs')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('savedjobs')),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','aria-label' => '  '.e(__('messages.navigation.Saved Jobs')).'']); ?>
                                    <i class="fas fa-briefcase mr-2"></i>
                                    <!-- Font Awesome icon -->
                                    <?php echo e(__('messages.navigation.Saved Jobs')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                            <?php elseif(Auth::user()->account_verification_status === 'pending'): ?>
                                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('pendingapproval'),'active' => request()->routeIs('pendingapproval'),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','ariaLabel' => 'Getting Started']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('pendingapproval')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('pendingapproval')),'class' => 'focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400','aria-label' => 'Getting Started']); ?>
                                    <i class="fas fa-check-circle mr-2" aria-label="Getting Started"></i>
                                    <?php echo e(__('Getting Started')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>


                    <!-- Employer Navigation Links -->
                    <div class="hidden md:flex md:space-x-8 md:-my-px md:ms-10">
                        <?php if(Auth::user()->usertype == 'employer' && Auth::user()->account_verification_status === 'approved'): ?>
                            <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('employer.dashboard'),'active' => request()->routeIs('employer.dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('employer.dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('employer.dashboard'))]); ?>
                                <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon -->
                                <?php echo e(__('Dashboard')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('employer.manage'),'active' => request()->routeIs('employer.manage')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('employer.manage')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('employer.manage'))]); ?>
                                <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                                <?php echo e(__('Job Listings')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.js" defer></script>

                <div class="flex items-center space-x-4">
                    <?php if(Auth::user()->usertype == 'user'): ?>
                        <div x-data="{ showNotif: false }" class="relative">
                            <!-- Button to toggle the drawer -->
                            <button @click="showNotif = !showNotif" aria-label="Notifications"
                                class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label="There are <?php echo e(Auth::user()->applications()->whereNull('read_at')->count()); ?> Notifications">
                                <i class="fas fa-bell text-4xl"></i>
                                <!-- Font Awesome bell icon -->
                                <!-- Replace with a dynamic notification count or dot -->
                                <span x-show="!showNotif"
                                    aria-label="There are <?php echo e(Auth::user()->applications()->whereNull('read_at')->count()); ?> Notifications"
                                    class="absolute top-0 right-0 bg-red-500 rounded-full text-xs px-2 py-1 text-white"><?php echo e(Auth::user()->applications()->whereNull('read_at')->count()); ?>

                                </span>
                            </button>


                            <?php if(Session::has('message')): ?>
                                <script>
                                    $(document).ready(function() {
                                        toastr.options = {
                                            "progressBar": true,
                                            "closeButton": true,
                                        }
                                        toastr.info("<?php echo e(Session::get('message')); ?>",
                                            '<?php echo e(Auth::user()->applications()->whereNull('read_at')->count()); ?> Notifications Found', {
                                                timeOut: 5000
                                            });
                                    });
                                </script>
                            <?php endif; ?>


                            <!-- Use a template for conditional rendering -->
                            <template x-if="showNotif">
                                <div x-show="showNotif"
                                    class="fixed inset-0 flex justify-start bg-black bg-opacity-50 z-50 transition-opacity"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform -translate-x-full"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-full"
                                    @click.away="open = false">
                                    <!-- Drawer content -->
                                    <div
                                        class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-gray-100 text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg overflow-y-auto">
                                        <div class="p-4 h-full overflow-y-auto">
                                            <div
                                                class="p-2 bg-gray-200 w-full text-black dark:bg-gray-700 dark:text-gray-200 text-center">
                                                <button @click="showNotif = false"
                                                    class="text-sm text-gray-700 dark:text-gray-200 hover:text-gray-500 focus:outline-none">
                                                    Close
                                                </button>
                                            </div>

                                            <form method="POST" action="<?php echo e(route('applications.markAllAsRead')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit"
                                                    class="text-sm mt-3 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                                                    <i class="fas fa-check-circle mr-1"></i> Mark All as Read
                                                </button>
                                            </form>

                                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5">
                                                Applied Jobs</h3>

                                            <!-- Replace with actual notification items -->
                                            <?php
                                                $pendingApplications = Auth::user()
                                                    ->applications->where('status', 'pending')
                                                    ->sortByDesc('created_at');
                                            ?>

                                            <ul
                                                class="mt-4 h-52 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                                <?php $__currentLoopData = $pendingApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                        class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="rounded-full bg-blue-500 h-4 w-4"></div>
                                                            <div
                                                                class="text-sm text-gray-700 dark:text-gray-200 break-all max-w-xs">
                                                                Applied In <?php echo e($application->company_name); ?> as a
                                                                <?php echo e($application->title); ?>.
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-xs text-right text-gray-700 dark:text-gray-400">
                                                            <?php echo e($application->created_at->diffForHumans()); ?>

                                                        </span>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-5">
                                                Approved Applications
                                            </h3>
                                            <ul
                                                class="mt-4 h-96 overflow-y-auto bg-white p-4 dark:bg-gray-700 rounded-lg shadow-md">
                                                <?php $__currentLoopData = Auth::user()->applications->where('status', 'hired'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                        class="flex items-start justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                                        <div class="flex-1 flex items-start space-x-3">
                                                            <div class="rounded-full bg-green-500 h-4 w-4 mt-1"></div>
                                                            <div
                                                                class="flex-1 text-sm text-gray-700 dark:text-gray-200 break-all">
                                                                <span class="font-semibold">Hired in
                                                                    <?php echo e($application->company_name); ?></span> <br>
                                                                <span>as a <?php echo e($application->title); ?></span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <form
                                                                action="<?php echo e(route('show.remarks', [
                                                                    'remarks' => $application->remarks,
                                                                    'company_name' => $application->company_name,
                                                                ])); ?>"
                                                                method="GET">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit"
                                                                    class="text-sm text-blue-300 font-bold hover:text-blue-200 focus:outline-none">
                                                                    View
                                                                </button>
                                                            </form>

                                                            <span
                                                                class="block text-xs text-gray-700 dark:text-gray-400 mt-1">
                                                                <?php echo e($application->created_at->diffForHumans()); ?>

                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    <?php endif; ?>




                    <!-- Settings Dropdown -->
                    <div class="hidden lg:flex sm:items-center sm:ms-6 " aria-label="Profile">
                        <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                             <?php $__env->slot('trigger', null, []); ?> 
                                <button aria-label="Profile"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                                    <div
                                        class="flex-shrink-0 h-9 w-9 sm:h-11 sm:w-11 rounded-full overflow-hidden border-2 border-blue-400 bg-white">
                                        <?php if(Auth::user()->usertype === 'user'): ?>
                                            <?php if(Auth::user()->pwdInformation): ?>
                                                <img class="h-full w-full object-contain" aria-label="Profile"
                                                    src="<?php echo e(asset('storage/' . Auth::user()->pwdInformation->profilePicture)); ?>"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                                            <?php else: ?>
                                                <img class="h-full w-full object-contain"
                                                    src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Avatar">
                                            <?php endif; ?>
                                        <?php elseif(Auth::user()->usertype === 'employer'): ?>
                                            <?php if(Auth::user()->employer && Auth::user()->employer->company_logo): ?>
                                                <img class="h-full w-full object-contain" aria-label="Profile"
                                                    src="<?php echo e(asset('storage/' . Auth::user()->employer->company_logo)); ?>"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                                            <?php else: ?>
                                                <img class="h-full w-full object-contain"
                                                    src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Avatar">
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                    <!-- User Name -->
                                    <div class="ml-2" aria-label="Profile">
                                        <?php echo e(Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname); ?>

                                    </div>

                                    <!-- Dropdown Arrow -->
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            aria-label="Dropdown Profile">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                             <?php $__env->endSlot(); ?>


                             <?php $__env->slot('content', null, []); ?> 
                                <!-- Avatar -->
                                <div class="flex items-center justify-center px-7 py-5">
                                    <!-- Avatar Container -->
                                    <div
                                        class="flex-shrink-0 h-20 w-20 rounded-full overflow-hidden border-2 border-blue-400 bg-white flex items-center justify-center shadow-md">
                                        <?php if(Auth::user()->usertype === 'user'): ?>
                                            <?php if(Auth::user()->pwdInformation): ?>
                                                <img class="h-full w-full object-contain" aria-label="Profile Picture"
                                                    src="<?php echo e(asset('storage/' . Auth::user()->pwdInformation->profilePicture)); ?>"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                                            <?php else: ?>
                                                <img class="h-full w-full object-contain" aria-label="Profile Picture"
                                                    src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Avatar">
                                            <?php endif; ?>
                                        <?php elseif(Auth::user()->usertype === 'employer'): ?>
                                            <?php if(Auth::user()->employer && Auth::user()->employer->company_logo): ?>
                                                <img class="h-full w-full object-contain" aria-label="Company Logo"
                                                    src="<?php echo e(asset('storage/' . Auth::user()->employer->company_logo)); ?>"
                                                    alt="Company Logo"
                                                    onerror="this.onerror=null; this.src='<?php echo e(asset('/images/avatar.png')); ?>';">
                                            <?php else: ?>
                                                <img class="h-full w-full object-contain" aria-label="Company Logo"
                                                    src="<?php echo e(asset('/images/avatar.png')); ?>" alt="Company Logo">
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>


                                    <!-- User Info (Avatar, Email) -->
                                </div>

                                <div
                                    class="px-2 py-2 text-center  bg-white text-gray-800 dark:bg-gray-700 dark:text-white ">
                                    <div class="text-md font-medium mb-1 sm:mb-2 whitespace-nowrap overflow-hidden overflow-ellipsis"
                                        aria-label=" <?php echo e(Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname); ?>">
                                        <?php echo e(Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname); ?>

                                    </div>
                                    <div class="text-sm whitespace-nowrap overflow-hidden overflow-ellipsis"
                                        aria-label=" <?php echo e(Auth::user()->email); ?>">
                                        <?php echo e(Auth::user()->email); ?>

                                    </div>
                                </div>
                                <?php if(
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined') &&
                                        Auth::user()->usertype == 'user'): ?>
                                    <div class="px-0 py-2">
                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('user.messages'),'ariaLabel' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.messages')),'aria-label' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']); ?>
                                            <i class="fas fa-envelope mr-2"></i>
                                            <?php echo e(__('messages.navigation.Inbox')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </div>
                                <?php elseif(
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined') &&
                                        Auth::user()->usertype == 'employer'): ?>
                                    <div class="px-0 py-2">
                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('employer.messages'),'ariaLabel' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('employer.messages')),'aria-label' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']); ?>
                                            <i class="fas fa-envelope mr-2"></i>
                                            <?php echo e(__('messages.navigation.Inbox')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </div>
                                <?php elseif(
                                    (Auth::user()->account_verification_status == 'approved' ||
                                        Auth::user()->account_verification_status == 'declined') &&
                                        Auth::user()->usertype == 'admin'): ?>
                                    <div class="px-0 py-2">
                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('admin.messages'),'ariaLabel' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.messages')),'aria-label' => 'Inbox','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']); ?>
                                            <i class="fas fa-envelope mr-2"></i>
                                            <?php echo e(__('messages.navigation.Inbox')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(Auth::user()->account_verification_status == 'approved' && Auth::user()->usertype == 'user'): ?>
                                    <div class="px-0 ">
                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit'),'ariaLabel' => 'Profile Settings','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'aria-label' => 'Profile Settings','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']); ?>
                                            <i class="fas fa-user mr-2"></i>
                                            <?php echo e(__('messages.navigation.Profile')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </div>
                                <?php endif; ?>


                                <!-- Divider -->
                                <div class="px-0">
                                    <hr class="my-1 border-gray-200">
                                </div>

                                <!-- Log Out Form -->
                                <div class="px-0 py-2">
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'ariaLabel' => 'Log Out','onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'aria-label' => 'Log Out','onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'block text-md font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400']); ?>
                                            <i class="fas fa-sign-out-alt mr-2"></i>
                                            <?php echo e(__('messages.navigation.Log Out')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </form>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                    </div>


                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center lg:hidden">
                        <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('dashboard'),'active' => request()->routeIs('dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard'))]); ?>
                        <?php echo e(__('Dashboard')); ?>

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

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200"><?php echo e(Auth::user()->name); ?>

                        </div>
                        <div class="font-medium text-sm text-gray-500"><?php echo e(Auth::user()->email); ?></div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
                            <?php echo e(__('Profile')); ?>

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

                        <!-- Authentication -->
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?>
                                <?php echo e(__('Log Out')); ?>

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
                        </form>
                    </div>
                </div>
            </div>
    </nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\layouts\navigation.blade.php ENDPATH**/ ?>