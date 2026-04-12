<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    public function index()
    {
        $levels = EducationLevel::all();
        return view('dashboard.admin-dashboard.education-levels.index', compact('levels'));
    }

    public function create()
    {
        return view('dashboard.admin-dashboard.education-levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:191',
        ]);

        EducationLevel::create([
            'name'  => $request->name,
        ]);

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', 'تم إنشاء المرحلة بنجاح');
    }

    public function edit(EducationLevel $education_level)
    {
        return view('dashboard.admin-dashboard.education-levels.edit', compact('education_level'));
    }

    public function update(Request $request, EducationLevel $education_level)
    {
        $request->validate([
            'name'  => 'required|string|max:191',
            'order' => 'nullable|integer',
        ]);

        $education_level->update([
            'name'  => $request->name,
            'order' => $request->order ?? 0,
        ]);

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', 'تم تحديث المرحلة بنجاح');
    }

    public function destroy(EducationLevel $education_level)
    {
        $education_level->delete();

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', 'تم حذف المرحلة بنجاح');
    }
}
