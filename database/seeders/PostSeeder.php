<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            Post::create([
                'title' => fake()->name(),
                'body' => fake()->text(),
                'published' => 1,
                'published_at' => '2023-12-12',
                'user_id' => User::all('id')->random()->id,
                'category_id' => Category::all('id')->random()->id,
            ]);
        }
    }
}