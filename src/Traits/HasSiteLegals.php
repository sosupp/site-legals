<?php

namespace PySosu\SiteLegals\Traits;

use PySosu\SiteLegals\Models\SiteLegal;

trait HasSiteLegals
{
    public function site_legals()
    {
        return $this->morphMany(SiteLegal::class, 'author');
    }
}