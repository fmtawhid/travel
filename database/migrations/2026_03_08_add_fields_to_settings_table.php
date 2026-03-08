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
        Schema::table('settings', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('location');
            $table->text('follow_text')->nullable()->after('description');
            $table->unsignedBigInteger('feature_package_id')->nullable()->after('follow_text');
            $table->foreign('feature_package_id')->references('id')->on('tours')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign(['feature_package_id']);
            $table->dropColumn(['description', 'follow_text', 'feature_package_id']);
        });
    }
};
