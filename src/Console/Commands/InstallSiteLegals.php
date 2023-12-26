<?php
namespace PySosu\SiteLegals\Console\Commands;

use Illuminate\Console\Command;
use PySosu\SiteLegals\Services\DefaultLegalsData;

class InstallSiteLegals extends Command
{
    protected $signature = 'sitelegals:install {--with-data}';

    protected $description = 'Migrates site legals table and publishes config file for you';

    public function handle()
    {
        $this->info('Installing SiteLegals...');
        $this->newLine();

        $this->info('==========================================');
        $this->info('Migrating SiteLegals table');
        $this->call('migrate');
        $this->info('==========================================');

        if($this->option('with-data')){
            $this->info('Adding default site legals data to table');
            $this->seedDefaultData();
            $this->info('==========================================');
            $this->newLine();
        }

        $this->info('Publishing config file');
        $this->call('vendor:publish', [
            '--tag' => 'sitelegals-config',
        ]);
        $this->info('==========================================');

        $this->info('SiteLegals Installed');
        $this->info('==========================================');
    }


    private function seedDefaultData()
    {
        $result = DefaultLegalsData::make();
        $this->comment("$result pages of site legals added");
    }

}
