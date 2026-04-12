<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function instructorAnnouncements()
    {
        return view('dashboard/instructor-dashboard/instructorAnnouncements');
    }

    public function instructorAssignments()
    {
        return view('dashboard/instructor-dashboard/instructorAssignments');
    }

    public function instructorDashboard()
    {
        return view('dashboard/instructor-dashboard/instructorDashboard');
    }

    public function instructorEnrolledCourses()
    {
        return view('dashboard/instructor-dashboard/instructorEnrolledCourses');
    }

    public function instructorMyQuizAttempts()
    {
        return view('dashboard/instructor-dashboard/instructorMyQuizAttempts');
    }

    public function instructorOrderHistory()
    {
        return view('dashboard/instructor-dashboard/instructorOrderHistory');
    }

    public function instructorProfile()
    {
        return view('dashboard/instructor-dashboard/instructorProfile');
    }

    public function instructorQuizAttempts()
    {
        return view('dashboard/instructor-dashboard/instructorQuizAttempts');
    }

    public function instructorReviews()
    {
        return view('dashboard/instructor-dashboard/instructorReviews');
    }

    public function instructorSettings()
    {
        return view('dashboard/instructor-dashboard/instructorSettings');
    }

    public function instructorWishlist()
    {
        return view('dashboard/instructor-dashboard/instructorWishlist');
    }

    public function studentDashboard()
    {
        return view('dashboard/student-dashboard/studentDashboard');
    }

    public function studentEnrolledCourses()
    {
        return view('dashboard/student-dashboard/studentEnrolledCourses');
    }

    public function studentMyQuizAttempts()
    {
        $attempts = auth()->user()->quizzes()
            ->with(['section.course', 'lesson'])
            ->latest('quiz_student.updated_at')
            ->get();

        return view('dashboard.student.my-quiz-attempts', compact('attempts'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    public function studentOrderHistory()
    {
        return view('dashboard/student-dashboard/studentOrderHistory');
    }

    public function studentProfile()
    {
        return view('dashboard/student-dashboard/studentProfile');
    }

    public function studentReviews()
    {
        return view('dashboard/student-dashboard/studentReviews');
    }

    public function studentSettings()
    {
        return view('dashboard/student-dashboard/studentSettings');
    }

    public function studentWishlist()
    {
        return view('dashboard/student-dashboard/studentWishlist');
    }

    public function adminDashboard()
    {
        // dd("here");
        return view('dashboard\admin-dashboard\adminDashboard');
    }

    /**
     * Redirect to the appropriate dashboard based on user role.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            // Call Admin Dashboard Logic directly
            return app(\App\Http\Controllers\Admin\DashboardController::class)->adminDashboard();
        } 
        
        if ($user->hasRole('teacher') || $user->hasRole('assistant_teacher')) {
            // Call Teacher Dashboard Logic directly
            return app(\App\Http\Controllers\teacher\DashboardController::class)->teacherDashboard();
        } 
        
        if ($user->hasRole('student')) {
            // Call Student Dashboard Logic directly
            return app(\App\Http\Controllers\Student\DashboardController::class)->index();
        }

        if ($user->hasRole('parent')) {
            // Call Parent Dashboard Logic
            return app(\App\Http\Controllers\Parent\DashboardController::class)->index();
        }

        return redirect('/');
    }
}
