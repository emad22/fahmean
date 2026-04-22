<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\EnrollmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user    = Auth::user();
        $student = $user->student;

        if (! $student) {
            return view('dashboard.index', [
                'enrolledCoursesCount' => 0,
                'activeCoursesCount'   => 0,
                'completedCoursesCount'=> 0,
                'pendingRequestsCount' => 0,
                'recentCourses'        => collect(),
                'quizAttempts'         => collect(),
            ]);
        }

        // ---- استخدام activeCourses() الصحيحة ----
        $enrolledCoursesCount = $user->activeCourses()->count();

        // كورسات فيها درس لم يُكمله بعد
        $activeCoursesCount = $user->activeCourses()
            ->whereHas('lessons', function ($q) use ($user) {
                $q->whereDoesntHave('completedStudents', function ($qq) use ($user) {
                    $qq->where('student_id', $user->id);
                });
            })->count();

        // كورسات أكمل فيها درساً واحداً على الأقل
        $completedCoursesCount = $user->activeCourses()
            ->whereHas('lessons', function ($q) use ($user) {
                $q->whereHas('completedStudents', function ($qq) use ($user) {
                    $qq->where('student_id', $user->id);
                });
            })->count();

        // آخر 5 كورسات مسجّل فيها
        $recentCourses = $user->activeCourses()
            ->with(['teacher', 'subject'])
            ->latest('course_student.created_at')
            ->take(5)
            ->get();

        // آخر 5 محاولات اختبار — quiz_student.student_id = students.id
        $quizAttempts = $student->quizzes()->latest()->take(5)->get();

        // طلبات التسجيل المعلّقة
        $pendingRequestsCount = EnrollmentRequest::where('student_id', $user->id)
            ->where('status', 'pending')
            ->count();

        return view('dashboard.index', compact(
            'enrolledCoursesCount',
            'activeCoursesCount',
            'completedCoursesCount',
            'pendingRequestsCount',
            'recentCourses',
            'quizAttempts',
        ));
    }
}
