<?php

namespace App\Providers;

use App\IniTranslator;
use Illuminate\Support\ServiceProvider;


class TranslateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ini-translator', function($app){
           return new IniTranslator(
               $app->getLocale(),
               resource_path('lang'),
           ) ;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

