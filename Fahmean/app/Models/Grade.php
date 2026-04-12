<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name', 'education_level_id'];

    public function level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
