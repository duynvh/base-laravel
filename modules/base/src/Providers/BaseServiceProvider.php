<?php

namespace Module\Base;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-base');
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'module-base');
    }
}