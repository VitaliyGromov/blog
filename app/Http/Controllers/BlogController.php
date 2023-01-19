<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'pabe' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 12;

        $posts = Post::query()->where('published', true)->orderBy('published_at', 'desc')->paginate($limit, ['id', 'title', 'published_at']);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return 'Поставить лайк на пост';
    }
}