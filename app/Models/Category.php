<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getAllCategories()
    {
        return $this->all('id', 'category_name');
    }

    protected $fillable = [
        'category_name'
    ];
}
