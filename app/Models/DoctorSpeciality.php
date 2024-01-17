<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpeciality extends Model
{
    use HasFactory;
    function doctor()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }
    function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
}
