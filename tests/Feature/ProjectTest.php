<?php

namespace Tests\Feature;

use App\Models\Project;
use Database\Seeders\ProjectSeeder;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::table('projects')->delete();
    }

    public function testGetArrayProject()
    {
        $this->seed(ProjectSeeder::class);

        $projects = Project::query()->get();

        self::assertNotNull($projects);

        var_dump($projects);

    }


}
