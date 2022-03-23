<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Attendance;

class AttendanceController extends Controller
{
    public function add()
    {
        return view('attendance.attend');
    }
    
    public function attend()
    {
        Auth::user()->attendances()->save(new Attendance(['attend_time' => Carbon::now()]));
        return redirect()->back();
    }
    
    public function leave()
    {
        Auth::user()->attendances()->orderBy('created_at', 'desc')->first()->update(['leave_time' => Carbon::now()]);
        return redirect()->back();
    }
}
