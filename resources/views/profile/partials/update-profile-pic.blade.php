  <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <section>
      <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
              {{ __('Update Profile Picture') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
              {{ __('Ensure you upload appropriate profile pictures and smaller sizes.') }}
          </p>
      </header>

      <form method="post" action="{{ route('password.passupdate') }}" class="mt-6 space-y-6">

          <div class="flex items-center justify-center">
              <div id="container" style="width: 200px; height: 200px; overflow: hidden; position: relative;">
                  <img class="rounded-circle img-fluid" alt="avatar1"
                      src="{{ asset('storage/' . Auth::user()->pwdInformation->profilePicture) }}"
                      style="width: 100%; height: 100%; object-fit: contain;">
              </div>
          </div>

          <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
              @csrf
              @method('patch')
              @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Oops!</strong> There were some errors with your submission:
                      <ul class="mt-3">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <br>
              @endif
              <div class="flex items-center justify-center mt-3">
                  <label class="btn btn-primary">
                      Update Profile Picture <input type="file" class="d-none" accept="image/*"
                          onchange="previewImage(event)">
                  </label>
              </div>

          </form>




          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
              {{ __('Ensure you upload appropriate profile pictures and smaller sizes (2MB).') }}
          </p>


          <div class="flex items-center justify-center mt-3">

              <div
                  class="w-full text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-user-circle mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Applicant Profile</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-address-card mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Personal Information</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-briefcase mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Employment History and Work Experience</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-suitcase mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Job Preferences</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-language mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Language Proficiency and Other Skills</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-graduation-cap mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">Educational Background</span>
                  </button>
                  <button type="button"
                      class="flex items-center justify-between w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                      <i class="fas fa-wheelchair mr-2"></i> <!-- Font Awesome icon -->
                      <span class="flex-1">PWD Information</span>
                  </button>
              </div>
          </div>
      </form>
  </section>
  <script>
      function previewImage(event) {
          const input = event.target;
          if (input.files && input.files[0]) {
              const reader = new FileReader();
              reader.onload = function(e) {
                  const imgElement = document.querySelector('#container img');
                  imgElement.src = e.target.result;
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>
  <style>
      #container {
          overflow: hidden;
          border: 2px solid #ccc;
          /* Optional: Add a border around the container */
          border-radius: 50%;
          /* Make the container circular */
          display: flex;
          background-size: contain;
          justify-content: center;
          align-items: center;
      }
  </style>
