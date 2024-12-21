<x-app-layout>
    <link rel="stylesheet" href="css/styles.css">
    @include('steps.step2')
</x-app-layout>

<style>
    @keyframes moveProgress {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }
</style>
