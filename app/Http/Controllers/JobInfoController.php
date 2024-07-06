<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;

class JobInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$jobInfos = JobInfo::all();
        return view('employer.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_posted = now(); // Assuming you want to use the current date/time

        $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'educationLevel' => 'nullable|string|max:255',
            'local-location' => 'required|string|max:255',
            'job_type' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'], // Example regex for salary (numeric with optional decimal up to two places)
            'benefits' => 'nullable|string',
            'hiddenInput' => 'nullable|string',
            'hiddenQualificationsInput' => 'nullable|string',
            'vacancy' => 'required|integer',

        ]);
        $employer_id = auth()->user()->id; // Adjust this based on how you retrieve the authenticated user's ID

        // Create a new JobInfo instance
        $jobInfo = new JobInfo();
        $jobInfo->employer_id = $employer_id;
        $jobInfo->title = $request->input('job_title');
        $jobInfo->description = $request->input('description');
        $jobInfo->educational_level = $request->input('educationLevel');
        $jobInfo->location = $request->input('local-location');
        $jobInfo->job_type = $request->input('job_type');
        $jobInfo->salary = $request->input('salary');
        $jobInfo->benefits = $request->input('benefits');
        $jobInfo->responsibilities = $request->input('hiddenInput');
        $jobInfo->qualifications = $request->input('hiddenQualificationsInput');
        $jobInfo->vacancy = $request->input('vacancy');
        $jobInfo->date_posted = $date_posted;


        $employer = Employer::where('user_id', $employer_id)->first();
        if ($employer) {
            $jobInfo->company_name = $employer->businessname;
            $jobInfo->company_logo = $employer->company_logo;
        } else {
            $jobInfo->company_name = 'Unknown'; // Or set to some default value
        }

        $jobInfo->save();
        return redirect()->route('employer.add')->with('success', 'Job information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'educationLevel' => 'nullable|string|max:255',
            'local-location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'salary' => ['required', 'string', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'],
            'benefits' => 'nullable|string',
            'hiddenInput' => 'nullable|string',
            'hiddenQualificationsInput' => 'nullable|string',
            'vacancy' => 'required|integer',
        ]);

        // Find the job by ID
        $jobInfo = JobInfo::findOrFail($id);

        // Update job details
        $jobInfo->title = $request->input('job_title');
        $jobInfo->description = $request->input('description');
        $jobInfo->educational_level = $request->input('educationLevel');
        $jobInfo->location = $request->input('local-location');
        $jobInfo->job_type = $request->input('job_type');
        $jobInfo->salary = $request->input('salary');
        $jobInfo->benefits = $request->input('benefits');
        $jobInfo->responsibilities = $request->input('hiddenInput');
        $jobInfo->qualifications = $request->input('hiddenQualificationsInput');
        $jobInfo->vacancy = $request->input('vacancy');

        // Save the updated job information
        $jobInfo->save();

        return redirect()->route('employer.manage')->with('success', 'Job information updated successfully.');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'businessname' => 'required|string|max:255',
            'tinno' => 'required|string|max:255',
            'tradename' => 'required|string|max:255',
            'locationtype' => 'required|string|max:255',
            'employertype' => 'required|string|max:255',
            'totalworkforce' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'telephone_no' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'hiddenFaxNumber' => 'nullable|string|max:255',
            'email_address' => 'required|string|email|max:255',
        ]);


        $profile = Employer::where('user_id', Auth::id())->firstOrFail();

        // Update profile attributes
        $profile->company_description = $request->input('companydescription');
        $profile->businessname = $request->input('businessname');
        $profile->tinno = $request->input('tinno');
        $profile->tradename = $request->input('tradename');
        $profile->locationtype = $request->input('locationtype');
        $profile->employertype = $request->input('employertype');
        $profile->totalworkforce = $request->input('totalworkforce');
        $profile->address = $request->input('address');
        $profile->city = $request->input('city');
        $profile->zipcode = $request->input('zipcode');
        $profile->contact_person = $request->input('contact_person');
        $profile->position = $request->input('position');
        $profile->telephone_no = $request->input('telephone_no');
        $profile->mobile_no = $request->input('mobile_no');
        $profile->fax_no = $request->input('hiddenFaxNumber');
        $profile->email_address = $request->input('email_address');
        $profile->save();

        return redirect()->route('employer.profile')->with('success', 'Employer profile has been successfully updated.');
    }







    public function destroy(string $id)
    {
        //
    }
}
