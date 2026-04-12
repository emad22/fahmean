<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $fillable = [
        'assignment_id',
        'student_id',
        'file_path',
        'comment',
        'score',
        'feedback',
        'status',
        'submitted_at',
        'graded_at'
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'graded_at' => 'datetime',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Check if submission is late.
     */
    public function isLate()
    {
        if (!$this->assignment->due_date || !$this->submitted_at) {
            return false;
        }
        
        return $this->submitted_at->greaterThan($this->assignment->due_date);
    }

    /**
     * Mark as graded.
     */
    public function markAsGraded($score, $feedback = null)
    {
        $this->update([
            'score' => $score,
            'feedback' => $feedback,
            'status' => 'graded',
            'graded_at' => now()
        ]);
    }
}
