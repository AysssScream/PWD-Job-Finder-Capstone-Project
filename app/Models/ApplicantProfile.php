<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not following Laravel's naming convention
    protected $table = 'applicant_profiles';

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'gender',
        'birthdate',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}