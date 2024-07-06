<div x-data="{ open: false }">
    <div class="relative">
        <!-- Button to toggle the drawer -->
        <button @click="open = !open"
            class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
            <i class="fas fa-bell text-4xl"></i> <!-- Font Awesome bell icon -->
            <!-- Replace with a dynamic notification count or dot -->
            <span class="absolute top-0 right-0 bg-red-500 rounded-full text-xs px-2 py-1 text-white">3</span>
        </button>

        <!-- Full-screen overlay for the drawer -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" @click.away="open = false"
            class="fixed inset-0 flex justify-start bg-black bg-opacity-50 z-50 transition-opacity">
            <!-- Drawer content -->
            <div
                class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-gray-100 text-black dark:bg-gray-800 dark:text-gray-200 shadow-lg overflow-y-auto">
                <div class="p-4 h-full overflow-y-auto">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Notifications</h3>
                    <!-- Replace with actual notification items -->
                    <ul class="mt-4">
                        <li class="flex items-center justify-between py-2">
                            <div class="flex items-center space-x-3">
                                <div class="rounded-full bg-blue-500 h-4 w-4"></div>
                                <div class="text-sm text-gray-700 dark:text-gray-200">Notification 1</div>
                            </div>
                            <span class="text-xs text-gray-700 dark:text-gray-400">2m ago</span>
                        </li>
                        <li class="flex items-center justify-between py-2">
                            <div class="flex items-center space-x-3">
                                <div class="rounded-full bg-green-500 h-4 w-4"></div>
                                <div class="text-sm text-gray-700 dark:text-gray-200">Notification 2</div>
                            </div>
                            <span class="text-xs text-gray-700 dark:text-gray-400">1h ago</span>
                        </li>
                        <li class="flex items-center justify-between py-2">
                            <div class="flex items-center space-x-3">
                                <div class="rounded-full bg-yellow-500 h-4 w-4"></div>
                                <div class="text-sm text-gray-700 dark:text-gray-200">Notification 3</div>
                            </div>
                            <span class="text-xs text-gray-700 dark:text-gray-400">1d ago</span>
                        </li>
                        <!-- Add more notification items as needed -->
                    </ul>
                </div>
                <!-- Close button for the drawer -->
                <div class="p-2 bg-gray-200 text-black dark:bg-gray-700 dark:text-gray-200 text-center">
                    <button @click="open = false"
                        class="text-sm text-gray-700 dark:text-gray-200 hover:text-gray-500 focus:outline-none">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
