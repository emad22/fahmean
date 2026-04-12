<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LessonController;


// Auth routes
require __DIR__.'/auth.php';

// Shared routes (accessible by multiple roles)
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

Route::post('/temp-upload', [LessonController::class, 'tempUpload'])
    ->middleware(['auth'])
    ->name('temp.upload');

// Unified Routes (Courses, Assignments, etc.)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    // This handles /dashboard/courses for ALL roles
    Route::resource('courses', \App\Http\Controllers\Unified\CourseController::class);
    Route::post('/courses/{course}/update-status', [\App\Http\Controllers\Unified\CourseController::class, 'updateStatus'])->name('courses.update-status');
    Route::post('/courses/{course}/enroll-student', [\App\Http\Controllers\Unified\CourseController::class, 'enrollStudent'])->name('courses.enroll-student');
    Route::get('/courses/{course}/students', [\App\Http\Controllers\Admin\CourseController::class, 'enrolledStudents'])->name('courses.enrolled-students');
    Route::post('/courses/{course}/students/bulk-add-grade', [\App\Http\Controllers\Admin\CourseController::class, 'addStudentsByGrade'])->name('courses.bulk-add-grade');
    
    // Unified Lessons & Quizzes (Using Admin Controller as it serves both Admin/Teacher)
    Route::resource('lessons', \App\Http\Controllers\Admin\LessonController::class);
    Route::resource('quizzes', \App\Http\Controllers\Admin\QuizController::class)->except(['show']);

    // Questions (Nested under Quizzes) - Shared for Admin/Teacher
    Route::prefix('quizzes/{quiz}/questions')->name('questions.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\QuestionController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\QuestionController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('store');
        Route::get('/{question}/edit', [\App\Http\Controllers\Admin\QuestionController::class, 'edit'])->name('edit');
        Route::put('/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'update'])->name('update');
        Route::delete('/{question}', [\App\Http\Controllers\Admin\QuestionController::class, 'destroy'])->name('destroy');
    });

    // Quiz Attempts & Details
    Route::controller(\App\Http\Controllers\Admin\QuizController::class)->group(function () {
        Route::get('/quizzes/{quiz}/attempts', 'showAttempts')->name('quizzes.attempts');
        Route::get('/quizzes/{quiz}/attempts/{student}/details', 'showAttemptDetails')->name('quizzes.attempts.details');
        Route::delete('/quizzes/{quiz}/attempts/{student}', 'resetAttempt')->name('quizzes.reset-attempt');
    });
    
    // PDF Viewer Routes
    Route::controller(\App\Http\Controllers\PdfController::class)->group(function() {
        // PDF Viewer Page (Wrapper)
        Route::get('/lesson-pdf-player', 'showViewer')->name('lesson.pdf.viewer');
        
        // PDF Stream (Raw File Source)
        Route::get('/view-pdf-stream', 'streamFile')->name('view.pdf');
    });

    // Unified Profile Management
    Route::controller(\App\Http\Controllers\ProfileController::class)->group(function() {
        Route::get('/profile/edit', 'edit')->name('profile.edit');
        Route::post('/profile/update', 'update')->name('profile.update');
    });
    Route::get('/courses/{course}/lessons-list', [\App\Http\Controllers\Admin\LessonController::class, 'getLessonsByCourse'])->name('courses.lessons-list');
});

// Role routes
require __DIR__ . '/roles/admin.php';
require __DIR__ . '/roles/teacher.php';
require __DIR__ . '/roles/student.php';
require __DIR__ . '/roles/parent.php';

// Public routes
require __DIR__.'/public/home.php';
require __DIR__.'/public/blog.php';
require __DIR__.'/public/courses.php';
require __DIR__.'/public/elements.php';
require __DIR__.'/public/pages.php';
