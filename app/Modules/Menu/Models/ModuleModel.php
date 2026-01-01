<?php

namespace App\Modules\Menu\Models;

use CodeIgniter\Model;

class ModuleModel extends Model
{
    protected $table            = 'ui_modules';
    protected $primaryKey       = 'ModuleID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['ModuleName', 'ModuleIcon', 'SortOrder', 'Active', 'CreateDate', 'CreateUser', 'LastUpdate', 'LastUpdateUser'];

    // Dates
    protected $useTimestamps = false; // We handle manually or use CI4 features if configured, but user has specific columns
    protected $createdField  = 'CreateDate';
    protected $updatedField  = 'LastUpdate';
}
