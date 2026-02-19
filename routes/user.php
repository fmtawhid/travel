<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UserMiddleware;

// User Dashboard
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', UserMiddleware::class])
    ->name('user.dashboard');

// Profile Routes (Authenticated Users)
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// You can add more user-related routes here later
// ======================
// User Booking Routes
// ======================
Route::prefix('user')->middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/package', [UserDashboardController::class, 'travel_booking'])->name('user.booking.tour-package');
    Route::get('/package-details', [UserDashboardController::class, 'travel_booking_details'])->name('user.booking.tour-package-details');
    Route::get('/hotel-booking', [UserDashboardController::class, 'hotel_booking'])->name('user.booking.hotel');
    route::get('/hotel-booking-details', [UserDashboardController::class, 'hotel_booking_details'])->name('user.booking.hotel-details');
    Route::get('/event-booking', [UserDashboardController::class, 'event_booking'])->name('user.booking.event');
    Route::get('/event-booking-details', [UserDashboardController::class, 'event_booking_details'])->name('user.booking.event-details');
    Route::get('/payment', [UserDashboardController::class, 'payment'])->name('user.payment');
    Route::get('/claim-refund', [UserDashboardController::class, 'claim_refund'])->name('user.claim-refund');
    
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserDashboardController::class, 'edit_profile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserDashboardController::class, 'update_profile'])->name('user.profile.update');


});