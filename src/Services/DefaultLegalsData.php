<?php
namespace PySosu\SiteLegals\Services;

use Illuminate\Support\Facades\Storage;
use PySosu\SiteLegals\Data\ConvertFromJson;
use PySosu\SiteLegals\Data\PreparePagesData;

class DefaultLegalsData
{

    protected $data = [];

    // public function __construct()
    // {
    //     $this->defaultPages = ConvertFromJson::pages();
    // }

    public static function make()
    {
        // return ((new PreparePagesData)->handle());

        return (new SiteLegalCrudService)->makeMany(
            data: (new PreparePagesData)->handle()
        );

    }
}
