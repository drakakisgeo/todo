<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->app->bind('App\Repositories\TaskRepositoryInterface', 'App\Repositories\DbTaskRepository');
       $this->app->bind('App\Repositories\TaskRepositoryInterface', 'App\Repositories\ElasticTaskRepository');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
