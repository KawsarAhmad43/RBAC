<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Role user
        $admin = Role::create(['name' => 'Admin']);
        $moderator = Role::create(['name' => 'Moderator']);
        $captain = Role::create(['name' => 'Captain']);

        // Create Permissions
        $manageUsers = Permission::create(['name' => 'manage-users']);
        $editArticles = Permission::create(['name' => 'edit-articles']);

        // Assign Permissions to Roles
        $admin->permissions()->attach([$manageUsers->id, $editArticles->id]);
        $moderator->permissions()->attach([$editArticles->id]);
    }
}
