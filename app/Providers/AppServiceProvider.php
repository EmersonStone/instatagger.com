<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      if ( preg_match("/^https:/i", config('app.url')) ) {
        \URL::forceScheme('https');
      }

      Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      if ( config('services.rollbar.access_token') ) {
        $this->app->register(\Jenssegers\Rollbar\RollbarServiceProvider::class);
      }
    }
}
