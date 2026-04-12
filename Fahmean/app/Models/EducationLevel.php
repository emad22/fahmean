<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $fillable = ['name'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_education_level', 'education_level_id', 'teacher_id');
    }
}
