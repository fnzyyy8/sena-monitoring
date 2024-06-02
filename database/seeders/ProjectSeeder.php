<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::query()->create([
            'id' => 'MDN_PRL_1_24',
            'title'=>'Pekerjaan A',
            'price' =>320000000,
            'description'=>'Pekerjaan A ini mantap',
        ]);
    }
}
