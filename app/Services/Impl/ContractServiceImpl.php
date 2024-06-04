<?php

namespace App\Services\Impl;

use App\Models\Contract;
use App\Services\ContractService;

class ContractServiceImpl implements ContractService
{

    public function read()
    {
        $contracts = Contract::query()->get();

        $contracts = $contracts->map(function ($contract) {
            return [
                'id' => $contract->id,
                'name' => $contract->name,
                'description' => $contract->description,
                'haveChild' => $contract->project->count() > 0,
            ];
        });

        return $contracts;
    }

    public function readOne(string $id)
    {
        return Contract::query()->find($id);

    }

    public function create(array $data)
    {
        Contract::query()->create($data);
    }


    public function delete(string $id)
    {
        Contract::query()->findOrFail($id)->delete();
    }

    public function haveChild(string $id)
    {
        // TODO: Implement haveChild() method.
    }

    public function readExcept(string $id)
    {
        return Contract::query()->where('id', '!=', $id)->get();

    }

}
