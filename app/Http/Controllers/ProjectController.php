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

        $title = $request->input('title');
        $price = $request->input('price');
        $description = $request->input('description');
        $timestamps = Carbon::now();


        $count = Project::query()->count();
        $year = Carbon::now()->year;

        $id = "PRL" . "_" . $count + 1 . "_" . $year;

        $this->projectService->createProject([
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'description' => $description,
            'create_at' => $timestamps,
            'update_at' => $timestamps,
        ]);
        return \redirect('/projects');
    }

    public function delete($id): RedirectResponse
    {
        $this->projectService->deleteProject($id);
        return \redirect('/projects');
    }
}
