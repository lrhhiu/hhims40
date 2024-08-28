<?php

namespace App\Modules\Home\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return $this->view();
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