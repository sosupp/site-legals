<?php
namespace PySosu\SiteLegals\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use PySosu\SiteLegals\Tests\TestCase;

class InstallSiteLegalsTest extends TestCase
{
   function test_console_install_command_for_config_file()
   {
    //    if(File::exists(config_path('site_legals.php'))){
    //         unlink(config_path('site_legals.php'));
    //    }

    //    $this->assertFalse(File::exists(config_path('site_legals.php')));

    //    Artisan::call('sitelegals:install');

    //    $this->assertTrue(File::exists(config_path('site_legals.php')));
   }
}