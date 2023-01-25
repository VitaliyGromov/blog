<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 12;

        $posts = Post::allPosts($limit);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $categoryName = Category::getCategoryNameById($post->category_id);

        foreach($categoryName as $value){
            $category = $value['category_name'];
        }

        $user = User::getUserNameById($post->user_id);

        foreach($user as $userInfo){
            $userLastName = $userInfo['last_name'];
            $userFirstName = $userInfo['first_name'];
        }
        
        return view('blog.show', compact('post', 'category', 'userFirstName', 'userLastName'));
    }
}