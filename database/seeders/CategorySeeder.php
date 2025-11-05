<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiction', 'description' => 'Fictional books.'],
            ['name' => 'Non-Fiction', 'description' => 'Non-fictional books.'],
            ['name' => 'Science', 'description' => 'Books about science.'],
            ['name' => 'History', 'description' => 'Historical books.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                    'slug' => Str::slug($category['name']),
                ]
            );
        }
    }
}
