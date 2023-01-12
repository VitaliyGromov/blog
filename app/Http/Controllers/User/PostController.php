<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->paginate(12, ['id', 'title', 'published_at']);
        
        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'published' => ['nullable', 'boolean'],
            'published_at' => ['nullable','string', 'date'],
        ]);

        $post = Post::create([
            'user_id' => User::value('id'),
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published' => $validated['published'] ?? false,
            'published_at' => new Carbon($validated['published_at']) ?? null,
        ]);

        dd($post);

        // return redirect()->route('user.posts.show', 1);
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore iusto molestiae expedita magni cupiditate sunt aliquid, odio doloremque laborum officiis.',
        ];

        return view('user.posts.show', compact('post'));
    }

    public function edit($post)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore iusto molestiae expedita magni cupiditate sunt aliquid, odio doloremque laborum officiis.',
            'category_id' => 1
        ];
        
        return view('user.posts.edit', compact('post'));

    }

    public function update(Request $request)
    {
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:300'],
            'body' => ['required', 'string'],
            'published' => ['nullable', 'boolean'],
            'published_at' => ['nullable','string', 'date'],
        ]);

        $post = Post::create([
            'user_id' => User::value('id'),
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published' => $validated['published'] ?? false,
            'published_at' => new Carbon($validated['published_at']) ?? null,
        ]);
    }

    public function destroy($post)
    {
        return redirect()->route('user.posts');
    }

    public function like()
    {
        return 'Like + 1';
    }
}
 