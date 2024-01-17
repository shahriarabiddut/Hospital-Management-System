<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypeController extends Controller
{
    //
    public function index()
    {
        $data = RoomType::all();
        return view('admin.roomtype.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new RoomType;
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'seat' => 'required',
            'price' => 'required',
        ]);
        $data->title = $request->title;
        $data->details = $request->details;
        $data->seat = $request->seat;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/roomtype')->with('success', 'RoomType has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = RoomType::find($id);
        return view('admin.roomtype.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = RoomType::find($id);
        return view('admin.roomtype.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = RoomType::find($id);
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'seat' => 'required',
            'price' => 'required',
        ]);
        $data->title = $request->title;
        $data->details = $request->details;
        $data->seat = $request->seat;
        $data->price = $request->price;
        $data->save();

        return redirect('admin/roomtype')->with('success', ' RoomType has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = RoomType::find($id);
        $data->delete();
        return redirect('admin/roomtype')->with('danger', ' RoomType has been deleted Successfully!');
    }
}
