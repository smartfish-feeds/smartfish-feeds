<?php

namespace Database\Seeders;

use App\Models\SwitchMaster;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SwitchMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $switchs = [
            [
                'name' => 'system',
                'status' => config('status.switch.system.on'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        SwitchMaster::insert($switchs);
    }
}
