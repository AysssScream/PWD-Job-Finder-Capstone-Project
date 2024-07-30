<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'replies';

    protected $fillable = [
        'message_id',
        'message',
        'reply_to',
        'reply_from',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
