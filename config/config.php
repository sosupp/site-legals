<?php

return [

    /**
     * Each legal page by default needs a status of active or inactive.
     * By default the package uses the strings: active and inactive. You
     * can change this using enums or any other implementation.
     */
    'status' => [
        'active',
        'inactive'
    ],

    /**
     * You can specify a route prefix. For example if you already have 
     * defined routes for the admin dashboard, and you will want the CRUD 
     * for site legals to inherit that prefix, then you need to defined it here.
     * Default is dashboard
     */
    'prefix' => 'legals',

    /**
     * Middleware that will be use to protect the admin usage of the site legal CRUD.
     * Default is auth 
     */
    'middleware' => ['web'],
];
