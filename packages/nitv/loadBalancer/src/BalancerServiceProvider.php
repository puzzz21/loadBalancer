<?php

namespace Nitv\LoadBalancer;

use Illuminate\Support\ServiceProvider;

class BalancerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Nitv\LoadBalancer\LoadBalancingController');

    }
}
