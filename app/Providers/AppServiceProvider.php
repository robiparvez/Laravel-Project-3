<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('phone_number', function ($attribute, $value, $parameters)
        {
            return substr($value, 0, 2) == '01';
        });
    }

    /**
     * Register any application services.
     *
     */
    public function register()
    {

    }
}
