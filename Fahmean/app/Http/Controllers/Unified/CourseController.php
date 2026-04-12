<?php

namespace App\Http\Controllers\Unified;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\teacher\CourseController as TeacherCourseController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return app(AdminCourseController::class)->index();
        }

        if ($user->hasRole(['teacher', 'assistant_teacher'])) {
             // Teacher dashboard uses a specific method or resource index
             return app(TeacherCourseController::class)->index();
        }

        if ($user->hasRole('student')) {
            return app(StudentCourseController::class)->index();
        }

        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Students don't create courses
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             // Dispatch to Admin Controller for now (assuming it handles creation form)
             return app(AdminCourseController::class)->create();
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             return app(AdminCourseController::class)->store($request);
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();

        if ($user->hasRole('student')) {
             return app(StudentCourseController::class)->show($id);
        }

        if ($user->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             // Admin show method (if different from student)
             return app(AdminCourseController::class)->show($id);
        }
        
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             return app(AdminCourseController::class)->edit($id);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             return app(AdminCourseController::class)->update($request, $id);
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             return app(AdminCourseController::class)->destroy($id);
        }
        abort(403);
    }

    public function updateStatus(Request $request, $id)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             $course = \App\Models\Course::findOrFail($id);
             return app(AdminCourseController::class)->updateStatus($request, $course);
        }
        abort(403);
    }

    public function enrollStudent(Request $request, $id)
    {
        if (auth()->user()->hasRole(['admin', 'teacher', 'assistant_teacher'])) {
             $course = \App\Models\Course::findOrFail($id);
             return app(AdminCourseController::class)->enrollMultipleStudents($request, $course);
        }
        abort(403);
    }
}
