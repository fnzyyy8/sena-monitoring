<?php

namespace App\Services\Impl;

use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;

class ProjectServiceImpl implements ProjectService
{

    public function read()
    {
        $projects = Project::query()->get();

        $transformedProject = $projects->map(function ($project) {

            $area = $project->area->area;
            $idShow = str_replace('-', '/', $project->id);

            $contract = $project->contract->id;


            $price = "Rp " . number_format($project->price, 2, '.', ',');
            return [
                'id' => $project->id,
                'idShow' => $idShow,
                'title' => $project->title,
                'price' => $price,
                'area_code' => $area,
                'contract_id' => $contract,
                'description' => $project->description,
                'created_at' => $project->created_at->format('d-M-y'),
                'updated_at' => $project->updated_at->format('d-M-y'),
            ];
        });
        return $transformedProject;
    }

    public function readOne($id)
    {
        $project = Project::query()->findOrFail($id);
        $id = $project->id;
        $idShow = str_replace('-', '/', $id);

        $transformedProject = [
            'id' => $project->id,
            'idShow' => $idShow,
            'title' => $project->title,
            'price' => $project->price,
            'area_code' => $project->area,
            'description' => $project->description,
        ];


        return $transformedProject;
    }

    public function createProject(array $data)
    {

        $count = Project::query()->where('area_code', '=', $data['area_code'])
            ->where('contract_id', '=', $data['contract_id'])->count();

        $year = Carbon::now()->format('y');

        $areaCode = $data['area_code'];

        $contractCode = $data['contract_id'];

        $number = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        $id = $areaCode . "-" . $contractCode . "-" . $number . "-" . $year;

        $data = [
            'id' => $id,
            'title' => $data['title'],
            'price' => $data['price'],
            'area_code' => $data['area_code'],
            'contract_id' => $data['contract_id'],
            'description' => $data['description'],
        ];

        Project::query()->create($data);
    }

    public function updateProject(string $id, array $data)
    {
        Project::query()->findOrFail($id)->update($data);
    }

    public function deleteProject($id)
    {
        Project::query()->findOrFail($id)->delete();
    }

}
