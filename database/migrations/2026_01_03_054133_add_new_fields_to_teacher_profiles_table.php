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
    Schema::table('teacher_profiles', function (Blueprint $table) {
        $table->string('cnic')->nullable();
        $table->string('designation')->nullable();
        $table->string('employee_type')->nullable(); // e.g., Permanent, Contract
        $table->string('cgpa')->nullable();
        $table->string('bank_name')->nullable();
        
        // Additional Qualifications
        $table->string('additional1')->nullable();
        $table->string('institute1')->nullable();
        $table->string('additional2')->nullable();
        $table->string('institute2')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_profiles', function (Blueprint $table) {
            //
        });
    }
};
