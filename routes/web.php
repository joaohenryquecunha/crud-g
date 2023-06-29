<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router-> get("/api/users", "UsersController@getall");

$router-> group(['prefix' => "/api/users"], function() use ($router){
    $router-> get("/{id}", "UsersController@get");
    $router-> post("/", "UsersController@store");
    $router-> put("/{id}", "UsersController@update");
    $router-> delete("/{id}", "UsersController@destroy");
});
