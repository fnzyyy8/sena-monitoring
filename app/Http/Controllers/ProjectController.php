<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Services\AreaService;
use App\Services\ContractService;
use App\Services\ProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    protected $projectService;
    protected $areaService;
    protected $contractService;

    public function __construct(ProjectService $projectService, AreaService $areaService, ContractService $contractService)
    {
        $this->projectService = $projectService;
        $this->areaService = $areaService;
        $this->contractService = $contractService;
    }

    public function index(): Response
    {
        $head = $this->head('Projects', 'create', 'Create');
        $projects = $this->projectService->read();


        return \response()->view('project.index', ['projects' => $projects, 'head' => $head]);
    }

    public function createView(): Response
    {
        $head = $this->head('Create Project');
        $contracts = $this->contractService->read();
        $areas = $this->areaService->read();
        return \response()->view('project.create', ['head' => $head, 'areas' => $areas,'contracts' => $contracts]);
    }

    public function create(Request $request): RedirectResponse
    {

        $data = [
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'area_code' => $request->input('area_code'),
            'contract_id' => $request->input('contract_id'),
            'description' => $request->input('description'),
        ];

        $this->projectService->createProject($data);
        return \redirect('/projects');
    }

    public function updateView(string $id): Response
    {
        $head = $this->head("Update");
        $project = $this->projectService->readOne($id);
        $areas = $this->areaService->readExcept($project['area_code']->code);

        return \response()->view('project.update', ['head' => $head, 'project' => $project, 'areas' => $areas]);
    }

    public function update()
    {

    }

    public function delete($id): RedirectResponse
    {
        $this->projectService->deleteProject($id);
        return \redirect('/projects');
    }

    protected function head($title, $path = null, $buttonText = 'Back')
    {
        if ($buttonText == 'Back') {
            return [
                'title' => $title,
                'path' => "/projects/$path",
                'buttonText' => $buttonText,
                'buttonColor' => 'danger',
            ];
        } else {
            return [
                'title' => $title,
                'path' => "/projects/$path",
                'buttonText' => $buttonText,
                'buttonColor' => 'success',
            ];
        }

    }
}
