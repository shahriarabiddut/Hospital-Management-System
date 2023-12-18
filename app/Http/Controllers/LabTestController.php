<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\LabTest;
use App\Models\Test;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = LabTest::all();
        return view('staff.labtest.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $patients = User::all();
        $technician = Staff::all()->where('type', 'technician');
        $test = Test::all();

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.labtest.create', ['nextDate' => $nextDate, 'patients' => $patients, 'technician' => $technician, 'test' => $test]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'patient_id' => 'required',
            'test_id' => 'required',
            'technician_id' => 'required',
            'date' => 'required',
        ]);
        $data = new LabTest();
        $test = Test::all()->where('id', '=', $request->test_id)->first();
        //
        $data->patient_id = $request->patient_id;
        $data->technician_id = $request->technician_id;
        $data->test_id = $request->test_id;
        $data->date = $request->date;
        $data->save();
        //Generate Bill
        $BillController = new BillController();
        $BillController->labtestBill($request->patient_id, $test->price, $data->id);
        return redirect()->route('staff.labtest.index')->with('success', 'Labtest Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = LabTest::find($id);
        $test = Test::find($data->test_id);
        //In Test Count
        $totalTest = 0;
        for ($i = 1; $i <= 10; $i++) {
            $temp = 'test' . $i;
            if ($test->$temp == '' && $test->$temp == null) {
                $totalTest = $i - 1;
                break;
            }
        }
        //

        if ($data == null) {
            return redirect()->route('staff.labtest.index')->with('danger', 'Not Found!');
        }
        return view('staff.labtest.show', ['data' => $data, 'totalTest' => $totalTest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = LabTest::find($id);
        $test = Test::find($data->test_id);
        $totalTest = 0;
        for ($i = 1; $i <= 10; $i++) {
            $temp = 'test' . $i;
            if ($test->$temp == '' && $test->$temp == null) {
                $totalTest = $i - 1;
                break;
            }
        }
        return view('staff.labtest.edit', ['data' => $data, 'totalTest' => $totalTest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $totalTest = $request->totalTest;
        $string = 'result';
        for ($i = 1; $i <= $totalTest; $i++) {
            $temp = $string . $i;
            $request->validate([
                $temp => 'required',
            ]);
        }
        $data = LabTest::find($id);
        for ($i = 1; $i <= $totalTest; $i++) {
            $temp = $string . $i;
            $data->$temp = $request->$temp;
        }
        $data->save();
        return redirect()->route('staff.labtest.index')->with('success', 'Labtest Result Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $data = LabTest::find($id);
        //Delete Bill
        $BillController = new BillController();
        $statusCheck = $BillController->billDelete($data->id, 'test');
        if ($statusCheck == 0) {
            return redirect()->back()->with('danger', 'Bad Request!Warning!');
        } else {
            //
            $data->delete();
            return redirect()->route('staff.labtest.index')->with('danger', 'Labtest Deleted!');
        }
    }
}
