<?php

namespace App\Services;

interface ContractService
{
    public function read();

    public function readOne(string $id);

    public function create(array $data);

    public function delete(string $id);

    public function haveChild(string $id);

}
