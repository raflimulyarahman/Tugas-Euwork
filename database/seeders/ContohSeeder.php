<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContohSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contoh')->insert([
            ['title' => 'Title 1', 'description' => 'Description 1'],
            ['title' => 'Title 2', 'description' => 'Description 2'],
            ['title' => 'Title 3', 'description' => 'Description 3'],
        ]);
    }
}
