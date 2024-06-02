<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(): Response
    {
        $project = $this->projectService->showAllProject();
        return \response()->view('project.index', ['projects' => $project, 'title' => 'Projects']);
    }

    public function createView(): Response
    {
        return \response()->view('project.create', ['title' => 'Create Project']);
    }

    public function create(Request $request): RedirectResponse
    {
        $data = [
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'area_code' => $request->input('area_code'),
            'description' => $request->input('description'),
        ];

        $this->projectService->createProject($data);
        return \redirect('/projects');
    }

    public function updateView(string $id): Response
    {
        $project = $this->projectService->showProject($id);

        return \response()->view('project.update', ['title' => 'Update Project', 'project' => $project]);

    }

    public function delete($id): RedirectResponse
    {
        $this->projectService->deleteProject($id);
        return \redirect('/projects');
    }
}
