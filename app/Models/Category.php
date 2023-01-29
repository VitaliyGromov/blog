<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getAllCategories()
    {
        return self::all('id', 'category_name');
    }

    public static function getCategoryNameById($id)
    {
        return self::query()
            ->where('id', $id)
            ->first();
    }

    protected $fillable = [
        'category_name'
    ];
}
