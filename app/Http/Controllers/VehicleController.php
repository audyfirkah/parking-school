<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicles;

class VehicleController extends Controller
{
    public function index()
    {

        $data = vehicles::all();

        return view('pages.admin.vehicles.index', compact('data'));
    }

    public function create()
    {
        dd("create");

        
        // return view('pages.admin.vehicles.create');
    }

    public function store(Request $request)
    {
        dd("store");
        
        
        // $request->validate([
        //     'name' => 'required',
        //     'type' => 'required',
        //     'capacity' => 'required',
        // ]);

        // vehicles::create([
        //     'name' => $request->name,
        //     'type' => $request->type,
        //     'capacity' => $request->capacity,
        // ]);

        // return redirect()->route('vehicles.index');
    }

    public function edit($id)
    {
        dd("edit", $id);

        
        // $vehicle = vehicles::find($id);
        // return view('pages.admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {

        dd("update", $id);

        
        // $request->validate([
        //     'name' => 'required',
        //     'type' => 'required',
        //     'capacity' => 'required',
        // ]);

        // $vehicle = vehicles::find($id);
        // $vehicle->name = $request->name;
        // $vehicle->type = $request->type;
        // $vehicle->capacity = $request->capacity;
        // $vehicle->save();

        // return redirect()->route('vehicles.index');
    }

    public function destroy($id)
    {
        dd("destroy", $id);
        
        // vehicles::find($id)->delete();
        // return redirect()->route('vehicles.index');
    }
}
