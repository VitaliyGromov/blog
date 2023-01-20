<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->where('user_id', Auth::id())->paginate(12, ['title', 'published_at', 'id']);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'published' => ['nullable'],
            'published_at' => ['nullable','string', 'date'],
        ]);

        $post = new Post();

        $post->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published' => $validated['published'] ?? false,
            'published_at' => new Carbon($validated['published_at']) ?? null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user');
    }

    public function show(Post $post)
    {
        return view('user.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {  
        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'published' => ['nullable'],
            'published_at' => ['nullable','string', 'date'],
        ]);

        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published' => $validated['published'] ?? false,
            'published_at' => new Carbon($validated['published_at']) ?? null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('user');
    }

    public function like()
    {
        return 'Like + 1';
    }
}
 