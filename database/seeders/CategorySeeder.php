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
                'name' => 'Áo khoác',
            ],
            [
                'name' => 'Áo thun',
            ],
            [
                'name' => 'Áo so mi',
            ],
            [
                'name' => 'Áo polo',
            ],
            [
                'name' => 'Áo len',
            ],
            ]);
    }
}
