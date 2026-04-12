<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class QuizController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view quiz', only: ['index', 'showAttempts', 'showAttemptDetails', 'manageStudents']),
            new Middleware('permission:create quiz', only: ['create', 'store', 'addStudent', 'addStudentsByGrade']),
            new Middleware('permission:edit quiz', only: ['edit', 'update', 'resetAttempt', 'removeStudent']),
            new Middleware('permission:delete quiz', only: ['destroy']),
        ];
    }
    public function index()
    {
        $user = auth()->user();
        $query = Quiz::with(['section.course', 'lesson', 'teacher'])->latest();
        
        if ($user->hasRole('teacher') || $user->hasRole('assistant_teacher')) {
            // Get quizzes owned by teacher OR attached to teacher's courses
            $query->where(function($q) use ($user) {
                $q->where('teacher_id', $user->id)
                  ->orWhereHas('section.course', function($sq) use ($user) {
                      $sq->where('teacher_id', $user->id);
                  });
            });
        }
        
        $quizzes = $query->paginate(10);
        return view('dashboard.admin-dashboard.quizzes.index', compact('quizzes'))
            ->with('routePrefix', 'quizzes');
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('teacher') || $user->hasRole('assistant_teacher')) {
            $courses = Course::where('teacher_id', $user->id)->get();
        } else {
            $courses = Course::all();
        }
        return view('dashboard.admin-dashboard.quizzes.create', compact('courses'))
            ->with('routePrefix', 'quizzes');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'title'     => 'required|string|max:255',
            'time_limit' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['teacher_id'] = auth()->id();

        // If lesson is selected, get section_id
        if ($request->lesson_id) {
            $lesson = \App\Models\Lesson::find($request->lesson_id);
            $data['section_id'] = $lesson->section_id;
        } elseif ($request->course_id) {
            // If only course is selected, maybe pick first section or handle differently?
            // For now, let's try to get the first section of the course
            $course = Course::with('sections')->find($request->course_id);
            if ($course && $course->sections->count() > 0) {
                $data['section_id'] = $course->sections->first()->id;
            }
        }

        Quiz::create($data);

        return redirect()->route('quizzes.index')->with('success', 'تم إضافة الاختبار بنجاح.');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $user = auth()->user();
        if ($user->hasRole('teacher') || $user->hasRole('assistant_teacher')) {
            $courses = Course::where('teacher_id', $user->id)->get();
        } else {
            $courses = Course::all();
        }
        return view('dashboard.admin-dashboard.quizzes.edit', compact('quiz', 'courses'))
            ->with('routePrefix', 'quizzes');
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'course_id' => 'nullable|exists:courses,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'title'     => 'required|string|max:255',
            'time_limit' => 'nullable|integer'
        ]);

        $data = $request->all();
        
        if ($request->lesson_id) {
            $lesson = \App\Models\Lesson::find($request->lesson_id);
            $data['section_id'] = $lesson->section_id;
        } elseif ($request->course_id) {
            $course = Course::with('sections')->find($request->course_id);
            if ($course && $course->sections->count() > 0) {
                $data['section_id'] = $course->sections->first()->id;
            }
        } else {
            $data['section_id'] = null;
            $data['lesson_id'] = null;
        }

        $quiz->update($data);

        return redirect()->route('quizzes.index')->with('success', 'تم تحديث الاختبار بنجاح.');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }

    /**
     * View all student attempts for a specific quiz.
     */
    public function showAttempts($id)
    {
        $quiz = Quiz::with(['students' => function($query) {
            $query->latest('quiz_student.created_at');
        }, 'section.course'])->findOrFail($id);

        return view('dashboard.admin-dashboard.quizzes.attempts', compact('quiz'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    /**
     * Reset a student attempt (Delete it).
     */
    public function resetAttempt($quizId, $studentId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $quiz->students()->detach($studentId);

        return back()->with('success', 'تم إعادة تصفير المحاولة للطالب بنجاح ، يمكنه الآن إعادة الاختبار.');
    }

    /**
     * View detailed answers for a specific student attempt.
     */
    public function showAttemptDetails($quizId, $studentId)
    {
        $quiz = Quiz::with(['questions.answers'])->findOrFail($quizId);
        $student = $quiz->students()->where('users.id', $studentId)->firstOrFail();
        
        $userAnswers = [];
        if ($student->pivot->user_answers) {
            $userAnswers = json_decode($student->pivot->user_answers, true);
        }

        return view('dashboard.admin-dashboard.quizzes.attempt-details', compact('quiz', 'student', 'userAnswers'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    /**
     * Manage students for a specific quiz.
     */
    public function manageStudents($id)
    {
        $quiz = Quiz::with(['section.course', 'students'])->findOrFail($id);
        
        $allStudents = collect();

        // 1. Get Course Students (if linked to a course)
        if ($quiz->section && $quiz->section->course) {
            $courseStudents = $quiz->section->course->students()->get();
            
            // Map course students and check if they have quiz data
            $allStudents = $courseStudents->map(function($student) use ($quiz) {
                // Check if this student is also in the quiz->students list (has attempted or added)
                $quizData = $quiz->students->find($student->id);
                
                $student->quiz_pivot = $quizData ? $quizData->pivot : null;
                $student->is_enrolled_in_course = true;
                return $student;
            });
        }

        // 2. Get students who are ONLY in quiz_student (Manual additions) but NOT in course
        // (For general exams OR special students outside the course)
        $manualStudents = $quiz->students->filter(function($student) use ($allStudents) {
            return !$allStudents->contains('id', $student->id);
        })->map(function($student) {
            $student->quiz_pivot = $student->pivot;
            $student->is_enrolled_in_course = false;
            return $student;
        });

        // Merge both lists
        $mergedStudents = $allStudents->concat($manualStudents);

        $levels = \App\Models\EducationLevel::with('grades')->get();

        return view('dashboard.admin-dashboard.quizzes.students', compact('quiz', 'mergedStudents', 'levels'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    /**
 * Add students to the quiz.
 */
public function addStudent(Request $request, $id)
{
    $quiz = Quiz::findOrFail($id);
    
    $request->validate([
        'student_ids' => 'required|array',
        'student_ids.*' => 'exists:users,id'
    ]);

    $existingIds = $quiz->students()->pluck('users.id')->toArray();
    $newIds = array_diff($request->student_ids, $existingIds);

    if (empty($newIds)) {
        return back()->withErrors(['student_ids' => 'جميع الطلاب المختارين مضافون بالفعل لهذا الاختبار.']);
    }

    $quiz->students()->attach($newIds);

    return back()->with('success', 'تم إضافة ' . count($newIds) . ' من الطلاب بنجاح.');
}

/**
 * Bulk add students by grade.
 */
public function addStudentsByGrade(Request $request, $id)
{
    $quiz = Quiz::findOrFail($id);
    
    $request->validate([
        'grade_id' => 'required|exists:grades,id'
    ]);

    $studentUserIds = \App\Models\User::role('student')
        ->whereHas('student', function($q) use ($request) {
            $q->where('grade_id', $request->grade_id);
        })
        ->pluck('id');

    if ($studentUserIds->isEmpty()) {
        return back()->withErrors(['grade_id' => 'لا يوجد طلاب مسجلين في هذا الصف حالياً.']);
    }

    $existingIds = $quiz->students()->pluck('users.id')->toArray();
    $newIds = $studentUserIds->diff($existingIds);

    if ($newIds->isEmpty()) {
        return back()->with('info', 'جميع طلاب هذا الصف مضافون بالفعل لهذا الاختبار.');
    }

    $quiz->students()->attach($newIds);

    return back()->with('success', 'تم إضافة ' . $newIds->count() . ' طلاب من الصف المختار بنجاح.');
}    

    /**
     * Remove a student from the quiz (Revoke access).
     */
    public function removeStudent($quizId, $studentId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $quiz->students()->detach($studentId);

        return back()->with('success', 'تم إزالة الطالب من الاختبار.');
    }

}
