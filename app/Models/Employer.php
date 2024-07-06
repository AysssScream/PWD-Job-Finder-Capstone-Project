<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable = [
        'businessname',
        'user_id',
        'tin',
        'tradename',
        'locationtype',
        'employertype',
        'totalworkforce',
        'address',
        'city',
        'contact_person',
        'position',
        'zipCode',
        'telephone_no',
        'mobile_no',
        'fax_no',
        'company_logo',
        'email_address',
    ];


    public function jobInfos()
    {
        return $this->hasMany(JobInfo::class, 'employer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(JobInfo::class, 'employer_id', 'user_id');
    }

}
