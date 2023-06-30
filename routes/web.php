<?php


use Illuminate\Support\Facades\Route;
use PySosu\SiteLegals\Http\Controllers\PublicSiteLegalsController;
use PySosu\SiteLegals\Http\Controllers\AdminSiteLegalsController;

/**
 * Site Legals Info Dashboard Needs a middleware that restrict it
 * to only Admins or user(s) with the role or permission to
 * create, edit, delete the site's legal resources. You can also define a new route or move this. The 
 * option is all yours.
 */
// Route::middleware('web')->group(function(){
//     Route::prefix(config('site_legals.route_prefix'))->group(function(){
        Route::controller(AdminSiteLegalsController::class)->group(function(){
            Route::get('index')->name('site.legal.index');
            Route::get('create', 'create')->name('site.legal.create');
            Route::post('store')->name('site.legal.store');
            Route::get('show/{id}', 'show')->name('site.legal.show');
            Route::get('edit/{id}', 'edit')->name('site.legal.edit');
            Route::patch('update/{id}', 'update')->name('site.legal.update');
            Route::delete('{id}', 'destroy')->name('site.legal.destroy');
        });
//     });

// });


/**
 * The public access to view these Info pages.
 * You can simply customized this to fit into your website's
 * route structure.
 */
Route::controller(PublicSiteLegalsController::class)->group(function(){
    Route::get('/page/{slug}', 'show')->name('public.site.legal.show');
});
