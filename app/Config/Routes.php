<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 11-Aug-2024, 2:47:07 pm
 * Authors: Dr. Uditha Perera - Consultant in Health Informatics
 *          Dr. Rizan Hafrath - Medical Officer in Health Informatics
 * Email: lrh.health.gov.lk@gmail.com
 * ------------------------------------------------------------------------------------------------------------------
 * Permission is hereby granted to use, modify, and distribute this software for personal and non-commercial purposes,
 * provided that the original authors are credited. Commercial use, including selling, licensing, or distributing
 * the software for a fee, is strictly prohibited without prior written consent from the original authors.
 * 
 * This program is free software and is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * You should have received a copy of the GNU Affero General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>
 * 
 */


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // root
$routes->get('/', function() {
    // Define the full namespace to the Home controller
    $controller = 'App\Modules\Home\Controllers\Home';
    return (new $controller())->index();
});

// Route for 1 parameter (e.g., /patient/edit/12345)
$routes->get('(:segment)/(:segment)/(:any)', function($module, $method, $param1) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1);
});

// Route for 2 parameters (e.g., /patient/edit/12345/67890)
$routes->get('(:segment)/(:segment)/(:any)/(:any)', function($module, $method, $param1, $param2) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2);
});

// Route for 3 parameters (e.g., /lims/order_summary/12345/2024-03-07/2024-04-07)
$routes->get('(:segment)/(:segment)/(:any)/(:any)/(:any)', function($module, $method, $param1, $param2, $param3) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2, $param3);
});

// Route for 4 parameters
$routes->get('(:segment)/(:segment)/(:any)/(:any)/(:any)/(:any)', function($module, $method, $param1, $param2, $param3, $param4) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2, $param3, $param4);
});

// Route for 5 parameters
$routes->get('(:segment)/(:segment)/(:any)/(:any)/(:any)/(:any)/(:any)', function($module, $method, $param1, $param2, $param3, $param4, $param5) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2, $param3, $param4, $param5);
});

// Route for 6 parameters
$routes->get('(:segment)/(:segment)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', function($module, $method, $param1, $param2, $param3, $param4, $param5, $param6) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2, $param3, $param4, $param5, $param6);
});

// Route for 7 parameters
$routes->get('(:segment)/(:segment)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', function($module, $method, $param1, $param2, $param3, $param4, $param5, $param6, $param7) {
    $controller = 'App\Modules\\' . ucfirst($module) . '\Controllers\\' . ucfirst($module);
    return (new $controller())->$method($param1, $param2, $param3, $param4, $param5, $param6, $param7);
});