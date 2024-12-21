<x-app-layout>
    <div class="py-12">
        <div class="container mx-auto max-w-full p-4">
            <div class="flex justify-center">
                <div class="w-full">
                    <div class="p-6 bg-white dark:bg-gray-700 shadow-lg rounded-lg">
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                <a href="{{ route('dashboard') }}"
                                    class="text-lg font-lg text-blue-500 hover:text-gray-700 dark:text-blue-300 dark:hover:text-gray-200">
                                    <i class="fas fa-arrow-left mr-1"></i> <!-- Left Arrow Icon -->
                                    <i class="fas fa-home mr-1"></i> <!-- Optional Home Icon -->
                                    Go Back to Dashboard
                                </a>

                            </h2>
                        </div>
                    </div>
                    <div
                        class="bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-200 rounded-lg shadow-lg mt-10 border-b-4 border-gray-400 dark:border-gray-400">
                        <div
                            class="my-4 bg-blue-500 p-4 pb-0 rounded-lg border-b-4 border-blue-400 shadow-md flex flex-col sm:flex-row sm:justify-between items-start sm:items-center">
                            <div>
                                <label for="remarksTextarea" class="block text-lg text-white mb-2">
                                    <i class="fas fa-building mr-2"></i> <!-- Company Icon -->
                                    <b>From:</b> {{ $company_name }}
                                </label>
                                <label for="remarksTextarea" class="block text-lg text-white mb-4">
                                    <i class="fas fa-user mr-2"></i> <!-- User Icon -->
                                    <b>To:</b> {{ Auth::user()->name }}
                                </label>
                            </div>
                            <div class="bg-white rounded-full p-2 shadow-3d mt-4 sm:mt-0">
                                <!-- Rounded container for the logo -->
                                <img src="images/first17.png" alt="Logo" class="h-20 w-auto" /> <!-- Logo -->
                            </div>
                        </div>



                        <div class="p-4">
                            <!-- Header for the textarea -->
                            <label for="remarksTextarea"
                                class="block text-lg text-gray-900 dark:text-gray-200 mb-2 font-semibold">
                                <i class="fas fa-comment-dots mr-2"></i> <!-- Chat Icon -->
                                Message
                            </label>
                            <!-- Textarea for remarks -->
                            <textarea id="remarksTextarea"
                                class="w-full h-96 px-4 py-3 bg-gray-50 text-gray-900 dark:bg-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-200 resize-none overflow-y-auto shadow-sm hover:shadow-md"
                                placeholder="No Remarks Given" readonly>{{ $remarks ?? 'No Remarks Given' }}</textarea>
                        </div>


                    </div>
                </div>
</x-app-layout>
