<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Программирование', 'Игры', 'Музыка', 'Литература', 'Спорт', 'Природа', 'Еда', 'Другое'];

        foreach($categories as $category){
            Category::create([
                'category_name' => $category
            ]);
        }
    }
}
