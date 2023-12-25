<?php
declare(strict_types=1);

namespace PySosu\SiteLegals;

use Illuminate\Support\ServiceProvider;
use PySosu\SiteLegals\Console\Commands\InstallSiteLegals;
use PySosu\SiteLegals\Console\Commands\SeedDefaultData;
use PySosu\SiteLegals\Services\SiteLegals;

class SiteLegalsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__. '/../config/sitelegals.php', 'sitelegals');

        $this->app->bind('SiteLegals', function($app){
            return new SiteLegals();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sitelegals');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');


        if ($this->app->runningInConsole()){
            // publish config file
            $this->publishes([
                __DIR__. '/../config/sitelegals.php' => config_path('sitelegals.php'),
            ], 'sitelegals-config');

            // publish views files
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/sitelegals')
            ], 'sitelegals-views');


            // publish migration files
            if(! class_exists('CreateSiteLegalsTable')){
                $this->publishes([
                    __DIR__. '/../database/migrations/create_site_legals_table.php.stub' => database_path('migrations/' .date('Y_m_d_His', time()) . '_create_site_legals_table.php'),

                ], 'sitelegals-migrations');

            }

            // Artisan commands
            $this->commands([
                InstallSiteLegals::class,
                SeedDefaultData::class,
            ]);
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
