<?php
namespace PySosu\SiteLegals\Facades;

use Illuminate\Support\Facades\Facade;

class SiteLegal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sitelegal';
    }
}