<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProgressService
{
    /**
     * Calculate and update course progress for a student.
     */
    public function updateCourseProgress(User $student, Course $course)
    {
        $totalLessons = $course->sections()->withCount('lessons')->get()->sum('lessons_count');
        
        if ($totalLessons == 0) {
            return 0;
        }

        $completedLessons = DB::table('lesson_student')
            ->join('lessons', 'lessons.id', '=', 'lesson_student.lesson_id')
            ->join('sections', 'sections.id', '=', 'lessons.section_id')
            ->where('sections.course_id', $course->id)
            ->where('lesson_student.student_id', $student->id)
            ->where('lesson_student.completed', true)
            ->count();

        $progress = round(($completedLessons / $totalLessons) * 100);

        // Update course_student pivot
        $student->courses()->updateExistingPivot($course->id, [
            'progress' => $progress,
            'completed_at' => $progress == 100 ? now() : null
        ]);

        return $progress;
    }

    /**
     * Mark a lesson as completed for a student.
     */
    public function markLessonComplete(User $student, $lessonId, $progress = 100)
    {
        $student->lessons()->syncWithoutDetaching([
            $lessonId => [
                'completed' => true,
                'progress' => $progress,
                'last_accessed_at' => now(),
                'completed_at' => now()
            ]
        ]);

        // Update course progress
        $lesson = \App\Models\Lesson::find($lessonId);
        if ($lesson && $lesson->section && $lesson->section->course) {
            $this->updateCourseProgress($student, $lesson->section->course);
        }
    }

    /**
     * Update lesson progress (for video watching, etc.).
     */
    public function updateLessonProgress(User $student, $lessonId, $progress)
    {
        $isCompleted = $progress >= 100;

        $student->lessons()->syncWithoutDetaching([
            $lessonId => [
                'completed' => $isCompleted,
                'progress' => $progress,
                'last_accessed_at' => now(),
                'completed_at' => $isCompleted ? now() : null
            ]
        ]);

        if ($isCompleted) {
            $lesson = \App\Models\Lesson::find($lessonId);
            if ($lesson && $lesson->section && $lesson->section->course) {
                $this->updateCourseProgress($student, $lesson->section->course);
            }
        }
    }

    /**
     * Get student's overall progress statistics.
     */
    public function getStudentStats(User $student)
    {
        $enrolledCourses = $student->courses()->count();
        
        $completedCourses = $student->courses()
            ->wherePivot('progress', 100)
            ->count();

        $inProgressCourses = $student->courses()
            ->wherePivot('progress', '>', 0)
            ->wherePivot('progress', '<', 100)
            ->count();

        $totalLessonsCompleted = DB::table('lesson_student')
            ->where('student_id', $student->id)
            ->where('completed', true)
            ->count();

        return [
            'enrolled_courses' => $enrolledCourses,
            'completed_courses' => $completedCourses,
            'in_progress_courses' => $inProgressCourses,
            'total_lessons_completed' => $totalLessonsCompleted,
        ];
    }
}
