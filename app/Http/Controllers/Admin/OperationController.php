<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Http\Controllers\Controller;

class OperationController extends Controller
{
    //
    public function index()
    {
        $data = OperationType::all();
        return view('admin.operation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.operation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new OperationType;
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/operation')->with('success', 'OperationType has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = OperationType::find($id);
        return view('admin.operation.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = OperationType::find($id);
        return view('admin.operation.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = OperationType::find($id);
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/operation')->with('success', ' OperationType has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = OperationType::find($id);
        $data->delete();
        return redirect('admin/operation')->with('danger', ' OperationType has been deleted Successfully!');
    }
}
