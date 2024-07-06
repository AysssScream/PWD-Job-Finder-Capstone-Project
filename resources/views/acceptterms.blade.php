<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Encode Your Personal Profile') }}
        </h2>
    </x-slot>

    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="css/styles.css">

    @include('steps.step9')
</x-app-layout>
