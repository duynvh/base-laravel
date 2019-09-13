<?php

namespace Module\Acl;

use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-acl');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'module-acl');
    }
}