<?php

namespace App\Http\Controllers\Admin;

use App\Models\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreeController extends Controller
{
    //
    public function index()
    {
        $data = Degree::all();
        return view('admin.degree.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Degree;
        $request->validate([
            'name' => 'required',
        ]);
        $data->name = $request->name;
        $data->save();

        return redirect('admin/degree')->with('success', 'Degree has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Degree::find($id);
        return view('admin.degree.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Degree::find($id);
        return view('admin.degree.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Degree::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $data->name = $request->name;
        $data->save();

        return redirect('admin/degree')->with('success', ' Degree has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Degree::find($id);
        $data->delete();
        return redirect('admin/degree')->with('danger', ' Degree has been deleted Successfully!');
    }
}
