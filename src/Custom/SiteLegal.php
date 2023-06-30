<?php
namespace PySosu\SiteLegals\Custom;

use PySosu\SiteLegals\Models\SiteLegal as ModelsSiteLegal;

class SiteLegal extends ModelsSiteLegal
{
    private $legalPages = [];

    public function __construct()
    {
        // $this->legalPages;
    }

    public static function pages($status = 'active')
    {
        return self::where('status', $status)->get();
    }

    public static function pageByName($pageName)
    {
        return static::where('page_name', $pageName)
        ->first();
    }

    public static function setStatus($id)
    {
        $status = self::where('id', $id)->first();
        $status->update([
            'status' => 'in-active'
        ]);

        return $status;
    }

    public static function deletePage($id)
    {
        $page = self::where('id', $id)->delete();
        return $page;
    }
    
}