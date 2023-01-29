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
        $category = Category::getCategoryNameById($post->category_id);

        $user = User::getUserNameById($post->user_id);
        
        return view('blog.show', compact('post', 'category', 'user'));
    }
}