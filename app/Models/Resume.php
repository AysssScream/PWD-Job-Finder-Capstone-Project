<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';  // Specify the table name if it differs from the model name
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'file_type',
        'user_id',
        'upload_date',
        'text_content',
        'age',
        'skills',
        'education',
    ];

    // Encrypt data before saving it
    public function setFileNameAttribute($value)
    {
        $this->attributes['file_name'] = Crypt::encryptString($value);
    }

    public function setFileTypeAttribute($value)
    {
        $this->attributes['file_type'] = Crypt::encryptString($value);
    }

    public function setTextContentAttribute($value)
    {
        $this->attributes['text_content'] = Crypt::encryptString($value);
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = Crypt::encryptString($value);
    }

    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = Crypt::encryptString($value);
    }

    public function setEducationAttribute($value)
    {
        $this->attributes['education'] = Crypt::encryptString($value);
    }

    // Decrypt data after retrieving it
    public function getFileNameAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    public function getFileTypeAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    public function getTextContentAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    public function getAgeAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    public function getSkillsAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    public function getEducationAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    // Helper method to handle decryption with exception handling
    private function decryptAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            // Handle the decryption error (log it, return a default value, etc.)
            // For example, you can log the error and return null
            \Log::error('Decryption failed: ' . $e->getMessage());
            return null; // Or handle accordingly
        }
    }

    // If you want to handle timestamps manually
}