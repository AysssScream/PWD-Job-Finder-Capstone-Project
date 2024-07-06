   <section class=" w-full md:w-4/5 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 ">

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
               <h2 class="text-2xl font-bold">
                   <i class="fas fa-briefcase mr-2"></i>Available Matched Jobs
               </h2>

           </div>

           <div class="flex flex-col sm:flex-row justify-between items-center mt-4 mb-4">
               <div class="flex items-center w-full sm:w-auto mb-2 sm:mb-0">
                   <input id="resume_upload" type="file" class="hidden">
                   <label for="resume_upload"
                       class="cursor-pointer inline-block w-full sm:w-auto px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">
                       <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Resume
                       <p class="mt-1 text-xs text-white dark:text-gray-300" id="file_input_help">
                           PDF, DOCX (MAX. 2MB)</p>

                   </label>
               </div>
               <div class="text-center sm:text-right">
                   <p>{{ $matchedJobs->count() }} Results found</p>
                   <a href="#" class="text-blue-500 hover:underline inline-block mt-2 sm:mt-0 sm:ml-2">Change Job
                       Preferences</a>
               </div>

           </div>



           <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
               @foreach ($matchedJobs as $job)
                   @if ($jobs->isEmpty())
                       <p>No jobs found.</p>
                   @else
                       <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-3d">
                           <div class="mb-4 flex justify-between ">
                               @if ($job->company_logo)
                                   <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                                       class="w-24 h-24 rounded-lg shadow-md">
                               @else
                                   <img src="{{ asset('/images/avatar.png') }}" alt="Default Image" class="w-16 h-16">
                               @endif

                               <div>
                                   <div class="text-right">
                                       <h3 class="text-xl sm:text-lg md:text-xl lg:text-2xl font-semibold">
                                           {{ $job->title }}</h3>
                                       <p
                                           class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600 dark:text-gray-400 mt-1">
                                           {{ $job->company_name }}</p>
                                   </div>

                               </div>

                           </div>

                           <p class="text-sm text-gray-800 mt-2"><strong>Date Posted:</strong>
                               {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}
                           </p>

                           <p class="text-sm text-left"><strong>Location:</strong> {{ $job->location }}
                           </p>

                           <div class="mt-2">
                               <p class="text-sm text-gray-800"><strong>Job Description:</strong>
                                   <span id="jobDescription">
                                       {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                       <span id="dots">...</span>
                                       <span id="more" style="display: none;">
                                           {{ substr($job->description, 100) }}
                                       </span>
                                   </span>
                               </p>
                               <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                   id="readMoreBtn" class="text-sm text-blue-500 focus:outline-none">Read
                                   More..</a>

                           </div>

                           <div class="flex justify-between">
                               <div class="mt-2 mr-4">
                                   <p class="text-sm"><strong>Educational Level:</strong>
                                       {{ $job->educational_level }}</p>
                                   <p class="text-sm"><strong>Location:</strong> {{ $job->location }}</p>
                                   <p class="text-sm"><strong>Job Type:</strong> {{ $job->job_type }}</p>
                                   <p class="text-sm"><strong>Salary:</strong>
                                       ₱{{ number_format($job->salary, 2) }}</p>
                               </div>

                               <div class="mt-6">
                                   <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
           </div>

           <div class="mt-6">
               <nav class="flex flex-col sm:flex-row justify-between items-center">
                   @if ($jobs->onFirstPage())
                       <span
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed">
                           Previous
                       </span>
                   @else
                       <a href="{{ $jobs->previousPageUrl() }}"
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900">
                           Previous
                       </a>
                   @endif

                   <div class="flex space-x-2">
                       @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                           <a href="{{ $url }}"
                               class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-500 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md">
                               {{ $page }}
                           </a>
                       @endforeach
                   </div>

                   @if ($jobs->hasMorePages())
                       <a href="{{ $jobs->nextPageUrl() }}"
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900">
                           Next
                       </a>
                   @else
                       <span
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed">
                           Next
                       </span>
                   @endif
               </nav>
           </div>
       </div>
   </section>
   @if (Session::has('message'))
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
       <script>
           $(document).ready(function() {
               toastr.options = {
                   "progressBar": true,
                   "closeButton": true,
               }
               toastr.success("{{ Session::get('message') }}", '{{ $matchedJobs->count() }} Matched Jobs Found', {
                   timeOut: 5000
               });
           });
       </script>
   @endif
   <style>
       /* Custom shadow class for 3D effect */
       .shadow-3d {
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
           transition: transform 0.3s ease, box-shadow 0.3s ease;
       }
   </style>
