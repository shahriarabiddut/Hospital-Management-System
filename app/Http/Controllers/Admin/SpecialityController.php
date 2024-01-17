<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    //
    public function index()
    {
        $data = Speciality::all();
        return view('admin.speciality.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.speciality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Speciality;
        $request->validate([
            'name' => 'required',
        ]);
        $data->name = $request->name;
        $data->save();

        return redirect('admin/speciality')->with('success', 'Speciality has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Speciality::find($id);
        return view('admin.speciality.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Speciality::find($id);
        return view('admin.speciality.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Speciality::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $data->name = $request->name;
        $data->save();

        return redirect('admin/speciality')->with('success', ' Speciality has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Speciality::find($id);
        $data->delete();
        return redirect('admin/speciality')->with('danger', ' Speciality has been deleted Successfully!');
    }
}
