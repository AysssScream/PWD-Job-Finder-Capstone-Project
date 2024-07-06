<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $currentYear = Carbon::now()->year;
        $minimumYear = Carbon::now()->subYears(59)->year;
        return [
            /*'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'lastname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'firstname' => ['required', 'regex:/^[A-Za-z\s.]+$/i', 'max:50'],
            'suffix' => 'nullable|string|in:None,Sr.,Jr.,I,II,III,IV,V,VI,VII,VIII,IX,X',
            'middlename' => ['nullable', 'regex:/^[A-Za-z\s.]*$/i', 'max:50'],
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
            'gender' => 'required|string|in:Male,Female,Other',*/

            'civilStatus' => ['regex:/^[A-Za-z\s]+$/i', 'max:20'],
            'barangay' => ['required', 'regex:/^[A-Za-z0-9\s.-]+$/i', 'max:50'],
            'presentAddress' => ['required', 'max:100'],
            'zipcode' => ['required', 'string', 'digits:4'],
            /*'tin' => [
                'nullable',
                'unique:personal_infos,tin',
                'regex:/^\d+$/',
                'digits:9',
            ],
            'landlineNo' => ['nullable', 'regex:/^\d{8}$/'],
            'cellphoneNo' => ['required', 'regex:/^\d{11}$/'],*/
            'religion' => 'required|string',
            'beneficiary-4ps' => 'required|string',
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

            'employment-type' => 'required|string',
            'job-search-duration' => ['nullable', 'regex:/^\d{1,3}$/'],
            'duration-category' => ['required', 'in:Days,Weeks,Months,Years'],
            'preferredOccupation' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:50'],
            'localLocation' => ['required', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],
            'overseasLocation' => ['nullable', 'regex:/^[A-Za-z\sñ,.]+$/i', 'max:50'],


            'selected-languages' => ['required', 'regex:/^[A-Za-z\s.,-]+$/i', 'max:255'],

            'educationLevel' => ['required', 'max:100'],
            'school' => ['required', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],
            'course' => ['required', 'max:100', 'regex:/^[a-zA-Z ,.\-\/]+$/'],
            'yearGraduated' => [
                'nullable',
                'integer',
                'digits:4',
                'min:' . $minimumYear, // Minimum year allowed based on user being at least 59 years old
                'max:' . $currentYear, // Maximum year allowed is the current year
            ],
            'awards' => 'nullable|string|max:300',






            'disability' => 'required|string',
            'disabilityDetails' => [
                'required_if:disability,Others,Visual,Psychosocial,Physical,Hearing|String',
                'regex:/^[A-Za-z\s.,-]+$/',
                'max:50'
            ],

            'disabilityOccurrence' => 'required',
            'otherDisabilityDetails' => 'nullable|required_if:disabilityOccurrence,Other|regex:/^[A-Za-z\s.,-]+$/',

        ];
    }
}
