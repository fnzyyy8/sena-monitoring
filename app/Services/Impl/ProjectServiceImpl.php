<?php

namespace App\Services\Impl;

use App\Models\Project;
use App\Services\ProjectService;
use Carbon\Carbon;

class ProjectServiceImpl implements ProjectService
{

    public function read(): object
    {
        return Project::query()->get();

    }

    public function readOne($id): object
    {
        return Project::query()->findOrFail($id);

    }

    public function create(array $data): void
    {

        $id = $this->createId($data['contract_id'], $data['area_id']);

        $data = [
            'id' => $id,
            'title' => $data['title'],
            'price' => $data['price'],
            'area_id' => $data['area_id'],
            'contract_id' => $data['contract_id'],
            'description' => $data['description'],
        ];

        Project::query()->create($data);
    }

    public function update(string $id, array $data): void
    {
        $id = $this->createId($data['contract_id'], $data['area_id']);

        $data = [
            'id' => $id,
            'title' => $data['title'],
            'price' => $data['price'],
            'contract_id' => $data['contract_id'],
            'area_id' => $data['area_id'],
            'description' => $data['description'],
        ];

        Project::query()->findOrFail($id)->update($data);
    }

    public function delete($id): void
    {
        Project::query()->findOrFail($id)->delete();
    }


    protected function createId(string $contract_id, string $area_id): string
    {
        $count = Project::query()->where('contract_id', '=', $contract_id)
            ->where('area_id', '=', $area_id)->count();

        $year = Carbon::now()->format('y');

        $number = str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        return $area_id . '-' . $contract_id . '-' . $number . '-' . $year;

    }


}
