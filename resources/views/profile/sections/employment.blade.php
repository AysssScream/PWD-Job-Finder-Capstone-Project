 <h2 class="text-2xl font-bold mb-2" aria-label="Employment History">EMPLOYMENT HISTORY</h2>
 <hr class="border-bottom border-2 border-primary mb-4">

 <form action="{{ route('profile.update.employment-info') }}" method="POST">
     @csrf
     @method('PATCH')
     <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
         <div class="mb-4 mt-4">
             <div style="text-align: left;">
                 <a href="{{ route('editemployment') }}"
                     class="bg-blue-700 text-white p-2 
                    p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md rounded-lg 
                    focus:border-4 focus:border-orange-500 dark:focus:border-orange-500 
                    focus:ring-4 focus:ring-orange-400 dark:focus:ring-orange-400"
                     onclick="clearLocalStorage()" aria-label="{{ __('messages.employment.modify_work_experience') }}"
                     tabindex="0">
                     <i class="fas fa-edit mr-2"></i> {{ __('messages.employment.modify_work_experience') }}
                 </a>

             </div>

             <script>
                 function clearLocalStorage() {
                     localStorage.removeItem('formData'); // Replace 'your-storage-key' with your actual storage key
                 }
             </script>
         </div>
     </div>

     <div id="employment-type-options" class="mt-6">
         <label for="employment-type"
             class="block mb-1">{{ __('messages.employment.specify_current_employment') }}</label>
         <select id="employment-type" name="employment-type"
             aria-label="The employment type is {{ old('employment-type', $employment->employment_type ?? '') }}"
             class="w-full 
               p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400">
             <option value="" selected disabled>{{ __('messages.employment.please_select_employment_status') }}
             </option>
             <option value="Employed"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Employed' ? 'selected' : '' }}>
                 Employed
             </option>
             <option value="Unemployed"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Unemployed' ? 'selected' : '' }}>
                 Unemployed
             </option>
             <option value="Self Employed"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Self Employed' ? 'selected' : '' }}>
                 Self Employed
             </option>
             <option value="Retired"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Retired' ? 'selected' : '' }}>
                 Retired
             </option>
             <option value="Resign"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Resign' ? 'selected' : '' }}>
                 Resign
             </option>
             <option value="Returning OFW"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Returning OFW' ? 'selected' : '' }}>
                 Returning OFW
             </option>
             <option value="Displaced Worker"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Displaced Worker' ? 'selected' : '' }}>
                 Displaced Worker
             </option>

         </select>
         @error('employment-type')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div id="job-search-duration" class="mt-6">
         <label for="job-search-duration"
             class="block mb-1">{{ __('messages.employment.how_long_job_search') }}</label>
         <div class="flex flex-wrap items-center">
             <input type="number" id="job-search-duration"
                 placeholder="{{ __('messages.employment.specify_duration') }}" name="job-search-duration"
                 aria-label=" The user is looking for a job in {{ old('job-search-duration', $employment->job_search_duration ?? '') }}   {{ old('duration-category', $employment->duration_category ?? '') }} "
                 class="w-full mb-2 p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 "
                 value="{{ old('job-search-duration', $employment->job_search_duration ?? '') }}">
             <select id="duration-category" name="duration-category"
                 aria-label="The duration was set to {{ old('duration-category', $employment->duration_category ?? '') }}"
                 class="w-full 
                p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 ">
                 <option value="Days"
                     {{ old('duration-category', $employment->duration_category ?? '') === 'Days' ? 'selected' : '' }}>
                     {{ __('messages.employment.days') }}</option>
                 <option value="Weeks"
                     {{ old('duration-category', $employment->duration_category ?? '') === 'Weeks' ? 'selected' : '' }}>
                     {{ __('messages.employment.weeks') }}</option>
                 <option value="Months"
                     {{ old('duration-category', $employment->duration_category ?? '') === 'Months' ? 'selected' : '' }}>
                     {{ __('messages.employment.months') }}</option>
                 <option value="Years"
                     {{ old('duration-category', $employment->duration_category ?? '') === 'Years' ? 'selected' : '' }}>
                     {{ __('messages.employment.years') }}</option>
             </select>
         </div>
         @error('job-search-duration')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>
     <div class="flex items-center gap-4 ">
         <x-primary-button class="mt-6 focus:outline-none "
             aria-label="{{ __('messages.userdashboard.save_changes') }}">{{ __('messages.userdashboard.save_changes') }}</x-primary-button>
         @if (session('status') === 'profile-updated')
             <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                 class="text-md font-semibold text-green-400 dark:text-gray-400">
                 {{ __('Saved.') }}
             </p>
         @endif
     </div>
 </form>
