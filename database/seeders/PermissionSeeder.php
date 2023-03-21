<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Create-User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Index-User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Edit-User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Delete-User', 'guard_name' => 'web']);


        // Permission::create(['name' => 'Create-User', 'guard_name' => 'web']);
        // Permission::create(['name' => 'Index-', 'guard_name' => 'web']);
        // Permission::create(['name' => 'Edit-', 'guard_name' => 'web']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'web']);

        // Permission::create(['name' => 'Create-', 'guard_name' => '']);
        // Permission::create(['name' => 'Create-', 'guard_name' => '']);
        // Permission::create(['name' => 'Create-', 'guard_name' => '']);
        // Permission::create(['name' => 'Create-', 'guard_name' => '']);
    }
}
