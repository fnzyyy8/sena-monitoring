<?php

namespace App\Providers;

use App\Services\AreaService;
use App\Services\Impl\AreaServiceImpl;
use Illuminate\Support\ServiceProvider;

class AreaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AreaService::class,AreaServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
