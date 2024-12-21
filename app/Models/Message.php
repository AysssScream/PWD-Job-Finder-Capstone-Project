<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Message extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'messages';

    // Define which attributes can be mass-assigned
    protected $fillable = [
        'subject',
        'from',
        'to',
        'message',
        
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    // Encrypt attributes before saving
    public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = $this->encryptValue($value);
    }

    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = $this->encryptValue($value);
    }

    // Decrypt attributes when retrieving
    public function getSubjectAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getMessageAttribute($value)
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

}
