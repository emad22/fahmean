<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherRequest extends Model
{
    protected $fillable = [
        'frist_name',
        'last_name',
        'phone_num',
        'students_num',
        'address',
        'email',
        'academic_level',
        'subject_name',
        'facebook_link',
        'work_experience',
        'is_read',
    ];
}
