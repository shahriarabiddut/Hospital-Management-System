<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorDegree extends Model
{
    use HasFactory;
    function doctor()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }
    function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }
}
