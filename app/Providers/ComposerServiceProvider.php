<?php

namespace p4\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        #Make the variable "user" availabel to all views
        \View::composer('*', function($view) {
          $view->with('user', \Auth::user());
        });
    }
    

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
