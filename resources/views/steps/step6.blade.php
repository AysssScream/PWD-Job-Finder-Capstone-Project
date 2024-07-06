      <!DOCTYPE html>
      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
          <link rel="stylesheet" href="/css/steps.css">

      </head>
      <div class="py-12">
          <div class="container mx-auto">
              <div class="flex justify-center">
                  <div class="w-5/6">
                      <form action="{{ route('educationalbg') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @if ($errors->any())
                              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                  role="alert">
                                  <strong class="font-bold">Oops!</strong>
                                  <span class="block sm:inline">There were some errors with your submission:</span>
                                  <ul class="mt-3 list-disc list-inside text-sm">
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                              <br>
                          @endif
                          <div class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 shadow-md rounded-lg">
                              <div class="p-6">
                                  <h3 class="text-2xl font-bold mb-2 inline-flex items-center justify-between w-full">
                                      Educational Background
                                      @php
                                          $currentStep = 6; // Set this dynamically based on your current step
                                          $totalSteps = 7; // Total number of steps (adjusted to 8)
                                          $percentage = round((($currentStep - 1) / ($totalSteps - 1)) * 100);
                                      @endphp
                                      <div class="ml-4 flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                          <div
                                              class="relative w-full sm:w-36 h-2 bg-gray-200 rounded-full overflow-hidden">
                                              <div class="absolute top-0 left-0 h-2 bg-blue-600 rounded-full transition-all ease-in-out duration-500"
                                                  style="width: {{ $percentage }}%;"></div>
                                          </div>
                                          <div class="text-md text-black font-semibold dark:text-gray-400 mt-2 sm:mt-0">
                                              Step {{ $currentStep }}/{{ $totalSteps }} : <span
                                                  class="text-green-600">{{ $percentage }}%</span>
                                          </div>
                                      </div>
                                  </h3>
                                  <div>
                                      <nav class="text-sm" aria-label="Breadcrumb">
                                          <ol class="list-none p-0 inline-flex">
                                              <li class="flex items-center">
                                                  <i
                                                      class="fas fa-arrow-left mr-2 text-gray-700 dark:text-gray-200"></i>
                                                  <a href="{{ route('workexp') }}"
                                                      class="text-gray-700 dark:text-gray-200">Language
                                                      Proficiency and Other Skills</a>
                                                  <span class="mx-2 text-gray-500">/</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <span class="text-blue-500 font-semibold">Educational
                                                      Background</span>
                                              </li>
                                          </ol>
                                      </nav>
                                  </div>
                                  <hr class="border-t-2 border-gray-400 rounded-full my-4">

                                  <!-- Adjusted text size to text-2xl -->
                                  <span class="text-md font-regular" style="text-align: justify;"><b>Step 6:</b> To
                                      complete
                                      the application form, start by
                                      accessing the online system and locating the section dedicated to educational
                                      background. Here, input your highest educational attainment any awards received
                                      (if applicable), the name of your
                                      school, your specific course or major , and the year of your graduation
                                      .As of the moment, you may type N/A for the School Graduated and Course.
                                  </span>

                                  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                      <div>
                                          @include('layouts.dropdown')

                                      </div>
                                      <div>
                                          <div class="mt-6">
                                              <label for="educationLevel" class="block mb-1">Highest Educational
                                                  Attainment</label>
                                              <select id="educationLevel" name="educationLevel"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                  autocomplete="on">
                                                  <option value="" selected disabled>Select Education Level...
                                                  </option>
                                                  <option value="Primary School"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Primary School' ? 'selected' : '' }}>
                                                      Primary
                                                      School
                                                  </option>
                                                  <option value="Elementary"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Elementary' ? 'selected' : '' }}>
                                                      Elementary
                                                  </option>
                                                  <option value="Junior High School"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Junior High School' ? 'selected' : '' }}>
                                                      Junior High
                                                      School </option>
                                                  <option value="Senior High School"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Senior High School' ? 'selected' : '' }}>
                                                      Senior High
                                                      School </option>
                                                  <option value="Associate's Degree Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == "Associate's Degree Level" ? 'selected' : '' }}>
                                                      Associate's
                                                      Degree Level</option>
                                                  <option value="Some College Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Some College Level' ? 'selected' : '' }}>
                                                      Some College
                                                      Level </option>
                                                  <option value="College Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'College Graduate' ? 'selected' : '' }}>
                                                      College
                                                      Graduate </option>
                                                  <option value="Vocational Graduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Graduate' ? 'selected' : '' }}>
                                                      Vocational Graduate</option>
                                                  <option value="Vocational Undergraduate"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Vocational Undergraduate' ? 'selected' : '' }}>
                                                      Vocational
                                                      Undergraduate</option>
                                                  <option value="Bachelor's Degree Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == "Bachelor's Degree Level" ? 'selected' : '' }}>
                                                      Bachelor's
                                                      Degree Level</option>
                                                  <option value="Masteral Degree Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Masteral Degree Level' ? 'selected' : '' }}>
                                                      Masteral Degree Level</option>
                                                  <option value="Doctoral Degree Level"
                                                      {{ old('educationLevel', $formData6['educationLevel'] ?? '') == 'Doctoral Degree Level' ? 'selected' : '' }}>
                                                      Doctoral Degree Level</option>
                                              </select>
                                              @error('educationLevel')
                                                  <div class="text-red-600 mt-1">{{ $message }}</div>
                                              @enderror
                                          </div>

                                          <div class="mt-6">
                                              <label for="school" class="block mb-1">School Graduated (Type N/A if
                                                  not applicable)</label>
                                              <input type="text" id="school" name="school"
                                                  placeholder="Jose Rizal University"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                  title="Please enter alphabetic characters only"
                                                  value="{{ old('school', $formData6['school'] ?? '') }}" />
                                              @error('school')
                                                  <div class="text-red-600 mt-1">{{ $message }}</div>
                                              @enderror
                                          </div>

                                          <div class="mt-6">
                                              <label for="course" class="block mb-1">Course (Type N/A if
                                                  not applicable)</label>
                                              <input type="text" id="course" name="course"
                                                  placeholder="Bachelor of Science in Information Technology"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                  value="{{ old('course', $formData6['course'] ?? '') }}" />
                                              @error('course')
                                                  <div class="text-red-600 mt-1">{{ $message }}</div>
                                              @enderror
                                          </div>

                                          <div class="mt-6">
                                              <label for="yearGraduated" class="block mb-1">Year Graduated</label>
                                              <input type="number" id="yearGraduated" name="yearGraduated"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200"
                                                  min="1900" max="2099" placeholder="Year Graduated"
                                                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                  maxlength="4"
                                                  value="{{ old('yearGraduated', $formData6['yearGraduated'] ?? '') }}" />
                                              @error('yearGraduated')
                                                  <div class="text-red-600 mt-1">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                      <div>

                                          <div class="mt-6">
                                              <label for="awards" class="block mb-1">Awards</label>
                                              <textarea id="awards" placeholder=" Ex. • Cum Laude" name="awards"
                                                  class="w-full p-2 border rounded bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">{{ old('awards', $formData6['awards'] ?? '') }}</textarea>
                                              @error('awards')
                                                  <div class="text-red-600 mt-1">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="mt-4 text-right">
                                      <a href="{{ route('dialect') }}"
                                          class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Previous</a>

                                      <button type="submit"
                                          class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Save</button>
                                  </div>
                              </div>

                          </div>
