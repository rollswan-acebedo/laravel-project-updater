<?php

namespace Rollswan\LaravelProjectUpdater\Providers;

use Illuminate\Support\ServiceProvider;
use Rollswan\LaravelProjectUpdater\Middleware\UpdaterMiddleware;

class UpdaterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->aliasMiddleware('lpu', UpdaterMiddleware::class);

        $this->publishes([
            __DIR__ . '/../config.php' => config_path('lpu.php')
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
    }
}
