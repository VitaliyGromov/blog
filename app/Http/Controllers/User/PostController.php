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

        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $posts =array_filter($posts, function($post) use($search, $category_id){
            if($post && ! str_contains($post->title, $search)){
                return false;
            }

            if($post && $post->category_id != $category_id){
                return false;
            }

            return true;
        });
         
        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        dd($title, $content);
        return 'Запрос на создание поста';
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
        $title = $request->input('title');
        $content = $request->input('content');

        dd($title, $content);

        return 'Запрос на изменение поста';
    }

    public function destroy()
    {
        return 'Запрос на удаление поста';
    }

    public function like()
    {
        return 'Like + 1';
    }
}
 