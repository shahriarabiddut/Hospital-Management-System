<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Staff;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function appointmentBill(string $patient_id, string $doctor_id, string $appointment_id)
    {
        //
        $data = new Bill();
        $doctor = Staff::all()->where('id', '=', $doctor_id)->first();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'appointment';
        $data->service_id = $appointment_id;
        $data->price = $doctor->fee;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function appointmentBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Appointment Bill Paid!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
