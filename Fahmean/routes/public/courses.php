<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::prefix('courses')->group(function () {
    Route::controller(CoursesController::class)->group(function () {
            Route::get('/all-courses','courseFilterOneToggle')->name('courseFilterOneToggle');
            Route::get('/details/{id?}','courseDetails')->name('courseDetails');
            Route::get('/lesson','lesson')->name('lesson');
    });
});


