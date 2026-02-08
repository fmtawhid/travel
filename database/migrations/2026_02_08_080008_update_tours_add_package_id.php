<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            if (Schema::hasColumn('tours', 'discount_percentage')) {
                $table->dropColumn('discount_percentage');
            }
            if (Schema::hasColumn('tours', 'package_type')) {
                $table->dropColumn('package_type');
            }

            $table->unsignedBigInteger('package_id')->nullable()->after('duration');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign(['package_id']);
            $table->dropColumn('package_id');

            $table->decimal('discount_percentage', 5, 2)->default(0)->after('price');
            $table->string('package_type')->nullable()->after('duration');
        });
    }
};
