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
     </head>
     <div class="bg-gradient-to-r from-blue-500 to to-blue-600 p-1 rounded-t-lg shadow-lg ">
         <div class="text-gray-900 dark:text-gray-100">
             <div class="flex items-center justify-between mb-2 mt-4">
                 <h3 class="text-2xl text-white  font-bold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     aria-label="{!! __('messages.resume.choose_resume') !!}" tabindex="0">
                     <i class="fas fa-file-upload ml-2 mr-2"></i> {!! __('messages.resume.choose_resume') !!}
                 </h3>
             </div>
         </div>
     </div>
     
    <div class="mt-6"></div>
        <body x-data="{ showResumeTemplateModal: false }">
            <form id="resumeUploadForm" action="{{ route('resume.uploadresults') }}" method="POST"
                enctype="multipart/form-data" class="bg-white dark:bg-gray-800 mb-5 w-full">
                @csrf
                <!-- Improved Disclaimer Section -->
                <div id="disclaimer" class="bg-blue-50 dark:bg-gray-700 p-6 rounded-lg border-l-4 border-blue-500 shadow-md mb-6">
                    <div class="flex items-start space-x-4">
                        <!-- Info Icon -->
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-500 dark:text-blue-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
        
                        <!-- Disclaimer Content -->
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-blue-700 dark:text-blue-400 mb-2">
                                Important Disclaimer
                            </h3>
                            <div class="space-y-3 text-gray-600 dark:text-gray-300">
                                <p class="text-base">
                                    This resume parsing algorithm is designed to assist with the extraction and analysis of resume data. Please note:
                                </p>
                                <ul class="list-disc ml-5 space-y-2">
                                    <li>Results may vary in accuracy and completeness</li>
                                    <li>Parsing accuracy depends on resume formatting and data quality</li>
                                    <li>Language variations may affect parsing results</li>
                                </ul>
                                <div class="mt-4 flex items-center">
                                    <p class="text-sm bg-blue-100 dark:bg-gray-600 p-2 rounded-lg">
                                        <span class="font-semibold">💡 Recommendation:</span> 
                                        For best results, consider using our provided resume template
                                        <button type="button" 
                                            @click="showResumeTemplateModal = true"
                                            class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-sm ml-1">
                                            Download Template
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
        
                        <!-- Dismiss Button -->
                        <button type="button" 
                            onclick="hideDisclaimer()"
                            class="flex-shrink-0 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full p-1"
                            aria-label="Dismiss disclaimer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
        
                <script>
                // Function to hide disclaimer (only for current session)
                function hideDisclaimer() {
                    const disclaimer = document.getElementById('disclaimer');
                    disclaimer.style.transition = 'all 0.3s ease-out';
                    disclaimer.style.opacity = '0';
                    setTimeout(() => {
                        disclaimer.style.display = 'none';
                    }, 300);
                }
        
                // Show disclaimer animation on page load
                document.addEventListener('DOMContentLoaded', function() {
                    const disclaimer = document.getElementById('disclaimer');
                    disclaimer.style.opacity = '0';
                    disclaimer.style.display = 'block';
                    setTimeout(() => {
                        disclaimer.style.opacity = '1';
                    }, 100);
                });
                </script>
        
                <style>
                #disclaimer {
                    transition: all 0.3s ease-in-out;
                }
        
                @keyframes slideIn {
                    from {
                        transform: translateY(-10px);
                        opacity: 0;
                    }
                    to {
                        transform: translateY(0);
                        opacity: 1;
                    }
                }
        
                #disclaimer {
                    animation: slideIn 0.4s ease-out;
                }
                </style>
        
        </body>

        <div style="margin-bottom: 16px;"></div>
        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex-1 flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                tabindex="0" aria-label="{!! __('messages.resume.click_to_upload') !!} {!! __('messages.resume.file_requirements') !!}">
                
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center h-full w-full"> <!-- Added h-full and w-full -->
                        <!-- File Not Selected View -->
                        <div id="upload-prompt" class="flex flex-col items-center justify-center w-full"> <!-- Added flex and center -->
                            <svg class="w-12 h-12 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-black dark:text-white text-center">
                                <span class="font-semibold">{!! __('messages.resume.click_to_upload') !!}</span>
                            </p>
                            <p class="text-xs text-black dark:text-white text-center">{!! __('messages.resume.file_requirements') !!}</p>
                        </div>
        
                        <!-- File Selected View -->
                        <div id="file-selected" class="hidden flex flex-col items-center justify-center w-full"> <!-- Added flex and center -->
                            <svg class="w-12 h-12 mb-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="mb-2 text-lg font-semibold text-green-500 text-center">File Selected</p>
                            <p id="selected-filename" class="text-sm text-gray-600 dark:text-gray-400 text-center mb-2"></p>
                            <button type="button" onclick="resetFile()" 
                                    class="text-red-500 text-sm hover:text-red-700 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Change File
                            </button>
                        </div>
                    </div>
                    <input id="dropzone-file" name="resume" type="file" class="hidden" onchange="handleFileSelect(this)" />
                </label>
            </div>

            <div class="flex-shrink-0 flex flex-col space-y-4">
                <!-- Upload Button -->
                <button type="submit" id="submit-button"
                    class="bg-blue-700 mt-6 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 w-full sm:w-auto"
                    aria-label="{!! __('messages.resume.submit_file') !!}">
                    <i class="fas fa-upload mr-2"></i>
                    {!! __('messages.resume.submit_file') !!}
                </button>
                <button @click="showResumeTemplateModal = true" type="button"
                    class="bg-green-700 text-white font-bold py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 w-full sm:w-auto"
                    aria-label="{!! __('messages.resume.resume_template') !!}">
                    <i class="fas fa-file-alt mr-2"></i>
                    {!! __('messages.resume.resume_template') !!}
                </button>
            </div>
        </div>

        <script>
        function handleFileSelect(input) {
            const uploadPrompt = document.getElementById('upload-prompt');
            const fileSelected = document.getElementById('file-selected');
            const selectedFilename = document.getElementById('selected-filename');
            const submitButton = document.getElementById('submit-button');
        
            if (input.files && input.files[0]) {
                // Show selected file view
                uploadPrompt.classList.add('hidden');
                fileSelected.classList.remove('hidden');
                selectedFilename.textContent = input.files[0].name;
                submitButton.disabled = false;
            }
        }
        
        function resetFile() {
            const input = document.getElementById('dropzone-file');
            const uploadPrompt = document.getElementById('upload-prompt');
            const fileSelected = document.getElementById('file-selected');
            const submitButton = document.getElementById('submit-button');
        
            // Reset file input
            input.value = '';
            
            // Show upload prompt
            uploadPrompt.classList.remove('hidden');
            fileSelected.classList.add('hidden');
            submitButton.disabled = true;
        }
        
        // Make sure the form has the correct enctype
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('dropzone-file').closest('form');
            if (form) {
                form.setAttribute('enctype', 'multipart/form-data');
            }
        });
        </script>

        
        <!-- Legend Section -->
        <div class="my-8"> 
            <div class="w-full p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md" 
                 role="region" 
                 aria-label="Match Status Legend">
                
                <!-- Legend Header with Minimize Button -->
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Match Status Legend
                        </h3>
                        <!-- Minimize Button - Added type="button" -->
                        <button type="button"
                                onclick="toggleLegend(event)" 
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 rounded-lg p-1 transition-transform duration-200"
                                id="legendToggleBtn"
                                aria-label="Toggle legend visibility">
                            <svg class="w-6 h-6 transform transition-transform duration-200" 
                                 id="legendToggleIcon"
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>
        
                <!-- Legend Content -->
                <div id="legendContent" class="transition-all duration-300 ease-in-out">
                    <!-- Two Column Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Green Match Explanation -->
                        <div class="bg-green-700 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 cursor-help h-full"
                             role="listitem"
                             tabindex="0"
                             aria-label="Green match indicator explanation"
                             title="These are the required fields that match your profile">
                            <div class="flex items-start space-x-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <!-- Content -->
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold text-lg mb-2">Green indicates you match the required fields:</h4>
                                    <ul class="space-y-2 ml-4 text-white" role="list">
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Age
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Educational Attainment
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Degree Program
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Work Experience
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        
                        <!-- Red Match Explanation -->
                        <div class="bg-red-600 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 cursor-help h-full"
                             role="listitem"
                             tabindex="0"
                             aria-label="Red match indicator explanation"
                             title="These fields have no matches in your profile">
                            <div class="flex items-start space-x-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <!-- Content -->
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold text-lg mb-2">Red indicates no matches found for:</h4>
                                    <ul class="space-y-2 ml-4 text-white" role="list">
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Skills
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Certifications
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Note Section (Below) -->
                    <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg w-full"
                         role="complementary"
                         aria-label="Additional match information">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300 font-medium">Note:</span>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300 ml-7">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>All jobs displayed are matched based on your basic qualifications (Age, Education, Program, Work Experience)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Green indicators show that you meet the essential requirements for the position</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Red indicators for Skills or Certifications do not disqualify you from applying but may affect your application's competitiveness</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Consider updating your profile with additional skills and certifications to improve your job matches</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <!-- Keyboard Navigation Instructions -->
            <div class="sr-only" role="note">
                Use tab key to navigate through the legend items. Each item is focusable and provides detailed information about match indicators.
            </div>
        </div>

        
        <style>
            .hover\:shadow-md {
                transition: all 0.2s ease-in-out;
            }
        
            [tabindex]:focus {
                outline: 2px solid #f97316;
                outline-offset: 2px;
            }
        
            @media (prefers-color-scheme: dark) {
                .dark\:bg-gray-800 {
                    transition: background-color 0.2s ease-in-out;
                }
            }
        
            .h-full {
                height: 100%;
            }
            @media (max-width: 768px) {
                .grid-cols-1 {
                    gap: 1rem;
                }
            }
        
            .cursor-help:hover {
                transform: translateY(-1px);
                transition: transform 0.2s ease-in-out;
            }
            #legendContent {
                max-height: 1000px;
                opacity: 1;
                transition: all 0.3s ease-in-out;
            }
            
            #legendContent.hidden {
                max-height: 0;
                opacity: 0;
                overflow: hidden;
                margin: 0;
                padding: 0;
            }
            
            #legendToggleIcon {
                transition: transform 0.3s ease-in-out;
            }
        </style>
        
         </form>
         <script>
             function displayFileName() {
                 var input = document.getElementById('dropzone-file');
                 var fileName = input.files[0] ? input.files[0].name : 'No file selected';
                 document.getElementById('file-name').textContent = 'Selected file: ' + fileName;
             }
             
             let isLegendVisible = true;

            function toggleLegend(event) {
                // Prevent form submission and page refresh
                event.preventDefault();
                
                const content = document.getElementById('legendContent');
                const icon = document.getElementById('legendToggleIcon');
                const button = document.getElementById('legendToggleBtn');
                
                isLegendVisible = !isLegendVisible;
                
                if (isLegendVisible) {
                    // Show content
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(0deg)';
                    button.setAttribute('aria-expanded', 'true');
                } else {
                    // Hide content
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(-180deg)';
                    button.setAttribute('aria-expanded', 'false');
                }
            }
            
            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                const content = document.getElementById('legendContent');
                const icon = document.getElementById('legendToggleIcon');
                const button = document.getElementById('legendToggleBtn');
                
                // Start expanded
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(0deg)';
                button.setAttribute('aria-expanded', 'true');
            });
         </script>
         
         <div class="my-8"> 

         @if (isset($data))
             <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-3d shadow-lg mb-4">
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="{!! __('messages.resume.education') !!} {{ $data['education'] }}">
                     <strong>Education:</strong> {{ $data['education'] }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="{!! __('messages.resume.age') !!} {{ $data['age'] ?? 'N/A' }}">
                     <strong>Age:</strong> {{ $data['age'] ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="{!! __('messages.resume.skills') !!} { $data['skills'] ?? 'N/A' }}">
                     <strong>Skills:</strong> {{ $data['skills'] ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="Program">
                     <strong>Program:</strong> {{ $data['program'] ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0"
                     aria-label="Work Experience">
                     <strong>Work Experience:</strong>
                     {{ $resume->work_experience ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="{!! __('messages.resume.certification') !!} {{ $resume->certifications ?? 'N/A' }}">
                     <strong>Certifications:</strong>
                     {{ $resume->certifications ?? 'N/A' }}
                 </p>
                 <br>
                 <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                     tabindex="0" aria-label="{!! __('messages.resume.file_name') !!}   {{ $data['filename'] ?? 'N/A' }}">
                     <strong>File name:</strong>
                     {{ $data['filename'] ?? 'N/A' }}
                 </p>
                 <br>
             </div>
         @elseif (isset($resume))
             <div class="bg-gray-100 dark:bg-gray-700  rounded-lg shadow-3d shadow-lg mb-4">
                 <div class="bg-gradient-to-r from-blue-500 to to-blue-600 p-4 rounded-t-lg shadow-lg mb-4">
                     <h3 class="text-white text-2xl font-semibold flex items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0" aria-label="{!! __('messages.resume.resume_information') !!}">
                         <i class="fas fa-info-circle mr-2"></i> <!-- Font Awesome search icon with margin -->
                         {!! __('messages.resume.resume_information') !!}
                     </h3>
                 </div>
                 <div class="p-4">
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0" aria-label="{!! __('messages.resume.education') !!}  {{ $resume->education }}">
                         <strong> {!! __('messages.resume.education') !!}: </strong> {{ $resume->education }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0" aria-label="{!! __('messages.resume.age') !!} {{ $resume->age ?? 'N/A' }}">
                         <strong>{!! __('messages.resume.age') !!}:</strong> {{ $resume->age ?? 'N/A' }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0" aria-label="{!! __('messages.resume.skills') !!}  {{ $resume->skills ?? 'N/A' }}">
                         <strong>{!! __('messages.resume.skills') !!}:</strong>
                         {{ $resume->skills ?? 'N/A' }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0"
                         aria-label="{!! __('messages.resume.certification') !!}  {{ $resume->certifications ?? 'N/A' }}">
                         <strong>{!! __('messages.resume.certification') !!}:</strong>
                         {{ $resume->certifications ?? 'N/A' }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0"
                         aria-label="Program">
                         <strong>Program:</strong>
                         {{ $resume->program ?? 'N/A' }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0"
                         aria-label="Work Experience">
                         <strong>Work Experience:</strong>
                         {{ $resume->work_experience ?? 'N/A' }}
                     </p>
                     <br>
                     <p class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                         tabindex="0" aria-label="{!! __('messages.resume.file_name') !!} {{ $resume->file_name ?? 'N/A' }}">
                         <strong>{!! __('messages.resume.file_name') !!}:</strong>
                         {{ $resume->file_name ?? 'N/A' }}
                     </p>
                     <br>
                 </div>
             </div>
         @endif
         <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

             @if ($matchedResumeJobs->isEmpty())
                 <div class="col-span-1 sm:col-span-3 bg-red-700 text-white p-4 rounded-lg shadow-md">
                     <p class="text-gray-200">No jobs matched your skills and qualifications in your CV/Resume. You may
                         search jobs based on your preferences.</p>
                 </div>
             @else
                 @foreach ($matchedResumeJobs as $job)
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

                            <div class="p-4 space-y-4 max-w-3xl mx-auto">
                                  <button 
                                    class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 w-full text-left flex items-center justify-between"
                                    onclick="toggleDropdown('matchesDropdown_{{ $job->id }}')"> <!-- Unique ID using job ID -->
                                    <i class="fas fa-layer-group w-5 h-5"></i> <!-- Font Awesome icon -->
                                    <span class="text-center w-full p-4">Why It Matched? (Click here to See the Qualifications Report)</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                @if (!empty($job->match_reasons['education']) ||
                                    !empty($job->match_reasons['skills']) ||
                                    !empty($job->match_reasons['age']) ||
                                    !empty($job->match_reasons['program']) ||
                                    !empty($job->match_reasons['work_experience']) ||
                                    !empty($job->match_reasons['certifications']))
                                             <!-- Education Match -->
                                <div id="matchesDropdown_{{ $job->id }}" class="hidden mt-4 space-y-4">

                                        @if (isset($job->match_reasons['education']) && count($job->match_reasons['education']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Education: {{ implode(', ', $job->match_reasons['education']) }} ({{ $job->match_percentages['education'] ?? '0%' }} Matched)">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Matched Education:</span>
                                                        <span class="text-white ml-2">{{ implode(', ', $job->match_reasons['education']) }}</span>
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ $job->match_percentages['education'] ?? '0%' }} Matched)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                            
                                        <!-- Skills Match -->
                                        @if (isset($job->match_reasons['skills']) && count($job->match_reasons['skills']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Skills: {{ implode(', ', $job->match_reasons['skills'])}}">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Skills:</span>
                                                    </div>
                                                    <div class="ml-8 mt-2"> <!-- Added margin for indentation -->
                                                        <ul class="list-disc text-white space-y-1">
                                                            @foreach($job->match_reasons['skills'] as $skill)
                                                                <li>{{ $skill }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ count($job->match_reasons['skills']) }} {{ Str::plural('Skill', count($job->match_reasons['skills'])) }} Found)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="bg-red-600 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="No skill keywords matched for this job">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Skills:</span>
                                                    </div>
                                                    <div class="ml-8 mt-2"> <!-- Added margin for indentation -->
                                                        <span class="text-white">No skill keywords matched for this job.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                                                    
                                         <!-- Program Match -->
                                        @if (isset($job->match_reasons['program']) && count($job->match_reasons['program']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Program: {{ implode(', ', $job->match_reasons['program']) }}">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Matched Program:</span>
                                                    </div>
                                                    <div class="ml-8 mt-2">
                                                        <span class="text-white">{{ implode(', ', $job->match_reasons['program']) }}</span>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ count($job->match_reasons['program']) }} {{ Str::plural('Program', count($job->match_reasons['program'])) }} Found)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                            
                                                                               <!-- Work Experience Match -->
                                        @if (isset($job->match_reasons['work_experience']) && count($job->match_reasons['work_experience']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Work Experience: {{ implode(', ', $job->match_reasons['work_experience']) }}">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Matched Work Experience:</span>
                                                    </div>
                                                    <div class="ml-8 mt-2">
                                                        <span class="text-white">{{ implode(', ', $job->match_reasons['work_experience']) }}</span>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ count($job->match_reasons['work_experience']) }} Relevant {{ Str::plural('Experience', count($job->match_reasons['work_experience'])) }} Found)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <!-- Age Match -->
                                        @if (isset($job->match_reasons['age']) && count($job->match_reasons['age']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Age: {{ implode(', ', $job->match_reasons['age']) }}">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Matched Age:</span>
                                                        <span class="text-white ml-2">{{ implode(', ', $job->match_reasons['age']) }}</span>
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ $job->match_percentages['age'] ?? '0%' }} Matched)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <!-- Certifications Match -->
                                        @if (isset($job->match_reasons['certifications']) && count($job->match_reasons['certifications']) > 0)
                                            <div class="bg-green-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="Matched Certifications: {{ implode(', ', $job->match_reasons['certifications']) }}">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">Certifications:</span>
                                                    </div>
                                                    <div class="ml-8 mt-2">
                                                        <span class="text-white">{{ implode(', ', $job->match_reasons['certifications']) }}</span>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <span class="text-white text-sm bg-green-600 px-3 py-1 rounded-full">({{ count($job->match_reasons['certifications']) }} {{ Str::plural('Certification', count($job->match_reasons['certifications'])) }} Found)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="bg-red-600 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400" 
                                                 tabindex="0" 
                                                 aria-label="No certifications matched for this job">
                                                <div class="flex flex-col">
                                                    <div class="flex items-center">
                                                        <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"/>
                                                        </svg>
                                                        <span class="text-white font-semibold text-lg">No Matched Certifications</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        
                                    </div>
                                @endif
                            </div>
                               
                            <script>
                                    function toggleDropdown(dropdownId) {
                                    const dropdown = document.getElementById(dropdownId);
                                    if (dropdown) {
                                        dropdown.classList.toggle('hidden');
                                    }
                                }
                            </script>
                            <style>
                                .hover\:shadow-lg {
                                    transition: all 0.2s ease-in-out;
                                }
                                
                                .bg-green-600 {
                                    transition: transform 0.2s ease;
                                }
                                
                                .bg-green-600:hover {
                                    transform: scale(1.05);
                                }
                            </style>

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
                                             <i
                                                 class="fas fa-graduation-cap text-blue-400 dark:text-blue-300 mr-2"></i>
                                             <span
                                                 class="font-semibold">{{ __('messages.userdashboard.educational_level') }}</span>
                                             <span class="ml-1">{{ $job->educational_level }}</span>
                                         </p>
                                     </div>
                                     <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                         <p class="flex flex-wrap items-center text-sm text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                             tabindex="0"
                                             aria-label="{{ __('messages.userdashboard.location') }} {{ $job->location }}">
                                             <i
                                                 class="fas fa-map-marker-alt text-blue-400 dark:text-blue-300 mr-2"></i>
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
                                             <i
                                                 class="fas fa-money-bill-wave text-blue-400 dark:text-blue-300 mr-2"></i>
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
                                         class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-full hover:bg-blue-700 dark:hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 focus:ring-opacity-90"
                                         aria-label="{{ __('messages.job.view_details') }} for Job Number {{ $job->id }}">
                                         <span class="mr-2">{{ __('messages.job.view_details') }}</span>
                                         <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                         </svg>
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

 @if (Session::has('resume'))
     <script>
         $(document).ready(function() {
             toastr.options = {
                 "progressBar": true,
                 "closeButton": true,
             }
             toastr.success("{{ Session::get('resume') }}",
                 '{{ $matchedResumeJobs->count() }} Matched Jobs Found', {
                     timeOut: 5000
                 });
         });
     </script>
 @endif
 @if (Session::has('resumeupload'))
     <script>
         $(document).ready(function() {
             toastr.options = {
                 "progressBar": true,
                 "closeButton": true,
             }
             toastr.success("{{ Session::get('resumeupload') }}", 'Resume Uploaded', {
                 timeOut: 5000
             });
         });
     </script>
 @endif


 <template x-if="showResumeTemplateModal">
    <div x-show="showResumeTemplateModal" class="fixed inset-0 z-50" aria-labelledby="resume-template-modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center h-screen pt-4 px-4 pb-10 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div x-show="showResumeTemplateModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <!-- Modal Content -->
            <div x-show="showResumeTemplateModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-y-auto shadow-xl transform transition-all sm:my-8 sm:align-middle w-full max-w-4xl" style="margin-top: 40px; height: 90vh;">
                <!-- Modal Header -->
                <div class="bg-gray-300 dark:bg-gray-800 p-4 sm:flex sm:flex-row-reverse sm:px-6 sm:py-4">
                    <button type="button" @click="showResumeTemplateModal = false" class="w-full sm:w-auto text-gray-900 dark:text-gray-200 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium hover:bg-blue-600 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Close</button>
                    <a href="{{ route('download.docx') }}" class="w-full sm:w-auto mt-3 sm:mt-0 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-gray-900 dark:text-gray-200 hover:bg-blue-600 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Download DOCX</a>
                </div>
                <!-- Modal Body -->
                <div class="bg-white p-6 dark:bg-gray-700">
                    <div class="text-center sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200" id="resume-template-modal-title">Suggested Resume Format</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-200">For best results, please format your resume as follows:</p>
                        <div class="bg-white dark:bg-gray-800 p-6 mt-4 rounded-lg shadow-md border border-gray-300 dark:border-gray-700">
                            <!-- Personal Information -->
                            <div class="flex flex-col sm:flex-row justify-between items-center sm:items-start mb-8 space-y-4 sm:space-y-0">
                                <div class="text-center sm:text-left space-y-1 text-gray-600 dark:text-gray-300">
                                    <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-200 mb-2">FULL NAME</h1>
                                    <p>Birthdate: MM/DD/YYYY</p>
                                    <p>Age: XX</p>
                                    <p>Civil Status: Single/Married</p>
                                    <p>Height: XXX cm</p>
                                    <p>Language: English, Filipino</p>
                                    <p>Email: your.email@example.com</p>
                                    <p>Phone: (123) 456-7890</p>
                                    <p>Address: City, State</p>
                                </div>
                                <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 border-4 border-white shadow-lg">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            </div>
                            <!-- Objective -->
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2">OBJECTIVE</h2>
                                <p class="text-gray-600 dark:text-gray-300">A brief statement about your career goals and what you are looking for.</p>
                            </div>
                            <!-- Educational Attainment -->
                            <br>
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">EDUCATIONAL ATTAINMENT</h2>
                                <div class="space-y-2 text-gray-600 dark:text-gray-300">
                                    <h3 class="font-semibold">COLLEGE</h3>
                                    <p>University/School: University of Santo Tomas</p>
                                    <p>Program: Bachelor of Science in Information Technology</p>
                                    <p>Year: 2021 - 2024</p>
                                    <br>
                                    <h3 class="font-semibold mt-4">SENIOR HIGH SCHOOL</h3>
                                    <p>School: Santo Tomas Senior High School</p>
                                    <p>Year: 2019 - 2021</p>
                                    <br>
                                    <h3 class="font-semibold mt-4">JUNIOR HIGH SCHOOL</h3>
                                    <p>School: Santo Tomas Junior High School</p>
                                    <p>Year: 2015 - 2019</p>
                                    <br>
                                    <h3 class="font-semibold mt-4">PRIMARY LEVEL</h3>
                                    <p>School: Santo Tomas Elementary School</p>
                                    <p>Year: 2009 - 2015</p>
                                    <br>
                                </div>
                            </div>
                            <br>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">SKILLS</h2>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        
                                        <!-- Hard Skills Column -->
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Hard Skills</h3>
                                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                                                <li>Hard Skill 1 (e.g., Programming)</li>
                                                <li>Hard Skill 2 (e.g., Web Development)</li>
                                                <li>Hard Skill 3 (e.g., Database)</li>
                                            </ul>
                                        </div>
                                
                                        <!-- Soft Skills Column -->
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Soft Skills</h3>
                                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                                                <li>Soft Skill 1 (e.g., Communication)</li>
                                                <li>Soft Skill 2 (e.g., Leadership)</li>
                                                <li>Soft Skill 3 (e.g., Problem Solving)</li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>

                            <br>
                            <!-- Work Experience -->
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">WORK EXPERIENCE</h2>
                                <p class="text-black dark:text-white">Job Title, Company Name</p>
                                <p class="italic text-gray-600 dark:text-gray-300">Start Date - End Date</p>
                                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                                    <li>Responsibility/Achievement 1</li>
                                    <li>Responsibility/Achievement 2</li>
                                </ul>
                            </div>
                            <br>
                            <!-- Certifications -->
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">CERTIFICATIONS</h2>
                                <p  class="text-black dark:text-white">Certification Name, Issuing Organization, Year</p>
                            </div>
                            <br>
                            <!-- Additional Information -->
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">ADDITIONAL INFORMATION</h2>
                                <p class="text-black dark:text-white">Languages, Volunteer Work, etc.</p>
                            </div>
                            <br>
                            <!-- Character References -->
                           <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 mt-4">CHARACTER REFERENCE</h2>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full border border-gray-300 dark:border-gray-700">
                                        <thead class="bg-gray-200 dark:bg-gray-800">
                                            <tr>
                                                <th class="border px-4 py-2 text-left text-gray-700 dark:text-gray-300">NAME</th>
                                                <th class="border px-4 py-2 text-left text-gray-700 dark:text-gray-300">WORK</th>
                                                <th class="border px-4 py-2 text-left text-gray-700 dark:text-gray-300">NUMBER</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 dark:text-gray-300">
                                            <tr>
                                                <td class="border px-4 py-2">Name 1</td>
                                                <td class="border px-4 py-2">Work 1</td>
                                                <td class="border px-4 py-2">Number 1</td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">Name 2</td>
                                                <td class="border px-4 py-2">Work 2</td>
                                                <td class="border px-4 py-2">Number 2</td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">Name 3</td>
                                                <td class="border px-4 py-2">Work 3</td>
                                                <td class="border px-4 py-2">Number 3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Certification Statement -->
                            <div class="mt-8 text-right text-gray-600 dark:text-gray-300">
                                <p>I at this moment certify that the above information is true and correct to the best of my knowledge.</p>
                                <p class="font-bold underline mt-2">Your Name</p>
                                <p>Applicant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
