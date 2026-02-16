<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BookingController;



Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/packages', [MainController::class, 'packages'])->name('packages');
Route::get('/package-details/{id}', [MainController::class, 'packageDetails'])->name('package.details');
Route::get('/sightseeings', [MainController::class, 'sightseeings'])->name('sightseeing');
Route::get('/hotels', [MainController::class, 'hotels'])->name('hotels');
Route::get('/hotel-details/{id}', [MainController::class, 'hotelDetails'])->name('hotel.details');

route::get('/contact', [MainController::class, 'contact'])->name('contact');
route::get('/about-us', [MainController::class, 'about'])->name('about');
route::get('/testimonials', [MainController::class, 'testimonials'])->name('testimonials');
route::get('/blog', [MainController::class, 'blog'])->name('blog');
route::get('/blog-details/{slug}', [MainController::class, 'blogDetails'])->name('blog.details');
route::get('/faq', [MainController::class, 'faq'])->name('faq');
route::get('/tips', [MainController::class, 'tips'])->name('tips');


route::get('/booking/tour-package', [BookingController::class, 'tour_package'])->name('booking.tour-package');
route::get('/booking/flight', [BookingController::class, 'flight'])->name('booking.flight');
route::get('/booking/car', [BookingController::class, 'car'])->name('booking.car');
route::get('/booking/hotel', [BookingController::class, 'hotel'])->name('booking.hotel');



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

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', \App\Http\Middleware\UserMiddleware::class])
    ->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


