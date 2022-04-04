<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // service bind
        $this->app->bind('App\Contracts\Service\DesignPatternServiceInterface', 'App\Service\DesignPatternService');

        // dao bind
        $this->app->bind('App\Contracts\Dao\DesignPatternDaoInterface', 'App\Dao\DesignPatternDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
