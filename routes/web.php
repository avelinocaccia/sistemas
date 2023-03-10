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

$router->get('/filters', 'EmpleadoController@filters');
$router->get('/empleado/allempleado','EmpleadoController@all');
$router->get('/empleado','EmpleadoController@index');
$router->get('/empleado/{Correo}','EmpleadoController@filter');
$router->get('/empleado/name/{name}','EmpleadoController@filterByName');
$router->get('/empleado/foto/nameFoto','EmpleadoController@indexIF');
$router->post('/upload','EmpleadoController@empleadoUplaod');

$router->post('/empleado/crear','EmpleadoController@store');
$router->put('/empleado/{id}','EmpleadoController@update');
$router->get('/empleado/filtroFind/{id}','EmpleadoController@filtroFind');
$router->get('/empleado/filtroWhere/{apellido}','EmpleadoController@filtroWhere1');

$router->post('/empleado/firstOrCreate','EmpleadoController@crearODevolver');




$router->post('cliente','ClienteController@store');
$router->get('cliente','ClienteController@index');

$router->post('producto','ProductoController@store');
$router->put('producto/update/{id}','ProductoController@actualizar');
$router->get('producto','ProductoController@show');
