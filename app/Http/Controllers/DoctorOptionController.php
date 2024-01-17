<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\DoctorDegree;
use App\Models\DoctorSpeciality;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DoctorDegree::all()->where('doctor_id', Auth::guard('staff')->user()->id);
        $data2 = DoctorSpeciality::all()->where('doctor_id', Auth::guard('staff')->user()->id);
        return view('staff.info.index', ['data' => $data, 'data2' => $data2, 'user' => Auth::guard('staff')->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create1(string $information)
    {
        //
        if ($information == 'degree') {
            $data = Degree::all();
        } else {
            $data = Speciality::all();
        }
        return view('staff.info.create', ['data' => $data, 'information' => $information]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->information == 'degree') {
            $data = new DoctorDegree();
            $request->validate([
                'info_id' => 'required',
                'value' => 'required',
            ]);
            $data->degree_id = $request->info_id;
        } else {
            $data = new DoctorSpeciality();
            $request->validate([
                'info_id' => 'required',
                'value' => 'required',
            ]);
            $data->speciality_id = $request->info_id;
        }
        $data->doctor_id = Auth::guard('staff')->user()->id;
        $data->value = $request->value;
        $data->save();

        return redirect()->route('staff.information.index')->with('success', 'Information has been addedd to profile!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $information)
    {
        //
        if ($information == 'degree') {
            $data = DoctorDegree::all()->where('doctor_id', Auth::guard('staff')->user()->id)->where('id', $id);
            if ($data != null) {
                $data = DoctorDegree::find($id);
                $data->delete();
                return redirect()->route('staff.information.index')->with('danger', 'Degree has been removed from Profile!');
            } else {
                return redirect()->route('staff.information.index')->with('danger', 'Bad Request!');
            }
        } else {
            $data = DoctorSpeciality::all()->where('doctor_id', Auth::guard('staff')->user()->id)->where('id', $id);
            if ($data != null) {
                $data = DoctorSpeciality::find($id);
                $data->delete();
                return redirect()->route('staff.information.index')->with('danger', 'Speciality has been removed from Profile!');
            } else {
                return redirect()->route('staff.information.index')->with('danger', 'Bad Request!');
            }
        }
    }
}
