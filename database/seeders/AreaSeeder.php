<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::query()->insert([
            [
                'code' => 'MDN',
                'area' => 'Medan'
            ],
            [
                'code' => 'PKB',
                'area' => 'Pekanbaru'
            ],
            [
                'code' => 'DUM',
                'area' => 'Dumai'
            ],
            [
                'code' => 'BTM',
                'area' => 'Batam'
            ],
            [
                'code' => 'PLB',
                'area' => 'Palembang'
            ],
            [
                'code'=>'LPG',
                'area' => 'Lampung'
            ]
        ]);
    }
}
