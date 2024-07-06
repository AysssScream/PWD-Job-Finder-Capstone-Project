 <h2 class="text-2xl font-bold mb-2">EDUCATIONAL BACKGROUND</h2>
 <hr class="border-bottom border-2 border-primary mb-4">
 <div class="mt-6">
     <label for="educationLevel" class="block mb-1">Highest Educational
         Attainment</label>
     <select id="educationLevel" name="educationLevel"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200  shadow-sm"
         autocomplete="on">
         <option value="" selected disabled>Select Education Level...
         </option>
         <option value="Primary School"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Primary School' ? 'selected' : '' }}>
             Primary
             School
         </option>
         <option value="Elementary"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Elementary' ? 'selected' : '' }}>
             Elementary
         </option>
         <option value="Junior High School"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Junior High School' ? 'selected' : '' }}>
             Junior High
             School </option>
         <option value="Senior High School"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Senior High School' ? 'selected' : '' }}>
             Senior High
             School </option>
         <option value="Associate's Degree Level"
             {{ old('educationLevel', $education->educationLevel ?? '') == "Associate's Degree Level" ? 'selected' : '' }}>
             Associate's
             Degree Level</option>
         <option value="Some College Level"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Some College Level' ? 'selected' : '' }}>
             Some College
             Level </option>
         <option value="College Graduate"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'College Graduate' ? 'selected' : '' }}>
             College
             Graduate </option>
         <option value="Vocational Graduate"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
             Vocational Graduate</option>
         <option value="Vocational Undergraduate"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
             Vocational
             Undergraduate</option>
         <option value="Bachelor's Degree Level"
             {{ old('educationLevel', $education->educationLevel ?? '') == "Bachelor's Degree Level" ? 'selected' : '' }}>
             Bachelor's
             Degree Level</option>
         <option value="Masteral Degree Level"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Masteral Degree Level' ? 'selected' : '' }}>
             Masteral Degree Level</option>
         <option value="Doctoral Degree Level"
             {{ old('educationLevel', $education->educationLevel ?? '') == 'Doctoral Degree Level' ? 'selected' : '' }}>
             Doctoral Degree Level</option>
     </select>
     @error('educationLevel')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div class="mt-6">
     <label for="school" class="block mb-1">School Graduated (Type N/A if
         not applicable)</label>
     <input type="text" id="school" name="school" placeholder="Jose Rizal University"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm"
         title="Please enter alphabetic characters only" value="{{ old('school', $education->school ?? '') }}" />
     @error('school')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div class="mt-6">
     <label for="course" class="block mb-1">Course (Type N/A if
         not applicable)</label>
     <input type="text" id="course" name="course" placeholder="Bachelor of Science in Information Technology"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm"
         value="{{ old('course', $education->course ?? '') }}" />
     @error('course')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div class="mt-6">
     <label for="yearGraduated" class="block mb-1">Year Graduated</label>
     <input type="number" id="yearGraduated" name="yearGraduated"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm"
         min="1900" max="2099" placeholder="Year Graduated"
         oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
         maxlength="4" value="{{ old('yearGraduated', $education->yearGraduated ?? '') }}" />
     @error('yearGraduated')
         <div class="text-red-600 mt-1">{{ $message }}</div>
     @enderror
 </div>

 <div class="mt-6">
     <label for="awards" class="block mb-1">Awards</label>
     <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
         class="w-full p-2 border border-dark rounded bg-gray-100 text-black dark:bg-gray-900 dark:text-gray-200 shadow-sm">{{ old('awards', $education->awards ?? '') }}</textarea>
     @error('awards')
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
