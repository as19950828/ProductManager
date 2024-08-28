<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            CategorySeeder::class,
            MakerSeeder::class,
        ]);
        // \App\Models\Maker::factory(40)->create();
        // \App\Models\Category::factory(40)->create();
        // \App\Models\Product::factory(100)->create();
    }
}
