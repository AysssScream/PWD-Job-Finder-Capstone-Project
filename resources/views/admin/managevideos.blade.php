<x-app-layout>
    <title>Manage Videos</title>

    <div class="h-full ml-14 md:ml-64 font-poppins p-10">

        <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6 mt-8">
            Manage Pre-recorded Videos
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Welcome to the video management interface of the PWD Job Finder. Here, you can customize and manage
            pre-recorded videos, including sign language tutorials and other essential content. This feature allows you
            to upload, edit, and update videos to enhance accessibility and provide valuable information to users.
            Whether you're adding instructional content or updating existing videos, this tool ensures that your
            interface remains informative and inclusive for all users.
        </p>
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                @php
                    $hasDashboardVideos = false;
                @endphp
                @foreach ($videos as $video)
                    @if ($video->video_id && $video->location === 'Dashboard')
                        @php
                            // Set the flag to true
                            $hasDashboardVideos = true;

                            // Determine the thumbnail URL or fallback to placeholder
                            $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                        @endphp
                        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                    @endif
                @endforeach
                @if (!$hasDashboardVideos)
                    <img class="w-full h-32 sm:h-48 object-cover" src="https://via.placeholder.com/400x300"
                        alt="Video Thumbnail">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Dashboard Interface</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        This is where PWDs access their dashboard to view an overview of account, recent
                        activities, and important updates.
                    </p>
                    @foreach ($videos as $video)
                        @if ($video->location === 'Dashboard')
                            @if ($video->video_id)
                                <!-- Display the saved URL if video_id exists -->
                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                    Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        class="text-blue-500 hover:underline"
                                        target="_blank">{{ 'https://www.youtube.com/watch?v=' . $video->video_id }}</a>
                                </p>
                            @endif
                        @endif
                    @endforeach
                    <div class="mt-4 flex justify-end">
                        <button onclick="openModal('Dashboard')"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Modify</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                @php
                    $hasSavedJobsVideos = false;
                @endphp

                @foreach ($videos as $video)
                    @if ($video->video_id && $video->location === 'Saved Jobs')
                        @php
                            // Set the flag to true
                            $hasSavedJobsVideos = true;

                            // Determine the thumbnail URL or fallback to placeholder
                            $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                        @endphp
                        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                    @endif
                @endforeach
                @if (!$hasSavedJobsVideos)
                    <img class="w-full h-32 sm:h-48 object-cover" src="https://via.placeholder.com/400x300"
                        alt="Video Thumbnail">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Saved Jobs Interface</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        This is where PWDs review and manage jobs they've saved for future reference or
                        application.
                    </p>
                    @foreach ($videos as $video)
                        @if ($video->location === 'Saved Jobs')
                            @if ($video->video_id)
                                <!-- Display the saved URL if video_id exists -->
                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                    Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        class="text-blue-500 hover:underline"
                                        target="_blank">{{ 'https://www.youtube.com/watch?v=' . $video->video_id }}</a>
                                </p>
                            @endif
                        @endif
                    @endforeach
                    <div class="mt-4 flex justify-end">
                        <button onclick="openModal('Saved Jobs')"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Modify</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                @php
                    $hasSettingsVideos = false;
                @endphp

                @foreach ($videos as $video)
                    @if ($video->video_id && $video->location === 'Settings')
                        @php
                            // Set the flag to true
                            $hasSettingsVideos = true;

                            // Determine the thumbnail URL or fallback to placeholder
                            $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                        @endphp
                        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                    @endif
                @endforeach
                @if (!$hasSettingsVideos)
                    <img class="w-full h-32 sm:h-48 object-cover" src="https://via.placeholder.com/400x300"
                        alt="Video Thumbnail">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Settings Interface</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        This is where the PWDs update their account settings, manage preferences, and
                        configure
                        notifications.
                    </p>
                    @foreach ($videos as $video)
                        @if ($video->location === 'Settings')
                            @if ($video->video_id)
                                <!-- Display the saved URL if video_id exists -->
                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                    Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        class="text-blue-500 hover:underline"
                                        target="_blank">{{ 'https://www.youtube.com/watch?v=' . $video->video_id }}</a>
                                </p>
                            @endif
                        @endif
                    @endforeach
                    <div class="mt-4 flex justify-end">
                        <button onclick="openModal('Settings')"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Modify</button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                @php
                    $hasJobInformationVideos = false;
                @endphp

                @foreach ($videos as $video)
                    @if ($video->video_id && $video->location === 'Job Information')
                        @php
                            // Set the flag to true
                            $hasJobInformationVideos = true;

                            // Determine the thumbnail URL or fallback to placeholder
                            $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                        @endphp
                        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                    @endif
                @endforeach

                @if (!$hasJobInformationVideos)
                    <img class="w-full h-32 sm:h-48 object-cover" src="https://via.placeholder.com/400x300"
                        alt="Video Thumbnail">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Job Information Interface</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        This is where the PWD explore detailed information about various job opportunities and
                        requirements.
                    </p>
                    @foreach ($videos as $video)
                        @if ($video->location === 'Job Information')
                            @if ($video->video_id)
                                <!-- Display the saved URL if video_id exists -->
                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                    Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        class="text-blue-500 hover:underline"
                                        target="_blank">{{ 'https://www.youtube.com/watch?v=' . $video->video_id }}</a>
                                </p>
                            @endif
                        @endif
                    @endforeach
                    <div class="mt-4 flex justify-end">
                        <button onclick="openModal('Job Information')"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Modify</button>
                    </div>
                </div>
            </div>


            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                @php
                    $hasWelcomePageVideos = false;
                @endphp
                @foreach ($videos as $video)
                    @if ($video->video_id && $video->location === 'Welcome Page')
                        @php
                            // Set the flag to true
                            $hasWelcomePageVideos = true;

                            // Determine the thumbnail URL or fallback to placeholder
                            $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                        @endphp
                        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                    @endif
                @endforeach

                @if (!$hasWelcomePageVideos)
                    <img class="w-full h-32 sm:h-48 object-cover" src="https://via.placeholder.com/400x300"
                        alt="Video Thumbnail">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Welcome Page Interface</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400"> This is the landing page of PWDs to
                        discover
                        more
                        about your organization and
                        functionalities
                        you offer.
                    </p>
                    @foreach ($videos as $video)
                        @if ($video->location === 'Welcome Page')
                            @if ($video->video_id)
                                <!-- Display the saved URL if video_id exists -->
                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                    Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        class="text-blue-500 hover:underline"
                                        target="_blank">{{ 'https://www.youtube.com/watch?v=' . $video->video_id }}</a>
                                </p>
                            @endif
                        @endif
                    @endforeach
                    <div class="mt-4 flex justify-end">
                        <button onclick="openModal('Welcome Page')"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Modify</button>
                    </div>
                </div>
            </div>
            <!-- Add more cards as needed -->
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-1/2">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Enter Video ID</h2>
            <!-- Form Start -->
            <form id="video-form" action="" method="post">
                @csrf <!-- Include this if you're using Laravel and want to handle CSRF protection -->
                <input type="text" id="video-id" name="video_id"
                    class="bg-white text-black dark:bg-gray-900 dark:text-gray-200 border border-gray-300 rounded-lg w-full p-2 mb-4"
                    placeholder="Enter Video ID" required>
                <p class="text-sm text-gray-800 dark:text-gray-200 mb-4">
                    For example, for the URL https://www.youtube.com/watch?v=liJVSwOiiwg, enter
                    <b><span class="text-gray-900 dark:text-gray-100">liJVSwOiiwg</span></b>
                </p>
                <div class="flex justify-end mb-4">
                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Submit</button>
                    <!-- Check Availability Button -->
                    <button type="button" onclick="submitVideoId()"
                        class="ml-4 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Check
                        Availability</button>
                    <!-- Close Button -->
                    <button type="button" onclick="closeModal()"
                        class="ml-4 bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Close</button>
                </div>
                <!-- Video Preview -->
                <div class="w-full">
                    <iframe id="video-player" class="w-full h-64 rounded-lg" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>

    <script defer>
        function openModal(location) {
            var form = document.getElementById('video-form');
            var actionUrl = `{{ route('admin.video.store', ':location') }}`.replace(':location', encodeURIComponent(
                location));
            form.action = actionUrl;

            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('video-player').src = ''; // Clear video on close
        }

        function submitVideoId() {
            var videoId = document.getElementById('video-id').value;
            var videoUrl = `https://www.youtube.com/embed/${videoId}`;

            var iframe = document.getElementById('video-player');
            iframe.src = videoUrl;

            iframe.onload = function() {
                setTimeout(() => {}, 2000);
            };

            iframe.onerror = function() {
                setTimeout(() => {
                    alert('Video not found.');
                    iframe.src = ''; // Clear the iframe on error
                }, 2000);
            };
        }
    </script>

    @if (Session::has('addvideo'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.success("{{ Session::get('addvideo') }}", 'Video Saved', {
                    timeOut: 5000
                });
            });
        </script>
    @endif

    @if (Session::has('updatevideo'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.success("{{ Session::get('updatevideo') }}", 'Video Updated', {
                    timeOut: 5000
                });
            });
        </script>
    @endif

</x-app-layout>
