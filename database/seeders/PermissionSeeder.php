<?php

namespace Database\Seeders;

use App\Models\Permission;
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
        $createPosts = new Permission();
        $createPosts->name = 'Create Posts';
        $createPosts->slug = 'create-posts';
        $createPosts->save();

        $editPosts = new Permission();
        $editPosts->name = 'Edit Posts';
        $editPosts->slug = 'edit-posts';
        $editPosts->save();

        $deletePosts = new Permission();
        $deletePosts->name = 'Delete Posts';
        $deletePosts->slug = 'delete-posts';
        $deletePosts->save();

        $deletePostsFromBlog = new Permission();
        $deletePostsFromBlog->name = 'Delete posts from Blog';
        $deletePostsFromBlog->slug = 'delete-posts-from-blog';
    }
}
