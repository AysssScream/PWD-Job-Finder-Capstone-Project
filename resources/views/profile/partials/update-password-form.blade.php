  <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
  <section>
      <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
              {{ __('Update Password') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
              {{ __('Ensure your account is using a long, random password to stay secure.') }}
          </p>
      </header>

      <form method="post" action="{{ route('password.passupdate') }}" class="mt-6 space-y-6">
          @csrf
          @method('put')



          <div>
              <x-input-label for="update_password_current_password" :value="__('Current Password')" />
              <x-password-text id="update_password_current_password" type="password" name="current_password"
                  placeholder="Update Your Current Password" required autocomplete="current-password" />

              <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
          </div>

          <div>
              <x-input-label for="update_password_password" :value="__('New Password')" />

              <x-password-text id="update_password_password" type="password" name="password"
                  placeholder="Enter Your New Password" autocomplete="new-password" />

              <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
          </div>

          <div>
              <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />

              <x-password-text id="update_password_password_confirmation" type="password" name="password_confirmation"
                  placeholder="Confirm your New Password" autocomplete="new-password" />

              <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
          </div>

          <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Save') }}</x-primary-button>

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
  </section>
