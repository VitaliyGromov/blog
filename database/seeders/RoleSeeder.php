<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();

        $regularUser = new Role();
        $regularUser->name = 'Regular User';
        $regularUser->slug = 'regular-user';
        $regularUser->save();
    }
}
