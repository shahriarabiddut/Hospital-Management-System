<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $data = Test::all();
        return view('admin.test.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Test();
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'test1' => 'required',
            'normalrange1' => 'required',
        ]);
        $data->name = $request->name;
        $data->price = $request->price;
        for ($i = 1; $i <= 10; $i++) {
            $temp = 'test' . $i;
            $normalrange = 'normalrange' . $i;
            if ($request->$temp != '' && $request->$temp != null) {
                $data->$temp = $request->$temp;
                $data->$normalrange  = $request->$normalrange;
            }
        }
        $data->save();

        return redirect()->route('admin.test.index')->with('success', 'TestData has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Test::find($id);
        if ($data == null) {
            return redirect()->route('admin.test.index')->with('danger', 'Not Found!');
        }
        return view('admin.test.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Test::find($id);
        if ($data == null) {
            return redirect()->route('admin.test.index')->with('danger', 'Not Found!');
        }
        $test = Test::find($id);
        //In Test Count
        $totalTest = 0;
        for ($i = 1; $i <= 10; $i++) {
            $temp = 'test' . $i;
            if ($test->$temp == '' && $test->$temp == null) {
                $totalTest = $i - 1;
                break;
            }
        }
        return view('admin.test.edit', ['data' => $data, 'totalTest' => $totalTest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $totalTest = $request->totalTest;
        $string = 'normalrange';
        for ($i = 1; $i <= $totalTest; $i++) {
            $temp = $string . $i;
            $request->validate([
                $temp => 'required',
            ]);
        }
        $data = Test::find($id);
        for ($i = 1; $i <= $totalTest; $i++) {
            $temp = $string . $i;
            $data->$temp = $request->$temp;
        }

        $data->save();

        return redirect()->route('admin.test.index')->with('success', 'TestData has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Test::find($id);
        $data->delete();
        return redirect()->route('admin.test.index')->with('danger', 'Test has been deleted Successfully!');
    }
}
