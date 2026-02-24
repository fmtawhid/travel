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
        Schema::create('custom_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email');
            $table->integer('howmanytravellers')->nullable();
            $table->string('city')->nullable();
            $table->date('arrival')->nullable();
            $table->date('departure')->nullable();
            $table->integer('noofadults')->nullable();
            $table->integer('noofchildrens')->nullable();
            $table->decimal('minprice', 10, 2)->nullable();
            $table->decimal('maxprice', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_bookings');
    }
};
