<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\SwitchMaster;

class DashboardController extends Controller
{
    public function index()
    {
        $data['schedules'] = Schedule::all();

        return view('dashboard', $data);
    }
}
