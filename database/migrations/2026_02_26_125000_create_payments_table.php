<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            // Foreign keys - all nullable, only one should be filled
            $table->unsignedBigInteger('tour_booking_id')->nullable();
            $table->unsignedBigInteger('hotel_booking_id')->nullable();
            $table->unsignedBigInteger('car_booking_id')->nullable();
            $table->unsignedBigInteger('flight_booking_id')->nullable();
            $table->unsignedBigInteger('custom_booking_id')->nullable();
            
            // Payment fields
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->longText('description')->nullable();
            
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('tour_booking_id')->references('id')->on('tour_bookings')->onDelete('cascade');
            $table->foreign('hotel_booking_id')->references('id')->on('hotel_bookings')->onDelete('cascade');
            $table->foreign('car_booking_id')->references('id')->on('car_bookings')->onDelete('cascade');
            $table->foreign('flight_booking_id')->references('id')->on('flight_bookings')->onDelete('cascade');
            $table->foreign('custom_booking_id')->references('id')->on('custom_bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
