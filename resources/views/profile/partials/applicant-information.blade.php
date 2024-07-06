<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Applicant Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.emailsend') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>


            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Ensure you upload appropriate profile pictures and smaller sizes (2MB).') }}
            </p>

            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />



            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div>
            <x-input-label for="firstname" :value="__('First Name')" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $applicant->firstname ?? '')"
                required autofocus autocomplete="firstname" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>


        <div>
            <x-input-label for="middlename" :value="__('Middle Name')" />
            <x-text-input id="middlename" name="middlename" type="text" class="mt-1 block w-full" :value="old('middlename', $applicant->middlename ?? '')"
                autocomplete="middlename" />
            <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $applicant->lastname ?? '')"
                required autocomplete="lastname" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <div class="mt-6">
            <label for="birthdate" class="block mb-1">Birthdate</label>
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate', $applicant->birthdate ?? '')"
                required autocomplete="birthdate" />
            @error('birthdate')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6">
            <label for="suffix" class="block mb-1">Suffix</label>
            <select id="suffix" name="suffix" class="w-full p-2  border-gray-500 rounded shadow-sm">
                <option value="None" {{ old('suffix', $applicant->suffix ?? '') == 'None' ? 'selected' : '' }}>
                    None</option>
                <option value="Sr." {{ old('suffix', $applicant->suffix ?? '') == 'Sr' ? 'selected' : '' }}>
                    SR.</option>
                <option value="Jr." {{ old('suffix', $applicant->suffix ?? '') == 'Jr' ? 'selected' : '' }}>
                    JR.</option>
                <option value="I" {{ old('suffix', $applicant->suffix ?? '') == 'I' ? 'selected' : '' }}>
                    I</option>
                <option value="II" {{ old('suffix', $applicant->suffix ?? '') == 'II' ? 'selected' : '' }}>
                    II</option>
                <option value="III" {{ old('suffix', $applicant->suffix ?? '') == 'III' ? 'selected' : '' }}>
                    III</option>
                <option value="IV" {{ old('suffix', $applicant->suffix ?? '') == 'IV' ? 'selected' : '' }}>
                    IV</option>
                <option value="V" {{ old('suffix', $applicant->suffix ?? '') == 'V' ? 'selected' : '' }}>
                    V</option>
                <option value="VI" {{ old('suffix', $applicant->suffix ?? '') == 'VI' ? 'selected' : '' }}>
                    VI</option>
                <option value="VII" {{ old('suffix', $applicant->suffix ?? '') == 'VII' ? 'selected' : '' }}>
                    VII</option>
                <option value="VIII" {{ old('suffix', $applicant->suffix ?? '') == 'VIII' ? 'selected' : '' }}>
                    VIII</option>
                <option value="IX" {{ old('suffix', $applicant->suffix ?? '') == 'IX' ? 'selected' : '' }}>
                    IX</option>
                <option value="X" {{ old('suffix', $applicant->suffix ?? '') == 'X' ? 'selected' : '' }}>
                    X</option>
            </select>
            @error('suffix')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6">
            <label for="gender" class="block mb-1">Gender</label>
            <select id="gender" name="gender" class="w-full p-2  border-gray-500 rounded shadow-sm">
                <option value="Male" {{ old('gender', $applicant->gender ?? '') == 'Male' ? 'selected' : '' }}>Male
                </option>
                <option value="Female" {{ old('gender', $applicant->gender ?? '') == 'Female' ? 'selected' : '' }}>
                    Female</option>
                <option value="Other" {{ old('gender', $applicant->gender ?? '') == 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
            @error('gender')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-md font-semibold text-green-400 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
