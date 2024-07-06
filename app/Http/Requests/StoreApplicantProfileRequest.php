<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantProfileRequest extends FormRequest
{

    public function rules()
    {
        return [
            'lastname' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:20'],
            'firstname' => ['required', 'regex:/^[A-Za-z\s]+$/i', 'max:20'],
            'middlename' => ['nullable', 'regex:/^[A-Za-z\s]*$/i', 'max:20'],
            'suffix' => 'nullable|string|in:none,sr,jr,i,ii,iii,iv,v,vi,vii,viii,ix,x',
            'gender' => 'required|string|in:male,female,other',
            'birthdate' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $age = \Carbon\Carbon::parse($value)->age;
                    if ($age < 16) {
                        $fail('You must be at least 16 years old and above.');
                    }
                }
            ],
            'fileUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
