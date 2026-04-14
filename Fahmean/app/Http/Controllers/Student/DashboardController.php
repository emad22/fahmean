<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\Quiz;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user()->student; // Resolve the related student profile for the logged-in user.

        if (! $student) {
            return view('dashboard.index', [
                'enrolledCoursesCount' => 0,
                'activeCoursesCount' => 0,
                'completedCoursesCount' => 0,
                'recentCourses' => collect(),
                'quizAttempts' => collect(),
            ])->with('warning', 'You are viewing this page as Admin without a Student profile.');
        }

        $enrolledCoursesCount = $student->courses()->count();

        // Count courses that still contain lessons not completed by the student.
        $activeCoursesCount = $student->courses()->whereHas('lessons', function ($q) use ($student) {
            $q->whereDoesntHave('completedStudents', function ($qq) use ($student) {
                $qq->where('student_id', $student->id);
            });
        })->count();

        // Count courses that include completed lessons for this student.
        $completedCoursesCount = $student->courses()->whereHas('lessons', function ($q) use ($student) {
            $q->whereHas('completedStudents', function ($qq) use ($student) {
                $qq->where('student_id', $student->id);
            });
        })->count();

        // Fetch the latest 5 enrolled courses.
        $recentCourses = $student->courses()->latest()->take(5)->get();

        // Fetch the latest 5 quiz attempts.
        $quizAttempts = $student->quizzes()->latest()->take(5)->get();

        // Wishlist placeholder.
        // $wishlist = Wishlist::where('student_id', $student->id)->latest()->take(5)->get();

        // Order history placeholder.
        // $orders = Order::where('student_id', $student->id)->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'enrolledCoursesCount',
            'activeCoursesCount',
            'completedCoursesCount',
            'recentCourses',
            'quizAttempts',
        ));
    }
}
