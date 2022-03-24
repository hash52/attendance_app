<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Attendance;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $attendances = Attendance::orderBy('attend_time')->get();
        $year_selections = range($attendances->first()->attend_time->year, $attendances->last()->attend_time->year);
        $displayed_year = $request->year ? $request->year : Carbon::now()->year;
        return view('admin.user.index', compact('users', 'year_selections', 'displayed_year'));
    }
}
