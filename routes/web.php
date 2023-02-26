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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('services', 'ServicesController@index');
    $router->get('services/{id}', 'ServicesController@show');
    $router->post('services', 'ServicesController@store');
    $router->put('services/{id}', 'ServicesController@update');
    $router->delete('services/{id}', 'ServicesController@destroy');
    
});