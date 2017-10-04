<?php

/*
 * WEB
 */
Route::group(array(
    "prefix" => ADMIN,
    "middleware" => ["web", "auth", "can:pages.manage"],
        ), function($route) {
    $route->group(array("prefix" => "pages"), function($route) {
        $route->any('/', array("as" => "admin.pages.show", "uses" => "Dot\Pages\Controllers\PagesController@index"));
        $route->any('/create', array("as" => "admin.pages.create", "uses" => "Dot\Pages\Controllers\PagesController@create"));
        $route->any('/{id}/edit', array("as" => "admin.pages.edit", "uses" => "Dot\Pages\Controllers\PagesController@edit"));
        $route->any('/delete', array("as" => "admin.pages.delete", "uses" => "Dot\Pages\Controllers\PagesController@delete"));
        $route->any('/{status}/status', array("as" => "admin.pages.status", "uses" => "Dot\Pages\Controllers\PagesController@status"));
        $route->post('newSlug', 'Dot\Pages\Controllers\PagesController@new_slug');
    });
});

/*
 * API
 */
Route::group([
    "prefix" => API,
    "middleware" => ["auth:api"]
], function ($route) {
    $route->get("/pages/show", "Dot\Pages\Controllers\PagesApiController@show");
    $route->post("/pages/create", "Dot\Pages\Controllers\PagesApiController@create");
    $route->post("/pages/update", "Dot\Pages\Controllers\PagesApiController@update");
    $route->post("/pages/destroy", "Dot\Pages\Controllers\PagesApiController@destroy");
});


