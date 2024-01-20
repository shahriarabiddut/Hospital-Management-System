<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
    function doc()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }
    function dept()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    function bill()
    {
        return $this->hasOne(Bill::class, 'service_id')->where('service_type', '=', 'appointment');
    }
    function visit()
    {
        return $this->hasOne(Visit::class, 'service_id')->where('service_type', '=', 'appointment');
    }
}
