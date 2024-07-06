<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwdInformation extends Model
{
    use HasFactory;

    protected $table = 'pwd_information';

    protected $fillable = [
        'user_id',
        'pwdIdPicture',
        'profilePicture',
        'disability',
        'disabilityOccurrence',
        'otherDisabilityDetails',
        'disabilityDetails',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

