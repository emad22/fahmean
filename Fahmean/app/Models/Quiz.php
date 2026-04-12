<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'section_id',
        'lesson_id',
        'teacher_id',
        'title',
        'type',
        'attempts_limit',
        'time_limit'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'quiz_student', 'quiz_id', 'student_id')
            ->withPivot('score', 'completed', 'user_answers', 'attempt_count')
            ->withTimestamps();
    }

    public function course()
    {
        return $this->hasOneThrough(Course::class, Section::class, 'id', 'id', 'section_id', 'course_id');
    }
   
}
