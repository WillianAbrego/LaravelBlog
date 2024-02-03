<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'holidays',
                'slug' => 'Holidays',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camping',
                'slug' => 'Camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
