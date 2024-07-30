 <h2 class="text-2xl font-bold mb-2" aria-label="Employment History">EMPLOYMENT HISTORY</h2>
 <hr class="border-bottom border-2 border-primary mb-4">

 <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
     <div class="overflow-x-auto">
         <div style="text-align: left;">
             <a href="{{ route('editemployment') }}"
                 class="btn btn-primary 
border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
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
     <label for="employment-type" class="block mb-1">{{ __('messages.employment.specify_current_employment') }}</label>
     <select id="employment-type" name="employment-type"
         aria-label="The employment type is {{ old('employment-type', $employment->employment_type ?? '') }}"
         class="w-full 
border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
         <option value="" selected disabled>{{ __('messages.employment.please_select_employment_status') }}
         </option>
         <optgroup label="Employed">
             <option value="Wage Employment"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Wage Employment' ? 'selected' : '' }}>
                 {{ __('messages.employment.wage_employment') }}
             </option>
             <option value="Self Employed"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Self Employed' ? 'selected' : '' }}>
                 {{ __('messages.employment.self_employed') }}</option>
             <option value="Others"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Others' ? 'selected' : '' }}>
                 {{ __('messages.employment.others') }}
             </option>
         </optgroup>
         <!-- Unemployed Options -->
         <optgroup label="Unemployed">
             <option value="Entrant/Fresh Graduate"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Entrant/Fresh Graduate' ? 'selected' : '' }}>
                 {{ __('messages.employment.entrant_fresh_graduate') }}
             </option>
             <option value="Finished Contract"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Finished Contract' ? 'selected' : '' }}>
                 {{ __('messages.employment.finished_contract') }}</option>
             <option value="Resigned"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Resigned' ? 'selected' : '' }}>
                 {{ __('messages.employment.resigned') }}</option>
             <option value="Retired"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Retired' ? 'selected' : '' }}>
                 {{ __('messages.employment.retired') }}
             </option>
             <option value="Terminated Due to Calamity"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Terminated Due to Calamity' ? 'selected' : '' }}>
                 {{ __('messages.employment.terminated_due_to_calamity') }}
             </option>
             <option value="Teminated Local"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Teminated Local' ? 'selected' : '' }}>
                 {{ __('messages.employment.terminated_local') }}
             </option>
             <option value="Terminated Abroad"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Terminated Abroad' ? 'selected' : '' }}>
                 {{ __('messages.employment.terminated_abroad') }}
             </option>
             <option value="Other"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Other' ? 'selected' : '' }}>
                 {{ __('messages.employment.unemployed_others') }} </option>
         </optgroup>
     </select>
     @error('employment-type')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div id="job-search-duration" class="mt-6">
     <label for="job-search-duration" class="block mb-1">{{ __('messages.employment.how_long_job_search') }}</label>
     <div class="flex flex-wrap items-center">
         <input type="number" id="job-search-duration" placeholder="{{ __('messages.employment.specify_duration') }}"
             name="job-search-duration"
             aria-label=" The user is looking for a job in {{ old('job-search-duration', $employment->job_search_duration ?? '') }}   {{ old('duration-category', $employment->duration_category ?? '') }} "
             class="w-full mb-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             value="{{ old('job-search-duration', $employment->job_search_duration ?? '') }}">
         <select id="duration-category" name="duration-category"
             aria-label="The duration was set to {{ old('duration-category', $employment->duration_category ?? '') }}"
             class="w-full 
border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
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
     <x-primary-button class="mt-6 " aria-label="Save Changes">{{ __('Save Changes') }}</x-primary-button>

     @if (session('status') === 'profile-updated')
         <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
             class="text-md font-semibold text-green-400 dark:text-gray-400">
             {{ __('Saved.') }}
         </p>
     @endif
 </div>
