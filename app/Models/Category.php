<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    static public function getAllCategories()
    {
        return self::all('id', 'category_name');
    }

    protected $fillable = [
        'category_name'
    ];
}
