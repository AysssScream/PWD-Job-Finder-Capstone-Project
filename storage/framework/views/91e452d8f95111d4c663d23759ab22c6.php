<!-- resources/views/components/TextBoxWithToggle.blade.php -->

<div class="relative flex items-center">
    <i class="fas fa-lock absolute left-3 text-gray-400 dark:text-gray-500"></i>

    <input id="<?php echo e($id); ?>" type="<?php echo e($type); ?>" name="<?php echo e($name); ?>"
        class="block w-full pl-10 pr-3 py-2 rounded-md border-gray-700 dark:text-gray-200 dark:bg-gray-900 dark:border-gray-200  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 transition duration-150 ease-in-out"
        placeholder="<?php echo e($placeholder); ?>" <?php echo e($attributes); ?>>

    <!-- Toggle button -->
    <button type="button"
        class="absolute right-3 top-1/2 transform -translate-y-1/2 flex items-center justify-center px-3 py-2 text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none"
        onclick="togglePassword('<?php echo e($id); ?>')">
        <i id="<?php echo e($id); ?>ToggleIcon"
            class="fas fa-eye focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            tabindex="0" aria-label="Toggle Visibility"></i>
    </button>
</div>

<script>
    function togglePassword(inputId) {
        const inputField = document.getElementById(inputId);
        const toggleIcon = document.getElementById(inputId + 'ToggleIcon');

        if (inputField.type === "password") {
            inputField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            inputField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views/components/password-text.blade.php ENDPATH**/ ?>