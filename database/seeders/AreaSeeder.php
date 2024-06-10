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
                'id' => 'MDN',
                'name' => 'Medan'
            ],
            [
                'id' => 'PKB',
                'name' => 'Pekanbaru'
            ],
            [
                'id' => 'DUM',
                'name' => 'Dumai'
            ],
            [
                'id' => 'BTM',
                'name' => 'Batam'
            ],
            [
                'id' => 'PLB',
                'name' => 'Palembang'
            ],
            [
                'id'=>'LPG',
                'name' => 'Lampung'
            ],
            [
                'id'=>'SOR',
                'name' => 'Sumatera Utara'
            ]
        ]);
    }
}
