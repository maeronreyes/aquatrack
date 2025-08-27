<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\User;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   
 $userId = 1; // or pick dynamically

        foreach (range(1, 50) as $i) {
            Device::create([
                'user_id' => $userId,
                'device_name' => "Device {$i}",
                'serial_number' => "SN-" . str_pad($i, 5, "0", STR_PAD_LEFT),
                'location_description' => "Location {$i}",
                'install_date' => now()->subDays(rand(1, 60)),
                'status' => collect(['active', 'inactive', 'maintenance'])->random(),
            ]);
        }

    }
}
