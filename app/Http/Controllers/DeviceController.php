<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;
use App\Http\Requests\DeviceRequest;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    //
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }

    public function create(){
        $users = User::all();
        return view('devices.create', compact('users'));
    }

        public function store(DeviceRequest $request)
    {
        // Validate and create the device
    $validate = Validator::make($request->all(), [
        'device_name' => 'required|string|max:255',
        'user_id' => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
        'location_description' => 'required|string|max:255',
        'install_date' => 'required|date',
    ]);

        // $validate = $request->validated();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
            // return response()->json(['errors' => $validate->errors()], 422);
        }

        $data = $validate->validated();
        $data['roles'] = 'user';

        Device::create($data);

        return redirect()->route('devices.create')->with('success', 'Device created successfully.');
    }
    
    public function edit(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        return view('devices.edit', compact('device'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->update($request->all());
        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

        public function destroy(Request $request, $id)
    {
        // return"wew";
        $device = Device::findOrFail($id);
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
}
