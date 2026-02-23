<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Semester extends Model
{
    protected $fillable = [
    'academic_class_id', 
    'semester_number', 
    'type', 
    'status',
    'start_date', // Add this
    'end_date'
];


    public function academicClass() {
    return $this->belongsTo(AcademicClass::class, 'academic_class_id');
}
}


