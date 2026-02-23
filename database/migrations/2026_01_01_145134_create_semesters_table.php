<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('semesters', function (Blueprint $table) {
        $table->id();
        // Links to academic_classes table
        $table->foreignId('academic_class_id')->constrained()->onDelete('cascade');
        $table->string('semester_name'); // e.g., 1st Semester
        $table->integer('semester_number'); // e.g., 1
        $table->boolean('status')->default(1); // 1 = Active, 0 = Completed
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
