<?php

namespace App\Http\Controllers;

use App\Rules\EmailDomain;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Session;

class EmployerSetupController extends Controller
{
    // Display the form
    public function create()
    {
        $employerData = [
            'businessname' => old('businessname', ''),
            'tinno' => $this->concatenateTinNumbers(),
            'tradename' => old('tradename', ''),
            'locationtype' => old('locationtype', ''),
            'employertype' => old('employertype', ''),
            'totalworkforce' => old('totalworkforce', ''),
            'address' => old('address', ''),
            'city' => old('city', ''),
            'contact_person' => old('contact_person', ''),
            'position' => old('position', ''),
            'telephone_no' => old('telephone_no', ''),
            'mobile_no' => old('mobile_no', ''),
            'hiddenFaxNumber' => old('hiddenFaxNumber', ''),
            'email_address' => old('email_address', ''),
        ];
        return view('employer.setup', compact('employerData'));
    }
    private function concatenateTinNumbers()
    {
        $tinNumbers = [
            old('tin.0', ''),
            old('tin.1', ''),
            old('tin.2', ''),
            old('tin.3', ''),
            old('tin.4', ''),
            old('tin.5', ''),
            old('tin.6', ''),
            old('tin.7', ''),
            old('tin.8', ''),
            old('tin.9', ''),
            old('tin.10', ''),
            old('tin.11', ''),
        ];

        return implode('', $tinNumbers);
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'businessname' => 'required|string|max:300|regex:/^[A-Za-z0-9\s.,-]+$/',
            'tinno' => 'required|regex:/^[0-9-]+$/|unique:employers,tinno',
            'tradename' => 'nullable|max:300',
            'locationtype' => 'required|in:Main,Branch',
            'employertype' => 'required|in:Public,Private',
            'totalworkforce' => 'required|in:1-10,11-50,51-100,101-500,501-1000,1001+',
            'address' => 'required|string|max:300',
            'municipality' => 'required|string|regex:/^[A-Za-z0-9\s.,-]+$/|max:200',
            'zipcode' => 'required|digits:4|regex:/^[0-9]+$/',
            'contact_person' => 'required|string|regex:/^[A-Za-z0-9\s.,-]+$/|max:250',
            'position' => 'required|string|regex:/^[A-Za-z0-9\s.,-]+$/|max:250',
            'telephone_no' => 'nullable|digits:8|regex:/^[0-9-]+$/|unique:employers,telephone_no',
            'mobile_no' => 'required|digits:11|regex:/^[0-9-]+$/|unique:employers,mobile_no',
            'hiddenFaxNumber' => 'nullable|digits:9|regex:/^[0-9]+$/',
            'email_address' => ['required', 'email', 'max:50', new EmailDomain, 'lowercase', 'unique:employers,email_address'],
        ], [
            
            'businessname.regex' => 'Business name may only contain alphabetic characters, numbers, spaces, periods, commas, and hyphens.',
            'businessname.required' => 'Business name is required.',
            'businessname.string' => 'Business name must be a string.',
            'businessname.max' => 'Business name must not exceed 300 characters.',

            'tinno.required' => 'TIN number is required.',
            'tinno.regex' => 'TIN number must contain only numbers and hyphens.',
            'tinno.unique' => 'The TIN number has already been registered.',

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
            'address.max' => 'Address must not exceed 300 characters.',

            'municipality.required' => 'Municipality or City is required.',
            'municipality.string' => 'Municipality or City must be a string.',
            'municipality.regex' => 'Municipality may only contain alphabetic characters, numbers, spaces, periods, commas, and hyphens.',
            'municipality.max' => 'Municipality or City must not exceed 200 characters.',

            'contact_person.required' => 'Contact person is required.',
            'contact_person.string' => 'Contact person must be a string.',
            'contact_person.regex' => 'Contact may only contain alphabetic characters, numbers, spaces, periods, commas, and hyphens.',
            'contact_person.max' => 'Contact person must not exceed 250 characters.',

            'position.required' => 'Position is required.',
            'position.string' => 'Position must be a string.',
            'position.regex' => 'Contact Person may only contain alphabetic characters, numbers, spaces, periods, commas, and hyphens..',
            'position.max' => 'Position must not exceed 250 characters.',

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

        $employer = new Employer();
        $employer->user_id = Auth::id();
        $employer->businessname = $validatedData['businessname'];
        $employer->tinno = $validatedData['tinno'];
        $employer->tradename = $validatedData['tradename'];
        $employer->locationtype = $validatedData['locationtype'];
        $employer->employertype = $validatedData['employertype'];
        $employer->totalworkforce = $validatedData['totalworkforce'];
        $employer->address = $validatedData['address'];
        $employer->municipality = $validatedData['municipality'];
        $employer->zipCode = $validatedData['zipcode'];
        $employer->contact_person = $validatedData['contact_person'];
        $employer->position = $validatedData['position'];
        $employer->telephone_no = $validatedData['telephone_no'];
        $employer->mobile_no = $validatedData['mobile_no'];
        $employer->fax_no = $validatedData['hiddenFaxNumber'];
        $employer->email_address = $validatedData['email_address'];
        $employer->save();


        $user = Auth::user();
        $user->account_verification_status = 'waiting for approval';
        $user->save();

        Session::put('employerData', $validatedData);
        Session::put('employerData', $request->except('_token'));
        return redirect()->route('employer.setup')->with('success', 'Employer profile has been successfully encoded.');
    }
}
