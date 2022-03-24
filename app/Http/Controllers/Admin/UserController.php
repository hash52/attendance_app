<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', ['users' => User::all(), 'year' => Carbon::now()->year]);
    }
}
