<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\EnrollmentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnrollmentRequestController extends Controller
{
    /**
     * عرض قائمة طلبات التسجيل مع فلاتر.
     */
    public function index(Request $request)
    {
        $query = EnrollmentRequest::with(['student', 'course.teacher', 'course.subject', 'processor'])
            ->orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')");

        // فلتر بالحالة
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // فلتر بالكورس
        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        // فلتر بالمدرس: للمدرس نفسه - يرى فقط طلبات كورساته
        $user = Auth::user();
        if ($user->hasRole(['teacher', 'assistant_teacher'])) {
            $teacherId = $user->getEffectiveTeacherId();
            $query->whereHas('course', fn($q) => $q->where('teacher_id', $teacherId));
        }

        $requests = $query->latest()->paginate(15);

        // بيانات للفلاتر
        $courses = $user->hasRole('admin')
            ? Course::orderBy('title')->get(['id', 'title'])
            : Course::where('teacher_id', $user->getEffectiveTeacherId())->orderBy('title')->get(['id', 'title']);

        // عدد الطلبات pending للـ badge
        $pendingCount = EnrollmentRequest::pending()
            ->when($user->hasRole(['teacher', 'assistant_teacher']), function ($q) use ($user) {
                $q->whereHas('course', fn($qq) => $qq->where('teacher_id', $user->getEffectiveTeacherId()));
            })
            ->count();

        return view('dashboard.admin-dashboard.enrollment-requests.index', compact(
            'requests', 'courses', 'pendingCount'
        ));
    }

    /**
     * قبول الطلب وتسجيل الطالب في الكورس.
     */
    public function enroll(EnrollmentRequest $enrollmentRequest)
    {
        if (! $enrollmentRequest->isPending()) {
            return back()->with('info', 'هذا الطلب تم معالجته مسبقاً.');
        }

        DB::transaction(function () use ($enrollmentRequest) {
            $course = $enrollmentRequest->course;
            $studentId = $enrollmentRequest->student_id;

            // التحقق مما إذا كان هناك سجل قديم (غير نشط) في جدول المحور
            $existing = DB::table('course_student')
                ->where('course_id', $course->id)
                ->where('student_id', $studentId)
                ->first();

            if ($existing) {
                // إعادة التفعيل مع الحفاظ على الداتا والأنشطة القديمة
                $course->students()->updateExistingPivot($studentId, [
                    'status' => 'active',
                    'updated_at' => now()
                ]);
            } else {
                // تسجيل جديد لأول مرة
                $course->students()->attach($studentId, [
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // حذف طلب التسجيل بعد إتمام العملية
            $enrollmentRequest->delete();
        });

        return back()->with('success', 'تم تفعيل دخول الطالب في الكورس بنجاح (مع استعادة بياناته السابقة إن وجدت).');
    }

    /**
     * رفض طلب التسجيل.
     */
    public function reject(Request $request, EnrollmentRequest $enrollmentRequest)
    {
        if (! $enrollmentRequest->isPending()) {
            return back()->with('info', 'هذا الطلب تم معالجته مسبقاً.');
        }

        $enrollmentRequest->update([
            'status'       => 'rejected',
            'notes'        => $request->notes,
            'processed_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        return back()->with('success', 'تم رفض طلب التسجيل.');
    }

    /**
     * إلغاء تسجيل الطالب من الكورس مع الاحتفاظ بكل بياناته وأنشطته.
     */
    public function unenroll(Course $course, User $user)
    {
        // تحديث حالة التسجيل إلى inactive بدلاً من الحذف للحفاظ على البيانات
        DB::table('course_student')
            ->where('course_id', $course->id)
            ->where('student_id', $user->id)
            ->update(['status' => 'inactive']);

        // إعادة الطلب لحالة pending حتى يمكن إعادة تسجيله لاحقاً
        EnrollmentRequest::where('student_id', $user->id)
            ->where('course_id', $course->id)
            ->update([
                'status'       => 'rejected',
                'notes'        => 'تم إلغاء التسجيل بواسطة ' . Auth::user()->name,
                'processed_by' => Auth::id(),
                'processed_at' => now(),
            ]);

        return back()->with('success', 'تم إلغاء تسجيل الطالب من الكورس مع الاحتفاظ بكل بياناته.');
    }
}
