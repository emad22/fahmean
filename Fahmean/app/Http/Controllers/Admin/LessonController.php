<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonFile;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LessonController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view lesson', only: ['index', 'getLessonsByCourse']),
            new Middleware('permission:create lesson', only: ['create', 'store', 'ajaxStore', 'uploadMedia', 'tempUpload']),
            new Middleware('permission:edit lesson', only: ['edit', 'update']),
            new Middleware('permission:delete lesson', only: ['destroy']),
        ];
    }
    public function index()
    {
        $lessons = Lesson::with('section.course')
            ->latest()
            ->paginate(10);

        return view('dashboard.admin-dashboard.lessons.index', compact('lessons'))
            ->with('routePrefix', 'lessons');
    }

    public function create()
    {
        $courses = Course::all();
        return view('dashboard.admin-dashboard.lessons.create', compact('courses'))
            ->with('routePrefix', 'lessons');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title'     => 'required',
            'video_url' => 'nullable|url',
            'pdf'       => 'nullable|file|mimes:pdf',
            'audio'     => 'nullable|file|mimes:mp3,wav',
            'duration'  => 'nullable|string',
        ]);

        $pdfPath = $request->file('pdf') ? $request->file('pdf')->store('lessons/pdf', 'public') : null;
        $audioPath = $request->file('audio') ? $request->file('audio')->store('lessons/audio', 'public') : null;

        Lesson::create([
            'course_id' => $request->course_id,
            'title'     => $request->title,
            'video_url' => $request->video_url,
            'pdf'       => $pdfPath,
            'audio'     => $audioPath,
            'duration'  => $request->duration,
        ]);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function edit($id)
    {
        $lesson  = Lesson::findOrFail($id);
        $courses = Course::all();
        return view('dashboard.admin-dashboard.lessons.edit', compact('lesson', 'courses'))
            ->with('routePrefix', 'lessons');
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title'     => 'required',
            'video_url' => 'nullable|url',
            'pdf'       => 'nullable|file|mimes:pdf',
            'audio'     => 'nullable|file|mimes:mp3,wav',
            'duration'  => 'nullable|string',
        ]);

        $pdfPath = $lesson->pdf;
        $audioPath = $lesson->audio;

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('lessons/pdf', 'public');
        }

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('lessons/audio', 'public');
        }

        $lesson->update([
            'course_id' => $request->course_id,
            'title'     => $request->title,
            'video_url' => $request->video_url,
            'pdf'       => $pdfPath,
            'audio'     => $audioPath,
            'duration'  => $request->duration,
        ]);

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted.');
    }

    public function getLessonsByCourse($courseId)
    {
        $course = Course::with('sections.lessons')->findOrFail($courseId);
        $lessons = $course->lessons; // Uses hasManyThrough relationship
        return response()->json($lessons);
    }


    public function ajaxStore(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title'      => 'required|string|max:255',
            'content'    => 'nullable|string',
            'duration'   => 'nullable|string',
        ]);

        $lesson = Lesson::create([
            'section_id' => $request->section_id,
            'title'      => $request->title,
            'content'    => $request->content,
            'duration'   => $request->duration,
            'status'     => 'draft',
        ]);

        return response()->json([
            'lesson_id' => $lesson->id
        ]);
    }


    public function uploadMedia(Request $request, Lesson $lesson)
    {
        $request->validate([
            'type' => 'required|in:video,pdf,audio',
            'file' => 'required|file|max:512000', // 500MB
        ]);

        $path = $request->file('file')->store('lessons', 'public');

        LessonFile::create([
            'lesson_id' => $lesson->id,
            'type'      => $request->type,
            'path'      => $path,
        ]);

        return response()->json([
            'success' => true,
            'path'    => $path,
        ]);
    }

    public function tempUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:512000',
        ]);

        $path = $request->file('file')->store('temp_uploads', 'public');

        return response()->json([
            'success' => true,
            'path'    => $path,
        ]);
    }
}
