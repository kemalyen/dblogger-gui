<?php
namespace Gazatem\DBLoggerGui;

use Gazatem\DBLoggerGui\Facade\DBLoggerGui;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class DBLoggerGuiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/gazatem/dblogger-gui'),
        ], 'public');

        $this->setupRoutes($this->app->router);
        $this->loadViewsFrom(__DIR__ . '/views', 'dblogger-gui');


    }

    public function setupRoutes(Router $router)
    {
        $router->group(
            ['namespace' => 'Gazatem\DBLoggerGui\Http\Controllers'],
            function ($router) {
                include __DIR__.'/Http/routes.php';
            }
        );
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom( __DIR__.'/config/dblogger-gui.php', 'dblogger-gui');
        $this->app['dblogger-gui'] = $this->app->share(function($app) {
            return new DBLoggerGui;
        });
    }
}
