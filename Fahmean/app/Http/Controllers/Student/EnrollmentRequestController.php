<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\EnrollmentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnrollmentRequestController extends Controller
{
    /**
     * عرض الكورسات المتاحة لصف/سنة الطالب التي لم يسجّل فيها بعد.
     */
    public function availableCourses()
    {
        $user    = Auth::user();
        $student = $user->student;

        if (! $student) {
            abort(404, 'لم يتم العثور على ملف الطالب.');
        }

        // الكورسات المسجّل فيها فعلياً — نستخدم user_id مباشرة من course_student
        $enrolledCourseIds = DB::table('course_student')
            ->where('student_id', $user->id)
            ->pluck('course_id')
            ->toArray();

        // كل طلبات الطالب (pending أو approved أو rejected)
        $myRequests = EnrollmentRequest::where('student_id', $user->id)
            ->pluck('status', 'course_id');

        $requestedCourseIds = $myRequests->keys()->toArray();

        // الكورسات المتاحة: منشورة + لصف الطالب + غير مسجّل فيها
        $availableCourses = Course::where('status', 'published')
            ->where('academic_year', $student->academic_year)
            ->whereHas('subject', function ($q) use ($student) {
                $q->where('grade_id', $student->grade_id);
            })
            ->whereNotIn('id', $enrolledCourseIds)
            ->with(['subject', 'teacher'])
            ->withCount('sections')
            ->get();

        return view('dashboard.student.available-courses', compact(
            'availableCourses',
            'myRequests',
            'enrolledCourseIds',
            'requestedCourseIds'
        ));
    }

    /**
     * إرسال طلب التسجيل في كورس.
     */
    public function store(Course $course)
    {
        $user    = Auth::user();
        $student = $user->student;

        if (! $student) {
            return back()->withErrors(['error' => 'لم يتم العثور على ملف الطالب.']);
        }

        // تحقق: هل الطالب مسجّل في الكورس بالفعل؟
        $alreadyEnrolled = DB::table('course_student')
            ->where('student_id', $user->id)
            ->where('course_id', $course->id)
            ->exists();

        if ($alreadyEnrolled) {
            return back()->with('info', 'أنت مسجّل في هذا الكورس بالفعل.');
        }

        // تحقق: هل أرسل طلباً من قبل؟
        $existing = EnrollmentRequest::where('student_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($existing) {
            if ($existing->status === 'rejected') {
                // إذا كان مرفوضاً، نسمح له بتقديم طلب جديد (نحذف القديم أولاً)
                $existing->delete();
            } else {
                return back()->with('info', 'لقد أرسلت طلب التسجيل في هذا الكورس بالفعل. حالته: ' . $this->statusLabel($existing->status));
            }
        }

        EnrollmentRequest::create([
            'student_id' => $user->id,
            'course_id'  => $course->id,
            'status'     => 'pending',
        ]);

        return back()->with('success', 'تم إرسال طلب التسجيل بنجاح! سيتم التواصل معك قريباً.');
    }

    /**
     * عرض طلبات التسجيل الخاصة بالطالب.
     */
    public function myRequests()
    {
        $user = Auth::user();

        $requests = EnrollmentRequest::where('student_id', $user->id)
            ->with(['course.teacher', 'course.subject'])
            ->latest()
            ->paginate(10);

        return view('dashboard.student.my-enrollment-requests', compact('requests'));
    }

    private function statusLabel(string $status): string
    {
        return match ($status) {
            'pending'  => 'قيد الانتظار',
            'approved' => 'مقبول',
            'rejected' => 'مرفوض',
            default    => $status,
        };
    }
}
