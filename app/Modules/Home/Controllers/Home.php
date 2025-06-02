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

namespace App\Modules\Home\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->has('uid')) {
            // Not logged in, redirect to the login page
            return redirect()->to('/auth');
        } else {
            // Logged in, redirect to the user profile page
            return redirect()->to(route_to('user-profile'));
        }
    }

    public function view(string $page = 'home')
    {
        $viewPath = APPPATH . 'Modules/Home/Views/pages/' . $page . '.php';
        
        if (!is_file($viewPath)) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('App\Modules\Home\Views\templates/header', $data)
            . view('App\Modules\Home\Views/pages/' . $page)
            . view('App\Modules\Home\Views\templates/footer');
    }
}