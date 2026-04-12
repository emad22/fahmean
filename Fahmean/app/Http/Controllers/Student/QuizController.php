<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Show all available quizzes for the student (My Quizzes).
     */
    public function myQuizzes()
    {
        $student = auth()->user();
        
        // 1. Quizzes from Enrolled Courses
        $enrolledCourseIds = $student->enrolledCourses()->pluck('courses.id');
        
        // Fetch quizzes related to these courses via sections
         $courseQuizzes = Quiz::whereHas('section.course', function($q) use ($enrolledCourseIds) {
            $q->whereIn('id', $enrolledCourseIds);
        })->with(['section.course', 'students' => function($q) use ($student) {
            $q->where('student_id', $student->id);
        }])->get();

        // 2. Quizzes explicitly assigned to student (General Exams or Manual Entry)
        // These are quizzes in quiz_student pivot but might NOT be in the enrolled courses list above.
        $assignedQuizzes = $student->quizzes()
            ->with(['section.course', 'students' => function($q) use ($student) {
                $q->where('student_id', $student->id);
            }])
            ->get(); // This relation should be defined in User model (belongsToMany Quiz)

        // Merge and unique by ID
        $allQuizzes = $courseQuizzes->concat($assignedQuizzes)->unique('id');

        return view('dashboard.student.my-quizzes', compact('allQuizzes'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    /**
     * Show the quiz to the student (Direct Access).
     */
    public function showDirect($id)
    {
        return $this->show(0, $id); // Pass 0 as generic course_id
    }

    /**
     * Show the quiz to the student.
     */
    public function show($course_id, $id)
    {
        $quiz = Quiz::with(['questions.answers', 'section'])->findOrFail($id);
        $studentId = auth()->id();
        
        // If course_id is passed as null or 0, try to get it from relation if exists
        if (!$course_id && $quiz->section && $quiz->section->course_id) {
            $course_id = $quiz->section->course_id;
        }

        // check if student already attempted the quiz
        $attempt = $quiz->students()->where('student_id', $studentId)->first();
        
        $userAnswers = [];
        $canRetake = true;
        $showResults = false;

        if ($attempt && $attempt->pivot->completed) {
            $userAnswers = json_decode($attempt->pivot->user_answers, true);
            $showResults = true;
            
            // Check if can retake
            if ($attempt->pivot->attempt_count >= ($quiz->attempts_limit ?? 1)) {
                $canRetake = false;
            }
        }

        // If student wants to retake and has attempts left
        if (request()->has('retake') && $canRetake) {
            $showResults = false;
        }

        return view('dashboard.student.quiz-show', compact('quiz', 'attempt', 'course_id', 'userAnswers', 'showResults', 'canRetake'))
            ->with([
                'header' => 'false',
                'footer' => 'false',
                'topToBottom' => 'false'
            ]);
    }

    /**
     * Submit quiz and calculate score.
     */
    public function submit(Request $request, $course_id, $id)
    {
        try {
            $quiz = Quiz::with(['questions.answers'])->findOrFail($id);
            $studentId = auth()->id();

            $userAnswers = $request->input('answers', []); // format: [question_id => answer_id]
            $totalQuestions = $quiz->questions->count();
            $correctCount = 0;

            foreach ($quiz->questions as $question) {
                // Use pre-loaded collection instead of individual queries
                $correctAnswer = $question->answers->where('is_correct', 1)->first();
                
                if ($correctAnswer && in_array($question->type, ['mcq', 'tf', 'multiple_choice', 'true_false'])) {
                    if (isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $correctAnswer->id) {
                        $correctCount++;
                    }
                }
            }

            $score = ($totalQuestions > 0) ? round(($correctCount / $totalQuestions) * 100) : 0;

            // Get existing attempt to check count
            $existingAttempt = $quiz->students()->where('student_id', $studentId)->first();
            $newCount = ($existingAttempt ? $existingAttempt->pivot->attempt_count : 0) + 1;

            // Final check on limit before saving
            if ($existingAttempt && $existingAttempt->pivot->completed && $newCount > ($quiz->attempts_limit ?? 1)) {
                return redirect()->route('student.quizzes.show', [$course_id, $id])
                    ->with('error', 'لقد تجاوزت الحد الأقصى للمحاولات لهذا الاختبار.');
            }

            // Save progress
            $quiz->students()->syncWithoutDetaching([
                $studentId => [
                    'score' => (int)$score,
                    'completed' => 1,
                    'user_answers' => json_encode($userAnswers),
                    'attempt_count' => $newCount
                ]
            ]);

            return redirect()->route('student.quizzes.show', [$course_id, $id])
                ->with('success', "تم إنهاء الاختبار! محاولة رقم {$newCount}. درجتك هي: {$score}% ({$correctCount} من {$totalQuestions})");

        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء حفظ الإجابات: ' . $e->getMessage());
        }
    }
}
