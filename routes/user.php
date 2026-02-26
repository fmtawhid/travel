<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\PaymentMethodController;
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
    Route::get('/package-details/{id}', [UserDashboardController::class, 'travel_booking_details'])->name('user.booking.tour-package-details');
    Route::get('/hotel-booking', [UserDashboardController::class, 'hotel_booking'])->name('user.booking.hotel');
    Route::get('/hotel-booking-details/{id}', [UserDashboardController::class, 'hotel_booking_details'])->name('user.booking.hotel-details');
    Route::get('/car-booking', [UserDashboardController::class, 'car_booking'])->name('user.booking.car');
    Route::get('/car-booking-details/{id}', [UserDashboardController::class, 'car_booking_details'])->name('user.booking.car-details');
    Route::get('/flight-booking', [UserDashboardController::class, 'flight_booking'])->name('user.booking.flight');
    Route::get('/flight-booking-details/{id}', [UserDashboardController::class, 'flight_booking_details'])->name('user.booking.flight-details');
    Route::get('/event-booking', [UserDashboardController::class, 'event_booking'])->name('user.booking.event');
    Route::get('/event-booking-details/{id}', [UserDashboardController::class, 'event_booking_details'])->name('user.booking.event-details');
    Route::get('/custom-booking', [UserDashboardController::class, 'custom_booking'])->name('user.booking.custom');
    Route::get('/custom-booking-details/{id}', [UserDashboardController::class, 'custom_booking_details'])->name('user.booking.custom-details');
    Route::get('/payment', [UserDashboardController::class, 'payment'])->name('user.payment');
    Route::get('/payments-list', [UserDashboardController::class, 'paymentsList'])->name('user.payments.list');
    Route::get('/claim-refund', [UserDashboardController::class, 'claim_refund'])->name('user.claim-refund');
    
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserDashboardController::class, 'edit_profile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserDashboardController::class, 'update_profile'])->name('user.profile.update');

    // Payment Methods Routes
    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('user.payment-methods.index');
    Route::get('/payment-methods/create', [PaymentMethodController::class, 'create'])->name('user.payment-methods.create');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('user.payment-methods.store');
    Route::get('/payment-methods/{paymentMethod}/edit', [PaymentMethodController::class, 'edit'])->name('user.payment-methods.edit');
    Route::put('/payment-methods/{paymentMethod}', [PaymentMethodController::class, 'update'])->name('user.payment-methods.update');
    Route::post('/payment-methods/{paymentMethod}/set-default', [PaymentMethodController::class, 'setDefault'])->name('user.payment-methods.set-default');
    Route::delete('/payment-methods/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->name('user.payment-methods.destroy');

});