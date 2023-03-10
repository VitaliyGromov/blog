<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::allPosts(); 

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $category = Category::getCategoryNameById($post->category_id);

        $user = User::getUserNameById($post->user_id);
        
        return view('blog.show', compact('post', 'category', 'user'));
    }

    public function edit(Post $post)
    {
        $categories = Category::getAllCategories();

        return view('blog.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update([...$validated, 'user_id' => $post->user_id]);

        return redirect()->route('blog');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('blog');
    }
    public function search(Request $request)
    {
        $title = $request->input('title');


        return view('blog.index', compact('posts'));
    }
}