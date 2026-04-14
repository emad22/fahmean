<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'teacher_id',
        'profile_image',
        'phone_number',
    ];

    /**
     * Assistant relationship: a user (assistant) belongs to a teacher.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Teacher relationship: a teacher has many assistants.
     */
    public function assistants()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }

    /**
     * Get the user ID responsible for content (teacher or the teacher of this assistant).
     */
    public function getEffectiveTeacherId()
    {
        if ($this->hasRole('assistant_teacher')) {
            return $this->teacher_id;
        }

        return $this->id;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Student profile relation.
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Parent to students relation.
    public function children()
    {
        return $this->belongsToMany(Student::class, 'parent_student', 'parent_id', 'student_id');
    }

    // Teacher to education levels relation.
    public function educationLevels()
    {
        return $this->belongsToMany(EducationLevel::class, 'teacher_education_level', 'teacher_id', 'education_level_id');
    }

    // Teacher to subjects relation.
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject', 'user_id', 'subject_id');
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'teacher_grade', 'teacher_id', 'grade_id');
    }

    public function courses()
    {
        // Courses linked through the student enrollment pivot table.
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')
            ->withTimestamps();
    }

    /**
     * Get the courses that the student is enrolled in.
     */
    public function enrolledCourses()
    {
        return $this->courses();
    }

    public function lessons()
    {
        // Lessons linked through the lesson progress pivot table.
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id')
            ->withPivot('completed')
            ->withTimestamps();
    }

    public function quizzes()
    {
        // Quizzes linked through the quiz attempts pivot table.
        return $this->belongsToMany(Quiz::class, 'quiz_student', 'student_id', 'quiz_id')
            ->withPivot('score', 'completed', 'attempt_count', 'user_answers')
            ->withTimestamps();
    }

    // Recent login activity records for the user.
    public function loginActivities()
    {
        return $this->hasMany(LoginActivity::class)->latest();
    }
}
