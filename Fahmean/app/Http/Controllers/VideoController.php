<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class VideoController extends Controller
{
    public function showViewer(Request $request)
    {
        $lessonId = $request->get('lesson_id');
        $lesson = Lesson::with('section.course.students')->findOrFail($lessonId);

        $user = auth()->user();
        
        if (!$user->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
            $isEnrolled = $lesson->section->course->students()->where('users.id', $user->id)->exists();
            if (!$isEnrolled) {
                abort(403, 'غير مصرح لك بمشاهدة هذا الفيديو.');
            }
        }

        $videoUrl = null;
        if ($lesson->video_source === 'upload' && $lesson->video) {
            $videoUrl = asset('storage/' . $lesson->video);
        } elseif ($lesson->video_url) {
            $videoUrl = $lesson->video_url;
        }

        if (!$videoUrl) {
            abort(404, 'الفيديو غير متوفر');
        }

        return view('dashboard.student-dashboard.video-viewer', compact('lesson', 'videoUrl', 'user'));
    }
}
