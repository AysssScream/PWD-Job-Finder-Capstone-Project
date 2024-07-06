<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_infos';

    protected $fillable = [
        'user_id',
        'civilStatus',
        'barangay',
        'presentAddress',
        'tin',
        'landlineNo',
        'cellphoneNo',
        'religion',
        'beneficiary_4ps',
        'ofw_status',
        'ofw_country',
        'ofw_return',
        'countryLocation',
    ];
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
