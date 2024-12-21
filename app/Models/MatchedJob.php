<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchedJob extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'matched_jobs';
    public $timestamps = false; // Disables `created_at` and `updated_at` columns

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'user_id',
        'job_id',
        'training_qualifications',
    ];

    /**
     * Relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the Job model.
     */
    public function job()
    {
        return $this->belongsTo(JobInfo::class);
    }
}
