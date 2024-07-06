<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobInfo extends Model
{
    use HasFactory;
    protected $table = 'jobinfos';

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'educational_level',
        'location',
        'job_type',
        'salary',
        'date_posted',
        'company_name',
        'benefits',
        'responsibilities',
        'qualifications',
        'vacancy',
    ];

    // Define the employer relationship
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id', 'id');
    }

    public function jobPreference()
    {
        return $this->belongsTo(JobPreference::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'user_id');
    }

}
