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

 namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/** 
 * @var RouteCollection $routes
 */

$routes = Services::routes();

// Load the default system routes
require SYSTEMPATH . 'Config/Routes.php';

// Set default controller and method
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Load application specific routes
$routes->get('/', 'Home::index');

// Load module-specific routes
$moduleDir = APPPATH . 'Modules';
$modules = scandir($moduleDir);

foreach ($modules as $module) {
    if ($module !== '.' && $module !== '..') {
        $modulePath = $moduleDir . DIRECTORY_SEPARATOR . $module;
        if (is_dir($modulePath)) {
            // Ensure the module has a Config/Routes.php file before loading
            $moduleRouteFile = $modulePath . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Routes.php';
            if (file_exists($moduleRouteFile)) {
                require $moduleRouteFile;
            }
        }
    }
}