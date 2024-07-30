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
        return [
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
            [
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
            ],

        ];

    }
}
