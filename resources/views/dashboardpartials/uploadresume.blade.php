 <section class=" w-full lg:w-4/5 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 ">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
         <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
         <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style"
             onload="this.onload=null;this.rel='stylesheet'">
         <link rel="preload" href="/images/team.png" as="image">
         <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

     </head>
     <div class="text-gray-900 dark:text-gray-100">
         <div class="flex items-center justify-between mb-2 mt-6">
             <h2 class="text-2xl font-bold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                 aria-label="{!! __('messages.userdashboard.available_matched_jobs') !!}" tabindex="0">
                 <i class="fas fa-briefcase mr-2"></i> Available Resume Matched Jobs
             </h2>
         </div>
     </div>
     <form id="resumeUploadForm" action="{{ route('resume.uploadresults') }}" method="POST"
         enctype="multipart/form-data"
         class="bg-white dark:bg-gray-800 p-4 rounded shadow-md max-w-md mx-auto mb-5 sm:mx-0 sm:ml-4">
         @csrf
         <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
             <div class="flex-1">
                 <label for="file" class="block text-gray-700 dark:text-gray-300 text-sm font-medium">Choose
                     file:</label>
                 <input type="file" name="file" id="file" required
                     class="mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 w-full">
             </div>
             <div class="flex-shrink-0">
                 <button type="submit"
                     class="bg-blue-500 mt-6 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:shadow-outline w-full sm:w-auto">
                     Upload
                 </button>
             </div>
         </div>
     </form>


     @if (isset($data))
         <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-4">
             <p class="text-gray-700 dark:text-gray-200"><strong>Education:</strong> {{ $data['education'] }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>Age:</strong> {{ $data['age'] ?? 'N/A' }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>Skills:</strong> {{ $data['skills'] ?? 'N/A' }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>File name:</strong> {{ $data['filename'] ?? 'N/A' }}
             </p>
             <br>
         </div>
     @elseif (isset($resume))
         <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-4">
             <p class="text-gray-700 dark:text-gray-200"><strong>Education:</strong> {{ $resume->education }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>Age:</strong> {{ $resume->age ?? 'N/A' }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>Skills:</strong> {{ $resume->skills ?? 'N/A' }}</p>
             <br>
             <p class="text-gray-700 dark:text-gray-200"><strong>File name:</strong> {{ $resume->file_name ?? 'N/A' }}
             </p>
             <br>
         </div>
     @endif

     <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
         @if ($matchedResumeJobs->isEmpty())
             <div
                 class="col-span-1 sm:col-span-2 bg-red-500 dark:bg-red-700  dark:text-red-200 p-4 rounded-lg shadow-md">
                 <p class="text-gray-200">No jobs matched your skills and qualifications in your CV/Resume. You may
                     search jobs based on your preferences.</p>
             </div>
         @else
             @foreach ($matchedResumeJobs as $job)
                 @if ($job->vacancy > 0)
                     <div ta bindex="0"
                         class="bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700 text-gray-700 dark:text-gray-200 p-4 rounded-lg shadow-3d focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         aria-label="Job Number {{ $job->id }}{{ $job->title }}">

                         <div class="mb-4 flex justify-between" aria-label="Job Number {{ $job->id }}">
                             @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                 <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                                     aria-label="Company Logo" class="w-24 h-24 rounded-lg shadow-md">
                             @else
                                 <img src="{{ asset('/images/avatar.png') }}" alt="Default Image" class="w-24 h-24"
                                     aria-label="Empty Company Logo">
                             @endif
                             <div>
                                 <div class="text-right">
                                     <h3
                                         class="text-xl sm:text-lg md:text-xl lg:text-2xl font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                         {{ $job->title }}</h3>
                                     <p class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600  dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                         tabindex="0"
                                         aria-label="Job Number {{ $job->id }}{{ $job->company_name }}">
                                         {{ $job->company_name }}
                                     </p>
                                     <p class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600  dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                         tabindex="0">
                                         @if (!empty($matchedWords))
                                             <h3>Matched Words from Job Info:</h3>
                                             <ul>
                                                 @foreach ($matchedWords as $word)
                                                     <li>{{ $word }}</li>
                                                 @endforeach
                                             </ul>
                                         @endif

                                     </p>
                                 </div>
                             </div>
                         </div>
                         <p class="text-sm text-gray-800 mt-2 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                             tabindex="0"
                             aria-label="{{ __('messages.userdashboard.date_posted') }} {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}">
                             <strong>{{ __('messages.userdashboard.date_posted') }}</strong>
                             {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                         </p>

                         <div class="mt-2">
                             <p class="text-sm text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                 aria-label="{{ __('messages.userdashboard.job_description') }}  {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}"
                                 tabindex="0 ">
                                 <strong>{{ __('messages.userdashboard.job_description') }}</strong>
                                 <span id="jobDescription">
                                     {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                     <span id="dots">...</span>
                                     <span id="more" style="display: none;">
                                         {{ substr($job->description, 100) }}
                                     </span>
                                 </span>
                             </p>
                             <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                 id="readMoreBtn"
                                 class="text-sm text-blue-500 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                 aria-label=" {{ __('messages.userdashboard.read_more') }}" tabindex="0">
                                 {{ __('messages.userdashboard.read_more') }}
                             </a>
                         </div>

                         <div class="flex justify-between mt-2">
                             <div class="mr-4">
                                 <p aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}"
                                     class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                     <a href=""
                                         aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}"
                                         class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                         <strong>{{ __('messages.userdashboard.educational_level') }}</strong>
                                         {{ $job->educational_level }}
                                     </a>
                                 </p>

                                 <a href=""
                                     aria-label="{{ __('messages.userdashboard.location') }}  {{ $job->location }}"
                                     class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block mb-2">
                                     <strong>{{ __('messages.userdashboard.location') }}</strong>
                                     {{ $job->location }}
                                 </a>
                                 <a href=""
                                     aria-label="{{ __('messages.userdashboard.job_type') }} {{ $job->job_type }}"
                                     class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block mb-2">
                                     <strong>{{ __('messages.userdashboard.job_type') }}</strong>
                                     {{ $job->job_type }}
                                 </a>
                                 <a href=""
                                     aria-label="{{ __('messages.userdashboard.salary') }} {{ number_format($job->salary, 2) }} Pesos"
                                     class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 block">
                                     <strong>{{ __('messages.userdashboard.salary') }}</strong>
                                     ₱{{ number_format($job->salary, 2) }}
                                 </a>
                             </div>

                             <div class="mt-6">
                                 <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                     aria-label="Select Job Number {{ $job->id }}">
                                     <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 10">
                                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                             stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                     </svg>
                                     <span class="sr-only">Icon description</span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endif
             @endforeach
         @endif
     </div>
 </section>
