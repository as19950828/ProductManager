<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makers = ['パナソニック ホールディングス株式会社', '株式会社集英社', '日本コカ・コーラ株式会社', '株式会社良品計画', 'アディダス ジャパン株式会社', '株式会社タカラトミー'];
        foreach ($makers as $maker) {
            DB::table('makers')->insert([
                [
                    'name' => $maker,
                    'created_at' => NOW(),
                ],
            ]);
        }
    }
}
