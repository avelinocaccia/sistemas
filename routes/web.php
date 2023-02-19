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

$router->get('/', function () use ($router) {
    return '<h1>HOOOOLAAA</h1>';
});


$router->get('/empleado','EmpleadoController@index');
$router->get('/empleado/{Correo}','EmpleadoController@filter');
$router->get('/empleado/name/{name}','EmpleadoController@filterByName');
$router->post('/empleado/crear','EmpleadoController@store');
$router->put('/empleado/{id}','EmpleadoController@update');

