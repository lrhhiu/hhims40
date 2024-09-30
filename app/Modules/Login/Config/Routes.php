<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 28-Sep-2024, 6:14:17 am
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
$routes->group('login', ['namespace' => 'App\Modules\Login\Controllers'], function($routes) {
    $routes->get('/', 'LoginController::index');          // Login form
    $routes->post('authenticate', 'LoginController::authenticate');  // Post for login
    $routes->get('forgot', 'LoginController::forgotPasswordForm');    // Forgot password form
    $routes->post('forgot', 'LoginController::sendResetLink');        // Send reset email
    $routes->get('reset/(:any)', 'LoginController::resetPasswordForm/$1'); // Password reset form
    $routes->post('reset', 'LoginController::resetPassword');        // Handle password reset
});