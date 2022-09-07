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

$router->get('eventi','EventiController@index');
$router->get('eventi/{id}','EventiController@show');
$router->post('eventi/crea','EventiController@store');
$router->post('eventi/modifica/{id}','EventiController@update');
$router->delete('eventi/elimina/{id}','EventiController@destroy');


$router->get('/', function () use ($router) {
    return $router->app->version();
});
