<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
    // Create and assign roles to users
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $superAdmin->assignRole('super_admin');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $manager = User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $manager->assignRole('manager');
    }
}

