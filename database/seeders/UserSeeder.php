<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'first_name' => 'Виталий',
            'last_name' => 'Громов',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234567890'),
        ]);

        $admin->assignRole('admin');

        for($i = 0; $i < 10; $i++){

            $user = User::create([
                'first_name' => fake()->name(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                'password' => Hash::make('password123'),
            ]);
    
            $user->assignRole('user');
        }
    }
}
