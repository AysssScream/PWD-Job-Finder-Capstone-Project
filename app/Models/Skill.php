<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = ['skills', 'otherSkills', 'selectedSkills', 'otherSkillsInput', 'user_id'];
}

