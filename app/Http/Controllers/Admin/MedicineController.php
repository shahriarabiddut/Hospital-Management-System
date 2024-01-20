<?php

namespace App\Http\Controllers\Admin;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    //
    public function index()
    {
        $data = Medicine::all();
        return view('admin.medicine.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Medicine;
        $request->validate([
            'name' => 'required',
            'generic' => 'required',
            'type' => 'required',
            'strength' => 'required',
            'price' => 'required',
        ]);
        $data->name = $request->name;
        $data->generic = $request->generic;
        $data->type = $request->type;
        $data->strength = $request->strength;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/medicine')->with('success', ' Medicine Data has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Medicine::find($id);
        return view('admin.medicine.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Medicine::find($id);
        return view('admin.medicine.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Medicine::find($id);
        $request->validate([
            'name' => 'required',
            'generic' => 'required',
            'type' => 'required',
            'strength' => 'required',
            'price' => 'required',
        ]);
        $data->name = $request->name;
        $data->generic = $request->generic;
        $data->type = $request->type;
        $data->strength = $request->strength;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/medicine')->with('success', ' Medicine Data has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Medicine::find($id);
        $data->delete();
        return redirect('admin/medicine')->with('danger', ' Medicine Data has been deleted Successfully!');
    }
}
