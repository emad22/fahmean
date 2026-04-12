<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::prefix('courses')->group(function () {
    Route::controller(CoursesController::class)->group(function () {
            Route::get('/course-card-2','courseCard2')->name('courseCard2');
            Route::get('/course-card-3','courseCard3')->name('courseCard3');
            Route::get('/course-details','courseDetails')->name('courseDetails');
            Route::get('/course-details-2','courseDetails2')->name('courseDetails2');
            Route::get('/course-details-3','courseDetails3')->name('courseDetails3');
            Route::get('/course-filter-one-open','courseFilterOneOpen')->name('courseFilterOneOpen');
            Route::get('/course-filter-one-toggle','courseFilterOneToggle')->name('courseFilterOneToggle');
            Route::get('/course-filter-two-open','courseFilterTwoOpen')->name('courseFilterTwoOpen');
            Route::get('/course-filter-two-toggle','courseFilterTwoToggle')->name('courseFilterTwoToggle');
            Route::get('/course-masonry','courseMasonry')->name('courseMasonry');
            Route::get('/course-with-sidebar','courseWithSidebar')->name('courseWithSidebar');
            Route::get('/course-with-tab','courseWithTab')->name('courseWithTab');
            Route::get('/course-with-tab-two','courseWithTabTwo')->name('courseWithTabTwo');
            Route::get('/create-course','createCourse')->name('createCourse');
            Route::get('/instructor-course','instructorCourse')->name('instructorCourse');
            Route::get('/lesson','lesson')->name('lesson');
    });
});


