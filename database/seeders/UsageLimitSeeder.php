<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsageLimit;

class UsageLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         UsageLimit::create([
            'user_id' => 1,
            'period_type' => 'monthly',
            'max_consumption' => 1000
        ]); 
    }
}
