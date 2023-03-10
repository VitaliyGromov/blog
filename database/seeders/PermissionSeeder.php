<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['delete_posts', 'edit_posts'];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission,
            ]);
        }
    }
}
