<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $student = Student::with('courses')->where('user_id', auth()->id())->first();

        // dd($student);

        // لو فيه احتمال إن الطالب مش موجود
        if (!$student) {
            // Allow Admins to view empty page instead of 404
            if (auth()->user()->hasRole(['admin', 'teacher'])) {
                 return view('dashboard.admin-dashboard.student-enrolled-courses', [
                    'student' => null,
                    'enrolled' => collect(),
                    'active' => collect(),
                    'completed' => collect()
                 ]);
            }
            abort(404, "Student profile not found. Please contact support.");
        }

        $enrolled = $student->courses;
        // dd($enrolled);

        $active = $student->courses()->wherePivot('status', 'active')->get();



        $completed = $student->courses()->wherePivot('status', 'completed')->get();

        return view('dashboard.admin-dashboard.student-enrolled-courses', compact('student', 'enrolled', 'active', 'completed'));
    }

    public function show($id)
    {
        $course = Course::with(['sections.lessons.quizzes', 'sections.quizzes', 'teacher'])->findOrFail($id);
       
        return view('dashboard.admin-dashboard.student-course-show' ,compact('course'));
    }
}
