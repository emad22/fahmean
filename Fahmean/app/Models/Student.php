<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'education_level_id', 'grade_id', 'student_code',
        'student_phone_number', 'parent_phone_number', 'academic_year', 'status'
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

    /**
     * الكورسات التي سجّل فيها الطالب.
     * course_student.student_id يشير إلى users.id لذا نربط عبر user_id.
     */
    public function courses()
    {
        return $this->user->courses();
    }

    public function activeCourses()
    {
        return $this->user->activeCourses();
    }

    /**
     * الكورسات المسجّل فيها — query builder مباشر لاستخدامها في الفلاتر.
     */
    public function enrolledCourses()
    {
        return Course::whereExists(function ($q) {
            $q->from('course_student')
              ->whereColumn('course_student.course_id', 'courses.id')
              ->where('course_student.student_id', $this->user_id);
        });
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id')
            ->withPivot('completed', 'progress')
            ->withTimestamps();
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_student', 'student_id', 'quiz_id')
            ->withPivot('score', 'completed', 'attempt_count', 'user_answers')
            ->withTimestamps();
    }
}
