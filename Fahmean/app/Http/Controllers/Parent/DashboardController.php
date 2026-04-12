<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    /**
     * Display the parent dashboard with children stats.
     */
    public function index()
    {
        $parent = auth()->user();
        $children = $parent->children()->with('courses', 'quizzes')->get();

        return view('dashboard.parent-dashboard.index', compact('parent', 'children'));
    }

    /**
     * Show detailed progress for a specific child.
     */
    /**
     * Show detailed progress for a specific child.
     */
    public function childProgress($student_id)
    {
        $parent = auth()->user();
        
        // Ensure this student belongs to this parent
        $child = $parent->children()->where('student_id', $student_id)->with('courses', 'quizzes')->firstOrFail();

        return view('dashboard.parent-dashboard.child-progress', compact('child'));
    }

    /**
     * Link a child account to the parent.
     */
    public function linkChild(Request $request)
    {
        $request->validate([
            'student_identifier' => 'required|email|exists:users,email',
        ]);

        $user = \App\Models\User::where('email', $request->student_identifier)->first();

        // Check if user has a student profile
        if (!$user->student) {
             return back()->with('error', 'هذا المستخدم ليس مسجلاً كطالب.');
        }

        $student = $user->student;
        $parent = auth()->user();

        // Check if already linked
        if ($parent->children()->where('student_id', $student->id)->exists()) {
            return back()->with('error', 'هذا الطالب مرتبط بحسابك بالفعل.');
        }

        // Create link
        $parent->children()->attach($student->id);

        return back()->with('success', 'تم ربط حساب الطالب بنجاح.');
    }
}
