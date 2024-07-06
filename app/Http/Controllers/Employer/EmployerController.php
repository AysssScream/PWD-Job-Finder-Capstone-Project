<?php

namespace App\Http\Controllers\Employer;

use App\Models\EducationalAttainment;
use App\Models\Employer;
use App\Models\EmploymentInfo;
use App\Models\JobApplication;
use App\Models\LanguageInput;
use App\Models\PersonalInfo;
use App\Models\PwdInformation;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobInfo;
use App\Models\ApplicantProfile;
use Session; // Import the Session facade

class EmployerController extends Controller
{
    public function setup()
    {
        return view('employer.setup');
    }

    public function dashboard()
    {
        Session::flash('message', 'Welcome to your Dashboard');

        $employerId = Auth::id();

        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc') // Order by created_at descending
            ->get();

        $profile = Employer::where('user_id', $employerId)->first();
        $applicant = JobApplication::where('employer_id', $employerId)->get();

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }

        return view('employer.dashboard', compact('profile', 'jobs', 'applicant'));
    }

    public function editprofile()
    {

        Session::flash('message', 'Welcome to your profile');

        $employerId = Auth::id();

        $profile = Employer::where('user_id', $employerId)->first();

        if (!$profile) {
            return redirect()->route('employer.setup')->with('error', 'Employer profile not found.');
        }
        return view('employer.profile', compact('profile'));

    }

    public function addjobs()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)->get();
        return view('employer.jobsinfo', compact('jobs'));
    }

    public function editjobs($id)
    {
        $job = JobInfo::findOrFail($id);
        return view('employer.jobsedit', compact('job'));
    }

    public function manage()
    {
        $employerId = Auth::id();
        $jobs = JobInfo::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('employer.manage', compact('jobs'));

    }

    public function review()
    {
        $employerId = Auth::id();
        $applications = JobApplication::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('employer.reviewapplicant', compact('applications'));


    }


    public function applicantinformation($id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();
        $jobapplication = JobApplication::where('user_id', $id)->first();

        // Pass data to the view
        return view('employer.reviewapplicantinfo', [
            'applicant' => $applicant,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
            'pwdinfo' => $pwdinfo,
            'jobapplication' => $jobapplication,
        ]);
    }

    public function pwdinformation($id)
    {
        $applicant = ApplicantProfile::where('user_id', $id)->firstOrFail();
        $personal = PersonalInfo::where('user_id', $id)->firstOrFail();
        $employment = EmploymentInfo::where('user_id', $id)->firstOrFail();
        $workExperiences = WorkExperience::where('user_id', $applicant->user_id)->get();
        $education = EducationalAttainment::where('user_id', $id)->first();
        $skill = Skill::where('user_id', $id)->first();
        $language = LanguageInput::where('user_id', $id)->first();
        $pwdinfo = PwdInformation::where('user_id', $id)->first();

        return view('employer.reviewapplicantpwdinfo', [
            'applicant' => $applicant,
            'pwdinfo' => $pwdinfo,
            'personal' => $personal,
            'employment' => $employment,
            'workExperiences' => $workExperiences,
            'education' => $education,
            'skill' => $skill,
            'language' => $language,
        ]);
    }


    public function hire(Request $request, $id)
    {
        $applicant = JobApplication::where('user_id', $id)->firstOrFail();
        \Log::info('Textarea value:', ['value' => $request->input('remarkstextarea')]);

        $remarks = $request->input('remarkstextarea');
        $status = 'hired';

        $applicant->remarks = $remarks;
        $applicant->status = $status;
        $applicant->save();

        return redirect()->route('employer.review')->with('success', 'Applicant hired successfully!');
    }
}
