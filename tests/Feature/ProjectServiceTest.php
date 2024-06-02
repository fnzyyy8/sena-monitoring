<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Services\Impl\ProjectServiceImpl;
use App\Services\ProjectService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProjectServiceTest extends TestCase
{
    protected ProjectService $projectService;

    /**
     * @param ProjectService $projectService
     */


    protected function setUp(): void
    {
        parent::setUp();
        $this->projectService = $this->app->make(ProjectService::class);
        DB::table('projects')->delete();
    }

    public function testCreateProject()
    {
        $data = [
            'title' => 'Pekerjaan A',
            'area_code' => 'MDN',
            'price' => 230000000,
            'description' => 'Pekerjaan A'
        ];

        $this->projectService->createProject($data);

        $project = Project::query()->get();

        self::assertNotNull($project);
    }

}
