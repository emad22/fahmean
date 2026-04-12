<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($quiz_id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($quiz_id);
        $routePrefix = 'questions';
        return view('dashboard.admin-dashboard.questions.index', compact('quiz', 'routePrefix'));
    }

    public function create($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $routePrefix = 'questions';
        return view('dashboard.admin-dashboard.questions.create', compact('quiz', 'routePrefix'));
    }

    public function store(Request $request, $quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);

        $request->validate([
            'question' => 'required|string|max:1000',
            'type'     => 'required|in:multiple_choice,true_false,essay',
            'answers'  => 'array',
            'correct_answers' => 'array'
        ]);

        $question = $quiz->questions()->create([
            'question' => $request->question,
            'type'     => $request->type
        ]);


        // حفظ الإجابات للـ multiple_choice و true_false
        if (in_array($request->type, ['multiple_choice', 'true_false']) && $request->answers) {
            foreach ($request->answers as $ans) {
                $question->answers()->create([
                    'answer' => $ans['answer'] ?? '',
                    'is_correct' => isset($ans['is_correct']) ? 1 : 0,
                ]);
            }
        }


        return redirect()->route('questions.index', $quiz->id)->with('success', 'Question added successfully.');
    }

    public function edit($quiz_id, $id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::with('answers')->findOrFail($id);
        $routePrefix = 'questions';
        return view('dashboard.admin-dashboard.questions.edit', compact('quiz', 'question', 'routePrefix'));
    }

    public function update(Request $request, $quiz_id, $id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::with('answers')->findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:1000',
            'type'     => 'required|in:multiple_choice,true_false,essay',
            'answers'  => 'array',
            'correct_answers' => 'array'
        ]);

        $question->update([
            'question' => $request->question,
            'type'     => $request->type
        ]);

        // تحديث الإجابات
        if (in_array($request->type, ['multiple_choice', 'true_false']) && $request->answers) {
            $question->answers()->delete(); // حذف القديم
            foreach ($request->answers as $ans) {
                $question->answers()->create([
                    'answer' => $ans['answer'] ?? '',
                    'is_correct' => isset($ans['is_correct']) ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('questions.index', $quiz->id)->with('success', 'Question updated successfully.');
    }

    public function destroy($quiz_id, $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index', $quiz_id)->with('success', 'Question deleted successfully.');
    }
}
