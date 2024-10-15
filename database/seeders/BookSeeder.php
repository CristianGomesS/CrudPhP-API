<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            ['titulo' => 'Harry Potter and the Philosopher\'s Stone', 'author_id' => 1, 'publisher_id' => 1, 'book_details_id' => 1],
            ['titulo' => 'A Game of Thrones', 'author_id' => 2, 'publisher_id' => 2, 'book_details_id' => 2],
            ['titulo' => 'The Hobbit', 'author_id' => 3, 'publisher_id' => 3, 'book_details_id' => 3],
            ['titulo' => 'Murder on the Orient Express', 'author_id' => 4, 'publisher_id' => 4, 'book_details_id' => 4],
            ['titulo' => 'The Shining', 'author_id' => 5, 'publisher_id' => 5, 'book_details_id' => 5],
            ['titulo' => 'Harry Potter and the Chamber of Secrets', 'author_id' => 1, 'publisher_id' => 1, 'book_details_id' => 6],
            ['titulo' => 'A Clash of Kings', 'author_id' => 2, 'publisher_id' => 2, 'book_details_id' => 7],
            ['titulo' => 'The Lord of the Rings', 'author_id' => 3, 'publisher_id' => 3, 'book_details_id' => 8],
            ['titulo' => 'The ABC Murders', 'author_id' => 4, 'publisher_id' => 4, 'book_details_id' => 9],
            ['titulo' => 'Misery', 'author_id' => 5, 'publisher_id' => 5, 'book_details_id' => 10],
        ]);
    }
}