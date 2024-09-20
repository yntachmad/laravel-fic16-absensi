<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //store
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => ['required','string','max:255'],
            // 'description' => ['required','string','max:255'],
            // 'user_id' => ['required','integer'],
            'date_permission' => ['required'],
            // 'reason' => ['required','string','max:255'],
            // 'image' => ['nullable','image','mimes:jpeg,png,jpg','max:2048'],
        ]);

        $permission = new Permission();
        $permission->user_id = $request->user()->id;
        $permission->date_permission = $request->date_permission;
        $permission->reason = $request->reason;
        $permission->is_approved = 0;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/permission', $image->hashName());
            $permission->image = $image->hashName();

        }

        $permission->save();

        return response()->json(['message' => 'Permisson has been created successfully']);
    }
}
