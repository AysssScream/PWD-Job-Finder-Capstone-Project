<x-app-layout>
    <title>Application Status</title>
    @if (Auth::check() && Auth::user()->account_verification_status === 'pending')
        <x-slot name="header">
            <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="{{ __('Getting Started') }}">
                <i class="fas fa-clock text-blue-600 mr-2"></i> {{ __('Getting Started') }}
            </h3>
        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
        <x-slot name="header">
            <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="{{__('Waiting For Approval') }}">
                <i class="fas fa-hourglass text-blue-600 mr-2"></i> {{ __('Waiting For Approval') }}
            </h3>
        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'declined')
        <x-slot name="header">
            <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="{{ __('Account Declined') }}">
                <i class="fas fa-times-circle text-blue-600 mr-2"></i> {{ __('Account Declined') }}
            </h3>
        </x-slot>
    @else
        <x-slot name="header">
            <h3 class="font-semibold text-xl text-blue-600 dark:text-gray-200 leading-tight focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400" tabindex="0" aria-label="{{ __('Account Activated') }}">
                <i class="fas fa-check-circle text-blue-600 mr-2"></i> {{ __('Account Activated') }}
            </h3>
        </x-slot>
    @endif
    <link rel="stylesheet" href="css/styles.css">
    @include('layouts.pendingapproval')
</x-app-layout>
