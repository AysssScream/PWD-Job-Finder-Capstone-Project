<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
