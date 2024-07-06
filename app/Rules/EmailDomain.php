<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomain implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowedDomains = ['gmail.com', 'yahoo.com'];
        $emailDomain = substr(strrchr($value, "@"), 1);

        return in_array($emailDomain, $allowedDomains);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid email address ending with gmail.com or yahoo.com.';
    }
}
