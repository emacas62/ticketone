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

$router->group(['middleware' => 'auth'], function () use ($router) {
    
    $router->post('/eventi', 'EventiController@create'); 
    
    $router->post('/eventi/{id}', 'EventiController@update'); 
    
    $router->delete('/eventi/{id}', 'EventiController@destroy'); 

});

$router->post('/users', 'UsersController@create');
$router->post('/login', 'UsersController@login');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

