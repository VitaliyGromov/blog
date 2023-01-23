<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::getAllCategories();

        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 12;

        $posts = Post::allPosts($limit);

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}