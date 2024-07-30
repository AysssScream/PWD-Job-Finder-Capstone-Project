   <h2 class="text-2xl font-bold mb-2">PWD INFORMATION</h2>
   <hr class="border-bottom border-2 border-primary mb-4">
   <div>
       <div class="mt-6">
           <div class="flex flex-col mr-4 w-full ">
               <label for="disabilityOccurrence"
                   class="block mb-1">{{ __('messages.pwdinfo.disability_occurrence.label') }}</label>
               <select id="disabilityOccurrence" name="disabilityOccurrence"
                   class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                   onchange="toggleOtherDisabilityField()"
                   aria-label="{{ __('messages.pwdinfo.disability_occurrence.label') }}">
                   <option value="" selected disabled>
                       {{ __('messages.pwdinfo.disability_occurrence.placeholder') }}
                   </option>
                   <option value="Birth"
                       {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Birth' ? 'selected' : '' }}>
                       {{ __('messages.pwdinfo.disability_occurrence.options.birth') }}
                   </option>
                   <option value="Before Employment"
                       {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Before Employment' ? 'selected' : '' }}>
                       {{ __('messages.pwdinfo.disability_occurrence.options.before_employment') }}
                   </option>
                   <option value="After Employment"
                       {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'After Employment' ? 'selected' : '' }}>
                       {{ __('messages.pwdinfo.disability_occurrence.options.after_employment') }}
                   </option>
                   <option value="Other"
                       {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Other' ? 'selected' : '' }}>
                       {{ __('messages.pwdinfo.disability_occurrence.options.other') }}
                   </option>
               </select>
               @error('disabilityOccurrence')
                   <div class="text-red-600 mt-1">{{ $message }}</div>
               @enderror
           </div>

           <label for="otherDisabilityDetails" class="block  mt-8"> {{ __('messages.pwdinfo.others_specify') }}</label>
           <div class="flex items-center mt-2" id="otherDisabilityField">

               <input type="text" id="otherDisabilityDetails" name="otherDisabilityDetails"
                   class="w-full p-2 border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                   value="{{ old('otherDisabilityDetails', $pwdinfo->otherDisabilityOccurrence ?? '') }}"
                   placeholder="Specify Other Disability Occurrence..."
                   aria-label="{{ __('messages.pwdinfo.others_specify') }} {{ old('otherDisabilityDetails', $pwdinfo->otherDisabilityOccurrence ?? '') }}" />
           </div>
           @error('otherDisabilityDetails')
               <div class="text-red-600 mt-1">{{ $message }}</div>
           @enderror


           <label for="fileUpload" class="block mb-1 mt-6">Verified PWD ID:</label>

           <div id="imagePreview"
               class="mt-2 max-w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
               tabindex="0" aria-label="Image Preview of PWD ID">
               <!-- The selected image or alternate image will be displayed here -->
               <img id="previewImage" src="{{ asset('storage/' . $pwdinfo->pwdIdPicture) }}" alt="Preview Image"
                   class="w-full h-auto block border border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-400">
               <img id="alternateImage" src="{{ asset('/images/preview.jpg') }}" alt="Alternate Image"
                   class="w-full h-auto hidden">
           </div>



           <small class="block mt-2 text-black dark:text-gray-200">File size limit:
               2MB</small>

           @error('fileUpload')
               <div class="text-red-600 mt-1">{{ $message }}</div>
           @enderror
       </div>


   </div>
   <div class="mt-6">
       <label class="block mb-2 ">Disability Status:</label>
       <div class="flex flex-wrap justify-start items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
           tabindex="0" aria-label="Disability Status">
           <div class="radio-group">
               <input type="radio" id="disability_visual" name="disability" value="Visual" class="mr-2"
                   onchange="showTextBox()" aria-label="{{ __('messages.pwdinfo.disability_visual') }}"
                   {{ old('disability', $pwdinfo->disability ?? '') == 'Visual' ? 'checked' : '' }}>
               <label for="disability_visual" class="mr-4"><i class="fas fa-eye mr-1"></i>
                   {{ __('messages.pwdinfo.disability_visual') }}</label>
           </div>
           <div class="radio-group">
               <input type="radio" id="disability_psychosocial" name="disability" value="Psychosocial" class="mr-2"
                   onchange="showTextBox()" aria-label="{{ __('messages.pwdinfo.disability_psychosocial') }}"
                   {{ old('disability', $pwdinfo->disability ?? '') == 'Psychosocial' ? 'checked' : '' }}>
               <label for="disability_psychosocial" class="mr-4"><i class="fas fa-brain mr-1"></i>
                   {{ __('messages.pwdinfo.disability_psychosocial') }}</label>
           </div>
           <div class="radio-group">
               <input type="radio" id="disability_physical" name="disability" value="Physical" class="mr-2"
                   onchange="showTextBox()" aria-label="{{ __('messages.pwdinfo.disability_physical') }}"
                   {{ old('disability', $pwdinfo->disability ?? '') == 'Physical' ? 'checked' : '' }}>
               <label for="disability_physical" class="mr-4"><i
                       class="fas fa-wheelchair mr-1"></i>{{ __('messages.pwdinfo.disability_physical') }}</label>
           </div>
           <div class="radio-group">
               <input type="radio" id="disability_hearing" name="disability" value="Hearing" class="mr-2"
                   onchange="showTextBox()" aria-label=" {{ __('messages.pwdinfo.disability_hearing') }}"
                   {{ old('disability', $pwdinfo->disability ?? '') == 'Hearing' ? 'checked' : '' }}>
               <label for="disability_hearing" class="mr-4"><i class="fas fa-deaf mr-1"></i>
                   {{ __('messages.pwdinfo.disability_hearing') }}</label>
           </div>
           <div class="radio-group">
               <input type="radio" id="disability_others" name="disability" value="Others" class="mr-2"
                   onchange="showTextBox()" aria-label="{{ __('messages.pwdinfo.disability_others') }}"
                   {{ old('disability', $pwdinfo->disability ?? '') == 'Others' ? 'checked' : '' }}>
               <label for="disability_others" class="mr-4"><i class="fas fa-handshake mr-1"></i>
                   {{ __('messages.pwdinfo.disability_others') }}</label>
           </div>
           @error('disability')
               <div class="text-red-600 mt-1">{{ $message }}</div>
           @enderror
       </div>
       <div id="disabilityTextBox"
           class="mt-6 {{ old('disability', $pwdinfo->disability ?? '') == 'others' ? '' : '' }} w-full">
           <label class="block mb-2"> {{ __('messages.pwdinfo.specify_disability') }}</label>
           <input type="text" id="disabilityDetails" name="disabilityDetails"
               aria-label=" {{ __('messages.pwdinfo.specify_disability') }}{{ old('disabilityDetails', $pwdinfo->disability ?? '') }}"
               tabindex=0
               class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
               value="{{ old('disabilityDetails', $pwdinfo->disability ?? '') }}" placeholder="Ex. Cataract" />
           <div>
               @error('disabilityDetails')
                   <div class="text-red-600 mt-1">{{ $message }}</div>
               @enderror
           </div>
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

       {{--   <div class="mt-6">
               <label for="profilePicture" class="block mb-1 ">Upload Profile
                   Picture</label>
               <div class="relative border rounded overflow-hidden mt-3">
                   <input type="file" id="profilePicture" name="profilePicture"
                       class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*"
                       onchange=" profilePictureFileChange(event)">
                   <button type="button" class="py-2 px-4 bg-black text-white"
                       onclick="document.getElementById('profilePicture').click()">Choose
                       File</button>
               </div class="mt-4">

               <div id="profilePicName" class="mt-2">
                   {{ old('profilePictureName', $formData7['profilePictureName'] ?? 'No file chosen') }}
               </div>

               <div id="imagePreview2" class="mt-2">
                   <img id="previewImage" src="{{ asset('/images/preview.jpg') }}" alt="Preview Image"
                       style="max-width: 50%; max-height: 100%; display: block;">
                   <img id="alternateImage" src="{{ asset('/images/preview.jpg') }}" alt="Alternate Image"
                       style="max-width: 50%; max-height: 100%; display: none;">
               </div>
               <small class="block mt-2 text-gray-500">File size limit: 2MB</small>

               @error('profilePicture')
                   <div class="text-red-600 mt-1">{{ $message }}</div>
               @enderror --}}

   </div>
   </div>
   <script>
       function toggleOtherDisabilityField() {
           var selectElement = document.getElementById('disabilityOccurrence');
           var otherDisabilityInput = document.getElementById('otherDisabilityDetails');

           if (selectElement.value === 'Other') {
               otherDisabilityInput.disabled = false;
           } else {
               otherDisabilityInput.disabled = true;

           }
       }
       window.onload = function() {
           toggleOtherDisabilityField();
       };
       document.getElementById('disabilityOccurrence').addEventListener('change', toggleOtherDisabilityField);


       function clearLocalStorage() {
           localStorage.removeItem('formData');
       }

       function pwdIDFileChange(event) {
           const fileInput = event.target;
           const fileName = fileInput.files[0].name;
           const fileReader = new FileReader();

           document.getElementById('fileName').textContent = fileName;

           fileReader.onload = function(e) {
               const img = document.createElement('img');
               img.src = e.target.result;
               img.className = 'mt-2'; // Add margin-top for spacing

               const imagePreview = document.getElementById('imagePreview');
               imagePreview.innerHTML = ''; // Clear any previous image
               imagePreview.appendChild(img);
           };

           fileReader.readAsDataURL(fileInput.files[0]);
       }

       function profilePictureFileChange(event) {
           const fileInput = event.target;
           const fileName = fileInput.files[0].name;
           const fileReader = new FileReader();

           document.getElementById('profilePicName').textContent = fileName;

           fileReader.onload = function(e) {
               const img = document.createElement('img');
               img.src = e.target.result;
               img.className = 'mt-2';

               const imagePreview = document.getElementById('imagePreview2');
               imagePreview.innerHTML = ''; // Clear any previous image
               imagePreview.appendChild(img);
           };

           fileReader.readAsDataURL(fileInput.files[0]);
       }
   </script>
   <style>
       #imagePreview2 {
           border: 1px solid #ddd;
           padding: 5px;
           overflow: auto;
           width: 300px;
           height: 300px;
           display: flex;
           justify-content: center;
           align-items: center;
       }

       #imagePreview2 img {
           max-width: 100%;
           max-height: 100%;
           object-fit: contain;
       }

       #imagePreview {
           border: 1px solid #ddd;
           padding: 5px;
           overflow: auto;
           width: 300px;
           height: 300px;
           display: flex;
           justify-content: center;
           align-items: center;
       }

       #imagePreview img {
           max-width: 100%;
           max-height: 100%;
           object-fit: cover;
       }
   </style>
