<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_infos';

    protected $fillable = [
        'user_id',
        'civilStatus',
        'barangay',
        'presentAddress',
        'tin',
        'landlineNo',
        'cellphoneNo',
        'religion',
        'zipCode',
        'beneficiary_4ps',
        'ofw_status',
        'ofw_country',
        'ofw_return',
        'countryLocation',
    ];
    // Define the relationship with the User model

    // Encrypt attributes before saving
    public function setCivilStatusAttribute($value)
    {
        $this->attributes['civilStatus'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setBarangayAttribute($value)
    {
        $this->attributes['barangay'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setPresentAddressAttribute($value)
    {
        $this->attributes['presentAddress'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setTinAttribute($value)
    {
        $this->attributes['tin'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setLandlineNoAttribute($value)
    {
        $this->attributes['landlineNo'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setCellphoneNoAttribute($value)
    {
        $this->attributes['cellphoneNo'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setReligionAttribute($value)
    {
        $this->attributes['religion'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setBeneficiary4psAttribute($value)
    {
        $this->attributes['beneficiary_4ps'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOfwStatusAttribute($value)
    {
        $this->attributes['ofw_status'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOfwCountryAttribute($value)
    {
        $this->attributes['ofw_country'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOfwReturnAttribute($value)
    {
        $this->attributes['ofw_return'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setCountryLocationAttribute($value)
    {
        $this->attributes['countryLocation'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getCivilStatusAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getBarangayAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getPresentAddressAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getTinAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getLandlineNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getCellphoneNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getReligionAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getBeneficiary4psAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOfwStatusAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOfwCountryAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOfwReturnAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getCountryLocationAttribute($value)
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
        } catch (DecryptException $e) {
            // Handle the error, log it if necessary
            return null; // Return null or some default value if decryption fails
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
