<?php
declare(strict_types=1);

namespace PySosu\SiteLegals;

use Illuminate\Support\ServiceProvider;
use PySosu\SiteLegals\Console\InstallSiteLegals;
use PySosu\SiteLegals\Services\SiteLegals;

class SiteLegalsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__. '/../config/config.php', 'site_legals');

        $this->app->bind('SiteLegals', function($app){
            return new SiteLegals();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sitelegals');
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');


        if ($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/sitelegals')
            ], 'views');

            $this->publishes([
                __DIR__. '/../config/config.php' => config_path('sitelegals.php'),
            ], 'config');

            if(! class_exists('CreateSiteLegalsTable')){
                $this->publishes([
                    __DIR__. '/../database/migrations/create_site_legals_table.php.stub' => database_path('migrations/' .date('Y_m_d_His', time()) . '_create_site_legals_table.php'),

                ], 'migrations');
            }
        }
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('sitelegals.prefix'),
            'middleware' => config('sitelegals.middleware'),
        ];
    }


}
