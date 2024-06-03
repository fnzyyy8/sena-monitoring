<?php

namespace App\Services\Impl;

use App\Models\Area;
use App\Services\AreaService;

class AreaServiceImpl implements AreaService
{

    public function read()
    {
        return Area::query()->get();
    }

    public function readExcept(string $areaCode)
    {
        return Area::query()->where('code','!=',$areaCode)->get();
    }
}
