<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Order;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user()->student; // User → Student

        if (!$student) {
            return view('dashboard.index', [
                'enrolledCoursesCount' => 0,
                'activeCoursesCount' => 0,
                'completedCoursesCount' => 0,
                'recentCourses' => collect(),
                'quizAttempts' => collect(),
            ])->with('warning', 'You are viewing this page as Admin without a Student profile.');
        }

        // dd($student);
        $enrolledCoursesCount = $student->courses()->count();

        // عدد الكورسات النشطة (مثلاً الكورسات اللي فيها دروس غير مكتملة)
        $activeCoursesCount = $student->courses()->whereHas('lessons', function ($q) use ($student) {
            $q->whereDoesntHave('completedStudents', function ($qq) use ($student) {
                $qq->where('student_id', $student->id);
            });
        })->count();

        // عدد الكورسات المكتملة
        $completedCoursesCount = $student->courses()->whereHas('lessons', function ($q) use ($student) {
            $q->whereHas('completedStudents', function ($qq) use ($student) {
                $qq->where('student_id', $student->id);
            });
        })->count();

        // آخر 5 الكورسات المسجلة
        $recentCourses = $student->courses()->latest()->take(5)->get();

        // آخر 5 محاولات الاختبارات
        $quizAttempts = $student->quizzes()->latest()->take(5)->get();

        // الرغبات (Wishlist)
        // $wishlist = Wishlist::where('student_id', $student->id)->latest()->take(5)->get();

        // الطلبات الأخيرة (Order history)
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
