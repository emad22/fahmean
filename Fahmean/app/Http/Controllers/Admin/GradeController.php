<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('level')->latest()->paginate(10);
        return view('dashboard.admin-dashboard.grades.index', compact('grades'));
    }

    public function create()
    {
        $levels = EducationLevel::all();
        return view('dashboard.admin-dashboard.grades.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'education_level_id' => 'required|exists:education_levels,id'
        ]);

        Grade::create($request->all());

        return redirect()->route('admin.grades.index')
            ->with('success', 'تم اضافة الصف بنجاح');
    }

    public function edit(Grade $grade)
    {
        $levels = EducationLevel::all();
        return view('dashboard.admin-dashboard.grades.edit', compact('grade', 'levels'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required',
            'education_level_id' => 'required|exists:education_levels,id'
        ]);

        $grade->update($request->all());

        return redirect()->route('admin.grades.index')
            ->with('success', 'تم تحديث الصف بنجاح');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grades.index')
            ->with('success', 'تم حذف الصف بنجاح');
    }
}
