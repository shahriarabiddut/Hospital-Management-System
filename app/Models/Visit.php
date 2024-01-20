<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Student::class, 'patient_id');
    }
    function doc()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }
    function appointment()
    {
        return $this->belongsTo(Appointment::class, 'service_id');
    }
    function labtest()
    {
        return $this->belongsTo(LabTest::class, 'service_id');
    }
    function emergency()
    {
        return $this->belongsTo(Emergency::class, 'service_id');
    }
    function operation()
    {
        return $this->belongsTo(Operation::class, 'service_id');
    }
    function admission()
    {
        return $this->belongsTo(Admission::class, 'service_id');
    }
}
