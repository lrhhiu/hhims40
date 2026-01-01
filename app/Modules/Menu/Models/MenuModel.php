<?php

namespace App\Modules\Menu\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'ui_menus';
    protected $primaryKey       = 'MenuID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['ModuleID', 'MenuName', 'MenuRoute', 'ParentMenuID', 'SortOrder', 'Active', 'CreateDate', 'CreateUser', 'LastUpdate', 'LastUpdateUser'];

    protected $useTimestamps = false;
    protected $createdField  = 'CreateDate';
    protected $updatedField  = 'LastUpdate';
}
