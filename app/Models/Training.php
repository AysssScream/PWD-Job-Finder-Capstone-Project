<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';

    // Define which fields are fillable
    protected $fillable = [
        'admin_id',
        'location',
        'name',
        'address',
        'contactno',
        'description',
    ];

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setContactNoAttribute($value)
    {
        $this->attributes['contactno'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value ? Crypt::encryptString($value) : null;
    }

    // Getters with DecryptException handling
    public function getLocationAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getNameAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getAddressAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getContactNoAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getDescriptionAttribute($value)
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


    // Decrypt attributes when retrieving
    public function getSkillsAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
