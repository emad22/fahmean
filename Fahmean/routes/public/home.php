<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/home', 'home')->name('home.alias');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/teacher-portfolio/{id}', 'teacherProfile')->name('teacherPortfolio');
    Route::get('/instructor-portfolio/{id}', 'teacherProfile')->name('instructorPortfolio');
    Route::get('/teachers-coaches', 'instructorsCoaches')->name('teachersCoaches');
    Route::get('/instructors-coaches', 'instructorsCoaches')->name('instructorsCoaches');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
});
