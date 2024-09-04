<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'replies';

    protected $fillable = [
        'message_id',
        'message',
        'reply_to',
        'reply_from',
    ];

    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = $this->encryptValue($value);
    }



    // Decrypt attributes when retrieving
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

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
