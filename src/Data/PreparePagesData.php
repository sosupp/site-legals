<?php
namespace PySosu\SiteLegals\Data;

use Parsedown;
use Illuminate\Support\Str;

class PreparePagesData
{
    protected $defaultPages = [];
    protected $pagesData = [];
    protected $parsedown;

    public function __construct()
    {
        $this->defaultPages = ConvertFromJson::pages();
        $this->parsedown = new Parsedown();
    }

    public function handle()
    {
        foreach($this->defaultPages as $page => $file){
            // $parsedown = new Parsedown();
            $this->pagesData[] = [
                'page_name' => $page,
                'slug' => Str::slug($page),
                'content' => $this->parsedown->text(file_get_contents(__DIR__.'./Pages/'.$file['file']))
            ];
        }

        return $this->pagesData;
    }

}
