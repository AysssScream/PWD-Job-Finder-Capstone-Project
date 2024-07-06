@props(['active'])

@php
    $classes = $active
        ? 'inline-flex items-center px-2 py-9 border-b-2 border-blue-400 dark:border-blue-600 text-base font-semibold leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-2 py-9 border-b-2 border-transparent text-base font-semibold leading-2 text-gray-500 dark:text-gray-400 hover:text-blue-500 hover:border-blue-500 dark:hover:text-blue-500 dark:hover:border-blue-500 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp



<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{--  
@if ($active)
    <p>Route is active: {{ request()->route()->getName() }}</p>
@else
    <p>Route is not active: {{ request()->route()->getName() }}</p>
@endif --}}
