<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PwdInformation extends Model
{
    use HasFactory;

    protected $table = 'pwd_information';

    protected $fillable = [
        'user_id',
        'pwdIdPicture',
        'profilePicture',
        'disability',
        'disabilityOccurrence',
        'otherDisabilityDetails',
        'disabilityDetails',
        'pwdIdNo'
    ];

    // Encrypt attributes before saving
    public function setPwdIdPictureAttribute($value)
    {
        $this->attributes['pwdIdPicture'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setProfilePictureAttribute($value)
    {
        $this->attributes['profilePicture'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setDisabilityAttribute($value)
    {
        $this->attributes['disability'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setDisabilityOccurrenceAttribute($value)
    {
        $this->attributes['disabilityOccurrence'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOtherDisabilityDetailsAttribute($value)
    {
        $this->attributes['otherDisabilityDetails'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setDisabilityDetailsAttribute($value)
    {
        $this->attributes['disabilityDetails'] = $value ? Crypt::encryptString($value) : null;
    }
    
    public function setPwdIDNoAttribute($value)
    {
        $this->attributes['pwdIdNo'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getPwdIdPictureAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getProfilePictureAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getDisabilityAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getDisabilityOccurrenceAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOtherDisabilityDetailsAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getDisabilityDetailsAttribute($value)
    {
        return $this->decryptValue($value);
    }
    
    public function getPwdIDNoAttribute($value)
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

