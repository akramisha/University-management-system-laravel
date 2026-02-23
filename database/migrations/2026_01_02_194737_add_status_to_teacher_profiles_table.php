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
    Schema::table('teacher_profiles', function (Blueprint $table) {
        // We add the column and set 'active' as the default
        $table->enum('status', ['active', 'inactive'])->default('active')->after('user_id');
    });
}

public function down(): void
{
    Schema::table('teacher_profiles', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
