<?php

namespace Module\Blog;

use Illuminate\Support\ServiceProvider;
use Module\Blog\Repositories\Eloquent\CategoryRepository;
use Module\Blog\Repositories\Interfaces\CategoryInterface;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoryInterface::class, function () {
            return new CategoryRepository();
        });

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-blog');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'module-blog');
    }
}