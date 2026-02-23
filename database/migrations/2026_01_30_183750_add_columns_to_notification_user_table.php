<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('notification_user', function (Blueprint $table) {
        // Add is_pinned if it doesn't exist (used for Favorites)
        if (!Schema::hasColumn('notification_user', 'is_pinned')) {
            $table->boolean('is_pinned')->default(false)->after('is_read');
        }
        
        // Add has_voted if it doesn't exist (used for Polls)
        if (!Schema::hasColumn('notification_user', 'has_voted')) {
            $table->boolean('has_voted')->default(false)->after('is_pinned');
        }
    });
}

public function down()
{
    Schema::table('notification_user', function (Blueprint $table) {
        $table->dropColumn(['is_pinned', 'has_voted']);
    });
}

  
};
