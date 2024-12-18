<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

    class CategorySeeder extends Seeder
    {
        public function run()
        {
            DB::table('category')->insert([
                ['category' => 'Fantasy'],
                ['category' => 'Mystery'],
                ['category' => 'Horror'],
                ['category' => 'Adventure'],
                ['category' => 'Thriller'],
            ]);
        }
    }