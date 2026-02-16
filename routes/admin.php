<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SightSeeingController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\HotelAmenityController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

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
    });
