<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\EducationalAttainment;
use App\Models\JobPreference;
use App\Models\LanguageInput;
use App\Models\PersonalInfo;
use App\Models\ApplicantProfile;
use App\Models\EmploymentInfo;
use App\Models\PwdInformation;
use App\Models\Skill;
use App\Models\WorkExperience;
use Carbon\Carbon;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Session;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $user = $request->user();
        $applicant = ApplicantProfile::where('user_id', $user->id)->first();
        $personal = PersonalInfo::where('user_id', $user->id)->first();
        $employment = EmploymentInfo::where('user_id', $user->id)->first(); // Retrieve all work experiences
        $workExperience = WorkExperience::where('user_id', $user->id)->get();
        $jobpreference = JobPreference::where('user_id', $user->id)->first();
        $language = LanguageInput::where('user_id', $user->id)->first();
        $skill = Skill::where('user_id', $user->id)->first();
        $education = EducationalAttainment::where('user_id', $user->id)->first();
        $pwdinfo = PwdInformation::where('user_id', $user->id)->first();


        return view('profile.edit', [
            'user' => $user,
            'applicant' => $applicant,
            'personal' => $personal,
            'employment' => $employment,
            'workexp' => $workExperience,
            'jobpreference' => $jobpreference,
            'language' => $language,
            'skill' => $skill,
            'education' => $education,
            'pwdinfo' => $pwdinfo,
        ]);
    }

    public function updateApplicantProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Applicant Profile Validation
        $request->validate([
            'lastname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'firstname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'middlename' => ['nullable', 'regex:/^[A-Za-z\s.]*$/i', 'max:50'],
            'suffix' => 'nullable|string|in:None,Sr.,Jr.,I,II,III,IV,V,VI,VII,VIII,IX,X',
            'gender' => 'required|string|in:Male,Female,Other',
            'birthdate' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->age;
                    if ($age < 16) {
                        $fail('You must be at least 16 years old and above.');
                    }
                }
            ],
        ]);

        // Update Applicant Profile
        $applicant = ApplicantProfile::where('user_id', $user->id)->firstOrFail();
        $applicant->firstname = $request->input('firstname');
        $applicant->middlename = $request->input('middlename');
        $applicant->lastname = $request->input('lastname');
        $applicant->suffix = $request->input('suffix');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->gender = $request->input('gender');
        $applicant->save();

        Session::flash('saveprofile', 'Applicant Profile updated successfully');
        return Redirect::route('profile.edit')->with('status', 'applicant-profile-updated');
    }

    public function updatePersonalInfo(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Personal Info Validation
        $request->validate([
            'civilStatus' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:20'],
            'barangay' => ['required', 'regex:/^[A-Za-z\s.-ñ]+$/i', 'max:50'],
            'presentAddress' => ['required', 'max:100'],
            'religion' => 'required|string',
            'beneficiary-4ps' => 'required|string',
            'zipcode' => 'required|string|digits:4',
            'countryLocation' => 'nullable|regex:/^[A-Za-z\sñ]+$/i|max:50|required_with:ofw-return',
            'ofw-return' => [
                'nullable',
                'required_with:countryLocation',
                'regex:/^\d{4}-\d{2}$/',
                function ($attribute, $value, $fail) {
                    $currentYear = Carbon::now()->year;
                    try {
                        $date = Carbon::createFromFormat('Y-m', $value);
                        $now = Carbon::now();

                        if ($date->year > $currentYear) {
                            $fail('The ' . $attribute . ' must be a valid date not later than the current year.');
                        }

                        if ($date->gt($now->endOfMonth())) {
                            $fail('The ' . $attribute . ' must be a date in or before the current month.');
                        }
                    } catch (\Exception $e) {
                        $fail('The ' . $attribute . ' must be a valid date in the format YYYY-MM.');
                    }
                },
            ],
        ]);

        // Update Personal Info
        $personal = PersonalInfo::where('user_id', $user->id)->firstOrFail();
        $personal->civilStatus = $request->input('civilStatus');
        $personal->barangay = $request->input('barangay');
        $personal->presentAddress = $request->input('presentAddress');
        $personal->tin = $request->input('tin');
        $personal->zipCode = $request->input('zipcode');
        $personal->landlineNo = $request->input('landlineNo');
        $personal->cellphoneNo = $request->input('cellphoneNo');
        $personal->religion = $request->input('religion');
        $personal->beneficiary_4ps = $request->input('beneficiary-4ps');
        $personal->ofw_country = $request->input('countryLocation');
        $personal->ofw_return = $request->input('ofw-return');
        $personal->save();

        Session::flash('saveprofile', 'Personal Information updated successfully');
        return Redirect::route('profile.edit')->with('status', 'personal-info-updated');
    }

    public function updateEmploymentInfo(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Employment Info Validation
        $request->validate([
            'employment-type' => 'required|string',
            'job-search-duration' => ['nullable', 'regex:/^\d{1,3}$/'],
            'duration-category' => ['required', 'in:Days,Weeks,Months,Years'],
        ]);

        // Update Employment Info
        $employment = EmploymentInfo::where('user_id', $user->id)->firstOrFail();
        $employment->employment_type = $request->input('employment-type');
        $employment->job_search_duration = $request->input('job-search-duration');
        $employment->duration_category = $request->input('duration-category');
        $employment->save();

        Session::flash('saveprofile', 'Employment Information updated successfully');
        return Redirect::route('profile.edit')->with('status', 'employment-info-updated');
    }

    public function updateJobPreferences(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Job Preferences Validation
        $request->validate([
            'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
            'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
            'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
        ]);

        // Update Job Preferences
        $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();
        $jobpreference->preferred_occupation = $request->input('preferredOccupation');
        $jobpreference->local_location = $request->input('localLocation');
        $jobpreference->overseas_location = $request->input('overseasLocation');
        $jobpreference->save();

        Session::flash('saveprofile', 'Job Preferences updated successfully');
        return Redirect::route('profile.edit')->with('status', 'job-preferences-updated');
    }
    public function updateLanguageInfo(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Language and Skills Validation
        $request->validate([
            'language-input.*' => ['nullable', 'string', 'max:255'],
            'proficiency-Filipino.*' => ['nullable', 'string', 'in:Read,Write,Speak,Understand'],
            'proficiency-English.*' => ['nullable', 'string', 'in:Read,Write,Speak,Understand'],
            'skills' => 'array',
            'otherSkills' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '', // Conditionally require input for "otherSkills"
            'selectedSkills' => 'nullable|string',
            'otherSkillsInput' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '',
        ], [
            'selected-languages.regex' => 'The language input must contain only letters, spaces, periods, and commas.',
            'otherSkills.required' => 'The other skills field is required when "Other" is selected.',
            'otherSkills.regex' => 'The other skills field must contain letters, spaces, hyphens, commas, and periods.',
            'otherSkills.max' => 'The other skills field may not be greater than 300 characters.',
        ]);


        $user = $request->user();

        // Retrieve language inputs and proficiencies
        $languages = $request->input('language-input', []);
        $languageData = [];

        foreach ($languages as $index => $languageInput) {
            // Ensure the language input is not empty
            if (!empty($languageInput)) {
                $language = ucfirst(strtolower($languageInput)); // Capitalize the language input
                $proficiencies = $request->input("proficiency-$language", []);

                // Add the data to the array if proficiencies are selected or empty
                $languageData[] = [
                    'user_id' => $user->id,
                    'language_input' => $languageInput,
                    'proficiencies' => json_encode($proficiencies),
                ];
            }
        }

        // Delete old records
        $user->languageInputs()->delete();

        // Insert new records
        foreach ($languageData as $data) {
            $user->languageInputs()->updateOrCreate(
                ['language_input' => $data['language_input'], 'user_id' => $data['user_id']],
                ['proficiencies' => $data['proficiencies']]
            );
        }

        // Update or create language inputs
        foreach ($languageData as $data) {
            $user->languageInputs()->updateOrCreate(
                ['language_input' => $data['language_input'], 'user_id' => $data['user_id']],
                ['proficiencies' => $data['proficiencies']]
            );
        }

        // Update Skills Info
        $skill = Skill::where('user_id', $user->id)->firstOrFail();
        $skill->skills = $request->input('selectedSkills');
        $skill->otherSkills = $request->input('otherSkillsInput');
        $skill->save();

        Session::flash('saveprofile', 'Language and Skills Information updated successfully');
        return Redirect::route('profile.edit')->with('status', 'language-info-updated');
    }


    public function updateEducationInfo(Request $request): RedirectResponse
    {
        $user = $request->user();
        $currentYear = Carbon::now()->year;
        $minimumYear = Carbon::now()->subYears(59)->year;


        // Education Info Validation
        $request->validate([
            'educationLevel' => ['required', 'max:100'],
            'school' => ['required_if:educationLevel,Doctoral Degree,Master\'s Degree,College Graduate,Bachelor\'s Degree,Vocational Graduate,Associate\'s Degree,Some College Level,Vocational Undergraduate,Technical-Vocational Education and Training', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],
            'course' => ['required_if:educationLevel,Doctoral Degree,Master\'s Degree,College Graduate,Bachelor\'s Degree,Vocational Graduate,Associate\'s Degree,Some College Level,Vocational Undergraduate,Technical-Vocational Education and Training', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],

            'yearGraduated' => [
                'required_if:educationLevel,Doctoral Degree,Master\'s Degree,College Graduate,Bachelor\'s Degree,Vocational Graduate,Associate\'s Degree,Some College Level,Vocational Undergraduate,Technical-Vocational Education and Training',
                'nullable', // Make sure it's nullable when not required
                'integer',
                'digits:4',
                'min:' . $minimumYear, // Minimum year allowed based on user being at least 59 years old
                'max:' . $currentYear, // Maximum year allowed is the current year
            ],
            'awards' => 'nullable|string|max:300',
        ]);

        // Update Education Info
        $education = EducationalAttainment::where('user_id', $user->id)->firstOrFail();
        $education->educationLevel = $request->input('educationLevel');
        $education->school = $request->input('school');
        $education->course = $request->input('course');
        $education->yearGraduated = $request->input('yearGraduated');
        $education->awards = $request->input('awards');
        $education->save();

        Session::flash('saveprofile', 'Educational Attainment updated successfully');
        return Redirect::route('profile.edit')->with('status', 'education-info-updated');
    }

    public function updatePwdInfo(Request $request): RedirectResponse
    {
        $user = $request->user();

        // PWD Info Validation
        $request->validate([
            'disability' => 'required|string',
            'disabilityDetails' => [
                'required_if:disability,Others,Visual,Psychosocial,Physical,Hearing|String',
                'regex:/^[A-Za-z\s.,-]+$/',
                'max:50'
            ],
            'disabilityOccurrence' => 'required',
            'otherDisabilityDetails' => 'nullable|required_if:disabilityOccurrence,Other|regex:/^[A-Za-z\s.,-]+$/',
        ]);

        // Update PWD Info
        $pwdinfo = PwdInformation::where('user_id', $user->id)->firstOrFail();
        $pwdinfo->disability = $request->input('disability');
        $pwdinfo->disabilityDetails = $request->input('disabilityDetails');
        $pwdinfo->disabilityOccurrence = $request->input('disabilityOccurrence');
        $pwdinfo->otherDisabilityDetails = $request->input('otherDisabilityDetails');
        $pwdinfo->save();

        Session::flash('saveprofile', 'PWD Information updated successfully');
        return Redirect::route('profile.edit')->with('status', 'pwd-info-updated');
    }


    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {

    //     $user = $request->user();
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }
    //     //APPLICANT
    //     $request->validate([
    //         'lastname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
    //         'firstname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
    //         'middlename' => ['nullable', 'regex:/^[A-Za-z\s.]*$/i', 'max:50'],
    //         'suffix' => 'nullable|string|in:None,Sr.,Jr.,I,II,III,IV,V,VI,VII,VIII,IX,X',
    //         'gender' => 'required|string|in:Male,Female,Other',
    //         'birthdate' => [
    //             'required',
    //             'date',
    //             function ($attribute, $value, $fail) {
    //                 $age = Carbon::parse($value)->age;
    //                 if ($age < 16) {
    //                     $fail('You must be at least 16 years old and above.');
    //                 }
    //             }
    //         ],

    //     ], [
    //         'lastname.required' => 'The last name field is required.',
    //         'lastname.regex' => 'The last name may only contain letters and spaces.',
    //         'lastname.max' => 'The last name may not be greater than 50 characters.',
    //         'firstname.required' => 'The first name field is required.',
    //         'firstname.regex' => 'The first name may only contain letters and spaces.',
    //         'firstname.max' => 'The first name may not be greater than 50 characters.',
    //         'middlename.regex' => 'The middle name may only contain letters and spaces.',
    //         'middlename.max' => 'The middle name may not be greater than 50 characters.',
    //         'gender.required' => 'The gender field is required.',
    //         'birthdate.required' => 'The birthdate field is required.',
    //         'birthdate.date' => 'The birthdate must be a valid date.',
    //     ]);


    //     $request->user()->save();
    //     $applicant = ApplicantProfile::where('user_id', $user->id)->firstOrFail();
    //     $applicant->firstname = $request->input('firstname');
    //     $applicant->middlename = $request->input('middlename');
    //     $applicant->lastname = $request->input('lastname');
    //     $applicant->suffix = $request->input('suffix');
    //     $applicant->birthdate = $request->input('birthdate');
    //     $applicant->gender = $request->input('gender');
    //     $applicant->save();

    //     $currentYear = Carbon::now()->year;

    //     //PERSONAL
    //     $request->validate([

    //         'civilStatus' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:20'],
    //         'barangay' => ['required', 'regex:/^[A-Za-z\s.-ñ]+$/i', 'max:50'],
    //         'presentAddress' => ['required', 'max:100'],
    //         /* 'tin' => [
    //              'nullable',
    //              'unique:personal_infos,tin',
    //              'regex:/^\d+$/',
    //              'digits:9',
    //          ],
    //          'landlineNo' => ['nullable', 'regex:/^\d{8}$/', 'unique:personal_infos,landlineNo'],
    //          'cellphoneNo' => ['required', 'regex:/^\d{11}$/', 'unique:personal_infos,cellphoneNo'],*/
    //         'religion' => 'required|string',
    //         'beneficiary-4ps' => 'required|string',
    //         'zipcode' => 'required|string|digits:4',
    //         'countryLocation' => 'nullable|regex:/^[A-Za-z\sñ]+$/i|max:50|required_with:ofw-return',
    //         'ofw-return' => [
    //             'nullable',
    //             'required_with:countryLocation',
    //             'regex:/^\d{4}-\d{2}$/',
    //             'regex:/^\d{4}-(0[1-9]|1[0-2])$/',
    //             function ($attribute, $value, $fail) use ($currentYear) {
    //                 try {
    //                     $date = Carbon::createFromFormat('Y-m', $value);
    //                     $now = Carbon::now();

    //                     // Check if the provided date is later than the current year
    //                     if ($date->year > $currentYear) {
    //                         $fail('The ' . $attribute . ' must be a valid date not later than the current year.');
    //                     }

    //                     // Check if the provided date is in the future month relative to current month
    //                     if ($date->gt($now->endOfMonth())) {
    //                         $fail('The ' . $attribute . ' must be a date in or before the current month.');
    //                     }
    //                 } catch (\Exception $e) {
    //                     $fail('The ' . $attribute . ' must be a valid date in the format YYYY-MM.');
    //                 }
    //             },
    //         ],
    //     ], [
    //         'civilStatus.required' => 'The civil status field is required.',
    //         'civilStatus.regex' => 'The civil status must contain only letters and spaces.',
    //         'civilStatus.max' => 'The civil status may not be greater than 50 characters.',

    //         'barangay.required' => 'The barangay field is required.',
    //         'barangay.regex' => 'The barangay must contain only letters, hypens, periods and spaces.',
    //         'barangay.max' => 'The barangay may not be greater than 50 characters.',

    //         'presentAddress.required' => 'The present address field is required.',
    //         'presentAddress.max' => 'The present address may not be greater than 100 characters.',

    //         'tin.unique' => 'The TIN number has already been taken.',
    //         'tin.regex' => 'The TIN number should be only numerical',
    //         'tin.digits' => 'The TIN number should be only 9 digits',

    //         'zipcode.required' => 'The zip code is required. Choose a barangay.',
    //         'zipcode.digits' => 'The zip code must be 4 digits only',

    //         'landlineNo.regex' => 'The landline number must be 8 digits.',
    //         'landlineNo.unique' => 'The landline number must has already been taken.',

    //         'cellphoneNo.regex' => 'The cellphone number must be 11 digits.',
    //         'cellphoneNo.unique' => 'The cellphone number has already been taken.',
    //         'cellphoneNo.required' => 'The cellphone number is required.',

    //         'religion.required' => 'The religion field is required.',

    //         'beneficiary-4ps.required' => 'The 4Ps beneficiary field is required.',
    //         //  'ofw-status.regex' => 'The OFW status field must contain letters and spaces.',
    //         // 'ofw-status.required_if' => 'The OFW status field is required when both country and return date are provided.',

    //         'countryLocation.max' => 'The country may not be greater than 50 characters',
    //         'countryLocation.regex' => 'The ofw country must contain only letters and spaces.',

    //         'ofw-return.date_format' => 'The return date must be in the format YYYY-MM.',

    //     ]);
    //     $personal = PersonalInfo::where('user_id', $user->id)->firstOrFail();
    //     $personal->civilStatus = $request->input('civilStatus');
    //     $personal->barangay = $request->input('barangay');
    //     $personal->presentAddress = $request->input('presentAddress');
    //     $personal->tin = $request->input('tin');
    //     $personal->zipCode = $request->input('zipcode');
    //     $personal->landlineNo = $request->input('landlineNo');
    //     $personal->cellphoneNo = $request->input('cellphoneNo');
    //     $personal->religion = $request->input('religion');
    //     $personal->beneficiary_4ps = $request->input('beneficiary-4ps');
    //     $personal->ofw_country = $request->input('countryLocation');
    //     $personal->ofw_return = $request->input('ofw-return');
    //     $personal->religion = $request->input('religion');
    //     $personal->save();



    //     //EMPLOYMENT
    //     $request->validate([
    //         'employment-type' => 'required|string',
    //         'job-search-duration' => ['nullable', 'regex:/^\d{1,3}$/'],
    //         'duration-category' => ['required', 'in:Days,Weeks,Months,Years'],
    //     ], [
    //         'employment-type.required' => 'Please specify your employment status.',
    //         'job-search-duration.regex' => 'The duration should be numeric and contain up to 3 digits.',
    //         'duration-category.required' => 'Please select a duration category.',
    //         'duration-category.in' => 'The selected duration category is invalid.',
    //     ]);


    //     $employment = EmploymentInfo::where('user_id', $user->id)->firstOrFail();
    //     $employment->employment_type = $request->input('employment-type');
    //     $employment->job_search_duration = $request->input('job-search-duration');
    //     $employment->duration_category = $request->input('duration-category');
    //     $employment->save();



    //     //JOB PREFERENCES
    //     $request->validate([
    //         'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
    //         'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
    //         'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
    //     ], [
    //         'preferredOccupation.required' => 'The preferred occupation field is required.',
    //         'preferredOccupation.regex' => 'The preferred occupation must contain only letters and spaces.',
    //         'preferredOccupation.max' => 'The preferred occupation may not be greater than 50 characters.',
    //         'localLocation.required' => 'The local location field is required.',
    //         'localLocation.regex' => 'The local location must contain only letters and spaces.',
    //         'localLocation.max' => 'The local location may not be greater than 50 characters.',
    //         'overseasLocation.regex' => 'The overseas location must contain only letters and spaces.',
    //         'overseasLocation.max' => 'The overseas location may not be greater than 50 characters.',
    //     ]);

    //     $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();
    //     $jobpreference->preferred_occupation = $request->input('preferredOccupation');
    //     $jobpreference->local_location = $request->input('localLocation');
    //     $jobpreference->overseas_location = $request->input('overseasLocation');
    //     $jobpreference->save();

    //     //LANGUAGE
    //     $request->validate([
    //         'selected-languages' => ['nullable', 'regex:/^[A-Za-z\s.,-]+$/i', 'max:255'],
    //         // 'skills' => 'array',
    //         // 'otherSkills' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '', // Conditionally require input for "otherSkills"
    //         // 'selectedSkills' => 'nullable|string',
    //         // 'otherSkillsInput' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '',
    //     ], [
    //         'selected-languages.regex' => 'The language input must contain only only letters and spaces.',
    //         'otherSkills.required' => 'The other skills field is required when "Other" is selected.',
    //         'otherSkills.string' => 'The other skills field must contain  letters,   spaces, hypens, commas, and periods.',
    //         'otherSkills.max' => 'The other skills field may not be greater than 300 characters.',

    //     ]);

    //     $language = LanguageInput::where('user_id', $user->id)->firstOrFail();
    //     $language->language_input = $request->input('selected-languages');
    //     $language->save();



    //     // $skill = Skill::where('user_id', $user->id)->firstOrFail();
    //     // $skill->skills = $request->input('selectedSkills');
    //     // $skill->otherSkills = $request->input('otherSkillsInput');
    //     // $skill->save();


    //     //EDUCATION
    //     $currentYear = Carbon::now()->year;
    //     $minimumYear = Carbon::now()->subYears(59)->year;

    //     $request->validate([
    //         'educationLevel' => ['required', 'max:100'],
    //         'school' => ['required', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],
    //         'course' => ['nullable', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],

    //         'yearGraduated' => [
    //             'nullable',
    //             'integer',
    //             'digits:4',
    //             'min:' . $minimumYear, // Minimum year allowed based on user being at least 59 years old
    //             'max:' . $currentYear, // Maximum year allowed is the current year
    //         ],
    //         'awards' => 'nullable|string|max:300',
    //     ], [
    //         'educationLevel.required' => 'The education level field is required.',
    //         'educationLevel.max' => 'The education level may not be greater than 100 characters.',
    //         'school.required' => 'The school field is required.',
    //         'school.max' => 'The school field may not be greater than 100 characters.',
    //         'school.regex' => 'The school field may only contain alphabetical letters.',
    //         'course.max' => 'The course field may not be greater than 100 characters.',
    //         'course.regex' => 'The course field may only contain alphabetical letters.',
    //         'yearGraduated.integer' => 'The year graduated must be a valid year (numeric value).',
    //         'yearGraduated.digits' => 'The year graduated must be 4 digits long.',
    //         'yearGraduated.min' => 'The year graduated must be at least ' . $minimumYear . '.',
    //         'yearGraduated.max' => 'The year graduated must be less than or equal to ' . $currentYear . '.',
    //         'awards.max' => 'The awards may not be greater than 300 characters.',
    //     ]);



    //     $education = EducationalAttainment::where('user_id', $user->id)->firstOrFail();
    //     $education->educationLevel = $request->input('educationLevel');
    //     $education->school = $request->input('school');
    //     $education->course = $request->input('course');
    //     $education->yearGraduated = $request->input('yearGraduated');
    //     $education->awards = $request->input('awards');
    //     $education->save();



    //     //PWD INFO

    //     $request->validate([
    //         'disability' => 'required|string',
    //         'disabilityDetails' => [
    //             'required_if:disability,Others,Visual,Psychosocial,Physical,Hearing|String',
    //             'regex:/^[A-Za-z\s.,-]+$/',
    //             'max:50'
    //         ],
    //         'disabilityOccurrence' => 'required',
    //         'otherDisabilityDetails' => 'nullable|required_if:disabilityOccurrence,Other|regex:/^[A-Za-z\s.,-]+$/',
    //     ], [
    //         'disability.required' => 'The disability status is required.',
    //         'disabilityDetails.regex' => 'The disability details must contain only letters and spaces.',
    //         'otherDisabilityDetails.regex' => 'The disability details must contain only letters and spaces.',
    //         'disabilityDetails.max' => 'The disability details may not be greater than 50 characters.',
    //         'disabilityOccurrence.required' => 'Please select a disability occurrence.',
    //         'otherDisabilityDetails.required_if' => 'Please provide details for "Other" disability occurrence.',
    //         'acceptTerms.required' => 'You must accept the terms and conditions to proceed.',
    //         'acceptTerms.accepted' => 'You must accept the terms and conditions to proceed.',

    //     ]);
    //     $pwdinfo = PwdInformation::where('user_id', $user->id)->firstOrFail();
    //     $pwdinfo->disability = $request->input('disability');
    //     $pwdinfo->disabilityDetails = $request->input('disabilityDetails');
    //     $pwdinfo->disabilityOccurrence = $request->input('disabilityOccurrence');
    //     $pwdinfo->otherDisabilityDetails = $request->input('otherDisabilityDetails');

    //     $pwdinfo->save();

    //     Session::flash('saveprofile', 'Profile changes saved');

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function updatepic(Request $request)
    {
        // Validate the request data
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Retrieve or create PwdInformation for the user
        $pwdinfo = PwdInformation::where('user_id', $user->id)->first();
        if (!$pwdinfo) {
            $pwdinfo = new PwdInformation();
            $pwdinfo->user_id = $user->id;
        }

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($pwdinfo->profilePicture) {
                Storage::delete('public/' . $pwdinfo->profilePicture);
            }

            // Store new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $pwdinfo->profilePicture = $path;
        }

        // Save PwdInformation
        $pwdinfo->save();

        Session::flash('saveprofilepic', 'Profile changes saved');

        return redirect()->back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();


        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auth::logout();

        return Redirect::to('/');
    }

}
