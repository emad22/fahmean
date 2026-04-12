<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'education_level_id', 'grade_id', 'student_code', 'student_phone_number', 'parent_phone_number', 'academic_year', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function parents()
    {
        return $this->belongsToMany(User::class, 'parent_student', 'student_id', 'parent_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }

    // App\Models\User.php

    

    public function lessons()
    {
        // الدروس المنجزة (pivot table ممكن يكون lesson_student)
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id')
            ->withPivot('completed', 'progress') // لو عندك completed column
            ->withTimestamps();
    }

    public function quizzes()
    {
        // الاختبارات المحلولة من قبل الطالب
        return $this->belongsToMany(Quiz::class, 'quiz_student', 'student_id', 'quiz_id')
            ->withPivot('score', 'completed', 'attempt_count', 'user_answers')
            ->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')
            ->withPivot('progress', 'status')
            ->withTimestamps();
    }
}
