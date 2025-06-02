<?php

// Routes for the Home module.

if (isset($routes) && $routes instanceof \CodeIgniter\Router\RouteCollection) {
    $routes->group('/', ['namespace' => 'App\Modules\Home\Controllers'], function($group) {
        $group->get('', 'Home::index', ['as' => 'home']); // Default route for '/'
    });
}
?>
