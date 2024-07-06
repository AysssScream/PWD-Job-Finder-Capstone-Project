<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'preferred_occupation',
        'localLocation',
        'overseasLocation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
