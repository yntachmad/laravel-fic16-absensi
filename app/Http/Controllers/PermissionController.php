<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //index
    public function index(Request $request)
    {
        $permission = Permission::with('user')
        ->when($request->input('name'), function ($query, $name) {
            $query->whereHas('user', function ($query) use ($name){
                $query->where('name','like', "%.$name.%");
            });
        })->orderBy('id','desc')->paginate(10);

        return view('pages.permission.index', [
            'permissions' => $permission,
            'type_menu' => 'master_data'
        ]);
    }

    //view
    public function show(Permission $permission)
    {
        return view('pages.permission.show', [
            'permission' => $permission,
            'type_menu' => 'master_data'
        ]);
    }

    //edit
    public function edit(Permission $permission)
    {
        return view('pages.permission.edit', [
            'permission' => $permission,
            'type_menu' => 'master_data'
        ]);
    }

    //update
    public function update(Request $request, Permission $permission)
    {
    //     $request->validate([
    //         'name' => ['required','string','max:255'],
    //         'description' => ['required','string','max:255'],
    //     ]);

        $permission->is_approved = $request->is_approved;
        $permission->save();

        return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
    }
}
