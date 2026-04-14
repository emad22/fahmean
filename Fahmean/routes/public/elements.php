<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElementsController;

Route::prefix('elements')->group(function () {
    Route::controller(ElementsController::class)->group(function () {
        Route::get('/about', 'about')->name('about');
        Route::get('/accordion', 'accordion')->name('accordion');
        Route::get('/advancetab', 'advancetab')->name('advancetab');
        Route::get('/badge', 'badge')->name('badge');
        Route::get('/brand', 'brand')->name('brand');
        Route::get('/button', 'button')->name('button');
        Route::get('/call-to-action', 'callToAction')->name('callToAction');
        Route::get('/card', 'card')->name('card');
        Route::get('/category', 'category')->name('category');
        Route::get('/counterup', 'counterup')->name('counterup');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/header', 'header')->name('header');
        Route::get('/instagram', 'instagram')->name('instagram');
        Route::get('/listStyle', 'listStyle')->name('listStyle');
        Route::get('/newsletter', 'newsletter')->name('newsletter');
        Route::get('/pricing', 'pricing')->name('pricing');
        Route::get('/progressbar', 'progressbar')->name('progressbar');
        Route::get('/search', 'search')->name('search');
        Route::get('/service', 'service')->name('service');
        Route::get('/social', 'social')->name('social');
        Route::get('/split', 'split')->name('split');
        Route::get('/style-guide', 'styleGuide')->name('styleGuide');
        Route::get('/team', 'team')->name('team');
        Route::get('/testimonial', 'testimonial')->name('testimonial');
    });
});
