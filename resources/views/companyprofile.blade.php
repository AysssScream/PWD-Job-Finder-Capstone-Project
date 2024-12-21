 <x-app-layout>
     <title>Company Profile</title>
     <div class="py-12">
         <div class="container mx-auto max-w-8xl">
             <div class="relative max-w-8xl mx-auto sm:px-6 lg:px-8">
                 <div class="container mx-auto max-w-8xl px-4 pt-5">
                     <div class="grid grid-cols-1 gap-6 ">
                         @if ($employer->company_logo && Storage::exists('public/' . $employer->company_logo))
                             <div
                                 class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20 mt-20  p-1 rounded-full">
                                 <div class="border-4 border-blue-500 rounded-full bg-white p-1">
                                     <img src="{{ asset('storage/' . $employer->company_logo) }}" alt="Company Logo"
                                         class="w-48 h-48 object-contain rounded-full border-4 border-yellow-400"
                                         onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                                 </div>
                             </div>
                         @else
                             <div
                                 class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20 mt-20  p-1 rounded-full">
                                 <div class="border-4 border-blue-500 rounded-full bg-white p-1">
                                     <img src="{{ asset('/images/avatar.png') }}" alt="Company Logo"
                                         class="w-48 h-48 object-contain rounded-full border-4 border-yellow-400">
                                 </div>
                             </div>
                         @endif


                         <div
                             class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-1 shadow-lg relative mt-20">
                             <div class="p-6 text-gray-900 dark:text-gray-100 pt-10 mt-20">

                                 <div class="p-6 text-gray-900 dark:text-gray-100 pt-10 ">
                                     <div class="mb-4">

                                         <div class="mb-4">
                                             <div
                                                 class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md border-b-4 border-blue-500">
                                                 <h3 class="text-4xl text-center font-bold mb-4 text-blue-500">
                                                     {{ $employer->businessname }}
                                                 </h3>
                                             </div>
                                         </div>



                                         <!-- Adjust with the correct variable for the company name -->

                                         <a href="{{ route('dashboard') }}"
                                             class="bg-blue-700 mb-4 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg px-4 py-2 inline-flex items-center">
                                             <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                                         </a>

                                     </div>
                                     <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-t-lg">
                                         <h3 class="text-3xl text-center font-bold text-white mb-6">
                                             <i class="fas fa-building text-white mr-2"></i> Company Profile
                                         </h3>
                                     </div>
                                     <hr class="border-t-2 border-blue-400 mb-4 mt-4">

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
                                     <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 rounded-lg mt-6">
                                         <h3 class="text-3xl text-center font-bold text-white mb-6">
                                             <i class="fas fa-briefcase text-white mr-2"></i> Available Jobs
                                         </h3>
                                     </div>
                                     <hr class="border-t-2 border-blue-400 mb-4 mt-4">


                                     <div class="flex justify-center">
                                         <div
                                             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-10 max-w-8xl w-full ">
                                             @foreach ($jobs as $job)
                                                 <div
                                                     class="bg-gray-100 dark:bg-gray-700  rounded-lg shadow-lg flex flex-col space-y-4 h-full">
                                                     <div
                                                         class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-t-lg">
                                                         <h3 class="text-2xl font-semibold text-center text-white">
                                                             {{ $job->title }}
                                                         </h3>
                                                     </div>
                                                     <div class="p-6">

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
                                                                 action="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->id]) }}"
                                                                 method="GET">
                                                                 <button type="submit"
                                                                     class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 flex items-center space-x-2">
                                                                     <i class="fas fa-info-circle"></i>
                                                                     <span>View Job Details</span>
                                                                 </button>

                                                             </form>
                                                         </div>
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
