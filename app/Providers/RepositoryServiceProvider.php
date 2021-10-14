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
        $this->app->bind(\App\Repositories\ContractRepository::class, \App\Repositories\ContractRepositoryEloquent::class);
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
        $this->app->bind(\App\Repositories\BlogRepository::class, \App\Repositories\BlogRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BlogGroupRepository::class, \App\Repositories\BlogGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BlogLinkGroupRepository::class, \App\Repositories\BlogLinkGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RefBlogGroupRepository::class, \App\Repositories\RefBlogGroupRepositoryEloquent::class);
        //:end-bindings:
    }
}
