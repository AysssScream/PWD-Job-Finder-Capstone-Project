<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use Illuminate\Support\Facades\File;
use Session;

class JobInfoController extends Controller
{
    public function index()
    {
        return view('employer.dashboard');
    }

    public function store(Request $request)
    {
        $date_posted = now();
        $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'educationLevel' => 'required|string|max:255',
            'program' => 'nullable|string|max:255', // Changed to simple nullable validation
            'workExperience' => 'required|string',
            'local-location' => 'required|string|max:255',
            'job_type' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'],
            'benefits' => 'nullable|string',
            'hiddenResponsibilitiesInput' => 'nullable|string',
            'hiddenQualificationsInput' => 'nullable|string',
            'hiddenTrainingQualificationsInput' => 'nullable|string',
            'vacancy' => 'required|integer',
            'min_age' => 'required|integer',
            'max_age' => 'required|integer|gte:min_age',
            'fromDate' => 'required|date|date_format:Y-m-d|before:toDate',
            'toDate' => 'required|date|date_format:Y-m-d|after:fromDate',
        ]);

        $employer_id = auth()->user()->id;

        $jobInfo = new JobInfo();
        $jobInfo->employer_id = $employer_id;
        $jobInfo->title = $request->input('job_title');
        $jobInfo->description = $request->input('description');
        $jobInfo->educational_level = $request->input('educationLevel');
        $jobInfo->program = $request->input('program');
        $jobInfo->work_experience = $request->input('workExperience');
        $jobInfo->location = $request->input('local-location');
        $jobInfo->job_type = $request->input('job_type');
        $jobInfo->salary = $request->input('salary');
        $jobInfo->benefits = $request->input('benefits');
        $jobInfo->responsibilities = $request->input('hiddenResponsibilitiesInput');
        $jobInfo->qualifications = $request->input('hiddenQualificationsInput');
        $jobInfo->training_qualifications = $request->input('hiddenTrainingQualificationsInput');
        $jobInfo->vacancy = $request->input('vacancy');
        $jobInfo->min_age = $request->input('min_age');
        $jobInfo->max_age = $request->input('max_age');
        $jobInfo->from_date = $request->input('fromDate');
        $jobInfo->to_date = $request->input('toDate');
        $jobInfo->date_posted = $date_posted;

        $employer = Employer::where('user_id', $employer_id)->first();
        if ($employer) {
            $jobInfo->company_name = $employer->businessname;
            $jobInfo->company_logo = $employer->company_logo;
        } else {
            $jobInfo->company_name = 'Unknown';
        }

        $skillsContent =
            preg_replace('/•\s*/', '', $jobInfo->description) . "\n" .
            preg_replace('/•\s*/', '', $jobInfo->qualifications) . "\n" .
            preg_replace('/•\s*/', '', $jobInfo->responsibilities);

        $filePath = public_path("userskills/listofskills.txt");

        if (File::exists($filePath)) {
            $currentContent = File::get($filePath);
        } else {
            File::makeDirectory(public_path('userskills'), 0755, true, true);
            $currentContent = '';
        }

        $jobInfo->save();

        if (!str_contains($currentContent, trim($skillsContent))) {
            File::append($filePath, "\n" . trim($skillsContent));
        }

        Session::flash('addjobs', 'You have successfully added a job.');
        return redirect()->route('employer.add')->with('success', 'Job information created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'educationLevel' => 'required|string|max:255',
            'program' => 'nullable|string|max:255', // Changed to simple nullable validation
            'workExperience' => 'required|string',
            'local-location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'salary' => ['required', 'string', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'],
            'benefits' => 'nullable|string',
            'hiddenResponsibilitiesInput' => 'nullable|string',
            'hiddenQualificationsInput' => 'nullable|string',
            'hiddenTrainingQualificationsInput' => 'nullable|string',
            'fromDate' => 'required|date|date_format:Y-m-d|before:toDate',
            'toDate' => 'required|date|date_format:Y-m-d|after:fromDate',
            'vacancy' => 'required|integer',
            'min_age' => 'required|integer',
            'max_age' => 'required|integer|gte:min_age',
        ]);

        $jobInfo = JobInfo::findOrFail($id);
        $jobInfo->title = $request->input('job_title');
        $jobInfo->description = $request->input('description');
        $jobInfo->educational_level = $request->input('educationLevel');
        $jobInfo->program = $request->input('program');
        $jobInfo->work_experience = $request->input('workExperience');
        $jobInfo->location = $request->input('local-location');
        $jobInfo->job_type = $request->input('job_type');
        $jobInfo->salary = $request->input('salary');
        $jobInfo->benefits = $request->input('benefits');
        $jobInfo->responsibilities = $request->input('hiddenResponsibilitiesInput');
        $jobInfo->qualifications = $request->input('hiddenQualificationsInput');
        $jobInfo->training_qualifications = $request->input('hiddenTrainingQualificationsInput');
        $jobInfo->vacancy = $request->input('vacancy');
        $jobInfo->from_date = $request->input('fromDate');
        $jobInfo->to_date = $request->input('toDate');
        $jobInfo->min_age = $request->input('min_age');
        $jobInfo->max_age = $request->input('max_age');
        $jobInfo->save();

        $skillsContent =
            preg_replace('/•\s*/', '', $jobInfo->description) . "\n" .
            preg_replace('/•\s*/', '', $jobInfo->qualifications) . "\n" .
            preg_replace('/•\s*/', '', $jobInfo->responsibilities);

        // Define the file path in the public directory
        $filePath = public_path("userskills/listofskills.txt");

        // Check if the file exists, and read its contents
        if (File::exists($filePath)) {
            $currentContent = File::get($filePath);
        } else {
            // Create the directory if it doesn't exist
            File::makeDirectory(public_path('userskills'), 0755, true, true);
            $currentContent = '';
        }

        // Append new content if it doesn't already exist in the file
        if (!str_contains($currentContent, trim($skillsContent))) {
            File::append($filePath, "\n" . trim($skillsContent));
        }

        Session::flash('editjobs', 'You have successfully edited a job.');
        return redirect()->route('employer.manage')->with('success', 'Job information updated successfully.');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'businessname' => 'required|string|max:100',
            'hiddenFaxNumber' => 'nullable|digits:10|regex:/^[0-9]+$/',
            'tradename' => 'nullable|max:200',
            'locationtype' => 'nullable|in:Main,Branch',
            'employertype' => 'nullable|in:Government,Private',
            'totalworkforce' => 'required|in:1-10,11-50,51-100,101-500,501-1000,1001+',
            'address' => 'required|string',
            'zipcode' => 'required|digits:4|regex:/^[0-9]+$/',
            'contact_person' => 'required|string|regex:/^[A-Za-z\s.,-]+$/|max:300',
            'position' => 'required|string|regex:/^[A-Za-z\s.,-]+$/|max:300',
            'website_link' => [
                'required',
                'regex:/^https:\/\//'
            ],
            'municipality' => 'required|string',
        ], [
            'businessname.regex' => 'Business name must contain only alphabetic characters.',
            'businessname.required' => 'Business name is required.',
            'businessname.string' => 'Business name must be a string.',
            'businessname.max' => 'Business name must not exceed 100 characters.',

            'hiddenFaxNumber.digits' => 'The fax number must be exactly :digits digits.',
            'hiddenFaxNumber.regex' => 'The fax number may only contain digits.',

            'tradename.regex' => 'Trade name must contain only alphabetic characters.',
            'tradename.max' => 'Trade name must not exceed 50 characters.',
            'zipcode.required' => 'The zipcode is required.',

            'zipcode.digits' => 'The zipcode must be exactly :digits digits.',
            'zipcode.regex' => 'The zipcode may only contain digits.',

            'locationtype.required' => 'Location type is required.',
            'locationtype.in' => 'Location type must be either Main or Branch.',

            'employertype.required' => 'Employer type is required.',
            'employertype.in' => 'Employer type must be either Public or Private.',

            'totalworkforce.required' => 'Total workforce is required.',
            'totalworkforce.in' => 'Total workforce must be one of the specified ranges.',

            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.max' => 'Address must not exceed 100 characters.',

            'municipality.required' => 'Municipality is required.',
            'municipality.string' => 'Municipality must be a string.',
            'municipality.regex' => 'Municipality must contain only alphabetic characters.',
            'municipality.max' => 'Municipality must not exceed 50 characters.',

            'contact_person.required' => 'Contact person is required.',
            'contact_person.string' => 'Contact person must be a string.',
            'contact_person.regex' => 'Contact person must contain only alphabetic characters.',
            'contact_person.max' => 'Contact person must not exceed 50 characters.',

            'position.required' => 'Position is required.',
            'position.string' => 'Position must be a string.',
            'position.regex' => 'Position must contain only alphabetic characters.',
            'position.max' => 'Position must not exceed 50 characters.',

            'website_link.regex' => 'The website link must start with https.',
        ]);

        $profile = Employer::where('user_id', Auth::id())->firstOrFail();

        $profile->company_description = $request->input('companydescription');
        $profile->tradename = $request->input('tradename');
        $profile->locationtype = $request->input('locationtype');
        $profile->employertype = $request->input('employertype');
        $profile->totalworkforce = $request->input('totalworkforce');
        $profile->contact_person = $request->input('contact_person');
        $profile->position = $request->input('position');
        $profile->telephone_no = $request->input('telephone_no');
        $profile->mobile_no = $request->input('mobile_no');
        $profile->municipality = $request->input('municipality');
        $profile->zipCode = $request->input('zipcode');
        $profile->fax_no = $request->input('hiddenFaxNumber');
        $profile->website_link = $request->input('website_link');
        $profile->save();

        Session::flash('profilesave', 'You have successfully edited your company profile.');
        return redirect()->route('employer.profile')->with('success', 'Employer profile has been successfully updated.');
    }

    public function destroy($id)
    {
        $job = JobInfo::findOrFail($id);
        $job->delete();

        Session::flash('deletejob', 'Job has been deleted successfully.');
        return redirect()->route('employer.manage')->with('success', 'Job deleted successfully.');
    }

    public function show($id)
    {
        $job = JobInfo::findOrFail($id);
        return view('employer.show', compact('job'));
    }
}
