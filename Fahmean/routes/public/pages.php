<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;



    //  courses
Route::prefix('pages')->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/page-error' ,'pageError')->name('pageError');
        Route::get('/aboutus-01' ,'aboutus01')->name('aboutus01');
        Route::get('/aboutus-02' ,'aboutus02')->name('aboutus02');
        Route::get('/academy-gallery' ,'academyGallery')->name('academyGallery');
        Route::get('/admission-guide' ,'admissionGuide')->name('admissionGuide');
        Route::get('/become-teacher' ,'becomeTeacher')->name('becomeTeacher');
        Route::get('/cart' ,'cart')->name('cart');
        Route::get('/contact' ,'contact')->name('contact');
        Route::get('/event-details' ,'eventDetails')->name('eventDetails');
        Route::get('/event-grid' ,'eventGrid')->name('eventGrid');
        Route::get('/event-list' ,'eventList')->name('eventList');
        Route::get('/event-sidebar' ,'eventSidebar')->name('eventSidebar');
        Route::get('/faqs' ,'faqs')->name('faqs');
        Route::get('/instructor' ,'instructor')->name('instructor');
        Route::get('/login' ,'login')->name('login');		
        Route::post('/login','login_post')->name('login.post');
		Route::post('/logout' ,'logout')->name('logout');
        Route::get('/maintenance' ,'maintenance')->name('maintenance');
        Route::get('/myAccount' ,'myAccount')->name('myAccount');
        Route::get('/privacy-policy' ,'privacyPolicy')->name('privacyPolicy');
        Route::get('/profile' ,'profile')->name('profile');
        Route::get('/shop' ,'shop')->name('shop');
        Route::get('/single-product' ,'singleProduct')->name('singleProduct');
        Route::get('/subscription' ,'subscription')->name('subscription');
        Route::get('/wishlist-2' ,'wishlist2')->name('wishlist2');
    });
});
