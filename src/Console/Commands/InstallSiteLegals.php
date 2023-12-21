<?php
namespace PySosu\SiteLegals\Console\Commands;

use Illuminate\Console\Command;

class InstallSiteLegals extends Command
{
    protected $signature = 'sitelegals:install {--with-data}';

    protected $description = 'Migrates site legals table and publishes config file for you';

    public function handle()
    {
        $this->info('Installing SiteLegals...');
        $this->newLine();

        $this->info('Migrating SiteLegals table');
        $this->call('migrate');

        if($this->option('with-data')){
            $this->info('Adding default site legals data to table');
            $this->seedDefaultData();
            $this->newLine();
        }

        $this->info('Publishing config file');
        $this->call('vendor:publish', [
            '--tag' => 'sitelegals-config',
        ]);

        $this->newLine();
        $this->info('SiteLegals Installed');
    }


    private function seedDefaultData()
    {

    }

}
