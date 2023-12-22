<?php
namespace PySosu\SiteLegals\Console\Commands;

use Illuminate\Console\Command;
use PySosu\SiteLegals\Services\DefaultLegalsData;

class SeedDefaultData extends Command
{
    protected $signature = 'sitelegals:data';

    protected $description = 'Adds default site legals data to database table. Example privacy policy data';

    public function handle()
    {
        $this->info('==========================================');
        $this->info('Adding default site legals data to table');
        $this->seedDefaultData();
        $this->info('==========================================');

    }


    private function seedDefaultData()
    {
        $result = DefaultLegalsData::make();

        $this->comment("$result pages of site legals added");
    }
}
