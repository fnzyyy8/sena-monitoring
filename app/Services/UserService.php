<?php

namespace App\Services;

interface UserService
{
    public function read();

    public function readOne(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

}
