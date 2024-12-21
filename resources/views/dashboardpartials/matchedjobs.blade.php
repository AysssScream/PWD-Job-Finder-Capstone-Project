   <section class=" w-full lg:w-4/5 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 ">

       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
           <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
           <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style"
               onload="this.onload=null;this.rel='stylesheet'">
           <link rel="preload" href="/images/team.webp" as="image">
           <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

       </head>
       <div class=" pt-0">
           <div
               class="bg-gradient-to-r from-blue-600 to-blue-500 dark:from-blue-700 dark:to-blue-600 p-4 rounded-lg shadow-md mb-6">
               <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                   <a href=""
                       class="text-xl sm:text-2xl text-white font-bold mb-2 sm:mb-0 hover:underline focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                       aria-label="{{ __('messages.userdashboard.available_pwd_jobs') }}">
                       <i class="fas fa-briefcase mr-2" aria-hidden="true"></i>
                       {{ __('messages.userdashboard.available_pwd_jobs') }}
                   </a>

                   <div class="text-white text-sm sm:text-base">
                       @php
                           $numberOfResults = $jobs->total();
                       @endphp

                       @if ($numberOfResults > 0)
                           <span
                               class="font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                               aria-label="{{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}"
                               tabindex="0">
                               <i class="fas fa-check-circle mr-1" aria-hidden="true"></i>
                               {{ $numberOfResults }} {{ __('messages.userdashboard.results_found') }}
                           </span>
                       @else
                           <span aria-label="{{ __('messages.userdashboard.no_results_found') }}"
                               class="font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                               tabindex="0">
                               <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i>
                               {{ __('messages.userdashboard.no_results_found') }}
                           </span>
                       @endif
                   </div>
               </div>
           </div>

           <!-- Job listings would go here -->

           <div class="mt-6 mb-4">
               <button id="openModalLink"
                   class="w-full flex items-center justify-center px-4 py-3 bg-white dark:bg-gray-800 text-blue-600 dark:text-white border-2 border-blue-600 dark:border-blue-500 rounded-lg hover:bg-blue-100 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90 shadow-md hover:shadow-lg font-semibold"
                   aria-label="{{ __('messages.userdashboard.change_jobpreferences') }}">
                   <i class="fas fa-cog mr-2" aria-hidden="true"></i>
                   {{ __('messages.userdashboard.change_jobpreferences') }}
               </button>
           </div>

           <!-- Modal code remains the same -->
           <div id="jobPreferencesModal"
               class="fixed inset-0 z-50 p-4 overflow-auto bg-black bg-opacity-50 flex justify-center items-center hidden">
               <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 w-full max-w-lg  rounded-lg shadow-xl"
                   style="max-height: 90vh; overflow-y: auto;">
                   <div
                       class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-purple-700 dark:to-blue-800 p-5 rounded-t-lg  border-b-4 border-blue-700 ">
                       <div class="flex justify-between items-center">
                           <h3 class="text-2xl font-semibold text-white flex items-center">
                               <i class="fas fa-cog mr-2"></i> <!-- Icon before the text -->
                               {{ __('messages.userdashboard.change_jobpreferences') }}
                           </h3>
                           <button id="closeModalBtn"
                               class="text-gray-200 hover:text-gray-300 dark:hover:text-gray-100 focus:outline-none">
                               X
                           </button>
                       </div>
                   </div>
                   <div class="mt-4 p-6">
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
           <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
               @foreach ($jobs as $job)
                   @if ($job->vacancy > 0)
                      <div tabindex="0"
                             class="bg-white dark:bg-gray-700 job-card rounded-lg shadow-3d transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 overflow-hidden border-2 border-blue-500 dark:border-blue-400 hover:border-blue-600 dark:hover:border-blue-500 transform hover:-translate-y-1 hover:shadow-xl">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 p-4 sm:p-6 relative" aria-label="Job Number {{ $job->id }}">
                                <!-- Company Logo Centered -->
                                <div class="flex flex-col items-center">
                                    @if ($job->company_logo && Storage::exists('public/' . $job->company_logo))
                                        <img src="{{ asset('storage/' . $job->company_logo) }}" 
                                             alt="Company Logo"
                                             aria-label="Company Logo"
                                             onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}'"
                                             onclick="openLogoModal(this.src)"
                                             class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full shadow-lg object-contain bg-white dark:bg-gray-700 p-1 transition-transform duration-300 hover:scale-105 cursor-pointer mb-4"
                                             tabindex="0"
                                             onkeypress="if(event.key === 'Enter') openLogoModal(this.src)">
                                    @else
                                        <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white dark:bg-gray-700 flex items-center justify-center shadow-lg transition-transform duration-300 hover:scale-105 mb-4">
                                            <i class="fas fa-building text-2xl sm:text-3xl md:text-4xl text-blue-500 dark:text-blue-400"
                                               aria-label="Empty Company Logo"></i>
                                        </div>
                                    @endif
            
                                    <!-- Job Title and Company Name Container -->
                                    <div class="text-center flex flex-col space-y-2 w-full px-4">
                                        <!-- Job Title -->
                                        <h3 class="text-base sm:text-lg md:text-xl font-bold text-white inline-flex items-center justify-center group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 break-words"
                                            aria-label="{{ $job->title }}" 
                                            tabindex="0">
                                            <span class="hover:text-blue-100 transition-colors duration-300 line-clamp-2">{{ $job->title }}</span>
                                        </h3>
                                        
                                        <!-- Company Name -->
                                        <p class="text-sm sm:text-base md:text-lg text-blue-100 inline-flex items-center justify-center group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 break-words"
                                            tabindex="0" 
                                            aria-label="Company: {{ $job->company_name }}">
                                            <span class="hover:text-white transition-colors duration-300 line-clamp-2">{{ $job->company_name }}</span>
                                        </p>
                                    </div>
                                </div>
                                 <div class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 dark:bg-blue-500"></div>
                             </div>

                           <div class="p-6">
                               <div class="space-y-3">
                                   <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                       <p class="flex flex-wrap items-center text-sm text-gray-600 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="{{ __('messages.userdashboard.date_posted') }} {{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}">
                                           <i class="far fa-calendar-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                           <span
                                               class="font-semibold">{{ __('messages.userdashboard.date_posted') }}</span>
                                           <span
                                               class="ml-1">{{ \Carbon\Carbon::parse($job->date_posted)->format('M d, Y') }}</span>
                                       </p>
                                   </div>
                                   <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                       <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="{{ __('messages.userdashboard.educational_level') }} {{ $job->educational_level }}">
                                           <i class="fas fa-graduation-cap text-blue-400 dark:text-blue-300 mr-2"></i>
                                           <span
                                               class="font-semibold">{{ __('messages.userdashboard.educational_level') }}</span>
                                           <span class="ml-1">{{ $job->educational_level }}</span>
                                       </p>
                                   </div>
                                   <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                       <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="{{ __('messages.userdashboard.location') }} {{ $job->location }}">
                                           <i class="fas fa-map-marker-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                           <span
                                               class="font-semibold">{{ __('messages.userdashboard.location') }}</span>
                                           <span class="ml-1">{{ $job->location }}</span>
                                       </p>
                                   </div>
                                   <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                       <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="{{ __('messages.userdashboard.job_type') }} {{ $job->job_type }}">
                                           <i class="fas fa-briefcase text-blue-400 dark:text-blue-300 mr-2"></i>
                                           <span
                                               class="font-semibold">{{ __('messages.userdashboard.job_type') }}</span>
                                           <span class="ml-1">{{ $job->job_type }}</span>
                                       </p>
                                   </div>
                                   <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                       <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           tabindex="0"
                                           aria-label="{{ __('messages.userdashboard.salary') }} {{ number_format($job->salary, 2) }} Pesos">
                                           <i class="fas fa-money-bill-wave text-blue-400 dark:text-blue-300 mr-2"></i>
                                           <span
                                               class="font-semibold">{{ __('messages.userdashboard.salary') }}</span>
                                           <span class="ml-1">₱{{ number_format($job->salary, 2) }} / Month</span>
                                       </p>
                                   </div>
                                   <div class="p-3">
                                       <div class="text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                           aria-label="{{ __('messages.userdashboard.job_description') }} {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}"
                                           tabindex="0">
                                           <p class="font-semibold mb-1 flex items-center">
                                               <i class="fas fa-file-alt text-blue-400 dark:text-blue-300 mr-2"></i>
                                               {{ __('messages.userdashboard.job_description') }}
                                           <p id="jobDescription">
                                               {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                                               <span id="dots">...</span>
                                               <span id="more" style="display: none;">
                                                   {{ substr($job->description, 100) }}
                                               </span>
                                           </p>
                                           <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                               id="readMoreBtn"
                                               class="text-blue-700 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 inline-flex items-center mt-2"
                                               aria-label="{{ __('messages.userdashboard.read_more') }}"
                                               tabindex="0">
                                               {{ __('messages.userdashboard.read_more') }}
                                               <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                           </a>
                                       </div>
                                   </div>
                               </div>

                               <div class="mt-6 text-center">
                                   <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                       class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-full hover:bg-blue-700 dark:hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                                       aria-label="{{ __('messages.job.view_details') }} for Job Number {{ $job->id }}">
                                       <span class="mr-2">{{ __('messages.job.view_details') }}</span>
                                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                               d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                       </svg>
                                   </a>
                               </div>
                           </div>
                       </div>
                   @endif
               @endforeach

               @if ($jobs->isEmpty())
                   <div class="col-span-full">
                       <div class="w-full text-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                           <div class="flex flex-col items-center justify-center 
                                focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                               aria-label="No Matched Jobs Found" tabindex="0">
                               <i class="fas fa-sad-cry text-blue-400 dark:text-blue-300 text-5xl mb-4"></i>
                               <h2 class="text-gray-800 dark:text-gray-200 text-2xl font-bold mb-2">
                                   {{ __('messages.userdashboard.no_matched_jobs') }}
                               </h2>
                               <p class="text-gray-600 dark:text-gray-400 text-lg mb-4">
                                   {{ __('messages.userdashboard.no_jobs_found_message') }}
                               </p>
                               <button onclick="clearSearchAndReload()"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 disabled:opacity-25 transition ease-in-out duration-150">
                                   <i class="fas fa-redo-alt mr-2"></i>
                                   {{ __('messages.userdashboard.back_to_all_matched_jobs') }}
                               </button>
                           </div>
                       </div>
                   </div>
               @endif
           </div>
           <div class="mt-6">
               <nav class="flex flex-col sm:flex-row justify-between items-center">
                   @if ($jobs->onFirstPage())
                       <span aria-label="{{ __('messages.job.Previous') }}"
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Previous') }}
                       </span>
                   @else
                       <a href="{{ $jobs->previousPageUrl() }}" tabindex="0"
                           aria-label="{{ __('messages.job.Previous') }}"
                           class="w-full sm:w-auto px-4 py-2 mb-2 sm:mb-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Previous') }}
                       </a>
                   @endif

                   <div class="flex space-x-2">
                       @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                           <a href="{{ $url }}"
                               aria-label="{{ __('messages.job.Page Number') }} {{ $page }}"
                               class="px-4 py-2 border border-gray-300 dark:border-gray-700
                           {{ $jobs->currentPage() == $page ? 'bg-blue-700 text-white dark:bg-blue-700 dark:text-gray-100' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900' }}
                           rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                               {{ $page }}
                           </a>
                       @endforeach
                   </div>

                   @if ($jobs->hasMorePages())
                       <a href="{{ $jobs->nextPageUrl() }}" aria-label="{{ __('messages.job.Next') }}"
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Next') }}
                       </a>
                   @else
                       <span aria-label="{{ __('messages.job.Next') }}" tabindex="0"
                           aria-label=" {{ __('messages.job.Next') }}"
                           class="w-full sm:w-auto px-4 py-2 mt-2 sm:mt-0 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-md cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                           {{ __('messages.job.Next') }}
                       </span>
                   @endif
               </nav>
           </div>
       </div>
   </section>

              <!-- Modal for company logo -->
            <div id="logoModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                <div class="relative bg-white dark:bg-gray-800 p-2 rounded-lg max-w-2xl w-full mx-4 transform transition-all duration-300">
                    <button onclick="closeLogoModal()" 
                            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                    <div class="flex items-center justify-center p-4">
                        <img id="modalLogo" src="" alt="Company Logo" class="max-w-full max-h-[80vh] object-contain">
                    </div>
                </div>
            </div>
            
            <!-- JavaScript for Modal -->
    <script>
            function openLogoModal(imageUrl) {
                const modal = document.getElementById('logoModal');
                const modalImg = document.getElementById('modalLogo');
                
                modalImg.src = imageUrl;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            function closeLogoModal() {
                const modal = document.getElementById('logoModal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            
            // Close modal when clicking outside
            document.getElementById('logoModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeLogoModal();
                }
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeLogoModal();
                }
            });
    </script>
   <script>
       function clearSearchAndReload() {
           var currentUrl = window.location.href;

           var baseUrl = currentUrl.split('?')[0];

           window.location.href = baseUrl;
       }
   </script>
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


       @keyframes fadeInUp {
           0% {
               opacity: 0;
               transform: translateY(20px);
           }

           100% {
               opacity: 1;
               transform: translateY(0);
           }
       }

       .job-card {
           transition: all 0.3s ease;
           opacity: 0;
           transform: translateY(20px);
           animation: fadeInUp 0.5s ease forwards;
       }
   </style>
