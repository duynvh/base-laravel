<?php

namespace Module\Contact;

use Illuminate\Support\ServiceProvider;
use Module\Contact\Repositories\Eloquent\ContactRepository;
use Module\Contact\Repositories\Interfaces\ContactInterface;

class ContactServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ContactInterface::class, function () {
            return new ContactRepository();
        });

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-contact');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'module-contact');
    }
}