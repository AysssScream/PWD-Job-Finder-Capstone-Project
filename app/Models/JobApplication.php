<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'employer_id', 'description', 'status', 'remarks', 'company_name', 'title', 'status_plain'];

    // Encrypt attributes before saving
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    public function setCompanyNameAttribute($value)
    {
        $this->attributes['company_name'] = Crypt::encryptString($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Crypt::encryptString($value);
    }

    public function setRemarksAttribute($value)
    {
        $this->attributes['remarks'] = Crypt::encryptString($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Crypt::encryptString($value);
    }

    // Decrypt attributes when accessed
    public function getDescriptionAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : $value;
    }

    public function getCompanyNameAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : $value;
    }

    public function getTitleAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : $value;
    }

    public function getRemarksAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : $value;
    }

    public function getStatusAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : $value;
    }






    public function job()
    {
        return $this->belongsTo(JobInfo::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
