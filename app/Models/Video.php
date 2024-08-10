<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['video_id', 'location'];


    public static function getVideoByLocation($location)
    {
        return self::where('location', $location)->first();
    }
}
