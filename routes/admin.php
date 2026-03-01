<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SightSeeingController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\HotelAmenityController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BookingInquiryController;
use App\Http\Controllers\Admin\CustomBookingController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\PaymentController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', UserController::class);
        Route::resource('tours', TourController::class);
        Route::resource('teams', TeamController::class);

        Route::resource('hotels', HotelController::class);
        Route::post('hotels/delete-room-image', [HotelController::class, 'deleteRoomImage'])->name('hotels.deleteRoomImage');
        Route::resource('room-types', RoomTypeController::class);        
        // Gallery routes
        Route::delete('galleries/{id}', [TourController::class, 'deleteGallery'])->name('tours.deleteGallery');

        // SightSeeing CRUD
        Route::resource('sightseeings', SightSeeingController::class);
        Route::resource('packages', PackageController::class);
        Route::resource('hotel-amenities', HotelAmenityController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('events', EventController::class)->names('events');
        Route::resource('custom-bookings', CustomBookingController::class);
        Route::resource('payments', PaymentController::class);
        
        // Payment Requests
        Route::get('/payments-request', [PaymentController::class, 'paymentRequests'])->name('payments.request');
        Route::post('/payments-request/{paymentRequest}/confirm', [PaymentController::class, 'confirmPaymentRequest'])->name('payments.confirm');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('about-page/edit', [AboutPageController::class, 'edit'])->name('about-page.edit');
        Route::post('about-page/update', [AboutPageController::class, 'update'])->name('about-page.update');

        Route::get('tips/edit', [TipController::class, 'edit'])->name('tips.edit');
        Route::post('tips/update', [TipController::class, 'update'])->name('tips.update');


        Route::get('/booking-inquiries/tour-package', [BookingInquiryController::class, 'tour_package_inquiries'])->name('booking-inquiries.tour-package');
        Route::delete('/booking-inquiries/tour-package/{id}', [BookingInquiryController::class, 'destroy_tour_package'])->name('booking-inquiries.tour-package.destroy');


        // Car booking inquiries
        Route::get('/booking-inquiries/car', [BookingInquiryController::class, 'car_booking_inquiries'])->name('booking-inquiries.car');
        Route::delete('/booking-inquiries/car/{id}', [BookingInquiryController::class, 'destroy_car_booking'])->name('booking-inquiries.car.destroy');

        // Flight booking inquiries
        Route::get('/booking-inquiries/flight', [BookingInquiryController::class, 'flight_booking_inquiries'])->name('booking-inquiries.flight');
        Route::delete('/booking-inquiries/flight/{id}', [BookingInquiryController::class, 'destroy_flight_booking'])->name('booking-inquiries.flight.destroy');

        // Hotel booking inquiries
        Route::get('/booking-inquiries/hotel', [BookingInquiryController::class, 'hotel_booking_inquiries'])->name('booking-inquiries.hotel');
        Route::delete('/booking-inquiries/hotel/{id}', [BookingInquiryController::class, 'destroy_hotel_booking'])->name('booking-inquiries.hotel.destroy');

        // Custom booking inquiries
        Route::get('/booking-inquiries/custom', [BookingInquiryController::class, 'custom_booking_inquiries'])->name('booking-inquiries.custom');
        Route::delete('/booking-inquiries/custom/{id}', [BookingInquiryController::class, 'destroy_custom_booking'])->name('booking-inquiries.custom.destroy'); 

        // Other booking inquiries
        Route::get('/booking-inquiries/other', [BookingInquiryController::class, 'other_booking_inquiries'])->name('booking-inquiries.other');
        Route::delete('/booking-inquiries/other/{id}', [BookingInquiryController::class, 'destroy_other_booking'])->name('booking-inquiries.other.destroy');   
    });
