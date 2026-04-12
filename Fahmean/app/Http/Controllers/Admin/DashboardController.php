<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function adminDashboard()
    {
        return view('dashboard.index',[
            'students' => User::role('student')->count(),
            'teachers' => User::role('teacher')->count(),
            'courses'  => \App\Models\Course::count(),
            'lessons'  => \App\Models\Lesson::count(),
            'quizzes'  => \App\Models\Quiz::count(),
        ]);
    }
}
