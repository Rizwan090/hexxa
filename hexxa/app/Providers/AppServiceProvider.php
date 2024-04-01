<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Validator::extend('valid_email_with_dot', function ($attribute, $value, $parameters, $validator) {
            return strpos($value, '.') !== false && filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
        });

        Validator::replacer('valid_email_with_dot', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be a valid email address with a dot.');
        });

    }
}
