<?php

namespace App\Services\Impl;

use App\Models\Contract;
use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;

class ProjectServiceImpl implements ProjectService
{

    public function read()
    {
        $projects = Project::query()->get();

        return $projects->map(function ($project) {
            $area = $project->area->area;
            $idShow = str_replace('-', '/', $project->id);
            $formatedPrice = "Rp " . number_format($project->price, 2, '.', ',');
            return [
                'id_show' => $idShow,
                'id' => $project->id,
                'title' => $project->title,
                'price' => $formatedPrice,
                'area_code' => $area,
                'contract_id' => $project->contract->id,
                'description' => $project->description,
                'created_at' => $project->created_at->format('d-M-y'),
                'updated_at' => $project->updated_at->format('d-M-y'),
            ];
        });
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
            'contract_id' => $project->contract,
            'description' => $project->description,
        ];


        return $transformedProject;
    }

    public function create(array $data)
    {

        $id = $this->createId($data['contract_id'],$data['area_code']);

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

    public function update(string $id, array $data)
    {
        $project = Project::query()->findOrFail($id)
            ->where('area_code', '=', $data['area_code'])
            ->where('contract_id', '=', $data['contract_id'])->count();

        $data = [
            'title' => $data['title'],
            'price' => $data['price'],
            'contract_id' => $data['contract_id'],
            'area_code' => $data['area_code'],
            'description' => $data['description'],
        ];

        Project::query()->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        Project::query()->findOrFail($id)->delete();
    }


    protected function createId(string $contract_id, string $area_code): string
    {
        $count = Project::query()->where('contract_id', '=', $contract_id)
            ->where('area_code', '=', $area_code)->count();
        $year = Carbon::now()->format('y');
        $number = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        $id = $area_code . '-' . $contract_id . '-' . $number . '-' . $year;


        return $id;

    }


}
