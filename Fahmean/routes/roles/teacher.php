<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacher\CourseController;
use App\Http\Controllers\teacher\DashboardController as TeacherDashboardController;

Route::prefix('dashboard')->middleware(['auth', 'role:teacher|assistant_teacher|admin'])->name('teacher.')->group(function () {
    
    Route::controller(TeacherDashboardController::class)->group(function () {
        // Route::get('/', 'teacherDashboard')->name('dashboard');
        Route::get('/profile', 'teacherProfile')->name('profile');
        Route::get('/settings', 'teacherSettings')->name('settings');
        
    });


    // Course Resource handled by Unified Controller



});
