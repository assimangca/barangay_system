<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Official; // Add this line!

class OfficialSeeder extends Seeder
{
    public function run(): void
    {
        Official::create([
            'name' => 'Hon. Juan Dela Cruz',
            'position' => 'Barangay Chairman',
            'committee' => 'Executive',
            'rank' => 1
        ]);

        Official::create([
            'name' => 'Hon. Maria Clara',
            'position' => 'Barangay Kagawad',
            'committee' => 'Health & Social Services',
            'rank' => 2
        ]);
    }
}