<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        return view('blog.index', compact('posts'));
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 1,
            'title' => 'Lorem, ipsum dolor.',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore iusto molestiae expedita magni cupiditate sunt aliquid, odio doloremque laborum officiis.',
        ];

        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return 'Поставить лайк на пост';
    }
}