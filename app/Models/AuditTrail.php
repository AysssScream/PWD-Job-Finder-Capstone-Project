<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table = 'audit_trail';

    protected $fillable = ['user_id', 'user', 'action', 'section'];

    public function setUserAttribute($value)
    {
        $this->attributes['user'] = $this->encryptValue($value);
    }


    // Decrypt attributes when retrieving
    public function getUserAttribute($value)
    {
        return $this->decryptValue($value);
    }

    // Helper method to encrypt values
    protected function encryptValue($value)
    {
        return $value ? Crypt::encryptString($value) : null;
    }

    // Helper method to decrypt values
    protected function decryptValue($value)
    {
        try {
            return $value ? Crypt::decryptString($value) : null;
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle decryption error (e.g., log the error, return a default value, etc.)
            return null;
        }
    }


    // Optionally, you can set up relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
