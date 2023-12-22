<?php
namespace PySosu\SiteLegals\Data;

class ConvertFromJson
{
    public static function pages()
    {
        return json_decode(file_get_contents(__DIR__.'./pages.json'), true);
    }
}
