<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->with('subjects')->paginate(10);
        return view('dashboard.admin-dashboard.teachers.subjects.index', compact('teachers'));
    }

    public function edit(User $teacher)
    {
        $subjects = Subject::with('grade.level')->get();
        return view('admin.teachers.subjects.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, User $teacher)
    {
        $request->validate([
            'subjects' => 'array',
            'subjects.*' => 'exists:subjects,id'
        ]);

        $teacher->subjects()->sync($request->subjects ?? []);

        return redirect()->route('admin.teacher-subjects.index')->with('success', 'تم تحديث المواد للمدرس بنجاح.');
    }
}
