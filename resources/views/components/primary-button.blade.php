<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 text-white border border-transparent rounded-md font-semibold text-md uppercase tracking-widest transition ease-in-out duration-150
                                                    dark:bg-gray-900 dark:text-gray-200
                                                    hover:bg-gray-700 dark:hover:bg-gray-800
                                                    focus:bg-gray-700 dark:focus:bg-500
                                                    active:bg-gray-900 dark:active:bg-gray-300
                                                    focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400',
    ]) }}>
    {{ $slot }}
</button>
