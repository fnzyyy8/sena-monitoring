<?php

namespace App\Services\Impl;

use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;

class ProjectServiceImpl implements ProjectService
{

    public function showAllProject()
    {
        $projects = Project::query()->get();


        $transformedProject = $projects->map(function ($project) {
            $getArea = $project->area;
            $area = $getArea->area;

            $price = "Rp " . number_format($project->price, 2, '.', ',');
            return [
                'id' => $project->id,
                'title' => $project->title,
                'price' => $price,
                'area_code' => $area,
                'description' => $project->description,
                'created_at' => $project->created_at->format('d-M-y'),
                'updated_at' => $project->updated_at->format('d-M-y'),
            ];
        });

        return $transformedProject;

    }

    public function showProject($id)
    {
        return Project::query()->findOrFail($id);
    }

    public function createProject(array $data)
    {

        $count = Project::query()->where('area_code','=', $data['area_code'])->count();
        $year = Carbon::now()->format('y');
        $code = $data['area_code'];
        $number = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        $id = $code . "-" ."PRL"."-". $number . "-" . $year;

        $data = [
            'id' => $id,
            'title' => $data['title'],
            'price' => $data['price'],
            'area_code' => $data['area_code'],
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
