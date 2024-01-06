<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
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
    function bill()
    {
        return $this->hasOne(Bill::class, 'service_id')->where('service_type', '=', 'operation');
    }
    function operation()
    {
        return $this->belongsTo(OperationType::class, 'operation_id');
    }
    function admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
}
