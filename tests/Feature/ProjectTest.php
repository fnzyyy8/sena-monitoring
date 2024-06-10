<?php

namespace Tests\Feature;

use App\Models\Project;
use Database\Seeders\AreaSeeder;
use Database\Seeders\ProjectSeeder;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::table('projects')->delete();
        DB::table('areas')->delete();
        $this->seed([AreaSeeder::class, ProjectSeeder::class]);
    }

    public function testGetArrayProject()
    {
        $projects = Project::query()->get();

        self::assertNotNull($projects);

    }

    public function testName()
    {
        $project = Project::query()->get();

        $project->each(function ($project) {
            var_dump($project->id);
            self::assertTrue(true);
        });
    }


}
