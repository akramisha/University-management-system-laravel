<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'academic_class_id', 'semester_id', 'first_name', 'middle_name', 'last_name', 'father_name',
        'student_reg_number', 'roll_number', 'date_of_birth', 'gender', 'phone', 'address',
        'guardian_name', 'guardian_phone', 'emergency_contact', 'status', 'admission_date',
        'profile_photo', 'nationality', 'religion', 'material_status', 'cnic', 'documents', 'role',
        'registration_fee', 'semester_fee', 'discount', 'total_payable'
    ];

    protected $casts = [
        'documents' => 'array',
        'admission_date' => 'date',
        'date_of_birth' => 'date',
    ];

    // --- RELATIONSHIPS ---

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function academicClass() 
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function semester() 
    {
        return $this->belongsTo(Semester::class);
    }
}