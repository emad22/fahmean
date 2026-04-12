<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'grade_id'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_subject', 'subject_id', 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
