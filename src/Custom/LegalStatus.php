<?php
namespace PySosu\SiteLegals\Custom;

class LegalStatus
{
    public static function legalStatuses()
    {
        $statuses = config('site_legals.status');

        return $statuses;
    }
}
