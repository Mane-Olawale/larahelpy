<?php

namespace Laratweaky;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;


use Laratweaky\Facades\Tweaky as Facade;
use Laratweaky\Commands\ServeCommand;
use Laratweaky\Commands\InstallCommand;
use Laratweaky\Commands\TweakyServeCommand;
use Laratweaky\Providers\ViewServiceProvider;
use Laratweaky\Providers\RouteServiceProvider;

class TweakyServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('tweaky', function () {

            return new Tweaky();

        });


        /**
         * Boot Tweaky
         */
        tweaky()->boot();


        /**
         * Register base service providers for tweaky apps
         */
        $this->app->register(ViewServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);


    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( Router $router)
    {

        $this->publishes([

            __DIR__.'/../publish/config/tweaky.php' => config_path('tweaky.php')

        ], 'tweaky.config');

        $this->loadViewsFrom( tweaky()->root( 'resources/views' ), 'tweaky');

        $this->addCanPublish();

        $this->addCommands();


    }


    public function addCanPublish() : void
    {

        $routesPath = [];

        $viewsPath = [];


        if ( tweaky()->installed() ){

            $routes = config('tweaky.routes', []);

            foreach( $routes['files'] as $route ){

                if ( !is_file( base_path( $route['path'] ?? '' ) ) ){

                    $routesPath = $routesPath + [

                        __DIR__.'/../publish/routes/default.php' => base_path($route['path'])

                    ];

                }

            }

            
            $views = config('tweaky.views', []);

            foreach( $views as $view ){

                if (  !empty( $view['folder'] ) && !is_dir( base_path($view['folder']) ) ){

                    $viewsPath = $viewsPath + [

                        __DIR__.'/../publish/views/welcome.blade.php' => base_path( $view['folder'].'/welcome.blade.php' )

                    ];

                }

            }




        }

        if ( !empty( $routesPath ) ){

            $this->publishes( $routesPath, 'tweaky.routes');

        }

        

        if ( !empty( $viewsPath ) ){
            
            $this->publishes( $viewsPath, 'tweaky.views');

        }


        


    }


    protected function addCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([

                InstallCommand::class,
                ServeCommand::class,
                TweakyServeCommand::class

            ]);

        }
    }
}
