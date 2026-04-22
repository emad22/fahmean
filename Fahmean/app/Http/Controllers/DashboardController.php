<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


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
