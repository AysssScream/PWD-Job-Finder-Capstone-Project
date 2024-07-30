<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Rules\EmailDomain;
use Session;

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
        Session::flash('addjobs', 'You have successfully added a job.');

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
        ], [
            'job_title.required' => 'The job title field is required.',
            'job_title.string' => 'The job title must be a string.',
            'job_title.max' => 'The job title may not be greater than 255 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'educationLevel.string' => 'The education level must be a string.',
            'educationLevel.max' => 'The education level may not be greater than 255 characters.',
            'local-location.required' => 'The local location field is required.',
            'local-location.string' => 'The local location must be a string.',
            'local-location.max' => 'The local location may not be greater than 255 characters.',
            'job_type.required' => 'The job type field is required.',
            'job_type.string' => 'The job type must be a string.',
            'job_type.max' => 'The job type may not be greater than 255 characters.',
            'salary.required' => 'The salary field is required.',
            'salary.string' => 'The salary must be a string.',
            'salary.max' => 'The salary may not be greater than 255 characters.',
            'salary.regex' => 'The salary must be a valid numeric value with up to 2 decimal places.',
            'benefits.string' => 'The benefits must be a string.',
            'hiddenInput.string' => 'The hidden input must be a string.',
            'hiddenQualificationsInput.string' => 'The hidden qualifications input must be a string.',
            'vacancy.required' => 'The vacancy field is required.',
            'vacancy.integer' => 'The vacancy must be an integer.',
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


        Session::flash('editjobs', 'You have successfully edited a job.');

        return redirect()->route('employer.manage')->with('success', 'Job information updated successfully.');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'businessname' => 'required|string|max:100',
            /*'tinno' => 'required|regex:/^[0-9-]+$/|unique:employers,tinno',*/
            'hiddenFaxNumber' => 'nullable|digits:9|regex:/^[0-9]+$/',
            'tradename' => 'nullable|regex:/^[A-Za-z\s.,-]+$/|max:50',
            'locationtype' => 'required|in:Main,Branch',
            'employertype' => 'required|in:Public,Private',
            'totalworkforce' => 'required|in:1-10,11-50,51-100,101-500,501-1000,1001+',
            'address' => 'required|string|max:100',
            'city' => 'required|string|regex:/^[A-Za-z\s.,-]+$/|max:50',
            'zipcode' => 'required|digits:4|regex:/^[0-9]+$/',
            'contact_person' => 'required|string|regex:/^[A-Za-z\s.,-]+$/|max:50',
            'position' => 'required|string|regex:/^[A-Za-z\s.,-]+$/|max:50',
            /*'telephone_no' => 'nullable|digits:8|regex:/^[0-9-]+$/|unique:employers,telephone_no',
            'mobile_no' => 'required|digits:11|regex:/^[0-9-]+$/|unique:employers,mobile_no',*/
            /*'email_address' => ['required', 'email', 'max:50', new EmailDomain, 'lowercase', 'unique:employers,email_address'],*/
        ], [
            'businessname.regex' => 'Business name must contain only alphabetic characters.',
            'businessname.required' => 'Business name is required.',
            'businessname.string' => 'Business name must be a string.',
            'businessname.max' => 'Business name must not exceed 100 characters.',

            /* 'tinno.required' => 'TIN number is required.',
             'tinno.regex' => 'TIN number must contain only numbers and hyphens.',
             'tinno.unique' => 'The TIN number has already been registered.',*/

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

            'city.required' => 'City is required.',
            'city.string' => 'City must be a string.',
            'city.regex' => 'City must contain only alphabetic characters.',
            'city.max' => 'City must not exceed 50 characters.',

            'contact_person.required' => 'Contact person is required.',
            'contact_person.string' => 'Contact person must be a string.',
            'contact_person.regex' => 'Contact person must contain only alphabetic characters.',
            'contact_person.max' => 'Contact person must not exceed 50 characters.',

            'position.required' => 'Position is required.',
            'position.string' => 'Position must be a string.',
            'position.regex' => 'Position must contain only alphabetic characters.',
            'position.max' => 'Position must not exceed 50 characters.',

            'telephone_no.required' => 'The telephone number is required.',
            'telephone_no.digits' => 'The telephone number must be exactly :digits digits.',
            'telephone_no.regex' => 'The telephone number may only contain digits and dashes.',
            'telephone_no.unique' => 'The telephone number has already been taken.',

            'mobile_no.required' => 'The mobile number is required.',
            'mobile_no.digits' => 'The mobile number must be exactly :digits digits.',
            'mobile_no.regex' => 'The mobile number may only contain digits and dashes.',
            'mobile_no.unique' => 'The mobile number has already been taken.',

            'email_address.required' => 'Email address is required.',
            'email_address.email' => 'Email address must be a valid email address.',
            'email_address.max' => 'Email address must not exceed 50 characters.',
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
