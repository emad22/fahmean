<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
		Route::get('/','blog')->name('blog');
		Route::get('/details','blogDetails')->name('blogDetails');
    });
});
