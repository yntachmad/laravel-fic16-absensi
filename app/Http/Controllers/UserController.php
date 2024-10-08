<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {

        $users = User::where('name', "like", '%' . request('name') . '%')->orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
            'type_menu' => 'master_data'
        ]);

    }

    public function create()
    {
        return view('users.create', [
            'type_menu' => 'users'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => $request->roles,
            'password' => Hash::make($request->password),
            'position' => $request->position,
            'department' => $request->department
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    //edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user,
            'type_menu' => 'users'
        ]);
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => $request->roles,
            'position' => $request->position,
            'department' => $request->department
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),

            ]);

        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
