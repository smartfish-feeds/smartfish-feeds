<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        $validatedData['status'] = 0;

        Schedule::create($validatedData);

        return redirect()->route('schedule.index')->with('success', 'Schedule created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('schedule.index');
    }

    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.update', compact('schedule'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        $validatedData['status'] = 0;

        Schedule::where('id', $id)->update($validatedData);

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(string $id)
    {
        Schedule::where('id', $id)->delete();
        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully');
    }
}
