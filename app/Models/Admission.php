<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Student::class, 'patient_id');
    }
    function doctor()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }
    function nurse()
    {
        return $this->belongsTo(Staff::class, 'nurse_id');
    }
    function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
