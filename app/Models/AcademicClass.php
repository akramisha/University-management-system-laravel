<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{

    public function getColorHexAttribute()
{
    return match ($this->color) {
        'pink'   => '#ec4899',
        'red'    => '#ef4444',
        'green'  => '#22c55e',
        'blue'   => '#3b82f6',
        'purple' => '#a855f7',
        'orange' => '#f97316',
        'teal'   => '#14b8a6',
        default  => '#64748b', // fallback
    };
}

protected $fillable = ['name', 'color', 'class_code', 'icon', 'duration', 'session', 'status', 'description', 'total_semester'];

public function semesters() {
    return $this->hasMany(Semester::class);
}
}
