<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg mb-4">
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 rounded-t-lg">
        <h3 class="text-xl font-semibold text-center text-white flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            aria-label="{{ __('messages.userdashboard.top_job_openings') }}" tabindex="0">
            <i class="fas fa-briefcase mr-2"></i>
            {{ __('messages.userdashboard.top_job_openings') }}
        </h3>

    </div>
    <div class="bg-white dark:bg-gray-900 p-2 rounded-b-lg shadow-lg">
        <div class="container mx-auto" id="jobOpeningsContainer">
             @forelse ($topJobOpenings as $jobOpening)
                <div
                    class="shadow-3d bg-gray-100 mt-4 text-gray-900 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 rounded-md mb-4 shadow-sm transition duration-300 ease-in-out">
                    <a href="{{ route('dashboard', ['title' => $jobOpening->title]) }}"
                        class="block py-2 px-4 w-full text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="{{ $jobOpening->title }} with {{ $jobOpening->count }} vacancies">
                        <i class="fas fa-briefcase mr-2"></i>
                        {{ $jobOpening->title }} <br> ({{ $jobOpening->count }} Vacancies)
                    </a>
                </div>
            @empty
          <div class="shadow-3d bg-gray-100 text-gray-900 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 rounded-md mb-4 shadow-sm transition duration-300 ease-in-out p-2 mt-4">
                <p class="text-center text-gray-700 dark:text-gray-200">
                    <i class="fas fa-exclamation-circle mr-2"></i>Top jobs not found.
                </p>
            </div>
            @endforelse
        </div>
    </div>
</div>
