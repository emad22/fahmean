<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CourseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view course', only: ['index', 'show', 'enrolledStudents']),
            new Middleware('permission:create course', only: ['create', 'store', 'addStudentsByGrade']),
            new Middleware('permission:edit course', only: ['edit', 'update', 'updateStatus', 'enrollMultipleStudents']),
            new Middleware('permission:delete course', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::withCount([
            'sections',
            'students', 
            'sections as lessons_count' => function ($query) {
                $query->join('lessons', 'sections.id', '=', 'lessons.section_id');
            }
        ])->with('students:id')->paginate(9);

        $students = User::role('student')->get(['id', 'name', 'email']);
        
        return view('dashboard.admin-dashboard.courses.index', compact('courses', 'students'))
            ->with('routePrefix', 'courses');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = [];
        if (auth()->user()->hasRole('admin')) {
            $teachers = User::role('teacher')->get();
        }
        $subjects = Subject::all();

        return view('dashboard.admin-dashboard.courses.create', compact('teachers','subjects'))
            ->with('routePrefix', 'courses');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $teacher = auth()->user()->hasRole('admin')
                ? User::findOrFail($request->teacher_id)
                : auth()->user();

            $subjectId = $teacher->subjects()->first()?->id;

            $course = Course::create([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'teacher_id'    => $teacher->id,
                'subject_id'    => $subjectId,
                'video_source'  => $request->video_source,
                'video_url'     => $request->video_url,
                'academic_year' => $request->academic_year,
                'status'        => 'draft',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('courses', 'public');
                $course->update(['image' => $path]);
            }

            $sectionsData = json_decode($request->sections_data, true);
            $this->saveCourseContent($course, $sectionsData);

            DB::commit();
            return redirect()->route('courses.index')->with('success', 'تم إنشاء الكورس بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $course    = Course::findOrFail($id);
        $teachers  = User::role('teacher')->get();

        return view('dashboard.admin-dashboard.courses.edit', compact('course', 'teachers'))
            ->with('routePrefix', 'courses');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        // Security: Ensure teacher owns the course if they aren't admin
        if (!auth()->user()->hasRole('admin') && $course->teacher_id != auth()->id()) {
            return back()->withErrors(['error' => 'عذراً، لا تملك صلاحية تعديل هذا الكورس.']);
        }

        DB::beginTransaction();
        try {
            $rules = [
                'title'          => 'required',
                'price'          => 'required|numeric',
                'image'          => 'nullable|image',
                'academic_year'  => 'nullable|string',
            ];

            if (auth()->user()->hasRole(['admin'])) {
                $rules['teacher_id'] = 'required';
            }

            $request->validate($rules);

            $image = $course->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('courses', 'public');
            }

            $updateData = [
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'image'         => $image,
                'video_source'  => $request->video_source,
                'video_url'     => $request->video_url,
                'academic_year' => $request->academic_year,
                'status'        => $request->status ?? 'draft',
            ];

            if (auth()->user()->hasRole('admin')) {
                $updateData['teacher_id'] = $request->teacher_id;
            } else {
                // For teachers/assistant teachers, ensure we don't clear the teacher_id
                $updateData['teacher_id'] = $course->teacher_id;
            }

            $course->update($updateData);

            if ($request->has('sections_data')) {
                // Remove existing structure for full sync with builder snapshot
                foreach ($course->sections as $section) {
                    $section->lessons()->delete();
                    $section->quizzes()->delete();
                    $section->assignments()->delete();
                }
                $course->sections()->delete();

                $sectionsData = json_decode($request->sections_data, true);
                $this->saveCourseContent($course, $sectionsData);
            }

            DB::commit();
            return redirect()->route('courses.index')->with('success', 'تم تحديث الكورس بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function saveCourseContent($course, $sectionsData)
    {
        if (!$sectionsData) return;

        foreach ($sectionsData as $sectionData) {
            $section = Section::create([
                'course_id' => $course->id,
                'title'     => $sectionData['title'],
            ]);

            if (!empty($sectionData['lessons'])) {
                foreach ($sectionData['lessons'] as $lessonData) {
                    $lesson = Lesson::create([
                        'section_id'   => $section->id,
                        'title'        => $lessonData['title'],
                        'content'      => $lessonData['content'] ?? null,
                        'duration'     => $lessonData['duration'] ?? null,
                        'video_source' => $lessonData['video_source'] ?? null,
                        'video_url'    => $lessonData['video_url'] ?? null,
                        'pdf'          => $lessonData['pdf'] ?? null,
                        'audio'        => $lessonData['audio'] ?? null,
                        'video'        => ($lessonData['video_source'] === 'upload') ? ($lessonData['video'] ?? null) : null,
                    ]);

                    if (!empty($lessonData['quizzes'])) {
                        foreach ($lessonData['quizzes'] as $quizData) {
                            $this->createQuizWithQuestions($section->id, $lesson->id, $quizData);
                        }
                    }
                }
            }

            if (!empty($sectionData['quizzes'])) {
                foreach ($sectionData['quizzes'] as $quizData) {
                    $this->createQuizWithQuestions($section->id, null, $quizData);
                }
            }
        }
    }

    private function createQuizWithQuestions($sectionId, $lessonId, $quizData)
    {
        $quiz = Quiz::create([
            'section_id' => $sectionId,
            'lesson_id'  => $lessonId,
            'title'      => $quizData['title'],
            'type'       => $quizData['type'] ?? 'normal',
        ]);

        if (!empty($quizData['questions'])) {
            foreach ($quizData['questions'] as $qData) {
                // Map short names to database enum values
                $dbType = $qData['type'] ?? 'mcq';
                if ($dbType === 'mcq') $dbType = 'multiple_choice';
                if ($dbType === 'tf')  $dbType = 'true_false';

                $question = Question::create([
                    'quiz_id'  => $quiz->id,
                    'question' => $qData['text'] ?? $qData['question'] ?? 'سؤال بدون عنوان',
                    'type'     => $dbType,
                ]);

                if (!empty($qData['answers'])) {
                    foreach ($qData['answers'] as $aData) {
                        Answer::create([
                            'question_id' => $question->id,
                            'answer'      => $aData['text'] ?? $aData['answer'] ?? '',
                            'is_correct'  => !empty($aData['is_correct']) ? 1 : 0,
                        ]);
                    }
                }
            }
        }
    }

    public function destroy($id)
    {
        $course = Course::with('sections.lessons', 'sections.quizzes', 'sections.assignments')
            ->findOrFail($id);

        foreach ($course->sections as $section) {
            $section->lessons()->delete();
            $section->quizzes()->delete();
            $section->assignments()->delete();
        }

        $course->sections()->delete();
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'تم حذف الكورس وكل ما يتعلق به بنجاح.');
    }

    public function enrollMultipleStudents(Request $request, Course $course)
    {
        $request->validate(['students' => 'required|array']);
        $course->students()->syncWithoutDetaching($request->students);
        return redirect()->back()->with('success', 'تم تسجيل الطلاب في الكورس بنجاح.');
    }

    public function updateStatus(Request $request, Course $course)
    {
        $request->validate(['status' => 'required|in:draft,published']);
        $course->update(['status' => $request->status]);
        return back()->with('success', 'تم تحديث حالة الكورس بنجاح');
    }

    public function enrolledStudents($id)
    {
        $course = Course::with(['students' => function($q) {
            $q->withPivot('created_at');
        }])->findOrFail($id);

        $levels = \App\Models\EducationLevel::with('grades')->get();

        return view('dashboard.admin-dashboard.courses.students', compact('course', 'levels'))
            ->with('routePrefix', 'courses');
    }

    /**
     * Bulk add students to course by grade.
     */
    public function addStudentsByGrade(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        
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

        $existingIds = $course->students()->pluck('users.id')->toArray();
        $newIds = $studentUserIds->diff($existingIds);

        if ($newIds->isEmpty()) {
            return back()->with('info', 'جميع طلاب هذا الصف مسجلون بالفعل في هذا الكورس.');
        }

        $course->students()->attach($newIds);

        return back()->with('success', 'تم تسجيل ' . $newIds->count() . ' طلاب من الصف المختار بنجاح.');
    }
}
