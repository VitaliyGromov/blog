<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::getPostsByUser();

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::getAllCategories();

        return view('user.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();
    
        $post = new Post();

        $post->create([...$validated, 'user_id' => Auth::id()]);

        return redirect()->route('user');
    }

    public function show(Post $post)
    {
        return view('user.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {  
        $categories = Category::getAllCategories();
        
        return view('user.posts.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update([...$validated, 'user_id' => Auth::id()]);

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
 