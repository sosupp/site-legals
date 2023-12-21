<?php
declare(strict_types=1);

namespace PySosu\SiteLegals\Facades;

use Illuminate\Support\Facades\Facade;
use PySosu\SiteLegals\Services\SiteLegals;

class SiteLegal extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SiteLegals::class;
    }
}
