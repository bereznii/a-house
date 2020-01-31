<?php

namespace App\Providers;

use App\Repositories\CallbackRequestRepository;
use App\Repositories\CartRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ImportRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
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
        $this->app->singleton(CallbackRequestRepository::class, function () {
            return new CallbackRequestRepository();
        });

        $this->app->singleton(CartRepository::class, function () {
            return new CartRepository();
        });

        $this->app->singleton(ClientRepository::class, function () {
            return new ClientRepository();
        });

        $this->app->singleton(ImportRepository::class, function () {
            return new ImportRepository();
        });

        $this->app->singleton(OrderRepository::class, function () {
            return new OrderRepository();
        });

        $this->app->singleton(ProductRepository::class, function () {
            return new ProductRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
