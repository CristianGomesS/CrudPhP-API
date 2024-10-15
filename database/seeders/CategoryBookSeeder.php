<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBookSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_book')->insert([
            ['book_id' => 1, 'category_id' => 1], // Harry Potter - Fantasy
            ['book_id' => 2, 'category_id' => 1], // Game of Thrones - Fantasy
            ['book_id' => 2, 'category_id' => 4], // Game of Thrones - Adventure
            ['book_id' => 3, 'category_id' => 1], // The Hobbit - Fantasy
            ['book_id' => 3, 'category_id' => 4], // The Hobbit - Adventure
            ['book_id' => 4, 'category_id' => 2], // Murder on the Orient Express - Mystery
            ['book_id' => 5, 'category_id' => 3], // The Shining - Horror
            ['book_id' => 6, 'category_id' => 1], // Harry Potter 2 - Fantasy
            ['book_id' => 7, 'category_id' => 1], // A Clash of Kings - Fantasy
            ['book_id' => 7, 'category_id' => 4], // A Clash of Kings - Adventure
            ['book_id' => 8, 'category_id' => 1], // The Lord of the Rings - Fantasy
            ['book_id' => 9, 'category_id' => 2], // The ABC Murders - Mystery
            ['book_id' => 10, 'category_id' => 3], // Misery - Horror
            ['book_id' => 10, 'category_id' => 5], // Misery - Thriller
        ]);
    }
}