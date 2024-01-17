<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\Emergency;
use App\Models\Department;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Emergency::all();
        return view('staff.emergency.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        $patients = User::all();
        $doctors = Staff::all()->where('type', 'doctor');

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.emergency.create', ['departments' => $departments, 'nextDate' => $nextDate, 'patients' => $patients, 'doctors' => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'emergency' => 'required',
            'department_id' => 'required',
            'doctor_id' => 'required',
            'bill' => 'required',
        ]);
        $data = new Emergency();
        //
        if ($request->patient_id != 0) {
            $data->patient_id = $request->patient_id;
        } else {
            $lastUserId = User::latest()->value('id');
            $emailid = $lastUserId + 1;
            $patient = new User();
            $patient->name = $request->name;
            $patient->email = 'hms' . $emailid . '@hms.com';
            $patient->password = bcrypt($request->mobile);
            $patient->mobile = $request->mobile;
            $patient->guardian = $request->guardian;
            $patient->dob = $request->dob;
            $patient->address = $request->address;
            $patient->save();
            //
            $data->patient_id = $patient->id;
        }
        $data->department_id = $request->department_id;
        $data->doctor_id = $request->doctor_id;
        $data->emergency = $request->emergency;
        $data->save();
        //Generate Bill
        $BillController = new BillController();
        $BillController->emergencyBill($data->patient_id, $data->id, $request->bill);

        return redirect()->route('staff.emergency.index')->with('success', 'Emergency has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Emergency::find($id);
        if ($data == null) {
            return redirect()->route('staff.emergency.index')->with('danger', 'Not Found!');
        }
        return view('staff.emergency.show', ['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $data = Emergency::find($id);
        //Delete Bill
        $BillController = new BillController();
        $statusCheck = $BillController->billDelete($data->id, 'emergency');
        if ($statusCheck == 0) {
            return redirect()->back()->with('danger', 'Bad Request!Warning!');
        } else {
            //
            $data->delete();
            return redirect()->route('staff.emergency.index')->with('danger', 'Emergency Deleted!');
        }
    }
}
