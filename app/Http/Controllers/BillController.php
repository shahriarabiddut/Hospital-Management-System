<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //Appointment
    public function appointmentBill(string $patient_id, string $fee, string $appointment_id)
    {
        //
        $data = new Bill();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'appointment';
        $data->service_id = $appointment_id;
        $data->price = $fee;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function appointmentBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', 'appointment')->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Appointment Bill Paid!');
    }
    //Labtest
    public function labtestBill(string $patient_id, string $fee, string $service_id)
    {
        //
        $data = new Bill();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'test';
        $data->service_id = $service_id;
        $data->price = $fee;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function labtestBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', 'test')->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Appointment Bill Paid!');
    }
    //Emergency
    public function emergencyBill(string $patient_id, string $emergency_id, string $bill)
    {
        //
        $data = new Bill();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'emergency';
        $data->service_id = $emergency_id;
        $data->price = $bill;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function emergencyBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', 'emergency')->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Emergency Bill Paid!');
    }
    //Admission
    public function admissionBill(string $patient_id, string $admission_id, string $bill)
    {
        //
        $data = new Bill();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'admission';
        $data->service_id = $admission_id;
        $data->price = $bill;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function admissionBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', 'admission')->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Admission Bill Paid!');
    }
    //Operation
    public function operationBill(string $patient_id, string $operation_id, string $bill)
    {
        //
        $data = new Bill();
        //
        $data->patient_id = $patient_id;
        $data->service_type = 'operation';
        $data->service_id = $operation_id;
        $data->price = $bill;
        $data->status = 0;
        $data->save();
        return 1;
    }
    public function operationBillAccept(string $id)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', 'operation')->first();
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Operation Bill Paid!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Bill::all();
        return view('staff.bill.index', ['data' => $data]);
    }
    public function create()
    {
        //
        $patients = User::all();
        return view('staff.bill.create', ['patients' => $patients]);
    }

    public function generate(Request $request)
    {
        //
        $data = Bill::all()->where('patient_id', '=', $request->pateint)->where('status', '=', 0);
        $patient = User::all()->where('id', '=', $request->pateint)->first();
        return view('staff.bill.show', ['data' => $data, 'patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function payBill(string $id)
    {
        //
        $data = Bill::find($id);
        if ($data == null) {
            return redirect()->back()->with('danger', 'Not Found!');
        }
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Bill Paid!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function billDelete(string $id, string $service_type)
    {
        //
        $data = Bill::all()->where('service_id', '=', $id)->where('service_type', '=', $service_type)->first();
        if ($data == null) {
            return 1;
        }
        if ($data->status == 1) {
            return 0;
        }
        $data->delete();
        return 1;
    }
    public function destroy(string $id)
    {
        //
    }
}
