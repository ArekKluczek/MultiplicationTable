<?php

namespace App\Providers;

use App\MultiplicationTableInterface;
use App\MultiplicationTableRepositoryInterface;
use App\Repositories\MultiplicationTableRepository;
use App\Services\MultiplicationTableService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MultiplicationTableInterface::class, MultiplicationTableService::class);
        $this->app->bind(MultiplicationTableRepositoryInterface::class, MultiplicationTableRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
