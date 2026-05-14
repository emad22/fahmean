<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;



//  courses
Route::prefix('pages')->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/about-us', 'aboutus01')->name('aboutus01');
        Route::get('/faqs', 'faqs')->name('faqs');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
        
        // Contact Us page routes
        Route::get('/contact-us', function () {
            return view('contact-us');
        })->name('contact.show');
        Route::post('/contact-us', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

        // Teacher Request routes
        Route::get('/teacher-request', [\App\Http\Controllers\TeacherRequestController::class, 'create'])->name('teacher.request.create');
        Route::post('/teacher-request', [\App\Http\Controllers\TeacherRequestController::class, 'store'])->name('teacher.request.store');
    });
});
