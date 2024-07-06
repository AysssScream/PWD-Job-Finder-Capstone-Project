<!-- resources/views/components/TextBoxWithToggle.blade.php -->

<div class="flex items-center">
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
        class="block w-full pr-3 py-2 rounded-md border-black dark:text-gray-200 border-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-opacity-50 transition duration-150 ease-in-out dark:bg-gray-900"
        placeholder="{{ $placeholder }}" {{ $attributes }}>
    <button type="button"
        class="flex items-center justify-center px-3 py-2 text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none"
        onclick="togglePassword('{{ $id }}')">
        <i id="{{ $id }}ToggleIcon" class="fas fa-eye"></i>
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
