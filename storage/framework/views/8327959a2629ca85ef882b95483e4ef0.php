<button
    <?php echo e($attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150
                                    dark:bg-gray-900 dark:text-gray-200
                                    hover:bg-gray-700 dark:hover:bg-gray-800
                                    focus:bg-gray-700 dark:focus:bg-500
                                    active:bg-gray-900 dark:active:bg-gray-300
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800',
    ])); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\components\primary-button.blade.php ENDPATH**/ ?>