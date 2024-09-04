<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class EmploymentInfo extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not following Laravel's naming convention
    protected $table = 'employment_infos';

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'employment_type',
        'job_search_duration',
        'duration_category',
    ];

    // Define the relationship with the User model
    // Encrypt attributes before saving
    public function setEmploymentTypeAttribute($value)
    {
        $this->attributes['employment_type'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setJobSearchDurationAttribute($value)
    {
        $this->attributes['job_search_duration'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setDurationCategoryAttribute($value)
    {
        $this->attributes['duration_category'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getEmploymentTypeAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getJobSearchDurationAttribute($value)
    {
        return $this->decryptValue($value);
    }

    public function getDurationCategoryAttribute($value)
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
