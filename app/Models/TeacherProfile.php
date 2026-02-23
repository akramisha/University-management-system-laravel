<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherProfile extends Model
{
    use HasFactory;

    // Explicitly tell Laravel to use the table you already created
    protected $table = 'teacher_profiles';

    protected $fillable = [
    'user_id',
    'employee_id',
    'profile_photo',
    'status',        // Added
    'first_name',
    'middle_name',
    'last_name',
    'phone_number',
    'alternative_phone',
    'dob',
    'gender',
    'nationality',
    'address',
    'date_of_joining',
    'experience',
    'specialization',
    'degree',
    'field_of_study',
    'university',
    'graduation_year',
    'cgpa',           // Added
    'bank_name',      // Added
    'account_no',
    'branch_name',
    'salary',
    'emergency_person',
    'emergency_relation',
    'emergency_no',
    'cnic',           // Added
    'designation',    // Added
    'employee_type',  // Added
    'file',
    'additional1',    // Added
    'institute1',     // Added
    'additional2',    // Added
    'institute2',     // Added
];

    /**
     * Get the user that owns the profile (Auth data).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}