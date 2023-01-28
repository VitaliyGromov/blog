<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'Виталий',
            'last_name' => 'Громов',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234567890'),
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        $admin->assignRole('admin');
    }
}
