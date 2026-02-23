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
    Schema::table('semesters', function (Blueprint $table) {
        $table->enum('type', ['semester', 'session'])->after('semester_number');
    });
}

public function down()
{
    Schema::table('semesters', function (Blueprint $table) {
        $table->dropColumn('type');
    });
}

};
