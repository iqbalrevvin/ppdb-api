<?php

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
    return $router->app->version();
});

/*START::PRODI-ROUTE*/
$router->get('prodi', 'ProdiController@index');
$router->post('prodi', 'ProdiController@addProdi');
$router->put('prodi/{id}', 'ProdiController@updateProdi');
/*END::PRODI-ROUTE*/

/*START::FORM-REGISTER-ROUTE*/
$router->post('register', 'PendaftaranController@create');
/*END::FROM-REGISTER-ROUTE*/

/*START::TAHUN-AJARAN-ROUTE*/
$router->get('tahun-ajaran', 'TahunAjaranController@index');
/*END::TAHUN-AJARAN-ROUTE*/