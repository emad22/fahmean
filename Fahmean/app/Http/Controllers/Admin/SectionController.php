<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:100'
        ]);

        $section = Section::create([
            'course_id' => $course->id,
            'title'     => $request->title
        ]);

        return response()->json([
            'id'    => $section->id,
            'title' => $section->title
        ]);
    }
}
