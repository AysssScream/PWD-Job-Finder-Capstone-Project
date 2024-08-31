<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'messages';

    // Define which attributes can be mass-assigned
    protected $fillable = [
        'subject',
        'from',
        'to',
        'message',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


}
