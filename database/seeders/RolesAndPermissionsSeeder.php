<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {
    public function run(): void {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view projects','create projects','edit projects','delete projects',
            'view budgets','create budgets','edit budgets','delete budgets',
            'view expenses','create expenses','edit expenses','approve expenses','delete expenses',
            'view complaints','respond complaints','assign complaints','delete complaints',
            'view reports','generate reports',
            'view users','manage users',
        ];
        foreach ($permissions as $p) { Permission::firstOrCreate(['name' => $p]); }

        $captain = Role::firstOrCreate(['name' => 'captain']);
        $captain->syncPermissions(Permission::all());

        $treasurer = Role::firstOrCreate(['name' => 'treasurer']);
        $treasurer->syncPermissions([
            'view projects',
            'view budgets','create budgets','edit budgets',
            'view expenses','create expenses','edit expenses','approve expenses',
            'view complaints',
            'view reports','generate reports',
        ]);

        $secretary = Role::firstOrCreate(['name' => 'secretary']);
        $secretary->syncPermissions([
            'view projects','create projects','edit projects',
            'view budgets','view expenses',
            'view complaints','respond complaints','assign complaints',
            'view reports',
        ]);

        Role::firstOrCreate(['name' => 'resident']);
        $this->command->info('Roles and permissions seeded.');
    }
}