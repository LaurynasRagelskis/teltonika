<?php
$router->get('/', 'SiteController@index');

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/', 'SiteController@api');

    // Support actions
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('password/request', 'AuthController@requestNewPassword');
    $router->get('password/request/{token}', 'AuthController@newPasswordForm');
    $router->post('password/request/{token}', 'AuthController@resetPassword');

    // Actions with users
    $router->get('profile', 'UserController@profile');
    $router->get('users', 'UserController@all');
    $router->get('users/{id}', 'UserController@view');

    // Actions with todo's
    $router->post('todo', 'TodoController@add');
    $router->get('todo', 'TodoController@all');
    $router->get('todo/{id}', 'TodoController@view');
    $router->put('todo/{id}', 'TodoController@edit');
    $router->delete('todo/{id}', 'TodoController@delete');

    // Actions with Log
    $router->get('log', 'LogController@all');
    $router->get('log/{id}', 'LogController@view');
    $router->delete('log', 'LogController@clear');
});
