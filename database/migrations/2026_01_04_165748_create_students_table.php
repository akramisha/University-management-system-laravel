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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('academic_class_id')->constrained()->onDelete('cascade');
        $table->foreignId('semester_id')->constrained()->onDelete('cascade');
        
        // Name & Identity
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('student_reg_number')->unique();
        $table->string('roll_number')->nullable();
        $table->string('cnic')->unique();
        
        // Personal Details
        $table->date('date_of_birth');
        $table->enum('gender', ['male', 'female', 'other']);
        $table->string('nationality');
        $table->string('religion')->nullable();
        $table->string('marital_status')->nullable(); // corrected spelling
        
        // Contact & Address
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        
        // Guardian Info
        $table->string('guardian_name');
        $table->string('guardian_phone');
        $table->string('emergency_contact');
        
        // Academic & Files
        $table->date('admission_date');
        $table->string('profile_photo')->nullable();
        $table->json('documents')->nullable(); // Stores multiple file paths
        $table->integer('status')->default(1);
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
