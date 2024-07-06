<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    use HasFactory;
    protected $table = 'saved_jobs';

    protected $fillable = [
        'job_id',
        'user_id',
        'company_name',
        'title',
        'location',
    ];




}
