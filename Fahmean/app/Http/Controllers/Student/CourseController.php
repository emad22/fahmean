<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * عرض الكورسات التي سجّل فيها الطالب بعد موافقة الأدمن/المدرس.
     */
    public function index()
    {
        $user = Auth::user();

        // للأدمن والمدرس عند الاختبار — لا يملكون student profile
        if (! $user->student && $user->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
            return view('dashboard.student.enrolled-courses', [
                'enrolled'  => collect(),
                'active'    => collect(),
                'completed' => collect(),
            ]);
        }

        if (! $user->student) {
            abort(404, 'Student profile not found.');
        }

        // استخدام activeCourses() — التي تفلتر status = active ✅
        $enrolled  = $user->activeCourses()->with(['teacher', 'subject'])->withCount('sections')->get();
        $active    = $user->activeCourses()->wherePivot('status', 'active')->get();
        $completed = $user->activeCourses()->wherePivot('status', 'completed')->get();

        return view('dashboard.student.enrolled-courses', compact('enrolled', 'active', 'completed'));
    }

    /**
     * عرض محتوى كورس محدد للطالب.
     */
    public function show($id)
    {
        $user = Auth::user();

        $course = Course::with([
            'sections.lessons',
            'sections.quizzes',
            'teacher',
        ])->findOrFail($id);

        // التحقق من أن الطالب مسجّل في الكورس (بشكل نشط)
        if ($user->hasRole('student')) {
            $isEnrolled = $user->activeCourses()->where('courses.id', $id)->exists();
            if (! $isEnrolled) {
                return redirect()->route('student.available-courses')
                    ->with('info', 'يجب أن تكون مسجّلاً في هذا الكورس للوصول إليه.');
            }
        }

        return view('dashboard.student.course-show', compact('course'));
    }
}
