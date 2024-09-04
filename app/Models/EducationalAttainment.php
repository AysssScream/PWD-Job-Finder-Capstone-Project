<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class EducationalAttainment extends Model
{
    use HasFactory;

    protected $table = 'educational_attainments';

    protected $fillable = [
        'user_id',
        'educationLevel',
        'school',
        'course',
        'yearGraduated',
        'awards',
    ];

    // Encrypt attributes before saving
    public function setEducationLevelAttribute($value)
    {
        $this->attributes['educationLevel'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setSchoolAttribute($value)
    {
        $this->attributes['school'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setCourseAttribute($value)
    {
        $this->attributes['course'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setYearGraduatedAttribute($value)
    {
        $this->attributes['yearGraduated'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setAwardsAttribute($value)
    {
        $this->attributes['awards'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getEducationLevelAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getSchoolAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getCourseAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getYearGraduatedAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getAwardsAttribute($value)
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
