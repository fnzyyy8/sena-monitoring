<?php

namespace Tests\Feature;

use App\Models\Area;
use Database\Seeders\AreaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AreaTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        DB::table('areas')->delete();
    }


    public function testCreateData()
    {
        $this->seed(AreaSeeder::class);

        $area = Area::query()->get();
        self::assertNotNull($area);
    }


}
