<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PublicPathServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('PUBLIC_PATH') !== NULL) {
            $this->app['path.public'] = base_path().'/../'.env('PUBLIC_PATH');
        }
        else
        {
            $this->app['path.public'] = base_path().'/../public_html';
        }

        // Possible environment changes
        if ($this->app->environment() === 'local') {

        }
        elseif ($this->app->environment() === 'development') {

        }
        elseif ($this->app->environment() === 'test') {

        }
        elseif ($this->app->environment() === 'production') {

        }
    }
}
