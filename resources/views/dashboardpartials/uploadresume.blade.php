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

     <body x-data="{ showResumeTemplateModal: false }">
         <form id="resumeUploadForm" action="{{ route('resume.uploadresults') }}" method="POST"
             enctype="multipart/form-data" class="bg-white dark:bg-gray-800 mb-5 w-full">
             @csrf
             <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                 <div class="flex-1 flex items-center justify-center">
                     <label for="dropzone-file"
                         class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                         <div class="flex flex-col items-center justify-center pt-5 pb-6">
                             <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2"
                                     d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                             </svg>
                             <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                     to
                                     upload</span> or drag and drop</p>
                             <p class="text-xs text-gray-500 dark:text-gray-400">PDF, DOCX (Max: 2MB)</p>
                         </div>
                         <input id="dropzone-file" name="resume" type="file" class="hidden"
                             onchange="displayFileName()" />
                     </label>
                 </div>
                 <div class="flex-shrink-0 flex flex-col space-y-4">
                     <!-- Upload Button -->
                     <button type="submit"
                         class="bg-blue-500 mt-6 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:shadow-outline w-full sm:w-auto">
                         <i class="fas fa-upload mr-2"></i> <!-- Font Awesome icon for upload -->
                         Add File
                     </button>
                     <button @click="showResumeTemplateModal = true" type="button"
                         class="bg-green-600 dark:bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700 dark:hover:bg-green-600 focus:outline-none focus:shadow-outline w-full sm:w-auto">
                         <i class="fas fa-file-alt mr-2"></i> <!-- Font Awesome icon for resume template -->
                         Resume Template
                     </button>
                 </div>

             </div>
             <div id="file-name" class="mt-2 text-gray-600 dark:text-gray-400"></div>
         </form>
         <script>
             function displayFileName() {
                 var input = document.getElementById('dropzone-file');
                 var fileName = input.files[0] ? input.files[0].name : 'No file selected';
                 document.getElementById('file-name').textContent = 'Selected file: ' + fileName;
             }
         </script>

         @if (isset($data))
             <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-4">
                 <p class="text-gray-700 dark:text-gray-200"><strong>Education:</strong> {{ $data['education'] }}</p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>Age:</strong> {{ $data['age'] ?? 'N/A' }}</p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>Skills:</strong> {{ $data['skills'] ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>File name:</strong>
                     {{ $data['filename'] ?? 'N/A' }}
                 </p>
                 <br>
             </div>
         @elseif (isset($resume))
             <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-4">
                 <p class="text-gray-700 dark:text-gray-200"><strong>Education:</strong> {{ $resume->education }}</p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>Age:</strong> {{ $resume->age ?? 'N/A' }}</p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>Skills:</strong> {{ $resume->skills ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200"><strong>File name:</strong>
                     {{ $resume->file_name ?? 'N/A' }}
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

                                     </div>
                                 </div>

                             </div>

                             <div
                                 class="flex justify-center p-4 rounded-lg mb-4 
                                    @if (isset($job->match_reasons['skills']) && count($job->match_reasons['skills']) > 0) bg-green-600 dark:bg-green-500 
                                    @else bg-yellow-600 @endif">
                                 <div class="text-center">
                                     <ul class="list-disc list-inside text-white">
                                         <ul>
                                             @if (isset($job->match_reasons['education']) && count($job->match_reasons['education']) > 0)
                                                 <li><strong>Matched Education:</strong>
                                                     {{ implode(', ', $job->match_reasons['education']) }}
                                                     ({{ $job->match_percentages['education'] ?? '0%' }})
                                                     Matched
                                                 </li>
                                             @endif

                                             @if (isset($job->match_reasons['skills']) && count($job->match_reasons['skills']) > 0)
                                                 @php
                                                     $maxSkillsToShow = 2;
                                                     $skillsToShow = array_slice(
                                                         $job->match_reasons['skills'],
                                                         0,
                                                         $maxSkillsToShow,
                                                     );
                                                     $remainingSkills =
                                                         count($job->match_reasons['skills']) - $maxSkillsToShow;
                                                 @endphp
                                                 <li><strong>Matched Skill:</strong>
                                                     ({{ implode(', ', $skillsToShow) }}{{ $remainingSkills > 0 ? ', ...' : '' }})
                                                     {{ $job->match_percentages['skills'] ?? '0%' }}
                                                 </li>
                                             @else
                                                 <li><strong>Note:</strong> No skill keywords matched for this job.</li>
                                             @endif

                                             @if (isset($job->match_reasons['age']) && count($job->match_reasons['age']) > 0)
                                                 <li><strong>Matched Age:</strong>
                                                     {{ implode(', ', $job->match_reasons['age']) }}
                                                     ({{ $job->match_percentages['age'] ?? '0%' }}) Matched
                                                 </li>
                                             @endif
                                         </ul>
                                     </ul>
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
                                             <path stroke="currentColor" stroke-linecap="round"
                                                 stroke-linejoin="round" stroke-width="2"
                                                 d="M1 5h12m0 0L9 1m4 4L9 9" />
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
     </body>
 </section>

 <template x-if="showResumeTemplateModal">
     <div x-show="showResumeTemplateModal" class="fixed inset-0 z-50 " aria-labelledby="resume-template-modal-title"
         role="dialog" aria-modal="true">

         <div class="flex items-end justify-center p-5 h-svh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
             <!-- Overlay -->
             <div x-show="showResumeTemplateModal" x-transition:enter="ease-out duration-300"
                 class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

             <!-- Modal Content -->
             <div x-show="showResumeTemplateModal" x-transition:enter="ease-out duration-300"
                 class="inline-block align-bottom bg-white rounded-lg
                 text-left overflow-y-auto shadow-xl transform transition-all sm:my-8 sm:align-middle w-full max-w-lg
                 sm:max-w-xl md:max-w-2xl lg:max-w-4xl"
                 style="
                 margin-bottom: 0px;
                 margin-top: 40px;
                 height: 90svh;
                 ">
                 <div class="bg-gray-300 dark:bg-gray-800 h-max px-4 pt-5 pb-4 sm:p-6 sm:pb-4 ">
                     <div class="bg-gray-100 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                         <button type="button" @click="showResumeTemplateModal = false"
                             class="w-full w-full text-gray-900 dark:text-gray-200 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-white hover:bg-blue-600 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                             Close
                         </button>
                         <a href="{{ route('download.docx') }}"
                             class="mt-3 w-full inline-flex justify-center text-gray-900 dark:text-gray-200 rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-white hover:bg-blue-600 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                             Download DOCX
                         </a>
                     </div>
                     <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 ">

                         <div class="sm:flex sm:items-start">
                             <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                 <h3 class="text-lg leading-6 font-medium text-gray-900"
                                     id="resume-template-modal-title">
                                     Suggested Resume Format (A4 Size)
                                 </h3>
                                 <div class="mt-2">
                                     <p class="text-sm text-gray-500 mb-4">
                                         For best results, please format your resume as follows:
                                     </p>
                                     <div class="bg-white p-6  rounded-lg shadow-md overflow-x-auto text-sm"
                                         style="
                                            max-width: 100%;
                                            height: auto;
                                            min-height: 297mm;
                                            margin: 0 auto;
                                            border: 1px #e5e7eb solid;
                                            ">
                                         <div
                                             class="flex flex-col sm:flex-row justify-between items-center sm:items-start mb-8 space-y-4 sm:space-y-0 ">
                                             <div class="text-center sm:text-left">
                                                 <h1 class="font-bold text-3xl text-gray-800 mb-2">
                                                     FULL NAME
                                                 </h1>
                                                 <div class="space-y-1 text-gray-600">
                                                     <p class="flex items-center justify-center sm:justify-start">
                                                         <svg class="w-5 h-5 mr-2 text-gray-500" fill="none"
                                                             stroke="currentColor" viewBox="0 0 24 24"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                             <path stroke-linecap="round" stroke-linejoin="round"
                                                                 stroke-width="2"
                                                                 d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                             </path>
                                                         </svg>
                                                         your.email@example.com
                                                     </p>
                                                     <p class="flex items-center justify-center sm:justify-start">
                                                         <svg class="w-5 h-5 mr-2 text-gray-500" fill="none"
                                                             stroke="currentColor" viewBox="0 0 24 24"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                             <path stroke-linecap="round" stroke-linejoin="round"
                                                                 stroke-width="2"
                                                                 d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                             </path>
                                                         </svg>
                                                         (123) 456-7890
                                                     </p>
                                                     <p class="flex items-center justify-center sm:justify-start">
                                                         <svg class="w-5 h-5 mr-2 text-gray-500" fill="none"
                                                             stroke="currentColor" viewBox="0 0 24 24"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                             <path stroke-linecap="round" stroke-linejoin="round"
                                                                 stroke-width="2"
                                                                 d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                             </path>
                                                             <path stroke-linecap="round" stroke-linejoin="round"
                                                                 stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                             </path>
                                                         </svg>
                                                         City, State
                                                     </p>
                                                 </div>
                                             </div>
                                             <div
                                                 class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 border-4 border-white shadow-lg">
                                                 <svg class="w-20 h-20" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                     <path stroke-linecap="round" stroke-linejoin="round"
                                                         stroke-width="2"
                                                         d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                     </path>
                                                 </svg>
                                             </div>
                                         </div>

                                         <div class="space-y-6">
                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     OBJECTIVE
                                                 </h2>
                                                 <p class="text-gray-600">
                                                     A brief statement about your career goals and what
                                                     you're looking for.
                                                 </p>
                                             </div>

                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     EDUCATION
                                                 </h2>
                                                 <p class="text-gray-600">
                                                     <strong>Degree, Major</strong>
                                                 </p>
                                                 <p class="text-gray-600">
                                                     University Name, Graduation Year
                                                 </p>
                                             </div>

                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     SKILLS
                                                 </h2>
                                                 <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                     <div>
                                                         <p class="font-semibold text-gray-700">
                                                             Hard Skills:
                                                         </p>
                                                         <ul class="list-disc list-inside text-gray-600">
                                                             <li>Skill 1</li>
                                                             <li>Skill 2</li>
                                                             <li>Skill 3</li>
                                                         </ul>
                                                     </div>
                                                     <div>
                                                         <p class="font-semibold text-gray-700">
                                                             Soft Skills:
                                                         </p>
                                                         <ul class="list-disc list-inside text-gray-600">
                                                             <li>Skill 1</li>
                                                             <li>Skill 2</li>
                                                             <li>Skill 3</li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     WORK EXPERIENCE
                                                 </h2>
                                                 <div class="mb-4">
                                                     <p class="font-semibold text-gray-700">
                                                         Job Title, Company Name
                                                     </p>
                                                     <p class="italic text-gray-600 mb-2">
                                                         Start Date - End Date
                                                     </p>
                                                     <ul class="list-disc list-inside text-gray-600">
                                                         <li>Responsibility/Achievement 1</li>
                                                         <li>Responsibility/Achievement 2</li>
                                                     </ul>
                                                 </div>
                                             </div>

                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     CERTIFICATIONS
                                                 </h2>
                                                 <ul class="list-disc list-inside text-gray-600">
                                                     <li>
                                                         Certification Name, Issuing Organization, Year
                                                     </li>
                                                 </ul>
                                             </div>
                                             <div>
                                                 <h2 class="text-xl font-bold text-gray-800 mb-2">
                                                     ADDITIONAL INFORMATION
                                                 </h2>
                                                 <p class="text-gray-600">
                                                     Languages, Volunteer Work, etc.
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </div>
 </template>
