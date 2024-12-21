@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 rounded-lg shadow-md p-3 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400',
]) !!}>
