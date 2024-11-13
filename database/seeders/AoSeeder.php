<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('aos')->insert([
            'title' => fake()->text('30'),
            'image' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 0, 1000),
            'quantity' => rand(0, 100),
            'description' => fake()->paragraph(1),
            'category_id' => rand(1, 5),
        ]);
        }
        
    }
}
