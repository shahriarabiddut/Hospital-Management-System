<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('admin.patient.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Student();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required | min:6',
            'mobile' => 'required',
            'guardian' => 'required',
            'dob' => 'required',
        ]);

        //If user Gieven address
        if ($request->has('address')) {
            $data->address = $request->address;
        }
        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $data->photo = $request->file('photo')->store('PatientPhoto', 'public');
        }
        //If user Gieven any PHOTO
        if ($request->hasFile('prescription')) {
            $data->prescription = $request->file('prescription')->store('Prescription', 'public');
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->guardian = $request->guardian;
        $data->dob = $request->dob;
        $data->save();
        return redirect('admin/patient')->with('success', 'Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Student::find($id);
        return view('admin.patient.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Student::find($id);
        return view('admin.patient.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Student::find($id);
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        //If user Gieven address
        if ($request->has('address')) {
            $formFields['address'] = $request->address;
        }
        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('StudentPhoto', 'public');
        } else {
            $formFields['photo'] = $request->prev_photo;
        }

        $data->update($formFields);
        return redirect('admin/patient')->with('success', 'Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect('admin/patient')->with('danger', 'Data has been deleted Successfully!');
    }
}
