<?php

namespace App\Providers;

use App\Services\JobPositionService;
use App\Repositories\JobPositionRepository;
use App\Repositories\JobPositionRepositoryInterface;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobPositionRepositoryInterface::class, JobPositionRepository::class);
        $this->app->bind(JobPositionService::class, function ($app) {
            return new JobPositionService($app->make(JobPositionRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
