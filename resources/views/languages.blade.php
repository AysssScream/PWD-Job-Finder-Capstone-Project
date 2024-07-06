<x-app-layout>
    {{-- <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <i class="fas fa-user-edit text-black-500"></i>
                {{ __('Encode Your Personal Profile') }}
            </h2>
            <div class="flex items-center space-x-2">
                @php
                    $currentStep = 5; // Set this dynamically based on your current step
                    $totalSteps = 8; // Total number of steps
                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                @endphp
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 5 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 6 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 7 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
                <div class="w-2 h-2 rounded-full {{ $currentStep >= 8 ? 'bg-blue-600' : 'bg-gray-400' }}"></div>
            </div>
            <div class="text-md text-gray-700 font-semibold dark:text-gray-400">
                Progress: {{ $percentage }}%
            </div>
        </div>
    </x-slot> --}}
    <link rel="stylesheet" href="css/styles.css">

    @include('steps.step5')
</x-app-layout>
