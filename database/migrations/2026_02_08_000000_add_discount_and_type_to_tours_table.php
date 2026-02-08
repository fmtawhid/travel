<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('discount_percentage', 5, 2)->default(0)->after('price');
            $table->decimal('discount_price', 10, 2)->nullable()->after('discount_percentage');
            $table->string('package_type')->nullable()->after('duration'); // family, couple, single, group
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['discount_percentage', 'discount_price', 'package_type']);
        });
    }
};
