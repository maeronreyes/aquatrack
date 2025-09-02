<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsageLimit;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UsageLimitRequest;

class UsageLimitController extends Controller
{
    //
    public function index()
    {
        $usageLimits = UsageLimit::all();
        return view('usagelimits.index', compact('usageLimits'));
    }

    public function create(){
        $users = User::all();
        return view('usagelimits.create', compact('users'));
    }

    public function store(UsageLimitRequest $request)
    {
        // Validate and create the device
        $validate = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
            'period_type' => 'required|string|max:255',
            'max_consumption' => 'required|string|max:255',
        ]);

        // $validate = $request->validated();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
            // return response()->json(['errors' => $validate->errors()], 422);
        }

        $data = $validate->validated();
        $data['roles'] = 'user';

        UsageLimit::create($data);

        return redirect()->route('usagelimits.create')->with('success', 'Device created successfully.');
    }
    
    public function edit(Request $request, $id)
    {
        $usagelimits = UsageLimit::findOrFail($id);
        $users = User::all();
        return view('usagelimits.edit', compact('usagelimits', 'users'));
    }

    public function update(Request $request, $id)
    {
        $usagelimits = UsageLimit::findOrFail($id);
        $usagelimits->update($request->all());
        return redirect()->route('usagelimits.edit', $usagelimits->id)->with('success', 'Device updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        // return"wew";
        $device = UsageLimit::findOrFail($id);
        $device->delete();
        return redirect()->route('usagelimits.index')->with('success', 'Device deleted successfully.');
    }
}
