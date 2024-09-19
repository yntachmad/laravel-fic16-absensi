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
            'name' => ['required','string','max:255'],
            // 'description' => ['required','string','max:255'],
            // 'user_id' => ['required','integer'],
            'date_permission' => ['required','date'],
            // 'reason' => ['required','string','max:255'],
            // 'image' => ['nullable','image','mimes:jpeg,png,jpg','max:2048'],
        ]);

        $permission = new Permission();
        $permission->user_id = $request->user()->id;
        $permission->date_permission = $request->date;
        $permission->reason = $request->reason;
        $permission->is_approved = false;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $permission->id . '.' . $image->getClientOriginalExtension();
            $image->storeAs(public_path('storage/permission'), $imageName);
            $permission->image = $imageName;

        }

        $permission->save();

        return response()->json(['message' => 'Permisson has been created successfully']);
    }
}
