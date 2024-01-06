<?php

namespace App\Http\Controllers\Staff;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Staff;
use App\Models\RoomType;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BillController;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Admission::all();
        return view('staff.admission.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pateient = User::all();
        $doctor = Staff::all()->where('type', 'doctor');
        $nurse = Staff::all()->where('type', 'nurse');
        $roomType = RoomType::all();
        $room = Room::all();

        //checking if its tommorow
        $currentDate = Carbon::now(); // get current date and time
        $current_time = $currentDate->setTimezone('GMT+6')->format('H:i:s'); // "00:10:15"
        $nextDate = $currentDate->addDay(); // add one day to current date
        $nextDate = $nextDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
        return view('staff.admission.create', ['nextDate' => $nextDate, 'pateient' => $pateient, 'doctor' => $doctor, 'nurse' => $nurse, 'roomType' => $roomType, 'room' => $room]);
    }
    // Check available-rooms
    public function available_rooms($checkin_date)
    {
        //
        $arooms = DB::select("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM admissions WHERE '$checkin_date' BETWEEN check_in AND check_out)  AND vacancy>=1");
        $data = [];
        foreach ($arooms as $aroom) {
            $roomTypes = RoomType::find($aroom->room_type_id);
            $data[] = ['room' => $aroom, 'roomtype' => $roomTypes];
        }

        return response()->json(['data' => $data]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'nurse_id' => 'required',
            'room_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'seat' => 'required',
        ]);
        // Room Type
        $room = Room::all()->where('id', $request->room_id)->first();
        if ($request->seat > $room->vacancy && $room->vacancy == 0) {
            return redirect()->route('staff.admission.index')->with('danger', 'Only ' . $room->vacancy . ' Vacant Seats in room no ' . $room->title . ' ! Requested seats ' . $request->seat . '!');
        }
        //Room Type
        $data = new Admission();
        $data->patient_id = $request->patient_id;
        $data->doctor_id = $request->doctor_id;
        $data->nurse_id = $request->nurse_id;
        $data->room_type_id = $room->room_type_id;
        $data->room_id = $request->room_id;
        $data->check_in = $request->check_in;
        $data->check_out = $request->check_out;
        $data->seat = $request->seat;
        $data->status = 0;
        $data->save();

        //Reduce Vacancy
        $room->vacancy = $room->vacancy - $request->seat;
        $room->save();

        return redirect()->route('staff.admission.index')->with('success', 'Admission Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Admission::find($id);
        if ($data == null) {
            return redirect()->route('staff.admission.index')->with('danger', 'Not Found!');
        }
        return view('staff.admission.show', ['data' => $data]);
    }

    public function edit(string $id)
    {
        //
        $data = Admission::find($id);
        if ($data->status == 1) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        //
        $nextDate = $data->check_out;
        return view('staff.admission.edit', ['nextDate' => $nextDate, 'data' => $data]);
    }
    public function update(Request $request, $id)
    {
        //
        $data = Admission::find($id);
        if ($data->status == 1) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $request->validate([
            'check_out' => 'required',
        ]);
        $data->check_out = $request->check_out;
        if ($request->check_out == $request->old_check_out) {
            $data->status = 1;
            //Generate Bill
            $date1 = Carbon::parse($data->check_in);
            $date2 = Carbon::parse($request->check_out);
            $diff = $date1->diff($date2);
            $daysDifference = $diff->days;
            if ($daysDifference == 0) {
                $daysDifference = 1;
            }

            $roomType = RoomType::find($data->room_type_id);
            $roomTypePrice = $roomType->price * $data->seat;
            $roomRent = $roomTypePrice * $daysDifference;

            $BillController = new BillController();
            $BillController->admissionBill($data->patient_id, $data->id, $roomRent);
            // Bill
        }
        $data->save();


        return redirect()->route('staff.admission.index')->with('success', ' Checkout Date Updated!');
    }

    public function checkout(string $id)
    {
        //
        $data = Admission::find($id);
        if ($data->status == 1) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        //
        $currentDate = Carbon::now(); // get current date and time
        $currentDateData = $currentDate->setTimezone('GMT+6')->format('Y-m-d');
        //
        $data->check_out = $currentDateData;
        $data->status = 1;
        $data->save();

        //Generate Bill
        $date1 = Carbon::parse($data->check_in);
        $date2 = Carbon::parse($currentDateData);
        $diff = $date1->diff($date2);
        $daysDifference = $diff->days;
        if ($daysDifference == 0) {
            $daysDifference = 1;
        }

        $roomType = RoomType::find($data->room_type_id);
        $roomTypePrice = $roomType->price * $data->seat;
        $roomRent = $roomTypePrice * $daysDifference;

        $BillController = new BillController();
        $BillController->admissionBill($data->patient_id, $data->id, $roomRent);
        // Bill

        return redirect()->route('staff.admission.index')->with('success', 'Admission Checked out! Please Pay The Bill!');
    }
    public function destroy(string $id)
    {
        //
        //
        $data = Admission::find($id);
        //Delete Bill
        $BillController = new BillController();
        $statusCheck = $BillController->billDelete($data->id, 'admission');
        if ($statusCheck == 0) {
            return redirect()->back()->with('danger', 'Bad Request!Warning!');
        } else {
            //
            $data->delete();
            return redirect()->route('staff.admission.index')->with('danger', 'Admission Deleted!');
        }
    }
}
