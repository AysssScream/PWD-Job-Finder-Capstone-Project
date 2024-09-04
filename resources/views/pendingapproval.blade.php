<x-app-layout>
    @if (Auth::check() && Auth::user()->account_verification_status === 'pending')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Getting Started') }}
            </h2>
        </x-slot>
    @elseif (Auth::check() && Auth::user()->account_verification_status === 'waiting for approval')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Waiting For For Approval') }}
            </h2>
        </x-slot>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Account Activated') }}
            </h2>
        </x-slot>
    @endif

    <link rel="stylesheet" href="css/styles.css">
    @include('layouts.pendingapproval')
</x-app-layout>
