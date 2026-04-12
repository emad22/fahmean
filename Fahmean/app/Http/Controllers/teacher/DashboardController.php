<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function teacherDashboard()
    {
        $teacherId = auth()->user()->getEffectiveTeacherId();

        $courses = \App\Models\Course::where('teacher_id', $teacherId)->get();
        $totalCourses = $courses->count();
        // Assuming 'published' is active
        $activeCourses = $courses->where('status', 'published')->count();
        
        // Calculate total students (unique students across all courses)
        $totalStudents = \Illuminate\Support\Facades\DB::table('course_student')
            ->whereIn('course_id', $courses->pluck('id'))
            ->distinct('student_id')
            ->count('student_id');

        // Simple earnings calculation (mock logic: course price * enrolled students)
        // Ideally this should come from an 'Order' model
        $totalEarnings = 0;
        foreach($courses as $course) {
             $studentsInCourse = \Illuminate\Support\Facades\DB::table('course_student')
                ->where('course_id', $course->id)
                ->count();
             $totalEarnings += $course->price * $studentsInCourse;
        }

        $courses_list = \App\Models\Course::where('teacher_id', $teacherId)
            ->withCount('students')
            ->get();

        return view('dashboard.index', compact('totalCourses', 'activeCourses', 'totalStudents', 'totalEarnings', 'courses_list'));
    }

    public function teacherProfile()
    {
        $user = auth()->user();
        return view('dashboard.admin-dashboard.users.show', compact('user'));
    }

    public function teacherSettings()
    {
        // Placeholder for settings - redirect to profile for now or show show view
        $user = auth()->user();
        return view('dashboard.admin-dashboard.users.show', compact('user'));
    }

    // Placeholders for other routes to prevent errors
    public function teacherAnnouncements() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherAssignments() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherEnrolledCourses() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherMyQuizAttempts() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherOrderHistory() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherQuizAttempts() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherReviews() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
    public function teacherWishlist() { return view('dashboard.admin-dashboard.users.show', ['user' => auth()->user()]); }
}
