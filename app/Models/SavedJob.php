<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;


class SavedJob extends Model
{
    use HasFactory;
    protected $table = 'saved_jobs';

    protected $fillable = [
        'job_id',
        'user_id',
        'company_name',
        'title',
        'location',
    ];



    protected $casts = [
        'company_name' => 'encrypted',
        'title' => 'encrypted',
        'location' => 'encrypted',
    ];

    // Encrypt attributes before saving

    public function setCompanyNameAttribute($value)
    {
        $this->attributes['company_name'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = $value ? Crypt::encryptString($value) : null;
    }

    // Decrypt attributes when retrieving
    public function getCompanyNameAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getTitleAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getLocationAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }
}
