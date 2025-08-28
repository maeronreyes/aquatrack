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
       $user = User::first(); // or User::find($id);

$user->devices()->create([
    'device_name' => 'Device 1',
    'serial_number' => 'SN-00001',
    'location_description' => 'Location 1',
    'install_date' => "2025-01-01",
    'status' => 'maintenance',
]);
    

    }
}
