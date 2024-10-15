<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        DB::table('author')->insert([
            ['Nome' => 'J.K. Rowling'],
            ['Nome' => 'George R.R. Martin'],
            ['Nome' => 'J.R.R. Tolkien'],
            ['Nome' => 'Agatha Christie'],
            ['Nome' => 'Stephen King'],
        ]);
    }
}
