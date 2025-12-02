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
            'published_year' =>21,
            'category' =>'MAT-' . Str::upper(Str::random(6)),

        ]);

        Book::factory()->count(5)->create();
    }
}
