<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employer_name',
        'employer_address',
        'position_held',
        'from_date',
        'to_date',
        'skills',
        'employment_status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

