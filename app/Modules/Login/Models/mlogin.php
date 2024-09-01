<?php

namespace App\Modules\Login\Models;

use CodeIgniter\Model;

class Mlogin extends Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
}