<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonFile extends Model
{
    protected $fillable = [
        'lesson_id',
        'type',
        'path',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
