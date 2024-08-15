<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';  // Specify the table name if it differs from the model name
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'file_type',
        'user_id',
        'upload_date',
        'text_content',
        'age',
        'skills',
        'education',
    ];

    // If you want to handle timestamps manually
}