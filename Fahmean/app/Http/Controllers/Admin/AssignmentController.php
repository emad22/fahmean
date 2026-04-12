<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('section.course')->latest()->paginate(20);
        return view('dashboard.admin-dashboard.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $sections = Section::with('course')->get();
        return view('dashboard.admin-dashboard.assignments.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|max:10240',
            'due_date' => 'nullable|date',
            'max_score' => 'required|integer|min:1',
            'allow_late_submission' => 'boolean'
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('assignments/attachments', 'public');
        }

        Assignment::create($validated);

        return redirect()->route('admin.assignments.index')->with('success', 'تم إنشاء الواجب بنجاح');
    }

    public function edit(Assignment $assignment)
    {
        $sections = Section::with('course')->get();
        return view('dashboard.admin-dashboard.assignments.edit', compact('assignment', 'sections'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|max:10240',
            'due_date' => 'nullable|date',
            'max_score' => 'required|integer|min:1',
            'allow_late_submission' => 'boolean'
        ]);

        if ($request->hasFile('attachment')) {
            // Delete old file
            if ($assignment->attachment) {
                Storage::disk('public')->delete($assignment->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('assignments/attachments', 'public');
        }

        $assignment->update($validated);

        return redirect()->route('admin.assignments.index')->with('success', 'تم تحديث الواجب بنجاح');
    }

    public function destroy(Assignment $assignment)
    {
        if ($assignment->attachment) {
            Storage::disk('public')->delete($assignment->attachment);
        }
        
        $assignment->delete();

        return redirect()->route('admin.assignments.index')->with('success', 'تم حذف الواجب بنجاح');
    }

    /**
     * View submissions for an assignment.
     */
    public function submissions(Assignment $assignment)
    {
        $submissions = $assignment->submissions()
            ->with('student')
            ->latest()
            ->paginate(20);

        return view('dashboard.admin-dashboard.assignments.submissions', compact('assignment', 'submissions'));
    }

    /**
     * Grade a submission.
     */
    public function grade(Request $request, AssignmentSubmission $submission)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:' . $submission->assignment->max_score,
            'feedback' => 'nullable|string|max:1000'
        ]);

        $submission->markAsGraded($request->score, $request->feedback);

        return back()->with('success', 'تم تقييم الواجب بنجاح');
    }
}
