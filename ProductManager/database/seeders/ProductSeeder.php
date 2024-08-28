<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => '商品A',
                'description' => '商品Aです。',
                'price' => '300',
                'category_id' => 1,
                'maker_id' => 1,
                'created_at' => NOW(),
            ],
        ]);
    }
}
