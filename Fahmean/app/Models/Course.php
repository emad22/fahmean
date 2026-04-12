<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'level',
        'price',
        'image',
        'video_source',
        'video_url',
        'teacher_id',
        'subject_id',
        'status'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }

    public function quizzes()
    {
        return $this->hasManyThrough(Quiz::class, Section::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // App\Models\Course.php

   

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id')
            ->withTimestamps();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // public function teacher()
    // {
    //     return $this->belongsTo(User::class, 'teacher_id');
    // }

    // لو عايز تختصر المادة الرئيسية للكورس (مثلاً أول مادة للمدرس)
    // public function subject()
    // {
    //     return $this->teacher->subjects()->first();
    //     // ملاحظة: ده مش eager loading، ممكن يكون null
    // }
}
