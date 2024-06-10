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
       $project = new Project();
       $project->id = "MDN_PRL_0001_24";
       $project->title = "Project 124";
       $project->area_id = "MDN";
       $project->price =200000;
       $project->save();
     }
}
