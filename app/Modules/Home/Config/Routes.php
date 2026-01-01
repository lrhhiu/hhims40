<?php

$routes->group('home', ['namespace' => 'App\Modules\Home\Controllers'], function($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('(:any)', 'Home::view/$1');
});
