<?php

namespace App\Providers;

use App\Repositories\CallbackRequestRepository;
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
