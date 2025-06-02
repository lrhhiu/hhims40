<?php

/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2025 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 30-May-2025, 9:14:59 pm
 * Authors: Dr. Uditha Perera - Consultant in Health Informatics
 *          Dr. Rizan Hafrath - Medical Officer in Health Informatics
 *          Dr. Malinda Wijeratne - Medical Officer in Health Informatics
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


namespace App\Modules\Api\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        log_message('debug', 'API login called');
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Credentials: true');
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        $data = $this->request->getJSON();
        $username = $data->username ?? '';
        $password = $data->password ?? '';

        $userModel = new UserModel();
        $user = $userModel->where('Username', $username)->first();
        log_message('debug', 'Username: ' . $username);
        log_message('debug', 'User found: ' . json_encode($user));
        if ($user && password_verify($password, $user['Password'])) {
            return $this->response->setJSON([
                'success' => true,
                'user' => [
                    'uid' => $user['UID'],
                    'username' => $user['Username'],
                    'email' => $user['EmailAddress'],
                ]
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid username or password'
            ])->setStatusCode(401);
        }
    }
}