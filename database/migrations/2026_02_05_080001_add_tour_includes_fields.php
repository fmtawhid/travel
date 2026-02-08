<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('include_sightseeing')->default(false);
            $table->boolean('include_hotel')->default(false);
            $table->boolean('include_transfer')->default(false);
            $table->boolean('include_luggage')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date', 'include_sightseeing', 'include_hotel', 'include_transfer', 'include_luggage']);
        });
    }
};
