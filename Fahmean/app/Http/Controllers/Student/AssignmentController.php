<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display student's assignments.
     */
    public function index()
    {
        $student = auth()->user();
        
        // Get all assignments from enrolled courses
        $assignments = Assignment::whereHas('section.course.students', function($query) use ($student) {
            $query->where('users.id', $student->id);
        })
        ->with(['section.course', 'submissions' => function($query) use ($student) {
            $query->where('student_id', $student->id);
        }])
        ->orderBy('due_date', 'asc')
        ->get();

        return view('dashboard.student-dashboard.assignments.index', compact('assignments'));
    }

    /**
     * Show assignment details.
     */
    public function show(Assignment $assignment)
    {
        $student = auth()->user();
        
        $submission = $assignment->submissions()
            ->where('student_id', $student->id)
            ->first();

        return view('dashboard.student-dashboard.assignments.show', compact('assignment', 'submission'));
    }

    /**
     * Submit assignment.
     */
    public function submit(Request $request, Assignment $assignment)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'comment' => 'nullable|string|max:1000'
        ]);

        $student = auth()->user();

        // Check if already submitted
        $existingSubmission = $assignment->submissions()
            ->where('student_id', $student->id)
            ->first();

        if ($existingSubmission) {
            return back()->with('error', 'لقد قمت بتسليم هذا الواجب مسبقاً');
        }

        // Check if overdue
        $isLate = $assignment->isOverdue();
        if ($isLate && !$assignment->allow_late_submission) {
            return back()->with('error', 'انتهى الموعد النهائي لتسليم هذا الواجب');
        }

        // Store file
        $filePath = $request->file('file')->store('assignments/submissions', 'public');

        // Create submission
        AssignmentSubmission::create([
            'assignment_id' => $assignment->id,
            'student_id' => $student->id,
            'file_path' => $filePath,
            'comment' => $request->comment,
            'status' => $isLate ? 'late' : 'pending',
            'submitted_at' => now()
        ]);

        return back()->with('success', 'تم تسليم الواجب بنجاح');
    }
}
