<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::insert([
            ['group' => 'User', 'name' => 'view-user-list', 'guard_name' => 'View User List'],
            ['group' => 'User', 'name' => 'create-user', 'guard_name' => 'Create User'],
            ['group' => 'User', 'name' => 'edit-user', 'guard_name' => 'Edit User'],
            ['group' => 'User', 'name' => 'delete-user', 'guard_name' => 'Delete User'],

            ['group' => 'Role', 'name' => 'view-role-list', 'guard_name' => 'View Role List'],
            ['group' => 'Role', 'name' => 'create-role', 'guard_name' => 'Create Role'],
            ['group' => 'Role', 'name' => 'edit-role', 'guard_name' => 'Edit Role'],
            ['group' => 'Role', 'name' => 'delete-role', 'guard_name' => 'Delete Role'],

            ['group' => 'Permission', 'name' => 'view-permission-list', 'guard_name' => 'View Permission List'],
            ['group' => 'Permission', 'name' => 'create-permission', 'guard_name' => 'Create Permission'],
            ['group' => 'Permission', 'name' => 'edit-permission', 'guard_name' => 'Edit Permission'],
            ['group' => 'Permission', 'name' => 'delete-permission', 'guard_name' => 'Delete Permission'],
        ]);

        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo($permission);

        $user = User::create([
            'name' => fake()->name(),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole($role);
    }
}
