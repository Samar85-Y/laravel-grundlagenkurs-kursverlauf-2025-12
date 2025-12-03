<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Book;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title'=> 'PHP Grundlagen',
            'author' => 'Christian Wenz, Tobias Hauser',
            'isbn' => '978-3-367-10000-2',
            'published_year' =>1990,
            'category' => 'Web Development'

        ]);

        Book::create([
            'title' => 'Der Hobbit',
            'author' => 'J.R.R. Tolkien',
            'isbn' => '978-3-551-55555-5',
            'published_year' => 1937,
            'category' => 'Fantasy'
]);


        Book::factory()->count(5)->create();
    }
}
