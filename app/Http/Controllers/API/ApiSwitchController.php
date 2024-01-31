<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SwitchMaster;

class ApiSwitchController extends Controller
{
    public function index()
    {
        $switchs = SwitchMaster::all();

        return response()->json($switchs, 200);
    }

    public function show($id)
    {
        $switch = SwitchMaster::find($id);

        return response()->json($switch, 200);
    }

    public function update($id)
    {
        $switch = SwitchMaster::find($id);

        $switch->status = (!$switch->status) ? config('status.switch.system.on') : config('status.switch.system.off');
        $switch->save();

        return response()->json('Successfully Updated Sensor Data', 200);
    }
}
