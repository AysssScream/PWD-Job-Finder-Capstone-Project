<x-app-layout>
    {{--  <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <i class="fas fa-user-edit text-black-500"></i>
                {{ __('Encode Your Personal Profile') }}
            </h2>
            <div class="flex items-center space-x-2">
                @php
                    $currentStep = 3; // Set this dynamically based on your current step
                    $totalSteps = 8; // Total number of steps
                    $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                @endphp
                <div class="relative w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                        style="width: {{ $percentage }}%;"></div>
                </div>
                <div class="text-md text-gray-700 font-semibold dark:text-gray-400">
                    Step 3/8: {{ $percentage }}%
                </div>
            </div>

        </div>
    </x-slot> --}}
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="css/styles.css">
    @include('steps.step3')
</x-app-layout>
