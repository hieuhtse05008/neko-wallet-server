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
        $this->app->bind(\App\Repositories\HistoricalPriceRepository::class, \App\Repositories\HistoricalPriceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CryptocurrencyRepository::class, \App\Repositories\CryptocurrencyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CryptocurrencyMappingRepository::class, \App\Repositories\CryptocurrencyMappingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NetworkRepository::class, \App\Repositories\NetworkRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NetworkMappingRepository::class, \App\Repositories\NetworkMappingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TokenRepository::class, \App\Repositories\TokenRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CryptocurrencyInfoRepository::class, \App\Repositories\CryptocurrencyInfoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ExchangeGuideRepository::class, \App\Repositories\ExchangeGuideRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ExchangePairRepository::class, \App\Repositories\ExchangePairRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CryptocurrencyCategoryRepository::class, \App\Repositories\CryptocurrencyCategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
