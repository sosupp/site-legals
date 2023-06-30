<?php
namespace PySosu\SiteLegals\Tests;

use PySosu\SiteLegals\SiteLegalsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setup(): void
    {
        parent::setup();
    }

    protected function getPackageProviders($app)
    {
        return [
            SiteLegalsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // // import CreateSiteLegals migration class
        include_once __DIR__ . '/../database/migrations/create_site_legals_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';

        // $this->loadLaravelMigrations(['--database' => 'testbench']);
        // $this->artisan('migrate', ['--database' => 'testbench'])->run();

        // // run the up method of the migration
        // (new \CreateSiteLegalsTable)->up();
        (new \CreateSiteLegals)->up();
        (new \CreateUsersTable)->up();
    }
}