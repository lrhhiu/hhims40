<?php

// This is the routes file for the User module.

if (isset($routes) && $routes instanceof \CodeIgniter\Router\RouteCollection) {
    $routes->group('user', ['namespace' => 'App\Modules\User\Controllers'], function($routes) {
        $routes->get('profile', 'UserController::profile', ['as' => 'user-profile']);
    });
}

?>
