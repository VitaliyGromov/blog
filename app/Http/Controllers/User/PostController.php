<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore iusto molestiae expedita magni cupiditate sunt aliquid, odio doloremque laborum officiis.',
            'category_id' => 1
        ];

        $posts = array_fill(0, 10, $post);
        
        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
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

    public function update(Request $request, $post)
    {
        // return redirect()->route('user.posts.show', $post);
        // the same
        return redirect()->back();
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
 