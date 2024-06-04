<?php

namespace App\Services;

interface ProjectService
{
    public function read();
    public function readOne( string $id);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete($id);


}
