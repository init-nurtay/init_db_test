<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'user'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }



        $permissions = [
['name' => 'create lead'],
['name' => 'read lead'],
['name' => 'update lead'],
['name' => 'delete lead'],
        ];
        $role = Role::findByName('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);
            $role->givePermissionTo($permission);
        }
    }
}
