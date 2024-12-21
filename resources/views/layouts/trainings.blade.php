<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg mb-4">
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 rounded-t-lg">
        <a href="" class="block focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 rounded-lg"
            aria-label="{{ __('messages.userdashboard.trainings') }}">
            <h3 class="text-xl font-semibold text-center text-white">
                <i class="fas fa-chalkboard-teacher mr-2"></i>
                {{ __('messages.userdashboard.trainings') }}
            </h3>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 p-2 rounded-b-lg shadow-lg">
        <div class="container mx-auto" id="trainingsContainer">
            @foreach ($newestTrainings as $training)
                <div class="shadow-3d bg-gray-100 text-gray-900 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 rounded-md mb-4 shadow-sm transition duration-300 ease-in-out">
                    <a href="{{ route('trainings.show', ['id' => $training->id]) }}"
                        class="block py-2 px-4 w-full text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        aria-label="Training {{ $training->name }} at {{ $training->location }}">
                        {{ $training->name }} <br> (Location: {{ $training->location }})
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
