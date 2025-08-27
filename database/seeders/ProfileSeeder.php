<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;


class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Profile::create([
            'user_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com'
        ]); 
    }
}
