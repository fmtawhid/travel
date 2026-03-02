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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Notification title
            $table->string('image')->nullable(); // Notification image
            $table->text('description'); // Notification description
            $table->string('url')->nullable(); // URL to redirect
            $table->enum('sender_role', ['admin', 'user']); // Who sent it
            $table->enum('receiver_role', ['admin', 'user']); // Who receives it
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Recipient user
            $table->boolean('is_read')->default(false); // Read status
            $table->timestamps();

            // Indexes for better query performance
            $table->index(['user_id', 'is_read']);
            $table->index(['receiver_role', 'is_read']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
