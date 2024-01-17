<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bill;
use App\Models\Department;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2()
    {
        $data = Appointment::all();
        return view('profile.appointments.index', ['data' => $data]);
    }
    public function index()
    {
        $data = Appointment::all();
        return view('staff.appointments.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $patients = User::all();
        $doctors = Staff::all()->where('type', 'doctor');

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.appointments.create', ['departments' => $departments, 'nextDate' => $nextDate, 'patients' => $patients, 'doctors' => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'department' => 'required',
            'doctor' => 'required',
            'purpose' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user_id' => 'required',
        ]);
        $data = new Appointment();
        $doctor = Staff::all()->where('id', '=', $request->doctor)->first();
        //
        $data->user_id = $request->user_id;
        $data->purpose = $request->purpose;
        $data->department_id = $request->department;
        $data->doctor_id = $request->doctor;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        //Generate Bill
        $BillController = new BillController();
        $BillController->appointmentBill($request->user_id, $doctor->fee, $data->id);

        return redirect()->route('staff.appointment.index')->with('success', 'Appointment has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Appointment::find($id);
        if ($data == null) {
            return redirect()->route('staff.appointment.index')->with('danger', 'Not Found!');
        }
        return view('staff.appointments.show', ['data' => $data]);
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
        $data = Appointment::find($id);
        //Delete Bill
        $BillController = new BillController();
        $BillController->billDelete($data->id, 'appointment');
        $statusCheck = $BillController->billDelete($data->id, 'appointment');
        if ($statusCheck == 0) {
            return redirect()->back()->with('danger', 'Bad Request!Warning!');
        } else {
            //
            $data->delete();
            return redirect()->route('staff.appointment.index')->with('danger', 'Appointment Deleted!');
        }
    }
}
