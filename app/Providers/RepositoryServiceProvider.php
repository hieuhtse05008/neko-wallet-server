<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\TokenPriceRepository::class, \App\Repositories\TokenPriceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SwapRepository::class, \App\Repositories\SwapRepositoryEloquent::class);
        //:end-bindings:
    }
}
