@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black-700 dark:text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
