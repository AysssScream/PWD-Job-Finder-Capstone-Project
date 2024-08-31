<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageInput extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'language_input', 'proficiencies'];

    // Define the relationship with the User model

    protected $casts = [
        'proficiencies' => 'array', // Automatically decode JSON to array
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
