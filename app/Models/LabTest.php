<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Student::class, 'patient_id');
    }
    function technician()
    {
        return $this->belongsTo(Staff::class, 'technician_id');
    }
    function bill()
    {
        return $this->hasOne(Bill::class, 'service_id')->where('service_type', '=', 'test');
    }
    function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
