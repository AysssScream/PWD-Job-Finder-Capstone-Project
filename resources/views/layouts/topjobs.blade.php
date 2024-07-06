<div>
    <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-900 dark:text-gray-200">
        <i class="fas fa-briefcase mr-2 text-gray-900 dark:text-gray-200"></i> Top Job Openings
    </h3>
    <div class="container mx-auto" id="jobOpeningsContainer">
        @foreach ($topJobOpenings as $jobOpening)
            <div class="bg-gray-200 text-gray-900 rounded-md mb-4">
                <a href="{{ route('dashboard', ['title' => $jobOpening->title]) }}" class="block py-2 px-4 w-full">
                    {{ $jobOpening->title }} ({{ $jobOpening->count }})
                </a>
            </div>
        @endforeach
    </div>


</div>
