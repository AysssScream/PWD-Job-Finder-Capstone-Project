 <h2 class="text-2xl font-bold mb-2">EDUCATIONAL BACKGROUND</h2>
 <hr class="border-bottom border-2 border-primary mb-4">
 <form action="{{ route('profile.update.education-info') }}" method="POST">
     @csrf
     @method('PATCH')
     <div class="mt-6">
         <label for="educationLevel"
             class="block mb-1">{{ __('messages.education.highest_educational_attainment') }}</label>
         <select id="educationLevel" name="educationLevel"
             class="w-full p-2  border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             autocomplete="on" aria-label="{{ __('messages.education.highest_educational_attainment') }}">
             <option value="" selected disabled>Select Education Level...
             </option>
             <option value="Doctoral Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Doctoral Degree' ? 'selected' : '' }}>
                 {{ __('messages.education.doctoral_degree') }}
             </option>
             <option value="Master's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Master's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.masters_degree') }}
             </option>
             <option value="College Graduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'College Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.college_graduate') }}
             </option>
             <option value="Bachelor's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Bachelor's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.bachelors_degree') }}
             </option>
             <option value="Vocational Graduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
                 {{ __('messages.education.vocational_graduate') }}
             </option>
             <option value="Associate's Degree"
                 {{ old('educationLevel', $education->educationLevel ?? '') == "Associate's Degree" ? 'selected' : '' }}>
                 {{ __('messages.education.associates_degree') }}
             </option>
             <option value="Some College Level"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Some College Level' ? 'selected' : '' }}>
                 {{ __('messages.education.some_college_level') }}
             </option>
             <option value="Vocational Undergraduate"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                 {{ __('messages.education.vocational_undergraduate') }}
             </option>
             <option value="Technical-Vocational Education and Training"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Technical-Vocational Education and Training' ? 'selected' : '' }}>
                 {{ __('messages.education.technical_vocational_training') }}
             </option>
             <option value="Senior High School"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School' ? 'selected' : '' }}>
                 {{ __('messages.education.senior_high_school') }}
             </option>
             <option value="Junior High School"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Junior High School' ? 'selected' : '' }}>
                 {{ __('messages.education.junior_high_school') }}
             </option>
             <option value="Elementary School"
                 {{ old('educationLevel', $education->educationLevel ?? '') == 'Elementary School' ? 'selected' : '' }}>
                 {{ __('messages.education.elementary_school') }}
             </option>
         </select>
         @error('educationLevel')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="school" class="block mb-1">{{ __('messages.education.school_graduated') }}
         </label>
         <input type="text" id="school" name="school" placeholder="Jose Rizal University"
             class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
             title="Please enter alphabetic characters only" value="{{ old('school', $education->school ?? '') }}"
             aria-label="{{ __('messages.education.school_graduated') }} {{ old('school', $education->school ?? '') }}" />
         @error('school')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="course" class="block mb-1">{{ __('messages.education.course') }}</label>
         <input type="text" id="course" name="course" placeholder="Bachelor of Science in Information Technology"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             value="{{ old('course', $education->course ?? '') }}"
             aria-label="{{ __('messages.education.course') }} {{ old('course', $education->course ?? '') }}" />
         @error('course')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="yearGraduated" class="block mb-1">{{ __('messages.education.year_graduated') }}</label>
         <input type="number" id="yearGraduated" name="yearGraduated"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             min="1900" max="2099" placeholder="Year Graduated"
             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
             maxlength="4" value="{{ old('yearGraduated', $education->yearGraduated ?? '') }}"
             aria-label="{{ __('messages.education.year_graduated') }} {{ old('yearGraduated', $education->yearGraduated ?? '') }}" />
         @error('yearGraduated')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="mt-6">
         <label for="awards" class="block mb-1">{{ __('messages.education.awards') }}</label>
         <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
             class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
             aria-label="{{ __('messages.education.awards') }} {{ old('awards', $education->awards ?? '') }}">{{ old('awards', $education->awards ?? '') }}</textarea>
         @error('awards')
             <div class="text-red-600 mt-1">{{ $message }}</div>
         @enderror
     </div>

     <div class="flex items-center gap-4 ">
         <x-primary-button class="mt-6" aria-label="Save Changes">{{ __('Save Changes') }}</x-primary-button>

         @if (session('status') === 'profile-updated')
             <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                 class="text-md font-semibold text-green-400 dark:text-gray-400">
                 {{ __('Saved.') }}
             </p>
         @endif
     </div>
 </form>
