<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kategori
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->info('Please run CategorySeeder first!');
            return;
        }

        $books = [
            ['title' => 'Naruto: Uzumaki Chronicles', 'author' => 'Masashi Kishimoto', 'price' => 12.99, 'category' => 'Fiction'],
            ['title' => 'One Piece: Grand Adventure', 'author' => 'Eiichiro Oda', 'price' => 14.50, 'category' => 'Fiction'],
            ['title' => 'Attack on Titan: The Rise', 'author' => 'Hajime Isayama', 'price' => 16.00, 'category' => 'Fiction'],
            ['title' => 'My Hero Academia: Heroes Unite', 'author' => 'Kohei Horikoshi', 'price' => 15.75, 'category' => 'Fiction'],
            ['title' => 'Demon Slayer: Kimetsu no Yaiba', 'author' => 'Koyoharu Gotouge', 'price' => 18.00, 'category' => 'Fiction'],
            ['title' => 'Dragon Ball Super: Power Surge', 'author' => 'Akira Toriyama', 'price' => 17.25, 'category' => 'Fiction'],
            ['title' => 'Tokyo Revengers: Time Loop', 'author' => 'Ken Wakui', 'price' => 13.50, 'category' => 'Fiction'],
            ['title' => 'Death Note: Light & Shadow', 'author' => 'Tsugumi Ohba', 'price' => 16.50, 'category' => 'Fiction'],
            ['title' => 'Fullmetal Alchemist: Brotherhood', 'author' => 'Hiromu Arakawa', 'price' => 19.00, 'category' => 'Fiction'],
            ['title' => 'Bleach: Soul Reaper Chronicles', 'author' => 'Tite Kubo', 'price' => 14.75, 'category' => 'Fiction'],
            ['title' => 'Jujutsu Kaisen: Cursed Energy', 'author' => 'Gege Akutami', 'price' => 15.25, 'category' => 'Fiction'],
            ['title' => 'Sword Art Online: Virtual Realms', 'author' => 'Reki Kawahara', 'price' => 17.50, 'category' => 'Fiction'],
        ];

        foreach ($books as $book) {
            $category = $categories->firstWhere('name', $book['category']);

            Book::updateOrCreate(
                ['title' => $book['title']],
                [
                    'author' => $book['author'],
                    'price' => $book['price'],
                    'category_id' => $category->id,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'slug' => Str::slug($book['title']),
                    'cover_image' => null,
                ]
            );
        }
    }
}
