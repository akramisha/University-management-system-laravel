<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    // Table 1: Stores the actual messages
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('sender_id')->constrained('users');
        $table->string('title');
        $table->text('description');
        $table->enum('priority', ['normal', 'important', 'urgent'])->default('normal');
        $table->string('icon')->default('bi-bell');
        $table->string('color')->default('#0d6efd'); 
        $table->boolean('is_pinned')->default(false);
        $table->timestamps();
    });

    // Table 2: Tracks who read/favorited which message
    Schema::create('notification_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId('notification_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->boolean('is_read')->default(false);
        $table->boolean('is_favorite')->default(false);
        $table->timestamp('read_at')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('notification_user');
    Schema::dropIfExists('notifications');
}
};
