<?php

namespace App\Services\Impl;

use App\Models\Project;
use App\Services\ProjectService;

class ProjectServiceImpl implements ProjectService
{

    public function showAllProject()
    {
        return Project::query()->get();
    }

    public function showProject($id)
    {
        return Project::query()->findOrFail($id);
    }

    public function createProject(array $data)
    {
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
