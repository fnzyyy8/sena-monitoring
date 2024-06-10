<?php

namespace App\Services\Impl;

use App\Models\Area;
use App\Services\AreaService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AreaServiceImpl implements AreaService
{

    public function read()
    {
        return Area::query()->get();
    }

    public function readExcept(string $areaId) : object
    {
        return Area::query()->where('id','!=',$areaId)->get();
    }
}
