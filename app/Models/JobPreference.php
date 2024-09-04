<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class JobPreference extends Model
{
    use HasFactory;
    protected $table = 'job_preferences';
    protected $fillable = ['user_id', 'preferred_occupation', 'local_location', 'overseas_location'];

    public function setPreferredOccupationAttribute($value)
    {
        $this->attributes['preferred_occupation'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setLocalLocationAttribute($value)
    {
        $this->attributes['local_location'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setOverseasLocationAttribute($value)
    {
        $this->attributes['overseas_location'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getPreferredOccupationAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getLocalLocationAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getOverseasLocationAttribute($value)
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
