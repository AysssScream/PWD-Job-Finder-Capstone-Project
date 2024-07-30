<div>
    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200" aria-label="Top Job Openings">
        <a href=""
            class="flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
            aria-label=" {{ __('messages.userdashboard.top_job_openings') }}">
            <i class="fas fa-briefcase mr-2 text-gray-900 dark:text-gray-200" aria-label="Top Job Openings"></i>
            {{ __('messages.userdashboard.top_job_openings') }}
        </a>
    </h3>

    <div class="container mx-auto" id="jobOpeningsContainer">
        @foreach ($topJobOpenings as $jobOpening)
            <div
                class="bg-gray-200 text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-700 dark:bg-gray-900 dark:text-gray-200 text-gray-900 rounded-md mb-4 shadow-sm">
                <a href="{{ route('dashboard', ['title' => $jobOpening->title]) }}"
                    class="block py-2 px-4 w-full text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="{{ $jobOpening->title }} with {{ $jobOpening->count }} vacancies">
                    {{ $jobOpening->title }} <br> ({{ $jobOpening->count }} Vacancies)
                </a>
            </div>
        @endforeach
    </div>
</div>
