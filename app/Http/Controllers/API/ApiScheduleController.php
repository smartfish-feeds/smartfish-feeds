<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ApiScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return response()->json($schedules, 200);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        return response()->json($schedule, 200);
    }

    public function update($id)
    {
        Schedule::where('id', '!=', $id)->update(['status' => config('status.schedule.undone')]);

        $schedule = Schedule::find($id);

        $schedule->status = config('status.schedule.done');
        $schedule->save();

        return response()->json('Successfully Updated Schedule Data', 200);
    }

    public function getDone()
    {
        $schedules = Schedule::where('status', config('status.schedule.done'))->first();

        $data = ($schedules) ? $schedules->name.' Telah Diberikan' : '-';

        return response()->json($data, 200);
    }
}
