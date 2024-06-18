<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Language'],
            ['name' => 'Geography'],
            ['name' => 'History'],
            ['name' => 'Sciences'],
            ['name' => 'Math'],
            ['name' => 'Nature'],
            ['name' => 'Animals']
        ]);
    }
}
