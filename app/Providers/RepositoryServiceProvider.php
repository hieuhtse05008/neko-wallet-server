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
        $this->app->bind(\App\Repositories\ContractRepository::class, \App\Repositories\ContractRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SwapOrderRepository::class, \App\Repositories\SwapOrderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CoinsRepository::class, \App\Repositories\CoinsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CoinMarketsDataRepository::class, \App\Repositories\CoinMarketsDataRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CoinsRepository::class, \App\Repositories\CoinsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CoinRepository::class, \App\Repositories\CoinRepositoryEloquent::class);
        //:end-bindings:
    }
}
