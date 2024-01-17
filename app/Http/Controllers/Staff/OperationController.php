<?php

namespace App\Http\Controllers\Staff;

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Operation;
use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BillController;
use App\Models\Admission;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Operation::latest('created_at')->get();
        return view('staff.operation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $admissions = Admission::all();
        $doctor = Staff::all()->where('type', 'doctor');
        $operation = OperationType::all();

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.operation.create', ['nextDate' => $nextDate, 'admissions' => $admissions, 'doctor' => $doctor, 'operation' => $operation]);
    }
    public function create1(string $id)
    {
        //
        $admission = Admission::find($id);
        $doctor = Staff::all()->where('type', 'doctor');
        $operation = OperationType::all();

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.operation.create1', ['nextDate' => $nextDate, 'admission' => $admission, 'doctor' => $doctor, 'operation' => $operation]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'operation_id' => 'required',
            'doctor_id' => 'required',
            'admission_id' => 'required',
            'date' => 'required',
            'ot_type' => 'required',
            'instruction' => 'required',
        ]);
        $data = new Operation();
        $operation = OperationType::all()->where('id', '=', $request->operation_id)->first();
        //
        $data->operation_id = $request->operation_id;
        if ($request->patient_id == null) {
            $admissionData = Admission::find($request->admission_id);
            $data->patient_id = $admissionData->patient_id;
        }
        $data->doctor_id = $request->doctor_id;
        $data->admission_id = $request->admission_id;
        $data->ot_type = $request->ot_type;
        $data->instruction = $request->instruction;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->save();
        //Generate Bill
        if ($request->ot_type == 1) {
            $otPrice = 1000;
        } elseif ($request->ot_type == 2) {
            $otPrice = 5000;
        }
        $operationPrice = $operation->price + $otPrice;

        $BillController = new BillController();
        $BillController->operationBill($data->patient_id, $data->id, $operationPrice);
        return redirect()->route('staff.operation.index')->with('success', 'Operation Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Operation::find($id);
        $operation = OperationType::find($data->operation_id);
        if ($data == null) {
            return redirect()->route('staff.operation.index')->with('danger', 'Not Found!');
        }
        return view('staff.operation.show', ['data' => $data, 'operation' => $operation]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $data = Operation::find($id);
        //Delete Bill
        $BillController = new BillController();
        $statusCheck = $BillController->billDelete($data->id, 'operation');
        if ($statusCheck == 0) {
            return redirect()->back()->with('danger', 'Bad Request!Warning!');
        } else {
            //
            $data->delete();
            return redirect()->route('staff.operation.index')->with('danger', 'Operation Deleted!');
        }
    }
}
