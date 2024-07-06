<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.8.2/dist/alpine.min.js" defer></script>

    </head>

    <body class="bg-white mx-auto max-w-7xl px-4">
        <div class="container mx-auto max-w-7xl px-4 pt-5 ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-lg p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} "
                                    class="text-gray-800 dark:text-gray-200"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="container mx-auto max-w-7xl px-4 pt-5  "> {{-- this must be changed to change the margin --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 rounded-lg">
                    <div class="lg:col-span-2">
                        <div class="card shadow-2xl border-0 bg-white p-5 mb-10 bg-gray-100 dark:bg-gray-700">
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="#">
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-200">
                                            {{ $job->title }}</h4>
                                    </a>
                                    <div class="flex items-center mt-2">
                                        <div class="mr-4">
                                            <p class="text-gray-800 dark:text-gray-200">
                                                <i class="fa fa-map-marker mr-2"></i>{{ $job->location }}
                                            </p>
                                        </div>
                                        <div class="text-right flex-grow">
                                            <p class="text-gray-800 dark:text-gray-200 mr-5">
                                                <i class="fa fa-clock mr-2"></i>{{ $job->job_type }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-gray-800 dark:text-gray-200">
                                                <i class="fa fa-graduation-cap mr-2"></i>{{ $job->educational_level }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <a href="#" class="text-gray-600 hover:text-blue-500"><i class="fa fa-heart-o"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg font-bold  text-gray-800 dark:text-gray-200">Job description</h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <p class="text-gray-800 dark:text-gray-200 leading-loose"> {{ $job->description }}
                                </p>
                            </div>


                            <div class="mt-4 leading-relaxed">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Responsibility</h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 mt-2 leading-loose">
                                    {{ $job->responsibilities }}
                                </ul>
                            </div>

                            <div class="mt-4 leading-relaxed">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Qualifications</h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 leading-loose">
                                    {{ $job->qualifications }}
                                </ul>
                            </div>



                            <div class="mt-4">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Benefits</h4>
                                <div class="border-b border-gray-300 mt-2"></div>

                                <p class="text-gray-800 dark:text-gray-200 leading-loose">
                                    {{ $job->benefits }}
                                </p>
                            </div>
                            <div x-data="{ showModal: false, description: 'Hi, I\'m interested to apply for the {{ $job->title }} position.' }">
                                @include('layouts.modalapply')
                            </div>

                            <script>
                                function applyJob() {
                                    var description = document.getElementById('description').value;
                                    console.log(description);
                                    document.getElementById('modal').style.display = 'none';
                                }
                            </script>


                        </div>
                    </div>
                    <div class="lg:col-span-1">
                        <div class="card shadow-lg border-0 bg-gray-100 dark:bg-gray-700 p-5 mb-4">
                            <div class="mb-4">

                                <div class="flex items-center justify-between mt-4">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Job Summary</h3>
                                    <form
                                        action="{{ route('save.job', ['company_name' => $job->company_name, 'id' => $job->id]) }}"
                                        method="POST">
                                        @csrf
                                        @php
                                            $isSaved = Auth::user()
                                                ->savedJobs()
                                                ->where('job_id', $job->id)
                                                ->exists();
                                        @endphp
                                        @if ($isSaved)
                                            <button type="button"
                                                class="ml-4 text-sm bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 focus:outline-none focus:bg-green-700">
                                                <i class="fas fa-check-circle mr-2"></i>Saved
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="ml-4 text-sm bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                                <i class="fas fa-save mr-2"></i>Save Job
                                            </button>
                                        @endif
                                    </form>
                                </div>

                                <div class="border-b border-gray-300 mt-4"></div>

                                <ul class="text-gray-800 dark:text-gray-200 mt-2 leading-loose">
                                    <li><span class="font-bold text-gray-800 dark:text-gray-200">Published on:</span>
                                        {{ \Carbon\Carbon::parse($job->date_posted)->format('F j, Y') }}
                                    </li>
                                    <li><span
                                            class="font-bold mr-2 text-gray-800 dark:text-gray-200">Vacancy:</span>{{ $job->vacancy }}
                                        Positions Left
                                    </li>
                                    <li><span class="font-bold text-gray-800 dark:text-gray-200">Salary:</span>
                                        ₱{{ number_format($job->salary) }}</li>
                                    <li><span class="font-bold text-gray-800 dark:text-gray-200">Location:</span>
                                        {{ $job->location }}</li>
                                    <li><span class="font-bold text-gray-800 dark:text-gray-200">Job Nature:</span>
                                        {{ $job->job_type }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card  border-0 bg-gray-100 dark:bg-gray-700 p-5 mt-4 mb-10 shadow-lg">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">About the Company</h3>
                                <div class="border-b border-gray-300 mt-2"></div>
                                <div class="mt-4">
                                    @isset($employer->company_description)
                                        <p class="text-left text-gray-800 dark:text-gray-200">
                                            {{ $employer->company_description }}</p>
                                    @else
                                        <p class="text-left text-gray-800 dark:text-gray-200">No information available.</p>
                                    @endisset
                                </div>

                                <div class="mt-4 text-gray-800 dark:text-gray-200">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mt-4">Employment Size
                                    </h3>
                                    @if ($employer)
                                        {{ $employer->totalworkforce }}
                                    @else
                                        <span class="font-bold text-gray-800 dark:text-gray-200">Total Workforce:</span>
                                        N/A< @endif
                                            <div class="border-b border-gray-300 mt-4 mb-2"></div>
                                            <button
                                                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                View More Details
                                            </button>
                                </div>
                                <div class="mt-4 ">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 ">Share Job</h3>
                                    <div class="border-b border-gray-300 mt-2"></div>
                                    <div class="mt-4 flex flex-col sm:flex-row items-center">
                                        <div class="flex items-center mb-2 sm:mb-0">
                                            <input type="text" id="jobUrl"
                                                class="border border-gray-300 px-5 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ $fullUrl }}" readonly>
                                        </div>
                                        <button id="copyButton"
                                            class="ml-0 mt-2 sm:ml-2 sm:mt-0 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Copy URL
                                        </button>
                                    </div>
                                </div>


                                <script>
                                    document.getElementById('copyButton').addEventListener('click', function() {
                                        var jobUrlInput = document.getElementById('jobUrl');

                                        // Select the text inside the input
                                        jobUrlInput.select();
                                        jobUrlInput.setSelectionRange(0, 99999); // For mobile devices

                                        // Copy the URL to clipboard
                                        document.execCommand('copy');

                                        // Optionally, provide feedback to the user
                                        alert('URL copied to clipboard: ' + jobUrlInput.value);
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>


    @if (Session::has('jobsave'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }

                toastr.success("{{ Session::get('jobsave') }}", 'Job ID: {{ $job->id }} Saved', {
                    timeOut: 5000
                });

            });
        </script>
    @endif


</x-app-layout>
<style>
    /* Add this in your custom CSS file or within a <style> tag in your Blade template */
    .larger-bullets {
        list-style-type: none;
        /* Remove default bullets */
        padding-left: 20px;
        /* Add some padding to the left */
    }

    .larger-bullets li {
        position: relative;
        padding-left: 20px;
    }

    .larger-bullets li::before {
        content: '•';
        /* Unicode character for a bullet */
        position: absolute;
        left: 0;
        font-size: 24px;
        /* Adjust the size as needed */
        color: black;
        /* Change the color if needed */
    }
</style>
