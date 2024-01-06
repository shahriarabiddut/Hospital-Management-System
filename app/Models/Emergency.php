<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
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
    function dept()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    function bill()
    {
        return $this->hasOne(Bill::class, 'service_id')->where('service_type', '=', 'emergency');
    }
}
