<?php

namespace Module\Base;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
//        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-base');
//        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    public function boot()
    {

    }
}