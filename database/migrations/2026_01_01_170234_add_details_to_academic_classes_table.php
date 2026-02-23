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
    Schema::table('academic_classes', function (Blueprint $table) {
        $table->string('class_code')->after('name')->nullable();
        $table->string('icon')->after('color')->default('bi-book');
        $table->string('duration')->after('icon')->nullable();
        $table->boolean('status')->default(true); // true = active
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_classes', function (Blueprint $table) {
            //
        });
    }
};
