<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->resource('file-shares', FileSharesController::class);

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->get('users', 'UsersController@index');

    $router->get('fiels', 'FielsController@index');
    $router->get('fiels/create', 'FielsController@create');
    $router->get('fiels/{id}/edit', 'FielsController@edit');
    $router->post('fiels', 'FielsController@store');
    $router->put('fiels/{id}', 'FielsController@update');
    $router->delete('fiels/{id}', 'FielsController@destroy');
    $router->get('api/fiels', 'FielsController@apiIndex');



});
