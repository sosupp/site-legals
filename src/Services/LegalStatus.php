<?php
declare(strict_types=1);

namespace PySosu\SiteLegals\Services;

class LegalStatus
{
    public static function legalStatuses()
    {
        $statuses = config('site_legals.status');

        return $statuses;
    }
}
