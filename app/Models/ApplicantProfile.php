<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class ApplicantProfile extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not following Laravel's naming convention
    protected $table = 'applicant_profiles';

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'gender',
        'birthdate',
    ];


    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setMiddlenameAttribute($value)
    {
        $this->attributes['middlename'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setSuffixAttribute($value)
    {
        $this->attributes['suffix'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getLastnameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getFirstnameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getMiddlenameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getSuffixAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getGenderAttribute($value)
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


    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}