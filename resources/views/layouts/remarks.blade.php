<x-app-layout>
    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-5/6">
                    <!-- Content goes here -->
                    <!-- Example container with padding and background -->

                    <div class="p-6 bg-white dark:bg-gray-800  rounded-lg">
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                <a href="{{ route('dashboard') }}"
                                    class="text-lg font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Go Back to Dashboard
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div
                        class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-200 p-4 rounded-lg shadow-md mt-10">


                        <div class="my-4 border-b border-gray-500 dark:border-gray-200">
                            <!-- Label for the company name -->
                            <label for="remarksTextarea" class="block  text-gray-800 dark:text-gray-200 mb-2">
                                <span class="font-semibold">From:</span> {{ $company_name }}
                            </label>
                            <label for="remarksTextarea" class="block  text-gray-800 dark:text-gray-200 mb-4">
                                <span class="font-semibold">To:</span> {{ Auth::user()->name }}
                            </label>
                        </div>

                        <!-- Textarea for remarks -->
                        <textarea id="remarksTextarea"
                            class="w-full h-64 px-3 p-3 py-2 bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200 border rounded-lg focus:outline-none focus:border-blue-500 break-all"
                            placeholder="No Remarks Given" disabled>{{ $remarks }}</textarea>
                    </div>

                </div>
</x-app-layout>
