<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPreference extends Model
{
    use HasFactory;
    protected $table = 'job_preferences';

    protected $fillable = ['user_id', 'preferred_occupation', 'local_location', 'overseas_location'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
