<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['電化製品', '本', '飲料', 'キッチン用品', 'スポーツ用品', 'おもちゃ'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                [
                    'name' => $category,
                    'created_at' => NOW(),
                ],
            ]);
        }
    }
}
