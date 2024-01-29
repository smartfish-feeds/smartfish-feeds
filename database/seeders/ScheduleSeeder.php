<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $schedules = [
            [
                'name' => 'Makan Pagi',
                'time' => '08:00',
                'status' => config('status.schedule.undone'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Makan Siang',
                'time' => '12:00',
                'status' => config('status.schedule.undone'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Schedule::insert($schedules);
    }
}
