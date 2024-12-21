<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.8.2/dist/alpine.min.js" defer></script>
        <title>Job Information</title>
    </head>

    <body class="bg-white mx-auto max-w-8xl px-4">
        <div class="container mx-auto max-w-8xl px-4 pt-5">
            <div class="row">
                <div class="col">
                    <nav class="rounded-lg bg-white dark:bg-gray-800 shadow-md mt-10">
                        <div class="mb-4">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded-t-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                aria-label="Job Information #{{ $job->id }}" tabindex="0"
                                aria-label="Job Information #{{ $job->id }}">
                                <h2 class="text-2xl font-semibold text-white flex items-center ">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    Job Information #{{ $job->id }}
                                </h2>
                            </div>
                        </div>
                        <ol class="breadcrumb mb-0 p-3 pt-0">
                            <li class="breadcrumb-item" aria-label="Back to Jobs">
                                <a href="{{ route('dashboard') }}"
                                    class="text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{!! __('messages.jobinformation.back_to_jobs') !!}">
                                    <i class="fa fa-arrow-left" aria-label="Back to Jobs"></i>
                                    &nbsp;{!! __('messages.jobinformation.back_to_jobs') !!}
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container mx-auto max-w-8xl px-4">
        <!-- Header Section -->
        <header class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md rounded-lg p-8 mt-4 border-4 border-white"> 
            <div class="flex items-start space-x-8">
                <!-- Company Logo Container -->
                <div class="flex-shrink-0">
                    <div class="w-36 h-36 md:w-40 md:h-40 rounded-xl shadow-xl overflow-hidden bg-white p-4 border-2 border-gray-200 flex items-center justify-center">
                        @if($employer->company_logo && Storage::exists('public/' . $employer->company_logo))
                            <img src="{{ asset('storage/' . $employer->company_logo) }}" 
                                 alt="{{ $employer->businessname }} logo" 
                                 class="w-full h-full object-contain animate-fadeIn"
                                 aria-label="{{ $employer->businessname }} company logo"
                                 onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'flex flex-col items-center justify-center w-full h-full\'><i class=\'fas fa-building text-gray-400 text-6xl mb-2\'></i><span class=\'text-gray-500 text-sm text-center font-semibold\'>{{ $employer->businessname }}</span></div>';">
                        @else
                            <div class="flex flex-col items-center justify-center w-full h-full">
                                <i class="fas fa-building text-gray-400 text-6xl mb-2"></i>
                                <span class="text-gray-500 text-sm text-center font-semibold">{{ $employer->businessname }}</span>
                            </div>
                        @endif
                    </div>
                </div>
        
                <!-- Rest of the header content remains the same -->
                <div class="flex-1 pt-4">
                    <h1 class="text-4xl font-bold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                        tabindex="0" 
                        aria-label="Job Title {{ $job->title }}">
                        {{ $job->title }}
                    </h1>
                    
                    <div class="mt-3">
                        <h2 class="text-2xl font-semibold text-gray-100 flex items-center"
                            tabindex="0" 
                            aria-label="Company Name {{ $employer->businessname }}">
                            <i class="fas fa-building mr-2"></i>
                            {{ $employer->businessname }}
                        </h2>
                    </div>
        
                    <div class="flex flex-wrap items-center mt-6 text-sm">
                        <div class="flex items-center mr-8 mb-2">
                            <a href="#" 
                                class="text-white hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                aria-label="{!! __('messages.jobinformation.location') !!} {{ $job->location }}" 
                                tabindex="0">
                                <i class="fa fa-map-marker mr-2 text-white"></i>
                                <span>{{ $job->location }}</span>
                            </a>
                        </div>
                        <div class="flex items-center mr-8 mb-2">
                            <a href="#" 
                                class="text-white hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                aria-label="{!! __('messages.jobinformation.job_type') !!} {{ $job->job_type }}" 
                                tabindex="0">
                                <i class="fa fa-clock mr-2 text-white"></i>
                                <span>{{ $job->job_type }}</span>
                            </a>
                        </div>
                        <div class="flex items-center mb-2">
                            <a href="#" 
                                class="text-white hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                aria-label="{!! __('messages.jobinformation.educational_attainment') !!} {{ $job->educational_level }}" 
                                tabindex="0">
                                <i class="fa fa-graduation-cap mr-2 text-white"></i>
                                <span>{{ $job->educational_level }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <style>
            .object-contain {
                object-fit: contain;
            }
        
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        
            .animate-fadeIn {
                animation: fadeIn 0.5s ease-in;
            }
        </style>



            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 rounded-lg mt-4">
                <div class="lg:col-span-2">
                    <div class="card shadow-2xl h-full rounded-lg border-4 border-blue-500 bg-white p-8 mb-10 dark:bg-gray-800"> <!-- Added border-4 border-blue-500 -->
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="{!! __('messages.jobinformation.job_description') !!}" tabindex="0">
                                <i class="fas fa-file-alt mr-3 text-blue-400 dark:text-blue-300"></i>
                                {!! __('messages.jobinformation.job_description') !!}
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>

                            <p class="text-gray-800 dark:text-gray-200 leading-relaxed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 text-lg"
                                tabindex="0" aria-label="{{ $job->description }}">
                                {{ $job->description }}
                            </p>
                        </div>
                                            
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="Program/Course Requirements" tabindex="0">
                                <i class="fas fa-graduation-cap mr-3 text-blue-400 dark:text-blue-300"></i>
                                Program/Course Requirements
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if(!empty(trim($job->program)))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed text-lg space-y-3">
                                    @php
                                        $programs = preg_split('/\s*[\-\•,]\s*/', $job->program, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                        
                                    @foreach($programs as $program)
                                        @if(!empty(trim($program)))
                                            <li aria-label="{{ trim($program) }}"
                                                class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start"
                                                tabindex="0">
                                                <i class="fas fa-check-circle mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                                <span>{{ trim($program) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No program or course requirements specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No program or course requirements specified
                                </p>
                            @endif
                        </div>
                        
                        <!-- Work Experience Requirements Section -->
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="Work Experience Requirements" tabindex="0">
                                <i class="fas fa-briefcase mr-3 text-blue-400 dark:text-blue-300"></i>
                                Work Experience Requirements
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if($job->work_experience === 'No Experience Required')
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start"
                                   aria-label="No Experience Required" tabindex="0">
                                    <i class="fas fa-info-circle mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                    <span>No Experience Required</span>
                                </p>
                            @elseif(!empty($job->work_experience))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed text-lg space-y-3">
                                    @php
                                        $experiences = preg_split('/\s*[\-\•]\s*/', $job->work_experience, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                        
                                    @foreach($experiences as $experience)
                                        @if(!empty(trim($experience)))
                                            <li aria-label="{{ trim($experience) }}"
                                                class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start"
                                                tabindex="0">
                                                <i class="fas fa-check-circle mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                                <span>{{ trim($experience) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No work experience requirements specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No work experience requirements specified
                                </p>
                            @endif
                        </div>
                        
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="{!! __('messages.jobinformation.responsibilities') !!}" tabindex="0">
                                <i class="fas fa-tasks mr-3 text-blue-400 dark:text-blue-300"></i>
                                {!! __('messages.jobinformation.responsibilities') !!}
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if(!empty($job->responsibilities))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed text-lg space-y-3">
                                    @php
                                        $responsibilities = preg_split('/\s*[\-\•,]\s*/', $job->responsibilities, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                        
                                    @foreach ($responsibilities as $responsibility)
                                        @php
                                            $trimmedResponsibility = trim($responsibility);
                                        @endphp
                                        <li aria-label="{{ $trimmedResponsibility }}"
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start"
                                            tabindex="0">
                                            <i class="fas fa-check-circle mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                            <span>{{ $trimmedResponsibility }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No responsibilities specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No responsibilities specified
                                </p>
                            @endif
                        </div>
                        
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="{!! __('messages.jobinformation.qualifications') !!}" tabindex="0">
                                <i class="fas fa-user-graduate mr-3 text-blue-400 dark:text-blue-300"></i>
                                {!! __('messages.jobinformation.qualifications') !!}
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if(!empty($job->qualifications))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed text-lg space-y-3">
                                    @php
                                        $qualifications = preg_split('/\s*[\-\•,]\s*/', $job->qualifications, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                        
                                    @foreach ($qualifications as $qualification)
                                        <li aria-label="{{ trim($qualification) }}" tabindex="0"
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start">
                                            <i class="fas fa-check-square mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                            <span>{{ trim($qualification) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No qualifications specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No qualifications specified
                                </p>
                            @endif
                        </div>
                        
                         <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="{!! __('messages.jobinformation.training_qualifications') !!}" tabindex="0">
                                <i class="fas fa-user-graduate mr-3 text-blue-400 dark:text-blue-300"></i>
                                {!! __('messages.jobinformation.training_qualifications') !!}
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if(!empty($job->training_qualifications))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed text-lg space-y-3">
                                    @php
                                        $qualifications = preg_split('/\s*[\-\•,]\s*/', $job->training_qualifications, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                        
                                    @foreach ($qualifications as $qualification)
                                        <li aria-label="{{ trim($qualification) }}" tabindex="0"
                                            class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-start">
                                            <i class="fas fa-check-square mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                            <span>{{ trim($qualification) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No training qualifications specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No training qualifications specified
                                </p>
                            @endif
                        </div>
                        
                        <div class="mb-12">
                            <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center mb-4"
                                aria-label="{!! __('messages.jobinformation.benefits') !!}" tabindex="0">
                                <i class="fas fa-gift mr-3 text-blue-400 dark:text-blue-300"></i>
                                {!! __('messages.jobinformation.benefits') !!}
                            </h4>
                            <div class="border-b border-gray-300 mb-4"></div>
                        
                            @if(!empty($job->benefits))
                                <ul class="list-none text-gray-800 dark:text-gray-200 leading-relaxed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 text-lg space-y-3"
                                    aria-label="{{ $job->benefits }}" tabindex="0">
                                    @php
                                        $benefits = explode(',', $job->benefits);
                                    @endphp
                                    @foreach ($benefits as $benefit)
                                        <li class="flex items-start">
                                            <i class="fas fa-star mr-3 mt-1 text-blue-400 dark:text-blue-300"></i>
                                            <span>{{ trim($benefit) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 text-lg focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                   aria-label="No benefits specified" tabindex="0">
                                    <i class="fas fa-info-circle mr-2 text-blue-400 dark:text-blue-300"></i>
                                    No benefits specified
                                </p>
                            @endif
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
                    <div class="card shadow-lg border-4 border-blue-500 rounded-2xl bg-white dark:bg-gray-800 mb-4"> 
                        <div class="mb-4">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded-t-lg">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{!! __('messages.jobinformation.job_summary') !!}" tabindex="0">
                                        {!! __('messages.jobinformation.job_summary') !!}
                                    </h3>

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
                                                class="ml-4 text-sm bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Saved">
                                                <i class="fas fa-check-circle mr-2 focus:outline-none"></i>Saved
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="ml-4 text-sm bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="Save Job">
                                                <i class="fas fa-save mr-2"></i>Save Job
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>

                            <ul class="text-gray-800 dark:text-gray-200 mt-3 leading-loose p-5 space-y-3">
                                <li aria-label="{!! __('messages.jobinformation.age_requirement') !!} {{ $job->min_age }} - {{ $job->max_age }} {!! __('messages.jobinformation.years_old') !!}"
                                    tabindex="0"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                                    <i class="fas fa-calendar-alt mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.age_requirement') !!}
                                        </span>
                                        <span class="ml-1">{{ $job->min_age }} - {{ $job->max_age }}
                                            {!! __('messages.jobinformation.years_old') !!}</span>
                                    </div>
                                </li>

                                <li aria-label="{!! __('messages.jobinformation.published_on') !!} {{ \Carbon\Carbon::parse($job->date_posted)->format('F j, Y') }}"
                                    tabindex="0"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                                    <i class="fas fa-calendar-check mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.published_on') !!}
                                        </span>
                                        <span
                                            class="ml-1">{{ \Carbon\Carbon::parse($job->date_posted)->format('F j, Y') }}</span>
                                    </div>
                                </li>

                                <li aria-label="{!! __('messages.jobinformation.vacancy') !!} {{ $job->vacancy }} Positions Left"
                                    tabindex="0"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center">
                                    <i class="fas fa-users mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.vacancy') !!}
                                        </span>
                                        <span class="ml-1">{{ $job->vacancy }} Positions Left</span>
                                    </div>
                                </li>

                                <li aria-label="{!! __('messages.jobinformation.salary') !!} {{ number_format($job->salary) }} Pesos per month"
                                    class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                    tabindex="0">
                                    <i class="fas fa-money-bill-wave mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.salary') !!}
                                        </span>
                                        <span class="ml-1">₱{{ number_format($job->salary) }} / Month</span>
                                    </div>
                                </li>

                                <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                    aria-label="{!! __('messages.jobinformation.location') !!} {{ $job->location }} " tabindex="0">
                                    <i class="fas fa-map-marker-alt mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.location') !!}
                                        </span>
                                        <span class="ml-1">{{ $job->location }}</span>
                                    </div>
                                </li>

                                <li class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center"
                                    aria-label="{!! __('messages.jobinformation.job_type') !!} {{ $job->job_type }} " tabindex="0">
                                    <i class="fas fa-briefcase mr-3 text-blue-400 dark:text-blue-300"></i>
                                    <div>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {!! __('messages.jobinformation.job_type') !!}
                                        </span>
                                        <span class="ml-1">{{ $job->job_type }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-shadow rounded-2xl border-4 border-blue-500 bg-white dark:bg-gray-800 mt-4 mb-10 shadow-lg"> 
                        <div>
                            <div class="mb-4">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded-t-lg">
                                    <h3 class="text-lg font-bold text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{!! __('messages.jobinformation.about_the_company') !!}" tabindex="0">
                                        {!! __('messages.jobinformation.about_the_company') !!}
                                    </h3>
                                </div>
                            </div>

                            <div class="mt-4 p-4 pt-0">
                                @isset($employer->company_description)
                                    <?php
                                    $description = $employer->company_description;
                                    $limitedDescription = implode(' ', array_slice(explode(' ', $description), 0, 50));
                                    ?>

                                    <p class="text-left text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="{{ $limitedDescription }}" tabindex="0">
                                        {{ $limitedDescription }}
                                    </p>
                                @else
                                    <p class="text-left text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        tabindex="0" aria-label="No information available.">No information available.
                                    </p>
                                @endisset
                            </div>

                            <div class="mt-4 text-gray-800 dark:text-gray-200 p-4 pt-0">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mt-4 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{!! __('messages.jobinformation.employment_size') !!}  {{ $employer->totalworkforce }}"
                                    tabindex="0">{!! __('messages.jobinformation.employment_size') !!}
                                </h3>
                                @if ($employer)
                                    <span
                                        class="focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="The size is:{{ $employer->totalworkforce }}">{{ $employer->totalworkforce }}</span>
                                @else
                                    <span
                                        class="font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                        aria-label="Total Workforce: N/A" tabindex="0">Total
                                        Workforce:</span>
                                    N/A< @endif
                                        <div class="border-b border-gray-300 mt-4 mb-2"></div>
                                        <form
                                            action="{{ route('company.profile', ['employer_id' => $employer->user_id]) }}"
                                            method="GET">
                                            <button type="submit"
                                                class="w-full bg-blue-700 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="{!! __('messages.jobinformation.view_more_details') !!}" tabindex="0">
                                                {!! __('messages.jobinformation.view_more_details') !!}
                                            </button>
                                        </form>

                            </div>
                            <div class="mt-4 p-4 pt-0">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{!! __('messages.jobinformation.share_job') !!}" tabindex="0">{!! __('messages.jobinformation.share_job') !!}
                                </h3>
                                <div class="border-b border-gray-300 mt-2"></div>
                                <div class="mt-4 flex flex-col sm:flex-row sm:items-center">
                                    <div class="flex-1 mb-2 sm:mb-0 sm:mr-2">
                                        <input type="text" id="jobUrl"
                                            aria-label="Job Url {{ $fullUrl }} "
                                            class="w-full border border-gray-300 px-5 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ $fullUrl }}" readonly>
                                    </div>
                                    <button id="copyButton" aria-label="{!! __('messages.jobinformation.copy_url') !!}"
                                        aria-label="{!! __('messages.jobinformation.copy_url') !!}"
                                        class="w-full sm:w-auto px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                        {!! __('messages.jobinformation.copy_url') !!}
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
            <div class="mt-4 mb-4 bg-white dark:bg-gray-800 rounded-2xl shadow-md border-4 border-blue-500">
                <div class="mb-4">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded-t-lg">
                        <h3 class="text-lg font-bold text-white focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                            aria-label="{{ __('messages.jobinformation.similar_jobs') }}" tabindex="0">
                            <i class="fas fa-briefcase text-white mr-2"></i>
                            {{ __('messages.jobinformation.similar_jobs') }}
                        </h3>
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto p-6 pt-3">
                    <div class="flex space-x-4 lg:space-x-6">
                        @if ($jobs->isEmpty())
                            <div class="w-full text-center p-8">
                                <div class="flex flex-col items-center justify-center 
                                                focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ __('messages.jobinformation.no_similar_jobs') }}" tabindex="0">
                                    <i class="fas fa-frown text-gray-500 dark:text-gray-400 text-5xl mb-4"></i>
                                    <p class="text-gray-700 dark:text-gray-300 text-xl font-semibold">
                                        {{ __('messages.jobinformation.no_similar_jobs') }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                                        We couldn't find any similar jobs at the moment. Please check back later!
                                    </p>
                                </div>
                            </div>
                        @else
                            @foreach ($jobs as $job)
                                <div class="relative flex-shrink-0 bg-white dark:bg-gray-700  rounded-lg shadow-3d w-64 sm:w-80 md:w-96 lg:w-80 xl:w-96 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                    aria-label="{{ $job->title }} in {{ $job->company_name }}" tabindex="0">
                                    <div
                                        class="bg-gradient-to-r from-blue-700 via-blue-500 to-blue-400 p-4 rounded-t-lg mb-4">
                                        <h4 class="text-lg font-semibold text-white flex items-center">
                                            <i class="fas fa-briefcase text-white mr-4"></i>
                                            {{ $job->title }}
                                        </h4>
                                    </div>
                                    <div class="p-4">
                                        <h4
                                            class="text-lg font-semibold text-gray-600 dark:text-gray-300  flex items-center">
                                            <i class="fas fa-building text-gray-600 dark:text-gray-300 mr-4"></i>
                                            {{ $job->company_name }}
                                        </h4>

                                        <?php
                                        $maxLength = 150; // Set your desired max length
                                        $description = $job->description;
                                        $limitedDescription = strlen($description) > $maxLength ? substr($description, 0, $maxLength) . '...' : $description;
                                        ?>

                                        <p class="text-gray-700 p-2 dark:text-gray-300 mt-2 mb-12">
                                            {{ $limitedDescription }}</p>

                                        <div class="absolute bottom-4 right-4">
                                            <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                                class="bg-blue-700 hover:bg-blue-600 text-white dark:text-gray-200 px-4 py-2 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                aria-label="{{ __('messages.jobinformation.view') }}">
                                                {{ __('messages.jobinformation.view') }} <i
                                                    class="fa-solid fa-arrow-right ml-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            </section>
    </body>


    @if (Session::has('jobsave'))
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

    @if (Session::has('apply'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.success("{{ Session::get('apply') }}", 'Job Successfully Applied', {
                    timeOut: 5000
                });
            });
        </script>
    @endif

    @if (Session::has('deleteapplication'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                }
                toastr.error("{{ Session::get('deleteapplication') }}", 'Job Application Canceled', {
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
