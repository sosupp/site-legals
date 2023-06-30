<?php
namespace PySosu\SiteLegals\Http\Controllers;

use PySosu\SiteLegals\Models\SiteLegal;

class PublicSiteLegalsController extends Controller
{
    public function index()
    {
        $pages = SiteLegal::all();
        return view('sitelegals::legals.index', compact('pages'));
    }
    
    public function show($slug)
    {
        $page = SiteLegal::where('slug', $slug)
        ->first();

        return view('sitelegals::legals.show', compact('page'));
    }
}
