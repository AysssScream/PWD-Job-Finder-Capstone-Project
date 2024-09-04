<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LanguageProficiencies implements Rule
{
    private $languages;
    private $proficiencies;

    public function __construct($languages, $proficiencies)
    {
        $this->languages = $languages;
        $this->proficiencies = $proficiencies;
    }

    public function passes($attribute, $value)
    {
        // Ensure the number of languages matches the number of proficiency arrays
        if (count($this->languages) !== count($this->proficiencies)) {
            return false;
        }

        // Check each language's proficiencies
        foreach ($this->proficiencies as $index => $proficiency) {
            if (empty($proficiency)) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Each language must have at least one proficiency.';
    }
}
