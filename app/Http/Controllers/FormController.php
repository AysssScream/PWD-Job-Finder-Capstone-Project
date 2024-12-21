<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\EducationalAttainment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\PwdInformation;
use App\Models\ApplicantProfile;
use App\Models\PersonalInfo;
use App\Models\EmploymentInfo;
use App\Models\JobPreference;
use App\Models\LanguageInput;
use App\Models\WorkExperience;
use App\Models\Skill;
use Illuminate\Validation\ValidationException;
use App\Helpers\ProfileHelper;
use Carbon\Carbon;

use App\Rules\LanguageProficiencies;

use Illuminate\Support\Facades\Auth;


class FormController extends Controller
{
    public function start()
    {
        $startData = Session::get('startData', []);
        return view('pendingapproval', compact('startData'));
    }

    public function step1()
    {
        $formData = Session::get('formData', []);
        return view('setup', compact('formData'));

    }

    public function step2()
    {
        $formData2 = Session::get('formData2', []);
        return view('personal', compact('formData2'));
    }

    public function step3()
    {
        $formData3 = Session::get('formData3', []);
        return view('workexp', compact('formData3'));
    }

    public function step4()
    {
        $formData4 = Session::get('formData4', []);
        return view('jobpreferences', compact('formData4'));
    }
    public function step5()
    {
        $formData5 = Session::get('formData5', []);
        return view('dialect', compact('formData5'));
    }

    public function step6()
    {
        $formData6 = Session::get('formData6', []);
        return view('educationalbg', compact('formData6'));
    }
    public function step7()
    {
        $formData7 = Session::get('formData7', []);
        return view('pwdinfo', compact('formData7'));

    }

    public function startdata(Request $request)
    {
        Session::put('startData', $request->except('_token'));
        Session::put('start_completed', true);
        return redirect()->route('setup');

    }
    public function postStep1(Request $request)
    {
        $validatedData = $request->validate([
            'lastname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'firstname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'middlename' => ['nullable', 'regex:/^[A-Za-z\s.]*$/i', 'max:50'],
            'suffix' => 'nullable|string|in:None,Sr.,Jr.,I,II,III,IV,V,VI,VII,VIII,IX,X',
            'gender' => 'required|string|in:Male,Female,Prefer not to say',
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

        ], [
            'lastname.required' => 'The last name field is required.',
            'lastname.regex' => 'The last name may only contain letters and spaces.',
            'lastname.max' => 'The last name may not be greater than 50 characters.',
            'firstname.required' => 'The first name field is required.',
            'firstname.regex' => 'The first name may only contain letters and spaces.',
            'firstname.max' => 'The first name may not be greater than 50 characters.',
            'middlename.regex' => 'The middle name may only contain letters and spaces.',
            'middlename.max' => 'The middle name may not be greater than 50 characters.',
            'gender.required' => 'The gender field is required.',
            'birthdate.required' => 'The birthdate field is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
        ]);



        $ApplicantProfile = new ApplicantProfile();
        $ApplicantProfile->lastname = $validatedData['lastname'];
        $ApplicantProfile->firstname = $validatedData['firstname'];
        $ApplicantProfile->middlename = $validatedData['middlename'] ?? null;
        $ApplicantProfile->suffix = $validatedData['suffix'] ?? null;
        $ApplicantProfile->gender = $validatedData['gender'];
        $ApplicantProfile->birthdate = $validatedData['birthdate'];

        $ApplicantProfile->user_id = Auth::id();

        Session::put('formData', $request->except('_token', 'fileUpload', 'profilePicture'));
        Session::put('step1_completed', true);
        return redirect()->route('personal');

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
        ];

