<?php

namespace App\Providers;

use App\Services\JobPositionService;
use App\Repositories\JobPositionRepository;
use App\Repositories\JobPositionRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\ApplicationService;


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
        $this->app->singleton(ApplicationService::class, function ($app) {
            return new ApplicationService(
                $app->make(\App\Repositories\ApplicationRepository::class)
            );
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
