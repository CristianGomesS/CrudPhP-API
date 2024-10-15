<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('book_details')->insert([
            ['isbn' => '9780747532743', 'summary' => 'A young wizard\'s journey.', 'page_count' => 223, 'edition' => '1st'],
            ['isbn' => '9780553103540', 'summary' => 'A fantasy epic.', 'page_count' => 694, 'edition' => '1st'],
            ['isbn' => '9780345339683', 'summary' => 'A ring of power.', 'page_count' => 423, 'edition' => '1st'],
            ['isbn' => '9780007119356', 'summary' => 'A murder mystery.', 'page_count' => 256, 'edition' => '2nd'],
            ['isbn' => '9780671027032', 'summary' => 'A haunted hotel.', 'page_count' => 447, 'edition' => '1st'],
            ['isbn' => '9780747538493', 'summary' => 'The second year at wizard school.', 'page_count' => 341, 'edition' => '1st'],
            ['isbn' => '9780553108033', 'summary' => 'A continuation of the epic.', 'page_count' => 761, 'edition' => '1st'],
            ['isbn' => '9780345339706', 'summary' => 'The journey continues.', 'page_count' => 352, 'edition' => '1st'],
            ['isbn' => '9780007120840', 'summary' => 'Another murder mystery.', 'page_count' => 288, 'edition' => '2nd'],
            ['isbn' => '9780743211789', 'summary' => 'A writer trapped in a snowy hotel.', 'page_count' => 497, 'edition' => '3rd'],
        ]);
    }
}