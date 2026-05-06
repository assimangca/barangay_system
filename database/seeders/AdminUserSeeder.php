<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder {
    public function run(): void {
        $captain = User::firstOrCreate(['email' => 'captain@barangay.gov.ph'], [
            'name' => 'Juan Dela Cruz', 'password' => Hash::make('Captain@123'),
            'phone' => '09171234567', 'is_active' => true,
        ]);
        $captain->assignRole('captain');

        $treasurer = User::firstOrCreate(['email' => 'treasurer@barangay.gov.ph'], [
            'name' => 'Maria Santos', 'password' => Hash::make('Treasurer@123'),
            'phone' => '09181234567', 'is_active' => true,
        ]);
        $treasurer->assignRole('treasurer');

        $secretary = User::firstOrCreate(['email' => 'secretary@barangay.gov.ph'], [
            'name' => 'Pedro Reyes', 'password' => Hash::make('Secretary@123'),
            'phone' => '09191234567', 'is_active' => true,
        ]);
        $secretary->assignRole('secretary');

        $this->command->info('Admin users created.');
        $this->command->table(
            ['Role','Email','Password'],
            [
                ['Captain',   'captain@barangay.gov.ph',   'Captain@123'],
                ['Treasurer', 'treasurer@barangay.gov.ph', 'Treasurer@123'],
                ['Secretary', 'secretary@barangay.gov.ph', 'Secretary@123'],
            ]
        );
    }
}