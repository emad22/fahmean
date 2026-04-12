<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::post('/login', [PagesController::class, 'login_post'])->name('login.post');
Route::post('/logout', [PagesController::class, 'logout'])->name('logout');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

// AJAX routes for registration
Route::get('/get-grades/{levelId}', [\App\Http\Controllers\Auth\RegisterController::class, 'getGrades']);
