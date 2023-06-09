<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\JobPositionService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobPositionService::class, function ($app) {
            return new JobPositionService(
                $app->make(JobPositionRepositoryInterface::class)
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
