<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
class LanguageInput extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'language_input', 'proficiencies_speak','proficiencies_read'];

    protected $casts = [
        'proficiencies' => 'array', // Automatically decode JSON to array
    ];

    // Encrypt attributes before saving
    public function setLanguageInputAttribute($value)
    {
        $this->attributes['language_input'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setProficienciesSpeakAttribute($value)
    {
        // Ensure $value is an array before encrypting
        $this->attributes['proficiencies_speak'] = $value ? Crypt::encryptString(json_encode($value)) : null;
    }
    
    public function setProficienciesReadAttribute($value)
    {
        // Ensure $value is an array before encrypting
        $this->attributes['proficiencies_read'] = $value ? Crypt::encryptString(json_encode($value)) : null;
    }


    // Decrypt attributes when retrieving
    public function getLanguageInputAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }
    
    public function getProficienciesSpeakAttribute($value)
    {
        // Decrypt and decode the JSON string into an array
        return $value ? json_decode(Crypt::decryptString($value), true) : null;
    }
    
    public function getProficienciesReadAttribute($value)
    {
        // Decrypt and decode the JSON string into an array
        return $value ? json_decode(Crypt::decryptString($value), true) : null;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
