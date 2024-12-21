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
use App\Models\User;

use App\Models\WorkExperience;
use Carbon\Carbon;
use App\Models\AdminProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; // Add this line at the top of your controller
use Session;

class ProfileController extends Controller
{
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
                    if ($age < 18) {
                        $fail('You must be at least 18 years old and above.');
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

        $request->validate([
            'employment-type' => 'required|string',
            'job-search-duration' => ['nullable', 'regex:/^\d{1,3}$/'],
            'duration-category' => ['required', 'in:Days,Weeks,Months,Years'],
        ]);

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

        $request->validate([
            'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
            'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
            'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
        ]);

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

        $request->validate([
            'language-input.*' => ['nullable', 'string', 'max:255'],
            'proficiency-Filipino.*' => ['nullable', 'string', 'in:Excellent,Good,Fair,Poor'],
            'proficiency-English.*' => ['nullable', 'string', 'in:Excellent,Good,Fair,Poor'],
            'proficiencyRead-Filipino.*' => ['nullable', 'string', 'in:Excellent,Good,Fair,Poor'],
            'proficiencyRead-English.*' => ['nullable', 'string', 'in:Excellent,Good,Fair,Poor'],
            'skills' => 'array',
            'otherSkills' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '',
            'selectedSkills' => 'nullable|string',
            'otherSkillsInput' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : '',
        ], [
            'otherSkills.required' => 'The other skills field is required when "Other" is selected.',
            'otherSkills.regex' => 'The other skills field must contain letters, spaces, hyphens, commas, and periods.',
            'otherSkills.max' => 'The other skills field may not be greater than 300 characters.',
        ]);

        $languages = $request->input('language-input', []);
        $languageData = [];

        foreach ($languages as $index => $languageInput) {
            if (!empty($languageInput)) {
                $language = ucfirst(strtolower($languageInput)); // Capitalize the language input

                $proficienciesSpeak = $request->input("proficiency-$language", []);
                $proficienciesRead = $request->input("proficiencyRead-$language", []);

                // Add the data to the array if proficiencies are selected or empty
                $languageData[] = [
                    'user_id' => $user->id,
                    'language_input' => $language,
                    'proficiencies_speak' => json_encode($proficienciesSpeak),
                    'proficiencies_read' => json_encode($proficienciesRead),
                ];
            }
        }

        // Clear previous language inputs
        $user->languageInputs()->delete();

        // Insert new language input data
        foreach ($languageData as $data) {
            $user->languageInputs()->create($data);
        }

        // Handle skills and other skills
        $skill = Skill::firstOrNew(['user_id' => $user->id]);
        $skill->skills = json_encode($request->input('selectedSkills')); // Encode selected skills to JSON
        $skill->otherSkills = $request->input('otherSkillsInput'); // Set other skills
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
            'school' => ['required', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],
            'course' => [
                'required_if:educationLevel,Doctoral Degree (Ph.D. or equivalent),Professional Degree,Master\'s Degree,Bachelor\'s Degree,College Graduate,Associate\'s Degree,Some College Level',
                'regex:/^[a-zA-Z ,.\-\/]+$/'
            ],

            'yearGraduated' => [
                'required_if:educationLevel,Doctoral Degree (Ph.D. or equivalent),Professional Degree,Master\'s Degree,Bachelor\'s Degree,College Graduate,Associate\'s Degree',
                'nullable',
                'integer',
                'digits:4',
                'min:' . $minimumYear,
                'max:' . $currentYear,
            ],
            'awards' => 'nullable|string',

            'appendedCertifications' => [
                'required_if:educationLevel,Vocational Graduate,Vocational Undergraduate',
                'nullable',
                'string',
                // 'regex:/^[a-zA-Z0-9 ,.\-\/()]+$/', Updated regex to include numbers
            ],
        ]);

        // Update Education Info
        $education = EducationalAttainment::where('user_id', $user->id)->firstOrFail();
        $education->educationLevel = $request->input('educationLevel');
        $education->school = $request->input('school');
        $education->course = $request->input('course');
        $education->yearGraduated = $request->input('yearGraduated');
        $education->awards = $request->input('awards');
        $education->certifications = $request->input('appendedCertifications');
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




    public function updateadmin(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|string|max:10',
            'address' => 'nullable|string|max:255',
            'firstname' => 'required|string|max:50',
            'middlename' => 'nullable|string|max:50',
            'lastname' => 'required|string|max:50',
        ]);

        // Get the currently authenticated user's ID
        $userId = auth()->user()->id;

        // Initialize the profile data array
        $profileData = [
            'gender' => $request->input('gender'), // Get gender from request
            'address' => $request->input('address'), // Get address from request
        ];

        // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');

            $profileData['profile_picture'] = $filePath; // Add the file path to the profile data
        }

        // Update or create the admin profile
        AdminProfile::updateOrCreate(
            ['admin_id' => $userId],
            $profileData // Use the profile data array
        );

        $fullName = $request->input('firstname') .
            ($request->input('middlename') ? ' ' . $request->input('middlename') : '') .
            ' ' . $request->input('lastname');

        // Update the user information
        User::where('id', $userId)->update([
            'name' => $fullName,
            'firstname' => $request->input('firstname'), // Get firstname from request
            'middlename' => $request->input('middlename'), // Get middlename from request
            'lastname' => $request->input('lastname'), // Get lastname from request
        ]);

        // Flash success message
        session()->flash('profilesuccess', 'Admin profile updated successfully.');

        // Redirect back with success message
        return back()->with('profilesuccess', 'Profile updated successfully.');
    }



    public function updatepic(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $user = $request->user();

        $pwdinfo = PwdInformation::where('user_id', $user->id)->first();
        if (!$pwdinfo) {
            $pwdinfo = new PwdInformation();
            $pwdinfo->user_id = $user->id;
        }

        if ($request->hasFile('profile_picture')) {
            if ($pwdinfo->profilePicture) {
                Storage::delete('public/' . $pwdinfo->profilePicture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $pwdinfo->profilePicture = $path;
        }

        // Save PwdInformation
        $pwdinfo->save();

        Session::flash('saveprofilepic', 'Profile changes saved');

        return redirect()->back()->with('status', 'profile-updated');
    }


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
