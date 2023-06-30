<?php
namespace PySosu\SiteLegals\Console;

use Illuminate\Console\Command;

class InstallSiteLegals extends Command
{
    protected $signature = 'sitelegals:install';

    protected $description = 'Installs the package and publishes config file for you';

    public function handle()
    {
        $this->info('Installing SiteLegals...');
        $this->newLine();

        $this->info('Publishing config file');

        $this->call('vendor:publish', [
            '--provider' => "PySosu\SiteLegals\SiteLegalsServiceProvider",
            '--tag' => 'sitelegals-config',
        ]);

        $this->newLine();
        $this->info('SiteLegals Installed');
    }
}