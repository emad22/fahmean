<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'content',
        'video',
        'video_source',
        'video_url',
        'pdf',
        'audio',
        'duration',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function files()
    {
        return $this->hasMany(LessonFile::class);
    }

    // App\Models\Lesson.php

   

    public function completedStudents()
    {
        return $this->belongsToMany(User::class, 'lesson_student', 'lesson_id', 'student_id')
            ->withPivot('completed')
            ->withTimestamps();
    }

    public function views()
    {
        return $this->hasMany(LessonView::class);
    }
}
