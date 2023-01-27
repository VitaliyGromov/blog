<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $regularUserRole = Role::where('slug', 'regular-user')->first();

        $createPostsPermission = Permission::where('slug', 'create-posts')->first();
        $editPostsPermission = Permission::where('slug', 'edit-posts')->first();
        $deletePostsPermission = Permission::where('slug', 'delete-posts')->first();
        $deletePostsFromBlog = Permission::where('slug', 'delete-posts-from-blog')->first();

        $adminUser = new User();
        $adminUser->first_name = 'Vitaliy';
        $adminUser->last_name = 'Gromov';
        $adminUser->email = 'gromov.vitaliy@gmail.com';
        $adminUser->password = bcrypt('123456');
        $adminUser->save();

        $adminUser->roles()->attach($adminRole);
        $adminUser->roles()->attach([$createPostsPermission, $editPostsPermission, $deletePostsPermission, $deletePostsFromBlog]);

        $regularUser = new User();
        $regularUser->first_name = 'Ivan';
        $regularUser->last_name = 'Mracobesov';
        $regularUser->email = 'ivan.ivan@03.com';
        $regularUser->password = bcrypt('654321');
        $regularUser->save();

        $regularUser->roles()->attach($regularUserRole);
        $regularUser->permissions()->attach([$createPostsPermission, $editPostsPermission, $deletePostsPermission]);

    }
}
