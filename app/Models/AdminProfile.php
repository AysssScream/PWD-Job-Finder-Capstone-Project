<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'admin_profile';

    protected $fillable = [
        'admin_id',
        'profile_picture',
        'gender',
        'address',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
