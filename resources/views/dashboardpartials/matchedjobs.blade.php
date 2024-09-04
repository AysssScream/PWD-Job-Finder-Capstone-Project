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
                   <i class="fas fa-briefcase mr-2"></i> {!! __('messages.userdashboard.available_matched_jobs') !!}
               </h2>
           </div>

           <div class="flex flex-col sm:flex-row justify-end items-center mt-4 mb-4">
               <div class="text-center sm:text-right">
                   @php
                       $numberOfResults = $jobs->count();
                   @endphp
                   @if ($numberOfResults > 0)
                       <p aria-label="{{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}"
                           tabindex="0"
                           class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}</p>
                   @else
                       <p aria-label="{{ __('messages.userdashboard.no_results_found') }}" tabindex="0"
                           class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.userdashboard.no_results_found') }}</p>
                   @endif
                   <a href="#" id="openModalLink"
                       aria-label="{{ __('messages.userdashboard.change_jobpreferences') }}"
                       class="text-blue-500 hover:underline inline-block mt-2 sm:mt-0 sm:ml-2 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">{{ __('messages.userdashboard.change_jobpreferences') }}</a>
               </div>



               <div id="jobPreferencesModal"
                   class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center hidden">
                   <!-- Modal Content -->
                   <div class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-200  w-1/2 p-8 rounded-lg">
                       <!-- Modal Header -->
                       <div class="flex justify-between items-center">
                           <h3 class="text-lg font-semibold">{{ __('messages.userdashboard.change_jobpreferences') }}
                           </h3>
                           <i id="closeModalBtn"
                               class="fas fa-times fa-xl text-gray-700 dark:text-gray-200 hover:text-gray-300 focus:outline-none"></i>

                       </div>
                       <!-- Modal Body -->
                       <div class="mt-4">
                           @include('profile.sections.jobpreferences')
                       </div>
                   </div>
               </div>


               <script>
                   document.addEventListener('DOMContentLoaded', function() {
                       const openModalLink = document.getElementById('openModalLink');
                       const closeModalBtn = document.getElementById('closeModalBtn');
                       const jobPreferencesModal = document.getElementById('jobPreferencesModal');

                       openModalLink.addEventListener('click', function(event) {
                           event.preventDefault();
                           jobPreferencesModal.classList.remove('hidden');
                       });

                       closeModalBtn.addEventListener('click', function() {
                           jobPreferencesModal.classList.add('hidden');
                       });
                   });
               </script>

           </div>


           <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
               @foreach ($jobs as $job)
                   @if ($job->vacancy > 0)
                       <div tabindex="0"
                           class="bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700 p-4 rounded-lg shadow-3d focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                           aria-label="Job Number {{ $job->id }}{{ $job->title }}">

                           <div class="mb-4 flex justify-between" aria-label="Job Number {{ $job->id }}">
                               @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                   <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                                       aria-label="Company Logo" class="w-24 h-24 rounded-lg shadow-md"
                                       onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                               @else
                                   <img src="{{ asset('/images/avatar.png') }}" alt="Default Image"
                                       class="w-24 h-24 rounded-lg shadow-md" aria-label="Empty Company Logo">
                               @endif

                               <div>
                                   <div class="text-right">
                                       <h3
                                           class="text-black dark:text-white text-xl sm:text-lg md:text-xl lg:text-2xl font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                           {{ $job->title }}</h3>
                                       <p class="text-md sm:text-sm md:text-md lg:text-lg text-gray-600  dark:text-gray-400 mt-1 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="Job Number {{ $job->id }}{{ $job->company_name }}">
                                           {{ $job->company_name }}
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

                           <div class="flex justify-between mt-2 text-gray-700 dark:text-gray-200">
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

               @if ($jobs->isEmpty())
                   <p class="text-gray-500 dark:text-gray-400 mt-4">No jobs found.</p>
               @endif
           </div>

           <div class="mt-6">
               <nav class="flex flex-col sm:flex-row justify-between items-center">
                   @if ($jobs->onFirstPage())
                       <span aria-label="Previous"
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Previous') }}
                       </span>
                   @else
                       <a href="{{ $jobs->previousPageUrl() }}" tabindex="0"
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Previous') }}
                       </a>
                   @endif

                   <div class="flex space-x-2">
                       @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                           <a href="{{ $url }}"
                               aria-label="{{ __('messages.job.Page Number') }} {{ $page }}"
                               class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-500 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                               {{ $page }}
                           </a>
                       @endforeach
                   </div>

                   @if ($jobs->hasMorePages())
                       <a href="{{ $jobs->nextPageUrl() }}" aria-label="Next"
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Next') }}
                       </a>
                   @else
                       <span aria-label="Next" tabindex="0"
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Next') }}
                       </span>
                   @endif
               </nav>
           </div>
       </div>
   </section>
   @if (Session::has('match'))
       <script>
           $(document).ready(function() {
               toastr.options = {
                   "progressBar": true,
                   "closeButton": true,
               }
               toastr.success("{{ Session::get('match') }}", '{{ $jobs->count() }} Matched Jobs Found', {
                   timeOut: 5000
               });
           });
       </script>
   @endif

   @if (Session::has('preferences'))
       <script>
           $(document).ready(function() {
               toastr.options = {
                   "progressBar": true,
                   "closeButton": true,
               }

               toastr.success("{{ Session::get('preferences') }}", 'Job Preferences Modified Successfully!', {
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