        return implode('', $tinNumbers);
    }

    public function create()
    {
        $formData2 = [
            'tin' => $this->concatenateTinNumbers(),
        ];
        return view('personal', compact('formData2'));
    }

    public function postStep2(Request $request)
    {
        $currentYear = Carbon::now()->year;

        $validatedData2 = $request->validate([
            'civilStatus' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:20'],
            'barangay' => ['required', 'regex:/^[A-Za-z\s.-ñ]+$/i', 'max:50'],
            'presentAddress' => ['required', 'max:100'],
            'tin' => [
                'nullable',
                'unique:personal_infos,tin',
                'regex:/^\d+$/',
                'digits:9',
            ],
            'landlineNo' => ['nullable', 'regex:/^\d{8}$/', 'unique:personal_infos,landlineNo'],
            'cellphoneNo' => ['required', 'regex:/^\d{11}$/', 'unique:personal_infos,cellphoneNo'],
            'religion' => 'required|string',
            'beneficiary-4ps' => 'required|string',
            'zipcode' => 'required|string|digits:4',
            'countryLocation' => 'nullable|regex:/^[A-Za-z\sñ]+$/i|max:50|required_with:ofw-return',
            'ofw-return' => [
                'nullable',
                'required_with:countryLocation',
                'regex:/^\d{4}-\d{2}$/',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/',
                function ($attribute, $value, $fail) use ($currentYear) {
                    try {
                        $date = Carbon::createFromFormat('Y-m', $value);
                        $now = Carbon::now();

                        // Check if the provided date is later than the current year
                        if ($date->year > $currentYear) {
                            $fail('The ' . $attribute . ' must be a valid date not later than the current year.');
                        }

                        // Check if the provided date is in the future month relative to current month
                        if ($date->gt($now->endOfMonth())) {
                            $fail('The ' . $attribute . ' must be a date in or before the current month.');
                        }
                    } catch (\Exception $e) {
                        $fail('The ' . $attribute . ' must be a valid date in the format YYYY-MM.');
                    }
                },
            ],
        ], [
            'civilStatus.required' => 'The civil status field is required.',
            'civilStatus.regex' => 'The civil status must contain only letters and spaces.',
            'civilStatus.max' => 'The civil status may not be greater than 50 characters.',

            'barangay.required' => 'The barangay field is required.',
            'barangay.regex' => 'The barangay must contain only letters, hypens, periods and spaces.',
            'barangay.max' => 'The barangay may not be greater than 50 characters.',

            'presentAddress.required' => 'The present address field is required.',
            'presentAddress.max' => 'The present address may not be greater than 100 characters.',

            'tin.unique' => 'The TIN number has already been taken.',
            'tin.regex' => 'The TIN number should be only numerical',
            'tin.digits' => 'The TIN number should be only 9 digits',

            'zipcode.required' => 'The zip code is required. Choose a barangay.',
            'zipcode.digits' => 'The zip code must be 4 digits only',

            'landlineNo.regex' => 'The landline number must be 8 digits.',
            'landlineNo.unique' => 'The landline number must has already been taken.',

            'cellphoneNo.regex' => 'The cellphone number must be 11 digits.',
            'cellphoneNo.unique' => 'The cellphone number has already been taken.',
            'cellphoneNo.required' => 'The cellphone number is required.',

            'religion.required' => 'The religion field is required.',

            'beneficiary-4ps.required' => 'The 4Ps beneficiary field is required.',


            'countryLocation.max' => 'The country may not be greater than 50 characters',
            'countryLocation.regex' => 'The ofw country must contain only letters and spaces.',

            'ofw-return.date_format' => 'The return date must be in the format YYYY-MM.',

        ], [
        ]);
        $personalInfo = new PersonalInfo();
        $personalInfo->civilStatus = $validatedData2['civilStatus'];
        $personalInfo->barangay = $validatedData2['barangay'];
        $personalInfo->presentAddress = $validatedData2['presentAddress'];
        $personalInfo->tin = $validatedData2['tin'];
        $personalInfo->zipCode = $validatedData2['zipcode'];
        $personalInfo->landlineNo = $validatedData2['landlineNo'];
        $personalInfo->cellphoneNo = $validatedData2['cellphoneNo'];
        $personalInfo->religion = $validatedData2['religion'];
        $personalInfo->beneficiary_4ps = $validatedData2['beneficiary-4ps'];
        //   $personalInfo->ofw_status = $validatedData2['ofw-status'] ?? null;
        $personalInfo->ofw_country = $validatedData2['countryLocation'];
        $personalInfo->ofw_return = $validatedData2['ofw-return'] ?? null;
        $personalInfo->user_id = Auth::id();

        Session::put('formData2', $request->except('_token'));
        Session::put('step2_completed', true);
        return redirect()->route('workexp');
    }


    public function postStep3(Request $request)
    {
        $validatedData3 = $request->validate([
            'hiddenemployerName' => 'nullable|string',
            'hiddenemployerAddress' => 'nullable|string',
            'hiddenpositionHeld' => 'nullable|string',
            'hiddenlistskills' => 'nullable|string',
            'hiddenfromDate' => 'nullable|string',
            'hiddentoDate' => 'nullable|string',
            'hiddenemploymentStatus' => 'nullable|string',
            'employment-type' => 'required|string',
            'job-search-duration' => ['nullable', 'regex:/^\d{1,3}$/'],
            'duration-category' => ['required', 'in:Days,Weeks,Months,Years'],
        ], [
            'employment-type.required' => 'Please specify your employment status.',
            'job-search-duration.regex' => 'The duration should be numeric and contain up to 3 digits.',
            'duration-category.required' => 'Please select a duration category.',
            'duration-category.in' => 'The selected duration category is invalid.',
        ]);

        $employmentInfo = new EmploymentInfo();
        $employmentInfo->employment_type = $validatedData3['employment-type'];
        $employmentInfo->job_search_duration = $validatedData3['job-search-duration'];
        $employmentInfo->duration_category = $validatedData3['duration-category'];
        $employmentInfo->user_id = Auth::id();

        $hiddenemployerName = json_decode($validatedData3['hiddenemployerName']);
        $hiddenemployerAddress = json_decode($validatedData3['hiddenemployerAddress']);
        $hiddenpositionHeld = json_decode($validatedData3['hiddenpositionHeld']);
        $hiddenfromDate = json_decode($validatedData3['hiddenfromDate']);
        $hiddentoDate = json_decode($validatedData3['hiddentoDate']);
        $hiddenlistskills = json_decode($validatedData3['hiddenlistskills']);
        $hiddenemploymentStatus = json_decode($validatedData3['hiddenemploymentStatus']);

        $hiddenemployerName = $hiddenemployerName ?? [];
        $hiddenemployerAddress = $hiddenemployerAddress ?? [];
        $hiddenpositionHeld = $hiddenpositionHeld ?? [];
        $hiddenfromDate = $hiddenfromDate ?? [];
        $hiddentoDate = $hiddentoDate ?? [];
        $hiddenlistskills = $hiddenlistskills ?? [];
        $hiddenemploymentStatus = $hiddenemploymentStatus ?? [];

        // Iterate only if all arrays are non-empty and have the same length
        if (
            is_array($hiddenemployerName) && is_array($hiddenemployerAddress) &&
            is_array($hiddenpositionHeld) && is_array($hiddenfromDate) &&
            is_array($hiddentoDate) && is_array($hiddenlistskills) &&
            is_array($hiddenemploymentStatus) &&
            count($hiddenemployerName) === count($hiddenemployerAddress) &&
            count($hiddenemployerAddress) === count($hiddenpositionHeld) &&
            count($hiddenpositionHeld) === count($hiddenfromDate) &&
            count($hiddenfromDate) === count($hiddentoDate) &&
            count($hiddentoDate) === count($hiddenlistskills) &&
            count($hiddenlistskills) === count($hiddenemploymentStatus)
        ) {
            foreach ($hiddenemployerName as $index => $employerName) {
                if (
                    isset($employerName[0]) && $employerName[0] !== null &&
                    isset($hiddenemployerAddress[$index][0]) && $hiddenemployerAddress[$index][0] !== null &&
                    isset($hiddenpositionHeld[$index][0]) && $hiddenpositionHeld[$index][0] !== null &&
                    isset($hiddenfromDate[$index][0]) && $hiddenfromDate[$index][0] !== null &&
                    isset($hiddentoDate[$index][0]) && $hiddentoDate[$index][0] !== null &&
                    isset($hiddenlistskills[$index][0]) && $hiddenlistskills[$index][0] !== null &&
                    isset($hiddenemploymentStatus[$index][0]) && $hiddenemploymentStatus[$index][0] !== null
                ) {
                    $workExperience = new WorkExperience();
                    $workExperience->employer_name = $employerName[0];
                    $workExperience->employer_address = $hiddenemployerAddress[$index][0];
                    $workExperience->position_held = $hiddenpositionHeld[$index][0];
                    $workExperience->from_date = $hiddenfromDate[$index][0];
                    $workExperience->to_date = $hiddentoDate[$index][0];
                    $workExperience->skills = $hiddenlistskills[$index][0];
                    $workExperience->employment_status = $hiddenemploymentStatus[$index][0];
                    $workExperience->user_id = Auth::id();
                }
            }
        }

        Session::put('formData3', $request->except('_token'));
        Session::put('step3_completed', true);
        return redirect()->route('jobpreferences');
    }

    public function postStep4(Request $request)
    {
        $validatedData4 = $request->validate([
            'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
            'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
            'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
        ], [
            'preferredOccupation.required' => 'The preferred occupation field is required.',
            'preferredOccupation.regex' => 'The preferred occupation must contain only letters and spaces.',
            'preferredOccupation.max' => 'The preferred occupation may not be greater than 50 characters.',
            'localLocation.required' => 'The local location field is required.',
            'localLocation.regex' => 'The local location must contain only letters and spaces.',
            'localLocation.max' => 'The local location may not be greater than 50 characters.',
            'overseasLocation.regex' => 'The overseas location must contain only letters and spaces.',
            'overseasLocation.max' => 'The overseas location may not be greater than 50 characters.',
        ]);

        $jobPreference = new JobPreference();
        $jobPreference->preferred_occupation = $validatedData4['preferredOccupation'];
        $jobPreference->local_location = $validatedData4['localLocation'];
        $jobPreference->overseas_location = $validatedData4['overseasLocation'];
        $jobPreference->user_id = Auth::id();
        Session::put('formData4', $request->except('_token'));
        Session::put('step4_completed', true);
        return redirect()->route('dialect');
    }

    public function postStep5(Request $request)
    {
        // Validate the request data
        $validatedData5 = $request->validate([
            'languageSpeak' => 'required|array|min:2', // Require at least two speaking languages
            'languageSpeak.*' => 'required|string|max:255|in:English,Filipino', // Valid languages for speaking

            'languageRead' => 'required|array|min:2', // Require at least two reading languages
            'languageRead.*' => 'required|string|max:255|in:English,Filipino', // Valid languages for reading

            'proficiencySpeak' => 'required|array',
            'proficiencySpeak.*' => 'required|array|min:1', // Each language's speaking proficiency should have at least one item
            'proficiencySpeak.*.*' => 'required|string|in:Excellent,Good,Fair,Poor', // Validating speaking proficiency values

            'proficiencyRead' => 'required|array',
            'proficiencyRead.*' => 'required|array|min:1', // Each language's reading proficiency should have at least one item
            'proficiencyRead.*.*' => 'required|string|in:Excellent,Good,Fair,Poor', // Validating reading proficiency values

            'selectedProficiencies' => 'nullable|string',
            'skills' => 'array',
            'otherSkills' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : 'nullable|string',
            'selectedSkills' => 'nullable|string',
            'otherSkillsInput' => in_array('OTHER_SKILLS', $request->input('skills', [])) ? 'required|regex:/^[A-Za-z\s,-.]+$/i|max:300' : 'nullable|string',
        ], [
            'languageSpeak.required' => 'At least two languages are required for speaking.',
            'languageSpeak.*.in' => 'The language must be either English or Filipino.',
            'languageRead.required' => 'At least two languages are required for reading.',
            'languageRead.*.in' => 'The language must be either English or Filipino.',
            'proficiencySpeak.required' => 'Speaking proficiencies are required for each language.',
            'proficiencySpeak.*.array' => 'Each speaking proficiency field must be an array.',
            'proficiencySpeak.*.min' => 'At least one speaking proficiency must be selected for each language.',
            'proficiencySpeak.*.*.required' => 'Each speaking proficiency must be specified.',
            'proficiencySpeak.*.*.in' => 'The speaking proficiency must be one of the following: Excellent, Good, Fair, Poor',
            'proficiencyRead.required' => 'Reading proficiencies are required for each language.',
            'proficiencyRead.*.array' => 'Each reading proficiency field must be an array.',
            'proficiencyRead.*.min' => 'At least one reading proficiency must be selected for each language.',
            'proficiencyRead.*.*.required' => 'Each reading proficiency must be specified.',
            'proficiencyRead.*.*.in' => 'The reading proficiency must be one of the following: Excellent, Good, Fair, Poor',
            'otherSkills.required' => 'The other skills field is required when "Other" is selected.',
            'otherSkills.string' => 'The other skills field must contain letters, spaces, hyphens, commas, and periods.',
            'otherSkills.max' => 'The other skills field may not be greater than 300 characters.',
        ]);

        // Validate the lengths of proficiencies to match the languages
        if (count($validatedData5['languageSpeak']) !== count($validatedData5['proficiencySpeak'])) {
            throw ValidationException::withMessages([
                'proficiencySpeak' => 'The number of speaking proficiencies must match the number of speaking languages.',
            ]);
        }
        if (count($validatedData5['languageRead']) !== count($validatedData5['proficiencyRead'])) {
            throw ValidationException::withMessages([
                'proficiencyRead' => 'The number of reading proficiencies must match the number of reading languages.',
            ]);
        }

        $userId = Auth::id();
        $languagesSpeak = $validatedData5['languageSpeak'];
        $languagesRead = $validatedData5['languageRead'];
        $proficienciesSpeak = $validatedData5['proficiencySpeak'];
        $proficienciesRead = $validatedData5['proficiencyRead'];
        $selectedProficiencies = json_decode($validatedData5['selectedProficiencies'] ?? '[]', true);

        foreach ($languagesSpeak as $index => $language) {
            $speakProficiency = $proficienciesSpeak[$index] ?? [];
            $readProficiency = $proficienciesRead[$index] ?? [];

            if (empty($speakProficiency)) {
                $validator = Validator::make([], []);
                $validator->errors()->add("proficiencySpeak.$index", "Proficiencies for speaking are required for the language: $language.");
                $validator->validate();
            }

            if (empty($readProficiency)) {
                $validator = Validator::make([], []);
                $validator->errors()->add("proficiencyRead.$index", "Proficiencies for reading are required for the language: $language.");
                $validator->validate();
            }

            $languageModel = new LanguageInput();
            $languageModel->user_id = $userId;
            $languageModel->language_input = $language; // Speaking language
            $languageModel->proficiencies_speak = json_encode($speakProficiency);
            $languageModel->proficiencies_read = json_encode($readProficiency); // Assuming read proficiency is saved for the same index
        }

        // Create a new Skill instance
        $skills = new Skill();
        $skills->user_id = $userId; // Set the user_id
        $skills->skills = json_encode($request->input('selectedSkills')); // Encode selected skills to JSON
        $skills->otherSkills = $request->input('otherSkillsInput'); // Set other skills


        // Store data in the session
        Session::put('selectedProficiencies', $selectedProficiencies);
        Session::put('formData5', $request->except('_token'));
        Session::put('step5_completed', true);

        // Redirect to the educational background step
        return redirect()->route('educationalbg');
    }




    public function postStep6(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $minimumYear = Carbon::now()->subYears(59)->year;

        $validatedData6 = $request->validate([
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
                // 'regex:/^[a-zA-Z0-9 ,.\-\/()]+&$/', Updated regex to include numbers
            ],


        ], [
            'educationLevel.required' => 'The education level field is required.',
            'educationLevel.max' => 'The education level may not be greater than 100 characters.',
            'school.required' => 'The school field is required.',
            'school.max' => 'The school field may not be greater than 100 characters.',
            'school.regex' => 'The school field may only contain alphabetical letters.',
            'course.required' => 'The course field is required.',
            'course.max' => 'The course field may not be greater than 100 characters.',
            'course.regex' => 'The course field may only contain alphabetical letters.',
            'yearGraduated.integer' => 'The year graduated must be a valid year (numeric value).',
            'yearGraduated.digits' => 'The year graduated must be 4 digits long.',
            'yearGraduated.min' => 'The year graduated must be at least ' . $minimumYear . '.',
            'yearGraduated.max' => 'The year graduated must be less than or equal to ' . $currentYear . '.',
            // 'appendedCertifications.regex' => 'The appended certifications may only contain alphabetical and numerical characters.',
        ]);


        $EducationalAttainment = new EducationalAttainment();
        $EducationalAttainment->educationLevel = $validatedData6['educationLevel'];
        $EducationalAttainment->school = $validatedData6['school'];
        $EducationalAttainment->course = $validatedData6['course'];
        $EducationalAttainment->yearGraduated = $validatedData6['yearGraduated'];
        $EducationalAttainment->awards = $validatedData6['awards'];
        $EducationalAttainment->certifications = $validatedData6['appendedCertifications'];
        $EducationalAttainment->user_id = Auth::id();
        Session::put('formData6', $request->except('_token'));
        Session::put('step6_completed', true);
        return redirect()->route('pwdinfo');

    }

    public function postStep7(Request $request)
    {

        Validator::extend('unique_values', function ($attribute, $value, $parameters, $validator) {
            $values = array_map('trim', explode(',', $value));
            $uniqueValues = array_unique($values);
            return count($values) === count($uniqueValues);
        });


        $validatedData7 = $request->validate([
            'disability' => 'required|string',
            'disabilityDetails' => [
                'required_if:disability,Others,Visual,Psychosocial,Physical,Hearing|String',
                'regex:/^[A-Za-z\s.,-]+$/',
                'max:50'
            ],

            'disabilityOccurrence' => 'required',
            'otherDisabilityDetails' => 'nullable|required_if:disabilityOccurrence,Other|regex:/^[A-Za-z\s.,-]+$/',
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg|max:2048',  // Ensure it is an image and max size is 2MB
            'pwdIdNumber' => 'required|string|regex:/^\d{7,8}$/|unique:pwd_information,pwdIdNo',
            'acceptTerms' => 'required|accepted',

        ], [
            'profilePicture.image' => 'The uploaded file must be an image.',
            'profilePicture.mimes' => 'The uploaded file must be a JPEG, PNG, JPG.',
            'profilePicture.max' => 'The uploaded file may not be greater than 2MB in size.',
            'profilePicture.required' => 'The profile picture is required.',

            'disability.required' => 'The disability status is required.',
            'disabilityDetails.regex' => 'The disability details must contain only letters and spaces.',
            'otherDisabilityDetails.regex' => 'The disability details must contain only letters and spaces.',
            'disabilityDetails.max' => 'The disability details may not be greater than 50 characters.',
            'disabilityOccurrence.required' => 'Please select a disability occurrence.',
            'otherDisabilityDetails.required_if' => 'Please provide details for "Other" disability occurrence.',
            'acceptTerms.required' => 'You must accept the terms and conditions to proceed.',
            'acceptTerms.accepted' => 'You must accept the terms and conditions to proceed.',

            'pwdIdNumber.required' => 'PWD ID number is required.',
            'pwdIdNumber.regex' => 'PWD ID number must be numeric and exactly 7-8 digits.',
            'pwdIdNumber.unique' => 'The PWD ID number has already been taken. Please use a different one.',
        ]);



        // Handle the file upload
        $profilePicturePath = null;
        if ($request->hasFile('profilePicture')) {
            $profilePicturePath = $request->file('profilePicture')->store('profile_pictures', 'public');
        }
        $pwdInformation = new PwdInformation();
        $pwdInformation->disability = $validatedData7['disability'] ?? null;
        $pwdInformation->disabilityDetails = $validatedData7['disabilityDetails'] ?? null;
        $pwdInformation->disabilityOccurrence = $validatedData7['disabilityOccurrence'] ?? null;
        $pwdInformation->otherDisabilityDetails = $validatedData7['otherDisabilityDetails'] ?? null;
        $pwdInformation->pwdIdNo = $validatedData7['pwdIdNumber'] ?? null;
        $pwdInformation->profilePicture = $profilePicturePath;
        $pwdInformation->user_id = Auth::id();
        $pwdInformation->save();


        // Retrieve all form data from the session
        $formData = array_merge(
            Session::get('startData', []),
            Session::get('formData', []),
            Session::get('formData2', []),
            Session::get('formData3', []),
            Session::get('formData4', []),
            Session::get('formData5', []),
            Session::get('formData6', []),
            Session::get('formData7', []),
            ['profilePictureName' => Session::get('profilePicturePath')]

        );


        $this->saveApplicantProfile($formData);
        $this->savePersonalInfo($formData);
        $this->saveEmpWorkExp($formData);
        $this->saveJobPreference($formData);
        $this->saveLanguageInput($formData);
        $this->saveEducationalAttainment($formData);

        Session::forget([
            'startData',
            'formData',
            'formData2',
            'formData3',
            'formData4',
            'formData5',
            'formData6',
            'formData7',
            'start_completed',
            'step1_completed',
            'step2_completed',
            'step3_completed',
            'step4_completed',
            'step5_completed',
            'step6_completed',
            'step7_completed',
        ]);


        $user = Auth::user();
        $user->account_verification_status = 'waiting for approval'; // Update status to indicate completion
        $user->account_verification_status_plain = 'waiting for approval';
        $user->save();
        Session::put('formData7', $request->except('_token', 'fileUpload', 'profilePicture'));
        Session::put('step7_completed', true);
        return redirect()->route('pendingapproval');
    }

    private function saveApplicantProfile($data)
    {

        $applicantProfile = new ApplicantProfile();
        $applicantProfile->lastname = $data['lastname'] ?? null;
        $applicantProfile->firstname = $data['firstname'] ?? null;
        $applicantProfile->middlename = $data['middlename'] ?? null;
        $applicantProfile->suffix = $data['suffix'] ?? null;
        $applicantProfile->gender = $data['gender'] ?? null;
        $applicantProfile->birthdate = $data['birthdate'] ?? null;
        $applicantProfile->user_id = Auth::id();
        $applicantProfile->save();
    }


    private function savePersonalInfo($data)
    {
        $personalInfo = new PersonalInfo();
        $personalInfo->civilStatus = $data['civilStatus'] ?? null;
        $personalInfo->barangay = $data['barangay'] ?? null;
        $personalInfo->presentAddress = $data['presentAddress'] ?? null;
        $personalInfo->zipCode = $data['zipcode'];
        $personalInfo->tin = $data['tin'] ?? null;
        $personalInfo->landlineNo = $data['landlineNo'] ?? null;
        $personalInfo->cellphoneNo = $data['cellphoneNo'] ?? null;
        $personalInfo->religion = $data['religion'] ?? null;
        $personalInfo->beneficiary_4ps = $data['beneficiary-4ps'];
        $personalInfo->ofw_country = $data['countryLocation'];
        $personalInfo->ofw_return = $data['ofw-return'] ?? null;
        $personalInfo->user_id = Auth::id();
        $personalInfo->save();
    }


    private function saveEmpWorkExp($data)
    {

        $employmentInfo = new EmploymentInfo();
        $employmentInfo->employment_type = $data['employment-type'] ?? null;
        $employmentInfo->job_search_duration = $data['job-search-duration'] ?? null;
        $employmentInfo->duration_category = $data['duration-category'] ?? null;
        $employmentInfo->user_id = Auth::id();
        $employmentInfo->save();

        $hiddenemployerName = json_decode($data['hiddenemployerName']);
        $hiddenemployerAddress = json_decode($data['hiddenemployerAddress']);
        $hiddenpositionHeld = json_decode($data['hiddenpositionHeld']);
        $hiddenfromDate = json_decode($data['hiddenfromDate']);
        $hiddentoDate = json_decode($data['hiddentoDate']);
        $hiddenlistskills = json_decode($data['hiddenlistskills']);
        $hiddenemploymentStatus = json_decode($data['hiddenemploymentStatus']);

        // Iterate only if all arrays are non-empty and have the same length
        if (
            is_array($hiddenemployerName) && is_array($hiddenemployerAddress) &&
            is_array($hiddenpositionHeld) && is_array($hiddenfromDate) &&
            is_array($hiddentoDate) && is_array($hiddenlistskills) &&
            is_array($hiddenemploymentStatus) &&
            count($hiddenemployerName) === count($hiddenemployerAddress) &&
            count($hiddenemployerAddress) === count($hiddenpositionHeld) &&
            count($hiddenpositionHeld) === count($hiddenfromDate) &&
            count($hiddenfromDate) === count($hiddentoDate) &&
            count($hiddentoDate) === count($hiddenlistskills) &&
            count($hiddenlistskills) === count($hiddenemploymentStatus)
        ) {
            foreach ($hiddenemployerName as $index => $employerName) {
                if (
                    isset($employerName[0]) && $employerName[0] !== null &&
                    isset($hiddenemployerAddress[$index][0]) && $hiddenemployerAddress[$index][0] !== null &&
                    isset($hiddenpositionHeld[$index][0]) && $hiddenpositionHeld[$index][0] !== null &&
                    isset($hiddenfromDate[$index][0]) && $hiddenfromDate[$index][0] !== null &&
                    isset($hiddentoDate[$index][0]) && $hiddentoDate[$index][0] !== null &&
                    isset($hiddenlistskills[$index][0]) && $hiddenlistskills[$index][0] !== null &&
                    isset($hiddenemploymentStatus[$index][0]) && $hiddenemploymentStatus[$index][0] !== null
                ) {
                    $workExperience = new WorkExperience();
                    $workExperience->employer_name = $employerName[0];
                    $workExperience->employer_address = $hiddenemployerAddress[$index][0];
                    $workExperience->position_held = $hiddenpositionHeld[$index][0];
                    $workExperience->from_date = $hiddenfromDate[$index][0];
                    $workExperience->to_date = $hiddentoDate[$index][0];
                    $workExperience->skills = $hiddenlistskills[$index][0];
                    $workExperience->employment_status = $hiddenemploymentStatus[$index][0];
                    $workExperience->user_id = Auth::id();
                    $workExperience->save();

                }
            }
        }
    }

    private function saveJobPreference($data)
    {
        $jobPreference = new JobPreference();
        $jobPreference->preferred_occupation = $data['preferredOccupation'] ?? null;
        $jobPreference->local_location = $data['localLocation'] ?? null;
        $jobPreference->overseas_location = $data['overseasLocation'] ?? null;
        $jobPreference->user_id = Auth::id();
        $jobPreference->save();
    }

    private function saveLanguageInput($data)
    {
        // Validate the lengths of proficiencies to match the languages
        if (count($data['languageSpeak']) !== count($data['proficiencySpeak'])) {
            throw ValidationException::withMessages([
                'proficiencySpeak' => 'The number of speaking proficiencies must match the number of speaking languages.',
            ]);
        }

        if (count($data['languageRead']) !== count($data['proficiencyRead'])) {
            throw ValidationException::withMessages([
                'proficiencyRead' => 'The number of reading proficiencies must match the number of reading languages.',
            ]);
        }

        $userId = Auth::id();
        $languagesSpeak = $data['languageSpeak'];
        $languagesRead = $data['languageRead'];
        $proficienciesSpeak = $data['proficiencySpeak'];
        $proficienciesRead = $data['proficiencyRead'];
        $selectedProficiencies = json_decode($data['selectedProficiencies'] ?? '[]', true);

        foreach ($languagesSpeak as $index => $language) {
            $speakProficiency = $proficienciesSpeak[$index] ?? [];
            $readProficiency = $proficienciesRead[$index] ?? [];

            if (empty($speakProficiency)) {
                $validator = Validator::make([], []);
                $validator->errors()->add("proficiencySpeak.$index", "Proficiencies for speaking are required for the language: $language.");
                $validator->validate();
            }

            if (empty($readProficiency)) {
                $validator = Validator::make([], []);
                $validator->errors()->add("proficiencyRead.$index", "Proficiencies for reading are required for the language: $language.");
                $validator->validate();
            }

            $languageModel = new LanguageInput();
            $languageModel->user_id = $userId;
            $languageModel->language_input = $language; // Speaking language
            $languageModel->proficiencies_speak = json_encode($speakProficiency);
            $languageModel->proficiencies_read = json_encode($readProficiency); // Assuming read proficiency is saved for the same index
            $languageModel->save();
        }
        // Save skills information
        $skills = new Skill();
        $skills->skills = json_encode($data['selectedSkills']); // Encode selected skills to JSON
        $skills->otherSkills = $data['otherSkillsInput'];
        $skills->user_id = $userId;
        $skills->save();
    }

    private function saveEducationalAttainment($data)
    {
        $educationalAttainment = new EducationalAttainment();
        $educationalAttainment->educationLevel = $data['educationLevel'] ?? null;
        $educationalAttainment->school = $data['school'] ?? null;
        $educationalAttainment->course = $data['course'] ?? null;
        $educationalAttainment->yearGraduated = $data['yearGraduated'] ?? null;
        $educationalAttainment->awards = $data['awards'] ?? null;
        $educationalAttainment->certifications = $data['appendedCertifications'] ?? null;
        $educationalAttainment->user_id = Auth::id();
        $educationalAttainment->save();
    }
}
