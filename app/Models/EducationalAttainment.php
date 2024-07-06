<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
