@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm',
]) !!}>
