<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'description',
        'attachment',
        'due_date',
        'max_score',
        'allow_late_submission'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'allow_late_submission' => 'boolean',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    /**
     * Check if assignment is overdue.
     */
    public function isOverdue()
    {
        return $this->due_date && now()->greaterThan($this->due_date);
    }
}
