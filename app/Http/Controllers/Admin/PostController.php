<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return 'Страница со всеми постами';
    }

    public function create()
    {
        return 'Страница создания поста';
    }

    public function store()
    {
        return 'Запрос на создание поста';
    }

    public function show($post)
    {
        return "Страница поста с id {$post}";
    }

    public function edit($post)
    {
        return "Страница изменения поста с id {$post}";

    }

    public function update()
    {
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