<?php

namespace App\Services\Impl;

use App\Models\Contract;
use App\Services\ContractService;

class ContractServiceImpl implements ContractService
{

    public function read()
    {
        $contracts = Contract::query()->get();

        $transformedContracts = $contracts->map(function ($contract) {

            $haveChild = $this->haveChild($contract->id);
//            dd($haveChild);
            return [
                'id' => $contract->id,
                'name' => $contract->name,
                'description' => $contract->description,
                'haveChild' => $haveChild,
            ];
        });

        return $transformedContracts;
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

    public function haveChild(string $id): bool
    {
        $contract = Contract::query()->find($id);
        $projects = $contract->project->count();

        if ($projects > 0) {
            return true;
        } else {
            return false;
        }
    }
}
