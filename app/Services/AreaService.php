<?php

namespace App\Services;

interface AreaService
{
    public function read();

    public function readExcept(string $area);

}
