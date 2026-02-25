<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BookingController;



Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/packages', [MainController::class, 'packages'])->name('packages');
Route::get('/package-details/{id}', [MainController::class, 'packageDetails'])->name('package.details');
Route::get('/sightseeings', [MainController::class, 'sightseeings'])->name('sightseeing');
Route::get('/sightseeing-details/{id}', [MainController::class, 'sightseeingDetails'])->name('sightseeing.details');
Route::get('/hotels', [MainController::class, 'hotels'])->name('hotels');
Route::get('/hotel-details/{id}', [MainController::class, 'hotelDetails'])->name('hotel.details');

route::get('/contact', [MainController::class, 'contact'])->name('contact');
route::get('/about-us', [MainController::class, 'about'])->name('about');
route::get('/testimonials', [MainController::class, 'testimonials'])->name('testimonials');
route::get('/blog', [MainController::class, 'blog'])->name('blog');
route::get('/blog-details/{slug}', [MainController::class, 'blogDetails'])->name('blog.details');
route::get('/faq', [MainController::class, 'faq'])->name('faq');
route::get('/tips', [MainController::class, 'tips'])->name('tips');
route::get('/events', [MainController::class, 'events'])->name('events');


Route::get('/booking/tour-package/{tour_id?}', [BookingController::class, 'tour_package'])->name('booking.tour-package');
Route::post('/booking/tour-package', [BookingController::class, 'storeTourBooking'])->name('booking.tour-package.store');


Route::get('/booking/flight', [BookingController::class, 'flight'])->name('booking.flight');
Route::post('/booking/flight/store', [BookingController::class, 'storeFlightBooking'])->name('booking.flight.store');

route::get('/booking/car', [BookingController::class, 'car'])->name('booking.car');
route::post('/booking/car', [BookingController::class, 'storeCarBooking'])->name('booking.car.store');

// route::get('/booking/hotel', [BookingController::class, 'hotel'])->name('booking.hotel');
Route::get('/booking/hotel', [BookingController::class,'hotel'])->name('booking.hotel');
Route::post('/booking/hotel/store', [BookingController::class,'storeHotelBooking'])->name('booking.hotel.store');

Route::get('/booking/event/{event_id?}', [BookingController::class, 'event'])->name('booking.event');
Route::post('/booking/event/store', [BookingController::class, 'storeEventBooking'])->name('booking.event.store');

Route::get('/booking/custom-package', [BookingController::class, 'custom_package'])->name('booking.custom-package');
Route::post('/booking/custom-package/store', [BookingController::class, 'storeCustomPackage'])->name('booking.custom-package.store');


// web.php
Route::post('/tour/review', [MainController::class, 'storeTourReview'])
    ->middleware('auth')
    ->name('tour.review.store');

Route::post('/hotel/review', [MainController::class, 'storeHotelReview'])
    ->middleware('auth')
    ->name('hotel.review.store');

Route::post('/contact', [MainController::class, 'storeContact'])
    ->name('store-contact');

Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }
    $role = auth()->user()->role ?? null;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if ($role === 'user') {
        return redirect()->route('user.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->name('admin.dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';

