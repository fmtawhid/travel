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

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', UserController::class);
        Route::resource('tours', TourController::class);

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

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');


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
    });
