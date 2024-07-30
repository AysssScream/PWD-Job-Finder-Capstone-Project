<!-- resources/views/components/TextBoxWithToggle.blade.php -->

<div class="flex items-center">
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
        class="block w-full pr-3 py-2 rounded-md border-1 border-gray-700  dark:text-gray-200 border-gray-700focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 transition duration-150 ease-in-out dark:bg-gray-900"
        placeholder="{{ $placeholder }}" {{ $attributes }}>
    <button type="button"
        class="flex items-center justify-center px-3 py-2 text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none"
        onclick="togglePassword('{{ $id }}')">
        <i id="{{ $id }}ToggleIcon"
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
