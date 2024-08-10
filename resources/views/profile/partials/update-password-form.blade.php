  <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
  <section>
      <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400 "
              aria-label="{{ __('messages.profile.update_password') }}" tabindex="0">
              {{ __('messages.profile.update_password') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
              aria-label="{{ __('messages.profile.password_security') }}" tabindex="0">
              {{ __('messages.profile.password_security') }}
          </p>
      </header>

      <form method="post" action="{{ route('password.passupdate') }}" class="mt-6 space-y-6">
          @csrf
          @method('put')



          <div>
              <x-input-label for="update_password_current_password" :value="__('Current Password')" />
              <x-password-text id="update_password_current_password" type="password" name="current_password"
                  placeholder="{{ __('messages.profile.current_password') }}" required autocomplete="current-password"
                  aria-label="{{ __('messages.profile.current_password') }}" />
              <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

          </div>

          <div>
              <x-input-label for="update_password_password" :value="__('New Password')" />

              <x-password-text id="update_password_password" type="password" name="password"
                  placeholder="{{ __('messages.profile.new_password') }}" autocomplete="new-password"
                  aria-label="{{ __('messages.profile.new_password') }}" />

              <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
              <div id="password-requirements" class="text-md mt-1 text-gray-700 dark:text-gray-200">
              </div>
          </div>

          <div>
              <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />

              <x-password-text id="update_password_password_confirmation" type="password" name="password_confirmation"
                  placeholder="{{ __('messages.profile.confirm_password') }}" autocomplete="new-password"
                  aria-label="{{ __('messages.profile.confirm_password') }}" />

              <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
          </div>

          <div class="flex items-center gap-4 mb-5">
              <x-primary-button aria-label="Save" tabindex="0">{{ __('Save') }}</x-primary-button>

              {{-- Debugging: Output session status --}}
              <p>{{ session('status') }}</p>

              @if (session('status') === 'password-updated')
                  <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                      class="text-sm text-green-600 dark:text-green-400"> {{-- Adjusted class to make it green --}}
                      {{ __('Saved.') }}
                  </p>
              @endif
          </div>


      </form>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
              const passwordInput = document.getElementById('update_password_password');
              const requirementsMessage = document.getElementById('password-requirements');

              passwordInput.addEventListener('input', function() {
                  const password = passwordInput.value;
                  let requirements = [];

                  // Check password length
                  if (password.length >= 8) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 8 characters');
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 8 characters');
                  }

                  // Check for special character
                  if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 special character'
                      );
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 1 special character');
                  }

                  // Check for number
                  if (/\d/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 number');
                  } else {
                      requirements.push('<i class="fas fa-times-circle text-red-500"></i> At least 1 number');
                  }

                  // Check for uppercase letter
                  if (/[A-Z]/.test(password)) {
                      requirements.push(
                          '<i class="fas fa-check-circle text-green-500"></i> At least 1 uppercase letter'
                      );
                  } else {
                      requirements.push(
                          '<i class="fas fa-times-circle text-red-500"></i> At least 1 uppercase letter');
                  }

                  // Update requirements message
                  requirementsMessage.innerHTML = requirements.join('<br>');
              });
          });
      </script>
  </section>
