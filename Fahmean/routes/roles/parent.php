<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parent\DashboardController;

Route::prefix('dashboard')->middleware(['auth', 'role:parent|admin'])->name('parent.')->group(function () {
    
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // Handled by main DashboardController
    Route::get('/child/{student_id}', [DashboardController::class, 'childProgress'])->name('child-progress');

});
