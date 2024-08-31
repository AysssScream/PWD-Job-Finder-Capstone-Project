@if (Auth::user()->usertype === 'employer')
    <h2 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-100" aria-label="Applicant Profile">EMPLOYER PROFILE
    @elseif(Auth::user()->usertype === 'user')
        <h2 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-100" aria-label="Applicant Profile">APPLICANT
            PROFILE
@endif
</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="{{ route('profile.update.applicant-profile') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mt-6 ">
        <label for="gender" class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('Email') }}</label>
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required
            autocomplete="username" aria-label="{{ __('Email') }} {{ old('email', $user->email) }} " />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class=" mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('messages.applicant.email_unverified') }}

                    <button form="send-verification"
                        class="underline  text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('messages.applicant.verification_email') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium  text-green-600 dark:text-green-400">
                        {{ __('messages.applicant.verification_link_sent') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    @if (Auth::user()->usertype === 'user')

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('messages.applicant.firstname') }}</label>
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $applicant->firstname ?? '')"
                required autofocus autocomplete="firstname"
                aria-label="{{ __('messages.applicant.firstname') }} {{ old('firstname', $applicant->firstname ?? '') }} " />

            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('messages.applicant.middlename') }}</label>
            <x-text-input id="middlename" name="middlename" type="text" class="mt-1 block w-full" :value="old('middlename', $applicant->middlename ?? '')"
                autocomplete="middlename"
                aria-label="{{ __('messages.applicant.middlename') }} {{ old('middlename', $applicant->middlename ?? '') }}" />
            <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
        </div>

        <div class="mt-6">
            <label for="gender"
                class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('messages.applicant.lastname') }}</label>
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $applicant->lastname ?? '')"
                required autocomplete="lastname"
                aria-label="{{ __('messages.applicant.lastname') }} {{ old('lastname', $applicant->lastname ?? '') }} " />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>
        @if (Auth::user()->account_verification_status === 'approved')

            <div class="mt-6">
                <label for="birthdate"
                    class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('messages.applicant.birthdate') }}</label>
                <x-text-input id="birthdate" name="birthdate" type="date"
                    class="mt-1 block w-full text-gray-800 dark:text-gray-100" :value="old('birthdate', $applicant->birthdate ?? '')" required
                    autocomplete="birthdate" readonly
                    aria-label="{{ __('messages.applicant.birthdate') }} {{ old('birthdate', $applicant->birthdate ?? '') }}" />
                @error('birthdate')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror

            </div>

            <div class="mt-6">
                <label for="suffix"
                    class="block mb-1 text-gray-800 dark:text-gray-100">{{ __('messages.applicant.suffix') }}</label>
                <select id="suffix" name="suffix"
                    aria-label="{{ __('messages.applicant.suffix') }} {{ old('suffix', $applicant->suffix ?? '') }}"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="None" {{ old('suffix', $applicant->suffix ?? '') == 'None' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_none') }}</option>
                    <option value="Sr." {{ old('suffix', $applicant->suffix ?? '') == 'Sr.' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_sr') }}</option>
                    <option value="Jr." {{ old('suffix', $applicant->suffix ?? '') == 'Jr.' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_jr') }}</option>
                    <option value="I" {{ old('suffix', $applicant->suffix ?? '') == 'I' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_i') }}</option>
                    <option value="II" {{ old('suffix', $applicant->suffix ?? '') == 'II' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_ii') }}</option>
                    <option value="III" {{ old('suffix', $applicant->suffix ?? '') == 'III' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_iii') }}</option>
                    <option value="IV" {{ old('suffix', $applicant->suffix ?? '') == 'IV' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_iv') }}</option>
                    <option value="V" {{ old('suffix', $applicant->suffix ?? '') == 'V' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_v') }}</option>
                    <option value="VI" {{ old('suffix', $applicant->suffix ?? '') == 'VI' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_vi') }}</option>
                    <option value="VII" {{ old('suffix', $applicant->suffix ?? '') == 'VII' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_vii') }}</option>
                    <option value="VIII" {{ old('suffix', $applicant->suffix ?? '') == 'VIII' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_viii') }}</option>
                    <option value="IX" {{ old('suffix', $applicant->suffix ?? '') == 'IX' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_ix') }}</option>
                    <option value="X" {{ old('suffix', $applicant->suffix ?? '') == 'X' ? 'selected' : '' }}>
                        {{ __('messages.applicant.suffix_x') }}</option>
                </select>
                @error('suffix')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6">
                <label for="gender" class="block mb-1 text-gray-800 dark:text-gray-100">
                    {{ __('messages.applicant.gender') }}
                </label>
                <select id="gender" name="gender"
                    aria-label="{{ __('messages.applicant.gender', ['value' => old('gender', $applicant->gender ?? '')]) }}"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="Male" {{ old('gender', $applicant->gender ?? '') == 'Male' ? 'selected' : '' }}>
                        {{ __('messages.applicant.male') }}
                    </option>
                    <option value="Female" {{ old('gender', $applicant->gender ?? '') == 'Female' ? 'selected' : '' }}>
                        {{ __('messages.applicant.female') }}
                    </option>
                    <option value="Other" {{ old('gender', $applicant->gender ?? '') == 'Other' ? 'selected' : '' }}>
                        {{ __('messages.applicant.other') }}
                    </option>
                </select>
                @error('gender')
                    <div class="text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>



            <div class="flex items-center gap-4 ">
                <x-primary-button class="mt-6 " aria-label="Save Changes">{{ __('Save Changes') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-md font-semibold text-green-400 dark:text-gray-400">
                        {{ __('Saved.') }}
                    </p>
                @endif
            </div>
        @endif
    @endif

</form>
