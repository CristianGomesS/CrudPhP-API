<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        DB::table('publisher')->insert([
            ['Nome' => 'Bloomsbury Publishing'],
            ['Nome' => 'Bantam Books'],
            ['Nome' => 'HarperCollins'],
            ['Nome' => 'Penguin Books'],
            ['Nome' => 'Scribner'],
        ]);
    }
}