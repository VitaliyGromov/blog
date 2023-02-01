<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    static public function allPosts()
    {
        return self::query()
            ->where('published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12, ['id', 'title', 'published_at', 'category_id']);
    }

    static public function getPostsBySearch($search)
    {
        return self::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
    }

    static public function getPostsByUser()
    {
        return self::query()
            ->where('user_id', Auth::id())
            ->paginate(12, ['title', 'published_at', 'id', 'published']);
    }

    protected $fillable = [
        'user_id', 
        'title', 
        'body', 
        'published', 
        'published_at',
        'category_id',       
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
