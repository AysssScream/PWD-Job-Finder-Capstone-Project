<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = ['skills', 'otherSkills', 'selectedSkills', 'otherSkillsInput', 'user_id'];

    // Encrypt attributes before saving
    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOtherSkillsAttribute($value)
    {
        $this->attributes['otherSkills'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setSelectedSkillsAttribute($value)
    {
        $this->attributes['selectedSkills'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOtherSkillsInputAttribute($value)
    {
        $this->attributes['otherSkillsInput'] = $value ? Crypt::encryptString($value) : null;
    }

    public function getSkillsAttribute($value)
    {
        return $value ? json_decode(Crypt::decryptString($value), true) : null;
    }

    public function getOtherSkillsAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getSelectedSkillsAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOtherSkillsInputAttribute($value)
    {
        return $this->decryptValue($value);
    }

    // Helper method to handle decryption
    private function decryptValue($value)
    {
        if (!$value) {
            return null;
        }

        try {
            return Crypt::decryptString($value);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle the error, log it if necessary
            return null; // Return null or some default value if decryption fails
        }
    }
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }

}

