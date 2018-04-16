<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatRepository::class, \App\Repositories\CatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatsRepository::class, \App\Repositories\CatsRepositoryEloquent::class);
        //:end-bindings:
    }
}
