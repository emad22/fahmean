<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\AssignmentController;
use App\Http\Controllers\Student\EnrollmentRequestController;

Route::prefix('dashboard')->middleware(['auth', 'role:student|admin'])->name('student.')->group(function () {
    
    Route::controller(StudentDashboardController::class)->group(function () {
        // Route::get('/', 'index')->name('dashboard'); // Handled by main DashboardController
    });

    // Handled by Unified Controller
    // Route::get('/courses', [CourseController::class, 'index'])->name('enrolled-courses');
    // Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');

    // Assignments
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])->name('assignments.submit');

    // Enrollment Requests
    Route::get('/available-courses', [EnrollmentRequestController::class, 'availableCourses'])->name('available-courses');
    Route::post('/courses/{course}/request-enrollment', [EnrollmentRequestController::class, 'store'])->name('enrollment-requests.store');
    Route::get('/my-enrollment-requests', [EnrollmentRequestController::class, 'myRequests'])->name('my-enrollment-requests');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/student-my-quiz-attempts', 'studentMyQuizAttempts')->name('my-quiz-attempts');
    });

    // Quiz Routes
    Route::controller(\App\Http\Controllers\Student\QuizController::class)->group(function () {
        Route::get('/my-quizzes', 'myQuizzes')->name('my-quizzes'); // Global Quizzes List
        Route::get('/quizzes/{id}', 'showDirect')->name('quizzes.show_direct'); // Direct Access (General or Course)
        Route::get('/courses/{course_id}/quizzes/{id}', 'show')->name('quizzes.show');
        Route::post('/courses/{course_id}/quizzes/{id}/submit', 'submit')->name('quizzes.submit');
    });
});
