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

    //checkOut
    public function checkOut(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $attendance = Attendance::where('user_id', $request->user()->id)
            ->whereDate('date', date('Y-m-d'))
            ->first();

        if (!$attendance) {
            return response()->json([
               'message' => 'No check-in record found for today!',
            ], 404);
        }

        $attendance->time_out = date('H:i:s');
        $attendance->latlan_out = $request->latitude. ','. $request->longitude;

        $attendance->save();

        return response()->json([
           'message' => 'Check-out success!',
            'attendance' => $attendance
        ], 200);
    }

    //check is  checkin
    public function isCheckin(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->where('date', date('Y-m-d'))
            ->first();

        return response()->json([
            'is_checkin' => $attendance ? true : false,
            'attendance' => $attendance,
        ], 200);
    }
}
