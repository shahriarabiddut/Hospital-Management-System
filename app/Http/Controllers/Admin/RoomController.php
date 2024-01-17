<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomType;

class RoomController extends Controller
{
    //
    public function index()
    {
        $data = Room::all();
        return view('admin.rooms.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_type = RoomType::all();
        return view('admin.rooms.create', ['room_type' => $room_type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Room;
        $request->validate([
            'title' => 'required',
            'floor' => 'required',
            'location' => 'required',
            'room_type_id' => 'required',
        ]);
        $data->title = $request->title;
        $data->floor = $request->floor;
        $data->location = $request->location;
        $data->room_type_id = $request->room_type_id;
        // Get Vacancy
        $room_type = RoomType::find($request->room_type_id);
        $data->vacancy = $room_type->seat;
        $data->save();

        return redirect('admin/rooms')->with('success', 'Room has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Room::find($id);
        return view('admin.rooms.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Room::find($id);
        return view('admin.rooms.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Room::find($id);
        $request->validate([
            'title' => 'required',
            'floor' => 'required',
            'location' => 'required',
        ]);
        $data->title = $request->title;
        $data->floor = $request->floor;
        $data->location = $request->location;
        $data->save();

        return redirect('admin/rooms')->with('success', ' Room has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect('admin/rooms')->with('danger', ' Room has been deleted Successfully!');
    }
}
