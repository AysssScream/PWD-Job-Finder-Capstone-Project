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
        Session::flash('message', 'Welcome to your User Profile');

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

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $applicant = ApplicantProfile::where('user_id', $user->id)->firstOrFail();
        $applicant->firstname = $request->input('firstname');
        $applicant->middlename = $request->input('middlename');
        $applicant->lastname = $request->input('lastname');
        $applicant->suffix = $request->input('suffix');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->gender = $request->input('gender');
        $applicant->save();

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
        $personal->religion = $request->input('religion');
        $personal->save();


        $employment = EmploymentInfo::where('user_id', $user->id)->firstOrFail();
        $employment->employment_type = $request->input('employment-type');
        $employment->job_search_duration = $request->input('job-search-duration');
        $employment->duration_category = $request->input('duration-category');
        $employment->save();


        $jobpreference = JobPreference::where('user_id', $user->id)->firstOrFail();
        $jobpreference->preferred_occupation = $request->input('preferredOccupation');
        $jobpreference->local_location = $request->input('localLocation');
        $jobpreference->overseas_location = $request->input('overseasLocation');
        $jobpreference->save();


        $language = LanguageInput::where('user_id', $user->id)->firstOrFail();
        $language->language_input = $request->input('selected-languages');
        $language->save();

        $skill = Skill::where('user_id', $user->id)->firstOrFail();
        $skill->skills = $request->input('selectedSkills');
        $skill->otherSkills = $request->input('otherSkillsInput');
        $skill->save();


        $education = EducationalAttainment::where('user_id', $user->id)->firstOrFail();
        $education->educationLevel = $request->input('educationLevel');
        $education->school = $request->input('school');
        $education->course = $request->input('course');
        $education->yearGraduated = $request->input('yearGraduated');
        $education->awards = $request->input('awards');
        $education->save();


        $pwdinfo = PwdInformation::where('user_id', $user->id)->firstOrFail();
        $pwdinfo->disability = $request->input('disability');
        $pwdinfo->disabilityDetails = $request->input('disabilityDetails');
        $pwdinfo->disabilityOccurrence = $request->input('disabilityOccurrence');
        $pwdinfo->otherDisabilityDetails = $request->input('otherDisabilityDetails');

        $pwdinfo->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function updatepic(Request $request)
    {
        $user = $request->user();
        $pwdinfo = PwdInformation::where('user_id', $user->id)->first();
        $pwdinfo->profilePicture = $request->input('profile_picture');

        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            if ($user->pwdInformation->profilePicture) {
                Storage::delete('public/' . $user->pwdInformation->profilePicture);
            }

            // Store new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->pwdInformation->profilePicture = $path;
            $user->pwdInformation->save();
        }

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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }




}
