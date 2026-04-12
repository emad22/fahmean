<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/main-demo', 'home')->name('mainDemo');
});
//Route::prefix('home')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home','home')->name('home');
        Route::get('/art-design-school','artDesignSchool')->name('artDesignSchool');
        Route::get('/checkout','checkout')->name('checkout');
        Route::get('/classic-lms','classicLms')->name('classicLms');
        Route::get('/coaching','coaching')->name('coaching');
        Route::get('/course-school','courseSchool')->name('courseSchool');
        Route::get('/gym-coaching','gymCoaching')->name('gymCoaching');
        Route::get('/health-wellness-institute','healthWellnessInstitute')->name('healthWellnessInstitute');
        Route::get('/home-elegant','homeElegant')->name('homeElegant');
        Route::get('/home-technology','homeTechnology')->name('homeTechnology');
        Route::get('/teacher-course','instructorCourse')->name('teacherCourse');
        Route::get('/teacher-portfolio','instructorPortfolio')->name('teacherPortfolio');
        Route::get('/instructor-portfolio','instructorPortfolio')->name('instructorPortfolio');
        Route::get('/teachers-coaches','instructorsCoaches')->name('teachersCoaches');
        Route::get('/instructors-coaches','instructorsCoaches')->name('instructorsCoaches');
        Route::get('/islamic-center','islamicCenter')->name('islamicCenter');
        Route::get('/kindergarten','kindergarten')->name('kindergarten');
        Route::get('/language-academy','languageAcademy')->name('languageAcademy');
        Route::get('/life-coach','lifeCoach')->name('lifeCoach');
        Route::get('/marketplace','marketplace')->name('marketplace');
        Route::get('/modern-university','modernUniversity')->name('modernUniversity');
        Route::get('/multilingual','multilingual')->name('multilingual');
        Route::get('/online-academy','onlineAcademy')->name('onlineAcademy');
        Route::get('/online-course','onlineCourse')->name('onlineCourse');
        Route::get('/online-school','onlineSchool')->name('onlineSchool');
        Route::get('/single-course','singleCourse')->name('singleCourse');
        Route::get('/udemy-affiliate','udemyAffiliate')->name('udemyAffiliate');
        Route::get('/university-classic','universityClassic')->name('universityClassic');
        Route::get('/university-status','universityStatus')->name('universityStatus');
        Route::get('/wishlist','wishlist')->name('wishlist');
    });
//});
