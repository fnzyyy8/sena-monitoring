<?php

namespace App\Services;

interface ProjectService
{
    public function read();
    public function readOne( string $id);
    public function createProject(array $data);
    public function updateProject(string $id, array $data);
    public function deleteProject($id);

}
