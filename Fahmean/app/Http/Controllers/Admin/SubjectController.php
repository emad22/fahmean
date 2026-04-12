<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('grade.level')->paginate(10);
        return view('dashboard.admin-dashboard.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::with('level')->get();
        return view('dashboard.admin-dashboard.subjects.create', compact('grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id',
        ]);

        Subject::create([
            'name' => $request->name,
            'grade_id' => $request->grade_id,
        ]);

        return redirect()->route('admin.subjects.index')->with('success', 'تم إضافة المادة بنجاح.');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::with('level')->get();

        return view('dashboard.admin-dashboard.subjects.edit', compact('subject', 'grades'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $subject->update([
            'name' => $request->name,
            'grade_id' => $request->grade_id,
        ]);

        return redirect()->route('admin.subjects.index')->with('success', 'تم تحديث البيانات بنجاح.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('success', 'تم حذف المادة بنجاح.');
    }
}
