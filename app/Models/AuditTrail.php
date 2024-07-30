<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table = 'audit_trail';

    protected $fillable = ['user_id', 'user', 'action', 'section'];

    // Optionally, you can set up relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
