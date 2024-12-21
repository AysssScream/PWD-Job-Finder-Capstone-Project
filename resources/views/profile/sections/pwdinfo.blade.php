   <h2 class="text-2xl font-bold mb-2">PWD INFORMATION</h2>
   <hr class="border-bottom border-2 border-primary mb-4">
   <form action="{{ route('profile.update.pwd-info') }}" method="POST">
       @csrf
       @method('PATCH')
       <div>
           <div class="mt-6">
               <div class="flex flex-col mr-4 w-full ">
                   <label for="disabilityOccurrence"
                       class="block mb-1">{{ __('messages.pwdinfo.disability_occurrence.label') }}</label>
                   <select id="disabilityOccurrence" name="disabilityOccurrence"
                       class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
                       onchange="toggleOtherDisabilityField()"
                       aria-label="{{ __('messages.pwdinfo.disability_occurrence.label') }} {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') }}">
                       <option value="" selected disabled>
                           {{ __('messages.pwdinfo.disability_occurrence.placeholder') }}
                       </option>
                       <optgroup label="Congenital">
                           <option value="Congenital/Born"
                               {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Congenital/Born' ? 'selected' : '' }}>
                               {{ __('messages.pwdinfo.disability_occurrence.options.congenital_born') }}
                           </option>
                       </optgroup>
                       <optgroup label="Acquired">
                           <option value="Chronic Illness"
                               {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Chronic Illness' ? 'selected' : '' }}>
                               {{ __('messages.pwdinfo.disability_occurrence.options.chronic_illness') }}
                           </option>
                           <option value="Accident"
                               {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Accident' ? 'selected' : '' }}>
                               {{ __('messages.pwdinfo.disability_occurrence.options.accident') }}
                           </option>
                           <option value="Injury"
                               {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Injury' ? 'selected' : '' }}>
                               {{ __('messages.pwdinfo.disability_occurrence.options.injury') }}
                           </option>
                           <option value="Other"
                               {{ old('disabilityOccurrence', $pwdinfo->disabilityOccurrence ?? '') == 'Other' ? 'selected' : '' }}>
                               {{ __('messages.pwdinfo.disability_occurrence.options.other') }}
                           </option>
                       </optgroup>
                   </select>
                   @error('disabilityOccurrence')
                       <div class="text-red-600 mt-1">{{ $message }}</div>
                   @enderror
               </div>

               <label for="otherDisabilityDetails" class="block  mt-8">
                   {{ __('messages.pwdinfo.others_specify') }}</label>
               <div class="flex items-center mt-2" id="otherDisabilityField">
                   <input type="text" id="otherDisabilityDetails" name="otherDisabilityDetails"
                       class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400"
                       value="{{ old('otherDisabilityDetails', $pwdinfo->otherDisabilityDetails ?? '') }}"
                       placeholder="Specify Other Disability Occurrence..."
                       aria-label="{{ __('messages.pwdinfo.others_specify') }} {{ old('otherDisabilityDetails', $pwdinfo->otherDisabilityDetails ?? '') }}" />
               </div>
               @error('otherDisabilityDetails')
                   <div class="text-red-600 mt-1">{{ $message }}</div>
               @enderror

               <label for="pwdId" class="block mb-1 mt-6 ">Verified PWD ID:</label>
               <div class="flex items-center">
                   <span class="mr-2 font-bold">13-7401-000-</span>
                   @if (!empty($pwdinfo->pwdIdNo))
                       {{ $pwdinfo->pwdIdNo }}<i class="fas fa-id-card mr-2 ml-2"></i>
                   @else
                       <h2 class="p-2 rounded-lg font-bold bg-gray-200 dark:bg-gray-700 text-red-600 dark:text-red-200">
                           PWD ID not found
                       </h2>
                   @endif
               </div>
           </div>

       </div>
       <div class="mt-6">
           <label class="block mb-2 ">Disability Status:</label>
           <div class="flex flex-wrap justify-start items-center focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
               tabindex="0" aria-label="Disability Status">
               <div class="radio-group">
                   <input type="radio" id="disability_visual" name="disability" value="Visual" class="mr-2"
                       onchange="showTextBox()" aria-label="{{ __('messages.pwdinfo.disability_visual') }} "
                       {{ old('disability', $pwdinfo->disability ?? '') == 'Visual' ? 'checked' : '' }}>
                   <label for="disability_visual" class="mr-4"><i class="fas fa-eye mr-1"></i>
                       {{ __('messages.pwdinfo.disability_visual') }}</label>
               </div>
               <div class="radio-group">
                   <input type="radio" id="disability_psychosocial" name="disability" value="Psychosocial"
                       class="mr-2" onchange="showTextBox()"
                       aria-label="{{ __('messages.pwdinfo.disability_psychosocial') }}"
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
                   aria-label=" {{ __('messages.pwdinfo.specify_disability') }}{{ old('disabilityDetails', $pwdinfo->disabilityDetails ?? '') }}"
                   tabindex=0
                   class="w-full p-3 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-md  rounded-lg  focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 "
                   value="{{ old('disabilityDetails', $pwdinfo->disabilityDetails ?? '') }}"
                   placeholder="Ex. Cataract" />
               <div>
                   @error('disabilityDetails')
                       <div class="text-red-600 mt-1">{{ $message }}</div>
                   @enderror
               </div>
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
       </div>
   </form>

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
                   <img id="previewImage" src="{{ asset('/images/preview.webp') }}" alt="Preview Image"
                       style="max-width: 50%; max-height: 100%; display: block;">
                   <img id="alternateImage" src="{{ asset('/images/preview.webp') }}" alt="Alternate Image"
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
