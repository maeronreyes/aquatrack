<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = User::all(); // Eloquent query
        return view('user.index',compact('users'));
    }
    
    public function create(Request $request)
    {
        // Validate and create the user
        return view('user.create');

    }

    public function store(UserRequest $request)
    {
        // Validate and create the user
    $validate = Validator::make($request->all(), [
        'username' => 'required|string|max:255',
        'full_name' => 'required|string|max:255',
        'email'    => 'required|string|email|max:255',
        'password' => 'required|string',
    ]);

        // $validate = $request->validated();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
            // return response()->json(['errors' => $validate->errors()], 422);
        }

        $data = $validate->validated();
        $data['roles'] = 'user';

        User::create($data);

        return redirect()->route('users.create')->with('success', 'User created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update($request->all());
        return $users;
    }

    public function destroy(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
