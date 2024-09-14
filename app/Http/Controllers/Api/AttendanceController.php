<?php

namespace App\Http\Controllers\Api;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    //checkIn
    public function checkIn(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $Attendance = Attendance::create([
            'user_id' => $request->user()->id,
            'date' => date('Y-m-d'),
            'time_in' => date('H:i:s'),
            'latlan_in' => $request->latitude . ',' . $request->longitude,

        ]);

        return response()->json([
            'message' => 'Check-in success!',
            'attendance' => $Attendance
        ], 200);


    }
}
