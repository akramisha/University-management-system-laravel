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
    Schema::table('students', function (Blueprint $table) {
        $table->decimal('registration_fee', 10, 2)->default(0)->after('student_reg_number');
        $table->decimal('semester_fee', 10, 2)->default(0)->after('registration_fee');
        $table->decimal('discount', 10, 2)->default(0)->after('semester_fee');
        $table->decimal('total_payable', 10, 2)->default(0)->after('discount');
        $table->string('payment_status')->default('pending')->after('total_payable'); // pending, partial, paid
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
