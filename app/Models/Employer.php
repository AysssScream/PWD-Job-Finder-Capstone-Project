<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable = [
        'businessname',
        'user_id',
        'tinno',
        'tradename',
        'locationtype',
        'employertype',
        'totalworkforce',
        'address',
        'municipality',
        'contact_person',
        'position',
        'zipCode',
        'telephone_no',
        'mobile_no',
        'fax_no',
        'company_logo',
        'website_link',
        'email_address',
    ];


    // Encrypt attributes before saving
    public function setBusinessnameAttribute($value)
    {
        $this->attributes['businessname'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setTinnoAttribute($value)
    {
        $this->attributes['tinno'] = $value ? Crypt::encryptString($value) : null;
    }
    public function setTradenameAttribute($value)
    {
        $this->attributes['tradename'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setLocationtypeAttribute($value)
    {
        $this->attributes['locationtype'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setEmployertypeAttribute($value)
    {
        $this->attributes['employertype'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setTotalworkforceAttribute($value)
    {
        $this->attributes['totalworkforce'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setMunicipalityAttribute($value)
    {
        $this->attributes['municipality'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setContactPersonAttribute($value)
    {
        $this->attributes['contact_person'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setPositionAttribute($value)
    {
        $this->attributes['position'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setZipCodeAttribute($value)
    {
        $this->attributes['zipCode'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setTelephoneNoAttribute($value)
    {
        $this->attributes['telephone_no'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setMobileNoAttribute($value)
    {
        $this->attributes['mobile_no'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setWebsiteLinkAttribute($value)
    {
        $this->attributes['website_link'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setFaxNoAttribute($value)
    {
        $this->attributes['fax_no'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setCompanyLogoAttribute($value)
    {
        $this->attributes['company_logo'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setEmailAddressAttribute($value)
    {
        $this->attributes['email_address'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getBusinessnameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getTinnoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getTradenameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getLocationtypeAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getEmployertypeAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getTotalworkforceAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getAddressAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getMunicipalityAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getContactPersonAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getPositionAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getZipCodeAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getTelephoneNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getMobileNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getFaxNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getWebsiteLinkAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getCompanyLogoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getEmailAddressAttribute($value)
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


    public function jobInfos()
    {
        return $this->hasMany(JobInfo::class, 'employer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(JobInfo::class, 'employer_id', 'user_id');
    }

    // public function userpic()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

}
