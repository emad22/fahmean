<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacher\CourseController;
use App\Http\Controllers\teacher\DashboardController as TeacherDashboardController;

Route::prefix('dashboard')->middleware(['auth', 'role:teacher|assistant_teacher|admin'])->name('teacher.')->group(function () {
    
    Route::controller(TeacherDashboardController::class)->group(function () {
        // Route::get('/', 'teacherDashboard')->name('dashboard');
        Route::get('/profile', 'teacherProfile')->name('profile');
        Route::get('/settings', 'teacherSettings')->name('settings');
        
        // Student-like features for teachers (maybe they enrolled in other courses)
        Route::get('/announcements', 'teacherAnnouncements')->name('announcements');
        Route::get('/assignments', 'teacherAssignments')->name('assignments');
        Route::get('/enrolled-courses', 'teacherEnrolledCourses')->name('enrolled-courses');
        Route::get('/my-quiz-attempts', 'teacherMyQuizAttempts')->name('my-quiz-attempts');
        Route::get('/order-history', 'teacherOrderHistory')->name('order-history');
        Route::get('/quiz-attempts', 'teacherQuizAttempts')->name('quiz-attempts');
        Route::get('/reviews', 'teacherReviews')->name('reviews');
        Route::get('/wishlist', 'teacherWishlist')->name('wishlist');
    });


    // Course Resource handled by Unified Controller



});
