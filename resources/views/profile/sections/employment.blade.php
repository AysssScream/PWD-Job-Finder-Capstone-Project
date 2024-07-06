 <h2 class="text-2xl font-bold mb-2">EMPLOYMENT HISTORY</h2>
 <hr class="border-bottom border-2 border-primary mb-4">

 <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
     <div class="overflow-x-auto">
         <div style="text-align: left;">
             <a href="{{ route('editemployment') }}" class="btn btn-primary">
                 <i class="fas fa-edit mr-2"></i> Modify Work Experience
             </a>
         </div>
     </div>
 </div>

 <div id="employment-type-options" class="mt-6">
     <label for="employment-type" class="block mb-1">Specify
         your Current
         Employment:</label>
     <select id="employment-type" name="employment-type"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm">
         <option value="" selected disabled>Please select
             your employment
             status...
         </option>
         <optgroup label="Employed">
             <option value="Wage Employment"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Wage Employment' ? 'selected' : '' }}>
                 Employed -
                 Wage
                 Employment</option>
             <option value="Self Employed"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Self Employed' ? 'selected' : '' }}>
                 Employed -
                 Self
                 Employed</option>
             <option value="Others"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Others' ? 'selected' : '' }}>
                 Employed -
                 Others
             </option>
         </optgroup>
         <!-- Unemployed Options -->
         <optgroup label="Unemployed">
             <option value="Entrant/Fresh Graduate"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Entrant/Fresh Graduate' ? 'selected' : '' }}>
                 Unemployed - New
                 Unemployed - Entrant/Fresh Graduate</option>
             <option value="Finished Contract"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Finished Contract' ? 'selected' : '' }}>
                 Unemployed - Finished Contract</option>
             <option value="Resigned"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Resigned' ? 'selected' : '' }}>
                 Unemployed - Resigned</option>
             <option value="Retired"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Retired' ? 'selected' : '' }}>
                 Unemployed - Retired
             </option>
             <option value="Terminated Due to Calamity"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Terminated Due to Calamity' ? 'selected' : '' }}>
                 Unemployed - Terminated/Laid off due to calamity
             </option>
             <option value="Teminated Local"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Teminated Local' ? 'selected' : '' }}>
                 Unemployed - Terminated/Laid off (Local)
             </option>
             <option value="Terminated Abroad"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Terminated Abroad' ? 'selected' : '' }}>
                 Unemployed - Terminated/Laid off (abroad)
             </option>
             <option value="Other"
                 {{ old('employment-type', $employment->employment_type ?? '') == 'Other' ? 'selected' : '' }}>
                 Unemployed - Others
             </option>
         </optgroup>
     </select>
     @error('employment-type')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div id="job-search-duration" class="mt-6">
     <label for="job-search-duration" class="block mb-1">How long have you been
         looking
         for a job?</label>
     <div class="flex flex-wrap items-center">
         <input type="number" id="job-search-duration" placeholder="Specify the Duration" name="job-search-duration"
             class="w-full p-2 border border-dark rounded shadow-sm bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 mb-4"
             value="{{ old('job-search-duration', $employment->job_search_duration ?? '') }}">
         <select id="duration-category" name="duration-category"
             class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm">
             <option value="Days"
                 {{ old('duration-category', $employment->duration_category ?? '') === 'Days' ? 'selected' : '' }}>
                 Days</option>
             <option value="Weeks"
                 {{ old('duration-category', $employment->duration_category ?? '') === 'Weeks' ? 'selected' : '' }}>
                 Weeks</option>
             <option value="Months"
                 {{ old('duration-category', $employment->duration_category ?? '') === 'Months' ? 'selected' : '' }}>
                 Months</option>
             <option value="Years"
                 {{ old('duration-category', $employment->duration_category ?? '') === 'Years' ? 'selected' : '' }}>
                 Years</option>
         </select>
     </div>
     @error('job-search-duration')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div class="flex items-center gap-4 ">
     <x-primary-button class="mt-6">{{ __('Save Changes') }}</x-primary-button>

     @if (session('status') === 'profile-updated')
         <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
             class="text-md font-semibold text-green-400 dark:text-gray-400">
             {{ __('Saved.') }}
         </p>
     @endif
 </div>
