<?php

namespace App\Modules\Menu\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table            = 'user_access_permissions';
    protected $primaryKey       = 'PermissionID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['UserGroupID', 'MenuID', 'CanView', 'CanAdd', 'CanEdit', 'CanDelete', 'Active', 'CreateDate', 'CreateUser', 'LastUpdate', 'LastUpdateUser'];

    protected $useTimestamps = false;
    protected $createdField  = 'CreateDate';
    protected $updatedField  = 'LastUpdate';
}
