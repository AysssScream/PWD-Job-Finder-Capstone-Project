 <x-app-layout>
     <div class="py-12">

         <div class="container mx-auto max-w-8xl">
             <div class="relative max-w-8xl mx-auto sm:px-6 lg:px-8">
                 <div class="container mx-auto max-w-8xl px-4 pt-5">
                     <div class="grid grid-cols-1 gap-6 ">
                         @if ($employer->company_logo && Storage::exists('public/' . $employer->company_logo))
                             <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20 mt-20">
                                 <img src="{{ asset('storage/' . $employer->company_logo) }}" alt="Company Logo"
                                     class="w-48 h-48 object-contain rounded-full border-4 border-gray-400 dark:border-gray-700 bg-white dark:bg-gray-800"
                                     onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                             </div>
                         @else
                             <div
                                 class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20 mt-20 ">
                                 <img src="{{ asset('/images/avatar.png') }}" alt="Company Logo"
                                     class="w-48 h-48 object-contain rounded-full border-4 border-gray-400 dark:border-gray-700 bg-white dark:bg-gray-800 ">
                             </div>
                         @endif
                         <div
                             class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1 shadow-lg relative mt-20">
                             <!-- Content Area with Padding -->
                             <div class="p-6 text-gray-900 dark:text-gray-100 pt-24 mt-20">
                                 <div class="p-6 text-gray-900 dark:text-gray-100 pt-24 ">
                                     <div class="mb-4">
                                         <a href="{{ route('dashboard') }}"
                                             class="bg-blue-500 mb-4 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg px-4 py-2 inline-flex items-center">
                                             <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                                         </a>

                                     </div>
                                     <h3 class="text-2xl text-center font-bold mb-6">
                                         <i class="fas fa-building text-blue-500 mr-2"></i> Company Profile
                                         <hr class="border-t-2 border-gray-300 mb-4 mt-4">
                                     </h3>
                                 </div>

                                 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                         <i class="fas fa-phone-alt text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Contact Number</h4>
                                             <p class="text-gray-600 dark:text-gray-300">
                                                 {{ $employer->mobile_no ?? 'N/A' }}
                                             </p>
                                         </div>
                                     </div>

                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4 overflow-hidden">
                                         <i class="fas fa-envelope text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Email</h4>
                                             <p class="text-gray-600 dark:text-gray-300 truncate">
                                                 {{ $employer->email_address ?? 'N/A' }}
                                             </p>
                                         </div>
                                     </div>


                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                         <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Address</h4>
                                             <p class="text-gray-600 dark:text-gray-300">
                                                 {{ $employer->address ?? 'N/A' }}</p>
                                         </div>
                                     </div>
                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                         <i class="fas fa-print text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Fax Number</h4>
                                             <p class="text-gray-600 dark:text-gray-300">
                                                 {{ $employer->fax_no ?? 'N/A' }}</p>
                                         </div>
                                     </div>
                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                         <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Employer Type</h4>
                                             <p class="text-gray-600 dark:text-gray-300">
                                                 {{ $employer->employertype ?? 'N/A' }}</p>
                                         </div>
                                     </div>
                                     <div
                                         class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                         <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                                         <div class="flex-1 min-w-0">
                                             <h4 class="text-lg font-semibold">Total Work Force</h4>
                                             <p class="text-gray-600 dark:text-gray-300">
                                                 {{ $employer->totalworkforce ?? 'N/A' }}</p>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="flex justify-center">
                                     <div
                                         class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6 mt-10 max-w-8xl w-full">
                                         <div
                                             class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-lg flex flex-col items-center space-y-4">
                                             <h4 class="text-lg font-semibold text-center">Company Description</h4>
                                             <p class="text-gray-700 dark:text-gray-300 text-center">
                                                 {{ $employer->company_description ?? 'N/A' }}</p>
                                             </p>
                                         </div>
                                     </div>
                                 </div>

                                 @if ($jobs->isEmpty())
                                     <p class="text-gray-600 dark:text-gray-300 p-5">No jobs available.</p>
                                 @else
                                     <h3 class="text-2xl text-center font-bold mt-6 p-4">
                                         <i class="fas fa-briefcase text-blue-500 mr-2"></i> Available Jobs
                                         <hr class="border-t-2 border-gray-300 mb-4 mt-4">
                                     </h3>

                                     <div class="flex justify-center">
                                         <div
                                             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-10 max-w-8xl w-full">
                                             @foreach ($jobs as $job)
                                                 <div
                                                     class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-lg flex flex-col space-y-4 h-full">
                                                     <h4 class="text-lg font-semibold text-center">{{ $job->title }}
                                                     </h4>
                                                     <p class="text-gray-600 dark:text-gray-300">
                                                         {{ Str::limit($job->description, 72, '...') }}
                                                     </p>

                                                     <div class="flex items-center justify-start space-x-4">
                                                         <span class="text-gray-600 dark:text-gray-300">
                                                             <i class="fas fa-calendar-day"></i>
                                                             {{ $job->created_at->format('F j, Y') }}
                                                         </span>
                                                         <span class="text-gray-600 dark:text-gray-300">
                                                             <i class="fas fa-map-marker-alt"></i>
                                                             {{ $job->location }}
                                                         </span>
                                                     </div>
                                                     <div class="flex justify-end mt-auto">
                                                         <form
                                                             action="{{ route('jobs.info', ['company_name' => Str::slug('Company Name'), 'id' => 1]) }}"
                                                             method="GET">
                                                             <button type="submit"
                                                                 class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center space-x-2">
                                                                 <i class="fas fa-info-circle"></i>
                                                                 <span>View Job Details</span>
                                                             </button>

                                                         </form>
                                                     </div>
                                                 </div>
                                             @endforeach
                                         </div>

                                     </div>
                                     <div class="mt-6">
                                         {{ $jobs->links() }}
                                     </div>
                                 @endif


                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
 </x-app-layout>
