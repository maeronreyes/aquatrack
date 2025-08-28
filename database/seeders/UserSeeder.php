<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'admin',
            'email' => 'admins@example.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'roles' => 'admin'
        ]); 
    }
}
