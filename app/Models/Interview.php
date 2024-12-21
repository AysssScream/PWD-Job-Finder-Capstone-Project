<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'job_id',
        'user_id',
        'remarks',
        'read_at',
        'status',
    ];

   // Encrypt the remarks field before saving to the database
    public function setRemarksAttribute($value)
    {
        $this->attributes['remarks'] = Crypt::encryptString($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Crypt::encryptString($value);
    }

    public function getRemarksAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return 'Invalid remarks data';
        }
    }

    public function getStatusAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return 'Invalid status data';
        }
    }
    
    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class, 'job_application_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}