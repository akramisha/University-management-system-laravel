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
       Schema::create('teacher_profiles', function (Blueprint $table) {
    $table->id();
    // Relationship
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

    // Personal Info (Name can stay here if you want specific First/Last separation)
    $table->string('profile_photo')->nullable();
    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');
    
    // Note: Email removed because it's in the 'users' table
    
    $table->string('phone_number');
    $table->string('alternative_phone')->nullable();
    $table->date('dob');
    $table->enum('gender', ['male', 'female', 'other']); // Corrected syntax
    $table->string('nationality');
    $table->text('address');

    // Professional Info
    $table->date('date_of_joining');
    $table->integer('experience'); // Years
    $table->string('specialization');
    $table->string('degree');
    $table->string('field_of_study');
    $table->string('university');
    $table->year('graduation_year');

    // Financial Info
    $table->string('account_no');
    $table->string('branch_name')->nullable();
    $table->decimal('salary', 10, 2)->nullable();

    // Emergency Contact
    $table->string('emergency_person');
    $table->string('emergency_relation');
    $table->string('emergency_no');

    // Documents
    $table->string('file')->nullable(); // Renamed from file
    
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_profiles');
    }
};
