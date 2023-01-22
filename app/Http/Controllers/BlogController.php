<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = new Category();

        $allCategories = $categories->getAllCategories()->toArray();

        $categoriesNames = [];

        for ($i = 0; $i < sizeof($allCategories); $i ++){
            array_push($categoriesNames, $allCategories[$i]['category_name']);
        }

        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'pabe' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 12;

        $posts = Post::query()
            ->where('published', true)
            ->orderBy('published_at', 'desc')
            ->paginate($limit, ['id', 'title', 'published_at']);

        return view('blog.index', compact('posts', 'categoriesNames'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}