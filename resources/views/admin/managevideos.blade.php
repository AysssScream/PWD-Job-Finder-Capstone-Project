<x-app-layout>
    <title>Manage Videos</title>

    <div class="h-full ml-14 md:ml-64 font-poppins p-10">
        <div class="w-full mx-auto px-4 lg:px-8 py-8">
            <!-- Card container -->
            <div
                class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg w-full mx-auto mt-0 mb-10">
                <div class="px-6 py-10 overflow-x-auto">
                    <div class="min-w-[400px]"> <!-- Adjust the width here for scrollable content -->
                        <div class="text-center mb-6">
                            <h1
                                class="text-4xl font-extrabold font-bold text-gray-900 dark:text-white sm:text-5xl mt-4 mb-2 relative inline-block">
                                Manage Pre-recorded Videos
                                <span
                                    class="block w-20 h-1 bg-blue-500 mt-2 mx-auto hover:w-24 transition-all duration-300 shadow-md"></span>
                            </h1>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="h-8 w-8 text-blue-500 mr-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Video Management Interface
                            </h2>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-8">
                            Welcome to the video management interface of the PWD Job Finder. Here, you can customize and
                            manage
                            pre-recorded videos, including sign language tutorials and other essential content. This
                            feature allows you
                            to upload, edit, and update videos to enhance accessibility and provide valuable information
                            to users.
                            Whether you're adding instructional content or updating existing videos, this tool ensures
                            that your
                            interface remains informative and inclusive for all users.
                        </p>
                    </div>
                </div>
                <div class="w-full h-1 bg-blue-500 rounded-b-lg"></div>
            </div>
        </div>


        <div class="p-6">
            <!-- Top row with 3 cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Card 1: Dashboard Interface -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="overflow-x-auto">
                        @php
                            $hasDashboardVideos = false;
                        @endphp
                        @foreach ($videos as $video)
                            @if ($video->video_id && $video->location === 'Dashboard')
                                @php
                                    $hasDashboardVideos = true;
                                    $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                                @endphp
                                <img class="w-full h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                            @endif
                        @endforeach
                        @if (!$hasDashboardVideos)
                            <img class="w-full h-48 object-contain rounded-t-lg bg-gray-50" src="/images/first17.png"
                                alt="Video Thumbnail">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Interface</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                This is where PWDs access their dashboard to view an overview of accounts, recent
                                activities, and important updates.
                            </p>
                            @foreach ($videos as $video)
                                @if ($video->location === 'Dashboard' && $video->video_id)
                                    <p class="text-sm text-gray-800 dark:text-gray-200 mt-4">
                                        Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                            class="text-blue-500 hover:underline break-all" target="_blank">
                                            {{ 'https://www.youtube.com/watch?v=' . $video->video_id }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach

                            <div class="mt-6 flex justify-between">
                                <!-- Modify button -->
                                <button onclick="openModal('Dashboard')"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Modify
                                </button>

                                <!-- Delete button (trigger the modal) -->
                                @foreach ($videos as $video)
                                    @if ($video->location === 'Dashboard' && $video->video_id)
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.video.delete', $video->id) }}')"
                                            class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Delete
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Card 2: Saved Jobs Interface -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="overflow-x-auto">
                        @php
                            $hasSavedJobsVideos = false;
                        @endphp
                        @foreach ($videos as $video)
                            @if ($video->video_id && $video->location === 'Saved Jobs')
                                @php
                                    $hasSavedJobsVideos = true;
                                    $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                                @endphp
                                <img class="w-full h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                            @endif
                        @endforeach
                        @if (!$hasSavedJobsVideos)
                            <img class="w-full h-48 object-contain rounded-t-lg bg-gray-50" src="/images/first17.png"
                                alt="Video Thumbnail">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Saved Jobs Interface</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                This is where PWDs review and manage jobs they've saved for future reference or
                                application.
                            </p>
                            @foreach ($videos as $video)
                                @if ($video->location === 'Saved Jobs' && $video->video_id)
                                    <p class="text-sm text-gray-800 dark:text-gray-200 mt-4">
                                        Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                            class="text-blue-500 hover:underline break-all" target="_blank">
                                            {{ 'https://www.youtube.com/watch?v=' . $video->video_id }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach

                            <div class="mt-6 flex justify-between">
                                <!-- Modify button -->
                                <button onclick="openModal('Saved Jobs')"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Modify
                                </button>

                                <!-- Delete button (trigger the modal) -->
                                @foreach ($videos as $video)
                                    @if ($video->location === 'Saved Jobs' && $video->video_id)
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.video.delete', $video->id) }}')"
                                            class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Delete
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Card 3 -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="overflow-x-auto">
                        @php
                            $hasSettingsVideos = false;
                        @endphp
                        @foreach ($videos as $video)
                            @if ($video->video_id && $video->location === 'Settings')
                                @php
                                    $hasSettingsVideos = true;
                                    $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                                @endphp
                                <img class="w-full h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                            @endif
                        @endforeach
                        @if (!$hasSettingsVideos)
                            <img class="w-full h-48 object-contain rounded-t-lg bg-gray-50" src="/images/first17.png"
                                alt="Video Thumbnail">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Settings Interface</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                This is where PWDs update their account settings, manage preferences, and configure
                                notifications.
                            </p>
                            @foreach ($videos as $video)
                                @if ($video->location === 'Settings' && $video->video_id)
                                    <p class="text-sm text-gray-800 dark:text-gray-200 mt-4">
                                        Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                            class="text-blue-500 hover:underline break-all" target="_blank">
                                            {{ 'https://www.youtube.com/watch?v=' . $video->video_id }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach
                            <div class="mt-6 flex justify-between">
                                <!-- Modify button -->
                                <button onclick="openModal('Settings')"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Modify
                                </button>

                                <!-- Delete button (trigger the modal) -->
                                @foreach ($videos as $video)
                                    @if ($video->location === 'Settings' && $video->video_id)
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.video.delete', $video->id) }}')"
                                            class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Delete
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bottom row with 2 cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                <!-- Card 4: Job Information Interface -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="overflow-x-auto">
                        @php
                            $hasJobInformationVideos = false;
                        @endphp
                        @foreach ($videos as $video)
                            @if ($video->video_id && $video->location === 'Job Information')
                                @php
                                    $hasJobInformationVideos = true;
                                    $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                                @endphp
                                <img class="w-full h-48 object-cover" src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                            @endif
                        @endforeach
                        @if (!$hasJobInformationVideos)
                            <img class="w-full h-48 object-contain rounded-t-lg bg-gray-50" src="/images/first17.png"
                                alt="Video Thumbnail">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Job Information Interface</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                This is where PWDs explore detailed information about various job opportunities and
                                requirements.
                            </p>
                            @foreach ($videos as $video)
                                @if ($video->location === 'Job Information' && $video->video_id)
                                    <p class="text-sm text-gray-800 dark:text-gray-200 mt-4">
                                        Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                            class="text-blue-500 hover:underline break-all" target="_blank">
                                            {{ 'https://www.youtube.com/watch?v=' . $video->video_id }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach
                            <div class="mt-6 flex justify-between">
                                <!-- Modify button -->
                                <button onclick="openModal('Job Information')"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Modify
                                </button>

                                <!-- Delete button (trigger the modal) -->
                                @foreach ($videos as $video)
                                    @if ($video->location === 'Job Information' && $video->video_id)
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.video.delete', $video->id) }}')"
                                            class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Delete
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Card 5: Welcome Page Interface -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="overflow-x-auto">
                        @php
                            $hasWelcomePageVideos = false;
                        @endphp
                        @foreach ($videos as $video)
                            @if ($video->video_id && $video->location === 'Welcome Page')
                                @php
                                    $hasWelcomePageVideos = true;
                                    $thumbnailUrl = $video->thumbnail_url ?: 'https://via.placeholder.com/400x300';
                                @endphp
                                <img class="w-full h-48 object-cover" src="{{ $thumbnailUrl }}"
                                    alt="Video Thumbnail">
                            @endif
                        @endforeach
                        @if (!$hasWelcomePageVideos)
                            <img class="w-full h-48 object-contain rounded-t-lg bg-gray-50" src="/images/first17.png"
                                alt="Video Thumbnail">
                        @endif

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome Page Interface</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                This is the landing page for PWDs to discover more about your organization and its
                                functionalities.
                            </p>
                            @foreach ($videos as $video)
                                @if ($video->location === 'Welcome Page' && $video->video_id)
                                    <p class="text-sm text-gray-800 dark:text-gray-200 mt-4">
                                        Saved URL: <a href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                            class="text-blue-500 hover:underline break-all" target="_blank">
                                            {{ 'https://www.youtube.com/watch?v=' . $video->video_id }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach
                            <div class="mt-6 flex justify-between">
                                <!-- Modify button -->
                                <button onclick="openModal('Welcome Page')"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Modify
                                </button>

                                <!-- Delete button (trigger the modal) -->
                                @foreach ($videos as $video)
                                    @if ($video->location === 'Welcome Page' && $video->video_id)
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.video.delete', $video->id) }}')"
                                            class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Delete
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
                <div id="modal"
                    class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full md:w-1/2 relative">
                        <!-- Close Button (Top Right) with Circle -->
                        <button onclick="closeModal()"
                            class="absolute top-4 right-4 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full p-2 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Title with Icon -->
                        <div class="flex items-center justify-center mb-6">
                            <!-- Video Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <!-- Title -->
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Enter Video ID</h2>
                        </div>

                        <!-- Form Start -->
                        <form id="video-form" action="" method="post">
                            @csrf <!-- Include this if you're using Laravel and want to handle CSRF protection -->

                            <!-- Input Field -->
                            <input type="text" id="video-id" name="video_id"
                                class="bg-white text-black dark:bg-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-lg w-full p-3 mb-4"
                                placeholder="Enter Video ID" required>
                            @error('video_id')
                                <div class="text-red-500 text-sm mt-1 mb-1">{{ $message }}</div>
                            @enderror

                            <!-- Example Text -->
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                                For example, for the URL
                                <a href="https://www.youtube.com/watch?v=liJVSwOiiwg" target="_blank"
                                    class="text-blue-500 hover:underline">
                                    https://www.youtube.com/watch?v=liJVSwOiiwg
                                </a>,
                                enter <b><span class="text-gray-900 dark:text-gray-100">liJVSwOiiwg</span></b>
                            </p>

                            <!-- Buttons Section -->
                            <div class="flex justify-between space-x-3 mb-6">
                                <!-- Submit Button -->
                                <button type="submit"
                                    class="bg-blue-500 text-white py-2 px-6 rounded-full w-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Submit
                                </button>

                                <!-- Check Availability Button -->
                                <button type="button" onclick="submitVideoId()"
                                    class="bg-green-500 text-white py-2 px-6 rounded-full w-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                    Check Availability
                                </button>
                            </div>

                            <!-- Video Preview -->
                            <div class="w-full mt-6">
                                <iframe id="video-player" class="w-full h-64 rounded-lg shadow-md" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div id="deleteConfirmationModal"
                    class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full relative">
                        <!-- Close Button -->
                        <button onclick="closeDeleteModal()"
                            class="absolute top-4 right-4 text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Confirm Deletion</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">Are you sure you want to delete this video?
                            This action cannot be undone.</p>

                        <!-- Confirmation Form -->
                        <form id="deleteVideoForm" method="POST" action="">
                            @csrf
                            @method('DELETE')

                            <div class="flex justify-end">
                                <button type="button" onclick="closeDeleteModal()"
                                    class="bg-gray-500 text-white py-2 px-6 rounded-full mr-3 hover:bg-gray-600 focus:outline-none">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 focus:outline-none">
                                    Delete
                                </button>
                            </div>
                        </form>
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

                    function openDeleteModal(actionUrl) {
                        // Set the action URL for the form
                        document.getElementById('deleteVideoForm').action = actionUrl;

                        // Show the modal
                        document.getElementById('deleteConfirmationModal').classList.remove('hidden');
                    }

                    function closeDeleteModal() {
                        // Hide the modal
                        document.getElementById('deleteConfirmationModal').classList.add('hidden');
                    }
                </script>

                @if (Session::has('addvideo'))
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
                @if (Session::has('success'))
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.success("{{ Session::get('success') }}", 'Success', {
                                timeOut: 5000
                            });
                        });
                    </script>
                @endif
</x-app-layout>
